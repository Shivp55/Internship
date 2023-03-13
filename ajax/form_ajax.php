<?php


require '../includes/config.php';

if (isset($_POST['action']) && $_POST['action'] == "list") {
    header('Content-type: application/json');
    $user_obj = new Supplier();
    $user_data=$user_obj->GET_ALL_SUPPLIERS_FOR_SWITCH();
    $response_array['data']=array();
    foreach ($user_data as $val) {
        array_push($response_array['data'], $val);
    }
    echo json_encode($response_array);
}
if (isset($_POST['action']) && $_POST['action'] == "add") {

    $name = $_REQUEST['name_form'];
    $op = $_REQUEST['op_form'];
    $arr = array(
        "supplier_master_name" => $name,
        "supplier_master_opening_balance"=>$op,
        "supplier_master_current_balance"=>$op,
        "created_on" => date("d-m-Y"),
        "updated_on" => date("d-m-Y h:i A"),
    );
    $result = InsertData($arr, "supplier_master");
    if ($result == 0) {
        echo "Error";
    } else if ($result == 1) {
        echo "success";
    }
}
if (isset($_POST['action']) && ($_POST['action'] == 'delete')) {
    $id = $_REQUEST['id'];
    echo $id;
    $supplier_obj=new Supplier;
    $supplier_obj->DELETE_SUPPLIER($id);
    echo "success";
}
if (isset($_POST['action']) && ($_POST['action'] == 'update')) {
    $id = $_REQUEST['supplier_id'];
    $name = $_REQUEST['sname'];
    $cb = $_REQUEST['cb'];
    $record=$_REQUEST['record_status'];
    if($record==0){
        $delete=1;
    }
    // $delete=1;/
    $arr = array(
        "supplier_master_name" => $name,
        "supplier_master_current_balance" => $cb,
        "record_status" => $record,
        "delete_status" => $delete,
    );
    $where_id = array("supplier_master_id" => $id);
    $result = UpdateData($arr, "supplier_master", $where_id);
    if ($result == 0) {
        echo "Error";
    } else if ($result == 1) {
        echo "success";
    }

    if (isset($_POST['action']) && ($_POST['action'] == 'get_supplier')) {
        echo $sname=$_REQUEST['sname'];
        echo $daterange=$_REQUEST['daterange'];

    }
}
?>