<?php
class Invoice{
    function GET_ALL_INVOICES(){
        global $db;
        $sql="SELECT * FROM invoice_master";
        $db->query($sql);
        return $db->fetch_object();
    }
    function DELETE_INVOICE($id){
        global $db;
        $sql="DELETE FROM invoice_master where id=$id";
        $db->query($sql);
        
    }





}




?>