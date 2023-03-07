<?php
include "connection.php";
$date1=$_POST["date1"];
  $time=$_POST["time1"];

  $query=mysqli_query("SELECT * from tbl_appointmentdetails where consultationDate='$date1' AND consultationTime ='$time'");

  $find=mysqli_num_rows($query);

  echo $find;
  ?>
  <form action="#" method="POST">
    <input type="date" name="date1"><br>
    <input type="timepick" name="time1"><br>
    <input type="submit" value="SUBMIT">
  </form>