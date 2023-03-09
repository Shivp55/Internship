<?php
global $db, $conn;
require '../includes/config.php';

if (isset($_POST['action']) && ($_POST['action'] == "login")) {
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $sql = "SELECT * FROM admin WHERE email='".$email."' AND password='".$password."' ";
    $result = mysqli_query($conn,$sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['login_id'] = $row['id'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['userName'] = $row['username'];
        echo "success";
    } else {
      echo printf($login_data);
    }     
}
?>
