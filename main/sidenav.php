<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <?php
  include './admin_detail.php';

  ?>


  <!-- Brand Logo -->
  <a href="./index.php" class="brand-link">
    <img src="<?php echo SITE_URL ?>assets/dist/img/Logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: 1.8">
    <span class="brand-text font-weight-light">SHERP</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?php echo SITE_URL ?>assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?php echo  $name; ?></a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="./index.php" class="nav-link">
            <i class="fa fa-tachometer"></i>&nbsp;&nbsp;
            <p>
              Dashboard

            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="./supplier.php" class="nav-link">
            <i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;
            <p>
              Supplier

            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="./bank.php" class="nav-link">
            <i class="fa fa-university" aria-hidden="true"></i>&nbsp;&nbsp;
            <p>
              Bank

            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="./invoice.php" class="nav-link">
            <i class="fa fa-file-text-o" aria-hidden="true"></i>&nbsp;&nbsp;
            <p>
              Invoice

            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="./payment.php" class="nav-link">
            <i class="fa fa-money" aria-hidden="true"></i>&nbsp;&nbsp;

            <p>
              Payment

            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="./transaction.php" class="nav-link">
            <i class="fa fa-file-text-o" aria-hidden="true"></i>&nbsp;&nbsp;
            <p>
              Transaction

            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="./report.php" class="nav-link">
            <i class="fa fa-calendar-check-o" aria-hidden="true"></i>&nbsp;&nbsp;
            <p>
              Report

            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="./genral-forms.php" class="nav-link">
            <i class="fa fa-users" aria-hidden="true"></i>&nbsp;&nbsp;
            <p>
              User Details

            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="./logout.php" class="nav-link">
            <i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;&nbsp;
            <p>
              Sign Out

            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="pages/calendar.html" class="nav-link">
            <i class="nav-icon far fa-calendar-alt"></i>
            <p>
              FAQ

            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="pages/calendar.html" class="nav-link">
            <i class="nav-icon far fa-calendar-alt"></i>
            <p>
              Contact Us

            </p>
          </a>
        </li>


      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>