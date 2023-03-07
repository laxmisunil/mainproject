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
        <title>Home</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
 width: 500px;
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
#viewdata
{
    padding:4px;
    background-color:royalblue;
    border:2px solid royalblue;
    color:white;
    border-radius: 3px;
}
#viewdata:hover
{
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
    cursor: pointer;
}
#viewdata2
{
    padding:4px;
    background-color:green;
    border:2px solid green;
    color:white;
    border-radius: 3px;
}
#viewdata2:hover
{
    box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24),0 17px 50px 0 rgba(0,0,0,0.19);
    cursor: pointer;
}

</style>
</head>
<body>

<div class="sidenav">
  <a href="adminhome.php">Dashboard</a><br>
  <a href="customerlist.php">Customers</a><br>
  <a href="productlist.php">Products</a><br>
  <a href="veterinarydetails4.php">Veterinary Details</a><br>
  <a style="color:white" href="orderreports.php">Order Statistics</a><br>
  <a href="customerfeedbacks.php">Feedbacks</a><br>
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

   $query10 = "select count(*) as totalorders from tbl_order";

   $result = mysqli_query($conn,$query10);
   $response = "<div style='color: green;text-align:left'></div>";
   if(mysqli_num_rows($result)){
      $row = mysqli_fetch_array($result);

      $count10 = $row['totalorders'];
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
                <img src="admin.jpg" width="4%" style="border-radius:50%;margin-left:23cm">
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
					<h2>Order Statistics</h2>
                    <p><font size="3px"><a style="color:blue" href="orderreportdata.php">Click here to view Monthly Report</a></font></p>
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

			<ul class="box-info">
				<li>
					<i class='bx bxs-calendar-check' ></i>
					<span class="text">
						<h3><?php echo $count10?></h3>
						<p>Total Orders</p>
					</span>
				</li>
			
				<!--<li>
					<i class='bx bxs-dollar-circle' ></i>
					<span class="text">
						<h3>$2543</h3>
						<p>Total Sales</p>
					</span>
				</li>-->
			</ul>
			<br>
			<form method="post" action="pdftodownload.php">  
                          <input type="submit" name="create_pdf" class="btn btn-danger" id="viewdata2" value="Download Report" />  
                        </form>


			<div class="table-data">
				<div class="order">
					<div class="head">
						<h3></h3>
						<form action="" method="POST">
				<div class="form-input">
					<input type="search" class="live-search-box" name="search" id="search" placeholder="Search by date..." size="25cm">
					<input type="hidden" name="submit" style="background-color:transparent;border:transparent;color:transparent;padding:0.2px;margin:0px">
					
				</div>
</form>

					</div>
					<form action="#" method="POST">


<select name="year"  style="padding:5px" required>

<option value="" disabled selected hidden>--Select year--</option>


<option value="2022">2022</option>
<option value="2023">2023</option>
<option value="2024">2024</option>
<option value="2025">2025</option>
<option value="2026">2026</option>
<option value="2027">2027</option>
<option value="2028">2028</option>
<option value="2029">2029</option>
<option value="2030">2030</option>
<option value="2031">2031</option>
<option value="2032">2032</option>



</select>
<input type="submit" value="view" name="view" style="padding:3px 10px" id="viewdata">



</form>
<br>
<table>
                    <?php
					
include "connection.php";

if(isset($_POST["view"]))
{

    
    $year=$_POST["year"];

    //$fulldate="-".$year;


$sel2="SELECT tbl1.*,sum(tbl2.productQuantity) AS totalbydate,tbl2.order_ID FROM tbl_order AS tbl1 INNER JOIN tbl_orderitems AS tbl2 ON tbl1.orderID=tbl2.order_ID WHERE tbl1.orderDate LIKE '$year%' AND tbl1.orderStatus!=0 GROUP BY tbl1.orderDate ORDER BY tbl1.orderID DESC";
if($result2=$conn->query($sel2))
{
    if($result2->num_rows>0)
    {
		?>
		 <h3><font color="gray">Sales on <?php echo $year ?></font></h3><br>
					<table id="myTable2"  class="live-search-list">
						<thead>
							<tr>
                                <th>Sl no</th>
								<th>Order Date</th>
								<th>Total products ordered</th>
								
							</tr>
						</thead>
                        <?php
                $i=0;
                $productssubtotal=0;



        while($row=$result2->fetch_array())
        {
			$i++;
			?>
			<tbody>
			<tr>
				<td><?php echo $i ?></td>
				<td><?php 
				$orderreddate= $row["orderDate"];
				$splittedordereddate=explode("-",$orderreddate);

				$year1=$splittedordereddate[0];
				$month1=$splittedordereddate[1];	
				$day1=$splittedordereddate[2];

				if($month1==01)
				{
					$monthinword="Jan";
				}
				elseif($month1==02)
				{
					$monthinword="Feb";
				}
				elseif($month1==03)
				{
					$monthinword="Mar";
				}
				elseif($month1==04)
				{
					$monthinword="Apr";
				}
				elseif($month1==05)
				{
					$monthinword="May";
				}
				elseif($month1==06)
				{
					$monthinword="Jun";
				}
				elseif($month1==07)
				{
					$monthinword="Jul";
				}
				elseif($month1=="08")
				{
					$monthinword="Aug";
				}
				elseif($month1=="09")
				{
					$monthinword="Sep";
				}
				elseif($month1==10)
				{
					$monthinword="Oct";
				}
				elseif($month1==11)
				{
					$monthinword="Nov";
				}
				elseif($month1==12)
				{
					$monthinword="Dec";
				}

				
				
				
				
				
				
				echo $monthinword." ".$day1.",".$year1; ?>	</td>
				<td><?php echo $row["totalbydate"] ?>	</td>
			

		

      <?php 
	  $productssubtotal=$productssubtotal+$row["totalbydate"];
	   
	  }
       // $result2->free();
    


     


                           ?>
						  <h4>Total products sold : 
							<?php echo $productssubtotal; 
							
						?>
							<br><br>
							<form method="post" action="pdftodownload3.php?year=<?php echo $year?>">  
							  <input type="submit" name="create_pdf" class="btn btn-danger" id="viewdata2" value="Download" />  
							</form>
							<?php
						}
							else
							{
								echo "No records";
							}
						}
						?>
					
                
						<?php
						}
							?>
						</h3><br>




					</table>
				</div>
				
			</div>
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