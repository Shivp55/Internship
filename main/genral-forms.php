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
              <h1>User Details</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
                <li class="breadcrumb-item active">User Details</li>
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
                  <h3 class="card-title">User Details Form</h3>
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
            <div class="col-md-8">
              <div class="card card-custom">
                <div class="card-body">
                  <div id="example">
                    <table id="kt-datatable" class="table table-striped table-bordered">
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
          url: '../ajax/form_ajax.php',
          method: "POST",
          data: {
            action: 'list',
            // etc..
          },
        },
        columns: [{
          title:"ID",
            data: "id"
          },
          {
            title:"Supplier Name",
            data: "name"
          },
          {
            title:"Opening Balance",
            data: "ob"
          },
          {
            title:"Current Balance",
            data: "cb"
          },
          {
            title:"Created On",
            data: "co"
          },
          {
            title:"Updated On",
            data: "up"
          },
          {
            title:"Edit",
            data:""
          },
          {
            title:"Delete",
            data:""
          }

        ],
        "columnDefs":[
          {
            field:"id",
            title:"edit",
                       "render": function ( data, type, row ) {
                        return "<button data-record-id='" + row.id + "'  value='Edit' class='btn btn-success btn-delete' data-pk='" + data + "'>Edit</button>";
                    },
                  "targets": -2 // -1 is the last column, 0 the first, 1 the second, etc.
          },
          {
            title:"delete",
                       "render": function ( data, type, row ) {
                        return "<button data-delete-id='" + row.id + "' class='btn btn-danger btn-delete' data-pk='" + data + "'>Delete</button>";
                    },
                  "targets": -1 // -1 is the last column, 0 the first, 1 the second, etc.
          }



        ],

        // scrollY: 500,
        // scrollX: true,
      });

      $("form[name='frmadd']").validate({
        rules: {
          name_form: {
            required:true,
            
          },
            
            op_form:{
              required:true,
              
            }
        },
        messages: {
          name_form:
            {
              required: 'Enter your Supplier name',
              
            },
          op_form:
            {
              required: 'Enter Opening Balance',
             
            },
          
        },
        invalidHandler: function(event ,validator) {
          //display error alert on form submit
          alert("Invalid Form Data!!");
        },
        submitHandler: function (form) {
          var url = "../ajax/form_ajax.php";
          $.ajax({
            url: url,
            type: "POST",
            data: $("#frmadd").serialize(),
            success: function(data) {
              window.location.reload();
              table.ajax.reload();
              // }
              
              }
              
            
          });
        }
      });
      table.on("click",'[data-record-id]',function(){
        var id=$(this).data("record-id");
        window.open('./edit_user.php?id='+id,"_self");
      });
      table.on("click",'[data-delete-id]',function(){
        var id=$(this).data("delete-id");
        if(confirm("Are you sure you want to delete record "+id)){
        var url = "../ajax/form_ajax.php?id="+id;
        $.ajax({
          url: url,
          type: "POST",
          data:{
            action:'delete',
          },
          success: function(data) {
            if (data == "success") {
              table.ajax.reload();
              window.location.reload();
              // window.location.reload();
              // this.reset();
            } else {
              alert(data.msg);
            }
            // $(this)[0].reset();
          }
        });
      }
      });
    
    
   



    });
  </script>
</body>

</html>