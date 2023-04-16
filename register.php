<html>
    <head>
        <title>Registration</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="jquery-3.2.1.min.js"></script>
        <script src="script.js"></script>
        <script>
            $(document).ready(function(){

$("#email").keyup(function(){

   var username = $(this).val().trim();

   if(username != ''){

      $.ajax({
         url: 'usercheck2.php',
         type: 'post',
         data: {username: username},
         success: function(response2){

             $('#uname_response').html(response2);

          }
      });
      if(response2="<div style='color: red;text-align:left'>&nbsp;Email already taken.</div>")
      {
       
            const button = document.querySelector('#submitbutton');
            button.disabled = true;
            button.style.cursor="not-allowed";
    
        }
        else if(response2="<div style='color: green;text-align:left'></div>")
        {
         
            const button = document.querySelector('#submitbutton');
            button.disabled = false;
            button.style.cursor="pointer";

      }
   }
   else{
      $("#uname_response").html("");
   }

 });

});
           
</script>
<script>
            $(document).ready(function(){

$("#phone").keyup(function(){

   var username = $(this).val().trim();

   if(username != ''){

      $.ajax({
         url: 'usercheck3.php',
         type: 'post',
         data: {username: username},
         success: function(response3){

             $('#uname_response2').html(response3);

          }
      });
      if(response3="<div style='color: red;text-align:left'>&nbsp;Phone number already taken.</div>")
      {
       
            const button = document.querySelector('#submitbutton');
            button.disabled = true;
            button.style.cursor="not-allowed";
    
        }
        else if(response3="<div style='color: green;text-align:left'></div>")
        {
         
            const button = document.querySelector('#submitbutton');
            button.disabled = false;
            button.style.cursor="pointer";

      }
   }
   else{
      $("#uname_response2").html("");
   }

 });

});
           
</script>
        <style>
            body
            {
                background-color:rgb(248, 238, 223);
                background-image: url('dogcat4.png');opacity: 10;
                background-repeat: no-repeat;
                text-align: center;
                font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            }
            input[type=text],input[type=password],input[type=tel],input[type=email]
            {
                width: 100%;
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
            }
            input[type=submit]
            {
                width: 100%;
                background-color: black;
                color: #fafafa;
                padding: 14px 20px;
                margin: 8px 0;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-weight: bolder;
                
            }
            input[type=submit]:hover
            {
                background-color: #595959;
            }
           
            a
            {
                color:blue;
                text-decoration: none;
            } 
            #cac
            {
                color: #595959;
                font-weight: bolder;
                font-size: larger;
                text-align: left;
            }
            fieldset
            {
                border: 2px solid white;
                box-shadow: 8px 8px 12px #888; 
            }
            form i
            {
                margin-left: -31px; 
                margin-right: 9.5px;
                cursor: pointer;
            } 
            
               
        </style>
        <script>
        function checkPasswordMatch()
        {
            var password = $("#password").val();
            var confirmPassword = $("#cpassword").val();
            if (password != confirmPassword)
            {
                $("#CheckPasswordMatch").html("&nbsp;Passwords do not match!").css({"color":"red"});
                const button = document.querySelector('#submitbutton');
                button.disabled = true;
                button.style.cursor="not-allowed";

            }

            else
            {
                $("#CheckPasswordMatch").html("&nbsp;Passwords match.").css({"color":"green"});
                const button = document.querySelector('#submitbutton');
                button.disabled = false;
                button.style.cursor="pointer";
            }
        }
        $(document).ready(function () {
        $("#cpassword").keyup(checkPasswordMatch);
        }
        );
       
        </script>
        <script type="text/javascript">
    function ValidateEmail() {
        var email = document.getElementById("email").value;
        var lblError = document.getElementById("lblError");
        lblError.innerHTML = "";
        var res1=document.getElementById("uname_response");
        var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        
        if (!expr.test(email))
        {
            lblError.innerHTML = "Invalid email address.";
            const button = document.querySelector('#submitbutton');
            button.disabled = true;
            button.style.cursor="not-allowed";
          
            
        }
        else if(expr.test(email))
        {
            lblError.innerHTML = "";
            const button = document.querySelector('#submitbutton');
            button.disabled = false;
            button.style.cursor="pointer";
       
        }
    }
             
    
    
</script>

<script type="text/javascript">
    function ValidateName() {
        
        var fullname = document.getElementById("name").value;
        var lblError2 = document.getElementById("lblError2");
        lblError2.innerHTML = "";
        var expr = /^[a-zA-Z ]*$/;
        if (!expr.test(fullname))
        {
            lblError2.innerHTML = "Invalid Name Format";
            const button = document.querySelector('#submitbutton');
            button.disabled = true;
            button.style.cursor="not-allowed";
          
            
        }
        else if(expr.test(fullname))
        {
            lblError2.innerHTML = "";
            const button = document.querySelector('#submitbutton');
            button.disabled = false;
            button.style.cursor="pointer";
       
        }
       
 
    }
</script>


<script type="text/javascript">
    function ValidatePhone() {
        var phone = document.getElementById("phone").value;
        var lblError3 = document.getElementById("lblError3");
        lblError3.innerHTML = "";
        var expr = /^[6-9]{1}[0-9]{9}/;
        var expr2=/^(?!.*(\w)\1\1\1).*$/;

        if ((!expr.test(phone))|(!expr2.test(phone)))
        {
            lblError3.innerHTML = "Invalid Phone number";
            const button = document.querySelector('#submitbutton');
            button.disabled = true;
            button.style.cursor="not-allowed";
          
            
        }
        else if((expr.test(phone))|(!expr2.test(phone)))
        {
            lblError3.innerHTML = "";
            const button = document.querySelector('#submitbutton');
            button.disabled = false;
            button.style.cursor="pointer";
       
        }
    }
</script>

    </head>
    <body>
        <div>  
            <fieldset style="margin-left: 10cm;margin-right: 10cm;background-color:white;padding-bottom: 0.2cm;">
                <form action="registertologin.php" method="POST" id="form">
                    <img src="logofinal.png" style="width:25%;text-align: center;"><br> 
                    <h2>Create an Account</h2> 
                    <p style="font-size: 13px;">Already have an account?<a href="login.php"> Login here</a></p>    
                    
                    <input type="text" name="cusname" style="text-transform: capitalize;" onkeyup="ValidateName();" id="name" placeholder="Enter your full name" title="Name should contain only alphabets and spaces" size="30cm" required><br>
                    <div style="display:flex">
                    <span id="lblError2" style="color: red;font-size:small"></span>
                    <div id="uname_response3" style="font-size:small;text-align:left"></div>
                    </div>
                    

                    <input type="email" onkeyup="ValidateEmail();" name="cusemail" id="email" placeholder="E-mail ID" size="30cm"  required><br>
                    <div style="display:flex">
                    <span id="lblError" style="color: red;font-size:small"></span>
                    <div id="uname_response" style="font-size:small;text-align:left"></div>
                    </div>
                   
                    <input type="tel" name="cusphone" id="phone" onkeyup="ValidatePhone();" placeholder="Enter your Mobile No."  size="30cm" minlength="10" maxlength="10" required><br> 
                    <div style="display:flex">
                    <span id="lblError3" style="color: red;font-size:small"></span>
                    <div id="uname_response2" style="font-size:small;text-align:left"></div>
                    </div>
                    
                    <input type="password" id="password" name="cuspassword" placeholder="Password (minimum 6 characters)" minlength="6" maxlength="15" size="30cm" title="Maxmimum 15 characters" required>
                    <i class="bi bi-eye-slash" id="togglePassword"></i>
                    
                    <input type="password" id="cpassword" placeholder="Confirm Password" size="30cm" required>
                    <div class="registrationFormAlert" style="color:green;text-align:left;font-size:small" id="CheckPasswordMatch"></div><br>
                    
                    <input type="submit" value="SIGN UP" name="submitdata" id="submitbutton">
                    <p style="font-size: 13px;text-align:center">By signing up, you agree to the 
                        <a href="">Terms of Service</a> and <a href="">Privacy Policy</a>, 
                        including<br> Cookie Use.
                    </p>
                </form>
            </fieldset>
            <script>
    const togglePassword = document.querySelector("#togglePassword");
    const password = document.querySelector("#password");

    togglePassword.addEventListener("click", function () {
        // toggle the type attribute
        const type = password.getAttribute("type") === "password" ? "text" : "password";
        password.setAttribute("type", type);
        
        // toggle the icon
        this.classList.toggle("bi-eye");
    });

    /*// prevent form submit
    const form = document.querySelector("form");
    form.addEventListener('submit', function (e) {
        e.preventDefault();
    });*/
</script>
            <p style="font-size:12.8px;">© Copyright 2022  |  All rights reserved | www.pawsown.in</p>
        </center>
    </body>
</html>