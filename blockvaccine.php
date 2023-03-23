<?php
include "connection.php";
  
    $vaccineID=$_GET["vaccineName"];
    $sel="SELECT vaccineStatus fROM tbl_vaccinedetails WHERE vaccineName='$vaccineID'";
    if ($result=$conn->query($sel))
    {
          if($result->num_rows>0)
          {
            while($row=$result->fetch_array())
            {
              $vaccineStatus=$row["vaccineStatus"];
            }
            //$result->free();
          }
          else
          {
            echo "No Records";
          }

    }
    if($vaccineStatus==1)
    {
      $updata="UPDATE tbl_vaccinedetails SET vaccineStatus=0 WHERE vaccineName='$vaccineID'";
    }
    else if($vaccineStatus==0)
    {
      $updata="UPDATE tbl_vaccinedetails SET vaccineStatus=1 WHERE vaccineName='$vaccineID'";
    }

try
{
    if($conn->query($updata)===true);
    header("location:vaccinecentrehome.php");
    

}
catch(Exception)
{
    echo "ERROR";
} 

?>