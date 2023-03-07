
<?php
include "connection.php";
session_start();

if($_SESSION["loginStatus"])
{
if ($_SESSION["loginStatus"]==1)
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

?>

<html>
    <head>
        <title>Appointments</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            body
            {
                font-size: 15px;
                font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            }
            .navigation
            {
                display: flex;
                margin-top: 20px;
                margin-left: 5.5cm;
                margin-right: 8cm;  
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
           
                padding: 0px 0px 2px 10px;
                font-weight: lighter;
                font-size: 27px;
                text-align: center;
                color:white;
                margin-left: 182px;
                
                
            }
            #div3
            {
                padding: 0px 0px 2px 10px;
                font-weight: lighter;
                font-size: 27px;
                text-align: center;
                color:white;
                margin-left: 182px;

            }
            #d
            {
             
                padding-top: 1px;
                padding-top: 1px;
                margin-bottom: 0;
            }
            hr
            {
                height:1px;
                border-width:0;
                color:rgb(74, 71, 71);
                background-color:rgb(99, 96, 96);
                margin:0px 0px 0px 30px;
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
            .switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #ff0000;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

       
        
        .slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
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
h2
{
    margin-left: 200px;
    margin-top: 10px;
    margin-bottom: 10px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
#submitbutton
{
    color:transparent;
    outline:0;
    background-color: transparent;
    border:0;
}
#history
{
    margin-left:18.5cm;
    font-size:18px;
    color:Blue;
    text-decoration:none;
}
#history:hover
{
    color:purple;
}
#snackbar{
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
html,body
{
    margin: 0;
    padding: 0;
}

</style>
<?php


if(isset($_GET["status"]))
{
if(($_GET["status"])==2)
      {
        ?>
        
          
        <div id="snackbar">Vet Profile Successfully Updated!</div>
            <script> var x = document.getElementById("snackbar");
          x.className = "show";
          setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);</script>
          <?php 
        }
       
    }?>

    </head>

       
        <div class="sidenav">
  <a href="adminhome.php">Dashboard</a><br>
  <a href="customerlist.php">Customers</a><br>
  <a href="productlist.php">Products</a><br>
  <a href="" style="color:white">Veterinary Details</a><br>
  <a href="customerfeedbacks.php">Feedbacks</a><br>
  <a href="adminlogout.php">Logout</a>
</div>
<div style="display:flex">
<h2 style="margin-top:0;margin-left:210px">Vet Information</h2>

<a style="color:blue;text-decoration:none;margin-left:1cm;margin-bottom:0"href="updatevet.php">Update Vet Info</a>
</div>
<hr>

<div id="div2" style="margin-top:0">
    

        <?php
        $sel="SELECT * FROM tbl_userdetails WHERE userRole='Veterinarian'";
        if ($result=$conn->query($sel))
        {
        if($result->num_rows>0)
            {
            ?>

        <table>
            <tr id="tr1">
                <th style="background-color:Silver">Sl No.</th>
                <th style="background-color:Silver">Vet Name </th>
                <th style="background-color:Silver">Vet Email</th>
                <th style="background-color:Silver">Vet Phone</th>
                <th style="background-color:Silver">Vet Status</th> 
                <th style="background-color:Silver">Block/Unblock</th>   
            </tr>

        <?php
        $i=0;
        while($row=$result->fetch_array())
        {
            $i++;
         
            $userID=$row["userID"];
            $username=$row["userName"];
            $useremail=$row["userEmail"];
            $userphone=$row["userPhone"];
            
        ?>
        <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $row["userName"] ?></td>
            <td><?php echo $row["userEmail"] ?></td>
            <td><?php echo $row["userPhone"] ?></td>
            <td><?php $userstatus=$row["userStatus"]; 
                    if($userstatus==1)
                    echo "<p id='status' style='color:green;background-color:#D0F0C0;width:60%;text-align:center;border-radius:12px'>ACTIVE</p>";
                    if($userstatus==0)
                    echo "<p id='status' style='color:red;width:60%;text-align:center;border-radius:12px'>INACTIVE</p>";
                   
                    ?> 
            </td>
                 <td>
                 
                    <form id="form" action="changevetstatus.php?userID=<?php echo $row["userID"] ?>" method="POST">
                    <label class="switch" >
                    <button type="submit" name="togbutton" id="submitbutton">   
                    <?php $userstatus=$row["userStatus"]; 
                    if($userstatus==1)
                    echo "<input type='checkbox' name='togbutton' id='toggle'>";
                    else if($userstatus==0)
                    echo "<input type='checkbox' name='togbutton' id='toggle' checked>";

                    ?>           
        
                    <span class="slider round"></span></button>
                    </label></form></td>          
        </tr> 
    </table>

        <?php
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
<br>
</div>
<div style="display:flex">
<h2 style="margin-top:0;margin-left:210px;color:black">Appointments</h2>
<a id="history" href="consultationhistory.php">View Consultation History</a>
</div>
<hr>

<div id="div3" style="margin-top:0">
<?php
$date=date('Y-m-d');
$sel="SELECT tbl2.*,tbl1.userName,tbl1.userPhone FROM tbl_appointmentdetails AS tbl2 INNER JOIN tbl_userdetails AS tbl1 ON tbl2.customerID=tbl1.userID WHERE consultationDate>='$date'";
if ($result=$conn->query($sel))
{
    if($result->num_rows>0)
    { 
    ?>
    <table>
        <tr id="tr1">
            <th style="background-color:Silver">Sl No.</th>         
            <th style="background-color:Silver">Customer Name </th>
            <th style="background-color:Silver">Customer Phone</th>
            <th style="background-color:Silver">Pet Species</th>
           
           
            <th style="background-color:Silver">Concern about Pet</th>
            <th style="background-color:Silver">Consulation Date</th>
            <th style="background-color:Silver">Consultation Time</th>     
        </tr>

        <?php 
        $i=0;
        while($row=$result->fetch_array())
        {
            $i++;
        ?>

        <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $row["userName"] ?></td>
            <td><?php echo $row["userPhone"] ?></td>
            <td><?php echo $row["petSpecies"] ?></td>
       
          
            <td><?php echo $row["concernAboutPet"] ?></td>
            <td><?php echo $row["consultationDate"] ?></td>
            <td><?php if(($row["consultationTime"])==9)
                        echo "09:00am - 09:30am";
                        else if(($row["consultationTime"])==10)
                        echo "10:00am -10:30am"; 
                        else if(($row["consultationTime"])==11)
                        echo "11:00am -11:30am"; 
                        else if(($row["consultationTime"])==12)
                        echo "12:00pm -12:30pm";
                ?>
       
            </td>    
        </tr> 

        <?php 
        }
        while($row=$result->fetch_array())
        {
        ?>   
                
        <tr>
           
            <td><?php echo $row["userName"] ?></td>
            <td><?php echo $row["userPhone"] ?></td>
            <td><?php echo $row["petSpecies"] ?></td>
         
          
         
            <td><?php echo $row["concernAboutPet"] ?></td>
            <td><?php echo $row["consultationDate"] ?></td>
            <td><?php if(($row["consultationTime"])==9)
                        echo "09:00am - 09:30am";
                        else if(($row["consultationTime"])==10)
                        echo "10:00am -10:30am"; 
                        else if(($row["consultationTime"])==11)
                        echo "11:00am -11:30am"; 
                        else if(($row["consultationTime"])==12)
                        echo "12:00pm -12:30pm";
            
            ?></td>   
        </tr>     
    </table>

    <?php 
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
</div>
</body>
</html>