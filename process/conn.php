<?php
// MYSQL
// date_default_timezone_set('Asia/Manila');
// $servername = 'localhost';
// $username = 'root';
// // $username = 'server_113.4';

// $password = '';
// // $password = 'SystemGroup@2022'; 

// date_default_timezone_set('Asia/Manila');
// $server_date_time = date('Y-m-d H:i:s');
// $server_date_only = date('Y-m-d');
// //+1 day $day = date('Y-m-d',(strtotime('+1 day',strtotime($server_date_only))));
// $server_date_month = date('M');
// $server_date_day = date('d');
// $server_date_month_time = date('Y-m-01 H:i:s');
// $server_time = date('H:i:s');

// try {
//     $conn = new PDO ("mysql:host=$servername;dbname=repair_record_system",$username,$password);
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     // $conn->setAttribute(PDO::ATTR_TIMEOUT, TIMEOUT_SECONDS);
// } catch (PDOException $e) {
//     echo 'NO CONNECTION' .$e->getMessage();
// }

// MSSQL
// date_default_timezone_set('Asia/Manila');

// $servername = '172.25.114.171\SQLEXPRESS';
// $username = 'SA';
// $password = 'SystemGroup2018';

// date_default_timezone_set('Asia/Manila');
// $server_date_time = date('Y-m-d H:i:s');
// $server_date_only = date('Y-m-d');
// $server_date_month = date('M');
// $server_date_day = date('d');
// $server_date_month_time = date('Y-m-01 H:i:s');
// $server_time = date('H:i:s');

// try {
//     // Connection to the repair record system database
//     $conn = new PDO("sqlsrv:Server=$servername;Database=repair_record_system", $username, $password);
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// } catch (PDOException $e) {
//     echo 'NO CONNECTION to repair_record_system: ' . $e->getMessage();
// }

// LIVE
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
    // Connection to the repair_record_system database
    $conn = new PDO("sqlsrv:Server=$servername;Database=repair_record_system", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'NO CONNECTION to repair_record_system: ' . $e->getMessage();
}

try {
    // Connection to the emp_mgt_db database
    $conn_emp_mgt_db = new PDO("sqlsrv:Server=$servername;Database=emp_mgt_db", $username, $password);
    $conn_emp_mgt_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'NO CONNECTION to emp_mgt_db: ' . $e->getMessage();
}

?>