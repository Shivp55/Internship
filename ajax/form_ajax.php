<?php

global $db, $conn;
require '../includes/config.php';

if (isset($_POST['action']) && $_POST['action'] == "list") {

    header('Content-type: application/json');


    $sql = "SELECT * FROM supplier_master WHERE record_status=1";
    $result = mysqli_query($conn, $sql);
    $response['data'] = array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $response['data'][] = array(
                'id' => $row['supplier_master_id'],
                'name' => $row['supplier_master_name'],
                'ob' => $row['supplier_master_opening_balance'],
                'cb' => $row['supplier_master_current_balance'],
                'co' => $row['created_on'],
                'up' => $row['updated_on'],
            );
        }
    }
    echo json_encode($response);
}

if (isset($_POST['action']) && $_POST['action'] == "add") {

    $name = $_REQUEST['name_form'];
    $op = $_REQUEST['op_form'];
    $arr = array(
        "supplier_master_name" => $name,
        "supplier_master_opening_balance"=>$op,
        "supplier_master_current_balance"=>$op,
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
    $sql = "UPDATE supplier_master SET record_status=0 AND deleted=0 WHERE supplier_master_id=$id";
    $result = mysqli_query($conn, $sql);
    if ($result == 0) {
        echo "Error";
    } else if ($result == 1) {
        echo "success";
    }
}
if (isset($_POST['action']) && ($_POST['action'] == 'update')) {
    $id = $_REQUEST['user_id'];
    $fname = $_REQUEST['fname'];
    $lname = $_REQUEST['lname'];
    $email = $_REQUEST['email'];
    $phone = $_REQUEST['cnt'];
    $password = $_REQUEST['pwd'];
    $address = $_REQUEST['address'];
    $arr = array(
        "fname" => $fname,
        "lname" => $lname,
        "email" => $email,
        "phone" => $phone,
        "password" => $password,
        "address" => $address,
    );
    $where_id = array("id" => $id);
    $result = UpdateData($arr, "supplier_master", $where_id);
    if ($result == 0) {
        echo "Error";
    } else if ($result == 1) {
        echo "success";
    }
}

?>

