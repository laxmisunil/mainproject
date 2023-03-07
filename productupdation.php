<?php
include "connection.php";

session_start();

$productID=$_SESSION["productid"];
$newproductsubname=$_POST["prosubname"];
$newproductprice=$_POST["productprice"];
$newproductdescription=$_POST["productdescription"];
//$oldproductimage=$_GET["oldproductimage"];
$newproductimage=$_FILES["newproductimage"]["name"];
//cho $oldproductimage;

$oldproductimage="SELECT productImage FROM tbl_productdetails WHERE productID='$productID'";
if ($result=$conn->query($oldproductimage))
{
    if($result->num_rows>0)
    {
        while($row=$result->fetch_array())
        {
            $oldproductimage=$row["productImage"];  
        }
                
        $result->free();
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

if($newproductimage!="") {  
move_uploaded_file($_FILES["newproductimage"]["tmp_name"],"fileuploads/".$newproductimage);
}
else 
{  
    $newproductimage = $oldproductimage; 
}

$updateproduct="UPDATE tbl_productdetails SET productSubname='$newproductsubname',productPrice='$newproductprice',productDescription='$newproductdescription',productImage='$newproductimage' WHERE productID='$productID' AND productStatus=1";
try
{
    if($conn->query($updateproduct)===true)
    header("location:productlist.php?status2=2");
   
    //echo "Profile Updated";
}
catch(Exception)
{
    echo "ERROR";
}         
        


?>



//
<script>
        
    


</script>