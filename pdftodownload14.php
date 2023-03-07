<?php  
 function fetch_data()  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "pawsownindia"); 
     
      $sql = "SELECT * FROM tbl_vaccinedetails"; 

      $result = mysqli_query($connect, $sql);
      $i=0;  
     
      while($row = mysqli_fetch_array($result))  
      {       
        $i++;
        if($row["vaccineStatus"]==1)
        {
            $output .= '<tr>  
            <td>'.$i.'</td> 
            <td>'.$row["vaccineName"].'</td>  
            <td>'.$row["vaccineFor"].'</td> 
            <td>'.$row["vaccineDose"].' per visit</td> 
            <td>Every '.$row["boosterRecommendation"].' years</td> 
            <td>'.$row["vaccineAvailability"].' in stock</td> 
      
            <td><font color="green">AVAILABLE</font></td>         
              </tr>  '; 

        }
        else
        {
            $output .= '<tr>  
            <td>'.$i.'</td> 
            <td>'.$row["vaccineName"].'</td>  
            <td>'.$row["vaccineFor"].'</td> 
            <td>'.$row["vaccineDose"].' per visit</td> 
            <td>Every '.$row["boosterRecommendation"].' years</td> 
            <td>'.$row["vaccineAvailability"].' in stock</td>  
        
            <td><font color="red">UNAVAILABLE</font></td>         
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
      $obj_pdf->SetTitle("Vaccine Details");  
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
      <h3 align="center">Vaccine Details</h3><br /><br />  
      <table border="1" cellspacing="0" cellpadding="5">  
           <tr>  
           <th width="6%"><b>No.</b></th> 
           <th width="20%"><b>Vaccine</b></th>
           <th width="11%"><b>For</b></th>     
           <th width="15%"><b>Dose</b></th> 
           <th width="15%"><b>Booster</b></th> 
           <th width="15%"><b>In stock</b></th>  
        
           <th width="20%"><b>Status</b></th> 
           </tr>  
      ';  
      $content .= fetch_data();  
      $content .= '</table>';  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('vaccinedetails.pdf', 'I');  
 }  
 ?>  