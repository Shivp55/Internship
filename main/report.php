<!DOCTYPE html>
<html lang="en">
<?php
include './head.php';
$supplier_object = new Supplier;
$supplier_info = $supplier_object->GET_ALL_SUPPLIERS();
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
                            <h1>Supplier Report Details</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
                                <li class="breadcrumb-item active">Supplier Report Details</li>
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
                                    <h3 class="card-title">Supplier Report Form</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form method="post" name="frmadd" id="frmadd">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="fname">Supplier Name</label>

                                            <select class="form-control select2" style="width: 100%;" name="sname" id="sname">

                                                <?php foreach ($supplier_info as $val) { ?>

                                                    <option value="<?php echo $val->supplier_master_id; ?>"><?php echo $val->supplier_master_name; ?></option>

                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="lname">Supplier Opening Balance</label>
                                            <input type="text" class="form-control" placeholder="Enter Supplier Opening Balance" id="op_form" name="op_form">
                                        </div>
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

                    </div>
                    <div class="row">


                        <div class="card card-custom">
                            <div class="card-body">
                                <div id="example">
                                    <table id="kt-datatable" class="table table-striped table-bordered" style="width: 100%;">
                                        <thead>
                                            <th>Transaction ID</th>
                                            <th>BanK Account</th>
                                            <th>Bank Name</th>
                                            <th>Transaction Amount</th>
                                            <th>Transaction Date</th>
                                            <th>Transaction Type</th>
                                            <th>Invoice Number</th>
                                        </thead>
                                        <tbody>

                                        </tbody>
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
            [4, "desc"]
        ],
            columns: [{
                    title: "Supplier Name",
                    data: "sup_name"
                },
                {
                    title: "Bank Name",
                    data: "bank_name"
                },
                {
                    title: "Bank Account Number",
                    data: "bank_acc"
                },
                {
                    title: "Transaction Amount",
                    data: "trans_amnt"
                },
                {
                    title: "Transaction Date",
                    data: "date"
                },
                {
                    title: "Type",
                    "render": function(data, type, row) {
                        if (row.trans_type == 1) {
                            $type = "Debited"
                        } else {
                            $type = "Credited"
                        }

                        return $type
                    },
                },
                {
                    title: "Invoice",
                    data: "invoice_no"
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

            table.ajax.url('../ajax/report_supplier_ajax.php?id='+id).load();

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