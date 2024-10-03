<?php
include '../conn.php';
// include '../conn_emp_mgt.php';

$method = $_POST['method'];

if ($method == 'qr_setting_list') {
    $c = 0;

    $query = "SELECT * FROM m_car_maker ORDER BY car_maker ASC";
    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        foreach ($stmt->fetchALL() as $row) {
            $c++;
            echo '<tr style="cursor:pointer;" class="modal-trigger" data-toggle="modal" data-target="#update_car_settings" onclick="get_car_setting_details(&quot;' . $row['id'] . '~!~' . $row['car_maker'] . '~!~' . $row['car_model'] . '~!~' . $row['car_value'] . '~!~' . $row['total_length'] . '~!~' . $row['product_name_start'] . '~!~' . $row['product_name_length'] . '~!~' . $row['lot_no_start'] . '~!~' . $row['lot_no_length'] . '~!~' . $row['serial_no_start'] . '~!~' . $row['serial_no_length'] . '&quot;)">';
            echo '<td style="text-align:center;">' . $c . '</td>';
            echo '<td style="text-align:center;">' . $row['car_maker'] . '</td>';
            echo '<td style="text-align:center;">' . $row['car_model'] . '</td>';
            echo '<td style="text-align:center;">' . $row['car_value'] . '</td>';
            echo '<td style="text-align:center;">' . $row['total_length'] . '</td>';
            echo '<td style="text-align:center;">' . $row['product_name_start'] . '</td>';
            echo '<td style="text-align:center;">' . $row['product_name_length'] . '</td>';
            echo '<td style="text-align:center;">' . $row['lot_no_start'] . '</td>';
            echo '<td style="text-align:center;">' . $row['lot_no_length'] . '</td>';
            echo '<td style="text-align:center;">' . $row['serial_no_start'] . '</td>';
            echo '<td style="text-align:center;">' . $row['serial_no_length'] . '</td>';
            echo '</tr>';
        }
    } else {
        echo '<tr>';
        echo '<td colspan="12" style="text-align:center; color:red;">No Result</td>';
        echo '</tr>';
    }
}

if ($method == 'register_setting') {
    $car_maker = trim($_POST['car_maker']);
    $car_model = trim($_POST['car_model']);
    $car_value = trim($_POST['car_value']);
    $total_length = trim($_POST['total_length']);
    $pro_name_start = trim($_POST['pro_name_start']);
    $pro_name_length = trim($_POST['pro_name_length']);
    $lot_no_start = trim($_POST['lot_no_start']);
    $lot_no_length = trim($_POST['lot_no_length']);
    $serial_no_start = trim($_POST['serial_no_start']);
    $serial_no_length = trim($_POST['serial_no_length']);

    $stmt = NULL;
    $query = "INSERT INTO m_car_maker (car_maker,car_model,car_value,total_length,product_name_start,product_name_length,lot_no_start,lot_no_length,serial_no_start,serial_no_length) VALUES ('$car_maker','$car_model','$car_value','$total_length','$pro_name_start','$pro_name_length','$lot_no_start','$lot_no_length','$serial_no_start','$serial_no_length')";

    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    if ($stmt->execute()) {
        echo 'success';
    } else {
        echo 'error';
    }
}

if ($method == 'update_setting') {
    $id = $_POST['id'];
    $car_maker = trim($_POST['car_maker']);
    $car_model = trim($_POST['car_model']);
    $car_value = trim($_POST['car_value']);
    $total_length = trim($_POST['total_length']);
    $pro_name_start = trim($_POST['pro_name_start']);
    $pro_name_length = trim($_POST['pro_name_length']);
    $lot_no_start = trim($_POST['lot_no_start']);
    $lot_no_length = trim($_POST['lot_no_length']);
    $serial_no_start = trim($_POST['serial_no_start']);
    $serial_no_length = trim($_POST['serial_no_length']);

    $query = "UPDATE m_car_maker SET car_maker = '$car_maker', car_model = '$car_model', car_value = '$car_value', total_length = '$total_length', product_name_start = '$pro_name_start', product_name_length = '$pro_name_length', lot_no_start = '$lot_no_start', lot_no_length = '$lot_no_length', serial_no_start = '$serial_no_start', serial_no_length = '$serial_no_length' WHERE id = '$id'";

    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));

    if ($stmt->execute()) {
        echo 'success';
    } else {
        echo 'error';
    }

}

if ($method == 'delete_setting') {
    $id = $_POST['id'];

    $query = "DELETE FROM m_car_maker WHERE id = $id";
    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    if ($stmt->execute()) {
        echo 'success';
    } else {
        echo 'error';
    }
}

if ($method == 'load_line_no') {
    $c = 0;

    $query = "SELECT * FROM m_line_no ORDER BY line_no ASC";
    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        foreach ($stmt->fetchALL() as $row) {
            $c++;
            echo '<tr style="cursor:pointer;">';
            echo '<td style="text-align:right;">' . $c . '</td>';
            echo '<td style="text-align:center;">' . $row['line_no'] . '</td>';
            echo '<td style="text-align: left;">';
            echo '<button type="button" class="btn btn-outline-danger btn-xs" onclick="delete_added_line_no(event)" data-id="' . $row["id"] . '"><i class="fas fa-trash"></i>&nbsp;Delete</button>';
            echo '</td>';
            echo '</tr>';
        }
    } else {
        echo '<tr>';
        echo '<td colspan="12" style="text-align:center; color:red;">No Result</td>';
        echo '</tr>';
    }
}

if ($method == 'delete_added_line_no') {
    $query = "DELETE FROM m_line_no WHERE id = :id";
    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->bindParam(':id', $_POST['id']);
    if ($stmt->execute()) {
        echo 'success';
    } else {
        echo 'error';
    }
}

if ($method == 'register_line_no') {
    $line_no = trim($_POST['line_no']);

    $stmt = NULL;
    $query = "INSERT INTO m_line_no (line_no) VALUES ('$line_no')";

    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    if ($stmt->execute()) {
        echo 'success';
    } else {
        echo 'error';
    }
}

if ($method == 'load_discovery_process') {
    $c = 0;

    $query = "SELECT * FROM m_dr_discovery_p ORDER BY discovery_process ASC";
    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        foreach ($stmt->fetchALL() as $row) {
            $c++;
            echo '<tr style="cursor:pointer;">';
            echo '<td style="text-align:right;">' . $c . '</td>';
            echo '<td style="text-align:center;">' . $row['discovery_process'] . '</td>';
            echo '<td style="text-align: left;">';
            echo '<button type="button" class="btn btn-outline-danger btn-xs" onclick="delete_added_discovery_process(event)" data-id="' . $row["id"] . '"><i class="fas fa-trash"></i> Delete</button>';
            echo '</td>';
            echo '</tr>';
        }
    } else {
        echo '<tr>';
        echo '<td colspan="12" style="text-align:center; color:red;">No Result</td>';
        echo '</tr>';
    }
}

if ($method == 'register_discovery_process') {
    $discovery_process = trim($_POST['discovery_process']);

    $stmt = NULL;
    $query = "INSERT INTO m_dr_discovery_p (discovery_process) VALUES ('$discovery_process')";

    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    if ($stmt->execute()) {
        echo 'success';
    } else {
        echo 'error';
    }
}

if ($method == 'delete_added_discovery_process') {
    $query = "DELETE FROM m_dr_discovery_p WHERE id = :id";
    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->bindParam(':id', $_POST['id']);
    if ($stmt->execute()) {
        echo 'success';
    } else {
        echo 'error';
    }
}

if ($method == 'load_occurrence_process_defect') {
    $c = 0;

    $query = "SELECT * FROM m_dr_occurrence_p ORDER BY occurrence_process ASC";
    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        foreach ($stmt->fetchALL() as $row) {
            $c++;
            echo '<tr style="cursor:pointer;">';
            echo '<td style="text-align:right;">' . $c . '</td>';
            echo '<td style="text-align:center;">' . $row['occurrence_process'] . '</td>';
            echo '<td style="text-align: left;">';
            echo '<button type="button" class="btn btn-outline-danger btn-xs" onclick="delete_added_occurrence_process_d(event)" data-id="' . $row["id"] . '"><i class="fas fa-trash"></i> Delete</button>';
            echo '</td>';
            echo '</tr>';
        }
    } else {
        echo '<tr>';
        echo '<td colspan="12" style="text-align:center; color:red;">No Result</td>';
        echo '</tr>';
    }
}

if ($method == 'register_occurrence_process_defect') {
    $occurrence_process_d = trim($_POST['occurrence_process_d']);

    $stmt = NULL;
    $query = "INSERT INTO m_dr_occurrence_p (occurrence_process) VALUES ('$occurrence_process_d')";

    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    if ($stmt->execute()) {
        echo 'success';
    } else {
        echo 'error';
    }
}

if ($method == 'delete_added_occurrence_process_d') {
    $query = "DELETE FROM m_dr_occurrence_p WHERE id = :id";
    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->bindParam(':id', $_POST['id']);
    if ($stmt->execute()) {
        echo 'success';
    } else {
        echo 'error';
    }
}

if ($method == 'load_outflow_process') {
    $c = 0;

    $query = "SELECT * FROM m_dr_outflow_p ORDER BY outflow_process ASC";
    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        foreach ($stmt->fetchALL() as $row) {
            $c++;
            echo '<tr style="cursor:pointer;">';
            echo '<td style="text-align:right;">' . $c . '</td>';
            echo '<td style="text-align:center;">' . $row['outflow_process'] . '</td>';
            echo '<td style="text-align: left;">';
            echo '<button type="button" class="btn btn-outline-danger btn-xs" onclick="delete_added_outflow_process(event)" data-id="' . $row["id"] . '"><i class="fas fa-trash"></i> Delete</button>';
            echo '</td>';
            echo '</tr>';
        }
    } else {
        echo '<tr>';
        echo '<td colspan="12" style="text-align:center; color:red;">No Result</td>';
        echo '</tr>';
    }
}

if ($method == 'register_outflow_process') {
    $outflow_process = trim($_POST['outflow_process']);

    $stmt = NULL;
    $query = "INSERT INTO m_dr_outflow_p (outflow_process) VALUES ('$outflow_process')";

    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    if ($stmt->execute()) {
        echo 'success';
    } else {
        echo 'error';
    }
}

if ($method == 'delete_added_outflow_process') {
    $query = "DELETE FROM m_dr_outflow_p WHERE id = :id";
    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->bindParam(':id', $_POST['id']);
    if ($stmt->execute()) {
        echo 'success';
    } else {
        echo 'error';
    }
}

if ($method == 'load_defect_category_d') {
    $c = 0;

    $query = "SELECT * FROM m_dr_defect_c ORDER BY defect_category_ng_content ASC";
    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        foreach ($stmt->fetchALL() as $row) {
            $c++;
            echo '<tr style="cursor:pointer;">';
            echo '<td style="text-align:right;">' . $c . '</td>';
            echo '<td style="text-align:center;">' . $row['defect_category_ng_content'] . '</td>';
            echo '<td style="text-align: left;">';
            echo '<button type="button" class="btn btn-outline-danger btn-xs" onclick="delete_added_defect_category_d(event)" data-id="' . $row["id"] . '"><i class="fas fa-trash"></i> Delete</button>';
            echo '</td>';
            echo '</tr>';
        }
    } else {
        echo '<tr>';
        echo '<td colspan="12" style="text-align:center; color:red;">No Result</td>';
        echo '</tr>';
    }
}

if ($method == 'register_defect_category_d') {
    $defect_category_d = trim($_POST['defect_category_d']);

    $stmt = NULL;
    $query = "INSERT INTO m_dr_defect_c (defect_category_ng_content) VALUES ('$defect_category_d')";

    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    if ($stmt->execute()) {
        echo 'success';
    } else {
        echo 'error';
    }
}

if ($method == 'delete_added_defect_category_d') {
    $query = "DELETE FROM m_dr_defect_c WHERE id = :id";
    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->bindParam(':id', $_POST['id']);
    if ($stmt->execute()) {
        echo 'success';
    } else {
        echo 'error';
    }
}

if ($method == 'load_defect_category_m') {
    $c = 0;

    $query = "SELECT * FROM m_mc_defect_c ORDER BY defect_equivalent ASC";
    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        foreach ($stmt->fetchALL() as $row) {
            $c++;
            echo '<tr style="cursor:pointer;">';
            echo '<td style="text-align:right;">' . $c . '</td>';
            echo '<td style="text-align:center;">' . $row['defect_equivalent'] . '</td>';
            echo '<td style="text-align: left;">';
            echo '<button type="button" class="btn btn-outline-danger btn-xs" onclick="delete_added_defect_category_m(event)" data-id="' . $row["id"] . '"><i class="fas fa-trash"></i> Delete</button>';
            echo '</td>';
            echo '</tr>';
        }
    } else {
        echo '<tr>';
        echo '<td colspan="12" style="text-align:center; color:red;">No Result</td>';
        echo '</tr>';
    }
}

if ($method == 'register_defect_category_m') {
    $defect_category_m = trim($_POST['defect_category_m']);

    $stmt = NULL;
    $query = "INSERT INTO m_mc_defect_c (defect_equivalent) VALUES ('$defect_category_m')";

    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    if ($stmt->execute()) {
        echo 'success';
    } else {
        echo 'error';
    }
}

if ($method == 'delete_added_defect_category_m') {
    $query = "DELETE FROM m_mc_defect_c WHERE id = :id";
    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->bindParam(':id', $_POST['id']);
    if ($stmt->execute()) {
        echo 'success';
    } else {
        echo 'error';
    }
}

if ($method == 'load_occurrence_process_m') {
    $c = 0;

    $query = "SELECT * FROM m_mc_occurrence_p ORDER BY occurrence_equivalent ASC";
    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        foreach ($stmt->fetchALL() as $row) {
            $c++;
            echo '<tr style="cursor:pointer;">';
            echo '<td style="text-align:right;">' . $c . '</td>';
            echo '<td style="text-align:center;">' . $row['occurrence_equivalent'] . '</td>';
            echo '<td style="text-align: left;">';
            echo '<button type="button" class="btn btn-outline-danger btn-xs" onclick="delete_added_occurrence_process_m(event)" data-id="' . $row["id"] . '"><i class="fas fa-trash"></i> Delete</button>';
            echo '</td>';
            echo '</tr>';
        }
    } else {
        echo '<tr>';
        echo '<td colspan="12" style="text-align:center; color:red;">No Result</td>';
        echo '</tr>';
    }
}

if ($method == 'register_occurrence_process_mancost') {
    $occurrence_process_m = trim($_POST['occurrence_process_m']);

    $stmt = NULL;
    $query = "INSERT INTO m_mc_occurrence_p (occurrence_equivalent) VALUES ('$occurrence_process_m')";

    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    if ($stmt->execute()) {
        echo 'success';
    } else {
        echo 'error';
    }
}

if ($method == 'delete_added_occurrence_process_m') {
    $query = "DELETE FROM m_mc_occurrence_p WHERE id = :id";
    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->bindParam(':id', $_POST['id']);
    if ($stmt->execute()) {
        echo 'success';
    } else {
        echo 'error';
    }
}

if ($method == 'load_repair_person_d') {
    $c = 0;

    $query = "SELECT * FROM m_repair_person ORDER BY rp_name ASC";
    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        foreach ($stmt->fetchALL() as $row) {
            $c++;
            echo '<tr style="cursor:pointer;">';
            echo '<td style="text-align:right;">' . $c . '</td>';
            echo '<td style="text-align:center;">' . $row['rp_name'] . '</td>';
            echo '<td style="text-align: left;">';
            echo '<button type="button" class="btn btn-outline-danger btn-xs" onclick="delete_added_repair_person(event)" data-id="' . $row["id"] . '"><i class="fas fa-trash"></i> Delete</button>';
            echo '</td>';
            echo '</tr>';
        }
    } else {
        echo '<tr>';
        echo '<td colspan="12" style="text-align:center; color:red;">No Result</td>';
        echo '</tr>';
    }
}

if ($method == 'register_repair_person') {
    $repair_person_d = trim($_POST['repair_person_d']);

    $stmt = NULL;
    $query = "INSERT INTO m_repair_person (rp_name) VALUES ('$repair_person_d')";

    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    if ($stmt->execute()) {
        echo 'success';
    } else {
        echo 'error';
    }
}

if ($method == 'delete_added_repair_person') {
    $query = "DELETE FROM m_repair_person WHERE id = :id";
    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->bindParam(':id', $_POST['id']);
    if ($stmt->execute()) {
        echo 'success';
    } else {
        echo 'error';
    }
}

$conn = NULL;
?>