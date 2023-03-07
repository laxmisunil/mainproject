<?php
include "connection.php";
$sel="SELECT tbl1.*,sum(tbl2.productOrderPrice) AS pro FROM tbl_order AS tbl1 INNER JOIN tbl_orderitems AS tbl2 ON tbl1.orderID=tbl2.order_ID WHERE orderStatus!=0 GROUP BY tbl1.orderYear";
if($result=$conn->query($sel))
{
    if($result->num_rows>0)
    {
        while($row=$result->fetch_array())
        {
            $p=$row["pro"];
            $c=$row["orderYear"];
            echo "<tr>";
            echo "<td>".$c."</td>";
            echo "<td>₹ ".$p."</td>";
            echo "</tr>";


            array_push($z, $c);
            array_push($t, $p);
          

           
        }
        //$result->free();
    }
}
print_r($z);
// $string_version1 = implode(',', $z);
// $string_version2 = implode(',', $t);

// echo "[".$string_version1."]";
// echo "[".$string_version2."]";


?>