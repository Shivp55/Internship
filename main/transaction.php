<!DOCTYPE html>
<html lang="en">
<?php
include './head.php';
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
                            <h1>Transaction Details</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
                                <li class="breadcrumb-item active">Transaction Details</li>
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


                        <div class="card card-custom">
                            <div class="card-body">
                                <div id="example">
                                    <table id="kt-datatable" class="table table-striped table-bordered" width="100%">
                                        <thead>
                                            <th>Transaction Number</th>
                                            <th>Supplier Name</th>
                                            <th>Bank Name</th>
                                            <th>Bank Account Number</th>
                                            <th>Transaction Amount</th>
                                            <th>Transaction Date</th>
                                            <th>Type</th>
                                            <th>Invoice Number</th>
                                            <th>Action</th>

                                        </thead>



                                    <tfoot>
                                    <tr class="table-row">
                                        <th>Total Amount</th>
                                        <td></td>
                                    </tr>
                                    </tfoot>
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
                "background": true,
                "autoWidth": true,
                "order": [5, "desc"],
                ajax: {
                    url: '../ajax/transactions_ajax.php',
                    method: "POST",
                    data: {
                        action: 'list',
                    },
                },
                columns: [
                    {
                        title: "Transaction Number",
                        data: "t_id",
                    },
                    {
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
                    // {
                    //     "render": function(data, type, row) {
                    //         $(row).addClass("table-row");
                    //     },
                    // },
                    {
                        title: "Type",
                        "render": function(data, type, row) {
                            if (row.trans_type == 1) {
                                $type = "Debited"
                            } else {
                                $type = "Credited"
                            }

                            return $type;
                        },
                    },
                    {
                        title: "Invoice",
                        data: "invoice_no"
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
                        return "</i> <i class='fa-solid fa-trash' data-delete-id='" + row.t_id + "'></i>"
                    },
                    "targets": -1,
                }, ],
            });

            // $("form[name='frmadd']").validate({
            //     rules: {
            //         name_form: {
            //             required: true,
            //         },
            //         op_form: {
            //             required: true,
            //         }
            //     },
            //     messages: {
            //         name_form: {
            //             required: 'Enter your Supplier name',

            //         },
            //         op_form: {
            //             required: 'Enter Opening Balance',
            //         },
            //     },
            //     invalidHandler: function(event, validator) {
            //         alert("Invalid Form Data!!");
            //     },
            //     submitHandler: function(form) {
            //         var url = "../ajax/form_ajax.php";
            //         $.ajax({
            //             url: url,
            //             type: "POST",
            //             data: $("#frmadd").serialize(),
            //             success: function(data) {
            //                 window.location.reload();
            //                 table.ajax.reload();
            //             }
            //         });
            //     }
            // });
            // table.on("click", '[data-record-id]', function() {
            //     var id = $(this).data("record-id");
            //     window.open('./edit_transaction.php?id=' + id, "_self");
            // });
            table.on("click", '[data-delete-id]', function() {
                var id = $(this).data("delete-id");
                if (confirm("Are you sure you want to delete record " + id)) {
                    var url = "../ajax/transactions_ajax.php?id=" + id;
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