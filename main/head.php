<?php
require_once "../includes/config.php";
if (!isset($_SESSION['login_id']) && $_SESSION['login_id'] == "") {
  header("Location: http://localhost/banking/main/login.php");
  exit(0);
}


?>

<!-- <head> -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Home Page</title>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- Google Font: Source Sans Pro -->
<!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;1,600&display=swap" rel="stylesheet">
<!-- Font Awesome -->
<link rel="stylesheet" href="<?php echo SITE_URL ?>assets/plugins/fontawesome-free/css/all.min.css">
<!-- Data Tables -->
<link rel="stylesheet" href="<?php echo SITE_URL ?>assets/dist/css/datatable.css">
<link rel="stylesheet/scss" type="text/css" href="<?php echo SITE_URL ?>assets/dist/css/datatable.scss">

<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/dataTables.jqueryui.min.css"> -->
<link rel="stylesheet" href="<?php echo SITE_URL ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
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
<link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
<!--//webfonts-->
<!-- highchart table -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highchartTable/2.0.0/jquery.highchartTable.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<!-- Theme style -->
<link rel="stylesheet" href="<?php echo SITE_URL ?>assets/dist/css/adminlte.min.css">



<style type="text/css">
  table.dataTable tbody tr {
    background-color: lightcyan;
  }

  th {
    font-family: 'Poppins', sans-serif;
    font-weight: 400;
    font-size: 15px;
  }

  .table-striped tbody tr:nth-of-type(odd) {
    background-color: white;
  }

  td {
    font-size: 13px;
    font-weight: 300;
  }

  table.dataTable tr td {
    border: 1px solid black;
  }



  /* td.hover{
  background-color: green;
} */
</style>



<!-- </head> -->