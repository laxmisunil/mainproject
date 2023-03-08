<?php
$sel="SELECT * FROM tbl_userdetails";
if($result=$conn->query($sel))
{
    if($result->num_rows>0)
    {
        while($row=$result->fetch_array())
        {

        }
        $result->free();
    }
}

?>