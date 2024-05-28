<?php
include '../conn.php';
ini_set("memory_limit", "-1");

$product_name = $_GET['product_name'] ?? '';
$lot_no = $_GET['lot_no'] ?? '';
$serial_no = $_GET['serial_no'] ?? '';
$record_type = $_GET['record_type'] ?? '';
$line_no = $_GET['line_no'] ?? '';
$date_from = $_GET['date_from'] ?? '';
$date_to = $_GET['date_to'] ?? '';

$filename = 'Defect-Record_' . date("Y-m-d") . '.csv';
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename="' . $filename . '";');

$f = fopen('php://memory', 'w');

fputs($f, "\xEF\xBB\xBF");

$delimiter = ',';

$headers = array(
    'Line No',
    'Category',
    'Date Detected',
    'Issue No. Tag',
    'Repairing Date',
    'Car Maker',
    'Product Name',
    'Lot No.',
    'Serial No.',
    'Discovery Process',
    'Discovery ID No.',
    'Discovery Person',
    'Occurrence Process',
    'Occurrence Shift',
    'Occurrence ID No.',
    'Occurrence Person',
    'Outflow Process',
    'Outflow Shift',
    'Outflow ID No.',
    'Outflow Person',
    'Defect Category',
    'Sequence Number',
    'Cause of Defect',
    'Detail in Content of Defect',
    'Treatment Content of Defect',
    'Dis-assembled/Dis-inserted by',
);
fputcsv($f, $headers, $delimiter);

$query = "SELECT line_no, category, date_detected, issue_no_tag, repairing_date, car_maker, product_name, lot_no, serial_no, discovery_process, discovery_id_num, discovery_person, occurrence_process, occurrence_shift, occurrence_id_num, occurrence_person, outflow_process, outflow_shift, outflow_id_num, outflow_person, defect_category, sequence_num, defect_cause, defect_detail_content, defect_treatment_content, dis_assembled_by FROM t_defect_record_f WHERE 1=1";

$conditions = [];
$params = [];

if ($product_name !== '') {
    $conditions[] = "product_name LIKE ?";
    $params[] = $product_name . '%';
}
if ($lot_no !== '') {
    $conditions[] = "lot_no LIKE ?";
    $params[] = $lot_no . '%';
}
if ($serial_no !== '') {
    $conditions[] = "serial_no LIKE ?";
    $params[] = $serial_no . '%';
}
if ($record_type !== '') {
    $conditions[] = "record_type LIKE ?";
    $params[] = $record_type . '%';
}
if ($line_no !== '') {
    $conditions[] = "line_no LIKE ?";
    $params[] = $line_no . '%';
}
if ($date_from !== '' && $date_to !== '') {
    $conditions[] = "repairing_date BETWEEN ? AND ?";
    $params[] = $date_from;
    $params[] = $date_to;
} elseif ($date_from !== '') {
    $conditions[] = "repairing_date >= ?";
    $params[] = $date_from;
} elseif ($date_to !== '') {
    $conditions[] = "repairing_date <= ?";
    $params[] = $date_to;
}

if (count($conditions) > 0) {
    $query .= ' AND ' . implode(' AND ', $conditions);
}

$stmt = $conn->prepare($query);
$stmt->execute($params);

if ($stmt->rowCount() > 0) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $lineData = array(
            $row['line_no'],
            $row['category'],
            $row['date_detected'],
            $row['issue_no_tag'],
            $row['repairing_date'],
            $row['car_maker'],
            $row['product_name'],
            $row['lot_no'],
            $row['serial_no'],
            $row['discovery_process'],
            $row['discovery_id_num'],
            $row['discovery_person'],
            $row['occurrence_process'],
            $row['occurrence_shift'],
            $row['occurrence_id_num'],
            $row['occurrence_person'],
            $row['outflow_process'],
            $row['outflow_shift'],
            $row['outflow_id_num'],
            $row['outflow_person'],
            $row['defect_category'],
            $row['sequence_num'],
            $row['defect_cause'],
            $row['defect_detail_content'],
            $row['defect_treatment_content'],
            $row['dis_assembled_by'],
        );
        fputcsv($f, $lineData, $delimiter);
    }
} else {
    echo 'NO RECORD FOUND';
    exit;
}

fseek($f, 0);
fpassthru($f);

$conn = null;
?>