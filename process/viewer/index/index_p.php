<?php
include '../../conn.php';

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

// fetch defect record table
if ($method == 'load_viewer_defect_table') {
    $c = 0;

    echo '<thead style="text-align: center;">
            <tr>
                <th>#</th>
                <th>Line No.</th>
                <th>Category</th>
                <th>Date Detected</th>
                <th>Issue No. Tag</th>
                <th>Repairing Date</th>
                <th>Car Maker</th>
                <th>Product Name</th>
                <th>Lot No.</th>
                <th>Serial No.</th>
                <th>Discovery Process</th>
                <th>Discovery ID Number</th>
                <th>Discovery Person</th>
                <th>Occurrence Process</th>
                <th>Occurrence Shift</th>
                <th>Occurrence ID Number</th>
                <th>Occurrence Person</th>
                <th>Outflow Process</th>
                <th>Outflow Shift</th>
                <th>Outflow ID Number</th>
                <th>Outflow Person</th>
                <th>Defect Category</th>
                <th>Sequence Number</th>
                <th>Cause of Defect</th>
                <th>Detail in Content of Defect</th>
                <th>Treatment Content of Defect</th>
                <th>Dis-assembled/Dis-inserted by: (Repair Person)</th>
            </tr>
        </thead>
        <tbody class="mb-0" id="viewer_defect_table_data" style="background: #F9F9F9;">';

    $query = "SELECT * FROM t_defect_record_f WHERE (BINARY qc_status = 'Verified' OR BINARY record_type = 'White Tag') AND DATE(repairing_date) = CURDATE();";
    $stmt = $conn->prepare($query);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        foreach ($stmt->fetchALL() as $row) {
            $c++;
            echo '<tr style="cursor:pointer;" class="modal-trigger" onclick="load_viewer_mancost_table(&quot;' . $row['id'] . '~!~' . $row['defect_id'] . '&quot;)">';
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
        echo '<td colspan="12" style="text-align:center; color:red;">No Record Found</td>';
        echo '</tr>';
    }
    echo '</tbody>';
}

// fetch manpower and material cost monitoring
if ($method == 'load_viewer_mancost_table') {
    $viewer_defect_id = $_POST['viewer_defect_id'];
    $c = 0;


    $row_class_arr = array('modal-trigger', 'modal-trigger bg-success', 'modal-trigger bg-danger', 'modal-trigger bg-secondary');
    $row_class = $row_class_arr[0];

    echo '<thead style="text-align: center;">
            <tr>
                <th>#</th>
                <th>Car Maker</th>
                <th>Line No.</th>
                <th>Category</th>
                <th>Repairing Date</th>
                <th>Repair Start</th>
                <th>Repair End</th>
                <th>Time Consumed</th>
                <th>Defect Category</th>
                <th>Occurrence Process</th>
                <th>Parts Removed</th>
                <th>Quantity</th>
                <th>Unit Cost ( ¥ )</th>
                <th>Material Cost ( ¥ )</th>
                <th>Manhour Cost ( ¥ )</th>
                <th>Repaired Portion Treatment</th>
                <th>QC Verification</th>
                <th>Checking Date</th>
                <th>Verified By</th>
                <th>Remarks</th>
            </tr>
        </thead>
        <tbody class="mb-0" id="viewer_mancost_table_data" style="background: #F9F9F9;">';

    // $query = "SELECT * FROM t_mancost_monitoring_f WHERE defect_id = '$viewer_defect_id'";
    $query = "SELECT t_mancost_monitoring_f.id, t_defect_record_f.defect_id, t_defect_record_f.car_maker, t_defect_record_f.line_no, t_defect_record_f.category, t_defect_record_f.repairing_date, t_mancost_monitoring_f.repair_start, t_mancost_monitoring_f.repair_end, t_mancost_monitoring_f.time_consumed, t_mancost_monitoring_f.defect_category, t_mancost_monitoring_f.occurrence_process, t_mancost_monitoring_f.parts_removed, t_mancost_monitoring_f.quantity, t_mancost_monitoring_f.unit_cost, t_mancost_monitoring_f.material_cost, t_mancost_monitoring_f.manhour_cost, t_mancost_monitoring_f.repaired_portion_treatment, t_mancost_monitoring_f.qc_verification, t_mancost_monitoring_f.checking_date_sign, t_mancost_monitoring_f.verified_by, t_mancost_monitoring_f.remarks FROM t_defect_record_f LEFT JOIN t_mancost_monitoring_f ON t_defect_record_f.defect_id = t_mancost_monitoring_f.defect_id  WHERE t_defect_record_f.defect_id = '$viewer_defect_id'";
    $stmt = $conn->prepare($query);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        foreach ($stmt->fetchALL() as $row) {
            $c++;

            $c++;

            // color coding condition
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

            echo '<td style="text-align:center;">' . $row['qc_verification'] . '</td>';
            echo '<td style="text-align:center;">' . $row['checking_date_sign'] . '</td>';
            echo '<td style="text-align:center;">' . $row['verified_by'] . '</td>';
            echo '<td style="text-align:center;">' . $row['remarks'] . '</td>';
            echo '</tr>';
        }
    } else {
        echo '<tr>';
        echo '<td colspan="12" style="text-align:center; color:red;">No Record Found</td>';
        echo '</tr>';
    }
    echo '</tbody>';
}

if ($method == 'load_viewer_mancost_only') {
    $c = 0;

    $query = "SELECT * FROM t_mancost_monitoring_f WHERE defect_id IN ('', NULL)";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        foreach ($stmt->fetchALL() as $row) {
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

// search keyword in defect record and mancost
if ($method == 'viewer_defect_search_keyword') {
    $defect_category = $_POST['defect_category'] != '' ? $_POST['defect_category'] : '%';
    $discovery_process = $_POST['discovery_process'] != '' ? $_POST['discovery_process'] : '%';
    $occurrence_process = $_POST['occurrence_process'] != '' ? $_POST['occurrence_process'] : '%';
    $outflow_process = $_POST['outflow_process'] != '' ? $_POST['outflow_process'] : '%';
    $car_maker = $_POST['car_maker'] != '' ? $_POST['car_maker'] : '%';
    $line_no = $_POST['line_no'] != '' ? $_POST['line_no'] : '%';
    $product_name = $_POST['product_name'] != '' ? $_POST['product_name'] : '%';
    $lot_no = $_POST['lot_no'] != '' ? $_POST['lot_no'] : '%';
    $serial_no = $_POST['serial_no'] != '' ? $_POST['serial_no'] : '%';
    $record_type = $_POST['record_type'] != '' ? $_POST['record_type'] : '%';
    // additional search fields

    $v_defect_keyword = trim($_POST['v_defect_keyword']);

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

    echo '<thead style="text-align: center;">
            <tr>
            <th>#</th>
            <th>Line No.</th>
            <th>Date Detected</th>
            <th>Issue No. Tag</th>
            <th>Repairing Date</th>
            <th>Car Maker</th>
            <th>Product Name</th>
            <th>Lot No.</th>
            <th>Serial No.</th>
            <th>Discovery Process</th>
            <th>Discovery ID Number</th>
            <th>Discovery Person</th>
            <th>Occurrence Process</th>
            <th>Occurrence Shift</th>
            <th>Occurrence ID Number</th>
            <th>Occurrence Person</th>
            <th>Outflow Process</th>
            <th>Outflow Shift</th>
            <th>Outflow ID Number</th>
            <th>Outflow Person</th>
            <th>Defect Category</th>
            <th>Sequence Number</th>
            <th>Cause of Defect</th>
            <th>Detail in Content of Defect</th>
            <th>Treatment Content of Defect</th>
            <th>Dis-assembled/Dis-inserted by: (Repair Person)</th>
            </tr>
        </thead>
        <tbody class="mb-0" id="viewer_defect_table_data" style="background: #F9F9F9;">';

    $query = "SELECT * FROM `t_defect_record_f`";
    $conditions = [];

    if (!empty($date_from) && !empty($date_to)) {
        $conditions[] = "repairing_date BETWEEN '$date_from' AND '$date_to'";
    }

    if (!empty($v_defect_keyword)) {
        $conditions[] = "`car_maker` LIKE '$v_defect_keyword%' OR `line_no` LIKE '$v_defect_keyword%' OR `issue_no_tag` LIKE '$v_defect_keyword%' OR `discovery_process` LIKE '$v_defect_keyword%' OR `discovery_id_num` LIKE '$v_defect_keyword%' OR `discovery_person` LIKE '$v_defect_keyword%' OR `occurrence_process` LIKE '$v_defect_keyword%' OR `occurrence_shift` LIKE '$v_defect_keyword%' OR `occurrence_id_num` LIKE '$v_defect_keyword%' OR `occurrence_person` LIKE '$v_defect_keyword%' OR `outflow_process` LIKE '$v_defect_keyword%' OR `outflow_shift` LIKE '$v_defect_keyword%' OR `outflow_id_num` LIKE '$v_defect_keyword%' OR `outflow_person` LIKE '$v_defect_keyword%' OR `defect_category` LIKE '$v_defect_keyword%' OR `sequence_num` LIKE '$v_defect_keyword%' OR `defect_cause` LIKE '$v_defect_keyword%' OR `defect_detail_content` LIKE '$v_defect_keyword%' OR `defect_treatment_content` LIKE '$v_defect_keyword%' OR `dis_assembled_by` LIKE '$v_defect_keyword%'";
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

    $conditions[] = "(qc_status = 'Verified' OR BINARY record_type = 'White Tag')";
    // $conditions[] = "DATE(date_detected) = CURDATE()";

    if (!empty($conditions)) {
        $query .= " WHERE " . implode(" AND ", $conditions);
    }

    $stmt = $conn->prepare($query);
    $stmt->execute([$defect_category, $discovery_process, $occurrence_process, $outflow_process, $car_maker, $line_no, $product_name, $lot_no, $serial_no, $record_type]);

    // $params = [$defect_category, $discovery_process, $occurrence_process, $outflow_process, $car_maker, $line_no, $product_name, $lot_no, $serial_no, $record_type];
    // $stmt->execute($params);

    if ($stmt->rowCount() > 0) {
        foreach ($stmt->fetchAll() as $row) {
            $c++;
            echo '<tr style="cursor:pointer;" class="modal-trigger" onclick="load_viewer_mancost_table(&quot;' . $row['id'] . '~!~' . $row['defect_id'] . '&quot;)">';
            echo '<td style="text-align:center;">' . $c . '</td>';
            echo '<td style="text-align:center;">' . $row['line_no'] . '</td>';
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
            echo '<td style="text-align:center;">' . $row['defect_detail_content'] . '</td>';
            echo '<td style="text-align:center;">' . $row['defect_treatment_content'] . '</td>';
            echo '<td style="text-align:center;">' . $row['dis_assembled_by'] . '</td>';
            echo '</tr>';
        }
    } else {
        echo '<tr>';
        echo '<td colspan="12" style="text-align:center; color:red;">No Record Found</td>';
        echo '</tr>';
    }
    echo '</tbody>';
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