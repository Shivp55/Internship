<?php
class Invoice{
    function GET_ALL_INVOICES(){
        global $db;
        $sql="SELECT * FROM invoice_master";
        $db->query($sql);
        return $db->fetch_object();
    }





}




?>