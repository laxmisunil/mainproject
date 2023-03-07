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

    
<html>
    <head>
        <title>Register your Pet</title>
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
            input[type=text],select, input[type=number],input[type=file]
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
#snackbar1 {
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

#snackbar1.show {
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
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="jquery-3.2.1.min.js"></script>
        <script src="script.js"></script>
        <script>
            $(document).ready(function(){

$("#petlicense").focusout(function(){

   var petlicense = $(this).val().trim();

   if(petlicense != ''){

      $.ajax({
         url: 'petcheck.php',
         type: 'post',
         data: {petlicense: petlicense},
         success: function(response){

             $('#uname_response').html(response);
             if(response=="<span style='color: red;text-align:left'>&nbsp;Pet already registered.</span>")
             {
                const button = document.querySelector('#submitbutton');
                button.disabled = true;
                button.style.cursor="not-allowed";

             }
             else
             {
                const button = document.querySelector('#submitbutton');
                button.disabled = false;
                button.style.cursor="pointer";

             }

          }
      });
   }else{
      $("#uname_response").html("");
   }

 });

});
           
</script>
      
        <script type="text/javascript">
        function ValidatePetName() 
        {
            var petname = document.getElementById("petname").value;
            var lblError2 = document.getElementById("lblError2");
            lblError2.innerHTML = "";
            var expr = /^[a-zA-Z ]*$/;
            if (!expr.test(petname)) 
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

        function ValidateLicense() 
        {
            var petlicense = document.getElementById("petlicense").value;
            var lblError5 = document.getElementById("lblError5");
            lblError5.innerHTML = "";
            var expr = /^[A-Z0-9/]*$/;
            if (!expr.test(petlicense)) 
            {
                lblError5.innerHTML = "Invalid License Number";
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
        

</script>
<script>
    var subjectObject = {
        "Dog": {"NOT KNOWN":[],"American Indian Dog": [],"Alaskan Malamute":[],"Bakharwal": [],"Bully Kutta": [],"Chippiparai": [],"Gaddi Kutta": [],"German Shepherd":[],"Golden Retriever":[],"Gull Dong": [],"Gull Terrier": [],"Himalayan Sheepdog":[],"Indian Pariah Dog":[],"Indian Spitz":[],"Jonangi": [],"Kombai":[],"Kumaon Mastiff":[],"Labrador":[],"Pug":[],"Pandikona":[],"Rampur Greyhound": [],"Rampur Hound":[],"Vikhan Sheepdog": [],"OTHERS":[]},
  "Cat": {"NOT KNOWN":[],"Abyssinian":[],"American Shorthair":[],"Bengal":[],"Billy/Indian Native Cat":[],"Birman":[],"Bombay Cat": [],"British Shothair":[],"Burmese":[],"Chartreux":[],"Exotic Shorthair":[],"Himalayan":[],"Maine Coon":[],"Nebelung":[],"Norwegian Forest":[],"Persian":[],"Ragdoll":[],"Russian Blue":[],"Saimese":[],"Scottish Fold":[],"Siberian":[],"Tonkinese":[],"OTHERS":[]}
 
  
  }

window.onload = function() {
  var subjectSel = document.getElementById("species");
  var topicSel = document.getElementById("breed");

  for (var x in subjectObject) {
    subjectSel.options[subjectSel.options.length] = new Option(x, x);
  }
  subjectSel.onchange = function() {
    
    topicSel.length = 1;
    
    for (var y in subjectObject[this.value]) {
      topicSel.options[topicSel.options.length] = new Option(y, y);
    }
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
        <input type="button" id="search-speech" value="S" title="start recording" style="margin-left:0.09cm;background-color:transparent;border:transparent;color:transparent;padding:4px 10px 4px 4px;" disabled/>
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
    <?php

       if((isset($_GET["status"]))==1)
        {
			?><div id="snackbar1">Pet already registered!</div>
            <script> var x = document.getElementById("snackbar1");
          x.className = "show";
          setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);</script><?php 
           
        }?>

        <!--<div id="div2" style="background-image: url('dogcat4.png');">-->
        <button onclick="window.history.back();" id="showupcoming3"><i class="fa fa-arrow-left" aria-hidden="true"></i></button>&nbsp;
        <center><fieldset style="width:50%;border:2px solid black;">
            <h1>Register your pet</h1>
         
            <hr>
            <br>
         
           
            <form action="petregistered.php?userID=<?php echo $userID ?>" method="POST" id="form" enctype="multipart/form-data">
        
                <input type="text" name="petname" id="petname" 
                onkeyup="ValidatePetName();" 
                placeholder="Pet Name" title="Alphabets only"  
                size="30cm" style="margin-left:0.2cm" required><br>
                <div><span id="lblError2" style="color: red;font-size:small;"></span></div>

                <input type="text" id="petlicense" name="petlicense" 
                placeholder="License Number" 
                onkeyup="ValidateLicense();" title="Numbers only"  size="30cm" 
                style="width:37%;margin-left:0.2cm;margin-right:0cm;" required>&nbsp;
                


                <input type="number" id="petage" name="petage" placeholder="Age (in months)" min=1 max=220
                onkeyup="ValidateAge();" title="Numbers only" style="width:40%;margin-right:0.2cm" required><br>  
                <span id="uname_response" style="font-size:small;margin-left:0.2cm"></span>
                <div>
                <span id="lblError5" style="color: red;font-size:small"></span>
                </div>

                <select name="species" id="species" style="width:37%;margin-left:0.2cm;margin-right:0cm;" >
                <option value="" disabled selected hidden>--Select Pet Species--</option> 
                </select>

                <select name="breed" id="breed" style="width:40%;margin-left:0.2cm;margin-right:0.2cm" >
                   <option value="" disabled selected hidden>--Select Pet Breed--</option>
                </select>

               <br>

               <select name="gender" id="gender" style="width:80%" >
               <option value="" disabled selected hidden>--Select Pet Gender--</option>
                    <option value="Female">Female</option>
                    <option value="Male">Male</option>
                    <option value=" Gender unknown">Prefer not to say</option>
                </select>

                <select name="color" id="color" style="width:80%">
                <option value="" disabled selected hidden>--Select Pet Complexion--</option>
                <option value="Albino">Albino</option>
                <option value="Apricot">Apricot</option>
                <option value="Beige">Beige</option>
                    <option value="Black">Black</option>
                    <option value="Brown">Brown</option>
                    <option value="Chocolate">Chocolate</option>
                    <option value="Cream">Cream</option>
                    <option value="Fallow">Fallow</option>
                    <option value="Fawn">Fawn</option>
                    <option value="Golden">Golden</option>
                    <option value="Grey">Grey</option>
                    <option value="Liver">Liver</option>
                    <option value="Mahogany">Mahogany</option>
                    <option value="Merle">Merle</option>
                    <option value="Mixed">Mixed</option>
                    <option value="Reddish">Reddish</option>
                    <option value="Rust">Rust</option>
                    <option value="Sable">Sable</option>
                    <option value="Tan">Tan</option>
                    <option value="Wheaten">Wheaten</option>
                    <option value="White">White</option>
                    
                
                </select><br>

                <label for="animalimage"><font size=3px>Pet Photo</font></label><br>
                <input type="file" name="animalimage" id="image" 
                size="30cm" style="margin-left:0.1cm;background-color:white" accept="image/*" required><br>
                <input type="submit" value="Register" name="submitpetdetails" id="submitbutton"><br>
    
            </form>
            </fieldset>   
        </div><center>
        <p style="font-size:12.8px;">© Copyright 2022  |  All rights reserved | www.pawsown.in</p>
        </center>
    </body>
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