<?php
include "connection.php";
$date=date('Y-m-d');
  if(isset($_POST["togbutton"]))
  {
    $vaccinebookedID=$_GET["vaccinebookedID"];
    $sel="SELECT vaccinebookedStatus fROM tbl_vaccinebooked WHERE vaccinebookedID='$vaccinebookedID' AND vaccinebookedStatus!=0";
    if ($result=$conn->query($sel))
    {
          if($result->num_rows>0)
          {
            while($row=$result->fetch_array())
            {
              $vaccinebookedStatus=$row["vaccinebookedStatus"];
            }
           // $result->free();
          }
          else
          {
            echo "No Records";
          }

    }
    if($vaccinebookedStatus==2)
    {
      $updata="UPDATE tbl_vaccinebooked SET vaccinebookedStatus=0,vaccinatedDate=NULL WHERE vaccinebookedID='$vaccinebookedID'";
    }
    else if($vaccinebookedStatus==0)
    {
      $updata="UPDATE tbl_vaccinebooked SET vaccinebookedStatus=2,vaccinatedDate='$date' WHERE vaccinebookedID='$vaccinebookedID'";
    }
    

try
{
    if($conn->query($updata)===true)
   
    header("location:vaccinecentrehome.php#yesterday");
    
   
   echo "Profile Updated";
}
catch(Exception)
{
    echo "ERROR";
} 

}



?>