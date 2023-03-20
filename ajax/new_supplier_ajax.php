<?php
include '../includes/config.php';
$name=$_REQUEST['name_form'];
$date=date("d-m-Y h:i A");
$op=$_REQUEST['op_form'];
$date1=date("d-m-Y");
$trans_type=2;
$arr=array(
    "supplier_master_name"=>$name,
    "supplier_master_opening_balance"=>$op,
    "supplier_master_current_balance" => $op,
    "created_on" => $date,
    "updated_on" => $date,


);
$result=InsertData($arr,"supplier_master");
if($result==1){

    $sql="INSERT INTO transaction_master(sup_name,trans_amnt,date,created_on,balance) VALUES ('" . $name . "','" . $op . "','" . $date1 . "','" . $date. "',$op )";
            $result2=mysqli_query($conn, $sql);
            $sql2="SELECT * from supplier_master where supplier_master_name='".$name."',created_on='" . $date. "'";
            $result3=mysqli_query($conn, $sql2);
            if(mysqli_num_rows($result3)>0){
                while($row=mysqli_fetch_assoc($result3)){
                    $id=$row['supplier_master_id'];
            }
        }
            $sql4="UPDATE transaction_master SET supplier_id=$id where sup_name='".$name."'";
            $result4=mysqli_query($conn,$sql4);
            echo "success";

}
else{
    echo "error";
}

?>