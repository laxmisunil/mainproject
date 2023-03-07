<?php  
 function fetch_data()  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "pawsownindia"); 
     
      $sql = "SELECT * FROM tbl_userdetails WHERE userRole='Customer' ORDER BY userStatus"; 

      $result = mysqli_query($connect, $sql);
      $i=0;  
     
      while($row = mysqli_fetch_array($result))  
      {       
        $i++;
        if($row["userStatus"]==1)
        {
            $output .= '<tr>  
            <td>'.$i.'</td> 
            <td>'.$row["userName"].'</td> 
            <td>'.$row["userEmail"].'</td> 
            <td>'.$row["userPhone"].'</td> 
            <td><font color="green">ACTIVE</font></td>         
              </tr>  '; 

        }
        else if($row["userStatus"]==2)
        {
            $output .= '<tr>  
            <td>'.$i.'</td> 
            <td>'.$row["userName"].'</td> 
            <td>'.$row["userEmail"].'</td> 
            <td>'.$row["userPhone"].'</td> 
            <td><font color="grey">A/C DELETED</font></td>         
              </tr>  '; 

        }
        else
        {
            $output .= '<tr>  
            <td>'.$i.'</td> 
            <td>'.$row["userName"].'</td> 
            <td>'.$row["userEmail"].'</td> 
            <td>'.$row["userPhone"].'</td> 
            <td><font color="red">BLOCKED</font></td>         
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
      $obj_pdf->SetTitle("Customers List");  
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
      <h3 align="center">Customers List</h3><br /><br />  
      <table border="1" cellspacing="0" cellpadding="5">  
           <tr>  
           <th width="6%"><b>Sl No.</b></th>  
        
           <th width="25%"><b>Name</b></th>  
           <th width="37%"><b>Email ID</b></th>  
           <th width="17%"><b>Phone</b></th>  
           <th width="18%"><b>Status</b></th> 
           </tr>  
      ';  
      $content .= fetch_data();  
      $content .= '</table>';  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('customerslist.pdf', 'I');  
 }  
 ?>  