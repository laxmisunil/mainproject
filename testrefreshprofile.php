<?Php

$t1v=$_GET['t1v'];
$t1v=urldecode($t1v);
 
echo "
<form method=post action=testprofile2.php>
<input type=text name=t1 value='$t1v'>
<input type=submit value=Submit>
";
?>