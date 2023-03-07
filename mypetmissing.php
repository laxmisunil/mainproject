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
        <title>Add missing</title>
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
            input[type=text],select, input[type=number],input[type=file],input[type=date],input[type=email],input[type=tel]
            {
                width: 80%;
                padding: 12px 20px;
                margin: 8px 0px;
                display: inline-block;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
                
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
#petname:hover,#species:hover,#breed:hover,#animalcolor:hover
{
    cursor: not-allowed;
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

        function ValidateEmail() {
        var email = document.getElementById("email").value;
        var lblError = document.getElementById("lblError");
        lblError.innerHTML = "";
        var res1=document.getElementById("uname_response");
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
    function ValidateAddress() 
        {
            var petname = document.getElementById("address").value;
            var lblError4 = document.getElementById("lblError4");
            lblError4.innerHTML = "";
            var expr = /^[a-zA-Z0-9., ]*$/;
            if (!expr.test(petname)) 
            {
                lblError4.innerHTML = "Invalid Name";
                const button = document.querySelector('#submitbutton');
                button.disabled = true;
                button.style.cursor="not-allowed";
            }
            else
            {
                lblError4.innerHTML = "";
                const button = document.querySelector('#submitbutton');
                button.disabled = false;
                button.style.cursor="pointer";
            }  
        }

        function ValidateLastseen() 
        {
            var petname = document.getElementById("lastseenat").value;
            var lblError7 = document.getElementById("lblError7");
            lblError7.innerHTML = "";
            var expr = /^[a-zA-Z, ]*$/;
            if (!expr.test(petname)) 
            {
                lblError7.innerHTML = "Invalid Name";
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


        function ValidatePincode()
        {
            var cuspincode= document.getElementById("cuspincode").value;
            var lblError5 = document.getElementById("lblError5");
            lblError5.innerHTML = "";
            var expr = /([6]{1}[0-9]{5}|[1-9]{1}[0-9]{3}[0-9]{3})/;
            if (!expr.test(cuspincode)) 
            {
                lblError5.innerHTML = "Invalid Pincode";
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
        <form action="searchproducts.php?userID=<?php echo $userID?>" method="POST">
            <input id="s" type="search" name="search" placeholder="Search products...">  <br>
            <input type="hidden" name="submit" style="background-color:transparent;border:transparent;color:transparent;padding:0.2px;margin:0px">
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
        <?php
        $petID=$_GET["petID"];
        $sel="SELECT tbl1.*,tbl2.* FROM tbl_pet AS tbl1 INNER JOIN tbl_userdetails AS tbl2 ON tbl1.customerID=tbl2.userID WHERE tbl1.petID=$petID";
if($result=$conn->query($sel))
{
    if($result->num_rows>0)
    {
        while($row=$result->fetch_array())
        {
            $petname=$row["petName"];
            $petspecies=$row["petSpecies"];
            $petbreed=$row["petBreed"];
            $petcolor=$row["petColor"];
            $customeremail=$row["userEmail"];
            $customerphone=$row["userPhone"];
            $customerhousename=$row["userHousename"];
            $customerpostoffice=$row["userPostOffice"];
            $customertown=$row["userTown"];
            $customerpincode=$row["userPincode"];

        }
        //$result->free();
    }
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
<div style="display:flex">
<button onclick="window.history.back();" id="showupcoming" style="margin-left:0.7cm"><i class="fa fa-arrow-left" aria-hidden="true" style="color:white"></i></button>&nbsp;
<!--<button onclick="window.history.back();" id="showupcoming" style="margin-left:30.2cm"><i class="fa fa-arrow-right" aria-hidden="true" style="color:white"></i></button>&nbsp;-->
</div>
<center>        
<div id="div2">
        <fieldset style="width:50%;border:2px solid black;">
            <h4>Add Missing</h4>
            <hr>
            <br>
           
            <form action="mypetmissingadded.php?userID=<?php echo $userID ?>&petID=<?php echo $petID ?>" method="POST" id="form" style="background-color:white" enctype="multipart/form-data">
            <br>
                <input type="text" name="petname" id="petname" 
                onkeyup="ValidatePetName();" value=<?php echo $petname?>
                placeholder="Pet Name" title="Alphabets only"  
                size="30cm" style="margin-left:0.2cm" required readonly><br>
                <div><span id="lblError2" style="color: red;font-size:small;"></span></div>


                <input type="text" value=<?php echo $petspecies?> name="species" id="species" style="width:37%;margin-left:0.2cm;margin-right:0cm;" readonly required>
                
                <input type="text" value=<?php echo $petbreed?> name="breed" id="breed" style="width:40%;margin-left:0.2cm;margin-right:0.2cm" readonly required>
                  

               <br>


                <select name="beltcolor" id="color" style="width:80%" required>
                <option value="" disabled selected hidden>--Collar color--</option> 
                    <option value="Beige">Beige</option>
                    <option value="Black">Black</option>
                    <option value="Blue">Blue</option>
                    <option value="Brown">Brown</option>
                    <option value="Green">Green</option>
                    <option value="Grey">Grey</option>
                    <option value="Orange">Orange</option>
                    <option value="Pink">Pink</option>
                    <option value="Purple">Purple</option>
                    <option value="Red">Red</option>
                    <option value="White">White</option> 
                    <option value="Yellow">Yellow</option>
                    <option value="No Collar">NO</option>
                
    </select>

                <input type="text" value=<?php echo $petcolor?> name="animalcolor" id="animalcolor" style="width:80%"  readonly required>
               <br>

                <label for="missingfrom"><font size="3px">Missing since</font></label><br>

                <input type="date" name="missingfrom" id="missingfrom" 
                size="10cm" style="margin-left:0.2cm" required><br>

                <input type="text" name="lastseenat" id="lastseenat" 
                onkeyup="ValidateLastseen();" 
                placeholder="Last seen at" title="Alphabets only"  
                size="30cm" style="margin-left:0.2cm" required><br>
                <div><span id="lblError7" style="color: red;font-size:small;"></span></div>

                <label for="animalimage"><font size="3px">Add Latest Image</font></label><br>

               
                <input type="file" name="animalimage" id="image" 
                size="30cm" style="margin-left:0.2cm;background-color:white" required><br>

                <input type="email" value="<?php if ($customeremail=="") echo ""; else echo $customeremail ?>" onkeyup="ValidateEmail();" name="email" id="email" placeholder="E-mail ID" size="30cm" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required><br>
                   
                    <div ><span id="lblError" style="color: red;font-size:small"></span></div>
                    
                    
                   
                    <input type="tel" value="<?php if ($customerphone=="") echo ""; else echo $customerphone ?>" name="phone" id="phone" onkeyup="ValidatePhone();" placeholder="Enter your Mobile No."  size="30cm" minlength="10" maxlength="10" required><br> 
                  
                    <span id="lblError3" style="color: red;font-size:small"></span>
                   
                    

                <input type="text" name="address" id="address" 
                onkeyup="ValidateAddress();" value="<?php if ($customerhousename=="") echo ""; else echo $customerhousename."(H) ".$customerpostoffice." P.O. ".$customertown ?>"
                placeholder="Address" title="Alphabets only"  
                size="30cm" style="margin-left:0.2cm"><br>
                <div><span id="lblError4" style="color: red;font-size:small;"></span></div>

                <input type="text" value="<?php if ($customerpincode=="") echo ""; else echo $customerpincode ?>" name="custpincode" id="cuspincode"  
                onkeyup="ValidatePincode();" placeholder="ZIP/Postal Code"  
                title="Numbers only" maxlength=6 size="30cm" " required><br>
                <div><span id="lblError5" style="color: red;font-size:small;"></span></div><br>  

                <input type="submit" value="Save" name="addmissing" id="submitbutton"><br> <br>
    
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