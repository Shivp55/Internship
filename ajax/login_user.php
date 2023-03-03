<?php
global $db, $conn;
require '../includes/config.php';

if (isset($_POST['action']) && ($_POST['action'] == "login")) {
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];

    $sql = "SELECT * FROM admin WHERE email='".$email."' AND password='".$password."' ";
  //  $sql = "SELECT * FROM admin WHERE email='admin@gmail.com' AND password='admin@123'";
    
    $result = mysqli_query($conn,$sql);
  // echo print_r($sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['login_id'] = $row['admin_id'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['userName'] = $row['username'];

        echo "success";

    } else {


        echo printf($login_data);
    }
      // 43  echo $row;

    
    // echo $id=$row['admin_id'];
    // echo $name=$row['name'];
}
?>