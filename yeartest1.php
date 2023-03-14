<?php

include "connection.php";


$sel="SELECT orderDate FROM tbl_order";
if($result=$conn->query($sel))
{
    if($result->num_rows>0)
    {
        while($row=$result->fetch_array())
        {
            $orderDate=$row["orderDate"];
            $yeartaken=explode("-",$orderDate);
            $year=$yeartaken[0];
            echo $year."<br>";
            
            $sel3="SELECT tbl1.orderDate,tbl1.orderID,tbl2.order_ID,sum(tbl2.productQuantity) AS productQuantity FROM tbl_order AS tbl1 INNER JOIN tbl_orderitems AS tbl2 GROUP BY tbl1.orderDate '[LIKE $year%]'";
            if($result3=$conn->query($sel3))
            {
                if($result3->num_rows>0)
                {
                    while($row3=$result3->fetch_array())
                    {
                        $orderdate=$row["orderDate"];
                        echo $orderdate;
                        //echo $orderdate;
                    }
                }
            }
            /*$sel2="SELECT (CASE WHEN orderDate LIKE $year%' THEN $year END) as plan_grp,COUNT(*) FROM tbl_order GROUP by (CASE WHEN orderDate LIKE $year% THEN $year END)";
            
            if($result2=$conn->query($sel2))
            {
{
    if($result2->num_rows>0)
    {
        while($row=$result2->fetch_array())
        {
           $data=$row["plan_grp"];
           echo $data;
           
        }

        
        
        }
        //$result->free();
    }*/
}
    }
}





?>