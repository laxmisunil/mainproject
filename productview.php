<?php 
include "connection.php";
$sel="SELECT * FROM tbl_productdetails";
if ($result=$conn->query($sel))
{
    if($result->num_rows>0)
    {
        ?>
        
            <table>
                <tr id="tr1">
                  
                    <th>Product Name</th>
                    <th>Product Category</th>
                    <th>Product Price</th>
                    <th>Product Description</th>
                    <th>Products Image</th>
                    
                </tr>

                <?php 
             
                    while($row=$result->fetch_array())
                    {
                    
                ?>

                <tr>

                    <td><?php echo $row["productName"] ?></td>
                    <td><?php echo $row["productCategory"] ?></td>
                    <td><?php echo $row["productPrice"] ?></td>
                    <td><?php echo $row["productDescription"] ?></td>
                    <?php $image=$row["productImage"] ?>
                    <td><?php echo "<img src='$image' width='40%' text-align:'center'>" ?></td>
                                   
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