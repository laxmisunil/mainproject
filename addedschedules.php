<?php
include "connection.php";

session_start();
if($_SESSION["loginStatus"])
{
if ($_SESSION["loginStatus"]==2)
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
    header("location:login.php");
}
?>


<html>
    <head>
        <title>Pet Schedule</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
            .navigation
            {
                display: flex;
                margin-top: 20px;
                margin-left: 12cm;
                margin-right: 6.2cm;  
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
            .link
            {
                text-decoration: none;
                color: black;
            }
            .link:hover
            {
                color:blue;
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
            h5
            {
                margin-bottom: 3px;
            }
            #active
            {
                border-bottom: 2px solid chocolate;
            }
            .sticky 
            {
                position: fixed;
                top: 0;
                width: 100%;
            }
            .dropbtn {

  color: white;
  padding: px;
  font-size: 16px;
  border: none;
  background-color: #f1f1f1;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}
            
select,input[type=number],input[type=time]
            {
                width: 34%;
                padding: 12px 20px;
                margin: 8px 0px;
                display: inline-block;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
            }
            input[type=text]
            {
                
                width: 34%;
                padding: 12px 20px;
                margin: 8px 0px;
                display: inline-block;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
            }
            textarea
            {
                width: 34%;
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
                width: 34%;
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
            input[type=time]::-webkit-datetime-edit-am-field {
  display: none;
}
#snackbar1,#snackbar4{
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
#snackbar2,#snackbar3{
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
#snackbar1.show,#snackbar2.show,#snackbar3.show,#snackbar4{
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
   background-color: #318CE7;
    border-radius: 5px;
    border:2px transparent;
    color:white;
}
#showupcoming:hover
{
    background-color: Silver;
    cursor:pointer;
    
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
            }
            tr:nth-child(even) 
            {
                background-color: #f2f2f2;
            }
        </style>

       
<script>
     function ValidateSchedule() 
        {
            var scheduletitle = document.getElementById("scheduletitle").value;
            var lblError2 = document.getElementById("lblError2");
            lblError2.innerHTML = "";
            var expr = /^[a-zA-Z ]*$/;
            if (!expr.test(scheduletitle)) 
            {
                lblError2.innerHTML = "Invalid Format";
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


</script>
<script>
           function check()
            {  
                var scheduletitle=$("#scheduletitle").val();
               
                $.ajax(
                    {
                        url: 'schedulecheck.php',
                        type: 'post',
                        data: {scheduletitle:scheduletitle},
                        success: function(response)
                        {    
                               
                            if(response=="<div style='color: red;text-align:left'>&nbsp;Schedule already added!</div><br>")  
                            {           
                            $('#response2').html(response);
                            const button = document.querySelector('#submitbutton');
                            button.disabled = true;
                            button.style.cursor="not-allowed";
                            }
                            else if(response!="<div style='color: red;text-align:left'>&nbsp;Schedule already added!</div><br>")
                            {
                            $('#response2').html(response)   
                            const button = document.querySelector('#submitbutton');
                            button.disabled =false;
                            button.style.cursor="pointer";
                            }
                        }
                    }
                    );
            }  
           
</script>

    </head>
    <?php
    if((isset($_GET["status1"]))==1)
        {
			?><div id="snackbar1">Schedule Added Successfully!</div>
            <script> var x = document.getElementById("snackbar1");
          x.className = "show";
          setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);</script><?php 
           
        }
        if((isset($_GET["status2"]))==2)
        {
			?><div id="snackbar2">Failed to add schedule!</div>
            <script> var x = document.getElementById("snackbar2");
          x.className = "show";
          setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);</script><?php 
           
        }
        if((isset($_GET["status3"]))==3)
        {
			?><div id="snackbar3">Schedule deleted successfully!</div>
            <script> var x = document.getElementById("snackbar3");
          x.className = "show";
          setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);</script><?php 
           
        }
        if((isset($_GET["status4"]))==4)
        {
			?><div id="snackbar4">Schedule updated successfully!</div>
            <script> var x = document.getElementById("snackbar4");
          x.className = "show";
          setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);</script><?php 
           
        }
        ?>
        
    
    <header class="header" id="myHeader">
        <center><img src="logofinal.png" width="8%" >
        <hr> 
   
    <body>
        <center>
            <div style="display:flex">
                <!--<form>
                    <input id="s" type="search" placeholder="Search...">       
                </form>-->
        <div class="navigation">
            <a href="vethome.php" class="item" >Home</a>
            <a href="appointments.php" class="item">Appointments</a>
            <a href="" id="active" class="item">Pet Schedule</a>
            <!--<a href="about.php" class="item">About</a>
            <a href="contact.php" class="item">Contact</a>-->
        </div>
        <div id="div3" style="display:flex">

        <div class="dropdown">
        <button class="dropbtn" style="background-color:transparent"><img src="veticon.webp" width="26px" height="28px" style="margin-top:15px;margin-left:0"></button>&nbsp;
        <div class="dropdown-content">
    <a href="vetprofile.php">My Profile</a>
    <a href="addedschedules.php">Added Schedules</a>
    <a href="adminlogout.php">Logout</a>
   
  </div>
</div>
        <p style="margin-top:22px;"><?php echo $username; ?></p>
        </div>
        </div>
        </header>
        <body>
            <center>
            <div id="div2">
            <h2 style="font-size:35px">Pet Health Schedule</h2>
            </div>  
            <div style="display:flex">
&nbsp;
<button onclick="window.location.href='petschedule.php'"id="showupcoming" style="color:white">+ Add new schedule</button>

</div><br>
            <?php
$sel="SELECT scheduleID,scheduleTitle,scheduleDescription FROM tbl_petschedule WHERE scheduleStatus=1";
if ($result=$conn->query($sel))
{?>
<table>
<tr id="tr1">
    <th style="background-color:Silver">Sl No.</th>
    <th style="background-color:Silver">Title</th>
    <th style="background-color:Silver">Description</th>
    <th style="background-color:Silver">Edit</th>  
    <th style="background-color:Silver">Delete</th>     
</tr><?php
    if($result->num_rows>0)
    { 
    ?>
    <?php
    if ($_SESSION["loginStatus"]==3)
    {
    ?>
    
    <?php } else?>

    
   

        <?php 
        $i=0;
        while($row=$result->fetch_array())
        {
            $i++;
        ?>

        <tr>
        
            <td><?php echo $i ?></td>
            <td><?php echo $row["scheduleTitle"] ?></td>
            <td><?php echo $row["scheduleDescription"] ?></td>
            <td><a href="editschedule.php?scheduleID=<?php echo $row["scheduleID"]; ?>" style="text-decoration:none;color:Black;" title="Edit Schedule"><i class="fa fa-edit" aria-hidden="true"></i></a></td>
            <td><a href="deleteschedule.php?scheduleID=<?php echo $row["scheduleID"]; ?>" style="text-decoration:none;color:Red;" title="Delete Schedule"><i class="fa fa-trash" aria-hidden="true"></i></a></td>       
        
        </tr> 
   
        <?php 
        }
        /*while($row=$result->fetch_array())
        {
        ?>   
                
        
        <?php
    }*/
        $result->free();
    }
    else
    {
        echo "<tr><td colspan='7' style='color:gray'><center>No schedules to view</td><tr>";
    }
}
else
{
    echo "ERROR";
}  

?> 
</table>

</body>
      
   
   
        <center>
        <p style="font-size:12.8px">© Copyright 2022  |  All rights reserved | www.pawsown.in</p>
    </center>
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
        
    </body>
</html>