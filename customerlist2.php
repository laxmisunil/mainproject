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
        <title>Customer List</title>
            <style>
            body
            {
                font-size: 15px;
                font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            }
            table
            {
                border-collapse: collapse;
                border-spacing: 0;
                width: 85%;
                margin-left:193px;
                
                border: 1px solid #ddd;
            }
            td,th
            {
                text-align: left;
                padding: 16px;
                margin-left: 180px;
           
            }
            tr:nth-child(even)
            {
                background-color: #f2f2f2;
            }
            #div2
            {
           
                padding: 2px 10px 2px 10px;
                font-weight: lighter;
                font-size: 27px;
                text-align: center;
                color:white;
                margin-left: 180px;
                
            }
        
            .navigation
            {
                display: flex;
                margin-top: 20px;
                margin-left: 3.5cm;
                margin-right:5.8cm;  
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
            hr
            {
                height:1px;
                border-width:0;
                color:rgb(74, 71, 71);
                background-color:rgb(99, 96, 96);
                margin:0px 0px 0px 30px;
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

/* Rounded sliders */
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

            </style>
        </head>
<body>
    <div id="header">
    <h2 style="margin-left:200px;overflow:hidden">Customers</h2>
    </div>
    <hr>


            
<div class="sidenav">
  <a href="adminhome.php">Dashboard</a><br>
  <a href="" style="color:white">Customers</a><br>
  <a href="productlist.php">Products</a><br>
  <a href="veterinarydetails4.php">Veterinary Details</a><br>
  <a href="customerfeedbacks.php">Feedbacks</a><br>
  <a href="adminlogout.php">Logout</a>
</div>
                 
<div id="div2">
        
</div>
   
<?php
include "connection.php";
$sel="SELECT * from tbl_userdetails where userRole='Customer'";
if ($result=$conn->query($sel))
{
    if($result->num_rows>0)
    {
        
        ?>
<table>
                <tr id="tr1">
                    <th style="background-color:Silver">Sl No. </th>
                    <th style="background-color:Silver">Customer Name </th>
                    <th style="background-color:Silver">Customer Email</th>
                    <th style="background-color:Silver">Customer Phone</th>
                    <th style="background-color:Silver">Customer Status</th>
                    <th style="background-color:Silver">Block/Unblock</th>
                  
                    
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
                    <td><?php echo $row["userEmail"] ?></td>
                    <td><?php echo $row["userPhone"] ?></td>
                    <td><?php $userstatus=$row["userStatus"]; 
                    if($userstatus==1)
                    echo "<p id='status' style='color:green;background-color:#D0F0C0;width:40%;text-align:center;border-radius:12px'>ACTIVE</p>";
                    if($userstatus==0)
                    echo "<p id='status' style='color:red'>INACTIVE</p>";
                   
                    ?> 
                </td> 
                <td>
                 
                 <form id="form" action="changecustomerstatus.php?userID=<?php echo $row["userID"] ?>" method="POST">
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
                

                <?php }
                       
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
                ?></table>
</div>
</body>


</html>