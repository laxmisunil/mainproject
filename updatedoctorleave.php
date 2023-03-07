<?php
include "connection.php";
 
    $appointmentID=$_GET["appointmentID"];
    $sel="SELECT appointmentStatus FROM tbl_appointmentdetails WHERE appointmentID='$appointmentID'";
    if ($result=$conn->query($sel))
    {
          if($result->num_rows>0)
          {
            while($row=$result->fetch_array())
            {
              $appointmentStatus=$row["appointmentStatus"];
            }
            //$result->free();
          }
          else
          {
            echo "No Records";
          }

    }
    if($appointmentStatus==1)
    {
      $updata="UPDATE tbl_appointmentdetails SET appointmentStatus=0 WHERE appointmentID='$appointmentID'";
    }
    else if($appointmentStatus==0)
    {
      $updata="UPDATE tbl_appointmentdetails SET appointmentStatus=1 WHERE appointmentID='$appointmentID'";
    }

try
{
    if($conn->query($updata)===true);
    header("location:upcomingappointments.php");
    

}
catch(Exception)
{
    echo "ERROR";
} 


?>