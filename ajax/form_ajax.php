<?php

require '../includes/config.php';

if (isset($_POST['action']) && $_POST['action'] == "list") {

    header('Content-type: application/json');
    global $db,$conn;

        $sql = "SELECT * FROM users";
        $result=mysqli_query($conn,$sql);
        $response['data']=array();
        if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_array($result)){
                $response['data'][]=array(
                    'id'=>$row['id'],
                    'fname'=>$row['fname'],
                    'lname'=>$row['lname'],
                    'email'=>$row['email'],
                    'phone'=>$row['phone'],
                    'password'=>$row['password'],
                    'address'=>$row['address'],

                );
            }
            
        }
        echo json_encode($response);

}

if (isset($_POST['action']) && $_POST['action'] == "add") {
    $fname=$_REQUEST['fname_form'];
    $lname=$_REQUEST['lname_form'];
    $email=$_REQUEST['email_form'];
    $phone=$_REQUEST['cnt_form'];
    $password=$_REQUEST['password_form'];
    $address=$_REQUEST['address_form'];
    $arr=array(
        "fname"=>$fname,
        "lname"=>$lname,
        "email"=>$email,
        "phone"=>$phone,
        "password"=>$password,
        "address"=>$address,
    );
    $result=InsertData($arr, "users");
    if ($result == 0) {
        echo "Error";
    } else if ($result == 1) {
        echo "success";
 }
}



?>