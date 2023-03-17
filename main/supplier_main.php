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
              <h1>Supplier Details</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
                <li class="breadcrumb-item active">Supplier Details</li>
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
                  <h3 class="card-title">Supplier Details Form</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" name="frmadd" id="frmadd">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="fname">Supplier Name</label>
                      <input type="text" class="form-control" placeholder="Enter Supplier Name" id="name_form" name="name_form">
                    </div>
                    <div class="form-group">
                      <label for="lname">Supplier Opening Balance</label>
                      <input type="text" class="form-control" placeholder="Enter Supplier Opening Balance" id="op_form" name="op_form">
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer" style="background-color:white;">
                    <center>
                      <input type="hidden" name="action" value="add">
                      <button type="submit" class="btn btn-primary mr-4" style="margin-bottom:30px;">Submit</button>
                    </center>
                  </div>
                </form>
              </div>
            </div>
            <div class="col-md-9">
              <div class="card card-custom">
                <div class="card-body">
                  <div id="example">
                    <table id="kt-datatable" class="table table-striped table-bordered" width="100%">
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

      $("input[data-bootstrap-switch]").each(function() {
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
      })
      var table = $("#kt-datatable").DataTable({
        "responsive": true,
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,

        ajax: {
          url: '../ajax/form_ajax.php',
          method: "POST",
          data: {
            action: 'list',
          },
        },
        columns: [{
            title: "Supplier Name",
            data: "supplier_master_name"
          },
          {
            title: "Opening Balance",
            data: "supplier_master_opening_balance"
          },
          {
            title: "Current Balance",
            data: "supplier_master_current_balance"
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
          {
            title: "Status",
            "render": function(data, type, row) {
              if (row.record_status == 0) {
                $status = "Inactive";
                return "<button value='Inactive' class='btn btn-danger btn-delete'>Inactive</button>";
              } else {
                return "<button value='Active' class='btn btn-success btn-delete'>Active</button>";
              }
            }
          }
        ],
        "columnDefs": [{
          field: "supplier_master_id",
          title: "Action",
          "render": function(data, type, row) {
            return "<i class='fa-solid fa-pen-to-square' data-record-id='" + row.supplier_master_id + "'> &nbsp;</i> <i class='fa-solid fa-trash' data-delete-id='" + row.supplier_master_id + "'></i>"
          },
          "targets": -2,
        }, ],

      });

      $("form[name='frmadd']").validate({

        rules: {
          name_form: {
            required: true,
          },
          op_form: {
            required: true,
          }
        },
        messages: {
          name_form: {
            required: 'Enter your Supplier name',

          },
          op_form: {
            required: 'Enter Opening Balance',
          },
        },
        invalidHandler: function(event, validator) {
          alert("Invalid Form Data!!");
        },
        submitHandler: function(form) {
          var dataT = $("#frmadd").serialize();
          var url = "../ajax/form_ajax.php";
          $.ajax({
            url: url,
            type: "POST",
            data: dataT,
            success: function(data) {
              // console.log(data);
              if (data == "supplier_exists") {
                // console.log(data);
                if (confirm("Supplier Already Exists; Do you want to add new Supplier?")) {
                  var name_form = $(this).data("name_form");
                  var op_form = $(this).data("op_form");
                  $.ajax({
                    url: '../ajax/new_supplier_ajax.php',
                    type: "POST",
                    data: $("#frmadd").serialize(),
                    success: function(data) {
                      // console.log(data);
                      if (data == "success") {
                        window.location.reload();
                        table.ajax.reload();
                      } else {
                        alert(data);
                      }
                      $("#frmadd")[0].reset();
                    }
                  });
                } else {
                  $.ajax({
                    url: "../ajax/activate_old_supplier_ajax.php",
                    type: 'POST',
                    data: $("#frmadd").serialize(),
                    success: function(data) {
                      if (data == "success") {
                        window.location.reload();
                      } else if (data == "exists") {
                        alert("Supplier Already Active");
                      }
                      $("#frmadd")[0].reset();
                    }
                    
                  });
                }
              }
              if (data == "success") {

                table.ajax.reload();
                // window.location.reload();
              }
              $("#frmadd")[0].reset();
            }
          });
        }
      });

      table.on("click", '[data-record-id]', function() {
        var id = $(this).data("record-id");
        window.open('./edit_supplier.php?id=' + id, "_self");
      });
      table.on("click", '[data-delete-id]', function() {
        var id = $(this).data("delete-id");
        if (confirm("Are you sure you want to delete record " + id)) {
          var url = "../ajax/form_ajax.php?id=" + id;
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