<?php
include "connection.php";
  if(isset($_POST["togbutton"]))
  {
    $vaccinebookedID=$_GET["vaccinebookedID"];
    $sel="SELECT vaccinebookedStatus fROM tbl_vaccinebooked WHERE vaccinebookedID='$vaccinebookedID'";
    if ($result=$conn->query($sel))
    {
          if($result->num_rows>0)
          {
            while($row=$result->fetch_array())
            {
              $vaccinebookedStatus=$row["vaccinebookedStatus"];
            }
            $result->free();
          }
          else
          {
            echo "No Records";
          }

    }
    if($vaccinebookedStatus==1)
    {
      $updata="UPDATE tbl_vaccinebooked SET vaccinebookedStatus=0 WHERE vaccinebookedID='$vaccinebookedID'";
    }
    else if($vaccinebookedStatus==0)
    {
      $updata="UPDATE tbl_vaccinebooked SET vaccinebookedStatus=1 WHERE vaccinebookedID='$vaccinebookedID'";
    }

try
{
    if($conn->query($updata)===true)
   
    header("location:vaccinecentrehome.php#today");
    
   
   echo "Profile Updated";
}
catch(Exception)
{
    echo "ERROR";
} 

}


?>