<?php
class Invoice{
    function GET_ALL_INVOICES(){
        global $db;
        $sql="SELECT * FROM invoice_master  JOIN supplier_master ON supplier_master.supplier_master_id=invoice_master.supplier_id";
        $db->query($sql);
        return $db->fetch_object();
    }
    function DELETE_INVOICE($id){
        global $db;
        $sql="DELETE FROM invoice_master where id=$id";
        $db->query($sql);
        
    }
    // function UPDATE_SUPPLIER_BALANCE($id,$amnt){
    //     global $db;
    //     $sql="UPDATE transaction_master SET balance=balance+$amnt WHERE supplier_id=$id";
    //     $db->query($sql);
    // }





}
