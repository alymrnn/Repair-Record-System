<?php
session_start();
include '../conn.php';
// include '../conn_emp_mgt.php';

$method = $_POST['method'];

if ($method == 'fetch_opt_harness_status_search') {
    $query = "SELECT DISTINCT harness_status FROM m_harness_status ORDER BY harness_status ASC";
    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo '<option value="" disabled selected>Select harness status</option>';
        foreach ($stmt->fetchALL() as $row) {
            echo '<option>' . htmlspecialchars($row['harness_status']) . '</option>';
        }
    } else {
        echo '<option value="">Select harness status</option>';
    }
}

if ($method == 'fetch_opt_line_no_dr') {
    $query = "SELECT DISTINCT line_no FROM m_line_no ORDER BY line_no ASC";
    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo '<option value="" disabled selected>Select line no.</option>';
        foreach ($stmt->fetchALL() as $row) {
            echo '<option>' . htmlspecialchars($row['line_no']) . '</option>';
        }
    } else {
        echo '<option value="">Select line no.</option>';
    }
}

if ($method == 'fetch_opt_line_no_update') {
    $query = "SELECT DISTINCT line_no FROM m_line_no ORDER BY line_no ASC";
    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo '<option value="" disabled selected>Select line no.</option>';
        foreach ($stmt->fetchALL() as $row) {
            echo '<option>' . htmlspecialchars($row['line_no']) . '</option>';
        }
    } else {
        echo '<option value="">Select line no.</option>';
    }
}

// fetch option record type
if ($method == 'fetch_opt_record_type_dr') {
    $query = "SELECT record_name FROM m_record_type ORDER BY record_name ASC";
    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo '<option value="" disabled selected>Record Type</option>';
        foreach ($stmt->fetchALL() as $row) {
            echo '<option>' . htmlspecialchars($row['record_name']) . '</option>';
        }
    } else {
        echo '<option value="">Select the record type</option>';
    }
}

// fetch option line category
if ($method == 'fetch_opt_category_dr') {
    $query = "SELECT category FROM m_category ORDER BY category ASC";
    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo '<option value="" disabled selected>Select category</option>';
        foreach ($stmt->fetchAll() as $row) {
            $category = htmlspecialchars($row['category']);
            echo '<option value="' . $category . '">' . $category . '</option>';
        }
    } else {
        echo '<option value="">Select the category</option>';
    }
}

// fetch option car maker
if ($method == 'fetch_opt_car_maker_dr') {
    $query = "SELECT car_maker FROM m_car_maker ORDER BY car_maker ASC";
    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        foreach ($stmt->fetchAll() as $row) {
            echo '<option value="' . htmlspecialchars($row['car_maker']) . '"></option>';
        }
    } else {
        echo '<option value="">Select the car maker</option>';
    }
}

// fetch option discovery process
if ($method == 'fetch_opt_discovery_process') {
    $query = "SELECT discovery_process FROM m_dr_discovery_p ORDER BY discovery_process ASC";
    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo '<option value="" disabled selected>Select the discovery process</option>';
        foreach ($stmt->fetchALL() as $row) {
            echo '<option>' . htmlspecialchars($row['discovery_process']) . '</option>';
        }
    } else {
        echo '<option>Select the discovery process</option>';
    }
}

// fetch option parts removed
// if ($method == 'fetch_opt_parts_removed') {
//     $query = "SELECT `parts_name` FROM `m_pricelist` ORDER BY parts_name ASC";
//     $stmt = $conn->prepare($query);
//     $stmt->execute();
//     if ($stmt->rowCount() > 0) {
//         echo '<option value="">Input part name</option>';
//         foreach ($stmt->fetchALL() as $row) {
//             echo '<option>' . htmlspecialchars($row['parts_name']) . '</option>';
//         }
//     } else {
//         echo '<option>Input part name</option>';
//     }
// }

// fetch option occurrence process
if ($method == 'fetch_opt_occurrence_process') {
    $query = "SELECT occurrence_process FROM m_dr_occurrence_p ORDER BY occurrence_process ASC";
    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo '<option value="" disabled selected>Select the occurrence process</option>';
        foreach ($stmt->fetchALL() as $row) {
            echo '<option>' . htmlspecialchars($row['occurrence_process']) . '</option>';
        }
    } else {
        echo '<option>Select the occurrence process</option>';
    }
}

// fetch option occurrence shift
if ($method == 'fetch_opt_occurrence_shift') {
    $query = "SELECT shift FROM m_shift ORDER BY shift ASC";
    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo '<option value="" disabled selected>Select the occurrence shift</option>';
        foreach ($stmt->fetchALL() as $row) {
            echo '<option>' . htmlspecialchars($row['shift']) . '</option>';
        }
    } else {
        echo '<option>Select the occurrence shift</option>';
    }
}

// fetch option outflow process
if ($method == 'fetch_opt_outflow_process') {
    $query = "SELECT outflow_process FROM m_dr_outflow_p ORDER BY outflow_process ASC";
    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo '<option value="" disabled selected>Select the outflow process</option>';
        foreach ($stmt->fetchALL() as $row) {
            echo '<option>' . htmlspecialchars($row['outflow_process']) . '</option>';
        }
    } else {
        echo '<option>Select the outflow process</option>';
    }
}

// fetch option outflow shift
if ($method == 'fetch_opt_outflow_shift') {
    $query = "SELECT shift FROM m_shift ORDER BY shift ASC";
    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo '<option value="" disabled selected>Select the outflow shift</option>';
        foreach ($stmt->fetchALL() as $row) {
            echo '<option>' . htmlspecialchars($row['shift']) . '</option>';
        }
    } else {
        echo '<option>Select the outflow shift</option>';
    }
}

// fetch option defect category ng content
if ($method == 'fetch_opt_defect_category') {
    $query = "SELECT defect_category_ng_content FROM m_dr_defect_c ORDER BY defect_category_ng_content ASC";
    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo '<option value="" disabled selected>Select the defect category</option>';
        foreach ($stmt->fetchALL() as $row) {
            echo '<option>' . htmlspecialchars($row['defect_category_ng_content']) . '</option>';
        }
    } else {
        echo '<option>Select the defect category</option>';
    }
}

// fetch option cause of defect
if ($method == 'fetch_opt_defect_cause') {
    $query = "SELECT defect_cause FROM m_defect_cause ORDER BY defect_cause ASC";
    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo '<option value="" disabled selected>Select the cause of defect</option>';
        foreach ($stmt->fetchALL() as $row) {
            echo '<option>' . htmlspecialchars($row['defect_cause']) . '</option>';
        }
    } else {
        echo '<option>Select the cause of defect</option>';
    }
}

// fetch option repair person
if ($method == 'fetch_opt_repair_person') {
    $query = "SELECT rp_name FROM m_repair_person ORDER BY rp_name ASC";
    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo '<option value="" disabled selected>Select the repair person</option>';
        foreach ($stmt->fetchALL() as $row) {
            echo '<option>' . htmlspecialchars($row['rp_name']) . '</option>';
        }
    } else {
        echo '<option>Select the repair person</option>';
    }
}

// fetch option defect category mancost
if ($method == 'fetch_opt_defect_category_mc') {
    $query = "SELECT defect_equivalent FROM m_mc_defect_c ORDER BY defect_equivalent ASC";
    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo '<option value="" disabled selected>Select the defect category</option>';
        foreach ($stmt->fetchALL() as $row) {
            echo '<option>' . htmlspecialchars($row['defect_equivalent']) . '</option>';
        }
    } else {
        echo '<option>Select the defect category</option>';
    }
}

// fetch option occurrence process mancost
if ($method == 'fetch_opt_occurrence_process_mc') {
    $query = "SELECT occurrence_equivalent FROM m_mc_occurrence_p ORDER BY occurrence_equivalent ASC";
    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo '<option value="" disabled selected>Select the occurrence process</option>';
        foreach ($stmt->fetchALL() as $row) {
            echo '<option>' . htmlspecialchars($row['occurrence_equivalent']) . '</option>';
        }
    } else {
        echo '<option>Select the occurrence process</option>';
    }
}

// fetch option portion treatment
if ($method == 'fetch_opt_portion_treatment') {
    $query = "SELECT portion_treatment FROM m_portion_treatment ORDER BY portion_treatment ASC";
    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo '<option value="" disabled selected>Select the repaired portion treatment</option>';
        foreach ($stmt->fetchALL() as $row) {
            echo '<option>' . htmlspecialchars($row['portion_treatment']) . '</option>';
        }
    } else {
        echo '<option>Select the repaired portion treatment</option>';
    }
}

if ($method == 'fetch_opt_harness_status') {
    $query = "SELECT harness_status FROM m_harness_status ORDER BY harness_status ASC";
    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo '<option value="" disabled selected>Select the harness status</option>';
        foreach ($stmt->fetchALL() as $row) {
            echo '<option>' . htmlspecialchars($row['harness_status']) . '</option>';
        }
    } else {
        echo '<option>Select the harness status</option>';
    }
}

// ==================================================================
// generate random id for unique defect ID
// function generate_defect_id($defect_id)
// {
//     if ($defect_id == "") {
//         $defect_id = date("ymdh");
//         $rand = substr(md5(microtime()), rand(0, 26), 5);
//         $defect_id = 'DRMMCM-' . $defect_id;
//         $defect_id = $defect_id . '' . $rand;
//     }
//     return $defect_id;
// }

function generate_defect_id($defect_id)
{
    if (empty($defect_id)) {
        $prefix = 'DRMMCM-';
        $unique_part = uniqid('', true);
        $defect_id = $prefix . $unique_part;
    }
    return $defect_id;
}

// function generate_new_defect_id($prefix = 'DRMMCM-')
// {
//     return $prefix . uniqid('', true);
// }

// ==================================================================================================================================================================

function count_defect_table_data($conn, $date_from, $date_to, $line_no_rp, $record_type, $product_name, $serial_no, $lot_no, $harness_status)
{
    $query = "SELECT COUNT(id) AS total FROM t_defect_record_f";
    $conditions = [];
    $params = [];

    $conditions[] = "(pending_status = '' OR pending_status = 'Updated' OR pending_status IS NULL OR ng_status_new_record = 'Updated')";

    if (!empty($date_from) && !empty($date_to)) {
        $conditions[] = "repairing_date BETWEEN ? AND ?";
        $params[] = $date_from;
        $params[] = $date_to;
    }

    if (!empty($line_no_rp)) {
        $conditions[] = "line_no LIKE ?";
        $params[] = '%' . $line_no_rp . '%';
    }

    if (!empty($record_type) && $record_type !== '%') {
        $conditions[] = "record_type LIKE ?";
        $params[] = '%' . $record_type . '%';
    }

    if (!empty($product_name) && $product_name !== '%') {
        $conditions[] = "product_name LIKE ?";
        $params[] = '%' . $product_name . '%';
    }

    if (!empty($serial_no) && $serial_no !== '%') {
        $conditions[] = "serial_no LIKE ?";
        $params[] = '%' . $serial_no . '%';
    }

    if (!empty($lot_no) && $lot_no !== '%') {
        $conditions[] = "lot_no LIKE ?";
        $params[] = '%' . $lot_no . '%';
    }

    if (!empty($harness_status) && $harness_status !== '%') {
        $conditions[] = "harness_status LIKE ?";
        $params[] = '%' . $harness_status . '%';
    }

    if (!empty($conditions)) {
        $query .= " WHERE " . implode(" AND ", $conditions);
    }

    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute($params);

    $total = $stmt->fetchColumn();

    return $total;
}

function count_mancost_table_data($search_arr, $conn)
{
    $query = "SELECT count(id) AS total FROM t_mancost_monitoring_f WHERE defect_id = '" . $search_arr['defect_id'] . "'";
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

if ($method == 'load_defect_table_data_last_page') {
    $product_name = trim($_POST['product_name']);
    $lot_no = trim($_POST['lot_no']);
    $serial_no = trim($_POST['serial_no']);
    $record_type = trim($_POST['record_type']);
    $line_no_rp = trim($_POST['line_no_rp']);
    $harness_status = trim($_POST['harness_status']);

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

    $results_per_page = 50;

    $number_of_result = intval(count_defect_table_data($conn, $date_from, $date_to, $line_no_rp, $record_type, $product_name, $serial_no, $lot_no, $harness_status));

    //determine the total number of pages available  
    $number_of_page = ceil($number_of_result / $results_per_page);

    // echo $number_of_page;

    echo ($number_of_page);
    exit;
}

if ($method == 'count_defect_table_data') {
    $product_name = trim($_POST['product_name']);
    $serial_no = trim($_POST['serial_no']);
    $lot_no = trim($_POST['lot_no']);
    $record_type = trim($_POST['record_type']);
    $line_no_rp = trim($_POST['line_no_rp']);
    $harness_status = trim($_POST['harness_status']);

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

    echo count_defect_table_data($conn, $date_from, $date_to, $line_no_rp, $record_type, $product_name, $serial_no, $lot_no, $harness_status);
    exit;
}

// mysql
// if ($method == 'load_defect_table_data') {
//     $current_page = intval($_POST['current_page']);

//     $product_name = trim($_POST['product_name']);
//     $lot_no = trim($_POST['lot_no']);
//     $serial_no = trim($_POST['serial_no']);
//     $record_type = trim($_POST['record_type']);
//     $line_no_rp = trim($_POST['line_no_rp']);

//     // date search
//     $date_from = trim($_POST['date_from']);
//     if (!empty($date_from)) {
//         $date_from = date_create($date_from);
//         $date_from = date_format($date_from, "Y/m/d");
//     }

//     $date_to = trim($_POST['date_to']);
//     if (!empty($date_to)) {
//         $date_to = date_create($date_to);
//         $date_to = date_format($date_to, "Y/m/d");
//     }

//     $c = 0;

//     $results_per_page = 50;

//     //determine the sql LIMIT starting number for the results on the displaying page
//     $page_first_result = ($current_page - 1) * $results_per_page;

//     $c = $page_first_result;

//     // $query = "SELECT * FROM t_defect_record_f ORDER BY repairing_date DESC LIMIT " . $page_first_result . ", " . $results_per_page;
//     // $query = "SELECT * FROM t_defect_record_f LIMIT " . $page_first_result . ", " . $results_per_page;

//     // Define the base query
//     $query = "SELECT * FROM t_defect_record_f";

//     // Initialize conditions array
//     $conditions = [];

//     // Add conditions based on the provided filters
//     if (!empty($date_from) && !empty($date_to)) {
//         $conditions[] = "repairing_date BETWEEN '$date_from' AND '$date_to'";
//     }

//     if (!empty($line_no_rp)) {
//         $conditions[] = "line_no LIKE '$line_no_rp%'";
//     }

//     if (!empty($record_type) && $record_type !== '%') {
//         $conditions[] = "record_type LIKE '$record_type%'";
//     }

//     if (!empty($product_name)) {
//         $conditions[] = "product_name LIKE '$product_name%'";
//     }

//     if (!empty($lot_no)) {
//         $conditions[] = "lot_no LIKE '$lot_no%'";
//     }

//     if (!empty($serial_no)) {
//         $conditions[] = "serial_no LIKE '$serial_no%'";
//     }

//     // Combine conditions with the main query
//     if (!empty($conditions)) {
//         $query .= " WHERE " . implode(" AND ", $conditions);
//     }

//     // $query .= " ORDER BY repairing_date DESC";
//     // $query .= " ORDER BY record_added_defect_datetime DESC";
//     $query .= " ORDER BY record_added_defect_datetime DESC";

//     // Add limit to the query
//     $query .= " LIMIT " . $page_first_result . ", " . $results_per_page;

//     $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
//     $stmt->execute();
//     if ($stmt->rowCount() > 0) {
//         foreach ($stmt->fetchALL() as $row) {
//             $c++;
//             echo '<tr style="cursor:pointer; text-align:center;" class="modal-trigger" onclick="load_mancost_table(&quot;' . $row['id'] . '~!~' . $row['defect_id'] . '&quot;)">';
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
//             echo '<td style="text-align:center;">' . $row['occurrence_process_dr'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['occurrence_shift'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['occurrence_id_num'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['occurrence_person'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['outflow_process'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['outflow_shift'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['outflow_id_num'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['outflow_person'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['defect_category_dr'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['sequence_num'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['assy_board_no'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['defect_cause'] . '</td>';
//             echo '<td style="text-align:left;">' . $row['good_measurement'] . '</td>';
//             echo '<td style="text-align:left;">' . $row['ng_measurement'] . '</td>';
//             echo '<td style="text-align:left;">' . $row['wire_type'] . '</td>';
//             echo '<td style="text-align:left;">' . $row['wire_size'] . '</td>';
//             echo '<td style="text-align:left;">' . $row['connector_cavity'] . '</td>';
//             echo '<td style="text-align:left;">' . $row['defect_detail_content'] . '</td>';
//             echo '<td style="text-align:left;">' . $row['defect_treatment_content'] . '</td>';
//             echo '<td style="text-align:left;">' . $row['harness_status'] . '</td>';
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

// mssql
if ($method == 'load_defect_table_data') {
    $current_page = intval($_POST['current_page']);

    $product_name = trim($_POST['product_name']);
    $lot_no = trim($_POST['lot_no']);
    $serial_no = trim($_POST['serial_no']);
    $record_type = trim($_POST['record_type']);
    $line_no_rp = trim($_POST['line_no_rp']);
    $harness_status = trim($_POST['harness_status']);

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
    $results_per_page = 50;
    $page_first_result = ($current_page - 1) * $results_per_page;
    $c = $page_first_result;

    $query = "SELECT * FROM t_defect_record_f";
    $conditions = [];

    $conditions[] = "(pending_status = '' OR pending_status = 'Updated' OR pending_status IS NULL OR ng_status_new_record = 'Updated')";

    if (!empty($date_from) && !empty($date_to)) {
        $conditions[] = "repairing_date BETWEEN :date_from AND :date_to";
    }

    if (!empty($line_no_rp)) {
        $conditions[] = "line_no LIKE :line_no_rp";
    }

    if (!empty($record_type) && $record_type !== '%') {
        $conditions[] = "record_type LIKE :record_type";
    }

    if (!empty($product_name)) {
        $conditions[] = "product_name LIKE :product_name";
    }

    if (!empty($lot_no)) {
        $conditions[] = "lot_no LIKE :lot_no";
    }

    if (!empty($serial_no)) {
        $conditions[] = "serial_no LIKE :serial_no";
    }

    if (!empty($harness_status)) {
        $conditions[] = "harness_status LIKE :harness_status";
    }

    if (!empty($conditions)) {
        $query .= " WHERE " . implode(" AND ", $conditions);
    }

    $query .= " ORDER BY record_added_defect_datetime DESC";

    $query .= " OFFSET :page_first_result ROWS FETCH NEXT :results_per_page ROWS ONLY";

    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));

    if (!empty($date_from) && !empty($date_to)) {
        $stmt->bindValue(':date_from', $date_from, PDO::PARAM_STR);
        $stmt->bindValue(':date_to', $date_to, PDO::PARAM_STR);
    }
    if (!empty($line_no_rp)) {
        $stmt->bindValue(':line_no_rp', $line_no_rp . '%', PDO::PARAM_STR);
    }
    if (!empty($record_type) && $record_type !== '%') {
        $stmt->bindValue(':record_type', $record_type . '%', PDO::PARAM_STR);
    }
    if (!empty($product_name)) {
        $stmt->bindValue(':product_name', $product_name . '%', PDO::PARAM_STR);
    }
    if (!empty($lot_no)) {
        $stmt->bindValue(':lot_no', $lot_no . '%', PDO::PARAM_STR);
    }
    if (!empty($serial_no)) {
        $stmt->bindValue(':serial_no', $serial_no . '%', PDO::PARAM_STR);
    }
    if (!empty($harness_status)) {
        $stmt->bindValue(':harness_status', $harness_status . '%', PDO::PARAM_STR);
    }
    $stmt->bindValue(':page_first_result', $page_first_result, PDO::PARAM_INT);
    $stmt->bindValue(':results_per_page', $results_per_page, PDO::PARAM_INT);

    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
            $c++;

            // $harness_repair = $row['harness_repair'];
            // $highlight_class = ($harness_repair == 'Verified') ? 'highlight-green' : (($harness_repair == 'Pending') ? 'highlight-red' : '');


            $harness_repair = $row['harness_repair'];
            $harness_status = $row['harness_status'];

            $highlight_class = '';

            if ($harness_repair == 'Pending' && in_array($harness_status, ['Re-assy', 'Re-crimp', 'Re-insertion', 'Re-inspection'])) {
                $highlight_class = 'highlight-red';
            } elseif ($harness_repair == 'Verified') {
                $highlight_class = 'highlight-green';
            } elseif ($harness_status == 'Counterpart Checking') {
                $highlight_class = 'highlight-gray';
            }

            $onclick_event = ($harness_repair == 'Verified') ? '' : 'onclick="get_update_defect_pdv(\'' . $row['defect_id'] . '\')"';

            echo '<tr style="cursor:pointer; text-align:center;" class="modal-trigger ' . $highlight_class . '" onclick="load_mancost_table(&quot;' . $row['id'] . '~!~' . $row['defect_id'] . '&quot;)">';
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
            echo '<td style="text-align:center;">' . $row['good_measurement'] . '</td>';
            echo '<td style="text-align:center;">' . $row['ng_measurement'] . '</td>';
            echo '<td style="text-align:center;">' . $row['wire_type'] . '</td>';
            echo '<td style="text-align:center;">' . $row['wire_size'] . '</td>';
            echo '<td style="text-align:center;">' . $row['connector_cavity'] . '</td>';
            echo '<td style="text-align:left;">' . $row['defect_detail_content'] . '</td>';
            echo '<td style="text-align:left;">' . $row['defect_treatment_content'] . '</td>';
            echo '<td style="text-align:center;">' . $row['dis_assembled_by'] . '</td>';
            echo '<td style="text-align:center;">' . $row['harness_status'] . '</td>';
            echo '<td style="text-align:center;">' . $row['remarks_recrimp'] . '</td>';
            echo '<td style="text-align:center;">' . $row['recrimp_by_id_num'] . '</td>';
            echo '<td style="text-align:center;">' . $row['recrimp_by_person'] . '</td>';
            echo '<td style="text-align:center;">' . $row['verified_by_qa_id_num'] . '</td>';
            echo '<td style="text-align:center;">' . $row['verified_by_qa_person'] . '</td>';
            echo '<td style="text-align:center;">' . $row['remarks_1_cc'] . '</td>';
            echo '<td style="text-align:center;">' . $row['remarks_2_cc'] . '</td>';
            echo '<td style="text-align:center;">' . $row['cc_by_id_num'] . '</td>';
            echo '<td style="text-align:center;">' . $row['cc_by_person'] . '</td>';
            echo '<td style="text-align:center;">' . $row['remarks_reassy'] . '</td>';
            echo '<td style="text-align:center;">' . $row['reassy_by_id_num'] . '</td>';
            echo '<td style="text-align:center;">' . $row['reassy_by_person'] . '</td>';
            echo '<td style="text-align:center;">' . $row['reassy_date'] . '</td>';
            echo '</tr>';
        }
    } else {
        echo '<tr>';
        echo '<td colspan="12" style="text-align:center; color:red;">No Result</td>';
        echo '</tr>';
    }
    exit;
}

if ($method == 'load_mancost_table_data_last_page') {
    $defect_id = $_POST['defect_id'];

    $search_arr = array(
        "defect_id" => $defect_id
    );

    $results_per_page = 50;

    $number_of_result = intval(count_mancost_table_data($search_arr, $conn));

    //determine the total number of pages available  
    $number_of_page = ceil($number_of_result / $results_per_page);

    echo $number_of_page;
    exit;
}

if ($method == 'count_mancost_table_data') {
    $defect_id = $_POST['defect_id'];

    $search_arr = array(
        "defect_id" => $defect_id
    );

    echo count_mancost_table_data($search_arr, $conn);
    exit;
}

// if ($method == 'load_mancost_table_data') {
//     $defect_id = $_POST['defect_id'];
//     $current_page = intval($_POST['current_page']);

//     $c = 0;

//     $results_per_page = 50;

//     $page_first_result = ($current_page - 1) * $results_per_page;

//     $c = $page_first_result;

//     // $query = "SELECT * FROM t_mancost_monitoring_f WHERE defect_id = '$defect_id' LIMIT " . $page_first_result . ", " . $results_per_page;

//     $query = "SELECT t_defect_record_f.car_maker, t_defect_record_f.line_no, t_defect_record_f.category, t_mancost_monitoring_f.repair_start, t_mancost_monitoring_f.repair_end, t_mancost_monitoring_f.time_consumed, t_mancost_monitoring_f.defect_category_mc, t_mancost_monitoring_f.occurrence_process_mc, t_mancost_monitoring_f.parts_removed, t_mancost_monitoring_f.wire_size, t_mancost_monitoring_f.wire_type, t_mancost_monitoring_f.connector_cavity,t_mancost_monitoring_f.quantity, t_mancost_monitoring_f.unit_cost, t_mancost_monitoring_f.material_cost, t_mancost_monitoring_f.manhour_cost, t_mancost_monitoring_f.repaired_portion_treatment FROM t_defect_record_f LEFT JOIN t_mancost_monitoring_f ON t_defect_record_f.defect_id = t_mancost_monitoring_f.defect_id WHERE t_defect_record_f.defect_id = '$defect_id' LIMIT " . $page_first_result . ", " . $results_per_page;

//     $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
//     $stmt->execute();
//     if ($stmt->rowCount() > 0) {
//         foreach ($stmt->fetchALL() as $row) {
//             $c++;

//             echo '<tr style="cursor:pointer; text-align:center;">';
//             echo '<td style="text-align:center;">' . $c . '</td>';
//             echo '<td style="text-align:center;">' . $row['car_maker'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['line_no'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['category'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['repair_start'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['repair_end'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['time_consumed'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['defect_category_mc'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['occurrence_process_mc'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['parts_removed'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['wire_size'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['wire_type'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['connector_cavity'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['quantity'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['unit_cost'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['material_cost'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['manhour_cost'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['repaired_portion_treatment'] . '</td>';
//             echo '</tr>';
//         }
//     } else {
//         echo '<tr>';
//         echo '<td colspan="12" style="text-align:center; color:red;">No Result</td>';
//         echo '</tr>';
//     }
//     exit;
// }

// mysql
// if ($method == 'load_mancost_table_data') {
//     $defect_id = $_POST['defect_id'];
//     $current_page = intval($_POST['current_page']);

//     $c = 0;

//     $results_per_page = 50;
//     $page_first_result = ($current_page - 1) * $results_per_page;

//     $c = $page_first_result;

//     $query = "SELECT m.id, d.defect_id, 
//         d.car_maker, d.line_no, d.category, d.date_detected, d.issue_no_tag,
//         d.product_name, d.lot_no, d.serial_no, d.discovery_process, d.discovery_id_num,
//         d.discovery_person, d.occurrence_process_dr, d.occurrence_shift, d.occurrence_id_num, d.occurrence_person,
//         d.outflow_process, d.outflow_shift, d.outflow_id_num, d.outflow_person, d.defect_category_dr,
//         d.sequence_num, d.assy_board_no, d.defect_cause, d.good_measurement, d.ng_measurement,
//         d.wire_type, d.wire_size, d.connector_cavity,
//         d.defect_detail_content, d.defect_treatment_content, d.harness_status, d.dis_assembled_by,
//         d.repairing_date, 
//         m.repair_start, m.repair_end, m.time_consumed, m.defect_category_mc, 
//         m.occurrence_process_mc, m.parts_removed,
//         m.quantity, m.unit_cost, m.material_cost, 
//         m.manhour_cost, m.repaired_portion_treatment
//         FROM 
//             t_defect_record_f AS d 
//         LEFT JOIN 
//             t_mancost_monitoring_f AS m 
//         ON 
//             d.defect_id = m.defect_id 
//         WHERE 
//             d.defect_id = '$defect_id'";

//     $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
//     $stmt->execute();

//     if ($stmt->rowCount() > 0) {
//         foreach ($stmt->fetchAll() as $row) {
//             $c++;

//             echo '<tr style="cursor:pointer; text-align:center;" class="modal-trigger" onclick="get_update_defect_mancost_pd(\''
//                 . $row['id'] . '~!~' . $row['car_maker'] . '~!~' . $row['line_no'] . '~!~' . $row['category'] . '~!~' . $row['date_detected'] . '~!~'
//                 . $row['issue_no_tag'] . '~!~' . $row['product_name'] . '~!~' . $row['lot_no'] . '~!~' . $row['serial_no'] . '~!~'
//                 . $row['discovery_process'] . '~!~' . $row['discovery_id_num'] . '~!~' . $row['discovery_person'] . '~!~' . $row['occurrence_process_dr'] . '~!~'
//                 . $row['occurrence_shift'] . '~!~' . $row['occurrence_id_num'] . '~!~' . $row['occurrence_person'] . '~!~' . $row['outflow_process'] . '~!~'
//                 . $row['outflow_shift'] . '~!~' . $row['outflow_id_num'] . '~!~' . $row['outflow_person'] . '~!~' . $row['defect_category_dr'] . '~!~'
//                 . $row['sequence_num'] . '~!~' . $row['assy_board_no'] . '~!~' . $row['defect_cause'] . '~!~' . $row['good_measurement'] . '~!~'
//                 . $row['ng_measurement'] . '~!~' . $row['wire_type'] . '~!~' . $row['wire_size'] . '~!~' . $row['connector_cavity'] . '~!~'
//                 . $row['dis_assembled_by'] . '~!~' . $row['defect_detail_content'] . '~!~' . $row['defect_treatment_content'] . '~!~' . $row['harness_status'] . '~!~'
//                 . $row['repairing_date'] . '~!~' . $row['repair_start'] . '~!~' . $row['repair_end'] . '~!~' . $row['time_consumed'] . '~!~'
//                 . $row['defect_category_mc'] . '~!~' . $row['occurrence_process_mc'] . '~!~' . $row['parts_removed'] . '~!~' . $row['quantity'] . '~!~'
//                 . $row['unit_cost'] . '~!~' . $row['material_cost'] . '~!~' . $row['manhour_cost'] . '~!~' . $row['repaired_portion_treatment'] . '~!~'
//                 . $row['defect_id'] . '\')">';
//             echo '<td style="text-align:center;">' . $c . '</td>';
//             echo '<td style="text-align:center;">' . $row['line_no'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['car_maker'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['category'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['repair_start'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['repair_end'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['time_consumed'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['defect_category_mc'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['occurrence_process_mc'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['parts_removed'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['quantity'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['unit_cost'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['material_cost'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['manhour_cost'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['repaired_portion_treatment'] . '</td>';
//             echo '</tr>';
//         }
//     } else {
//         echo '<tr>';
//         echo '<td colspan="18" style="text-align:center; color:red;">No Result</td>';
//         echo '</tr>';
//     }
//     exit;
// }

// mssql
if ($method == 'load_mancost_table_data') {
    $defect_id = $_POST['defect_id'];
    $current_page = intval($_POST['current_page']);

    $c = 0;

    $results_per_page = 50;
    $page_first_result = ($current_page - 1) * $results_per_page;

    $c = $page_first_result;

    $query = "SELECT m.id, d.defect_id, 
        d.car_maker, d.line_no, d.category, d.date_detected, d.issue_no_tag,
        d.product_name, d.lot_no, d.serial_no, d.discovery_process, d.discovery_id_num,
        d.discovery_person, d.occurrence_process_dr, d.occurrence_shift, d.occurrence_id_num, d.occurrence_person,
        d.outflow_process, d.outflow_shift, d.outflow_id_num, d.outflow_person, d.defect_category_dr,
        d.sequence_num, d.assy_board_no, d.defect_cause, d.good_measurement, d.ng_measurement,
        d.wire_type, d.wire_size, d.connector_cavity,
        d.defect_detail_content, d.defect_treatment_content, d.harness_status, d.dis_assembled_by,
        d.repairing_date, 
        m.repair_start, m.repair_end, m.time_consumed, m.defect_category_mc, 
        m.occurrence_process_mc, m.parts_removed,
        m.quantity, m.unit_cost, m.material_cost, 
        m.manhour_cost, m.repaired_portion_treatment
        FROM 
            t_defect_record_f AS d 
        LEFT JOIN 
            t_mancost_monitoring_f AS m 
        ON 
            d.defect_id = m.defect_id 
        WHERE 
            d.defect_id = :defect_id";

    $query .= " ORDER BY d.date_detected DESC";
    $query .= " OFFSET :page_first_result ROWS FETCH NEXT :results_per_page ROWS ONLY";

    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->bindValue(':defect_id', $defect_id, PDO::PARAM_STR);
    $stmt->bindValue(':page_first_result', $page_first_result, PDO::PARAM_INT);
    $stmt->bindValue(':results_per_page', $results_per_page, PDO::PARAM_INT);

    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
            $c++;

            echo '<tr style="cursor:pointer; text-align:center;" class="modal-trigger" onclick="get_update_defect_mancost_pd(\''
                . $row['id'] . '~!~' . $row['car_maker'] . '~!~' . $row['line_no'] . '~!~' . $row['category'] . '~!~' . $row['date_detected'] . '~!~'
                . $row['issue_no_tag'] . '~!~' . $row['product_name'] . '~!~' . $row['lot_no'] . '~!~' . $row['serial_no'] . '~!~'
                . $row['discovery_process'] . '~!~' . $row['discovery_id_num'] . '~!~' . $row['discovery_person'] . '~!~' . $row['occurrence_process_dr'] . '~!~'
                . $row['occurrence_shift'] . '~!~' . $row['occurrence_id_num'] . '~!~' . $row['occurrence_person'] . '~!~' . $row['outflow_process'] . '~!~'
                . $row['outflow_shift'] . '~!~' . $row['outflow_id_num'] . '~!~' . $row['outflow_person'] . '~!~' . $row['defect_category_dr'] . '~!~'
                . $row['sequence_num'] . '~!~' . $row['assy_board_no'] . '~!~' . $row['defect_cause'] . '~!~' . $row['good_measurement'] . '~!~'
                . $row['ng_measurement'] . '~!~' . $row['wire_type'] . '~!~' . $row['wire_size'] . '~!~' . $row['connector_cavity'] . '~!~'
                . $row['dis_assembled_by'] . '~!~' . $row['defect_detail_content'] . '~!~' . $row['defect_treatment_content'] . '~!~' . $row['harness_status'] . '~!~'
                . $row['repairing_date'] . '~!~' . $row['repair_start'] . '~!~' . $row['repair_end'] . '~!~' . $row['time_consumed'] . '~!~'
                . $row['defect_category_mc'] . '~!~' . $row['occurrence_process_mc'] . '~!~' . $row['parts_removed'] . '~!~' . $row['quantity'] . '~!~'
                . $row['unit_cost'] . '~!~' . $row['material_cost'] . '~!~' . $row['manhour_cost'] . '~!~' . $row['repaired_portion_treatment'] . '~!~'
                . $row['defect_id'] . '\')">';
            echo '<td style="text-align:center;">' . $c . '</td>';
            echo '<td style="text-align:center;">' . $row['line_no'] . '</td>';
            echo '<td style="text-align:center;">' . $row['car_maker'] . '</td>';
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
            echo '</tr>';
        }
    } else {
        echo '<tr>';
        echo '<td colspan="12" style="text-align:center; color:red;">No Result</td>';
        echo '</tr>';
    }
    exit;
}

//to fetch QR settings
// function fetch_qr_setting($conn)
// {
//     $query = "SELECT product_name_start, product_name_length, lot_no_start, lot_no_length, serial_no_start, serial_no_length FROM m_car_maker WHERE car_maker = 'Suzuki'";

//     try {
//         $stmt = $conn->query($query);
//         if ($stmt->rowCount() > 0) {
//             $setting = $stmt->fetch(PDO::FETCH_ASSOC);
//             return $setting;
//         } else {
//             echo "No QR settings found in the database.";
//             return false;
//         }
//     } catch (PDOException $e) {
//         echo "Error fetching QR settings: " . $e->getMessage();
//         return false;
//     }
// }

// $qr_setting = fetch_qr_setting($conn);


// if ($qr_setting) {
//     echo "<script>";
//     echo "var qr_setting = " . json_encode($qr_setting) . ";";
//     echo "</script>";
// } else {
//     echo "<script>";
//     echo "var qr_setting = null;";
//     echo "</script>";
// }
// ==================================================================================================================================================================


// go to mancost form modal
if ($method == 'go_to_mc_form') {
    $line_no = trim($_POST['line_no']);
    $line_category_dr = trim($_POST['line_category_dr']);
    $date_detected = trim($_POST['date_detected']);
    $issue_tag = trim($_POST['issue_tag']);
    $repairing_date = trim($_POST['repairing_date']);
    $car_maker = trim($_POST['car_maker']);
    // $qr_scan = trim($_POST['qr_scan']);
    $product_name = trim($_POST['product_name']);
    $lot_no = trim($_POST['lot_no']);
    $serial_no = trim($_POST['serial_no']);
    $discovery_process_dr = trim($_POST['discovery_process_dr']);
    $discovery_id_no_dr = trim($_POST['discovery_id_no_dr']);
    $discovery_person = trim($_POST['discovery_person']);
    $occurrence_process_dr = trim($_POST['occurrence_process_dr']);
    $occurrence_shift_dr = trim($_POST['occurrence_shift_dr']);
    $occurrence_id_no_dr = trim($_POST['occurrence_id_no_dr']);
    $occurrence_person = trim($_POST['occurrence_person']);
    $outflow_process_dr = trim($_POST['outflow_process_dr']);
    $outflow_shift_dr = trim($_POST['outflow_shift_dr']);
    $outflow_id_no_dr = trim($_POST['outflow_id_no_dr']);
    $outflow_person = trim($_POST['outflow_person']);
    $defect_category_dr = trim($_POST['defect_category_dr']);
    $sequence_no = trim($_POST['sequence_no']);
    $assy_board_no_dr = trim($_POST['assy_board_no_dr']);
    $defect_cause_dr = trim($_POST['defect_cause_dr']);
    $good_measurement_dr = trim($_POST['good_measurement_dr']);
    $ng_measurement_dr = trim($_POST['ng_measurement_dr']);
    $wire_type_dr = trim($_POST['wire_type_dr']);
    $wire_size_dr = trim($_POST['wire_size_dr']);
    $connector_cavity_dr = trim($_POST['connector_cavity_dr']);
    $repair_person_dr = trim($_POST['repair_person_dr']);
    $detail_content_defect = trim($_POST['detail_content_defect']);
    $treatment_content_defect = trim($_POST['treatment_content_defect']);
    $harness_status_dr = trim($_POST['harness_status_dr']);

    $defect_id = $_POST['defect_id'];

    $message = '';

    $is_valid = false;

    switch (true) {
        case empty($line_no): {
            $message = "Line No. Empty";
            break;
        }
        case empty($line_category_dr): {
            $message = "Category Empty";
            break;
        }
        case empty($date_detected): {
            $message = "Date Detected Empty";
            break;
        }
        case empty($issue_tag): {
            $message = "Issue Tag Empty";
            break;
        }
        case empty($repairing_date): {
            $message = "Repairing Date Empty";
            break;
        }
        case empty($car_maker): {
            $message = "Car Maker Empty";
            break;
        }
        case empty($discovery_process_dr): {
            $message = "Discovery Process Empty";
            break;
        }
        case empty($discovery_id_no_dr): {
            $message = "ID Number (in Discovery) Empty";
            break;
        }
        case empty($discovery_person): {
            $message = "Discovery Person Empty";
            break;
        }
        case empty($occurrence_process_dr): {
            $message = "Occurrence Process Empty";
            break;
        }
        case empty($occurrence_shift_dr): {
            $message = "Occurrence Shift Empty";
            break;
        }
        case empty($occurrence_id_no_dr): {
            $message = "ID Number (in Occurrence) Empty";
            break;
        }
        case empty($occurrence_person): {
            $message = "Occurrence Person Empty";
            break;
        }
        case empty($outflow_process_dr): {
            $message = "Outflow Process Empty";
            break;
        }
        case empty($outflow_shift_dr): {
            $message = "Outflow Shift Empty";
            break;
        }
        case empty($outflow_id_no_dr): {
            $message = "ID Number (in Outflow) Empty";
            break;
        }
        case empty($outflow_person): {
            $message = "Outflow Person Empty";
            break;
        }
        case empty($defect_category_dr): {
            $message = "Defect Category Empty";
            break;
        }
        case empty($sequence_no): {
            $message = "Sequence No. Empty";
            break;
        }
        case empty($assy_board_no_dr): {
            $message = "Assy Board No. Empty";
            break;
        }
        case empty($defect_cause_dr): {
            $message = "Cause of Defect Empty";
            break;
        }
        case empty($good_measurement_dr): {
            $message = "Good Measurement Empty";
            break;
        }
        case empty($ng_measurement_dr): {
            $message = "NG Measurement Empty";
            break;
        }
        case empty($wire_type_dr): {
            $message = "Wire Type Empty";
            break;
        }
        case empty($wire_size_dr): {
            $message = "Wire Size Empty";
            break;
        }
        case empty($connector_cavity_dr): {
            $message = "Connector Cavity Empty";
            break;
        }
        case empty($repair_person_dr): {
            $message = "Repair Person Empty";
            break;
        }
        case empty($detail_content_defect): {
            $message = "Treatment Content of Defect Empty";
            break;
        }
        case empty($treatment_content_defect): {
            $message = "Dis-assembled/Dis-inserted by (Repair Person) Empty";
            break;
        }
        case empty($harness_status_dr): {
            $message = "Harness Status Empty";
            break;
        }
        default:
            $is_valid = true;
            $defect_id = generate_defect_id($defect_id);
            $message = 'success';
    }

    $response_arr = array(
        'defect_id' => $defect_id,
        'message' => $message
    );

    echo json_encode($response_arr, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
}

// add defect mancost record
// mysql
// if ($method == 'add_defect_mancost_record') {
//     $record_type = trim($_POST['record_type']);
//     $line_no = trim($_POST['line_no']);
//     $line_category_dr = trim($_POST['line_category_dr']);
//     $padded_line_no = str_pad($line_no, 4, '0', STR_PAD_LEFT);
//     $date_detected = trim($_POST['date_detected']);
//     $issue_tag = trim($_POST['issue_tag']);
//     $repairing_date = trim($_POST['repairing_date']);
//     $car_maker = trim($_POST['car_maker']);
//     $product_name = trim($_POST['product_name']);
//     $lot_no = trim($_POST['lot_no']);
//     $serial_no = trim($_POST['serial_no']);
//     $discovery_process_dr = trim($_POST['discovery_process_dr']);
//     $discovery_id_no_dr = trim($_POST['discovery_id_no_dr']);
//     $discovery_person = trim($_POST['discovery_person']);
//     $occurrence_process_dr = trim($_POST['occurrence_process_dr']);
//     $occurrence_shift_dr = trim($_POST['occurrence_shift_dr']);
//     $occurrence_id_no_dr = trim($_POST['occurrence_id_no_dr']);
//     $occurrence_person = trim($_POST['occurrence_person']);
//     $outflow_process_dr = trim($_POST['outflow_process_dr']);
//     $outflow_shift_dr = trim($_POST['outflow_shift_dr']);
//     $outflow_id_no_dr = trim($_POST['outflow_id_no_dr']);
//     $outflow_person = trim($_POST['outflow_person']);
//     $defect_category_dr = trim($_POST['defect_category_dr']);
//     $sequence_no = trim($_POST['sequence_no']);
//     $assy_board_no_dr = trim($_POST['assy_board_no_dr']);
//     $defect_cause_dr = trim($_POST['defect_cause_dr']);
//     $good_measurement_dr = trim($_POST['good_measurement_dr']);
//     $ng_measurement_dr = trim($_POST['ng_measurement_dr']);
//     $wire_type_dr = trim($_POST['wire_type_dr']);
//     $wire_size_dr = trim($_POST['wire_size_dr']);
//     $connector_cavity_dr = trim($_POST['connector_cavity_dr']);
//     $detail_content_defect = trim($_POST['detail_content_defect']);
//     $treatment_content_defect = trim($_POST['treatment_content_defect']);
//     $harness_status_dr = trim($_POST['harness_status_dr']);

//     $repair_person_dr = trim($_POST['repair_person_dr']);
//     $repair_start_mc = trim($_POST['repair_start_mc']);
//     $repair_end_mc = trim($_POST['repair_end_mc']);
//     $time_consumed_mc = trim($_POST['time_consumed_mc']);
//     $defect_category_mc = trim($_POST['defect_category_mc']);
//     $occurrence_process_mc = trim($_POST['occurrence_process_mc']);
//     $parts_removed_mc = trim($_POST['parts_removed_mc']);
//     $quantity_mc = trim($_POST['quantity_mc']);
//     $unit_cost_mc = trim($_POST['unit_cost_mc']);
//     $material_cost_mc = trim($_POST['material_cost_mc']);
//     $manhour_cost_mc = trim($_POST['manhour_cost_mc']);
//     $portion_treatment = trim($_POST['portion_treatment']);
//     $defect_id = $_POST['defect_id'];
//     $status = 'Saved';
//     $record_added_by = $_SESSION['full_name'];
//     $qc_status = 'Saved';

//     $error = 0;
//     $message = "";

//     // Check if defect ID already exists
//     $check = "SELECT defect_id FROM t_defect_record_f WHERE defect_id = :defect_id";
//     $stmt = $conn->prepare($check, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
//     $stmt->bindParam(':defect_id', $defect_id, PDO::PARAM_STR);
//     $stmt->execute();
//     $result = $stmt->fetch(PDO::FETCH_ASSOC);

//     if ($result) {
//         $error = 1;
//         $message = 'Defect ID already exists.';
//     } else {
//         // Insert into t_defect_record_f
//         $query = "
//              INSERT INTO t_defect_record_f (
//                 defect_id, line_no, category, date_detected, issue_no_tag, repairing_date, car_maker, product_name, 
//                 lot_no, serial_no, discovery_process, discovery_id_num, discovery_person, occurrence_process_dr, 
//                 occurrence_shift, occurrence_id_num, occurrence_person, outflow_process, outflow_shift, 
//                 outflow_id_num, outflow_person, defect_category_dr, sequence_num, assy_board_no, defect_cause, 
//                 defect_detail_content, defect_treatment_content, harness_status, dis_assembled_by, good_measurement, 
//                 ng_measurement, wire_type, wire_size, connector_cavity, qc_status, record_type, record_added_defect_datetime
//             ) VALUES (
//                 :defect_id, :line_no, :category, :date_detected, :issue_no_tag, :repairing_date, 
//                 :car_maker, :product_name, :lot_no, :serial_no, :discovery_process, :discovery_id_num, 
//                 :discovery_person, :occurrence_process_dr, :occurrence_shift, :occurrence_id_num, 
//                 :occurrence_person, :outflow_process, :outflow_shift, :outflow_id_num, :outflow_person, 
//                 :defect_category_dr, :sequence_num, :assy_board_no, :defect_cause, :defect_detail_content, 
//                 :defect_treatment_content, :harness_status, :dis_assembled_by, :good_measurement, :ng_measurement, 
//                 :wire_type, :wire_size, :connector_cavity, :qc_status, :record_type, NOW()
//             )
//         ";
//         $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
//         $stmt->bindParam(':defect_id', $defect_id, PDO::PARAM_STR);
//         $stmt->bindParam(':line_no', $padded_line_no, PDO::PARAM_STR);
//         $stmt->bindParam(':category', $line_category_dr, PDO::PARAM_STR);
//         $stmt->bindParam(':date_detected', $date_detected, PDO::PARAM_STR);
//         $stmt->bindParam(':issue_no_tag', $issue_tag, PDO::PARAM_INT);
//         $stmt->bindParam(':repairing_date', $repairing_date, PDO::PARAM_STR);
//         $stmt->bindParam(':car_maker', $car_maker, PDO::PARAM_STR);
//         $stmt->bindParam(':product_name', $product_name, PDO::PARAM_STR);
//         $stmt->bindParam(':lot_no', $lot_no, PDO::PARAM_STR);
//         $stmt->bindParam(':serial_no', $serial_no, PDO::PARAM_STR);
//         $stmt->bindParam(':discovery_process', $discovery_process_dr, PDO::PARAM_STR);
//         $stmt->bindParam(':discovery_id_num', $discovery_id_no_dr, PDO::PARAM_STR);
//         $stmt->bindParam(':discovery_person', $discovery_person, PDO::PARAM_STR);
//         $stmt->bindParam(':occurrence_process_dr', $occurrence_process_dr, PDO::PARAM_STR);
//         $stmt->bindParam(':occurrence_shift', $occurrence_shift_dr, PDO::PARAM_STR);
//         $stmt->bindParam(':occurrence_id_num', $occurrence_id_no_dr, PDO::PARAM_STR);
//         $stmt->bindParam(':occurrence_person', $occurrence_person, PDO::PARAM_STR);
//         $stmt->bindParam(':outflow_process', $outflow_process_dr, PDO::PARAM_STR);
//         $stmt->bindParam(':outflow_shift', $outflow_shift_dr, PDO::PARAM_STR);
//         $stmt->bindParam(':outflow_id_num', $outflow_id_no_dr, PDO::PARAM_STR);
//         $stmt->bindParam(':outflow_person', $outflow_person, PDO::PARAM_STR);
//         $stmt->bindParam(':defect_category_dr', $defect_category_dr, PDO::PARAM_STR);
//         $stmt->bindParam(':sequence_num', $sequence_no, PDO::PARAM_STR);
//         $stmt->bindParam(':assy_board_no', $assy_board_no_dr, PDO::PARAM_STR);
//         $stmt->bindParam(':defect_cause', $defect_cause_dr, PDO::PARAM_STR);
//         $stmt->bindParam(':defect_detail_content', $detail_content_defect, PDO::PARAM_STR);
//         $stmt->bindParam(':defect_treatment_content', $treatment_content_defect, PDO::PARAM_STR);
//         $stmt->bindParam(':harness_status', $harness_status_dr, PDO::PARAM_STR);
//         $stmt->bindParam(':dis_assembled_by', $repair_person_dr, PDO::PARAM_STR);
//         $stmt->bindParam(':good_measurement', $good_measurement_dr, PDO::PARAM_STR);
//         $stmt->bindParam(':ng_measurement', $ng_measurement_dr, PDO::PARAM_STR);
//         $stmt->bindParam(':wire_type', $wire_type_dr, PDO::PARAM_STR);
//         $stmt->bindParam(':wire_size', $wire_size_dr, PDO::PARAM_STR);
//         $stmt->bindParam(':connector_cavity', $connector_cavity_dr, PDO::PARAM_STR);
//         $stmt->bindParam(':qc_status', $qc_status, PDO::PARAM_STR);
//         $stmt->bindParam(':record_type', $record_type, PDO::PARAM_STR);

//         if (!$stmt->execute()) {
//             $message = 'error';
//             $error = 1;
//         }

//         // Check if update is needed in t_mancost_monitoring_f
//         $check1 = "
//             UPDATE t_mancost_monitoring_f 
//             SET status = :status 
//             WHERE defect_id = :defect_id AND record_added_by = :record_added_by
//         ";
//         $stmt1 = $conn->prepare($check1, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
//         $stmt1->bindParam(':status', $status, PDO::PARAM_STR);
//         $stmt1->bindParam(':defect_id', $defect_id, PDO::PARAM_STR);
//         $stmt1->bindParam(':record_added_by', $record_added_by, PDO::PARAM_STR);
//         $stmt1->execute();

//         if ($stmt1->rowCount() > 0) {
//             // Update was successful
//         } else {
//             // Insert into t_mancost_monitoring_f
//             $query1 = "
//                 INSERT INTO t_mancost_monitoring_f (
//                     defect_id, repair_start, repair_end, time_consumed, defect_category_mc, occurrence_process_mc, 
//                     parts_removed, quantity, 
//                     unit_cost, material_cost, manhour_cost, repaired_portion_treatment, status, record_added_by
//                 ) VALUES (
//                     :defect_id, :repair_start, :repair_end, :time_consumed, :defect_category_mc, 
//                     :occurrence_process_mc, :parts_removed,
//                     :quantity, :unit_cost, :material_cost, :manhour_cost, :portion_treatment, :status, :record_added_by
//                 )
//             ";
//             $stmt1 = $conn->prepare($query1, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
//             $stmt1->bindParam(':defect_id', $defect_id, PDO::PARAM_STR);
//             $stmt1->bindParam(':repair_start', $repair_start_mc, PDO::PARAM_STR);
//             $stmt1->bindParam(':repair_end', $repair_end_mc, PDO::PARAM_STR);
//             $stmt1->bindParam(':time_consumed', $time_consumed_mc, PDO::PARAM_STR);
//             $stmt1->bindParam(':defect_category_mc', $defect_category_mc, PDO::PARAM_STR);
//             $stmt1->bindParam(':occurrence_process_mc', $occurrence_process_mc, PDO::PARAM_STR);
//             $stmt1->bindParam(':parts_removed', $parts_removed_mc, PDO::PARAM_STR);
//             $stmt1->bindParam(':quantity', $quantity_mc, PDO::PARAM_STR);
//             $stmt1->bindParam(':unit_cost', $unit_cost_mc, PDO::PARAM_STR);
//             $stmt1->bindParam(':material_cost', $material_cost_mc, PDO::PARAM_STR);
//             $stmt1->bindParam(':manhour_cost', $manhour_cost_mc, PDO::PARAM_STR);
//             $stmt1->bindParam(':portion_treatment', $portion_treatment, PDO::PARAM_STR);
//             $stmt1->bindParam(':status', $status, PDO::PARAM_STR);
//             $stmt1->bindParam(':record_added_by', $record_added_by, PDO::PARAM_STR);

//             if (!$stmt1->execute()) {
//                 $message = 'error';
//                 $error = 1;
//             }
//         }
//     }

//     if ($error > 0) {
//         echo $message;
//     } else {
//         echo 'success';
//     }
// }

// mssql
if ($method == 'add_defect_mancost_record') {
    $record_type = trim($_POST['record_type']);
    $line_no = trim($_POST['line_no']);
    $line_category_dr = trim($_POST['line_category_dr']);
    $padded_line_no = str_pad($line_no, 4, '0', STR_PAD_LEFT);
    $date_detected = trim($_POST['date_detected']);
    $issue_tag = trim($_POST['issue_tag']);
    $repairing_date = trim($_POST['repairing_date']);
    $car_maker = trim($_POST['car_maker']);
    $product_name = trim($_POST['product_name']);
    $lot_no = trim($_POST['lot_no']);
    $serial_no = trim($_POST['serial_no']);
    $discovery_process_dr = trim($_POST['discovery_process_dr']);
    $discovery_id_no_dr = trim($_POST['discovery_id_no_dr']);
    $discovery_person = trim($_POST['discovery_person']);
    $occurrence_process_dr = trim($_POST['occurrence_process_dr']);
    $occurrence_shift_dr = trim($_POST['occurrence_shift_dr']);
    $occurrence_id_no_dr = trim($_POST['occurrence_id_no_dr']);
    $occurrence_person = trim($_POST['occurrence_person']);
    $outflow_process_dr = trim($_POST['outflow_process_dr']);
    $outflow_shift_dr = trim($_POST['outflow_shift_dr']);
    $outflow_id_no_dr = trim($_POST['outflow_id_no_dr']);
    $outflow_person = trim($_POST['outflow_person']);
    $defect_category_dr = trim($_POST['defect_category_dr']);
    $sequence_no = trim($_POST['sequence_no']);
    $assy_board_no_dr = trim($_POST['assy_board_no_dr']);
    $defect_cause_dr = trim($_POST['defect_cause_dr']);
    $good_measurement_dr = trim($_POST['good_measurement_dr']);
    $ng_measurement_dr = trim($_POST['ng_measurement_dr']);
    $wire_type_dr = trim($_POST['wire_type_dr']);
    $wire_size_dr = trim($_POST['wire_size_dr']);
    $connector_cavity_dr = trim($_POST['connector_cavity_dr']);
    $detail_content_defect = trim($_POST['detail_content_defect']);
    $treatment_content_defect = trim($_POST['treatment_content_defect']);
    $harness_status_dr = trim($_POST['harness_status_dr']);

    // $repair_person_dr = trim($_POST['repair_person_dr']);
    // $repair_start_mc = trim($_POST['repair_start_mc']);
    // $repair_end_mc = trim($_POST['repair_end_mc']);
    // $time_consumed_mc = trim($_POST['time_consumed_mc']);
    // $defect_category_mc = trim($_POST['defect_category_mc']);
    // $occurrence_process_mc = trim($_POST['occurrence_process_mc']);
    // $parts_removed_mc = trim($_POST['parts_removed_mc']);
    // $quantity_mc = trim($_POST['quantity_mc']);
    // $unit_cost_mc = trim($_POST['unit_cost_mc']);
    // $material_cost_mc = trim($_POST['material_cost_mc']);
    // $manhour_cost_mc = trim($_POST['manhour_cost_mc']);
    // $portion_treatment = trim($_POST['portion_treatment']);
    $defect_id = $_POST['defect_id'];
    $status = 'Saved';
    $record_added_by = $_SESSION['full_name'];
    $qc_status = 'Saved';

    $error = 0;
    $message = "";

    // Check if defect ID already exists
    $check = "SELECT defect_id FROM t_defect_record_f WHERE defect_id = :defect_id";
    $stmt = $conn->prepare($check, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->bindParam(':defect_id', $defect_id, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $error = 1;
        $message = 'Defect ID already exists.';
    } else {
        // Insert into t_defect_record_f
        $query = "
             INSERT INTO t_defect_record_f (
                defect_id, line_no, category, date_detected, issue_no_tag, repairing_date, car_maker, product_name, 
                lot_no, serial_no, discovery_process, discovery_id_num, discovery_person, occurrence_process_dr, 
                occurrence_shift, occurrence_id_num, occurrence_person, outflow_process, outflow_shift, 
                outflow_id_num, outflow_person, defect_category_dr, sequence_num, assy_board_no, defect_cause, 
                defect_detail_content, defect_treatment_content, harness_status, dis_assembled_by, good_measurement, 
                ng_measurement, wire_type, wire_size, connector_cavity, qc_status, record_type
            ) VALUES (
                :defect_id, :line_no, :category, :date_detected, :issue_no_tag, :repairing_date, 
                :car_maker, :product_name, :lot_no, :serial_no, :discovery_process, :discovery_id_num, 
                :discovery_person, :occurrence_process_dr, :occurrence_shift, :occurrence_id_num, 
                :occurrence_person, :outflow_process, :outflow_shift, :outflow_id_num, :outflow_person, 
                :defect_category_dr, :sequence_num, :assy_board_no, :defect_cause, :defect_detail_content, 
                :defect_treatment_content, :harness_status, :dis_assembled_by, :good_measurement, :ng_measurement, 
                :wire_type, :wire_size, :connector_cavity, :qc_status, :record_type
            )
        ";
        $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
        $stmt->bindParam(':defect_id', $defect_id, PDO::PARAM_STR);
        $stmt->bindParam(':line_no', $padded_line_no, PDO::PARAM_STR);
        $stmt->bindParam(':category', $line_category_dr, PDO::PARAM_STR);
        $stmt->bindParam(':date_detected', $date_detected, PDO::PARAM_STR);
        $stmt->bindParam(':issue_no_tag', $issue_tag, PDO::PARAM_INT);
        $stmt->bindParam(':repairing_date', $repairing_date, PDO::PARAM_STR);
        $stmt->bindParam(':car_maker', $car_maker, PDO::PARAM_STR);
        $stmt->bindParam(':product_name', $product_name, PDO::PARAM_STR);
        $stmt->bindParam(':lot_no', $lot_no, PDO::PARAM_STR);
        $stmt->bindParam(':serial_no', $serial_no, PDO::PARAM_STR);
        $stmt->bindParam(':discovery_process', $discovery_process_dr, PDO::PARAM_STR);
        $stmt->bindParam(':discovery_id_num', $discovery_id_no_dr, PDO::PARAM_STR);
        $stmt->bindParam(':discovery_person', $discovery_person, PDO::PARAM_STR);
        $stmt->bindParam(':occurrence_process_dr', $occurrence_process_dr, PDO::PARAM_STR);
        $stmt->bindParam(':occurrence_shift', $occurrence_shift_dr, PDO::PARAM_STR);
        $stmt->bindParam(':occurrence_id_num', $occurrence_id_no_dr, PDO::PARAM_STR);
        $stmt->bindParam(':occurrence_person', $occurrence_person, PDO::PARAM_STR);
        $stmt->bindParam(':outflow_process', $outflow_process_dr, PDO::PARAM_STR);
        $stmt->bindParam(':outflow_shift', $outflow_shift_dr, PDO::PARAM_STR);
        $stmt->bindParam(':outflow_id_num', $outflow_id_no_dr, PDO::PARAM_STR);
        $stmt->bindParam(':outflow_person', $outflow_person, PDO::PARAM_STR);
        $stmt->bindParam(':defect_category_dr', $defect_category_dr, PDO::PARAM_STR);
        $stmt->bindParam(':sequence_num', $sequence_no, PDO::PARAM_STR);
        $stmt->bindParam(':assy_board_no', $assy_board_no_dr, PDO::PARAM_STR);
        $stmt->bindParam(':defect_cause', $defect_cause_dr, PDO::PARAM_STR);
        $stmt->bindParam(':defect_detail_content', $detail_content_defect, PDO::PARAM_STR);
        $stmt->bindParam(':defect_treatment_content', $treatment_content_defect, PDO::PARAM_STR);
        $stmt->bindParam(':harness_status', $harness_status_dr, PDO::PARAM_STR);
        $stmt->bindParam(':dis_assembled_by', $repair_person_dr, PDO::PARAM_STR);
        $stmt->bindParam(':good_measurement', $good_measurement_dr, PDO::PARAM_STR);
        $stmt->bindParam(':ng_measurement', $ng_measurement_dr, PDO::PARAM_STR);
        $stmt->bindParam(':wire_type', $wire_type_dr, PDO::PARAM_STR);
        $stmt->bindParam(':wire_size', $wire_size_dr, PDO::PARAM_STR);
        $stmt->bindParam(':connector_cavity', $connector_cavity_dr, PDO::PARAM_STR);
        $stmt->bindParam(':qc_status', $qc_status, PDO::PARAM_STR);
        $stmt->bindParam(':record_type', $record_type, PDO::PARAM_STR);

        if (!$stmt->execute()) {
            $message = 'error';
            $error = 1;
        }

        // Check if update is needed in t_mancost_monitoring_f
        $check1 = "
            UPDATE t_mancost_monitoring_f 
            SET status = :status 
            WHERE defect_id = :defect_id AND record_added_by = :record_added_by
        ";
        $stmt1 = $conn->prepare($check1, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
        $stmt1->bindParam(':status', $status, PDO::PARAM_STR);
        $stmt1->bindParam(':defect_id', $defect_id, PDO::PARAM_STR);
        $stmt1->bindParam(':record_added_by', $record_added_by, PDO::PARAM_STR);
        $stmt1->execute();

        if ($stmt1->rowCount() > 0) {
            // Update was successful
        } else {
            // Insert into t_mancost_monitoring_f
            // $query1 = "
            //     INSERT INTO t_mancost_monitoring_f (
            //         defect_id, repair_start, repair_end, time_consumed, defect_category_mc, occurrence_process_mc, 
            //         parts_removed, quantity, 
            //         unit_cost, material_cost, manhour_cost, repaired_portion_treatment, status, record_added_by
            //     ) VALUES (
            //         :defect_id, :repair_start, :repair_end, :time_consumed, :defect_category_mc, 
            //         :occurrence_process_mc, :parts_removed,
            //         :quantity, :unit_cost, :material_cost, :manhour_cost, :portion_treatment, :status, :record_added_by
            //     )
            // ";

            // $stmt1 = $conn->prepare($query1, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
            // $stmt1->bindParam(':defect_id', $defect_id, PDO::PARAM_STR);
            // $stmt1->bindParam(':repair_start', $repair_start_mc, PDO::PARAM_STR);
            // $stmt1->bindParam(':repair_end', $repair_end_mc, PDO::PARAM_STR);
            // $stmt1->bindParam(':time_consumed', $time_consumed_mc, PDO::PARAM_STR);
            // $stmt1->bindParam(':defect_category_mc', $defect_category_mc, PDO::PARAM_STR);
            // $stmt1->bindParam(':occurrence_process_mc', $occurrence_process_mc, PDO::PARAM_STR);
            // $stmt1->bindParam(':parts_removed', $parts_removed_mc, PDO::PARAM_STR);
            // $stmt1->bindParam(':quantity', $quantity_mc, PDO::PARAM_STR);
            // $stmt1->bindParam(':unit_cost', $unit_cost_mc, PDO::PARAM_STR);
            // $stmt1->bindParam(':material_cost', $material_cost_mc, PDO::PARAM_STR);
            // $stmt1->bindParam(':manhour_cost', $manhour_cost_mc, PDO::PARAM_STR);
            // $stmt1->bindParam(':portion_treatment', $portion_treatment, PDO::PARAM_STR);
            // $stmt1->bindParam(':status', $status, PDO::PARAM_STR);
            // $stmt1->bindParam(':record_added_by', $record_added_by, PDO::PARAM_STR);

            if (!$stmt1->execute()) {
                $message = 'error';
                $error = 1;
            }
        }
    }

    if ($error > 0) {
        echo $message;
    } else {
        echo 'success';
    }
}


// ADDING OF MULTIPLE MANCOST WITH ONE DEFECT ID
// fetch added mancost table
if ($method == 'load_added_mancost') {
    $c = 0;

    $query = "SELECT * FROM t_mancost_monitoring_f WHERE status = 'Added' AND record_added_by = '" . $_SESSION['full_name'] . "'";
    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        foreach ($stmt->fetchAll() as $row) {
            $c++;
            echo '<tr>';
            echo '<td>' . $c . '</td>';
            echo '<td><button type="button" class="btn btn-block btn-outline-danger btn-xs" onclick="delete_added_btn(event)" data-id="' . $row["id"] . '">Remove</button></td>';
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
            echo '</tr>';
        }
    } else {
        echo '<tr>';
        echo '<td colspan="10" style="text-align:center; color:red;">No Added Record</td>';
        echo '</tr>';
    }
}

// delete added mancost
if ($method == 'delete_added_btn') {
    $query = "DELETE FROM t_mancost_monitoring_f WHERE id = :id";
    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->bindParam(':id', $_POST['id']);
    if ($stmt->execute()) {
        echo 'success';
    } else {
        echo 'error';
    }
}

if ($method == 'add_multiple_mancost') {
    $records = $_POST['records'];

    $status = 'Added';
    $record_added_by = $_SESSION['full_name'];

    $error = 0;
    $message = "";

    foreach ($records as $record) {
        $repair_start_mc = trim($record['repair_start_mc']);
        $repair_end_mc = trim($record['repair_end_mc']);
        $time_consumed_mc = trim($record['time_consumed_mc']);
        $defect_category_mc = trim($record['defect_category_mc']);
        $occurrence_process_mc = trim($record['occurrence_process_mc']);
        $parts_removed_mc = trim($record['parts_removed_mc']);
        $quantity_mc = trim($record['quantity_mc']);
        $unit_cost_mc = trim($record['unit_cost_mc']);
        $material_cost_mc = trim($record['material_cost_mc']);
        $manhour_cost_mc = trim($record['manhour_cost_mc']);
        $portion_treatment = trim($record['portion_treatment']);
        $defect_id = $record['defect_id'];

        $query = "INSERT INTO t_mancost_monitoring_f (defect_id,repair_start,repair_end,time_consumed,defect_category_mc,occurrence_process_mc,parts_removed,quantity,unit_cost,material_cost,manhour_cost,repaired_portion_treatment,status,record_added_by) VALUES ('$defect_id','$repair_start_mc','$repair_end_mc','$time_consumed_mc','$defect_category_mc','$occurrence_process_mc','$parts_removed_mc','$quantity_mc','$unit_cost_mc','$material_cost_mc','$manhour_cost_mc','$portion_treatment','$status','$record_added_by')";

        $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));

        if (!$stmt->execute()) {
            $message = 'error';
            $error = 1;
            break;
        }
    }

    if ($error > 0) {
        echo $message;
    } else {
        echo 'success';
    }
}

// if ($method == 'add_multiple_mancost') {
//     $records = $_POST['records'];

//     $status = 'Added';
//     $record_added_by = $_SESSION['full_name'];

//     $error = 0;
//     $message = "";

//     foreach ($records as $record) {
//         // Retrieve and trim the input values
//         $repair_start_mc = isset($record['repair_start_mc']) ? trim($record['repair_start_mc']) : null;
//         $repair_end_mc = isset($record['repair_end_mc']) ? trim($record['repair_end_mc']) : null;
//         $time_consumed_mc = isset($record['time_consumed_mc'])? trim($record['time_consumed_mc']) : null;
//         $defect_category_mc = trim($record['defect_category_mc']);
//         $occurrence_process_mc = trim($record['occurrence_process_mc']);
//         $parts_removed_mc = trim($record['parts_removed_mc']);
//         $quantity_mc = isset($record['quantity_mc'])? trim($record['quantity_mc']) : null;
//         $unit_cost_mc = isset($record['unit_cost_mc'])? trim($record['unit_cost_mc']) : null;
//         $material_cost_mc = isset($record['material_cost_mc'])? trim($record['material_cost_mc']) : null;
//         $manhour_cost_mc = isset($record['manhour_cost_mc'])? trim($record['manhour_cost_mc']) : null;
//         $portion_treatment = trim($record['portion_treatment']);
//         $defect_id = $record['defect_id'];

//         // Prepare the SQL query with placeholders
//         $query = "INSERT INTO t_mancost_monitoring_f (defect_id, repair_start, repair_end, time_consumed, defect_category_mc, occurrence_process_mc, parts_removed, quantity, unit_cost, material_cost, manhour_cost, repaired_portion_treatment, status, record_added_by) VALUES (:defect_id, :repair_start, :repair_end, :time_consumed, :defect_category_mc, :occurrence_process_mc, :parts_removed, :quantity, :unit_cost, :material_cost, :manhour_cost, :portion_treatment, :status, :record_added_by)";

//         $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));

//         // Bind the parameters
//         $stmt->bindParam(':defect_id', $defect_id);
//         $stmt->bindParam(':repair_start', $repair_start_mc, PDO::PARAM_STR); // Use PDO::PARAM_STR explicitly for string fields
//         $stmt->bindParam(':repair_end', $repair_end_mc, PDO::PARAM_STR); 
//         $stmt->bindParam(':time_consumed', $time_consumed_mc, PDO::PARAM_STR);
//         $stmt->bindParam(':defect_category_mc', $defect_category_mc);
//         $stmt->bindParam(':occurrence_process_mc', $occurrence_process_mc);
//         $stmt->bindParam(':parts_removed', $parts_removed_mc);
//         $stmt->bindParam(':quantity', $quantity_mc, PDO::PARAM_STR);
//         $stmt->bindParam(':unit_cost', $unit_cost_mc, PDO::PARAM_STR);
//         $stmt->bindParam(':material_cost', $material_cost_mc, PDO::PARAM_STR);
//         $stmt->bindParam(':manhour_cost', $manhour_cost_mc, PDO::PARAM_STR);
//         $stmt->bindParam(':portion_treatment', $portion_treatment);
//         $stmt->bindParam(':status', $status);
//         $stmt->bindParam(':record_added_by', $record_added_by);

//         // Execute the query
//         if (!$stmt->execute()) {
//             $message = 'error';
//             $error = 1;
//             break;
//         }
//     }

//     if ($error > 0) {
//         echo $message;
//     } else {
//         echo 'success';
//     }
// }




// get issue tag
// mysql
// if ($method == 'get_issue_tag') {
//     $line_no = filter_var($_POST['line_no'], FILTER_SANITIZE_STRING);
//     $padded_line_no = str_pad($line_no, 4, '0', STR_PAD_LEFT);

//     try {
//         $conn->beginTransaction();
//         $check_records_query = "SELECT COUNT(*) FROM t_defect_record_f 
//                                 WHERE line_no = ? 
//                                 AND record_type IN ('Defect and Mancost', 'Defect Only', 'White Tag') 
//                                 AND MONTH(record_added_defect_datetime) = MONTH(CURDATE()) 
//                                 AND YEAR(record_added_defect_datetime) = YEAR(CURDATE())";

//         $stmt_check_records = $conn->prepare($check_records_query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
//         $stmt_check_records->execute([$padded_line_no]);
//         $total_records = $stmt_check_records->fetchColumn();

//         if ($total_records === false) {
//             $total_records = 0;
//         }

//         $issue_no = $total_records + 1;

//         $conn->commit();

//         error_log("Line No: $padded_line_no, Total Records: $total_records, Next Issue No: $issue_no");

//         echo json_encode(['issue_no' => $issue_no]);
//     } catch (Exception $e) {
//         $conn->rollBack();
//         error_log("Error: " . $e->getMessage());
//         echo json_encode(['error' => 'error']);
//     }
//     exit();
// }

// mssql
if ($method == 'get_issue_tag') {
    $line_no = filter_var($_POST['line_no'], FILTER_SANITIZE_STRING);
    $padded_line_no = str_pad($line_no, 4, '0', STR_PAD_LEFT);

    try {
        $conn->beginTransaction();

        $check_records_query = "SELECT COUNT(*) FROM t_defect_record_f 
                                WHERE line_no = ? 
                                AND record_type IN ('Defect and Mancost', 'Defect Only', 'White Tag') 
                                AND MONTH(record_added_defect_datetime) = MONTH(GETDATE()) 
                                AND YEAR(record_added_defect_datetime) = YEAR(GETDATE())";

        $stmt_check_records = $conn->prepare($check_records_query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
        $stmt_check_records->execute([$padded_line_no]);
        $total_records = $stmt_check_records->fetchColumn();

        if ($total_records === false) {
            $total_records = 0;
        }

        $issue_no = $total_records + 1;

        $conn->commit();

        error_log("Line No: $padded_line_no, Total Records: $total_records, Next Issue No: $issue_no");

        echo json_encode(['issue_no' => $issue_no]);
    } catch (Exception $e) {
        $conn->rollBack();
        error_log("Error: " . $e->getMessage());
        echo json_encode(['error' => 'error']);
    }
    exit();
}


// if ($method == 'get_issue_tag') {
//     $line_no = filter_var($_POST['line_no'], FILTER_SANITIZE_STRING);
//     $padded_line_no = str_pad($line_no, 4, '0', STR_PAD_LEFT);

//     try {
//         $conn->beginTransaction();

//         $count_records_query = "SELECT COUNT(*) FROM t_defect_record_f WHERE line_no = ? AND MONTH(record_added_defect_datetime) = MONTH(CURDATE()) AND YEAR(record_added_defect_datetime) = YEAR(CURDATE())";
//         $stmt_count_records = $conn->prepare($count_records_query);
//         $stmt_count_records->execute([$padded_line_no]);
//         $total_records = $stmt_count_records->fetchColumn();

//         $issue_no = $total_records + 1;

//         $conn->commit();

//         error_log("Line No: $padded_line_no, Total Records: $total_records, Next Issue No: $issue_no");

//         echo $issue_no;
//     } catch (Exception $e) {
//         $conn->rollBack();
//         error_log("Error: " . $e->getMessage());
//         echo 'error';
//     }
//     exit();
// }

// fetch unit cost thru part name
// mysql
// if ($method == 'autocomplete_parts') {
//     $inputText = $_POST['input_text'];

//     $query = "SELECT DISTINCT parts_name FROM m_pricelist WHERE parts_name LIKE :input_text LIMIT 10";

//     $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
//     $stmt->bindValue(':input_text', '%' . $inputText . '%');
//     $stmt->execute();

//     $partNames = $stmt->fetchAll(PDO::FETCH_COLUMN);

//     echo json_encode(['part_names' => $partNames]);
//     exit;
// } elseif ($method == 'fetch_unit_price') {
//     $parts_removed = $_POST['parts_removed'];

//     $query = "SELECT unit_price FROM m_pricelist WHERE parts_name = :parts_removed LIMIT 1";

//     $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
//     $stmt->bindParam(':parts_removed', $parts_removed);
//     $stmt->execute();

//     $result = $stmt->fetch(PDO::FETCH_ASSOC);

//     if ($result) {
//         $unit_price = $result['unit_price'];

//         echo json_encode(['unit_price' => $unit_price]);
//     } else {
//         echo json_encode(['error' => 'No matching record found']);
//     }
//     exit;
// }

// mssql
if ($method == 'autocomplete_parts') {
    $inputText = $_POST['input_text'];

    $query = "SELECT DISTINCT TOP 10 parts_name FROM m_pricelist WHERE parts_name LIKE :input_text";

    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->bindValue(':input_text', '%' . $inputText . '%');
    $stmt->execute();

    $partNames = $stmt->fetchAll(PDO::FETCH_COLUMN);

    echo json_encode(['part_names' => $partNames]);
    exit;
} elseif ($method == 'fetch_unit_price') {
    $parts_removed = $_POST['parts_removed'];

    $query = "SELECT TOP 1 unit_price FROM m_pricelist WHERE parts_name = :parts_removed";

    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->bindParam(':parts_removed', $parts_removed);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $unit_price = $result['unit_price'];

        echo json_encode(['unit_price' => $unit_price]);
    } else {
        echo json_encode(['error' => 'No matching record found']);
    }
    exit;
}

// MYSQL
// if ($method == 'update_pd_record') {
//     $mancost_id = $_POST['id'];
//     $line_no = $_POST['line_no'];
//     $issue_no_tag = $_POST['issue_tag'];
//     $serial_no = $_POST['serial_no'];
//     $good_measurement = $_POST['good_measurement'];
//     $ng_measurement = $_POST['ng_measurement'];
//     $wire_type = $_POST['wire_type'];
//     $wire_size = $_POST['wire_size'];
//     $connector_cavity = $_POST['connector_cavity'];
//     $defect_treatment_content = $_POST['defect_treatment_content'];
//     $parts_removed = $_POST['parts_removed'];
//     $quantity = $_POST['quantity'];
//     $unit_cost = $_POST['unit_cost'];
//     $material_cost = $_POST['material_cost'];
//     $defect_id = $_POST['pd_defect_id'];

//     // Fetch the existing line number for comparison
//     $query = "SELECT line_no, issue_no_tag FROM t_defect_record_f WHERE defect_id = :defect_id";
//     $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
//     $stmt->bindParam(':defect_id', $pd_defect_id);
//     $stmt->execute();
//     $existingRecord = $stmt->fetch(PDO::FETCH_ASSOC);

//     $query = "UPDATE t_defect_record_f AS d 
//               INNER JOIN t_mancost_monitoring_f AS m 
//               ON d.defect_id = m.defect_id 
//               SET d.line_no = :line_no, 
//                   d.issue_no_tag = :issue_no_tag, 
//                   d.serial_no = :serial_no, 
//                   d.good_measurement = :good_measurement, 
//                   d.ng_measurement = :ng_measurement, 
//                   d.wire_type = :wire_type, 
//                   d.wire_size = :wire_size, 
//                   d.connector_cavity = :connector_cavity, 
//                   d.defect_treatment_content = :defect_treatment_content, 
//                   m.parts_removed = :parts_removed, 
//                   m.quantity = :quantity, 
//                   m.unit_cost = :unit_cost, 
//                   m.material_cost = :material_cost 
//               WHERE d.defect_id = :defect_id AND m.id = :mancost_id";

//     $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
//     $stmt->bindParam(':line_no', $line_no);
//     $stmt->bindParam(':issue_no_tag', $issue_no_tag);
//     $stmt->bindParam(':serial_no', $serial_no);
//     $stmt->bindParam(':good_measurement', $good_measurement);
//     $stmt->bindParam(':ng_measurement', $ng_measurement);
//     $stmt->bindParam(':wire_type', $wire_type);
//     $stmt->bindParam(':wire_size', $wire_size);
//     $stmt->bindParam(':connector_cavity', $connector_cavity);
//     $stmt->bindParam(':defect_treatment_content', $defect_treatment_content);
//     $stmt->bindParam(':parts_removed', $parts_removed);
//     $stmt->bindParam(':quantity', $quantity);
//     $stmt->bindParam(':unit_cost', $unit_cost);
//     $stmt->bindParam(':material_cost', $material_cost);
//     $stmt->bindParam(':defect_id', $defect_id);

//     $stmt->bindParam(':mancost_id', $mancost_id);

//     if ($stmt->execute()) {
//         echo "success";
//     } else {
//         echo "Update failed: " . implode(", ", $stmt->errorInfo());
//     }
// }

// MSSQL
if ($method == 'update_pd_record') {
    $mancost_id = $_POST['id'];
    $line_no = $_POST['line_no'];
    $issue_no_tag = $_POST['issue_tag'];
    $serial_no = $_POST['serial_no'];
    $good_measurement = $_POST['good_measurement'];
    $ng_measurement = $_POST['ng_measurement'];
    $wire_type = $_POST['wire_type'];
    $wire_size = $_POST['wire_size'];
    $connector_cavity = $_POST['connector_cavity'];
    $defect_treatment_content = $_POST['defect_treatment_content'];
    $parts_removed = $_POST['parts_removed'];
    $quantity = $_POST['quantity'];
    $unit_cost = $_POST['unit_cost'];
    $material_cost = $_POST['material_cost'];
    $defect_id = $_POST['pd_defect_id'];

    try {
        // Fetch the existing line number and issue number tag for comparison
        $query = "SELECT line_no, issue_no_tag FROM t_defect_record_f WHERE defect_id = :defect_id";
        $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
        $stmt->bindParam(':defect_id', $defect_id);
        $stmt->execute();
        $existingRecord = $stmt->fetch(PDO::FETCH_ASSOC);

        // Update t_defect_record_f
        $query1 = "
            UPDATE t_defect_record_f
            SET line_no = :line_no,
                issue_no_tag = :issue_no_tag,
                serial_no = :serial_no,
                good_measurement = :good_measurement,
                ng_measurement = :ng_measurement,
                wire_type = :wire_type,
                wire_size = :wire_size,
                connector_cavity = :connector_cavity,
                defect_treatment_content = :defect_treatment_content
            WHERE defect_id = :defect_id;
        ";

        $stmt1 = $conn->prepare($query1, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
        $stmt1->bindParam(':line_no', $line_no);
        $stmt1->bindParam(':issue_no_tag', $issue_no_tag);
        $stmt1->bindParam(':serial_no', $serial_no);
        $stmt1->bindParam(':good_measurement', $good_measurement);
        $stmt1->bindParam(':ng_measurement', $ng_measurement);
        $stmt1->bindParam(':wire_type', $wire_type);
        $stmt1->bindParam(':wire_size', $wire_size);
        $stmt1->bindParam(':connector_cavity', $connector_cavity);
        $stmt1->bindParam(':defect_treatment_content', $defect_treatment_content);
        $stmt1->bindParam(':defect_id', $defect_id);
        $stmt1->execute();

        // Update t_mancost_monitoring_f
        $query2 = "
            UPDATE t_mancost_monitoring_f
            SET parts_removed = :parts_removed,
                quantity = :quantity,
                unit_cost = :unit_cost,
                material_cost = :material_cost
            WHERE id = :mancost_id AND defect_id = :defect_id;
        ";

        $stmt2 = $conn->prepare($query2, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
        $stmt2->bindParam(':parts_removed', $parts_removed);
        $stmt2->bindParam(':quantity', $quantity);
        $stmt2->bindParam(':unit_cost', $unit_cost);
        $stmt2->bindParam(':material_cost', $material_cost);
        $stmt2->bindParam(':mancost_id', $mancost_id);
        $stmt2->bindParam(':defect_id', $defect_id);
        $stmt2->execute();

        echo "success";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}



// FOR PD EDIT UPDATE DEFECT MANCOST
// mysql
// if ($method == 'get_update_issue_tag') {
//     $line_no = filter_var($_POST['line_no'], FILTER_SANITIZE_STRING);
//     $padded_line_no = str_pad($line_no, 4, '0', STR_PAD_LEFT);

//     try {
//         // Begin a transaction
//         $conn->beginTransaction();

//         // Check if there are any records for the current month and year for the given line number
//         $check_records_query = "SELECT COUNT(*) FROM t_defect_record_f WHERE line_no = ? AND MONTH(record_added_defect_datetime) = MONTH(CURDATE()) AND YEAR(record_added_defect_datetime) = YEAR(CURDATE())";
//         $stmt_check_records = $conn->prepare($check_records_query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
//         $stmt_check_records->execute([$padded_line_no]);
//         $total_records = $stmt_check_records->fetchColumn();

//         // Reset issue number to 1 if there are no records or if the month has changed
//         if ($total_records == 0 || $total_records === false) {
//             $issue_no = 1;
//         } else {
//             // Increment the count of records by 1 to get the next issue tag number
//             $issue_no = $total_records + 1;
//         }

//         // Commit the transaction
//         $conn->commit();

//         // Debugging output
//         error_log("Line No: $padded_line_no, Total Records: $total_records, Next Issue No: $issue_no");

//         echo json_encode(['issue_no' => $issue_no]);  // Return JSON response
//     } catch (Exception $e) {
//         // Rollback the transaction in case of error
//         $conn->rollBack();
//         error_log("Error: " . $e->getMessage());
//         echo json_encode(['error' => 'error']);  // Return JSON error response
//     }
//     exit();
// }

// mssql
if ($method == 'get_update_issue_tag') {
    $line_no = filter_var($_POST['line_no'], FILTER_SANITIZE_STRING);
    $padded_line_no = str_pad($line_no, 4, '0', STR_PAD_LEFT);

    try {
        $conn->beginTransaction();
        $check_records_query = "SELECT COUNT(*) FROM t_defect_record_f 
                                WHERE line_no = ? 
                                AND MONTH(record_added_defect_datetime) = MONTH(GETDATE()) 
                                AND YEAR(record_added_defect_datetime) = YEAR(GETDATE())";
        $stmt_check_records = $conn->prepare($check_records_query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
        $stmt_check_records->execute([$padded_line_no]);
        $total_records = $stmt_check_records->fetchColumn();

        if ($total_records == 0 || $total_records === false) {
            $issue_no = 1;
        } else {
            $issue_no = $total_records + 1;
        }

        $conn->commit();

        error_log("Line No: $padded_line_no, Total Records: $total_records, Next Issue No: $issue_no");

        echo json_encode(['issue_no' => $issue_no]);
    } catch (Exception $e) {
        $conn->rollBack();
        error_log("Error: " . $e->getMessage());
        echo json_encode(['error' => 'error']);
    }
    exit();
}


// FOR MANCOST EDIT
// mysql
// if ($method == 'autocomplete_parts_update') {
//     $inputText = $_POST['input_text'];

//     $query = "SELECT DISTINCT parts_name FROM m_pricelist WHERE parts_name LIKE :input_text LIMIT 10";

//     $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
//     $stmt->bindValue(':input_text', '%' . $inputText . '%');
//     $stmt->execute();

//     $partNames = $stmt->fetchAll(PDO::FETCH_COLUMN);

//     echo json_encode(['part_names' => $partNames]);
//     exit;
// } elseif ($method == 'fetch_unit_price_update') {
//     $parts_removed = $_POST['parts_removed'];

//     $query = "SELECT unit_price FROM m_pricelist WHERE parts_name = :parts_removed LIMIT 1";

//     $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
//     $stmt->bindParam(':parts_removed', $parts_removed);
//     $stmt->execute();

//     $result = $stmt->fetch(PDO::FETCH_ASSOC);

//     if ($result) {
//         $unit_price = $result['unit_price'];

//         echo json_encode(['unit_price' => $unit_price]);
//     } else {
//         echo json_encode(['error' => 'No matching record found']);
//     }
//     exit;
// }

// mssql
if ($method == 'autocomplete_parts_update') {
    $inputText = $_POST['input_text'];

    $query = "SELECT DISTINCT TOP 10 parts_name FROM m_pricelist WHERE parts_name LIKE :input_text";

    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->bindValue(':input_text', '%' . $inputText . '%');
    $stmt->execute();

    $partNames = $stmt->fetchAll(PDO::FETCH_COLUMN);

    echo json_encode(['part_names' => $partNames]);
    exit;
} elseif ($method == 'fetch_unit_price_update') {
    $parts_removed = $_POST['parts_removed'];

    $query = "SELECT TOP 1 unit_price FROM m_pricelist WHERE parts_name = :parts_removed";

    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->bindParam(':parts_removed', $parts_removed);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $unit_price = $result['unit_price'];

        echo json_encode(['unit_price' => $unit_price]);
    } else {
        echo json_encode(['error' => 'No matching record found']);
    }
    exit;
}

$conn = NULL;