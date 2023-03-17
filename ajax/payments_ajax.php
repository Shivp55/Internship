<?php
require '../includes/config.php';
global $conn;
if (isset($_POST['action']) && $_POST['action'] == "list") {
    header('Content-type: application/json');
    $pay_obj = new Payments;
    $pay_data = $pay_obj->GET_ALL_PAYMENTS();
    $response_array['data'] = array();
    foreach ($pay_data as $val) {
        array_push($response_array['data'], $val);
    }
    echo json_encode($response_array);
}
if (isset($_POST['action']) && $_POST['action'] == "add") {
    echo $sname = $_REQUEST['sname'];
    $supplier_obj = new Supplier;
    $supplier_data = $supplier_obj->GET_SUPPLIER_BY_NAME($sname);
    echo $supplier_id = $supplier_data->supplier_master_id;
    $supplier_current_balance = $supplier_data->supplier_master_current_balance;
    $op = $_REQUEST['op_form'];
    echo $bacc = $_REQUEST['bname'];
    $bnk_obj=new Payments;
    $bnk_name_info=$bnk_obj->GET_BANK_NAME_BY_ID($bacc);
    $bname=$bnk_name_info->bank_master_name;
    // $date = date("d-m-Y H:i A");
    $dt= $_REQUEST['date_form'];
    $date=date("d-m-Y", strtotime($dt));
    $date1=date("d-m-Y H:i A");
    $trans_type = 1;
    $arr = array(
        "supplier_id" => $supplier_id,
        "supplier" => $sname,
        "bank_acc" => $bacc,
        "bank_name" => $bname,
        "date" => $date,
        "amount" => $op,

    );
    echo $query = InsertData($arr, "payment_master");
    $sql1 = "INSERT INTO transaction_master(supplier_id,bank_acc,sup_name,bank_name,trans_amnt,date,trans_type) VALUES('" . $supplier_id . "','" . $bac . "','" . $sname . "','" . $bname . "','" . $op . "','" . $date . "','" . $trans_type . "' )";
    echo $result2 = mysqli_query($conn, $sql1);
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
        $sql = "UPDATE supplier_master SET supplier_master_current_balance = supplier_master_current_balance - $op , updated_on='" . date('d-m-y H:i A') . "' WHERE supplier_master_id= $supplier_id";
        $result = mysqli_query($conn, $sql);
        echo "success";
        // }
    } else {
        echo "error";
    }
   
}
if (isset($_POST['action']) && ($_POST['action'] == 'delete')) {
    $id = $_REQUEST['id'];
    $pay_obj=new Payments;
    $pay_obj->DELETE_PAYMENT($id);
    echo "success";
}