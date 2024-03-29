<?php
session_start();
include '../../conn.php';

$method = $_POST['method'];

// ==================================================================
// fetch option line category
if ($method == 'fetch_opt_record_type_dr') {
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

// fetch option line category
if ($method == 'fetch_opt_category_dr') {
    $query = "SELECT `category` FROM `m_category` ORDER BY category ASC";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        foreach ($stmt->fetchAll() as $row) {
            echo '<option value="' . htmlspecialchars($row['category']) . '"></option>';
        }
    } else {
        echo '<option value="">Select the category</option>';
    }
}

// fetch option car maker
if ($method == 'fetch_opt_car_maker_dr') {
    $query = "SELECT `car_maker` FROM `m_car_maker` ORDER BY car_maker ASC";
    $stmt = $conn->prepare($query);
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
    $query = "SELECT `discovery_process` FROM `m_dr_discovery_p` ORDER BY discovery_process ASC";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo '<option value="">Select the discovery process</option>';
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
    $query = "SELECT `occurrence_process` FROM `m_dr_occurrence_p` ORDER BY occurrence_process ASC";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo '<option value="">Select the occurrence process</option>';
        foreach ($stmt->fetchALL() as $row) {
            echo '<option>' . htmlspecialchars($row['occurrence_process']) . '</option>';
        }
    } else {
        echo '<option>Select the occurrence process</option>';
    }
}

// fetch option occurrence shift
if ($method == 'fetch_opt_occurrence_shift') {
    $query = "SELECT `shift` FROM `m_shift` ORDER BY shift ASC";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo '<option value="">Select the occurrence shift</option>';
        foreach ($stmt->fetchALL() as $row) {
            echo '<option>' . htmlspecialchars($row['shift']) . '</option>';
        }
    } else {
        echo '<option>Select the occurrence shift</option>';
    }
}

// fetch option outflow process
if ($method == 'fetch_opt_outflow_process') {
    $query = "SELECT `outflow_process` FROM `m_dr_outflow_p` ORDER BY outflow_process ASC";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo '<option value="">Select the outflow process</option>';
        foreach ($stmt->fetchALL() as $row) {
            echo '<option>' . htmlspecialchars($row['outflow_process']) . '</option>';
        }
    } else {
        echo '<option>Select the outflow process</option>';
    }
}

// fetch option outflow shift
if ($method == 'fetch_opt_outflow_shift') {
    $query = "SELECT `shift` FROM `m_shift` ORDER BY shift ASC";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo '<option value="">Select the outflow shift</option>';
        foreach ($stmt->fetchALL() as $row) {
            echo '<option>' . htmlspecialchars($row['shift']) . '</option>';
        }
    } else {
        echo '<option>Select the outflow shift</option>';
    }
}

// fetch option defect category ng content
if ($method == 'fetch_opt_defect_category') {
    $query = "SELECT `defect_category_ng_content` FROM `m_dr_defect_c` ORDER BY defect_category_ng_content ASC";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo '<option value="">Select the defect category</option>';
        foreach ($stmt->fetchALL() as $row) {
            echo '<option>' . htmlspecialchars($row['defect_category_ng_content']) . '</option>';
        }
    } else {
        echo '<option>Select the defect category</option>';
    }
}

// fetch option cause of defect
if ($method == 'fetch_opt_defect_cause') {
    $query = "SELECT `defect_cause` FROM `m_defect_cause` ORDER BY defect_cause ASC";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo '<option value="">Select the cause of defect</option>';
        foreach ($stmt->fetchALL() as $row) {
            echo '<option>' . htmlspecialchars($row['defect_cause']) . '</option>';
        }
    } else {
        echo '<option>Select the cause of defect</option>';
    }
}

// fetch option repair person
if ($method == 'fetch_opt_repair_person') {
    $query = "SELECT `rp_name` FROM `m_repair_person` ORDER BY rp_name ASC";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo '<option value="">Select the repair person</option>';
        foreach ($stmt->fetchALL() as $row) {
            echo '<option>' . htmlspecialchars($row['rp_name']) . '</option>';
        }
    } else {
        echo '<option>Select the repair person</option>';
    }
}

// fetch option defect category mancost
if ($method == 'fetch_opt_defect_category_mc') {
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

// fetch option occurrence process mancost
if ($method == 'fetch_opt_occurrence_process_mc') {
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

// fetch option portion treatment
if ($method == 'fetch_opt_portion_treatment') {
    $query = "SELECT `portion_treatment` FROM `m_portion_treatment` ORDER BY portion_treatment ASC";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo '<option value="">Select the repaired portion treatment</option>';
        foreach ($stmt->fetchALL() as $row) {
            echo '<option>' . htmlspecialchars($row['portion_treatment']) . '</option>';
        }
    } else {
        echo '<option>Select the repaired portion treatment</option>';
    }
}

// fetch option defect category mancost only
if ($method == 'fetch_opt_defect_category_mc_only') {
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
if ($method == 'fetch_opt_occurrence_process_mc_only') {
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
if ($method == 'fetch_opt_portion_treatment_mc_only') {
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

function generate_new_defect_id($prefix = 'DRMMCM-')
{
    return $prefix . uniqid('', true);
}

// fetch defect record table
if ($method == 'load_defect_table') {
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
                <th>Dis-assembled/Dis-inserted by:</th>
            </tr>
        </thead>
        <tbody class="mb-0" id="defect_table_data" style="background: #F9F9F9;">';

    $query = "SELECT * FROM t_defect_record_f";
    $stmt = $conn->prepare($query);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        foreach ($stmt->fetchALL() as $l) {
            $c++;
            echo '<tr style="cursor:pointer;" class="modal-trigger" onclick="load_mancost_table(&quot;' . $l['id'] . '~!~' . $l['defect_id'] . '&quot;)">';
            echo '<td style="text-align:center;">' . $c . '</td>';
            echo '<td style="text-align:center;">' . $l['line_no'] . '</td>';
            echo '<td style="text-align:center;">' . $l['category'] . '</td>';
            echo '<td style="text-align:center;">' . $l['date_detected'] . '</td>';
            echo '<td style="text-align:center;">' . $l['issue_no_tag'] . '</td>';
            echo '<td style="text-align:center;">' . $l['repairing_date'] . '</td>';
            echo '<td style="text-align:center;">' . $l['car_maker'] . '</td>';
            echo '<td style="text-align:center;">' . $l['product_name'] . '</td>';
            echo '<td style="text-align:center;">' . $l['lot_no'] . '</td>';
            echo '<td style="text-align:center;">' . $l['serial_no'] . '</td>';
            echo '<td style="text-align:center;">' . $l['discovery_process'] . '</td>';
            echo '<td style="text-align:center;">' . $l['discovery_id_num'] . '</td>';
            echo '<td style="text-align:center;">' . $l['discovery_person'] . '</td>';
            echo '<td style="text-align:center;">' . $l['occurrence_process'] . '</td>';
            echo '<td style="text-align:center;">' . $l['occurrence_shift'] . '</td>';
            echo '<td style="text-align:center;">' . $l['occurrence_id_num'] . '</td>';
            echo '<td style="text-align:center;">' . $l['occurrence_person'] . '</td>';
            echo '<td style="text-align:center;">' . $l['outflow_process'] . '</td>';
            echo '<td style="text-align:center;">' . $l['outflow_shift'] . '</td>';
            echo '<td style="text-align:center;">' . $l['outflow_id_num'] . '</td>';
            echo '<td style="text-align:center;">' . $l['outflow_person'] . '</td>';
            echo '<td style="text-align:center;">' . $l['defect_category'] . '</td>';
            echo '<td style="text-align:center;">' . $l['sequence_num'] . '</td>';
            echo '<td style="text-align:center;">' . $l['defect_cause'] . '</td>';
            echo '<td style="text-align:left;">' . $l['defect_detail_content'] . '</td>';
            echo '<td style="text-align:left;">' . $l['defect_treatment_content'] . '</td>';
            echo '<td style="text-align:center;">' . $l['dis_assembled_by'] . '</td>';

            echo '</tr>';
        }
    } else {
        echo '<tr>';
        echo '<td colspan="10" style="text-align:center; color:red;">No Record Found</td>';
        echo '</tr>';
    }
    echo '</tbody>';
}

// fetch manpower and material cost monitoring
if ($method == 'load_mancost_table') {
    $defect_id = $_POST['defect_id'];
    $c = 0;

    echo '<thead style="text-align: center;">
            <tr>
                <th>#</th>
                <th>Car Maker</th>
                <th>Line No.</th>
                <th>Category</th>
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
            </tr>
        </thead>
        <tbody class="mb-0" id="mancost_table_data" style="background: #F9F9F9;">';

    // $query = "SELECT * FROM t_mancost_monitoring_f WHERE defect_id = '$defect_id'";
    $query = "SELECT t_defect_record_f.car_maker, t_defect_record_f.line_no, t_defect_record_f.category, t_mancost_monitoring_f.repair_start, t_mancost_monitoring_f.repair_end, t_mancost_monitoring_f.time_consumed, t_mancost_monitoring_f.defect_category, t_mancost_monitoring_f.occurrence_process, t_mancost_monitoring_f.parts_removed, t_mancost_monitoring_f.quantity, t_mancost_monitoring_f.unit_cost, t_mancost_monitoring_f.material_cost, t_mancost_monitoring_f.manhour_cost, t_mancost_monitoring_f.repaired_portion_treatment FROM t_defect_record_f LEFT JOIN t_mancost_monitoring_f ON t_defect_record_f.defect_id = t_mancost_monitoring_f.defect_id WHERE t_defect_record_f.defect_id = '$defect_id'";
    $stmt = $conn->prepare($query);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        foreach ($stmt->fetchALL() as $l) {
            $c++;
            echo '<tr style="cursor:pointer;">';
            echo '<td style="text-align:center;">' . $c . '</td>';
            echo '<td style="text-align:center;">' . $l['car_maker'] . '</td>';
            echo '<td style="text-align:center;">' . $l['line_no'] . '</td>';
            echo '<td style="text-align:center;">' . $l['category'] . '</td>';
            echo '<td style="text-align:center;">' . $l['repair_start'] . '</td>';
            echo '<td style="text-align:center;">' . $l['repair_end'] . '</td>';
            echo '<td style="text-align:center;">' . $l['time_consumed'] . '</td>';
            echo '<td style="text-align:center;">' . $l['defect_category'] . '</td>';
            echo '<td style="text-align:center;">' . $l['occurrence_process'] . '</td>';
            echo '<td style="text-align:center;">' . $l['parts_removed'] . '</td>';
            echo '<td style="text-align:center;">' . $l['quantity'] . '</td>';
            echo '<td style="text-align:center;">' . $l['unit_cost'] . '</td>';
            echo '<td style="text-align:center;">' . $l['material_cost'] . '</td>';
            echo '<td style="text-align:center;">' . $l['manhour_cost'] . '</td>';
            echo '<td style="text-align:center;">' . $l['repaired_portion_treatment'] . '</td>';
            echo '</tr>';
        }
    } else {
        echo '<tr>';
        echo '<td colspan="10" style="text-align:center; color:red;">No Record Found</td>';
        echo '</tr>';
    }
    echo '</tbody>';
}



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
    $defect_cause_dr = trim($_POST['defect_cause_dr']);
    $repair_person_dr = trim($_POST['repair_person_dr']);
    $detail_content_defect = trim($_POST['detail_content_defect']);
    $treatment_content_defect = trim($_POST['treatment_content_defect']);

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
                $message = "Sequence Number Empty";
                break;
            }
        case empty($defect_cause_dr): {
                $message = "Cause of Defect Empty";
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
if ($method == 'add_defect_mancost_record') {
    $record_type = trim($_POST['record_type']);

    $line_no = trim($_POST['line_no']);
    $line_category_dr = trim($_POST['line_category_dr']);
    $padded_line_no = str_pad($line_no, 4, '0', STR_PAD_LEFT);

    $date_detected = trim($_POST['date_detected']);
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
    $defect_cause_dr = trim($_POST['defect_cause_dr']);
    $detail_content_defect = trim($_POST['detail_content_defect']);
    $treatment_content_defect = trim($_POST['treatment_content_defect']);
    $repair_person_dr = trim($_POST['repair_person_dr']);
    // ============================================================
    $repair_start_mc = trim($_POST['repair_start_mc']);
    $repair_end_mc = trim($_POST['repair_end_mc']);

    // $repair_start_mc = ($repair_start_mc === 'N/A') ? null : $repair_start_mc;
    // $repair_end_mc = ($repair_end_mc === 'N/A') ? null : $repair_end_mc;

    $time_consumed_mc = trim($_POST['time_consumed_mc']);
    $defect_category_mc = trim($_POST['defect_category_mc']);
    $occurrence_process_mc = trim($_POST['occurrence_process_mc']);
    $parts_removed_mc = trim($_POST['parts_removed_mc']);
    $quantity_mc = trim($_POST['quantity_mc']);
    $unit_cost_mc = trim($_POST['unit_cost_mc']);
    $material_cost_mc = trim($_POST['material_cost_mc']);
    $manhour_cost_mc = trim($_POST['manhour_cost_mc']);
    $portion_treatment = trim($_POST['portion_treatment']);

    $defect_id = $_POST['defect_id'];

    $status = 'Saved';
    $record_added_by = $_SESSION['full_name'];

    $qc_status = 'Saved';

    $error = 0;
    $message = "";

    $check = "SELECT defect_id FROM t_defect_record_f WHERE defect_id = '$defect_id'";
    $stmt = $conn->prepare($check);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $error = 1;
        $message = 'Defect ID already exists.';
    } else {
        $stmt = NULL;

        // Check the number of existing records with the same line number
        // $check_existing = "SELECT MAX(issue_no_tag) FROM t_defect_record_f WHERE line_no = '$padded_line_no'";
        $check_existing = "SELECT MAX(CAST(issue_no_tag AS SIGNED)) FROM t_defect_record_f WHERE line_no = '$padded_line_no' AND MONTH(repairing_date) = MONTH(CURDATE())";
        $stmt_existing = $conn->prepare($check_existing);
        $stmt_existing->execute();
        $existing_issue_no = $stmt_existing->fetchColumn();

        // Increment the issue number based on the existing maximum issue number
        $issue_no = ($existing_issue_no !== false) ? ($existing_issue_no + 1) : 1;

        $query = "INSERT INTO t_defect_record_f (`defect_id`,`line_no`,`category`,`date_detected`,`issue_no_tag`,`repairing_date`,`car_maker`,`product_name`,`lot_no`,`serial_no`,`discovery_process`,`discovery_id_num`,`discovery_person`,`occurrence_process`,`occurrence_shift`,`occurrence_id_num`,`occurrence_person`,`outflow_process`,`outflow_shift`,`outflow_id_num`,`outflow_person`,`defect_category`,`sequence_num`,`defect_cause`,`defect_detail_content`,`defect_treatment_content`,`dis_assembled_by`,`qc_status`,`record_type`) VALUES ('$defect_id','$padded_line_no','$line_category_dr','$date_detected','$issue_no','$repairing_date','$car_maker','$product_name','$lot_no','$serial_no','$discovery_process_dr','$discovery_id_no_dr','$discovery_person','$occurrence_process_dr','$occurrence_shift_dr','$occurrence_id_no_dr','$occurrence_person','$outflow_process_dr','$outflow_shift_dr','$outflow_id_no_dr','$outflow_person','$defect_category_dr','$sequence_no','$defect_cause_dr','$detail_content_defect','$treatment_content_defect','$repair_person_dr','$qc_status','$record_type')";
        $stmt = $conn->prepare($query);

        if (!$stmt->execute()) {
            $message = 'error';
            $error = 1;
        }

        $check1 = "UPDATE t_mancost_monitoring_f SET status = '$status' WHERE defect_id = '$defect_id' AND record_added_by = '" . $_SESSION['full_name'] . "'";
        $stmt1 = $conn->prepare($check1);
        $stmt1->execute();
        if ($stmt1->rowCount() > 0) {

        } else {
            $stmt1 = NULL;
            $query1 = "INSERT INTO t_mancost_monitoring_f (`defect_id`,`repair_start`,`repair_end`,`time_consumed`,`defect_category`,`occurrence_process`,`parts_removed`,`quantity`,`unit_cost`,`material_cost`,`manhour_cost`,`repaired_portion_treatment`,`status`,`record_added_by`) VALUES ('$defect_id','$repair_start_mc','$repair_end_mc','$time_consumed_mc','$defect_category_mc','$occurrence_process_mc','$parts_removed_mc','$quantity_mc','$unit_cost_mc','$material_cost_mc','$manhour_cost_mc','$portion_treatment','$status','$record_added_by')";
            $stmt1 = $conn->prepare($query1);

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

// --------------------------------------------

// ADDING OF MULTIPLE MANCOST WITH ONE DEFECT ID
// fetch added mancost table
if ($method == 'load_added_mancost') {
    $c = 0;

    $query = "SELECT * FROM t_mancost_monitoring_f WHERE status = 'Added' AND record_added_by = '" . $_SESSION['full_name'] . "'";


    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        foreach ($stmt->fetchAll() as $row) {
            $c++;
            echo '<tr>';
            echo '<td>' . $c . '</td>';
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
            echo '<td><button type="button" class="btn btn-block btn-outline-danger btn-xs" onclick="delete_added_btn(event)" data-id="' . $row["id"] . '">Remove</button></td>';
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
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $_POST['id']);
    if ($stmt->execute()) {
        echo 'success';
    } else {
        echo 'error';
    }
}

if ($method == 'add_multiple_mancost') {
    $records = $_POST['records'];  // Assuming 'records' is an array of records

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

        $query = "INSERT INTO t_mancost_monitoring_f (`defect_id`,`repair_start`,`repair_end`,`time_consumed`,`defect_category`,`occurrence_process`,`parts_removed`,`quantity`,`unit_cost`,`material_cost`,`manhour_cost`,`repaired_portion_treatment`,`status`,`record_added_by`) VALUES ('$defect_id','$repair_start_mc','$repair_end_mc','$time_consumed_mc','$defect_category_mc','$occurrence_process_mc','$parts_removed_mc','$quantity_mc','$unit_cost_mc','$material_cost_mc','$manhour_cost_mc','$portion_treatment','$status','$record_added_by')";

        $stmt = $conn->prepare($query);

        if (!$stmt->execute()) {
            $message = 'error';
            $error = 1;
            break;  // Stop further processing if there's an error
        }
    }

    if ($error > 0) {
        echo $message;
    } else {
        echo 'success';
    }
}


// search keyword in record
if ($method == 'search_keyword') {
    $record_type = trim($_POST['record_type']);
    $drm_keyword = trim($_POST['drm_keyword']);

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
        <tbody class="mb-0" id="defect_table_data" style="background: #F9F9F9;">';

    $query = "SELECT * FROM `t_defect_record_f`";
    $conditions = [];

    if (!empty($date_from) && !empty($date_to)) {
        $conditions[] = "repairing_date BETWEEN '$date_from' AND '$date_to'";
    }

    if (!empty($drm_keyword)) {
        $conditions[] = "`car_maker` LIKE '$drm_keyword%' OR `line_no` LIKE '$drm_keyword%' OR `issue_no_tag` LIKE '$drm_keyword%' OR `discovery_process` LIKE '$drm_keyword%' OR `discovery_id_num` LIKE '$drm_keyword%' OR `discovery_person` LIKE '$drm_keyword%' OR `occurrence_process` LIKE '$drm_keyword%' OR `occurrence_shift` LIKE '$drm_keyword%' OR `occurrence_id_num` LIKE '$drm_keyword%' OR `occurrence_person` LIKE '$drm_keyword%' OR `outflow_process` LIKE '$drm_keyword%' OR `outflow_shift` LIKE '$drm_keyword%' OR `outflow_id_num` LIKE '$drm_keyword%' OR `outflow_person` LIKE '$drm_keyword%' OR `defect_category` LIKE '$drm_keyword%' OR `sequence_num` LIKE '$drm_keyword%' OR `defect_cause` LIKE '$drm_keyword%' OR `defect_detail_content` LIKE '$drm_keyword%' OR `defect_treatment_content` LIKE '$drm_keyword%' OR `dis_assembled_by` LIKE '$drm_keyword%'";
    }

    if (!empty($record_type) && $record_type !== '%') {
        $conditions[] = "record_type LIKE ?";
    }

    if (!empty($conditions)) {
        $query .= " WHERE " . implode(" AND ", $conditions);
    }

    $stmt = $conn->prepare($query);
    $stmt->execute([$record_type]);

    if ($stmt->rowCount() > 0) {
        foreach ($stmt->fetchAll() as $l) {
            $c++;
            echo '<tr style="cursor:pointer;" class="modal-trigger" onclick="load_mancost_table(&quot;' . $l['id'] . '~!~' . $l['defect_id'] . '&quot;)">';
            echo '<td style="text-align:center;">' . $c . '</td>';
            echo '<td style="text-align:center;">' . $l['line_no'] . '</td>';
            echo '<td style="text-align:center;">' . $l['category'] . '</td>';
            echo '<td style="text-align:center;">' . $l['date_detected'] . '</td>';
            echo '<td style="text-align:center;">' . $l['issue_no_tag'] . '</td>';
            echo '<td style="text-align:center;">' . $l['repairing_date'] . '</td>';
            echo '<td style="text-align:center;">' . $l['car_maker'] . '</td>';
            echo '<td style="text-align:center;">' . $l['product_name'] . '</td>';
            echo '<td style="text-align:center;">' . $l['lot_no'] . '</td>';
            echo '<td style="text-align:center;">' . $l['serial_no'] . '</td>';
            echo '<td style="text-align:center;">' . $l['discovery_process'] . '</td>';
            echo '<td style="text-align:center;">' . $l['discovery_id_num'] . '</td>';
            echo '<td style="text-align:center;">' . $l['discovery_person'] . '</td>';
            echo '<td style="text-align:center;">' . $l['occurrence_process'] . '</td>';
            echo '<td style="text-align:center;">' . $l['occurrence_shift'] . '</td>';
            echo '<td style="text-align:center;">' . $l['occurrence_id_num'] . '</td>';
            echo '<td style="text-align:center;">' . $l['occurrence_person'] . '</td>';
            echo '<td style="text-align:center;">' . $l['outflow_process'] . '</td>';
            echo '<td style="text-align:center;">' . $l['outflow_shift'] . '</td>';
            echo '<td style="text-align:center;">' . $l['outflow_id_num'] . '</td>';
            echo '<td style="text-align:center;">' . $l['outflow_person'] . '</td>';
            echo '<td style="text-align:center;">' . $l['defect_category'] . '</td>';
            echo '<td style="text-align:center;">' . $l['sequence_num'] . '</td>';
            echo '<td style="text-align:center;">' . $l['defect_cause'] . '</td>';
            echo '<td style="text-align:center;">' . $l['defect_detail_content'] . '</td>';
            echo '<td style="text-align:center;">' . $l['defect_treatment_content'] . '</td>';
            echo '<td style="text-align:center;">' . $l['dis_assembled_by'] . '</td>';
            echo '</tr>';
        }
    } else {
        echo '<tr>';
        echo '<td colspan="10" style="text-align:center; color:red;">No Record Found</td>';
        echo '</tr>';
    }
    echo '</tbody>';
}

// get issue tag

if ($method == 'get_issue_tag') {
    // $line_no = $_POST['line_no'];
    $line_no = filter_var($_POST['line_no'], FILTER_SANITIZE_STRING);
    $padded_line_no = str_pad($line_no, 4, '0', STR_PAD_LEFT);

    // Check if the month has changed
    $check_month_change = "SELECT MAX(date_detected) FROM t_defect_record_f WHERE line_no = '$padded_line_no'";
    $stmt_month_change = $conn->prepare($check_month_change);
    $stmt_month_change->execute();
    $latest_date_detected = $stmt_month_change->fetchColumn();

    // Get the current date
    $current_date = date('Y-m-d');

    // Check if the month has changed using MySQL
    $check_month_change_query = "SELECT LAST_DAY(?) != LAST_DAY(?) AS month_changed";
    $stmt_month_change_query = $conn->prepare($check_month_change_query);
    $stmt_month_change_query->execute([$latest_date_detected, $current_date]);
    $month_changed = $stmt_month_change_query->fetchColumn();

    // Reset the issue number if the month has changed
    if ($month_changed) {
        $issue_no = 1;
    } else {
        // Increment the issue number based on the existing maximum issue number
        // $check_existing = "SELECT MAX(issue_no_tag) FROM t_defect_record_f WHERE line_no = '$padded_line_no' AND MONTH(repairing_date) = MONTH(CURDATE())";
        // $stmt_existing = $conn->prepare($check_existing);
        // $stmt_existing->execute();
        // $existing_issue_no = $stmt_existing->fetchColumn();

        // $issue_no = ($existing_issue_no !== false) ? ($existing_issue_no + 1) : 1;

        $check_existing = "SELECT MAX(CAST(issue_no_tag AS SIGNED)) FROM t_defect_record_f WHERE line_no = '$padded_line_no' AND MONTH(repairing_date) = MONTH(CURDATE())";
        $stmt_existing = $conn->prepare($check_existing);
        $stmt_existing->execute();
        $existing_issue_no = $stmt_existing->fetchColumn();

        $issue_no = ($existing_issue_no !== false) ? ($existing_issue_no + 1) : 1;
    }
    echo $issue_no;
    die();
}

// fetch unit cost thru part name
// Autocomplete and Fetch Unit Price
if ($method == 'autocomplete_parts') {
    $inputText = $_POST['input_text'];

    // Query to fetch part names based on the provided input text
    $query = "SELECT DISTINCT parts_name FROM m_pricelist WHERE parts_name LIKE :input_text LIMIT 10";

    $stmt = $conn->prepare($query);
    $stmt->bindValue(':input_text', '%' . $inputText . '%');
    $stmt->execute();

    $partNames = $stmt->fetchAll(PDO::FETCH_COLUMN);

    // Return the result as JSON
    echo json_encode(['part_names' => $partNames]);
    exit;
} elseif ($method == 'fetch_unit_price') {
    $parts_removed = $_POST['parts_removed'];

    // Query to fetch unit price based on the provided parts_removed
    $query = "SELECT unit_price FROM m_pricelist WHERE parts_name = :parts_removed LIMIT 1";

    $stmt = $conn->prepare($query);
    $stmt->bindParam(':parts_removed', $parts_removed);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if any row was returned
    if ($result) {
        $unit_price = $result['unit_price'];

        // Return the result as JSON
        echo json_encode(['unit_price' => $unit_price]);
    } else {
        // No matching record found
        echo json_encode(['error' => 'No matching record found']);
    }
    exit;
}

$conn = NULL;
