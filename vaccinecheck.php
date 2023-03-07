<?php
include "connection.php";

if(isset($_POST['vaccinename'])){

   $vaccinename = mysqli_real_escape_string($conn,$_POST['vaccinename']);
   $vaccinefor = mysqli_real_escape_string($conn,$_POST['vaccinefor']);

   $query = "select count(*) as cntUser from tbl_vaccinedetails where vaccineName='".$vaccinename."' and vaccineFor='".$vaccinefor."'";

   $result = mysqli_query($conn,$query);
   $response = "<div style='color: green;text-align:left'></div>";
   if(mysqli_num_rows($result)){
      $row = mysqli_fetch_array($result);

      $count = $row['cntUser'];
    
      if($count > 0){
          $response = "<div style='color: red;text-align:left'>&nbsp;Vaccine already added</div>";
      }
   
   }

   echo $response;
   die;
}