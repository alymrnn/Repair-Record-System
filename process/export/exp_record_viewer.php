<?php
include '../conn.php';
ini_set("memory_limit", "-1");

$defect_category = $_GET['defect_category'];
$discovery_process = $_GET['discovery_process'];
$occurrence_process = $_GET['occurrence_process'];
$outflow_process = $_GET['outflow_process'];
$car_maker = $_GET['car_maker'];
$line_no = $_GET['line_no'];
$product_name = $_GET['product_name'];
$lot_no = $_GET['lot_no'];
$serial_no = $_GET['serial_no'];
$record_type = $_GET['record_type'];
$v_defect_keyword = $_GET['v_defect_keyword'];
$date_from = $_GET['date_from'];
$date_to = $_GET['date_to'];

$c = 0;

$filename = 'Defect-and-Mancost-Record_' . date("Y-m-d") . '.csv';
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename="' . $filename . '";');


// Create a file pointer
$f = fopen('php://memory', 'w');

// Add UTF-8 BOM (For Any characters compatibility)
fputs($f, "\xEF\xBB\xBF");

// Set column headers
$delimiter = ',';
$fields = array(

);
fputcsv($f, $fields, $delimiter);

// $commonParameters = "line_no LIKE '$line_no%' AND car_maker LIKE '$car_maker%' AND discovery_process LIKE '$discovery_process%' AND occurrence_process LIKE '$occurrence_process%' AND outflow_process LIKE '$outflow_process%' AND product_name LIKE '$product_name%' AND lot_no LIKE '$lot_no%' AND serial_no LIKE '$serial_no%' AND qc_status = 'Verified'";

$commonParameters = "t_defect_record_f.line_no LIKE '$line_no%' AND t_defect_record_f.car_maker LIKE '$car_maker%' AND t_defect_record_f.discovery_process LIKE '$discovery_process%' AND t_defect_record_f.occurrence_process LIKE '$occurrence_process%' AND t_defect_record_f.outflow_process LIKE '$outflow_process%' AND t_defect_record_f.product_name LIKE '$product_name%' AND t_defect_record_f.lot_no LIKE '$lot_no%' AND t_defect_record_f.serial_no LIKE '$serial_no%' AND t_defect_record_f.record_type LIKE '$record_type%' AND (t_defect_record_f.qc_status = 'Verified' OR t_defect_record_f.record_type = 'White Tag')";


$query = "SELECT t_defect_record_f.id,
t_defect_record_f.line_no,
t_defect_record_f.date_detected,
t_defect_record_f.issue_no_tag,
t_defect_record_f.repairing_date,
t_defect_record_f.car_maker,
t_defect_record_f.product_name,
t_defect_record_f.lot_no,
t_defect_record_f.serial_no,
t_defect_record_f.discovery_process,
t_defect_record_f.discovery_id_num,
t_defect_record_f.discovery_person,
t_defect_record_f.occurrence_process,
t_defect_record_f.occurrence_shift,
t_defect_record_f.occurrence_id_num,
t_defect_record_f.occurrence_person,
t_defect_record_f.outflow_process,
t_defect_record_f.outflow_shift,
t_defect_record_f.outflow_id_num,
t_defect_record_f.outflow_person,
t_defect_record_f.defect_category,
t_defect_record_f.sequence_num,
t_defect_record_f.defect_cause,
t_defect_record_f.defect_detail_content,
t_defect_record_f.defect_treatment_content,
t_defect_record_f.dis_assembled_by,
t_mancost_monitoring_f.repair_start,
t_mancost_monitoring_f.repair_end,
t_mancost_monitoring_f.time_consumed,
t_mancost_monitoring_f.defect_category,
t_mancost_monitoring_f.occurrence_process,
t_mancost_monitoring_f.parts_removed,
t_mancost_monitoring_f.quantity,
t_mancost_monitoring_f.unit_cost,
t_mancost_monitoring_f.material_cost,
t_mancost_monitoring_f.manhour_cost,
t_mancost_monitoring_f.repaired_portion_treatment,
t_mancost_monitoring_f.qc_verification,
t_mancost_monitoring_f.checking_date_sign,
t_mancost_monitoring_f.verified_by,
t_mancost_monitoring_f.remarks FROM t_defect_record_f LEFT JOIN t_mancost_monitoring_f ON t_defect_record_f.defect_id = t_mancost_monitoring_f.defect_id WHERE $commonParameters AND t_defect_record_f.occurrence_process LIKE '$occurrence_process%'
AND t_mancost_monitoring_f.occurrence_process LIKE '$occurrence_process%'";

$stmt = $conn->prepare($query);
$stmt->execute();

// Open a file pointer
$f = fopen('php://memory', 'w');

// Output CSV headers
$headers = array(
        'Line No',
        'Date Detected',
        'Issue No. Tag',
        'Repairing Date',
        'Car Maker',
        'Product Name',
        'Lot No.',
        'Serial No.',
        'Discovery Person',
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

        'Repair Start',
        'Repair End',
        'Time Consumed (in minutes)',
        'Defect Category',
        'Occurrence Process',
        'Parts Removed',
        'Quantity',
        'Unit Cost ( JPY )',
        'Material Cost ( JPY )',
        'Manhour Cost ( JPY )',
        'Repaired Portion Treatment',
        'QC Verification',
        'Checking Date',
        'Verified By',
        'Remarks'
);
fputcsv($f, $headers, $delimiter);

if ($stmt->rowCount() > 0) {
        foreach ($stmt->fetchAll() as $row) {
                $lineData = array(
                        $row['line_no'],
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

                        // Columns from t_mancost_monitoring_f
                        $row['repair_start'],
                        $row['repair_end'],
                        $row['time_consumed'],
                        $row['defect_category'],
                        $row['occurrence_process'],
                        $row['parts_removed'],
                        $row['quantity'],
                        $row['unit_cost'],
                        $row['material_cost'],
                        $row['manhour_cost'],
                        $row['repaired_portion_treatment'],
                        $row['qc_verification'],
                        $row['checking_date_sign'],
                        $row['verified_by'],
                        $row['remarks'],
                );
                fputcsv($f, $lineData, $delimiter);
        }
} else {
        // Output no data found
        echo 'NO RECORD FOUND';
}

// Move back to the beginning of the file
fseek($f, 0);

// Output all remaining data on a file pointer
fpassthru($f);

$conn = null;
?>