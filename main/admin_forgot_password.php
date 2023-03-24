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
                    <input type="hidden"  name="action" value="verify">
                    <button type="submit">GET OTP</button>
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
                
            },
            messages: {
                email: {
                    required: 'The email field is required.',
                    email: 'The email must be a valid email address.'
                },
                
            },
            invalidHandler: function(event,validator){
                alert("Please Enter All the required fields");
            },
            submitHandler:function(form){
                var url="../ajax/login_user.php";
                var email=$("#email").val();
                $.ajax({
                    url:url,
                    type:"POST",
                    data:$('#login').serialize(),
                    success:function(data){ 
                        console.log(data);
                        if(data=="true"){
                        window.open('./admin_verify_otp.php?email='+email,"_self");

                        }
                        else{
                            alert("Email Not Found!! Please Register");
                        }
                    }
                });
            }





        });

    });
</script>

</body>

</html> 