<?php
include "connection.php";
  if(isset($_POST["togbutton"]))
  {
    $userID=$_GET["userID"];
    $sel="SELECT userStatus fROM tbl_userdetails WHERE userID='$userID'";
    if ($result=$conn->query($sel))
    {
          if($result->num_rows>0)
          {
            while($row=$result->fetch_array())
            {
              $userStatus=$row["userStatus"];
            }
            $result->free();
          }
          else
          {
            echo "No Records";
          }

    }
    if($userStatus==1)
    {
      $updata="UPDATE tbl_userdetails SET userStatus=0 WHERE userID='$userID'";
    }
    else if($userStatus==0)
    {
      $updata="UPDATE tbl_userdetails SET userStatus=1 WHERE userID='$userID'";
    }

try
{
    if($conn->query($updata)===true)
   
    header("location:vaccinecentredetails.php");
    
   
   echo "Profile Updated";
}
catch(Exception)
{
    echo "ERROR";
} 

}


?>