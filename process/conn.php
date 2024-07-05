<?php
date_default_timezone_set('Asia/Manila');
$servername = 'localhost';
$username = 'root';
// $username = 'server_113.4';

$password = '';
// $password = 'SystemGroup@2022'; 

date_default_timezone_set('Asia/Manila');
$server_date_time = date('Y-m-d H:i:s');
$server_date_only = date('Y-m-d');
//+1 day $day = date('Y-m-d',(strtotime('+1 day',strtotime($server_date_only))));
$server_date_month = date('M');
$server_date_day = date('d');
$server_date_month_time = date('Y-m-01 H:i:s');
$server_time = date('H:i:s');

try {
    $conn = new PDO ("mysql:host=$servername;dbname=repair_record_system",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // $conn->setAttribute(PDO::ATTR_TIMEOUT, TIMEOUT_SECONDS);
} catch (PDOException $e) {
    echo 'NO CONNECTION' .$e->getMessage();
}

// date_default_timezone_set('Asia/Manila');

// $servername = '172.25.116.188';
// $username = 'SA';
// $password = 'SystemGroup@2022';
// $database = 'repair_record_system';

// date_default_timezone_set('Asia/Manila');
// $server_date_time = date('Y-m-d H:i:s');
// $server_date_only = date('Y-m-d');
// $server_date_month = date('M');
// $server_date_day = date('d');
// $server_date_month_time = date('Y-m-01 H:i:s');
// $server_time = date('H:i:s');

// try {
//     $conn = new PDO("sqlsrv:Server=$servername;Database=$database", $username, $password);
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// } catch (PDOException $e) {
//     echo 'NO CONNECTION: ' . $e->getMessage();
// }

?>