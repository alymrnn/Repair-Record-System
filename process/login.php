<?php
    session_start();

    include 'conn.php';

    if (isset($_POST['login_btn'])) {
        $emp_no = $_POST['emp_no'];
        $password = $_POST['password'];

        if (empty($emp_no)) {
            echo '<script>alert("Please enter your Employee ID")</script>';
        } else if (empty($password)) {
            echo '<script>alert("Please enter your Password")</script>';
        } else {
            $check = "SELECT full_name, department, section, role FROM m_accounts WHERE BINARY emp_no = '$emp_no' AND BINARY password = '$password'";
            $stmt = $conn->prepare($check);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                foreach($stmt->fetchALL() as $l) {
                    $full_name = $l['full_name'];
                    $department = $l['department'];
                    $section = $l['$section'];
                    $role = $l['role'];
                    $_SESSION['full_name'] = $full_name;
                    $_SESSION['department'] = $department;
                    $_SESSION['section'] = $section;
                    $_SESSION['role'] = $role;
                    if ($role == 'QC') {
                        header('location: page/qc/defect_monitoring_record.php');
                    } elseif ($role == 'PD') {
                        header ('location: page/pd/defect_monitoring_record_rp.php');
                    } elseif ($role == 'IT') {
                        header('location: page/it/barcode_m.php');
                    }
                }
            } else {
                echo '<script>alert("Sign In Failed. Maybe an incorrect credential or account not found")</script>';
            }
        }
    }

    if (isset($_POST['Logout'])) {
        session_unset();
        session_destroy();
        header('location: ../../index.php');
    }
