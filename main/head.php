<?php
require_once "../includes/config.php";
if (!isset($_SESSION['login_id']) && $_SESSION['login_id'] == "") {
    header("Location: http://localhost/banking/main/login.php");
    exit(0);
}
?>
    <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home Page</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo SITE_URL?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo SITE_URL?>assets/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/dataTables.jqueryui.min.css">
  <!-- DataTable -->
  <!-- <link rel="stylesheet" href="<?php echo SITE_URL?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css"> -->
  <!-- <link rel="stylesheet" href="<?php echo SITE_URL?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css"> -->
  <!-- <link rel="stylesheet" href="<?php echo SITE_URL?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css"> -->

</head>
