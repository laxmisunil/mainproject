<?php
include "connection.php";

session_start();
if($_SESSION["loginStatus"])
{
if ($_SESSION["loginStatus"]==3)
{
$userID=$_SESSION["loginID"];
$username="SELECT * FROM tbl_userdetails WHERE userID='$userID'";
if ($result=$conn->query($username))
{
    if($result->num_rows>0)
    {
        while($row=$result->fetch_array())
        {
            $username=$row["userName"]; 
            $userEmail=$row["userEmail"];
            $userPhone=$row["userPhone"];  
            $userHousename=$row["userHousename"]; 
            $userTown=$row["userTown"];
            $userDistrict=$row["userDistrict"];
            $userPincode=$row["userPincode"];
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
        <title>Book for Vaccination</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script data-require="jquery@3.1.1" data-semver="3.1.1" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="jquery-3.2.1.min.js"></script>
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
                margin-left: 1cm;
                margin-right: 1.5cm; 
                margin-bottom:0.4cm; 
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
            #email:hover
            {
                cursor:not-allowed;
            }
            #phone:hover
            {
                cursor:not-allowed;
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
            body
            {
                background-color: #f2f2f2;
                text-align: center;
                font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            }
            input[type=text],input[type=password],select,input[type="file"],input[type="number"],input[type="email"],input[type="date"],input[type="time"]
            {
                width: 80%;
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
            }
            input[type=submit]
            {
                width: 80%;
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

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
  #header
{
  
    color:black;
    padding: 6px;
    margin: 0;
    margin-top: 0;
    padding-right: 12px;
    
}
html,body
{
    margin: 0;
    padding: 0;
}
}
#snackbar,#snackbar3{
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
#snackbar2{
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
#snackbar.show,#snackbar2.show,#snackbar3.show {
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
  










            
        </style>
        <?php
      
      if(isset($_GET["status"]))
      {
        if((isset($_GET["status"]))==1)
        {
            ?><div id="snackbar">Vaccine not available! Please try again later.</div>
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
    

    <script type="text/javascript">
    function ValidateTown() {
        
        var fullname = document.getElementById("town").value;
        var lblError2 = document.getElementById("lblError2");
        lblError2.innerHTML = "";
        var expr = /^[a-zA-Z ]*$/;
        if (!expr.test(fullname))
        {
            lblError2.innerHTML = "Invalid  Format";
            const button = document.querySelector('#submitbutton');
            button.disabled = true;
            button.style.cursor="not-allowed";
          
            
        }
        else if(expr.test(fullname))
        {
            lblError2.innerHTML = "";
            const button = document.querySelector('#submitbutton');
            button.disabled = false;
            button.style.cursor="pointer";
       
        }
       
 
    }
    function ValidatePincode()
        {
            var cuspincode= document.getElementById("pincode").value;
            var lblError6 = document.getElementById("lblError6");
            lblError6.innerHTML = "";
            var expr = /([6]{1}[0-9]{5}|[1-9]{1}[0-9]{3}[0-9]{3})/;
            if (!expr.test(cuspincode)) 
            {
                lblError6.innerHTML = "Invalid Pincode";
                const button = document.querySelector('#submitbutton');
                button.disabled = true;
                button.style.cursor="not-allowed";
            }
            else
            {
                lblError6.innerHTML = "";
                const button = document.querySelector('#submitbutton');
                button.disabled = false;
                button.style.cursor="pointer";
            } 

        }
        function ValidateHouseName() 
        {
            var cusname = document.getElementById("housename").value;
            var lblError9 = document.getElementById("lblError9");
            lblError9.innerHTML = "";
            var expr = /^[a-zA-Z0-9 ]*$/;
            if (!expr.test(cusname)) 
            {
                lblError9.innerHTML = "Invalid Name";
                const button = document.querySelector('#submitbutton');
                button.disabled = true;
                button.style.cursor="not-allowed";
            }
            else
            {
                lblError9.innerHTML = "";
                const button = document.querySelector('#submitbutton');
                button.disabled = false;
                button.style.cursor="pointer";
            }  
        }
</script>


<script>
    function checklimit()
    {
            var today = new Date();
            var dd = today.getDate()+1;
            var mm = today.getMonth()+1; //January is 0 so need to add 1 to make it 1!
            var yyyy = today.getFullYear();
            if(dd<10)
            {
                dd='0'+dd
            } 
            if(mm<10)
            {
                mm='0'+mm+1
            } 

            today = yyyy+'-'+mm+'-'+dd;
            document.getElementById("date").setAttribute("min", today);

        }
            </script>
            <script>
                function speechtranscript()
                {
        var speech = true;
        window.SpeechRecognition = window.SpeechRecognition
                        || window.webkitSpeechRecognition;
  
        const recognition = new SpeechRecognition();
        recognition.interimResults = true;
        const words = document.querySelector('.words');
        words.appendChild(s);
  
        recognition.addEventListener('result', e => {
            const transcript = Array.from(e.results)
                .map(result => result[0])
                .map(result => result.transcript)
                .join('')
  
            document.getElementById("s").innerHTML = transcript;
            console.log(transcript);
        });
          
        if (speech == true) {
            recognition.start();
            recognition.addEventListener('end', recognition.start);
        }
    }
    </script>
    <script>/*
         $(document).ready(function(){ 

$("#petname").focusout(function(){
    alert("Hi");

   var petname= $(this).val().trim();
   var vaccine = $('#vaccine').val().trim();

   if(petname != ''){
   // header("LOCATION:LOGIN.PHP");
    alert("Hello:");

      $.ajax({
         url: 'getvaccines.php',
         type: 'post',
         data: {petname: petname,vaccine:vaccine},
         success: function(response){
           // alert(response);

           // $('#vaccine').html(response);

          }
      });
   }else{
      //$("#uname_response2").html("");
      alert("failed");
   }

 });

});
       */

    </script>
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
    <form action="searchproducts.php"  class="live-search-box" id="search-form" method="POST">
        <input type="button" id="search-speech" value="S" title="start recording" style="margin-left:0.09cm;background-color:transparent;border:transparent;color:transparent;padding:4px 10px 4px 4px;" disabled/>
            <input id="s" type="search" name="search" placeholder="Search products...">
            <input type="submit" name="submit" style="background-color:transparent;border:transparent;color:transparent;padding:0.2px;margin:0px">
            
        </form>

        <div class="navigation">
            <a href="home.php" class="item"  >Home</a>
            <a href="dogs.php" class="item">Dogs</a>
            <a href="cats.php" class="item">Cats</a>
            <a href="consultation.php" class="item" >Consultation</a>
            <a href="bookforvaccination.php" class="item"  id="active">Vaccinate</a>
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
    </center>
    <div style="display:flex;" >
    <div>
    <img src="petvaccine.jpg" style="margin-top:1cm;margin-right:1cm">
    <div style="margin-left:1cm;text-align:left;color:#848884">
    <h1>Now Your Dog Or Cat Vaccination Can Be Done for Free </h1><h2>From The Comfort Of Your Home</h2>
    <p>Dog, Cat vaccinations are an important part of your
    pet's overall wellness plan and are required to prevent life-threatening infections.
    We provide all of the necessary core and non-core vaccines for your pet.</p></div>
    <div style="display:flex">
    <div>
    <p style="text-align:left;color:#848884;margin-left:1cm">Dog Vaccinations : Rabies, Distemper, Parvovirus, Adenovirus type 1, Adenovirus type, Parainfluenza, Bordetella Bronchiseptica, Lyme Disease, Leptospirosis, Canine Influenza</p>
    
    <p style="text-align:left;color:#848884;margin-left:1cm">Cat Vaccinations : Rabies, Feline Distemper(Panleukopenia), Feline Herpesvirus, Calicivirus, Feline Leukemia Virus, Bordetella</p>
   
    <p> <a href="vaccination.php">Click here to know about vaccination schedule</a></p>
    </div>

    </div>
    </div>

   
    <div>
    <fieldset style="background-color:white;padding-bottom: 0.2cm;margin-right:0.8cm;margin-top:1cm">
                <form action="vaccinebooked.php"  method="POST" target="_self">
                <center>
                    <h2>Book for Vaccination</h2>
                   
                    <select name="petname" id="petname" required> 
                    <option value="" disabled selected hidden>--Select Pet --</option>
                    

                    <?php
$sel="SELECT * FROM tbl_pet WHERE customerID='$userID' AND petStatus=1";
if ($result=$conn->query($sel))
{
    if($result->num_rows>0)
    {
        while($row=$result->fetch_array())
        {
            ?>
            <option>
            <?php
            echo $row["petName"];
            $petname=$row["petName"];
            ?>
            </option>
            <?php
        }

    }
    else
    {
       
    }
}
else
{
    echo "ERROR";
}  
?>
                    </select>

                    <select id="vaccine" name="vaccine" required>   
                    <option value="" disabled selected hidden>--Select Vaccine --</option>                
                 
                    <?php
                    $vacc="SELECT * FROM tbl_vaccinedetails WHERE vaccineStatus=1 AND vaccineAvailability>0 ORDER BY vaccineName";
if ($result2=$conn->query($vacc))
{
    if($result2->num_rows>0)
    {
        while($row=$result2->fetch_array())
        {
            ?>
            <option>
            <?php
            echo $row["vaccineName"];
            $vaccinename=$row["vaccineName"];
            ?>
            </option>
            <?php
        }

    }
    else
    {
       
    }
}
else
{
    echo "ERROR";
}  
?>

             
                    </select><br>

                    <input type="text"  placeholder="House/Apt No." id="housename" name="housename" onkeyup="ValidateHouseName();" 
                    value="<?php if ($userHousename=="") echo ""; else echo $userHousename ?>" required><br>
                    <span id="lblError9" style="color: red;font-size:small"></span>
                   

                   
                    <input type="text"  placeholder="Town" id="town" name="town" onkeyup="ValidateTown();" 
                    value="<?php if ($userTown=="") echo ""; else echo $userTown?>"required><br>
                    <span id="lblError2" style="color: red;font-size:small"></span>
                  

                    <input type="text"  placeholder="ZIP/Postal Code" id="pincode" maxlength="6" name="pincode" onkeyup="ValidatePincode();" 
                    value="<?php if ($userPincode=="") echo ""; else echo $userPincode;?>" required><br>
                    <span id="lblError6" style="color: red;font-size:small"></span>
                 
                    

                    <input type="date"  placeholder="Date" id="date" name="date" onfocus="checklimit()" max="2023-03-20" required>
                    <select id="time" name="time" required>
                    <option value="" disabled selected hidden>--Select Time--</option>
                        <option value="9">09:30 am to 12:30 pm</option>
                        <option value="2">02:30 pm to 05:30 pm</option>

                    </select>


                    <input type="submit" value="Confirm"  id="submitbutton"><br><br>
                  
                    
                </form>
            </fieldset>
            <br><br>
            <p>Share this on : </p>
            <p><i class="fa fa-facebook-square" aria-hidden="true" style="color:royalblue;"></i>
            <i class="fa fa-twitter" aria-hidden="true" style="color:#0096FF"></i>
            <i class="fa fa-whatsapp" aria-hidden="true" style="color:#32cd32"></i>
        </p>

        <p>Contact us : </p>
            <p><i class="fa fa-phone" aria-hidden="true"></i>+91 86064 65951 &nbsp;|&nbsp;
            <i class="fa fa-envelope" aria-hidden="true"></i>&nbsp; pawsownindia@gmail.com</p>
        
    </div>


    
    </div>
    
   
 
   

<center>
<p style="font-size:12.8px;">© Copyright 2022  |  All rights reserved | www.pawsown.in</p>
</center>
<script>
   function checklimit()
                {
            var today = new Date();
            var dd = today.getDate()+1;
            var mm = today.getMonth()+1; //January is 0 so need to add 1 to make it 1!
            var yyyy = today.getFullYear();
            if(dd<10)
            {
                dd='0'+dd
            } 
            if(mm<10)
            {
                mm='0'+mm
            } 
            today = yyyy+'-'+mm+'-'+dd;
            document.getElementById("date").setAttribute("min", today);
        }
            </script>
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
<script type="text/javascript">
    (function(d, m){
        var kommunicateSettings = 
            {"appId":"187d95b6268d62e9cf87c4544de0a4677","popupWidget":true,"automaticChatOpenOnNavigation":true};
        var s = document.createElement("script"); s.type = "text/javascript"; s.async = true;
        s.src = "https://widget.kommunicate.io/v2/kommunicate.app";
        var h = document.getElementsByTagName("head")[0]; h.appendChild(s);
        window.kommunicate = m; m._globals = kommunicateSettings;
    })(document, window.kommunicate || {});
/* NOTE : Use web server to view HTML files as real-time update will not work if you directly open the HTML file in the browser. */
</script>
</script>
     <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script type="text/javascript" src="frontend-script.js"></script>
  <script>
     $( function() {
    $( "#s" ).autocomplete({
    source: 'backend-script.php'  
    });
});
    </script>

    
</body>
</html>