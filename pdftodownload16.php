<?php  
 function fetch_data()  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "pawsownindia"); 
      
      $date=date('Y-m-d');

     
      $sql = "SELECT tbl1.*,tbl2.*,SUM(tbl3.productQuantity) AS totalQuantity, SUM(tbl3.productOrderPrice) AS totalPrice FROM tbl_order  AS tbl1 INNER JOIN tbl_userdetails AS tbl2 ON tbl1.customerID=tbl2.userID INNER JOIN tbl_orderitems AS tbl3 ON tbl3.order_ID=tbl1.orderID GROUP BY tbl3.order_ID ORDER BY tbl1.orderDate DESC"; 

      $result = mysqli_query($connect, $sql);
      $i=0;  
     
      while($row = mysqli_fetch_array($result))  
      {       
        $i++;
        if($row["orderStatus"]==0)
        {
            $output .= '<tr>  
            <td>'.$i.'</td> 
            <td>'.$row["userName"].'</td>  
            <td>'.$row["orderDate"].'</td> 
            <td>'.$row["userHousename"].'</td>
            <td>'.$row["totalQuantity"].'</td>
        
            <td><font color="red">CANCELLED</font></td>         
              </tr>  '; 

        }
        else if($row["orderStatus"]==1)
        {
            $output .= '<tr>  
            <td>'.$i.'</td> 
            <td>'.$row["userName"].'</td>  
            <td>'.$row["orderDate"].'</td> 
            <td>'.$row["userHousename"]." ".$row["userPostOffice"]."<br>".$row["userLocality"]." ".$row["userPincode"].'</td>
            <td>'.$row["totalQuantity"].'</td>
         
            <td><font color="grey">YET TO BE SHIPPED</font></td>         
              </tr>  '; 

        }
        else if($row["orderStatus"]==2)
        {
            $output .= '<tr>  
            <td>'.$i.'</td> 
            <td>'.$row["userName"].'</td>  
            <td>'.$row["orderDate"].'</td> 
            <td>'.$row["userHousename"]." ".$row["userPostOffice"]."<br>".$row["userLocality"]." ".$row["userPincode"].'</td>
            <td>'.$row["totalQuantity"].'</td>
         
            <td><font color="royalblue">SHIPPED</font></td>         
              </tr>  '; 

        }
        else if($row["orderStatus"]==3)
        {
            $output .= '<tr>  
            <td>'.$i.'</td> 
            <td>'.$row["userName"].'</td>  
            <td>'.$row["orderDate"].'</td> 
            <td>'.$row["userHousename"]." ".$row["userPostOffice"]."<br>".$row["userLocality"]." ".$row["userPincode"].'</td>
            <td>'.$row["totalQuantity"].'</td>
         
            <td><font color="green">DELIVERED</font></td>         
              </tr>  '; 

        }
                     

      }  
      return $output;  
    
 }  
 if(isset($_POST["create_pdf"]))  
 {  
      require_once('tcpdf/tcpdf.php');  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("Order Report");  
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
      $obj_pdf->SetDefaultMonospacedFont('helvetica');  
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);  
      $obj_pdf->setPrintHeader(false);  
      $obj_pdf->setPrintFooter(false);  
      $obj_pdf->SetAutoPageBreak(TRUE, 10);  
      $obj_pdf->SetFont('helvetica', '', 12);  
      $obj_pdf->AddPage();  
      $content = '';  
      $content .= '  
      <table><tr><td width="42%"></td><td><img align="center" width="600%" src="logofinal.png"></td><td width="24%"></td></tr></table>
      <h3 align="center">Order Report</h3><br /><br />  
      <table border="1" cellspacing="0" cellpadding="5">  
           <tr>  
           <th width="6%"><b>No.</b></th> 
           <th width="20%"><b>Customer Name</b></th>
           <th width="15%"><b>Order Date</b></th>     
           <th width="20%"><b>Delivery Address</b></th> 
           <th width="9%"><b>No.s</b></th> 
      
         
         
           <th width="28%"><b>Status</b></th> 
           </tr>  
      ';  
      $content .= fetch_data();  
      $content .= '</table>';  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('consultationreport.pdf', 'I');  
 }  
 ?>  