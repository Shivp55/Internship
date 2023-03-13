<!DOCTYPE html>
<html lang="en">
<?php
include './head.php';
$id = $_GET['id'];
$bank_obj = new Bank;
$bank_info=$bank_obj->GET_BANK_BY_ID($id);

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
            <div class="col-md-4">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Bank Details Form</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" name="edit" id="edit">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="fname">Bank Name</label>
                      <input type="hidden" class="form-control" id="bnk_id" name="bnk_id" value="<?php echo $bank_info->bank_master_id; ?>">

                      <input type="text" class="form-control" placeholder="Enter Bank Name" id="bname_form" name="bname_form" value="<?php echo $bank_info->bank_master_name; ?>">
                    </div>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label for="fname">Bank Account Number</label>
                      <input type="text" class="form-control" placeholder="Enter Bank Account Number" id="bacc_form" name="bacc_form" value="<?php echo $bank_info->bank_master_id; ?>">
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer" style="background-color:white;">
                    <center>
                      <input type="hidden" name="action" value="update">
                      <button type="submit" class="btn btn-primary mr-4" style="margin-bottom:30px;">Update</button>
                    </center>
                  </div>
                </form>
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
                $("form[name='edit']").validate({
                    rules: {
                        bname: {
                            required: true,
                        },
                        bacc_form: {
                            required: true,
                        },
                       
                    },
                    messages: {
                        bname: {
                            required: 'Enter your Supplier Name',
                            digits: "This field can contain only letters",
                        },
                        bacc_form: {
                            required: 'Enter your Current Balance',
                            text: "Enter only text",
                        },
                    },
                    invalidHandler: function(event, validator) {
                        //display error alert on form submit
                        alert("Invalid Form Data!!");
                    },
                    submitHandler: function(form) {
                        var url = "../ajax/bank_ajax.php";
                        $.ajax({
                            url: url,
                            type: "POST",
                            data: $("#edit").serialize(),
                            success: function(data) {
                                window.open('./bank.php', "_self");
                            }
                        });
                    }
                });
            });

            
    </script>
</body>
</html>