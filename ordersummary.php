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
//$lastname = $words[1];


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
        <title>Order Summary</title>
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
          
            .div2
            {
               
                padding: 2px 9px 2px 9px;
                margin-top: 0px;
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
            .div45
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
            .separater
            {
                width:70%;
                border:0.1px burlywood ;
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

.button1 {
 border: none;
  color: white;
  padding: 16px 32px;
    text-align:left;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;

  transition-duration: 0.4s;
  cursor: pointer;
  border-radius: 7px;
  background-color:  rgb(197, 110, 3);
  color: white; 
  border: 2px solid  rgb(197, 110, 3);
 
}

.button1:hover {

background-color: rgb(245,222,179);
  border:2px solid  rgb(245,222,179);
  color:black;
}
#generateID
{
    padding:4px;
    background-color:royalblue;
    border:2px solid royalblue;
    color:white;
    border-radius: 3px;
}
#generateID:hover
{
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
    cursor: pointer;
}




 
table
            {
                border-collapse: collapse;
                border-spacing: 0;
                width: 60%;
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
#deliveryaddress
{
    width:40%;
    border:2px solid gray;
}
#deliverto
{
   
    
    margin: 0;
    padding:16px 4px
}
        </style>
        <script>
            jQuery(document).ready(($) => {
        $('.quantity').on('click', '.plus', function(e) {
            let $input = $(this).prev('input.qty');
            let val = parseInt($input.val());
            $input.val( val+1 ).change();
        });
 
        $('.quantity').on('click', '.minus', 
            function(e) {
            let $input = $(this).next('input.qty');
            var val = parseInt($input.val());
            if (val > 1) {
                $input.val( val-1 ).change();
            } 
        });
    });
            
            
      
       
          
        </script><?php 
        if(isset($_GET["status"]))
        {

        if(($_GET["status"])==0)
        {
            ?>
            
              
              <script>
                  alert("Product Removed from cart!");
              </script>
              <?php 
            }
           
    }?>

    
       
    </head>
    <header>
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
    <form action="searchproducts.php" method="POST">
            <input id="s" type="search" name="search" placeholder="Search products...">  <br>
            <input type="hidden" name="submit" style="background-color:transparent;border:transparent;color:transparent;padding:0.2px;margin:0px">
        </form>

        <div class="navigation">
            <a href="home.php" class="item">Home</a>
            <a href="dogs.php" class="item">Dogs</a>
            <a href="" class="item">Cats</a>
            <a href="consultation.php" class="item">Consultation</a>
            <a href="bookforvaccination.php" class="item">Vaccinate</a>
            <a <?php if($_SESSION["loginStatus"]==3){?>href="contact.php"<?php }?> href="login.php" class="item">Feedback</a>
        </div>

        <div id="div3" style="display:flex">
        <div style="margin-top:19px" id="cartitems" onclick="location.href='mycart.php'">
        <i title="My Cart" class="fa badge" style="font-size:24px" value=<?php echo $cartitemcount ?>>&#xf07a;</i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
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
        $getaddress="SELECT * FROM tbl_userdetails WHERE userID='$userID'";
        if ($result=$conn->query($getaddress))
        {
            if($result->num_rows>0)
            {
                while($row=$result->fetch_array())
                {
                    $customername=$row["userName"];
                    $customerphone=$row["userPhone"];
                    $customerhouse=$row["userHousename"];
                    $customerpostoffice=$row["userPostOffice"] ;
                    $customerlocality=$row["userLocality"];
                    $customertown=$row["userTown"];
                    $customerdistrict=$row["userDistrict"];
                    $customerpincode=$row["userPincode"];    
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
        </p>
    
        </div>
        </div>
    </header>
    <center>
            <h2>Order Summary</h2>
    <div class="div2">
    </div>

    <?php
  
    $userID=$_SESSION["loginID"];

    $cartdetails="SELECT * FROM tbl_cart";
    if ($result=$conn->query($cartdetails))
{
    if($result->num_rows>0)
    { 
        while($row=$result->fetch_array())
        {
            
            $cartID=$row["cartID"];
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
}  ?>
<div style="display:flex">
<?php


        
$sel="SELECT tbl2.*,tbl1.*,tbl3.* FROM tbl_productdetails AS tbl2 INNER JOIN tbl_cart AS tbl1 ON tbl2.productID=tbl1.productID INNER JOIN tbl_stock AS tbl3 ON tbl3.productID=tbl2.productID WHERE tbl1.cartStatus=1 AND tbl1.stockID=tbl3.stockID AND tbl3.productStock>0 AND tbl1.customerID='$userID'";
if ($result=$conn->query($sel))
{
    if($result->num_rows>0)
    { 
    ?>
   
    <table>
        <tr id="tr1">
            <th style="background-color:Gainsboro;text-align:center;">Sl No.</th>
            <th style="background-color:Gainsboro;width:5cm;text-align:center">Product</th>
            <th style="background-color:Gainsboro;">Product Name</th>
            <th style="background-color:Gainsboro;">Price</th>
            <th style="background-color:Gainsboro;text-align:center">Quantity</th>
            <th style="background-color:Gainsboro">Total</th>
            <th style="background-color:Gainsboro"></th> 
        </tr>
        <?php 
        $i=0;
        $totalpayable=0;
        while($row=$result->fetch_array())
        {
            $i++;
            $image=$row["productImage"];
        ?>

        <tr>   
            <td style="text-align:center"><?php echo $i ?></td>
            <td style="text-align:center"><img src='<?php echo $image ?>' width='40%' height='60%'></td>
            <td><?php echo $row["productName"] ?></td>
            <td><?php echo "₹ ".$row["productPrice"] ?></td>

            <?php $productquantity=$row["productCount"]?>
            <?php $total=$row["productPrice"]*$productquantity ?>

            <td><?php echo $productquantity;?></td>
           
            <td><?php echo "₹ ".$total ?></td>
          
        </tr> 
    

        <?php 
        $totalpayable=$total+$totalpayable;
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
        </table>
<div id="deliveryaddress">
    <center><h3 id="deliverto">Delivery Address</h3>

   

    &nbsp;<p style="text-align:left">&nbsp;&nbsp;&nbsp;
    <!--<input type="radio">-->
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo "<b>".$customername."</b><br>" ?>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $customerphone."<br>" ?>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $customerhouse."(H)<br>" ?>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $customerpostoffice."&nbsp;P.O.&nbsp;".$customerlocality."<br>"?>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $customertown.",&nbsp;".$customerdistrict."<br>" ?>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $customerpincode."<br>" ?><br>

    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<!--<a href="addnewaddress.php" id="generateID" style="text-decoration:none">+ Add address</a><br>-->
    <br><br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo "Total Amount Payable ₹".$totalpayable."<br>" ?></b><br><br>
    <form action="razorpay-api/pay.php?totalpayable=<?php echo $totalpayable;  ?>" method="POST">
    <input type="submit" value="Pay & Place Order" class="button button1">
    </form>
        
</div>
</div>
</html>