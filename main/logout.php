<?php

session_start();
session_destroy();
header('Location: http://localhost/admin/main/login.php');
echo "success";
exit;

?>