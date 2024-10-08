<?php include 'plugins/navbar.php'; ?>
<?php include 'plugins/sidebar/re_assy_re_insert_pdv_bar.php'; ?>

<div class="content-wrapper" style="background: #FFF;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">For Re-Assy / Re-Insert</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="defect_monitoring_record_rp.php">Repair Record System</a>
                        </li>
                        <li class="breadcrumb-item active">For Re-Assy | Re-Insert</li>
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
                    <h3 class="card-title"><img src="../../dist/img/settings.png" style="height:28px;">
                        &ensp;For Re-Assy / Re-Insert Monitoring Table</h3>
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
                            <select name="search_car_maker_pdv_re" id="search_car_maker_pdv_re" autocomplete="off"
                                style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #888;background: #FFF;height:34px; width:100%;"
                                class="form-control pl-1">
                                <option></option>
                            </select>
                        </div>
                        <div class="col-2">
                            <label style="font-weight:normal;margin:0;padding:0;color:#000;">QR Setting</label>
                            <select name="search_car_model_pdv_re" id="search_car_model_pdv_re" autocomplete="off"
                                style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #888;height:34px; width:100%;"
                                class="form-control pl-1" disabled>
                                <option>Select setting</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-4 mb-2">
                            <!-- qr scan -->
                            <label style="font-weight:normal;margin:0;padding:0;color:#000;">Scan here</label>
                            <input type="text" id="search_qr_scan_pdv_re" class="form-control" autocomplete="off"
                                style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #888;height:34px; width:100%;" disabled>
                        </div>
                        <div class="col-12 col-sm-6 col-md-2 mb-2">
                            <!-- product name -->
                            <label style="font-weight:normal;margin:0;padding:0;color:#000;">Product Name</label>
                            <input type="text" id="search_product_name_pdv_re" class="form-control"
                                placeholder="Product Name" autocomplete="off"
                                style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #888;background: #FFF;height:34px; width:100%;">
                        </div>
                        <div class="col-12 col-sm-6 col-md-2 mb-2">
                            <!-- lot  no -->
                            <label style="font-weight:normal;margin:0;padding:0;color:#000;">Lot No.</label>
                            <input type="text" id="search_lot_no_pdv_re" class="form-control" placeholder="Lot No."
                                autocomplete="off"
                                style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #888;background: #FFF;height:34px; width:100%;">
                        </div>
                        <div class="col-12 col-sm-6 col-md-2 mb-2">
                            <!-- serial no -->
                            <label style="font-weight:normal;margin:0;padding:0;color:#000;">Serial No.</label>
                            <input type="text" id="search_serial_no_pdv_re" class="form-control"
                                placeholder="Serial No." autocomplete="off"
                                style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #888;background: #FFF;height:34px; width:100%;">
                        </div>
                        <div class="col-12 col-sm-2">
                            <!-- search button -->
                            <label style="font-weight:normal;margin:0;padding:0;color:#fff;font-size:10px">-</label>
                            <button class="btn btn-block d-flex justify-content-left" id="search_record_btn_pdv_re"
                                onclick="load_defect_table_pdv_re(1);"
                                style="color:#fff;height:34px;border-radius:.25rem;background: #226F54;font-size:15px;font-weight:normal;"
                                onmouseover="this.style.backgroundColor='#1B5541'; this.style.color='#FFF';"
                                onmouseout="this.style.backgroundColor='#226F54'; this.style.color='#FFF';"><i
                                    class="fas fa-search" style="margin-top: 2px;"></i>&nbsp;&nbsp;Search</button>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-2">
                            <!-- search keyword input -->
                            <label style="font-weight:normal;margin:0;padding:0;font-size:15px">Line No.</label>
                            <input type="text" id="search_line_no_pdv_re" class="form-control" placeholder="Line no."
                                autocomplete="off"
                                style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #888;background: #FFF;height:34px; width:100%;">

                            <!-- <select name="line_no_pdv_re" id="search_line_no_pdv_re" autocomplete="off"
                                style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #888;background: #FFF;height:34px; width:100%;"
                                class="form-control" required>
                                <option></option>
                            </select> -->
                        </div>
                        <div class="col-12 col-sm-2">
                            <!-- harness status -->
                            <label style="font-weight:normal;margin:0;padding:0;color:#000;">Harness Status after
                                Repair</label>
                            <select name="harness_status_pdv_re" id="search_harness_status_pdv_re" autocomplete="off"
                                style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #888;background: #FFF;height:34px; width:100%;"
                                class="form-control" required>
                                <option></option>
                            </select>
                        </div>
                        <div class="col-12 col-sm-2">
                            <!-- harness verification -->
                            <label style="font-weight:normal;margin:0;padding:0;color:#000;">Re-Assy/Insert
                                Judgement</label>
                            <select name="harness_verification_pdv" id="search_harness_remarks_pdv_re"
                                autocomplete="off"
                                style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #888;background: #FFF;height:34px; width:100%;"
                                class="form-control" required>
                                <option value="" selected disabled>Select remarks</option>
                                <option value="GOOD">GOOD</option>
                                <option value="NO GOOD">NO GOOD</option>
                            </select>
                        </div>
                        <div class="col-12 col-sm-2">
                            <!-- date from -->
                            <label style="font-weight:normal;margin:0;padding:0;color:#000;">Date From <i
                                    style="font-size: 14px">(Repairing Date)</i></label>
                            <label style="color:#CA3F3F;margin:0;padding:0;">*</label>
                            <input type="date" name="date_from" class="form-control" id="search_date_from_pdv_re"
                                style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #888;background: #FFF;height:34px;">
                        </div>
                        <div class="col-12 col-sm-2">
                            <!-- date to -->
                            <label style="font-weight:normal;margin:0;padding:0;color:#000;">Date To <i
                                    style="font-size: 14px">(Repairing Date)</i></label>
                            <label style="color:#CA3F3F;margin:0;padding:0;">*</label>
                            <input type="date" name="date_to" class="form-control" id="search_date_to_pdv_re"
                                style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #888;background: #FFF;height:34px;">
                        </div>
                        <div class="col-12 col-sm-4 col-md-2">
                            <!-- clear button -->
                            <label style="font-weight:normal;margin:0;padding:0;color:#fff;font-size:10px">-</label>
                            <button class="btn btn-block d-flex justify-content-left" id="search_btn_pdv_re"
                                onclick="clear_search_input_pdv()"
                                style="color:#fff;height:34px;border-radius:.25rem;background: #2D2D2D;font-size:15px;font-weight:normal;"
                                onmouseover="this.style.backgroundColor='#0D0D0D'; this.style.color='#FFF';"
                                onmouseout="this.style.backgroundColor='#2D2D2D'; this.style.color='#FFF';">
                                <i class="fas fa-trash" style="margin-top: 2px;"></i>&nbsp;&nbsp;Clear All</button>
                        </div>
                    </div>
                    <!-- /.row end -->

                    <!-- table -->
                    <div id="list_of_defect_pdv_re_res" class="card-body mt-4 table-responsive m-0 p-0"
                        style="max-height: 400px;">
                        <table class="table col-12 table-head-fixed text-nowrap table-hover" id="defect_pdv_re_table"
                            style="background: #F9F9F9;">
                            <thead style="text-align: center;">
                                <th>#</th>
                                <th>Line No.</th>
                                <th>Category</th>
                                <th>Date Detected</th>
                                <th>Issue No. Tag</th>
                                <th>Repairing Date</th>
                                <th>Car Maker</th>
                                <th>Car Model</th>
                                <th>Product Name</th>
                                <th>Lot No.</th>
                                <th>Serial No.</th>
                                <th>Discovery Process</th>
                                <th>Discovery ID No.</th>
                                <th>Discovery Person</th>
                                <th>Occurrence Process</th>
                                <th>Occurrence Shift</th>
                                <th>Occurrence ID No.</th>
                                <th>Occurrence Person</th>
                                <th>Outflow Process</th>
                                <th>Outflow Shift</th>
                                <th>Outflow ID No.</th>
                                <th>Outflow Person</th>
                                <th>Defect Category</th>
                                <th>Foreign Material Details</th>
                                <th>Foreign Material Category</th>
                                <th>Sequence No.</th>
                                <th>Assy Board No.</th>
                                <th>Cause of Defect</th>
                                <th>Good Measurement</th>
                                <th>NG Measurement</th>
                                <th>Wire Type</th>
                                <th>Wire Size</th>
                                <th>Connector Cavity / Color</th>
                                <th>Detail in Content of Defect</th>
                                <th>Treatment Content of Defect</th>
                                <th>Dis-assembled/Dis-inserted by:</th>
                                <th>Harness Status after Repair</th>
                                <th>RE-CRIMP Judgement</th>
                                <th>ID No.</th>
                                <th>Re-crimp by (PD FSP)</th>
                                <th>Verified by ID No.</th>
                                <th>Verified by (PD FSP)</th>
                                <th>COUNTERPART CHECKING Judgement</th>
                                <th>Details</th>
                                <th>ID No.</th>
                                <th>Verified by (QA FSP)</th>
                                <th>RE-ASSY/RE-INSERT Judgement</th>
                                <th>ID No.</th>
                                <th>Confirmed by (PD FAP)</th>
                                <th>Date Confirmed</th>
                            </thead>
                            <tbody class="m-0 p-0" id="list_of_defect_record_pdv_re">
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
                    <br>
                    <div class="d-flex justify-content-sm-end">
                        <div class="dataTables_info" id="defect_pdv_re_table_info" role="status" aria-live="polite">
                        </div>
                    </div>
                    <div class="d-flex justify-content-sm-center">
                        <button type="button" class="btn" style="background: #032b43; color: #fff;" id="btnNextPage"
                            onclick="get_next_page()"
                            onmouseover="this.style.backgroundColor='#032031'; this.style.color='#FFF';"
                            onmouseout="this.style.backgroundColor='#032b43'; this.style.color='#FFF';">Load
                            more</button>
                    </div>
                    <!-- /.end -->
                </div>
            </div>
        </div>
    </section>
</div>

<?php include 'plugins/footer.php'; ?>
<?php include 'plugins/js/re_assy_re_insert_pdv_script.php'; ?>