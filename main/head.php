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
  <link rel="stylesheet" href="<?php echo SITE_URL ?>assets/plugins/fontawesome-free/css/all.min.css">
 
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/dataTables.jqueryui.min.css">
  <link rel="stylesheet" href="<?php echo SITE_URL?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="<?php echo SITE_URL ?>assets/plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo SITE_URL ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="<?php echo SITE_URL ?>assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?php echo SITE_URL ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo SITE_URL ?>assets/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo SITE_URL ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="<?php echo SITE_URL ?>assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="<?php echo SITE_URL ?>assets/plugins/bs-stepper/css/bs-stepper.min.css">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="<?php echo SITE_URL ?>assets/plugins/dropzone/min/dropzone.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="<?php echo SITE_URL ?>assets/dist/css/adminlte.min.css">







</head>