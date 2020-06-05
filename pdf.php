<?php
require_once 'fpdf182/fpdf.php';
include 'localization.php';

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(40, 10, $api_info);
$pdf->Output();
