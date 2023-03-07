<?php
include "connection.php";

$sel="SELECT tbl1.*,sum(tbl2.productQuantity) AS pro FROM tbl_order AS tbl1 INNER JOIN tbl_orderitems AS tbl2 ON tbl1.orderID=tbl2.order_ID GROUP BY customerID";
if($result=$conn->query($sel))
{
    if($result->num_rows>0)
    {
        while($row=$result->fetch_array())
        {
            $p=$row["pro"];
            $c=$row["customerID"];
            echo $c." ".$p."<br>";
        }
        $result->free();
    }
}

 ?>