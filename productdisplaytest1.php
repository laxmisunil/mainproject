<?php 
include "connection.php";
$query = "SELECT * FROM tbl_productdetails WHERE productStatus=1";


    echo '<table width="960">';
    $i = 0; //first, i set a counter 
    if ($result=$conn->query($query))
{
    if($result->num_rows>0)
    {
        while($row=$result->fetch_array())
        {
        //counter is zero then we are start new row  
            if ($i==0)
            {
                echo '<tr>';
            }
            //here we creating normal cells <td></td>
            $image=$row["productImage"];
            $productname = $row['productName'];
            $productprice = $row['productPrice'];
            echo '<td>'."<img src='$image' width='70%' height='auto'>".'</td>';   
            //there is a magic - if our counter is greater then 5 we set counter to zero and close tr tag  
            if ($i>3){
                $i=0;
                echo '</tr>';
            };  
            $i++; //$i = $i + 1 - counter + 1
        }
        echo '</table>'; 
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
   
    ?>