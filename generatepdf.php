<?php

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
$pdf->SetFont('Arial', 'B', 16);
$pdf->SetDrawColor(0, 0, 0);
// Move to 8 cm to the right
$pdf->Cell(80);
// Centered text in a framed 20*10 mm cell and line break

$pdf->Cell(20, 10, "Paws' Own", 0, 0, 'C');
  
// Prints a cell with given text 
//$pdf->Cell(60,20,'Hello GeeksforGeeks!');
$pdf->Output();
// return the generated output

?>