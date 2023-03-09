<!DOCTYPE html>
<html lang="en">
<?php
include './head.php';
$id = $_GET['id'];
$supplier_data=new Supplier;
$supplier_data->GET_SUPPLIER_BY_ID($id);


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
                                    <h3 class="card-title">Edit User Details</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form name="edit" id="edit">
                                        <div class="row">
                                            <div class="col-sm-6">


                                                <input type="hidden" class="form-control" id="user_id" name="user_id" value="<?php echo $id; ?>">

                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label>First Name</label>
                                                    <input type="text" class="form-control" placeholder="Enter First Name" id="fname" name="fname" value="<?php echo $fname; ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Last Name</label>
                                                    <input type="text" class="form-control" placeholder="Enter Last Name" id="lname" name="lname" value="<?php echo $lname; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <!-- textarea -->
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <textarea class="form-control" rows="5" placeholder="Enter New Address" id="address" name="address"><?php echo $address; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Password </label>
                                                    <input type="text" class="form-control" placeholder="Enter password" id="pwd" name="pwd" value="<?php echo $pwd; ?>">

                                                </div>

                                                <div class="form-group">
                                                    <label>Confirm Password</label>
                                                    <input type="text" class="form-control" placeholder="Enter Confirm password" id="cfm_pwd" name="cfm_pwd" value="<?php echo $pwd; ?>">
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <!-- textarea -->
                                                <div class="form-group">
                                                    <label class="col-form-label" for="inputSuccess"> Email Address</label>
                                                    <input type="email" class="form-control" placeholder="Enter Email Address" id="email" name="email" value="<?php echo $email; ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-6" style="margin-top: 6px;;">

                                                <div class="form-group">
                                                    <label>Contact Number</label>
                                                    <input type="text" class="form-control" placeholder="Enter Contact Number" id="cnt" name="cnt" value="<?php echo $cnt; ?>">
                                                </div>

                                            </div>
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
        </script>
        <script type="text/javascript">
            $(document).ready(function(e) {
                $("form[name='edit']").validate({
                    rules: {
                        fname: {
                            required: true,
                            digits: false,
                        },
                        lname: {
                            required: true,
                        },
                        cnt: {
                            required: true,
                            minlength: 10,
                            maxlength: 12,
                        },
                        email: "required",
                        address: "required",
                        pwd: {
                            required: true,
                            minlength: 6,
                            maxlength: 20,
                        },
                        cfm_pwd: {
                            required: true,
                            equalTo: "#pwd",
                        }
                    },
                    messages: {
                        fname: {
                            required: 'Enter your first name',
                            digits: "This field can contain only letters",
                        },
                        lname: {
                            required: 'Enter your last name',
                            text: "Enter only text",
                        },
                        cnt: {
                            required: 'Enter your contact number',
                            minlength: 'Enter at least {10} numbers',
                            maxlength: 'Enter no more than {12} numbers',
                        },
                        email: "please enter email",
                        address: "please enter address",
                        pwd: {
                            required: 'Enter your password',
                            minlength: 'Enter at least {6} characters',
                            maxlength: 'Enter no more than {12} characters',
                        },
                        cfm_pwd: {
                            required: "Enter Your Confirm Password",
                            equalTo: "Enter Same Passwords",
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
                                if (data == "success") {
                                    window.open('./genral-forms.php', "_self");
                                } else {
                                    alert(data.msg);
                                }
                                $(this)[0].reset();
                            }
                        });
                    }
                });
            });
        </script>
</body>

</html>