<?php
    class Supplier
    {
        function GET_ALL_SUPPLIERS_FOR_SWITCH(){
            global $db;
            $sql="SELECT * FROM supplier_master ";
            $db->query($sql);
            return $db->fetch_object();
        }
        function GET_ALL_SUPPLIERS() {
            global $db;
            $sql = "SELECT * FROM supplier_master where record_status=1";
            $db->query($sql);
            return $db->fetch_object();
    }
    function GET_SUPPLIER_BY_ID($id){
        global $db;
        $sql = "SELECT * FROM supplier_master where supplier_master_id='" . $id . "'";
        $db->query($sql);
        return $db->fetch_object(MYSQL_FETCH_SINGLE);
    }
    function DELETE_SUPPLIER($id){
        global $db;
        $sql = "UPDATE supplier_master set record_status=0,delete_status=1 where supplier_master_id='". $id. "'";
        $db->query($sql);
    }
    function GET_PAYMENT_INFO($id){
        global $db;
        $sql="SELECT * FROM payments WHERE sid='". $id. "'";
        $db->query($sql);
        return $db->fetch_object(MYSQL_FETCH_SINGLE);
    }
    function GET_SUPPLIER_BY_NAME($name){
        global $db;
        $sql="SELECT * FROM supplier_master WHERE supplier_master_name ='". $name. "' AND  record_status=1";
        $db->query($sql);
        return $db->fetch_object(MYSQL_FETCH_SINGLE);
    }
    function UPDATE_SUPPLIER_BALANCE($balance,$id){
        global $db;
        $sql="UPDATE supplier_master SET supplier_master_current_balance=supplier_master_current_balance-'". $balance. "' AND updated_on='". date('d-m-Y H:i A') . "' where supplier_master_id='". $id. "'";

        $db->query($sql);

    }

}
