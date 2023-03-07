 
 <?php

 include "connection.php";

 $appointmentID=$_GET["appointmentID"];
 $prescription=$_POST["prescription"];
 $data="UPDATE tbl_appointmentdetails SET appointmentPrescription='$prescription' WHERE appointmentID='$appointmentID'";
try
{
    if($conn->query($data)===true);
    echo "Product Added SUCCESSFULLY!";
    header("location:vethistory.php?status2=2");
}
catch(Exception)
{
    echo mysqli_error($conn);
}    

 ?>
