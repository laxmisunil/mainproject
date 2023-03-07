<?php
include "connection.php";

$email=$_GET["email"];
$reset_token=$_GET["reset_token"];

if(isset($email)&&isset($reset_token))
{
    date_default_timezone_set('Asia/Kolkata');
    $date=date("Y-m-d");
    $query="SELECT * FROM tbl_userdetails WHERE userEmail='$email' AND resettoken='$reset_token' AND resettokenexpire='$date'";
    $result=mysqli_query($conn,$query);
    if($result)
{
    if(mysqli_num_rows($result)==1)
    {
        ?>
        <html>
    <head>
        <title>Reset Password</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="jquery-3.2.1.min.js"></script>
        <script src="script.js"></script>
        <script>
            $(document).ready(function(){

$("#email").focusout(function(){

   var username = $(this).val().trim();

   if(username != ''){

      $.ajax({
         url: 'usercheck2.php',
         type: 'post',
         data: {username: username},
         success: function(response){

             $('#uname_response').html(response);

          }
      });
   }else{
      $("#uname_response").html("");
   }

 });

});
           
</script>
<script>
            $(document).ready(function(){

$("#phone").focusout(function(){

   var username = $(this).val().trim();

   if(username != ''){

      $.ajax({
         url: 'usercheck3.php',
         type: 'post',
         data: {username: username},
         success: function(response){

             $('#uname_response2').html(response);

          }
      });
   }else{
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
        <?php
        if(isset($_GET["status"]))
{
if(($_GET["status"])==1)
      {
        ?>
        
          
        <div id="snackbar">Password changed successfully!</div>
            <script> var x = document.getElementById("snackbar");
          x.className = "show";
          setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);</script>
          <?php 
        }
    }?>
  
    </head>
    <body>
        <div>  <br><br>
            <fieldset style="margin-left: 10cm;margin-right: 10cm;background-color:white;padding-bottom: 0.2cm;">
                <br><form action="newpasswordcreated.php?email=<?php echo $email?>&reset_token=<?php echo $reset_token?>" method="POST" id="form">
                    <img src="logofinal.png" style="width:25%;text-align: center;"><br> 
                    <h2>Create new Password</h2> 
                        
                    
                   
                    
                    <input type="password" id="password" name="cuspassword" placeholder="Password (minimum 6 characters)" minlength="6" maxlength="15" size="30cm" title="Maxmimum 15 characters" required>
                    <i class="bi bi-eye-slash" id="togglePassword"></i>
                    <br><br>
                    <input type="password" id="cpassword" placeholder="Confirm New Password" size="30cm" required>
                    <div class="registrationFormAlert" style="color:green;text-align:left;font-size:small" id="CheckPasswordMatch"></div><br>
                    <br>
                    <input type="submit" value="Save" name="submitdata" id="submitbutton">
                   
                </form>
            </fieldset>
        </div>
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

    
  
</script>
            <p style="font-size:12.8px;">© Copyright 2022  |  All rights reserved | www.pawsown.in</p>
        </center>
    </body>
</html>





<?php

    }
    else
    {
        echo"
        <script>
        ".
        header("location:forgotpassword.php?status=6")."

        
        </script>";

    }
    
    
}
else
{
    echo"
    <script>
    alert('Server down!');
    </script>";
}
}

?>

