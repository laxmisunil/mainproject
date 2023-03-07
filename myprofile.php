<?php
include "connection.php";
session_start();
if($_SESSION["loginStatus"])
{
    if ($_SESSION["loginStatus"]==3)
    {

$userID=$_SESSION["loginID"];
$sel="SELECT * FROM tbl_userdetails WHERE userID='$userID'";
if ($result=$conn->query($sel))
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

?>
<?php
      
      if(isset($_GET["status"]))
      {
        if(($_GET["status"])==1)
        {
          ?>
          <div id="snackbar">Profile updated successfully!</div>
    <script> var x = document.getElementById("snackbar");
  x.className = "show";
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);</script>
     
          <?php
      }
      else if(($_GET["status"])==3)
      {
      ?>
          <script>
              alert("Couldn't update!Email/Phone already taken");
          </script>
     
          <?php
          }
      }

      
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
        <title>My Profile</title>
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
#deleteaccount
{
    font-size:17px;
    padding:5px;
    background-color: red;
    color:white;
    border-radius: 4px;

}
#showupcoming3
{
	padding:7px;
	border-radius: 20px;
	border:transparent;
	font-size: 24px;	
    margin-left: 0.5cm;
}
#showupcoming3:hover
{
	cursor: pointer;
	background-color: whitesmoke;

}
#showupcoming:hover
{
    background-color: Silver;
    cursor:pointer;
    color:black;
}


        </style>
      
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="jquery-3.2.1.min.js"></script>
        <script src="script.js"></script>
        <script type="text/javascript">
    function ValidateName() {
        
        var fullname = document.getElementById("uname").value;
        var lblError2 = document.getElementById("lblError2");
        lblError2.innerHTML = "";
        var expr = /^[a-zA-Z ]*$/;
        if (!expr.test(fullname))
        {
            lblError2.innerHTML = "Invalid Name Format";
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
</script>
<script type="text/javascript">
    function ValidateEmail() {
        var email = document.getElementById("email").value;
        var lblError = document.getElementById("lblError");
        lblError.innerHTML = "";
        var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        
        if (!expr.test(email))
        {
            lblError.innerHTML = "Invalid email address.";
            const button = document.querySelector('#submitbutton');
            button.disabled = true;
            button.style.cursor="not-allowed";
          
            
        }
        else if(expr.test(email))
        {
            lblError.innerHTML = "";
            const button = document.querySelector('#submitbutton');
            button.disabled = false;
            button.style.cursor="pointer";
       
        }
    }
             
    
    
</script>
<script type="text/javascript">
    function ValidatePhone() {
        var phone = document.getElementById("phone").value;
        var lblError3 = document.getElementById("lblError3");
        lblError3.innerHTML = "";
        var expr = /^[6-9]{1}[0-9]{9}/;

        if (!expr.test(phone))
        {
            lblError3.innerHTML = "Invalid Phone number";
            const button = document.querySelector('#submitbutton');
            button.disabled = true;
            button.style.cursor="not-allowed";
          
            
        }
        else if(expr.test(phone))
        {
            lblError3.innerHTML = "";
            const button = document.querySelector('#submitbutton');
            button.disabled = false;
            button.style.cursor="pointer";
       
        }
    }
</script>

        <script>
        $(document).ready(function()
        {
            $("#email").keyup(function()
            {
                var username = $(this).val().trim();
                if(username != '')
                {
                    $.ajax(
                    {
                        url: 'usercheck2.php',
                        type: 'post',
                        data: {username: username},
                        success: function(response)
                        {
                            $('#uname_response').html(response);
                        }
                    });
                }
                else
                {
                    $("#uname_response").html("");
                }
            });

        });  
        </script>

        <script>
        $(document).ready(function()
        {
            $("#phone").keyup(function()
            {
                var username = $(this).val().trim();
                if(username != '')
                {
                    $.ajax(
                    {
                        url: 'usercheck3.php',
                        type: 'post',
                        data: {username: username},
                        success: function(response)
                        {
                            $('#uname_response2').html(response);
                        }
                    });
                }
                else
                {
                    $("#uname_response2").html("");
                }
            });
        });
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


        <!--<div id="div2" style="background-image: url('dogcat4.png')">-->
        <div id="div2">
        <button onclick="window.history.back();" id="showupcoming3"><i class="fa fa-arrow-left" aria-hidden="true"></i></button>&nbsp;
        <center><fieldset style="width:50%;text-align:center;margin-left:8cm;margin-right:8cm;border:2px solid black">
        <h4>Profile</h4>
        <hr style="height:0.5px">
    
    
        <?php if ($_SESSION["loginStatus"]==3)
                {
                ?>
                     <form action="profileupdation.php" method="POST">
                <?php
                }
                else
                {
                ?>
                  <form action="login.php" method="POST">
                <?php
                }
                ?>
              
            
              
                <input type="text" id="uname" value="<?php echo  $username ?>" name="custoname" pattern="^[a-zA-Z ]*$" size="50cm" onkeyup="ValidateName();" title="Must contain only alphabets and spaces" required><br>
                <div><span id="lblError2" style="color: red;font-size:small"></span></div>

                <input type="text" id="email" size="15cm" pattern="^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$" onkeyup="ValidateEmail();" value="<?php echo $useremail ?>"  name="custoemail" size="30cm"  required><br>
                <div style="display:flex;">
                    <span id="lblError" style="color: red;font-size:small;margin-left:2cm"></span>
                    <div id="uname_response" style="font-size:small;text-align:left"></div>
                </div>

                <input type="text" id="phone" pattern="[6-9]{1}[0-9]{9}" size="30cm" minlength="10" maxlength="10" onkeyup="ValidatePhone();" value="<?php echo $userphone ?>" name="custophone" size="30cm"  required>
                <div style="display:flex">
                    <span id="lblError3" style="color: red;font-size:small;margin-left:6.5cm"></span>
                    <center>
                    <div id="uname_response2" style="font-size:small;text-align:center;"></div></center>
                    </div>
         
                <input type="submit" id="submitbutton" value="Update" name="updatedata"  style="margin-bottom:0px"><br><br>
                <a href="deleteaccount.php"><font color="red" size="3px">DELETE MY ACCOUNT</font></a>

              
            </form  style="margin-bottom:1px">
            </fieldset style="margin-bottom:1px">
           
        </div>  
                <center>
        <p style="font-size:12.8px;">© Copyright 2022  |  All rights reserved | www.pawsown.in</p>
        </center>
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