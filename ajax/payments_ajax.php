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
    $sname = $_REQUEST['sname'];
    $supplier_obj = new Supplier;
    $supplier_data = $supplier_obj->GET_SUPPLIER_BY_ID($sname);
    // $supplier_id = $supplier_data->supplier_master_id;
    $supplier_current_balance = $supplier_data->supplier_master_current_balance;
    $op = $_REQUEST['op_form'];
    $total = $supplier_current_balance - $op;
    $b_id = $_REQUEST['bname'];
    $bnk_obj = new Payments;
    $bnk_name_info = $bnk_obj->GET_BANK_NAME_BY_ID($b_id);
    $bname = $bnk_name_info->bank_master_name;
    // $date = date("d-m-Y H:i A");
    $dt = $_REQUEST['date_form'];
    $date = date("d-m-Y", strtotime($dt));
    $date1 = date("d-m-Y H:i:s A");
    $trans_type = 1;
    $arr = array(
        "supplier_id" => $sname,
        "bank_id" => $b_id,
        "date" => $date,
        "amount" => $op,

    );
    $query = InsertData($arr, "payment_master");
    $sql1 = "INSERT INTO transaction_master(supplier_id , bank_id , trans_amnt , date , trans_type , create_on , updated_on) VALUES('" . $sname . "','" . $b_id . "','" . $op . "','" . $date . "','" . $trans_type . "','" . $date1 . "','" . $date1 . "' )";
    $result2 = mysqli_query($conn, $sql1);


    if ($query == 1 && $result2 == 1) {
        $sql = "UPDATE supplier_master SET supplier_master_current_balance = supplier_master_current_balance - $op , updated_on='" . date('d-m-y H:i A') . "' WHERE supplier_master_id= $sname";
        $result = mysqli_query($conn, $sql);

        echo "success";
    } else {
        echo "error";
    }
}
if (isset($_POST['action']) && ($_POST['action'] == 'delete')) {
    $id = $_REQUEST['id'];
    $pay_obj = new Payments;
    $pay_obj->DELETE_PAYMENT($id);
    echo "success";
}
