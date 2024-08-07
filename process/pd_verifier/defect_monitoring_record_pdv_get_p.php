<?php
include '../conn.php';
include '../conn_emp_mgt.php';

$method = $_GET['method'];

if ($method == 'get_cc_name') {
    $cc_id_no = $_GET['cc_id_no'] ?? '';

    if ($cc_id_no == 'N/A') {
        echo json_encode(['full_name' => 'N/A']);
        exit;
    }

    if ($cc_id_no == '') {
        echo json_encode(['full_name' => 'Invalid ID']);
        exit;
    }

    $query = "SELECT full_name FROM m_employees WHERE emp_no = ?";
    $stmt = $conn_emp_mgt_db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute([$cc_id_no]);

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        echo json_encode(['full_name' => $row['full_name']]);
    } else {
        echo json_encode(['full_name' => 'Not Found']);
    }
    exit;
}

if ($method == 'get_recrimp_pd_name') {
    $recrimp_pd_id_no = $_GET['recrimp_pd_id_no'] ?? '';

    if ($recrimp_pd_id_no == 'N/A') {
        echo json_encode(['full_name' => 'N/A']);
        exit;
    }

    if ($recrimp_pd_id_no == '') {
        echo json_encode(['full_name' => 'Invalid ID']);
        exit;
    }

    $query = "SELECT full_name FROM m_employees WHERE emp_no = ?";
    $stmt = $conn_emp_mgt_db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute([$recrimp_pd_id_no]);

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        echo json_encode(['full_name' => $row['full_name']]);
    } else {
        echo json_encode(['full_name' => 'Not Found']);
    }
    exit;
}

if ($method == 'get_recrimp_qa_name') {
    $recrimp_qa_id_no = $_GET['recrimp_qa_id_no'] ?? '';

    if ($recrimp_qa_id_no == 'N/A') {
        echo json_encode(['full_name' => 'N/A']);
        exit;
    }

    if ($recrimp_qa_id_no == '') {
        echo json_encode(['full_name' => 'Invalid ID']);
        exit;
    }

    $query = "SELECT full_name FROM m_employees WHERE emp_no = ?";
    $stmt = $conn_emp_mgt_db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute([$recrimp_qa_id_no]);

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        echo json_encode(['full_name' => $row['full_name']]);
    } else {
        echo json_encode(['full_name' => 'Not Found']);
    }
    exit;
}

if ($method == 'get_reassy_name') {
    $reassy_id_no = $_GET['reassy_id_no'] ?? '';

    if ($reassy_id_no == 'N/A') {
        echo json_encode(['full_name' => 'N/A']);
        exit;
    }

    if ($reassy_id_no == '') {
        echo json_encode(['full_name' => 'Invalid ID']);
        exit;
    }

    $query = "SELECT full_name FROM m_employees WHERE emp_no = ?";
    $stmt = $conn_emp_mgt_db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute([$reassy_id_no]);

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        echo json_encode(['full_name' => $row['full_name']]);
    } else {
        echo json_encode(['full_name' => 'Not Found']);
    }
    exit;
}

if ($method == 'get_reassy_name_update') {
    $reassy_id_no = $_GET['reassy_id_no'] ?? '';

    if ($reassy_id_no == 'N/A') {
        echo json_encode(['full_name' => 'N/A']);
        exit;
    }

    if ($reassy_id_no == '') {
        echo json_encode(['full_name' => 'Invalid ID']);
        exit;
    }

    $query = "SELECT full_name FROM m_employees WHERE emp_no = ?";
    $stmt = $conn_emp_mgt_db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute([$reassy_id_no]);

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