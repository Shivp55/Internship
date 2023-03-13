<!DOCTYPE html>
<?php
include './head.php';

include('./includes/config.php');
$supplier_object = new Supplier;
$supplier_info = $supplier_object->GET_ALL_SUPPLIERS();


?>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php include './top-nav.php';
        include './sidenav.php';
        ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Check Payments</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Payments</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- SELECT2 EXAMPLE -->
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">Select Supplier For Information</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                        <form name="getsup" id="getsup" method="post">
                            <div class="row">
                                
                                    <div class="col-md-3">
                                        <div class="form-group">

                                            <label>Choose Supplier</label>
                                            <select class="form-control select2" style="width: 100%;" name="sname" id="sname">

                                                <?php foreach ($supplier_info as $val) { ?>

                                                    <option name="sname1"><?php echo $val->supplier_master_name; ?></option>

                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Date range:</label>

                                            <div class="input-group">
                                                <button type="button" class="btn btn-default float-right" name='daterange-btn'id="daterange-btn">
                                                    <i class="far fa-calendar-alt"></i> Choose Dates
                                                    <i class="fas fa-caret-down"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group" style="padding-top: 11%;">
                                            <input type="hidden" class="form-control" name="action" value="get_supplier">
                                            <button type="submit" class="btn btn-primary mr-2">Get Data</button>
                                        </div>
                                    </div>
                            </div>
                            </form>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="card card-custom">
                                    <div class="card-body">
                                        <div id="example">
                                            <table id="kt-datatable" class="table table-striped table-bordered">
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    </section>
    </div>
    <?php include('./footer.php') ?>
    </div>
    <?php include('./js.php') ?>

    <script>
        $(function() {
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        });
        $('#daterange-btn').daterangepicker({
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate: moment()
            },
            function(start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
            }
        )
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            console.log(('#sname').val());
            $("form[name='getsup']").validate({
                submitHandler: function(form){
                    $.ajax({
                        url:'../ajax/form_ajax.php',
                        data:$('#getsup').serialize(),
                        type: 'POST',
                        success: function(data){
                            console.log(data);
                        }
                    })




                }



            });
        });
    </script>


</body>

</html>