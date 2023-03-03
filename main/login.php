<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../assets/dist/css/index.css">
    <title>SHERP: Accounting </title>
</head>

<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <form method="post" name="login" id="login">
                    <h2>Login</h2>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="email" id="email" name="email" required>
                        <label for="">Email</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="lock-closed-outline"></ion-icon>
                        <input type="password" name="password" id="password" required>
                        <label for="">Password</label>
                    </div>
                    <div class="forget">
                        <label for=""><input type="checkbox">Remember Me <a href="#">Forget Password</a></label>
                    </div>
                    <input type="hidden"  name="action" value="login">
                    <button type="submit">Login</button>
                    <div class="register">
                        <p>Don't have a account <a href="#">Register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(e) {
        $("form[name='login']").validate({
            rules: {
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    minlength: 6
                }
            },
            messages: {
                email: {
                    required: 'The email field is required.',
                    email: 'The email must be a valid email address.'
                },
                password: {
                    required: 'The password field is required.',
                    minlength: 'The password must be at least 6 characters.'
                }
            },
            invalidHandler: function(event,validator){
                alert("Please Enter All the required fields");
            },
            submitHandler:function(form){
                var url="../ajax/login_user.php";
                $.ajax({
                    url:url,
                    type:"POST",
                    data:$('#login').serialize(),
                    success:function(data){
                       if(data=="success"){
                        window.open('./genral-forms.php',"_self");
                    }
                    else{
                        alert(data);

                    }
                        //    
                        // }
                    }
                });
            }





        });

    });
</script>

</body>

</html>