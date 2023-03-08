<?php
include "connection.php";

//$price=$_POST["price"];
$stockID=$_POST["quantitymeasure"];
$productID=$_POST["productID"];
?>
<?php

   $sel = "SELECT productPrice,productQuantity from tbl_stock WHERE stockID='$stockID' AND productID='$productID'";

if($result=$conn->query($sel))
{
    if($result->num_rows>0)
    {
        while($row=$result->fetch_array())
        {
            $productprice=$row["productPrice"];
            $productquantity=$row["productQuantity"];

            $response1="<h4 style='color: gray;text-align:center'>Rs. ".$productprice."</h4>";
            $response2=$productquantity;

            $results["res1"] = $response1;
            $results["res2"] = $response2;

        }
       // $result->free();
    }
}
      echo json_encode($results);
   //echo $response;
   die;
?>
