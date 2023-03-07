
<?php
include "connection.php";

session_start();
if($_SESSION["loginStatus"])
{
if ($_SESSION["loginStatus"]==2)
{
$userID=$_SESSION["loginID"];
$username="SELECT * FROM tbl_userdetails WHERE userRole='Veterinarian' AND userStatus=1";
if ($result=$conn->query($username))
{
    if($result->num_rows>0)
    {
        while($row=$result->fetch_array())
        {
            //echo $row["userID"];
            /*echo $row["userName"];
            echo $row["userEmail"];
            echo $row["userPhone"];*/
            $vetid=$row["userID"];
            $vetname=$row["userName"];
            $vetemail=$row["userEmail"];
            $vetphone=$row["userPhone"];
            $vethousename=$row["userHousename"];
            $vetpostoffice=$row["userPostOffice"];
            $vetlocality=$row["userLocality"];
            $vetdistrict=$row["userDistrict"];
            $vettown=$row["userTown"];
            $vetpincode=$row["userPincode"];
         
        }
        $result->free();
    }
    else
    {
        echo " ";
    }
}
else
{
    echo "ERROR";
}

$useremail=$_SESSION["userEmail"];
$userPhone=$_SESSION["userPhone"];




if(isset($_POST["logdata"]))
{
    $emaill=$_SESSION["email"];
    $password=$_SESSION["password"];
    $data="INSERT INTO tbl_login VALUES('$emaill','$password')";
    if($conn->query($data)===true)
    {
            
    }
    else
    {
            
     }
}
}
else
{
    header("location:login.php");
}
}
else
{
    header("location:login.php");
}
?>


<html>
    <head>
        <title>Home</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
            .navigation
            {
                display: flex;
                margin-top: 20px;
                margin-left: 5.8cm;
                margin-right: 6.2cm;  
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
            .div2
            {
                background-color:rgb(248, 238, 223);
                padding: 2px 9px 2px 9px;
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
            .link
            {
                text-decoration: none;
                color: black;
            }
            .link:hover
            {
                color:blue;
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
            h5
            {
                margin-bottom: 3px;
            }
            #active
            {
                border-bottom: 2px solid chocolate;
            }
            .sticky 
            {
                position: fixed;
                top: 0;
                width: 100%;
            }
            .dropbtn {

  
  padding: px;
  font-size: 16px;
  border: none;
  
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}
      body
            {
                
                text-align: center;
                font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            }
            input[type=text],input[type=password],select,input[type="file"],input[type="number"],input[type="tel"],input[type="email"]
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
h2
{
    margin-left: 200px;
    margin-top: 10px;
    margin-bottom: 10px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
#procategory:hover,#prosubcategory:hover,#proname:hover,#prosubname:hover
{
    cursor: not-allowed;
}
#inactivevet
{
    color:white;
    font-size:20px;
    padding:5px;
    background-color: red;
}


            
        </style>
    </head>
    
    <header class="header" id="myHeader">
        <center><img src="logofinal.png" width="8%" >
        <hr> 
   
    <body>
        <center>
            <div style="display:flex">
                <form>
                    <input id="s" type="search" placeholder="Search...">       
                </form>
        <div class="navigation">
            <a href="" class="item" id="active">Home</a>
            <a href="appointments.php" class="item">Appointments</a>
            <a href="petschedule.php" class="item">Pet Schedule</a>
            <!--<a href="about.php" class="item">About</a>
            <a href="contact.php" class="item">Contact</a>-->
        </div>
        <div id="div3" style="display:flex">

        <div class="dropdown">
        <button class="dropbtn" style="background-color:transparent"><img src="veticon.webp" width="26px" height="28px" style="margin-top:15px;margin-left:0"></button>&nbsp;
        <div class="dropdown-content">
    <a href="#">My Profile</a>
    <a href="adminlogout.php">Logout</a>
    
  </div>
</div>
        <p style="margin-top:22px;"><?php echo $vetname; ?></p>
        </div>
        </div>
        </header>
        <div id="div2" style="background-image: url('dogcat4.png')">
        <fieldset style="width:50%;text-align:center;margin-left:8cm;margin-right:8cm;border:2px solid transparent">
        <h4>Personal Information</h4>
        <hr style="height:0.5px"><br>
    
    
        <?php if ($_SESSION["loginStatus"]==3)
                {
                ?>
                     <form action="profileupdation.php" method="POST">
                <?php
                }
                else
                {
                ?>
                  <form action="login.php" method="POST">
                <?php
                }
                ?>
              
            
              
                <input type="text" id="uname" value="<?php echo  $username ?>" name="custoname" pattern="^[a-zA-Z ]*$" size="50cm" onkeyup="ValidateName();" title="Must contain only alphabets and spaces" required><br>
                <div><span id="lblError2" style="color: red;font-size:small"></span></div>

                <input type="text" id="email" size="40cm" pattern="^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$" onkeyup="ValidateEmail();" value="<?php echo $useremail ?>"  name="custoemail" size="30cm"  required><br>
                <div style="display:flex;">
                    <span id="lblError" style="color: red;font-size:small;margin-left:2cm"></span>
                    <div id="uname_response" style="font-size:small;text-align:left"></div>
                </div>

                <input type="text" id="phone" pattern="[6-9]{1}[0-9]{9}" size="30cm" minlength="10" maxlength="10" onkeyup="ValidatePhone();" value="<?php echo $userphone ?>" name="custophone" size="30cm"  required>
                <div style="display:flex">
                    <span id="lblError3" style="color: red;font-size:small;margin-left:6.5cm"></span>
                    <center>
                    <div id="uname_response2" style="font-size:small;text-align:center;"></div></center>
                    </div>

                
         
                <input type="submit" id="submitbutton" value="Update" name="updatedata"> 
            </form>
            </fieldset>
        </div>  
       
        <center>
        <p style="font-size:12.8px">© Copyright 2022  |  All rights reserved | www.pawsown.in</p>
    </center>
    <script>
window.onscroll = function() {myFunction()};

var header = document.getElementById("myHeader");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}
</script>
        
    </body>
</html>