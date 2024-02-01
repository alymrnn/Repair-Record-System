<aside class="main-sidebar sidebar-light-primary elevation-2" style="background: #F6F6F6;">
  <!-- Brand Logo -->
  <a href="defect_monitoring_record.php" class="brand-link">
    <img src="../../dist/img/tool-box.png" alt="Logo" class="brand-image" style="opacity: .8;">
    <span class="brand-text" style="font-size:17px;color:black">Repair Record System</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="../../dist/img/user2.png" class="img-circle" alt="User Image">
      </div>
      <div class="info">
        <a href="defect_monitoring_record.php" class="d-block" style="font-size:16px; color:black"><?= htmlspecialchars($_SESSION['full_name']); ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="defect_monitoring_record.php" class="nav-link active">
            <img src="../../dist/img/files.png" style="height:25px;">
            <p class="pl-1" style="font-size:16px; color:black">
              Defect Record Monitoring
            </p>
          </a>
        </li>
        <!-- <li class="nav-item">
          <a href="history.php" class="nav-link">
            <img src="../../dist/img/file.png" style="height:25px;">
            <p class="pl-1" style="font-size:16px; color:black">
              History
            </p>
          </a>
        </li> -->
        <!-- <li class="nav-item">
          <a href="qr_scanned.php" class="nav-link">
            <img src="../../dist/img/qr-code.png" style="height:25px;">
            <p class="pl-1" style="font-size:16px; color:black">
              List of QR-Code Scanned
            </p>
          </a>
        </li> -->
        <li class="nav-item">
          <a href="acct_management.php" class="nav-link">
            <img src="../../dist/img/account-accepted.png" style="height:25px;">
            <p class="pl-1" style="font-size:16px; color:black">
              Account Management
            </p>
          </a>
        </li>
        <?php include 'logout.php'; ?>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>