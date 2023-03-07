<?php
include "connection.php";

session_start();

$scheduleID=$_GET["scheduleID"];
$scheduledescription=$_POST["scheduledescription"];

$updateschedule="UPDATE tbl_petschedule SET scheduleDescription='$scheduledescription' WHERE scheduleID='$scheduleID' AND scheduleStatus=1";
try
{
    if($conn->query($updateschedule)===true)
    header("location:addedschedules.php?status4=4");
   
    //echo "Profile Updated";
}
catch(Exception)
{
    echo "ERROR";
}         
        


?>



//
<script>
        
    


</script>