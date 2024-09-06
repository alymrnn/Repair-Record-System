<?php
session_start();
include '../conn.php';
// include '../conn_emp_mgt.php';

$method = $_POST['method'];

if ($method == 'fetch_opt_line_no_qa') {
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

if ($method == 'fetch_opt_record_type_qa') {
    $query = "SELECT record_name FROM m_record_type ORDER BY record_name ASC";
    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo '<option value="" disabled selected>Record Type</option>';
        foreach ($stmt->fetchALL() as $row) {
            echo '<option>' . htmlspecialchars($row['record_name']) . '</option>';
        }
    } else {
        echo '<option value="">Select record type</option>';
    }
}

if ($method == 'fetch_opt_category_qa') {
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
        echo '<option value="">Select category</option>';
    }
}

if ($method == 'fetch_opt_discovery_process_qa') {
    $query = "SELECT discovery_process FROM m_dr_discovery_p ORDER BY discovery_process ASC";
    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo '<option value="" disabled selected>Select discovery process</option>';
        foreach ($stmt->fetchALL() as $row) {
            echo '<option>' . htmlspecialchars($row['discovery_process']) . '</option>';
        }
    } else {
        echo '<option>Select discovery process</option>';
    }
}

if ($method == 'fetch_opt_occurrence_process_qa') {
    $query = "SELECT occurrence_process FROM m_dr_occurrence_p ORDER BY occurrence_process ASC";
    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo '<option value="" disabled selected>Select occurrence process</option>';
        foreach ($stmt->fetchALL() as $row) {
            echo '<option>' . htmlspecialchars($row['occurrence_process']) . '</option>';
        }
    } else {
        echo '<option>Select occurrence process</option>';
    }
}

if ($method == 'fetch_opt_occurrence_shift_qa') {
    $query = "SELECT shift FROM m_shift ORDER BY shift ASC";
    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo '<option value="" disabled selected>Select occurrence shift</option>';
        foreach ($stmt->fetchALL() as $row) {
            echo '<option>' . htmlspecialchars($row['shift']) . '</option>';
        }
    } else {
        echo '<option>Select occurrence shift</option>';
    }
}

if ($method == 'fetch_opt_outflow_process_qa') {
    $query = "SELECT outflow_process FROM m_dr_outflow_p ORDER BY outflow_process ASC";
    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo '<option value="" disabled selected>Select outflow process</option>';
        foreach ($stmt->fetchALL() as $row) {
            echo '<option>' . htmlspecialchars($row['outflow_process']) . '</option>';
        }
    } else {
        echo '<option>Select outflow process</option>';
    }
}

if ($method == 'fetch_opt_outflow_shift_qa') {
    $query = "SELECT shift FROM m_shift ORDER BY shift ASC";
    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo '<option value="" disabled selected>Select outflow shift</option>';
        foreach ($stmt->fetchALL() as $row) {
            echo '<option>' . htmlspecialchars($row['shift']) . '</option>';
        }
    } else {
        echo '<option>Select outflow shift</option>';
    }
}

if ($method == 'fetch_opt_defect_category_qa') {
    $query = "SELECT defect_category_ng_content FROM m_dr_defect_c ORDER BY defect_category_ng_content ASC";
    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo '<option value="" disabled selected>Select defect category</option>';
        foreach ($stmt->fetchALL() as $row) {
            echo '<option>' . htmlspecialchars($row['defect_category_ng_content']) . '</option>';
        }
    } else {
        echo '<option>Select defect category</option>';
    }
}

if ($method == 'fetch_opt_defect_cause_qa') {
    $query = "SELECT defect_cause FROM m_defect_cause ORDER BY defect_cause ASC";
    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo '<option value="" disabled selected>Select cause of defect</option>';
        foreach ($stmt->fetchALL() as $row) {
            echo '<option>' . htmlspecialchars($row['defect_cause']) . '</option>';
        }
    } else {
        echo '<option>Select cause of defect</option>';
    }
}

function generate_defect_id($defect_id_qa)
{
    if (empty($defect_id_qa)) {
        $prefix = 'DRMMCM-';
        $unique_part = uniqid('', true);
        $defect_id_qa = $prefix . $unique_part;
    }
    return $defect_id_qa;
}

function count_defect_qa_list($conn, $search_product_name_qa, $search_lot_no_qa, $search_serial_no_qa, $search_record_type_qa, $search_line_no_qa, $search_date_from_qa, $search_date_to_qa)
{
    $query = "SELECT COUNT(id) AS total FROM t_defect_record_f";
    $conditions = [];
    $params = [];

    $conditions[] = "(pending_status_2 = 'Added')";

    if (!empty($search_date_from_qa) && !empty($search_date_to_qa)) {
        $conditions[] = "date_detected BETWEEN ? AND ?";
        $params[] = $search_date_from_qa;
        $params[] = $search_date_to_qa;
    }

    if (!empty($search_line_no_qa)) {
        $conditions[] = "line_no LIKE ?";
        $params[] = '%' . $search_line_no_qa . '%';
    }

    if (!empty($search_record_type_qa) && $search_record_type_qa !== '%') {
        $conditions[] = "record_type LIKE ?";
        $params[] = '%' . $search_record_type_qa . '%';
    }

    if (!empty($search_product_name_qa) && $search_product_name_qa !== '%') {
        $conditions[] = "product_name LIKE ?";
        $params[] = '%' . $search_product_name_qa . '%';
    }

    if (!empty($search_serial_no_qa) && $search_serial_no_qa !== '%') {
        $conditions[] = "serial_no LIKE ?";
        $params[] = '%' . $search_serial_no_qa . '%';
    }

    if (!empty($search_lot_no_qa) && $search_lot_no_qa !== '%') {
        $conditions[] = "lot_no LIKE ?";
        $params[] = '%' . $search_lot_no_qa . '%';
    }

    if (!empty($conditions)) {
        $query .= " WHERE " . implode(" AND ", $conditions);
    }

    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute($params);

    $total = $stmt->fetchColumn();

    return $total;
}

if ($method == 'count_defect_qa_list') {
    $search_product_name_qa = trim($_POST['search_product_name_qa']);
    $search_serial_no_qa = trim($_POST['search_serial_no_qa']);
    $search_lot_no_qa = trim($_POST['search_lot_no_qa']);
    $search_record_type_qa = trim($_POST['search_record_type_qa']);
    $search_line_no_qa = trim($_POST['search_line_no_qa']);

    $search_date_from_qa = trim($_POST['search_date_from_qa']);
    if (!empty($search_date_from_qa)) {
        $search_date_from_qa = date_create($search_date_from_qa);
        $search_date_from_qa = date_format($search_date_from_qa, "Y/m/d");
    }

    $search_date_to_qa = trim($_POST['search_date_to_qa']);
    if (!empty($search_date_to_qa)) {
        $search_date_to_qa = date_create($search_date_to_qa);
        $search_date_to_qa = date_format($search_date_to_qa, "Y/m/d");
    }

    echo count_defect_qa_list($conn, $search_product_name_qa, $search_lot_no_qa, $search_serial_no_qa, $search_record_type_qa, $search_line_no_qa, $search_date_from_qa, $search_date_to_qa);
}

if ($method == 'defect_qa_list_pagination') {
    $search_product_name_qa = trim($_POST['search_product_name_qa']);
    $search_serial_no_qa = trim($_POST['search_serial_no_qa']);
    $search_lot_no_qa = trim($_POST['search_lot_no_qa']);
    $search_record_type_qa = trim($_POST['search_record_type_qa']);
    $search_line_no_qa = trim($_POST['search_line_no_qa']);

    $search_date_from_qa = trim($_POST['search_date_from_qa']);
    if (!empty($search_date_from_qa)) {
        $search_date_from_qa = date_create($search_date_from_qa);
        $search_date_from_qa = date_format($search_date_from_qa, "Y/m/d");
    }

    $search_date_to_qa = trim($_POST['search_date_to_qa']);
    if (!empty($search_date_to_qa)) {
        $search_date_to_qa = date_create($search_date_to_qa);
        $search_date_to_qa = date_format($search_date_to_qa, "Y/m/d");
    }

    $results_per_page = 20;

    $number_of_result = intval(count_defect_qa_list($conn, $search_product_name_qa, $search_lot_no_qa, $search_serial_no_qa, $search_record_type_qa, $search_line_no_qa, $search_date_from_qa, $search_date_to_qa));

    $number_of_page = ceil($number_of_result / $results_per_page);

    for ($page = 1; $page <= $number_of_page; $page++) {
        echo '<option value="' . $page . '">' . $page . '</option>';
    }
}

if ($method == 'defect_qa_list_last_page') {
    $search_product_name_qa = trim($_POST['search_product_name_qa']);
    $search_serial_no_qa = trim($_POST['search_serial_no_qa']);
    $search_lot_no_qa = trim($_POST['search_lot_no_qa']);
    $search_record_type_qa = trim($_POST['search_record_type_qa']);
    $search_line_no_qa = trim($_POST['search_line_no_qa']);

    $search_date_from_qa = trim($_POST['search_date_from_qa']);
    if (!empty($search_date_from_qa)) {
        $search_date_from_qa = date_create($search_date_from_qa);
        $search_date_from_qa = date_format($search_date_from_qa, "Y/m/d");
    }

    $search_date_to_qa = trim($_POST['search_date_to_qa']);
    if (!empty($search_date_to_qa)) {
        $search_date_to_qa = date_create($search_date_to_qa);
        $search_date_to_qa = date_format($search_date_to_qa, "Y/m/d");
    }

    $results_per_page = 20;
    $number_of_result = intval(count_defect_qa_list($conn, $search_product_name_qa, $search_lot_no_qa, $search_serial_no_qa, $search_record_type_qa, $search_line_no_qa, $search_date_from_qa, $search_date_to_qa));

    $number_of_page = ceil($number_of_result / $results_per_page);

    echo $number_of_page;
}

if ($method == 'load_defect_table_qa') {
    $search_product_name_qa = trim($_POST['search_product_name_qa']);
    $search_serial_no_qa = trim($_POST['search_serial_no_qa']);
    $search_lot_no_qa = trim($_POST['search_lot_no_qa']);
    $search_record_type_qa = trim($_POST['search_record_type_qa']);
    $search_line_no_qa = trim($_POST['search_line_no_qa']);

    $search_date_from_qa = trim($_POST['search_date_from_qa']);
    if (!empty($search_date_from_qa)) {
        $search_date_from_qa = date_create($search_date_from_qa);
        $search_date_from_qa = date_format($search_date_from_qa, "Y/m/d");
    }

    $search_date_to_qa = trim($_POST['search_date_to_qa']);
    if (!empty($search_date_to_qa)) {
        $search_date_to_qa = date_create($search_date_to_qa);
        $search_date_to_qa = date_format($search_date_to_qa, "Y/m/d");
    }

    $current_page = isset($_POST['current_page']) ? max(1, intval($_POST['current_page'])) : 1;
    $c = 0;

    $results_per_page = 20;

    $page_first_result = ($current_page - 1) * $results_per_page;

    $c = $page_first_result;

    $query = "SELECT * FROM t_defect_record_f";
    $conditions = [];

    $conditions[] = "(pending_status_2 = 'Added')";

    if (!empty($search_date_from_qa) && !empty($search_date_to_qa)) {
        $conditions[] = "date_detected BETWEEN :search_date_from_qa AND :search_date_to_qa";
    }

    if (!empty($search_line_no_qa)) {
        $conditions[] = "line_no LIKE :search_line_no_qa";
    }

    if (!empty($search_record_type_qa) && $search_record_type_qa !== '%') {
        $conditions[] = "record_type LIKE :search_record_type_qa";
    }

    if (!empty($search_product_name_qa)) {
        $conditions[] = "product_name LIKE :search_product_name_qa";
    }

    if (!empty($search_lot_no_qa)) {
        $conditions[] = "lot_no LIKE :search_lot_no_qa";
    }

    if (!empty($search_serial_no_qa)) {
        $conditions[] = "serial_no LIKE :search_serial_no_qa";
    }

    if (!empty($conditions)) {
        $query .= " WHERE " . implode(" AND ", $conditions);
    }

    $query .= " ORDER BY record_added_defect_datetime DESC";

    $query .= " OFFSET :page_first_result ROWS FETCH NEXT :results_per_page ROWS ONLY";

    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));

    if (!empty($search_date_from_qa) && !empty($search_date_to_qa)) {
        $stmt->bindValue(':search_date_from_qa', $search_date_from_qa, PDO::PARAM_STR);
        $stmt->bindValue(':search_date_to_qa', $search_date_to_qa, PDO::PARAM_STR);
    }
    if (!empty($search_line_no_qa)) {
        $stmt->bindValue(':search_line_no_qa', $search_line_no_qa . '%', PDO::PARAM_STR);
    }
    if (!empty($search_record_type_qa) && $search_record_type_qa !== '%') {
        $stmt->bindValue(':search_record_type_qa', $search_record_type_qa . '%', PDO::PARAM_STR);
    }
    if (!empty($search_product_name_qa)) {
        $stmt->bindValue(':search_product_name_qa', $search_product_name_qa . '%', PDO::PARAM_STR);
    }
    if (!empty($search_lot_no_qa)) {
        $stmt->bindValue(':search_lot_no_qa', $search_lot_no_qa . '%', PDO::PARAM_STR);
    }
    if (!empty($search_serial_no_qa)) {
        $stmt->bindValue(':search_serial_no_qa', $search_serial_no_qa . '%', PDO::PARAM_STR);
    }
    $stmt->bindValue(':page_first_result', $page_first_result, PDO::PARAM_INT);
    $stmt->bindValue(':results_per_page', $results_per_page, PDO::PARAM_INT);

    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
            $c++;
            echo '<tr style="cursor:pointer;">';
            echo '<td style="text-align:center;">' . $c . '</td>';
            echo '<td style="text-align:center;">' . $row['line_no'] . '</td>';
            echo '<td style="text-align:center;">' . $row['category'] . '</td>';
            echo '<td style="text-align:center;">' . $row['date_detected'] . '</td>';
            echo '<td style="text-align:center;">' . $row['issue_no_tag'] . '</td>';
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
            echo '<td style="text-align:center;">' . $row['dc_foreign_mat_details'] . '</td>';
            echo '<td style="text-align:center;">' . $row['dc_foreign_mat_category'] . '</td>';
            echo '<td style="text-align:center;">' . $row['sequence_num'] . '</td>';
            echo '<td style="text-align:center;">' . $row['assy_board_no'] . '</td>';
            echo '<td style="text-align:center;">' . $row['defect_cause'] . '</td>';
            echo '<td style="text-align:center;">' . $row['good_measurement'] . '</td>';
            echo '<td style="text-align:center;">' . $row['ng_measurement'] . '</td>';
            echo '<td style="text-align:center;">' . $row['wire_type'] . '</td>';
            echo '<td style="text-align:center;">' . $row['wire_size'] . '</td>';
            echo '<td style="text-align:center;">' . $row['connector_cavity'] . '</td>';
            echo '<td style="text-align:center;">' . $row['defect_detail_content'] . '</td>';
            echo '</tr>';
        }
    } else {
        echo '<tr>';
        echo '<td colspan="12" style="text-align:center; color:red;">No Record Found</td>';
        echo '</tr>';
    }
}

if ($method == 'get_issue_tag_qa') {
    $line_no_qa = filter_var($_POST['line_no_qa'], FILTER_SANITIZE_STRING);
    $padded_line_no_qa = str_pad($line_no_qa, 4, '0', STR_PAD_LEFT);

    try {
        $conn->beginTransaction();

        $check_records_query = "SELECT COUNT(*) FROM t_defect_record_f 
                                WHERE line_no = ? 
                                AND record_type IN ('Defect and Mancost', 'Defect Only', 'White Tag') 
                                AND MONTH(record_added_defect_datetime) = MONTH(GETDATE()) 
                                AND YEAR(record_added_defect_datetime) = YEAR(GETDATE())";

        $stmt_check_records = $conn->prepare($check_records_query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
        $stmt_check_records->execute([$padded_line_no_qa]);
        $total_records = $stmt_check_records->fetchColumn();

        if ($total_records === false) {
            $total_records = 0;
        }

        $issue_no = $total_records + 1;

        $conn->commit();

        echo json_encode(['issue_no' => $issue_no]);
    } catch (Exception $e) {
        $conn->rollBack();
        error_log("Error: " . $e->getMessage());
        echo json_encode(['error' => 'error']);
    }
    exit();
}

if ($method == 'add_record_inspector') {
    $record_type_qa = trim($_POST['record_type_qa']);
    $line_no_qa = trim($_POST['line_no_qa']);
    $line_category_qa = trim($_POST['line_category_qa']);
    $padded_line_no_qa = str_pad($line_no_qa, 4, '0', STR_PAD_LEFT);

    $date_detected_qa = trim($_POST['date_detected_qa']);
    $repairing_date_qa = trim($_POST['repairing_date_qa']);

    $date_detected_qa = !empty($date_detected_qa) ? date('Y-m-d', strtotime($date_detected_qa)) : null;
    $repairing_date_qa = !empty($repairing_date_qa) ? date('Y-m-d', strtotime($repairing_date_qa)) : null;

    $issue_tag_qa = trim($_POST['issue_tag_qa']);
    $car_maker_qa = trim($_POST['car_maker_qa']);
    $product_name_qa = trim($_POST['product_name_qa']);
    $lot_no_qa = trim($_POST['lot_no_qa']);
    $serial_no_qa = trim($_POST['serial_no_qa']);
    $discovery_process_qa = trim($_POST['discovery_process_qa']);
    $discovery_id_no_qa = trim($_POST['discovery_id_no_qa']);
    $discovery_person_qa = trim($_POST['discovery_person_qa']);
    $occurrence_process_dr_qa = trim($_POST['occurrence_process_dr_qa']);
    $occurrence_shift_qa = trim($_POST['occurrence_shift_qa']);
    $occurrence_id_no_qa = trim($_POST['occurrence_id_no_qa']);
    $occurrence_person_qa = trim($_POST['occurrence_person_qa']);
    $outflow_process_qa = trim($_POST['outflow_process_qa']);
    $outflow_shift_qa = trim($_POST['outflow_shift_qa']);
    $outflow_id_no_qa = trim($_POST['outflow_id_no_qa']);
    $outflow_person_qa = trim($_POST['outflow_person_qa']);

    $defect_category_dr_qa = trim($_POST['defect_category_dr_qa']);
    $defect_categ_foreign_mat = trim($_POST['defect_categ_foreign_mat']);
    $defect_categ_foreign_mat_2 = trim($_POST['defect_categ_foreign_mat_2']);

    $sequence_no_qa = trim($_POST['sequence_no_qa']);
    $assy_board_no_qa = trim($_POST['assy_board_no_qa']);
    $defect_cause_qa = trim($_POST['defect_cause_qa']);
    $good_measurement_qa = trim($_POST['good_measurement_qa']);
    $ng_measurement_qa = trim($_POST['ng_measurement_qa']);
    $wire_type_qa = trim($_POST['wire_type_qa']);
    $wire_size_qa = trim($_POST['wire_size_qa']);
    $connector_cavity_qa = trim($_POST['connector_cavity_qa']);
    $detail_content_defect_qa = trim($_POST['detail_content_defect_qa']);
    $treatment_content_defect_qa = trim($_POST['treatment_content_defect_qa']);
    $harness_status_qa = trim($_POST['harness_status_qa']);

    $status_qa = '';
    $record_added_by_qa = $_SESSION['full_name'];
    $qc_status_qa = '';
    $pending_status_qa = 'Pending';
    $harness_repair_qa = 'Pending';
    $pending_status_2 = 'Added';

    $error = 0;

    $defect_id_qa = $_POST['defect_id_qa'];
    $message = '';

    if (empty($defect_id_qa)) {
        $defect_id_qa = generate_defect_id($defect_id_qa);
    }

    $response_arr = array(
        'defect_id' => $defect_id_qa,
        'message' => 'success'
    );

    $check = "SELECT defect_id FROM t_defect_record_f WHERE defect_id = :defect_id";
    $stmt = $conn->prepare($check, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->bindParam(':defect_id', $defect_id_qa);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $response_arr['message'] = 'Defect ID already exists.';
    } else {
        $query = "
             INSERT INTO t_defect_record_f (
                defect_id, line_no, category, date_detected, issue_no_tag, repairing_date, car_maker, product_name, 
                lot_no, serial_no, discovery_process, discovery_id_num, discovery_person, occurrence_process_dr, 
                occurrence_shift, occurrence_id_num, occurrence_person, outflow_process, outflow_shift, 
                outflow_id_num, outflow_person, defect_category_dr, dc_foreign_mat_details, dc_foreign_mat_category,
                sequence_num, assy_board_no, defect_cause, 
                defect_detail_content, defect_treatment_content, harness_status, dis_assembled_by, good_measurement, 
                ng_measurement, wire_type, wire_size, connector_cavity, qc_status, record_type, pending_status, pending_status_2, harness_repair, 
                record_added_defect_datetime
            ) VALUES (
                :defect_id, :line_no, :category, :date_detected, :issue_no_tag, :repairing_date, 
                :car_maker, :product_name, :lot_no, :serial_no, :discovery_process, :discovery_id_num, 
                :discovery_person, :occurrence_process_dr, :occurrence_shift, :occurrence_id_num, 
                :occurrence_person, :outflow_process, :outflow_shift, :outflow_id_num, :outflow_person, 
                :defect_category_dr, :dc_foreign_mat_details, :dc_foreign_mat_category,
                :sequence_num, :assy_board_no, :defect_cause, :defect_detail_content, 
                :defect_treatment_content, :harness_status, :dis_assembled_by, :good_measurement, :ng_measurement, 
                :wire_type, :wire_size, :connector_cavity, :qc_status, :record_type, :pending_status, :pending_status_2, :harness_repair, 
                GETDATE()
            )
        ";
        $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));

        $stmt->bindParam(':defect_id', $defect_id_qa, PDO::PARAM_STR);
        $stmt->bindParam(':line_no', $padded_line_no_qa, PDO::PARAM_STR);
        $stmt->bindParam(':category', $line_category_qa, PDO::PARAM_STR);
        $stmt->bindParam(':date_detected', $date_detected_qa);
        $stmt->bindParam(':issue_no_tag', $issue_tag_qa, PDO::PARAM_INT);
        $stmt->bindParam(':repairing_date', $repairing_date_qa);
        $stmt->bindParam(':car_maker', $car_maker_qa, PDO::PARAM_STR);
        $stmt->bindParam(':product_name', $product_name_qa, PDO::PARAM_STR);
        $stmt->bindParam(':lot_no', $lot_no_qa, PDO::PARAM_STR);
        $stmt->bindParam(':serial_no', $serial_no_qa, PDO::PARAM_STR);
        $stmt->bindParam(':discovery_process', $discovery_process_qa, PDO::PARAM_STR);
        $stmt->bindParam(':discovery_id_num', $discovery_id_no_qa, PDO::PARAM_STR);
        $stmt->bindParam(':discovery_person', $discovery_person_qa, PDO::PARAM_STR);
        $stmt->bindParam(':occurrence_process_dr', $occurrence_process_dr_qa, PDO::PARAM_STR);
        $stmt->bindParam(':occurrence_shift', $occurrence_shift_qa, PDO::PARAM_STR);
        $stmt->bindParam(':occurrence_id_num', $occurrence_id_no_qa, PDO::PARAM_STR);
        $stmt->bindParam(':occurrence_person', $occurrence_person_qa, PDO::PARAM_STR);
        $stmt->bindParam(':outflow_process', $outflow_process_qa, PDO::PARAM_STR);
        $stmt->bindParam(':outflow_shift', $outflow_shift_qa, PDO::PARAM_STR);
        $stmt->bindParam(':outflow_id_num', $outflow_id_no_qa, PDO::PARAM_STR);
        $stmt->bindParam(':outflow_person', $outflow_person_qa, PDO::PARAM_STR);

        $stmt->bindParam(':defect_category_dr', $defect_category_dr_qa, PDO::PARAM_STR);
        $stmt->bindParam(':dc_foreign_mat_details', $defect_categ_foreign_mat, PDO::PARAM_STR);
        $stmt->bindParam(':dc_foreign_mat_category', $defect_categ_foreign_mat_2, PDO::PARAM_STR);
        
        $stmt->bindParam(':sequence_num', $sequence_no_qa, PDO::PARAM_STR);
        $stmt->bindParam(':assy_board_no', $assy_board_no_qa, PDO::PARAM_STR);
        $stmt->bindParam(':defect_cause', $defect_cause_qa, PDO::PARAM_STR);
        $stmt->bindParam(':defect_detail_content', $detail_content_defect_qa, PDO::PARAM_STR);
        $stmt->bindParam(':defect_treatment_content', $treatment_content_defect_qa, PDO::PARAM_STR);
        $stmt->bindParam(':harness_status', $harness_status_qa, PDO::PARAM_STR);
        $stmt->bindParam(':dis_assembled_by', $repair_person_qa, PDO::PARAM_STR);
        $stmt->bindParam(':good_measurement', $good_measurement_qa, PDO::PARAM_STR);
        $stmt->bindParam(':ng_measurement', $ng_measurement_qa, PDO::PARAM_STR);
        $stmt->bindParam(':wire_type', $wire_type_qa, PDO::PARAM_STR);
        $stmt->bindParam(':wire_size', $wire_size_qa, PDO::PARAM_STR);
        $stmt->bindParam(':connector_cavity', $connector_cavity_qa, PDO::PARAM_STR);
        $stmt->bindParam(':qc_status', $qc_status_qa, PDO::PARAM_STR);
        $stmt->bindParam(':record_type', $record_type_qa, PDO::PARAM_STR);
        $stmt->bindParam(':pending_status', $pending_status_qa, PDO::PARAM_STR);
        $stmt->bindParam(':pending_status_2', $pending_status_2, PDO::PARAM_STR);
        $stmt->bindParam(':harness_repair', $harness_repair_qa, PDO::PARAM_STR);

        if ($stmt->execute()) {
            $response_arr['message'] = 'success';
        } else {
            $response_arr['message'] = 'error';
        }
    }

    echo json_encode($response_arr, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
}

$conn = NULL;
?>