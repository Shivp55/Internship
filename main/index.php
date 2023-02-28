<!DOCTYPE html>
<html lang="en">
<?php
include './head.php';
?>

<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="<?php echo SITE_URL?>assets/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>
    <?php
    include './top-nav.php';
    include './sidenav.php'

      ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" id="content-wrapper">



    </div>
    <!-- ./wrapper -->
    <?php
    include './footer.php';
    include './js.php';

    ?>

</body>

</html>