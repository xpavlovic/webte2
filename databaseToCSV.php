<?php
require_once 'fpdf182/fpdf.php';
include 'localization.php';
include 'config.php';

if (isset($_POST['export'])) {
    try {
        $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

        // set the PDO error mode to exception
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    $stmt = $db->query('SELECT * FROM log');

    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=data.csv');
    $output = fopen("php://output", "w");
    fputcsv($output, array('ID', 'Date', 'Request', 'Is Error', 'Error Description'));

    while ($row = $stmt->fetch(PDO::FETCH_OBJ))
    {
        fputcsv($output, $row);
    }
    fclose($output);
}
