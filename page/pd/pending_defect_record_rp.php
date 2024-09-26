<?php include 'plugins/navbar.php'; ?>
<?php include 'plugins/sidebar/pending_defect_record_rp_bar.php'; ?>

<div class="content-wrapper" style="background: #FFF;">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Pending Defect Record</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="defect_monitoring_record_rp.php">Repair Record System</a></li>
            <li class="breadcrumb-item active">Pending Defect Record</li>
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
          <h3 class="card-title"><img src="../../dist/img/settings.png" style="height:28px;">&ensp;Pending Defect Record
            Table</h3>
          <div class="card-tools">
            <!-- <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button> -->
            <button type="button" class="btn btn-tool" data-card-widget="maximize"><i
                class="fas fa-expand"></i></button>
          </div>
        </div>
        <!-- /.card header -->
        <div class="card-body">
          <div class="row mb-2">
            <div class="col-2">
              <label style="font-weight:normal;margin:0;padding:0;color:#000;">Car Maker</label>
              <select name="search_car_maker_pd" id="search_car_maker_pd" autocomplete="off"
                style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #888;background: #FFF;height:34px; width:100%;"
                class="form-control pl-1">
                <option></option>
              </select>
            </div>
            <div class="col-2">
              <label style="font-weight:normal;margin:0;padding:0;color:#000;">Car Model</label>
              <select name="search_car_model_pd" id="search_car_model_pd" autocomplete="off"
                style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #888;height:34px; width:100%;"
                class="form-control pl-1" disabled>
                <option>Select car model</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-12 col-sm-6 col-md-4 mb-2">
              <!-- qr scan -->
              <label style="font-weight:normal;margin:0;padding:0;color:#000;">Scan here</label>
              <input type="text" id="qr_scan_pd" class="form-control" autocomplete="off"
                style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #888;height:34px; width:100%;" disabled>
            </div>
            <div class="col-12 col-sm-6 col-md-2 mb-2">
              <!-- product name -->
              <label style="font-weight:normal;margin:0;padding:0;color:#000;">Product Name</label>
              <input type="text" id="search_product_name_pd" class="form-control" placeholder="Product Name"
                autocomplete="off"
                style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #888;background: #FFF;height:34px; width:100%;">
            </div>
            <div class="col-12 col-sm-6 col-md-2 mb-2">
              <!-- lot  no -->
              <label style="font-weight:normal;margin:0;padding:0;color:#000;">Lot No.</label>
              <input type="text" id="search_lot_no_pd" class="form-control" placeholder="Lot No." autocomplete="off"
                style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #888;background: #FFF;height:34px; width:100%;">
            </div>
            <div class="col-12 col-sm-6 col-md-2 mb-2">
              <!-- serial no -->
              <label style="font-weight:normal;margin:0;padding:0;color:#000;">Serial No.</label>
              <input type="text" id="search_serial_no_pd" class="form-control" placeholder="Serial No."
                autocomplete="off"
                style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #888;background: #FFF;height:34px; width:100%;">
            </div>
            <div class="col-12 col-sm-2">
              <!-- search button -->
              <label style="font-weight:normal;margin:0;padding:0;color:#fff;font-size:10px">-</label>
              <button class="btn btn-block d-flex justify-content-left" id="search_record_btn"
                onclick="load_pending_defect_table(1)"
                style="color:#fff;height:34px;border-radius:.25rem;background: #226F54;font-size:15px;font-weight:normal;"
                onmouseover="this.style.backgroundColor='#1B5541'; this.style.color='#FFF';"
                onmouseout="this.style.backgroundColor='#226F54'; this.style.color='#FFF';"><i class="fas fa-search"
                  style="margin-top: 2px;"></i>&nbsp;&nbsp;Search</button>
            </div>

          </div>
          <div class="row">
            <div class="col-12 col-sm-2">
              <!-- record type -->
              <label style="font-weight:normal;margin:0;padding:0;color:#000;">Record Type</label>
              <select name="search_record_type_pd" id="search_record_type_pd" autocomplete="off"
                style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #888;background: #FFF;height:34px; width:100%;"
                class="form-control" required>
                <option></option>
              </select>
            </div>
            <div class="col-12 col-sm-2">
              <!-- search keyword input -->
              <label style="font-weight:normal;margin:0;padding:0;font-size:15px">Line No.</label>
              <input type="text" id="search_line_no_pd" class="form-control" placeholder="Line no." autocomplete="off"
                style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #888;background: #FFF;height:34px; width:100%;">
            </div>
            <div class="col-12 col-sm-2">
              <!-- date from -->
              <label style="font-weight:normal;margin:0;padding:0;color:#000;">Date From</label>
              <label style="color:#CA3F3F;margin:0;padding:0;">*</label>
              <input type="date" name="search_date_from_pd" class="form-control" id="search_date_from_pd"
                style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #888;background: #FFF;height:34px;">
            </div>
            <div class="col-12 col-sm-2">
              <!-- date to -->
              <label style="font-weight:normal;margin:0;padding:0;color:#000;">Date To</label>
              <label style="color:#CA3F3F;margin:0;padding:0;">*</label>
              <input type="date" name="search_date_to_pd" class="form-control" id="search_date_to_pd"
                style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #888;background: #FFF;height:34px;">
            </div>
            <div class="col-12 col-sm-4 col-md-2">
              <!-- clear button -->
              <label style="font-weight:normal;margin:0;padding:0;color:#fff;font-size:10px">-</label>
              <button class="btn btn-block d-flex justify-content-left" id="search_btn"
                onclick="clear_search_pending_input()"
                style="color:#fff;height:34px;border-radius:.25rem;background: #2D2D2D;font-size:15px;font-weight:normal;"
                onmouseover="this.style.backgroundColor='#0D0D0D'; this.style.color='#FFF';"
                onmouseout="this.style.backgroundColor='#2D2D2D'; this.style.color='#FFF';">
                <i class="fas fa-trash" style="margin-top: 2px;"></i>&nbsp;&nbsp;Clear All</button>
            </div>
            <div class="col-12 col-sm-4 col-md-2">
              <!-- refresh button -->
              <label style="font-weight:normal;margin:0;padding:0;color:#fff;font-size:10px">-</label>
              <button class="btn btn-block d-flex justify-content-left" id="search_btn" onclick="refresh_page()"
                style="color:#fff;height:34px;border-radius:.25rem;background: #474747;font-size:15px;font-weight:normal;"
                onmouseover="this.style.backgroundColor='#2D2D2D'; this.style.color='#FFF';"
                onmouseout="this.style.backgroundColor='#474747'; this.style.color='#FFF';">
                <i class="fas fa-sync-alt" style="margin-top: 2px;"></i>&nbsp;&nbsp;Refresh</button>
            </div>
          </div>
          <div class="row mb-1">
            <div class="col-12 col-sm-8">
              <label></label>
              <p class="p-1" style="background: #FFFAD1; border-left: 3px solid #E89F4C; font-size: 14px;">
                <i>Note:</i>
                The records searched by date are based on the <b>'date_detected'</b> column.
                Also, <b>refresh</b> the table to fetch latest pending defect records.
              </p>
            </div>
          </div>
          <!-- /.row end -->

          <!-- table -->
          <div class="row" id="t_defect_breadcrumb">
            <div class="col-12">
              <ol class="breadcrumb m-0 p-0">
                <li class="breadcrumb-item"><a href="#" onclick="load_pending_defect_table()"><i
                      class="fas fa-angle-left"></i>&nbsp;Return</a></li>
                <li class="breadcrumb-item active" id="pending_defect_id"></li>
              </ol>
            </div>
          </div>
          <!-- table with load more -->
          <div id="t_table_res" class="table-responsive" style="height: 400px; overflow: auto; display:inline-block;">
            <table id="defect_pending_table" class="table table-sm table-head-fixed text-nowrap table-hover">
            </table>
          </div>
          <div class="d-flex justify-content-sm-end">
            <div class="dataTables_info" id="defect_pending_table_info" role="status" aria-live="polite">
            </div>
          </div>
          <div class="d-flex justify-content-sm-center">
            <button type="button" class="btn bg-gray-dark" id="btnNextPage" style="display:none;"
              onclick="get_next_page()" onmouseover="this.style.backgroundColor='#032031'; this.style.color='#FFF';"
              onmouseout="this.style.backgroundColor='#032b43'; this.style.color='#FFF';">Load more</button>
          </div>
          <!-- /.end -->
        </div>
      </div>
    </div>
  </section>
</div>

<?php include 'plugins/footer.php'; ?>
<?php include 'plugins/js/pending_defect_record_rp_script.php'; ?>