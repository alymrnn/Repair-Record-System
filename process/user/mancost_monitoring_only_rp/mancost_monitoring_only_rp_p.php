<?php
session_start();
include '../../conn.php';

$method = $_POST['method'];

// fetch option car maker mancost only
if ($method == 'fetch_opt_car_maker_mc2') {
    $query = "SELECT `car_maker` FROM `m_car_maker` ORDER BY car_maker ASC";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo '<option value="">Select the car maker</option>';
        foreach ($stmt->fetchALL() as $row) {
            echo '<option>' . htmlspecialchars($row['car_maker']) . '</option>';
        }
    } else {
        echo '<option>Select the defect category</option>';
    }
}

// fetch option defect category mancost only
if ($method == 'fetch_opt_defect_category_mc2') {
    $query = "SELECT `defect_equivalent` FROM `m_mc_defect_c` ORDER BY defect_equivalent ASC";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo '<option value="">Select the defect category</option>';
        foreach ($stmt->fetchALL() as $row) {
            echo '<option>' . htmlspecialchars($row['defect_equivalent']) . '</option>';
        }
    } else {
        echo '<option>Select the defect category</option>';
    }
}

// fetch search option defect category mancost only
if ($method == 'fetch_opt_search_defect_category_mc2') {
    $query = "SELECT `defect_equivalent` FROM `m_mc_defect_c` ORDER BY defect_equivalent ASC";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo '<option value="">Select the defect category</option>';
        foreach ($stmt->fetchALL() as $row) {
            echo '<option>' . htmlspecialchars($row['defect_equivalent']) . '</option>';
        }
    } else {
        echo '<option>Select the defect category</option>';
    }
}

// fetch option occurrence process mancost only
if ($method == 'fetch_opt_occurrence_process_mc2') {
    $query = "SELECT `occurrence_equivalent` FROM `m_mc_occurrence_p` ORDER BY occurrence_equivalent ASC";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo '<option value="">Select the occurrence process</option>';
        foreach ($stmt->fetchALL() as $row) {
            echo '<option>' . htmlspecialchars($row['occurrence_equivalent']) . '</option>';
        }
    } else {
        echo '<option>Select the occurrence process</option>';
    }
}

// fetch search option occurrence process mancost only
if ($method == 'fetch_opt_search_occurrence_process_mc2') {
    $query = "SELECT `occurrence_equivalent` FROM `m_mc_occurrence_p` ORDER BY occurrence_equivalent ASC";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo '<option value="">Select the occurrence process</option>';
        foreach ($stmt->fetchALL() as $row) {
            echo '<option>' . htmlspecialchars($row['occurrence_equivalent']) . '</option>';
        }
    } else {
        echo '<option>Select the occurrence process</option>';
    }
}

// fetch option portion treatment mancost only
if ($method == 'fetch_opt_portion_treatment_mc2') {
    $query = "SELECT `portion_treatment` FROM `m_portion_treatment` ORDER BY portion_treatment ASC";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo '<option value="">Select the portion treatment</option>';
        foreach ($stmt->fetchALL() as $row) {
            echo '<option>' . htmlspecialchars($row['portion_treatment']) . '</option>';
        }
    } else {
        echo '<option>Select the portion treatment</option>';
    }
}

// fetch mancost record
if ($method == 'load_mancost_record') {
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
            echo '<td style="text-align:center;">' . $row['line_no_mm'] . '</td>';
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

// add mancost record
if ($method == 'add_mancost2_record') {
    $car_maker_mc2 = trim($_POST['car_maker_mc2']);
    $line_no_mc2 = trim($_POST['line_no_mc2']);
    $repairing_date_mc2 = trim($_POST['repairing_date_mc2']);
    $repair_start_mc2 = trim($_POST['repair_start_mc2']);
    $repair_end_mc2 = trim($_POST['repair_end_mc2']);
    $time_consumed_mc2 = trim($_POST['time_consumed_mc2']);
    $defect_category_mc2 = trim($_POST['defect_category_mc2']);
    $occurrence_process_mc2 = trim($_POST['occurrence_process_mc2']);
    $parts_removed_mc2 = trim($_POST['parts_removed_mc2']);
    $quantity_mc2 = trim($_POST['quantity_mc2']);
    $unit_cost_mc2 = trim($_POST['unit_cost_mc2']);
    $material_cost_mc2 = trim($_POST['material_cost_mc2']);
    $manhour_cost_mc2 = trim($_POST['manhour_cost_mc2']);
    $portion_treatment_mc2 = trim($_POST['portion_treatment_mc2']);
    $re_checking_mc2 = trim($_POST['re_checking_mc2']);
    $qc_verification_mc2 = trim($_POST['qc_verification_mc2']);
    $checking_date_mc2 = trim($_POST['checking_date_mc2']);

    $status = 'Saved';
    $record_added_by = $_SESSION['full_name'];

    $check = "SELECT id FROM t_mancost_monitoring_f WHERE car_maker = '$car_maker_mc2'";
    $stmt = $conn->prepare($check);
    $stmt->execute();
    // if ($stmt->rowCount() > 0) {
    //     echo 'Already Exist';
    // } 
    // else {
    $stmt = NULL;
    $query = "INSERT INTO t_mancost_monitoring_f (`car_maker`,`line_no_mm`,`repairing_date`,`repair_start`,`repair_end`,`time_consumed`,`defect_category`,`occurrence_process`,`parts_removed`,`quantity`,`unit_cost`,`material_cost`,`manhour_cost`,`repaired_portion_treatment`,`re_checking`,`qc_verification`,`checking_date_sign`,`status`,`record_added_by`) VALUES ('$car_maker_mc2','$line_no_mc2','$repairing_date_mc2','$repair_start_mc2','$repair_end_mc2','$time_consumed_mc2','$defect_category_mc2','$occurrence_process_mc2','$parts_removed_mc2','$quantity_mc2','$unit_cost_mc2','$material_cost_mc2','$manhour_cost_mc2','$portion_treatment_mc2','$re_checking_mc2','$qc_verification_mc2','$checking_date_mc2','$status','$record_added_by')";
    $stmt = $conn->prepare($query);
    if ($stmt->execute()) {
        echo 'success';
    } else {
        echo 'error';
    }
    // }
}

// search mancost
if ($method == 'search_mancost2_record') {
    // $line_no_mc_search = $_POST['line_no_mc_search'];
    // $defect_category_mc_search = $_POST['defect_category_mc_search'];
    // $occurrence_process_mc_search = $_POST['occurrence_process_mc_search'];

    // $c = 0;
    // $query = "SELECT * FROM t_mancost_monitoring_f WHERE defect_id IN ('', NULL) AND line_no LIKE '$line_no_mc_search%' AND defect_category LIKE '$defect_category_mc_search' AND occurrence_process LIKE '$occurrence_process_mc_search'";
    // $stmt = $conn->prepare($query);
    // $stmt->execute();

    // $query = "SELECT * FROM t_mancost_monitoring_f WHERE defect_id IN ('', NULL) AND (line_no LIKE ? OR defect_category LIKE ? OR occurrence_process LIKE ?)";
    // $stmt = $conn->prepare($query);
    // $stmt->execute([$line_no_mc_search . '%', $defect_category_mc_search, $occurrence_process_mc_search]);

    $line_no_mc_search = $_POST['line_no_mc_search'] != '' ? $_POST['line_no_mc_search'] . '%' : '%';
    $defect_category_mc_search = $_POST['defect_category_mc_search'] != '' ? $_POST['defect_category_mc_search'] : '%';
    $occurrence_process_mc_search = $_POST['occurrence_process_mc_search'] != '' ? $_POST['occurrence_process_mc_search'] : '%';

    $c = 0;

    $query = "SELECT * FROM t_mancost_monitoring_f WHERE defect_id IN ('', NULL) AND line_no_mm LIKE ? AND defect_category LIKE ? AND occurrence_process LIKE ?";
    $stmt = $conn->prepare($query);
    $stmt->execute([$line_no_mc_search, $defect_category_mc_search, $occurrence_process_mc_search]);

    if ($stmt->rowCount() > 0) {
        foreach ($stmt->fetchAll() as $row) {
            $c++;
            echo '<tr style="cursor:pointer;">';
            echo '<td style="text-align:center;">' . $c . '</td>';
            echo '<td style="text-align:center;">' . $row['car_maker'] . '</td>';
            echo '<td style="text-align:center;">' . $row['line_no_mm'] . '</td>';
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
