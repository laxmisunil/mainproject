<?php

include "connection.php";

$quantity=$_POST["quantity"];
$cartID=$_POST["cartID"];

echo $quantity;
//echo $cartID;

$addquantity="UPDATE tbl_cart SET productCount=$quantity-1 WHERE cartID=$cartID";

if($conn->query($addquantity)===true);
echo "Updated Successfully!";

//echo $quantity."<br>";
//echo $cartID;
// echo "Success";
 ?>
