<?php
session_start();
include '../conn.php';
// include '../conn_emp_mgt.php';

$method = $_POST['method'];

if ($method == 'fetch_opt_harness_status_pdv') {
    $query = "SELECT harness_status FROM m_harness_status ORDER BY harness_status ASC";
    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo '<option value="" disabled selected>Select harness status</option>';
        foreach ($stmt->fetchALL() as $row) {
            echo '<option>' . htmlspecialchars($row['harness_status']) . '</option>';
        }
    } else {
        echo '<option>Select harness status</option>';
    }
}

// if ($method == 'fetch_opt_line_no_pdv') {
//     $query = "SELECT line_no FROM m_line_no ORDER BY line_no ASC";
//     $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
//     $stmt->execute();
//     if ($stmt->rowCount() > 0) {
//         echo '<option value="" disabled selected>Select line no</option>';
//         foreach ($stmt->fetchALL() as $row) {
//             echo '<option>' . htmlspecialchars($row['line_no']) . '</option>';
//         }
//     } else {
//         echo '<option>Select line no</option>';
//     }
// }


function count_defect_pdv_ng_list($conn, $search_product_name_pdv, $search_lot_no_pdv, $search_serial_no_pdv, $search_line_no_pdv, $search_harness_status_pdv, $search_date_from_pdv, $search_date_to_pdv)
{
    $query = "SELECT COUNT(id) AS total FROM t_defect_record_f";
    $conditions = [];
    $params = [];

    $conditions[] = "(remarks_recrimp = 'NO GOOD' OR remarks_1_cc = 'NO GOOD' OR remarks_reassy = 'NO GOOD')";

    if (!empty($search_date_from_pdv) && !empty($search_date_to_pdv)) {
        $conditions[] = "CONVERT(date, repairing_date) BETWEEN ? AND ?";
        $params[] = $search_date_from_pdv;
        $params[] = $search_date_to_pdv;
    }

    if (!empty($search_line_no_pdv)) {
        $conditions[] = "line_no LIKE ?";
        $params[] = '%' . $search_line_no_pdv . '%';
    }

    if (!empty($search_harness_status_pdv)) {
        $conditions[] = "harness_status LIKE ?";
        $params[] = '%' . $search_harness_status_pdv . '%';
    }

    if (!empty($search_product_name_pdv) && $search_product_name_pdv !== '%') {
        $conditions[] = "product_name LIKE ?";
        $params[] = '%' . $search_product_name_pdv . '%';
    }

    if (!empty($search_serial_no_pdv) && $search_serial_no_pdv !== '%') {
        $conditions[] = "serial_no LIKE ?";
        $params[] = '%' . $search_serial_no_pdv . '%';
    }

    if (!empty($search_lot_no_pdv) && $search_lot_no_pdv !== '%') {
        $conditions[] = "lot_no LIKE ?";
        $params[] = '%' . $search_lot_no_pdv . '%';
    }

    if (!empty($conditions)) {
        $query .= " WHERE " . implode(" AND ", $conditions);
    }

    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute($params);

    $total = $stmt->fetchColumn();

    return $total;
}

if ($method == 'count_defect_pdv_ng_list') {
    $search_product_name_pdv = trim($_POST['search_product_name_pdv']);
    $search_serial_no_pdv = trim($_POST['search_serial_no_pdv']);
    $search_lot_no_pdv = trim($_POST['search_lot_no_pdv']);
    $search_line_no_pdv = trim($_POST['search_line_no_pdv']);
    $search_harness_status_pdv = trim($_POST['search_harness_status_pdv']);

    $search_date_from_pdv = trim($_POST['search_date_from_pdv']);
    if (!empty($search_date_from_pdv)) {
        $search_date_from_pdv = date_create($search_date_from_pdv);
        $search_date_from_pdv = date_format($search_date_from_pdv, "Y/m/d");
    }

    $search_date_to_pdv = trim($_POST['search_date_to_pdv']);
    if (!empty($search_date_to_pdv)) {
        $search_date_to_pdv = date_create($search_date_to_pdv);
        $search_date_to_pdv = date_format($search_date_to_pdv, "Y/m/d");
    }

    echo count_defect_pdv_ng_list($conn, $search_product_name_pdv, $search_lot_no_pdv, $search_serial_no_pdv, $search_line_no_pdv, $search_harness_status_pdv, $search_date_from_pdv, $search_date_to_pdv);
}

if ($method == 'defect_pdv_list_pagination') {
    $search_product_name_pdv = trim($_POST['search_product_name_pdv']);
    $search_serial_no_pdv = trim($_POST['search_serial_no_pdv']);
    $search_lot_no_pdv = trim($_POST['search_lot_no_pdv']);
    $search_line_no_pdv = trim($_POST['search_line_no_pdv']);
    $search_harness_status_pdv = trim($_POST['search_harness_status_pdv']);

    $search_date_from_pdv = trim($_POST['search_date_from_pdv']);
    if (!empty($search_date_from_pdv)) {
        $search_date_from_pdv = date_create($search_date_from_pdv);
        $search_date_from_pdv = date_format($search_date_from_pdv, "Y/m/d");
    }

    $search_date_to_pdv = trim($_POST['search_date_to_pdv']);
    if (!empty($search_date_to_pdv)) {
        $search_date_to_pdv = date_create($search_date_to_pdv);
        $search_date_to_pdv = date_format($search_date_to_pdv, "Y/m/d");
    }

     $results_per_page = 100;

    $number_of_result = intval(count_defect_pdv_ng_list($conn, $search_product_name_pdv, $search_lot_no_pdv, $search_serial_no_pdv, $search_line_no_pdv, $search_harness_status_pdv, $search_date_from_pdv, $search_date_to_pdv));

    $number_of_page = ceil($number_of_result / $results_per_page);

    for ($page = 1; $page <= $number_of_page; $page++) {
        echo '<option value="' . $page . '">' . $page . '</option>';
    }
}

if ($method == 'defect_pdv_list_last_page') {
    $search_product_name_pdv = trim($_POST['search_product_name_pdv']);
    $search_serial_no_pdv = trim($_POST['search_serial_no_pdv']);
    $search_lot_no_pdv = trim($_POST['search_lot_no_pdv']);
    $search_line_no_pdv = trim($_POST['search_line_no_pdv']);
    $search_harness_status_pdv = trim($_POST['search_harness_status_pdv']);

    $search_date_from_pdv = trim($_POST['search_date_from_pdv']);
    if (!empty($search_date_from_pdv)) {
        $search_date_from_pdv = date_create($search_date_from_pdv);
        $search_date_from_pdv = date_format($search_date_from_pdv, "Y/m/d");
    }

    $search_date_to_pdv = trim($_POST['search_date_to_pdv']);
    if (!empty($search_date_to_pdv)) {
        $search_date_to_pdv = date_create($search_date_to_pdv);
        $search_date_to_pdv = date_format($search_date_to_pdv, "Y/m/d");
    }

     $results_per_page = 100;
    $number_of_result = intval(count_defect_pdv_ng_list($conn, $search_product_name_pdv, $search_lot_no_pdv, $search_serial_no_pdv, $search_line_no_pdv, $search_harness_status_pdv, $search_date_from_pdv, $search_date_to_pdv));

    $number_of_page = ceil($number_of_result / $results_per_page);

    echo $number_of_page;
}

if ($method == 'load_defect_table_pdv_ng') {
    $search_product_name_pdv = trim($_POST['search_product_name_pdv']);
    $search_serial_no_pdv = trim($_POST['search_serial_no_pdv']);
    $search_lot_no_pdv = trim($_POST['search_lot_no_pdv']);
    $search_line_no_pdv = trim($_POST['search_line_no_pdv']);
    $search_harness_status_pdv = trim($_POST['search_harness_status_pdv']);

    $search_date_from_pdv = trim($_POST['search_date_from_pdv']);
    if (!empty($search_date_from_pdv)) {
        $search_date_from_pdv = date_create($search_date_from_pdv);
        $search_date_from_pdv = date_format($search_date_from_pdv, "Y/m/d");
    }

    $search_date_to_pdv = trim($_POST['search_date_to_pdv']);
    if (!empty($search_date_to_pdv)) {
        $search_date_to_pdv = date_create($search_date_to_pdv);
        $search_date_to_pdv = date_format($search_date_to_pdv, "Y/m/d");
    }

    $current_page = isset($_POST['current_page']) ? max(1, intval($_POST['current_page'])) : 1;
    $c = 0;

     $results_per_page = 100;

    $page_first_result = ($current_page - 1) * $results_per_page;

    $c = $page_first_result;

    $query = "SELECT * FROM t_defect_record_f";
    $conditions = [];

    $conditions[] = "(remarks_recrimp = 'NO GOOD' OR remarks_1_cc = 'NO GOOD' OR remarks_reassy = 'NO GOOD')";

    if (!empty($search_date_from_pdv) && !empty($search_date_to_pdv)) {
        $conditions[] = "date_detected BETWEEN :search_date_from_pdv AND :search_date_to_pdv";
    }

    if (!empty($search_line_no_pdv)) {
        $conditions[] = "line_no LIKE :search_line_no_pdv";
    }

    if (!empty($search_harness_status_pdv)) {
        $conditions[] = "harness_status LIKE :search_harness_status_pdv";
    }

    if (!empty($search_product_name_pdv)) {
        $conditions[] = "product_name LIKE :search_product_name_pdv";
    }

    if (!empty($search_lot_no_pdv)) {
        $conditions[] = "lot_no LIKE :search_lot_no_pdv";
    }

    if (!empty($search_serial_no_pdv)) {
        $conditions[] = "serial_no LIKE :search_serial_no_pdv";
    }

    if (!empty($conditions)) {
        $query .= " WHERE " . implode(" AND ", $conditions);
    }

    $query .= " ORDER BY record_added_defect_datetime ASC";

    $query .= " OFFSET :page_first_result ROWS FETCH NEXT :results_per_page ROWS ONLY";

    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));

    if (!empty($search_date_from_pdv) && !empty($search_date_to_pdv)) {
        $stmt->bindValue(':search_date_from_pdv', $search_date_from_pdv, PDO::PARAM_STR);
        $stmt->bindValue(':search_date_to_pdv', $search_date_to_pdv, PDO::PARAM_STR);
    }
    if (!empty($search_line_no_pdv)) {
        $stmt->bindValue(':search_line_no_pdv', $search_line_no_pdv . '%', PDO::PARAM_STR);
    }
    if (!empty($search_harness_status_pdv)) {
        $stmt->bindValue(':search_harness_status_pdv', $search_harness_status_pdv . '%', PDO::PARAM_STR);
    }
    if (!empty($search_product_name_pdv)) {
        $stmt->bindValue(':search_product_name_pdv', $search_product_name_pdv . '%', PDO::PARAM_STR);
    }
    if (!empty($search_lot_no_pdv)) {
        $stmt->bindValue(':search_lot_no_pdv', $search_lot_no_pdv . '%', PDO::PARAM_STR);
    }
    if (!empty($search_serial_no_pdv)) {
        $stmt->bindValue(':search_serial_no_pdv', $search_serial_no_pdv . '%', PDO::PARAM_STR);
    }
    $stmt->bindValue(':page_first_result', $page_first_result, PDO::PARAM_INT);
    $stmt->bindValue(':results_per_page', $results_per_page, PDO::PARAM_INT);

    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
            $c++;

            $harness_repair = $row['harness_repair'];
            $highlight_class = ($harness_repair == 'Verified') ? 'highlight-red' : '';
            $onclick_event = ($harness_repair == 'Verified') ? '' : 'onclick="get_update_defect_pdv(\'' . implode('~!~', [
                $row['id'],
                $row['car_maker'],
                $row['line_no'],
                $row['category'],
                $row['date_detected'],
                $row['issue_no_tag'],
                $row['repairing_date'],
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
                $row['dis_assembled_by'],
                $row['defect_detail_content'],
                $row['defect_treatment_content'],
                $row['harness_status'],
                $row['pdv_remarks'],
                $row['pdv_id_num'],
                $row['pdv_person'],
                $row['defect_id']
            ]) . '\')"';

            // Generate the row
            echo '<tr style="cursor:pointer; text-align:center;" class="modal-trigger ' . $highlight_class . '" ' . $onclick_event . '>';
            echo '<td style="text-align:center;">' . $c . '</td>';
            echo '<td style="text-align:center;">' . $row['line_no'] . '</td>';
            echo '<td style="text-align:center;">' . $row['category'] . '</td>';
            echo '<td style="text-align:center;">' . $row['date_detected'] . '</td>';
            echo '<td style="text-align:center;">' . $row['issue_no_tag'] . '</td>';
            echo '<td style="text-align:center;">' . $row['repairing_date'] . '</td>';
            echo '<td style="text-align:center;">' . $row['car_maker'] . '</td>';
            echo '<td style="text-align:center;">' . $row['car_model'] . '</td>';
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
            echo '<td style="text-align:left;">' . $row['good_measurement'] . '</td>';
            echo '<td style="text-align:left;">' . $row['ng_measurement'] . '</td>';
            echo '<td style="text-align:left;">' . $row['wire_type'] . '</td>';
            echo '<td style="text-align:left;">' . $row['wire_size'] . '</td>';
            echo '<td style="text-align:left;">' . $row['connector_cavity'] . '</td>';
            echo '<td style="text-align:left;">' . $row['defect_detail_content'] . '</td>';
            echo '<td style="text-align:left;">' . $row['defect_treatment_content'] . '</td>';
            echo '<td style="text-align:center;">' . $row['dis_assembled_by'] . '</td>';
            echo '<td style="text-align:left;">' . $row['harness_status'] . '</td>';
            echo '<td style="text-align:center;">' . $row['remarks_recrimp'] . '</td>';
            echo '<td style="text-align:center;">' . $row['remarks_by_id_num'] . '</td>';
            echo '<td style="text-align:center;">' . $row['remarks_by_person'] . '</td>';
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
        echo '<td colspan="12" style="text-align:center; color:red;">No Record Found</td>';
        echo '</tr>';
    }
}




