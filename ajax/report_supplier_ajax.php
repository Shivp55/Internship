<?php
require '../includes/config.php';
header('Content-type: application/json');
$id = $_GET['id'];

$sup_obj=new Supplier;
$sup_data=$sup_obj->GET_SUPPLIER_BY_ID($id);

$trans_obj = new Transaction;
$trans_data = $trans_obj->GET_TRANSACTION_BY_ID($id);
$response_array['data'] = array();
foreach ($trans_data as $val) {
    array_push($response_array['data'], $val);
}
echo json_encode($response_array);


?>