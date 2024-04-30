<aside class="main-sidebar sidebar-light-primary elevation-2" style="background: #F6F6F6;">
    <!-- Brand Logo -->
    <a href="acct_management_m.php" class="brand-link">
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
                <a href="acct_management_m.php" class="d-block"
                    style="font-size:15px; color:black"><?= htmlspecialchars($_SESSION['full_name']); ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <p class="nav-link">IT</p>
                </li>
                <li class="nav-item">
                    <a href="barcode_m.php" class="nav-link">
                        <img src="../../dist/img/qr-code2.png" style="height:25px;">
                        <p style="font-size:15px; color:black">
                            QR Settings Masterlist
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="acct_management_m.php" class="nav-link active">
                        <img src="../../dist/img/user-sidebar.png" style="height:25px;">
                        <p style="font-size:15px; color:black">
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