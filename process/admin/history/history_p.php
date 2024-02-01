<?php
include '../../conn.php';

$method = $_POST['method'];

//fetch history record table 
if ($method == 'load_history_defect_table') {
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
                    <th>Dis-assembled/Dis-inserted by:</th>
                </tr>
            </thead>
            <tbody class="mb-0" id="history_defect_table_data" style="background: #F9F9F9;">';
    
        $query = "SELECT * FROM t_defect_record_f";
        $stmt = $conn->prepare($query);
        $stmt->execute();
    
        if ($stmt->rowCount() > 0) {
            foreach ($stmt->fetchALL() as $row) {
                $c++;
                echo '<tr style="cursor:pointer;" class="modal-trigger" onclick="load_history_mancost_table(&quot;' . $row['id'] . '~!~' . $row['defect_id'] . '&quot;)">';
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
                echo '<td style="text-align:left;">' . $row['defect_detail_content'] . '</td>';
                echo '<td style="text-align:left;">' . $row['defect_treatment_content'] . '</td>';
                echo '<td style="text-align:center;">' . $row['dis_assembled_by'] . '</td>';
                echo '</tr>';
            }
        } else {
            echo '<tr>';
            echo '<td colspan="10" style="text-align:center; color:red;">No Record Found</td>';
            echo '</tr>';
        }
        echo '</tbody>';
    }

    // fetch manpower and maetrial cost monitoring
    if ($method == 'load_history_mancost_table') {
        $history_defect_id = $_POST['history_defect_id'];
        $c = 0;
    
        echo '<thead style="text-align: center;">
                <tr>
                    <th>#</th>
                    <th>Car Maker</th>
                    <th>Line No.</th>
                    <th>Repair Start</th>
                    <th>Repair End</th>
                    <th>Time Consumed</th>
                    <th>Defect Category</th>
                    <th>Occurrence Process</th>
                    <th>Parts Removed</th>
                    <th>Quantity</th>
                    <th>Unit Cost</th>
                    <th>Material Cost</th>
                    <th>Manhour Cost</th>
                    <th>Repaired Portion Treatment</th>
                    <th>Re-checking</th>
                    <th>QC Verification</th>
                    <th>Checking Date Sign</th>
                </tr>
            </thead>
            <tbody class="mb-0" id="history_mancost_table_data" style="background: #F9F9F9;">';
    
        // $query = "SELECT * FROM t_mancost_monitoring_f WHERE defect_id = '$history_defect_id'";
        $query = "SELECT t_defect_record_f.car_maker, t_defect_record_f.line_no, t_mancost_monitoring_f.repair_start, t_mancost_monitoring_f.repair_end, t_mancost_monitoring_f.time_consumed, t_mancost_monitoring_f.defect_category, t_mancost_monitoring_f.occurrence_process, t_mancost_monitoring_f.parts_removed, t_mancost_monitoring_f.quantity, t_mancost_monitoring_f.unit_cost, t_mancost_monitoring_f.material_cost, t_mancost_monitoring_f.manhour_cost, t_mancost_monitoring_f.repaired_portion_treatment, t_mancost_monitoring_f.re_checking, t_mancost_monitoring_f.qc_verification, t_mancost_monitoring_f.checking_date_sign, t_mancost_monitoring_f.record_added_by FROM t_defect_record_f LEFT JOIN t_mancost_monitoring_f ON t_defect_record_f.defect_id = t_mancost_monitoring_f.defect_id WHERE t_defect_record_f.defect_id = '$history_defect_id'";
        $stmt = $conn->prepare($query);
        $stmt->execute();
    
        if ($stmt->rowCount() > 0) {
            foreach ($stmt->fetchALL() as $row) {
                $c++;
                echo '<tr style="cursor:pointer;">';
                echo '<td style="text-align:center;">' . $c . '</td>';
                echo '<td style="text-align:center;">' . $row['car_maker'] . '</td>';
                echo '<td style="text-align:center;">' . $row['line_no'] . '</td>';
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
            echo '<td colspan="10" style="text-align:center; color:red;">No Record Found</td>';
            echo '</tr>';
        }
        echo '</tbody>';
    }

    if ($method == 'load_history_mancost_only') {
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
            echo '<td colspan="10" style="text-align:center; color:red;">No Record Found</td>';
            echo '</tr>';
        }
    }

    // search keyword in defect record and mancost
    if ($method == 'history_defect_search_keyword') {
        $h_defect_keyword = trim($_POST['h_defect_keyword']);
    
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
            <tbody class="mb-0" id="history_defect_table_data" style="background: #F9F9F9;">';
    
        $query = "SELECT * FROM `t_defect_record_f`";
        $conditions = [];
    
        if (!empty($date_from) && !empty($date_to)) {
            $conditions[] = "date_detected BETWEEN '$date_from' AND '$date_to'";
        }
    
        if (!empty($h_defect_keyword)) {
            $conditions[] = "`car_maker` LIKE '$h_defect_keyword%' OR `line_no` LIKE '$h_defect_keyword%' OR `issue_no_tag` LIKE '$h_defect_keyword%' OR `discovery_process` LIKE '$h_defect_keyword%' OR `discovery_id_num` LIKE '$h_defect_keyword%' OR `discovery_person` LIKE '$h_defect_keyword%' OR `occurrence_process` LIKE '$h_defect_keyword%' OR `occurrence_shift` LIKE '$h_defect_keyword%' OR `occurrence_id_num` LIKE '$h_defect_keyword%' OR `occurrence_person` LIKE '$h_defect_keyword%' OR `outflow_process` LIKE '$h_defect_keyword%' OR `outflow_shift` LIKE '$h_defect_keyword%' OR `outflow_id_num` LIKE '$h_defect_keyword%' OR `outflow_person` LIKE '$h_defect_keyword%' OR `defect_category` LIKE '$h_defect_keyword%' OR `sequence_num` LIKE '$h_defect_keyword%' OR `defect_cause` LIKE '$h_defect_keyword%' OR `defect_detail_content` LIKE '$h_defect_keyword%' OR `defect_treatment_content` LIKE '$h_defect_keyword%' OR `dis_assembled_by` LIKE '$h_defect_keyword%'";
        }
    
        if (!empty($conditions)) {
            $query .= " WHERE " . implode(" AND ", $conditions);
        }
    
        $stmt = $conn->prepare($query);
        $stmt->execute();
    
        if ($stmt->rowCount() > 0) {
            foreach ($stmt->fetchAll() as $row) {
                $c++;
                echo '<tr style="cursor:pointer;" class="modal-trigger" onclick="load_history_mancost_table(&quot;' . $row['id'] . '~!~' . $row['defect_id'] . '&quot;)">';
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
            echo '<td colspan="10" style="text-align:center; color:red;">No Record Found</td>';
            echo '</tr>';
        }
        echo '</tbody>';
    }

    // search keyword in mancost monitoring only
    if ($method == 'history_mancost_search_keyword') {
        $h_mancost_keyword = trim($_POST['h_mancost_keyword']);
    
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
    
        if (!empty($h_mancost_keyword)) {
            $conditions[] = "`car_maker` LIKE '$h_mancost_keyword%' OR `line_no` LIKE '$h_mancost_keyword%' OR `defect_category` LIKE '$h_mancost_keyword%' OR `occurrence_process` LIKE '$h_mancost_keyword%' OR `parts_removed` LIKE '$h_mancost_keyword%' OR `repaired_portion_treatment` LIKE '$h_mancost_keyword%' OR `re_checking` LIKE '$h_mancost_keyword%' OR `qc_verification` LIKE '$h_mancost_keyword%' OR `checking_date_sign`";
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
            echo '<td colspan="10" style="text-align:center; color:red;">No Record Found</td>';
            echo '</tr>';
        }
    }



$conn = NULL;
?>