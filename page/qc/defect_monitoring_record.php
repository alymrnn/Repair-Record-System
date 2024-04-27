<?php include 'plugins/navbar.php'; ?>
<?php include 'plugins/sidebar/defect_monitoring_record_bar.php'; ?>

<div class="content-wrapper" style="background: #FFF;">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Defect Record and Mancost Monitoring</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="defect_monitoring_record.php">Repair Record System</a></li>
            <li class="breadcrumb-item active">Defect Record and Mancost Monitoring</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="col-md-12">
      <div class="card card-light" style="background: #eaeaea; border-top: 2px solid #2D7AC0;">
        <div class="card-header">
          <h3 class="card-title"><img src="../../dist/img/settings.png" style="height:28px;">&ensp;Records Monitoring
            Table</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="maximize"><i
                class="fas fa-expand"></i></button>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-12">
            <div class="card card-light card-tabs" style="background: #fcfcfc">
              <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="record-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="defect_record_mancost_tab" data-toggle="pill"
                      href="#defect_record_mancost" role="tab" aria-controls="defect_record_mancost"
                      aria-selected="true">Defect Record and Mancost Monitoring</a>
                  </li>
                  <!-- <li>
                    <a class="nav-link" id="mancost_monitoring_tab" data-toggle="pill" href="#mancost_monitoring"
                      role="tab" aria-controls="mancost_monitoring" aria-selected="false">Mancost Monitoring Only</a>
                  </li> -->
                </ul>
              </div>
              <!-- /.card header -->
              <div class="card-body">
                <div class="tab-content" id="record-tabContent">
                  <!-- first tab -->
                  <div class="tab-pane fade show active" id="defect_record_mancost" role="tabpanel"
                    aria-labelledby="defect_record_mancost_tab">
                    <!-- main content -->

                    <!-- TEMPORARILY IN DOCU NAMED SEARCH FIELD IN ADMIN DEFECT N MANCOST -->
                    <div class="row mt-2">
                      <div class="col-sm-2">
                        <!-- record type -->
                        <label style="font-weight:normal;margin:0;padding:0;color:#000;">Record Type</label>
                        <select name="search_ad_record_type" id="search_ad_record_type" autocomplete="off"
                          style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;"
                          class="pl-1" required>
                          <option></option>
                        </select>
                      </div>
                      <div class="col-sm-3">
                        <!-- defect category NG content -->
                        <label style="font-weight:normal;margin:0;padding:0;color:#000;">Product Name</label>
                        <input type="text" id="search_ad_product_name" class="form-control" placeholder="Product Name"
                          autocomplete="off"
                          style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;"
                          class="pl-3">
                      </div>
                      <div class="col-sm-2">
                        <!-- discovery process -->
                        <label style="font-weight:normal;margin:0;padding:0;color:#000;">Lot No.</label>
                        <input type="text" id="search_ad_lot_no" class="form-control" placeholder="Lot No."
                          autocomplete="off"
                          style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;"
                          class="pl-3">
                      </div>
                      <div class="col-sm-2">
                        <!-- occurrence process -->
                        <label style="font-weight:normal;margin:0;padding:0;color:#000;">Serial No.</label>
                        <input type="text" id="search_ad_serial_no" class="form-control" placeholder="Serial No."
                          autocomplete="off"
                          style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;"
                          class="pl-3">
                      </div>
                      <div class="col-sm-3">
                        <!-- search button -->
                        <label></label>
                        <button class="btn btn-block d-flex justify-content-left" id="search_btn" onclick="search_qc()"
                          style="color:#fff;height:34px;border-radius:.25rem;background: #226F54;font-size:15px;font-weight:normal;"><img
                            src="../../dist/img/search.png" style="height:19px;">&nbsp;&nbsp;Search</button>
                      </div>
                    </div>
                    <br>


                    <!-- <div class="row">
                      <div class="col mt-4" style="color: #425B2C; font-weight:bold;">
                        table switching navigation
                        Defect Record
                      </div>
                      <div class="col-sm-3">
                        view total count of data from table
                        <span id="count_view"></span>
                      </div>
                    </div> -->

                    <!-- table -->
                    <div class="row" id="t_admin_defect_breadcrumb">
                      <!-- <div class="col-md-2 col-12 mb-1">
                        <input list="status_list" name="defect_status" id="status_search_qc" autocomplete="off"
                          placeholder="Select Status"
                          style="padding-left:10px; color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;">
                        <datalist id="status_list">
                          <option selected value="">ALL</option>
                          <option value="ALL"></option>
                          <option value="GOOD"></option>
                          <option value="NO GOOD"></option>
                          <option value="N/A"></option>
                          <option value="PENDING"></option>
                        </datalist>
                      </div> -->
                      <!-- <div class="col-md-1 col-12 mb-1">
                        <button class="btn btn-block d-flex justify-content-center" id="search_btn"
                          onclick="search_defect_qc()"
                          style="color:#000;height:34px;border-radius:.25rem;background: #ffb000;font-size:15px;font-weight:normal;">Search</button>
                      </div> -->
                      <div class="col-12">
                        <!-- table legend -->
                        <div id="accordion_qc_legend">
                          <div class="card bg-light">
                            <div class="card-header">
                              <h4 class="card-title w-100">
                                <a class="d-block w-100 text-black" data-toggle="collapse" href="#collapseDefectLegend">
                                  Defect Record and Mancost Monitoring Legend
                                </a>
                              </h4>
                            </div>
                            <div id="collapseDefectLegend" class="collapse show" data-parent="#accordion_qc_legend">
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-sm-4 col-lg-4 p-1 bg-danger">
                                    <center>No Good</center>
                                  </div>
                                  <div class="col-sm-4 col-lg-4 p-1 bg-success">
                                    <center>Good</center>
                                  </div>
                                  <div class="col-sm-4 col-lg-4 p-1 bg-secondary">
                                    <center>Not Applicable</center>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <ol class="breadcrumb m-0 p-0">
                          <li class="breadcrumb-item"><a href="#" onclick="load_admin_defect_table()">Return</a></li>
                          <li class="breadcrumb-item active" id="admin_defect_id"></li>
                        </ol>
                      </div>
                    </div>
                    <!-- /.end -->
                    <div class="table-responsive m-0 p-0"
                      style="max-height: 500px;overflow: auto; display:inline-block;">
                      <table class="table col-12 table-head-fixed text-nowrap table-hover" id="admin_defect_table"
                        style="background: #F9F9F9;"></table>
                    </div>
                  </div>
                  <!-- /.first tab end -->

                  <div class="tab-pane fade" id="mancost_monitoring" role="tabpanel"
                    aria-labelledby="mancost_monitoring_tab">
                    <!-- main content -->
                    <div class="row mb-4 mt-2">
                      <div class="col-sm-1">
                        <!-- line no -->
                        <label style="font-weight:normal;margin:0;padding:0;color:#000;">Line No.</label>
                        <input type="text" id="search_ad_line_no_mc" class="form-control" placeholder="Line No."
                          autocomplete="off"
                          style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;"
                          class="pl-3">
                      </div>
                      <div class="col-sm-3">
                        <!-- defect category input -->
                        <label style="font-weight:normal;margin:0;padding:0;color:#000;">Defect Category</label>
                        <select name="search_ad_defect_category_mc" id="search_ad_defect_category_mc" autocomplete="off"
                          style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;"
                          class="pl-1" required>
                          <option>Defect Category</option>
                          <option></option>
                        </select>
                      </div>
                      <div class="col-sm-3">
                        <!-- occurrence process input -->
                        <label style="font-weight:normal;margin:0;padding:0;color:#000;">Occurrence Process</label>
                        <select name="search_ad_occurrence_process_mc" id="search_ad_occurrence_process_mc"
                          autocomplete="off"
                          style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;"
                          class="pl-1" required>
                          <option>Occurrence Process</option>
                          <option></option>
                        </select>
                      </div>
                      <div class="col-sm-2">
                        <!-- parts removed input -->
                        <label style="font-weight:normal;margin:0;padding:0;color:#000;">Parts Removed</label>
                        <input type="text" id="search_ad_parts_removed_mc" class="form-control"
                          placeholder="Parts Removed" autocomplete="off"
                          style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;"
                          class="pl-3">
                      </div>
                      <div class="col-sm-3">
                        <!-- repaired portion treatment input -->
                        <label style="font-weight:normal;margin:0;padding:0;color:#000;">Repair Portion
                          Treatment</label>
                        <select name="search_ad_portion_treatment_mc" id="search_ad_portion_treatment_mc"
                          autocomplete="off"
                          style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;"
                          class="pl-1" required>
                          <option>Repaired Portion Treatment</option>
                          <option></option>
                        </select>
                      </div>
                    </div>
                    <!-- /.row end -->
                    <div class="row">
                      <div class="col-sm-3">
                        <!-- date from -->
                        <label style="font-weight:normal;margin:0;padding:0;color:#000;">Date From</label>
                        <input type="date" name="search_ad_date_from_mc" class="form-control"
                          id="search_ad_date_from_mc"
                          style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px;">
                      </div>
                      <div class="col-sm-3">
                        <!-- date to -->
                        <label style="font-weight:normal;margin:0;padding:0;color:#000;">Date To</label>
                        <input type="date" name="search_ad_date_to_mc" class="form-control" id="search_ad_date_to_mc"
                          style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px;">
                      </div>
                      <div class="col-sm-3">
                        <!-- search button -->
                        <label></label>
                        <button class="btn btn-block d-flex justify-content-left" id="search_btn"
                          onclick="search_admin_mancost_only()"
                          style="color:#fff;height:34px;border-radius:.25rem;background: #226F54;font-size:15px;font-weight:normal;"><img
                            src="../../dist/img/search.png" style="height:19px;">&nbsp;&nbsp;Search</button>
                      </div>
                      <div class="col-sm-3">
                        <!-- export button -->
                        <label></label>
                        <button class="btn btn-block d-flex justify-content-left" id="search_btn" onclick=""
                          style="color:#fff;height:34px;border-radius:.25rem;background: #334C69;font-size:15px;font-weight:normal;"><img
                            src="../../dist/img/export.png" style="height:19px;">&nbsp;&nbsp;Export</button>
                      </div>
                    </div>

                    <!-- <div class="row">
                      <div class="col pb-3" style="color: #425B2C; font-weight:bold;">
                        table switching navigation
                        Manpower and Material Cost Monitoring
                      </div>
                      <div class="col-sm-3">
                        view total count of data from table
                        <span id="count_view"></span>
                      </div>
                    </div> -->
                    <br>

                    <div class="row table-responsive m-0 p-0"
                      style="max-height: 500px;overflow: auto; display:inline-block;">
                      <table class="table col-12 table-head-fixed text-nowrap table-hover" id=""
                        style="background: #F9F9F9;">
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
                          <th>Re-checking</th>
                          <th>QC Verification</th>
                          <th>Checking Date Sign</th>
                          <th>Record Added By</th>
                        </thead>
                        <tbody class="mb-0" id="list_of_admin_mancost_record">
                          <tr>
                            <td colspan="12" style="text-align: center;">
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
                  <!-- /.second tab end -->
                </div>
              </div>
              <!-- /.card body end -->
            </div>
          </div>
        </div>


        <!-- pagination -->
        <!-- <div class="row mr-2 mb-4">
                <div class="col-sm-12 col-md-9 col-6">
                  <div class="dataTables_info pl-4" id="defect_table_info" role="status" aria-live="polite"></div>
                  <input type="hidden" id="count_rows">
                </div>
                <div class="col-sm-12 col-md-1 col-2">
                  <button type="button" id="btnPrevPage" class="btn bg-gray-dark btn-flat" style="border-radius:.25rem; width:100%" onclick="get_prev_page()">Prev</button>
                </div>
                <div class="col-sm-12 col-md-1 col-2">
                  <input type="text" list="defect_table_paginations" class="form-control" style="border-radius:.25rem; width:100%" id="defect_table_pagination">
                  <datalist id="defect_table_paginations"></datalist>
                </div>
                <div class="col-sm-12 col-md-1 col-2">
                  <button type="button" id="btnNextPage" class="btn bg-gray-dark btn-flat mr-3" style="border-radius:.25rem; width:100%" onclick="get_next_page()">Next</button>
                </div>
              </div>
            </div>   -->
      </div>
  </section>

  <!-- return to top button -->
  <!-- <button id="back-to-top" type="button" class="return-to-top"><i class="nav-icon-top nav-icon fas fa-caret-square-up"></i></button> -->

</div>

<?php include 'plugins/footer.php'; ?>
<?php include 'plugins/js/defect_monitoring_record_script.php'; ?>