<?php
    class Supplier
    {
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
}
?>