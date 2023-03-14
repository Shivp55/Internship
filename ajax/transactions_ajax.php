<?php
require '../includes/config.php';

if (isset($_POST['action']) && $_POST['action'] == "list") {
    header('Content-type: application/json');
    $trans_obj = new Transaction();
    $trans_data=$trans_obj->GET_ALL_TRANSACTIONS();
    $response_array['data']=array();
    foreach ($trans_data as $val) {
        array_push($response_array['data'], $val);
    }
    echo json_encode($response_array);
}
if (isset($_POST['action']) && ($_POST['action'] == 'delete')) {
    $id = $_REQUEST['id'];
    echo $id;
    $trans_obj=new Transaction;
    $trans_obj->DELETE_TRANSACTION($id);
    echo "success";
}





?>