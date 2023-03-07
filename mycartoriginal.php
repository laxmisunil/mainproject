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
$lastname = $words[1];


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
    header("location:index.php");
}
?>

<html>
    <!-- background-color:rgb(248, 238, 223);-->
    <head>
        <title>My Cart</title>
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
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
  border-radius: 7px;
  background-color:  #4CAF50; 
  color: white; 
  border: 2px solid  #4CAF50;
}
.button2
{
    border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
  border-radius: 7px;
  background-color:  #D0F0C0; 
  color: black; 
  border: 2px solid  #D0F0C0;
}

.button1:hover {

  background-color:#c0d878;
  border:2px solid #c0d878;
  color:black;
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
#next
{

    text-align:center;
    width:100%;
    
    margin: 0;
    padding:16px 4px

}
#cartinfo
{
    border:2px solid gray;
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

        </script>
        <?php 
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
    <script>
        
            function plusfunction(id)
            {
                //alert("Hi");
                var quantity=document.getElementById("quantity").value;
                //alert(id);

                $.ajax({
                    url: 'addproductquantity.php',
                    type: 'post',
                    data: {"quantity":quantity,"cartID":id},
                    success: function(html)
                    {
                        //alert(html);
                        //location.reload(true);
                    }
                });
  
            }

            function minusfunction(id)
            {
                //alert("Hi");
                var quantity=document.getElementById("quantity").value;
                //alert(id);

                $.ajax({
                    url: 'subtractproductquantity.php',
                    type: 'post',
                    data: {"quantity":quantity,"cartID":id},
                    success: function(html)
                    {
                        //alert(html);
                        //location.reload(true);
                    }
                });
  
            }

      


    </script>

    
       
    </head>
    <header>
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
            <a href="home.php" class="item">Home</a>
            <a href="dogs.php" class="item">Dogs</a>
            <a href="" class="item">Cats</a>
            <a href="consultation.php" class="item">Consultation</a>
            <a href="about.php" class="item">About</a>
            <a <?php if($_SESSION["loginStatus"]==3){?>href="contact.php"<?php }?> href="login.php" class="item">Feedback</a>
        </div>

        <div id="div3" style="display:flex">
        <div style="margin-top:19px" id="cartitems" onclick="location.href='mycart.php'">
        <i title="My Cart" class="fa badge" style="font-size:24px" value=<?php if($cartitemcount=='')echo "0"; else echo $cartitemcount ?>>&#xf07a;</i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
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
        $sql = "SELECT sum(productTotal) FROM tbl_cart";

        ?> 
        </p>
    
        </div>
        </div>
    </header>
    <center>
    
 <!--<div style="display:flex">
            <button style="margin-left:1px"class="button button2">Subtotal&nbsp;&nbsp;<b>₹</b></button>-->
            <h1>Cart information</h1>
            <!--<form action="ordersummary.php" method="POST">
            <input type="submit" style="margin-left:8.7cm"class="button button1" value="PROCEED TO CHECKOUT">
            </form>
           
    </div></center>-->
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
} 
}
else
{
    header("location:login.php");
} ?>



<?php 
    $sel="SELECT tbl2.*,tbl1.* FROM tbl_productdetails AS tbl2 INNER JOIN tbl_cart AS tbl1 ON tbl2.productID=tbl1.productID WHERE tbl1.cartStatus=1 AND tbl1.customerID='$userID'";
if ($result=$conn->query($sel))
{
    if($result->num_rows>0)
    { 
    ?>
   <div style="display:flex">
    <table>
        <tr id="tr1">
            <th style="background-color:Gainsboro">Sl No.</th>
            <th style="background-color:Gainsboro;width:5cm;">Product</th>
            <th style="background-color:Gainsboro;">Product Name</th>
            <!--<th style="background-color:Gainsboro;">Price</th>-->
            <th style="background-color:Gainsboro;text-align:center">Quantity</th>
            <th style="background-color:Gainsboro">Total</th>
            <th style="background-color:Gainsboro"></th> 
        </tr>
        <?php 
        $i=0;
        $subtotal=0;
        while($row=$result->fetch_array())
        {
            $i++;
            $image=$row["productImage"];
            $cartID=$row["cartID"];
        ?>

        <tr>   
            <td><?php echo $i ?></td>
            <td><img src='<?php echo $image ?>' width='40%' height='60%'></td>
            <td><?php echo $row["productName"] ?></td>
            <!--<td><?php //echo "₹ ".$row["productPrice"] ?></td>-->

            <?php $productquantity=$row["productQuantity"]?>
            <?php $total=$row["productPrice"]*$productquantity ?>

            <td>
            <form id='myform' method='POST' class='quantity' action='#'>
            <!--<input type='button' id="minus"  onclick="minusfunction('<?php //echo $cartID ?>')"  value='-' class='qtyminus minus' field='quantity' />-->

            <input type='text' name='quantity' id="quantity" value='<?php echo $productquantity?>' class='qty' readonly />

            <!--<input type='button' id="plus" onclick="plusfunction('<?php //echo $cartID ?>')" value='+' class='qtyplus plus' field='quantity' />-->
            </form>
            </td>
           
            <td><?php echo "₹ ".$total ?></td>
            <?php $subtotal=$subtotal+$total; ?>
            
        </tr> 
 
      
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
//echo $subtotal;
?> 
   </table><hr>
   <div id="cartinfo" style="width:30%">
   
   <?php  ?>
   <br><br><br><h2><?php echo "Total Items :&nbsp&nbsp;".$cartitemcount?></h2>
   <h2><?php echo "Subtotal&nbsp&nbsp:&nbsp₹".$subtotal ?></h2><br><br><br><br>
    <form action="ordersummary.php" method="POST">
            <input type="submit" class="button button1" value="PROCEED TO CHECKOUT">
    </form>
    
   </div>
   </div>


</html>