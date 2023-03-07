<?php
include "connection.php";

session_start();
if($_SESSION["loginStatus"])
{
if ($_SESSION["loginStatus"]==3)
{
$userID=$_SESSION["loginID"];
$username="SELECT * FROM tbl_userdetails WHERE userID='$userID'";
if ($result=$conn->query($username))
{
    if($result->num_rows>0)
    {
        while($row=$result->fetch_array())
        {
            $username=$row["userName"];
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
                margin:0;
                font-size: 15px;
                font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            }
            .navigation
            {
                display: flex;
                margin-top: 20px;
                margin-left: 1cm;
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
                width: 70%;
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
  background-color:green;
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
    border-bottom: 2px solid chocolate;
    margin-top: 8px;
    
}
#plus:hover,#minus:hover
{
    cursor: pointer;
}
        </style>
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
             <div id="snackbar">Product removed from cart!</div>
            <script> var x = document.getElementById("snackbar");
          x.className = "show";
          setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);</script>
              <?php 
            }
           
    }?>
    <script>
        
            function plusfunction(cartID)
            {   
                var quantity=$("#quantity"+cartID).val();
                //alert(quantity);
                $.ajax({
                    url: 'addproductquantity.php',
                    type: 'post',
                    data: {"quantity":quantity,"cartID":cartID},
                    success: function(html)
                    {
                        
                      location.reload(true);
                      //alert(html);
                    }
                });
            }

            function minusfunction(cartID)
            {
                var quantity=$("#quantity"+cartID).val();
                //alert(quantity);
                if(quantity>1)
                {
                $.ajax({
                    url: 'subtractproductquantity.php',
                    type: 'post',
                    data: {"quantity":quantity,"cartID":cartID},
                    success: function(html)
                    {
                       // alert(html);
                       location.reload(true);
                    }

                });
            }
            else
            {
                
            }
  
            }

      


    </script>

    
       
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
    <form action="searchproducts.php"  class="live-search-box" id="search-form" method="POST">
        <input type="button" id="search-speech" value="S" title="start recording" style="margin-left:0.67cm;background-color:transparent;border:transparent;color:transparent;padding:4px 10px 4px 4px;" disabled/>
            <input id="s" type="search" name="search" placeholder="Search products...">
            <input type="submit" name="submit" style="background-color:transparent;border:transparent;color:transparent;padding:0.2px;margin:0px">
            
        </form>

        <div class="navigation">
            <a href="home.php" class="item">Home</a>
            <a href="dogs.php" class="item">Dogs</a>
            <a href="cats.php" class="item">Cats</a>
            <a href="consultation.php" class="item">Consultation</a>
            <a href="bookforvaccination.php" class="item">Vaccinate</a>
            <a <?php if($_SESSION["loginStatus"]==3){?>href="contact.php"<?php }?> href="login.php" class="item">Feedback</a>
        </div>

        <div id="div3" style="display:flex">
        <div style="margin-top:19px;" id="cartitems" onclick="location.href='mycart.php'">
        <i title="My Cart" class="fa badge" style="font-size:24px" value=<?php if($cartitemcount=='')echo "0"; else echo $cartitemcount ?>>&#xf07a;</i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
        <div class="dropdown">
        <img src="usericon3.png" class="dropbtn" width="26px" height="26px" style="margin-top:17px;margin-right:2px;">
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
        $sql = "SELECT sum(productTotal) FROM tbl_cart";

        ?> 
        </p>
    
        </div>
        
        </div>
    
    </header>
    <center>
    
 <!--<div style="display:flex">
            <button style="margin-left:1px"class="button button2">Subtotal&nbsp;&nbsp;<b>₹</b></button>-->
           
            <!--<form action="ordersummary.php" method="POST">
            <input type="submit" style="margin-left:8.7cm"class="button button1" value="PROCEED TO CHECKOUT">
            </form>
           
    </div></center>-->
    <div class="div2">
        <h3>My Cart</h3>
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
       // echo "No Records";
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
    //$sel="SELECT tbl2.*,tbl1.* FROM tbl_productdetails AS tbl2 INNER JOIN tbl_cart AS tbl1 ON tbl2.productID=tbl1.productID WHERE tbl1.cartStatus=1 AND tbl1.customerID='$userID'";
    $sel="SELECT tbl2.*,tbl1.*,tbl3.* FROM tbl_productdetails AS tbl2 INNER JOIN tbl_cart AS tbl1 ON tbl2.productID=tbl1.productID INNER JOIN tbl_stock AS tbl3 ON tbl3.productID=tbl2.productID WHERE tbl1.cartStatus=1 AND tbl1.stockID=tbl3.stockID AND tbl1.customerID='$userID'";
    if ($result=$conn->query($sel))
{
    if($result->num_rows>0)
    { 
    ?>
   <div style="display:flex">
    <table>
        <tr id="tr1">
           
            <th style="background-color:Gainsboro;width:5cm;">Product</th>
            <th style="background-color:Gainsboro;">Product Name</th>
            
            <th style="background-color:Gainsboro;text-align:center">Measure/Size</th>
            <th style="background-color:Gainsboro;text-align:center">Price</th>
            <!--<th style="background-color:Gainsboro">Total</th>-->
            <th style="background-color:Gainsboro"></th> 
            <th style="background-color:Gainsboro"></th> 
        </tr>
        <?php 
        $i=0;
        $subtotal=0;
        $proprice=0;
        while($row=$result->fetch_array())
        {
            $i++;
            $image=$row["productImage"];
            $cartID=$row["cartID"];
            $stockID=$row["stockID"];
            $productstock=$row["productStock"];

        ?>

        <tr>   
          
            <td><img src='<?php echo $image ?>' width='40%' height='60%'></td>
            <td><?php echo $row["productName"] ?></td>
            

            <?php $productcount=$row["productCount"]?>

            <?php 
            if($productstock==0)
            {
                $proprice=$row["productPrice"];
            }
            else
            {
                $proprice=0;
            }
            $total=$proprice*$productcount ;
            ?>

         

            <?php $productcount=$row["productCount"]?>
            <?php $total=$row["productPrice"]*$productcount ?>
            
            <td><?php echo $row["productQuantity"]."&nbsp".$row["productMeasure"] ?></td>
            <td><?php echo "₹ ".$row["productPrice"] ?></td>
           
            <td>

            <?php $productstock=$row["productStock"]; 
            if($productstock>0)
            {?>
            
            <form id='myform' method='POST' class='quantity' action='#'>
            <input type='button' id="minus"  onclick="minusfunction('<?php echo $cartID ?>')"  value='-' class='qtyminus minus' field='quantity' />

            <input type='text' readonly name='quantity' id="quantity<?php echo $cartID; ?>" value='<?php echo $productcount?>' class='qty' />

            <input type='button' id="plus" onclick="plusfunction('<?php echo $cartID?>')" value='+' class='qtyplus plus' field='quantity' />
            </form>
            <?php }
            else
            {
                $updateproductcount="UPDATE tbl_cart SET productCount=1 WHERE cartID='$cartID'";
                try
                {
                    if($conn->query($updateproductcount)===true);
                    //header("location:productweight.php?productid=$productID&status2=2");
   
    //echo "Profile Updated";
                }
                catch(Exception)
                {
                    //echo "ERROR";
                } 

                ?><font color="red">OUT OF STOCK<font><?php
            }?>
            </td>
           
            <!--<td><?php // echo "₹ ".$total ?></td>-->
            <?php $subtotal=$subtotal+$total; ?>
            <td style="text-align:center;width:9%"><abbr title="Remove from cart"><a href="removefromcart.php?cartid=<?php echo $row["cartID"]?>" onclick="return confirm('Are you sure you want to remove this item?');"><img src="removefromcart.png" style="width:50%"></a></abbr></td>
        </tr> 
 
      
        <?php 
      
        }
        $result->free();

    $newcount=0;
    $cartitemcount2=0;
     
    $sql = "SELECT sum(productCount) FROM tbl_cart WHERE cartStatus=1 AND customerID=$userID";
    $q = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($q);

    $cartitemcount=$row[0];

    $sql2 = "SELECT sum(tbl1.productCount) AS productCount2 FROM tbl_cart AS tbl1 INNER JOIN tbl_stock AS tbl2 ON tbl1.stockID=tbl2.stockID WHERE tbl2.productstock=0 AND tbl1.cartStatus=1 AND tbl1.customerID=$userID";
    $q2 = mysqli_query($conn,$sql2);
    $row = mysqli_fetch_array($q2);

    $cartitemcount2=$row["productCount2"];

    if($cartitemcount2==0)
    {
        $newcount=$cartitemcount;
    }
    else
{
    $newcount= $cartitemcount-$cartitemcount2;
}

$subtotal2=0;
$total2=0;
$newsubtotal=0;

    $sel7="SELECT tbl2.*,tbl1.*,tbl3.* FROM tbl_productdetails AS tbl2 INNER JOIN tbl_cart AS tbl1 ON tbl2.productID=tbl1.productID INNER JOIN tbl_stock AS tbl3 ON tbl3.productID=tbl2.productID WHERE tbl1.cartStatus=1 AND tbl3.productStock=0 AND tbl1.stockID=tbl3.stockID AND tbl1.customerID='$userID'";
    if ($result7=$conn->query($sel7))
{
    if($result7->num_rows>0)
    { 
        $subtotal2=0;
        $total2=0;
        //$proprice=0;
        while($row=$result7->fetch_array())
        {
           $productcount2=$row["productCount"];
            $total2=$row["productPrice"]*$productcount2;
           $subtotal2=$subtotal2+$total2; 
        }
    }
}

if($subtotal2==0)
{
    $newsubtotal=$subtotal;
}
else
{
$newsubtotal=$subtotal-$subtotal2;
}
    
    ?>
        
   </table>
   <?php
   if($newsubtotal==0)
   {

   }
   else
   {?>

   
    
    <div id="cartinfo" style="width:30%;margin:0px">
   
   <?php  ?>
   <br><br><br><h2><?php echo "Total Items :&nbsp&nbsp;".$newcount?></h2>
   <h2><?php echo "Subtotal&nbsp&nbsp:&nbsp₹".$newsubtotal ?></h2>
   
   <a href="home.php#browse" style="color:blue;text-decoration:none">Browse More</a><br><br>
   <?php
   if($userpincode!='')
   {?>
    <form action="ordersummary.php" method="POST">
   <?php
}else{?>
<form action="addcustomeraddress.php?status=3" method="POST">
    <?php }?>
            <input type="submit" class="button button1" value="PROCEED TO CHECKOUT">
    </form>
    
   </div>
   <?php
   }
   ?>
   </div>
   <!--<div style="width:30%">
   <h3 id="next">Cart Info</h3>
   <?php  ?>
   <br><br><h2><?php //echo "Total Items :&nbsp&nbsp;".$cartitemcount?></h2>
   <h2><?php //echo "Subtotal&nbsp&nbsp:&nbsp₹".$subtotal ?></h2><br><br>-->
   <!--<br><a id="continue" href="mycartoriginal.php">Continue</a><br><br>-->
    <!--<br><br><form action="ordersummary.php" method="POST">
            <input type="submit" class="button button1" value="PROCEED TO CHECKOUT">
    </form>-->
    
   <!--</div>
   </div>-->
<?php
}
    else
    {
        echo "Your cart is empty!<br><br><a style='text-decoration:none;color:blue' href='home.php'>Browse Products</a>";
        
    }
    
}
else
{
    echo "ERROR";
   
} ?>

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