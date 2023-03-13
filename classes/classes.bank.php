<?php


class Bank{
    function GET_ALL_BANK() {
        global $db;
        $sql = "SELECT * FROM bank_master ";
        $db->query($sql);
        return $db->fetch_object();
}
function DELETE_BANK($id){
    global $db ;
    $sql="DELETE FROM bank_master WHERE bank_master_id=$id";
    $db->query($sql);

}
function GET_BANK_BY_ID($id){
    global  $db;
    $sql="SELECT * FROM bank_master WHERE bank_master_id=$id";
    $db->query($sql);
    return $db->fetch_object(MYSQL_FETCH_SINGLE);
}




}