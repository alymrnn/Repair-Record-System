<?php
include '../conn.php';
// include '../conn_emp_mgt.php';

ini_set("memory_limit", "-1");

$product_name = $_GET['product_name'] ?? '';
$lot_no = $_GET['lot_no'] ?? '';
$serial_no = $_GET['serial_no'] ?? '';
$record_type = $_GET['record_type'] ?? '';
$line_no = $_GET['line_no'] ?? '';
$repair_person = $_GET['repair_person'] ?? '';
$date_from = $_GET['date_from'] ?? '';
$date_to = $_GET['date_to'] ?? '';

$filename = 'Mancost-Record_' . date("Y-m-d") . '.csv';
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename="' . $filename . '"');

$f = fopen('php://output', 'w');

fputs($f, "\xEF\xBB\xBF");

$delimiter = ',';

$headers = array(
    'Line No',
    'Repairing Date',
    'Repair Start',
    'Repair End',
    'Time Consumed (in minutes)',
    'Defect Name',
    'Defect Category',
    'Occurrence Process',
    'Lot No.',
    'Parts Removed',
    'Quantity',
    'Unit Cost (JPY)',
    'Material Cost (JPY)',
    'Manhour Cost (JPY)',
    'Repaired Portion Treatment',
    'Repaired By',
);
fputcsv($f, $headers, $delimiter);

$query = "SELECT
                t_defect_record_f.line_no,
                t_defect_record_f.repairing_date,
                t_defect_record_f.dis_assembled_by,
                t_defect_record_f.product_name,
                t_defect_record_f.lot_no,
                t_defect_record_f.serial_no,
                t_defect_record_f.record_type,
                t_defect_record_f.defect_category_dr,
                t_defect_record_f.lot_no,
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
        WHERE 1=1 ";

$params = array();
$conditions = array();

$conditions[] = "(status = 'Saved' OR status = 'Verified')";

if (!empty($product_name)) {
    $conditions[] = "t_defect_record_f.product_name LIKE ?";
    $params[] = '%' . $product_name . '%';
}
if (!empty($lot_no)) {
    $conditions[] = "t_defect_record_f.lot_no LIKE ?";
    $params[] = '%' . $lot_no . '%';
}
if (!empty($serial_no)) {
    $conditions[] = "t_defect_record_f.serial_no LIKE ?";
    $params[] = '%' . $serial_no . '%';
}
if (!empty($record_type)) {
    $conditions[] = "t_defect_record_f.record_type LIKE ?";
    $params[] = '%' . $record_type . '%';
}
if (!empty($line_no)) {
    $conditions[] = "t_defect_record_f.line_no LIKE ?";
    $params[] = '%' . $line_no . '%';
}
if (!empty($repair_person)) {
    $conditions[] = "t_defect_record_f.dis_assembled_by LIKE ?";
    $params[] = '%' . $repair_person . '%';
}
if (!empty($date_from) && !empty($date_to)) {
    $conditions[] = "CONVERT(date, t_defect_record_f.repairing_date) BETWEEN ? AND ?";
    $params[] = $date_from;
    $params[] = $date_to;
} elseif (!empty($date_from)) {
    $conditions[] = "CONVERT(date, t_defect_record_f.repairing_date) >= ?";
    $params[] = $date_from;
} elseif (!empty($date_to)) {
    $conditions[] = "CONVERT(date, t_defect_record_f.repairing_date) <= ?";
    $params[] = $date_to;
}

if (!empty($conditions)) {
    $query .= ' AND ' . implode(' AND ', $conditions);
}

$query .= " ORDER BY t_mancost_monitoring_f.record_added_mancost_datetime ASC";

$stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));

for ($i = 0; $i < count($params); $i++) {
    $paramValue = $params[$i];
    $paramType = PDO::PARAM_STR; 

    if (strtotime($paramValue) !== false) {
        $paramType = PDO::PARAM_STR;
    }

    $stmt->bindValue($i + 1, $paramValue, $paramType);
}

try {
    if ($stmt->execute()) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $lineData = array(
                $row['line_no'],
                $row['repairing_date'],
                $row['repair_start'],
                $row['repair_end'],
                $row['time_consumed'],
                $row['defect_category_dr'],
                $row['defect_category_mc'],
                $row['occurrence_process_mc'],
                $row['lot_no'],
                $row['parts_removed'],
                $row['quantity'],
                $row['unit_cost'],
                $row['material_cost'],
                $row['manhour_cost'],
                $row['repaired_portion_treatment'],
                $row['dis_assembled_by'],
            );
            fputcsv($f, $lineData, $delimiter);
        }
    } else {
        echo 'NO RECORD FOUND';
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

fclose($f);
exit;
?>