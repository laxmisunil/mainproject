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
$pdf->SetFont('Arial', 'B', 8);
$pdf->SetDrawColor(0, 0, 0);
// Move to 8 cm to the right
$pdf->Cell(80);
// Centered text in a framed 20*10 mm cell and line break

$pdf->Cell(90, 10, "", 0, 0, 'C');
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
            $concern=$row["concernAboutPet"];
            $medicine=$row["appointmentMedicine"];
            $prescription=$row["appointmentPrescription"];

        }
        //$result->free();
    }
}


$vetdetails="SELECT * FROM tbl_userdetails where userRole='Veterinarian'";
if($result2=$conn->query($vetdetails))
{
    if($result2->num_rows>0)
    {
        while($row=$result2->fetch_array())
        {
            $useremail=$row["userEmail"];
            $userphone=$row["userPhone"];

        }
        //$result->free();
    }
}



$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(-23,20,"", 0, 0,'R');
$pdf->Cell(2, 2.5, "", 2, 2,);

$pdf->Cell(23,30,$useremail);

$pdf->Cell(2, 4, "", 2, 2,);
$pdf->Cell(90,30,$userphone);

$pdf->Image('logofinal.png',95,10,20,20);
$pdf->Ln();

//$pdf->Cell(10, 80,"Petname : ",10,0,'R');
//$pdf->Cell(5, 80,$petname,3,3);


$pdf->Cell(10,30,"Pet Name : ".$petname,70,70);
$pdf->Cell(2, 2, "", 2, 2, 'L');
$pdf->Cell(10,-20,"Concern : ".$concern,70,70);
$pdf->Cell(2, 2, "", 2, 2, 'L');
if($medicine=='')
{
    $pdf->Cell(10,30,"Medicines : (No medicines added)",70,70);
}
else
{
    $pdf->Cell(10,30,"Medicines : ".$medicine,70,70);
}
$pdf->Cell(2, 2, "", 2, 2, 'L');

if($prescription=='')
{
    $pdf->Cell(10,-20,"Prescription : (No prescription added)");
}
else
{
    $pdf->Cell(10,-20,"Prescription : ".$prescription);
}
$pdf->Ln();

// Prints a cell with given text 
//$pdf->Cell(60,20,'Hello GeeksforGeeks!');
$pdf->Output();
// return the generated output

?>