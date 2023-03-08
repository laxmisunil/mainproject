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
        <title>Home</title>
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
                margin:0;
                font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
                
            }
            #active
            {
                color:chocolate;
                border-bottom: 2px solid chocolate;
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
            .separater
            {
                width:90%;
                border:0.5px solid burlywood ;
            }
            .sticky 
            {
                position: fixed;
                top: 0;
                width: 100%;
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
#snackbar.show,#snackbar2.show {
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

      if((isset($_GET["status2"]))==2)
        {
            ?><div id="snackbar2">Product out of stock!</div>
            <script> var x = document.getElementById("snackbar2");
          x.className = "show";
          setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);</script><?php 
        }
     
      ?>
      <script>
        function getprice(productID)
            {
                //alert("Hi");
                //var price=$("#productprice").val();
                var quantitymeasure=$("#quantitymeasure"+productID).val();
               // alert("HE");

                $.ajax({
                    url: 'getprice.php',
                    type: 'post',
                    data: {"quantitymeasure":quantitymeasure,"productID":productID},
                    success: function(results)
                    {
                       //alert(response);
                       alert(results.res1);
                       alert(results.res2);
                     // $('#productprice'+productID).html(response);
                       //location.reload(true);z
                    }

                });
           
  
            }


</script>
    </head>
    
    <header class="header" id="myHeader">
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
            <a href="" class="item" id="active" >Home</a>
            <a href="dogs.php" class="item">Dogs</a>
            <a href="cats.php" class="item">Cats</a>
            <a href="consultation.php" class="item">Consultation</a>
            <a href="bookforvaccination.php" class="item">Vaccinate</a>
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

    <!--<div class="div2"> <center>
        <h2>Every Pet Is Unique. Let's Celebrate It!</h2>-
    </div>
    </center>-->

    <div style="display: flex;">
        <center><br>
        <img src="homepic.jpg" width="112%">
    </div>

        <div class="div2"><center>
            <h3 id="browse">W O R L D ' S&nbsp;&nbsp;&nbsp; B E S T&nbsp;&nbsp;&nbsp;F O O D &nbsp;&nbsp;&nbsp;S U P P L I E S</h3>
            <hr class="separater">
        </div>
        
        <?php 
include "connection.php";
//$sel="SELECT * FROM tbl_productdetails WHERE productCategory='Food'";
$sel="SELECT tbl2.*,tbl1.* FROM tbl_stock AS tbl2 INNER JOIN tbl_productdetails AS tbl1 ON tbl2.productID=tbl1.productID WHERE tbl1.productCategory='Food' GROUP BY tbl2.productID";
//first, i set a counter 
if ($result=$conn->query($sel))
{
    if($result->num_rows>0)
    {
        ?>


        <?php echo '<table width="100%">';
        $i = 1; 
        while($row=$result->fetch_array())
        {
        //counter is zero then we are start new row  
            if ($i==1)
            {
                echo '<tr>';
            }
            //here we creating normal cells <td></td>
            $image=$row["productImage"];
            $productID=$row["productID"];
            $productname = $row['productName'];
            $productsubname=$row['productSubname'];
            //// = $row['productPrice'];
            $productdescription = $row['productDescription'];
            //$productquantity=$row["productQuantity"];
           // $productmeasure=$row["productMeasure"];
            //$productprice=$row["productPrice"];

            echo '<td>'."<div style='text-align:center' class='d1'><form  method='POST' action='addtocart.php?productid=$productID'><img src='$image' width='80%' height='auto'><br>
            <h3 style='margin-bottom:0px'>$productname</h3><br>";

           echo " <select name='productquantitymeasure' onchange='getprice($productID)' id='quantitymeasure$productID'>";
           $sel4="SELECT * FROM tbl_stock WHERE productID=$productID";
if($result4=$conn->query($sel4))
{
    if($result4->num_rows>0)
    {
        while($row=$result4->fetch_array())
        {
            $stockID=$row["stockID"];
            $productquantity=$row["productQuantity"];
            $productmeasure=$row["productMeasure"];
            $productprice=$row["productPrice"];
            echo "<option selected value=$stockID> $productquantity&nbsp;$productmeasure</option>";
        }
        //$result4->free();
    }
    else
    {
       
    }
}
else
{
    echo "ERROR";
}  

            echo "</select>
            <input type='hidden' name='secret' value=$stockID>

            <h4 style='color:gray;text-align:center' id='productprice$productID'>Rs. $productprice</h4>
            
            <a href='moreaboutproduct.php?productid=$productID' style='text-decoration:none;color:blue'>More Details</a>
            <br><br>

            <input class='button1' type='submit' value='ADD TO CART' name='addtocart'>
            </form></div><br>".'</td>' ;
         
            //there is a magic - if our counter is greater then 5 we set counter to zero and close tr tag  
            if ($i>4)
            {
                $i=0;
                echo '</tr><br>';
                
            };  
            $i++; //$i = $i + 1 - counter + 1
        }
        echo '</table>'; 
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
 <div class="div2"><center>
            <h3>T O Y S &nbsp;&nbsp;&nbsp;F O R&nbsp;&nbsp;&nbsp;P E T S</h3>
            <hr class="separater">
        </div>
        
        <?php 
include "connection.php";
$sel="SELECT tbl2.*,tbl1.* FROM tbl_stock AS tbl2 INNER JOIN tbl_productdetails AS tbl1 ON tbl2.productID=tbl1.productID WHERE tbl1.productCategory='Toys' GROUP BY tbl2.productID";
//first, i set a counter 
if ($result=$conn->query($sel))
{
    if($result->num_rows>0)
    {
        ?>


        <?php echo '<table width="100%">';
        $i = 1; 
        while($row=$result->fetch_array())
        {
        //counter is zero then we are start new row  
            if ($i==1)
            {
                echo '<tr>';
            }
            //here we creating normal cells <td></td>
            $image=$row["productImage"];
            $productID=$row["productID"];
            $productname = $row['productName'];
            $productsubname=$row['productSubname'];
            // = $row['productPrice'];
            $productdescription = $row['productDescription'];

            echo '<td>'."<div style='text-align:center' class='d1'><form  method='POST' action='addtocart.php?productid=$productID'><img src='$image' width='80%' height='auto'><br>
            <h3 style='margin-bottom:0px'>$productname</h3><br>";
            echo " <select name='productquantitymeasure' onchange='getprice($productID)' id='quantitymeasure$productID'>";
           $sel4="SELECT * FROM tbl_stock WHERE productID=$productID";
if($result4=$conn->query($sel4))
{
    if($result4->num_rows>0)
    {
        while($row=$result4->fetch_array())
        {
            $stockID=$row["stockID"];
            $productquantity=$row["productQuantity"];
            $productmeasure=$row["productMeasure"];
            $productprice=$row["productPrice"];
            echo "<option selected value=$stockID> $productquantity&nbsp;$productmeasure</option>";
        }
        //$result4->free();
    }
    else
    {
       
    }
}
else
{
    echo "ERROR";
}  

            echo "</select>
            <input type='hidden' name='secret' value=$stockID>

            <h4 style='color:gray;text-align:center' id='productprice$productID'>Rs. $productprice</h4>
            
            <a href='moreaboutproduct.php?productid=$productID' style='text-decoration:none;color:blue'>More Details</a>
            <br><br>

            <input class='button1' type='submit' value='ADD TO CART' name='addtocart'>
            </form></div><br>".'</td>' ;
         
            //there is a magic - if our counter is greater then 5 we set counter to zero and close tr tag  
            if ($i>4)
            {
                $i=0;
                echo '</tr><br>';
                
            };  
            $i++; //$i = $i + 1 - counter + 1
        }
        echo '</table>'; 
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
    
 <div class="div2"><center>
            <h3>C O L L A R S,&nbsp;&nbsp;&nbsp;C L O T H E S&nbsp;&nbsp;&nbsp;&&nbsp;&nbsp;&nbsp;M O R E</h3>
            <hr class="separater">
        </div>
        
        <?php 
include "connection.php";
$sel="SELECT tbl2.*,tbl1.* FROM tbl_stock AS tbl2 INNER JOIN tbl_productdetails AS tbl1 ON tbl2.productID=tbl1.productID WHERE tbl1.productCategory='Accessories' GROUP BY tbl2.productID";
//first, i set a counter 
if ($result=$conn->query($sel))
{
    if($result->num_rows>0)
    {
        ?>


        <?php echo '<table width="100%">';
        $i = 1; 
        while($row=$result->fetch_array())
        {
        //counter is zero then we are start new row  
            if ($i==1)
            {
                echo '<tr>';
            }
            //here we creating normal cells <td></td>
            $image=$row["productImage"];
            $productID=$row["productID"];
            $productname = $row['productName'];
            $productsubname=$row['productSubname'];
            // = $row['productPrice'];
            $productdescription = $row['productDescription'];

            echo '<td>'."<div style='text-align:center' class='d1'><form  method='POST' action='addtocart.php?productid=$productID'><img src='$image' width='80%' height='auto'><br>
            <h3 style='margin-bottom:0px'>$productname</h3><br>";
            echo " <select name='productquantitymeasure' onchange='getprice($productID)' id='quantitymeasure$productID'>";
           $sel4="SELECT * FROM tbl_stock WHERE productID=$productID";
if($result4=$conn->query($sel4))
{
    if($result4->num_rows>0)
    {
        while($row=$result4->fetch_array())
        {
            $stockID=$row["stockID"];
            $productquantity=$row["productQuantity"];
            $productmeasure=$row["productMeasure"];
            $productprice=$row["productPrice"];
            echo "<option selected value=$stockID> $productquantity&nbsp;$productmeasure</option>";
        }
        //$result4->free();
    }
    else
    {
       
    }
}
else
{
    echo "ERROR";
}  

            echo "</select>
            <input type='hidden' name='secret' value=$stockID>

            <h4 style='color:gray;text-align:center' id='productprice$productID'>Rs. $productprice</h4>
            
            <a href='moreaboutproduct.php?productid=$productID' style='text-decoration:none;color:blue'>More Details</a>
            <br><br>

            <input class='button1' type='submit' value='ADD TO CART' name='addtocart'>
            </form></div><br>".'</td>' ;
         
            //there is a magic - if our counter is greater then 5 we set counter to zero and close tr tag  
            if ($i>4)
            {
                $i=0;
                echo '</tr><br>';
                
            };  
            $i++; //$i = $i + 1 - counter + 1
        }
        echo '</table>'; 
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

    
    <center>

    <div id="last">
        <img src="dogcat.webp" width="100%">
        <div class="textonimage">
            <p style="font-size:70px;color:Black;">Making <br>Pet Parenting easy for everyone</p>
        </div>
        </div>
    </div>
    
    <p> Call us on 8606465950</p>
    <hr>
    <p style="font-size:12.8px">© Copyright 2022  |  All rights reserved | www.pawsown.in</p>
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
<script type="text/javascript">
    (function(d, m){
        var kommunicateSettings = 
            {"appId":"17b9fd1b43fb3e5ad89c3e9b431ba8591","popupWidget":true,"automaticChatOpenOnNavigation":true};
        var s = document.createElement("script"); s.type = "text/javascript"; s.async = true;
        s.src = "https://widget.kommunicate.io/v2/kommunicate.app";
        var h = document.getElementsByTagName("head")[0]; h.appendChild(s);
        window.kommunicate = m; m._globals = kommunicateSettings;
    })(document, window.kommunicate || {});
/* NOTE : Use web server to view HTML files as real-time update will not work if you directly open the HTML file in the browser. */
</script>
</body>
</html>