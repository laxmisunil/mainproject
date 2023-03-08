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
  color: #FF619B;
  font-size: 1.6rem;
  font-weight: 700;
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

    </style>
    <?php
    $myorders="SELECT * FROM tbl_orderitems WHERE order_ID=$orderID";
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
            <p class="receipt__title">PAWS' OWN</p>
            <p class="receipt__date">13 December 2020</p>
            </header>
            <?php
            while($row=$result->fetch_array())
            {
                $productID=$row["productID"];
                $productQuantity=$row["productQuantity"];
                $selproduct="SELECT * FROM tbl_productdetails WHERE productID=$productID";
                if($result2=$conn->query($selproduct))
                {
                    if($result2->num_rows>0)
                    {
                       
                        $totalamount=0;
                        while($row=$result2->fetch_array())
                        {
                            $i++;
                            $productImage=$row["productImage"];
                            $productName=$row["productName"];
                            $productPrice=$row["productPrice"];
                            ?> 
                            <br>  
                        <dl class="receipt__list">
                            <div class="receipt__list-row"> 
                            <dt class="receipt__item"><?php echo $productName; ?></dt>
                            <dd class="receipt__cost"><?php echo $productPrice; ?>
                            <?php $totalamount=$totalamount+$productPrice;  
                              echo $totalamount;  ?>
                            
                            <?php
                            $totalamount=$totalamount+$productPrice;  
                              echo $totalamount; 
                            }
                            $result2->free();
                        ?></dd></div> 
                        </dl>
                       
                       
                       
                    <?php    
                    }
                    
                    
                }
            }   
            ?><p>Total Price =</p><?php     
            
        }
    }
            
    ?> 
    
   
</div>
        
        
    
        
              




     
    
    
<button onclick="window.print();"></button>
