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
      <div class="card card-light" style="background: #FFF; border-top: 2px solid #2D7AC0;">
        <div class="card-header">
          <h3 class="card-title"><img src="../../dist/img/settings.png" style="height:28px;">&ensp;Records Monitoring
            Table</h3>
          <div class="card-tools">
            <!-- <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button> -->
            <button type="button" class="btn btn-tool" data-card-widget="maximize"><i
                class="fas fa-expand"></i></button>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-12">
            <!-- /.card header -->
            <div class="card-body">
              <div class="row mt-2">
              <div class="col-sm-4 col-md-3">
                  <!-- record type -->
                  <label style="font-weight:normal;margin:0;padding:0;color:#000;">Record Type</label>
                  <select name="search_ad_record_type" id="search_ad_record_type" autocomplete="off"
                    style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;"
                    class="pl-1" required>
                    <option></option>
                  </select>
                </div>
                <div class="col-sm-4 col-md-3">
                  <!-- defect category NG content -->
                  <label style="font-weight:normal;margin:0;padding:0;color:#000;">Product Name</label>
                  <input type="text" id="search_ad_product_name" class="form-control" placeholder="Product Name"
                    autocomplete="off"
                    style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;"
                    class="pl-3">
                </div>
                <div class="col-sm-4 col-md-2">
                  <!-- discovery process -->
                  <label style="font-weight:normal;margin:0;padding:0;color:#000;">Lot No.</label>
                  <input type="text" id="search_ad_lot_no" class="form-control" placeholder="Lot No." autocomplete="off"
                    style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;"
                    class="pl-3">
                </div>
                <div class="col-sm-4 col-md-2">
                  <!-- occurrence process -->
                  <label style="font-weight:normal;margin:0;padding:0;color:#000;">Serial No.</label>
                  <input type="text" id="search_ad_serial_no" class="form-control" placeholder="Serial No."
                    autocomplete="off"
                    style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;"
                    class="pl-3">
                </div>
                <div class="col-sm-4 col-md-2">
                  <!-- search button -->
                  <label></label>
                  <button class="btn btn-block d-flex justify-content-left" id="search_btn" onclick="search_qc()"
                    style="color:#fff;height:34px;border-radius:.25rem;background: #226F54;font-size:15px;font-weight:normal;"><img
                      src="../../dist/img/search.png" style="height:19px;">&nbsp;&nbsp;Search</button>
                </div>
              </div>
              <br>

              <!-- table -->
              <div class="row" id="t_qc_defect_breadcrumb">
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
                    <li class="breadcrumb-item"><a href="#" onclick="load_qc_defect_table()">Return</a></li>
                    <li class="breadcrumb-item active" id="qc_defect_id"></li>
                  </ol>
                </div>
              </div>

              <!-- table with load more -->
              <div id="t_qc_table_res" class="table-responsive"
                style="height: 500px; overflow: auto; display:inline-block;">
                <table id="qc_defect_table" class="table table-sm table-head-fixed text-nowrap table-hover">
                </table>
              </div>
              <div class="d-flex justify-content-sm-end">
                <div class="dataTables_info" id="qc_defect_table_info" role="status" aria-live="polite">
                </div>
              </div>
              <div class="d-flex justify-content-sm-center">
                <button type="button" class="btn bg-gray-dark" id="btnNextPage" style="display:none;"
                  onclick="get_next_page()">Load more</button>
              </div>
              <!-- /.end -->

              <!-- <div class="table-responsive m-0 p-0" style="max-height: 500px;overflow: auto; display:inline-block;">
                <table class="table col-12 table-head-fixed text-nowrap table-hover" id="admin_defect_table"
                  style="background: #F9F9F9;"></table>
              </div> -->

            </div>
          </div>
        </div>
      </div>
  </section>
</div>

<?php include 'plugins/footer.php'; ?>
<?php include 'plugins/js/defect_monitoring_record_script.php'; ?>