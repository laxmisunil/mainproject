<html>

    <style>
        body
            {
                font-size: 15px;
                font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            }
        table
            {
                border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
            }
            td,th
            {
                text-align: left;
  padding: 16px;
            }
           
     
            tr:nth-child(even) {
  background-color: #f2f2f2;
}
#div2
            {
                background-color:black;
                padding: 2px 10px 2px 10px;
                margin-top: 15px;
                font-weight: lighter;
                font-size: 27px;
                text-align: center;
                color:white;
            }
</style>
<body>
<div id="div2" >
            <h3>Customer Feedbacks</h3>
        </div>
<?php
include "connection.php";
$sel="SELECT * from tbl_feedback";
if ($result=$conn->query($sel))
{
    if($result->num_rows>0)
    {
        
        ?>
<table>
                <tr id="tr1">
                    <th>Feedback ID</th>
                    <th>Customer Name </th>
                    <th>Customer Email</th>
                    <th>Customer Feedback</th>
                    
                </tr>

                <?php 
                while($row=$result->fetch_array())
                {
                ?>
                <tr>
                    <td><?php echo $row["feedbackID"] ?></td>
                    <td><?php echo $row["customerName"] ?></td>
                    <td><?php echo $row["customerEmail"] ?></td>
                    <td><?php echo $row["customerFeedback"] ?></td>
                   
                </tr> 
                <?php }
                while($row=$result->fetch_array())
                {
                ?>   
                <tr>
                    <td><?php echo $row["feedbackID"] ?></td>
                    <td><?php echo $row["customerName"] ?></td>
                    <td><?php echo $row["customerEmail"] ?></td>
                    <td><?php echo $row["customerFeedback"] ?></td> 
                </tr>     
</table>
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
                
                
                ?>

</body>


</html>