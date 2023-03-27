<!DOCTYPE html>
<html lang="en">
<?php
include './head.php';
include('./style_table.php');
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
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Supplier</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
                                <li class="breadcrumb-item active">Supplier</li>
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
                                    <h3 class="card-title"> Edit Supplier</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form method="post" name="edit" id="edit">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="fname">Name</label>
                                            <input type="hidden" class="form-control" id="supplier_id" name="supplier_id" value="<?php echo $supplier_info->supplier_master_id; ?>">
                                            <input type="text" class="form-control" placeholder="Enter Supplier Name" id="sname" name="sname" value="<?php echo $supplier_info->supplier_master_name; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="record_status" id="record_status">
                                                <option selected><?php if ($supplier_info->record_status == 1) {
                                                                        echo "active";
                                                                    } else {
                                                                        echo "Inactive";
                                                                    }


                                                                    ?></option>
                                                <?php if ($supplier_info->record_status == 1) { ?>
                                                    <option value="0">Inactive</option>
                                                <?php }
                                                if ($supplier_info->record_status == 0) { ?>
                                                    <option value="1">Active</option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer" style="background-color:white;">
                                        <center>
                                            <input type="hidden" name="action" value="update">
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
                                            <thead>
                                                <th>Supplier Name</th>
                                                <th>Opening Balance</th>
                                                <th>Current Balance</th>

                                                <th>Created On</th>
                                                <th>Updated On</th>
                                                <th>Action</th>
                                                <th>Status</th>
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
            </section> <!-- /.card -->
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
                var table = $("#kt-datatable").DataTable({
                    "responsive": true,
                    "paging": true,
                    "lengthChange": true,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": true,
                    "hover": true,

                    ajax: {
                        url: '../ajax/form_ajax.php',
                        method: "POST",
                        data: {
                            action: 'list',
                        },
                    },
                    columns: [{
                            title: "Supplier",
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
                            title: "Status",
                            "render": function(data, type, row) {
                                if (row.record_status == 0) {
                                    $status = "Inactive";
                                    return "<button value='Inactive' class='btn btn-danger btn-delete'>Inactive</button>";
                                } else {
                                    return "<button value='Active' class='btn btn-success btn-delete'>Active</button>";
                                }
                            }
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
                            return "<i class='fa-solid fa-pen-to-square' data-record-id='" + row.supplier_master_id + "'> &nbsp;</i> <i class='fa-solid fa-trash' data-delete-id='" + row.supplier_master_id + "'></i>"
                        },
                        "targets": -1,
                    }, ],

                });

                $("form[name='edit']").validate({
                    rules: {
                        sname: {
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