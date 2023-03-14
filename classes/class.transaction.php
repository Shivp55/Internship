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
        $sql="SELECT * from transaction_master where t_id=$id";
        $db->query($sql);
        return $db->fetch_object(MYSQL_FETCH_SINGLE);
    }
}
?>