<?php
include '../conn.php';

$method = $_POST['method'];

// fetch defect category defect record
if ($method == 'fetch_opt_search_v_defect_category') {
    $query = "SELECT `defect_category_ng_content` FROM `m_dr_defect_c` ORDER BY defect_category_ng_content ASC";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo '<option value="">Select defect category</option>';
        foreach ($stmt->fetchALL() as $row) {
            echo '<option>' . htmlspecialchars($row['defect_category_ng_content']) . '</option>';
        }
    } else {
        echo '<option>Select the defect category</option>';
    }
}

// fetch discovery process defect record
if ($method == 'fetch_opt_search_v_discovery_process') {
    $query = "SELECT `discovery_process` FROM `m_dr_discovery_p` ORDER BY discovery_process ASC";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo '<option value="">Select discovery process</option>';
        foreach ($stmt->fetchALL() as $row) {
            echo '<option>' . htmlspecialchars($row['discovery_process']) . '</option>';
        }
    } else {
        echo '<option>Select the discovery process</option>';
    }
}

// fetch occurrence process defect record
if ($method == 'fetch_opt_search_v_occurrence_process') {
    $query = "SELECT `occurrence_process` FROM `m_dr_occurrence_p` ORDER BY occurrence_process ASC";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo '<option value="">Select occurrence process</option>';
        foreach ($stmt->fetchALL() as $row) {
            echo '<option>' . htmlspecialchars($row['occurrence_process']) . '</option>';
        }
    } else {
        echo '<option>Select the occurrence process</option>';
    }
}

// fetch outflow process defect record
if ($method == 'fetch_opt_search_v_outflow_process') {
    $query = "SELECT `outflow_process` FROM `m_dr_outflow_p` ORDER BY outflow_process ASC";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo '<option value="">Select outflow process</option>';
        foreach ($stmt->fetchALL() as $row) {
            echo '<option>' . htmlspecialchars($row['outflow_process']) . '</option>';
        }
    } else {
        echo '<option>Select the outflow process</option>';
    }
}

// fetch car maker defect record
if ($method == 'fetch_opt_search_v_car_maker') {
    $query = "SELECT `car_maker` FROM `m_car_maker` ORDER BY car_maker ASC";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo '<option value="">Select car maker</option>';
        foreach ($stmt->fetchALL() as $row) {
            echo '<option>' . htmlspecialchars($row['car_maker']) . '</option>';
        }
    } else {
        echo '<option>Select the car maker</option>';
    }
}

if ($method == 'fetch_opt_search_v_record_type') {
    $query = "SELECT `record_name` FROM `m_record_type` ORDER BY record_name ASC";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo '<option value="">Select record type</option>';
        foreach ($stmt->fetchALL() as $row) {
            echo '<option>' . htmlspecialchars($row['record_name']) . '</option>';
        }
    } else {
        echo '<option>Select the record type</option>';
    }
}

// ================================================================================================

// function count_viewer_defect_table_data($conn)
// {
//     // $query = "SELECT count(id) AS total FROM t_defect_record_f";
//     $query = "SELECT count(id) AS total FROM t_defect_record_f WHERE (BINARY qc_status = 'Verified' OR BINARY record_type = 'White Tag') AND DATE(repairing_date) = CURDATE()";
//     $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
//     $stmt->execute();
//     if ($stmt->rowCount() > 0) {
//         foreach ($stmt->fetchALL() as $row) {
//             $total = $row['total'];
//         }
//     } else {
//         $total = 0;
//     }
//     return $total;
// }

function count_viewer_defect_table_data($conn, $defect_category, $discovery_process, $occurrence_process, $outflow_process, $car_maker, $line_no, $product_name, $lot_no, $serial_no, $record_type, $defect_cause, $date_from, $date_to)
{
    $query = "SELECT count(id) AS total FROM t_defect_record_f";
    $conditions = [];

    if (!empty($date_from) && !empty($date_to)) {
        $conditions[] = "repairing_date BETWEEN '$date_from' AND '$date_to'";
    }

    if (!empty($defect_category)) {
        $conditions[] = "defect_category LIKE ?";
    }

    if (!empty($discovery_process)) {
        $conditions[] = "discovery_process LIKE ?";
    }

    if (!empty($occurrence_process)) {
        $conditions[] = "occurrence_process LIKE ?";
    }

    if (!empty($outflow_process)) {
        $conditions[] = "outflow_process LIKE ?";
    }

    if (!empty($car_maker)) {
        $conditions[] = "car_maker LIKE ?";
    }

    if (!empty($line_no)) {
        $conditions[] = "line_no LIKE ?";
    }

    if (!empty($product_name)) {
        $conditions[] = "product_name LIKE ?";
    }

    if (!empty($lot_no)) {
        $conditions[] = "lot_no LIKE ?";
    }

    if (!empty($serial_no)) {
        $conditions[] = "serial_no LIKE ?";
    }

    if (!empty($record_type)) {
        $conditions[] = "record_type LIKE ?";
    }

    if (!empty($defect_cause)) {
        $conditions[] = "defect_cause LIKE ?";
    }

    $conditions[] = "(qc_status = 'Verified' OR BINARY record_type = 'White Tag')";
    // $conditions[] = "DATE(date_detected) = CURDATE()";

    if (!empty($conditions)) {
        $query .= " WHERE " . implode(" AND ", $conditions);
    }

    $stmt = $conn->prepare($query);

    $params = [];

    if (!empty($date_from) && !empty($date_to)) {
        $params[] = $date_from;
        $params[] = $date_to;
    }

    if (!empty($defect_category)) {
        $params[] = '%' . $defect_category . '%';
    }

    if (!empty($discovery_process)) {
        $params[] = '%' . $discovery_process . '%';
    }

    if (!empty($occurrence_process)) {
        $params[] = '%' . $occurrence_process . '%';
    }

    if (!empty($outflow_process)) {
        $params[] = '%' . $outflow_process . '%';
    }

    if (!empty($car_maker)) {
        $params[] = '%' . $car_maker . '%';
    }

    if (!empty($line_no)) {
        $params[] = '%' . $line_no . '%';
    }

    if (!empty($product_name)) {
        $params[] = '%' . $product_name . '%';
    }

    if (!empty($lot_no)) {
        $params[] = '%' . $lot_no . '%';
    }

    if (!empty($serial_no)) {
        $params[] = '%' . $serial_no . '%';
    }

    if (!empty($record_type)) {
        $params[] = '%' . $record_type . '%';
    }

    if (!empty($defect_cause)) {
        $params[] = '%' . $defect_cause . '%';
    }

    if (!empty($date_from)) {
        $params[] = '%' . $date_from . '%';
    }

    if (!empty($date_to)) {
        $params[] = '%' . $date_to . '%';
    }

    $stmt->execute($params);

    $total = $stmt->fetchColumn();

    return $total;
}

function count_viewer_mancost_table_data($search_arr, $conn)
{
    $query = "SELECT count(id) AS total FROM t_mancost_monitoring_f WHERE defect_id = '" . $search_arr['viewer_defect_id'] . "'";
    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        foreach ($stmt->fetchALL() as $row) {
            $total = $row['total'];
        }
    } else {
        $total = 0;
    }
    return $total;
}

if ($method == 'load_viewer_defect_table_data_last_page') {
    $defect_category = trim($_POST['defect_category']);
    $discovery_process = trim($_POST['discovery_process']);
    $occurrence_process = trim($_POST['occurrence_process']);
    $outflow_process = trim($_POST['outflow_process']);
    $car_maker = trim($_POST['car_maker']);
    $line_no = trim($_POST['line_no']);
    $product_name = trim($_POST['product_name']);
    $lot_no = trim($_POST['lot_no']);
    $serial_no = trim($_POST['serial_no']);
    $record_type = trim($_POST['record_type']);
    $defect_cause = trim($_POST['defect_cause']);
    $date_from = trim($_POST['date_from']);
    $date_to = trim($_POST['date_to']);

    $results_per_page = 50;

    $number_of_result = intval(count_viewer_defect_table_data($conn, $defect_category, $discovery_process, $occurrence_process, $outflow_process, $car_maker, $line_no, $product_name, $lot_no, $serial_no, $record_type, $defect_cause, $date_from, $date_to));

    //determine the total number of pages available  
    $number_of_page = ceil($number_of_result / $results_per_page);

    echo $number_of_page;
}

if ($method == 'count_viewer_defect_table_data') {
    $defect_category = trim($_POST['defect_category']);
    $discovery_process = trim($_POST['discovery_process']);
    $occurrence_process = trim($_POST['occurrence_process']);
    $outflow_process = trim($_POST['outflow_process']);
    $car_maker = trim($_POST['car_maker']);
    $line_no = trim($_POST['line_no']);
    $product_name = trim($_POST['product_name']);
    $lot_no = trim($_POST['lot_no']);
    $serial_no = trim($_POST['serial_no']);
    $record_type = trim($_POST['record_type']);
    $defect_cause = trim($_POST['defect_cause']);
    $date_from = trim($_POST['date_from']);
    $date_to = trim($_POST['date_to']);

    echo count_viewer_defect_table_data($conn, $defect_category, $discovery_process, $occurrence_process, $outflow_process, $car_maker, $line_no, $product_name, $lot_no, $serial_no, $record_type, $defect_cause, $date_from, $date_to);
}

// $query = "SELECT * FROM t_defect_record_f ORDER BY repairing_date DESC LIMIT " . $page_first_result . ", " . $results_per_page;
// $query = "SELECT * FROM t_defect_record_f LIMIT " . $page_first_result . ", " . $results_per_page;

// $query = "SELECT * FROM t_defect_record_f WHERE (BINARY qc_status = 'Verified' OR BINARY record_type = 'White Tag') AND DATE(repairing_date) = CURDATE() LIMIT " . $page_first_result . ", " . $results_per_page;

// // $query = "SELECT * FROM t_defect_record_f WHERE (BINARY qc_status = 'Verified' OR BINARY record_type = 'White Tag') LIMIT " . $page_first_result . ", " . $results_per_page;
// $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
// $stmt->execute();

if ($method == 'load_viewer_defect_table_data') {
    $defect_category = trim($_POST['defect_category']);
    $discovery_process = trim($_POST['discovery_process']);
    $occurrence_process = trim($_POST['occurrence_process']);
    $outflow_process = trim($_POST['outflow_process']);
    $car_maker = trim($_POST['car_maker']);
    $line_no = trim($_POST['line_no']);
    $product_name = trim($_POST['product_name']);
    $lot_no = trim($_POST['lot_no']);
    $serial_no = trim($_POST['serial_no']);
    $record_type = trim($_POST['record_type']);
    $defect_cause = trim($_POST['defect_cause']);
    $date_from = trim($_POST['date_from']);
    $date_to = trim($_POST['date_to']);

    $current_page = intval($_POST['current_page']);
    $c = 0;

    $results_per_page = 50;

    $page_first_result = ($current_page - 1) * $results_per_page;

    $c = $page_first_result;

    $query = "SELECT * FROM t_defect_record_f";
    $conditions = [];
    $params = [];

    if (!empty($date_from) && !empty($date_to)) {
        $conditions[] = "repairing_date BETWEEN ? AND ?";
        $params[] = $date_from;
        $params[] = $date_to;
    }

    if (!empty($defect_category)) {
        $conditions[] = "defect_category LIKE ?";
        $params[] = '%' . $defect_category . '%';
    }

    if (!empty($discovery_process)) {
        $conditions[] = "discovery_process LIKE ?";
        $params[] = '%' . $discovery_process . '%';
    }

    if (!empty($occurrence_process)) {
        $conditions[] = "occurrence_process LIKE ?";
        $params[] = '%' . $occurrence_process . '%';
    }

    if (!empty($outflow_process)) {
        $conditions[] = "outflow_process LIKE ?";
        $params[] = '%' . $outflow_process . '%';
    }

    if (!empty($car_maker)) {
        $conditions[] = "car_maker LIKE ?";
        $params[] = '%' . $car_maker . '%';
    }

    if (!empty($line_no)) {
        $conditions[] = "line_no LIKE ?";
        $params[] = '%' . $line_no . '%';
    }

    if (!empty($product_name)) {
        $conditions[] = "product_name LIKE ?";
        $params[] = '%' . $product_name . '%';
    }

    if (!empty($lot_no)) {
        $conditions[] = "lot_no LIKE ?";
        $params[] = '%' . $lot_no . '%';
    }

    if (!empty($serial_no)) {
        $conditions[] = "serial_no LIKE ?";
        $params[] = '%' . $serial_no . '%';
    }

    if (!empty($record_type)) {
        $conditions[] = "record_type LIKE ?";
        $params[] = '%' . $record_type . '%';
    }

    if (!empty($defect_cause)) {
        $conditions[] = "defect_cause LIKE ?";
        $params[] = '%' . $defect_cause . '%';
    }

    $conditions[] = "(qc_status = 'Verified' OR BINARY record_type = 'White Tag')";

    if (!empty($conditions)) {
        $query .= " WHERE " . implode(" AND ", $conditions);
    }

    $query .= " ORDER BY repairing_date DESC";

    $query .= " LIMIT " . $page_first_result . ", " . $results_per_page;

    // Prepare and execute the query
    $stmt = $conn->prepare($query);
    $stmt->execute($params);

    if ($stmt->rowCount() > 0) {
        foreach ($stmt->fetchAll() as $row) {
            $c++;
            echo '<tr style="cursor:pointer; text-align:center;" class="modal-trigger" onclick="load_viewer_mancost_table(&quot;' . $row['id'] . '~!~' . $row['defect_id'] . '&quot;)">';
            echo '<td style="text-align:center;">' . $c . '</td>';
            echo '<td style="text-align:center;">' . $row['line_no'] . '</td>';
            echo '<td style="text-align:center;">' . $row['category'] . '</td>';
            echo '<td style="text-align:center;">' . $row['date_detected'] . '</td>';
            echo '<td style="text-align:center;">' . $row['issue_no_tag'] . '</td>';
            echo '<td style="text-align:center;">' . $row['repairing_date'] . '</td>';
            echo '<td style="text-align:center;">' . $row['car_maker'] . '</td>';
            echo '<td style="text-align:center;">' . $row['product_name'] . '</td>';
            echo '<td style="text-align:center;">' . $row['lot_no'] . '</td>';
            echo '<td style="text-align:center;">' . $row['serial_no'] . '</td>';
            echo '<td style="text-align:center;">' . $row['discovery_process'] . '</td>';
            echo '<td style="text-align:center;">' . $row['discovery_id_num'] . '</td>';
            echo '<td style="text-align:center;">' . $row['discovery_person'] . '</td>';
            echo '<td style="text-align:center;">' . $row['occurrence_process'] . '</td>';
            echo '<td style="text-align:center;">' . $row['occurrence_shift'] . '</td>';
            echo '<td style="text-align:center;">' . $row['occurrence_id_num'] . '</td>';
            echo '<td style="text-align:center;">' . $row['occurrence_person'] . '</td>';
            echo '<td style="text-align:center;">' . $row['outflow_process'] . '</td>';
            echo '<td style="text-align:center;">' . $row['outflow_shift'] . '</td>';
            echo '<td style="text-align:center;">' . $row['outflow_id_num'] . '</td>';
            echo '<td style="text-align:center;">' . $row['outflow_person'] . '</td>';
            echo '<td style="text-align:center;">' . $row['defect_category'] . '</td>';
            echo '<td style="text-align:center;">' . $row['sequence_num'] . '</td>';
            echo '<td style="text-align:center;">' . $row['defect_cause'] . '</td>';
            echo '<td style="text-align:left;">' . $row['defect_detail_content'] . '</td>';
            echo '<td style="text-align:left;">' . $row['defect_treatment_content'] . '</td>';
            echo '<td style="text-align:center;">' . $row['dis_assembled_by'] . '</td>';
            echo '</tr>';
        }
    } else {
        echo '<tr>';
        echo '<td colspan="12" style="text-align:center; color:red;">No Result</td>';
        echo '</tr>';
    }
    exit;
}

if ($method == 'load_viewer_mancost_table_data_last_page') {
    $viewer_defect_id = $_POST['viewer_defect_id'];

    $search_arr = array(
        "viewer_defect_id" => $viewer_defect_id
    );

    $results_per_page = 50;

    $number_of_result = intval(count_viewer_mancost_table_data($search_arr, $conn));

    //determine the total number of pages available  
    $number_of_page = ceil($number_of_result / $results_per_page);

    echo $number_of_page;
}

if ($method == 'count_viewer_mancost_table_data') {
    $viewer_defect_id = $_POST['viewer_defect_id'];

    $search_arr = array(
        "viewer_defect_id" => $viewer_defect_id
    );

    echo count_viewer_mancost_table_data($search_arr, $conn);
}

if ($method == 'load_viewer_mancost_table_data') {
    $viewer_defect_id = $_POST['viewer_defect_id'];
    $current_page = intval($_POST['current_page']);

    $c = 0;

    $row_class_arr = array('modal-trigger', 'modal-trigger bg-success', 'modal-trigger bg-danger', 'modal-trigger bg-secondary');
    $row_class = $row_class_arr[0];

    $results_per_page = 50;

    //determine the sql LIMIT starting number for the results on the displaying page
    $page_first_result = ($current_page - 1) * $results_per_page;

    $c = $page_first_result;

    // $query = "SELECT * FROM t_mancost_monitoring_f WHERE defect_id = '$defect_id' LIMIT " . $page_first_result . ", " . $results_per_page;

    $query = "SELECT t_mancost_monitoring_f.id, t_defect_record_f.defect_id, t_defect_record_f.car_maker, t_defect_record_f.line_no, t_defect_record_f.category,t_defect_record_f.repairing_date, t_mancost_monitoring_f.repair_start, t_mancost_monitoring_f.repair_end, t_mancost_monitoring_f.time_consumed, t_mancost_monitoring_f.defect_category, t_mancost_monitoring_f.occurrence_process, t_mancost_monitoring_f.parts_removed, t_mancost_monitoring_f.quantity, t_mancost_monitoring_f.unit_cost, t_mancost_monitoring_f.material_cost, t_mancost_monitoring_f.manhour_cost, t_mancost_monitoring_f.repaired_portion_treatment, t_mancost_monitoring_f.qc_verification, t_mancost_monitoring_f.checking_date_sign, t_mancost_monitoring_f.verified_by, t_mancost_monitoring_f.remarks, t_mancost_monitoring_f.record_added_by FROM t_defect_record_f LEFT JOIN t_mancost_monitoring_f ON t_defect_record_f.defect_id = t_mancost_monitoring_f.defect_id WHERE t_defect_record_f.defect_id = '$viewer_defect_id'";

    // 1st Approach using SQL Server DB when using Select Query
    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        foreach ($stmt->fetchALL() as $row) {
            $c++;

            if ($row['qc_verification'] == 'N/A') {
                $row_class = $row_class_arr[3];
            } else if ($row['qc_verification'] == 'NO GOOD') {
                $row_class = $row_class_arr[2];
            } else if ($row['qc_verification'] == 'GOOD') {
                $row_class = $row_class_arr[1];
            } else {
                $row_class = $row_class_arr[0];
            }

            echo '<tr style="cursor:pointer;" class="' . $row_class . '">';
            echo '<td style="text-align:center;">' . $c . '</td>';
            echo '<td style="text-align:center;">' . $row['car_maker'] . '</td>';
            echo '<td style="text-align:center;">' . $row['line_no'] . '</td>';
            echo '<td style="text-align:center;">' . $row['category'] . '</td>';
            echo '<td style="text-align:center;">' . $row['repair_start'] . '</td>';
            echo '<td style="text-align:center;">' . $row['repair_end'] . '</td>';
            echo '<td style="text-align:center;">' . $row['time_consumed'] . '</td>';
            echo '<td style="text-align:center;">' . $row['defect_category'] . '</td>';
            echo '<td style="text-align:center;">' . $row['occurrence_process'] . '</td>';
            echo '<td style="text-align:center;">' . $row['parts_removed'] . '</td>';
            echo '<td style="text-align:center;">' . $row['quantity'] . '</td>';
            echo '<td style="text-align:center;">' . $row['unit_cost'] . '</td>';
            echo '<td style="text-align:center;">' . $row['material_cost'] . '</td>';
            echo '<td style="text-align:center;">' . $row['manhour_cost'] . '</td>';
            echo '<td style="text-align:center;">' . $row['repaired_portion_treatment'] . '</td>';
            echo '</tr>';
        }
    } else {
        echo '<tr>';
        echo '<td colspan="12" style="text-align:center; color:red;">No Result</td>';
        echo '</tr>';
    }
}

// search keyword in mancost monitoring only
if ($method == 'viewer_mancost_search_keyword') {
    $v_mancost_keyword = trim($_POST['v_mancost_keyword']);

    // date search
    $date_from = trim($_POST['date_from']);
    if (!empty($date_from)) {
        $date_from = date_create($date_from);
        $date_from = date_format($date_from, "Y/m/d");
    }

    $date_to = trim($_POST['date_to']);
    if (!empty($date_to)) {
        $date_to = date_create($date_to);
        $date_to = date_format($date_to, "Y/m/d");
    }

    $c = 0;
    $query = "SELECT * FROM `t_mancost_monitoring_f`";
    // $conditions = [];
    $conditions[] = "defect_id IN ('', NULL)";

    if (!empty($date_from) && !empty($date_to)) {
        $conditions[] = "repairing_date BETWEEN '$date_from' AND '$date_to'";
    }

    if (!empty($v_mancost_keyword)) {
        $conditions[] = "`car_maker` LIKE '$v_mancost_keyword%' OR `line_no` LIKE '$v_mancost_keyword%' OR `defect_category` LIKE '$v_mancost_keyword%' OR `occurrence_process` LIKE '$v_mancost_keyword%' OR `parts_removed` LIKE '$v_mancost_keyword%' OR `repaired_portion_treatment` LIKE '$v_mancost_keyword%' OR `re_checking` LIKE '$v_mancost_keyword%' OR `qc_verification` LIKE '$v_mancost_keyword%' OR `checking_date_sign`";
    }

    if (!empty($conditions)) {
        $query .= " WHERE " . implode(" AND ", $conditions);
    }

    $stmt = $conn->prepare($query);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        foreach ($stmt->fetchAll() as $row) {
            $c++;
            echo '<tr style="cursor:pointer;">';
            echo '<td style="text-align:center;">' . $c . '</td>';
            echo '<td style="text-align:center;">' . $row['car_maker'] . '</td>';
            echo '<td style="text-align:center;">' . $row['line_no'] . '</td>';
            echo '<td style="text-align:center;">' . $row['repairing_date'] . '</td>';
            echo '<td style="text-align:center;">' . $row['repair_start'] . '</td>';
            echo '<td style="text-align:center;">' . $row['repair_end'] . '</td>';
            echo '<td style="text-align:center;">' . $row['time_consumed'] . '</td>';
            echo '<td style="text-align:center;">' . $row['defect_category'] . '</td>';
            echo '<td style="text-align:center;">' . $row['occurrence_process'] . '</td>';
            echo '<td style="text-align:center;">' . $row['parts_removed'] . '</td>';
            echo '<td style="text-align:center;">' . $row['quantity'] . '</td>';
            echo '<td style="text-align:center;">' . $row['unit_cost'] . '</td>';
            echo '<td style="text-align:center;">' . $row['material_cost'] . '</td>';
            echo '<td style="text-align:center;">' . $row['manhour_cost'] . '</td>';
            echo '<td style="text-align:center;">' . $row['repaired_portion_treatment'] . '</td>';
            echo '<td style="text-align:center;">' . $row['re_checking'] . '</td>';
            echo '<td style="text-align:center;">' . $row['qc_verification'] . '</td>';
            echo '<td style="text-align:center;">' . $row['checking_date_sign'] . '</td>';
            echo '</tr>';
        }
    } else {
        echo '<tr>';
        echo '<td colspan="12" style="text-align:center; color:red;">No Record Found</td>';
        echo '</tr>';
    }
}

$conn = NULL;

?>