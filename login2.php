<?php
include "connection.php";

session_start();
if(isset($_POST["submitdata"]))
{
$custname=$_POST["cusname"];
$_SESSION["cus"]=$custname;
//echo $a;
$custemail=$_POST["cusemail"];
//$_SESSION["ce"]=$custemail;
//echo $b;
$custphone=$_POST["cusphone"];
//$_SESSION["cp"]=$custphone;
//echo $c;
$custpassword=$_POST["cuspassword"];
//$_SESSION["cpa"]=$custpassword;


$data="INSERT INTO tbl_userdetails VALUES (NULL,'$custname','$custemail','$custphone','Customer','$custpassword',1)";
try
{
    if($conn->query($data)===true);
    echo "ACCOUNT CREATED SUCCESSFULLY!";
}
catch(Exception)
{
    echo "ERROR";
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
                background-image: url('dogcat4.png');opacity: 10;
                background-repeat: no-repeat;
                background-size: cover;
               
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
        </style>
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
                    <input type="text" placeholder="E-mail ID" size="30cm" name="email" id="em" ><br>
                    <span id="error"></span>
                    <input type="password" id="password" placeholder="Password" size="30cm" name="password" required>
                    <i class="bi bi-eye-slash" id="togglePassword"></i><br>
                    <input type="submit" value="LOGIN" name="logdata">
                    <p style="font-size: 13px;">Don't have an account?<a href="index.php"> Sign Up</a></p>
                    
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
    const form = document.querySelector("form");
    form.addEventListener('submit', function (e) {
        e.preventDefault();
    });
</script>
            <p style="font-size:12.8px;">© Copyright 2022  |  All rights reserved | www.pawsown.in</p>
        </center>
    </body>
</html>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                