<?php
include "connection.php";
include ('vendor/autoload.php');
use Sentiment\Analyzer;
$obj=new Analyzer();


$sel="SELECT * FROM tbl_feedback";
if($result2=$conn->query($sel))
{
    if($result2->num_rows>0)
    {
        while ($row = $result2 -> fetch_array())
        {
            $feedback=$row["customerFeedback"];
            echo $feedback;

            $result=$obj->getSentiment($feedback);
//echo "<pre>";
print_r($result);

$separatedsentiment2=implode(" ",$result);

$separatedsentiment=explode(" ",$separatedsentiment2);

echo $separatedsentiment[0]."<br>";
echo $separatedsentiment[1]."<br>";
echo $separatedsentiment[2]."<br>";
echo $separatedsentiment[3]."<br>";
echo "__________________";


        }
        //$result->free();
    }
}





?>