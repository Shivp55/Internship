<?php
include('../includes/config.php');
$name=$_REQUEST['name_form'];
$rec_status=1;
$del_status=0;
$activate_sup=new Supplier;
$sup_info=$activate_sup->CHECK_SUPPLIER_BY_NAME_TO_ACTIVATE($name);
$check_sup=$activate_sup->CHECK_SUPPLIER_BY_NAME_RECORD_STATUS($name);
$id=$check_sup->supplier_master_id;

if($sup_info==1){
    $arr=array(
        "updated_on"=>date('d-m-Y H:i A'),
        "record_status"=>$rec_status,
        "delete_status"=>$del_status,
    );
    $where_arr=array(
        "supplier_master_id"=>$id,

    );
    $result=UpdateData($arr,"supplier_master",$where_arr);
    if($result==1){
        echo "success";
    }
    else{
        echo "error";
    }


}
else{
    echo "exists";
}




?>