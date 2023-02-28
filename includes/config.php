<?php

session_start();
error_reporting(1);
$server_name = strtoupper($_SERVER['SERVER_NAME']);
date_default_timezone_set("Asia/Kolkata");


switch ($server_name) {

    case "LOCALHOST":
        $physical_path = $_SERVER['DOCUMENT_ROOT']."/php_mvc/";
        $site_url = "http://" . $_SERVER['HTTP_HOST']."/php_mvc/";
        $host_name = "localhost";
        $user_name = "root";
        $password = "";
        $db_name = "keto_nutri";

        break;

    default:
        $physical_path = $_SERVER['DOCUMENT_ROOT']."/php_mvc/";
        $site_url = "http://" . $_SERVER['HTTP_HOST'].'/php_mvc/';
        $host_name = "localhost";
        $user_name = "root";
        $password = "";
        $db_name = "keto_nutri";
        break;


}

define("SITE_PATH", $physical_path);
define("SITE_URL", $site_url);

require_once(SITE_PATH . "/includes/functions.php");
require_once(SITE_PATH . "/classes/class.mysqli.php");





global $db;
$db = '';
$db = new DB_MYSQL();

$conn = $db->CONNECTION($host_name, $db_name, $user_name, $password, false);


// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// echo "Connected successfully";



