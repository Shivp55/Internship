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
                            <h1>Transaction</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
                                <li class="breadcrumb-item active">Transaction </li>
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
                                    <h3 class="card-title">Transaction Form</h3>
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
                                            <input type="text" class="form-control" placeholder="Enter Supplier Opening Balance" id="op_form" name="op_form" value="">
                                        </div>
                                        <div class="form-group">
                                            <label for="fname">Bank Name</label>

                                            <select class="form-control select2" style="width: 100%;" name="bname" id="bname">

                                                <?php foreach ($bank_info as $val) { ?>

                                                    <option value="<?php echo $val->bank_master_name; ?>"><?php echo $val->bank_master_name; ?></option>

                                                <?php } ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="fname">Bank Account Number</label>

                                            <select class="form-control select2" style="width: 100%;" name="accnt" id="accnt">

                                                <?php foreach ($bank_info as $val) { ?>

                                                    <option value="<?php echo $val->bank_master_id; ?>"><?php echo $val->bank_master_id; ?></option>

                                                <?php } ?>
                                            </select>
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
                    name_form: {
                        required: true,
                    },
                    op_form: {
                        required: true,
                    },
                    bname: {
                        required: true,
                    },
                    acc: {
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
                    acc: {
                        required: 'Enter Balance',
                        text: "Enter only text",
                    },
                },
                invalidHandler: function(event, validator) {
                    //display error alert on form submit
                    alert("Invalid Form Data!!");
                },
                submitHandler: function(form) {
                    var url = "../ajax/transactions_ajax.php";
                    $.ajax({
                        url: url,
                        type: "POST",
                        data: $("#edit").serialize(),
                        success: function(data) {
                            window.open('./index.php', "_self");
                            // console.log(data);
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>