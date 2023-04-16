<?php
include "connection.php";

session_start();


?>
 <?php
      
 if(isset($_GET["status"]))
 {
  if(($_GET["status"])==1)
  {
     ?>
     <div id="snackbar3">Access Denied! Invalid Email ID/ Password</div>
            <script> var x = document.getElementById("snackbar3");
          x.className = "show";
          setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);</script>

     <?php
 }
 else if(($_GET["status"])==2)
  {
     ?>
     <div id="snackbar4">Please Login with the new password</div>
            <script> var x = document.getElementById("snackbar4");
          x.className = "show";
          setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);</script>

     <?php
 }
 else if(($_GET["status"])==5)
  {
     ?>
     <div id="snackbar5">Password changed.Please Login with new password</div>
            <script> var x = document.getElementById("snackbar5");
          x.className = "show";
          setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);</script>

     <?php
 }
 else if(($_GET["status"])==3)
  {
     ?>
     <div id="snackbar3">Email ID/ Phone no. already taken</div>
            <script> var x = document.getElementById("snackbar3");
          x.className = "show";
          setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);</script>

     <?php
 }
 
}

 ?>
<html>

    <head>
        <title>Login</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
        <style>
            body
            {
                background-color:rgb(248, 238, 223);
                background-repeat: no-repeat;
                background-image: url('dogcat4.png');opacity: 10;
                text-align: center;
                font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            }
            input[type=text],input[type=password],select
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
            .drop1
            {
                padding: 12px 20px;
                margin: 8px 0px; 
            } 
            fieldset
            {
                border: 2px solid white;
                box-shadow: 8px 8px 12px #888;
            } 
            option
            {
                padding:5px 0px;
            } 
            form i 
            {
                margin-left: -31px; 
                margin-right: 9.5px;
                cursor: pointer;
            }
            #snackbar,#snackbar4,#snackbar5 {
  visibility: hidden;
  min-width: 250px;
  margin-left: -143px;
  background-color:#198754;
  color: white;
  text-align: center;
  border-radius: 3px;
  padding: 16px;
  position: fixed;
  z-index: 1;
  left: 50%;
  bottom: 30px;
  font-size: 15px;
}
#snackbar2,#snackbar3 {
  visibility: hidden;
  min-width: 250px;
  margin-left: -143px;
  background-color:red;
  color: white;
  text-align: center;
  border-radius: 3px;
  padding: 16px;
  position: fixed;
  z-index: 1;
  left: 50%;
  bottom: 30px;
  font-size: 15px;
}

#snackbar.show {
  visibility: visible;
  -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
  animation: fadein 0.5s, fadeout 0.5s 2.5s;
}

#snackbar2.show {
  visibility: visible;
  -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
  animation: fadein 0.5s, fadeout 0.5s 2.5s;
}
#snackbar3.show {
  visibility: visible;
  -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
  animation: fadein 0.5s, fadeout 0.5s 2.5s;
}
#snackbar4.show {
  visibility: visible;
  -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
  animation: fadein 0.5s, fadeout 0.5s 2.5s;
}
#snackbar5.show {
  visibility: visible;
  -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
  animation: fadein 0.5s, fadeout 0.5s 2.5s;
}
@-webkit-keyframes fadein {
  from {bottom: 0; opacity: 0;} 
  to {bottom: 30px; opacity: 1;}
}

@keyframes fadein {
  from {bottom: 0; opacity: 0;}
  to {bottom: 30px; opacity: 1;}
}

@-webkit-keyframes fadeout {
  from {bottom: 30px; opacity: 1;} 
  to {bottom: 0; opacity: 0;}
}

@keyframes fadeout {
  from {bottom: 30px; opacity: 1;}
  to {bottom: 0; opacity: 0;}
}  
            #text {display:none;color:red}
        </style>
     
     <script src=
        "https://www.google.com/recaptcha/api.js" async defer>
    </script>
    <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>  
    </head>
    <body>
    
        <div>  
            <fieldset style="margin-top: 2cm;margin-left: 11cm;margin-right: 11cm;background-color:white;padding-bottom: 0.2cm;">
                <form action="test1.php" method="POST" target="_self">
                    <img src="logofinal.png" style="width:30%;text-align: center;"><br> 
                    <h2>Login to Paws' Own</h2> 
                    <!--<select name="loginas" id="logas" required>
                        <option value="" disabled selected hidden>Login as </option>
                        <option name="admin" value="admin" class="drop1" id="a">Admin</option>
                        <option name="customer" value="customer" class="drop1" id="c">Customer</option>
                        <option name="vet" value="vet" class="drop1" id="v">Veterinarian</option>  
                    </select>  -->
                    <input type="text" placeholder="E-mail ID" size="30cm" name="email" id="em" required><br>
                    <span id="error"></span>
                    <input type="password" id="password" placeholder="Password" size="30cm" name="password" style="margin-left:1px" required>
                    <i class="bi bi-eye-slash" id="togglePassword"></i><br>
                    <a style="margin-left:7.5cm;font-size:14px" href="forgotpassword.php">Forgot Password?</a><br>
                    <span id="text" style="font-size: 14px;color:red;">Caps lock is ON.</span><br>
                    <div class="g-recaptcha" data-sitekey="6LcNqtUjAAAAAHZG-QPaQzMUgy6yXwP-rPf3xngc" id="recaptcha"> </div>
                    <span class="error_form" id="captcha_message"></span>
                   <!-- <p style="text-align:left;margin-top:0;margin-bottom: 1px;margin-left:3px;font-size:14px"><a href="" style="text-align:left">Forgot password?</a></p>-->
                    <br><input type="submit" value="LOGIN" name="logdata" id="submit">
                    <p style="font-size: 13px;">Don't have an account?<a href="register.php"> Sign Up</a></p>
                    
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

    // prevent form submit
    /*const form = document.querySelector("form");
    form.addEventListener('submit', function (e) {
        e.preventDefault();
    });*/
</script>
<script type="text/javascript">
 
  $(document).on('click','#submit',function()
  {  
    $("#captcha_message").hide();
    var response = grecaptcha.getResponse();
    if(response.length == 0)
    {
    $("#captcha_message").html("Please verify that you are not a robot");
 $("#captcha_message").css("color","red");
$("#captcha_message").show();
 return false;
 }
 else{
  $("#captcha_message").css("color","white");
 $("#captcha_message").hide();
 return true;
 }
  });
 
 
</script>
<script>
var input = document.getElementById("password");
var text = document.getElementById("text");
input.addEventListener("keyup", function(event) {

if (event.getModifierState("CapsLock"))
{
    text.style.display = "block";
  } else {
    text.style.display = "none"
  }
});
</script>
            <p style="font-size:12.8px;">© Copyright 2022  |  All rights reserved | www.pawsown.in</p>
        </center>
    </body>
</html>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                