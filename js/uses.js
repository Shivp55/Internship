var validate=function validate() {
    var i;
    var fname_str = document.frmadd.fname_form;
    var lname_str = document.frmadd.lname_form;
    var email_str = document.frmadd.email_form;
    var phone_str = document.frmadd.cnt_form;
    var pwd_str = document.frmadd.password_form;
    var address_str = document.frmadd.address_form;
    var FirstCharStr1 = /^[A-Za-z]/;
    var FirstCharStr2 = /^_[A-Za-z]/;
    var FirstCharStr3 = /^[0-9]/;



    if ((fname_str.value == null) || (fname_str.value == "")) {
        alert("Enter First Name")
        fname_str.focus();
        return false;

    }
    if ((lname_str.value == null) || (lname_str.value == "")) {
        alert("Enter Last Name")
        lname_str.focus();
        return false;
    }
    if ((email_str.value == null) || (email_str.value == "")) {
        alert("Enter Email")
        email_str.focus();
        return false;
    }
    if ((phone_str.value == null) || (phone_str.value == "")) {
        alert("Enter Phone Number")
        phone_str.focus();
        return false;
    }
    if ((pwd_str.value == null) || (pwd_str.value == "")) {
        alert("Enter Password")
        pwd_str.focus();
        return false;
    }
    if ((address_str.value == null) || (address_str.value == "")) {
        alert("Enter Address")
        address_str.focus();
        return false;
    }
    if ((cnt_form.length < 1) || (cnt_form.length > 11)) {
        alert("Enter Valid Phone Number")
        phone_str.focus();
        return false;

    }
    for (i = 0; i < cnt_form.length; i++) {
        var ch = cnt_form.charAt(i);
        if ((ch < "0") || (ch > "9")) {
            alert("Enter Valid Phone Number")
            phone_str.focus();
            return false;
        }

    }
    var index_at = str.indexOf("@");
    var len = str.length();
    var index_dot = str.indexOf(".");
    if (email_str.value == null || email_str.value == "") {
        alert("Please enter a valid email address");
        email_str.focus();
        return false;
    }
    if (index_at == -1 || index_dot == -1 || index_at > index_dot) {
        alert("Please enter a valid email address");
        email_str.focus();
        return false;
    }
    if (password_str.length < 6 || password_str.length > 12) {
        alert("Please enter a valid password between 6 and 12 characters");
    }
    if (FirstCharStr1.test(fname_str)) {
        alert("Please enter a valid First Name");
        fname_str.focus();
        return false;
    }
    if (FirstCharStr1.test(lname_str)) {
        alert("Please enter a valid Last Name");
        lname_str.focus();
        return false;
    }
    if (FirstCharStr3.test(phone_str)) {
        alert("Please enter a valid Phone Number");
        phone_str.focus();
        return false;
    }
    
    return true;

}
if(validate==true){
    $(document).ready(function() {
        
        $('#frmadd').submit(function(e) {
          e.preventDefault();
          var url = '../ajax/form_ajax.php';
          $.ajax({
            url: url,
            type: 'post',
            dataType: 'html',
            data: $('#frmadd').serialize(),
            success: function(data) {
              if (data == 'success') {
                table.ajax.reload();
              } else {
                alert(data);
              }
            }
          });
        });
      });



}