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
* {
  box-sizing: border-box;
}

:root {
  --primary: dodgerblue;
  --shade: rgba(0, 0, 0, 0.3);
  --border: 1px solid rgba(0, 0, 0, 0.1);
  --shadow: 0 1px 3px 0 var(--shade), 0 0 1px 0 var(--shade);
}

body {
 
  background-color: aliceblue;
  color: #555;
  text-shadow: 0 0 0;
  margin: 0;
}

a {
  color: var(--primary);
  text-decoration: none;
}

/* ************************* */

.container {
  max-width: 1024px;
  margin: 0 auto;
  padding: 1rem;
  position: relative;
}

.field {
  font: inherit;
  color: inherit;
  background-color: white;
  text-decoration: none;
  border: none;
  display: inline-block;
  padding: 0.5rem 0.75rem;
  box-shadow: var(--shadow);
  border-radius: 0.25rem;
  vertical-align: middle;
  text-shadow: 0 0 0;
}

.field:focus {
  outline: 1px solid var(--primary);
}

.btn {
  cursor: pointer;
  padding-left: 1rem;
  padding-right: 1rem;
  background-color: rgba(0, 0, 0, 0.1);
  text-transform: capitalize;
}

.iconbtn {
  cursor: pointer;
  box-shadow: none;
  padding: 0 0.25rem;
  user-select: none;
}

.box {
  box-shadow: var(--shadow);
}

.bor {
  border: var(--border);
}

.borb {
  border-bottom: var(--border);
}

.p1 {
  padding: 1rem;
}

.p0 {
  padding: 0;
}

.m0 {
  margin: 0;
}

.rad {
  border-radius: 0.25rem;
}

.white {
  background-color: white;
}

.flex {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.w100 {
  width: 100%;
}

.blur {
  filter: blur(6px);
}

/* start: for Dialog */

.modal {
  width: 90%;
  max-width: 640px;
  color: inherit;
}

.drawer {
  width: 90%;
  max-width: 300px;
  color: inherit;
  margin: 0;
  margin-left: auto;
  height: 100%;
  max-height: 100%;
}

dialog::backdrop {
  background-color: rgba(0, 0, 0, 0.3);
  backdrop-filter: blur(6px);
}
        </style>
        <?php
      
      if(isset($_GET["status"]))
      {
        if((isset($_GET["status"]))==1)
        {
            ?><script>alert("Product added to cart!");</script><?php 
        }
        else if((isset($_GET["status"]))==0)
        {
            ?><script>alert("Product already added!");</script><?php 
        }
      }
     
      ?>
      <script>
        window.addEventListener("load", (e) => {
  dialogDemo();
});

function dialogDemo() {
  const modal = new Modal({
    heading: "A good paragraph!",
    contents: `A good example of a paragraph contains a topic sentence, details and a conclusion.`
  });
  submit.onclick = (e) => {
    modal.toggleModal();
  };
  [closeModal, cancelModal, continueModal].forEach((element) => {
    element.onclick = (e) => {
      modal.toggleModal();
    };
  });
}

function Modal(options) {
  modalHeading.textContent = options.heading ?? "Modal Heading";
  modalContents.innerHTML = options.contents ?? "Modal Contents.";

  this.closeModal = function () {
    modal.close();
  };

  this.openModal = function () {
    modal.showModal();
  };

  this.toggleModal = function () {
    modal.open ? this.closeModal() : this.openModal();
  };

  return this;
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
            <a href="" class="item" id="active" >Home</a>
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
          
            <a href="mycart.php">My Cart</a>
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
        <img src="homepic.jpg" width="109%">
    </div>

        <div class="div2"><center>
            <h3 id="browse">W O R L D ' S&nbsp;&nbsp;&nbsp; B E S T&nbsp;&nbsp;&nbsp;F O O D &nbsp;&nbsp;&nbsp;S U P P L I E S</h3>
            <hr class="separater">
        </div>
        
        <?php 
include "connection.php";
$sel="SELECT * FROM tbl_productdetails WHERE productCategory='Food'";
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
            $productprice = $row['productPrice'];
            $productdescription = $row['productDescription'];

            echo '<td>'."<div style='text-align:center' class='d1'><form  method='POST' action='addtocart.php?productid=$productID'><img src='$image' width='80%' height='auto'><br>
            <h3 style='margin-bottom:0px'>$productname</h3>
            <h3 style='color:gray;margin-top:5px;margin-bottom:0px'>Rs.$productprice</h3><br>
            <a style='text-decoration:none;color:blue' class='btn btn-info btn-lg' data-toggle='modal' data-target='#myModal'>view more details</a>
            <h4 style='margin-top:5px'>$productsubname</h4>
            
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
$sel="SELECT * FROM tbl_productdetails WHERE productCategory='Toys'";
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
            $productprice = $row['productPrice'];
            $productdescription = $row['productDescription'];

            echo '<td>'."<div style='text-align:center' class='d1'><form  method='POST' action='addtocart.php?productid=$productID'><img src='$image' width='80%' height='auto'><br>
            <h3 style='margin-bottom:0px'>$productname</h3>
            <h3 style='color:gray;margin-top:5px;margin-bottom:0px'>Rs.$productprice</h3>
            <h4 style='margin-top:5px'>$productsubname</h4>
         
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
$sel="SELECT * FROM tbl_productdetails WHERE productCategory='Accessories'";
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
            $productprice = $row['productPrice'];
            $productdescription = $row['productDescription'];

            echo '<td>'."<div style='text-align:center' class='d1'><form  method='POST' action='addtocart.php?productid=$productID'><img src='$image' width='80%' height='auto'><br>
            <h3 style='margin-bottom:0px'>$productname</h3>
            <h3 style='color:gray;margin-top:5px;margin-bottom:0px'>Rs.$productprice</h3>
            <h4 style='margin-top:5px'>$productsubname</h4>
            <a class='field btn' id='submit'>view more</a>
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
    <dialog id="modal" class="box rad bor p0 modal">
  <div class="flex borb p1">
    <div id="modalHeading"></div>
    <button id="closeModal" class="field iconbtn">&#x26CC;</button>
  </div>
  <div id="modalContents" class="p1 borb"></div>
  <div class="flex p1">
    <button id="cancelModal" class="field btn">Cancel</button>
    <button id="continueModal" class="field btn">Continue</button>
  </div>
</center>
</body>
</html>