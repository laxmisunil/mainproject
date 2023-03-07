 
 <?php

 include "connection.php";

 $appointmentID=$_GET["appointmentID"];
 $medicine=$_POST["medicine"];
 $prescription=$_POST["prescription"];
 $data="UPDATE tbl_appointmentdetails SET appointmentMedicine='$medicine',appointmentPrescription='$prescription' WHERE appointmentID='$appointmentID'";
try
{
    if($conn->query($data)===true);
    echo "Product Added SUCCESSFULLY!";
    header("location:vethistory.php?status1=1");
}
catch(Exception)
{
    echo mysqli_error($conn);
}    

 ?>
