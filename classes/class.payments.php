<?php
include('./includes/config.php');

class Payments{
    FUNCTION INSERT_INTO_TRANSACTIONS($sid,$bacc,$sname,$bname,$trans_amt,$date,$trans_type){
        global $db;
        $sql="INSERT INTO transaction_master(supplier_id,bank_acc,sup_name,bank_name,trans_amnt,date,trans_type) VALUES('" . $id . "','" . $sid . "','" . $bacc . "','" . $sname . "','" . $bname. "','" . $trans_amt . "','" . $date . "','" . $trans_type . "' )";
        $db->query($sql);
    }


    function GET_ALL_PAYMENTS(){
        global $db;
        $sql="SELECT * FROM payment_master JOIN supplier_master JOIN bank_master ON payment_master.supplier_id = supplier_master.supplier_master_id AND payment_master.bank_id=bank_master.bank_master_id";
        $db->query($sql);
        return $db->fetch_object();
    }
    function GET_BANK_NAME_BY_ID($id){
        global $db;
        $sql="SELECT * FROM bank_master where bank_master_id = $id";
        $db->query($sql);
        return $db->fetch_object(MYSQL_FETCH_SINGLE);
    }
    function DELETE_PAYMENT($id){
        global $db;
        $sql="DELETE FROM payment_master where id=$id";
        $db->query($sql);
    }
    function UPDATE_SUPPLIER_BALANCE($id,$amnt){
        global $db;
        $sql="UPDATE transaction_master SET balance=balance-$amnt WHERE supplier_id=$id";
        $db->query($sql);
        

    }




}
