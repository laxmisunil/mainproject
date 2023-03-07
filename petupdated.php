<?php
include "connection.php";
session_start();

$userID=$_SESSION["loginID"];

if(isset($_POST["submitpetdetails"]))
{
    $petID=$_GET["petID"];
    $petname=$_POST["petname"];
    $petlicense=$_POST["petlicense"];
    $petage=$_POST["petage"];

    $animalimage=$_FILES["animalimage"]["name"];

    $oldanimalimage="SELECT petImage FROM tbl_pet WHERE petID='$petID'";
if ($result=$conn->query($oldanimalimage))
{
    if($result->num_rows>0)
    {
        while($row=$result->fetch_array())
        {
            $oldanimalimage=$row["petImage"];  
        }
                
        //$result->free();
    }
    else
    {
        echo "No Records";
    }
}
else
{

echo "ERROR";

}  

    
if($animalimage!="") {  
    move_uploaded_file($_FILES["animalimage"]["tmp_name"],"fileuploads/".$animalimage);
    }
    else 
    {  
        $animalimage=$oldanimalimage; 
    }

$updata="UPDATE tbl_pet SET petImage='$animalimage',petName='$petname',petLicenseNumber='$petlicense',petAge='$petage' WHERE petID='$petID'";

try
{
    if($conn->query($updata)===true);
    header("location:mypets.php?status=3");
}
catch(Exception)
{
    echo "ERROR";
}  
}
    else
    {
        echo "error";
    }

?>