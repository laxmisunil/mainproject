<?php
include "connection.php"
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
            //echo $row["userID"];
            /*echo $row["userName"];
            echo $row["userEmail"];
            echo $row["userPhone"];*/

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
        <title>About</title>
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
        </style>
    </head>
    <?php
    $sql = "SELECT sum(productCount) FROM tbl_cart WHERE cartStatus=1 AND customerID=$userID";
    $q = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($q);

    $cartitemcount=$row[0];
    
    ?>
    
    <header class="header" id="myHeader">
        <center><img src="logofinal.png" width="8%" >
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
            <a href="consultation.php" class="item">Consultation</a>
            <a href="" id="active"class="item">About</a>
            <a <?php if($_SESSION["loginStatus"]==3){?>href="contact.php"<?php }?> href="login.php" class="item">Feedback</a>
            
        </div>
        <div id="div3" style="display:flex">
        <div style="margin-top:19px" id="cartitems" onclick="location.href='mycart.php'">
        <i class="fa badge" style="font-size:24px" value=<?php if($cartitemcount=='')echo "0"; else echo $cartitemcount ?>>&#xf07a;</i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
        <div class="dropdown">
        <img src="usericon3.png" class="dropbtn" width="26px" height="26px" style="margin-top:17px;margin-right:2px">
        <?php 
        if($_SESSION["loginStatus"]==3)
        {?>
        <div class="dropdown-content">
        <a href="myprofile.php">My Profile</a>
            <a href="myorders.php">My Orders</a>
            <a href="myappointments.php">My Appointments</a>
            <a href="viewpetschedule.php">Pet Health Schedule</a>
            <a href="addcustomeraddress.php">Manage Address</a>
            <a href="changepassword.php">Change Password</a>
            <a href="logout.php">Log out</a>
        </div>
        <?php
        }
        ?>
        </div>

        <p style="color:black;margin-top:1.7em;margin-left:1em">
        <?php 
        if($_SESSION["loginStatus"]==3)
        {
            echo "Hey &nbsp" .$firstname."!";
        }
        else
        { 
            ?>
            <!--<input type="button" value="LOGIN" onclick="window.location.href='login.php'" style="padding:10px">-->         
            <a id="login" href="login.php">Sign In/Register</a><?php
        } 
        ?> 
        </p>
    
        </div>
        </div>
    </header>
<center>
    <body>
        <div id="div2">
            <h2>The Story of Paws' Own</h2>
            <hr class="separater">
            <p style="font-size: 18px;">Paws' Own is a well-renowned online store that has continually featured a variety of high-quality and affordable<br>
                products since day one.<br></p>
                
            <p style="font-size: 18px;">Our passion for excellence has driven us from the beginning, and continues to drive us into the future. The team at<br>
                Paws' own knows that every product counts, and strives to make the entire shopping experience as rewarding and<br>
                fun as possible. Check out our store and get in touch with questions or requests.<br></p>

         
            
    </center>
        </div> 
        <center><img src="dogcat5.png" width="50%">
        <center><h1>Meet our Vet</h1>
        <hr class="separater">
        </center>
        <div style="display:flex;margin-left:8px">
        
        <div>
        <h1>Dr. Goutham Prenoj</h1>
        <p><b>BVMS (Bachelor of Veterinary Medicine & Science), MVSC - Surgery<br>
        Veterinary Surgeon, Veterinary Physician<br>  
        15 Years Experience Overall  (10 years as specialist)</b><br>
        </p>
        <p><img src="medicalverification2.png" style="width:2.2%">&nbsp;Medical Registration Verified</p>

        <p>Dr.Goutham Prenoj M.V.Sc. Surgery and Radiology, He did his Bachelor of Veterinary Science & Animal
        Husbandry from C.C.C.S.H.A.U., Hisar (Haryana) and continued on to get his Masters in Veterinary<br> 
        Surgery from Bangalore in 2003. He was a topper in his Junior Research Fellowship by I.C.A.R. New <br>
        Delhi. He was awarded “Best Young Surgeon award” by Indian Society of Veterinary Surgery in 2004.</p>

        <p>Dr. Goutham Prenoj started his career as an Emergency Doctor and Surgeon with C.U.P.A. (a well known<br>
         NGO based out of Bangalore). Over the years he continued to train himself by attending various
         conf-<br>rences and seminars and workshops in areas like critical care, orthopaedics, spinal surgery,
         radiology,<br>anesthesia and pain management and more. He was recently part of the Small Animal
         Congress held at Thailand and also attended the seminar hosted by WSAVA (World Small Animal<br>
         Veterinary Association).</p>
        </div>
        <div>
        <br><br>
            <img id="vet" src="drgouthamprenoj.jpg" alt="Dr.Goutham Prenoj" width="82%">

        </div>

    </div>
    <br><br>
         <div style="display:flex;">
        <div style="padding:18px;width:50%;">
         <h2>Common questions & answers</h2>
         <hr>
         <h3>Q: Why do patients visit Dr. Goutham Prenoj?</h3>
         <p><b>A:</b> Patients frequently visit Dr. Goutham Prenoj for Dental Checkup (General), Veterinary Surgery, Veterinary Treatment. To see more reasons visit the doctor's profile on Practo.</p>
         <hr>
         <h3>Q: What is Dr. Goutham Prenoj's education qualification?</h3>
         <p><b>A:</b> Dr. Goutham Prenoj has the following qualifications - BVMS (Bachelor of Veterinary Medicine & Science), MVSC - Surgery.</p>
         <hr>
         <h3>Q: What does Dr. Goutham Prenoj specialises in ?</h3>
         <p><b>A:</b> Dr. Goutham Prenoj specialises as Veterinary Surgeon, Veterinary Physician.</p>
         <hr>
         <h3>Q: How many years of experience does Dr. Goutham Prenoj have?</h3>
         <p><b>A:</b> Dr. Goutham Prenoj has an overall experience of 15 years. View where has Dr. Goutham Prenoj practiced in the past.</p>
         
        </div>
        <br>

        <div style="padding:18px;width:50%;margin-left: 4px;">
         <h2>Education</h2>
         <hr>
         <p>BVMS (Bachelor of Veterinary Medicine & Science) - CCS HAU HISAR, 2004</p>
         <p>MVSC - Surgery - Veterinary College, Bangalore, 2007</p>
         
         <h2>Experience</h2>
         <hr>
         <p>2005 - 2017  Veterinary Surgeon at Cessna Lifeline</p>
    
        </div>
        </div>
        <center>
        <p style="font-size:12.8px">© Copyright 2022  |  All rights reserved | www.pawsown.in</p>
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