<?php
//include connection file 
 			$host = 'localhost';
            $user = 'root';
            $pass = '';
            $dbname = 'hospitalmanagement';

  
 $conn = mysqli_connect($host, $user, $pass, $dbname);
include_once('fpdf/fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    //$this->Image('logo.png',10,-1,70);
    $this->SetFont('Arial','B',20);
    // Move to the right
    $this->Cell(50);
    // Title
    $this->Cell(80,10,'Billing',1,0,'C');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

//$db = new dbObj();
//$connString =  $db->getConnstring();
$display_heading = array('PatientName'=>'Patient', 'ID'=> 'id', 'PhoneNumber'=> 'Phone','Email'=> 'email', 'DoctorPayment'=> 'doctor','MedicineCost'=> 'medicine','CabinCost'=> 'cabin','OTCost'=> 'otcost', 'IcuCost'=> 'icu','TestCost'=> 'test', 'Others'=> 'others','CarCost'=> 'CarCost', 'AdminName'=> 'adminname','HospitalName'=> 'hospital');
$ID = $_POST["id"];
$result = mysqli_query($conn, "SELECT `PatientName`, `ID`, `PhoneNumber`, `Email` FROM `bill`  WHERE `ID`=$ID") or die("database error:". mysqli_error($conn));
$result1 = mysqli_query($conn, "SELECT  `DoctorPayment`, `MedicineCost`, `CabinCost`, `OTCost` FROM `bill`  WHERE `ID`=$ID") or die("database error:". mysqli_error($conn));
$result2 = mysqli_query($conn, "SELECT `IcuCost`, `TestCost`, `Others`, `CarCost` FROM `bill` WHERE `ID`=$ID") or die("database error:". mysqli_error($conn));
$result3 = mysqli_query($conn, "SELECT `HospitalName` FROM `bill` WHERE `ID`=$ID") or die("database error:". mysqli_error($conn));
$result4 = mysqli_query($conn, "SELECT `AdminName` FROM `bill` WHERE `ID`=$ID") or die("database error:". mysqli_error($conn));
$header = mysqli_query($conn, "SHOW columns FROM bill");

$pdf = new PDF();
//header
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',12);

foreach($result3 as $row3) {
$pdf->Ln();
foreach($row3 as $column3)
if($column3!=''){
    $pdf->Cell(50,15,"Hospital Name: ".$column3,1);
    break;
    }
}
$pdf->Ln();
$pdf->Ln();


foreach($header as $heading) {
    if($display_heading[$heading['Field']]=='Patient' ||$display_heading[$heading['Field']]=='id' ||$display_heading[$heading['Field']]=='Phone' ||
    $display_heading[$heading['Field']]=='email')
$pdf->Cell(40,12,$display_heading[$heading['Field']],1);
}
foreach($result as $row) {
$pdf->Ln();
foreach($row as $column)
$pdf->Cell(40,12,$column,1);
break;
}
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
foreach($header as $heading) {
    if($display_heading[$heading['Field']]=='doctor' ||$display_heading[$heading['Field']]=='medicine' ||$display_heading[$heading['Field']]=='cabin' ||
    $display_heading[$heading['Field']]=='otcost')
$pdf->Cell(40,12,$display_heading[$heading['Field']],1);
}

foreach($result1 as $row1) {
$pdf->Ln();
foreach($row1 as $column1)
$pdf->Cell(40,12,$column1,1);
}
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
foreach($header as $heading) {
    if($display_heading[$heading['Field']]=='icu' ||$display_heading[$heading['Field']]=='test' ||$display_heading[$heading['Field']]=='others' ||
    $display_heading[$heading['Field']]=='CarCost')
$pdf->Cell(40,12,$display_heading[$heading['Field']],1);
}
foreach($result2 as $row2) {
$pdf->Ln();
foreach($row2 as $column2)
$pdf->Cell(40,12,$column2,1);
}

$pdf->Ln();
$pdf->Ln();
$pdf->Ln();
foreach($result4 as $row4) {
$pdf->Ln();
foreach($row4 as $column4)
$pdf->Cell(80,12,$column4,1);
break;
}
$pdf->Output();
?>