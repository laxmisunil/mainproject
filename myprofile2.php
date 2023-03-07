<?php
include "connection.php";
session_start();
$userID=$_SESSION["loginID"];
$username=$_SESSION["userName"];
$useremail=$_SESSION["userEmail"];
$userphone=$_SESSION["userPhone"];
echo $username;

if(isset($_POST["updatedata"]))
{
$userID=$_SESSION["loginID"];

$custname=$_POST["custoname"];
$custn=urldecode($custname);

$custn2=$_POST["custoname"];
$cust2=urldecode($cust2);

//$_SESSION["cus"]=$custname;
//echo $a;
$custemail=$_POST["custoemail"];
//$_SESSION["ce"]=$custemail;
//echo $b;
$custphone=$_POST["custophone"];
//$_SESSION["cp"]=$custphone;
//echo $c;


echo date('H:i:s Y-m-d');
$updata="UPDATE tbl_userdetails SET userName='$custname',userEmail='$custemail', userPhone='$custphone' WHERE userID='$userID'";

try
{
    if($conn->query($updata)===true);
    echo "Profile Updated";
}
catch(Exception)
{
    echo "ERROR";
}         
        } 

?>


<html>
    <head>
        <title>My Profile</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            body
            {
                font-size: 15px;
                font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            }
            .navigation
            {
                display: flex;
                margin-top: 20px;
                margin-left: 8.5cm;
                margin-right: 8cm;  
            }
            .item
            {
                padding: 2px 30px 2px 30px;
                text-decoration: none;
                color: black;
            }
            .item:hover
            {
                color: rgb(197, 110, 3);
            }
            #div2
            {
                background-color:rgb(248, 238, 223);
                padding: 2px 10px 2px 10px;
                margin-top: 15px;
                font-weight: lighter;
                font-size: 30px;
            }
            hr
            {
                height:1px;
                border-width:0;
                color:rgb(74, 71, 71);
                background-color:rgb(99, 96, 96);
                margin:0px 30px 0px 30px;
            }
            input[type=text]
            {
                width: 50%;
                padding: 12px 20px;
                margin: 8px 0px;
                display: inline-block;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
            }
            textarea
            {
                width: 50%;
                padding: 12px 20px;
                margin: 8px 0px;
                display: inline-block;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
                font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
                font-size: 15px;
            }

            input[type=submit]
            {
                width: 10%;
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
            h6
            {
                margin-bottom: 8px;
            }
            .para 
            {
                font-size: 18px;
            }
            .center
            {
                margin-left: auto;
                margin-right: auto;
            }
          

        </style>
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

$("#phone").keyup(function(){

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
      <script>
        function reloadfun()
        {
            window.reload();
        }


</script>
      
    </head>
    
    <header>
        <center><img src="logofinal.png" width="8%" >
        <hr> 
    </header>
    <body>
        <center>
        <div class="navigation">
            <a href="homepage.php" class="item">Home</a>
            <a href="#" class="item">Dogs</a>
            <a href="#" class="item">Cats</a>
            <a href="consultation.html" class="item">Consultation</a>
            <a href="about.html" class="item">About</a>
            <a href="#" class="item">Contact</a>
        </div>

        <div id="div2">
            <form style="text-align:center" action="#" method="POST">
                <h6 >Personal Information</h6>
                <table style="width:70%" class=center> 
                <tr><td>Name</td><td>:</td><td><input type="text" id="uname" value="<?php echo $username ?>" name="custoname" size="30cm" required></td></tr>
                <tr><td>Email ID</td><td>:</td><td><input type="text" id="email" size="30cm" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" value="<?php echo $useremail ?>"  name="custoemail" size="30cm"  required></td></tr>
                <tr><td><div id="uname_response" style="font-size:small;text-align:left"></div></td><tr>
                <tr><td>Mobile</td><td>:</td><td><input type="text" id="phone" pattern="[6-9]{1}[0-9]{9}" size="30cm" minlength="10" maxlength="10" value="<?php echo $userphone ?>" name="custophone" size="30cm"  required></td></tr>
                <tr><td><div id="uname_response2" style="font-size:small;text-align:left"></div><td><tr>
                </table>
               
            
                <input type="submit" value="Save" name=updatedata 
                onclick="<?php
                $page=$_SERVER['PHP_SELF'];
                $sec="10";
                header("Refresh: $sec; url=$page");

                ?>">
            </form>
        </div>  
        <p style="font-size:12.8px;">© Copyright 2022  |  All rights reserved | www.pawsown.in</p>
        </center>
    </body>
</html>

<?php
                $page=$_SERVER['PHP_SELF'];
                $sec="10";
                header("Refresh: $sec; url=$page");

                ?>