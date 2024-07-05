<?php

session_start();
include '../conn.php';

$method = $_POST['method'];

if ($method == 'fetch_opt_update_discovery_process') {
    $query = "SELECT `discovery_process` FROM `m_dr_discovery_p` ORDER BY discovery_process ASC";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo '<option value="" disabled>Select discovery process</option>';
        foreach ($stmt->fetchALL() as $row) {
            echo '<option>' . htmlspecialchars($row['discovery_process']) . '</option>';
        }
    } else {
        echo '<option value="">Select discovery process</option>';
    }
}

if ($method == 'fetch_opt_update_occurrence_process') {
    $query = "SELECT `occurrence_process` FROM `m_dr_occurrence_p` ORDER BY occurrence_process ASC";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo '<option value="" disabled>Select occurrence process</option>';
        foreach ($stmt->fetchALL() as $row) {
            echo '<option>' . htmlspecialchars($row['occurrence_process']) . '</option>';
        }
    } else {
        echo '<option value="">Select occurrence process</option>';
    }
}

if ($method == 'fetch_opt_update_outflow_process') {
    $query = "SELECT `outflow_process` FROM `m_dr_outflow_p` ORDER BY outflow_process ASC";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo '<option value="" disabled>Select outflow process</option>';
        foreach ($stmt->fetchALL() as $row) {
            echo '<option>' . htmlspecialchars($row['outflow_process']) . '</option>';
        }
    } else {
        echo '<option value="">Select outflow process</option>';
    }
}

if ($method == 'fetch_opt_update_defect_category') {
    $query = "SELECT `defect_category_ng_content` FROM `m_dr_defect_c` ORDER BY defect_category_ng_content ASC";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo '<option value="" disabled>Select defect category</option>';
        foreach ($stmt->fetchALL() as $row) {
            echo '<option>' . htmlspecialchars($row['defect_category_ng_content']) . '</option>';
        }
    } else {
        echo '<option value="">Select defect category</option>';
    }
}

if ($method == 'fetch_opt_update_repair_person') {
    $query = "SELECT `rp_name` FROM `m_repair_person` ORDER BY rp_name ASC";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo '<option value="" disabled>Select repair person</option>';
        foreach ($stmt->fetchALL() as $row) {
            echo '<option>' . htmlspecialchars($row['rp_name']) . '</option>';
        }
    } else {
        echo '<option value="">Select repair person</option>';
    }
}

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
    $query = "SELECT COUNT(id) AS total FROM t_defect_record_f WHERE qc_status = 'Saved' AND (record_type IN ('Defect and Mancost', 'Defect Only'))";
    // $query = "SELECT COUNT(id) AS total FROM t_defect_record_f WHERE qc_status = 'Saved' AND (record_type IN ('Defect and Mancost', 'Mancost Only', 'Defect Only'))";
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

    // $query .= " ORDER BY repairing_date DESC";
    $query .= " ORDER BY record_added_defect_datetime DESC";

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
            echo '<td style="text-align:center;">' . $row['occurrence_process_dr'] . '</td>';
            echo '<td style="text-align:center;">' . $row['occurrence_shift'] . '</td>';
            echo '<td style="text-align:center;">' . $row['occurrence_id_num'] . '</td>';
            echo '<td style="text-align:center;">' . $row['occurrence_person'] . '</td>';
            echo '<td style="text-align:center;">' . $row['outflow_process'] . '</td>';
            echo '<td style="text-align:center;">' . $row['outflow_shift'] . '</td>';
            echo '<td style="text-align:center;">' . $row['outflow_id_num'] . '</td>';
            echo '<td style="text-align:center;">' . $row['outflow_person'] . '</td>';
            echo '<td style="text-align:center;">' . $row['defect_category_dr'] . '</td>';
            echo '<td style="text-align:center;">' . $row['sequence_num'] . '</td>';
            echo '<td style="text-align:center;">' . $row['assy_board_no'] . '</td>';
            echo '<td style="text-align:center;">' . $row['defect_cause'] . '</td>';
            echo '<td style="text-align:left;">' . $row['good_measurement'] . '</td>';
            echo '<td style="text-align:left;">' . $row['ng_measurement'] . '</td>';
            echo '<td style="text-align:left;">' . $row['wire_type'] . '</td>';
            echo '<td style="text-align:left;">' . $row['wire_size'] . '</td>';
            echo '<td style="text-align:left;">' . $row['connector_cavity'] . '</td>';
            echo '<td style="text-align:left;">' . $row['defect_detail_content'] . '</td>';
            echo '<td style="text-align:left;">' . $row['defect_treatment_content'] . '</td>';
            echo '<td style="text-align:left;">' . $row['harness_status'] . '</td>';
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

    $page_first_result = ($current_page - 1) * $results_per_page;

    $c = $page_first_result;

    // $query = "SELECT t_mancost_monitoring_f.id, t_defect_record_f.defect_id, 
    // t_defect_record_f.car_maker, t_defect_record_f.line_no, t_defect_record_f.category, t_defect_record_f.date_detected,
    // t_defect_record_f.repairing_date, t_mancost_monitoring_f.repair_start, t_mancost_monitoring_f.repair_end, t_mancost_monitoring_f.time_consumed, t_mancost_monitoring_f.defect_category, t_mancost_monitoring_f.occurrence_process, t_mancost_monitoring_f.parts_removed, t_mancost_monitoring_f.quantity, t_mancost_monitoring_f.unit_cost, t_mancost_monitoring_f.material_cost, t_mancost_monitoring_f.manhour_cost, t_mancost_monitoring_f.repaired_portion_treatment, t_mancost_monitoring_f.qc_verification, t_mancost_monitoring_f.checking_date_sign, t_mancost_monitoring_f.verified_by, t_mancost_monitoring_f.remarks, t_mancost_monitoring_f.record_added_by FROM t_defect_record_f LEFT JOIN t_mancost_monitoring_f ON t_defect_record_f.defect_id = t_mancost_monitoring_f.defect_id WHERE t_defect_record_f.defect_id = '$qc_defect_id'";

    $query = "SELECT m.id, d.defect_id, 
            d.car_maker, d.line_no, d.category, d.date_detected, d.issue_no_tag,
            d.product_name, d.lot_no, d.serial_no, d.discovery_process, d.discovery_id_num,
            d.discovery_person, d.occurrence_process_dr, d.occurrence_shift, d.occurrence_id_num, d.occurrence_person,
            d.outflow_process, d.outflow_shift, d.outflow_id_num, d.outflow_person, d.defect_category_dr,
            d.sequence_num, d.assy_board_no, d.defect_cause, d.good_measurement, d.ng_measurement, 
            d.wire_type, d.wire_size, d.connector_cavity, d.defect_detail_content, d.defect_treatment_content, 
            d.harness_status, d.dis_assembled_by, d.repairing_date, 
            m.repair_start, m.repair_end, m.time_consumed, m.defect_category_mc, 
            m.occurrence_process_mc, m.parts_removed, 
            m.quantity, m.unit_cost, m.material_cost, 
            m.manhour_cost, m.repaired_portion_treatment, m.qc_verification, m.checking_date_sign, m.verified_by, 
            m.remarks, m.record_added_by 
            FROM 
                t_defect_record_f AS d 
            LEFT JOIN 
                t_mancost_monitoring_f AS m 
            ON 
                d.defect_id = m.defect_id 
            WHERE 
                d.defect_id = '$qc_defect_id'";

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

            echo '<tr style="cursor:pointer;" class="' . $row_class . ' modal_trigger" onclick="get_update_defect_mancost_qc(\'' . $row['id'] . '\',
            \'' . $row['car_maker'] . '\',\'' . $row['line_no'] . '\', \'' . $row['category'] . '\', \'' . $row['date_detected'] . '\', \'' . $row['issue_no_tag'] . '\', 
            \'' . $row['product_name'] . '\', \'' . $row['lot_no'] . '\', \'' . $row['serial_no'] . '\', \'' . $row['discovery_process'] . '\', \'' . $row['discovery_id_num'] . '\', 
            \'' . $row['discovery_person'] . '\', \'' . $row['occurrence_process_dr'] . '\', \'' . $row['occurrence_shift'] . '\', \'' . $row['occurrence_id_num'] . '\', \'' . $row['occurrence_person'] . '\', 
            \'' . $row['outflow_process'] . '\', \'' . $row['outflow_shift'] . '\', \'' . $row['outflow_id_num'] . '\', \'' . $row['outflow_person'] . '\', \'' . $row['defect_category_dr'] . '\', 
            \'' . $row['sequence_num'] . '\', \'' . $row['assy_board_no'] . '\',
            \'' . $row['defect_cause'] . '\', \'' . $row['good_measurement'] . '\', \'' . $row['ng_measurement'] . '\',
            \'' . $row['wire_type'] . '\', \'' . $row['wire_size'] . '\', \'' . $row['connector_cavity'] . '\',
            \'' . $row['dis_assembled_by'] . '\', \'' . $row['defect_detail_content'] . '\', \'' . $row['defect_treatment_content'] . '\', \'' . $row['harness_status'] . '\', 
            \'' . $row['repairing_date'] . '\',\'' . $row['repair_start'] . '\',\'' . $row['repair_end'] . '\',\'' . $row['time_consumed'] . '\',\'' . $row['defect_category_mc'] . '\',
            \'' . $row['occurrence_process_mc'] . '\',\'' . $row['parts_removed'] . '\',
            \'' . $row['quantity'] . '\',\'' . $row['unit_cost'] . '\',\'' . $row['material_cost'] . '\',
            \'' . $row['manhour_cost'] . '\',\'' . $row['repaired_portion_treatment'] . '\',\'' . $row['qc_verification'] . '\',\'' . $row['checking_date_sign'] . '\',\'' . $row['verified_by'] . '\',
            \'' . $row['remarks'] . '\',\'' . $row['defect_id'] . '\')">';

            echo '<td style="text-align:center;">' . $c . '</td>';
            echo '<td style="text-align:center;">' . $row['car_maker'] . '</td>';
            echo '<td style="text-align:center;">' . $row['line_no'] . '</td>';
            echo '<td style="text-align:center;">' . $row['category'] . '</td>';
            echo '<td style="text-align:center;">' . $row['repair_start'] . '</td>';
            echo '<td style="text-align:center;">' . $row['repair_end'] . '</td>';
            echo '<td style="text-align:center;">' . $row['time_consumed'] . '</td>';
            echo '<td style="text-align:center;">' . $row['defect_category_mc'] . '</td>';
            echo '<td style="text-align:center;">' . $row['occurrence_process_mc'] . '</td>';
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

// FOR OLD QC VERIFICATION
// if ($method == 'update_mancost2_record') {
//     $id = $_POST['id'];

//     $qc_verification = $_POST['qc_verification'];
//     $checking_date = $_POST['checking_date'];
//     $verified_by = $_POST['verified_by'];
//     $remarks = $_POST['remarks'];

//     $admin_defect_id = $_POST['admin_defect_id'];

//     $status = 'Verified';
//     $record_updated_by = $_SESSION['full_name'];

//     $qc_status = 'Verified';

//     $error = 0;
//     $message = "";

//     $check_query = "SELECT defect_id FROM t_defect_record_f WHERE defect_id = :admin_defect_id";
//     $stmt_check = $conn->prepare($check_query);
//     $stmt_check->bindParam(':admin_defect_id', $admin_defect_id);
//     $stmt_check->execute();

//     if ($stmt_check->rowCount() > 0) {
//         $update_query = "UPDATE t_mancost_monitoring_f SET qc_verification = :qc_verification, checking_date_sign = :checking_date_sign, verified_by = :verified_by, remarks = :remarks, status = :status, record_updated_by = :record_updated_by WHERE defect_id = :defect_id AND id = :id";

//         $stmt_update = $conn->prepare($update_query);
//         $stmt_update->bindParam(':qc_verification', $qc_verification);
//         $stmt_update->bindParam(':checking_date_sign', $checking_date);
//         $stmt_update->bindParam(':verified_by', $verified_by);
//         $stmt_update->bindParam(':remarks', $remarks);
//         $stmt_update->bindParam(':status', $status);
//         $stmt_update->bindParam(':record_updated_by', $record_updated_by);
//         $stmt_update->bindParam(':defect_id', $admin_defect_id);
//         $stmt_update->bindParam(':id', $id);
//         $stmt_update->execute();

//         if ($stmt_update->rowCount() > 0) {

//             $verify_query = "SELECT defect_id FROM t_mancost_monitoring_f WHERE defect_id = :admin_defect_id AND qc_verification IS NULL";
//             $stmt_verify = $conn->prepare($verify_query);
//             $stmt_verify->bindParam(':admin_defect_id', $admin_defect_id);
//             $stmt_verify->execute();

//             if ($stmt_verify->rowCount() < 1) {
//                 $verified_query = "UPDATE t_defect_record_f SET qc_status = :qc_status WHERE defect_id = :defect_id";

//                 $stmt_verified = $conn->prepare($verified_query);
//                 $stmt_verified->bindParam(':qc_status', $qc_status);
//                 $stmt_verified->bindParam(':defect_id', $admin_defect_id);
//                 $stmt_verified->execute();
//             }
//             echo 'success';
//         } else {
//             $error++;
//             $message = "Error updating data in t_mancost_monitoring_f";
//         }
//     } else {
//         $error++;
//         $message = "Sample ID does not exist in t_defect_record_f";
//     }
//     if ($error > 0) {
//         echo $message;
//     }
// }

// FOR NEW QC VERIFICATION
if ($method == 'update_mancost2_record') {
    $id = $_POST['id'];
    $car_maker = $_POST['car_maker'];
    $line_no = $_POST['line_no'];
    $date_detected = $_POST['date_detected'];
    $issue_no_tag = $_POST['issue_no_tag'];
    $product_name = $_POST['product_name'];
    $lot_no = $_POST['lot_no'];
    $serial_no = $_POST['serial_no'];
    $discovery_process = $_POST['discovery_process'];
    $occurrence_process_dr = $_POST['occurrence_process_dr'];
    $outflow_process = $_POST['outflow_process'];
    $outflow_id_no = $_POST['outflow_id_no'];
    $outflow_person = $_POST['outflow_person'];
    $defect_category_2 = $_POST['defect_category_2'];
    $sequence_no = $_POST['sequence_no'];
    $repair_person = $_POST['repair_person'];
    $treatment_content_defect = $_POST['treatment_content_defect'];
    $qc_verification = $_POST['qc_verification'];
    $checking_date = $_POST['checking_date'];
    $verified_by = $_POST['verified_by'];
    $remarks = $_POST['remarks'];
    $admin_defect_id = $_POST['admin_defect_id'];

    $status = 'Verified';
    $record_updated_by = $_SESSION['full_name'];
    $qc_status = 'Verified';

    // Check if the defect record exists
    $check_query = "SELECT defect_id FROM t_defect_record_f WHERE defect_id = :admin_defect_id";
    $stmt_check = $conn->prepare($check_query);
    $stmt_check->bindParam(':admin_defect_id', $admin_defect_id);
    $stmt_check->execute();

    if ($stmt_check->rowCount() > 0) {
        // Update t_defect_record_f table
        $update_defect_query = "UPDATE t_defect_record_f SET 
            car_maker = :car_maker, 
            line_no = :line_no,
            date_detected = :date_detected, 
            issue_no_tag = :issue_no_tag, 
            product_name = :product_name, 
            lot_no = :lot_no, 
            serial_no = :serial_no,
            discovery_process = :discovery_process, 
            occurrence_process_dr = :occurrence_process_dr, 
            outflow_process = :outflow_process, 
            outflow_id_num = :outflow_id_no, 
            defect_category_dr = :defect_category_dr,
            sequence_num = :sequence_no,
            dis_assembled_by = :repair_person, 
            defect_treatment_content = :treatment_content_defect
            WHERE defect_id = :admin_defect_id";

        $stmt_update_defect = $conn->prepare($update_defect_query);
        $stmt_update_defect->bindParam(':car_maker', $car_maker);
        $stmt_update_defect->bindParam(':line_no', $line_no);
        $stmt_update_defect->bindParam(':date_detected', $date_detected);
        $stmt_update_defect->bindParam(':issue_no_tag', $issue_no_tag);
        $stmt_update_defect->bindParam(':product_name', $product_name);
        $stmt_update_defect->bindParam(':lot_no', $lot_no);
        $stmt_update_defect->bindParam(':serial_no', $serial_no);
        $stmt_update_defect->bindParam(':discovery_process', $discovery_process);
        $stmt_update_defect->bindParam(':occurrence_process_dr', $occurrence_process_dr);
        $stmt_update_defect->bindParam(':outflow_process', $outflow_process);
        $stmt_update_defect->bindParam(':outflow_id_no', $outflow_id_no);
        $stmt_update_defect->bindParam(':defect_category_dr', $defect_category_2);
        $stmt_update_defect->bindParam(':sequence_no', $sequence_no);
        $stmt_update_defect->bindParam(':repair_person', $repair_person);
        $stmt_update_defect->bindParam(':treatment_content_defect', $treatment_content_defect);
        $stmt_update_defect->bindParam(':admin_defect_id', $admin_defect_id);
        $stmt_update_defect->execute();

        // Update t_mancost_monitoring_f table
        $update_mancost_query = "UPDATE t_mancost_monitoring_f SET 
            qc_verification = :qc_verification, 
            checking_date_sign = :checking_date, 
            verified_by = :verified_by, 
            remarks = :remarks, 
            status = :status, 
            record_updated_by = :record_updated_by 
            WHERE defect_id = :admin_defect_id AND id = :id";

        $stmt_update_mancost = $conn->prepare($update_mancost_query);
        $stmt_update_mancost->bindParam(':qc_verification', $qc_verification);
        $stmt_update_mancost->bindParam(':checking_date', $checking_date);
        $stmt_update_mancost->bindParam(':verified_by', $verified_by);
        $stmt_update_mancost->bindParam(':remarks', $remarks);
        $stmt_update_mancost->bindParam(':status', $status);
        $stmt_update_mancost->bindParam(':record_updated_by', $record_updated_by);
        $stmt_update_mancost->bindParam(':admin_defect_id', $admin_defect_id);
        $stmt_update_mancost->bindParam(':id', $id);
        $stmt_update_mancost->execute();

        // Check if all t_mancost_monitoring_f records are verified
        $verify_query = "SELECT defect_id FROM t_mancost_monitoring_f WHERE defect_id = :admin_defect_id AND qc_verification IS NULL";
        $stmt_verify = $conn->prepare($verify_query);
        $stmt_verify->bindParam(':admin_defect_id', $admin_defect_id);
        $stmt_verify->execute();

        if ($stmt_verify->rowCount() == 0) {
            // Update qc_status in t_defect_record_f if all t_mancost_monitoring_f records are verified
            $update_qc_status_query = "UPDATE t_defect_record_f SET qc_status = :qc_status WHERE defect_id = :admin_defect_id";
            $stmt_update_qc_status = $conn->prepare($update_qc_status_query);
            $stmt_update_qc_status->bindParam(':qc_status', $qc_status);
            $stmt_update_qc_status->bindParam(':admin_defect_id', $admin_defect_id);
            $stmt_update_qc_status->execute();
        }

        // Output success if updates were successful
        if ($stmt_update_defect->rowCount() > 0 || $stmt_update_mancost->rowCount() > 0) {
            echo 'success';
        }
    }
}

// if ($method == 'update_mancost2_record') {
//     $id = $_POST['id'];
//     $car_maker = $_POST['car_maker'];
//     $line_no = $_POST['line_no'];
//     $date_detected = $_POST['date_detected'];
//     $issue_no_tag = $_POST['issue_no_tag'];
//     $product_name = $_POST['product_name'];
//     $lot_no = $_POST['lot_no'];
//     $serial_no = $_POST['serial_no'];
//     $discovery_process = $_POST['discovery_process'];
//     $occurrence_process_dr = $_POST['occurrence_process_dr'];
//     $outflow_process = $_POST['outflow_process'];
//     $outflow_id_no = $_POST['outflow_id_no'];
//     $outflow_person = $_POST['outflow_person'];
//     $defect_category_2 = $_POST['defect_category_2'];
//     $sequence_no = $_POST['sequence_no'];
//     $repair_person = $_POST['repair_person'];
//     $treatment_content_defect = $_POST['treatment_content_defect'];
//     $qc_verification = $_POST['qc_verification'];
//     $checking_date = $_POST['checking_date'];
//     $verified_by = $_POST['verified_by'];
//     $remarks = $_POST['remarks'];
//     $admin_defect_id = $_POST['admin_defect_id'];

//     $status = 'Verified';
//     $record_updated_by = $_SESSION['full_name'];
//     $qc_status = 'Verified';

//     // Check if the defect record exists
//     $check_query = "SELECT defect_id FROM t_defect_record_f WHERE defect_id = :admin_defect_id";
//     $stmt_check = $conn->prepare($check_query);
//     $stmt_check->bindParam(':admin_defect_id', $admin_defect_id);
//     $stmt_check->execute();

//     if ($stmt_check->rowCount() > 0) {
//         // Update t_defect_record_f table
//         $update_defect_query = "UPDATE t_defect_record_f SET 
//             car_maker = :car_maker, 
//             line_no = :line_no,
//             date_detected = :date_detected, 
//             issue_no_tag = :issue_no_tag, 
//             product_name = :product_name, 
//             lot_no = :lot_no, 
//             serial_no = :serial_no,
//             discovery_process = :discovery_process, 
//             occurrence_process_dr = :occurrence_process_dr, 
//             outflow_process = :outflow_process, 
//             outflow_id_num = :outflow_id_no, 
//             defect_category_dr = :defect_category_dr,
//             sequence_num = :sequence_no,
//             dis_assembled_by = :repair_person, 
//             defect_treatment_content = :treatment_content_defect
//             WHERE defect_id = :admin_defect_id";

//         $stmt_update_defect = $conn->prepare($update_defect_query);
//         $stmt_update_defect->bindParam(':car_maker', $car_maker);
//         $stmt_update_defect->bindParam(':line_no', $line_no);
//         $stmt_update_defect->bindParam(':date_detected', $date_detected);
//         $stmt_update_defect->bindParam(':issue_no_tag', $issue_no_tag);
//         $stmt_update_defect->bindParam(':product_name', $product_name);
//         $stmt_update_defect->bindParam(':lot_no', $lot_no);
//         $stmt_update_defect->bindParam(':serial_no', $serial_no);
//         $stmt_update_defect->bindParam(':discovery_process', $discovery_process);
//         $stmt_update_defect->bindParam(':occurrence_process_dr', $occurrence_process_dr);
//         $stmt_update_defect->bindParam(':outflow_process', $outflow_process);
//         $stmt_update_defect->bindParam(':outflow_id_no', $outflow_id_no);
//         $stmt_update_defect->bindParam(':defect_category_dr', $defect_category_2);
//         $stmt_update_defect->bindParam(':sequence_no', $sequence_no);
//         $stmt_update_defect->bindParam(':repair_person', $repair_person);
//         $stmt_update_defect->bindParam(':treatment_content_defect', $treatment_content_defect);
//         $stmt_update_defect->bindParam(':admin_defect_id', $admin_defect_id);
//         $stmt_update_defect->execute();

//         // Update t_mancost_monitoring_f table
//         $update_mancost_query = "UPDATE t_mancost_monitoring_f SET 
//             qc_verification = :qc_verification, 
//             checking_date_sign = :checking_date, 
//             verified_by = :verified_by, 
//             remarks = :remarks, 
//             status = :status, 
//             record_updated_by = :record_updated_by 
//             WHERE defect_id = :admin_defect_id AND id = :id";

//         $stmt_update_mancost = $conn->prepare($update_mancost_query);
//         $stmt_update_mancost->bindParam(':qc_verification', $qc_verification);
//         $stmt_update_mancost->bindParam(':checking_date', $checking_date);
//         $stmt_update_mancost->bindParam(':verified_by', $verified_by);
//         $stmt_update_mancost->bindParam(':remarks', $remarks);
//         $stmt_update_mancost->bindParam(':status', $status);
//         $stmt_update_mancost->bindParam(':record_updated_by', $record_updated_by);
//         $stmt_update_mancost->bindParam(':admin_defect_id', $admin_defect_id);
//         $stmt_update_mancost->bindParam(':id', $id);
//         $stmt_update_mancost->execute();

//         // Output success if updates were successful
//         if ($stmt_update_defect->rowCount() > 0 && $stmt_update_mancost->rowCount() > 0) {
//             // Check if all t_mancost_monitoring_f records are verified
//             $verify_query = "SELECT defect_id FROM t_mancost_monitoring_f WHERE defect_id = :admin_defect_id AND qc_verification IS NULL";
//             $stmt_verify = $conn->prepare($verify_query);
//             $stmt_verify->bindParam(':admin_defect_id', $admin_defect_id);
//             $stmt_verify->execute();

//             if ($stmt_verify->rowCount() < 1) {
//                 // Update qc_status in t_defect_record_f if all t_mancost_monitoring_f records are verified
//                 $verified_query = "UPDATE t_defect_record_f SET qc_status = :qc_status WHERE defect_id = :admin_defect_id";
//                 $stmt_verified = $conn->prepare($verified_query);
//                 $stmt_verified->bindParam(':qc_status', $qc_status);
//                 $stmt_verified->bindParam(':admin_defect_id', $admin_defect_id);
//                 $stmt_verified->execute();
//             }
//             echo 'success';
//         }
//     }
// }


$conn = NULL;
