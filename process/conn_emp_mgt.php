<?php
date_default_timezone_set('Asia/Manila');

$servername = '172.25.116.188';
$username = 'SA';
$password = 'SystemGroup@2022';

date_default_timezone_set('Asia/Manila');
$server_date_time = date('Y-m-d H:i:s');
$server_date_only = date('Y-m-d');
$server_date_month = date('M');
$server_date_day = date('d');
$server_date_month_time = date('Y-m-01 H:i:s');
$server_time = date('H:i:s');

try {
    // Connection to the emp_mgt_db database
    $conn_emp_mgt_db = new PDO("sqlsrv:Server=$servername;Database=emp_mgt_db", $username, $password);
    $conn_emp_mgt_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'NO CONNECTION to emp_mgt_db: ' . $e->getMessage();
}

?>