<?php
include "connection.php";

session_start();
if(isset($_POST["addtocart"]))
{
$productID=$_GET["productid"];
$userID=$_SESSION["loginID"];
$stockID=$_POST["productquantitymeasure"];

$productdetails="SELECT * FROM tbl_productdetails WHERE productID='$productID'";
if ($result=$conn->query($productdetails))
{
    if($result->num_rows>0)
    {
        while($row=$result->fetch_array())
        {
            $productname=$row["productName"];   
            $productsubname=$row["productSubname"]  ;
            //$productprice=$row["productPrice"]; 
            //echo $productname;
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

$quantity="SELECT productCount FROM tbl_cart WHERE productID=$productID AND stockID=$stockID AND customerID=$userID";
if ($result2=$conn->query($quantity))
{
    if($result2->num_rows>0)
    {
        while($row=$result2->fetch_array())
        {
            $productcount=$row['productCount']; 
            //echo $productname;
        }
        //$result2->free();
    }
    else
    {
        echo "No Records";
    }
}
$sel1="SELECT productStock FROM tbl_stock WHERE stockID=$stockID";
if($result3=$conn->query($sel1))
{
    if($result3->num_rows>0)
    {
        while($row=$result3->fetch_array())
        {
         $productstock=$row["productStock"];
         if($productstock>0)
         {
       

 
$rowcheck="SELECT count(*) as countrows FROM tbl_cart WHERE productID=$productID AND stockID=$stockID AND customerID=$userID AND cartStatus=1";
$result = mysqli_query($conn,$rowcheck);
if(mysqli_num_rows($result))
{
    $row = mysqli_fetch_array($result);

    $count = $row['countrows'];
    
    //echo $count;

    if($count>0)
    {
        $new=$productcount+1;
        $addquantity="UPDATE tbl_cart SET productCount=$new WHERE productID=$productID AND stockID=$stockID AND customerID=$userID AND cartStatus=1";
        if($conn->query($addquantity)===true)
        {
            /*$updatestock="UPDATE tbl_stock SET productStock=$productstock-1 WHERE stockID=$stockID";
            if($conn->query($updatestock)===true)
            {
              // header("location:home.php?status=1");
            }
            else 
            {
                //echo "Please try again later";
            }*/
           header("location:dogs.php?status=1");
        }
        else 
        {
            echo "Please try again later";
        }
       // header("location:home.php?status=0");
       
       
    }
    elseif($productstockincart!=$productstock)
    {
        $productQuantity=1;
        $data="INSERT INTO tbl_cart VALUES (NULL,'$userID','$productID','$stockID','$productQuantity',1)";
       
            if($conn->query($data)===true);
            /*$updatestock="UPDATE tbl_stock SET productStock=$productstock-1 WHERE stockID=$stockID";
            if($conn->query($updatestock)===true)
            {
              // header("location:home.php?status=1");
            }
            else 
            {
                //echo "Please try again later";
            }*/
            header("location:dogs.php?status=1");
       
           // echo "<br>ACCOUNT CREATED SUCCESSFULLY!";
        
       
    }   
    else
    {
        header("location:dogs.php");
    } 

  }
}
else
{
    header("location:dogs.php?status2=2");
}

}
$result3->free();
}
}



}
    
?>
 
