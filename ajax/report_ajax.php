<?php
require '../includes/config.php';

if (isset($_POST['action']) && $_POST['action'] == "list") {
    header('Content-type: application/json');
    $name = $_REQUEST['sname'];
    $sup_obj=new Supplier;
    $sup_data=$sup_obj->GET_SUPPLIER_BY_NAME($name);
    $id=$sup_data->supplier_master_id;
    $trans_obj = new Transaction;
    $trans_data = $trans_obj->GET_TRANSACTION_BY_ID($id);
    $response_array['data'] = array();
    foreach ($trans_data as $val) {
        array_push($response_array['data'], $val);
    }
    echo json_encode($response_array);

}

