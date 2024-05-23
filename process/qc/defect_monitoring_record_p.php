<?php

session_start();
include '../conn.php';

$method = $_POST['method'];

// fetch record type
if ($method == 'fetch_opt_search_ad_record_type') {
    $query = "SELECT `record_name` FROM `m_record_type` ORDER BY record_name ASC";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo '<option value="">Select record type</option>';
        foreach ($stmt->fetchALL() as $row) {
            echo '<option>' . htmlspecialchars($row['record_name']) . '</option>';
        }
    } else {
        echo '<option value="">Select the record type</option>';
    }
}

// fetch defect category defect record
if ($method == 'fetch_opt_search_ad_defect_category') {
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
if ($method == 'fetch_opt_search_ad_discovery_process') {
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
if ($method == 'fetch_opt_search_ad_occurrence_process') {
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
if ($method == 'fetch_opt_search_ad_outflow_process') {
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

// fetch defect category mancost monitoring
if ($method == 'fetch_opt_search_ad_defect_category_mc') {
    $query = "SELECT `defect_equivalent` FROM `m_mc_defect_c` ORDER BY defect_equivalent ASC";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo '<option value="">Select defect category</option>';
        foreach ($stmt->fetchALL() as $row) {
            echo '<option>' . htmlspecialchars($row['defect_equivalent']) . '</option>';
        }
    } else {
        echo '<option>Select the defect category</option>';
    }
}

// fetch occurrence process mancost monitoring
if ($method == 'fetch_opt_search_ad_occurrence_process_mc') {
    $query = "SELECT `occurrence_equivalent` FROM `m_mc_occurrence_p` ORDER BY occurrence_equivalent ASC";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo '<option value="">Select occurrence process</option>';
        foreach ($stmt->fetchALL() as $row) {
            echo '<option>' . htmlspecialchars($row['occurrence_equivalent']) . '</option>';
        }
    } else {
        echo '<option>Select the occurrence process</option>';
    }
}

// fetch repaired portion treatment mancost monitoring
if ($method == 'fetch_opt_search_ad_portion_treatment_mc') {
    $query = "SELECT `portion_treatment` FROM `m_portion_treatment` ORDER BY portion_treatment ASC";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo '<option value="">Select repair portion treatment</option>';
        foreach ($stmt->fetchALL() as $row) {
            echo '<option>' . htmlspecialchars($row['portion_treatment']) . '</option>';
        }
    } else {
        echo '<option>Select the repair portion treatment</option>';
    }
}

// ====================================================

// function count_qc_defect_table_data($conn)
// {
//     // $query = "SELECT count(id) AS total FROM t_defect_record_f";
//     $query = "SELECT count(id) AS total FROM t_defect_record_f WHERE qc_status = 'SAVED' AND (record_type = 'Defect and Mancost' OR record_type = 'Mancost Only' OR record_type = 'Defect Only')";

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

function count_qc_defect_table_data($conn, $product_name_search, $lot_no_search, $serial_no_search, $record_type_search, $line_no_search, $date_from_search, $date_to_search)
{
    $query = "SELECT COUNT(id) AS total FROM t_defect_record_f WHERE qc_status = 'Saved' AND (record_type IN ('Defect and Mancost', 'Mancost Only', 'Defect Only'))";
    $conditions = [];
    $params = [];

    if (!empty($date_from_search) && !empty($date_to_search)) {
        $conditions[] = "repairing_date BETWEEN ? AND ?";
        $params[] = $date_from_search;
        $params[] = $date_to_search;
    }

    if (!empty($product_name_search)) {
        $conditions[] = "product_name LIKE ?";
        $params[] = '%' . $product_name_search . '%';
    }

    if (!empty($lot_no_search)) {
        $conditions[] = "lot_no LIKE ?";
        $params[] = '%' . $lot_no_search . '%';
    }

    if (!empty($serial_no_search)) {
        $conditions[] = "serial_no LIKE ?";
        $params[] = '%' . $serial_no_search . '%';
    }

    if (!empty($record_type_search)) {
        $conditions[] = "record_type LIKE ?";
        $params[] = '%' . $record_type_search . '%';
    }

    if (!empty($line_no_search)) {
        $conditions[] = "line_no LIKE ?";
        $params[] = '%' . $line_no_search . '%';
    }

    if (!empty($conditions)) {
        $query .= " AND " . implode(" AND ", $conditions);
    }

    $stmt = $conn->prepare($query);

    $stmt->execute($params);

    $total = $stmt->fetchColumn();

    return $total;
}


function count_qc_mancost_table_data($search_arr, $conn)
{
    $query = "SELECT count(id) AS total FROM t_mancost_monitoring_f WHERE defect_id = '" . $search_arr['qc_defect_id'] . "'";
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

if ($method == 'load_qc_defect_table_data_last_page') {
    $record_type_search = trim($_POST['record_type_search']);
    $line_no_search = trim($_POST['line_no_search']);
    $product_name_search = trim($_POST['product_name_search']);
    $lot_no_search = trim($_POST['lot_no_search']);
    $serial_no_search = trim($_POST['serial_no_search']);
    $date_from_search = trim($_POST['date_from_search']);
    $date_to_search = trim($_POST['date_to_search']);

    $results_per_page = 50;

    $number_of_result = intval(count_qc_defect_table_data($conn, $product_name_search, $lot_no_search, $serial_no_search, $record_type_search, $line_no_search, $date_from_search, $date_to_search));

    //determine the total number of pages available  
    $number_of_page = ceil($number_of_result / $results_per_page);

    echo $number_of_page;
    exit;
}

if ($method == 'count_qc_defect_table_data') {
    $record_type_search = trim($_POST['record_type_search']);
    $line_no_search = trim($_POST['line_no_search']);
    $product_name_search = trim($_POST['product_name_search']);
    $lot_no_search = trim($_POST['lot_no_search']);
    $serial_no_search = trim($_POST['serial_no_search']);
    $date_from_search = trim($_POST['date_from_search']);
    $date_to_search = trim($_POST['date_to_search']);

    echo count_qc_defect_table_data($conn, $product_name_search, $lot_no_search, $serial_no_search, $record_type_search, $line_no_search, $date_from_search, $date_to_search);
}

if ($method == 'load_qc_defect_table_data') {
    $record_type_search = trim($_POST['record_type_search']);
    $line_no_search = trim($_POST['line_no_search']);
    $product_name_search = trim($_POST['product_name_search']);
    $lot_no_search = trim($_POST['lot_no_search']);
    $serial_no_search = trim($_POST['serial_no_search']);
    $date_from_search = trim($_POST['date_from_search']);
    $date_to_search = trim($_POST['date_to_search']);

    $current_page = intval($_POST['current_page']);
    $c = 0;

    $results_per_page = 50;

    $page_first_result = ($current_page - 1) * $results_per_page;

    $query = "SELECT * FROM t_defect_record_f";
    $conditions = [];
    $params = [];

    if (!empty($date_from_search) && !empty($date_to_search)) {
        $conditions[] = "repairing_date BETWEEN '$date_from_search' AND '$date_to_search'";
    }

    if (!empty($product_name_search)) {
        $conditions[] = "product_name LIKE ?";
        $params[] = '%' . $product_name_search . '%';
    }

    if (!empty($lot_no_search)) {
        $conditions[] = "lot_no LIKE ?";
        $params[] = '%' . $lot_no_search . '%';
    }

    if (!empty($serial_no_search)) {
        $conditions[] = "serial_no LIKE ?";
        $params[] = '%' . $serial_no_search . '%';
    }

    if (!empty($record_type_search)) {
        $conditions[] = "record_type LIKE ?";
        $params[] = '%' . $record_type_search . '%';
    }

    if (!empty($line_no_search)) {
        $conditions[] = "line_no LIKE ?";
        $params[] = '%' . $line_no_search . '%';
    }

    $conditions[] = "qc_status = 'Saved'";
    $conditions[] = "(record_type = 'Defect and Mancost' OR record_type = 'Mancost Only' OR record_type = 'Defect Only')";

    if (!empty($conditions)) {
        $query .= " WHERE " . implode(" AND ", $conditions);
    }

    $query .= " ORDER BY repairing_date DESC";

    $query .= " LIMIT " . $page_first_result . ", " . $results_per_page;

    $stmt = $conn->prepare($query);
    $stmt->execute($params);

    if ($stmt->rowCount() > 0) {
        foreach ($stmt->fetchAll() as $row) {
            $c++;
            echo '<tr style="cursor:pointer; text-align:center;" class="modal-trigger" onclick="load_qc_mancost_table(\'' . $row['id'] . '~!~' . $row['defect_id'] . '\')">';
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


// if ($method == 'load_qc_defect_table_data') {
//     $record_type_search = $_POST['record_type_search'] != '' ? $_POST['record_type_search'] : '%';
//     $line_no_search = $_POST['line_no_search'] != '' ? $_POST['line_no_search'] : '%';
//     $product_name_search = $_POST['product_name_search'] != '' ? $_POST['product_name_search'] : '%';
//     $lot_no_search = $_POST['lot_no_search'] != '' ? $_POST['lot_no_search'] : '%';
//     $serial_no_search = $_POST['serial_no_search'] != '' ? $_POST['serial_no_search'] : '%';

//     $current_page = intval($_POST['current_page']);
//     $c = 0;

//     $results_per_page = 50;

//     //determine the sql LIMIT starting number for the results on the displaying page
//     $page_first_result = ($current_page - 1) * $results_per_page;

//     $c = $page_first_result;

//     // $query = "SELECT * FROM t_defect_record_f ORDER BY repairing_date DESC LIMIT " . $page_first_result . ", " . $results_per_page;
//     // $query = "SELECT * FROM t_defect_record_f LIMIT " . $page_first_result . ", " . $results_per_page;

//     // $query = "SELECT * FROM t_defect_record_f WHERE qc_status = 'SAVED' AND (record_type = 'Defect and Mancost' OR record_type = 'Mancost Only' OR record_type = 'Defect Only') LIMIT " . $page_first_result . ", " . $results_per_page;

//     $query = "SELECT * FROM `t_defect_record_f`";
//     $conditions = [];

//     if (!empty($product_name_search)) {
//         $conditions[] = "product_name LIKE ?";
//     }

//     if (!empty($lot_no_search)) {
//         $conditions[] = "lot_no LIKE ?";
//     }

//     if (!empty($serial_no_search)) {
//         $conditions[] = "serial_no LIKE ?";
//     }

//     if (!empty($record_type_search)) {
//         $conditions[] = "record_type LIKE ?";
//     }

//     if (!empty($line_no_search)) {
//         $conditions[] = "line_no LIKE ?";
//     }

//     $conditions[] = "qc_status = 'Saved'";
//     $conditions[] = "(record_type = 'Defect and Mancost' OR record_type = 'Mancost Only' OR record_type = 'Defect Only')";

//     if (!empty($conditions)) {
//         $query .= " WHERE " . implode(" AND ", $conditions);
//     }

//     $stmt = $conn->prepare($query);
//     $stmt->execute();
//     if ($stmt->rowCount() > 0) {
//         foreach ($stmt->fetchALL() as $row) {
//             $c++;
//             echo '<tr style="cursor:pointer; text-align:center;" class="modal-trigger" onclick="load_qc_mancost_table(&quot;' . $row['id'] . '~!~' . $row['defect_id'] . '&quot;)">';
//             echo '<td style="text-align:center;">' . $c . '</td>';
//             echo '<td style="text-align:center;">' . $row['line_no'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['category'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['date_detected'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['issue_no_tag'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['repairing_date'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['car_maker'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['product_name'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['lot_no'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['serial_no'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['discovery_process'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['discovery_id_num'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['discovery_person'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['occurrence_process'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['occurrence_shift'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['occurrence_id_num'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['occurrence_person'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['outflow_process'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['outflow_shift'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['outflow_id_num'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['outflow_person'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['defect_category'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['sequence_num'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['defect_cause'] . '</td>';
//             echo '<td style="text-align:left;">' . $row['defect_detail_content'] . '</td>';
//             echo '<td style="text-align:left;">' . $row['defect_treatment_content'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['dis_assembled_by'] . '</td>';
//             echo '</tr>';
//         }
//     } else {
//         echo '<tr>';
//         echo '<td colspan="12" style="text-align:center; color:red;">No Result</td>';
//         echo '</tr>';
//     }
//     exit;
// }

if ($method == 'load_qc_mancost_table_data_last_page') {
    $qc_defect_id = $_POST['qc_defect_id'];

    $search_arr = array(
        "qc_defect_id" => $qc_defect_id
    );

    $results_per_page = 50;

    $number_of_result = intval(count_qc_mancost_table_data($search_arr, $conn));

    //determine the total number of pages available  
    $number_of_page = ceil($number_of_result / $results_per_page);

    echo $number_of_page;
    exit;
}

if ($method == 'count_qc_mancost_table_data') {
    $qc_defect_id = $_POST['qc_defect_id'];

    $search_arr = array(
        "qc_defect_id" => $qc_defect_id
    );

    echo count_qc_mancost_table_data($search_arr, $conn);
    exit;
}

if ($method == 'load_qc_mancost_table_data') {
    $qc_defect_id = $_POST['qc_defect_id'];
    $current_page = intval($_POST['current_page']);

    $c = 0;

    $row_class_arr = array('modal-trigger', 'modal-trigger bg-success', 'modal-trigger bg-danger', 'modal-trigger bg-secondary');
    $row_class = $row_class_arr[0];

    $results_per_page = 50;

    //determine the sql LIMIT starting number for the results on the displaying page
    $page_first_result = ($current_page - 1) * $results_per_page;

    $c = $page_first_result;

    // $query = "SELECT * FROM t_mancost_monitoring_f WHERE defect_id = '$defect_id' LIMIT " . $page_first_result . ", " . $results_per_page;

    $query = "SELECT t_mancost_monitoring_f.id, t_defect_record_f.defect_id, t_defect_record_f.car_maker, t_defect_record_f.line_no, t_defect_record_f.category,t_defect_record_f.repairing_date, t_mancost_monitoring_f.repair_start, t_mancost_monitoring_f.repair_end, t_mancost_monitoring_f.time_consumed, t_mancost_monitoring_f.defect_category, t_mancost_monitoring_f.occurrence_process, t_mancost_monitoring_f.parts_removed, t_mancost_monitoring_f.quantity, t_mancost_monitoring_f.unit_cost, t_mancost_monitoring_f.material_cost, t_mancost_monitoring_f.manhour_cost, t_mancost_monitoring_f.repaired_portion_treatment, t_mancost_monitoring_f.qc_verification, t_mancost_monitoring_f.checking_date_sign, t_mancost_monitoring_f.verified_by, t_mancost_monitoring_f.remarks, t_mancost_monitoring_f.record_added_by FROM t_defect_record_f LEFT JOIN t_mancost_monitoring_f ON t_defect_record_f.defect_id = t_mancost_monitoring_f.defect_id WHERE t_defect_record_f.defect_id = '$qc_defect_id'";

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

            echo '<tr style="cursor:pointer;" class="' . $row_class . '" class="modal_trigger" onclick="get_update_defect_mancost_qc(\'' . $row['id'] . '\',\'' . $row['car_maker'] . '\',\'' . $row['line_no'] . '\',\'' . $row['repairing_date'] . '\',\'' . $row['repair_start'] . '\',\'' . $row['repair_end'] . '\',\'' . $row['time_consumed'] . '\',\'' . $row['defect_category'] . '\',\'' . $row['occurrence_process'] . '\',\'' . $row['parts_removed'] . '\',\'' . $row['quantity'] . '\',\'' . $row['unit_cost'] . '\',\'' . $row['material_cost'] . '\',\'' . $row['manhour_cost'] . '\',\'' . $row['repaired_portion_treatment'] . '\',\'' . $row['qc_verification'] . '\',\'' . $row['checking_date_sign'] . '\',\'' . $row['verified_by'] . '\',\'' . $row['remarks'] . '\',\'' . $row['defect_id'] . '\')">';

            // echo '<tr style="cursor:pointer;">';
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

            echo '<td style="text-align:center;">' . $row['qc_verification'] . '</td>';
            echo '<td style="text-align:center;">' . $row['checking_date_sign'] . '</td>';
            echo '<td style="text-align:center;">' . $row['verified_by'] . '</td>';
            echo '<td style="text-align:center;">' . $row['remarks'] . '</td>';

            echo '<td style="text-align:center;">' . $row['record_added_by'] . '</td>';
            echo '</tr>';
        }
    } else {
        echo '<tr>';
        echo '<td colspan="12" style="text-align:center; color:red;">No Result</td>';
        echo '</tr>';
    }
    exit;
}

// search product name, line no, and serial no
// if ($method == 'search_qc') {
//     $record_type_search = $_POST['record_type_search'] != '' ? $_POST['record_type_search'] : '%';
//     $line_no_search = $_POST['line_no_search'] != '' ? $_POST['line_no_search'] : '%';
//     $product_name_search = $_POST['product_name_search'] != '' ? $_POST['product_name_search'] : '%';
//     $lot_no_search = $_POST['lot_no_search'] != '' ? $_POST['lot_no_search'] : '%';
//     $serial_no_search = $_POST['serial_no_search'] != '' ? $_POST['serial_no_search'] : '%';

//     $c = 0;

//     echo '<thead style="text-align: center;">
//             <tr>
//             <th>#</th>
//             <th>Line No.</th>
//             <th>Category</th>
//             <th>Date Detected</th>
//             <th>Issue No. Tag</th>
//             <th>Repairing Date</th>
//             <th>Car Maker</th>
//             <th>Product Name</th>
//             <th>Lot No.</th>
//             <th>Serial No.</th>
//             <th>Discovery Process</th>
//             <th>Discovery ID Number</th>
//             <th>Discovery Person</th>
//             <th>Occurrence Process</th>
//             <th>Occurrence Shift</th>
//             <th>Occurrence ID Number</th>
//             <th>Occurrence Person</th>
//             <th>Outflow Process</th>
//             <th>Outflow Shift</th>
//             <th>Outflow ID Number</th>
//             <th>Outflow Person</th>
//             <th>Defect Category</th>
//             <th>Sequence Number</th>
//             <th>Cause of Defect</th>
//             <th>Detail in Content of Defect</th>
//             <th>Treatment Content of Defect</th>
//             <th>Dis-assembled/Dis-inserted by: (Repair Person)</th>
//             </tr>
//         </thead>
//         <tbody class="mb-0" id="admin_defect_table_data" style="background: #F9F9F9;">';

//     $query = "SELECT * FROM `t_defect_record_f`";
//     $conditions = [];

//     if (!empty($product_name_search)) {
//         $conditions[] = "product_name LIKE ?";
//     }

//     if (!empty($lot_no_search)) {
//         $conditions[] = "lot_no LIKE ?";
//     }

//     if (!empty($serial_no_search)) {
//         $conditions[] = "serial_no LIKE ?";
//     }

//     if (!empty($record_type_search)) {
//         $conditions[] = "record_type LIKE ?";
//     }

//     if (!empty($line_no_search)) {
//         $conditions[] = "line_no LIKE ?";
//     }

//     $conditions[] = "qc_status = 'Saved'";

//     if (!empty($conditions)) {
//         $query .= " WHERE " . implode(" AND ", $conditions);
//     }

//     $stmt = $conn->prepare($query);
//     $stmt->execute([$product_name_search, $lot_no_search, $serial_no_search, $record_type_search]);

//     if ($stmt->rowCount() > 0) {
//         foreach ($stmt->fetchAll() as $row) {
//             $c++;
//             echo '<tr style="cursor:pointer;" class="modal-trigger" onclick="load_admin_mancost_table(&quot;' . $row['id'] . '~!~' . $row['defect_id'] . '&quot;)">';
//             echo '<td style="text-align:center;">' . $c . '</td>';
//             echo '<td style="text-align:center;">' . $row['line_no'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['category'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['date_detected'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['issue_no_tag'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['repairing_date'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['car_maker'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['product_name'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['lot_no'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['serial_no'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['discovery_process'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['discovery_id_num'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['discovery_person'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['occurrence_process'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['occurrence_shift'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['occurrence_id_num'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['occurrence_person'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['outflow_process'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['outflow_shift'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['outflow_id_num'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['outflow_person'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['defect_category'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['sequence_num'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['defect_cause'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['defect_detail_content'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['defect_treatment_content'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['dis_assembled_by'] . '</td>';
//             echo '</tr>';
//         }
//     } else {
//         echo '<tr>';
//         echo '<td colspan="10" style="text-align:center; color:red;">No Record Found</td>';
//         echo '</tr>';
//     }
//     echo '</tbody>';
// }

if ($method == 'update_mancost2_record') {
    $id = $_POST['id'];

    $qc_verification = $_POST['qc_verification'];
    $checking_date = $_POST['checking_date'];
    $verified_by = $_POST['verified_by'];
    $remarks = $_POST['remarks'];

    $admin_defect_id = $_POST['admin_defect_id'];

    $status = 'Verified';
    $record_updated_by = $_SESSION['full_name'];

    $qc_status = 'Verified';

    $error = 0;
    $message = "";

    $check_query = "SELECT defect_id FROM t_defect_record_f WHERE defect_id = :admin_defect_id";
    $stmt_check = $conn->prepare($check_query);
    $stmt_check->bindParam(':admin_defect_id', $admin_defect_id);
    $stmt_check->execute();

    if ($stmt_check->rowCount() > 0) {
        $update_query = "UPDATE t_mancost_monitoring_f SET qc_verification = :qc_verification, checking_date_sign = :checking_date_sign, verified_by = :verified_by, remarks = :remarks, status = :status, record_updated_by = :record_updated_by WHERE defect_id = :defect_id AND id = :id";

        $stmt_update = $conn->prepare($update_query);
        $stmt_update->bindParam(':qc_verification', $qc_verification);
        $stmt_update->bindParam(':checking_date_sign', $checking_date);
        $stmt_update->bindParam(':verified_by', $verified_by);
        $stmt_update->bindParam(':remarks', $remarks);
        $stmt_update->bindParam(':status', $status);
        $stmt_update->bindParam(':record_updated_by', $record_updated_by);
        $stmt_update->bindParam(':defect_id', $admin_defect_id);
        $stmt_update->bindParam(':id', $id);
        $stmt_update->execute();

        if ($stmt_update->rowCount() > 0) {

            $verify_query = "SELECT defect_id FROM t_mancost_monitoring_f WHERE defect_id = :admin_defect_id AND qc_verification IS NULL";
            $stmt_verify = $conn->prepare($verify_query);
            $stmt_verify->bindParam(':admin_defect_id', $admin_defect_id);
            $stmt_verify->execute();

            if ($stmt_verify->rowCount() < 1) {
                $verified_query = "UPDATE t_defect_record_f SET qc_status = :qc_status WHERE defect_id = :defect_id";

                $stmt_verified = $conn->prepare($verified_query);
                $stmt_verified->bindParam(':qc_status', $qc_status);
                $stmt_verified->bindParam(':defect_id', $admin_defect_id);
                $stmt_verified->execute();

                // if ($stmt_verified->rowCount() > 0) {
                //     echo 'success';
                // } 
                // else {
                //     $error++;
                //     $message = "Error updating data in t_mancost_monitoring_f";
                // }
            }
            echo 'success';
        } else {
            $error++;
            $message = "Error updating data in t_mancost_monitoring_f";
        }
    } else {
        $error++;
        $message = "Sample ID does not exist in t_defect_record_f";
    }



    if ($error > 0) {
        echo $message;
    }
}

// if ($method == 'search_defect_qc') {
//     $status_search = $_POST['status_search'];
//     $admin_defect_id = $_POST['admin_defect_id'];

//     $c = 0;
//     $row_class_arr = array('modal-trigger', 'modal-trigger bg-success', 'modal-trigger bg-danger', 'modal-trigger bg-secondary');
//     $row_class = $row_class_arr[0];

//     // Assuming you have a unique identifier for each record, replace 'unique_id_column' with the actual column name

//     if ($status_search == 'ALL') {
//         $query = "SELECT * FROM t_mancost_monitoring_f WHERE defect_id = :defect_id";
//     } else {
//         $query = "SELECT * FROM t_mancost_monitoring_f WHERE qc_verification LIKE :status_search AND defect_id = :defect_id";
//     }

//     $stmt = $conn->prepare($query);
//     $stmt->bindParam(':status_search', '%' . $status_search . '%');
//     $stmt->bindParam(':defect_id', $admin_defect_id);
//     $stmt->execute();

//     if ($stmt->rowCount() > 0) {
//         foreach ($stmt->fetchAll() as $row) {
//             $c++;

//             if ($row['qc_verification'] == 'N/A') {
//                 $row_class = $row_class_arr[3];
//             } else if ($row['qc_verification'] == 'NO GOOD') {
//                 $row_class = $row_class_arr[2];
//             } else if ($row['qc_verification'] == 'GOOD') {
//                 $row_class = $row_class_arr[1];
//             } else {
//                 $row_class = $row_class_arr[0];
//             }

//             echo '<tr style="cursor:pointer;" class="' . $row_class . '">';
//             echo '<td>' . $c . '</td>';
//             echo '<td style="text-align:center;">' . $row['car_maker'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['line_no'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['repairing_date'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['repair_start'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['repair_end'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['time_consumed'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['defect_category'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['occurrence_process'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['parts_removed'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['quantity'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['unit_cost'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['material_cost'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['manhour_cost'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['repaired_portion_treatment'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['re_checking'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['qc_verification'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['checking_date_sign'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['record_added_by'] . '</td>';
//             echo '</tr>';
//         }
//     } else {
//         echo '<tr>';
//         echo '<td colspan="4" style="text-align:center; color:red;">No Result</td>';
//         echo '</tr>';
//     }
// }

$conn = NULL;
