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
    <div class="col-md-12 m-0 p-0">
      <div class="card" style="border-top: 2px solid #E89F4C;">
        <div class="card-header">
          <h3 class="card-title"><img src="../../dist/img/view.png" style="height:28px;">&ensp;Viewer Table</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="maximize"><i
                class="fas fa-expand"></i></button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="row">
          <div class="col-sm-12">
            <div class="card-body">
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
                  <input type="text" id="search_v_lot_no" class="form-control" placeholder="Lot No." autocomplete="off"
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
                  <input name="date_from" class="form-control" id="date_from_search_v_defect" placeholder="Date From"
                    onfocus="(this.type='date')" onblur="(this.type='text')"
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
                    style="color:#fff;height:34px;border-radius:.25rem;background: #226F54;font-size:15px;font-weight:normal;"><img
                      src="../../dist/img/search.png" style="height:19px;">&nbsp;&nbsp;Search</button>
                </div>
                <div class="col-sm-1">
                  <!-- export button -->
                  <button class="btn btn-block d-flex justify-content-left" id="export_record_viewer"
                    onclick="export_record_viewer()"
                    style="color:#fff;height:34px;border-radius:.25rem;background: #0267c1;font-size:15px;font-weight:normal;"><img
                      src="../../dist/img/export.png" style="height:19px;">&nbsp;&nbsp;Export</button>
                </div>
              </div>
              <br>

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
                    <li class="breadcrumb-item"><a href="#" onclick="load_viewer_defect_table()">Return</a></li>
                    <li class="breadcrumb-item active" id="viewer_defect_id"></li>
                  </ol>
                </div>
              </div>
              <div class="table-responsive m-0 p-0" style="max-height: 500px;overflow: auto; display:inline-block;">
                <table class="table col-12 table-head-fixed text-nowrap table-hover" id="viewer_defect_table"
                  style="background: #F9F9F9;"></table>
              </div>
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