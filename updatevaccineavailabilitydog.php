<?php
include "connection.php";
  if(isset($_POST["togbutton"]))
  {
    $vaccineID=$_GET["vaccineID"];
    $sel="SELECT vaccineStatus fROM tbl_vaccinedetails WHERE vaccineID='$vaccineID'";
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
      $updata="UPDATE tbl_vaccinedetails SET vaccineStatus=0 WHERE vaccineID='$vaccineID'";
    }
    else if($vaccineStatus==0)
    {
      $updata="UPDATE tbl_vaccinedetails SET vaccineStatus=1 WHERE vaccineID='$vaccineID'";
    }

try
{
    if($conn->query($updata)===true);
    header("location:vaccinelist.php#dog");
    

}
catch(Exception)
{
    echo "ERROR";
} 

}


?>