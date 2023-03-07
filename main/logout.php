<?php

session_start();
session_destroy();
header('Location: http://localhost/banking/main/login.php');
echo "success";
exit;

?>