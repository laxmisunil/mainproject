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




<?php


if(isset($_GET["status"]))
{
if(($_GET["status"])==2)
      {
        ?>
        
          
        <div id="snackbar">Product updated successfully!</div>
            <script> var x = document.getElementById("snackbar");
          x.className = "show";
          setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);</script>
          <?php 
        }
    }
        
    ?>


<html>
    <head>
        <title>Product List</title>
            <style>
            body
            {
                font-size: 15px;
                font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            }
            table
            {
                border-collapse: collapse;
                border-spacing: 0;
                
                border: 1px solid #ddd;
            }
            td,th
            {
              
                padding: 16px;
            }
            tr:nth-child(even)
            {
                background-color: #f2f2f2;
            }
            #div2
            {
           
                padding: 2px 10px 2px 10px;
                font-weight: lighter;
                font-size: 27px;
                text-align: center;
                color:white;
                margin-left: 180px;
                
            }
            #d
            {
               
                padding-top: 1px;
                padding-top: 1px;
                margin-bottom: 0;
            }
            .navigation
            {
                display: flex;
                margin-top: 20px;
                margin-left: 3.5cm;
                margin-right:4.8cm;  
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
            hr
            {
                height:1px;
                border-width:0;
                color:rgb(74, 71, 71);
                background-color:rgb(99, 96, 96);
                margin:0px 30px 0px 30px;
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
            #addpro:hover
            {
                background-color: black;
                color:white;
            }
          
            .slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
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
  margin-left: 200px; /* Same as the width of the sidenav */
  font-size: 28px; /* Increased text to enable scrolling */
 
  padding: 0px 10px;
}
h2
{
    margin-left: 200px;
    margin-top: 10px;
    margin-bottom: 10px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
#addproduct
{
    padding:10px;
    background-color:RoyalBlue;
    color:white;
    margin-left: 200px;
    border:0;
    border-radius: 12px;
}

#addproduct:hover
{
    background-color:LightSkyBlue;
    color:white;
    cursor:pointer;
}
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
#snackbar,#snackbar3 {
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
#snackbar.show {
  visibility: visible;
  -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
  animation: fadein 0.5s, fadeout 0.5s 2.5s;
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
#snackbar2.show {
  visibility: visible;
  -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
  animation: fadein 0.5s, fadeout 0.5s 2.5s;
}
#snackbar3.show {
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
        </head>

    <body>
    <div id="header" style="display:flex">
    <h2 style="margin-left:200px;margin-bottom:4px">Products</h2>
    

    <?php
                if ($_SESSION["loginStatus"]==1)
                {
                ?>
                    <form action="addproduct.php">
                <?php
                }
                else
                {
                ?>
                    <form action="login.php">
                <?php
                }
                ?>
               <input type="submit" value="Add new Product" style="margin-left:830px;margin-top:5px" id="addproduct">

            </form>
            
    </div>
    <hr style="margin-bottom: 0;">
    <div class="sidenav">
  
  <a href="adminhome.php">Dashboard</a><br>
  <a href="customerlist.php">Customers</a><br>
  <a href="" style="color:white">Products</a><br>
  <a href="veterinarydetails4.php">Veterinary Details</a><br>
  <a href="customerfeedbacks.php">Feedbacks</a><br>
  <a href="adminlogout.php">Logout</a>
</div>
            

<?php
include "connection.php";
$sel="SELECT * from tbl_productdetails where productStatus=1";
if ($result=$conn->query($sel))
{
    if($result->num_rows>0)
    {
        
        ?>
        <div id="div2">
<table style="margin-top:0">
                <tr id="tr1">
                    <th style="width:5%;text-align:left;background-color:Silver">Sl No.</th>
                    <!--<th style="width:10%;text-align:left;background-color:Silver">Product Category</th>-->
                    <th style="width:12%;text-align:left;background-color:Silver">Product Subcategory</th> 
                    <th style="width:12%;text-align:left;background-color:Silver">Product Name </th>
                    <th style="width:10%;text-align:left;background-color:Silver">Product Price</th>  
                    <th style="width:10%;text-align:left;background-color:Silver">Product Description</th>   
                    <th style="width:12%;text-align:left;background-color:Silver">Product Image</th>
                    <th style="width:9%;text-align:center;background-color:Silver">Edit</th>
                    <th style="width:9%;text-align:center;background-color:Silver">Delete</th>
           
                    
                </tr>

                <?php 
                $i=0;
                while($row=$result->fetch_array())
                {
                    $i++;
                ?>
                <tr>
                    <td style="width:7%"><?php echo $i ?></td>
                    <!--<td style="width:10%"><?php //echo $row["productCategory"] ?></td>-->
                    <td style="width:12%"><?php echo $row["productSubcategory"] ?></td>
                    <td style="width:12%"><?php echo $row["productName"] ?></td>
                    <td style="width:12%"><?php echo $row["productPrice"] ?></td>
                    <td style="width:12%"><?php echo $row["productDescription"] ?></td>
                    <td style="width:12%"><?php echo $row["productImage"] ?></td>
    
                    <td style="text-align:center;width:9%"><abbr title="Update Product"><a href="updateproduct.php?productid=<?php echo $row["productID"]?>" style="text-decoration:none;color:green;"><img src="updateicon.png" style="width:27%"></a></abbr></td> 
                    <td style="text-align:center;width:9%"><abbr title="Delete Product"><a href="removeproduct.php?productid=<?php echo $row["productID"]?>" style="text-decoration:none;color:red;"><img src="deleteicon.jpg" style="width:28%"></a></abbr></td>
                   
                   
                </tr> 

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
                </table>
        </div>

</body>


</html>