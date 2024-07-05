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

$filename = 'Mancost-Record_' . date("Y-m-d") . '.csv';
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename="' . $filename . '";');

$f = fopen('php://memory', 'w');

fputs($f, "\xEF\xBB\xBF");

$delimiter = ',';

$headers = array(
    'Line No',
    'Repairing Date',
    'Repair Start',
    'Repair End',
    'Time Consumed (in minutes)',
    'Defect Category',
    'Occurrence Process',
    'Parts Removed',
    'Quantity',
    'Unit Cost (JPY)',
    'Material Cost (JPY)',
    'Manhour Cost (JPY)',
    'Repaired Portion Treatment',
);
fputcsv($f, $headers, $delimiter);

$query = "SELECT
                t_defect_record_f.id,
                t_defect_record_f.line_no,
                t_defect_record_f.repairing_date,
                t_mancost_monitoring_f.repair_start,
                t_mancost_monitoring_f.repair_end,
                t_mancost_monitoring_f.time_consumed,
                t_mancost_monitoring_f.defect_category_mc,
                t_mancost_monitoring_f.occurrence_process_mc,
                t_mancost_monitoring_f.parts_removed,
                t_mancost_monitoring_f.quantity,
                t_mancost_monitoring_f.unit_cost,
                t_mancost_monitoring_f.material_cost,
                t_mancost_monitoring_f.manhour_cost,
                t_mancost_monitoring_f.repaired_portion_treatment
        FROM t_defect_record_f
        LEFT JOIN t_mancost_monitoring_f ON t_defect_record_f.defect_id = t_mancost_monitoring_f.defect_id
        WHERE 1=1
        ORDER BY t_mancost_monitoring_f.record_added_mancost_datetime ASC";

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
            $row['repairing_date'],
            $row['repair_start'],
            $row['repair_end'],
            $row['time_consumed'],
            $row['defect_category_mc'],
            $row['occurrence_process_mc'],
            $row['parts_removed'],
            $row['quantity'],
            $row['unit_cost'],
            $row['material_cost'],
            $row['manhour_cost'],
            $row['repaired_portion_treatment'],
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