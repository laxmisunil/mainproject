<?php
include "connection.php";
session_start();
if($_SESSION["loginStatus"])
{
    if ($_SESSION["loginStatus"]==3)
    {

$userID=$_SESSION["loginID"];
$sel="SELECT * FROM tbl_userdetails WHERE userID='$userID'";
if ($result=$conn->query($sel))
{
    if($result->num_rows>0)
    {
        while($row=$result->fetch_array())
        {
            //echo $row["userID"];
            /*echo $row["userName"];
            echo $row["userEmail"];
            echo $row["userPhone"];*/

            $username=$row["userName"];
            $useremail=$row["userEmail"];
            $userphone=$row["userPhone"];
            $userhousename=$row["userHousename"];
            $userpostoffice=$row["userPostOffice"];
            $userlocality=$row["userLocality"];
            $userdistrict=$row["userDistrict"];
            $usertown=$row["userTown"];
            $userpincode=$row["userPincode"];
        
        }
        $result->free();
    }
    else
    {
        echo "No Records";
    }
}
else
{
    echo "ERROR";
}

?>
<?php
      
      if(isset($_GET["status"]))
      {
        if(($_GET["status"])==1)
        {
          ?>
          <div id="snackbar">Profile updated successfully!</div>
    <script> var x = document.getElementById("snackbar");
  x.className = "show";
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);</script>
     
          <?php
      }
      else if(($_GET["status"])==3)
      {
      ?>
          <script>
              alert("Couldn't update!Email/Phone already taken");
          </script>
     
          <?php
          }
      }

      
    $words = explode(" ", $username);
$firstname = $words[0];

    }

else
{
    header("location:login.php");
}
}
else
{
    header("location:index.php");
}
?>

<html>
    <head>
        <title>Delete my account</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            header
            {
                background-color: white;
                width:100%;
                margin-top: 0px;   
            }
            body
            {
                margin:0;
                font-size: 15px;
                
                font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            }
            .sticky 
            {
                position: fixed;
                top: 0;
                width: 100%;
            }
            .navigation
            {
                display: flex;
                margin-top: 20px;
                margin-left: 2cm;
                margin-right: 1.5cm; 
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
            #s
            {
                border-top:none;
                border-left:none;
                border-right: none;
                border-bottom:1px solid black;
                margin-top:20px;
                margin-left: 30px;
                padding: 4px 32px 4px 25px;
                background-image: url("search-icon.webp");
                background-size: 10%;
                background-repeat: no-repeat;   
            }
            #s:focus
            {
                outline:none;
            }
            #s::placeholder
            {
                padding-left: 0px;
            }
            #a1
            {
                text-decoration: none;
                color: black;
                font-size: 15px;
            }
            #a1:hover
            {
                color:rgb(197, 110, 3);
            }
            .div4
            {
                display: flex;
               
            }
            .d1
            {
                border: 0px solid white;
                border-radius: 5px;
                box-shadow: 8px 8px 12px #888;
                text-align: center;
               
            }
            
            .button1
            {
                width: 100%;
                background-color: black;
                color: #fafafa;
                padding: 14px 12px;
                margin: 0%;
                border: none;
                border-radius: 2px;
                cursor: pointer;
                font-weight: bolder;
                
            }
            .button1:hover
            {
                background-color: #595959;
            }
            #last
            {
                position: relative;
                text-align: center;
                color: white;
            }
           .textonimage
           {
                position: absolute;
                top: 50%;
                left: 70%;
                transform: translate(-50%, -50%);
           }
           .price
           {
                color: #595959;
           }
           .dropbtn
            {
                color: white;
                font-size: 16px;
                border: none;
            }
            .dropdown 
            {
                position: relative;
                display: inline-block;
            }
           .dropdown-content
           {
                display: none;
                position: absolute;
                background-color: #f1f1f1;
                min-width: 160px;
                margin-top: 7px;
                box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                 z-index: 1;
            }
            .dropdown-content a 
            {
                color: black;
                padding: 12px 16px;
                text-decoration: none;
                display: block;
                text-align: left;
            }
            .dropdown-content a:hover 
            {
                background-color: #ddd;
            }
            .dropdown:hover .dropdown-content
            {
                display: block;
            }
            .dropdown:hover .dropbtn
            {
                background-color: #3e8e41;
            }
            #login
            {
                text-decoration:none;
                padding:5px;
                font-weight:bold;
                color:black;
    
            }
            #login:hover
            {
                color:grey;
                text-decoration:none ;
            }
            #vet
            {
                margin-left: 60px;
            }
            #active
            {
                color:chocolate;
                border-bottom: 2px solid chocolate;
            }
            .badge:after{
content:attr(value);
font-size:12px;
background: burlywood;
border-radius:60%;
padding:2px 5px 2px 5px;
position:relative;
left:-8px;
top:-10px;
opacity:1;
}
.badge:hover
{
    cursor: pointer;
}
.separater
            {
                width:90%;
                border:0.5px solid burlywood ;
            }
            body
            {
                background-color: #f2f2f2;
                text-align: center;
                font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            }
            input[type=text],input[type=password],select,input[type="file"],input[type="number"],input[type="email"]
            {
                width: 80%;
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
            }
            input[type=submit]
            {
                width: 80%;
                background-color: #e60000;
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
                background-color: #ff4d4d;
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
            .sidenav {
  height: 100%;
  width: 200px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  padding-top: 20px;
  text-align: left;
}

.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 20px;
  color: #818181;
  display: block;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.main {
  margin-left: 200px; /* Same as the width of the sidenav */
  font-size: 28px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
  #header
{
  
    color:black;
    padding: 6px;
    margin: 0;
    margin-top: 0;
    padding-right: 12px;
    
}
html,body
{
    margin: 0;
    padding: 0;
}
}
#snackbar,#snackbar3{
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
#snackbar2{
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
#snackbar.show,#snackbar2.show,#snackbar3.show {
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
        </style>
        <script type="text/javascript">
    function ValidateDelete() {
        var email = document.getElementById("email").value;
        var lblError = document.getElementById("lblError");
        lblError.innerHTML = "";
        var expr = "DELETE";
        
        if (email!=expr)
        {
            lblError.innerHTML = "Please type DELETE";
            const button = document.querySelector('#submitbutton');
            button.disabled = true;
            button.style.cursor="not-allowed";
          
            
        }
        else if(email==expr)
        {
            lblError.innerHTML = "";
            const button = document.querySelector('#submitbutton');
            button.disabled = false;
            button.style.cursor="pointer";
       
        }
    }
             
    
    
</script>
<?php
if(isset($_GET["status"]))
{
if(($_GET["status"])==2)
      {
        ?>
        
          
        <div id="snackbar">Email ID does not exist!</div>
            <script> var x = document.getElementById("snackbar");
          x.className = "show";
          setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
          var email=document.getElementById("email");
          email.value="Lax";
          
          </script>
          
          <?php 
        }
        else if(($_GET["status"])==3)
        {
          ?>
          
            
          <div id="snackbar2">Email sent!</div>
              <script> var x = document.getElementById("snackbar2");
            x.className = "show";
            setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);</script>
            <?php 
          }
          else if(($_GET["status"])==4)
          {
            ?>
            
              
            <div id="snackbar3">Server Down!Please Try again later</div>
                <script> var x = document.getElementById("snackbar3");
              x.className = "show";
              setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);</script>
              <?php 
            }
            else if(($_GET["status"])==6)
 {
    ?>
  
           <script>
            alert("Link Expired");
           </script>

    <?php
}
    }
    ?>


    </head>
    
    <header class="header" id="myHeader">
       
        
  
    <body style="background-color:white;">
        <center>
        <div>  
            <fieldset style="margin-top: 1cm;margin-left: 11cm;margin-right: 11cm;background-color:white;padding-bottom: 0.2cm;">
                <form action="accountdeleted.php" method="POST" target="_self">
                <center><img src="logofinal.png" width="25%" >
                   
                    <h2 style="margin-left:10px">Delete my Account</h2> <br>
                    <p>Type <b>DELETE</b> in the below field and click <br><font color="red">DELETE  ACCOUNT</font> to delete your account <br>permanently from <b>PAWS' OWN</b>. </p><br>
                    
                    <input type="text" autocomplete="OFF" onkeyup="ValidateDelete();" placeholder="DELETE" name="email" id="email" required><br>
                    <span id="lblError" style="color: red;font-size:small"></span><br><br>
                    
                    <input type="submit" value="DELETE ACCOUNT" name="resetpassword" id="submitbutton"><br><br>
                    <a href="home.php" onclick="return confirm('Cancel account deletion?');">Return to Home Page</a>
                    
                </form>
            </fieldset><br>
        <center>
        <p style="font-size:12.8px">© Copyright 2022  |  All rights reserved | www.pawsown.in</p>
    
        
    </body>

</html>
