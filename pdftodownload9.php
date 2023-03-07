<?php  
 function fetch_data()  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "pawsownindia"); 
     
      $sql = "SELECT tbl1.*,tbl2.* FROM tbl_pet  AS tbl1 INNER JOIN tbl_userdetails AS tbl2 ON tbl1.customerID=tbl2.userID ORDER BY tbl1.petStatus DESC"; 

      $result = mysqli_query($connect, $sql);
      $i=0;  
     
      while($row = mysqli_fetch_array($result))  
      {       
        $i++;
        if($row["petStatus"]==1)
        {
            $output .= '<tr>  
            <td>'.$i.'</td> 
            <td>'.$row["petLicenseNumber"].'</td> 
            <td>'.$row["petName"].'</td> 
            <td>'.$row["petSpecies"].'</td> 
            <td>'.$row["userName"].'</td> 
            <td>'.$row["userPhone"].'</td> 
            <td>'.$row["userEmail"].'</td> 
            <td><font color="green">ACTIVE</font></td>         
              </tr>  '; 

        }
        else
        {
            $output .= '<tr>  
            <td>'.$i.'</td> 
            <td>'.$row["petLicenseNumber"].'</td> 
            <td>'.$row["petName"].'</td> 
            <td>'.$row["petSpecies"].'</td> 
            <td>'.$row["userName"].'</td> 
            <td>'.$row["userPhone"].'</td> 
            <td>'.$row["userEmail"].'</td>
            <td><font color="grey">INACTIVE</font></td>         
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
      $obj_pdf->SetTitle("Registered Pets");  
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
      <h3 align="center">Registered Pets</h3><br /><br />  
      <table border="1" cellspacing="0" cellpadding="5">  
           <tr>  
           <th width="6%"><b>Sl No.</b></th>  
        
           <th width="14%"><b>License Number</b></th>
           <th width="9%"><b>Pet Name</b></th>    
           <th width="11%"><b>Species</b></th>  
           <th width="17%"><b>Owner</b></th>  
           <th width="16%"><b>Phone</b></th>  
           <th width="17%"><b>Email</b></th>  
           <th width="14%"><b>Status</b></th> 
           </tr>  
      ';  
      $content .= fetch_data();  
      $content .= '</table>';  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('registeredpets.pdf', 'I');  
 }  
 ?>  