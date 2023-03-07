<?php
include "connection.php";

//$price=$_POST["price"];
$userID=$_POST["userID"];
$stockID=$_POST["quantitymeasure"];
$productID=$_POST["productID"];

 $sql = "SELECT count(*) FROM tbl_cart WHERE cartStatus=1 AND customerID=$userID AND productID=$productID AND stockiD='$stockID'";
    $q = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($q);
    $cartitemcount=$row[0];

    if($cartitemcount==0)
    {

   $sel = "SELECT productPrice,productStock from tbl_stock WHERE stockID='$stockID' AND productID='$productID'";

if($result=$conn->query($sel))
{
    if($result->num_rows>0)
    {
        while($row=$result->fetch_array())
        {
            $productprice=$row["productPrice"];
            $productstock=$row["productStock"];
            $productsincart=0;

            $response1="<h4 style='color: gray;text-align:center'>Rs. ".$productprice."</h4>";
            $response2=$productstock;

            $results["res1"] = $response1;
            $results["res2"] = $response2;
            $results["res3"] = $productsincart;

        }
       // $result->free();
    }
}
    }
    else
    {
        $sel = "SELECT tbl1.productPrice,tbl1.productStock,tbl2.productCount FROM tbl_stock AS tbl1 INNER JOIN tbl_cart AS tbl2 ON tbl1.stockID=tbl2.stockID WHERE tbl1.stockID='$stockID' AND tbl1.productID='$productID' AND tbl2.customerID='$userID'";

        if($result=$conn->query($sel))
        {
            if($result->num_rows>0)
            {
                while($row=$result->fetch_array())
                {
                    $productprice=$row["productPrice"];
                    $productstock=$row["productStock"];
        
                    $response1="<h4 style='color: gray;text-align:center'>Rs. ".$productprice."</h4>";
                    $response2=$productstock;
                    $response3=$row["productCount"];
        
                    $results["res1"] = $response1;
                    $results["res2"] = $response2;
                    $results["res3"] = $response3;
        
                }
               // $result->free();
            }
        }

    }
      echo json_encode($results);
   //echo $response;
   die;
?>
