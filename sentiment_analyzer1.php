<?php
include ('vendor/autoload.php');
use Sentiment\Analyzer;
$obj=new Analyzer();
$result=$obj->getSentiment("very good");
//echo "<pre>";
print_r($result);

$separatedsentiment2=implode(" ",$result);

$separatedsentiment=explode(" ",$separatedsentiment2);

echo $separatedsentiment[0]."<br>";
echo $separatedsentiment[1]."<br>";
echo $separatedsentiment[2]."<br>";
echo $separatedsentiment[3]."<br>";



?>