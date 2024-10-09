<?php
ini_set("memory_limit", "-1");
include '../conn.php';
// include '../conn_emp_mgt.php';

$product_name = $_GET['product_name'] ?? '';
$lot_no = $_GET['lot_no'] ?? '';
$serial_no = $_GET['serial_no'] ?? '';
$record_type = $_GET['record_type'] ?? '';
$line_no = $_GET['line_no'] ?? '';
$repair_person = $_GET['repair_person'] ?? '';
$date_from = $_GET['date_from'] ?? '';
$date_to = $_GET['date_to'] ?? '';

$filename = 'Defect-Record_' . date("Y-m-d") . '.csv';
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename="' . $filename . '"');

$f = fopen('php://output', 'w');

fputs($f, "\xEF\xBB\xBF");

$delimiter = ',';

$headers = array(
    'Line No',
    'Category',
    'Date Detected',
    'Issue No. Tag',
    'Repairing Date',
    'Car Maker',
    'Car Model',
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
    'Sequence No',
    'Assy Board No',
    'Cause of Defect',
    'Good Measurement',
    'NG Measurement',
    'Wire Type',
    'Wire Size',
    'Connector Cavity / Color',
    'Detail in Content of Defect',
    'Treatment Content of Defect',
    'Harness Status after Repair',
    'Dis-assembled/Dis-inserted by',
);
fputcsv($f, $headers, $delimiter);

$query = "
    SELECT line_no, category, date_detected, issue_no_tag, repairing_date, car_maker, car_model, product_name, lot_no, serial_no, 
           discovery_process, discovery_id_num, discovery_person, occurrence_process_dr, occurrence_shift, occurrence_id_num, 
           occurrence_person, outflow_process, outflow_shift, outflow_id_num, outflow_person, defect_category_dr, sequence_num, 
           assy_board_no, defect_cause, defect_detail_content, defect_treatment_content, harness_status, dis_assembled_by, 
           good_measurement, ng_measurement, wire_type, wire_size, connector_cavity 
    FROM t_defect_record_f 
    WHERE 1=1";

// Building conditions dynamically
$conditions = [];
$params = [];

$conditions[] = "(pending_status = '' OR pending_status = 'Updated' OR pending_status IS NULL)";

if (!empty($product_name)) {
    $conditions[] = "product_name LIKE ?";
    $params[] = $product_name . '%';
}
if (!empty($lot_no)) {
    $conditions[] = "lot_no LIKE ?";
    $params[] = $lot_no . '%';
}
if (!empty($serial_no)) {
    $conditions[] = "serial_no LIKE ?";
    $params[] = $serial_no . '%';
}
if (!empty($record_type)) {
    $conditions[] = "record_type LIKE ?";
    $params[] = $record_type . '%';
}
if (!empty($line_no)) {
    $conditions[] = "line_no LIKE ?";
    $params[] = $line_no . '%';
}
if (!empty($repair_person)) {
    $conditions[] = "dis_assembled_by LIKE ?";
    $params[] = $repair_person . '%';
}
if (!empty($date_from) && !empty($date_to)) {
    $conditions[] = "CONVERT(date, repairing_date) BETWEEN ? AND ?";
    $params[] = $date_from;
    $params[] = $date_to;
} elseif (!empty($date_from)) {
    $conditions[] = "repairing_date >= ?";
    $params[] = $date_from;
} elseif (!empty($date_to)) {
    $conditions[] = "repairing_date <= ?";
    $params[] = $date_to;
}

if (!empty($conditions)) {
    $query .= ' AND ' . implode(' AND ', $conditions);
}

$query .= ' ORDER BY record_added_defect_datetime ASC';
$stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
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
            $row['car_model'],
            $row['product_name'],
            $row['lot_no'],
            $row['serial_no'],
            $row['discovery_process'],
            $row['discovery_id_num'],
            $row['discovery_person'],
            $row['occurrence_process_dr'],
            $row['occurrence_shift'],
            $row['occurrence_id_num'],
            $row['occurrence_person'],
            $row['outflow_process'],
            $row['outflow_shift'],
            $row['outflow_id_num'],
            $row['outflow_person'],
            $row['defect_category_dr'],
            $row['sequence_num'],
            $row['assy_board_no'],
            $row['defect_cause'],
            $row['good_measurement'],
            $row['ng_measurement'],
            $row['wire_type'],
            $row['wire_size'],
            $row['connector_cavity'],
            $row['defect_detail_content'],
            $row['defect_treatment_content'],
            $row['harness_status'],
            $row['dis_assembled_by']
        );
        fputcsv($f, $lineData, $delimiter);
    }
} else {
    echo 'NO RECORD FOUND';
    exit;
}

fclose($f);
exit;
?>