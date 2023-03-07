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
        <title>Add a Product</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <style>
            body
            {
                background-color: #f2f2f2;
                text-align: center;
                font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            }
            input[type=text],input[type=password],select,input[type="file"],input[type="number"]
            {
                width: 100%;
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
            }
            input[type=submit]
            {
                width: 100%;
                background-color: black;
                color: #fafafa;
                padding: 14px 20px;
                margin: 8px 0;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-weight: bolder;
                
            }
            input[type=submit]:hover
            {
                background-color: #595959;
            }
            a
            {
                color:blue;
                text-decoration: none;
            } 
            #cac
            {
                color: #595959;
                font-weight: bolder;
                font-size: larger;
                text-align: left;
            }
            .drop1
            {
                padding: 12px 20px;
                margin: 8px 0px; 
            } 
            fieldset
            {
                border: 2px solid white;
                box-shadow: 8px 8px 12px #888;
            } 
            option
            {
                padding:5px 0px;
            } 
            form i 
            {
                margin-left: -31px; 
                margin-right: 9.5px;
                cursor: pointer;
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
  text-align: left;
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
  margin-left: 200px; /* Same as the width of the sidenav */
  font-size: 28px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
  #header
{
  
    color:black;
    padding: 6px;
    margin: 0;
    margin-top: 0;
    padding-right: 12px;
    
}
html,body
{
    margin: 0;
    padding: 0;
}
}

        </style>
       
        <?php
      if(isset($_GET["status"]))
      {
     if(($_GET["status"])==0)
      {
      ?>
          <script>
              alert("Operation Failed!");
          </script>
     
          <?php
      }
    }

     
?>
<script>
           function check()
            {  
                var proname= $("#proname").val();
                var prosubname=$("#prosubname").val();
                $.ajax(
                    {
                        url: 'productcheck.php',
                        type: 'post',
                        data: {proname:proname,prosubname:prosubname},
                        success: function(response)
                        {                        
                            $('#response2').html(response);
                        }
                    }
                    );
            }  
           
</script>
          
    </head>
    <body>
    

    <div class="sidenav">
  <a href="adminhome.php">Dashboard</a><br>
  <a href="customerlist.php">Customers</a><br>
  <a href="productlist.php">Products</a><br>
  <a href="veterinarydetails4.php">Veterinary Details</a><br>
  <a href="customerfeedbacks.php">Feedbacks</a><br>
  <a href="adminlogout.php">Logout</a>
</div>
        <div>  
            <fieldset style="margin-top: 1cm;margin-left: 11cm;margin-right: 11cm;background-color:white;padding-bottom: 0.2cm;">
                <form action="insertproduct.php" method="POST" target="_self" enctype="multipart/form-data">
                   
                    <h2 style="margin-left:10px">Add Product</h2> 
                    
                   
                  
                    <select name="productcategory" id="productcategory" required> 
                    <option value="" disabled selected hidden>Product category</option>
                        <option value="Food" class="drop1">Food</option>
                        <option value="Toys" class="drop1">Toys</option>
                        <option value="Accessories" class="drop1">Accessories</option>
                    </select>

                    <input type="text"  id="proname"  size="30cm" pattern="[a-zA-Z][a-zA-Z ]+[a-zA-Z]$" placeholder="Product Name" name="proname" required><br>

                    <input type="text"  id="prosubname"  size="30cm" pattern="[a-zA-Z][a-zA-Z ]+[a-zA-Z]$" onfocusout="check()" placeholder="Product Subname" name="prosubname" required><br>
                    <div id="response2" style="font-size:small;text-align:center"></div>
                    
                    <input type="number" min=1 placeholder="Product Price (Rs.)" size="30cm" name="productprice" id="proprice" required><br>
                   

                    <textarea pattern="[a-zA-Z][a-zA-Z ]+[a-zA-Z]$"  rows="4" cols="60cm" maxlength=100 id="productdescription" name="productdescription" placeholder="  Product Description" required></textarea><br><br>
                   
                    <label for="proimage">Add Product Image</label>
                    <input type="file"  name="productimage" id="proimage" accept="image/*" required><br>

                    <input type="submit" value="Add Product" name="addproduct">
                    
                   
                    
                </form>
            </fieldset>