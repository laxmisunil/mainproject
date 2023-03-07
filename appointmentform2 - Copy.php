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
        <title>Appointment Form</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
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
            input[type=text],select,input[type=number],input[type=date]
            {
                width: 50%;
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
                width: 50%;
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
            .drop1
            {
                padding: 12px 20px;
                margin: 8px 0px; 
            }
            .alert 
            {
                padding: 14px 20px;
                background-color: #f44336;
                color: white;
            }
            .closebtn 
            {
                margin-left: 15px;
                color: white;
                font-weight: bold;
                float: right;
                font-size: 22px;
                line-height: 20px;
                cursor: pointer;
                transition: 0.3s;
            }
            .closebtn:hover
            {
                color: black;
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
   
        </style>
       

        <script>
            function check()
            {  
                var selecteddate = $("#datepick").val();
                var selectedtime = $("#timepick").val();

                $.ajax(
                    {
                        url: 'checkavailability.php',
                        type: 'post',
                        data: {selecteddate: selecteddate,selectedtime:selectedtime},
                        success: function(response)
                        {
                            if(response=="<div style='color: red;text-align:center'>&nbsp;Please select another slot</div>")
                            {
                            $('#response2').html(response);
                            const button = document.querySelector('#subbutton');
                            button.disabled = true;
                            button.style.cursor="not-allowed";
                            }
                            else if(response=="<div style='color: green;text-align:center'></div>")
                            {
                                alert(response);
                                $('#response2').html("");
                                const button = document.querySelector('#subbutton');
                                button.disabled = false;
                                button.style.cursor="pointer";
                           
                            }
                            
                          
            
                        }
                    }
                    );
            }  
        </script>
        <script>
            function ValidateConcern() 
        {
            var cusdistrict = document.getElementById("concern").value;
            var lblError8 = document.getElementById("lblError8");
            lblError8.innerHTML = "";
            var expr = /^[a-zA-Z ]*$/;
            if (!expr.test(cusdistrict)) 
            {
                lblError8.innerHTML = "Must contain alphabets only";
                const button = document.querySelector('#subbutton');
                button.disabled = true;
                button.style.cursor="not-allowed";
            }
            else
            {
                lblError8.innerHTML = "";
                const button = document.querySelector('#subbutton');
                button.disabled = false;
                button.style.cursor="pointer";
            }  
        }

            </script>
    </head>
    <?php
    $sql = "SELECT sum(productQuantity) FROM tbl_cart WHERE cartStatus=1 AND customerID=$userID";
    $q = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($q);

    $cartitemcount=$row[0];
    
    ?>
    
    <header>
        <center><img src="logofinal.png" width="8%" >
        <hr> 
    </header>
    <body>
        <center>
        <div style="display:flex">
        <form>
            <input id="s" type="search" placeholder="Search...">       
        </form>
        <div class="navigation">
            <a href="home.php" class="item">Home</a>
            <a href="dogs.php" class="item">Dogs</a>
            <a href="cats.php" class="item">Cats</a>
            <a href="consultation.php" id="active" class="item">Consultation</a>
            <a href="about.php" class="item">About</a>
            <a <?php if($_SESSION["loginStatus"]==1){?>href="contact.php"<?php }?> href="login.php" class="item">Feedback</a>
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

        <div id="div2" style="background-image: url('dogcat4.png');background-repeat:no-repeat">
            <h2>Talk to Vet</h2>
            <form action="apptdata.php" target="_self" method="POST">
                
                    <select name="species" id="species" required>
                        <option value="" disabled selected hidden>Select your pet..</option>
                        <option value="Dog" class="drop1">Dog</option>
                        <option value="Cat" class="drop1">Cat</option>
                        <option value="Others" class="drop1">Others</option>
                      </select>
                      
                    <select name="gender" id="gender">
                        <option value="" disabled selected hidden>Select gender...</option>
                        <option value="Female" class="drop1">Female</option>
                        <option value="Male" class="drop1">Male</option>
                        <option value="Not known" class="drop1">Not known</option>
                    </select>
                    
                <input type="number" min=1 max=200 name="age" placeholder="Pet age (in months)" size="30cm"  defaultValue="0" >
                <input type="number" name="weight" placeholder="Pet weight (in kg)" size="30cm" min=1 max=155><br>
                <input type="date"  id="datepick" name="date" size="30cm" min="2022-09-10" max="2022-10-10" required><br>
                <select name="timepick" onchange="check()" id="timepick" required> 
                <option value="" disabled selected hidden>Choose a time slot</option>
                        <option value="9" class="drop1">09:00am - 09:30am</option>
                        <option value="10" class="drop1">10:00am - 10:30am</option>
                        <option value="11" class="drop1">11:00am - 11:30am</option>
                        <option value="12" class="drop1">12:00pm - 12:30pm</option>  
                </select>
                <div id="response2" style="font-size:small;margin-right:12.5cm"></div>
                <div><textarea placeholder="Describe the concern about your pet in short(Optional)" id="concern" onkeyup="ValidateConcern();" style="text-transform:capitalize" name="concern" size="30cm" rows="4" cols="30" title="Must contain alphabets only"></textarea><br> 
                <span id="lblError8" style="color: red;font-size:small;margin-right:12cm"></span></div>
                <input type="submit" name="booknow" value="Book Now" id="subbutton">      
            </form>   
            <script>
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
            document.getElementById("datepick").setAttribute("min", today);
            </script>
        </div> 
        
        <p style="font-size:12.8px;">© Copyright 2022  |  All rights reserved | www.pawsown.in</p>
        </center>
        <!--background-color:rgb(248, 238, 223);-->
       
    </body>
</html>