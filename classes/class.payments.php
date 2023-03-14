<?php
include('./includes/config.php');

class Payments{
    FUNCTION INSERT_INTO_TRANSACTIONS($sid,$bacc,$sname,$bname,$trans_amt,$date,$trans_type){
        global $db;
        $sql="INSERT INTO transaction_master(supplier_id,bank_acc,sup_name,bank_name,trans_amnt,date,trans_type) VALUES('" . $id . "','" . $sid . "','" . $bacc . "','" . $sname . "','" . $bname. "','" . $trans_amt . "','" . $date . "','" . $trans_type . "' )";
        $db->query($sql);
    }





}

?>