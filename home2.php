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

$useremail=$_SESSION["userEmail"];
$userPhone=$_SESSION["userPhone"];

$words = explode(" ", $username);
$firstname = $words[0];
$lastname = $words[1];


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
    header("location:index.php");
}
?>

<html>
    <head>
        <title>Home</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script data-require="jquery@3.1.1" data-semver="3.1.1" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <link rel="stylesheet" href="style.css" />
        <script src="script.js"></script>
        <style>
            header
            {
                background-color: white;
                width:100%;
                margin-top: 0px;   
            }
            body
            {
                font-size: 15px;
                font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
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
                background-color:rgb(248, 238, 223);
                padding: 2px 9px 2px 9px;
                margin-top: 0px;
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
        </style>
      
    </head>
    <header>
    <center><img src="logofinal.png" width="8%" ></center>
    <hr>

    <body>
    <center>
    <div style="display:flex">
        <form>
            <input id="s" type="search" placeholder="Search...">       
        </form>

        <div class="navigation">
            <a href="" class="item">Home</a>
            <a href="" class="item">Dogs</a>
            <a href="" class="item">Cats</a>
            <a href="consultation.php" class="item">Consultation</a>
            <a href="about.php" class="item">About</a>
            <a <?php if($_SESSION["loginStatus"]==3){?>href="contact.php"<?php }?> href="login.php" class="item">Feedback</a>
        </div>

        <div id="div3" style="display:flex">
        <img src="carticon.webp" width="28px" height="30px" style="margin-top:17px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="dropdown">
        <img src="usericon3.png" class="dropbtn" width="26px" height="26px" style="margin-top:17px;margin-right:2px">
        <?php 
        if($_SESSION["loginStatus"]==3)
        {?>
        <div class="dropdown-content">
            <a href="myprofile.php">My Profile</a>
            <a href="#">My Orders</a>
            <a href="myappointments.php">My Appointments</a>
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

    <div class="div2"> <center>
        <h2>Every Pet Is Unique. Let's Celebrate It!</h2>
    </div>
    </center>

    <div style="display: flex;">
        <center>
        <img src="pet1.jpg" width="70%" style="margin-right: 0.5cm">
    </div>

    <div class="div2">
        <h3>Top Pet Foods</h3>
    </div>

    <div class="div4">
        <div class="d1">
            <img src="dfood1.webp" style="width:7.8cm">
            <h3>Drools Focus Puppy DryFood</h3>
            <h2 class="price">₹115</h2>
            <input class="button1" type="button" value="ADD TO CART">
        </div>&nbsp;&nbsp;&nbsp;
            
        <div class="d1">
            <img src="cfood1.webp" style="width:7.8cm">
            <h3>Jinny Chicken Cat Treat</h3>
            <h2 class="price">₹115</h2>
            <input class="button1" type="button" value="ADD TO CART">
        </div>&nbsp;&nbsp;&nbsp;

        <div class="d1">
            <img src="dfood2.webp"  style="width:7.8cm">
            <h3>Duo-Stick Dog Treat</h3>
            <h2 class="price">₹175</h2>
            <input class="button1" type="button" value="ADD TO CART">  
        </div>&nbsp;&nbsp;&nbsp;

        <div class="d1">
            <img src="cfood2.webp"  style="width:7.8cm">
            <h3>Matisse Kitten Cat Dry Food</h3>
            <h2 class="price">₹309</h2>
            <input class="button1" type="button" value="ADD TO CART">
        </div>
            
    </div>
        <div class="div2">
            <h3>Pet Toys</h3>
        </div>

    <div class="div4">
        <div class="d1">
            <img src="ctoy1.webp" style="width:7.8cm">
            <h3>Cheerble Electronic Ball for Cats</h3>
            <h2 class="price">₹2,999</h2>
            <input class="button1" type="button" value="ADD TO CART"> 
        </div>&nbsp;&nbsp;&nbsp;

        <div class="d1">
            <img src="dtoy1.webp"  style="width:7.8cm">
            <h3>Kong Shells Platypus Toy for Dogs</h3>
            <h2 class="price">₹1,071</h2>
            <input class="button1" type="button" value="ADD TO CART">
        </div>&nbsp;&nbsp;&nbsp;

        <div class="d1">
            <img src="ctoy2.webp"  style="width:7.8cm">
            <h3>Kong EnchantedUnicorn Toy for Cats</h3>
            <h2 class="price">₹629</h2>
            <input class="button1" type="button" value="ADD TO CART">  
        </div>&nbsp;&nbsp;&nbsp;

        <div class="d1">
            <img src="dtoy2.webp"  style="width:7.8cm">
            <h3>Pawsindia Egg Bell Toy for Dogs</h3>
            <h2 class="price">₹572</h2>
            <input class="button1" type="button" value="ADD TO CART">
        </div>
    </div>

    <div class="div2">
        <h3>Other Accessories</h3>
    </div>

    <div class="div4">
        <div class="d1">
            <img src="dacc1.webp" style="width:7.8cm">
            <h3>M-Pets Drinking Bottle for Dogs</h3>
            <h2 class="price">₹275</h2>
            <input class="button1" type="button" value="ADD TO CART"> 
        </div>&nbsp;&nbsp;&nbsp;

        <div class="d1">
            <img src="cacc1.jpg"  style="width:7.8cm">
            <h3>Hiputee Foldable Fabric Hut</h3>
            <h2 class="price">₹1,215</h2>
            <input class="button1" type="button" value="ADD TO CART">
        </div>&nbsp;&nbsp;&nbsp;

        <div class="d1">
            <img src="dacc2.webp"  style="width:7.8cm">
            <h3>Ruse Sleeveless T-Shirt For Dogs</h3>
            <h2 class="price">₹809</h2>
            <input class="button1" type="button" value="ADD TO CART">  
        </div>&nbsp;&nbsp;&nbsp;
        
        <div class="d1">
            <img src="cacc2.webp"  style="width:7.8cm">
            <h3>Trixie Non-Slip Plastic Bowl for Cats</h3>
            <h2 class="price">₹84</h2> 
            <input class="button1" type="button" value="ADD TO CART">
        </div>
    </div> 

    <div>
          
    </div>  
    <center>

    <div id="last">
        <img src="dogcat.webp" width="100%">
        <div class="textonimage">
            <p style="font-size:70px;color:Black;">Making <br>Pet Parenting easy for everyone</p>
        </div>
        </div>
    </div>
    
    <p> Call us on 8606465950</p>
    <hr>
    <p style="font-size:12.8px">© Copyright 2022  |  All rights reserved | www.pawsown.in</p>
</center>
</body>
</html>