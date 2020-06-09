<?php
require_once 'fpdf182/fpdf.php';
include 'localization.php';
include 'config.php';

try {
    $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    // set the PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

class myPDF extends FPDF {
    function headerTable() {
        $this->SetFont('Times', 'B', '12');
        $this->Cell(10, 10, 'ID', 1, 0, 'C');
        $this->Cell(42, 10, 'Date', 1, 0, 'C');
        $this->Cell(20, 10, 'Request', 1, 0, 'C');
        $this->Cell(20, 10, 'Is Error', 1, 0, 'C');
        $this->Cell(40, 10, 'Error', 1, 0, 'C');
        $this->Ln();
    }

    function viewTable($db) {
        $this->SetFont('Times', '', '12');
        $stmt = $db->query('SELECT * FROM log');

        while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
            $this->Cell(10, 10, $row->id, 1, 0, 'C');
            $this->Cell(42, 10, $row->datetime, 1, 0, 'C');
            $this->Cell(20, 10, $row->request, 1, 0, 'C');
            $this->Cell(20, 10, $row->is_error, 1, 0, 'C');
            $this->Cell(40, 10, $row->error_description, 1, 0, 'C');
            $this->Ln();
        }
    }
}

$pdf = new myPDF();
$pdf->AddPage();
$pdf->SetLeftMargin(25);
$pdf->headerTable();
$pdf->viewTable($db);
$pdf->Output();
$db = null;
