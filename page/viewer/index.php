<?php
include ('plugins/header.php');
include ('plugins/preloader.php');
include ('plugins/navbar/index_navbar.php');
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
    <div class="col-12 col-md-12 m-0 p-0">
      <div class="card" style="border-top: 2px solid #E89F4C;">
        <div class="card-header">
          <h3 class="card-title"><img src="../../dist/img/view.png" style="height:28px;">&ensp;Viewer Table</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="maximize"><i
                class="fas fa-expand"></i></button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="row">
          <div class="col-12 col-sm-12">
            <div class="card-body">
              <!-- main content -->
              <div class="row">
                <div class="col-12 col-sm-6 col-md-2 mb-2">
                  <!-- line no -->
                  <label style="font-weight:normal;margin:0;padding:0;color:#000;">Line No.</label>
                  <input type="text" id="search_v_line_no" class="form-control" placeholder="Line No."
                    autocomplete="off"
                    style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #888888;background: #FFF;height:34px; width:100%;"
                    class="pl-3">
                </div>
                <div class="col-12 col-sm-6 col-md-4 mb-2">
                  <!-- qr scan -->
                  <label style="font-weight:normal;margin:0;padding:0;color:#000;">Scan here</label>
                  <input type="text" id="qr_scan" class="form-control pl-3" autocomplete="off"
                    style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #888888;background: #FFF;height:34px; width:100%;">
                </div>
                <div class="col-12 col-sm-6 col-md-2 mb-2">
                  <!-- product name -->
                  <label style="font-weight:normal;margin:0;padding:0;color:#000;">Product Name</label>
                  <input type="text" id="search_v_product_name" class="form-control" placeholder="Product Name"
                    autocomplete="off"
                    style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #888888;background: #FFF;height:34px; width:100%;"
                    class="pl-3">
                </div>
                <div class="col-12 col-sm-6 col-md-2 mb-2">
                  <!-- lot  no -->
                  <label style="font-weight:normal;margin:0;padding:0;color:#000;">Lot No.</label>
                  <input type="text" id="search_v_lot_no" class="form-control" placeholder="Lot No." autocomplete="off"
                    style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #888888;background: #FFF;height:34px; width:100%;"
                    class="pl-3">
                </div>
                <div class="col-12 col-sm-6 col-md-2 mb-2">
                  <!-- serial no -->
                  <label style="font-weight:normal;margin:0;padding:0;color:#000;">Serial No.</label>
                  <input type="text" id="search_v_serial_no" class="form-control" placeholder="Serial No."
                    autocomplete="off"
                    style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #888888;background: #FFF;height:34px; width:100%;"
                    class="pl-3">
                </div>
              </div>
              <div class="row mt-2">
                <div class="col-12 col-sm-6 col-md-2 mb-2">
                  <!-- car maker -->
                  <label style="font-weight:normal;margin:0;padding:0;color:#000;">Car Maker</label>
                  <select name="search_v_car_maker" id="search_v_car_maker" autocomplete="off"
                    style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #888888;background: #FFF;height:34px; width:100%;"
                    class="pl-1" required>
                    <option>Car Maker</option>
                    <option></option>
                  </select>
                </div>
                <div class="col-12 col-sm-6 col-md-2 mb-2">
                  <!-- discovery process -->
                  <label style="font-weight:normal;margin:0;padding:0;color:#000;">Discovery Process</label>
                  <select name="search_v_discovery_process" id="search_v_discovery_process" autocomplete="off"
                    style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #888888;background: #FFF;height:34px; width:100%;"
                    class="pl-1" required>
                    <option>Discovery Process</option>
                    <option></option>
                  </select>
                </div>
                <div class="col-12 col-sm-6 col-md-2 mb-2">
                  <!-- occurrence process -->
                  <label style="font-weight:normal;margin:0;padding:0;color:#000;">Occurrence Process</label>
                  <select name="search_v_occurrence_process" id="search_v_occurrence_process" autocomplete="off"
                    style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #888888;background: #FFF;height:34px; width:100%;"
                    class="pl-1" required>
                    <option>Occurrence Process</option>
                    <option></option>
                  </select>
                </div>
                <div class="col-12 col-sm-6 col-md-2 mb-2">
                  <!-- outflow process -->
                  <label style="font-weight:normal;margin:0;padding:0;color:#000;">Outflow Process</label>
                  <select name="search_v_outflow_process" id="search_v_outflow_process" autocomplete="off"
                    style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #888888;background: #FFF;height:34px; width:100%;"
                    class="pl-1" required>
                    <option>Outflow Process</option>
                    <option></option>
                  </select>
                </div>
                <div class="col-12 col-sm-6 col-md-2 mb-2">
                  <!-- defect category NG content -->
                  <label style="font-weight:normal;margin:0;padding:0;color:#000;">Defect Category</label>
                  <select name="search_v_defect_category" id="search_v_defect_category" autocomplete="off"
                    style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #888888;background: #FFF;height:34px; width:100%;"
                    class="pl-1" required>
                    <option>Defect Category</option>
                    <option></option>
                  </select>
                </div>
                <div class="col-12 col-sm-6 col-md-2 mb-2">
                  <!-- cause of defect -->
                  <label style="font-weight:normal;margin:0;padding:0;color:#000;">Cause of Defect</label>
                  <select name="search_v_defect_cause" id="search_v_defect_cause" autocomplete="off"
                    style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #888888;background: #FFF;height:34px; width:100%;"
                    class="pl-1" required>
                    <option value="">Select cause of defect</option>
                    <option value="Jig">Jig</option>
                    <option value="Method">Method</option>
                    <option value="N/A">N/A</option>
                  </select>
                </div>
              </div>
              <!-- <br> -->
              <div class="row mt-2 mt-3 mb-1">
                <div class="col-12 col-sm-4 col-md-2 mb-2">
                  <!-- record type -->
                  <select name="search_v_record_type" id="search_v_record_type" autocomplete="off"
                    style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #888888;background: #FFF;height:34px; width:100%;"
                    class="pl-1" required>
                    <option>Record Type</option>
                    <option></option>
                  </select>
                </div>
                <div class="col-12 col-sm-4 col-md-2 mb-2">
                  <!-- date from -->
                  <input name="date_from" class="form-control" id="date_from_search_v_defect" placeholder="Date From"
                    onfocus="(this.type='date')" onblur="(this.type='text')"
                    style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #888888;background: #FFF;height:34px;">
                </div>
                <div class="col-12 col-sm-4 col-md-2 mb-2">
                  <!-- date to -->
                  <input type="text" name="date_to" class="form-control" id="date_to_search_v_defect"
                    placeholder="Date To" onfocus="(this.type='date')" onblur="(this.type='text')"
                    style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #888888;background: #FFF;height:34px;">
                </div>
                <div class="col-12 col-sm-4 col-md-2 mb-2">
                  <!-- search button -->
                  <button class="btn btn-block d-flex justify-content-left" id="search_btn"
                    onclick="load_viewer_defect_table(1)"
                    style="color:#fff;height:34px;border-radius:.25rem;background: #226F54;font-size:15px;font-weight:normal;"
                    onmouseover="this.style.backgroundColor='#1B5541'; this.style.color='#FFF';"
                    onmouseout="this.style.backgroundColor='#226F54'; this.style.color='#FFF';">
                    <i class="fas fa-search" style="margin-top: 2px;"></i>&nbsp;&nbsp;Search</button>
                </div>
                <div class=" col-12 col-sm-4 col-md-2 mb-2">
                  <!-- export button -->
                  <button class="btn btn-block d-flex justify-content-left" id="export_record_viewer"
                    onclick="export_record_viewer()"
                    style="color:#fff;height:34px;border-radius:.25rem;background: #0267c1;font-size:15px;font-weight:normal;"
                    onmouseover="this.style.backgroundColor='#024E92'; this.style.color='#FFF';"
                    onmouseout="this.style.backgroundColor='#0267c1'; this.style.color='#FFF';"><i
                      class="fas fa-download" style="margin-top: 2px;"></i>&nbsp;&nbsp;Export</button>
                </div>
                <div class="col-12 col-sm-4 col-md-1 mb-2">
                  <!-- delete button -->
                  <button class="btn btn-block d-flex justify-content-left" id="search_btn"
                    onclick="clear_search_input()"
                    style="color:#fff;height:34px;border-radius:.25rem;background: #474747;font-size:15px;font-weight:normal;"
                    onmouseover="this.style.backgroundColor='#2D2D2D'; this.style.color='#FFF';"
                    onmouseout="this.style.backgroundColor='#474747'; this.style.color='#FFF';">
                    <i class="fas fa-trash" style="margin-top: 2px;"></i>&nbsp;&nbsp;Clear All</button>
                </div>
                <div class="col-12 col-sm-4 col-md-1 mb-2">
                  <!-- delete button -->
                  <button class="btn btn-block d-flex justify-content-left" id="search_btn"
                    onclick="refresh_page()"
                    style="color:#fff;height:34px;border-radius:.25rem;background: #474747;font-size:15px;font-weight:normal;"
                    onmouseover="this.style.backgroundColor='#2D2D2D'; this.style.color='#FFF';"
                    onmouseout="this.style.backgroundColor='#474747'; this.style.color='#FFF';">
                    <i class="fas fa-sync-alt" style="margin-top: 2px;"></i>&nbsp;&nbsp;Refresh</button>
                </div>
              </div>
              <br>

              <!-- <p class="p-2" style="background: #FFFAD1; border-left: 3px solid #E89F4C">
                <i>Note:</i>
                The record/s displayed in the table below reflects <b>today's date</b> <i>(based on the "repairing date"
                  column)</i>. Utilize the search function to view past records.
              </p> -->

              <div class="row" id="t_viewer_defect_breadcrumb">
                <div class="col-12">
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
                    <li class="breadcrumb-item"><a href="#" onclick="load_viewer_defect_table()"><i class="fas fa-angle-left"></i>&nbsp;Return</a></li>
                    <li class="breadcrumb-item active" id="viewer_defect_id"></li>
                  </ol>
                </div>
              </div>

              <!-- table with load more -->
              <div id="t_viewer_table_res" class="table-responsive"
                style="height: 350px; overflow: auto; display:inline-block;">
                <table id="viewer_defect_table" class="table table-sm table-head-fixed text-nowrap table-hover">
                </table>
              </div>
              <div class="d-flex justify-content-sm-end">
                <div class="dataTables_info" id="viewer_defect_table_info" role="status" aria-live="polite">
                </div>
              </div>
              <div class="d-flex justify-content-sm-center">
                <button type="button" class="btn bg-gray-dark" id="btnNextPage" style="display:none;"
                  onclick="get_next_page()" onclick="get_next_page()"
                  onmouseover="this.style.backgroundColor='#032031'; this.style.color='#FFF';"
                  onmouseout="this.style.backgroundColor='#032b43'; this.style.color='#FFF';">Load more</button>
              </div>
              <!-- /.end -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<?php
include ('plugins/footer.php');
include ('plugins/js/index_script.php');
?>