<html>
<script>
    function check_sname() {
        var pattern = /^[a-zA-Z]*$/;
        var sname = $("#form_sname").val();
        if (pattern.test(sname) && sname !== "") {
            $("#sname_error_message").hide();
            $("#form_sname").css("border-bottom", "2px solid #34F458");
        }


else {
            $("#sname_error_message").html("It should contain only characters");
            $("#sname_error_message").show();
            $("form_sname").css("border-bottom", "2px solid #F90A0A");
            error_sname = true;
        }
    }



    function check_email() {
        var pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        var email = $("#form_email").val();
        if (pattern.test(email) && email !== "") {
            $("#email_error_message").hide();
            $("form_email").css("border-bottom", "2px solid #34F458");
        } else {
            $("#email_error_message").html("Email should be in proper format and cannot be blank");
            $("#email_error_message").show();
            $("#form_email").css("border-bottom", "2px solid #F90A0A");
            error_email = true;
        }
    }
    </script>

    <form>
        <input type="email" id="form_email" onkeyup="check_email()"><br>
        <div id="email_error_message">h</div><br>
        <input type="text">
        
    </form>
    </html>