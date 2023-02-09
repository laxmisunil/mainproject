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
    <!-- background-color:rgb(248, 238, 223);-->
    <head>
        <title>Vaccination Details</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script data-require="jquery@3.1.1" data-semver="3.1.1" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                margin-left: 8.7cm;
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
            input[type=submit]
            {
                width: 40%;
                background-color: black;
                color: #fafafa;
                padding: 18px 24px;
                margin: 8px 0;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-weight: bolder;
                margin-top: 2px; 
            }
            input[type=submit]:hover
            {
                background-color: #595959;
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
            .para
            {
                font-size: 21px;
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
                border:1px solid black;
            }
           
            #myform {
    text-align: center;
    padding: 5px;
  
    margin: 2%;
}
.qty {
    width: 40px;
    height: 25px;
    text-align: center;
}
input.qtyplus { width:25px; height:25px;}
input.qtyminus { width:25px; height:25}
#next
{

    text-align:center;
    width:100%;
    background-color: Gainsboro;
    margin: 0;
    padding:16px 4px

}
#continue
{
    text-decoration:none;
    padding:10px 20px 10px 20px;
    background-color: green;
    border-radius: 3px;
    font-size: large;
    color:white;
}
#continue:hover
{
    background-color: #74C365;
    color:black;
}
#browse{
    color:blue;
    margin-left:1cm;
    margin-top:15px;
    text-decoration:none;

}
#browse:hover
{
    color:Purple;
}
#snackbar {
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
#cartitems:after
{
    content: '';
    display: block;
   
    position: relative;
    width: 50%;
    margin-right:34px;
    
    margin-top: 8px;
    
}
#plus:hover,#minus:hover
{
    cursor: pointer;
}
.div2
{
    padding:10px;
    background-color:#C79322;
    color:white;
}

            
        </style>
        <?php
      
      if(isset($_GET["status"]))
      {
        if((isset($_GET["status"]))==1)
        {
            ?><div id="snackbar">Product added to cart!</div>
            <script> var x = document.getElementById("snackbar");
          x.className = "show";
          setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);</script><?php 
        }
        else if((isset($_GET["status"]))==0)
        {
            ?><script>alert("Product already added!");</script><?php 
        }
      }
     
      ?>
    </head>
    
    <header class="header" id="myHeader">
    <center><img src="logofinal.png" width="8%" ></center>
    <hr>
    <?php
    $sql = "SELECT sum(productCount) FROM tbl_cart WHERE cartStatus=1 AND customerID=$userID";
    $q = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($q);

    $cartitemcount=$row[0];
    
    ?>

    <body>
    <center>
    <div style="display:flex">
    

        <div class="navigation">
        <a href="home.php" class="item">Home</a>
            <a href="dogs.php" class="item">Dogs</a>
            <a href="cats.php" class="item">Cats</a>
            <a href="consultation.php" class="item">Consultation</a>
            <a href="bookforvaccination.php" class="item">Vaccinate</a>
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
            <a href="mypets.php">My Pets</a>
            <a href="myappointments.php">Consultations</a>
            <a href="mypetvaccination.php">Vaccinations</a>
            <a href="addcustomeraddress.php">Manage Address</a>
            <a href="changepassword.php">Change Password</a>
            <a href="logout.php" onclick="return confirm('Are you sure you want to Logout?');">Log out</a>
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
    <div class="div2">
        <h2>&nbsp;&nbsp;Vaccination Schedule for Dogs</h2>
    </div>
   
   <div style="display:flex">
    <table>
        <tr id="tr1">
            <th style="background-color:Gainsboro">Dog Vaccine</th>
            <th style="background-color:Gainsboro;width:5cm;">Initial Puppy Vaccination<br>(at or under 16 weeks)</th>
            <th style="background-color:Gainsboro;">Initial Adult Dog Vaccination<br>(over 16 weeks)</th>
            <th style="background-color:Gainsboro;">Booster Recommendation</th>
            <th style="background-color:Gainsboro;text-align:center">Comments</th>
            
            
        </tr>
       
        <tr>   
          <td style="color:#00259E"><b>Rabies 1-year</b></td>
          <td>Can be administered in one dose, as early as 3 months of age. States regulate the age at which it is first administered.</td>
          <td>Single dose</td>
          <td>Annual boosters are required.</td>
          <td>Core dog vaccine. <br>Rabies is 100% fatal to dogs,<br> with no treatment available.<br> Prevention is key.</td>  
        </tr> 

        <tr>   
          <td style="color:#00259E"><b>Rabies 3-year</b></td>
          <td>Can be administered as one dose, as early as 3 months of age. States regulate the age at which it is first administered.</td>
          <td>Single dose</td>
          <td>A second vaccination is recommended after 1 year, then boosters every 3 years.</td>
          <td>Core dog vaccine.</td>  
        </tr> 
 
        
        <tr>   
          <td style="color:#00259E"><b>Distemper</b></td>
          <td>At least 3 doses, given between 6 and 16 weeks of age</td>
          <td>2 doses, given 3-4 weeks apart</td>
          <td>Puppies need a booster 1 year after completing their initial series, then all dogs need a booster every 3 years or more often.</td>
          <td>Core dog vaccine. Caused by an airborne virus, distemper is a severe disease that, among other problems, may cause permanent brain damage.</td>  
        </tr> 
        
        <tr>   
          <td style="color:#00259E"><b>Parvovirus</b></td>
          <td>At least 3 doses, given between 6 and 16 weeks of age</td>
          <td>2 doses, 3-4 weeks apart</td>
          <td>Puppies need a booster 1 year after completing the initial series, then all dogs need a booster every 3 years or more often.</td>
          <td>Core dog vaccine. Canine "parvo" is contagious, and can cause severe vomiting and bloody diarrhea. Parvo is usually fatal if untreated.</td>  
        </tr> 
        
        <tr>   
          <td style="color:#00259E"><b>Adenovirus,  type 1 (CAV-1, canine hepatitis)</b></td>
          <td>Depends on vaccine. For instance, the intranasal one just has to be boostered once a yea</td>
          <td>depnds on vaccine</td>
          <td>Puppies need a booster 1 year after completing the initial series, then all dogs need a booster every 3 years or more often.</td>
          <td>Core dog vaccine. Spread via infected saliva, urine and feces; canine hepatitis can lead to severe liver damage, and death</td>  
        </tr> 
        
        <tr>   
          <td style="color:#00259E"><b>Adenovirus, type 2 (CAV-2, kennel cough)</b></td>
          <td>At least 3 doses, between 6 and 16 weeks of age</td>
          <td> 2 doses, 3-4 weeks apart</td>
          <td>Puppies need a booster 1 year after completing the initial series, then all dogs need a booster every 3 years or more often.</td>
          <td>Core dog vaccine. Spread via coughs and sneezes.</td>  
        </tr> 
        
        <tr>   
          <td style="color:#00259E"><b>Parainfluenza</b></td>
          <td>Administered at 6-8 weeks of age, then every 3-4 weeks until 12-14 weeks old</td>
          <td>1 dose</td>
          <td>A booster may be necessary after 1 year, depending on manufacturer recommendations; revaccination every 3 years is considered protective.</td>
          <td>Non-core dog vaccine. Parainfluenza infection (not the same as canine influenza) results in cough, fever. It may be associated with Bordetella infection.</td>  
        </tr> 
        
        <tr>   
          <td style="color:#00259E"><b>Bordetella bronchiseptica (kennel cough)</b></td>
          <td>Depends on the vaccine type; one dose is usually needed for protection</td>
          <td>1 dose of the intranasal or oral product, or 2 doses of the injected product.</td>
          <td>Annual or 6-month boosters may be recommended for dogs in high-risk environments.</td>
          <td>Non-core dog vaccine. Not usually a serious condition, although it can be dangerous in young puppies. It is usually seen after activities like boarding or showing.</td>  
        </tr> 
        
        <tr>   
          <td style="color:#00259E"><b>Lyme disease</b></td>
          <td>1 dose, administered as early as 9 weeks, with a second dose 2-4 weeks later</td>
          <td>2 doses, 2-4 weeks apart</td>
          <td>May be needed annually, prior to the start of tick season</td>
          <td>Non-core dog vaccine. Generally recommended only for dogs with a high risk for exposure to Lyme disease-carrying ticks.</td>  
        </tr> 
        
        <tr>   
          <td style="color:#00259E"><b>Leptospirosis</b></td>
          <td>First dose as early as 8 weeks, with a second dose 2-4 weeks later</td>
          <td>2 doses, 2-4 weeks apart</td>
          <td>At least once yearly for dogs in high-risk areas</td>
          <td>Non-core dog vaccine. Vaccination is generally restricted to established risk areas. Exposure to rodents and standing water can lead to a leptospirosis infection</td>  
        </tr> 
        
        <tr>   
          <td style="color:#00259E"><b>Canine influenza</b></td>
          <td>First dose as early as 6-8 weeks; second dose 2-4 weeks later</td>
          <td>2 doses, 2-4 weeks apart</td>
          <td>Yearly</td>
          <td>Non-core dog vaccine.Similar to bordetella.</td>  
        </tr> 
 
      
       
   </table>
    
    
   </div>
   <br>
   <br>
   <div class="div2">
        <h2>&nbsp;&nbsp;Vaccination Schedule for Cats</h2>
    </div>
   
   <div style="display:flex">
    <table>
        <tr id="tr1">
            <th style="background-color:Gainsboro">Cat Vaccine</th>
            <th style="background-color:Gainsboro;width:5cm;">Initial Kitten Vaccination<br>(at or under 16 weeks)</th>
            <th style="background-color:Gainsboro;">Initial Adult Cat Vaccination<br>(over 16 weeks)</th>
            <th style="background-color:Gainsboro;">Booster Recommendation</th>
            <th style="background-color:Gainsboro;text-align:center">Comments</th>
            
            
        </tr>
       
        <tr>   
          <td style="color:#00259E"><b>Rabies</b></td>
          <td>Single dose as early as 8 weeks of age, depending on the product. Revaccinate 1 year later</td>
          <td>Single dose with yearly booster</td>
          <td>Required annually or every 3 years, depending on vaccine used. State regulations may determine the frequency and type of booster required.</td>
          <td>Core cat vaccine. Rabies is 100% fatal to cats, with no treatment available. Prevention is key.</td>  
        </tr> 

        <tr>   
          <td style="color:#00259E"><b>Feline Distemper (Panleukopenia)</b></td>
          <td>As early as 6 weeks, then every 3-4 weeks until 16 weeks of age</td>
          <td>2 doses, 3-4 weeks apart</td>
          <td>1 dose is given a year after the last dose of the initial series, then every 3 years.</td>
          <td>Core cat vaccine. Feline distemper is a severe contagious disease that most commonly strikes kittens and can cause death.</td>  
        </tr> 
 
        
        <tr>   
          <td style="color:#00259E"><b>Feline Herpesvirus</b></td>
          <td>As early as 6 weeks, then every 3-4 weeks until 16 weeks of age.</td>
          <td>2 doses, 3-4 weeks apart</td>
          <td>1 dose is given a year after the last dose of the initial series, then every 3 years.</td>
          <td>Core cat vaccine. Feline herpesvirus causes feline viral rhinotracheitis (FVR), a very contagious upper respiratory condition.</td>  
        </tr> 
        
        <tr>   
          <td style="color:#00259E"><b>Calicivirus</b></td>
          <td>As early as 6 weeks, then every 3-4 weeks until 16 weeks of age.</td>
          <td>2 doses, 3-4 weeks apart</td>
          <td>Puppies need a booster 1 year after completing the initial series, then all dogs need a booster every 3 years or more often.</td>
          <td>Core cat vaccine. A very contagious upper respiratory condition that can cause joint pain, oral ulcerations, fever, and anorexia.</td>  
        </tr> 
        
        <tr>   
          <td style="color:#00259E"><b>Feline Leukemia Virus (FeLV)</b></td>
          <td>As early as 8 weeks, then 3-4 weeks later.</td>
          <td>2 doses, 3-4 weeks apart.</td>
          <td>Every kitten should get a booster at one year.  If the cat doesn't go outside, no further vaccination is needed unless they are at higher risk. then annually.</td>
          <td>Non-core cat vaccine. Should test FeLV negative first. Transmitted via cat-to-cat contact. Can cause cancer, immunosuppressant.</td>  
        </tr> 
        
        <tr>   
          <td style="color:#00259E"><b>Bordetella</b></td>
          <td>As early as 4 weeks</td>
          <td>2 doses,1 year apart</td>
          <td>Annually</td>
          <td>Non-core cat vaccine. A contagious upper respiratory condition.</td>  
        </tr> 
   
       
   </table>
    
    
   </div>
   

<center>
<p style="font-size:12.8px;">© Copyright 2022  |  All rights reserved | www.pawsown.in</p>
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