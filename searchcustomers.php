<html>
  
    <div>
        <table>
            <?php
            include "connection.php";
            if(isset($_POST["submit"]))
            {
                $search=$_POST["search"];

                //$data="SELECT * FROM tbl_userdetails WHERE userID='$search' OR userName='$search' OR userEmail='$search' OR userStatus='$search'";
                $data="SELECT * FROM tbl_userdetails WHERE userName LIKE '$search%' OR userName='$search'";
                if ($result=$conn->query($data))
{
    ?>
    <table>
<tr id="tr1">
 
    <th style="background-color:Silver">Name</th>
    <th style="background-color:Silver">Email</th>
  
   
    <th style="background-color:Silver">Phone</th>
    <th style="background-color:Silver">Status</th>
        
</tr>
    <?php
    if($result->num_rows>0)
    {
        while($row=$result->fetch_array())
        {?>
        <tr>
            <td><?php echo $row["userName"] ?></td>
            <td><?php echo $row["userEmail"] ?></td>
            <td><?php echo $row["userPhone"] ?></td>
            <td><?php if($row["userStatus"]==1){echo "ACTIVE";}else{echo "INACTIVE";} ?></td>
        </tr>
          
        <?php
        }
                       
        $result->free();
    }
    else
    {
        echo "<tr><td colspan='7' style='color:gray'><center>No matches found.</td><tr>";
    }
}
else
{

echo "ERROR";

}    
            


}?>
        <tr>
            <td>
          



        </tr>
        </table>

    </div>
</html>