<?php
include "connection.php";

if(isset($_POST['username'])){
   
   $username = mysqli_real_escape_string($conn,$_POST['username']);

   $query = "select count(*) as cntUser from tbl_userdetails where userPhone='".$username."' and userStatus=1";

   $result = mysqli_query($conn,$query);
   $response3 = "<div style='color: green;text-align:left'></div>";
   if(mysqli_num_rows($result)){
      $row = mysqli_fetch_array($result);

      $count = $row['cntUser'];
    
      if($count > 0){
          $response3 = "<div style='color: red;text-align:left'>&nbsp;Phone number already taken.</div>";
      }
   
   }

   echo $response3;
   die;
}