<?php
include "connection.php";
session_start();
if(isset($_POST["submitpetdetails"]))
{
$userID=$_GET["userID"];
$petname=$_POST["petname"];
$petlicense=$_POST["petlicense"];
$petage=$_POST["petage"];

$species=$_POST["species"];
$breed=$_POST["breed"];

$gender=$_POST["gender"];
$color=$_POST["color"];

$animalimage=$_FILES["animalimage"]["name"];
move_uploaded_file($_FILES["animalimage"]["tmp_name"],"fileuploads/".$animalimage);


$query="SELECT count(*) as countrow FROM tbl_pet WHERE customerID='$userID' AND petLicenseNumber='$petlicense' AND petStatus=1";
$result = mysqli_query($conn,$query);
if(mysqli_num_rows($result))
{
    $row = mysqli_fetch_array($result);
    $count = $row['countrow'];
    if($count > 0)
    {
        header("location:registeryourpet.php?status=1");

    }

    else
    {
        $data="INSERT INTO tbl_pet VALUES (NULL,'$userID','$petname','$petlicense','$species','$breed','$petage','$gender','$color','$animalimage',1)";
try
{
    if($conn->query($data)===true);
    echo "Product Added SUCCESSFULLY!";
    header("location:mypets.php?status=1");
}
catch(Exception)
{
    echo "ERROR";
}         
    }
        }      }  
?>