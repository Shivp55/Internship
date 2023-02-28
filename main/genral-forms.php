<!DOCTYPE html>
<html lang="en">
<?php
include './head.php';
?>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <?php
    include './top-nav.php';
    include './sidenav.php';
    ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>General Form</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">General Form</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-4">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Quick Example</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" name="frmadd" id="frmadd">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="fname">First Name</label>
                      <input type="text" class="form-control" placeholder="Enter first Name" id="fname_form" name="fname_form" required>
                    </div>
                    <div class="form-group">
                      <label for="lname">Last Name</label>
                      <input type="text" class="form-control" placeholder="Enter Last Name" id="lname_form" name="lname_form" required>
                    </div>
                    <div class="form-group">
                      <label for="cnt">Contact Number</label>
                      <input type="text" class="form-control" placeholder="Enter Contact" id="cnt_form" name="cnt_form" required>
                    </div>
                    <div class="form-group">
                      <label for="email">Email address</label>
                      <input type="email" class="form-control" placeholder="Enter email" id="email_form" name="email_form" required>
                    </div>
                    <div class="form-group">
                      <label for="address">Address</label>
                      <input type="text" class="form-control" placeholder="Enter Your Address" id="address_form" name="address_form" required>
                    </div>
                    <div class="form-group">
                      <label for="pwd">Password</label>
                      <input type="password" class="form-control" placeholder="Password" id="password_form" name="password_form" required>
                    </div>

                  </div>
                  <!-- /.card-body -->


                  <div class="card-footer">
                    <center>
                      <input type="hidden" name="action" value="add">
                      <button type="submit" class="btn btn-primary mr-2" >Submit</button>
                    </center>
                  </div>
                </form>
              </div>


            </div>
            <div class="col-md-8">

              <div class="card card-custom">

                <div class="card-body">
                  <!--begin: Search Form-->
                  <!--begin::Search Form-->

                  <!--end::Search Form-->
                  <!--end: Search Form-->
                  <!--begin: Datatable-->

                  <div id="kt-datatable">
                  <input type="hidden" name="action" value="list">

                    <table id="example">

                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>Contact</th>
                          <th>Email</th>
                          <th>Address</th>
                          <th>Password</th>
                        </tr>
                      </thead>
                    </table>
                  </div>


                    <!--end: Datatable-->
                  </div>
                </div>

              </div>

              <!--/.col (right) -->
            </div>

            <!-- /.card -->

            <!-- /.row -->
          </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <?php
    include 'footer.php';
    ?>


    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->
  <?php
  include 'js.php';
  
  ?>

<!-- <script src="js/uses.js" type="text/javascript"></script> -->
  <Script type="text/javascript">
    $(document).ready(function() {
      var table = $("#example").DataTable({
        ajax: {
          url: '../ajax/form_ajax.php',
          method: "POST",
          data: {
           action: 'list',
           // etc..
        },
        layout: {
                scroll: false,
                footer: false,
            },


        },

        columns: [{
            data: "id"
          },
          {
            data: "fname"
          },
          {
            data: "lname"
          },
          {
            data: "phone"
          },
          {
            data: "email"
          },
          {
            data: "address"
          },
          {
            data: "password"
          },
        ]


      });
      $('#frmadd').submit(function(e) {
        e.preventDefault();
        var url = '../ajax/form_ajax.php';
        $.ajax({
          url: url,
          type: 'post',
          dataType: 'html',
          data: $('#frmadd').serialize(),
          success: function(data) {
            if (data == 'success') {

              table.ajax.reload();
              // function refreshDiv() {
              //   $('#kt-datatable').load(location.href + " #kt-datatable");
              // }

            } else {
              // $('#kt-datatable').load(location.href + " #kt-datatable");
            }
          }
        });
      });
    });
  </script>
</body>

</html>