<?php


require '../includes/config.php';

if (isset($_POST['action']) && $_POST['action'] == "list") {
    header('Content-type: application/json');
    $user_obj = new Supplier();
    $user_data = $user_obj->GET_ALL_SUPPLIERS_FOR_SWITCH();
    $response_array['data'] = array();
    foreach ($user_data as $val) {
        array_push($response_array['data'], $val);
    }
    echo json_encode($response_array);
}
if (isset($_POST['action']) && $_POST['action'] == "add") {

    $name = $_REQUEST['name_form'];
    $fetch_obj = new Supplier;
    $fetch_supplier = $fetch_obj->CHECK_SUPPLIER_BY_NAME($name);
    // echo $fetch_supplier;
    $date = date("Y-m-d");
    $date1 = date("d-m-Y H:i A");
    $trans_type = 2;
    $trans_type1 = 0;

    if ($fetch_supplier == 1) {
        echo "supplier_exists";
    } else {
        $op = $_REQUEST['op_form'];

        $arr = array(
            "supplier_master_name" => $name,
            "supplier_master_opening_balance" => $op,
            "supplier_master_current_balance" => $op,
            "created_on" => date("d-m-Y h:i A"),
            "updated_on" => date("d-m-Y h:i A"),
        );
        $result = InsertData($arr, "supplier_master");
        $sup_id = $db->sql_inserted_id();

        if ($result == 0) {
            echo "Error";
        } else if ($result == 1) {
            $sql = "INSERT INTO transaction_master(supplier_id,trans_amnt,date,create_on,updated_on) VALUES ('" . $sup_id . "','" . $op . "','" . $date . "','" . $date1 . "','" . $date1 . "' )";
            $result2 = mysqli_query($conn, $sql);
            echo "Success";
        }
    }
}

if (isset($_POST['action']) && ($_POST['action'] == 'delete')) {
    $id = $_REQUEST['id'];
    echo $id;
    $supplier_obj = new Supplier;
    $supplier_obj->DELETE_SUPPLIER($id);

    $arr = array(
        "updated_on" => date("Y-m-d h:i A"),
    );
    $where_id = array("supplier_master_id" => $id);
    $result = UpdateData($arr, "supplier_master", $where_id);
    echo "success";
}
if (isset($_POST['action']) && ($_POST['action'] == 'update')) {
    $id = $_REQUEST['supplier_id'];
    $name = $_REQUEST['sname'];
    $record = $_REQUEST['record_status'];
    if ($record == 0) {
        $delete = 1;
    }
    // $delete=1;/
    $arr = array(
        "supplier_master_name" => $name,
        "updated_on" => date("Y-m-d h:i A"),
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
        echo $sname = $_REQUEST['sname'];
        echo $daterange = $_REQUEST['daterange'];
    }
}
