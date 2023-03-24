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
                                    <div id="example">
                                        <table id="kt-datatable" class="table table-striped table-bordered" width="100%">
                                            <thead>
                                                <th>Date</th>
                                                <th> Invoice No.</th>
                                                <th>Bank</th>
                                                <th>Debit</th>
                                                <th>Credit</th>
                                                <th>Balance </th>
                                                <!-- <th>Date ID </th> -->


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
        $('#reservation').daterangepicker()
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
                var url="../ajax/report_supplier_ajax.php";
                $.ajax({
                    url:url,
                    type: "POST",
                    data:{
                        "id":id,
                        "date":date,
                    }
                }).done(function(data){
                    table.clear().draw();
                    table.rows.add(data).draw();
                });
            });
        });
    </script>
</body>

</html>