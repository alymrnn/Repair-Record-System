<?php require 'process/login.php';

if (isset($_SESSION['emp_no'])) {
    if ($_SESSION['role'] == 'QC') {
        header('location: page/qc/defect_monitoring_record.php');
        exit;
    } elseif ($_SESSION['role'] == 'PD') {
        header('location: page/pd/defect_monitoring_record_rp.php');
        exit;
    } elseif ($_SESSION['role'] == 'IT') {
        header('location: page/it/barcode_m.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Repair Record System</title>

    <link rel="icon" href="dist/img/tool-box.png" type="image/x-icon" />
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="dist/css/font.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Sweet Alert -->
    <link rel="stylesheet" href="plugins/sweetalert2/dist/sweetalert2.min.css">
</head>

<style type="text/css">
    .login-page {
        width: 100%;
        background-image: url('dist/img/splat-bg.svg');
        background-size: cover;
    }

    @font-face {
        font-family: 'Poppins';
        src: url('dist/font/poppins/Poppins-Regular.ttf') format('truetype');
    }

    body {
        font-family: 'Poppins', sans-serif;
    }

    @media (max-width: 576px) {
        .card {
            width: 90%;
            margin: 10px;
        }

        .login-card-body {
            padding: 20px;
        }

        .login-logo img {
            height: 100px;
        }

        .login-logo h2 {
            font-size: 20px;
        }

        .login-box-msg {
            font-size: 14px;
        }
    }
</style>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="container d-flex justify-content-center align-items-center min-vh-100">
            <div class="card shadow-sm" style="border-radius: 10px;background: #F4F4F4; max-width: 100%; width: 400px;">
                <div class="card-body login-card-body" style="border-radius: 10px; background:#eaeaea">
                    <div class="login-logo mt-3 text-center">
                        <img class="pb-1" src="dist/img/tool-box.png" style="height: 120px;" alt="Tool Box">
                        <h2 class="pb-2 text-bold" style="color: #313131; font-size: 25px;">REPAIR RECORD<br>SYSTEM
                        </h2>
                    </div>

                    <form class="px-3" method="POST" id="login_form">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="emp_no" name="emp_no" placeholder="Employee ID"
                                autocomplete="off" required
                                style="font-size: 14px; border-radius: 3px; border: 1px solid #888888; background: #eaeaea;"
                                onfocus="changeBorderColor(this, '#C97719')"
                                oninput="changeBorderColor(this, '#C97719')"
                                onblur="changeBorderColor(this, '#888888')">
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Password" autocomplete="off" required
                                style="font-size: 14px; border-radius: 3px; border: 1px solid #888888; background: #eaeaea;"
                                onfocus="changeBorderColor(this, '#C97719')"
                                oninput="changeBorderColor(this, '#C97719')"
                                onblur="changeBorderColor(this, '#888888')">
                            <!-- <i class="pt-1" style="font-size: 13px;">Scan QR Code or Type your ID Number</i> -->
                        </div>
                        <div class="input-group mb-3">
                            <button type="submit" class="login-btn btn btn-block" name="login_btn" value="login"
                                style="border-radius: 20px; background: #E89F4C; color: #000;"
                                onmouseover="this.style.backgroundColor='#EA922E'; this.style.color='#000';"
                                onmouseout="this.style.backgroundColor='#E89F4C'; this.style.color='#000';">LOGIN
                            </button>
                        </div>
                        <div class="d-flex justify-content-center">
                            <a href="#"><button type="button" class="btn btn-block btn-sm"
                                    style="border-radius: 3px; background: #3E3E3E; width: 190px; color: #FFF;"
                                    onmouseover="this.style.backgroundColor='#242424'; this.style.color='#FFF';"
                                    onmouseout="this.style.backgroundColor='#3E3E3E'; this.style.color='#FFF';">Work
                                    Instruction</button></a>
                        </div>
                        <a href="page/viewer/" class="nav-link mt-2 d-flex justify-content-center"
                            style="font-size: 15px;">Viewer Page</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    function changeBorderColor(element, color) {
        element.style.borderColor = color;
    }
</script>

<!-- jQuery -->
<script src="plugins/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

</html>