<!DOCTYPE html>
<html lang="en">
<?php
include './head.php';
$supplier_object = new Supplier;
$supplier_info = $supplier_object->GET_ALL_SUPPLIERS();

$bank_obj = new Bank;
$bank_info = $bank_obj->GET_ALL_BANK();

// $id = $_GET['id'];
// $bank_obj = new Bank;
// $bank_info=$bank_obj->GET_BANK_BY_ID($id);
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
                            <h1>Payment</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
                                <li class="breadcrumb-item active">Payment </li>
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
                                    <h3 class="card-title">Add Payment</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form method="post" name="edit" id="edit">
                                    <div class="card-body">
                                    <div class="form-group">
                                            <label for="fname">Supplier Name</label>

                                            <select class="form-control select2" style="width: 100%;" name="sname" id="sname">

                                                <?php foreach ($supplier_info as $val) { ?>

                                                    <option value="<?php echo $val->supplier_master_name; ?>"><?php echo $val->supplier_master_name; ?></option>

                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="lname">Supplier Payment Amount</label>
                                            <input type="text" class="form-control" placeholder="Enter Supplier Payment Amount" id="op_form" name="op_form" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="fname">Bank Name</label>

                                            <select class="form-control select2" style="width: 100%;" name="bname" id="bname">

                                                <?php foreach ($bank_info as $val) { ?>

                                                    <option value="<?php echo $val->bank_master_id; ?>"><?php echo $val->bank_master_name; ?></option>

                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="date">Select Date</label>
                                            <input type="date" class="form-control" placeholder="Date" id="date_form" name="date_form" value="">
                                        </div>

                                        

                                        <!-- /.card-body -->
                                        <div class="card-footer" style="background-color:white;">
                                            <center>
                                                <input type="hidden" name="action" value="add">
                                                <button type="submit" class="btn btn-primary mr-4" style="margin-bottom:30px;">Add Payment Detail</button>
                                            </center>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card card-custom">
                                <div class="card-body">
                                    <div id="example">
                                        <table id="kt-datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <th>Supplier Name</th>
                                            <th>Bank Name</th>
                                            <th>Date</th>
                                            <th>Pay Amount</th>
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
        "order":[2,"desc"],
        ajax: {
          url: '../ajax/payments_ajax.php',
          method: "POST",
          data: {
            action: 'list',
          },
        },
        columns: [
          {
            title: "Name",
            data: "supplier"
          },
          {
            title: "Bank Account",
            data: "bank_name"
          },
          
          {
            title: "Date",
            data: "date"
          },
          {
            title: "Pay Amount",
            data: "amount"
          },
          {
            title: "Action",
            data: ""
          },
        ],
        "columnDefs": [{
          field: "id",
          title: "Action",
          "render": function(data, type, row) {
            return " <i class='fa-solid fa-trash' data-delete-id='" + row.id + "'></i>"
          },
          "targets": -1,
        }, ],
      });
            $("form[name='edit']").validate({
                rules: {
                    name_form: {
                        required: true,
                    },
                    op_form: {
                        required: true,
                    },
                    bname: {
                        required: true,
                    },
                    date_form: {
                        required: true,
                    },

                },
                messages: {
                    name_form: {
                        required: 'Enter your Supplier name',

                    },
                    op_form: {
                        required: 'Enter Opening Balance',
                    },
                    bname: {
                        required: 'Enter your Supplier Name',
                        digits: "This field can contain only letters",
                    },
                    date_form: {
                        required: 'Enter Date',
                    },
                },
                invalidHandler: function(event, validator) {
                    //display error alert on form submit
                    alert("Invalid Form Data!!");
                },
                submitHandler: function(form) {
                    var url = "../ajax/payments_ajax.php";
                    $.ajax({
                        url: url,
                        type: "POST",
                        data: $("#edit").serialize(),
                        success: function(data) {
                            if(data=="success"){
                                table.ajax.reload();
                            }
                            else{
                                alert(data);
                            }
                            $("#edit")[0].reset();
                            // window.open('./index.php', "_self");
                            // console.log(data);
                        }
                    });
                }
            });
            table.on("click", '[data-delete-id]', function() {
                var id = $(this).data("delete-id");
                console.log(id);
                if (confirm("Are you sure you want to delete record " + id)) {
                    var url = "../ajax/payments_ajax.php?id="+ id;
                    $.ajax({
                        url: url,
                        type: "POST",
                        data: {
                            action: 'delete',
                        },
                        success: function(data) {
                            table.ajax.reload();
                            // console.log(data);
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>