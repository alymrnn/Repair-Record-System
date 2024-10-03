<footer class="main-footer" style="background:#f8f9fa; color:#000; font-size: 14px;">
    Copyright &copy; 2023. Aly Maranan. All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        Version 1.0.4
    </div>
</footer>

<?php
//MODALS
include '../../modals/logout_modal.php';
include '../../modals/add_account.php';
include '../../modals/update_account.php';
include '../../modals/add_car_settings.php';
include '../../modals/update_car_settings.php';

include '../../modals/add_line_no.php';
include '../../modals/add_defect_category_d.php';
include '../../modals/add_defect_category_m.php';
include '../../modals/add_discovery_process.php';
include '../../modals/add_occurrence_process_d.php';
include '../../modals/add_occurrence_process_m.php';
include '../../modals/add_outflow_process.php';
include '../../modals/add_repair_person.php';
?>

<!-- jQuery -->
<script src="../../plugins/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- SweetAlert2 -->
<script type="text/javascript" src="../../plugins/sweetalert2/dist/sweetalert2.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.js"></script>

</body>

</html>