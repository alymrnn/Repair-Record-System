<?php include 'plugins/navbar.php'; ?>
<?php include 'plugins/sidebar/acct_management_pdv_bar.php'; ?>

<div class="content-wrapper" style="background: #FFF;">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Account Management</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="defect_monitoring_record.php">Repair Record System</a></li>
            <li class="breadcrumb-item active">Account Management</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="col-md-12">
      <div class="card card-light">
        <div class="card-header">
          <h3 class="card-title"><img src="../../dist/img/acct-user.png" style="height:28px;">&ensp;Account Management
            Table</h3>
          <div class="card-tools">
            <!-- <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i> -->
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="maximize"><i
                class="fas fa-expand"></i></button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-3">
              <!-- search employee id -->
              <input type="text" name="emp_no_search" id="emp_no_search" class="form-control" placeholder="Employee ID"
                autocomplete="off"
                style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #888;background: #FFF;height:34px; width:100%;"
                class="pl-3">
            </div>
            <div class="col-12 col-sm-3">
              <!-- search full name -->
              <input type="text" name="full_name_search" id="full_name_search" class="form-control"
                placeholder="Full Name" autocomplete="off"
                style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #888;background: #FFF;height:34px; width:100%;"
                class="pl-3">
            </div>
            <div class="col-12 col-sm-3">
              <!-- search button -->
              <button class="btn btn-block d-flex justify-content-left" id="search_btn" onclick="search_account()"
                style="color:#fff;height:34px;border-radius:.25rem;background: #226F54;font-size:15px;font-weight:normal;"
                onmouseover="this.style.backgroundColor='#1B5541'; this.style.color='#FFF';"
                onmouseout="this.style.backgroundColor='#226F54'; this.style.color='#FFF';"><i class="fas fa-search"
                  style="margin-top: 2px;"></i>&nbsp;&nbsp;Search</button>
            </div>
            <div class="col-12 col-sm-3">
              <!-- add account button -->
              <a class="btn btn-block d-flex justify-content-left" data-toggle="modal" data-target="#add_account"
                style="color:#fff;height:34px;border-radius:.25rem;background: #0267c1;font-size:15px;font-weight:normal;"
                onmouseover="this.style.backgroundColor='#024E92'; this.style.color='#FFF';"
                onmouseout="this.style.backgroundColor='#0267c1'; this.style.color='#FFF';"><i
                  class="fas fa-plus-circle" style="margin-top: 2px;"></i>&nbsp;&nbsp;Add Account</a>

            </div>
          </div>

          <div class="row">
            <div class="col-sm-3 mt-2">
              <!-- view total count of data from table -->
              <span id="count_view_accounts"></span>
            </div>
          </div>

          <!-- table -->
          <div id="list_of_accounts_res" class="card-body table-responsive m-0 p-0" style="max-height: 500px;">
            <table class="table col-12 mt-3 table-head-fixed text-nowrap table-hover" id="account_table"
              style="background: #F9F9F9;">
              <thead style="text-align: center;">
                <!-- table switching content -->
                <th>#</th>
                <th>Employee ID</th>
                <th>Full Name</th>
                <th>Department</th>
                <th>Section</th>
                <th>Role</th>
                <!-- <th>Repair Station</th> -->
                <th>Date Updated</th>
              </thead>
              <tbody class="mb-0" id="list_of_accounts">
                <tr>
                  <td colspan="10" style="text-align: center;">
                    <div class="spinner-border text-dark" role="status">
                      <span class="sr-only">Loading...</span>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <br>
          <div class="d-flex justify-content-sm-end">
            <div class="dataTables_info" id="account_table_info" role="status" aria-live="polite"></div>
          </div>
          <div class="d-flex justify-content-sm-center">
            <button type="button" class="btn" style="background: #032b43; color: #fff;" id="btnNextPage"
              onclick="get_next_page()"
              onmouseover="this.style.backgroundColor='#032031'; this.style.color='#FFF';"
              onmouseout="this.style.backgroundColor='#032b43'; this.style.color='#FFF';">Load more</button>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<?php include 'plugins/footer.php'; ?>
<?php include 'plugins/js/acct_management_pdv_script.php'; ?>