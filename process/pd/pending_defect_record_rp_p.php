<?php
session_start();
include '../conn.php';
// include '../conn_emp_mgt.php';

$method = $_POST['method'];

if ($method == 'fetch_opt_record_type_pd') {
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

if ($method == 'fetch_opt_repair_person_pd') {
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

if ($method == 'fetch_opt_harness_status_pd') {
    $query = "SELECT harness_status FROM m_harness_status ORDER BY harness_status ASC";
    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo '<option value="" disabled selected>Select the harness status</option>';
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<option value="' . htmlspecialchars($row['harness_status']) . '">' . htmlspecialchars($row['harness_status']) . '</option>';
        }
    } else {
        echo '<option>Select the harness status</option>';
    }
}

if ($method == 'fetch_opt_defect_category_pd') {
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

if ($method == 'fetch_opt_occurrence_process_pd') {
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

if ($method == 'fetch_opt_portion_treatment_pd') {
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

if ($method == 'update_badge_count') {
    $query = "SELECT COUNT(id) AS total FROM t_defect_record_f WHERE pending_status = 'Pending' OR pending_status = ''";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $count = $stmt->fetchColumn();

    echo json_encode(['count' => $count]);
}

function count_pending_defect_table_data($conn, $date_from, $date_to, $line_no_rp, $record_type, $product_name, $serial_no, $lot_no)
{
    $query = "SELECT COUNT(id) AS total FROM t_defect_record_f";
    $conditions = [];
    $params = [];

    $conditions[] = "(pending_status = 'Pending' OR ng_status_new_record = 'Pending')";

    if (!empty($date_from) && !empty($date_to)) {
        $conditions[] = "date_detected BETWEEN ? AND ?";
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

    if (!empty($conditions)) {
        $query .= " WHERE " . implode(" AND ", $conditions);
    }

    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute($params);

    $total = $stmt->fetchColumn();

    return $total;
}

function count_pending_mancost_table_data($search_arr, $conn)
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

if ($method == 'load_defect_pending_table_data_last_page') {
    $product_name = trim($_POST['product_name']);
    $lot_no = trim($_POST['lot_no']);
    $serial_no = trim($_POST['serial_no']);
    $record_type = trim($_POST['record_type']);
    $line_no_rp = trim($_POST['line_no_rp']);

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

    $number_of_result = intval(count_pending_defect_table_data($conn, $date_from, $date_to, $line_no_rp, $record_type, $product_name, $serial_no, $lot_no));

    $number_of_page = ceil($number_of_result / $results_per_page);

    echo ($number_of_page);
    exit;
}

if ($method == 'count_pending_defect_table_data') {
    $product_name = trim($_POST['product_name']);
    $lot_no = trim($_POST['lot_no']);
    $serial_no = trim($_POST['serial_no']);
    $record_type = trim($_POST['record_type']);
    $line_no_rp = trim($_POST['line_no_rp']);

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

    echo count_pending_defect_table_data($conn, $date_from, $date_to, $line_no_rp, $record_type, $product_name, $serial_no, $lot_no);
    exit;
}

if ($method == 'load_defect_table_data') {
    $current_page = intval($_POST['current_page']);

    $product_name = trim($_POST['product_name']);
    $lot_no = trim($_POST['lot_no']);
    $serial_no = trim($_POST['serial_no']);
    $record_type = trim($_POST['record_type']);
    $line_no_rp = trim($_POST['line_no_rp']);

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

    $conditions[] = "(pending_status = 'Pending' or ng_status_new_record = 'Pending')";

    if (!empty($date_from) && !empty($date_to)) {
        $conditions[] = "date_detected BETWEEN :date_from AND :date_to";
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

    if (!empty($conditions)) {
        $query .= " WHERE " . implode(" AND ", $conditions);
    }

    $query .= " ORDER BY date_detected DESC";

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
    $stmt->bindValue(':page_first_result', $page_first_result, PDO::PARAM_INT);
    $stmt->bindValue(':results_per_page', $results_per_page, PDO::PARAM_INT);

    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
            $c++;
            echo '<tr style="cursor:pointer; text-align:center;" class="modal-trigger" onclick="load_mancost_table(&quot;' . $row['id'] . '~!~' . $row['defect_id'] . '&quot;)">';
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
            echo '<td style="text-align:left;">' . $row['harness_status'] . '</td>';
            echo '<td style="text-align:center;">' . $row['dis_assembled_by'] . '</td>';
            echo '</tr>';
        }
    } else {
        echo '<tr>';
        echo '<td colspan="12" style="text-align:center; color:red;">No Pending Record</td>';
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

    $number_of_result = intval(count_pending_mancost_table_data($search_arr, $conn));

    $number_of_page = ceil($number_of_result / $results_per_page);

    echo $number_of_page;
    exit;
}

if ($method == 'count_pending_mancost_table_data') {
    $defect_id = $_POST['defect_id'];

    $search_arr = array(
        "defect_id" => $defect_id
    );

    echo count_pending_mancost_table_data($search_arr, $conn);
    exit;
}

if ($method == 'load_mancost_table_data') {
    $defect_id = $_POST['defect_id'];
    $current_page = intval($_POST['current_page']);

    $results_per_page = 50;
    $page_first_result = ($current_page - 1) * $results_per_page;

    function escapeJs($string)
    {
        return htmlspecialchars(addslashes($string), ENT_QUOTES, 'UTF-8');
    }

    $query = "
        SELECT 
            m.id, d.defect_id, 
            d.car_maker, d.line_no, d.category, d.date_detected, d.issue_no_tag,
            d.product_name, d.lot_no, d.serial_no, d.discovery_process, d.discovery_id_num,
            d.discovery_person, d.occurrence_process_dr, d.occurrence_shift, d.occurrence_id_num, d.occurrence_person,
            d.outflow_process, d.outflow_shift, d.outflow_id_num, d.outflow_person, d.defect_category_dr,
            d.sequence_num, d.assy_board_no, d.defect_cause, d.good_measurement, d.ng_measurement,
            d.wire_type, d.wire_size, d.connector_cavity,
            d.defect_detail_content, d.defect_treatment_content, d.harness_status, d.dis_assembled_by,
            d.dc_foreign_mat_details, d.dc_foreign_mat_category,
            d.repairing_date, 
            m.repair_start, m.repair_end, m.time_consumed, m.defect_category_mc, m.defect_category_mc_others, 
            m.occurrence_process_mc, m.occurrence_process_mc_others, m.parts_removed,
            m.quantity, m.unit_cost, m.material_cost, 
            m.manhour_cost, m.repaired_portion_treatment, m.repaired_portion_treatment_others
        FROM 
            t_defect_record_f AS d 
        LEFT JOIN 
            t_mancost_monitoring_f AS m 
        ON 
            d.defect_id = m.defect_id 
        WHERE 
            d.defect_id = ?
        ORDER BY 
            d.date_detected DESC
        OFFSET ? ROWS FETCH NEXT ? ROWS ONLY
    ";

    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));

    $stmt->bindParam(1, $defect_id, PDO::PARAM_STR);
    $stmt->bindParam(2, $page_first_result, PDO::PARAM_INT);
    $stmt->bindParam(3, $results_per_page, PDO::PARAM_INT);

    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $c = $page_first_result;

        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
            $c++;

            echo '<tr style="cursor:pointer; text-align:center;" class="modal-trigger" onclick="get_update_defect_inspector(\'' .
                escapeJs($row['id']) . '~!~' .
                escapeJs($row['car_maker']) . '~!~' .
                escapeJs($row['line_no']) . '~!~' .
                escapeJs($row['category']) . '~!~' .
                escapeJs($row['date_detected']) . '~!~' .
                escapeJs($row['issue_no_tag']) . '~!~' .
                escapeJs($row['product_name']) . '~!~' .
                escapeJs($row['lot_no']) . '~!~' .
                escapeJs($row['serial_no']) . '~!~' .
                escapeJs($row['discovery_process']) . '~!~' .
                escapeJs($row['discovery_id_num']) . '~!~' .
                escapeJs($row['discovery_person']) . '~!~' .
                escapeJs($row['occurrence_process_dr']) . '~!~' .
                escapeJs($row['occurrence_shift']) . '~!~' .
                escapeJs($row['occurrence_id_num']) . '~!~' .
                escapeJs($row['occurrence_person']) . '~!~' .
                escapeJs($row['outflow_process']) . '~!~' .
                escapeJs($row['outflow_shift']) . '~!~' .
                escapeJs($row['outflow_id_num']) . '~!~' .
                escapeJs($row['outflow_person']) . '~!~' .
                escapeJs($row['defect_category_dr']) . '~!~' .
                escapeJs($row['sequence_num']) . '~!~' .
                escapeJs($row['assy_board_no']) . '~!~' .
                escapeJs($row['defect_cause']) . '~!~' .
                escapeJs($row['good_measurement']) . '~!~' .
                escapeJs($row['ng_measurement']) . '~!~' .
                escapeJs($row['wire_type']) . '~!~' .
                escapeJs($row['wire_size']) . '~!~' .
                escapeJs($row['connector_cavity']) . '~!~' .
                escapeJs($row['dis_assembled_by']) . '~!~' .
                escapeJs($row['dc_foreign_mat_details']) . '~!~' .
                escapeJs($row['dc_foreign_mat_category']) . '~!~' .
                escapeJs(str_replace(array("\r", "\n"), ' ', $row['defect_detail_content'])) . '~!~' .
                escapeJs(str_replace(array("\r", "\n"), ' ', $row['defect_treatment_content'])) . '~!~' .
                escapeJs($row['harness_status']) . '~!~' .
                escapeJs($row['repairing_date']) . '~!~' .
                escapeJs($row['repair_start']) . '~!~' .
                escapeJs($row['repair_end']) . '~!~' .
                escapeJs($row['time_consumed']) . '~!~' .
                escapeJs($row['defect_category_mc']) . '~!~' .
                escapeJs($row['defect_category_mc_others']) . '~!~' .
                escapeJs($row['occurrence_process_mc']) . '~!~' .
                escapeJs($row['occurrence_process_mc_others']) . '~!~' .
                escapeJs($row['parts_removed']) . '~!~' .
                escapeJs($row['quantity']) . '~!~' .
                escapeJs($row['unit_cost']) . '~!~' .
                escapeJs($row['material_cost']) . '~!~' .
                escapeJs($row['manhour_cost']) . '~!~' .
                escapeJs($row['repaired_portion_treatment']) . '~!~' .
                escapeJs($row['repaired_portion_treatment_others']) . '~!~' .
                escapeJs($row['defect_id']) . '\')">';

            echo '<td style="text-align:center;">' . $c . '</td>';
            echo '<td style="text-align:center;">' . escapeJs($row['line_no']) . '</td>';
            echo '<td style="text-align:center;">' . escapeJs($row['car_maker']) . '</td>';
            echo '<td style="text-align:center;">' . escapeJs($row['category']) . '</td>';
            echo '<td style="text-align:center;">' . escapeJs($row['repair_start']) . '</td>';
            echo '<td style="text-align:center;">' . escapeJs($row['repair_end']) . '</td>';
            echo '<td style="text-align:center;">' . escapeJs($row['time_consumed']) . '</td>';
            echo '<td style="text-align:center;">' . escapeJs($row['defect_category_mc']) . '</td>';
            echo '<td style="text-align:center;">' . escapeJs($row['defect_category_mc_others']) . '</td>';
            echo '<td style="text-align:center;">' . escapeJs($row['occurrence_process_mc']) . '</td>';
            echo '<td style="text-align:center;">' . escapeJs($row['occurrence_process_mc_others']) . '</td>';
            echo '<td style="text-align:center;">' . escapeJs($row['parts_removed']) . '</td>';
            echo '<td style="text-align:center;">' . escapeJs($row['quantity']) . '</td>';
            echo '<td style="text-align:center;">' . escapeJs($row['unit_cost']) . '</td>';
            echo '<td style="text-align:center;">' . escapeJs($row['material_cost']) . '</td>';
            echo '<td style="text-align:center;">' . escapeJs($row['manhour_cost']) . '</td>';
            echo '<td style="text-align:center;">' . escapeJs($row['repaired_portion_treatment']) . '</td>';
            echo '<td style="text-align:center;">' . escapeJs($row['repaired_portion_treatment_others']) . '</td>';
            echo '</tr>';
        }
    } else {
        echo '<tr>';
        echo '<td colspan="15" style="text-align:center; color:red;">No Record Found</td>';
        echo '</tr>';
    }
    exit;
}

if ($method == 'autocomplete_parts') {
    $inputText = $_POST['input_text'];

    $query = "SELECT DISTINCT TOP 10 parts_name FROM m_pricelist WHERE parts_name LIKE :input_text";

    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->bindValue(':input_text', '%' . $inputText . '%');
    $stmt->execute();

    $partNames = $stmt->fetchAll(PDO::FETCH_COLUMN);

    echo json_encode(['part_names' => $partNames]);
    exit;
} else if ($method == 'fetch_unit_price') {
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

if ($method == 'load_added_mancost') {
    // $defect_id = $_POST['defect_id'];

    $c = 0;

    $query = "SELECT * FROM t_mancost_monitoring_f WHERE status = 'Added' AND record_added_by = '" . $_SESSION['full_name'] . "'";

    // $query = "SELECT m.id, d.defect_id, 
    //             m.repair_start, m.repair_end, m.time_consumed, m.defect_category_mc, 
    //             m.occurrence_process_mc, m.parts_removed,
    //             m.quantity, m.unit_cost, m.material_cost, 
    //             m.manhour_cost, m.repaired_portion_treatment
    //         FROM t_defect_record_f AS d 
    //         LEFT JOIN t_mancost_monitoring_f AS m 
    //         ON d.defect_id = m.defect_id 
    //         WHERE d.defect_id = '$defect_id' 
    //         AND m.status = 'Added' 
    //         AND m.record_added_by = '" . $_SESSION['full_name'] . "'";


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
            echo '<td style="text-align:center;">' . $row['defect_category_mc_others'] . '</td>';
            echo '<td style="text-align:center;">' . $row['occurrence_process_mc'] . '</td>';
            echo '<td style="text-align:center;">' . $row['occurrence_process_mc_others'] . '</td>';
            echo '<td style="text-align:center;">' . $row['parts_removed'] . '</td>';
            echo '<td style="text-align:center;">' . $row['quantity'] . '</td>';
            echo '<td style="text-align:center;">' . $row['unit_cost'] . '</td>';
            echo '<td style="text-align:center;">' . $row['material_cost'] . '</td>';
            echo '<td style="text-align:center;">' . $row['manhour_cost'] . '</td>';
            echo '<td style="text-align:center;">' . $row['repaired_portion_treatment'] . '</td>';
            echo '<td style="text-align:center;">' . $row['repaired_portion_treatment_others'] . '</td>';
            echo '</tr>';
        }
    } else {
        echo '<tr>';
        echo '<td colspan="10" style="text-align:center; color:red;">No Added Record</td>';
        echo '</tr>';
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
        $defect_category_mc_others = trim($record['defect_category_mc_others']);
        $occurrence_process_mc_others = trim($record['occurrence_process_mc_others']);
        $portion_treatment_others = trim($record['portion_treatment_others']);

        $defect_id = $record['defect_id'];

        $query = "INSERT INTO t_mancost_monitoring_f (defect_id,repair_start,repair_end,time_consumed,defect_category_mc,defect_category_mc_others,occurrence_process_mc,occurrence_process_mc_others,parts_removed,quantity,unit_cost,material_cost,manhour_cost,repaired_portion_treatment,repaired_portion_treatment_others,status,record_added_by) VALUES ('$defect_id','$repair_start_mc','$repair_end_mc','$time_consumed_mc','$defect_category_mc','$defect_category_mc_others','$occurrence_process_mc','$occurrence_process_mc_others','$parts_removed_mc','$quantity_mc','$unit_cost_mc','$material_cost_mc','$manhour_cost_mc','$portion_treatment','$portion_treatment_others','$status','$record_added_by')";

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

if ($method == 'add_defect_mancost_record_insp') {
    $line_no = $_POST['line_no'];
    $issue_no_tag = $_POST['issue_tag'];
    $serial_no = $_POST['serial_no'];
    $repairing_date = $_POST['repairing_date'];
    $good_measurement = $_POST['good_measurement'];
    $ng_measurement = $_POST['ng_measurement'];
    $wire_type = $_POST['wire_type'];
    $wire_size = $_POST['wire_size'];
    $connector_cavity = $_POST['connector_cavity'];
    $detail_content_defect = $_POST['detail_content_defect'];
    $treatment_content_defect = $_POST['treatment_content_defect'];
    $harness_status = $_POST['harness_status'];
    $repair_person = $_POST['repair_person'];

    $inspector_defect_id = $_POST['inspector_defect_id'];

    $status = 'Saved';
    $record_added_by = $_SESSION['full_name'];
    $qc_status = 'Saved';

    $pending_status = 'Updated';
    $ng_status_new_record = 'Updated';

    try {
        // Begin transaction
        $conn->beginTransaction();

        // Update t_defect_record_f
        $query = "
            UPDATE t_defect_record_f
            SET line_no = :line_no,
                issue_no_tag = :issue_no_tag,
                serial_no = :serial_no,
                repairing_date = :repairing_date,
                good_measurement = :good_measurement,
                ng_measurement = :ng_measurement,
                wire_type = :wire_type,
                wire_size = :wire_size,
                connector_cavity = :connector_cavity,
                defect_detail_content = :defect_detail_content,
                defect_treatment_content = :defect_treatment_content,
                harness_status = :harness_status,
                dis_assembled_by = :dis_assembled_by,
                qc_status = :qc_status,
                pending_status = :pending_status,
                ng_status_new_record = :ng_status_new_record
            WHERE defect_id = :defect_id
        ";

        $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
        $stmt->bindParam(':line_no', $line_no);
        $stmt->bindParam(':issue_no_tag', $issue_no_tag);
        $stmt->bindParam(':serial_no', $serial_no);
        $stmt->bindParam(':repairing_date', $repairing_date);
        $stmt->bindParam(':good_measurement', $good_measurement);
        $stmt->bindParam(':ng_measurement', $ng_measurement);
        $stmt->bindParam(':wire_type', $wire_type);
        $stmt->bindParam(':wire_size', $wire_size);
        $stmt->bindParam(':connector_cavity', $connector_cavity);
        $stmt->bindParam(':defect_detail_content', $detail_content_defect);
        $stmt->bindParam(':defect_treatment_content', $treatment_content_defect);
        $stmt->bindParam(':harness_status', $harness_status);
        $stmt->bindParam(':dis_assembled_by', $repair_person);
        $stmt->bindParam(':qc_status', $qc_status);
        $stmt->bindParam(':pending_status', $pending_status);
        $stmt->bindParam(':ng_status_new_record', $ng_status_new_record);
        $stmt->bindParam(':defect_id', $inspector_defect_id);
        $stmt->execute();

        $check1 = "
            UPDATE t_mancost_monitoring_f 
            SET status = :status 
            WHERE defect_id = :defect_id AND record_added_by = :record_added_by
        ";
        $stmt1 = $conn->prepare($check1, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
        $stmt1->bindParam(':status', $status);
        $stmt1->bindParam(':defect_id', $inspector_defect_id);
        $stmt1->bindParam(':record_added_by', $record_added_by);
        $stmt1->execute();

        // if ($stmt1->rowCount() > 0) {
        //     // Update was successful
        // } else {
        //     // Insert into t_mancost_monitoring_f
        //     $query1 = "
        //         INSERT INTO t_mancost_monitoring_f (
        //             defect_id, status, record_added_by
        //         ) VALUES (
        //             :defect_id, :status, :record_added_by
        //         )
        //     ";

        //     $stmt1 = $conn->prepare($query1, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
        //     $stmt1->bindParam(':status', $status);
        //     $stmt1->bindParam(':record_added_by', $record_added_by);

        //     if (!$stmt1->execute()) {
        //         $message = 'error';
        //         $error = 1;
        //     }
        // }


        // Commit the transaction
        $conn->commit();

        echo "success";
    } catch (PDOException $e) {
        // Rollback the transaction on error
        $conn->rollback();
        echo "Error updating t_defect_record_f: " . $e->getMessage();
    } catch (Exception $ex) {
        // Handle other exceptions
        $conn->rollback();
        echo "Error: " . $ex->getMessage();
    }
}



// if ($method == 'add_defect_mancost_insp') {
//     // Fetch common data
//     $line_no = $_POST['line_no'];
//     $issue_no_tag = $_POST['issue_tag'];
//     $repairing_date = $_POST['repairing_date'];
//     $good_measurement = $_POST['good_measurement'];
//     $ng_measurement = $_POST['ng_measurement'];
//     $wire_type = $_POST['wire_type'];
//     $wire_size = $_POST['wire_size'];
//     $connector_cavity = $_POST['connector_cavity'];
//     $detail_content_defect = $_POST['detail_content_defect'];
//     $treatment_content_defect = $_POST['treatment_content_defect'];
//     $harness_status = $_POST['harness_status'];
//     $inspector_defect_id = $_POST['inspector_defect_id'];

//     // Check if there are multiple mancost entries
//     if (isset($_POST['mancost']) && is_array($_POST['mancost'])) {
//         $mancost_entries = $_POST['mancost'];

//         try {
//             // Begin transaction
//             $conn->beginTransaction();

//             // Update t_defect_record_f (assuming it's common for all mancost entries)
//             $query1 = "
//                 UPDATE t_defect_record_f
//                 SET line_no = :line_no,
//                     issue_no_tag = :issue_no_tag,
//                     repairing_date = :repairing_date,
//                     good_measurement = :good_measurement,
//                     ng_measurement = :ng_measurement,
//                     wire_type = :wire_type,
//                     wire_size = :wire_size,
//                     connector_cavity = :connector_cavity,
//                     defect_detail_content = :defect_detail_content,
//                     defect_treatment_content = :defect_treatment_content,
//                     harness_status = :harness_status
//                 WHERE defect_id = :defect_id
//             ";

//             $stmt1 = $conn->prepare($query1, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
//             $stmt1->bindParam(':line_no', $line_no);
//             $stmt1->bindParam(':issue_no_tag', $issue_no_tag);
//             $stmt1->bindParam(':repairing_date', $repairing_date);
//             $stmt1->bindParam(':good_measurement', $good_measurement);
//             $stmt1->bindParam(':ng_measurement', $ng_measurement);
//             $stmt1->bindParam(':wire_type', $wire_type);
//             $stmt1->bindParam(':wire_size', $wire_size);
//             $stmt1->bindParam(':connector_cavity', $connector_cavity);
//             $stmt1->bindParam(':defect_detail_content', $detail_content_defect);
//             $stmt1->bindParam(':defect_treatment_content', $treatment_content_defect);
//             $stmt1->bindParam(':harness_status', $harness_status);
//             $stmt1->bindParam(':defect_id', $inspector_defect_id);
//             $stmt1->execute();

//             // Insert into t_mancost_monitoring_f for each mancost entry
//             // $query2 = "
//             //     INSERT INTO t_mancost_monitoring_f 
//             //     (repair_start, repair_end, time_consumed, defect_category_mc, occurrence_process_mc,
//             //     parts_removed, quantity, unit_cost, material_cost, manhour_cost, repaired_portion_treatment, defect_id) 
//             //     VALUES 
//             //     (:repair_start, :repair_end, :time_consumed, :defect_category_mc, :occurrence_process_mc,
//             //     :parts_removed, :quantity, :unit_cost, :material_cost, :manhour_cost, :repaired_portion_treatment, :defect_id)
//             // ";

//             // $stmt2 = $conn->prepare($query2);

//             // foreach ($mancost_entries as $mancost) {
//             //     $repair_start = $mancost['repair_start'];
//             //     $repair_end = $mancost['repair_end'];
//             //     $time_consumed = $mancost['time_consumed'];
//             //     $defect_category_mc = $mancost['defect_category_mc'];
//             //     $occurrence_process_mc = $mancost['occurrence_process_mc'];
//             //     $parts_removed = $mancost['parts_removed'];
//             //     $quantity = $mancost['quantity'];
//             //     $unit_cost = $mancost['unit_cost'];
//             //     $material_cost = $mancost['material_cost'];
//             //     $manhour_cost = $mancost['manhour_cost'];
//             //     $repaired_portion_treatment = $mancost['repaired_portion_treatment'];

//             //     // Bind parameters and execute the statement
//             //     $stmt2->bindParam(':repair_start', $repair_start);
//             //     $stmt2->bindParam(':repair_end', $repair_end);
//             //     $stmt2->bindParam(':time_consumed', $time_consumed);
//             //     $stmt2->bindParam(':defect_category_mc', $defect_category_mc);
//             //     $stmt2->bindParam(':occurrence_process_mc', $occurrence_process_mc);
//             //     $stmt2->bindParam(':parts_removed', $parts_removed);
//             //     $stmt2->bindParam(':quantity', $quantity);
//             //     $stmt2->bindParam(':unit_cost', $unit_cost);
//             //     $stmt2->bindParam(':material_cost', $material_cost);
//             //     $stmt2->bindParam(':manhour_cost', $manhour_cost);
//             //     $stmt2->bindParam(':repaired_portion_treatment', $repaired_portion_treatment);
//             //     $stmt2->bindParam(':defect_id', $defect_id);

//             //     $stmt2->execute();
//             // }

//             // Commit the transaction
//             $conn->commit();

//             echo "success";
//         } catch (PDOException $e) {
//             // Rollback the transaction on error
//             $conn->rollback();
//             echo "Error: " . $e->getMessage();
//         }
//     }
// }





// if ($method == 'load_added_mancost') {
//     $defect_id = $_POST['defect_id'];
//     $c = 0;

//     $query = "SELECT m.id, d.defect_id, 
//                     m.repair_start, m.repair_end, m.time_consumed, m.defect_category_mc, 
//                     m.occurrence_process_mc, m.parts_removed,
//                     m.quantity, m.unit_cost, m.material_cost, 
//                     m.manhour_cost, m.repaired_portion_treatment
//                 FROM t_defect_record_f AS d 
//                 LEFT JOIN t_mancost_monitoring_f AS m 
//                 ON d.defect_id = m.defect_id 
//                 WHERE d.defect_id = :defect_id 
//                 AND m.status = 'Added' 
//                 AND m.record_added_by = :full_name";

//     $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
//     $stmt->bindParam(':full_name', $_SESSION['full_name'], PDO::PARAM_STR);
//     $stmt->bindParam(':defect_id', $defect_id, PDO::PARAM_STR);
//     $stmt->execute();

//     if ($stmt->rowCount() > 0) {
//           foreach ($stmt->fetchAll() as $row) {
//             $c++;
//             echo '<tr>';
//             echo '<td>' . $c . '</td>';
//             echo '<td style="text-align:center;">' . htmlspecialchars($row['repair_start']) . '</td>';
//             echo '<td style="text-align:center;">' . htmlspecialchars($row['repair_end']) . '</td>';
//             echo '<td style="text-align:center;">' . htmlspecialchars($row['time_consumed']) . '</td>';
//             echo '<td style="text-align:center;">' . htmlspecialchars($row['defect_category_mc']) . '</td>';
//             echo '<td style="text-align:center;">' . htmlspecialchars($row['occurrence_process_mc']) . '</td>';
//             echo '<td style="text-align:center;">' . htmlspecialchars($row['parts_removed']) . '</td>';
//             echo '<td style="text-align:center;">' . htmlspecialchars($row['quantity']) . '</td>';
//             echo '<td style="text-align:center;">' . htmlspecialchars($row['unit_cost']) . '</td>';
//             echo '<td style="text-align:center;">' . htmlspecialchars($row['material_cost']) . '</td>';
//             echo '<td style="text-align:center;">' . htmlspecialchars($row['manhour_cost']) . '</td>';
//             echo '<td style="text-align:center;">' . htmlspecialchars($row['repaired_portion_treatment']) . '</td>';
//             echo '<td><button type="button" class="btn btn-block btn-outline-danger btn-xs" onclick="delete_added_btn(event)" data-id="' . $row["id"] . '">Remove</button></td>';
//             echo '</tr>';
//         }
//     } else {
//         echo '<tr>';
//         echo '<td colspan="8" style="text-align:center; color:red;">No Added Records Found</td>';
//         echo '</tr>';
//     }
// }

// if ($method == 'add_multiple_mancost') {
//     $records = $_POST['records'];
//     $status = 'Added';
//     $record_added_by = $_SESSION['full_name'];
//     $error = 0;
//     $message = "";

//     foreach ($records['mancost_records'] as $record) {
//         $repair_start_mc = trim($record['repair_start_mc']);
//         $repair_end_mc = trim($record['repair_end_mc']);
//         $time_consumed_mc = trim($record['time_consumed_mc']);
//         $defect_category_mc = trim($record['defect_category_mc']);
//         $occurrence_process_mc = trim($record['occurrence_process_mc']);
//         $parts_removed_mc = trim($record['parts_removed_mc']);
//         $quantity_mc = trim($record['quantity_mc']);
//         $unit_cost_mc = trim($record['unit_cost_mc']);
//         $material_cost_mc = trim($record['material_cost_mc']);
//         $manhour_cost_mc = trim($record['manhour_cost_mc']);
//         $portion_treatment = trim($record['portion_treatment']);
//         $defect_id = $record['defect_id'];

//         $query = "INSERT INTO t_mancost_monitoring_f (defect_id, repair_start, repair_end, time_consumed, defect_category_mc, occurrence_process_mc, parts_removed, quantity, unit_cost, material_cost, manhour_cost, repaired_portion_treatment, status, record_added_by) 
//                   VALUES ('$defect_id', '$repair_start_mc', '$repair_end_mc', '$time_consumed_mc', '$defect_category_mc', '$occurrence_process_mc', '$parts_removed_mc', '$quantity_mc', '$unit_cost_mc', '$material_cost_mc', '$manhour_cost_mc', '$portion_treatment', '$status', '$record_added_by')";

//         $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));

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












?>