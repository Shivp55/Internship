<?php
global $db, $conn;
require '../includes/config.php';

if(isset($_POST['action']) && $_POST['action']=='update'){
    $id=$_REQUEST['admin_id'];
    $fname=$_REQUEST['fname'];
    $uname=$_REQUEST['uname'];
    $password=$_REQUEST['pwd'];
    $email=$_REQUEST['email'];
    $arr=array(
        "name"=>$fname,
        "email"=>$email,
        "password"=>$password,
        "username"=>$uname,

    );
    $where_arr=array(
        "id"=>$id,

    );
    $result=UpdateData($arr,"admin",$where_arr);
    if($result==1){
        echo "success";

    }
    else{
        echo "error";
    }




}



?>