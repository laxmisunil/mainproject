<?php
include "connection.php";
session_start();
if(isset($_POST["addmissing"]))
{
$userID=$_GET["userID"];
$missinganimalname=$_POST["petname"];


$missinganimalspecies=$_POST["species"];
$missinganimalbreed=$_POST["breed"];


$beltcolor=$_POST["beltcolor"];
$animalcolor=$_POST["animalcolor"];
$animalimage=$_FILES["animalimage"]["name"];
$missingfrom=$_POST["missingfrom"];
$lastseenat=$_POST["lastseenat"];
$customeremail=$_POST["email"];
$customerphone=$_POST["phone"];
$customeraddress=$_POST["address"];
$customerpincode=$_POST["custpincode"];
$postedon=date("Y-m-d");
move_uploaded_file($_FILES["animalimage"]["tmp_name"],"fileuploads/".$animalimage);

$data="INSERT INTO tbl_lostandfound VALUES (NULL,'$userID',NULL,'$missinganimalname','$missinganimalspecies','$missinganimalbreed','$beltcolor','$animalcolor','$animalimage','$missingfrom','$lastseenat','$customeremail','$customerphone','$customeraddress','$customerpincode','$postedon',1)";
try
{
    if($conn->query($data)===true);
    echo "Product Added SUCCESSFULLY!";
    header("location:lostandfound.php?status=1");
}
catch(Exception)
{
    echo "ERROR";
}         
}  
?>