<?php
include '../includes/config.php';
$name=$_REQUEST['name_form'];
$op=$_REQUEST['op_form'];
$arr=array(
    "supplier_master_name"=>$name,
    "supplier_master_opening_balance"=>$op,
    "supplier_master_current_balance" => $op,
    "created_on" => date("d-m-Y"),
    "updated_on" => date("d-m-Y h:i A"),


);
$result=InsertData($arr,"supplier_master");
if($result==1){
    echo "success";
}
else{
    echo "error";
}

?>