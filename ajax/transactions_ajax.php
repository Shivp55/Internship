<?php
require '../includes/config.php';
global $conn;
if (isset($_POST['action']) && $_POST['action'] == "add") {

    $sname = $_REQUEST['sname'];
    $supplier_obj = new Supplier;
    $supplier_data = $supplier_obj->GET_SUPPLIER_BY_NAME($sname);

    $supplier_id = $supplier_data->supplier_master_id;
    $supplier_current_balance = $supplier_data->supplier_master_current_balance;

    $op = $_REQUEST['op_form'];
    $bname = $_REQUEST['bname'];
    $bac = $_REQUEST['accnt'];
    $arr = array(
        "supplier_id" => $supplier_id,
        "bank_acc" => $bac,
        "sup_name" => $sname,
        "bank_name" => $bname,
        "trans_amnt" => $op,

    );
    $update = array(
        "supplier_master_current_balance" => ($supplier_current_balance - $op),
        "updated_on" => date("d-m-Y h:i A"),
    );
    $where_upd = array(
        "supplier_master_id" => $supplier_id,
        "record_status" => "1",
    );
    $query = InsertData($arr, "transactions");
    if ($query == 1) {
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
