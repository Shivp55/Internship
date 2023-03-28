<!DOCTYPE html>
<html lang="en">
<?php
include './head.php';

$supplier_object = new Supplier;
$supplier_info = $supplier_object->GET_ALL_SUPPLIERS();
include('./style_table.php');


?>

<style type="text/css">
    @media print {
        table {
            border: 1px solid black;
        }

        table.dataTable tbody tr {
            background-color: lightcyan;
        }

        th {
            font-family: 'Poppins', sans-serif;
            font-weight: 400;
            font-size: 15px;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: white;
        }

        td {
            font-size: 13px;
            font-weight: 300;
        }

        table.dataTable tr td {
            border: 1px solid black;
        }

    }

    @media screen {
        table {
            border: 1px solid black;
        }

        table.dataTable tbody tr {
            background-color: lightcyan;
        }

        th {
            font-family: 'Poppins', sans-serif;
            font-weight: 400;
            font-size: 15px;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: white;
        }

        td {
            font-size: 13px;
            font-weight: 300;
        }

        table.dataTable tr td {
            border: 1px solid black;
        }

    }
</style>


<!-- <style media="print">
  .noPrint{ display: none; }
  .kt-datatable.table.table-striped.table-bordered.dataTable.no-footer{ display: block !important; }
</style> -->


<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php
        include './top-nav.php';
        include './sidenav.php';
        ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header noPrint">
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
                    <div class="row noPrint">
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
                                <form method="post" name="frmadd" id="frmadd" class="noPrint">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="fname">Name</label>

                                            <select class="form-control select2" style="width: 100%;" name="sname" id="sname">

                                                <?php foreach ($supplier_info as $val) { ?>

                                                    <option value="<?php echo $val->supplier_master_id; ?>"><?php echo $val->supplier_master_name; ?></option>

                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Date range:</label>

                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-calendar-alt"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control float-right" id="reservation">
                                            </div>
                                            <!-- /.input group -->
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
                                    <div class="example noPrint">
                                        <table id="kt-datatable" class="table table-striped table-bordered" width="100%">
                                            <thead>
                                                <th id="date_css">Date</th>
                                                <th>Invoice No.</th>
                                                <th>Bank</th>
                                                <th>Debit</th>
                                                <th>Credit</th>
                                                <th>Balance </th>
                                                <!-- <th>Date ID </th> -->
                                            </thead>

                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer" style="background-color:white;">
                                    <center>
                                        <input type="hidden" name="action" value="print">
                                        <button type="button" id="print_btn" class="btn btn-primary mr-4" style="margin-bottom:30px;">Print Details</button>
                                    </center>
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
        <div class="noPrint">
            <?php
            include 'footer.php';
            ?>
        </div>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <?php include 'js.php'; ?>
    <!-- script_start -->
    <script type="text/javascript">
        $('#reservation').daterangepicker();
    </script>
    <script type="text/javascript">
        $(document).ready(function(e) {
            var table = $("#kt-datatable").DataTable({
                "responsive": true,
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": false,
                "info": true,
                "autoWidth": true,
                // "data":[],
                "columns": [{
                        data: "date",
                    },
                    {
                        data: "invoice",
                    },
                    {
                        data: "bank",
                    },
                    {
                        data: "debit",
                    },
                    {
                        data: "credit",
                    },
                    {
                        data: "balance",
                    },
                ],
            });
            $("#supplier_btn").click(function() {
                var id = $("#sname").val();
                var date = $("#reservation").val();
                var url = "../ajax/report_supplier_ajax.php";
                $.ajax({
                    url: url,
                    type: "POST",
                    data: {
                        "id": id,
                        "date": date,
                    }
                }).done(function(data) {
                    table.clear().draw();
                    table.rows.add(data).draw();
                });
            });
        });

        function printData() {
            var divToPrint = document.getElementById("kt-datatable");
            mywindow = window.open("");
            mywindow.document.write('<html><head><title></title>');
            mywindow.document.write('<link rel="stylesheet" href="../assets/dist/css/print.css" type="text/css" />');
            mywindow.document.write('</head><body >');
            // mywindow.document.write("<link rel=\"stylesheet\" href=\"../assets/dist/css/print.css\" type=\"text/css\" media=\"print\"/>");
            mywindow.document.write(divToPrint.outerHTML);
            mywindow.document.write('</body></html>');

            mywindow.document.close();
            mywindow.focus();
            setTimeout(function() {
                mywindow.print();
            }, 1000);
            mywindow.document.close();
            return true;
        }
        $("#print_btn").on("click", function() {
            printData();
        });
    </script>
</body>

</html>