<aside class="main-sidebar sidebar-light-primary elevation-2" style="background: #F6F6F6;">
  <!-- Brand Logo -->
  <a href="defect_monitoring_record_rp.php" class="brand-link">
    <img src="../../dist/img/tool-box.png" alt="Logo" class="brand-image" style="opacity: .8;">
    <span class="brand-text" style="font-size:15px;color:black">Repair Record System</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="../../dist/img/user.png" class="img-circle" alt="User Image">
      </div>
      <div class="info">
        <a href="defect_monitoring_record_rp.php" class="d-block"
          style="font-size:15px; color:black"><?= htmlspecialchars($_SESSION['full_name']); ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <p class="nav-link">PDV</p>
        </li>
        <li class="nav-item mb-1">
          <a href="defect_monitoring_record_pdv.php" class="nav-link">
            <!-- <img src="../../dist/img/files.png" style="height:25px;"> -->
            <i class="far fa-folder-open" style="color: #000"></i>
            <span id="for_veri_badge" class="badge m-0 p-0" style="color: #F00F00; font-size: 14px;"></span>
            <p style="font-size:14px; color:black">
              For Verification
            </p>
          </a>
        </li>
        <li class="nav-item mb-1">
          <a href="re_assy_re_insert_pdv.php" class="nav-link active">
            <!-- <img src="../../dist/img/files.png" style="height:25px;"> -->
            <i class="far fa-folder-open" style="color: #000"></i>
            <span id="for_reassy_badge" class="badge m-0 p-0" style="color: #F00F00; font-size: 14px;"></span>
            <p style="font-size:14px; color:black">
              For Re-Assy / Re-Insert
            </p>
          </a>
        </li>
        <li class="nav-item mb-1">
          <a href="new_defect_record_pdv.php" class="nav-link">
            <img src="../../dist/img/add-post.png" style="height:25px;">
            <p style="font-size:14px; color:black">
              New Defect Record
            </p>
          </a>
        </li>
        <li class="nav-item mb-1">
          <a href="history_pdv.php" class="nav-link">
            <img src="../../dist/img/history.png" style="height:25px;">
            <p style="font-size:14px; color:black">
              NG History Record
            </p>
          </a>
        </li>
        <li class="nav-item mb-1">
          <a href="acct_management_pdv.php" class="nav-link">
            <img src="../../dist/img/user-sidebar.png" style="height:25px;">
            <p style="font-size:14px; color:black">
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