<?php
include "connection.php";
if(isset($_POST["input"]))
{

                //$data="SELECT * FROM tbl_userdetails WHERE userID='$search' OR userName='$search' OR userEmail='$search' OR userStatus='$search'";
              $data="SELECT * FROM tbl_userdetails WHERE userName LIKE '$search%' OR userEmail LIKE '$search%'";
                if ($result=$conn->query($data))
                {
                  if($result->num_rows>0)
                  {
                    ?>
                    <table>
						
							<tr>
                          
                    <th>Customer Name </th>
                    <th>Customer Email</th>
                    <th>Customer Phone</th>
                    <th>Customer Status</th>
                    
							</tr>
						

                    <?php
                  while($row=$result->fetch_array())
                  {
                    ?>
                    <table>
                      <tr>
                    <td><?php echo $row["userName"] ?></td>
                    <td><?php echo $row["userEmail"] ?></td>
                    <td><?php echo $row["userPhone"] ?></td>
                    <td><?php if($row["userPhone"]==1){echo "ACTIVE";}else{echo "INACTIVE";} ?></td>

                      </tr>

                  </table>
                  
                    <?php
                    $username=$row["userName"];
                  
                }
                       
                $result->free();
            }
            else
            {
                echo "<tr><td colspan='7' style='color:gray'><center>No matches found.</td><tr>";
            }
        }
      }


?>