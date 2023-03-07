<?php  
 function fetch_data()  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "pawsownindia"); 
   
      $sql = "SELECT tbl1.*,tbl2.*,tbl3.* FROM tbl_vaccinebooked AS tbl1 INNER JOIN tbl_userdetails AS tbl2 ON tbl1.customerID=tbl2.userID INNER JOIN tbl_pet AS tbl3 ON tbl1.petID=tbl3.petID WHERE vaccinebookedStatus=2"; 

      $result = mysqli_query($connect, $sql);
      $i=0;
     
      while($row = mysqli_fetch_array($result))  
      {       
        $i++;
        $orderreddate= $row["vaccinatedDate"];
        $splittedordereddate=explode("-",$orderreddate);

        $year1=$splittedordereddate[0];
        $month1=$splittedordereddate[1];	
        $day1=$splittedordereddate[2];

        if($month1==01)
        {
            $monthinword="Jan";
        }
        elseif($month1==02)
        {
            $monthinword="Feb";
        }
        elseif($month1==03)
        {
            $monthinword="Mar";
        }
        elseif($month1==04)
        {
            $monthinword="Apr";
        }
        elseif($month1==05)
        {
            $monthinword="May";
        }
        elseif($month1==06)
        {
            $monthinword="Jun";
        }
        elseif($month1==07)
        {
            $monthinword="Jul";
        }
        elseif($month1=="08")
        {
            $monthinword="Aug";
        }
        elseif($month1=="09")
        {
            $monthinword="Sep";
        }
        elseif($month1==10)
        {
            $monthinword="Oct";
        }
        elseif($month1==11)
        {
            $monthinword="Nov";
        }
        elseif($month1==12)
        {
            $monthinword="Dec";
        }
      
      $output .= '<tr>  
                          <td>'.$i.'</td> 
                          <td>'.$monthinword." ".$day1.",".$year1.'</td> 
                       
                          <td>'.$row["petSpecies"].'</td>  
                          <td>'.$row["petLicenseNumber"].'</td>  
                          <td>'.$row["vaccineName"].'</td> 
                          <td>'.$row["userName"].'</td>   
                    
                          <td>'.$row["userPhone"].'</td> 
                        
                           
                     </tr>  
                          '; 
                        

      }  
      return $output;  
    
 }  
 if(isset($_POST["create_pdf"]))  
 {  
      require_once('tcpdf/tcpdf.php');  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("Vaccination Report");  
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
      <h3 align="center">Vaccination Report</h3><br /><br />  
      <table border="1" cellspacing="0" cellpadding="5">  
           <tr>  
           <th width="7%"><b>Sl No.</b></th>  
           <th width="16%"><b>Date</b></th>  
           <th width="12%"><b>Species</b></th>  
           <th width="17%"><b>License Number</b></th> 
           <th width="18%"><b>Vaccine</b></th> 
           <th width="18%"><b>Owner</b></th>  
           <th width="16%"><b>Phone</b></th> 
         
           </tr>  
      ';  
      $content .= fetch_data();  
      $content .= '</table>';  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('orderreport.pdf', 'I');  
 }  
 ?>  