<?php

include "connection.php";


$sel="SELECT count(*) AS vaccinated FROM tbl_vaccinebooked WHERE vaccinebookedStatus=2";
if($result=$conn->query($sel))
{
    if($result->num_rows>0)
    {
        while($row=$result->fetch_array())
        {
            $vaccinated=$row["vaccinated"];
        }
        //$result->free();
    }
}


$sel="SELECT count(*) AS vaccinated FROM tbl_vaccinebooked WHERE vaccinebookedStatus=2";
if($result=$conn->query($sel))
{
    if($result->num_rows>0)
    {
        while($row=$result->fetch_array())
        {
            $vaccinated=$row["vaccinated"];
        }
        //$result->free();
    }
}


$sel2="SELECT count(*) AS notvaccinated FROM tbl_vaccinebooked WHERE vaccinebookedStatus=0";
if($result2=$conn->query($sel2))
{
    if($result2->num_rows>0)
    {
        while($row=$result2->fetch_array())
        {
            $notvaccinated=$row["notvaccinated"];
        }
        //$result->free();
    }
}

$sel3="SELECT count(*) AS tobevaccinated FROM tbl_vaccinebooked WHERE vaccinebookedStatus=1";
if($result3=$conn->query($sel3))
{
    if($result3->num_rows>0)
    {
        while($row=$result3->fetch_array())
        {
            $tobevaccinated=$row["tobevaccinated"];
        }
        //$result->free();
    }
}

$sel4="SELECT count(*) AS totalbookings FROM tbl_vaccinebooked";
if($result4=$conn->query($sel4))
{
    if($result4->num_rows>0)
    {
        while($row=$result4->fetch_array())
        {
            $totalbookings=$row["totalbookings"];
        }
        //$result->free();
    }
}

$vaccinatedpercentage= ($vaccinated/ $totalbookings)*100;
$notvaccinatedpercentage= ($notvaccinated/ $totalbookings)*100;
$tobevaccinatedpercentage= ($tobevaccinated/ $totalbookings)*100;


 
$dataPoints = array( 
	array("label"=>"Vaccinated", "y"=>$vaccinatedpercentage),
	array("label"=>"Not vaccinated", "y"=>$notvaccinatedpercentage),
	array("label"=>"Vaccine to be given", "y"=>$tobevaccinatedpercentage),
	//array("label"=>"Safari", "y"=>6.08),
	//array("label"=>"Edge", "y"=>4.29),
	//array("label"=>"Others", "y"=>4.59)
)
 
?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() {
 
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title: {
		text: "Vaccination Data"
	},
	subtitles: [{
		text: ""
	}],
	data: [{
		type: "pie",
		yValueFormatString: "#,##0.00\"%\"",
		indexLabel: "{label} ({y})",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>