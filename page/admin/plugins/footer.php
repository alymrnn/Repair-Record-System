<footer class="main-footer" style="background:#313131; color:white;">
  Copyright &copy; 2023. Allyssa Kate Maranan. All rights reserved.
  <div class="float-right d-none d-sm-inline-block">
    Version 1.0.0
  </div>
</footer>
<?php
//MODALS
include '../../modals/logout_modal.php';
include '../../modals/add_account.php';
include '../../modals/update_account.php';
include '../../modals/update_defect_mancost_qc.php';

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