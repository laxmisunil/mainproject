<table>
    <tr><th>Year</th><th>Revenue</th></tr>


<?php

include "connection.php";
require_once __DIR__ . '/vendor/autoload.php';

use Phpml\Regression\LeastSquares;

$z = [];
$t=[];

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


            array_push($z, [$c]);
            array_push($t, $p);

           
        }
        //$result->free();
    }
}


echo "<br>";?>
</table>
<table>
    <tr><th>Year</th><th>Expected Revenue</th></tr>
<?php


 $r = new LeastSquares();
 $r->train($z, $t);


 $i=$c+1;
 $go=$c+10;
 while($i<$go)
 {
 $res = $r->predict([$i]);
 echo "<tr>";
 echo "<td>".$i."</td><td>₹ ".$res."</td>";
 echo "</tr>";
 $i++;
 }


?>
<table>
