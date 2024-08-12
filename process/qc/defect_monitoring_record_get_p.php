<?php
include '../conn.php';
// include '../conn_emp_mgt.php';

$method = $_GET['method'];

if ($method == 'get_discovery_person_qc') {
    $discovery_id_no = $_GET['discovery_id_no'] ?? '';

    if ($discovery_id_no == 'N/A') {
        echo json_encode(['full_name' => 'N/A']);
        exit;
    }

    if ($discovery_id_no == '') {
        echo json_encode(['full_name' => 'Invalid ID']);
        exit;
    }

    $query = "SELECT full_name FROM m_employees WHERE emp_no = ?";
    $stmt = $conn_emp_mgt_db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute([$discovery_id_no]);

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        echo json_encode(['full_name' => $row['full_name']]);
    } else {
        echo json_encode(['full_name' => 'Not Found']);
    }
    exit;
}

if ($method == 'get_occurrence_person_qc') {
    $occurrence_id_no = $_GET['occurrence_id_no'] ?? '';

    if ($occurrence_id_no == 'N/A') {
        echo json_encode(['full_name' => 'N/A']);
        exit;
    }

    if ($occurrence_id_no == '') {
        echo json_encode(['full_name' => 'Invalid ID']);
        exit;
    }

    $query = "SELECT full_name FROM m_employees WHERE emp_no = ?";
    $stmt = $conn_emp_mgt_db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute([$occurrence_id_no]);

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        echo json_encode(['full_name' => $row['full_name']]);
    } else {
        echo json_encode(['full_name' => 'Not Found']);
    }
    exit;
}

if ($method == 'get_outflow_person_qc') {
    $outflow_id_no = $_GET['outflow_id_no'] ?? '';

    if ($outflow_id_no == 'N/A') {
        echo json_encode(['full_name' => 'N/A']);
        exit;
    }

    if ($outflow_id_no == '') {
        echo json_encode(['full_name' => 'Invalid ID']);
        exit;
    }

    $query = "SELECT full_name FROM m_employees WHERE emp_no = ?";
    $stmt = $conn_emp_mgt_db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute([$outflow_id_no]);

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        echo json_encode(['full_name' => $row['full_name']]);
    } else {
        echo json_encode(['full_name' => 'Not Found']);
    }
    exit;
}



$conn = NULL;
?>