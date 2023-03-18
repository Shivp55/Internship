<!DOCTYPE html>
<html lang="en">
<?php
include './head.php';
include('./style_table.php');
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
              <h1>Bank Details</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
                <li class="breadcrumb-item active">Bank Details</li>
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
            <div class="col-md-3">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Bank Details Form</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" name="frmadd" id="frmadd">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="fname">Bank Name</label>
                      <input type="text" class="form-control" placeholder="Enter Bank Name" id="bname_form" name="bname_form">
                    </div>


                    <div class="form-group">
                      <label for="fname">Account Number</label>
                      <input type="text" class="form-control" placeholder="Enter Bank Account Number" id="bacc_form" name="bacc_form">

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer" style="background-color:white;">
                      <center>
                        <input type="hidden" name="action" value="add">
                        <button type="submit" class="btn btn-primary mr-4" style="margin-bottom:30px;">Submit</button>
                      </center>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="col-md-9">
              <div class="card card-custom">
                <div class="card-body">
                  <div id="example">
                    <table id="kt-datatable" class="table table-striped table-bordered">
                      <thead>
                        <th>Account Number</th>
                        <th>Bank Name</th>
                        <th>Created On</th>
                        <th>Updated On</th>
                        <th>Action</th>
                      </thead>

                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card -->
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
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
  <?php include 'js.php'; ?>
  <!-- script_start -->
  <script type="text/javascript">
    $(document).ready(function(e) {

      var table = $("#kt-datatable").DataTable({
        "responsive": true,
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        ajax: {
          url: '../ajax/bank_ajax.php',
          method: "POST",
          data: {
            action: 'list',
          },
        },
        columns: [{
            title: "Account Number",
            data: "bank_master_id",
          },
          {
            title: "Bank Name",
            data: "bank_master_name",
          },

          {
            title: "Created On",
            data: "created_on"
          },
          {
            title: "Updated On",
            data: "updated_on"
          },
          {
            title: "Action",
            data: ""
          },
        ],
        "columnDefs": [{
          field: "supplier_master_id",
          title: "Action",
          "render": function(data, type, row) {
            return "<i class='fa-solid fa-pen-to-square' data-record-id='" + row.bank_master_id + "'> &nbsp;</i> <i class='fa-solid fa-trash' data-delete-id='" + row.bank_master_id + "'></i>"
          },
          "targets": -1,
        }, ],
        rowCallback: function(row, data) {
          $(row).addClass('table-row');

        }
      });

      $("form[name='frmadd']").validate({
        rules: {
          bname_form: {
            required: true,
          },
          bacc_form: {
            required: true,
          }
        },
        messages: {
          bname_form: {
            required: 'Enter your Bank name',

          },
          bacc_form: {
            required: 'Enter Account Number',
          },
        },
        invalidHandler: function(event, validator) {
          alert("Invalid Form Data!!");
        },
        submitHandler: function(form) {
          var url = "../ajax/bank_ajax.php";
          $.ajax({
            url: url,
            type: "POST",
            data: $("#frmadd").serialize(),
            success: function(data) {
              window.location.reload();

              table.ajax.reload();
            }

          });
        }

      });
      table.on("click", '[data-record-id]', function() {
        var id = $(this).data("record-id");
        window.open('./edit_bank.php?id=' + id, "_self");
      });
      table.on("click", '[data-delete-id]', function() {
        var id = $(this).data("delete-id");
        if (confirm("Are you sure you want to delete record " + id)) {
          var url = "../ajax/bank_ajax.php?id=" + id;
          $.ajax({
            url: url,
            type: "POST",
            data: {
              action: 'delete',
            },
            success: function(data) {
              table.ajax.reload();
            }
          });
        }
      });
    });
  </script>
</body>

</html>