<?php  

 function fetch_data()  
 {  
    $userID=$_GET["userID"];
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "pawsownindia"); 
     
      $sql = "SELECT tbl1.*,tbl2.*,tbl3.* FROM tbl_order AS tbl1 INNER JOIN tbl_orderitems AS tbl2 ON tbl1.orderID=tbl2.order_ID INNER JOIN tbl_productdetails AS tbl3 ON tbl2.productID=tbl3.productID WHERE customerID='$userID' AND orderStatus!=0"; 

      $result = mysqli_query($connect, $sql);
      $i=0;  
     
      while($row = mysqli_fetch_array($result))  
      {       
        $i++;

        
      
      $output .= '<tr>
      <td>'.$i.'</td>
      <td><img src="'.$row["productImage"].'"></td>
     <td>'.$row["productName"].'</td>
     <td>Rs.'.$row["productOrderPrice"].'</td>  
      <td>'.$row["productQuantity"].'</td>
     <td>'.$row["orderDate"].'</td>
      <td>'.$row["shippedDate"].'</td>
      <td>'.$row["deliveredDate"].'</td></tr>

      
                          '; 
                         

      }  
      return $output;  
    
 }  
 if(isset($_POST["create_pdf"]))  
 {  
      require_once('tcpdf/tcpdf.php');  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("Order Details");  
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
      <h3 align="center">Order Details</h3><br /><br />  
      <table border="1" cellspacing="0" cellpadding="5">  
      <tr>  
      <th width="7%"><b>Sl No.</b></th> 
      <th width="12%"><b>Image</b></th> 
      <th width="18%"><b>Name</b></th>  
      <th width="11%"><b>Price</b></th>  
      <th width="8%"><b>Nos</b></th> 
      <th width="16%"><b>Ordered On</b></th>
      <th width="16%"><b>Shipped On</b></th>
      <th width="17%"><b>Delivered On</b></th>
      </tr>
            
      ';  
      $content .= fetch_data();  
      $content .= '</table>';  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('orderdetails.pdf', 'I');  
 }  
 ?>  