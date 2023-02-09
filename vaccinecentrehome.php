<?php
include "connection.php";

session_start();
if($_SESSION["loginStatus"])
{
if ($_SESSION["loginStatus"]==4)
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
        <title>Vaccine Centre Home</title>
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
  background-color: goldenrod;
  overflow-x: hidden;
  padding-top: 20px;
}

.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 20px;
  color: black;
  display: block;
}

.sidenav a:hover {
  color: whitesmoke;
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
.button-71 {
  background-color: #FBDE94;
  border: 0;
  border-radius: 56px;
  color: black;
  cursor: pointer;
  display: inline-block;
  font-family: system-ui,-apple-system,system-ui,"Segoe UI",Roboto,Ubuntu,"Helvetica Neue",sans-serif;
  font-size: 18px;
  font-weight: 600;
  outline: 0;
  padding: 14px 19px;
  position: relative;
  text-align: center;
  text-decoration: none;
  transition: all .3s;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
}

.button-71:before {
  background-color: initial;
  background-image: linear-gradient(#fff 0, rgba(255, 255, 255, 0) 100%);
  border-radius: 125px;
  content: "";
  height: 50%;
  left: 4%;
  opacity: .5;
  position: absolute;
  top: 0;
  transition: all .3s;
  width: 92%;
}

.button-71:hover {
  box-shadow: rgba(255, 255, 255, .2) 0 3px 15px inset, rgba(0, 0, 0, .1) 0 3px 5px, rgba(0, 0, 0, .1) 0 10px 13px;
  transform: scale(1.05);
}
@media (min-width: 768px) {
  .button-71 {
    padding: 16px 48px;
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
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color:  #32CD32;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
#submitbutton
{
    color:transparent;
    outline:0;
    background-color: transparent;
    border:0;
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
  background-color: #FBDE94;
  overflow-x: hidden;
  padding-top: 20px;
}

.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 20px;
  color: black;
  display: block;
}

.sidenav a:hover {
  color: goldenrod;
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
</style>
<script>

	{
		function todaybutton()
		{
		var food=document.getElementById("today");
		food.style.display="block";

		var toys=document.getElementById("upcoming");
		toys.style.display="none";

		var yes=document.getElementById("yesterday");
		yes.style.display="none";

		var foodbutton=document.getElementById("todaybutton");
		foodbutton.style.backgroundColor=" #F6EDCC";

		var toysbutton=document.getElementById("upcomingbutton");
		toysbutton.style.backgroundColor="#FBDE94";

		var yesbutton=document.getElementById("yesterdaybutton");
		yesbutton.style.backgroundColor="#FBDE94";

		location.href = "#today";

		
		}


	}
	{
		function tomorrowbutton()
		{
		var food=document.getElementById("today");
		food.style.display="none";

		var toys=document.getElementById("upcoming");
		toys.style.display="block";

		var yes=document.getElementById("yesterday");
		yes.style.display="none";

		var foodbutton=document.getElementById("todaybutton");
		foodbutton.style.backgroundColor="#FBDE94";

		var toysbutton=document.getElementById("upcomingbutton");
		toysbutton.style.backgroundColor="#F6EDCC";

		var yesbutton=document.getElementById("yesterdaybutton");
		yesbutton.style.backgroundColor="#FBDE94";

		location.href = "#upcoming";

		}

	}
	{
		function yesterdaybutton()
		{
		var food=document.getElementById("today");
		food.style.display="none";

		var toys=document.getElementById("upcoming");
		toys.style.display="none";

		var yes=document.getElementById("yesterday");
		yes.style.display="block";

		var foodbutton=document.getElementById("todaybutton");
		foodbutton.style.backgroundColor="#FBDE94";

		var toysbutton=document.getElementById("upcomingbutton");
		toysbutton.style.backgroundColor="#FBDE94";

		var yesbutton=document.getElementById("yesterdaybutton");
		yesbutton.style.backgroundColor="#F6EDCC";

		location.href = "#yesterday";

		}

	}
	
</script>
</head>
<body>

<div class="sidenav">
  <a style="color:chocolate"href="">Dashboard</a><br>
  <a href="vaccinationstatistics.php">Statistics</a><br>
  <a href="vaccinelist.php">Vaccines</a><br>
  <a href="addnewvaccine.php">Add new vaccine</a><br>
  <a href="adminlogout.php" onclick="return confirm('Are you sure you want to logout?');">Logout</a>
</div>
<?php
include "connection.php";

?>


<div class="main">
<section id="content" style="font-size:24px">
		<!-- NAVBAR -->
		<nav>
			
			
			<form action="adminsearchproducts.php" method="POST">
				<div class="form-input">
					<input type="text" id="myInput" name="search" class="live-search-box" placeholder="Search bookings..." >
					<input type="hidden" name="submit" style="background-color:transparent;border:transparent;color:transparent;padding:0.2px;margin:0px">
					<button style="background-color:#FBDE94" type="submit" class="search-btn"><i class='bx bx-search' style="color:black" ></i></button>
				</div>
			</form>

			<!--input type="checkbox" id="switch-mode" hidden>
		    <label for="switch-mode" class="switch-mode"></label>-->
			<!--<a href="#" class="notification">-->
				<!--<i class='bx bxs-bell' ></i>
				<span class="num">8</span>-->
                <img src="logofinal.png" width="4%" style="border-radius:50%">
			<!--</a>-->
			<a href="#" class="profile">
				<p>Vaccine Centre</p>
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
		<div class="head-title">
				<div class="left">
					<h2>Vaccination Bookings</h2>
					<button class="button-71" role="button-71" id="todaybutton"  onclick="todaybutton();">Today's</button>&nbsp;
					<button class="button-71" role="button-71" id="tomorrowbutton"   onclick="tomorrowbutton();">Upcoming</button>&nbsp;
					<button class="button-71" role="button-71" id="yesterdaybutton"   onclick="yesterdaybutton();">History</button>&nbsp;
					<ul class="breadcrumb">
					
					</ul>
				</div>
			
			
				<!--<a href="#" class="btn-download">
					<i class='bx bxs-cloud-download' ></i>
					<span class="text" style="font-size:small">Download PDF</span>
				</a>-->
			</div>



			<div class="table-data" style="display:block;" id="today">
				<div class="order">
					<div class="head">
						<h3><font color="#DDAD08">Today's Bookings</font></h3>
						<form action="" method="POST">
				<div class="form-input">
					<input type="search" class="live-search-box" name="search" id="search" placeholder="Search here..." size="25cm">
					<input type="hidden" name="submit" style="background-color:transparent;border:transparent;color:transparent;padding:0.2px;margin:0px">
					
				</div>
			</form>
						<!--<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>-->
					</div>
                    <?php
include "connection.php";
$date=date('Y-m-d');
$sel="SELECT tbl2.*,tbl1.*,tbl3.* FROM tbl_vaccinebooked AS tbl2 INNER JOIN tbl_pet AS tbl1 ON tbl2.petID=tbl1.petID INNER JOIN tbl_userdetails AS tbl3 ON tbl3.userID=tbl1.customerID WHERE vaccineDate='$date' AND tbl1.petStatus!=2";
if ($result=$conn->query($sel))
{
    if($result->num_rows>0)
    {
        
        ?>
					<table id="myTable"  id="myTable2" class="live-search-list">
						<thead>
							<tr class="header">
                                <th>Sl no</th>	
								<th>Species</th>
								<th>Vaccine</th>
								<th>Date</th>
                                <th>Time Slot</th>	
                                <th>Status</th>
								<th></th>
							</tr>
						</thead>
                        <?php 
                $i=0;
                while($row=$result->fetch_array())
                {
                  $i++;
                ?>
						<tbody>
							<tr>
                                <td><?php echo $i ?></td>
								
								<td><?php echo $row["petSpecies"] ?></td>
								<td><?php echo $row["vaccineName"] ?></td>
								
								<?php

								$vaccinedatesplitted3=explode("-",$row["vaccineDate"]);

$year3=$vaccinedatesplitted3[0];
$month3=$vaccinedatesplitted3[1];
$day3=$vaccinedatesplitted3[2];

if($month3==01)
{
	$monthinword3="Jan";
}
elseif($month3==02)
{
	$monthinword3="Feb";
}
elseif($month3==03)
{
	$monthinword3="Mar";
}
elseif($month3==04)
{
	$monthinword3="Apr";
}
elseif($month3==05)
{
	$monthinword3="May";
}
elseif($month3==06)
{
	$monthinword3="Jun";
}
elseif($month3==07)
{
	$monthinword3="Jul";
}
elseif($month3=="08")
{
	$monthinword3="Aug";
}
elseif($month3=="09")
{
	$monthinword3="Sep";
}
elseif($month3==10)
{
	$monthinword3="Oct";
}
elseif($month3==11)
{
	$monthinword3="Nov";
}
elseif($month3==12)
{
	$monthinword3="Dec";
}


$fulldate3= $monthinword3." ".$day3.",".$year3;

?>
                                <td><?php echo $fulldate3; ?></td>
                                <td><?php if(($row["vaccineTime"])==9)
                                echo "Morning";
                                else if(($row["vaccineTime"])==2)
                                echo "Evening"; 
                                ?></td>
								</td>
                                 <td>
                 
                    
                 <?php $vaccinebookedStatus=$row["vaccinebookedStatus"]; 
                 if($vaccinebookedStatus==1)
                 echo "<font color='red'>NOT APPROVED</font>";
                 else if($vaccinebookedStatus==0)
                 echo "<font color='green'>APPROVED</font>";

                 ?>           
     
                </td>  


								<td>
								<div class="wrapper">
    								<a href="#demo-modal<?php echo $row["customerID"];?>" style="border:2px solid black;border-radius:4px;background-color:#060714;color:white;padding:4px;">View more</a>
								</div>
								<!--MODAL STARTS...-->

								<div id="demo-modal<?php echo $row["customerID"];?>" class="modal">
    								<div class="modal__content">
									<h1>Booking Details</h1>
													<table>
										<?php
										
										?>
        											
														<tr>
															<th>Customer Name</th>
															<td><?php echo $row["userName"] ?></td>
														</tr>
														<tr>
															<th>Phone</th>
															<td><?php echo $row["userPhone"] ?></td>
														</tr>
														<tr>
															<th>Email</th>
															<td><?php echo $row["userEmail"] ?></td>
														</tr>
														<tr>
															<th>Location</th>
															<td><?php echo $row["houseName"]."&nbsp;(H)".$row["customerTown"]."&nbsp;P.O.&nbsp;".$row["customerPincode"] ?></td>
														</tr>
													
				<?php
 			?>	
			</table>						
								<!--MODAL ENDS-->
   
                                   <a href="#" class="modal__close">&times;</a>
                                 </div>
                                </div>
								<?php }
                       
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
									
				                 
								
							</tr>
							
						</tbody>
                        
               
					</table>
				</div>
				
			</div>

			<!--UPCOMING-->

			<div class="table-data" style="display:block;" id="upcoming">
				<div class="order">
					<div class="head">
						<h3><font color="#DDAD08">Vaccination to be done</font></h3>
						<form action="" method="POST">
				<div class="form-input">
					<input type="search" class="live-search-box2" name="search" id="search" placeholder="Search here..." size="25cm">
					<input type="hidden" name="submit" style="background-color:transparent;border:transparent;color:transparent;padding:0.2px;margin:0px">
					
				</div>
			</form>
						<!--<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>-->
						</div>
                    <?php
include "connection.php";
$date=date('Y-m-d');
$sel="SELECT tbl2.*,tbl1.*,tbl3.* FROM tbl_vaccinebooked AS tbl2 INNER JOIN tbl_pet AS tbl1 ON tbl2.petID=tbl1.petID INNER JOIN tbl_userdetails AS tbl3 ON tbl3.userID=tbl1.customerID WHERE vaccineDate>'$date' AND tbl1.petStatus!=2";
if ($result=$conn->query($sel))
{
    if($result->num_rows>0)
    {
        
        ?>
					<table id="myTable2" class="live-search-list2">
						<thead>
							<tr class="header">
                                <th>Sl no</th>	
								<th>Species</th>
								<th>Vaccine</th>
								<th>Date</th>
                                <th>Time Slot</th>	
                                <th>Approve</th>
								<th></th>
							</tr>
						</thead>
                        <?php 
                $i=0;
                while($row=$result->fetch_array())
                {
                  $i++;
                ?>
						<tbody>
							<tr>
                                <td><?php echo $i ?></td>
								
								<td><?php echo $row["petSpecies"] ?></td>
								<td><?php echo $row["vaccineName"] ?></td>
								<?php

								$vaccinedatesplitted=explode("-",$row["vaccineDate"]);

$year1=$vaccinedatesplitted[0];
$month1=$vaccinedatesplitted[1];
$day1=$vaccinedatesplitted[2];

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

?>

                                <td><?php echo $fulldate ?></td>
                                <td><?php if(($row["vaccineTime"])==9)
                                echo "Morning";
                                else if(($row["vaccineTime"])==2)
                                echo "Evening"; 
                                ?></td>
								</td>
                                 <td>
                 
                 <form id="form" action="approvevaccinationbookings2.php?vaccinebookedID=<?php echo $row["vaccinebookedID"] ?>" method="POST">
                 <label class="switch" >
                 <button type="submit" name="togbutton" id="submitbutton" style='color:green'>   
                 <?php $vaccinebookedStatus=$row["vaccinebookedStatus"]; 
                 if($vaccinebookedStatus==1)
                 echo "<input type='checkbox' name='togbutton' id='toggle' >";
                 else if($vaccinebookedStatus==0)
                 echo "<input type='checkbox' name='togbutton' id='toggle' checked>";

                 ?>           
     
                 <span class="slider round"></span></button>
                 </label></form></td>  


								<td>
								<div class="wrapper">
    								<a href="#demo-modal<?php echo $row["customerID"];?>" style="border:2px solid black;border-radius:4px;background-color:#060714;color:white;padding:4px;">View more</a>
								</div>
								<!--MODAL STARTS...-->

								<div id="demo-modal<?php echo $row["customerID"];?>" class="modal">
    								<div class="modal__content">
									<h1>Booking Details</h1>
													<table>
										<?php
										
										?>
        											
														<tr>
															<th>Customer Name</th>
															<td><?php echo $row["userName"] ?></td>
														</tr>
														<tr>
															<th>Phone</th>
															<td><?php echo $row["userPhone"] ?></td>
														</tr>
														<tr>
															<th>Email</th>
															<td><?php echo $row["userEmail"] ?></td>
														</tr>
														<tr>
															<th>Location</th>
															<td><?php echo $row["houseName"]."&nbsp;(H)".$row["customerTown"]."&nbsp;P.O.&nbsp;".$row["customerPincode"] ?></td>
														</tr>
													
				<?php
 			?>	
			</table>						
								<!--MODAL ENDS-->
   
                                   <a href="#" class="modal__close">&times;</a>
                                 </div>
                                </div>
								<?php }
                       
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
									
				                 
								
							</tr>
							
						</tbody>
                        
               
					</table>
				</div>
				
			</div>
			<!--HISTORY-->
			<div class="table-data" style="display:block;" id="yesterday">
				<div class="order">
					<div class="head">
						<h3><font color="#DDAD08">History</font></h3>
						<form action="" method="POST">
				<div class="form-input">
					<input type="search" class="live-search-box3" name="search" id="search" placeholder="Search here..." size="25cm">
					<input type="hidden" name="submit" style="background-color:transparent;border:transparent;color:transparent;padding:0.2px;margin:0px">
					
				</div>
			</form>
						<!--<i class='bx bx-search' ></i>
						<i class='bx bx-filter' ></i>-->
					</div>
                    <?php
include "connection.php";
$date=date('Y-m-d');
$sel="SELECT tbl2.*,tbl1.*,tbl3.* FROM tbl_vaccinebooked AS tbl2 INNER JOIN tbl_pet AS tbl1 ON tbl2.petID=tbl1.petID INNER JOIN tbl_userdetails AS tbl3 ON tbl3.userID=tbl1.customerID WHERE vaccineDate<'$date'";
if ($result=$conn->query($sel))
{
    if($result->num_rows>0)
    {
        
        ?>
					<table id="myTable3" class="live-search-list3">
						<thead>
							<tr class="header">
                                <th>Sl no</th>	
								<th>Species</th>
								<th>Vaccine</th>
								<th>Date</th>
                                <th>Time Slot</th>	
                                <th>Mark as Done</th>
								<th></th>
							</tr>
						</thead>
                        <?php 
                $i=0;
                while($row=$result->fetch_array())
                {
                  $i++;
                ?>
						<tbody>
							<tr>
                                <td><?php echo $i ?></td>
								
								<td><?php echo $row["petSpecies"] ?></td>
								<td><?php echo $row["vaccineName"] ?></td>

								<?php

								$vaccinedatesplitted2=explode("-",$row["vaccineDate"]);

$year2=$vaccinedatesplitted2[0];
$month2=$vaccinedatesplitted2[1];
$day2=$vaccinedatesplitted2[2];

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
elseif($month2==05)
{
	$monthinword2="May";
}
elseif($month2==06)
{
	$monthinword2="Jun";
}
elseif($month2==07)
{
	$monthinword2="Jul";
}
elseif($month2=="08")
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


$fulldate2= $monthinword2." ".$day2.",".$year2;

?>

								
                                <td><?php echo $fulldate2; ?></td>
                                <td><?php if(($row["vaccineTime"])==9)
                                echo "Morning";
                                else if(($row["vaccineTime"])==2)
                                echo "Evening"; 
                                ?></td>
								</td>
                                 <td>
                 
                 <form id="form" action="approvevaccinationbookings3.php?vaccinebookedID=<?php echo $row["vaccinebookedID"] ?>" method="POST">
                 <label class="switch" >
                 <button type="submit" name="togbutton" id="submitbutton" style='color:green'>   
                 <?php $vaccinebookedStatus=$row["vaccinebookedStatus"]; 
                 if($vaccinebookedStatus==0)
                 echo "<input type='checkbox' name='togbutton' id='toggle' >";
                 else if($vaccinebookedStatus==2)
                 echo "<input type='checkbox' name='togbutton' id='toggle' checked>";

                 ?>           
     
                 <span class="slider round"></span></button>
                 </label></form></td>  


								<td>
								<div class="wrapper">
    								<a href="#demo-modal<?php echo $row["customerID"];?>" style="border:2px solid black;border-radius:4px;background-color:#060714;color:white;padding:4px;">View more</a>
								</div>
								<!--MODAL STARTS...-->

								<div id="demo-modal<?php echo $row["customerID"];?>" class="modal">
    								<div class="modal__content">
									<h1>Booking Details</h1>
													<table>
										<?php
										
										?>
        											
														<tr>
															<th>Customer Name</th>
															<td><?php echo $row["userName"] ?></td>
														</tr>
														<tr>
															<th>Phone</th>
															<td><?php echo $row["userPhone"] ?></td>
														</tr>
														<tr>
															<th>Email</th>
															<td><?php echo $row["userEmail"] ?></td>
														</tr>
														<tr>
															<th>Location</th>
															<td><?php echo $row["houseName"]."&nbsp;(H)".$row["customerTown"]."&nbsp;P.O.&nbsp;".$row["customerPincode"] ?></td>
														</tr>
													
				<?php
 			?>	
			</table>						
								<!--MODAL ENDS-->
   
                                   <a href="#" class="modal__close">&times;</a>
                                 </div>
                                </div>
								<?php }
                       
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
									
				                 
								
							</tr>
							
						</tbody>
                        
               
					</table>
				</div>
				
			</div>
			


			
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
  
</div>

        

    </body>
	<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
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

<script>
    jQuery(document).ready(($) => {


$('.live-search-list2 tbody').each(function(){
  $(this).attr('data-search-term', $(this).text().toLowerCase());
});

$('.live-search-box2').on('keyup', function(){
  const searchTerm = $(this).val().toLowerCase();
  $('.live-search-list2 tbody').each(function(){
    ($(this).filter('[data-search-term *= ' + searchTerm + ']').length > 0 || searchTerm.length < 1)
      ? $(this).show()
      : $(this).hide();      
  });
});

$('input[class=live-search-box2]').keydown(function(e){
  if(e.keyCode == ENTER){
    e.preventDefault();
    e.stopPropagation();
    
    const toAdd = $('input[class=live-search-box2]').val();
    if (toAdd) {
      $('<tbody/>' , {
        'text': toAdd,      
        'data-search-term':  toAdd.toLowerCase(),
      }).appendTo($('table'));
      $('input[class=live-search-box2]').val('');
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

<script>
    jQuery(document).ready(($) => {


$('.live-search-list3 tbody').each(function(){
  $(this).attr('data-search-term', $(this).text().toLowerCase());
});

$('.live-search-box3').on('keyup', function(){
  const searchTerm = $(this).val().toLowerCase();
  $('.live-search-list3 tbody').each(function(){
    ($(this).filter('[data-search-term *= ' + searchTerm + ']').length > 0 || searchTerm.length < 1)
      ? $(this).show()
      : $(this).hide();      
  });
});

$('input[class=live-search-box3]').keydown(function(e){
  if(e.keyCode == ENTER){
    e.preventDefault();
    e.stopPropagation();
    
    const toAdd = $('input[class=live-search-box3]').val();
    if (toAdd) {
      $('<tbody/>' , {
        'text': toAdd,      
        'data-search-term':  toAdd.toLowerCase(),
      }).appendTo($('table'));
      $('input[class=live-search-box3]').val('');
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