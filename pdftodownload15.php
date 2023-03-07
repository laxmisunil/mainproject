<?php  
 
    $petID=$_GET["petID"];

    
 function fetch_data()  
 {  
    $petID=$_GET["petID"];     
     $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "pawsownindia"); 
      
    

       
      $sql = "SELECT * FROM tbl_vaccinebooked WHERE petID=$petID AND vaccinebookedStatus=2"; 

      $result = mysqli_query($connect, $sql);
      $i=0;  
     
      while($row = mysqli_fetch_array($result))  
      {       
        $i++;

        
      
      $output .= '<tr><th colspan="2"><font color="goldenrod"><b>Sl No.'.$i.'</b></font></th></tr> 
      <tr><th ><b>Vaccine Name </b></th><td >'.$row["vaccineName"].'</td></tr>  
  
      <tr><th><b>Location</b></th><td>'.$row["houseName"]." ".$row["customerTown"]." ".$row["customerPincode"].'</td></tr>  
      <tr><th><b>Booked Date</b></th><td>'.$row["vaccineDate"].'</td></tr>
      <tr><th><b>Vaccinated Date</b></th><td>'.$row["vaccinatedDate"].'</td></tr>
   
      
                          '; 
                         

      }  
      return $output;  
    
 }  
 if(isset($_POST["create_pdf"]))  
 {  
      require_once('tcpdf/tcpdf.php'); 
      $connect = mysqli_connect("localhost", "root", "", "pawsownindia"); 
      $sel2="SELECT tbl1.*,tbl2.* FROM tbl_pet AS tbl1 INNER JOIN tbl_userdetails AS tbl2 ON tbl1.customerID=tbl2.userID WHERE petID=$petID";
      if($result2=$connect->query($sel2))
      {
          if($result2->num_rows>0)
          {
              while($row=$result2->fetch_array())
              {
                $username=$row["userName"];
                $userphone=$row["userPhone"];
                $useremail=$row["userEmail"];

                  $petname=$row["petName"];
                  $petlicense=$row["petLicenseNumber"];
                  $petspecies=$row["petSpecies"];
                  $petbreed=$row["petBreed"];
              //$result2->free();
          }
      }
  }
        
      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
      $obj_pdf->SetCreator(PDF_CREATOR);  
      $obj_pdf->SetTitle("Vaccination Details");  
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
      <h3 align="center">Pet Details</h3> 
      <h5 align="center">Name : '.$petname.'('.$petspecies.') - '.$petlicense.'</h5>
      <h5 align="center">Owner : '.$username.' ('.$userphone.'/ '.$useremail.')</h5><br /><br />  
      <table border="1" cellspacing="0" cellpadding="5">  
            
      ';  
      $content .= fetch_data();  
      $content .= '</table>';  
      $obj_pdf->writeHTML($content);  
      $obj_pdf->Output('petdetails.pdf', 'I');  
 }  
 ?>  