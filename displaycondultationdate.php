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
                }
                $result->free();
            }
            else
            {
                echo "No Records";
            }S
        }
        else
        {
            echo "ERROR";
        }
?> 
