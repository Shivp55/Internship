<?php
require '../includes/config.php';
global $conn;
if (isset($_POST['action']) && $_POST['action'] == "list") {
    header('Content-type: application/json');
    $inv_obj = new Invoice;
    $inv_data = $inv_obj->GET_ALL_INVOICES();
    $response_array['data'] = array();
    foreach ($inv_data as $val) {
        array_push($response_array['data'], $val);
    }
    echo json_encode($response_array);
}
if (isset($_POST['action']) && $_POST['action'] == "add") {
    $invoice=$_REQUEST['invoice'];
    $sname = $_REQUEST['sname'];
    $supplier_obj = new Supplier;
    $supplier_data = $supplier_obj->GET_SUPPLIER_BY_NAME($sname);
    $supplier_id = $supplier_data->supplier_master_id;
    $supplier_current_balance = $supplier_data->supplier_master_current_balance;
    $op = $_REQUEST['op_form'];
    // $bname = $_REQUEST['bname'];
    // $bac = $_REQUEST['accnt'];
    $dt= $_REQUEST['date_form'];
    $date=date("d-m-Y", strtotime($dt));
    $date1=date("d-m-Y H:i A");
    $trans_type = 2;
    $arr = array(
        "invoice_number"=>$invoice,
        "supplier_id" => $supplier_id,
        "supplier_name" => $sname,
        "date" => $date,
        "amount" => $op,

    );
    $query = InsertData($arr, "invoice_master");
    $sql1 = "INSERT INTO transaction_master(supplier_id,sup_name,trans_amnt,date,trans_type,invoice_no,created_on) VALUES('" . $supplier_id . "','" . $sname . "','" . $op . "','" . $date . "','" . $trans_type . "','" . $invoice. "','" . $date1. "' )";
    $result2 = mysqli_query($conn, $sql1);
     // echo $query1=InsertData($arr1,"transaction_master");
    $update = array(
        "supplier_master_current_balance" => ($supplier_current_balance - $op),
        "updated_on" => date("d-m-Y h:i A"),
    );
    $where_upd = array(
        "supplier_master_id" => $supplier_id,
        "record_status" => "1",
    );

    if ($query == 1 && $result2 == 1) {
        // $result = UpdateData($update, "supplier_master", $where_upd);
        // if ($result == 1) {
        $sql = "UPDATE supplier_master SET supplier_master_current_balance = supplier_master_current_balance + $op , updated_on='" . date('d-m-y H:i A') . "' WHERE supplier_master_id= $supplier_id";
        $result = mysqli_query($conn, $sql);
        echo "success";
        // }
    } else {
        echo "error";
    }
}
if (isset($_POST['action']) && ($_POST['action'] == 'delete')) {
    $id = $_REQUEST['id'];
    echo $id;
    $inv_obj=new Invoice;
    $inv_obj->DELETE_INVOICE($id);
    echo "success";
}
