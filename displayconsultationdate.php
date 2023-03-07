<?php
include "connection.php";
session_start();
$sel="SELECT consultationDate FROM tbl_appointmentdetails";
if ($result=$conn->query($sel))
{
    if($result->num_rows>0)
    {
        while($row=$result->fetch_array())
                {
                    echo $row["consultationDate"];
                    $date=$row["consultationDate"];
                    echo "<br>";
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
<?php 
                    $sel="SELECT consultationTime FROM tbl_appointmentdetails WHERE consultationDate='$date'";
                    if ($result=$conn->query($sel))
                    {
                        if($result->num_rows>0)
                        {
                            while($row=$result->fetch_array())
                            {
                                $time=$row["consultationTime"];    
                                echo $time;    
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
