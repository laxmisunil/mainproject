<?php
include "connection.php";

if(isset($_POST['petlicense'])){

   $petlicense = mysqli_real_escape_string($conn,$_POST['petlicense']);

   $query = "select count(*) as cntUser from tbl_pet where petLicenseNumber='".$petlicense."' and petStatus!=0";

   $result = mysqli_query($conn,$query);
   $response = "<span style='color: green;text-align:left'></span>";
   if(mysqli_num_rows($result)){
      $row = mysqli_fetch_array($result);

      $count = $row['cntUser'];
    
      if($count > 0){
          $response = "<span style='color: red;text-align:left'>&nbsp;Pet already registered.</span>";
      }
      else
      {
         $response = "<span style='color: green;text-align:left'></span>";
      }
   
   }

   echo $response;
   die;
}