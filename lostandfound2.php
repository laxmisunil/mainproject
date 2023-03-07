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
          <div id="snackbar">Pet registered successfully!</div>
            <script> var x = document.getElementById("snackbar");
          x.className = "show";
          setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);</script>

          <?php
          }
          else if(($_GET["status"])==2)
          {
          ?>
          <div id="snackbar2">Pet deleted Successfully!</div>
            <script> var x = document.getElementById("snackbar2");
          x.className = "show";
          setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);</script>

          <?php
        }
        else if(($_GET["status"])==3)
        {
          ?>
           <div id="snackbar3">Pet updated successfully!</div>
            <script> var x = document.getElementById("snackbar3");
          x.className = "show";
          setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);</script>

          <?php
          }
      }

      ?>

<html>
    <head>
        <title>My Pets</title>
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
                margin-left: 1cm;
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
                border: 1px solid #ddd;
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
  background-color:green;
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
#showupcoming2
{
    padding:10px;
    background-color:goldenrod;
    border-radius: 5px;
    border:2px transparent;
    color:white;
}
#showupcoming2:hover
{
    background-color: Silver;
    cursor:pointer;
    color:black;
}
#s
            {
                border-top:none;
                border-left:none;
                border-right: none;
                border-bottom:1px solid black;
                margin-top:20px;
                margin-left: 0px;
                padding: 4px 32px 4px 2px;
                /*background-image: url("search-icon.webp");*/
                background-size: 10%;
                background-repeat: no-repeat;   
            }
            #search-speech
{
    background: url('microphone-voice-interface-symbol.png');
background-position:center;
background-repeat:no-repeat;
background-size: cover;

}
#search-speech:hover
{
    cursor: pointer;
}
#generateID
{
    padding:4px;
    background-color:royalblue;
    border:2px solid royalblue;
    color:white;
    border-radius: 3px;
}
#generateID:hover
{
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
    cursor: pointer;
}
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;

  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}

.cardbutton {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}
.mf
{
    padding:15px;
    
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
<script>
var voice = {
  // (A) INIT SPEECH RECOGNITION
  sform : null, // HTML SEARCH FORM
  sfield : null, // HTML SEARCH FIELD
  sbtn : null, // HTML VOICE SEARCH BUTTON
  recog : null, // SPEECH RECOGNITION OBJECT
  init : function () {
    // (A1) GET HTML ELEMENTS
    voice.sfrom = document.getElementById("search-form");
    voice.sfield = document.getElementById("s");
    voice.sbtn = document.getElementById("search-speech");
 
    // (A2) GET MICROPHONE ACCESS
    navigator.mediaDevices.getUserMedia({ audio: true })
    .then((stream) => {
      // (A3) SPEECH RECOGNITION OBJECT + SETTINGS
      const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
      voice.recog = new SpeechRecognition();
      voice.recog.lang = "en-US";
      voice.recog.continuous = false;
      voice.recog.interimResults = false;
 
      // (A4) POPUPLATE SEARCH FIELD ON SPEECH RECOGNITION
      voice.recog.onresult = (evt) => {
        let said = evt.results[0][0].transcript.toLowerCase();
        voice.sfield.value = said;
        // voice.sform.submit();
        // OR RUN AN AJAX/FETCH SEARCH
        voice.stop();
      };
 
      // (A5) ON SPEECH RECOGNITION ERROR
      voice.recog.onerror = (err) => { console.error(err); };
 
      // (A6) READY!
      voice.sbtn.disabled = false;
      voice.stop();
    })
    .catch((err) => {
      console.error(err);
      voice.sbtn.value = "";
    });
  },
 
  // (B) START SPEECH RECOGNITION
  start : () => {
    voice.recog.start();
    voice.sbtn.onclick = voice.stop;
    voice.sbtn.value = "S";
  },
 
  // (C) STOP/CANCEL SPEECH RECOGNITION
  stop : () => {
    voice.recog.stop();
    voice.sbtn.onclick = voice.start;
    voice.sbtn.value = "S";
  }
};
window.addEventListener("DOMContentLoaded", voice.init);
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
    <form action="searchproducts.php"  class="live-search-box" id="search-form" method="POST">
        <input type="button" id="search-speech" value="S" title="start recording" style="margin-left:0.67cm;background-color:transparent;border:transparent;color:transparent;padding:4px 10px 4px 4px;" disabled/>
            <input id="s" type="search" name="search" placeholder="Search products...">
            <input type="submit" name="submit" style="background-color:transparent;border:transparent;color:transparent;padding:0.2px;margin:0px">
            
        </form>

        <div class="navigation">
            <a href="home.php" class="item">Home</a>
            <a href="dogs.php" class="item">Dogs</a>
            <a href="cats.php" class="item">Cats</a>
            <a href="consultation.php" class="item" >Consultation</a>
            <a href="bookforvaccination.php" class="item">Vaccinate</a>
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
            <a href="mypets.php">My Pets</a>
            <a href="myappointments.php">Consultations</a>
            <a href="mypetvaccination.php">Vaccinations</a>
            <a href="addcustomeraddress.php">Manage Address</a>
            <a href="changepassword.php">Change Password</a>
            <a href="logout.php" onclick="return confirm('Are you sure you want to Logout?');">Log out</a>
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
?>
    <div class="div2" >
    <center><h4>Lost & Found</h4></center>
</div>
<div style="display:flex">
&nbsp;
<button onclick="window.location.href='registeryourpet.php'"id="showupcoming">+ Register new pet</button>&nbsp;
<button onclick="window.location.href=''"id="showupcoming" >My Pets</button>&nbsp;
<button onclick="window.location.href='lostandfound.php'" style="background-color:Silver;color:black" id="showupcoming2">Lost & Found</button>

</div><br>
<h2 class="mf">Missing</h2>
<?php
$sel="SELECT * FROM tbl_pet WHERE petStatus=1;";
if($result=$conn->query($sel))
{
    if($result->num_rows>0)
    {
        echo "<table>";
        $i=1;
    
        while($row=$result->fetch_array())
        {
            if($i%5==0)
            {
                echo "</tr><tr>";
            }
           
?>

<td>
<center>
  
    <h2><?php 
    $i++;
    echo $row["petID"];
    ?></h2>

</center></td>






<?php
  
}
echo "</table>";
 $result->free();
}
}

?>

</div>

</div>

<br><br><center>
    
</body>
<script type="text/javascript">
    (function(d, m){
        var kommunicateSettings = 
            {"appId":"17b9fd1b43fb3e5ad89c3e9b431ba8591","popupWidget":true,"automaticChatOpenOnNavigation":true};
        var s = document.createElement("script"); s.type = "text/javascript"; s.async = true;
        s.src = "https://widget.kommunicate.io/v2/kommunicate.app";
        var h = document.getElementsByTagName("head")[0]; h.appendChild(s);
        window.kommunicate = m; m._globals = kommunicateSettings;
    })(document, window.kommunicate || {});
/* NOTE : Use web server to view HTML files as real-time update will not work if you directly open the HTML file in the browser. */
</script>

</html>