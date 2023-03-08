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
        <title>My Orders</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script data-require="jquery@3.1.1" data-semver="3.1.1" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
            input[type=submit]
            {
                width: 40%;
                background-color: black;
                color: #fafafa;
                padding: 18px 24px;
                margin: 8px 0;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-weight: bolder;
                margin-top: 2px; 
            }
            input[type=submit]:hover
            {
                background-color: #595959;
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
            .para
            {
                font-size: 21px;
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
           
            #myform {
    text-align: center;
    padding: 5px;
  
    margin: 2%;
}
.qty {
    width: 40px;
    height: 25px;
    text-align: center;
}
input.qtyplus { width:25px; height:25px;}
input.qtyminus { width:25px; height:25}
#next
{

    text-align:center;
    width:100%;
    background-color: Gainsboro;
    margin: 0;
    padding:16px 4px

}
#continue
{
    text-decoration:none;
    padding:10px 20px 10px 20px;
    background-color: green;
    border-radius: 3px;
    font-size: large;
    color:white;
}
#continue:hover
{
    background-color: #74C365;
    color:black;
}
#browse{
    color:blue;
    margin-left:1cm;
    margin-top:15px;
    text-decoration:none;

}
#browse:hover
{
    color:Purple;
}
#snackbar {
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
#cartitems:after
{
    content: '';
    display: block;
   
    position: relative;
    width: 50%;
    margin-right:34px;
    
    margin-top: 8px;
    
}
#plus:hover,#minus:hover
{
    cursor: pointer;
}

            
        </style>
        <?php
      
      if(isset($_GET["status"]))
      {
        if((isset($_GET["status"]))==1)
        {
            ?><div id="snackbar">Product added to cart!</div>
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
    </head>
    
    <header class="header" id="myHeader">
    <center><img src="logofinal.png" width="8%" ></center>
    <hr>
    <?php
    $sql = "SELECT sum(productQuantity) FROM tbl_cart WHERE cartStatus=1 AND customerID=$userID";
    $q = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($q);

    $cartitemcount=$row[0];
    
    ?>

    <body>
    <center>
    <div style="display:flex">
        <form>
            <input id="s" type="search" placeholder="Search...">       
        </form>

        <div class="navigation">
            <a href="home.php" class="item"  >Home</a>
            <a href="dogs.php" class="item">Dogs</a>
            <a href="cats.php" class="item">Cats</a>
            <a href="consultation.php" class="item">Consultation</a>
            <a href="about.php" class="item">About</a>
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
            <a href="">My Orders</a>
            <a href="myappointments.php">My Appointments</a>
            <a href="viewpetschedule.php">Pet Health Schedule</a>
            <a href="addcustomeraddress.php">Manage Address</a>
            <a href="changepassword.php">Change Password</a>
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
    <div class="div2">
        <center><h2>My Orders</h2>
    </div>
    <?php 
    $myorders="SELECT tbl1.*,tbl2.* FROM tbl_order AS tbl1 INNER JOIN tbl_orderitems AS tbl2 ON tbl2.order_ID=tbl1.orderID WHERE customerID=$userID";
if ($result=$conn->query($myorders))
{
    if($result->num_rows>0)
    { 
    ?>
   <div style="display:flex">
    <table>
        <tr id="tr1">
            <th style="background-color:Gainsboro">Sl No.</th>
            <th style="background-color:Gainsboro;width:5cm;">Product Image</th>
            <th style="background-color:Gainsboro;">Product Name</th>
            <th style="background-color:Gainsboro;">Product Price</th>
            <th style="background-color:Gainsboro;">Total Quantity</th>
            <th style="background-color:Gainsboro">Total Price</th>
            <th style="background-color:Gainsboro">Ordered on</th>
            
        </tr>
        <?php 
        $i=0;
        $subtotal=0;

        while($row=$result->fetch_array())
        {
            $i++;
            $orderID=$row["orderID"];
           
            $orderDate=$row["orderDate"];
    
          
        ?>

        <tr>   
            <td><?php echo $i ?></td>
            <?php $productID= $row["productID"] ;
          
            $proquantity="SELECT productQuantity FROM tbl_orderitems WHERE productID='$productID' AND orderitemsStatus=1";
            if($result=$conn->query($proquantity))
            {
                if($result->num_rows>0)
                {
                    while($row=$result->fetch_array())
                    {
                        $productQuantity=$row["productQuantity"];
                    }
                    
                }
            }?>
            
            
            <?php
            $sel="SELECT * FROM tbl_productdetails WHERE productID='$productID' AND productStatus=1";
            if($result=$conn->query($sel))
            {
                if($result->num_rows>0)
                {
                    while($row=$result->fetch_array())
                    {
                        $productImage=$row["productImage"];
                        $productName=$row["productName"];
                        $productPrice=$row["productPrice"];?>
                        <td><img src='<?php echo $productImage ?>' width='40%' height='60%'></td>
                        <td><?php echo $productName; ?></td>
                        <td><?php echo $productPrice; ?></td>
                        <td><?php echo $productQuantity ?></td>
                        
                        
                        <td><?php $totalprice=$productPrice*$productQuantity; echo $totalprice; ?></td>
                        <td><?php echo $orderDate; ?></td>
                       
                    
                     
                    <?php
                    }
                    
                }
            }

            ?>
             
       
           
        </tr> 
 
      
        <?php 
      
        }
        $result->free();
     
//echo $subtotal;
?> 
   </table>
    
    
   </div>
   
<?php
}
    else
    {
        echo "<center><br><br>No orders yet!!<br><br><a style='text-decoration:none;color:blue' href='home.php'>Browse Products</a><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
        
    }
    
}
else
{
    echo "ERROR";

} ?>
<center>
<p style="font-size:12.8px;">© Copyright 2022  |  All rights reserved | www.pawsown.in</p>
</center>
<script>
window.onscroll = function() {myFunction()};

var header = document.getElementById("myHeader");
var sticky = header.offsetTop;

function myFunction() {
if (window.pageYOffset > sticky) {
header.classList.add("sticky");
} else {
header.classList.remove("sticky");
}
}

</script>

    
</body>
</html>