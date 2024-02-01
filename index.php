<?php require 'process/login.php';

if (isset($_SESSION['emp_no'])) {
    if ($_SESSION['role'] == 'admin') {
        header('location: page/admin/defect_monitoring_record.php');
        exit;
    } elseif ($_SESSION['role'] == 'user') {
        header('location: page/user/defect_monitoring_record_rp.php');
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
</head>

<style type="text/css">
    .login-page {
        width: 100%;
        background-image: url('dist/img/splat-bg.svg');
        background-size: cover;
    }
</style>

<body class="hold-transition login-page"> 
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card" style="border-radius: 5px;border: 2px solid #000;background: #F4F4F4;box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25); height:530px; width:400px">
            <div class="card-body login-card-body" style="border-radius: 5px; background:#eaeaea">
                <div class="login-logo mt-3">
                    <img class="pb-1" src="dist/img/tool-box.png" style="height:130px;">
                    <h2 class="pb-2" style="color: #000;font-size: 27px;font-style: normal;font-weight: 600;line-height: normal;">Repair Record System</h2>
                </div>
                <p class="login-box-msg px-4 pb-3" style="padding:0 0 0 0;text-align:left;color: #000;font-size: 16px;font-style: normal;font-weight: 400;line-height: normal;">Login to start your session</p>

                <form class="px-3" method="POST" id="login_form">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="emp_no" name="emp_no" placeholder="Employee ID" autocomplete="off" style="border-radius: 5px;border: 2px solid #000;background: #eaeaea;" required>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" autocomplete="off" style="border-radius: 5px;border: 2px solid #000;background: #eaeaea;" required>
                    </div>
                    <!-- /.col -->
                    <div class="input-group mb-3">
                        <button type="submit" class="login-btn btn btn-block" name="login_btn" value="login" style="border-radius: 5px;background: #E89F4C;color: #000;box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);">Login</button>
                    </div>
                    <!-- /.col -->

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-block btn-sm" name="login_btn" value="login" style="border-radius: 5px;background: #3E3E3E;width:190px;color: #FFF;">Work Instruction</button>
                    </div>

                    <a href="page/viewer/" class="pt-4 d-flex justify-content-center" style="color: #0069B0;text-decoration-line: underline;font-size: 14px;">Return to Home Page</a>
            </div>

            </form>

        </div>
    </div>
    </div>
</body>







<!-- jQuery -->
<script src="plugins/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

</html>