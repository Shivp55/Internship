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
                    <h2>OTP</h2>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="text" id="opt" name="otp" required>
                        <label for="">OTP</label>
                    </div>
                    <div class="inputbox">
                        <ion-icon name="mail-outline"></ion-icon>
                        <input type="text" id="ver_otp" name="ver_otp" required>
                        <label for="">VERIFY OTP</label>
                    </div>
                    <input type="hidden"  name="action" value="verify-otp">
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
                otp: {
                    required: true,
                    email: true
                },
                ver_otp: {
                    required: true,
                    email: true
                },
                
            },
            messages: {
                otp: {
                    required: 'The otp field is required.',          
                },
                ver_otp: {
                    required: 'Please verify otp',
                },
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
                        console.log(data);
                        if(data=="true"){
                        window.open('./login.php',"_self");

                        }
                        else{
                            alert("Plase Try again");
                        }
                    }
                });
            }





        });

    });
</script>

</body>

</html> 