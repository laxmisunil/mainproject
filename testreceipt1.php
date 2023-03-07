<?php
include "connection.php";
//$myorders="SELECT tbl2.*,tbl1.*,tbl3.productPrice,tbl3.productMeasure,tbl3.productQuantity AS proQuantity,sum(tbl3.productPrice) AS totalPrice FROM tbl_productdetails AS tbl2 INNER JOIN tbl_orderitems AS tbl1 ON tbl2.productID=tbl1.productID INNER JOIN tbl_stock AS tbl3 ON tbl3.stockID=tbl1.stockID WHERE tbl1.order_ID=56";
    //SELECT tbl2.*,tbl1.*,sum(tbl3.productPrice) AS totalPrice FROM tbl_stock AS tbl3 INNER JOIN tbl_productdetails AS tbl2 ON tbl2.productID=tbl3.productID INNER JOIN tbl_orderitems AS tbl1 ON tbl1.productID=tbl2.productID WHERE tbl1.order_ID=$orderID
    
    $myorders="SELECT tbl2.*,tbl1.*,tbl3.productPrice,tbl3.productMeasure,tbl3.productQuantity AS productQuantity,sum(tbl3.productPrice) AS totalPrice FROM tbl_productdetails AS tbl2 INNER JOIN tbl_orderitems AS tbl1 ON tbl2.productID=tbl1.productID INNER JOIN tbl_stock AS tbl3 ON tbl3.stockID=tbl1.stockID WHERE tbl1.order_ID=56";
    if ($result=$conn->query($myorders))
    {
        if($result->num_rows>0)
        { 
        ?>
      
        
            <?php 
            $i=0;
            $subtotal=0;
            ?>
            <div class="receipt">
            <header class="receipt__header">
              <img src="logofinal.png" width="30%">
            <p class="receipt__title">Receipt</p>
           
            </header>
            <table>
              <tr>
                <th style="color:chocolate;text-align:left">Product</th>
                <th></th><th></th><th></th>
                <th style="color:chocolate">Price</th>
                <th></th><th></th><th></th><th></th>
                <th style="color:chocolate">Nos</th>
                <th></th><th></th>
                <th style="color:chocolate">Subtotal</th>
              </tr>
            <?php
            $grandtotal=0;
            while($row=$result->fetch_array())
            {
              
               ?>
                          
                              <tr>
                                <td><?php echo $row["productName"];?><td>
                                  <td></td> <td></td>
                                 
                                  
              
                            <?php
                            //$grandtotal=$grandtotal+($row["productPrice"]*$row["productQuantity"]);
                            // $subtotal=$subtotal+$productPrice; 
                            }
                          
                       
        }
    }
        
    ?> 