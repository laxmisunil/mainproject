<?php

include "connection.php";

$quantity=$_POST["quantity"];
$cartID=$_POST["cartID"];
//$stockID=$_POST["stockID"];


$sel2="SELECT tbl1.*,tbl2.* FROM tbl_cart AS tbl1 INNER JOIN tbl_stock AS tbl2 ON tbl1.stockID=tbl2.stockID WHERE tbl1.cartID='$cartID'";
if($result2=$conn->query($sel2))
{
    if($result2->num_rows>0)
    {
        while($row=$result2->fetch_array())
        {
            $productstock=$row["productStock"];

            if($quantity<$productstock)
            {
                $addquantity="UPDATE tbl_cart SET productCount=$quantity+1 WHERE cartID=$cartID";

                if($conn->query($addquantity)===true);
                echo "Updated Successfully!";

                $result=$quantity;

                echo $result;
        
            }
            else
            {
              
                $result="outofstock";
                echo $result;

                /*$addquantity="UPDATE tbl_cart SET productCount=$quantity WHERE cartID=$cartID";

                if($conn->query($addquantity)===true);
                echo "Updated Successfully!";
                
*/
            }
        }
        $result2->free();
    }
}


//echo $cartID;

       

//echo $quantity."<br>";
//echo $cartID;
// echo "Success";
 ?>