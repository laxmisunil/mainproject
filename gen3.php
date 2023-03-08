<?php
require "connection.php";
require('fpdf.php');
$pdf = new FPDF();
  
//Add a new page
/*if(isset($_POST["generate"]))
{
    $name=$_POST["name"];*/
$pdf->AddPage();
  
// Set the font for the text
/*$pdf->SetFont('Arial', 'B', 18);

$pdf->Cell(150,240,"<h1>Hello</h1>",4,5);
//$pdf->Cell(60,20,$name,1,1);


}*/

// Set font
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetDrawColor(0, 0, 0);
// Move to 8 cm to the right
$pdf->Cell(80);
// Centered text in a framed 20*10 mm cell and line break

$pdf->Cell(20, 10, "", 0, 0, 'C');
$pdf->Line(8, 35, 210-10, 35,8);
$pdf->SetLineWidth(10);

$appointmentID=$_GET["appointmentID"];

$sel="SELECT tbl2.*,tbl1.* FROM tbl_appointmentdetails AS tbl2 INNER JOIN tbl_pet AS tbl1 ON tbl2.petID=tbl1.petID AND tbl2.customerID=tbl1.customerID WHERE tbl2.appointmentID='$appointmentID'";
if($result=$conn->query($sel))
{
    if($result->num_rows>0)
    {
        while($row=$result->fetch_array())
        {
            $petname=$row["petName"];
            $prescription=$row["appointmentPrescription"];

        }
        //$result->free();
    }
}
$pdf->Cell(90, 20,"Paws' Own vet clinic", 0, 0, 'R');
$pdf->Cell(-100,20,"Paws' Own vet clinic");

$pdf->Image('logofinal.png',90,10,20,20);
$pdf->Cell(20, 80,"Petname : ",0,0,'L');
$pdf->Cell(5, 80,$petname,3,3);


// Prints a cell with given text 
//$pdf->Cell(60,20,'Hello GeeksforGeeks!');
$pdf->Output();
// return the generated output

?>