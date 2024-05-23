<?php include 'plugins/defect_monitoring_record_rp_navbar.php'; ?>
<?php include 'plugins/sidebar/defect_monitoring_record_rp_bar.php'; ?>

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
            <li class="breadcrumb-item"><a href="defect_monitoring_record_rp.php">Repair Record System</a></li>
            <li class="breadcrumb-item active">Defect Record & Mancost</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="col-md-12">
      <div class="card card-light" style="background: #fff; border-top: 2px solid #0069B0;">
        <div class="card-header">
          <h3 class="card-title"><img src="../../dist/img/settings.png" style="height:28px;">&ensp;Defect Record and
            Mancost Monitoring Table</h3>
          <div class="card-tools">
            <!-- <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button> -->
            <button type="button" class="btn btn-tool" data-card-widget="maximize"><i
                class="fas fa-expand"></i></button>
          </div>
        </div>
        <!-- /.card header -->
        <div class="card-body">
          <div class="row mt-2">
            <div class="col-12 col-sm-6 col-md-4 mb-2">
              <!-- qr scan -->
              <label style="font-weight:normal;margin:0;padding:0;color:#000;">Scan here</label>
              <input type="text" id="qr_scan_pd" class="form-control pl-3" autocomplete="off"
                style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;">
            </div>
            <div class="col-12 col-sm-6 col-md-2 mb-2">
              <!-- product name -->
              <label style="font-weight:normal;margin:0;padding:0;color:#000;">Product Name</label>
              <input type="text" id="search_product_name" class="form-control" placeholder="Product Name"
                autocomplete="off"
                style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;"
                class="pl-3">
            </div>
            <div class="col-12 col-sm-6 col-md-2 mb-2">
              <!-- lot  no -->
              <label style="font-weight:normal;margin:0;padding:0;color:#000;">Lot No.</label>
              <input type="text" id="search_lot_no" class="form-control" placeholder="Lot No." autocomplete="off"
                style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;"
                class="pl-3">
            </div>
            <div class="col-12 col-sm-6 col-md-2 mb-2">
              <!-- serial no -->
              <label style="font-weight:normal;margin:0;padding:0;color:#000;">Serial No.</label>
              <input type="text" id="search_serial_no" class="form-control" placeholder="Serial No." autocomplete="off"
                style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;"
                class="pl-3">
            </div>
            <div class="col-12 col-sm-4 col-md-2 mb-2">
              <!-- delete button -->
              <label style="font-weight:normal;margin:0;padding:0;color:#fff;font-size:10px">-</label>
              <button class="btn btn-block d-flex justify-content-left" id="search_btn" onclick="clear_search_input()"
                style="color:#fff;height:34px;border-radius:.25rem;background: #474747;font-size:15px;font-weight:normal;"
                onmouseover="this.style.backgroundColor='#2D2D2D'; this.style.color='#FFF';"
                onmouseout="this.style.backgroundColor='#474747'; this.style.color='#FFF';">
                <i class="fas fa-trash" style="margin-top: 2px;"></i>&nbsp;&nbsp;Clear All</button>
            </div>
          </div>
          <div class="row mb-4">
            <div class="col-12 col-sm-2">
              <!-- record type -->
              <label style="font-weight:normal;margin:0;padding:0;color:#000;">Record Type</label>
              <select name="search_record_type" id="search_record_type" autocomplete="off"
                style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;"
                class="pl-1" required>
                <option></option>
              </select>
            </div>
            <div class="col-12 col-sm-2">
              <!-- search keyword input -->
              <label style="font-weight:normal;margin:0;padding:0;font-size:15px">Line No.</label>
              <input type="text" id="drm_keyword" class="form-control" placeholder="Enter line no." autocomplete="off"
                style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;"
                class="pl-3">
            </div>
            <div class="col-12 col-sm-2">
              <!-- date from -->
              <label style="font-weight:normal;margin:0;padding:0;color:#000;">Date From</label>
              <input type="date" name="date_from" class="form-control" id="date_from_search_defect"
                style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px;">
            </div>
            <div class="col-12 col-sm-2">
              <!-- date to -->
              <label style="font-weight:normal;margin:0;padding:0;color:#000;">Date To</label>
              <input type="date" name="date_to" class="form-control" id="date_to_search_defect"
                style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px;">
            </div>
            <div class="col-12 col-sm-2">
              <!-- search button -->
              <label style="font-weight:normal;margin:0;padding:0;color:#fff;font-size:10px">-</label>
              <button class="btn btn-block d-flex justify-content-left" id="search_record_btn"
                onclick="search_keyword()"
                style="color:#fff;height:34px;border-radius:.25rem;background: #226F54;font-size:15px;font-weight:normal;"
                onmouseover="this.style.backgroundColor='#1B5541'; this.style.color='#FFF';"
                onmouseout="this.style.backgroundColor='#226F54'; this.style.color='#FFF';"><i class="fas fa-search"
                  style="margin-top: 2px;"></i>&nbsp;&nbsp;Search</button>
            </div>
            <div class="col-12 col-sm-2">
              <!-- add defect record and mancost monitoring button -->
              <label style="font-weight:normal;margin:0;padding:0;color:#fff;font-size:10px">-</label>
              <button class="btn btn-block d-flex justify-content-left" data-toggle="modal"
                data-target="#add_defect_mancost"
                style="color:#fff;height:34px;border-radius:.25rem;background: #0069B0;font-size:15px;font-weight:normal;"
                onmouseover="this.style.backgroundColor='#024E92'; this.style.color='#FFF';"
                onmouseout="this.style.backgroundColor='#0267c1'; this.style.color='#FFF';"><i
                  class="fas fa-plus-circle" style="margin-top: 2px;"></i>&nbsp;&nbsp;Add Record</button>
            </div>
          </div>
          <!-- /.row end -->

          <!-- table -->
          <div class="row" id="t_defect_breadcrumb">
            <div class="col-12">
              <ol class="breadcrumb m-0 p-0">
                <li class="breadcrumb-item"><a href="#" onclick="load_defect_table()">Return</a></li>
                <li class="breadcrumb-item active" id="defect_id"></li>
              </ol>
            </div>
          </div>
          <!-- table with load more -->
          <div id="t_table_res" class="table-responsive" style="height: 500px; overflow: auto; display:inline-block;">
            <table id="defect_table" class="table table-sm table-head-fixed text-nowrap table-hover">
            </table>
          </div>
          <div class="d-flex justify-content-sm-end">
            <div class="dataTables_info" id="defect_table_info" role="status" aria-live="polite">
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
  </section>
</div>

<?php include 'plugins/footer.php'; ?>
<?php include 'plugins/js/defect_monitoring_record_rp_script.php'; ?>