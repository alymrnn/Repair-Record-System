<?php
include('plugins/header.php');
include('plugins/preloader.php');
include('plugins/navbar/index_navbar.php');
?>

<div class="content-wrapper" style="background: #FFF;">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Home Page</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="">Repair Record System</a></li>
            <li class="breadcrumb-item active">Home Page</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="col-md-12 m-0 p-0">
      <div class="card" style="border-top: 2px solid #E89F4C;">
        <div class="card-header">
          <h3 class="card-title"><img src="../../dist/img/view.png" style="height:28px;">&ensp;Viewer Table</h3>
          <!-- <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                </div> -->
        </div>
        <!-- /.card-header -->
        <div class="row">
          <div class="col-sm-12">
            <div class="card card-light card-tabs" style="background: #fcfcfc;">
              <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="record-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="defect_record_mancost_tab" data-toggle="pill"
                      href="#defect_record_mancost" role="tab" aria-controls="defect_record_mancost"
                      aria-selected="true">Defect and Mancost Record</a>
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
                    <div class="row mt-2">
                      <div class="col-sm-3">
                        <!-- discovery process -->
                        <label style="font-weight:normal;margin:0;padding:0;color:#000;">Discovery Process</label>
                        <select name="search_v_discovery_process" id="search_v_discovery_process" autocomplete="off"
                          style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;"
                          class="pl-1" required>
                          <option>Discovery Process</option>
                          <option></option>
                        </select>
                      </div>
                      <div class="col-sm-3">
                        <!-- occurrence process -->
                        <label style="font-weight:normal;margin:0;padding:0;color:#000;">Occurrence Process</label>
                        <select name="search_v_occurrence_process" id="search_v_occurrence_process" autocomplete="off"
                          style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;"
                          class="pl-1" required>
                          <option>Occurrence Process</option>
                          <option></option>
                        </select>
                      </div>
                      <div class="col-sm-3">
                        <!-- outflow process -->
                        <label style="font-weight:normal;margin:0;padding:0;color:#000;">Outflow Process</label>
                        <select name="search_v_outflow_process" id="search_v_outflow_process" autocomplete="off"
                          style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;"
                          class="pl-1" required>
                          <option>Outflow Process</option>
                          <option></option>
                        </select>
                      </div>
                      <div class="col-sm-3">
                        <!-- defect category NG content -->
                        <label style="font-weight:normal;margin:0;padding:0;color:#000;">Defect Category</label>
                        <select name="search_v_defect_category" id="search_v_defect_category" autocomplete="off"
                          style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;"
                          class="pl-1" required>
                          <option>Defect Category</option>
                          <option></option>
                        </select>
                      </div>
                    </div>

                    <div class="row mt-2">
                      <div class="col-sm-2">
                        <!-- defect category NG content -->
                        <label style="font-weight:normal;margin:0;padding:0;color:#000;">Car Maker</label>
                        <select name="search_v_car_maker" id="search_v_car_maker" autocomplete="off"
                          style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;"
                          class="pl-1" required>
                          <option>Car Maker</option>
                          <option></option>
                        </select>
                      </div>
                      <div class="col-sm-2">
                        <!-- line no -->
                        <label style="font-weight:normal;margin:0;padding:0;color:#000;">Line No.</label>
                        <input type="text" id="search_v_line_no" class="form-control" placeholder="Line No."
                          autocomplete="off"
                          style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;"
                          class="pl-3">
                      </div>
                      <div class="col-sm-3">
                        <!-- defect category NG content -->
                        <label style="font-weight:normal;margin:0;padding:0;color:#000;">Product Name</label>
                        <input type="text" id="search_v_product_name" class="form-control" placeholder="Product Name"
                          autocomplete="off"
                          style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;"
                          class="pl-3">
                      </div>
                      <div class="col-sm-3">
                        <!-- discovery process -->
                        <label style="font-weight:normal;margin:0;padding:0;color:#000;">Lot No.</label>
                        <input type="text" id="search_v_lot_no" class="form-control" placeholder="Lot No."
                          autocomplete="off"
                          style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;"
                          class="pl-3">
                      </div>
                      <div class="col-sm-2">
                        <!-- occurrence process -->
                        <label style="font-weight:normal;margin:0;padding:0;color:#000;">Serial No.</label>
                        <input type="text" id="search_v_serial_no" class="form-control" placeholder="Serial No."
                          autocomplete="off"
                          style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;"
                          class="pl-3">
                      </div>
                    </div>
                    <br>
                    <div class="row mt-2">
                      <div class="col-sm-2">
                        <!-- record type -->
                        <select name="search_v_record_type" id="search_v_record_type" autocomplete="off"
                          style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;"
                          class="pl-1" required>
                          <option>Record Type</option>
                          <option></option>
                        </select>
                      </div>
                      <div class="col-sm-4">
                        <!-- search keyword -->
                        <input type="text" id="v_defect_keyword" class="form-control" placeholder="Enter Keyword"
                          autocomplete="off"
                          style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;"
                          class="pl-3">
                      </div>
                      <div class="col-sm-2">
                        <!-- date from -->
                        <input name="date_from" class="form-control" id="date_from_search_v_defect"
                          placeholder="Date From" onfocus="(this.type='date')" onblur="(this.type='text')"
                          style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px;">
                      </div>
                      <div class="col-sm-2">
                        <!-- date to -->
                        <input type="text" name="date_to" class="form-control" id="date_to_search_v_defect"
                          placeholder="Date To" onfocus="(this.type='date')" onblur="(this.type='text')"
                          style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px;">
                      </div>
                      <div class="col-sm-1">
                        <!-- search button -->
                        <button class="btn btn-block d-flex justify-content-left" id="search_btn"
                          onclick="viewer_defect_search_keyword()"
                          style="color:#fff;height:34px;border-radius:.25rem;background: #425B2C;font-size:15px;font-weight:normal;"><img
                            src="../../dist/img/search.png" style="height:19px;">&nbsp;&nbsp;Search</button>
                      </div>
                      <div class="col-sm-1">
                        <!-- export button -->
                        <button class="btn btn-block d-flex justify-content-left" id="export_record_viewer" onclick="export_record_viewer()"
                          style="color:#fff;height:34px;border-radius:.25rem;background: #334C69;font-size:15px;font-weight:normal;"><img
                            src="../../dist/img/export.png" style="height:19px;">&nbsp;&nbsp;Export</button>
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
                    <div class="row" id="t_viewer_defect_breadcrumb">
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
                          <li class="breadcrumb-item"><a href="#" onclick="load_viewer_defect_table()">Return</a></li>
                          <li class="breadcrumb-item active" id="viewer_defect_id"></li>
                        </ol>
                      </div>
                    </div>
                    <!-- /.end -->
                    <div class="table-responsive m-0 p-0"
                      style="max-height: 500px;overflow: auto; display:inline-block;">
                      <table class="table col-12 table-head-fixed text-nowrap table-hover" id="viewer_defect_table"
                        style="background: #F9F9F9;"></table>
                    </div>
                  </div>
                  <!-- /.first tab end -->

                  <div class="tab-pane fade" id="mancost_monitoring" role="tabpanel"
                    aria-labelledby="mancost_monitoring_tab">
                    <!-- main content -->
                    <div class="row mb-4 mt-2">
                      <div class="col-sm-3">
                        <!-- search keyword -->
                        <input type="text" id="v_mancost_keyword" class="form-control" placeholder="Enter Keyword"
                          autocomplete="off"
                          style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;"
                          class="pl-3">
                      </div>
                      <div class="col-sm-3">
                        <!-- date from -->
                        <input type="text" name="date_from" class="form-control" id="date_from_search_v_mancost"
                          placeholder="Date From" onfocus="(this.type='date')" onblur="(this.type='text')"
                          style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px;">
                      </div>
                      <div class="col-sm-3">
                        <!-- date to -->
                        <input type="text" name="date_to" class="form-control" id="date_to_search_v_mancost"
                          placeholder="Date To" onfocus="(this.type='date')" onblur="(this.type='text')"
                          style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px;">
                      </div>
                      <div class="col-sm-3">
                        <!-- search button -->
                        <button class="btn btn-block d-flex justify-content-left" id="search_btn"
                          onclick="viewer_mancost_search_keyword()"
                          style="color:#fff;height:34px;border-radius:.25rem;background: #425B2C;font-size:15px;font-weight:normal;"><img
                            src="../../dist/img/search.png" style="height:19px;">&nbsp;&nbsp;Search</button>
                      </div>
                    </div>
                    <!-- /.row end -->

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
                          <th>Unit Cost ( ¥ )</th>
                          <th>Material Cost ( ¥ )</th>
                          <th>Manhour Cost ( ¥ )</th>
                          <th>Repaired Portion Treatment</th>
                          <th>QC Verification</th>
                          <th>Checking Date</th>
                          <th>Verified By</th>
                          <th>Remarks</th>
                        </thead>
                        <tbody class="mb-0" id="list_of_mancost_record_viewer">
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
                  <button type="button" id="btnPrevPage" class="btn bg-gray-dark btn-flat" style="border-radius:.25rem; width:100%;" onclick="get_prev_page()">Prev</button>
                </div>
                <div class="col-sm-12 col-md-1 col-2">
                  <input type="text" list="defect_table_paginations" class="form-control" style="border-radius:.25rem; width:100%" id="defect_table_pagination">
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

<?php
include('plugins/footer.php');
include('plugins/js/index_script.php');
?>