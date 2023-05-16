<?php
include '../includes/config.php';
$name=$_REQUEST['name_form'];
$date=date("d-m-Y h:i A");
$op=$_REQUEST['op_form'];
$date1=date("Y-m-d");
$trans_type=2;
$arr=array(
    "supplier_master_name"=>$name,
    "supplier_master_opening_balance"=>$op,
    "supplier_master_current_balance" => $op,
    "created_on" => $date,
    "updated_on" => $date,


);
$result=InsertData($arr,"supplier_master");
$sup_id = $db->sql_inserted_id();
if($result==1){

    $sql="INSERT INTO transaction_master(supplier_id,trans_amnt,date,create_on,updated_on) VALUES ('" . $sup_id . "','" . $op . "','" . $date1 . "','" . $date . "','" . $date . "' )";
            $result2=mysqli_query($conn, $sql);
        //     $sql2="SELECT * from supplier_master where supplier_master_name='".$name."',created_on='" . $date. "'";
        //     $result3=mysqli_query($conn, $sql2);
        //     if(mysqli_num_rows($result3)>0){
        //         while($row=mysqli_fetch_assoc($result3)){
        //             $id=$row['supplier_master_id'];
        //     }
        // }
        //     $sql4="UPDATE transaction_master SET supplier_id=$id where sup_name='".$name."'";
        //     $result4=mysqli_query($conn,$sql4);
        if($result2==1){
            echo "success";
        }
        else{
            echo "error";
        }
}
else{
    echo "error";
}

?>