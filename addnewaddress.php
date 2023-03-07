<?php

include "connection.php";
session_start();
if($_SESSION["loginStatus"])
{
if ($_SESSION["loginStatus"]==3)
{
$userID=$_SESSION["loginID"];
//$username=$_SESSION["userName"];
//$useremail=$_SESSION["userEmail"];
//$userphone=$_SESSION["userPhone"];
//echo $username;*/

$sel="SELECT * FROM tbl_userdetails WHERE userID='$userID'";
//$useremail="SELECT userEmail FROM tbl_userdetails WHERE userID='$userID'";
//$userphone="SELECT userPhone FROM tbl_userdetails WHERE userID='$userID'";
if ($result=$conn->query($sel))
{
    if($result->num_rows>0)
    {
        while($row=$result->fetch_array())
        {
            //echo $row["userID"];
            //echo $row["userName"];
            //echo $row["userEmail"];
            //echo $row["userPhone"];

            $username=$row["userName"];
            $useremail=$row["userEmail"];
            $userphone=$row["userPhone"];
            $userhousename=$row["userHousename"];
            $userpostoffice=$row["userPostOffice"];
            $userlocality=$row["userLocality"];
            $userdistrict=$row["userDistrict"];
            $usertown=$row["userTown"];
            $userpincode=$row["userPincode"];
         
            
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

?>
<?php
      
        if(isset($_GET["status"]))
        {
            if(($_GET["status"])==1)
            {
            ?>
            <div id="snackbar">Address updated successfully!</div>
    <script> var x = document.getElementById("snackbar");
  x.className = "show";
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);</script>
                <?php 
            }
                else if(($_GET["status"])==2)
                {
                    ?>
                     <div id="snackbar2">Address added successfully!</div>
    <script> var x = document.getElementById("snackbar2");
  x.className = "show";
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);</script>

            <?php
        }
    }
    ?>
    
<html>
    <head>
        <title>Customer Address</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            html,body
            {
                margin: 0;
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
            input[type=text],select
            {
                width: 80%;
                padding: 12px 20px;
                margin: 8px 0px;
                display: inline-block;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
                
            }
            input[name=cusname],input[name=cusemail]
            {
                cursor: not-allowed;
            }
            textarea
            {
                width: 50%;
                padding: 12px 20px;
                margin: 8px 0px;
                display: inline-block;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
                font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
                font-size: 15px;
            }

            input[type=submit]
            {
                width: 80.3%;
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
#snackbar2 {
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

#snackbar2.show {
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
    


        </style>
      
        <script type="text/javascript">
        function ValidateHouseName() 
        {
            var cusname = document.getElementById("cushousename").value;
            var lblError2 = document.getElementById("lblError2");
            lblError2.innerHTML = "";
            var expr = /^[a-zA-Z0-9 ]*$/;
            if (!expr.test(cusname)) 
            {
                lblError2.innerHTML = "Invalid Name";
                const button = document.querySelector('#submitbutton');
                button.disabled = true;
                button.style.cursor="not-allowed";
            }
            else
            {
                lblError2.innerHTML = "";
                const button = document.querySelector('#submitbutton');
                button.disabled = false;
                button.style.cursor="pointer";
            }  
        }

        function ValidatePostOffice() 
        {
            var cuspostoffice = document.getElementById("cuspostoffice").value;
            var lblError5 = document.getElementById("lblError5");
            lblError5.innerHTML = "";
            var expr = /^[a-zA-Z ]*$/;
            if (!expr.test(cuspostoffice)) 
            {
                lblError5.innerHTML = "Invalid";
                const button = document.querySelector('#submitbutton');
                button.disabled = true;
                button.style.cursor="not-allowed";
            }
            else
            {
                lblError5.innerHTML = "";
                const button = document.querySelector('#submitbutton');
                button.disabled = false;
                button.style.cursor="pointer";
            }  
        }
        function ValidateDistrict() 
        {
            var cusdistrict = document.getElementById("cusdistrict").value;
            var lblError8 = document.getElementById("lblError8");
            lblError8.innerHTML = "";
            var expr = /^[a-zA-Z ]*$/;
            if (!expr.test(cusdistrict)) 
            {
                lblError8.innerHTML = "Invalid";
                const button = document.querySelector('#submitbutton');
                button.disabled = true;
                button.style.cursor="not-allowed";
            }
            else
            {
                lblError8.innerHTML = "";
                const button = document.querySelector('#submitbutton');
                button.disabled = false;
                button.style.cursor="pointer";
            }  
        }

        function ValidateLocality() 
        {
            var cuslocality= document.getElementById("cuslocality").value;
            var lblError7 = document.getElementById("lblError7");
            lblError7.innerHTML = "";
            var expr = /^[a-zA-Z ]*$/;
            if (!expr.test(cuslocality)) 
            {
                lblError7.innerHTML = "Invalid";
                const button = document.querySelector('#submitbutton');
                button.disabled = true;
                button.style.cursor="not-allowed";
            }
            else
            {
                lblError7.innerHTML = "";
                const button = document.querySelector('#submitbutton');
                button.disabled = false;
                button.style.cursor="pointer";
            }  
        }


        function ValidateTown() 
        {
            var custown= document.getElementById("custown").value;
            var lblError9 = document.getElementById("lblError9");
            lblError9.innerHTML = "";
            var expr = /^[a-zA-Z ]*$/;
            if (!expr.test(custown)) 
            {
                lblError9.innerHTML = "Invalid";
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
        function ValidatePincode()
        {
            var cuspincode= document.getElementById("cuspincode").value;
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
    
    
    <header>
        <center><img src="logofinal.png" width="8%" >
        <hr> 
   
    <body>
        <center>
        <div style="display:flex">
        <form action="searchproducts.php"  class="live-search-box" id="search-form" method="POST">
        <input type="button" id="search-speech" value="S" title="start recording" style="margin-left:0.07cm;background-color:transparent;border:transparent;color:transparent;padding:4px 10px 4px 4px;" disabled/>
            <input id="s" type="search" name="search" placeholder="Search products...">
            <input type="submit" name="submit" style="background-color:transparent;border:transparent;color:transparent;padding:0.2px;margin:0px">
            
        </form>
       
        <div class="navigation">
            <a href="home.php" class="item">Home</a>
            <a href="dogs.php" class="item">Dogs</a>
            <a href="cats.php" class="item">Cats</a>
            <a href="consultation.php" class="item">Consultation</a>
            <a href="bookforvaccination.php" class="item">Vaccinate</a>
            <a href="contact.php" class="item">Feedback</a>
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
<center>
        <div id="div2" style="background-image: url('dogcat4.png');">
        <fieldset style="width:50%;border:2px solid transparent;">
            <h4>Your Address</h4>
            <hr>
            <br>
            <?php if($userhousename=="")
            {?>
            <form action="submitnewaddress.php" method="POST" id="form">
                <?php } 
                else
                {?>
           
            <form action="updatecustomeraddress.php" method="POST" id="form">
                <?php } ?>
           
                <!--<input type="text" name="cusname" value="<?php ?>// echo $username;?>"placeholder="Enter your name" size="50cm" readonly>
                <input type="text" name="cusemail" value="<?php //echo $useremail;?>"placeholder="E-mail ID" size="30cm" readonly><br>-->
               
                
          

                <input type="text" name="cushousename" id="cushousename" 
                onkeyup="ValidateHouseName();" value="<?php if ($userhousename=="") echo ""; else echo $userhousename ?>" 
                placeholder="House Name/Flat No./Apartment No." title="Alphabets and Numbers only"  
                style="text-transform:capitalize" size="30cm" required><br>
                <span id="lblError2" style="color: red;font-size:small"></span>
                <div style="display:flex"><center>
                    

                <input type="text" id="cuspostoffice" name="cuspostoffice" 
                placeholder="Post Office" value="<?php if ($userpostoffice=="") echo ""; else echo $userpostoffice ?>" 
                onkeyup="ValidatePostOffice();" title="Alphabets only"  size="30cm" 
                style="width:40%;margin-left:0.8cm;margin-right:0.15cm;text-transform:capitalize" required>&nbsp;

                <input type="text" id="cuslocality" name="cuslocality" placeholder="Locality" 
                value="<?php if ($userlocality=="") echo ""; else echo $userlocality ?>" 
                onkeyup="ValidateLocality();" title="Alphabets only" size="30cm" style="width:40%;text-transform:capitalize" required><br>

                </div>
                
                <span id="lblError5" style="color: red;font-size:small"></span>
            
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                <span id="lblError7" style="color: red;font-size:small"></span>
               <br>
                
             
                <?php if ($userdistrict=="") echo
                
              
                "<select name='cusdistrict' id='district' required>
                        <option value='' disabled selected hidden>Select Distrcit</option>
                        <option value='Thiruvananthapuram' class='drop1'>Thiruvananthapuram</option>
                        <option value='Kollam' class='drop1'>Kollam</option>
                        <option value='Pathanamthitta' class='drop1'>Pathanamthitta</option>
                        <option value='Alappuzha' class='drop1'>Alappuzha</option>
                        <option value='Kottayam' class='drop1'>Kottayam</option>
                        <option value='Idukki' class='drop1'>Idukki</option>
                        <option value='Ernakula' class='drop1'>Ernakulam</option>
                        <option value='Thrissur' class='drop1'>Thrissur</option>
                        <option value='Palakkad' class='drop1'>Palakkad</option>
                        <option value='Malappuram' class='drop1'>Malappuram</option>
                        <option value='Kozhikode' class='drop1'>Kozhikode</option>
                        <option value='Malappuram' class='drop1'>Malappuram</option>
                        <option value='Kannur' class='drop1'>Kannur</option>
                        <option value='Kasargod' class='drop1'>Kasargod</option>
                </select><br>";

                else
                {  ?>
                
                <input type="text" name="cusdistrict" id="cusdistrict" onkeyup="ValidateDistrict();" 
                value="<?php if($userdistrict=="") echo ""; else echo $userdistrict?>" 
                placeholder="District" title="Alphabets only"  
                style="text-transform:capitalize" size="30cm" required><br>
                <span id="lblError8" style="color: red;font-size:small"></span>
                <?php } ?>


                <div style="display:flex"><center>
                <input type="text" name="custtown" id="custown" placeholder="City/Town"  
                value="<?php if ($usertown=="") echo ""; else echo $usertown?>" 
                onkeyup="ValidateTown();" size="30cm" title="Alphabets only"  
                style="width:40%;margin-left:0.8cm;margin-right:0.14cm;text-transform:capitalize" required>&nbsp;
                
                <input type="text" name="custpincode" id="cuspincode"  
                onkeyup="ValidatePincode();" placeholder="ZIP/Postal Code" 
                value="<?php if ($userpincode=="") echo ""; else echo $userpincode;?>" 
                title="Numbers only" maxlength=6 size="30cm" style="width:40%;" required><br>    
              
            </div>
            <span id="lblError9" style="color: red;font-size:small"></span>
            
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                <span id="lblError6" style="color: red;font-size:small"></span>
                
               
                <br>

                <?php if($userhousename=="")
                {?>
                
                <input type="submit" value="Save " name="submitaddress" id="submitbutton">
                <?php }
                else{
                    ?>
                    <input type="submit" value="Update" name="submitaddress" id="submitbutton"><br>
                    <!--<a style="color:red;font-size:18px;background-color:white;padding:2px" href="deletemyaddress.php">Delete my saved address</a>-->
               <?php  } ?>


            </form>
            </fieldset>   
        </div>  
        <p style="font-size:12.8px;">© Copyright 2022  |  All rights reserved | www.pawsown.in</p>
        </center>
    </body>
    
</html>
<?php
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