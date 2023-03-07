
<?php

include "connection.php";
session_start();
if($_SESSION["loginStatus"])
{
if ($_SESSION["loginStatus"]==2)
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
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <style>
           html
           {
               margin:0;
           }
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
               margin-right: 2.2cm;  
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
               color:white;
               background-color: black;
               padding: 2px 10px 0px 10px;
            
               font-weight: lighter;
               font-size: 27px;
               text-align: left;
           }
           hr
           {
               height:1px;
               border-width:0;
               color:rgb(74, 71, 71);
               background-color:rgb(99, 96, 96);
               margin:0px 30px 0px 30px;
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
           #history
           {
               text-decoration: none;
               color:blue;
               margin-left: 28.6cm;
           }
           #active
           {
               border-bottom: 2px solid chocolate;
               
           }
           .switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}
#submitbutton
{
    color:transparent;
    outline:0;
    background-color: transparent;
    border:0;
}


.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #ff0000;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
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
           #addreport:hover
           {
               cursor: pointer;
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
   background-color: gray;
   cursor:pointer;
   color:black;
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
   
       </style>
       <script>
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
           <a href="vethome.php" class="item" >Home</a>
           <a href="appointments.php" id="active" class="item">Appointments</a>
           <a href="petschedule.php" class="item" style="margin-right:4cm">Pet Schedule</a>
           <!--<a href="about.php" class="item">About</a>
           <a href="contact.php" class="item">Contact</a>-->
       </div>
       <div id="div3" style="display:flex">

       <div class="dropdown">
        <button class="dropbtn" style="background-color:transparent"><img src="veticon.webp" width="26px" height="28px" style="margin-top:15px"></button>&nbsp;
        <div class="dropdown-content">
    <a href="vetprofile.php">My Profile</a>
    <a href="addedschedules.php">Added Schedules</a>
    <a href="adminlogout.php" onclick="return confirm('Are you sure you want to Logout?');">Logout</a>
   
  </div>
</div>
        <p style="margin-top:22px;"><?php echo $username; ?></p>
        </div>
        </div>
        </header>
     
   <?php


if($_SESSION["loginStatus"])
{
if ($_SESSION["loginStatus"]==2)
{
$userID=$_SESSION["loginID"];
$date=date('Y-m-d');
$sel="SELECT tbl2.*,tbl1.*,tbl3.* FROM tbl_appointmentdetails AS tbl2 INNER JOIN tbl_userdetails AS tbl1 ON tbl2.customerID=tbl1.userID INNER JOIN tbl_pet AS tbl3 ON tbl2.petID=tbL3.petID WHERE consultationDate>'$date' AND tbl3.petStatus!=2";
if ($result=$conn->query($sel))
{
   ?>
   <div class="div2" >
   <center><h1>To be done</h1></center>
</div>
<div style="display:flex">
&nbsp;<button onclick="window.location.href='appointments.php'" id="showupcoming">Today's Appointments</button>
&nbsp;<button onclick="window.location.href=''" style="background-color:Silver;color:black" id="showupcoming">To be done</button>&nbsp;
<button  onclick="window.location.href='vethistory.php'" id="showupcoming">Consultation History</button>
</div>

<table>
   <br>
<tr id="tr1">
<th style="background-color:Silver">Sl No.</th>
                   <th style="background-color:Silver">Name </th>
                   <th style="background-color:Silver">Phone</th>
                   <th style="background-color:Silver">Pet Species</th>
                   <th style="background-color:Silver">Pet Gender</th>
                   <th style="background-color:Silver">Pet Age</th>
                
                   <th style="background-color:Silver">Concern</th>
                   <th style="background-color:Silver">Date</th>
                   <th style="background-color:Silver">Time</th>  
                   <th style="background-color:Silver">Deny Request</th>  
                     

  
</tr><?php
   if($result->num_rows>0)
   {
       ?>
       
          

               <?php 
               $i=0;
                   while($row=$result->fetch_array())
                   {
                       $i++;
               ?>

               <tr>

                   <td><?php echo $i ?></td>
                   <td><?php echo $row["userName"] ?></td>
                   <td><?php echo $row["userPhone"] ?></td>
                   <td><?php echo $row["petSpecies"] ?></td>
                   <td><?php echo $row["petGender"] ?></td>
                   <td><?php echo $row["petAge"] ?></td>
                   
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
                   <td>
                   
                 
                 <form id="form" action="updatedoctorleave.php?appointmentID=<?php echo $row["appointmentID"] ?>" method="POST">
                 <label class="switch" >
                 <button type="submit" name="togbutton" id="submitbutton" style='color:green'>   
                 <?php $appointmentStatus=$row["appointmentStatus"]; 
                 if($appointmentStatus==0)
                 echo "<input type='checkbox' name='togbutton' id='toggle' >";
                 else if($appointmentStatus==1)
                 echo "<input type='checkbox' name='togbutton' id='toggle' checked>";

                 ?>           
     
                 <span class="slider round"></span></button>
                 </label></form></td>  
              
                                  
               </tr> 

               <?php 
               }
               while($row=$result->fetch_array())
               {
               ?> 

               <tr>
                   
                   <td><?php echo $row["userName"]?></td>
                   <td><?php echo $row["userPhone"]?></td>
                   <td><?php echo $row["petSpecies"] ?></td>
                   <td><?php echo $row["petGender"] ?></td>
                   <td><?php echo $row["petAge"] ?></td>
                 
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
               </tr>     
           </table>

           <?php 
           }
               $result->free();
           }
           else
           {
               echo "<tr><td colspan='10' style='color:gray'><center>No upcoming appointments.</td><tr>";;
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
<?php }}?>
  
   
