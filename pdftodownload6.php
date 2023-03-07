<?php  

 function fetch_data()  
 {  
    $petID=$_GET["petID"];
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "pawsownindia"); 
     
      $sql = "SELECT tbl1.*,tbl2.*,tbl4.petID,MAX(tbl4.consultationDate) AS lastConsultation,MAX(tbl3.vaccinatedDate) AS lastVaccination FROM tbl_pet AS tbl1 INNER JOIN tbl_userdetails AS tbl2 ON tbl1.customerID=tbl2.userID INNER JOIN tbl_vaccinebooked AS tbl3 ON tbl3.petID=tbl1.petID INNER JOIN tbl_appointmentdetails AS tbl4 ON tbl1.petID=tbl4.petID WHERE tbl1.petID=$petID"; 

      $result = mysqli_query($connect, $sql);
      $i=0;  
     
      while($row = mysqli_fetch_array($result))  
      {       
        $i++;

        
      
      $output .= '<tr><th width="24%"><b>Pet Name</b></th><td width="77%">'.$row["petName"].'</td></tr>  
      <tr><th><b>License Number</b></th><td>'.$row["petLicenseNumber"].'</td></tr>
      <tr><th><b>Species</b></th><td>'.$row["petSpecies"].'</td></tr>  
      <tr><th><b>Breed</b></th><td>'.$row["petBreed"].'</td></tr>
      <tr><th><b>Gender</b></th><td>'.$row["petGender"].'</td></tr>
      <tr><th><b>Age</b></th><td>'.$row["petAge"].' months</td></tr>
      <tr><th><b>Last vaccinated on </b></th><td>'.$row["lastVaccination"].'</td></tr>
      <tr><th><b>Last consulted on </b></th><td>'.$row["lastConsultation"].'</td></tr>
      <tr><th><b>Owner Name</b></th><td>'.$row["userName"].'</td></tr>
      <tr><th><b>Phone</b></th><td>'.$row["userPhone"].'</td></tr>
      <tr><th><b>Email ID</b></th><td>'.$row["userEmail"].'</td></tr>
      <tr><th><b>Address</b></th><td>'.$row["userHousename"].' '.$row["userPostOffice"].' '.$row["userTown"].' '.$row["userPincode"].'</td></tr>
                          '; 
                         

      }  
      return $output;  
    
 }  
 if(isset($_POST["create_pdf"]))  
 {  
      require_once('tcpdf/tcpdf.php');  
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("Pet Details");  
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
      <h3 align="center">Pet Details</h3><br /><br />  
      <table border="1" cellspacing="0" cellpadding="5">  
            
      ';  
      $content .= fetch_data();  
      $content .= '</table>';  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('petdetails.pdf', 'I');  
 }  
 ?>  