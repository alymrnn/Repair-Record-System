<?php
session_start();
include '../conn.php';
// include '../conn_emp_mgt.php';

$method = $_POST['method'];

if ($method == 'fetch_opt_search_new_record_type') {
    $query = "SELECT record_name FROM m_record_type ORDER BY record_name ASC";
    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo '<option value="" disabled selected>Select record type</option>';
        foreach ($stmt->fetchALL() as $row) {
            echo '<option>' . htmlspecialchars($row['record_name']) . '</option>';
        }
    } else {
        echo '<option value="">Select the record type</option>';
    }
}

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

function count_defect_qa_list($conn, $search_product_name_qa, $search_lot_no_qa, $search_serial_no_qa, $search_record_type_qa, $search_line_no_qa, $search_date_from_qa, $search_date_to_qa)
{
    $query = "SELECT COUNT(id) AS total FROM t_defect_record_f";
    $conditions = [];
    $params = [];

    $conditions[] = "(ng_status_new_record_qc = 'Added')";

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

     $results_per_page = 100;

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

     $results_per_page = 100;
    $number_of_result = intval(count_defect_qa_list($conn, $search_product_name_qa, $search_lot_no_qa, $search_serial_no_qa, $search_record_type_qa, $search_line_no_qa, $search_date_from_qa, $search_date_to_qa));

    $number_of_page = ceil($number_of_result / $results_per_page);

    echo $number_of_page;
}

if ($method == 'load_defect_table_new_record') {
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

     $results_per_page = 100;

    $page_first_result = ($current_page - 1) * $results_per_page;

    $c = $page_first_result;

    $query = "SELECT * FROM t_defect_record_f";
    $conditions = [];

    $conditions[] = "(ng_status_new_record_qc = 'Added')";

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

    $query .= " ORDER BY record_added_defect_datetime ASC";

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

$conn = NULL;
?>