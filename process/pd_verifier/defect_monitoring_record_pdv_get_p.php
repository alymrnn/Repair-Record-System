<?php
include '../conn.php';
include '../conn_emp_mgt.php';

$method = $_GET['method'];

if ($method == 'get_pdv_person') {
    $pdv_id_no = $_GET['pdv_id_no'] ?? '';

    if ($pdv_id_no == 'N/A') {
        echo json_encode(['full_name' => 'N/A']);
        exit;
    }

    if ($pdv_id_no == '') {
        echo json_encode(['full_name' => 'Invalid ID']);
        exit;
    }

    $query = "SELECT full_name FROM m_employees WHERE emp_no = ?";
    $stmt = $conn_emp_mgt_db->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute([$pdv_id_no]);

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