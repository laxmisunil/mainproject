
<?php

include "connection.php";  
session_start();
$userID=$_SESSION["loginID"];
$sel="SELECT tbl2.*,tbl1.* FROM tbl_productdetails AS tbl2 INNER JOIN tbl_cart AS tbl1 ON tbl2.productID=tbl1.productID WHERE customerID='$userID'";
if ($result=$conn->query($sel))
{
if($result->num_rows>0)
{ 
?>
<div style="display:flex">
<table style="">
    <tr id="tr1">
        <th style="background-color:Silver">Sl No.</th>
        <th style="background-color:Silver;width:5cm;">Product</th>
        <th style="background-color:Silver;">Product Name</th>
        <th style="background-color:Silver;">Price</th>
        <th style="background-color:Silver;text-align:center">Quantity</th>
        <th style="background-color:Silver">Total</th>
        <th style="background-color:Silver"></th> 
    </tr>
    <?php 
    $i=0;
    $subtotal=0;
    while($row=$result->fetch_array())
    {
        $i++;
        $image=$row["productImage"];
    ?>

    <tr>   
        <td><?php echo $i ?></td>
        <td><img src='<?php echo $image ?>' width='40%' height='60%'></td>
        <td><?php echo $row["productName"] ?></td>
        <td><?php echo "₹ ".$row["productPrice"] ?></td>

        <?php $productquantity=$row["productQuantity"]?>
        <?php $total=$row["productPrice"]*$productquantity ?>

        <td><form id='myform' method='POST' class='quantity' action='#'>
        <input type='button' id="minus" value='-' class='qtyminus minus' field='quantity' />
        <input type='text' name='quantity' id="quantity"value='<?php echo $productquantity?>' class='qty' />
        <input type='button' id="plus" value='+' class='qtyplus plus' field='quantity' />
        </form>
    </td>
       
        <td><?php echo "₹ ".$total ?></td>
        <?php $subtotal=$subtotal+$total; ?>
        <td style="text-align:center;width:9%"><abbr title="Remove from cart"><a href="removefromcart.php?cartid=<?php echo $row["cartID"]?>"><img src="removefromcart.png" style="width:45%"></a></abbr></td>
    </tr> 

  
    <?php 
  
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
//echo $subtotal;
?> 