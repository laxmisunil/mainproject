<?php
include "connection.php";
session_start();

$userID=$_SESSION["loginID"];
$orderID=$_GET['orderid'];


$updata="UPDATE tbl_order SET orderStatus=0 WHERE orderID='$orderID' AND customerID='$userID'";
try
{
    if($conn->query($updata)===true);
    $selectorderproduct="SELECT tbl1.productQuantity AS productCount,tbl2.* FROM tbl_orderitems AS tbl1 INNER JOIN tbl_stock AS tbl2 ON tbl1.stockID=tbl2.stockID  WHERE tbl1.order_ID=$orderID";
    {
        if($result=$conn->query($selectorderproduct))
        {
            if($result->num_rows>0)
            {
                while($row=$result->fetch_array())
                {
                    $stockID=$row["stockID"];
                    $productstock=$row["productStock"];
                    $productquantity=$row["productCount"];
                    
                    $upstock="UPDATE tbl_stock SET productStock='$productstock'+'$productquantity' WHERE stockID='$stockID'";
                    if($conn->query($upstock)===true);
                }
               // $result->free();
            }
        }
    }
    header("location:myorders.php?status1=1");

}
catch(Exception)
{
    echo "ERROR";
} 


?>