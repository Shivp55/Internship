<?php

require '../includes/config.php';

if (isset($_POST['action']) && $_POST['action'] == "list") {
    header('Content-type: application/json');
    $bank_obj = new Bank();
    $bank_data=$bank_obj->GET_ALL_BANK();
    $response_array['data']=array();
    foreach ($bank_data as $val) {
        array_push($response_array['data'], $val);
    }
    echo json_encode($response_array);
}

if (isset($_POST['action']) && $_POST['action'] == "add") {

$name = $_REQUEST['bname_form'];
$bac = $_REQUEST['bacc_form'];
$arr = array(
    "bank_master_id" =>$bac,
    "bank_master_name" => $name,
    "created_on" => date("d-m-Y h:i A"),
    "updated_on" => date("d-m-Y h:i A"),
);
$result = InsertData($arr, "bank_master");
if ($result == 0) {
    echo "Error";
} else if ($result == 1) {
    echo "success";
}
}
if (isset($_POST['action']) && ($_POST['action'] == 'delete')) {
    $id = $_REQUEST['id'];
    echo $id;
    $bank_obj=new Bank;
    $bank_obj->DELETE_BANK($id);
    echo "success";
}
if (isset($_POST['action']) && ($_POST['action'] == 'update')) {
    $wh_id=$_REQUEST['bnk_id'];
    $id = $_REQUEST['bacc_form'];
    $name = $_REQUEST['bname_form'];
    // $cb = $_REQUEST['cb'];
    // $record=$_REQUEST['record_status'];
    // if($record==0){
    //     $delete=1;
    // }
    // $delete=1;/
    $arr = array(
        "bank_master_id"=>$id,
        "bank_master_name" => $name,
       
    );
    $where_id = array("bank_master_id" => $wh_id);
    $result = UpdateData($arr, "bank_master", $where_id);
    if ($result == 0) {
        echo "Error";
    } else if ($result == 1) {
        echo "success";
    }

}


?>