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
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="maximize"><i
                class="fas fa-expand"></i></button>
          </div>
        </div>
        <!-- /.card header -->
        <div class="card-body">
          <div class="row mb-4">
            <!-- <div class="col-sm-3">
              defect category input
              <label>&nbsp;</label>
              <input type="text" id="" class="form-control" placeholder="Defect Category (NG Content)" autocomplete="off" style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;" class="pl-3">
            </div> -->
            <div class="col-sm-2">
              <!-- record type -->
              <label style="font-weight:normal;margin:0;padding:0;color:#000;">Record Type</label>
              <select name="search_record_type" id="search_record_type" autocomplete="off"
                style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;"
                class="pl-1" required>
                <option></option>
              </select>
            </div>
            <div class="col-sm-2">
              <!-- date from -->
              <label style="font-weight:normal;margin:0;padding:0;color:#000;">Date From</label>
              <input type="date" name="date_from" class="form-control" id="date_from_search_defect"
                style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px;">
            </div>
            <div class="col-sm-2">
              <!-- date to -->
              <label style="font-weight:normal;margin:0;padding:0;color:#000;">Date To</label>
              <input type="date" name="date_to" class="form-control" id="date_to_search_defect"
                style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px;">
            </div>
            <div class="col-sm-2">
              <!-- search keyword input -->
              <label style="font-weight:normal;margin:0;padding:0;color:#fff;font-size:10px">-</label>
              <input type="text" id="drm_keyword" class="form-control" placeholder="Enter Keyword" autocomplete="off"
                style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;"
                class="pl-3">
            </div>
            <div class="col-sm-2">
              <!-- search button -->
              <label style="font-weight:normal;margin:0;padding:0;color:#fff;font-size:10px">-</label>
              <button class="btn btn-block d-flex justify-content-left" id="search_record_btn"
                onclick="search_keyword()"
                style="color:#fff;height:34px;border-radius:.25rem;background: #226F54;font-size:15px;font-weight:normal;"><img
                  src="../../dist/img/search.png" style="height:19px;">&nbsp;Search</button>
            </div>
            <div class="col-sm-2">
              <!-- add defect record and mancost monitoring button -->
              <label style="font-weight:normal;margin:0;padding:0;color:#fff;font-size:10px">-</label>
              <button class="btn btn-block d-flex justify-content-left" data-toggle="modal"
                data-target="#add_defect_mancost"
                style="color:#fff;height:34px;border-radius:.25rem;background: #0069B0;font-size:15px;font-weight:normal;"><img
                  src="../../dist/img/add.png" style="height:19px;">&nbsp;Add Defect & Mancost</button>
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
          <!-- /.end -->
          <div id="list_of_rp_record_res" class="table-responsive m-0 p-0" style="max-height: 500px;overflow: auto; display:inline-block;">
            <table class="table col-12 table-head-fixed text-nowrap table-hover" id="defect_table"
              style="background: #F9F9F9;"></table>
          </div>

          <!-- <div class="d-flex justify-content-sm-end">
            <div class="dataTables_info" id="rp_table_info" role="status" aria-live="polite"></div>
          </div>
          <div class="d-flex justify-content-sm-center">
            <button type="button" class="btn" style="background: #032b43; color: #fff;" id="btnNextPageRp"
              onclick="rp_get_next_page()">Load more</button>
          </div> -->
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
<?php include 'plugins/js/defect_monitoring_record_rp_script.php'; ?>