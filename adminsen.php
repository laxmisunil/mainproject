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
        <title>Admin</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="style.css">
        <style>
               @import url('https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Poppins:wght@400;500;600;700&display=swap');
        * {
	margin: 0;
	padding: 0;
	box-sizing: border-box;
}

a {
	text-decoration: none;
}

li {
	list-style: none;
}

:root {
	--poppins: 'Poppins', sans-serif;
	--lato: 'Lato', sans-serif;

	--light: #F9F9F9;
	--blue: #3C91E6;
	--light-blue: #CFE8FF;
	--grey: #eee;
	--dark-grey: #AAAAAA;
	--dark: #342E37;
	--red: #DB504A;
	--yellow: #FFCE26;
	--light-yellow: #FFF2C6;
	--orange: #FD7238;
	--light-orange: #FFE0D3;
}

html {
	overflow-x: hidden;
}

body.dark {
	--light: #0C0C1E;
	--grey: #060714;
	--dark: #FBFBFB;
}

body {
	background: var(--grey);
	overflow-x: hidden;
}





/* CONTENT */
#content {
	
	
	transition: .3s ease;
}





/* NAVBAR */
#content nav {
	height: 56px;
	background: var(--light);
	padding: 0 24px;
	display: flex;
	align-items: center;
	grid-gap: 24px;
	font-family: var(--lato);
	position: sticky;
	top: 0;
	left: 0;
	z-index: 1000;
}
#content nav::before {
	content: '';
	position: absolute;
	width: 40px;
	height: 40px;
	bottom: -40px;
	left: 0;
	border-radius: 50%;
	box-shadow: -20px -20px 0 var(--light);
}
#content nav a {
	color: var(--dark);
}
#content nav .bx.bx-menu {
	cursor: pointer;
	color: var(--dark);
}
#content nav .nav-link {
	font-size: 16px;
	transition: .3s ease;
}
#content nav .nav-link:hover {
	color: var(--blue);
}
#content nav form {
	max-width: 400px;
	width: 100%;
	margin-right: auto;
}
#content nav form .form-input {
	display: flex;
	align-items: center;
	height: 36px;
}
#content nav form .form-input input {
	flex-grow: 1;
	padding: 0 16px;
	height: 100%;
	border: none;
	background: var(--grey);
	border-radius: 36px 0 0 36px;
	outline: none;
	width: 100%;
	color: var(--dark);
}
#content nav form .form-input button {
	width: 36px;
	height: 100%;
	display: flex;
	justify-content: center;
	align-items: center;
	background: var(--blue);
	color: var(--light);
	font-size: 18px;
	border: none;
	outline: none;
	border-radius: 0 36px 36px 0;
	cursor: pointer;
}
#content nav .notification {
	font-size: 20px;
	position: relative;
}
#content nav .notification .num {
	position: absolute;
	top: -6px;
	right: -6px;
	width: 20px;
	height: 20px;
	border-radius: 50%;
	border: 2px solid var(--light);
	background: var(--red);
	color: var(--light);
	font-weight: 700;
	font-size: 12px;
	display: flex;
	justify-content: center;
	align-items: center;
}
#content nav .profile img {
	width: 36px;
	height: 36px;
	object-fit: cover;
	border-radius: 50%;
}
#content nav .switch-mode {
	display: block;
	min-width: 50px;
	height: 25px;
	border-radius: 25px;
	background: var(--grey);
	cursor: pointer;
	position: relative;
}
#content nav .switch-mode::before {
	content: '';
	position: absolute;
	top: 2px;
	left: 2px;
	bottom: 2px;
	width: calc(25px - 4px);
	background: var(--blue);
	border-radius: 50%;
	transition: all .3s ease;
}
#content nav #switch-mode:checked + .switch-mode::before {
	left: calc(100% - (25px - 4px) - 2px);
}
/* NAVBAR */





/* MAIN */
#content main {
	width: 100%;
	padding: 36px 24px;
	font-family: var(--poppins);
	max-height: calc(100vh - 56px);
	overflow-y: auto;
}
#content main .head-title {
	display: flex;
	align-items: center;
	justify-content: space-between;
	grid-gap: 16px;
	flex-wrap: wrap;
}
#content main .head-title .left h1 {
	font-size: 36px;
	font-weight: 600;
	margin-bottom: 10px;
	color: var(--dark);
}
#content main .head-title .left .breadcrumb {
	display: flex;
	align-items: center;
	grid-gap: 16px;
}
#content main .head-title .left .breadcrumb li {
	color: var(--dark);
}
#content main .head-title .left .breadcrumb li a {
	color: var(--dark-grey);
	pointer-events: none;
}
#content main .head-title .left .breadcrumb li a.active {
	color: var(--blue);
	pointer-events: unset;
}
#content main .head-title .btn-download {
	height: 36px;
	padding: 0 16px;
	border-radius: 36px;
	background: var(--blue);
	color: var(--light);
	display: flex;
	justify-content: center;
	align-items: center;
	grid-gap: 10px;
	font-weight: 500;
}




#content main .box-info {
	display: grid;
	grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
	grid-gap: 24px;
	margin-top: 36px;
}
#content main .box-info li {
	padding: 24px;
	background: var(--light);
	border-radius: 20px;
	display: flex;
	align-items: center;
	grid-gap: 24px;
}
#content main .box-info li .bx {
	width: 80px;
	height: 80px;
	border-radius: 10px;
	font-size: 36px;
	display: flex;
	justify-content: center;
	align-items: center;
}
#content main .box-info li:nth-child(1) .bx {
	background: var(--light-blue);
	color: var(--blue);
}
#content main .box-info li:nth-child(2) .bx {
	background: var(--light-yellow);
	color: var(--yellow);
}
#content main .box-info li:nth-child(3) .bx {
	background: var(--light-orange);
	color: var(--orange);
}
#content main .box-info li .text h3 {
	font-size: 24px;
	font-weight: 600;
	color: var(--dark);
}
#content main .box-info li .text p {
	color: var(--dark);	
}





#content main .table-data {
	display: flex;
	flex-wrap: wrap;
	grid-gap: 24px;
	margin-top: 24px;
	width: 100%;
	color: var(--dark);
}
#content main .table-data > div {
	border-radius: 20px;
	background: var(--light);
	padding: 24px;
	overflow-x: auto;
}
#content main .table-data .head {
	display: flex;
	align-items: center;
	grid-gap: 16px;
	margin-bottom: 24px;
}
#content main .table-data .head h3 {
	margin-right: auto;
	font-size: 24px;
	font-weight: 600;
}
#content main .table-data .head .bx {
	cursor: pointer;
}

#content main .table-data .order {
	flex-grow: 1;
	flex-basis: 500px;
}
#content main .table-data .order table {
	width: 100%;
	border-collapse: collapse;
}
#content main .table-data .order table th {
	padding-bottom: 12px;
	font-size: 13px;
	text-align: left;
	border-bottom: 1px solid var(--grey);
}
#content main .table-data .order table td {
	padding: 16px 0;
}
#content main .table-data .order table tr td:first-child {
	display: flex;
	align-items: center;
	grid-gap: 12px;
	padding-left: 6px;
}
#content main .table-data .order table td img {
	width: 36px;
	height: 36px;
	border-radius: 50%;
	object-fit: cover;
}
#content main .table-data .order table tbody tr:hover {
	background: var(--grey);
}
#content main .table-data .order table tr td .status {
	font-size: 10px;
	padding: 6px 16px;
	color: var(--light);
	border-radius: 20px;
	font-weight: 700;
}
#content main .table-data .order table tr td .status.completed {
	background: var(--blue);
}
#content main .table-data .order table tr td .status.process {
	background: var(--yellow);
}
#content main .table-data .order table tr td .status.pending {
	background: var(--orange);
}


#content main .table-data .todo {
	flex-grow: 1;
	flex-basis: 300px;
}
#content main .table-data .todo .todo-list {
	width: 100%;
}
#content main .table-data .todo .todo-list li {
	width: 100%;
	margin-bottom: 16px;
	background: var(--grey);
	border-radius: 10px;
	padding: 14px 20px;
	display: flex;
	justify-content: space-between;
	align-items: center;
}










@media screen and (max-width: 768px) {
	



	#content nav .nav-link {
		display: none;
	}
}






@media screen and (max-width: 576px) {
	#content nav form .form-input input {
		display: none;
	}

	#content nav form .form-input button {
		width: auto;
		height: auto;
		background: transparent;
		border-radius: none;
		color: var(--dark);
	}

	#content nav form.show .form-input input {
		display: block;
		width: 100%;
	}
	#content nav form.show .form-input button {
		width: 36px;
		height: 100%;
		border-radius: 0 36px 36px 0;
		color: var(--light);
		background: var(--red);
	}

	#content nav form.show ~ .notification,
	#content nav form.show ~ .profile {
		display: none;
	}

	#content main .box-info {
		grid-template-columns: 1fr;
	}

	#content main .table-data .head {
		min-width: 420px;
	}
	#content main .table-data .order table {
		min-width: 420px;
	}
	#content main .table-data .todo .todo-list {
		min-width: 420px;
	}
}

            body
          
            {
                font-size: 15px;
                font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
                background-color:F2F3F4;
            }
            body,html
            {
                margin:0;
            }
            
            .navigation
            {
                display: block;
                margin-top: 20px;
                margin-left: 3.5cm;
                margin-right:6.8cm;  
            }
            .item
            {
           
                text-decoration: none;
                color: black;
            }
            .item:hover
            {
                color: rgb(197, 110, 3);
            }
            .div2
            {
                background-color:rgb(248, 238, 223);
                padding: 2px 9px 2px 9px;
                margin-top: 15px;
                font-weight: lighter;
                font-size: 30px;
            }
            hr
            {
                height:1px;
                border-width:0;
                width:100%;
                color:rgb(74, 71, 71);
                background-color:rgb(99, 96, 96);
                margin:0px;
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
  margin-left: 210px; /* Same as the width of the sidenav */
  font-size: 28px; /* Increased text to enable scrolling */
  padding: 0px 10px;
 
  
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
#div1
{
    display:flex;
    box-shadow: 2px solid black;
}
.users
{

    box-shadow:gray;
    border:1px solid;
    padding: 6px 80px 6px 80px;
    border-radius: 5px;
   
}
.separater
{
    height:100%;
    width:10%;
   
}
.count
{
    font-size: 60px;
}
#active
{
    color:white;
}
#snackbar{
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
#search
            {
				border-radius: 0;
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
            #search:focus
            {
                outline:none;
            }
            #search::placeholder
            {
                padding-left: 0px;
            }
            #showupcoming3
{
	padding:7px;
	border-radius: 20px;
	border:transparent;
	font-size: 24px;	
}
#showupcoming3:hover
{
	cursor: pointer;
	background-color: whitesmoke;
}
</style>
</head>
<?php
if(isset($_GET["status"]))
{
if(($_GET["status"])==0)
        {
            ?>
        
                 <div id="snackbar">Feedback deleted successfully!</div>
    <script> var x = document.getElementById("snackbar");
  x.className = "show";
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);</script>
              
              <?php 
            }
        }
            
                ?>
<body>

<div class="sidenav">
  <a href="adminhome.php">Dashboard</a><br>
  <a href="customerlist.php">Customers</a><br>
  <a href="pets.php">Pets</a><br>
  <a href="productlist.php" >Products</a><br>
  <a href="veterinarydetails4.php">Veterinary Details</a><br>
  <a href="vaccinecentredetails.php">Vaccination</a><br>
  <a href="orderreports.php">Order Statistics</a><br>
  <a href="customerfeedbacks.php" id="active">Feedbacks</a><br>
  <a href="adminlogout.php" onclick="return confirm('Are you sure you want to Logout?');">Logout</a>
</div>
<?php
include "connection.php";


   $query = "select count(*) as totalusers from tbl_userdetails where userRole !='Admin'";

   $result = mysqli_query($conn,$query);
   $response = "<div style='color: green;text-align:left'></div>";
   if(mysqli_num_rows($result)){
      $row = mysqli_fetch_array($result);

      $count = $row['totalusers'];
   }

   
   $query2 = "select count(*) as activeusers from tbl_userdetails where userRole !='Admin' AND userStatus=1";

   $result = mysqli_query($conn,$query2);
   $response = "<div style='color: green;text-align:left'></div>";
   if(mysqli_num_rows($result)){
      $row = mysqli_fetch_array($result);

      $count2 = $row['activeusers'];
   }
    

   $query3 = "select count(*) as inactiveusers from tbl_userdetails where userRole !='Admin' AND userStatus=0";

   $result = mysqli_query($conn,$query3);
   $response = "<div style='color: green;text-align:left'></div>";
   if(mysqli_num_rows($result)){
      $row = mysqli_fetch_array($result);

      $count3 = $row['inactiveusers'];
   }

   
   $query4 = "select count(*) as totalproducts from tbl_productdetails where productStatus=1";

   $result = mysqli_query($conn,$query4);
   $response = "<div style='color: green;text-align:left'></div>";
   if(mysqli_num_rows($result)){
      $row = mysqli_fetch_array($result);

      $count4 = $row['totalproducts'];
   }

   $query5 = "select count(*) as totalfoods from tbl_productdetails where productcategory='Food'";

   $result = mysqli_query($conn,$query5);
   $response = "<div style='color: green;text-align:left'></div>";
   if(mysqli_num_rows($result)){
      $row = mysqli_fetch_array($result);

      $count5 = $row['totalfoods'];
   }

   $query6 = "select count(*) as totaltoys from tbl_productdetails where productcategory='Toys'";

   $result = mysqli_query($conn,$query6);
   $response = "<div style='color: green;text-align:left'></div>";
   if(mysqli_num_rows($result)){
      $row = mysqli_fetch_array($result);

      $count6 = $row['totaltoys'];
   }
   $query7 = "select count(*) as totalaccessories from tbl_productdetails where productcategory='Accessories'";

   $result = mysqli_query($conn,$query7);
   $response = "<div style='color: green;text-align:left'></div>";
   if(mysqli_num_rows($result)){
      $row = mysqli_fetch_array($result);

      $count7 = $row['totalaccessories'];
   }

   $query8 = "select sum(productCount) as totalitemsincart from tbl_cart";

   $result = mysqli_query($conn,$query8);
   $response = "<div style='color: green;text-align:left'></div>";
   if(mysqli_num_rows($result)){
      $row = mysqli_fetch_array($result);

      $count8 = $row['totalitemsincart'];
   }

   $query9 = "select count(*) as totalappointments from tbl_appointmentdetails";

   $result = mysqli_query($conn,$query9);
   $response = "<div style='color: green;text-align:left'></div>";
   if(mysqli_num_rows($result)){
      $row = mysqli_fetch_array($result);

      $count9 = $row['totalappointments'];
   }

   $query10 = "select count(*) as totalfeedbacks from tbl_feedback";

   $result = mysqli_query($conn,$query10);
   $response = "<div style='color: green;text-align:left'></div>";
   if(mysqli_num_rows($result)){
      $row = mysqli_fetch_array($result);

      $count10 = $row['totalfeedbacks'];
   }
    
  ?>
  

<div class="main">
<section id="content" style="font-size:24px">
		<!-- NAVBAR -->
		<nav>
			
			
			

			<!--input type="checkbox" id="switch-mode" hidden>
		    <label for="switch-mode" class="switch-mode"></label>-->
			<!--<a href="#" class="notification">-->
				<!--<i class='bx bxs-bell' ></i>
				<span class="num">8</span>-->
        <button onclick="window.history.back();" id="showupcoming3"><i class="fa fa-arrow-left" aria-hidden="true"></i></button>&nbsp;
                <img src="logofinal.png" width="4%" style="border-radius:50%;margin-left:20cm">
			<!--</a>-->
			<a href="#" class="profile">
				<p>Admin</p>
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h2>Sentiment Analysis</h2>
					<ul class="breadcrumb">
						<!--<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>-->
					</ul>
				</div>
				<!--<a href="#" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text" style="font-size:small">Download PDF</span>
				</a>-->
			</div>

			


			<div class="table-data">
				<div class="order">
					<div class="head">
					
						<!--<h3>Recent Orders</h3>-->
						<!--<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>-->
					</div>
                    <?php
include "connection.php";
include ('vendor/autoload.php');
use Sentiment\Analyzer;
$obj3=new Analyzer();

$sel3="SELECT * FROM tbl_feedback WHERE feedbackStatus=1";
if ($result3=$conn->query($sel3))
{

    if($result3->num_rows>0)
    {
        
        ?>
					
                        <?php 
               
                $negative3=0;
                $positive3=0;
                $neutral3=0;
                $compound3=0;

                $feedbacktotal3=0;

                while($row=$result3->fetch_array())
                {

                
                ?>
						

             <?php $feedback=$row["customerFeedback"];
             $feedback;?>

            <?php $result4=$obj3->getSentiment($feedback);
//echo "<pre>";
//print_r($result);

$separatedsentiment4=implode(" ",$result4);

$separatedsentiment3=explode(" ",$separatedsentiment4);
?>

<?php $separatedsentiment3[0]; ?>
<?php $separatedsentiment3[1]; ?>
<?php $separatedsentiment3[2]; ?>
<?php $separatedsentiment3[3]; ?>
   
                        
                <?php 
              $negative3=$negative3+$separatedsentiment3[0];
              $positive3=$positive3+$separatedsentiment3[1];
              $neutral3=$neutral3+$separatedsentiment3[2];
              $compound3=$compound3+$separatedsentiment3[3];
              
              }
                       
                       //$result->free();
                   }
                   else
                   {
                       echo " ";
                   }
               }
               else
               {
               
               echo "ERROR";
               
               }      
                       ?>
				
               <?php 
            

               $feedbacktotal3=$negative3+$positive3+$neutral3+$compound3;

               $negativepercentage3=($negative3/$feedbacktotal3)*100;
               $positivepercentage3=($positive3/$feedbacktotal3)*100;
               $neutralpercentage3=($neutral3/$feedbacktotal3)*100;
               $compoundpercentage3=($compound3/$feedbacktotal3)*100;

           

               $dataPoints = array( 
             
                array("label"=>"Negative Reviews", "y"=>number_format((float)$negativepercentage3, 2, '.', '')),
                array("label"=>"Neutral Reviews", "y"=>number_format((float)$neutralpercentage3, 2, '.', '')),
                array("label"=>"Positive Reviews", "y"=>number_format((float)$positivepercentage3, 2, '.', '')),
                //array("label"=>"Safari", "y"=>6.08),
                //array("label"=>"Edge", "y"=>4.29),
                //array("label"=>"Others", "y"=>4.59)
              )

               ?>
               <script>
window.onload = function() {
 
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title: {
		text: ""
	},
	subtitles: [{
		text: ""
	}],
	data: [{
		type: "bar",
		yValueFormatString: "#,##0.00\"%\"",
		indexLabel: "{label} ({y})",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>




<div class="head-title">
				<div class="left">
					
					<ul class="breadcrumb">
						<!--<li>
							<a href="#">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Home</a>
						</li>-->
					</ul>
				</div>
				<!--<a href="#" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text" style="font-size:small">Download PDF</span>
				</a>-->
			</div>

			


			<div class="table-data">
				<div class="order">
					<div class="head">
					<form action="" method="POST" style="margin-left:19cm">
				<div class="form-input">
					<input type="search" class="live-search-box" name="search" id="search" placeholder="Search feedbacks..." size="25cm">
					<input type="hidden" name="submit" style="background-color:transparent;border:transparent;color:transparent;padding:0.2px;margin:0px">
					
				</div>
</form>
						<!--<h3>Recent Orders</h3>-->
						<!--<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>-->
					</div>
                    <?php
include "connection.php";
include ('vendor/autoload.php');

$obj=new Analyzer();

$sel="SELECT * FROM tbl_feedback WHERE feedbackStatus=1";
if ($result2=$conn->query($sel))
{
?>
<table id="myTable"  class="live-search-list">
						<thead>
							<tr>
              <th>Sl No. </th>
                   
                    <th>Feedback</th>
                    <th>Negative</th>
                    <th>Positive</th>
                    <th>Neutral</th>
                    <th>Compound</th>
                   
							</tr>
						</thead>

<?php
    if($result2->num_rows>0)
    {
        
        ?>
					
                        <?php 
                $i=0;

                $negative=0;
                $positive=0;
                $neutral=0;
                $compound=0;

                while($row=$result2->fetch_array())
                {

                  $i++;
                ?>
						<tbody>
							<tr>
              <td><?php echo $i ?></td>

              <td><?php $feedback=$row["customerFeedback"];
            echo $feedback;?></td>

            <?php $result=$obj->getSentiment($feedback);
//echo "<pre>";
//print_r($result);

$separatedsentiment2=implode(" ",$result);

$separatedsentiment=explode(" ",$separatedsentiment2);
?>

<td><?php echo $separatedsentiment[0]; ?></td>
<td><?php echo $separatedsentiment[1]; ?></td>
<td><?php echo $separatedsentiment[2]; ?></td>
<td><?php echo $separatedsentiment[3]; ?></td>
                   
							
						</tbody>

            
                        
                <?php 
              $negative=$negative+$separatedsentiment[0];
              $positive=$positive+$separatedsentiment[1];
              $neutral=$neutral+$separatedsentiment[2];
              $compound=$compound+$separatedsentiment[3];
              
              }
                       
                       //$result->free();
                   }
                   else
                   {
                       echo "<tr><td colspan='5' style='color:gray'>No feedbacks yet.</td></tr>";
                   }
               }
               else
               {
               
               echo "ERROR";
               
               }      
                       ?>
					</table>
				</div>
				
			</div>
               <?php 
              //  echo $negative3."<br>"; 
              //  echo $positive3."<br>";
              //  echo $neutral3."<br>"; 
              //  echo $compound3."<br>";


               $feedbacktotal=$negative+$positive+$neutral+$compound;

               $negativepercentage=($negative/$feedbacktotal)*100;
               $positivepercentage=($positive/$feedbacktotal)*100;
               $neutralpercentage=($neutral/$feedbacktotal)*100;
               $compoundpercentage=($compound/$feedbacktotal)*100;


               ?>
               <br>

               <?php

               
               echo "Positive Reviews : ".number_format((float)$positivepercentage, 2, '.', '')." %<br>";
               echo "Negative Reviews : ".number_format((float)$negativepercentage, 2, '.', '')." %<br>"; 
               echo "Neutral Reviews : ".number_format((float)$neutralpercentage, 2, '.', '')." %<br>"; 

               //echo "Compound3 Reviews : ".number_format((float)$compound3percentage, 2, '.', '')." %<br>";




               ?>







		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
  
</div>

        

    </body>
	<script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src = "js/main.js"></script>
  <script>
    jQuery(document).ready(($) => {


$('.live-search-list tbody').each(function(){
  $(this).attr('data-search-term', $(this).text().toLowerCase());
});

$('.live-search-box').on('keyup', function(){
  const searchTerm = $(this).val().toLowerCase();
  $('.live-search-list tbody').each(function(){
    ($(this).filter('[data-search-term *= ' + searchTerm + ']').length > 0 || searchTerm.length < 1)
      ? $(this).show()
      : $(this).hide();      
  });
});

$('input[class=live-search-box]').keydown(function(e){
  if(e.keyCode == ENTER){
    e.preventDefault();
    e.stopPropagation();
    
    const toAdd = $('input[class=live-search-box]').val();
    if (toAdd) {
      $('<tbody/>' , {
        'text': toAdd,      
        'data-search-term':  toAdd.toLowerCase(),
      }).appendTo($('table'));
      $('input[class=live-search-box]').val('');
      console.log('User has entered '+toAdd);        
    }    
  }
});

$(document).on('dblclick', 'tbody', function(){
  $(this).fadeOut('slow',function(){
    $(this).remove();
  });
});

});

    </script>
  
</html>