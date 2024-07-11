<?php
include 'conn.php';
session_start();

// mysql
// if (isset($_POST['login_btn'])) {
//     $emp_no = $_POST['emp_no'];
//     $password = $_POST['password'];

//     if (empty($emp_no)) {
//         echo '<script>alert("Please enter your Employee ID")</script>';
//     } else if (empty($password)) {
//         echo '<script>alert("Please enter your Password")</script>';
//     } else {
//         $check = "SELECT full_name, department, section, emp_no, role FROM m_accounts WHERE BINARY emp_no = '$emp_no' AND BINARY password = '$password'";
//         $stmt = $conn->prepare($check);
//         $stmt->execute();
//         if ($stmt->rowCount() > 0) {
//             foreach ($stmt->fetchALL() as $row) {
//                 $full_name = $row['full_name'];
//                 $department = $row['department'];
//                 $section = $row['$section'];
//                 $role = $row['role'];
//                 $emp_no = $row['emp_no'];
//                 $_SESSION['emp_no'] = $emp_no;
//                 $_SESSION['full_name'] = $full_name;
//                 $_SESSION['department'] = $department;
//                 $_SESSION['section'] = $section;
//                 $_SESSION['role'] = $role;
//                 if ($role == 'QC') {
//                     header('location: page/qc/defect_monitoring_record.php');
//                 } elseif ($role == 'PD') {
//                     header('location: page/pd/defect_monitoring_record_rp.php');
//                 } elseif ($role == 'IT') {
//                     header('location: page/it/barcode_m.php');
//                 }
//             }
//         } else {
//             echo '<script>alert("Sign In Failed. Maybe an incorrect credential or account not found")</script>';
//         }
//     }
// }

// mssql
if (isset($_POST['login_btn'])) {
    $emp_no = $_POST['emp_no'];
    $password = $_POST['password'];

    if (empty($emp_no)) {
        echo '<script>alert("Please enter your Employee ID")</script>';
    } else if (empty($password)) {
        echo '<script>alert("Please enter your Password")</script>';
    } else {
        $check = "SELECT full_name, department, section, emp_no, role 
                  FROM m_accounts 
                  WHERE emp_no = :emp_no COLLATE SQL_Latin1_General_CP1_CS_AS 
                  AND password = :password COLLATE SQL_Latin1_General_CP1_CS_AS";

        $stmt = $conn->prepare($check, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
        $stmt->bindParam(':emp_no', $emp_no, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            // Fetch user details and set session variables
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $full_name = $row['full_name'];
            $department = $row['department'];
            $section = $row['section'];
            $role = $row['role'];
            $emp_no = $row['emp_no'];

            $_SESSION['emp_no'] = $emp_no;
            $_SESSION['full_name'] = $full_name;
            $_SESSION['department'] = $department;
            $_SESSION['section'] = $section;
            $_SESSION['role'] = $role;

            if ($role == 'QC') {
                header('location: page/qc/defect_monitoring_record.php');
                exit;
            } elseif ($role == 'PD') {
                header('location: page/pd/defect_monitoring_record_rp.php');
                exit;
            } elseif ($role == 'IT') {
                header('location: page/it/barcode_m.php');
                exit;
            } elseif ($role == 'QA') {
                header('location: page/qa/defect_monitoring_record_qa.php');
                exit;
            }
        } else {
            echo '<script>alert("Sign In Failed. Incorrect credentials or account not found.")</script>';
        }
    }
}

if (isset($_POST['Logout'])) {
    session_unset();
    header('location: ../../index.php');
}
?>