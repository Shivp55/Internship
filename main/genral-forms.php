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
            <div class="col-md-5">
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
                      <input type="text" class="form-control" placeholder="Enter first Name" id="fname_form" name="fname_form">
                    </div>
                    <div class="form-group">
                      <label for="lname">Last Name</label>
                      <input type="text" class="form-control" placeholder="Enter Last Name" id="lname_form" name="lname_form">
                    </div>
                    <div class="form-group">
                      <label for="cnt">Contact Number</label>
                      <input type="text" class="form-control" placeholder="Enter Contact" id="cnt_form" name="cnt_form">
                    </div>
                    <div class="form-group">
                      <label for="email">Email address</label>
                      <input type="email" class="form-control" placeholder="Enter email" id="email_form" name="email_form">
                    </div>
                    <div class="form-group">
                      <label for="address">Address</label>
                      <input type="text" class="form-control" placeholder="Enter Your Address" id="address_form" name="address_form">
                    </div>
                    <div class="form-group">
                      <label for="pwd">Password</label>
                      <input type="password" class="form-control" placeholder="Password" id="password_form" name="password_form">
                    </div>
                    <div class="form-group">
                      <label for="pwd">Password</label>
                      <input type="password" class="form-control" placeholder="Confirm Password" id="cfm_password_form" name="cfm_password_form">
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <center>
                      <input type="hidden" name="action" value="add">
                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </center>
                  </div>
                </form>
              </div>


            </div>
            <div class="col-md-7">
              <div class="card card-custom">
                <div class="card-body">
                  <div id="example">
                  
                    <table id="kt-datatable">
                      
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
            title:"First Name",
            data: "fname"
          },
          {
            title:"Last Name",
            data: "lname"
          },
          {
            title:"Contact",
            data: "phone"
          },
          {
            title:"Email",
            data: "email"
          },
          {
            title:"Address",
            data: "address"
          },
          {
            title:"Password",
            data: "password"
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
            title:"edit",
                       "render": function ( data, type, row ) {
                        return "<button data-delete-id='" + row.id + "' class='btn btn-danger btn-delete' data-pk='" + data + "'>Delete</button>";
                    },
                  "targets": -1 // -1 is the last column, 0 the first, 1 the second, etc.
          }



        ],

        scrollY: 500,
        scrollX: true,
      });

      $("form[name='frmadd']").validate({
        rules: {
          fname_form: {
            required:true,
            digits:false,
          },
          lname_form:
            {
              required:true,
            },
          cnt_form: {
            required: true,
            minlength: 10,
            maxlength: 12,
          },
          email_form: "required",
          address_form: "required",
          password_form:
            {
              required:true,
              minlength: 6,
              maxlength: 20,
            },
            cfm_password_form:{
              required:true,
              equalTo:"#password_form",
            }
        },
        messages: {
          fname_form:
            {
              required: 'Enter your first name',
              digits:"This field can contain only letters",
            },
          lname_form:
            {
              required: 'Enter your last name',
              text:"Enter only text",
            },
          cnt_form:{
            required: 'Enter your contact number',
            minlength: 'Enter at least {10} numbers',
            maxlength: 'Enter no more than {12} numbers',
          },
          email_form: "please enter email",
          address_form: "please enter address",
          password_form:{
            required: 'Enter your password',
            minlength: 'Enter at least {6} characters',
            maxlength: 'Enter no more than {12} characters',
          },
          cfm_password_form:{
            required:"Enter Your Confirm Password",
            equalTo:"Enter Same Passwords",
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
              if (data == "success") {
                table.ajax.reload();
                window.location.reload();
                // window.location.reload();
                // this.reset();
              } else {
                alert(data.msg);
              }
              $(this)[0].reset();
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
      });


    });
  </script>
</body>

</html>