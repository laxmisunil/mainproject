<?php
include "connection.php";
session_start();
if($_SESSION["loginStatus"])
{
if ($_SESSION["loginStatus"]==3)
{
$userID=$_SESSION["loginID"];
$username="SELECT userName FROM tbl_userdetails WHERE userID='$userID'";
if ($result=$conn->query($username))
{
    if($result->num_rows>0)
    {
        while($row=$result->fetch_array())
        {
            $username=$row["userName"];
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

$words = explode(" ", $username);
$firstname = $words[0];

}
else
{
    header("location:index.php");
}
}
else
{
    header("location:login.php");
}
?>
 <?php
      
      if((isset($_GET["status"])))
      {
          if(($_GET["status"])==1)
          {
            ?>
          <div id="snackbar">Appointment Booked Successfully!</div>
            <script> var x = document.getElementById("snackbar");
          x.className = "show";
          setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);</script>

          <?php
          }
          
      }

      ?>

<html>
    <head>
        <title>My Appointments</title>
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
          
            .div2
            {
                background-color:white;
                padding: 2px 9px 1hpx 9px;
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
            table
            {
                border-collapse: collapse;
                border-spacing: 0;
                width: 100%;
                border: 1px solid #ddd;
            }
            td,th
            {
                text-align: left;
                padding: 16px;
            }
            tr:nth-child(even) 
            {
                background-color: #f2f2f2;
            }
            .div2
            {
                
                padding: 2px 10px 0px 10px;
                margin-top: 0px;
                font-weight: lighter;
                font-size: 27px;
                text-align: left;
            }
            #newapp
            {
                text-decoration: none;
                font-size: 15px;
                color:white;
                border:2px ;
                padding:6px;
                border-radius: 5px;
                background-color:royalblue;
                
                
            }
            #newapp:hover
            {
                border:2px;
                color:black;
                
            }
            #history
            {
                color:blue;
                margin-left: 984px;
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
#snackbar2 {
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
#snackbar2.show {
  visibility: visible;
  -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
  animation: fadein 0.5s, fadeout 0.5s 2.5s;
}
#snackbar3 {
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
#snackbar3.show {
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
#showupcoming
{
    padding:10px;
    background-color:royalblue;
    border-radius: 5px;
    border:2px transparent;
    color:white;
}
#showupcoming:hover
{
    background-color: Silver;
    cursor:pointer;
    color:black;
}
        </style>
        <script>/*
window.onscroll = function() {myFunction()};

var header = document.getElementById("myHeader");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}*/
function myFunction() {
  var x = document.getElementById("upcoming");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>
    </head>
    <?php
    $sql = "SELECT sum(productCount) FROM tbl_cart WHERE cartStatus=1 AND customerID=$userID";
    $q = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($q);

    $cartitemcount=$row[0];
    
    ?>
    <header class="header" id="myHeader">
    <center><img src="logofinal.png" width="8%" ></center>
    <hr>

    <body>
    <center>
    <div style="display:flex">
    <form action="searchproducts.php" method="POST">
            <input id="s" type="search" name="search" placeholder="Search products...">  <br>
            <input type="hidden" name="submit" style="background-color:transparent;border:transparent;color:transparent;padding:0.2px;margin:0px">
        </form>

        <div class="navigation">
            <a href="home.php" class="item">Home</a>
            <a href="dogs.php" class="item">Dogs</a>
            <a href="cats.php" class="item">Cats</a>
            <a href="consultation.php" class="item" >Consultation</a>
            <a href="about.php" class="item">About</a>
            <a <?php if($_SESSION["loginStatus"]==3){?>href="contact.php"<?php }?> href="login.php" class="item">Feedback</a>
        </div>

        <div id="div3" style="display:flex">
        <div style="margin-top:19px" id="cartitems" onclick="location.href='mycart.php'">
        <i class="fa badge" style="font-size:24px" value=<?php if($cartitemcount=='')echo "0"; else echo $cartitemcount ?>>&#xf07a;</i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
        <div class="dropdown">
        <img src="usericon3.png" class="dropbtn" width="26px" height="26px" style="margin-top:17px">
        <div class="dropdown-content">
        <a href="myprofile.php">My Profile</a>
            <a href="myorders.php">My Orders</a>
            <a href="myappointments.php">My Appointments</a>
            <a href="viewpetschedule.php">Pet Health Schedule</a>
            <a href="vaccination.php">Vaccination Schedule</a>
            <a href="addcustomeraddress.php">Manage Address</a>
            <a href="changepassword.php">Change Password</a>
            <a href="logout.php">Log out</a>
        </div>
        </div>

        <p style="color:black;margin-top:1.7em;margin-left:1em">Hey&nbsp; 
        <?php echo $firstname; ?>&nbsp;!  
        </p>
    
        </div>
        </div>
    </header>
<div>
<?php

$userID=$_SESSION["loginID"];
$date=date('Y-m-d');?>

    <?php
$sel="SELECT appointmentID,petSpecies,petGender,petAge,concernAboutPet,consultationDate,consultationTime FROM tbl_appointmentdetails WHERE customerID='$userID' AND consultationDate='$date'";
if ($result=$conn->query($sel))
{?>
    <div class="div2" >
    <center><h4>Today's Appointment</h4></center>
</div>
<div style="display:flex">
&nbsp;
<button onclick="window.location.href='appointmentform2.php'"id="showupcoming">+ New Appointment</button>&nbsp;
<button onclick="window.location.href=''"id="showupcoming" style="background-color:Silver;color:black">Today's Appointments</button>
&nbsp;<button onclick="window.location.href='myupcomingappointments.php'" id="showupcoming">Upcoming Appointments</button>&nbsp;
<button onclick="window.location.href='myappointmenthistory.php'"id="showupcoming">Appointment History</button>
</div><br>
<table>
<tr id="tr1">
    <th style="background-color:Silver">Sl No.</th>
    <th style="background-color:Silver">Pet Species</th>
    <th style="background-color:Silver">Pet Gender</th>
  
   
    <th style="background-color:Silver">Concern about Pet</th>
    <th style="background-color:Silver">Consulation Date</th>
    <th style="background-color:Silver">Consultation Time</th>  
    <th style="background-color:Silver"></th>     
</tr><?php
    if($result->num_rows>0)
    { 
    ?>
    <?php
    if ($_SESSION["loginStatus"]==3)
    {
    ?>
    
    <?php } else?>

    
   

        <?php 
        $i=0;
        while($row=$result->fetch_array())
        {
            $i++;
        ?>

        <tr>
        <?php $_SESSION["appID"]=$row["appointmentID"]?>
            <td><?php echo $i ?></td>
            <td><?php echo $row["petSpecies"] ?></td>
            <td><?php echo $row["petGender"] ?></td>
     
            <td><?php echo $row["concernAboutPet"] ?></td>
            <td><?php echo $row["consultationDate"] ?></td>
            <td><?php if(($row["consultationTime"])==9)
                        echo "09:00am - 09:30am";
                        else if(($row["consultationTime"])==10)
                        echo "10:00am -10:30am"; 
                        else if(($row["consultationTime"])==11)
                        echo "11:00am -11:30am"; 
                        else if(($row["consultationTime"])==12)
                        echo "12:00pm -12:30pm";
                    ?></td>
            <?php
            $consultationdate=$row["consultationDate"];
            $consultationtime=$row["consultationDate"];
            $todaydate=date('Y-m-d');
            $todaytime=date('H');
           ?>
            <td><a href="cancelappointment.php?appointmentID=<?php echo $row["appointmentID"]; ?>" style="text-decoration:none;color:Navy;">CANCEL </a></td>
            
                  
        </tr> 
   
        <?php 
        }
      
        $result->free();
    }
    else
    {
        echo "<tr><td colspan='7' style='color:gray'><center>Nothing scheduled for today.</td><tr>";
    }
}
else
{
    echo "ERROR";
}  

?> 
</table>
</div>
<br><br><center>

</html>