
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
           

            array_push($z, $c);
            array_push($t, $p);
           

           
        }
        //$result->free();
    }
}
//print_r($z);
$string_version1 = implode(',', $z);
$string_version2 = implode(',', $t);

?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<body>
<canvas id="myChart" style="width:100%;max-width:600px"></canvas>

<script>
var xValues = <?php echo "[".$string_version1."]"; ?>;
var yValues = <?php echo "[".$string_version2."]"; ?>;


new Chart("myChart", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{
      fill: false,
      lineTension: 0,
      backgroundColor: "rgba(0,0,255,1)",
      borderColor: "rgba(0,0,0,0)",
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    scales: {
      yAxes: [{ticks: {min: 0, max:<?php echo 5000; ?>}}],
    }
  }
});
</script>