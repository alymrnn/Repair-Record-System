<?php include 'plugins/navbar.php'; ?>
<?php include 'plugins/sidebar/mancost_monitoring_only_rp_bar.php'; ?>

<div class="content-wrapper" style="background: #FFF;">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Manpower & Material Cost Monitoring</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="defect_monitoring_record_rp.php">Repair Record System</a></li>
            <li class="breadcrumb-item active">Mancost Monitoring Only</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="col-md-12">
      <div class="card card-light" style="background: #eaeaea; border-top: 2px solid #334C69;"">
        <div class=" card-header">
        <h3 class="card-title"><img src="../../dist/img/settings.png" style="height:28px;">&ensp;Mancost Monitoring Table</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
          <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
        </div>
      </div>
      <!-- /.card header -->
      <div class="card-body">
        <div class="row mb-4">
          <div class="col-sm-2">
            <!-- line no input -->
            <label style="font-weight:normal;margin:0;padding:0;color:#000;">Line No.</label>
            <input type="text" id="line_no_mc_search" class="form-control" placeholder="Line No." autocomplete="off" style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;" class="pl-1">
          </div>
          <div class="col-sm-3">
            <!-- defect category input -->
            <label style="font-weight:normal;margin:0;padding:0;color:#000;">Defect Category</label>
            <select name="search_defect_category_mc2" id="search_defect_category_mc2" autocomplete="off" style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;" class="pl-1" required>
              <option>Defect Category</option>
              <option></option>
            </select>
          </div>
          <div class="col-sm-3">
            <!-- occurrence process keyword input -->
            <label style="font-weight:normal;margin:0;padding:0;color:#000;">Occurrence Process</label>
            <select name="search_occurrence_process_mc2" id="search_occurrence_process_mc2" autocomplete="off" style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;" class="pl-1" required>
              <option>Occurrence Process</option>
              <option></option>
            </select>
          </div>
          <div class="col-sm-2">
            <!-- search button -->
            <label style="font-weight:normal;margin:0;padding:0;color:#eaeaea;font-size:10px">Search</label>
            <button class="btn btn-block d-flex justify-content-left" id="search_btn" onclick="search_mancost2_record()" style="color:#fff;height:34px;border-radius:.25rem;background: #226F54;font-size:15px;font-weight:normal;"><img src="../../dist/img/search.png" style="height:19px;">&nbsp;&nbsp;Search</button>
          </div>
          <div class="col-sm-2">
            <!-- add mancost monitoring only button -->
            <label style="font-weight:normal;margin:0;padding:0;color:#eaeaea;font-size:10px">Mancost Monitoring Only</label>
            <a class="btn btn-block d-flex justify-content-left" data-toggle="modal" data-target="#add_mancost_only" style="color:#fff;height:34px;border-radius:.25rem;background: #334C69;font-size:15px;font-weight:normal;" disabled><img src="../../dist/img/add.png" style="height:19px;">&nbsp;&nbsp;Add Mancost</a>
          </div>
        </div>

        <!-- table -->
        <div class="row table-responsive m-0 p-0" style="max-height: 500px;overflow: auto; display:inline-block;">
          <table class="table col-12 table-head-fixed text-nowrap table-hover" id="" style="background: #F9F9F9;">
            <thead style="text-align: center;">
              <th>#</th>
              <th>Car Maker</th>
              <th>Line No.</th>
              <th>Repairing Date</th>
              <th>Repair Start</th>
              <th>Repair End</th>
              <th>Time Consumed</th>
              <th>Defect Category</th>
              <th>Occurrence Process</th>
              <th>Parts Removed</th>
              <th>Quantity</th>
              <th>Unit Cost</th>
              <th>Material Cost</th>
              <th>Manhour Cost</th>
              <th>Repaired Portion Treatment</th>
              <!-- <th>Re-checking</th>
              <th>QC Verification</th>
              <th>Checking Date Sign</th> -->
            </thead>
            <tbody class="mb-0" id="list_of_mancost_record">
              <tr>
                <td colspan="9" style="text-align: center;">
                  <div class="spinner-border text-dark" role="status">
                    <span class="sr-only">Loading...</span>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- /.end -->
      </div>

      <!-- pagination -->
      <!-- <div class="row mr-2 mb-4">
          <div class="class col-sm-12 col-md-9 col-6">
            <div class="dataTables_info pl-4" id="defect_table_info" role="status" aria-live="polite"></div>
            <input type="hidden" id="count_rows">
          </div>
          <div class="col-sm-12 col-md-1 col-2">
            <button type="button" id="btnPrevPage" class="btn bg-gray-dark btn-flat" style="border-radius:.25rem; width:100%;" onclick="get_prev_page()">Prev</button>
          </div>
          <div class="col-sm-12 col-md-1 col-2">
            <input type="text" list="defect_table_paginations" class="form-control" style="border-radius:.25rem; width:100%;" id="defect_table_pagination">
            <datalist id="defect_table_paginations"></datalist>
          </div>
          <div class="col-sm-12 col-md-1 col-2">
            <button type="button" id="btnNextPage" class="btn bg-gray-dark btn-flat mr-3" style="border-radius:.25rem; width:100%;" onclick="get_next_page()">Next</button>
          </div>                     
        </div> -->
    </div>
</div>



</section>

<!-- return to top button -->
<!-- <button id="back-to-top" type="button" class="return-to-top"><i class="nav-icon-top nav-icon fas fa-caret-square-up"></i></button> -->

</div>

<?php include 'plugins/footer.php'; ?>
<?php include 'plugins/js/mancost_monitoring_only_rp_script.php'; ?>