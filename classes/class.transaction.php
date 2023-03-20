<?php
include('./includes/config.php');

class Transaction{
    function GET_ALL_TRANSACTIONS(){
        global $db;
        $sql="SELECT * FROM transaction_master";
        $db->query($sql);
        return $db->fetch_object();
    }
    function DELETE_TRANSACTION($id){
        global $db;
        $sql="DELETE FROM transaction_master where t_id=$id";
        $db->query($sql);
    }
    function GET_TRANSACTION_BY_ID($id){
        global $db;
        $sql="SELECT * FROM transaction_master WHERE supplier_id=$id";
        $db->query($sql);
        return $db->fetch_object();
    }
    function GET_ALL_TRANSACTIONS_BY_NAME($name){
        global $db;
        $sql="SELECT * FROM transaction_master WHERE sup_name='".$name."'";
        $db->query($sql);
        return $db->fetch_object();
    }
//     function GET_SUM_OF_ALL_TRANSACTIONS(){
//         global $db;
//         $sql="SELECT * FROM transaction_master";
//         $db->query($sql);
//         $myresult=mysqli_num_rows($db->query($sql));
        
    function TOTAL_TRANSACTIONS(){
        global $db;
        $sql="SELECT * FROM transaction_master";
        $total_amnt=0;
        $result=$db->query($sql);
        // $result=mysqli_num_rows($db->query($sql));
        if(mysqli_num_rows($db->query($sql))>0) {
            while($row=mysqli_fetch_assoc($result)){
                if($row[6]==2){
                    $total_amnt+=$row[4];

                }
                else if($row[6]==1){
                    $total_amnt-=$row[4];
                }

            }

        }
        return $total_amnt;
    }
}
?>