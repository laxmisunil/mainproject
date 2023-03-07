
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
#generateID
{
    padding:4px 15px;
    background-color:green;
    border:2px solid green;
    color:white;
    border-radius: 3px;
}
#generateID:hover
{
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
    cursor: pointer;
}

    
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
        <button class="dropbtn" style="background-color:transparent"><img src="veticon.webp" width="26px" height="28px" style="margin-top:15px;"></button>&nbsp;
        <div class="dropdown-content">
    <a href="vetprofile.php">My Profile</a>
    <a href="addedschedules.php">Added Schedules</a>
    <a href="adminlogout.php">Logout</a>
   
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
$sel="SELECT tbl2.*,tbl1.*,tbl3.* FROM tbl_appointmentdetails AS tbl2 INNER JOIN tbl_userdetails AS tbl1 ON tbl2.customerID=tbl1.userID INNER JOIN tbl_pet AS tbl3 ON tbl2.petID=tbL3.petID WHERE consultationDate='$date' AND tbl3.petStatus!=2";
if ($result=$conn->query($sel))
{
    ?>
    <div class="div2" >
    <center><h1>Today's Appointments</h1></center>
</div>
<div style="display:flex">
&nbsp;
<button onclick="window.location.href=''"id="showupcoming" style="background-color:Silver;color:black">Today's Appointments</button>
&nbsp;<button onclick="window.location.href='upcomingappointments.php'" id="showupcoming">To be done</button>&nbsp;
<button onclick="window.location.href='vethistory.php'"id="showupcoming">Consultation History</button>
</div>

<table>
    <br>
<tr id="tr1">
<th style="background-color:Silver">Sl No.</th>
                    <th style="background-color:Silver">Name </th>
                    <th style="background-color:Silver">Phone</th>
                    <th style="background-color:Silver">Pet Species</th>
                    <th style="background-color:Silver">Gender</th>
                    <th style="background-color:Silver">Age</th>
                 
                    <th style="background-color:Silver">Concern</th>
                    <th style="background-color:Silver">Date</th>
                    <th style="background-color:Silver">Time</th>  
                    <th style="background-color:Silver"></th> 
                      

   
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
                      <td><a href="https://meet.google.com/rqn-rbnp-eoa" id="generateID" style="text-decoration:none">Start now</a></td>              
                                   
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
                echo "<tr><td colspan='10' style='color:gray'><center>No appointments are scheduled for today.</td><tr>";;
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

<div id="upcoming" style="display:none">
<?php

$userID=$_SESSION["loginID"];
$date=date('Y-m-d');?>

    <?php
$sel="SELECT appointmentID,petSpecies,petGender,petAge,concernAboutPet,consultationDate,consultationTime FROM tbl_appointmentdetails WHERE customerID='$userID' AND consultationDate>'$date'";
if ($result=$conn->query($sel))
{?>
    <div class="div2" >
    <center><h1>Upcoming Appointments</h1></center>
</div>
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
            <td><a href="cancelappointment.php?appointmentID=<?php echo $row["appointmentID"]; ?>" style="text-decoration:none;color:Navy;" onclick="return confirm('Are you sure you want to cancel this appointment?');">CANCEL </a></td>
            
                  
        </tr> 
    
        <?php 
        }
        /*while($row=$result->fetch_array())
        {
        ?>   
                
        <tr>
            <?php $_SESSION["appID"]=$row["appointmentID"]?>
            <td><?php echo $row["petSpecies"] ?></td>
            <td><?php echo $row["petGender"] ?></td>
            <td><?php echo $row["petSpecies"] ?></td>
            <td><?php echo $row["petAge"] ?></td>
            <td><?php echo $row["petWeight"] ?></td>
            <td><?php echo $row["concernAboutPet"] ?></td>
            <td><?php echo $row["consultationDate"] ?></td>
            <td><?php echo $row["consultationTime"] ?></td>
            <?php
            $consultationdate=$row["consultationDate"];
            $consultationtime=$row["consultationDate"];
            $todaydate=date('Y-m-d');
            $todaytime=date('H');
            if(($consultationdate>$todaydate) AND ($consultationtime>$todaytime))
            {?>
            <td><a href="cancelappointment.php" style="text-decoration:none;color:Navy;">CANCEL </a></td>
            <?php } 
            else {?>
            <td><a href="deleteappointment.php" style="text-decoration:none;color:red;">DELETE</a></td> 
            <?php } ?>    
        </tr>     
        </table>
        <?php
    }*/
        $result->free();
    }
    else
    {
        echo "<tr><td colspan='7' style='color:gray'><center>No upcoming appointments.</td><tr>";
    }
}
else
{
    echo "ERROR";
}  

?> 
    </table>
</div>
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

</script>
</html>
<?php }}?>
   
    
