
<?php
include "connection.php";

session_start();
if($_SESSION["loginStatus"])
{
if ($_SESSION["loginStatus"]==2)
{
$userID=$_SESSION["loginID"];

$user="SELECT * FROM tbl_userdetails WHERE userRole='Veterinarian' AND userStatus=1";
if ($result=$conn->query($user))
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
        <title>Add Prescription</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
                margin-left: 12cm;
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
#active
{
    color:white;
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
    
.dropbtn {

color: white;
padding: px;
font-size: 16px;
border: none;
background-color: #f1f1f1;
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

.dropdown:hover .dropbtn {background-color: #3e8e41;}
#snackbar {
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
#snackbar.show {
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
       
        <?php
    
?>
<script>
   
</script>
          
    </head>
    <header class="header" id="myHeader">
        <center><img src="logofinal.png" width="8%" >
        <hr> 
    <body>
    <center>
            <div style="display:flex">
                <!--<form>
                    <input id="s" type="search" placeholder="Search...">       
                </form>-->
                <div class="navigation">
            <a href="vethome.php" class="item">Home</a>
            <a href="appointments.php" class="item">Appointments</a>
            <a href="petschedule.php" class="item">Pet Schedule</a>
            <!--<a href="about.php" class="item">About</a>
            <a href="contact.php" class="item">Contact</a>-->
        </div>
        <div id="div3" style="display:flex">

        <div class="dropdown">
        <button class="dropbtn" style="background-color:transparent"><img src="veticon.webp" width="26px" height="28px" style="margin-top:15px;margin-left:0"></button>&nbsp;
        <div class="dropdown-content">
    <a href="vetprofile.php">My Profile</a>
    <a href="addedschedules.php">Added Schedules</a>

    <a href="adminlogout.php">Logout</a>
   
  </div>
</div>
        <p style="margin-top:22px;"><?php echo $vetname; ?></p>
        </div>
        </div>
        
        </header>
        <?php
if((isset($_GET["status1"]))==1)
{
    ?><div id="snackbar">Profile updated successfully!</div>
    <script> var x = document.getElementById("snackbar");
  x.className = "show";
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);</script><?php 
   
}


?>
        

<?php
$appointmentID=$_GET["appointmentID"];
$username="SELECT * FROM tbl_userdetails WHERE userRole='Veterinarian' AND userStatus=1";
if ($result=$conn->query($username))
{
    if($result->num_rows>0)
    {?>
        <div style="background-image: url('dogcat4.png')"><br>
            <fieldset style="margin-top: 2cm;margin-left: 11cm;margin-right: 11cm;background-color:white;padding-bottom: 0.2cm;">
                <form action="prescriptionadded.php?appointmentID=<?php echo $appointmentID ?>" method="POST" target="_self" enctype="multipart/form-data">
                   <br>
                    <h2 style="margin-left:10px">Add Prescription</h2> 
                    <br>

                   
                    <textarea id="medicine" placeholder="Medicines" onkeyup="ValidateConcern();"  name="medicine" size="30cm" rows="4" cols="60"  required></textarea><br><br>
                    <textarea id="concern" placeholder="Prescription" onkeyup="ValidateConcern();"  name="prescription" size="30cm" rows="8" cols="60"  required></textarea><br> 
                    
                    <input type="submit" value="Save" name="updatevet">
                    
                   
                    
                </form>
            </fieldset><br><br>
        </div>
        <?php
        }
        else
        {
            echo "<br><br>";
            echo "<p style='color:red'>VET INACTIVE</p>";
            echo "<marquee id='inactivevet' scrollamount='10'>Please activate VET PROFILE to continue</marquee><br><br>";
            echo "<p>Click <a href='veterinarydetails4.php'>here</a> to activate Vet Profile</p>";
        }}?>