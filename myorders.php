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
#snackbar1 {
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
#snackbar1.show {
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
#generatepdf
{
    padding:4px;
    background-color:royalblue;
    border:2px solid royalblue;
    color:white;
    border-radius: 3px;
}
#generatepdf:hover
{
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
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
#generatepdf
{
    padding:4px;
    background-color:royalblue;
    border:2px solid royalblue;
    color:white;
    border-radius: 3px;
}
#generatepdf:hover
{
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
    cursor: pointer;
}
#showupcoming3
{
	padding:7px;
	border-radius: 20px;
	border:transparent;
	font-size: 24px;	
    margin-left: 0.5cm;
}
#showupcoming3:hover
{
	cursor: pointer;
	background-color: whitesmoke;

}
#showupcoming:hover
{
    background-color: Silver;
    cursor:pointer;
    color:black;
}
#generateID3
{
    padding:4px;
    background-color:white;
    border:2px solid red;
    color:red;
    border-radius: 3px;
}
#generateID3:hover
{
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
    cursor: pointer;
}

            
        </style>
        <?php
      
      if(isset($_GET["status1"])==1)
      {
         ?><div id="snackbar1">Order Cancelled Successfully!</div>
            <script> var x = document.getElementById("snackbar1");
          x.className = "show";
          setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);</script><?php 
        }
       
    
     
      ?>
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
    <form action="searchproducts.php"  class="live-search-box" id="search-form" method="POST">
        <input type="button" id="search-speech" value="S" title="start recording" style="margin-left:0.07cm;background-color:transparent;border:transparent;color:transparent;padding:4px 10px 4px 4px;" disabled/>
            <input id="s" type="search" name="search" placeholder="Search products...">
            <input type="submit" name="submit" style="background-color:transparent;border:transparent;color:transparent;padding:0.2px;margin:0px">
            
        </form>

        <div class="navigation">
            <a href="home.php" class="item"  >Home</a>
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
    <div class="div2">
        <center><h2>My Orders</h2></center>
        <button onclick="window.history.back();" id="showupcoming3"><i class="fa fa-arrow-left" aria-hidden="true"></i></button>&nbsp;
    </div>
    <center><br>

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
          
            <th style="background-color:Gainsboro">Ordered on</th>
            <th style="background-color:Gainsboro;width:5cm;">Total products</th>
           
           <!-- <th style="background-color:Gainsboro">Total Price</th>-->
         
            <!--th style="background-color:Gainsboro">Transaction Status</th>-->
            <th style="background-color:Gainsboro"></th>
            <th style="background-color:Gainsboro"></th>
            <th style="background-color:Gainsboro"></th>
            <th style="background-color:Gainsboro"></th>
            <th style="background-color:Gainsboro"></th>
            <th style="background-color:Gainsboro"></th>

            
        </tr>
       <?php
       
            $i=0;
            $selproduct="SELECT tbl1.orderID,tbl1.orderDate,tbl1.shippedDate,tbl1.deliveredDate,tbl1.orderStatus,tbl2.order_ID,tbl2.productID,tbl2.stockID,sum(tbl2.productQuantity) AS proQuantity,tbl3.userID,tbl4.* FROM tbl_order AS tbl1 INNER JOIN tbl_orderitems AS tbl2 ON tbl1.orderID=tbl2.order_ID INNER JOIN tbl_userdetails AS tbl3 ON tbl3.userID=tbl1.customerID INNER JOIN tbl_orderitems AS tbl4 ON tbl4.order_ID=tbl1.orderID WHERE tbl1.customerID=$userID GROUP BY tbl4.order_ID ORDER BY tbl1.orderID DESC";
            if($result2=$conn->query($selproduct))
            {
                if($result2->num_rows>0)
                {
                    while($row=$result2->fetch_array())
                    {
                        $i++;
                        ?>
                        <tr>
                        <?php
                        $orderID=$row["orderID"];
                        $orderDate=$row["orderDate"];
                        $orderstatus=$row["orderStatus"];
                        $shippeddate=$row["shippedDate"];
                        $delivereddate=$row["deliveredDate"];

                        $today= date("Y-m-d");


                        $sel="SELECT sum(productQuantity) AS productQuantity FROM tbl_orderitems WHERE order_ID=$orderID";
                        if($result=$conn->query($sel))
                        {
                            if($result->num_rows>0)
                            {
                                while($row=$result->fetch_array())
                                {
                                    $proQuantity=$row["productQuantity"];
                                }
                                //$result->free();
                            }
                        }


                       
                        echo "<td>".$i."</td>";

                        $orderdatesplitted=explode("-",$orderDate);

                        $year1=$orderdatesplitted[0];
                        $month1=$orderdatesplitted[1];
                        $day1=$orderdatesplitted[2];

                        if($month1==01)
                        {
                            $monthinword1="Jan";
                        }
                        elseif($month1==02)
                        {
                            $monthinword1="Feb";
                        }
                        elseif($month1==03)
                        {
                            $monthinword1="Mar";
                        }
                        elseif($month1==04)
                        {
                            $monthinword1="Apr";
                        }
                        elseif($month1==05)
                        {
                            $monthinword1="May";
                        }
                        elseif($month1==06)
                        {
                            $monthinword1="Jun";
                        }
                        elseif($month1==07)
                        {
                            $monthinword1="Jul";
                        }
                        elseif($month1=="08")
                        {
                            $monthinword1="Aug";
                        }
                        elseif($month1=="09")
                        {
                            $monthinword1="Sep";
                        }
                        elseif($month1==10)
                        {
                            $monthinword1="Oct";
                        }
                        elseif($month1==11)
                        {
                            $monthinword1="Nov";
                        }
                        elseif($month1==12)
                        {
                            $monthinword1="Dec";
                        }


                        $fulldate= $monthinword1." ".$day1.",".$year1;

                        echo "<td>".$fulldate."</td>";
                        echo "<td>".$proQuantity."</td>";
                        //echo "<td>".$proQuantity."</td>";?>
                        <!--<td style="color:green">SUCCESS</td>-->

                        <!--<td><a href="viewreceipt.php?orderid=<?php// echo $orderID; ?>" id="generatepdf" style="text-decoration:none">View Receipt</a></td>-->
                        <td><a href="myorders_onview.php?orderid=<?php echo $orderID; ?>" style="text-decoration:none;color:blue">View more</a></td>
                       
                        <?php if($orderstatus==1||$orderstatus==2)
                        {?>

        
                        <td><a href="cancelorder.php?orderid=<?php echo $orderID; ?>" id="generateID3" style="text-decoration:none;color:red" title="Cancel Order" onclick="return confirm('Are you sure you want to cancel this order?');"><i class="fa fa-times" aria-hidden="true"></i> CANCEL ORDER</a></td>
                        
                        <?php
                        }
                        elseif($orderstatus==0)
                        {
                        ?>
                        <td style="color:gray">ORDER CANCELLED</td>
                        <?php }
                        ?>
                        <td>
                        <?php if($orderstatus==1||$orderstatus==2)
                        {?>

        
                        
                        
                        <?php
                        }
                        else
                        {
                        ?>
                        <td style="color:gray"></td>
                        <?php }
                        ?>
                        </td>
                        <?php if($orderstatus==2)
                        {
                          
                            
                          
                            
                            ?>
                          <td style="color:royalblue" colspan="2">ORDER SHIPPED
                            <font color="black">&nbsp;&nbsp;&nbsp;Delivery Expected by 
                        <?php

                        $expecteddelivery= date('Y-m-d', strtotime($shippeddate. ' + 5 days'));
                        $orderdatesplitted=explode("-",$expecteddelivery);

                        $year=$orderdatesplitted[0];
                        $month=$orderdatesplitted[1];
                        $day=$orderdatesplitted[2];

                        if($month==01)
                        {
                            $monthinword="Jan";
                        }
                        elseif($month==02)
                        {
                            $monthinword="Feb";
                        }
                        elseif($month==03)
                        {
                            $monthinword="Mar";
                        }
                        elseif($month==04)
                        {
                            $monthinword="Apr";
                        }
                        elseif($month==05)
                        {
                            $monthinword="May";
                        }
                        elseif($month==06)
                        {
                            $monthinword="Jun";
                        }
                        elseif($month==07)
                        {
                            $monthinword="Jul";
                        }
                        elseif($month=="08")
                        {
                            $monthinword="Aug";
                        }
                        elseif($month=="09")
                        {
                            $monthinword="Sep";
                        }
                        elseif($month==10)
                        {
                            $monthinword="Oct";
                        }
                        elseif($month==11)
                        {
                            $monthinword="Nov";
                        }
                        elseif($month==12)
                        {
                            $monthinword="Dec";
                        }


                        echo $monthinword." ".$day.",".$year;

                        ?></font></td>
                          
                            <?php
                        }
                        elseif($orderstatus==3)
                        {
                            if($delivereddate==$today)
                            {
                            ?>
                            
                              <td style="color:green"><b>DELIVERED TODAY</b></td>&nbsp;&nbsp;
                              <td><a href="viewreceipt.php?orderid=<?php echo $orderID; ?>" id="generatepdf" style="text-decoration:none">Receipt</a></td>

                              <?php
                            }
                            else
                            {
                                ?>
                                <td>DELIVERED ON &nbsp;&nbsp;<?php 
                              
                                $delivereddatesplitted=explode("-",$delivereddate);
        
                                $year2=$delivereddatesplitted[0];
                                $month2=$delivereddatesplitted[1];
                                $day2=$delivereddatesplitted[2];
        
                                if($month2==01)
                                {
                                    $monthinword2="Jan";
                                }
                                elseif($month2==02)
                                {
                                    $monthinword2="Feb";
                                }
                                elseif($month2==03)
                                {
                                    $monthinword2="Mar";
                                }
                                elseif($month2==04)
                                {
                                    $monthinword2="Apr";
                                }
                                elseif($month==05)
                                {
                                    $monthinword2="May";
                                }
                                elseif($month==06)
                                {
                                    $monthinword2="Jun";
                                }
                                elseif($month==07)
                                {
                                    $monthinword2="Jul";
                                }
                                elseif($month=="08")
                                {
                                    $monthinword2="Aug";
                                }
                                elseif($month2=="09")
                                {
                                    $monthinword2="Sep";
                                }
                                elseif($month2==10)
                                {
                                    $monthinword2="Oct";
                                }
                                elseif($month2==11)
                                {
                                    $monthinword2="Nov";
                                }
                                elseif($month2==12)
                                {
                                    $monthinword2="Dec";
                                }
        
        
                                echo $monthinword2." ".$day2.",".$year2;
                                ?></font></td>
                                <td><a href="viewreceipt.php?orderid=<?php echo $orderID; ?>" id="generatepdf" style="text-decoration:none">Receipt</a></td>

                            <?php
                            }

                              ?>
                             

                        <?php
                        }
                        elseif($orderstatus==1)
                        {
                            ?>
                              <td colspan="3"style="color:chocolate">Yet to be shipped</td>

                        <?php
                        }
                        elseif($orderstatus==0)
                        {
                            ?>
                              <td colspan="3"style="color:black"></td>

                        <?php
                        }
                        ?>
                         
                        </tr>

                        <?php
                   
                }   $result2->free();
            
            }
        }

        

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
    
</body>
</html>