<!DOCTYPE html>
<html lang="en">
<?php
include './head.php';
$id = $_GET['id'];
$supplier_data = new Supplier;
$supplier_info = $supplier_data->GET_SUPPLIER_BY_ID($id);
?>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <?php
        include './top-nav.php';
        include './sidenav.php';
        ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <!-- Main content -->
            <section>
                <div class="container-fluid">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-7" class="content" style="margin:100px 200px; ">
                            <!-- general form elements disabled -->
                            <div class="card card-warning">
                                <div class="card-header">
                                    <h3 class="card-title">Edit Supplier Details</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form name="edit" id="edit">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <input type="hidden" class="form-control" id="supplier_id" name="supplier_id" value="<?php echo $supplier_info->supplier_master_id; ?>">

                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label>Supplier Name</label>
                                                    <input type="text" class="form-control" placeholder="Enter Supplier Name" id="sname" name="sname" value="<?php echo $supplier_info->supplier_master_name; ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Supplier Current Balance</label>
                                                    <input type="text" class="form-control" placeholder="Enter Supplier Current Balance " id="cb" name="cb" value="<?php echo $supplier_info->supplier_master_current_balance; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Select Supplier Status</label>
                                                    <select class="form-control" name="record_status" id="record_status">
                                                        <option selected><?php echo $supplier_info->record_status; ?></option>
                                                        <?php if($supplier_info->record_status==1){?>
                                                            <option>0</option>
                                                        <?php }
                                                          if($supplier_info->record_status==0) {?>
                                                            <option>1</option>
                                                        <?php } ?>
                                                    </select>
                                                    <div class="card-body">
                                                        
                                                        <input type="checkbox" name="my-checkbox" checked data-bootstrap-switch 
                                                        <?php if(($supplier_info->record_status)==1){?>
                                                        data-off-color="danger"<?php }else {?> data-on-color="success"<?php } ?>>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                        </div>
                                        <div class="card-footer" style="background-color:white;">
                                            <center>
                                                <input type="hidden" name="action" value="update">
                                                <button type="submit" class="btn btn-success mr-2">Update</button>
                                            </center>
                                        </div>
                                    </form>
                                    <!-- /.card-body -->
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
            <!-- /.card -->
        </div>
        <?php
        include './footer.php';
        include './js.php';
        ?>
        <script type="text/javascript">
            $(function() {
                bsCustomFileInput.init();
            });

            $("input[data-bootstrap-switch]").each(function() {
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            })
        </script>
        <script type="text/javascript">
            $(document).ready(function(e) {
                $("form[name='edit']").validate({
                    rules: {
                        sname: {
                            required: true,
                        },
                        cb: {
                            required: true,
                        },
                        record_status: {
                            required: true,
                        },
                    },
                    messages: {
                        sname: {
                            required: 'Enter your Supplier Name',
                            digits: "This field can contain only letters",
                        },
                        cb: {
                            required: 'Enter your Current Balance',
                            text: "Enter only text",
                        },
                        record_status: {
                            required: 'Enter status',
                        },
                    },
                    invalidHandler: function(event, validator) {
                        //display error alert on form submit
                        alert("Invalid Form Data!!");
                    },
                    submitHandler: function(form) {
                        var url = "../ajax/form_ajax.php";
                        $.ajax({
                            url: url,
                            type: "POST",
                            data: $("#edit").serialize(),
                            success: function(data) {
                                window.open('./supplier_main.php', "_self");
                            }
                        });
                    }
                });
            });
        </script>
</body>

</html>