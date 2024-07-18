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
      <div class="card card-light" style="background: #FFF; border-top: 1px solid #2D7AC0;">
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
              <div class="row">
                <div class="col-12 col-sm-6 col-md-4">
                  <!-- qr scan -->
                  <label style="font-weight:normal;margin:0;padding:0;color:#000;">Scan here</label>
                  <input type="text" id="qr_scan_qc" class="form-control" autocomplete="off"
                    style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #888888;background: #FFF;height:34px; width:100%;">
                </div>
                <div class="col-sm-4 col-md-2">
                  <!-- product name -->
                  <label style="font-weight:normal;margin:0;padding:0;color:#000;">Product Name</label>
                  <input type="text" id="search_ad_product_name" class="form-control" placeholder="Product Name"
                    autocomplete="off"
                    style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #888888;background: #FFF;height:34px; width:100%;">
                </div>
                <div class="col-sm-4 col-md-2">
                  <!-- lot no -->
                  <label style="font-weight:normal;margin:0;padding:0;color:#000;">Lot No.</label>
                  <input type="text" id="search_ad_lot_no" class="form-control" placeholder="Lot No." autocomplete="off"
                    style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #888888;background: #FFF;height:34px; width:100%;">
                </div>
                <div class="col-sm-4 col-md-2">
                  <!-- serial no -->
                  <label style="font-weight:normal;margin:0;padding:0;color:#000;">Serial No.</label>
                  <input type="text" id="search_ad_serial_no" class="form-control" placeholder="Serial No."
                    autocomplete="off"
                    style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #888888;background: #FFF;height:34px; width:100%;">
                </div>
                <div class="col-12 col-sm-4 col-md-2 mb-2">
                  <!-- clear button -->
                  <label style="font-weight:normal;margin:0;padding:0;color:#fff;font-size:10px">-</label>
                  <button class="btn btn-block d-flex justify-content-left" id="search_btn"
                    onclick="clear_search_input()"
                    style="color:#fff;height:34px;border-radius:.25rem;background: #2D2D2D;font-size:15px;font-weight:normal;"
                    onmouseover="this.style.backgroundColor='#0D0D0D'; this.style.color='#FFF';"
                    onmouseout="this.style.backgroundColor='#2D2D2D'; this.style.color='#FFF';">
                    <i class="fas fa-trash" style="margin-top: 2px;"></i>&nbsp;&nbsp;Clear All</button>
                </div>
              </div>
              <div class="row mt-2">
                <div class="col-sm-4 col-md-2">
                  <!-- record type -->
                  <label style="font-weight:normal;margin:0;padding:0;color:#000;">Record Type</label>
                  <select name="search_ad_record_type" id="search_ad_record_type" autocomplete="off"
                    style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #888888;background: #FFF;height:34px; width:100%;"
                    class="form-control" required>
                    <option></option>
                  </select>
                </div>
                <!-- line no -->
                <div class="col-sm-4 col-md-2">
                  <label style="font-weight:normal;margin:0;padding:0;color:#000;">Line No.</label>
                  <input type="text" id="search_ad_line_no" class="form-control" placeholder="Line No."
                    autocomplete="off"
                    style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #888888;background: #FFF;height:34px; width:100%;">
                </div>
                <!-- date -->
                <div class="col-12 col-sm-2">
                  <!-- date from -->
                  <label style="font-weight:normal;margin:0;padding:0;color:#000;">Date From</label>
                  <label style="color:#CA3F3F;margin:0;padding:0;">*</label>
                  <input type="date" name="date_from" class="form-control" id="search_ad_date_from"
                    style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #888888;background: #FFF;height:34px;">
                </div>
                <div class="col-12 col-sm-2">
                  <!-- date to -->
                  <label style="font-weight:normal;margin:0;padding:0;color:#000;">Date To</label>
                  <label style="color:#CA3F3F;margin:0;padding:0;">*</label>
                  <input type="date" name="date_to" class="form-control" id="search_ad_date_to"
                    style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #888888;background: #FFF;height:34px;">
                </div>
                <div class="col-12 col-sm-4 col-md-2 mb-2">
                  <!-- refresh button -->
                  <label style="font-weight:normal;margin:0;padding:0;color:#fff;font-size:10px">-</label>
                  <button class="btn btn-block d-flex justify-content-left" id="search_btn" onclick="refresh_page()"
                    style="color:#fff;height:34px;border-radius:.25rem;background: #474747;font-size:15px;font-weight:normal;"
                    onmouseover="this.style.backgroundColor='#2D2D2D'; this.style.color='#FFF';"
                    onmouseout="this.style.backgroundColor='#474747'; this.style.color='#FFF';">
                    <i class="fas fa-sync-alt" style="margin-top: 2px;"></i>&nbsp;&nbsp;Refresh</button>
                </div>
                <div class="col-sm-4 col-md-2">
                  <!-- search button -->
                  <label></label>
                  <button class="btn btn-block d-flex justify-content-left" id="search_btn"
                    onclick="load_qc_defect_table(1)"
                    style="color:#fff;height:34px;border-radius:.25rem;background: #226F54;font-size:15px;font-weight:normal;"
                    onmouseover="this.style.backgroundColor='#1B5541'; this.style.color='#FFF';"
                    onmouseout="this.style.backgroundColor='#226F54'; this.style.color='#FFF';"><i class="fas fa-search"
                      style="margin-top: 2px;"></i>&nbsp;&nbsp;Search</button>
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
                          <a class="d-block w-100 text-black" data-toggle="collapse" href="#collapseDefectLegend"
                            style="font-size: 15px;">
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
                    <div class="col-12 col-sm-6 m-0 p-0">
                      <p class="p-1" style="background: #FFFAD1; border-left: 3px solid #E89F4C; font-size: 14px;">
                        <i>Note:</i>
                        &nbsp;<b>Each entry in the mancost monitoring must be verified</b> for the overall record to be considered
                        fully verified.
                      </p>
                    </div>
                  </div>
                  <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item"><a href="#" onclick="load_qc_defect_table()"><i
                          class="fas fa-angle-left"></i>&nbsp;Return</a></li>
                    <li class="breadcrumb-item active" id="qc_defect_id"></li>
                  </ol>
                </div>
              </div>

              <!-- table with load more -->
              <div id="t_qc_table_res" class="table-responsive"
                style="height: 400px; overflow: auto; display:inline-block;">
                <table id="qc_defect_table" class="table table-sm table-head-fixed text-nowrap table-hover">
                </table>
              </div>
              <div class="d-flex justify-content-sm-end">
                <div class="dataTables_info" id="qc_defect_table_info" role="status" aria-live="polite">
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
  </section>
</div>

<?php include 'plugins/footer.php'; ?>
<?php include 'plugins/js/defect_monitoring_record_script.php'; ?>