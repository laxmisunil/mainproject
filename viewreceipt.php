<?php
include "connection.php";

session_start();
if($_SESSION["loginStatus"])
{
if ($_SESSION["loginStatus"]==3)
{
$userID=$_SESSION["loginID"];
$orderID=$_GET["orderid"];
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

<html><body>

<style>
    * {
  box-sizing: border-box;
}

@import url("https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap");

body {
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  font-family: "Inter", sans-serif;
  background-color: #ededed;
  margin: 0;
}

.receipt {
  background-color: #fff;
  width: 22rem;
  position: relative;
  padding: 1rem;
  box-shadow: 0 -0.4rem 1rem -0.4rem rgba(0,0,0,0.2);
}

.receipt:after {
  background-image: linear-gradient(135deg, #fff 0.5rem, transparent 0), linear-gradient(-135deg, #fff 0.5rem, transparent 0);
    background-position: left-bottom;
    background-repeat: repeat-x;
    background-size: 1rem;
    content: '';
    display: block;
    position: absolute;
    bottom: -1rem;
    left: 0;
    width: 100%;
    height: 1rem;
}

.receipt__header {
  text-align: center;
}

.receipt__title {
  color: chocolate;
  font-size: 1.2rem;
  font-weight: 600;
  margin: 1rem 0 0.5rem;
}

.receipt__date {
  font-size: 0.8rem;
  color: #666;
  margin: 0.5rem 0 1rem;
}

.receipt__list {
  margin: 2rem 0 1rem;
  padding: 0 1rem;
}

.receipt__list-row {
  display: flex;
  justify-content: space-between;
  margin: 1rem 0;
  position: relative;
}

.receipt__list-row:after {
  content: '';
  display: block;
  border-bottom: 1px dotted rgba(0,0,0,0.15);
  width: 100%;
  height: 100%;
  position: absolute;
  top: -0.25rem;
  z-index: 1
}

.receipt__item {
  background-color: #fff;
  z-index: 2;
  padding: 0 0.15rem 0 0;
  color: #1f1f1f;
}

.receipt__cost {
  margin: 0;
  padding: 0 0 0 0.15rem;
  background-color: #fff;
  z-index: 2;
  color: #1f1f1f;
}

.receipt__list-row--total {
  border-top: 1px solid #FF619B;
  padding: 1.5rem 0 0;
  margin: 1.5rem 0 0;
  font-weight: 700;
}
#download
{
  color:blue;
  background-color:transparent;
  border:transparent;
  font-size:14px;
}
#download:hover
{
cursor: pointer;
}

    </style>
    <?php
    
    $sel3="SELECT * FROM tbl_order WHERE orderID=$orderID";
    if($result3=$conn->query($sel3))
    {
        if($result3->num_rows>0)
        {
            while($row=$result3->fetch_array())
            {
              $transID=$row["transID"];
            }
            //$result3->free();
        }
    }
    $sel4="SELECT * FROM tbl_payment WHERE transactionID=$transID";
    if($result4=$conn->query($sel4))
    {
        if($result4->num_rows>0)
        {
            while($row=$result4->fetch_array())
            {
              $razorpayOrderID=$row["razorpayOrderID"];
            }
            //$result4->free();
        }
    }
    
  


    $myorders="SELECT tbl2.*,tbl1.*,tbl3.productPrice,tbl3.productMeasure,tbl3.productQuantity AS proQuantity FROM tbl_productdetails AS tbl2 INNER JOIN tbl_orderitems AS tbl1 ON tbl2.productID=tbl1.productID INNER JOIN tbl_stock AS tbl3 ON tbl3.stockID=tbl1.stockID WHERE tbl1.order_ID=$orderID";
    //SELECT tbl2.*,tbl1.*,sum(tbl3.productPrice) AS totalPrice FROM tbl_stock AS tbl3 INNER JOIN tbl_productdetails AS tbl2 ON tbl2.productID=tbl3.productID INNER JOIN tbl_orderitems AS tbl1 ON tbl1.productID=tbl2.productID WHERE tbl1.order_ID=$orderID
    if ($result=$conn->query($myorders))
    {
        if($result->num_rows>0)
        { 
        ?>
      
        
            <?php 
            $i=0;
            $subtotal=0;
            ?>
            <div class="receipt">
            <header class="receipt__header">
              <img src="logofinal.png" width="30%">
            <p class="receipt__title">Receipt</p>
            <p class="receipt__date"><?php echo "Order No : ".$razorpayOrderID; ?></p>
            </header>
            
            <table>
              <tr>
                <th style="color:chocolate;text-align:left">Product</th>
                <th></th><th></th><th></th>
                <th style="color:chocolate">Price</th>
                <th></th><th></th><th></th><th></th>
                <th style="color:chocolate">Nos</th>
                <th></th><th></th>
                <th style="color:chocolate">Subtotal</th>
              </tr>
            <?php
            $grandtotal=0;
            while($row=$result->fetch_array())
            {
              $i=$i+1;
              
               ?>
                          
                              <tr>
                                <td><?php echo $row["productName"]."(".$row["proQuantity"].$row["productMeasure"].")"?><td>
                                  <td></td> <td></td>
                                  <td><?php echo "₹".$row["productOrderPrice"]?></td>
                                  <td></td> <td></td><td></td><td></td>
                                  <td><?php echo $row["productQuantity"]?></td>
                                  <td></td> <td></td>
                                  <td><?php echo "₹".$row["productOrderPrice"]*$row["productQuantity"]?></td>
                                  
              
                            <?php
                            $grandtotal=$grandtotal+($row["productOrderPrice"]*$row["productQuantity"]);
                            // $subtotal=$subtotal+$productPrice; 
                            }
                          
                       
        }
    }
        
    ?> 
    </tr>
       </table>
            <h4><?php echo "Amount Paid: ₹ ". $grandtotal; ?></h4>
            <br>
            <center>
                <button id="download" onclick="window.print();">Download Receipt</button></center>
                  </div>
                       <script>
                              </script>
</body>
</html>
        
        
    
        
              




     
    

