<?php
include "connection.php";
session_start();
if(isset($_POST["addvaccine"]))
{
$vaccinefor=$_POST["pet"];
$vaccinename=$_POST["vaccinename"];
$dose=$_POST["dose"];

$booster=$_POST["booster"];


$comments=$_POST["comments"];
$availability=$_POST["availability"];


$query="SELECT count(*) as countrow FROM tbl_vaccinedetails WHERE vaccineFor='$vaccinefor' AND vaccineName='$vaccinename'";
$result = mysqli_query($conn,$query);
if(mysqli_num_rows($result))
{
    $row = mysqli_fetch_array($result);
    $count = $row['countrow'];
    if($count > 0)
    {
        header("location:addnewvaccine.php?status1=1");

    }
    else
    {
        $data="INSERT INTO tbl_vaccinedetails VALUES (NULL,'$vaccinename','$vaccinefor','$dose','$booster','$comments','$availability',1)";
try
{
    if($conn->query($data)===true);
   // echo "Product Added SUCCESSFULLY!";
    header("location:vaccinelist.php?status2=2");
}
catch(Exception)
{
    echo mysqli_error($conn);
}         
        }      }  }
?>