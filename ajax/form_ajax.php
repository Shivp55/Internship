<?php


require '../includes/config.php';

if (isset($_POST['action']) && $_POST['action'] == "list") {

    header('Content-type: application/json');

    $user_obj = new Supplier();

    $user_data=$user_obj->GET_ALL_SUPPLIERS();
    $response_array['data']=array();
    foreach ($user_data as $val) {
        array_push($response_array['data'], $val);
    }
    echo json_encode($response_array);
}

if (isset($_POST['action']) && $_POST['action'] == "add") {

    $name = $_REQUEST['name_form'];
    $op = $_REQUEST['op_form'];
    $date=$_REQUEST['date'];
    $arr = array(
        "supplier_master_name" => $name,
        "supplier_master_opening_balance"=>$op,
        "supplier_master_current_balance"=>$op,
        "created_on" => $date

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
    $id = $_REQUEST['id'];
    $name = $_REQUEST['supplier_master_name'];
    $op = $_REQUEST['supplier_master_opening_balance'];
    $cb = $_REQUEST['supplier_master_current_balance'];
    
    $arr = array(
        "supplier_master_name" => $name,
        "supplier_master_opening_balance" => $op,
        "supplier_master_current_balance" => $cb,
    );
    $where_id = array("supplier_master_id" => $id);
    $result = UpdateData($arr, "supplier_master", $where_id);
    if ($result == 0) {
        echo "Error";
    } else if ($result == 1) {
        echo "success";
    }
}

?>

