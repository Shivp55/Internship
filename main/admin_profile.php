<!DOCTYPE html>
<html lang="en">
<?php
include './head.php';
$id = $_SESSION['login_id'];

$sql = "SELECT * FROM admin WHERE id=$id";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $fname=$row['name'];
        $email=$row['email'];
        $password=$row['password'];
        $uname=$row['username'];
    }
}

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


                                                <input type="hidden" class="form-control" id="admin_id" name="admin_id" value="<?php echo $id; ?>">

                                                <!-- text input -->
                                                <div class="form-group">
                                                    <label>Admin Name</label>
                                                    <input type="text" class="form-control" placeholder="Enter Admin Name" id="fname" name="fname" value="<?php echo $fname; ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Admin User Name</label>
                                                    <input type="text" class="form-control" placeholder="Enter User Name" id="uname" name="uname" value="<?php echo $uname; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <!-- textarea -->
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="email" class="form-control"  placeholder="Enter New Email Address" id="email" name="email"value="<?php echo $email; ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Password </label>
                                                    <input type="text" class="form-control" placeholder="Enter password" id="pwd" name="pwd" value="<?php echo $password; ?>">

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
                        uname: {
                            required: true,
                        },
                        password: {
                            required: true,
                            minlength: 10,
                            maxlength: 12,
                        },
                        email: "required",
                        pwd: {
                            required: true,
                            minlength: 6,
                            maxlength: 20,
                        },
                    },
                    messages: {
                        fname: {
                            required: 'Enter your  name',
                            digits: "This field can contain only letters",
                        },
                        uname: {
                            required: 'Enter your User name',
                            text: "Enter only text",
                        },
                        email: "please enter email",
                        password: {
                            required: 'Enter your password',
                            minlength: 'Enter at least {6} characters',
                            maxlength: 'Enter no more than {12} characters',
                        },
                        
                    },
                    invalidHandler: function(event, validator) {
                        //display error alert on form submit
                        alert("Invalid Form Data!!");
                    },
                    submitHandler: function(form) {
                        var url = "../ajax/admin_edit.php";
                        $.ajax({

                            url: url,
                            type: "POST",
                            data: $("#edit").serialize(),
                            success: function(data) {
                                // console.log(data);
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