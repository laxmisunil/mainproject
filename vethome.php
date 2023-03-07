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
            .sticky 
            {
                position: fixed;
                top: 0;
                width: 100%;
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
    </head>
    
    <header class="header" id="myHeader">
        <center><img src="logofinal.png" width="8%" >
        <hr> 
   
    <body>
        <center>
            <div style="display:flex">
           
            <!--<form action="searchappointments.php" method="POST">
            <input id="s" type="search" name="search" placeholder="Search appointments...">  <br>
            <input type="hidden" name="submit" style="background-color:transparent;border:transparent;color:transparent;padding:0.2px;margin:0px">
        </form>-->
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
    <a href="vetprofile.php">My Profile</a>
    <a href="addedschedules.php">Added Schedules</a>
    <a href="adminlogout.php" onclick="return confirm('Are you sure you want to logout?');">Logout</a>
   
  </div>
</div>
        <p style="margin-top:22px;"><?php echo $username; ?></p>
        </div>
        </div>
        </header>
        <img src="vet2.jpg" width="100%">
    <div class="div2"><h3>Care them with Love </h3></div>
    <img src="vet9.jpg" width="100%">
   
    <h3 style="text-align: left;font-size: 30px;">Information for Veterinarians </h3>
    <p style="text-align: left;font-size: 20px;">Veterinarians should be aware of the risk for zoonotic diseases 
        in pets, farm animals, and wildlife, 
        as well as the risk of diseases spreading between animals and their owners. Veterinarians should 
        counsel clients on disease prevention practices, including how to stay safe and healthy around pets 
        and other animals. The following resources include current guidelines on specific zoonotic disease 
        topics, educational resources, and references to disease-specific information.

    <h5 style="text-align: left;font-size: 25px;">Guidelines and Recommendations </h5>

        <ul style="text-align: left;font-size: 20px">
            <li><a href="https://www.liebertpub.com/doi/10.1089/vbz.2022.0022?url_ver=Z39.88-2003&rfr_id=ori%3Arid%3Acrossref.org&rfr_dat=cr_pub++0pubmed">Compendium of Measures to Prevent Zoonotic Diseases Associated with Non-Traditional Pets</a></li>
            <li><a href="https://www.cdc.gov/niosh/topics/veterinary/default.html">Veterinary Safety and Health (The National Institute for Occupational Safety and Health)</a></li>
            <li><a href="http://www.nasphv.org/documentsCompendiumAnimals.html">Compendium of Measures to Prevent Disease Associated with Animals in Public Settings, 2017 (National Association of State Public Health Veterinarians)</a></li>
            <li><a href="http://www.nasphv.org/documentsCompendiaRabies.html">Compendium of Animal Rabies Prevention and Control, 2016 (National Association of State Public Health Veterinarians)</a></li>
            <li><a href="http://www.nasphv.org/documentsCompendiaPsittacosis.html">Compendium of Measures to Control Chlamydia psittaci Infection Among Humans (Psittacosis) and Pet Birds (Avian Chlamydiosis), 2017 (National Association of State Public Health Veterinarians)</a></li>
        </ul>

        <h5 style="text-align: left;font-size: 25px;">Educational Materials </h5>
        <ul style="text-align: left;font-size: 20px">
            <li><a  href="https://www.cdc.gov/healthypets/publications/check-pet-for-ticks.html">How to check your pet for ticks</a></li>
            <li> <a  href="https://www.cdc.gov/healthypets/publications/healthy-around-reptiles-and-amphibians.html">Stay Healthy Around Pet Reptiles and Amphibians</a></li>
        </ul>
       
    </div>
    <h5 style="text-align: left;font-size: 25px;">More Information</h5>
    <ul style="text-align: left;font-size: 20px">
        <li><a  href="https://northamerica.covetrus.com/resource-center/blogs/practice-management/practice-management/2018/04/06/tips-for-a-thriving-veterinary-practice">Tips for a Thriving Veterinary Practice - Covetrus North America</a></li>
        <li> <a  href="https://dir.indiamart.com/impcat/veterinary-drugs.html">Veterinary Drugs - Animal Medicines & Healthcare - IndiaMART</a></li>
    </ul>
   
    <img src="vet5.jpg" width="20%">
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