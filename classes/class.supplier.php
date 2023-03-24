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
            $rd=1;
            $sql = "SELECT * FROM supplier_master where record_status=$rd";
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
    function CHECK_SUPPLIER_BY_NAME($name){
        global $db;
        $sql="SELECT * FROM supplier_master where supplier_master_name='".$name."'";
        $db->query($sql);
        if(mysqli_num_rows($db->query($sql))){
            return true;
        }
        else{
            return false;
        } 
    }
    function CHECK_SUPPLIER_BY_NAME_TO_ACTIVATE($name){
        global $db;
        $check=0;
        $sql="SELECT * from supplier_master where supplier_master_name='".$name."' and record_status=$check";
        $db->query($sql);
        if(mysqli_num_rows($db->query($sql))){
            return true;
        }
        else{
            return false;
        }
    }
    function CHECK_SUPPLIER_BY_NAME_RECORD_STATUS($name){
        global $db;
        $check=0;
        $sql="SELECT * from supplier_master where supplier_master_name='".$name."' and record_status=$check";
        $db->query($sql);
        return $db->fetch_object(MYSQL_FETCH_SINGLE);

    }
    function GET_SUPPLIER_NAME_AND_DATE($name,$date){
        global $db;
        $sql="SELECT * from supplier_master where supplier_master_name=$name AND created_on='".$date."' and record_status=1";
        $db->query($sql);
        return $db->fetch_object(MYSQL_FETCH_SINGLE);

    }

}
