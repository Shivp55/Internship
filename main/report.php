<!DOCTYPE html>
<html lang="en">
<?php
include './head.php';

$supplier_object = new Supplier;
$supplier_info = $supplier_object->GET_ALL_SUPPLIERS();
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
                            <h1>Supplier</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
                                <li class="breadcrumb-item active">Supplier Report</li>
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
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Supplier Report</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form method="post" name="frmadd" id="frmadd">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="fname">Name</label>

                                            <select class="form-control select2" style="width: 100%;" name="sname" id="sname">

                                                <?php foreach ($supplier_info as $val) { ?>

                                                    <option value="<?php echo $val->supplier_master_id; ?>"><?php echo $val->supplier_master_name; ?></option>

                                                <?php } ?>
                                            </select>
                                        </div>
                                        <!-- <div class="form-group">
                                            <label for="lname">Supplier Opening Balance</label>
                                            <input type="text" class="form-control" placeholder="Enter Supplier Opening Balance" id="op_form" name="op_form">
                                        </div> -->
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer" style="background-color:white;">
                                        <center>
                                            <input type="hidden" name="action" value="list">
                                            <button type="button" id="supplier_btn" class="btn btn-primary mr-4" style="margin-bottom:30px;">Get Supplier Details</button>
                                        </center>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-4"></div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-custom">
                                <div class="card-body">
                                    <div id="example">
                                        <table id="kt-datatable" class="table table-striped table-bordered" width="100%">
                                            <thead>
                                                <th>Date</th>
                                                <th> Invoice No.</th>
                                                <th>Bank</th>
                                                <th>Debit</th>
                                                <th>Credit</th>
                                                <th>Balance </th>

                                            </thead>

                                        </table>
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
        var table = $("#kt-datatable").DataTable({
            "responsive": true,
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "order": [
                [0, "desc"]
            ],
            columns: [{
                    title: "Date",
                    "render":function(data,type,row){
                        var dt=row.created_on;
                        return dt

                    },
                    // data: "created_on",
                },
                {
                    title: "Invoice No.",
                    data: "invoice_no"
                },
                {
                    title: "Bank",
                    data: "bank_name"
                },
                {
                    title: "Debit",
                    "render": function(data, type, row) {
                        if (row.trans_type == 1) {
                            return row.trans_amnt;
                        } else {
                            return null;
                        }
                    },
                },
                {
                    title: "Credit",
                    "render": function(data, type, row) {
                        if (row.trans_type == 2) {
                            return row.trans_amnt;
                        } else {
                            return null;
                        }
                    },
                },
                {
                    title: "Balance",
                    data:"balance",
                },
                // {
                //     title:"Balance",
                //     "render": function(data,type,row){
                //         return
                //     }

                // },
            ],
        });


        $(document).ready(function(e) {
            $("#supplier_btn").click(function() {
                var id = $("#sname").val();
                console.log(id);

                // console.log(data);

                table.ajax.url('../ajax/report_supplier_ajax.php?id=' + id).load();
                $("#frmadd")[0].reset();

            });

            // });
            // $("form[name='frmadd']").validate({
            //     rules: {
            //         sname: {
            //             required: true,
            //         },
            //     },
            //     messages: {
            //         sname: {
            //             required: 'Enter your Supplier name',

            //         },
            //     },
            //     invalidHandler: function(event, validator) {
            //         alert("Invalid Form Data!!");
            //     },
            //     submitHandler: function(form) {
            //         var url = "../ajax/report_ajax.php";

            //     }
            // });



            // // table.on("click", '[data-record-id]', function() {
            // //     var id = $(this).data("record-id");
            // //     window.open('./edit_supplier.php?id=' + id, "_self");
            // // });
            // // table.on("click", '[data-delete-id]', function() {
            // //     var id = $(this).data("delete-id");
            // //     if (confirm("Are you sure you want to delete record " + id)) {
            // //         var url = "../ajax/form_ajax.php?id=" + id;
            // //         $.ajax({
            // //             url: url,
            // //             type: "POST",
            // //             data: {
            // //                 action: 'delete',
            // //             },
            // //             success: function(data) {
            // //                 table.ajax.reload();
            // //             }
            // //         });
            //     }
            // });
        });
    </script>
</body>

</html>