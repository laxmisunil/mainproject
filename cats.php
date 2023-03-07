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
        <title>Cats</title>
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
                margin-left: 1cm;
                margin-right: 1.5cm; 
                margin-bottom:1px; 
                
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
                width:40%;
                border:0.5px solid burlywood ;
            }
            * {box-sizing: border-box}
            .tab {
  float: left;
 
  background-color: #f1f1f1;
  width: 30%;
  height: 100%;
}

/* Style the buttons inside the tab */
.tab button {
  display: block;
  background-color: inherit;
  color: black;
  padding: 22px 16px;
  width: 100%;
  border: none;
  outline: none;
  text-align: left;
  cursor: pointer;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current "tab button" class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  float: left;
  padding: 0px 12px;
  
  width: 70%;
  border-left: none;
  height: 300px;
}
.category
{
    margin-bottom: 0px;
}
.topnav {
  overflow: hidden;
  background-color: #f1f1f1;
}

.topnav a {
  float: left;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a:active {
  background-color: #ddd;
  color: black;
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
                border:0.5px solid gray ;
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
#snackbar2 {
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
.sticky 
            {
                position: fixed;
                top: 0;
                width: 100%;
            }
            .wrapper {
 
 /* This part is important for centering the content */
 display: flex;
 align-items: center;
 justify-content: center;
 /* End center */
 
}

.wrapper a {
 display: inline-block;
 text-decoration: none;
 
 background-color: #fff;
 
 text-transform: uppercase;
 color: #585858;
 font-family: 'Roboto', sans-serif;
}

.modal {
 visibility: hidden;
 opacity: 0;
 position: absolute;
 top: 0;
 right: 0;
 bottom: 0;
 left: 0;
 display: flex;
 align-items: center;
 justify-content: center;
 background: rgba(77, 77, 77, .7);
 transition: all .4s;
}

.modal:target {
 visibility: visible;
 opacity: 1;
}

.modal__content {
 border-radius: 4px;
 position: relative;
 width: 600px;
 max-width: 90%;
 background: #fff;
 padding: 1em 2em;
}

.modal__footer {
 text-align: right;
 a {
   color: #585858;
 }
 i {
   color: #d02d2c;
 }
}
.modal__close {
 position: absolute;
 top: 10px;
 right: 10px;
 color: #585858;
 text-decoration: none;
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
            
            function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
//document.getElementById("defaultOpen").click();

</script>
<script>
  
        function getprice(productID)
            {
                //alert("Hi");
                //var price=$("#productprice").val();
                <?php $userID=$_SESSION["loginID"];?>
                var quantitymeasure=$("#quantitymeasure"+productID).val();
               // alert("HE");

                $.ajax({
                    url: 'getprice.php',
                    type: 'post',
                    dataType:"JSON",
                    data: {"quantitymeasure":quantitymeasure,"productID":productID,"userID":<?php echo $userID ?>},
                    success: function(results)
                    {
                      // alert(response);
                      //$('#productprice'+productID).html(response);
                      $('#productprice'+productID).html(results.res1)
                      if(results.res2<1||results.res3==results.res2)
                     {
                        $('#addorout'+productID).val("Out of Stock");
                        $('#addorout'+productID).css("color","red");
                       // $('#addorout').css("background-color","white");
                   

                        const button = document.querySelector('#addorout'+productID);
                        button.disabled = true;
                        button.style.cursor="not-allowed";
                     }
                     else
                     {
                        $('#addorout'+productID).val("ADD TO CART");
                        $('#addorout'+productID).css("color","white");
                       // $('#addorout').css("background-color","black");

                        /*$('#addorout').hover(function()
                        {
                             $(this).css('background-color', '#595959');
                        });
                       
                        $('#addorout').mouseout(function()
                        {
                             $(this).css('background-color', 'black');
                        });*/
                        const button = document.querySelector('#addorout'+productID);
                        button.disabled = false;
                        button.style.cursor="pointer";
                     }
                       //location.reload(true);
                    }

                });
           
  
            }
    


</script>
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
    <?php
    $sql = "SELECT sum(productCount) FROM tbl_cart WHERE cartStatus=1 AND customerID=$userID";
    $q = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($q);

    $cartitemcount=$row[0];
    
    ?>
    <header class="header" id="myHeader">
    <center><img src="logofinal.png" width="8%" ></center>
    <hr>

    <body>
    <center>
    <div style="display:flex">
    <form action="searchcatproducts.php"  class="live-search-box" id="search-form" method="POST">
        <input type="button" id="search-speech" value="S" title="start recording" style="margin-left:0.67cm;background-color:transparent;border:transparent;color:transparent;padding:4px 10px 4px 4px;" disabled/>
            <input id="s" type="search" name="search" placeholder="Search cat products...">
            <input type="submit" name="submit" style="background-color:transparent;border:transparent;color:transparent;padding:0.2px;margin:0px">
            
        </form>

        <div class="navigation">
            <a href="home.php" class="item">Home</a>
            <a href="dogs.php" class="item">Dogs</a>
            <a href="" class="item" id="active">Cats</a>
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
    <body>
    <div style="display: flex;">
        <center><br>
        <img src="cathome.png" width="100%">
    </div>
    
    
<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">Foods</button>
  <button class="tablinks" onclick="openCity(event, 'Paris')">Toys</button>
  <button class="tablinks" onclick="openCity(event, 'Tokyo')">Accessories</button>
</div>

<div id="London" class="tabcontent">
  <h2 class="category">Foods</h2>
  <br>
  <div class="topnav">
  <a href="#dry&wetfoods" class="active">Dry & Wet Foods</a>
  <a href="#treats&chews">Treats & Chews</a>
  <a href="#biscuits&cookies">Biscuits & Cookies</a>
  <!--<a href="#foodsuppliments">Food Suppliments</a>-->
</div>

<div id="dry&wetfoods">
<div class="div2"><center>
            <h3>D R Y&nbsp;&nbsp;&nbsp;&&nbsp;&nbsp;&nbsp;W E T&nbsp;&nbsp;&nbsp;F O O D S</h3>
            <hr class="separater">
        </div>


  <?php 
include "connection.php";
//$sel="SELECT * FROM tbl_productdetails WHERE productStatus=1 AND productFor='Cats'AND productCategory='Food' AND (productSubcategory='Dry Food' OR productSubcategory='Wet Food')";

//first, i set a counter 
$sel="SELECT tbl2.*,tbl1.* FROM tbl_stock AS tbl2 INNER JOIN tbl_productdetails AS tbl1 ON tbl2.productID=tbl1.productID WHERE tbl1.productFor='Cats' AND tbl1.productCategory='Food' AND (tbl1.productSubcategory='Dry Food' OR tbl1.productSubcategory='Wet Food') GROUP BY tbl2.productID";
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
            $productfor=$row["productFor"];
            $productsubcategory=$row["productSubcategory"];
            $productcategory=$row["productCategory"];
            //// = $row['productPrice'];
            $productdescription = $row['productDescription'];

            echo '<td>'."<div style='text-align:center' class='d1'><form  method='POST' action='addtocartcats.php?productid=$productID'><img src='$image' width='80%' height='auto'><br>
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
         $result4->free();
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
 
             <h4 style='color:gray;text-align:center' id='productprice$productID'>Rs. $productprice</h4>";
             ?>

<div class="wrapper">
    								<a id="afterclose" href="#demo-modal<?php echo $productID?>" style="color:blue;font-size:14px">View more</a>
								</div>
								<!--MODAL STARTS...-->

								<div id="demo-modal<?php echo $productID?>" class="modal">
    								<div class="modal__content">
									<h1>Product Details</h1>
                                    <div style="display:flex">

                                    <div style="border:1px solid gray">
                                    <img src="<?php echo $image?>" width='100%''>

                                    </div>
                                    <div>
													<table>

                                                
        											
														<tr>
														
															<td><h2><?php echo $productname; ?></h2></td>
														</tr>
														<tr>
															
															<td><h3><?php echo $productsubcategory."&nbsp;for&nbsp".$productfor ?></h3></td>
														</tr>
														<tr>
															
															<td><h4><?php echo $productsubname; ?><h4></td>
														</tr>
														<tr>
															
															<td><h4><?php echo $productdescription; ?></h4></td>
														</tr>

                                                       <tr><td><p style="color:grey">Variations Available</p></td></tr>
                                                        <?php 
                                                        $sel9="SELECT * FROM tbl_stock WHERE productID=$productID";
                                                        if($result9=$conn->query($sel9))
                                                        {
                                                            if($result9->num_rows>0)
                                                            {
                                                       while($row=$result9->fetch_array())
                                                        {?>
                                                        <tr>
		
															<td><h4><?php echo $row["productQuantity"].$row["productMeasure"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;₹ ".$row["productPrice"]; ?></h4></td>
														</tr>
                                                        <?php } 
                                                        }
                                                    }
                                                    ?>
                                                       
													
	
			                            </table>
                                    </div>
                                    </div>						
								<!--MODAL ENDS-->
   
                                   <a href="#afterclose" class="modal__close">&times;</a>
                                 </div>
                                </div>
         

             
             <?php echo "<br>
 
             <input class='button1' type='submit' id='addorout$productID' value='ADD TO CART' name='addtocart'>
             </form></div><br>".'</td>' ;
          
             //there is a magic - if our counter is greater then 5 we set counter to zero and close tr tag  
             if ($i>2)
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
</div>

<div id="treats&chews">
<div class="div2"><center>
            <h3>T R E A T S&nbsp;&nbsp;&nbsp;&&nbsp;&nbsp;&nbsp;C H E W S</h3>
            <hr class="separater">
        </div>

  <?php 
include "connection.php";
//$sel="SELECT * FROM tbl_productdetails WHERE productStatus=1 AND productFor='Cats' AND productCategory='Food' AND (productSubcategory='Treats' OR productSubcategory='Chews')";
//first, i set a counter 
$sel="SELECT tbl2.*,tbl1.* FROM tbl_stock AS tbl2 INNER JOIN tbl_productdetails AS tbl1 ON tbl2.productID=tbl1.productID WHERE tbl1.productFor='Cats' AND tbl1.productCategory='Food' AND (tbl1.productSubcategory='Treats' OR tbl1.productSubcategory='Chews') GROUP BY tbl2.productID";
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
            $productfor=$row["productFor"];
            $productsubcategory=$row["productSubcategory"];
            $productcategory=$row["productCategory"];
            //// = $row['productPrice'];;
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
         $result4->free();
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
 
             <h4 style='color:gray;text-align:center' id='productprice$productID'>Rs. $productprice</h4>";
             ?>
             <div class="wrapper">
    								<a id="afterclose2" href="#demo-modal<?php echo $productID?>" style="color:blue;font-size:14px">View more</a>
								</div>
								<!--MODAL STARTS...-->

								<div id="demo-modal<?php echo $productID?>" class="modal">
    								<div class="modal__content">
									<h1>Product Details</h1>
                                    <div style="display:flex">

                                    <div style="border:1px solid gray">
                                    <img src="<?php echo $image?>" width='100%''>

                                    </div>
                                    <div>
													<table>

                                                
        											
														<tr>
														
															<td><h2><?php echo $productname; ?></h2></td>
														</tr>
														<tr>
															
															<td><h3><?php echo $productsubcategory."&nbsp;for&nbsp".$productfor ?></h3></td>
														</tr>
														<tr>
															
															<td><h4><?php echo $productsubname; ?><h4></td>
														</tr>
														<tr>
															
															<td><h4><?php echo $productdescription; ?></h4></td>
														</tr>

                                                       <tr><td><p style="color:grey">Variations Available</p></td></tr>
                                                        <?php 
                                                        $sel9="SELECT * FROM tbl_stock WHERE productID=$productID";
                                                        if($result9=$conn->query($sel9))
                                                        {
                                                            if($result9->num_rows>0)
                                                            {
                                                       while($row=$result9->fetch_array())
                                                        {?>
                                                        <tr>
		
															<td><h4><?php echo $row["productQuantity"].$row["productMeasure"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;₹ ".$row["productPrice"]; ?></h4></td>
														</tr>
                                                        <?php } 
                                                        }
                                                    }
                                                    ?>
                                                       
													
	
			                            </table>
                                    </div>
                                    </div>						
								<!--MODAL ENDS-->
   
                                   <a href="#afterclose2" class="modal__close">&times;</a>
                                 </div>
                                </div>
         




<?php echo "<br>
 
             <input class='button1' type='submit' id='addorout$productID' value='ADD TO CART' name='addtocart'>
             </form></div><br>".'</td>' ;
          
             //there is a magic - if our counter is greater then 5 we set counter to zero and close tr tag  
             if ($i>2)
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
</div>

<div id="biscuits&cookies">
<div class="div2"><center>
            <h3>B I S C U I T S&nbsp;&nbsp;&nbsp;&&nbsp;&nbsp;&nbsp;C O O K I E S</h3>
            <hr class="separater">
        </div>

  <?php 
include "connection.php";
//$sel="SELECT * FROM tbl_productdetails WHERE productStatus=1 AND productFor='Cats' AND productCategory='Food' AND (productSubcategory='Biscuits' OR productSubcategory='Cookies')";
//first, i set a counter 
$sel="SELECT tbl2.*,tbl1.* FROM tbl_stock AS tbl2 INNER JOIN tbl_productdetails AS tbl1 ON tbl2.productID=tbl1.productID WHERE tbl1.productFor='Cats' AND tbl1.productCategory='Food' AND (tbl1.productSubcategory='Biscuits' OR tbl1.productSubcategory='Cookies') GROUP BY tbl2.productID";
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
            $productfor=$row["productFor"];
            $productsubcategory=$row["productSubcategory"];
            $productcategory=$row["productCategory"];
            //// = $row['productPrice'];
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
         $result4->free();
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
 
             <h4 style='color:gray;text-align:center' id='productprice$productID'>Rs. $productprice</h4>";
             ?>
             <div class="wrapper">
    								<a id="afterclose3" href="#demo-modal<?php echo $productID?>" style="color:blue;font-size:14px">View more</a>
								</div>
								<!--MODAL STARTS...-->

								<div id="demo-modal<?php echo $productID?>" class="modal">
    								<div class="modal__content">
									<h1>Product Details</h1>
                                    <div style="display:flex">

                                    <div style="border:1px solid gray">
                                    <img src="<?php echo $image?>" width='100%''>

                                    </div>
                                    <div>
													<table>

                                                
        											
														<tr>
														
															<td><h2><?php echo $productname; ?></h2></td>
														</tr>
														<tr>
															
															<td><h3><?php echo $productsubcategory."&nbsp;for&nbsp".$productfor ?></h3></td>
														</tr>
														<tr>
															
															<td><h4><?php echo $productsubname; ?><h4></td>
														</tr>
														<tr>
															
															<td><h4><?php echo $productdescription; ?></h4></td>
														</tr>

                                                       <tr><td><p style="color:grey">Variations Available</p></td></tr>
                                                        <?php 
                                                        $sel9="SELECT * FROM tbl_stock WHERE productID=$productID";
                                                        if($result9=$conn->query($sel9))
                                                        {
                                                            if($result9->num_rows>0)
                                                            {
                                                       while($row=$result9->fetch_array())
                                                        {?>
                                                        <tr>
		
															<td><h4><?php echo $row["productQuantity"].$row["productMeasure"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;₹ ".$row["productPrice"]; ?></h4></td>
														</tr>
                                                        <?php } 
                                                        }
                                                    }
                                                    ?>
                                                       
													
	
			                            </table>
                                    </div>
                                    </div>						
								<!--MODAL ENDS-->
   
                                   <a href="#afterclose3" class="modal__close">&times;</a>
                                 </div>
                                </div>
         





<?php 
            echo "<br>
 
             <input class='button1' type='submit' id='addorout$productID' value='ADD TO CART' name='addtocart'>
             </form></div><br>".'</td>' ;
          
             //there is a magic - if our counter is greater then 5 we set counter to zero and close tr tag  
             if ($i>2)
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
</div>

</div>

</div>
</div>


<div id="Paris" style="display:none" class="tabcontent">
  <h2 class="category">Toys</h2>
  <br>
  <div class="topnav">
  <a href="#chewtoys">Chew Toys</a>
  <a href="#plushtoys">Plush Toys</a>
  <a href="#ropetoys">Rope Toys</a>
  <a href="#softtoys">Soft Toys</a>
</div>

<div id="chewtoys">
<div class="div2"><center>
            <h3>C H E W&nbsp;&nbsp;&nbsp;T O Y S</h3>
            <hr class="separater">
        </div>

  <?php 
include "connection.php";
//$sel="SELECT * FROM tbl_productdetails WHERE productStatus=1 AND productFor='Cats' AND productCategory='Toys' AND productSubcategory='Chew Toy'";
//first, i set a counter 
$sel="SELECT tbl2.*,tbl1.* FROM tbl_stock AS tbl2 INNER JOIN tbl_productdetails AS tbl1 ON tbl2.productID=tbl1.productID WHERE tbl1.productFor='Cats' AND tbl1.productCategory='Toys' AND tbl1.productSubcategory='Chew Toy' GROUP BY tbl2.productID";
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
            $productfor=$row["productFor"];
            $productsubcategory=$row["productSubcategory"];
            $productcategory=$row["productCategory"];
            //// = $row['productPrice'];
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
         $result4->free();
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
 
             <h4 style='color:gray;text-align:center' id='productprice$productID'>Rs. $productprice</h4>";
             ?>
             <div class="wrapper">
    								<a id="afterclose4" href="#demo-modal<?php echo $productID?>" style="color:blue;font-size:14px">View more</a>
								</div>
								<!--MODAL STARTS...-->

								<div id="demo-modal<?php echo $productID?>" class="modal">
    								<div class="modal__content">
									<h1>Product Details</h1>
                                    <div style="display:flex">

                                    <div style="border:1px solid gray">
                                    <img src="<?php echo $image?>" width='100%''>

                                    </div>
                                    <div>
													<table>

                                                
        											
														<tr>
														
															<td><h2><?php echo $productname; ?></h2></td>
														</tr>
														<tr>
															
															<td><h3><?php echo $productsubcategory."&nbsp;for&nbsp".$productfor ?></h3></td>
														</tr>
														<tr>
															
															<td><h4><?php echo $productsubname; ?><h4></td>
														</tr>
														<tr>
															
															<td><h4><?php echo $productdescription; ?></h4></td>
														</tr>

                                                       <tr><td><p style="color:grey">Variations Available</p></td></tr>
                                                        <?php 
                                                        $sel9="SELECT * FROM tbl_stock WHERE productID=$productID";
                                                        if($result9=$conn->query($sel9))
                                                        {
                                                            if($result9->num_rows>0)
                                                            {
                                                       while($row=$result9->fetch_array())
                                                        {?>
                                                        <tr>
		
															<td><h4><?php echo $row["productQuantity"].$row["productMeasure"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;₹ ".$row["productPrice"]; ?></h4></td>
														</tr>
                                                        <?php } 
                                                        }
                                                    }
                                                    ?>
                                                       
													
	
			                            </table>
                                    </div>
                                    </div>						
								<!--MODAL ENDS-->
   
                                   <a href="#afterclose4" class="modal__close">&times;</a>
                                 </div>
                                </div>
         
             
             
             <?php echo "<br>
 
             <input class='button1' type='submit' id='addorout$productID' value='ADD TO CART' name='addtocart'>
             </form></div><br>".'</td>' ;
          
             //there is a magic - if our counter is greater then 5 we set counter to zero and close tr tag  
             if ($i>2)
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
</div>

<div id="plushtoys">
<div class="div2"><center>
            <h3>P L U S H&nbsp;&nbsp;&nbsp;T O Y S</h3>
            <hr class="separater">
        </div>

  <?php 
include "connection.php";
//$sel="SELECT * FROM tbl_productdetails WHERE productStatus=1 AND productFor='Cats' AND productCategory='Toys' AND productSubcategory='Plush Toy'";
//first, i set a counter 
$sel="SELECT tbl2.*,tbl1.* FROM tbl_stock AS tbl2 INNER JOIN tbl_productdetails AS tbl1 ON tbl2.productID=tbl1.productID WHERE tbl1.productFor='Cats' AND tbl1.productCategory='Toys' AND tbl1.productSubcategory='Plush Toy' GROUP BY tbl2.productID";
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
            $productfor=$row["productFor"];
            $productsubcategory=$row["productSubcategory"];
            $productcategory=$row["productCategory"];
            //// = $row['productPrice'];
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
         $result4->free();
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
 
             <h4 style='color:gray;text-align:center' id='productprice$productID'>Rs. $productprice</h4>";
             ?>
            <div class="wrapper">
    								<a id="afterclose5" href="#demo-modal<?php echo $productID?>" style="color:blue;font-size:14px">View more</a>
								</div>
								<!--MODAL STARTS...-->

								<div id="demo-modal<?php echo $productID?>" class="modal">
    								<div class="modal__content">
									<h1>Product Details</h1>
                                    <div style="display:flex">

                                    <div style="border:1px solid gray">
                                    <img src="<?php echo $image?>" width='100%''>

                                    </div>
                                    <div>
													<table>

                                                
        											
														<tr>
														
															<td><h2><?php echo $productname; ?></h2></td>
														</tr>
														<tr>
															
															<td><h3><?php echo $productsubcategory."&nbsp;for&nbsp".$productfor ?></h3></td>
														</tr>
														<tr>
															
															<td><h4><?php echo $productsubname; ?><h4></td>
														</tr>
														<tr>
															
															<td><h4><?php echo $productdescription; ?></h4></td>
														</tr>

                                                       <tr><td><p style="color:grey">Variations Available</p></td></tr>
                                                        <?php 
                                                        $sel9="SELECT * FROM tbl_stock WHERE productID=$productID";
                                                        if($result9=$conn->query($sel9))
                                                        {
                                                            if($result9->num_rows>0)
                                                            {
                                                       while($row=$result9->fetch_array())
                                                        {?>
                                                        <tr>
		
															<td><h4><?php echo $row["productQuantity"].$row["productMeasure"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;₹ ".$row["productPrice"]; ?></h4></td>
														</tr>
                                                        <?php } 
                                                        }
                                                    }
                                                    ?>
                                                       
													
	
			                            </table>
                                    </div>
                                    </div>						
								<!--MODAL ENDS-->
   
                                   <a href="#afterclose5" class="modal__close">&times;</a>
                                 </div>
                                </div>
         



<?php 
         echo "<br>
 
             <input class='button1' type='submit' id='addorout$productID' value='ADD TO CART' name='addtocart'>
             </form></div><br>".'</td>' ;
          
             //there is a magic - if our counter is greater then 5 we set counter to zero and close tr tag  
             if ($i>2)
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
</div>

<div id="ropetoys">
<div class="div2"><center>
            <h3>R O P E&nbsp;&nbsp;&nbsp;T O Y S</h3>
            <hr class="separater">
        </div>


  <?php 
include "connection.php";
//$sel="SELECT * FROM tbl_productdetails WHERE productStatus=1 AND productFor='Cats' AND productCategory='Toys' AND productSubcategory='Rope Toy'";
//first, i set a counter 
$sel="SELECT tbl2.*,tbl1.* FROM tbl_stock AS tbl2 INNER JOIN tbl_productdetails AS tbl1 ON tbl2.productID=tbl1.productID WHERE tbl1.productFor='Cats' AND tbl1.productCategory='Toys' AND tbl1.productSubcategory='Rope Toy' GROUP BY tbl2.productID";
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
            $productfor=$row["productFor"];
            $productsubcategory=$row["productSubcategory"];
            $productcategory=$row["productCategory"];
            //// = $row['productPrice'];
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
         $result4->free();
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
 
             <h4 style='color:gray;text-align:center' id='productprice$productID'>Rs. $productprice</h4>";

             ?>
             <div class="wrapper">
    								<a id="afterclose6" href="#demo-modal<?php echo $productID?>" style="color:blue;font-size:14px">View more</a>
								</div>
								<!--MODAL STARTS...-->

								<div id="demo-modal<?php echo $productID?>" class="modal">
    								<div class="modal__content">
									<h1>Product Details</h1>
                                    <div style="display:flex">

                                    <div style="border:1px solid gray">
                                    <img src="<?php echo $image?>" width='100%''>

                                    </div>
                                    <div>
													<table>

                                                
        											
														<tr>
														
															<td><h2><?php echo $productname; ?></h2></td>
														</tr>
														<tr>
															
															<td><h3><?php echo $productsubcategory."&nbsp;for&nbsp".$productfor ?></h3></td>
														</tr>
														<tr>
															
															<td><h4><?php echo $productsubname; ?><h4></td>
														</tr>
														<tr>
															
															<td><h4><?php echo $productdescription; ?></h4></td>
														</tr>

                                                       <tr><td><p style="color:grey">Variations Available</p></td></tr>
                                                        <?php 
                                                        $sel9="SELECT * FROM tbl_stock WHERE productID=$productID";
                                                        if($result9=$conn->query($sel9))
                                                        {
                                                            if($result9->num_rows>0)
                                                            {
                                                       while($row=$result9->fetch_array())
                                                        {?>
                                                        <tr>
		
															<td><h4><?php echo $row["productQuantity"].$row["productMeasure"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;₹ ".$row["productPrice"]; ?></h4></td>
														</tr>
                                                        <?php } 
                                                        }
                                                    }
                                                    ?>
                                                       
													
	
			                            </table>
                                    </div>
                                    </div>						
								<!--MODAL ENDS-->
   
                                   <a href="#afterclose6" class="modal__close">&times;</a>
                                 </div>
                                </div>
         


<?php
           echo "<br>
 
             <input class='button1' type='submit' id='addorout$productID' value='ADD TO CART' name='addtocart'>
             </form></div><br>".'</td>' ;
          
             //there is a magic - if our counter is greater then 5 we set counter to zero and close tr tag  
             if ($i>2)
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
</div>

<div id="softtoys">
<div class="div2"><center>
            <h3>S O F T&nbsp;&nbsp;&nbsp;T O Y S</h3>
            <hr class="separater">
        </div>
<?php 
include "connection.php";
//$sel="SELECT * FROM tbl_productdetails WHERE productStatus=1 AND productFor='Cats' AND productCategory='Toys' AND productSubcategory='Soft Toy'";
//first, i set a counter 
$sel="SELECT tbl2.*,tbl1.* FROM tbl_stock AS tbl2 INNER JOIN tbl_productdetails AS tbl1 ON tbl2.productID=tbl1.productID WHERE tbl1.productFor='Cats' AND tbl1.productCategory='Toys' AND tbl1.productSubcategory='Soft Toy' GROUP BY tbl2.productID";
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
            $productfor=$row["productFor"];
            $productsubcategory=$row["productSubcategory"];
            $productcategory=$row["productCategory"];
            //// = $row['productPrice'];;
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
         $result4->free();
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
 
             <h4 style='color:gray;text-align:center' id='productprice$productID'>Rs. $productprice</h4>";
             ?>
             <div class="wrapper">
    								<a id="afterclose7" href="#demo-modal<?php echo $productID?>" style="color:blue;font-size:14px">View more</a>
								</div>
								<!--MODAL STARTS...-->

								<div id="demo-modal<?php echo $productID?>" class="modal">
    								<div class="modal__content">
									<h1>Product Details</h1>
                                    <div style="display:flex">

                                    <div style="border:1px solid gray">
                                    <img src="<?php echo $image?>" width='100%''>

                                    </div>
                                    <div>
													<table>

                                                
        											
														<tr>
														
															<td><h2><?php echo $productname; ?></h2></td>
														</tr>
														<tr>
															
															<td><h3><?php echo $productsubcategory."&nbsp;for&nbsp".$productfor ?></h3></td>
														</tr>
														<tr>
															
															<td><h4><?php echo $productsubname; ?><h4></td>
														</tr>
														<tr>
															
															<td><h4><?php echo $productdescription; ?></h4></td>
														</tr>

                                                       <tr><td><p style="color:grey">Variations Available</p></td></tr>
                                                        <?php 
                                                        $sel9="SELECT * FROM tbl_stock WHERE productID=$productID";
                                                        if($result9=$conn->query($sel9))
                                                        {
                                                            if($result9->num_rows>0)
                                                            {
                                                       while($row=$result9->fetch_array())
                                                        {?>
                                                        <tr>
		
															<td><h4><?php echo $row["productQuantity"].$row["productMeasure"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;₹ ".$row["productPrice"]; ?></h4></td>
														</tr>
                                                        <?php } 
                                                        }
                                                    }
                                                    ?>
                                                       
													
	
			                            </table>
                                    </div>
                                    </div>						
								<!--MODAL ENDS-->
   
                                   <a href="#afterclose7" class="modal__close">&times;</a>
                                 </div>
                                </div>
         


<?php
             
           echo "<br>
 
             <input class='button1' type='submit' id='addorout$productID' value='ADD TO CART' name='addtocart'>
             </form></div><br>".'</td>' ;
          
             //there is a magic - if our counter is greater then 5 we set counter to zero and close tr tag  
             if ($i>2)
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
</div>

</div>
</div>



<div  id="Tokyo" style="display:none" class="tabcontent">
  <h2 class="category">Accessories</h2>

  <br>
  <div class="topnav">
  <a href="#clothes">Clothes</a>
  <a href="#bowls&feeders">Bowls & Feeders</a>
  <a href="#collars&leashes">Collars & Harness</a>
  <a href="#bedding&travelsupplies">Bedding & Travel Supplies</a>
  <a href="#supplements">Supplements</a>
</div>

<div id="clothes">
<div class="div2"><center>
            <h3>C L O T H E S&nbsp;&nbsp;&nbsp;&&nbsp;&nbsp;&nbsp;T I E S</h3>
            <hr class="separater">
        </div>

  <?php 
include "connection.php";
//$sel="SELECT * FROM tbl_productdetails WHERE productStatus=1 AND productFor='Cats' AND productCategory='Accessories'AND productSubcategory='Cloth'";
//first, i set a counter 
$sel="SELECT tbl2.*,tbl1.* FROM tbl_stock AS tbl2 INNER JOIN tbl_productdetails AS tbl1 ON tbl2.productID=tbl1.productID WHERE tbl1.productFor='Cats' AND tbl1.productCategory='Accessories' AND tbl1.productSubcategory='Cloth' GROUP BY tbl2.productID";
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
            $productfor=$row["productFor"];
            $productsubcategory=$row["productSubcategory"];
            $productcategory=$row["productCategory"];
            //// = $row['productPrice'];
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
         $result4->free();
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
 
             <h4 style='color:gray;text-align:center' id='productprice$productID'>Rs. $productprice</h4>";
             ?>
             <div class="wrapper">
    								<a id="afterclose8" href="#demo-modal<?php echo $productID?>" style="color:blue;font-size:14px">View more</a>
								</div>
								<!--MODAL STARTS...-->

								<div id="demo-modal<?php echo $productID?>" class="modal">
    								<div class="modal__content">
									<h1>Product Details</h1>
                                    <div style="display:flex">

                                    <div style="border:1px solid gray">
                                    <img src="<?php echo $image?>" width='100%''>

                                    </div>
                                    <div>
													<table>

                                                
        											
														<tr>
														
															<td><h2><?php echo $productname; ?></h2></td>
														</tr>
														<tr>
															
															<td><h3><?php echo $productsubcategory."&nbsp;for&nbsp".$productfor ?></h3></td>
														</tr>
														<tr>
															
															<td><h4><?php echo $productsubname; ?><h4></td>
														</tr>
														<tr>
															
															<td><h4><?php echo $productdescription; ?></h4></td>
														</tr>

                                                       <tr><td><p style="color:grey">Variations Available</p></td></tr>
                                                        <?php 
                                                        $sel9="SELECT * FROM tbl_stock WHERE productID=$productID";
                                                        if($result9=$conn->query($sel9))
                                                        {
                                                            if($result9->num_rows>0)
                                                            {
                                                       while($row=$result9->fetch_array())
                                                        {?>
                                                        <tr>
		
															<td><h4><?php echo $row["productQuantity"].$row["productMeasure"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;₹ ".$row["productPrice"]; ?></h4></td>
														</tr>
                                                        <?php } 
                                                        }
                                                    }
                                                    ?>
                                                       
													
	
			                            </table>
                                    </div>
                                    </div>						
								<!--MODAL ENDS-->
   
                                   <a href="#afterclose8" class="modal__close">&times;</a>
                                 </div>
                                </div>
         




<?php
             
           echo "<br>
 
             <input class='button1' type='submit' id='addorout$productID' value='ADD TO CART' name='addtocart'>
             </form></div><br>".'</td>' ;
          
             //there is a magic - if our counter is greater then 5 we set counter to zero and close tr tag  
             if ($i>2)
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
</div>

<div id="bowls&feeders">
<div class="div2"><center>
            <h3>B O W L S&nbsp;&nbsp;&nbsp;&&nbsp;&nbsp;&nbsp;F E E D E R S</h3>
            <hr class="separater">
        </div>

  <?php 
include "connection.php";
//$sel="SELECT * FROM tbl_productdetails WHERE productStatus=1 AND productFor='Cats' AND productCategory='Accessories' AND (productSubcategory='Bowl' OR productSubcategory='Feeder')";
//first, i set a counter 
$sel="SELECT tbl2.*,tbl1.* FROM tbl_stock AS tbl2 INNER JOIN tbl_productdetails AS tbl1 ON tbl2.productID=tbl1.productID WHERE tbl1.productFor='Cats' AND tbl1.productCategory='Accessories' AND (tbl1.productSubcategory='Feeder' OR tbl1.productSubcategory='Bowl') GROUP BY tbl2.productID";
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
            $productfor=$row["productFor"];
            $productsubcategory=$row["productSubcategory"];
            $productcategory=$row["productCategory"];
            //// = $row['productPrice'];
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
         $result4->free();
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
 
             <h4 style='color:gray;text-align:center' id='productprice$productID'>Rs. $productprice</h4>";
             ?>

<div class="wrapper">
    								<a id="afterclose9" href="#demo-modal<?php echo $productID?>" style="color:blue;font-size:14px">View more</a>
								</div>
								<!--MODAL STARTS...-->

								<div id="demo-modal<?php echo $productID?>" class="modal">
    								<div class="modal__content">
									<h1>Product Details</h1>
                                    <div style="display:flex">

                                    <div style="border:1px solid gray">
                                    <img src="<?php echo $image?>" width='100%''>

                                    </div>
                                    <div>
													<table>

                                                
        											
														<tr>
														
															<td><h2><?php echo $productname; ?></h2></td>
														</tr>
														<tr>
															
															<td><h3><?php echo $productsubcategory."&nbsp;for&nbsp".$productfor ?></h3></td>
														</tr>
														<tr>
															
															<td><h4><?php echo $productsubname; ?><h4></td>
														</tr>
														<tr>
															
															<td><h4><?php echo $productdescription; ?></h4></td>
														</tr>

                                                       <tr><td><p style="color:grey">Variations Available</p></td></tr>
                                                        <?php 
                                                        $sel9="SELECT * FROM tbl_stock WHERE productID=$productID";
                                                        if($result9=$conn->query($sel9))
                                                        {
                                                            if($result9->num_rows>0)
                                                            {
                                                       while($row=$result9->fetch_array())
                                                        {?>
                                                        <tr>
		
															<td><h4><?php echo $row["productQuantity"].$row["productMeasure"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;₹ ".$row["productPrice"]; ?></h4></td>
														</tr>
                                                        <?php } 
                                                        }
                                                    }
                                                    ?>
                                                       
													
	
			                            </table>
                                    </div>
                                    </div>						
								<!--MODAL ENDS-->
   
                                   <a href="#afterclose9" class="modal__close">&times;</a>
                                 </div>
                                </div>
         


<?php
         echo "<br>
 
             <input class='button1' type='submit' id='addorout$productID' value='ADD TO CART' name='addtocart'>
             </form></div><br>".'</td>' ;
          
             //there is a magic - if our counter is greater then 5 we set counter to zero and close tr tag  
             if ($i>2)
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
</div>

<div id="collars&leashes">
<div class="div2"><center>
            <h3>C O L L A R S&nbsp;&nbsp;&nbsp;&&nbsp;&nbsp;&nbsp;H A R N E S S</h3>
            <hr class="separater">
        </div>

  <?php 
include "connection.php";
//$sel="SELECT * FROM tbl_productdetails WHERE productStatus=1 AND productFor='Cats' AND productCategory='Accessories' AND (productSubcategory='Collar' OR productSubcategory='Harness')";
//first, i set a counter 
$sel="SELECT tbl2.*,tbl1.* FROM tbl_stock AS tbl2 INNER JOIN tbl_productdetails AS tbl1 ON tbl2.productID=tbl1.productID WHERE tbl1.productFor='Cats' AND tbl1.productCategory='Accessories' AND (tbl1.productSubcategory='Collar' OR tbl1.productSubcategory='Harness') GROUP BY tbl2.productID";
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
            $productfor=$row["productFor"];
            $productsubcategory=$row["productSubcategory"];
            $productcategory=$row["productCategory"];
            //// = $row['productPrice'];
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
         $result4->free();
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
 
             <h4 style='color:gray;text-align:center' id='productprice$productID'>Rs. $productprice</h4>";
             ?>
             <div class="wrapper">
    								<a id="afterclose10" href="#demo-modal<?php echo $productID?>" style="color:blue;font-size:14px">View more</a>
								</div>
								<!--MODAL STARTS...-->

								<div id="demo-modal<?php echo $productID?>" class="modal">
    								<div class="modal__content">
									<h1>Product Details</h1>
                                    <div style="display:flex">

                                    <div style="border:1px solid gray">
                                    <img src="<?php echo $image?>" width='100%''>

                                    </div>
                                    <div>
													<table>

                                                
        											
														<tr>
														
															<td><h2><?php echo $productname; ?></h2></td>
														</tr>
														<tr>
															
															<td><h3><?php echo $productsubcategory."&nbsp;for&nbsp".$productfor ?></h3></td>
														</tr>
														<tr>
															
															<td><h4><?php echo $productsubname; ?><h4></td>
														</tr>
														<tr>
															
															<td><h4><?php echo $productdescription; ?></h4></td>
														</tr>

                                                       <tr><td><p style="color:grey">Variations Available</p></td></tr>
                                                        <?php 
                                                        $sel9="SELECT * FROM tbl_stock WHERE productID=$productID";
                                                        if($result9=$conn->query($sel9))
                                                        {
                                                            if($result9->num_rows>0)
                                                            {
                                                       while($row=$result9->fetch_array())
                                                        {?>
                                                        <tr>
		
															<td><h4><?php echo $row["productQuantity"].$row["productMeasure"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;₹ ".$row["productPrice"]; ?></h4></td>
														</tr>
                                                        <?php } 
                                                        }
                                                    }
                                                    ?>
                                                       
													
	
			                            </table>
                                    </div>
                                    </div>						
								<!--MODAL ENDS-->
   
                                   <a href="#afterclose10" class="modal__close">&times;</a>
                                 </div>
                                </div>
         


<?php
           echo "<br>
 
             <input class='button1' type='submit' id='addorout$productID' value='ADD TO CART' name='addtocart'>
             </form></div><br>".'</td>' ;
          
             //there is a magic - if our counter is greater then 5 we set counter to zero and close tr tag  
             if ($i>2)
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
</div>

<div id="bedding&travelsupplies">
<div class="div2"><center>
            <h3>B E D D I N G&nbsp;&nbsp;&nbsp;&&nbsp;&nbsp;&nbsp;T R A V E L&nbsp;&nbsp;&nbsp;S U P P L I E S</h3>
            <hr class="separater">
        </div>
    
  <?php 
include "connection.php";
//$sel="SELECT * FROM tbl_productdetails WHERE productStatus=1 AND productFor='Cats' AND productCategory='Accessories' AND (productSubcategory='Bed' OR productSubcategory='Travel Supplies')";
//first, i set a counter 
$sel="SELECT tbl2.*,tbl1.* FROM tbl_stock AS tbl2 INNER JOIN tbl_productdetails AS tbl1 ON tbl2.productID=tbl1.productID WHERE tbl1.productFor='Cats' AND tbl1.productCategory='Accessories' AND (tbl1.productSubcategory='Bed' OR tbl1.productSubcategory='Travel Supplies') GROUP BY tbl2.productID";
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
            $productfor=$row["productFor"];
            $productsubcategory=$row["productSubcategory"];
            $productcategory=$row["productCategory"];
            //// = $row['productPrice'];
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
         $result4->free();
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
 
             <h4 style='color:gray;text-align:center' id='productprice$productID'>Rs. $productprice</h4>";
             ?>
             <div class="wrapper">
    								<a id="afterclose11" href="#demo-modal<?php echo $productID?>" style="color:blue;font-size:14px">View more</a>
								</div>
								<!--MODAL STARTS...-->

								<div id="demo-modal<?php echo $productID?>" class="modal">
    								<div class="modal__content">
									<h1>Product Details</h1>
                                    <div style="display:flex">

                                    <div style="border:1px solid gray">
                                    <img src="<?php echo $image?>" width='100%''>

                                    </div>
                                    <div>
													<table>

                                                
        											
														<tr>
														
															<td><h2><?php echo $productname; ?></h2></td>
														</tr>
														<tr>
															
															<td><h3><?php echo $productsubcategory."&nbsp;for&nbsp".$productfor ?></h3></td>
														</tr>
														<tr>
															
															<td><h4><?php echo $productsubname; ?><h4></td>
														</tr>
														<tr>
															
															<td><h4><?php echo $productdescription; ?></h4></td>
														</tr>

                                                       <tr><td><p style="color:grey">Variations Available</p></td></tr>
                                                        <?php 
                                                        $sel9="SELECT * FROM tbl_stock WHERE productID=$productID";
                                                        if($result9=$conn->query($sel9))
                                                        {
                                                            if($result9->num_rows>0)
                                                            {
                                                       while($row=$result9->fetch_array())
                                                        {?>
                                                        <tr>
		
															<td><h4><?php echo $row["productQuantity"].$row["productMeasure"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;₹ ".$row["productPrice"]; ?></h4></td>
														</tr>
                                                        <?php } 
                                                        }
                                                    }
                                                    ?>
                                                       
													
	
			                            </table>
                                    </div>
                                    </div>						
								<!--MODAL ENDS-->
   
                                   <a href="#afterclose11" class="modal__close">&times;</a>
                                 </div>
                                </div>
         


<?php
           echo "<br>
 
             <input class='button1' type='submit' id='addorout$productID' value='ADD TO CART' name='addtocart'>
             </form></div><br>".'</td>' ;
          
             //there is a magic - if our counter is greater then 5 we set counter to zero and close tr tag  
             if ($i>2)
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
</div>
<div id="supplements">
<div class="div2"><center>
            <h3>O T H E R&nbsp;&nbsp;&nbsp;E S S E N T I A L S</h3>
            <hr class="separater">
        </div>
    
  <?php 
include "connection.php";
//$sel="SELECT * FROM tbl_productdetails WHERE productStatus=1 AND productFor='Cats' AND productCategory='Accessories' AND productSubcategory='Supplements'";
//first, i set a counter 
$sel="SELECT tbl2.*,tbl1.* FROM tbl_stock AS tbl2 INNER JOIN tbl_productdetails AS tbl1 ON tbl2.productID=tbl1.productID WHERE tbl1.productFor='Cats' AND tbl1.productCategory='Accessories' AND (tbl1.productSubcategory='Accessories' OR tbl1.productSubcategory='Supplements') GROUP BY tbl2.productID";
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
            $productfor=$row["productFor"];
            $productsubcategory=$row["productSubcategory"];
            $productcategory=$row["productCategory"];
            //// = $row['productPrice'];
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
         $result4->free();
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
 
             <h4 style='color:gray;text-align:center' id='productprice$productID'>Rs. $productprice</h4>";
             ?>
             <div class="wrapper">
    								<a id="afterclose12" href="#demo-modal<?php echo $productID?>" style="color:blue;font-size:14px">View more</a>
								</div>
								<!--MODAL STARTS...-->

								<div id="demo-modal<?php echo $productID?>" class="modal">
    								<div class="modal__content">
									<h1>Product Details</h1>
                                    <div style="display:flex">

                                    <div style="border:1px solid gray">
                                    <img src="<?php echo $image?>" width='100%''>

                                    </div>
                                    <div>
													<table>

                                                
        											
														<tr>
														
															<td><h2><?php echo $productname; ?></h2></td>
														</tr>
														<tr>
															
															<td><h3><?php echo $productsubcategory."&nbsp;for&nbsp".$productfor ?></h3></td>
														</tr>
														<tr>
															
															<td><h4><?php echo $productsubname; ?><h4></td>
														</tr>
														<tr>
															
															<td><h4><?php echo $productdescription; ?></h4></td>
														</tr>

                                                       <tr><td><p style="color:grey">Variations Available</p></td></tr>
                                                        <?php 
                                                        $sel9="SELECT * FROM tbl_stock WHERE productID=$productID";
                                                        if($result9=$conn->query($sel9))
                                                        {
                                                            if($result9->num_rows>0)
                                                            {
                                                       while($row=$result9->fetch_array())
                                                        {?>
                                                        <tr>
		
															<td><h4><?php echo $row["productQuantity"].$row["productMeasure"]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;₹ ".$row["productPrice"]; ?></h4></td>
														</tr>
                                                        <?php } 
                                                        }
                                                    }
                                                    ?>
                                                       
													
	
			                            </table>
                                    </div>
                                    </div>						
								<!--MODAL ENDS-->
   
                                   <a href="#afterclose12" class="modal__close">&times;</a>
                                 </div>
                                </div>
         


<?php
             
          echo "<br>
 
             <input class='button1' type='submit' id='addorout$productID' value='ADD TO CART' name='addtocart'>
             </form></div><br>".'</td>' ;
          
             //there is a magic - if our counter is greater then 5 we set counter to zero and close tr tag  
             if ($i>2)
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
</div>
</div>
</div>
</div>
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
    source: 'backend-script-cat.php'  
    });
});
    </script>
    </body>

</html>


