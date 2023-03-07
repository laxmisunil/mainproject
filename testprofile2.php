<?Php
$t1=$_POST['t1'];

$t1=urlencode($t1);
header ("Location: testrefreshprofile.php?t1v=$t1"); 
?>