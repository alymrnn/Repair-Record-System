// $query = "SELECT `id`,`line_no`,`date_detected`,`issue_no_tag`,`repairing_date`,`car_maker`,`product_name`,`lot_no`,`serial_no`,`discovery_process`,`discovery_id_num`,`discovery_person`,`occurrence_process`,`occurrence_shift`,`occurrence_id_num`,`occurrence_person`,`outflow_process`,`outflow_shift`,`outflow_id_num`,`outflow_person`,`defect_category`,`sequence_num`,`defect_cause`,`defect_detail_content`,`defect_treatment_content`,`dis_assembled_by` FROM t_defect_record_f WHERE line_no LIKE '$line_no%' AND car_maker LIKE '$car_maker%' AND discovery_process LIKE '$discovery_process%' AND occurrence_process LIKE '$occurrence_process%' AND outflow_process LIKE '$outflow_process%' AND product_name LIKE '$product_name%' AND lot_no LIKE '$lot_no%' AND serial_no LIKE '$serial_no%' AND qc_status = 'Verified'";

<?php
include '../conn.php';
ini_set("memory_limit", "-1");

$defect_category = $_GET['defect_category'];
$discovery_process = $_GET['discovery_process'];
$occurrence_process = $_GET['occurrence_process'];
$outflow_process = $_GET['outflow_process'];
$car_maker = $_GET['car_maker'];
$line_no = $_GET['line_no'];
$product_name = $GET['product_name'];
$lot_no = $_GET['lot_no'];
$serial_no = $_GET['serial_no'];
$v_defect_keyword = $_GET['v_defect_keyword'];
$date_from = $_GET['date_from'];
$date_to = $_GET['date_to'];

$c = 0;

$filename = 'Defect-and-Mancost-Record_' . $server_date_only . '.csv';
header("Content-Type: application/vnd.ms-excel");
header('Content-Type: text/csv; charset=utf-8');
header("Content-Disposition: ; filename=\"$filename\"");

echo '
<html lang="en">
<body>
<table border="1">
<thead style="text-align:center;">
        <th>#</th>
        <th>Line No.</th>
        <th>Date Detected</th>
        <th>Issue No. Tag</th>
        <th>Repairing Date</th>
        <th>Car Maker</th>
        <th>Product Name</th>
        <th>Lot No.</th>
        <th>Serial No.</th>
        <th>Discovery Process</th>
        <th>Discovery ID Number</th>
        <th>Discovery Person</th>
        <th>Occurrence Process</th>
        <th>Occurrence Shift</th>
        <th>Occurrence ID Number</th>
        <th>Occurrence Person</th>
        <th>Outflow Process</th>
        <th>Outflow Shift</th>
        <th>Outflow ID Number</th>
        <th>Outflow Person</th>
        <th>Defect Category</th>
        <th>Sequence Number</th>
        <th>Cause of Defect</th>
        <th>Detail in Content of Defect</th>
        <th>Treatment Content of Defect</th>
        <th>Dis-assembled/Dis-inserted by: (Repair Person)</th>
</thead>
<tbody>
';
$query = "SELECT `id`,`line_no`,`date_detected`,`issue_no_tag`,`repairing_date`,`car_maker`,`product_name`,`lot_no`,`serial_no`,`discovery_process`,`discovery_id_num`,`discovery_person`,`occurrence_process`,`occurrence_shift`,`occurrence_id_num`,`occurrence_person`,`outflow_process`,`outflow_shift`,`outflow_id_num`,`outflow_person`,`defect_category`,`sequence_num`,`defect_cause`,`defect_detail_content`,`defect_treatment_content`,`dis_assembled_by` FROM t_defect_record_f WHERE line_no LIKE '$line_no%' AND car_maker LIKE '$car_maker%' AND discovery_process LIKE '$discovery_process%' AND occurrence_process LIKE '$occurrence_process%' AND outflow_process LIKE '$outflow_process%' AND product_name LIKE '$product_name%' AND lot_no LIKE '$lot_no%' AND serial_no LIKE '$serial_no%'";

$stmt = $conn->prepare($query);
$stmt->execute();
if ($stmt->rowCount() > 0) {
        foreach ($stmt->fetchALL() as $row) {
                $c++;
                echo '<tr>';
                echo '<td style="text-align:center;">' . $c . '</td>';
                echo '<td style="text-align:center;">' . $row['line_no'] . '</td>';
                echo '<td style="text-align:center;">' . $row['date_detected'] . '</td>';
                echo '<td style="text-align:center;">' . $row['issue_no_tag'] . '</td>';
                echo '<td style="text-align:center;">' . $row['repairing_date'] . '</td>';
                echo '<td style="text-align:center;">' . $row['car_maker'] . '</td>';
                echo '<td style="text-align:center;">' . $row['product_name'] . '</td>';
                echo '<td style="text-align:center;">' . $row['lot_no'] . '</td>';
                echo '<td style="text-align:center;">' . $row['serial_no'] . '</td>';
                echo '<td style="text-align:center;">' . $row['discovery_process'] . '</td>';
                echo '<td style="text-align:center;">' . $row['discovery_id_num'] . '</td>';
                echo '<td style="text-align:center;">' . $row['discovery_person'] . '</td>';
                echo '<td style="text-align:center;">' . $row['occurrence_process'] . '</td>';
                echo '<td style="text-align:center;">' . $row['occurrence_shift'] . '</td>';
                echo '<td style="text-align:center;">' . $row['occurrence_id_num'] . '</td>';
                echo '<td style="text-align:center;">' . $row['occurrence_person'] . '</td>';
                echo '<td style="text-align:center;">' . $row['outflow_process'] . '</td>';
                echo '<td style="text-align:center;">' . $row['outflow_shift'] . '</td>';
                echo '<td style="text-align:center;">' . $row['outflow_id_num'] . '</td>';
                echo '<td style="text-align:center;">' . $row['outflow_person'] . '</td>';
                echo '<td style="text-align:center;">' . $row['defect_category'] . '</td>';
                echo '<td style="text-align:center;">' . $row['sequence_num'] . '</td>';
                echo '<td style="text-align:center;">' . $row['defect_cause'] . '</td>';
                echo '<td style="text-align:center;">' . $row['defect_detail_content'] . '</td>';
                echo '<td style="text-align:center;">' . $row['defect_treatment_content'] . '</td>';
                echo '<td style="text-align:center;">' . $row['dis_assembled_by'] . '</td>';
                echo '</tr>';
        }
} else {
        echo '<tr>';
        echo '<td colspan="10" style="text-align:center; color:red;">No Record Found</td>';
        echo '</tr>';
}
echo '</tbody>
    </table>
    </body>
    </html>';


?>




















































section class="content">
    <div class="col-md-12">
      <div class="card card-light" style="background: #eaeaea;">
        <div class="card-header">
          <h3 class="card-title"><img src="../../dist/img/history.png" style="height:28px;">&ensp;History Table</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="row">
            <div class="col-sm-3">
              <!-- view record -->
              <label class="m-0" style="font-weight:normal;font-size: 14px;">Note: Select the record to be viewed.</label>
              <!-- <label>View Record</label> -->
              <input list="record_list" name="view_record" id="view_record" autocomplete="off" placeholder="View Record" style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px;width:100%;" class="pl-3">
              <datalist id="record_list">
                <option value="All Records">
                <option value="Defect Record & Mancost Monitoring">
                <option value="Mancost Monitoring Only">
              </datalist>
            </div>
            <div class="col-sm-3">
              <!-- line no -->
              <label></label>
              <input type="text" id="line_no" class="form-control" placeholder="Line No." autocomplete="off" style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;" class="pl-3">
            </div>
            <div class="col-sm-3">
              <!-- date from -->
              <label></label>
              <input type="text" name="date_from" class="form-control" id="date_from_search" placeholder="Date From" onfocus="(this.type='datetime-local')" onblur="(this.type='text')" style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px;">
            </div>
            <div class="col-sm-3">
              <!-- date to -->
              <label></label>
              <input type="text" name="date_to" class="form-control" id="date_to_search" placeholder="Date To" onfocus="(this.type='datetime-local')" onblur="(this.type='text')" style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px;">
            </div>
          </div>

          <div class="row">
            <div class="col-sm-3">
              <!-- defect category -->
              <label></label>
              <input list="defect_list" name="defect_category" id="defect_category" autocomplete="off" placeholder="Defect Category" style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;" class="pl-3">
              <datalist id="defect_list">
                <!--  -->
              </datalist>
            </div>
            <div class="col-sm-6">
              <!-- search keyword -->
              <label></label>
              <input type="text" id="keyword_search" class="form-control" placeholder="Enter Keyword" autocomplete="off" style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;" class="pl-3">
            </div>
            <div class="col-sm-3">
              <!-- search button -->
              <label></label>
              <button class="btn btn-block d-flex justify-content-left" id="search_btn" onclick="" style="color:#fff;height:34px;border-radius:.25rem;background: #425B2C;font-size:15px;font-weight:normal;"><img src="../../dist/img/search.png" style="height:19px;">&nbsp;&nbsp;Search</button>
            </div>

          </div>

          <div class="row">
            <div class="col mt-4" style="color: #425B2C; font-weight:bold;">
              <!-- table switching navigation -->
              Defect Record
            </div>
            <div class="col-sm-3">
              <!-- view total count of data from table -->
              <span id="count_view"></span>
            </div>
          </div>

          <!-- table -->
          <div class="card-body table-responsive m-0 p-0">
            <table class="table col-12 mt-3 table-head-fixed text-nowrap table-hover" id="" style="background: #F9F9F9;">
              <thead style="text-align: center;">
                <!-- table switching content -->
                <th>#</th>
                <th>Line No.</th>
                <th>Date Detected</th>
                <th>Issue No. Tag</th>
                <th>Repairing Date</th>
                <th>Product Name</th>
                <th>Lot No.</th>
                <th>Serial No.</th>
                <th>Discovery Process</th>
                <th>Discovery ID Number</th>
                <th>Discovery Person</th>
                <th>Occurrence Process</th>
                <th>Occurrence Shift</th>
                <th>Occurrence ID Number</th>
                <th>Occurrence Person</th>
                <th>Outflow Process</th>
                <th>Outflow Shift</th>
                <th>Outflow ID Number</th>
                <th>Outflow Person</th>
                <th>Defect Category</th>
                <th>Sequence Number</th>
                <th>Cause of Defect</th>
                <th>Detail in Content of Defect</th>
                <th>Treatment Content of Defect</th>
                <th>Dis-assembled/Dis-inserted by: (Repair Person)</th>
              </thead>
              <tbody class="mb-0" id="">
                <tr>
                  <td colspan="10" style="text-align: center;">
                    <div class="spinner-border text-dark" role="status">
                      <span class="sr-only">Loading...</span>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- pagination -->
        <div class="row mr-2 mb-4">
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
            <!-- <div class="dataTables_paginate paging_simple_numbers" id="accounts_table_pagination">
                  </div> -->
          </div>
          <div class="col-sm-12 col-md-1 col-2">
            <button type="button" id="btnNextPage" class="btn bg-gray-dark btn-flat mr-3" style="border-radius:.25rem; width:100%" onclick="get_next_page()">Next</button>
          </div>
        </div>
      </div>
    </div>
  </section>








const go_to_mc_form = () => {
        var line_no = document.getElementById("line_no").value.trim();
        var lineError = document.getElementById("lineError");


        var date_detected = document.getElementById("date_detected").value.trim();
        var issue_tag = document.getElementById("issue_tag").value.trim();
        var repairing_date = document.getElementById("repairing_date").value.trim();
        var car_maker = document.getElementById("car_maker").value.trim();
        // var qr_scan = document.getElementById("qr_scan").value.trim();
        // var product_name = document.getElementById("product_name").value.trim();
        // var lot_no = document.getElementById("lot_no").value.trim();
        // var serial_no = document.getElementById("serial_no").value.trim();
        var discovery_process_dr = document.getElementById("discovery_process_dr").value.trim();
        var discovery_id_no_dr = document.getElementById("discovery_id_no_dr").value.trim();
        var discovery_person = document.getElementById("discovery_person").value.trim();
        var occurrence_process_dr = document.getElementById("occurrence_process_dr").value.trim();
        var occurrence_shift_dr = document.getElementById("occurrence_shift_dr").value.trim();
        var occurrence_id_no_dr = document.getElementById("occurrence_id_no_dr").value.trim();
        var occurrence_person = document.getElementById("occurrence_person").value.trim();
        var outflow_process_dr = document.getElementById("outflow_process_dr").value.trim();
        var outflow_shift_dr = document.getElementById("outflow_shift_dr").value.trim();
        var outflow_id_no_dr = document.getElementById("outflow_id_no_dr").value.trim();
        var outflow_person = document.getElementById("outflow_person").value.trim();
        var defect_category_dr = document.getElementById("defect_category_dr").value.trim();
        var sequence_no = document.getElementById("sequence_no").value.trim();
        var defect_cause_dr = document.getElementById("defect_cause_dr").value.trim();
        var repair_person_dr = document.getElementById("repair_person_dr").value.trim();
        var detail_content_defect = document.getElementById("detail_content_defect").value.trim();
        var treatment_content_defect = document.getElementById("treatment_content_defect").value.trim();

        var defect_id = document.getElementById("defect_id_no").value;

        console.log(line_no);

        $.ajax({
                url: '../../process/user/defect_monitoring_record_rp/defect_monitoring_record_rp_p.php',
                type: 'POST',
                cache: false,
                data: {
                    method: 'go_to_mc_form',
                    line_no: line_no,
                    date_detected: date_detected,
                    issue_tag: issue_tag,
                    repairing_date: repairing_date,
                    car_maker:car_maker,
                    // qr_scan:qr_scan,
                    // product_name:product_name,
                    // lot_no:lot_no,
                    // serial_no:serial_no,
                    discovery_process_dr: discovery_process_dr,
                    discovery_id_no_dr: discovery_id_no_dr,
                    discovery_person: discovery_person,
                    occurrence_process_dr: occurrence_process_dr,
                    occurrence_shift_dr: occurrence_shift_dr,
                    occurrence_id_no_dr: occurrence_id_no_dr,
                    occurrence_person: occurrence_person,
                    outflow_process_dr: outflow_process_dr,
                    outflow_shift_dr: outflow_shift_dr,
                    outflow_id_no_dr: outflow_id_no_dr,
                    outflow_person: outflow_person,
                    defect_category_dr: defect_category_dr,
                    sequence_no: sequence_no,
                    defect_cause_dr: defect_cause_dr,
                    repair_person_dr: repair_person_dr,
                    detail_content_defect: detail_content_defect,
                    treatment_content_defect: treatment_content_defect,
                    defect_id: defect_id
                },
                beforeSend: (jqXHR, settings) => {
                    Swal.fire({
                        title: 'Defect Record',
                        text: 'Loading please wait...',
                        showConfirmButton: false,
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        allowEnterKey: false
                    });
                    jqXHR.url = settings.url;
                    jqXHR.type = settings.type;
                },
                success: response => {
                    setTimeout(() => {
                        swal.close();

                        try {
                            let response_array = JSON.parse(response);
                            if (response_array.message == 'success') {

                                document.getElementById("repair_start_mc").innerHTML = repair_start_mc;
                                document.getElementById("defect_id_no").value = response_array.defect_id;

                                $('#add_defect_mancost').modal('hide');
                                setTimeout(() => {
                                    $('#add_defect_mancost_2').modal('show');
                                }, 400);
                            } else if (response_array.message == 'Line No. Empty') {
                                Swal.fire({
                                    icon: 'info',
                                    title: 'Line No. Empty',
                                    text: 'Please fill-out the said input field.',
                                    showConfirmButton: false,
                                    timer: 2500
                                });
                            } else if (response_array.message == 'Date Detected Empty') {
                                Swal.fire({
                                    info: 'error',
                                    title: 'Date Detected Empty',
                                    text: 'Please fill-out the said input field.',
                                    showConfirmButton: false,
                                    timer: 2500
                                });
                            } else if (response_array.message == 'Issue Tag Empty') {
                                Swal.fire({
                                    info: 'error',
                                    title: 'Issue Np. Tag Empty',
                                    text: 'Please fill-out the said input field.',
                                    showConfirmButton: false,
                                    timer: 2500
                                });
                            } else if (response_array.message == 'Repairing Date Empty') {
                                Swal.fire({
                                    info: 'error',
                                    title: 'Repairing Date Empty',
                                    text: 'Please fill-out the said input field.',
                                    showConfirmButton: false,
                                    timer: 2500
                                });
                            } else if (response_array.message == 'Car Maker Empty') {
                                Swal.fire({
                                    info: 'error',
                                    title: 'Car Maker Empty',
                                    text: 'Please fill-out the said input field.',
                                    showConfirmButton: false,
                                    timer: 2500
                                });
                            } else if (response_array.message == 'Discovery Process Empty') {
                                Swal.fire({
                                    info: 'error',
                                    title: 'Discovery Empty',
                                    text: 'Please fill-out the said input field.',
                                    showConfirmButton: false,
                                    timer: 2500
                                });
                            } else if (response_array.message == 'ID Number (in Discovery) Empty') {
                                Swal.fire({
                                    info: 'error',
                                    title: 'ID Number (in Discovery) Empty',
                                    text: 'Please fill-out the said input field.',
                                    showConfirmButton: false,
                                    timer: 2500
                                });
                            } else if (response_array.message == 'Discovery Person Empty') {
                                Swal.fire({
                                    info: 'error',
                                    title: 'Discovery Person Empty',
                                    text: 'Please fill-out the said input field.',
                                    showConfirmButton: false,
                                    timer: 2500
                                });
                            } else if (response_array.message == 'Occurrence Process Empty') {
                                Swal.fire({
                                    info: 'error',
                                    title: 'Occurrence Process Empty',
                                    text: 'Please fill-out the said input field.',
                                    showConfirmButton: false,
                                    timer: 2500
                                });
                            } else if (response_array.message == 'Occurrence Shift Empty') {
                                Swal.fire({
                                    info: 'error',
                                    title: 'Occurrence Shift Empty',
                                    text: 'Please fill-out the said input field.',
                                    showConfirmButton: false,
                                    timer: 2500
                                });
                            } else if (response_array.message == 'ID Number (in Occurrence) Empty') {
                                Swal.fire({
                                    info: 'error',
                                    title: 'ID Number (in Occurrence)',
                                    text: 'Please fill-out the said input field.',
                                    showConfirmButton: false,
                                    timer: 2500
                                });
                            } else if (response_array.message == 'Occurrence Person Empty') {
                                Swal.fire({
                                    info: 'error',
                                    title: 'Occurrence Person Empty',
                                    text: 'Please fill-out the said input field.',
                                    showConfirmButton: false,
                                    timer: 2500
                                });
                            } else if (response_array.message == 'Outflow Process Empty') {
                                Swal.fire({
                                    info: 'error',
                                    title: 'Outflow Process Empty',
                                    text: 'Please fill-out the said input field.',
                                    showConfirmButton: false,
                                    timer: 2500
                                });
                            } else if (response_array.message == 'Outflow Shift Empty') {
                                Swal.fire({
                                    info: 'error',
                                    title: 'Outflow Shift Empty',
                                    text: 'Please fill-out the said input field.',
                                    showConfirmButton: false,
                                    timer: 2500
                                });
                            } else if (response_array.message == 'ID Number (in Outflow) Empty') {
                                Swal.fire({
                                    info: 'error',
                                    title: 'ID Number (in Outflow) Empty',
                                    text: 'Please fill-out the said input field.',
                                    showConfirmButton: false,
                                    timer: 2500
                                });
                            } else if (response_array.message == 'Outflow Person Empty') {
                                Swal.fire({
                                    info: 'error',
                                    title: 'Outflow Person Empty',
                                    text: 'Please fill-out the said input field.',
                                    showConfirmButton: false,
                                    timer: 2500
                                });
                            } else if (response_array.message == 'Defect Category Empty') {
                                Swal.fire({
                                    info: 'error',
                                    title: 'Defect Category Empty',
                                    text: 'Please fill-out the said input field.',
                                    showConfirmButton: false,
                                    timer: 2500
                                });
                            } else if (response_array.message == 'Sequence Number Empty') {
                                Swal.fire({
                                    info: 'error',
                                    title: 'Sequence Number Empty',
                                    text: 'Please fill-out the said input field.',
                                    showConfirmButton: false,
                                    timer: 2500
                                });
                            } else if (response_array.message == 'Cause of Defect Empty') {
                                Swal.fire({
                                    info: 'error',
                                    title: 'Cause of Defect Empty',
                                    text: 'Please fill-out the said input field.',
                                    showConfirmButton: false,
                                    timer: 2500
                                });
                            } else if (response_array.message == 'Repair Person Empty') {
                                Swal.fire({
                                    info: 'error',
                                    title: 'Repair Person Empty',
                                    text: 'Please fill-out the said input field.',
                                    showConfirmButton: false,
                                    timer: 2500
                                });
                            } else if (response_array.message == 'Treatment Content of Defect Empty') {
                                Swal.fire({
                                    info: 'error',
                                    title: 'Treatment Content of Defect Empty',
                                    text: 'Please fill-out the said input field.',
                                    showConfirmButton: false,
                                    timer: 2500
                                });
                            } else if (response_array.message == 'Dis-assembled/Dis-inserted by (Repair Person) Empty') {
                                Swal.fire({
                                    info: 'error',
                                    title: 'Dis-assembled/Dis-inserted by (Repair Person) Empty',
                                    text: 'Please fill-out the said input field.',
                                    showConfirmButton: false,
                                    timer: 2500
                                });
                            }
                        } catch (e) {
                            console.log(response);
                        }
                    }, 500);
                }
            })
            .fail((jqXHR, textStatus, errorThrown) => {
                console.log(jqXHR);
            });
    }













<div class="card-body table-responsive m-0 p-0">
  <table class="table col-12 mt-3 table-head-fixed text-nowrap table-hover" id="" style="background: #F9F9F9;">
    <thead style="text-align: center;">
      <!-- table switching content -->
      <th>#</th>
      <th>Line No.</th>
      <th>Date Detected</th>
      <th>Issue No. Tag</th>
      <th>Repairing Date</th>
      <th>Product Name</th>
      <th>Lot No.</th>
      <th>Serial No.</th>
      <th>Discovery Process</th>
      <th>Discovery ID Number</th>
      <th>Discovery Person</th>
      <th>Occurrence Process</th>
      <th>Occurrence Shift</th>
      <th>Occurrence ID Number</th>
      <th>Occurrence Person</th>
      <th>Outflow Process</th>
      <th>Outflow Shift</th>
      <th>Outflow ID Number</th>
      <th>Outflow Person</th>
      <th>Defect Category</th>
      <th>Sequence Number</th>
      <th>Cause of Defect</th>
      <th>Detail in Content of Defect</th>
      <th>Treatment Content of Defect</th>
      <th>Dis-assembled/Dis-inserted by: (Repair Person)</th>
    </thead>
    <tbody class="mb-0" id="">
      <tr>
        <td colspan="10" style="text-align: center;">
          <div class="spinner-border text-dark" role="status">
            <span class="sr-only">Loading...</span>
          </div>
        </td>
      </tr>
    </tbody>
  </table>
</div>





<select class="btn" name="pro" recquired id="pro" style="width: 100%; border: 2px solid black;background-color: white;color: black;font-size: 16px;cursor: pointer; border-color: #7ADFB5;" onchange="search_data(1)">
  <option>Please select a process.....</option>
  <option></option>
</select>

<script type="text/javascript">
  $(document).ready(function() {
    $("#category").change(function() {
      var category = document.getElementById("category").value;
      $.ajax({
        url: 'index_process.php',
        type: 'POST',
        cache: false,
        data: {
          method: 'fetch_pro',
          category: category
        },
        success: function(response) {
          $('#pro').html(response);
        }
      });
    });
  });
</script>

<?php
if ($method == 'fetch_pro') {
  $category = $_POST['category'];
  $query = "SELECT `process` FROM `m_process` WHERE category = '$category' ORDER BY process ASC";
  $stmt = $conn->prepare($query);
  $stmt->execute();
  if ($stmt->rowCount() > 0) {
    echo '<option value="">Please select a process.....</option>';
    foreach ($stmt->fetchAll() as $row) {
      echo '<option>' . htmlspecialchars($row['process']) . '</option>';
    }
  } else {
    echo '<option>Please select a process.....</option>';
  }
}
?>





<select class="btn btn-outline-primary" name="agency" id="agency" onchange="search_data(1)">
  <option>Provider</option>
  <option></option>
</select>

<script>
  const agency_data = () => {
    $.ajax({
      url: '../../process/viewer/manpower.php',
      type: 'POST',
      cache: false,
      data: {
        method: 'fetch_agency',
      },
      success: function(response) {
        $('#agency').html(response);
      }
    });
  }
</script>

<?php
if ($method == 'fetch_agency') {
  $query = "SELECT `agency` FROM `m_agency` ORDER BY agency ASC";
  $stmt = $conn->prepare($query);
  $stmt->execute();
  if ($stmt->rowCount() > 0) {
    echo '<option value="">Provider</option>';
    foreach ($stmt->fetchAll() as $row) {
      echo '<option>' . htmlspecialchars($row['agency']) . '</option>';
    }
  } else {
    echo '<option>Provider</option>';
  }
}



// if (!empty($line_no)) {
//     if (!empty($date_detected)) {
//         if (!empty($issue_tag)) {
//             if (!empty($repairing_date)) {
//                 if (!empty($discovery_process_dr)) {
//                     if (!empty($discovery_id_no_dr)) {
//                         if (!empty($discovery_person)) {
//                             if (!empty($occurrence_process_dr)) {
//                                 if (!empty($occurrence_shift_dr)) {
//                                     if (!empty($occurrence_id_no_dr)) {
//                                         if (!empty($occurrence_person)) {
//                                             if (!empty($outflow_process_dr)) {
//                                                 if (!empty($outflow_shift_dr)) {
//                                                     if (!empty($outflow_id_no_dr)) {
//                                                         if (!empty($outflow_person)) {
//                                                             if (!empty($defect_category_dr)) {
//                                                                 if (!empty($sequence_no)) {
//                                                                     if (!empty($defect_cause_dr)) {
//                                                                         if (!empty($repair_person_dr)) {
//                                                                             if (!empty($detail_content_defect)) {
//                                                                                 if (!empty($treatment_content_defect)) {
//                                                                                     $is_valid = true;
//                                                                                 } else $message = "Dis-assembled/Dis-inserted by (Repair Person) Empty";
//                                                                             } else $message = "Treatment Content of Defect Empty";
//                                                                         } else $message = "Repair Person Empty";
//                                                                     } else $message = "Cause of Defect Empty";
//                                                                 } else $message = "Sequence Number Empty";
//                                                             } else $message = "Defect Category Empty";
//                                                         } else $message = "Outflow Person Empty";
//                                                     } else $message = "ID Number (in Outflow) Empty";
//                                                 } else $message = "Outflow Shift Empty";
//                                             } else $message = "Outflow Process Empty";
//                                         } else $message = "Occurrence Person Empty";
//                                     } else $message = "ID Number (in Occurrence) Empty";
//                                 } else $message = "Occurrence Shift Empty";
//                             } else $message = "Occurrence Process Empty";
//                         } else $message = "Discovery Person Empty";
//                     } else $message = "ID Number (in Discovery) Empty";
//                 } else $message = "Discovery Process Empty";
//             } else $message = "Repairing Date Empty";
//         } else $message = "Issue Tag Empty";
//     } else $message = "Date Detected Empty";
// } else $message = "Line No. Empty";

?>


<select name="discovery_process_dr" id="discovery_process_dr" autocomplete="off" style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;" class="pl-2" required>
  <option>Select a discovery process</option>
  <option></option>
</select>



// add mancost only
// const add_mancost_only = () => {
// var car_model_mc_only = document.getElementById("car_model_mc_only").value.trim();
// var line_no_mc_only = document.getElementById("line_no_mc_only").value.trim();
// var repair_start_mc_only = document.getElementById("repair_start_mc_only").value.trim();
// var repair_end_mc_only = document.getElementById("repair_end_mc_only").value.trim();
// // var time_consumed_mc_only = document.getElementById("time_consumed_mc_only").value.trim();
// var defect_category_mc_only = document.getElementById("defect_category_mc_only").value.trim();
// var occurrence_process_mc_only = document.getElementById("occurrence_process_mc_only").value.trim();
// var parts_removed_mc_only = document.getElementById("parts_removed_mc_only").value.trim();
// var quantity_mc_only = document.getElementById("quantity_mc_only").value.trim();
// var unit_cost_mc_only = document.getElementById("unit_cost_mc_only").value.trim();
// // var material_cost_mc_only = document.getElementById("material_cost_mc_only").value.trim();
// // var manhour_cost_mc_only = document.getElementById("manhour_cost_mc_only").value.trim();
// var portion_treatment_mc_only = document.getElementById("portion_treatment_mc_only").value.trim();
// var re_checking_mc_only = document.getElementById("re_checking_mc_only").value.trim();
// var qc_verification_mc_only = document.getElementById("qc_verification_mc_only").value.trim();
// var checking_date_mc_only = document.getElementById("checking_date_mc_only").value.trim();

// if (car_model_mc_only == ''){
// Swal.fire({
// icon:'info',
// title:'Car Model Empty',
// text:'Please select the car model.',
// showConfirmButton: false,
// timer:2000
// });
// } else if (line_no_mc_only == ''){
// Swal.fire({
// icon:'info',
// title:'Line No. Empty',
// text:'Please input the line no.',
// showConfirmButton: false,
// timer:2000
// });
// } else if (repair_start_mc_only == ''){
// Swal.fire({
// icon:'info',
// title:'Repair Start Empty',
// text:'Please declare the repair start time.',
// showConfirmButton: false,
// timer:2000
// });
// } else if (repair_end_mc_only == ''){
// Swal.fire({
// icon:'info',
// title:'Repair End Empty',
// text:'Please declare the repair end time.',
// showConfirmButton: false,
// timer:2000
// });
// } else if (defect_category_mc_only == ''){
// Swal.fire({
// icon:'info',
// title:'Defect Category Empty',
// text:'Please select the defect category.',
// showConfirmButton: false,
// timer:2000
// });
// } else if (occurrence_process_mc_only == ''){
// Swal.fire({
// icon:'info',
// title:'Occurrence Process Empty',
// text:'Please select the occurrence process.',
// showConfirmButton: false,
// timer:2000
// });
// } else if (parts_removed_mc_only == ''){
// Swal.fire({
// icon:'info',
// title:'Parts Removed Empty',
// text:'Please input the removed parts.',
// showConfirmButton: false,
// timer:2000
// });
// } else if (quantity_mc_only == ''){
// Swal.fire({
// icon:'info',
// title:'Quantity Empty',
// text:'Please input the quantity.',
// showConfirmButton: false,
// timer:2000
// });
// } else if (unit_cost_mc_only == ''){
// Swal.fire({
// icon:'info',
// title:'Unit Cost Empty',
// text:'Please input the unit cost.',
// showConfirmButton: false,
// timer:2000
// });
// } else if (portion_treatment_mc_only == ''){
// Swal.fire({
// icon:'info',
// title:'Repaired Portion Treatment Empty',
// text:'Please select the repaired portion treatment.',
// showConfirmButton: false,
// timer:2000
// });
// } else if (re_checking_mc_only == ''){
// Swal.fire({
// icon:'info',
// title:'Re-checking (in Process) Empty',
// text:'Please input the re-checking status.',
// showConfirmButton: false,
// timer:2000
// });
// } else if (qc_verification_mc_only == ''){
// Swal.fire({
// icon:'info',
// title:'QC Verification Empty',
// text:'Please input the qc verification status.',
// showConfirmButton: false,
// timer:2000
// });
// } else if (checking_date_mc_only == ''){
// Swal.fire({
// icon:'info',
// title:'Checking Date (Sign) Empty',
// text:'Please input the checking date (sign).',
// showConfirmButton: false,
// timer:2000
// });
// } else {
// $.ajax({
// url:'../../process/user/defect_monitoring_record_rp/defect_monitoring_record_rp_p.php',
// type:'POST',
// cache:'false',
// data: {
// method:'add_mancost_only',
// car_model_mc_only:car_model_mc_only,
// line_no_mc_only:line_no_mc_only,
// repair_start_mc_only:repair_start_mc_only,
// repair_end_mc_only:repair_end_mc_only,
// // time_consumed_mc_only:time_consumed_mc_only,
// defect_category_mc_only:defect_category_mc_only,
// occurrence_process_mc_only:occurrence_process_mc_only,
// parts_removed_mc_only:parts_removed_mc_only,
// quantity_mc_only:quantity_mc_only,
// unit_cost_mc_only:unit_cost_mc_only,
// // material_cost_mc_only:material_cost_mc_only,
// // manhour_cost_mc_only:manhour_cost_mc_only,
// portion_treatment_mc_only:portion_treatment_mc_only,
// re_checking_mc_only:re_checking_mc_only,
// qc_verification_mc_only:qc_verification_mc_only,
// checking_date_mc_only:checking_date_mc_only
// }, success:function(response){
// if (response == 'success') {
// Swal.fire({
// icon:'success',
// title:'Successfully Recorded',
// text: 'Success',
// showConfirmButton: false,
// timer:2000
// });
// $('#car_model_mc_only').val('');
// $('#line_no_mc_only').val('');
// $('#repair_start_mc_only').val('');
// $('#repair_end_mc_only').val('');
// // $('#time_consumed_mc_only').val('');
// $('#defect_category_mc_only').val('');
// $('#occurrence_process_mc_only').val('');
// $('#parts_removed_mc_only').val('');
// $('#quantity_mc_only').val('');
// $('#unit_cost_mc_only').val('');
// // $('#material_cost_mc_only').val('');
// // $('#manhour_cost_mc_only').val('');
// $('#portion_treatment_mc_only').val('');
// $('#re_checking_mc_only').val('');
// $('#qc_verification_mc_only').val('');
// $('#checking_date_mc_only').val('');

// $('#add_mancost').modal('hide');
// } else if (response == 'Already Exist'){
// Swal.fire({
// icon: 'info',
// title: 'Duplicate Data',
// text: 'Information',
// showConfirmButton: false,
// timer:2000
// });
// } else {
// Swal.fire({
// icon:'error',
// title:'Error',
// text:'Error',
// showConfirmButton: false,
// timer:2000
// });
// }
// }
// });
// }
// }



// add mancost only
if ($method == 'add_mancost_only') {
$car_model_mc_only = trim($_POST['car_model_mc_only']);
$line_no_mc_only = trim($_POST['line_no_mc_only']);
$repair_start_mc_only = trim($_POST['repair_start_mc_only']);
$repair_end_mc_only = trim($_POST['repair_end_mc_only']);
// $time_consumed_mc_only = trim($_POST['time_consumed_mc_only']);
$defect_category_mc_only = trim($_POST['defect_category_mc_only']);
$occurrence_process_mc_only = trim($_POST['occurrence_process_mc_only']);
$parts_removed_mc_only = trim($_POST['parts_removed_mc_only']);
$quantity_mc_only = trim($_POST['quantity_mc_only']);
$unit_cost_mc_only = trim($_POST['unit_cost_mc_only']);
// $material_cost_mc_only = trim($_POST['material_cost_mc_only']);
// $manhour_cost_mc_only = trim($_POST['manhour_cost_mc_only']);
$portion_treatment_mc_only = trim($_POST['portion_treatment_mc_only']);
$re_checking_mc_only = trim($_POST['re_checking_mc_only']);
$qc_verification_mc_only = trim($_POST['qc_verification_mc_only']);
$checking_date_mc_only = trim($_POST['checking_date_mc_only']);

// $defect_id = trim($_POST['defect_id']);


$check = "SELECT id FROM t_mancost_monitoring_f WHERE line_no = '$line_no_mc_only'";
$stmt = $conn->prepare($check);
$stmt->execute();
if ($stmt->rowCount() > 0) {
echo 'Already Exist';
} else {

$stmt = NULL;
$query = "INSERT INTO t_mancost_monitoring_f (`car_model`,`line_no`,`repair_start`,`repair_end`,`defect_category`,`occurrence_process`,`parts_removed`,`quantity`,`unit_cost`,`repaired_portion_treatment`,`re_checking`,`qc_verification`,`checking_date_sign`) VALUES ('$car_model_mc_only','$line_no_mc_only','$repair_start_mc_only','$repair_end_mc_only','$defect_category_mc_only','$occurrence_process_mc_only','$parts_removed_mc_only','$quantity_mc_only','$unit_cost_mc_only','$portion_treatment_mc_only','$re_checking_mc_only','$qc_verification_mc_only','$checking_date_mc_only')";
$stmt = $conn->prepare($query);
if ($stmt->execute()) {
echo 'success';
} else {
echo 'error';
}
}
}

// add defect mancost record FIRST PART
// if ($method == 'add_defect_mancost_record') {
// $line_no = trim($_POST['line_no']);
// $date_detected = trim($_POST['date_detected']);
// $issue_tag = trim($_POST['issue_tag']);
// $repairing_date = trim($_POST['repairing_date']);
// $car_model = trim($_POST['car_model']);
// $qr_scan = trim($_POST['qr_scan']);
// $product_name = trim($_POST['product_name']);
// $lot_no = trim($_POST['lot_no']);
// $serial_no = trim($_POST['serial_no']);
// $discovery_process_dr = trim($_POST['discovery_process_dr']);
// $discovery_id_no_dr = trim($_POST['discovery_id_no_dr']);
// $discovery_person = trim($_POST['discovery_person']);
// $occurrence_process_dr = trim($_POST['occurrence_process_dr']);
// $occurrence_shift_dr = trim($_POST['occurrence_shift_dr']);
// $occurrence_id_no_dr = trim($_POST['occurrence_id_no_dr']);
// $occurrence_person = trim($_POST['occurrence_person']);
// $outflow_process_dr = trim($_POST['outflow_process_dr']);
// $outflow_shift_dr = trim($_POST['outflow_shift_dr']);
// $outflow_id_no_dr = trim($_POST['outflow_id_no_dr']);
// $outflow_person = trim($_POST['outflow_person']);
// $defect_category_dr = trim($_POST['defect_category_dr']);
// $sequence_no = trim($_POST['sequence_no']);
// $defect_cause_dr = trim($_POST['defect_cause_dr']);
// $repair_person_dr = trim($_POST['repair_person_dr']);
// $detail_content_defect = trim($_POST['detail_content_defect']);
// $treatment_content_defect = trim($_POST['treatment_content_defect']);

// $defect_id = trim($_POST['defect_id']);

// $check = "SELECT id FROM t_defect_record_f WHERE line_no = '$line_no'";
// $stmt = $conn->prepare($check);
// $stmt->execute();
// if ($stmt->rowCount() > 0) {
// echo 'Already Exist';
// } else {
// $stmt = NULL;
// $query = "INSERT INTO t_defect_record_f (`line_no`,`date_detected`,`issue_no_tag`,`repairing_date`,`discovery_process`,`discovery_id_num`,`discovery_person`,`occurrence_process`,`occurrence_shift`,`occurrence_id_num`,`occurrence_person`,`outflow_process`,`outflow_shift`,`outflow_id_num`,`outflow_person`,`defect_category`,`sequence_num`,`defect_cause`,`defect_detail_content`,`defect_treatment_content`,`dis_assembled_by`) VALUES ('$line_no','$date_detected','$issue_tag','$repairing_date','$discovery_process_dr','$discovery_id_no_dr','$discovery_person','$occurrence_process_dr','$occurrence_shift_dr','$occurrence_id_no_dr','$occurrence_person','$outflow_process_dr','$outflow_shift_dr','$outflow_id_no_dr','$outflow_person','$defect_category_dr','$sequence_no','$repair_person_dr','$detail_content_defect','$treatment_content_defect')";
// }
// }

<!-- /.card-header -->
<div class="card-body">
  <div class="row">
    <div class="col-sm-3">
      <!-- view record -->
      <label class="m-0" style="font-weight:normal;font-size: 14px;">Note: Select the record to be viewed.</label>
      <!-- <label>View Record</label> -->
      <input list="record_list" name="view_record" id="view_record" autocomplete="off" placeholder="View Record" style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px;width:100%;" class="pl-3">
      <datalist id="record_list">
        <option value="All Records">
        <option value="Defect Record & Mancost Monitoring">
        <option value="Mancost Monitoring Only">
      </datalist>
    </div>
    <div class="col-sm-3">
      <!-- line no -->
      <label></label>
      <input type="text" id="line_no" class="form-control" placeholder="Line No." autocomplete="off" style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;" class="pl-3">
    </div>
    <div class="col-sm-3">
      <!-- date from -->
      <label></label>
      <input type="text" name="date_from" class="form-control" id="date_from_search" placeholder="Date From" onfocus="(this.type='datetime-local')" onblur="(this.type='text')" style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px;">
    </div>
    <div class="col-sm-3">
      <!-- date to -->
      <label></label>
      <input type="text" name="date_to" class="form-control" id="date_to_search" placeholder="Date To" onfocus="(this.type='datetime-local')" onblur="(this.type='text')" style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px;">
    </div>
  </div>

  <div class="row">
    <div class="col-sm-3">
      <!-- defect category -->
      <label></label>
      <input list="defect_list" name="defect_category" id="defect_category" autocomplete="off" placeholder="Defect Category" style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;" class="pl-3">
      <datalist id="defect_list">
        <!--  -->
      </datalist>
    </div>
    <div class="col-sm-3">
      <!-- search keyword -->
      <label></label>
      <input type="text" id="keyword_search" class="form-control" placeholder="Enter Keyword" autocomplete="off" style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;" class="pl-3">
    </div>
    <div class="col-sm-3">
      <!-- search button -->
      <label></label>
      <button class="btn btn-block d-flex justify-content-left" id="search_btn" onclick="" style="color:#fff;height:34px;border-radius:.25rem;background: #425B2C;font-size:15px;font-weight:normal;"><img src="../../dist/img/search.png" style="height:19px;">&nbsp;&nbsp;Search</button>
    </div>
    <div class="col-sm-3">
      <!-- export button -->
      <label></label>
      <button class="btn btn-block d-flex justify-content-left" id="search_btn" onclick="" style="color:#fff;height:34px;border-radius:.25rem;background: #334C69;font-size:15px;font-weight:normal;"><img src="../../dist/img/export.png" style="height:19px;">&nbsp;&nbsp;Export</button>
    </div>
  </div>

  <div class="row">
    <div class="col mt-4" style="color: #425B2C; font-weight:bold;">
      <!-- table switching navigation -->
      Defect Record
    </div>
    <div class="col-sm-3">
      <!-- view total count of data from table -->
      <span id="count_view"></span>
    </div>
  </div>

  <!-- table -->
  <div class="card-body table-responsive m-0 p-0">
    <table class="table col-12 mt-3 table-head-fixed text-nowrap table-hover" id="" style="background: #F9F9F9;">
      <thead style="text-align: center;">
        <!-- table switching content -->
        <th>#</th>
        <th>Line No.</th>
        <th>Date Detected</th>
        <th>Issue No. Tag</th>
        <th>Repairing Date</th>
        <th>Product Name</th>
        <th>Lot No.</th>
        <th>Serial No.</th>
        <th>Discovery Process</th>
        <th>Discovery ID Number</th>
        <th>Discovery Person</th>
        <th>Occurrence Process</th>
        <th>Occurrence Shift</th>
        <th>Occurrence ID Number</th>
        <th>Occurrence Person</th>
        <th>Outflow Process</th>
        <th>Outflow Shift</th>
        <th>Outflow ID Number</th>
        <th>Outflow Person</th>
        <th>Defect Category</th>
        <th>Sequence Number</th>
        <th>Cause of Defect</th>
        <th>Detail in Content of Defect</th>
        <th>Treatment Content of Defect</th>
        <th>Dis-assembled/Dis-inserted by: (Repair Person)</th>
      </thead>
      <tbody class="mb-0" id="">
        <tr>
          <td colspan="10" style="text-align: center;">
            <div class="spinner-border text-dark" role="status">
              <span class="sr-only">Loading...</span>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>



<div class="card-body table-responsive m-0 p-0" style="max-height: 500px;overflow: auto; display:inline-block;">
  <table class="table col-12 mt-3 table-head-fixed text-nowrap table-hover" id="" style="background: #F9F9F9;">
    <thead style="text-align: center;">
      <!-- table switching content -->
      <th>#</th>
      <th>Line No.</th>
      <th>Date Detected</th>
      <th>Issue No. Tag</th>
      <th>Repairing Date</th>
      <th>Product Name</th>
      <th>Lot No.</th>
      <th>Serial No.</th>
      <th>Discovery Process</th>
      <th>Discovery ID Number</th>
      <th>Discovery Person</th>
      <th>Occurrence Process</th>
      <th>Occurrence Shift</th>
      <th>Occurrence ID Number</th>
      <th>Occurrence Person</th>
      <th>Outflow Process</th>
      <th>Outflow Shift</th>
      <th>Outflow ID Number</th>
      <th>Outflow Person</th>
      <th>Defect Category</th>
      <th>Sequence Number</th>
      <th>Cause of Defect</th>
      <th>Detail in Content of Defect</th>
      <th>Treatment Content of Defect</th>
      <th>Dis-assembled/Dis-inserted by: (Repair Person)</th>
    </thead>
    <tbody class="mb-0" id="">
      <tr>
        <td colspan="11" style="text-align: center;">
          <div class="spinner-border text-dark" role="status">
            <span class="sr-only">Loading...</span>
          </div>
        </td>
      </tr>
    </tbody>
  </table>
</div>


<script type="text/javascript">
  $(document).ready(function () {
      load_defect_table();
      load_added_mancost();
      fetch_opt_category_dr();
      // fetch_opt_car_maker_dr();
      fetch_opt_discovery_process();
      // fetch_opt_parts_removed();
      fetch_opt_occurrence_process();
      fetch_opt_occurrence_shift();
      fetch_opt_outflow_process();
      fetch_opt_outflow_shift();
      fetch_opt_defect_category();
      fetch_opt_defect_cause();
      fetch_opt_repair_person();
      fetch_opt_defect_category_mc();
      fetch_opt_occurrence_process_mc();
      fetch_opt_portion_treatment();
      fetch_opt_defect_category_mc_only();
      fetch_opt_occurrence_process_mc_only();
      fetch_opt_portion_treatment_mc_only();
  });

  // ==================================================================
  // fetch line category mancost option
  const fetch_opt_category_dr = () => {
      $.ajax({
          url: '../../process/user/defect_monitoring_record_rp/defect_monitoring_record_rp_p.php',
          type: 'POST',
          cache: false,
          data: {
              method: 'fetch_opt_category_dr',
          },
          success: function (response) {
              $('#categoryList').html(response);
          }
      });
  }

  // fetch defect category mancost option
  // const fetch_opt_car_maker_dr = () => {
  //     $.ajax({
  //         url: '../../process/user/defect_monitoring_record_rp/defect_monitoring_record_rp_p.php',
  //         type: 'POST',
  //         cache: false,
  //         data: {
  //             method: 'fetch_opt_car_maker_dr',
  //         },
  //         success: function (response) {
  //             $('#carMakerList').html(response);
  //         }
  //     });
  // }

  // fetch option discovery process
  const fetch_opt_discovery_process = () => {
      $.ajax({
          url: '../../process/user/defect_monitoring_record_rp/defect_monitoring_record_rp_p.php',
          type: 'POST',
          cache: false,
          data: {
              method: 'fetch_opt_discovery_process',
          },
          success: function (response) {
              $('#discoveryProcessDrList').html(response);
          }
      });
  }

  // fetch option parts removed
  // const fetch_opt_parts_removed = () => {
  //     $.ajax({
  //         url: '../../process/user/defect_monitoring_record_rp/defect_monitoring_record_rp_p.php',
  //         type: 'POST',
  //         cache: false,
  //         data: {
  //             method: 'fetch_opt_parts_removed',
  //         },
  //         success: function (response) {
  //             $('#partsRemovedMcList').html(response);
  //         }
  //     });
  // }

  // fetch option occurrence process
  const fetch_opt_occurrence_process = () => {
      $.ajax({
          url: '../../process/user/defect_monitoring_record_rp/defect_monitoring_record_rp_p.php',
          type: 'POST',
          cache: false,
          data: {
              method: 'fetch_opt_occurrence_process',
          },
          success: function (response) {
              $('#occurrenceProcessDrList').html(response);
          }
      });
  }

  // fetch option occurrence shift
  const fetch_opt_occurrence_shift = () => {
      $.ajax({
          url: '../../process/user/defect_monitoring_record_rp/defect_monitoring_record_rp_p.php',
          type: 'POST',
          cache: false,
          data: {
              method: 'fetch_opt_occurrence_shift',
          },
          success: function (response) {
              $('#occurrenceShiftDrList').html(response);
          }
      });
  }

  // fetch option outflow process
  const fetch_opt_outflow_process = () => {
      $.ajax({
          url: '../../process/user/defect_monitoring_record_rp/defect_monitoring_record_rp_p.php',
          type: 'POST',
          cache: false,
          data: {
              method: 'fetch_opt_outflow_process',
          },
          success: function (response) {
              $('#outflowProcessDrList').html(response);
          }
      });
  }

  // fetch option outflow shift
  const fetch_opt_outflow_shift = () => {
      $.ajax({
          url: '../../process/user/defect_monitoring_record_rp/defect_monitoring_record_rp_p.php',
          type: 'POST',
          cache: false,
          data: {
              method: 'fetch_opt_outflow_shift',
          },
          success: function (response) {
              $('#outflowShiftDrList').html(response);
          }
      });
  }

  // fetch option defect category ng content
  const fetch_opt_defect_category = () => {
      $.ajax({
          url: '../../process/user/defect_monitoring_record_rp/defect_monitoring_record_rp_p.php',
          type: 'POST',
          cache: false,
          data: {
              method: 'fetch_opt_defect_category',
          },
          success: function (response) {
              $('#defectCategoryDrList').html(response);
          }
      });
  }

  // fetch option cause of defect
  const fetch_opt_defect_cause = () => {
      $.ajax({
          url: '../../process/user/defect_monitoring_record_rp/defect_monitoring_record_rp_p.php',
          type: 'POST',
          cache: false,
          data: {
              method: 'fetch_opt_defect_cause',
          },
          success: function (response) {
              $('#defectCauseDrList').html(response);
          }
      });
  }

  // fetch option repair person
  const fetch_opt_repair_person = () => {
      $.ajax({
          url: '../../process/user/defect_monitoring_record_rp/defect_monitoring_record_rp_p.php',
          type: 'POST',
          cache: false,
          data: {
              method: 'fetch_opt_repair_person',
          },
          success: function (response) {
              $('#repairPersonDrList').html(response);
          }
      });
  }

  // fetch option defect category mancost
  const fetch_opt_defect_category_mc = () => {
      $.ajax({
          url: '../../process/user/defect_monitoring_record_rp/defect_monitoring_record_rp_p.php',
          type: 'POST',
          cache: false,
          data: {
              method: 'fetch_opt_defect_category_mc',
          },
          success: function (response) {
              $('#defectCategoryMcList').html(response);
          }
      });
  }

  // fetch option occurrence process mancost
  const fetch_opt_occurrence_process_mc = () => {
      $.ajax({
          url: '../../process/user/defect_monitoring_record_rp/defect_monitoring_record_rp_p.php',
          type: 'POST',
          cache: false,
          data: {
              method: 'fetch_opt_occurrence_process_mc',
          },
          success: function (response) {
              $('#occurrenceProcessMcList').html(response);
          }
      });
  }

  // fetch option portion treatment
  const fetch_opt_portion_treatment = () => {
      $.ajax({
          url: '../../process/user/defect_monitoring_record_rp/defect_monitoring_record_rp_p.php',
          type: 'POST',
          cache: false,
          data: {
              method: 'fetch_opt_portion_treatment',
          },
          success: function (response) {
              $('#portionTreatmentMcList').html(response);
          }
      });
  }

  // fetch option defect category mancost only
  const fetch_opt_defect_category_mc_only = () => {
      $.ajax({
          url: '../../process/user/defect_monitoring_record_rp/defect_monitoring_record_rp_p.php',
          type: 'POST',
          cache: false,
          data: {
              method: 'fetch_opt_defect_category_mc_only',
          },
          success: function (response) {
              $('#defect_category_mc_only').html(response);
          }
      });
  }

  // fetch option occurrence process mancost only
  const fetch_opt_occurrence_process_mc_only = () => {
      $.ajax({
          url: '../../process/user/defect_monitoring_record_rp/defect_monitoring_record_rp_p.php',
          type: 'POST',
          cache: false,
          data: {
              method: 'fetch_opt_occurrence_process_mc_only',
          },
          success: function (response) {
              $('#occurrence_process_mc_only').html(response);
          }
      });
  }

  // fetch option portion treatment mancost only
  const fetch_opt_portion_treatment_mc_only = () => {
      $.ajax({
          url: '../../process/user/defect_monitoring_record_rp/defect_monitoring_record_rp_p.php',
          type: 'POST',
          cache: false,
          data: {
              method: 'fetch_opt_portion_treatment_mc_only',
          },
          success: function (response) {
              $('#portion_treatment_mc_only').html(response);
          }
      });
  }

  // ==================================================================

  //fetch defect record table
  const load_defect_table = () => {
      $.ajax({
          url: '../../process/user/defect_monitoring_record_rp/defect_monitoring_record_rp_p.php',
          type: 'POST',
          cache: false,
          data: {
              method: 'load_defect_table'
          },
          beforeSend: () => {
              var loading = `<tr id="loading"><td colspan="10" style="text-align:center;"><div class="spinner-border text-dark" role="status"><span class="sr-only">Loading...</span></div></td></tr>`;
              document.getElementById("defect_table").innerHTML = loading;
          },
          success: function (response) {
              $('#loading').remove();
              $('#defect_table').html(response);
              $('#defect_id').html('');
              $('#t_defect_breadcrumb').hide();
          }
      });
  }

  // fetch manpower and material cost monitoring
  const load_mancost_table = param => {
      var string = param.split('~!~');
      var id = string[0];
      var defect_id = string[1];

      $.ajax({
          url: '../../process/user/defect_monitoring_record_rp/defect_monitoring_record_rp_p.php',
          type: 'POST',
          cache: false,
          data: {
              method: 'load_mancost_table',
              defect_id: defect_id
          },
          beforeSend: () => {
              var loading = `<tr id="loading"><td colspan="10" style="text-align:center;"><div class="spinner-border text-dark" role="status"><span class="sr-only">Loading...</span></div></td></tr>`;
              document.getElementById("defect_table").innerHTML = loading;
          },
          success: function (response) {
              $('#loading').remove();
              $('#defect_table').html(response);
              $('#defect_id').html("Mancost Monitoring");
              $('#t_defect_breadcrumb').show();
          }
      });
  }

  // compute the time consumed in mancost monitoring
  // const time_difference = () => {
  //     var repair_start = document.getElementById('repair_start_mc').value;
  //     var repair_end = document.getElementById('repair_end_mc').value;

  //     var start = new Date("11/11/2023 " + repair_start);
  //     var end = new Date("11/11/2023 " + repair_end);

  //     if (end < start) {
  //         end.setDate(end.getDate() + 1);
  //     }

  //     var diff = end - start;

  //     var msec = diff;
  //     var hh = Math.floor(msec / 1000 / 60 / 60);
  //     msec -= hh * 1000 * 60 * 60;
  //     var mm = Math.floor(msec / 1000 / 60);
  //     msec -= mm * 1000 * 60;
  //     var ss = Math.floor(msec / 1000);
  //     msec -= ss * 1000;

  //     var result = ("0" + hh).slice(-2) + ":" + ("0" + mm).slice(-2);
  //     document.getElementById("time_consumed_mc").value = result;

  //     console.log(repair_start);
  //     console.log(repair_end);
  //     console.log(result);
  // }

  const time_difference = () => {
      var repair_start = document.getElementById('repair_start_mc').value;
      var repair_end = document.getElementById('repair_end_mc').value;

      var start = new Date("11/11/2023 " + repair_start);
      var end = new Date("11/11/2023 " + repair_end);

      if (end < start) {
          end.setDate(end.getDate() + 1);
      }

      var diffInMilliseconds = end - start;
      var diffInMinutes = Math.floor(diffInMilliseconds / (1000 * 60)); // Round down to the nearest whole minute

      // Set the result in the 'time_consumed_mc' field as integer
      document.getElementById("time_consumed_mc").value = diffInMinutes;

      // Your salary cost (replace with your actual salary cost)
      var salaryCost = 0.72;

      // Calculate manhour cost
      var manhourCost = ((diffInMinutes / 60) / salaryCost * 60).toFixed(2);

      document.getElementById("salary_cost_mc").value = salaryCost;
      document.getElementById("manhour_cost_mc").value = manhourCost;

      console.log("Time Consumed (Integer):", diffInMinutes);
      console.log("Manhour Cost:", manhourCost);
  }


  // compute the material cost in mancost monitoring
  const qty_cost_product = () => {
      var quantity = document.getElementById('quantity_mc').value;
      var unit_cost = document.getElementById('unit_cost_mc').value;

      var quantity_input = parseFloat(quantity);
      if (isNaN(quantity_input)) quantity_input = 0;

      var unit_cost_input = parseFloat(unit_cost);
      if (isNaN(unit_cost_input)) unit_cost_input = 0;

      var result = quantity_input * unit_cost_input;
      result = result.toFixed(2); // two decimal places

      document.getElementById("material_cost_mc").value = result;

      console.log(quantity);
      console.log(unit_cost);
      console.log(result);
  }



  // ISSUE TAG NUMBER FUNCTION, INCREMENTS DEPENDING ON THE LINE NUMBER
  document.getElementById("line_no").addEventListener("input", function () {
      update_issue_tag(this.value);
      update_car_maker(this.value); // update car maker based on line number
  });

  function update_car_maker(line_no) {
      var car_maker_input = document.getElementById("car_maker");

      if (line_no.trim().startsWith('1')) {
          car_maker_input.value = 'Mazda';
          return;
      }

      if (line_no.trim().startsWith('2')) {
          car_maker_input.value = 'Daihatsu';
          return;
      }

      if (line_no.trim().startsWith('3')) {
          car_maker_input.value = 'Honda';
          return;
      }

      if (line_no.trim().startsWith('4')) {
          car_maker_input.value = 'Toyota';
          return;
      }

      if (line_no.trim().startsWith('5')) {
          car_maker_input.value = 'Suzuki';
          return;
      }

      if (line_no.trim().startsWith('6')) {
          car_maker_input.value = 'Nissan';
          return;
      }

      if (line_no.trim().startsWith('7')) {
          car_maker_input.value = 'Subaru';
          return;
      }

      $.ajax({
          url: '../../process/user/defect_monitoring_record_rp/defect_monitoring_record_rp_p.php',
          type: 'POST',
          cache: false,
          data: {
              method: 'get_car_maker',
              line_no: line_no
          },
          success: function (response) {
              car_maker_input.value = response; // Update the car maker input field
              handleCarMakerChange(car_maker_input); // Trigger car maker change event
          },
          error: function () {
              // Handle error if necessary
              console.error('Failed to get the car maker');
          }
      });
  }

  // qr scan function
  function handleCarMakerChange(car_maker_input) {
      var carMaker = car_maker_input.value;        

          // Trigger the corresponding scan function based on car maker
          switch (carMaker) {
              case 'Mazda':
                  handleMazdaScan();
                  break;
              case 'Daihatsu':
                  handleDaihatsuScan();
                  break;
              case 'Honda':
                  handleHondaScan();
                  break;
              case 'Toyota':
                  handleToyotaScan();
                  break;
              case 'Suzuki':
                  handleSuzukiScan();
                  break;
              case 'Nissan':
                  handleNissanScan();
                  break;
              case 'Subaru':
                  handleSubaruScan();
                  break;
              // Add cases for other car makers if needed
              default:
                  // Handle other cases
                  break;
          }
      } else {
          document.getElementById('qr_scan').disabled = true;
      }
  }

  function handleHondaScan() {
      console.log('honda is selected');
      document.getElementById('qr_scan').addEventListener('keydown', function (e) {
          if (e.which === 13) {
              e.preventDefault();
              var qrCode = this.value;
              if (qrCode.length === 41) {
                  document.getElementById('product_name').value = qrCode.substring(1, 22);
                  document.getElementById('lot_no').value = qrCode.substring(26, 33);
                  document.getElementById('serial_no').value = qrCode.substring(32, 38);
              } else {
                  // alert('Invalid QR code');
                  Swal.fire({
                      icon: 'error',
                      title: 'Invalid QR Code',
                      text: 'Invalid',
                      showConfirmButton: false,
                      timer: 1000
                  });
              } document.getElementById('qr_scan').value = '';
          }
      });

      // document.getElementById('qr_scan').addEventListener('input', function () {
      //     var qrCode = this.value;
      //     if (qrCode.length === 41) {
      //         document.getElementById('product_name').value = qrCode.substring(2, 22);
      //         document.getElementById('lot_no').value = qrCode.substring(27, 33);
      //         document.getElementById('serial_no').value = qrCode.substring(33, 38);
      //     } else {
      //         // alert('Invalid QR code');
      //         Swal.fire({
      //             icon: 'error',
      //             title: 'Invalid QR Code',
      //             text: 'Invalid',
      //             showConfirmButton: false,
      //             timer: 1000
      //         });
      //     } document.getElementById('qr_scan').value = '';
      // });
  }

  function handleMazdaScan() {
      console.log('mazda is selected');
      document.getElementById('qr_scan').addEventListener('keydown', function (e) {
          if (e.which === 13) {
              e.preventDefault();
              var qrCode = this.value;
              if (qrCode.length === 41) {
                  document.getElementById('product_name').value = qrCode.substring(1, 22);
                  document.getElementById('lot_no').value = qrCode.substring(26, 33);
                  document.getElementById('serial_no').value = qrCode.substring(32, 38);
              } else {
                  // alert('Invalid QR code');
                  Swal.fire({
                      icon: 'error',
                      title: 'Invalid QR Code',
                      text: 'Invalid',
                      showConfirmButton: false,
                      timer: 1000
                  });
              } document.getElementById('qr_scan').value = '';
          }
      });
  }

  function handleNissanScan() {
      console.log('nissan is selected');
      document.getElementById('qr_scan').addEventListener('keydown', function (e) {
          if (e.which === 13) {
              e.preventDefault();
              var qrCode = this.value;
              if (qrCode.length === 41) {
                  document.getElementById('product_name').value = qrCode.substring(1, 22);
                  document.getElementById('lot_no').value = qrCode.substring(26, 33);
                  document.getElementById('serial_no').value = qrCode.substring(32, 38);
              } else {
                  // alert('Invalid QR code');
                  Swal.fire({
                      icon: 'error',
                      title: 'Invalid QR Code',
                      text: 'Invalid',
                      showConfirmButton: false,
                      timer: 1000
                  });
              } document.getElementById('qr_scan').value = '';
          }
      });
  }

  function handleSubaruScan() {
      console.log('subaru is selected');
      document.getElementById('qr_scan').addEventListener('keydown', function (e) {
          if (e.which === 13) {
              e.preventDefault();
              var qrCode = this.value;
              if (qrCode.length === 41) {
                  document.getElementById('product_name').value = qrCode.substring(1, 22);
                  document.getElementById('lot_no').value = qrCode.substring(26, 33);
                  document.getElementById('serial_no').value = qrCode.substring(32, 38);
              } else {
                  // alert('Invalid QR code');
                  Swal.fire({
                      icon: 'error',
                      title: 'Invalid QR Code',
                      text: 'Invalid',
                      showConfirmButton: false,
                      timer: 1000
                  });
              } document.getElementById('qr_scan').value = '';
          }
      });
  }

  function handleSuzukiScan() {
      console.log('suzuki is selected');
      document.getElementById('qr_scan').addEventListener('keydown', function (e) {
          if (e.which === 13) {
              e.preventDefault();
              var qrCode = this.value;
              if (qrCode.length === 41) {
                  document.getElementById('product_name').value = qrCode.substring(1, 22);
                  document.getElementById('lot_no').value = qrCode.substring(26, 33);
                  document.getElementById('serial_no').value = qrCode.substring(32, 38);
              } else {
                  // alert('Invalid QR code');
                  Swal.fire({
                      icon: 'error',
                      title: 'Invalid QR Code',
                      text: 'Invalid',
                      showConfirmButton: false,
                      timer: 1000
                  });
              } document.getElementById('qr_scan').value = '';
          }
      });
  }

  function handleToyotaScan() {
      console.log('toyota is selected');
      document.getElementById('qr_scan').addEventListener('keydown', function (e) {
          if (e.which === 13) {
              e.preventDefault();
              var qrCode = this.value;
              if (qrCode.length === 41) {
                  document.getElementById('product_name').value = qrCode.substring(1, 22);
                  document.getElementById('lot_no').value = qrCode.substring(26, 33);
                  document.getElementById('serial_no').value = qrCode.substring(32, 38);
              } else {
                  // alert('Invalid QR code');
                  Swal.fire({
                      icon: 'error',
                      title: 'Invalid QR Code',
                      text: 'Invalid',
                      showConfirmButton: false,
                      timer: 1000
                  });
              } document.getElementById('qr_scan').value = '';
          }
      });
  }

  function handleDaihatsuScan() {
      console.log('daihatsu is selected');
      document.getElementById('qr_scan').addEventListener('keydown', function (e) {
          if (e.which === 13) {
              e.preventDefault();
              var qrCode = this.value;
              if (qrCode.length === 41) {
                  document.getElementById('product_name').value = qrCode.substring(1, 22);
                  document.getElementById('lot_no').value = qrCode.substring(26, 33);
                  document.getElementById('serial_no').value = qrCode.substring(32, 38);
              } else {
                  // alert('Invalid QR code');
                  Swal.fire({
                      icon: 'error',
                      title: 'Invalid QR Code',
                      text: 'Invalid',
                      showConfirmButton: false,
                      timer: 1000
                  });
              } document.getElementById('qr_scan').value = '';
          }
      });
  }

  function update_issue_tag(line_no) {
      var issue_tag_input = document.getElementById("issue_tag");

      // Clear the issue tag field if the line number is empty
      if (line_no.trim() === '') {
          issue_tag_input.value = '';
          return;
      }

      $.ajax({
          url: '../../process/user/defect_monitoring_record_rp/defect_monitoring_record_rp_p.php',
          type: 'POST',
          cache: false,
          data: {
              method: 'get_issue_tag',
              line_no: line_no
          },
          success: function (response) {
              issue_tag_input.value = response; // Update the issue tag input field
          },
          error: function () {
              // Handle error if necessary
              console.error('Failed to get the issue tag');
          }
      });
  }





  // document.getElementById("line_no").addEventListener("input", function () {
  //     update_issue_tag(this.value);
  // });

  // function update_issue_tag(line_no) {
  //     var issue_tag_input = document.getElementById("issue_tag");

  //     // Clear the issue tag field if the line number is empty
  //     if (line_no.trim() === '') {
  //         issue_tag_input.value = '';
  //         return;
  //     }

  //     $.ajax({
  //         url: '../../process/user/defect_monitoring_record_rp/defect_monitoring_record_rp_p.php',
  //         type: 'POST',
  //         cache: false,
  //         data: {
  //             method: 'get_issue_tag',
  //             line_no: line_no
  //         },
  //         success: function (response) {
  //             issue_tag_input.value = response; // Update the issue tag input field
  //         }
  //     });
  // }



  function get_issue_tag_no(line_no) {
      // Simulate the issue tag incrementation on the client side
      if (!getIssueTag.counter) {
          getIssueTag.counter = 1;
      } else {
          getIssueTag.counter++;
      }
      return getIssueTag.counter;
  }

  // Function to clear input fields
  function clearInputFields() {
      var inputFieldIds = ['issue_tag', 'car_maker'];
      for (var i = 0; i < inputFieldIds.length; i++) {
          var fieldId = inputFieldIds[i];
          document.getElementById(fieldId).value = '';
      }
  }

  // add defect record and mancost
  const add_defect_mancost_record = () => {
      var line_no = document.getElementById("line_no").value.trim();
      var line_category_dr = document.getElementById("line_category_dr").value.trim();

      var date_detected = document.getElementById("date_detected").value.trim();
      // var issue_tag = document.getElementById("issue_tag").value.trim();
      var repairing_date = document.getElementById("repairing_date").value.trim();
      var car_maker = document.getElementById("car_maker").value.trim();
      // var qr_scan = document.getElementById("qr_scan").value.trim();
      var product_name = document.getElementById("product_name").value.trim();
      var lot_no = document.getElementById("lot_no").value.trim();
      var serial_no = document.getElementById("serial_no").value.trim();
      var discovery_process_dr = document.getElementById("discovery_process_dr").value.trim();
      var discovery_id_no_dr = document.getElementById("discovery_id_no_dr").value.trim();
      var discovery_person = document.getElementById("discovery_person").value.trim();
      var occurrence_process_dr = document.getElementById("occurrence_process_dr").value.trim();
      var occurrence_shift_dr = document.getElementById("occurrence_shift_dr").value.trim();
      var occurrence_id_no_dr = document.getElementById("occurrence_id_no_dr").value.trim();
      var occurrence_person = document.getElementById("occurrence_person").value.trim();
      var outflow_process_dr = document.getElementById("outflow_process_dr").value.trim();
      var outflow_shift_dr = document.getElementById("outflow_shift_dr").value.trim();
      var outflow_id_no_dr = document.getElementById("outflow_id_no_dr").value.trim();
      var outflow_person = document.getElementById("outflow_person").value.trim();
      var defect_category_dr = document.getElementById("defect_category_dr").value.trim();
      var sequence_no = document.getElementById("sequence_no").value.trim();
      var defect_cause_dr = document.getElementById("defect_cause_dr").value.trim();
      var repair_person_dr = document.getElementById("repair_person_dr").value.trim();
      var detail_content_defect = document.getElementById("detail_content_defect").value.trim();
      var treatment_content_defect = document.getElementById("treatment_content_defect").value.trim();
      // ==================================================================================================
      // ==================================================================================================
      var repair_start_mc = document.getElementById("repair_start_mc").value.trim();
      var repair_end_mc = document.getElementById("repair_end_mc").value.trim();
      var time_consumed_mc = document.getElementById("time_consumed_mc").value;
      var defect_category_mc = document.getElementById("defect_category_mc").value.trim();
      var occurrence_process_mc = document.getElementById("occurrence_process_mc").value.trim();
      var parts_removed_mc = document.getElementById("parts_removed_mc").value.trim();
      var quantity_mc = document.getElementById("quantity_mc").value.trim();
      var unit_cost_mc = document.getElementById("unit_cost_mc").value.trim();
      var material_cost_mc = document.getElementById("material_cost_mc").value;
      var manhour_cost_mc = document.getElementById("manhour_cost_mc").value;
      var portion_treatment = document.getElementById("portion_treatment").value.trim();

      var defect_id = document.getElementById('defect_id_no').value;

      console.log(defect_id);

      $.ajax({
          url: '../../process/user/defect_monitoring_record_rp/defect_monitoring_record_rp_p.php',
          type: 'POST',
          cache: false,
          data: {
              method: 'add_defect_mancost_record',
              line_no: line_no,
              line_category_dr: line_category_dr,
              date_detected: date_detected,
              // issue_tag: issue_tag,
              repairing_date: repairing_date,
              car_maker: car_maker,
              // qr_scan:qr_scan,
              product_name: product_name,
              lot_no: lot_no,
              serial_no: serial_no,
              discovery_process_dr: discovery_process_dr,
              discovery_id_no_dr: discovery_id_no_dr,
              discovery_person: discovery_person,
              occurrence_process_dr: occurrence_process_dr,
              occurrence_shift_dr: occurrence_shift_dr,
              occurrence_id_no_dr: occurrence_id_no_dr,
              occurrence_person: occurrence_person,
              outflow_process_dr: outflow_process_dr,
              outflow_shift_dr: outflow_shift_dr,
              outflow_id_no_dr: outflow_id_no_dr,
              outflow_person: outflow_person,
              defect_category_dr: defect_category_dr,
              sequence_no: sequence_no,
              defect_cause_dr: defect_cause_dr,
              repair_person_dr: repair_person_dr,
              detail_content_defect: detail_content_defect,
              treatment_content_defect: treatment_content_defect,
              // ======================================================
              repair_start_mc: repair_start_mc,
              repair_end_mc: repair_end_mc,
              time_consumed_mc: time_consumed_mc,
              defect_category_mc: defect_category_mc,
              occurrence_process_mc: occurrence_process_mc,
              parts_removed_mc: parts_removed_mc,
              quantity_mc: quantity_mc,
              unit_cost_mc: unit_cost_mc,
              material_cost_mc: material_cost_mc,
              manhour_cost_mc: manhour_cost_mc,
              portion_treatment: portion_treatment,
              defect_id: defect_id
          },
          success: function (response) {
              if (response == 'success') {
                  Swal.fire({
                      icon: 'success',
                      title: 'Successfully Recorded',
                      text: 'Success',
                      showConfirmButton: false,
                      timer: 1500
                  });
                  $('#line_no').val('');
                  $('#line_category_dr').val('');
                  $('#date_detected').val('');
                  // $('#issue_tag').val('');
                  $('#repairing_date').val('');
                  // $('#').val('');
                  $('#product_name').val('');
                  $('#lot_no').val('');
                  $('#serial_no').val('');
                  $('#discovery_process_dr').val('');
                  $('#discovery_id_no_dr').val('');
                  $('#discovery_person').val('');
                  $('#occurrence_process_dr').val('');
                  $('#occurrence_shift_dr').val('');
                  $('#occurrence_id_no_dr').val('');
                  $('#occurrence_person').val('');
                  $('#outflow_process_dr').val('');
                  $('#outflow_shift_dr').val('');
                  $('#outflow_id_no_dr').val('');
                  $('#outflow_person').val('');
                  $('#defect_category_dr').val('');
                  $('#sequence_no').val('');
                  $('#defect_cause_dr').val('');
                  $('#repair_person_dr').val('');
                  $('#detail_content_defect').val('');
                  $('#treatment_content_defect').val('');
                  // ===============================================================
                  $('#repair_start_mc').val('');
                  $('#repair_end_mc').val('');
                  $('#time_consumed_mc').val('');
                  $('#defect_category_mc').val('');
                  $('#occurrence_process_mc').val('');
                  $('#parts_removed_mc').val('');
                  $('#quantity_mc').val('');
                  $('#unit_cost_mc').val('');
                  $('#material_cost_mc').val('');
                  $('#manhour_cost_mc').val('');
                  $('#portion_treatment').val('');

                  $('#defect_id').val('');

                  clearInputFields();
                  load_defect_table();

                  // clear the modal table
                  $('#list_of_multiple_mancost tbody').empty();

                  $('#add_defect_mancost_2').modal('hide');
              }
              // else if (response == 'Already Exist') {
              //     Swal.fire({
              //         icon: 'info',
              //         title: 'Duplicate Data',
              //         text: 'Information',
              //         showConfirmButton: false,
              //         timer: 2500
              //     });
              // } 
              else {
                  Swal.fire({
                      icon: 'error',
                      title: 'Error',
                      text: 'Error',
                      showConfirmButton: false,
                      timer: 2500
                  });
              }
          }
      });
      // }
  }

  // --------------------------------------------
  // highlight input field when empty
  document.getElementById("line_no").addEventListener("input", function () {
      var line_no = this;
      line_no.classList.remove('highlight');
      document.getElementById("lineError").style.display = 'none';
  })

  document.getElementById("line_category_dr").addEventListener("input", function () {
      var line_category_dr = this;
      line_category_dr.classList.remove('highlight');
      document.getElementById("lineCategoryError").style.display = 'none';
  })

  document.getElementById("date_detected").addEventListener("input", function () {
      var date_detected = this;
      date_detected.classList.remove('highlight');
      document.getElementById("dateDetectedError").style.display = 'none';
  })

  document.getElementById("issue_tag").addEventListener("input", function () {
      var issue_tag = this;
      issue_tag.classList.remove('highlight');
      // document.getElementById("issueTagError").style.display = 'none';
  })

  document.getElementById("repairing_date").addEventListener("input", function () {
      var repairing_date = this;
      repairing_date.classList.remove('highlight');
      document.getElementById("repairingDateError").style.display = 'none';
  })

  document.getElementById("car_maker").addEventListener("input", function () {
      var car_maker = this;
      car_maker.classList.remove('highlight');
      document.getElementById("carMakerError").style.display = 'none';
  })

  document.getElementById("qr_scan").addEventListener("input", function () {
      var qr_scan = this;
      qr_scan.classList.remove('highlight');
      document.getElementById("scanQrError").style.display = 'none';
  })

  document.getElementById("product_name").addEventListener("keyup", function (e) {
      var product_name = this;
      product_name.classList.remove('highlight');
      // document.getElementById("productNameError").style.display = 'none';
  })

  document.getElementById("lot_no").addEventListener("keyup", function (e) {
      var lot_no = this;
      lot_no.classList.remove('highlight');
      // document.getElementById("lotNumberError").style.display = 'none';
  })

  document.getElementById("serial_no").addEventListener("keyup", function (e) {
      var serial_no = this;
      serial_no.classList.remove('highlight');
      // document.getElementById("serialNumberError").style.display = 'none';
  })

  document.getElementById("discovery_process_dr").addEventListener("input", function () {
      var discovery_process_dr = this;
      discovery_process_dr.classList.remove('highlight');
      document.getElementById("discoveryProcessError").style.display = 'none';
  })

  document.getElementById("discovery_id_no_dr").addEventListener("input", function () {
      var discovery_id_no_dr = this;
      discovery_id_no_dr.classList.remove('highlight');
      document.getElementById("discoveryIDError").style.display = 'none';
  })

  document.getElementById("discovery_person").addEventListener("input", function () {
      var discovery_person = this;
      discovery_person.classList.remove('highlight');
      document.getElementById("discoveryPersonError").style.display = 'none';
  })

  document.getElementById("occurrence_process_dr").addEventListener("input", function () {
      var occurrence_process_dr = this;
      occurrence_process_dr.classList.remove('highlight');
      document.getElementById("occurrenceProcessError").style.display = 'none';
  })

  document.getElementById("occurrence_shift_dr").addEventListener("input", function () {
      var occurrence_shift_dr = this;
      occurrence_shift_dr.classList.remove('highlight');
      document.getElementById("occurrenceShiftError").style.display = 'none';
  })

  document.getElementById("occurrence_id_no_dr").addEventListener("input", function () {
      var occurrence_id_no_dr = this;
      occurrence_id_no_dr.classList.remove('highlight');
      document.getElementById("occurrenceIDError").style.display = 'none';
  })

  document.getElementById("occurrence_person").addEventListener("input", function () {
      var occurrence_person = this;
      occurrence_person.classList.remove('highlight');
      document.getElementById("occurrencePersonError").style.display = 'none';
  })

  document.getElementById("outflow_process_dr").addEventListener("input", function () {
      var outflow_process_dr = this;
      outflow_process_dr.classList.remove('highlight');
      document.getElementById("outflowProcessError").style.display = 'none';
  })

  document.getElementById("outflow_shift_dr").addEventListener("input", function () {
      var outflow_shift_dr = this;
      outflow_shift_dr.classList.remove('highlight');
      document.getElementById("outflowShiftError").style.display = 'none';
  })

  document.getElementById("outflow_id_no_dr").addEventListener("input", function () {
      var outflow_id_no_dr = this;
      outflow_id_no_dr.classList.remove('highlight');
      document.getElementById("outflowIDError").style.display = 'none';
  })

  document.getElementById("outflow_person").addEventListener("input", function () {
      var outflow_person = this;
      outflow_person.classList.remove('highlight');
      document.getElementById("outflowPersonError").style.display = 'none';
  })
  document.getElementById("defect_category_dr").addEventListener("input", function () {
      var defect_category_dr = this;
      defect_category_dr.classList.remove('highlight');
      document.getElementById("defectCategoryError").style.display = 'none';
  })
  document.getElementById("sequence_no").addEventListener("input", function () {
      var sequence_no = this;
      sequence_no.classList.remove('highlight');
      document.getElementById("sequenceNumberError").style.display = 'none';
  })
  document.getElementById("defect_cause_dr").addEventListener("input", function () {
      var defect_cause_dr = this;
      defect_cause_dr.classList.remove('highlight');
      document.getElementById("defectCauseError").style.display = 'none';
  })
  document.getElementById("repair_person_dr").addEventListener("input", function () {
      var repair_person_dr = this;
      repair_person_dr.classList.remove('highlight');
      document.getElementById("repairPersonError").style.display = 'none';
  })
  document.getElementById("detail_content_defect").addEventListener("input", function () {
      var detail_content_defect = this;
      detail_content_defect.classList.remove('highlight');
      document.getElementById("detailDefectError").style.display = 'none';
  })
  document.getElementById("treatment_content_defect").addEventListener("input", function () {
      var treatment_content_defect = this;
      treatment_content_defect.classList.remove('highlight');
      document.getElementById("treatmentDefectError").style.display = 'none';
  })

  // ------------------------------------------------------------------------

  // go to mancost form modal
  const go_to_mc_form = () => {
      var line_no = document.getElementById("line_no");
      var lineError = document.getElementById("lineError");

      var line_category_dr = document.getElementById("line_category_dr");
      var Error = document.getElementById("lineCategoryError");

      var date_detected = document.getElementById("date_detected");
      var dateDetectedError = document.getElementById("dateDetectedError");

      var issue_tag = document.getElementById("issue_tag");
      // var issueTagError = document.getElementById("issueTagError");

      var repairing_date = document.getElementById("repairing_date");
      var repairingDateError = document.getElementById("repairingDateError");

      var car_maker = document.getElementById("car_maker");
      var carMakerError = document.getElementById("carMakerError");

      // var qr_scan = document.getElementById("qr_scan");
      // var scanQrError = document.getElementById("scanQrError");

      var product_name = document.getElementById("product_name");
      // var productNameError = document.getElementById("productNameError");

      var lot_no = document.getElementById("lot_no");
      // var lotNumberError = document.getElementById("lotNumberError");

      var serial_no = document.getElementById("serial_no");
      // var serialNumberError = document.getElementById("serialNumberError");

      var discovery_process_dr = document.getElementById("discovery_process_dr");
      var discoveryProcessError = document.getElementById("discoveryProcessError");

      var discovery_id_no_dr = document.getElementById("discovery_id_no_dr");
      var discoveryIDError = document.getElementById("discoveryIDError");

      var discovery_person = document.getElementById("discovery_person");
      var discoveryPersonError = document.getElementById("discoveryPersonError");

      var occurrence_process_dr = document.getElementById("occurrence_process_dr");
      var occurrenceProcessError = document.getElementById("occurrenceProcessError");

      var occurrence_shift_dr = document.getElementById("occurrence_shift_dr");
      var occurrenceShiftError = document.getElementById("occurrenceShiftError");

      var occurrence_id_no_dr = document.getElementById("occurrence_id_no_dr");
      var occurrenceIDError = document.getElementById("occurrenceIDError");

      var occurrence_person = document.getElementById("occurrence_person");
      var occurrencePersonError = document.getElementById("occurrencePersonError");

      var outflow_process_dr = document.getElementById("outflow_process_dr");
      var outflowProcessError = document.getElementById("outflowProcessError");

      var outflow_shift_dr = document.getElementById("outflow_shift_dr");
      var outflowShiftError = document.getElementById("outflowShiftError");

      var outflow_id_no_dr = document.getElementById("outflow_id_no_dr");
      var outflowIDError = document.getElementById("outflowIDError");

      var outflow_person = document.getElementById("outflow_person");
      var outflowPersonError = document.getElementById("outflowPersonError");

      var defect_category_dr = document.getElementById("defect_category_dr");
      var defectCategoryError = document.getElementById("defectCategoryError");

      var sequence_no = document.getElementById("sequence_no");
      var sequenceNumberError = document.getElementById("sequenceNumberError");

      var defect_cause_dr = document.getElementById("defect_cause_dr");
      var defectCauseError = document.getElementById("defectCauseError");

      var repair_person_dr = document.getElementById("repair_person_dr");
      var repairPersonError = document.getElementById("repairPersonError");

      var detail_content_defect = document.getElementById("detail_content_defect");
      var detailDefectError = document.getElementById("detailDefectError");

      var treatment_content_defect = document.getElementById("treatment_content_defect");
      var treatmentDefectError = document.getElementById("treatmentDefectError");

      var defect_id = document.getElementById("defect_id_no");

      // console.log(line_no);

      if (line_no.value === '') {
          line_no.classList.add('highlight');
          lineError.style.display = 'block';
      }
      if (line_category_dr.value === '') {
          line_category_dr.classList.add('highlight');
          lineCategoryError.style.display = 'block';
      }
      if (date_detected.value === '') {
          date_detected.classList.add('highlight');
          dateDetectedError.style.display = 'block';
      }
      if (issue_tag.value === '') {
          // issue_tag.classList.add('highlight');
          // issueTagError.style.display = 'block';
      }
      if (repairing_date.value === '') {
          repairing_date.classList.add('highlight');
          repairingDateError.style.display = 'block';
      }
      if (car_maker.value === '') {
          car_maker.classList.add('highlight');
          carMakerError.style.display = 'block';
      }
      // if (qr_scan.value === '') {
      //     qr_scan.classList.add('highlight');
      //     scanQrError.style.display = 'block';
      // } 

      if (product_name.value === '') {
          // product_name.classList.add('highlight');
          // productNameError.style.display = 'block';
      }
      if (lot_no.value === '') {
          // lot_no.classList.add('highlight');
          // lotNumberError.style.display = 'block';
      }
      if (serial_no.value === '') {
          // serial_no.classList.add('highlight');
          // serialNumberError.style.display = 'block';
      }
      if (discovery_process_dr.value === '') {
          discovery_process_dr.classList.add('highlight');
          discoveryProcessError.style.display = 'block';
      }
      if (discovery_id_no_dr.value === '') {
          discovery_id_no_dr.classList.add('highlight');
          discoveryIDError.style.display = 'block';
      }
      if (discovery_person.value === '') {
          discovery_person.classList.add('highlight');
          discoveryPersonError.style.display = 'block';
      }
      if (occurrence_process_dr.value === '') {
          occurrence_process_dr.classList.add('highlight');
          occurrenceProcessError.style.display = 'block';
      }
      if (occurrence_shift_dr.value === '') {
          occurrence_shift_dr.classList.add('highlight');
          occurrenceShiftError.style.display = 'block';
      }
      if (occurrence_id_no_dr.value === '') {
          occurrence_id_no_dr.classList.add('highlight');
          occurrenceIDError.style.display = 'block';
      }
      if (occurrence_person.value === '') {
          occurrence_person.classList.add('highlight');
          occurrencePersonError.style.display = 'block';
      }
      if (outflow_process_dr.value === '') {
          outflow_process_dr.classList.add('highlight');
          outflowProcessError.style.display = 'block';
      }
      if (outflow_shift_dr.value === '') {
          outflow_shift_dr.classList.add('highlight');
          outflowShiftError.style.display = 'block';
      }
      if (outflow_id_no_dr.value === '') {
          outflow_id_no_dr.classList.add('highlight');
          outflowIDError.style.display = 'block';
      }
      if (outflow_person.value === '') {
          outflow_person.classList.add('highlight');
          outflowPersonError.style.display = 'block';
      }
      if (defect_category_dr.value === '') {
          defect_category_dr.classList.add('highlight');
          defectCategoryError.style.display = 'block';
      }
      if (sequence_no.value === '') {
          sequence_no.classList.add('highlight');
          sequenceNumberError.style.display = 'block';
      }
      if (defect_cause_dr.value === '') {
          defect_cause_dr.classList.add('highlight');
          defectCauseError.style.display = 'block';
      }
      if (repair_person_dr.value === '') {
          repair_person_dr.classList.add('highlight');
          repairPersonError.style.display = 'block';
      }
      if (detail_content_defect.value === '') {
          detail_content_defect.classList.add('highlight');
          detailDefectError.style.display = 'block';
      }
      if (treatment_content_defect.value === '') {
          treatment_content_defect.classList.add('highlight');
          treatmentDefectError.style.display = 'block';
      } else {
          const loadingAlert = Swal.fire({
              icon: 'info',
              title: 'Loading Please Wait...',
              text: 'Information',
              showConfirmButton: false,
              allowOutsideClick: false,
              allowEscapeKey: false,
              allowEnterKey: false
          });

          $.ajax({
              url: '../../process/user/defect_monitoring_record_rp/defect_monitoring_record_rp_p.php',
              type: 'POST',
              cache: false,
              data: {
                  method: 'go_to_mc_form',
                  line_no: line_no.value,
                  line_category_dr: line_category_dr.value,
                  date_detected: date_detected.value,
                  issue_tag: issue_tag.value,
                  repairing_date: repairing_date.value,
                  car_maker: car_maker.value,
                  // qr_scan:qr_scan,
                  product_name: product_name.value,
                  lot_no: lot_no.value,
                  serial_no: serial_no.value,
                  discovery_process_dr: discovery_process_dr.value,
                  discovery_id_no_dr: discovery_id_no_dr.value,
                  discovery_person: discovery_person.value,
                  occurrence_process_dr: occurrence_process_dr.value,
                  occurrence_shift_dr: occurrence_shift_dr.value,
                  occurrence_id_no_dr: occurrence_id_no_dr.value,
                  occurrence_person: occurrence_person.value,
                  outflow_process_dr: outflow_process_dr.value,
                  outflow_shift_dr: outflow_shift_dr.value,
                  outflow_id_no_dr: outflow_id_no_dr.value,
                  outflow_person: outflow_person.value,
                  defect_category_dr: defect_category_dr.value,
                  sequence_no: sequence_no.value,
                  defect_cause_dr: defect_cause_dr.value,
                  repair_person_dr: repair_person_dr.value,
                  detail_content_defect: detail_content_defect.value,
                  treatment_content_defect: treatment_content_defect.value,
                  defect_id: defect_id.value
              },
              success: response => {
                  // close loading alert
                  loadingAlert.close();

                  setTimeout(() => {
                      try {
                          let response_array = JSON.parse(response);
                          if (response_array.message == 'success') {

                              document.getElementById("repair_start_mc").innerHTML = response_array.repair_start_mc;
                              document.getElementById("defect_id_no").value = response_array.defect_id;

                              $('#add_defect_mancost').modal('hide');
                              setTimeout(() => {
                                  $('#add_defect_mancost_2').modal('show');
                              }, 400);
                          } else {
                              console.log(response);
                          }
                      } catch (e) {
                          console.log(response);
                      }
                  }, 500);
              }
          })
              .fail((jqXHR, textStatus, errorThrown) => {
                  console.log(jqXHR);
              });
      }
      return false;
  };

  // clear defect record fields
  const clear_dr_mc_fields = () => {
      // defect record fields
      document.getElementById("line_no").value = '';
      document.getElementById("line_category_dr").value = '';
      document.getElementById("date_detected").value = '';
      document.getElementById("issue_tag").value = '';
      document.getElementById("repairing_date").value = '';
      document.getElementById("car_maker").value = '';
      document.getElementById("qr_scan").value = '';
      document.getElementById("product_name").value = '';
      document.getElementById("lot_no").value = '';
      document.getElementById("serial_no").value = '';
      document.getElementById("discovery_process_dr").value = '';
      document.getElementById("discovery_id_no_dr").value = '';
      document.getElementById("discovery_person").value = '';
      document.getElementById("occurrence_process_dr").value = '';
      document.getElementById("occurrence_shift_dr").value = '';
      document.getElementById("occurrence_id_no_dr").value = '';
      document.getElementById("occurrence_person").value = '';
      document.getElementById("outflow_process_dr").value = '';
      document.getElementById("outflow_shift_dr").value = '';
      document.getElementById("outflow_id_no_dr").value = '';
      document.getElementById("outflow_person").value = '';
      document.getElementById("defect_category_dr").value = '';
      document.getElementById("sequence_no").value = '';
      document.getElementById("defect_cause_dr").value = '';
      document.getElementById("repair_person_dr").value = '';
      document.getElementById("detail_content_defect").value = '';
      document.getElementById("treatment_content_defect").value = '';

      // mancost fields
      document.getElementById("repair_start_mc").value = '';
      document.getElementById("repair_end_mc").value = '';
      document.getElementById("time_consumed_mc").value = '';
      document.getElementById("defect_category_mc").value = '';
      document.getElementById("occurrence_process_mc").value = '';
      document.getElementById("parts_removed_mc").value = '';
      document.getElementById("quantity_mc").value = '';
      document.getElementById("unit_cost_mc").value = '';
      document.getElementById("material_cost_mc").value = '';
      document.getElementById("manhour_cost_mc").value = '';
      document.getElementById("portion_treatment").value = '';
      // document.getElementById("re_checking_mc").value = '';
      // document.getElementById("qc_verification_mc").value = '';
      // document.getElementById("checking_date_mc").value = '';

      //mancost fields only
      // document.getElementById("car_maker_mc").value = '';
      // document.getElementById("line_no_mc").value = '';
      // document.getElementById("repair_start_mc_only").value = '';
      // document.getElementById("repair_end_mc_only").value = '';
      // document.getElementById("time_consumed_mc_only").value = '';
      // document.getElementById("defect_category_mc_only").value = '';
      // document.getElementById("occurrence_process_mc_only").value = '';
      // document.getElementById("parts_removed_mc_only").value = '';
      // document.getElementById("quantity_mc_only").value = '';
      // document.getElementById("unit_cost_mc_only").value = '';
      // document.getElementById("material_cost_mc_only").value = '';
      // document.getElementById("manhour_cost_mc_only").value = '';
      // document.getElementById("portion_treatment_mc_only").value = '';
      // document.getElementById("re_checking_mc_only").value = '';
      // document.getElementById("qc_verification_mc_only").value = '';
      // document.getElementById("checking_date_mc_only").value = '';
  }

  // ADDING OF MULTIPLE MANCOST WITH ONE DEFECT ID
  // fetch added mancost table
  const load_added_mancost = () => {
      $.ajax({
          url: '../../process/user/defect_monitoring_record_rp/defect_monitoring_record_rp_p.php',
          type: 'POST',
          cache: false,
          data: {
              method: 'load_added_mancost'
          },
          success: function (response) {
              $('#list_of_added_mancost').html(response);
              $('#spinner').fadeOut();
          }
      });
  }

  // DELETE ADDED ROW
  const delete_added_btn = (event) => {
      var id = event.target.dataset.id;

      $.ajax({
          url: '../../process/user/defect_monitoring_record_rp/defect_monitoring_record_rp_p.php',
          type: 'POST',
          cache: false,
          data: {
              method: 'delete_added_btn',
              id: id
          },
          success: function (response) {
              if (response == 'success') {
                  load_added_mancost();
              }
          }
      });
  }

  // =======================================================
  // highlight input field when empty
  document.getElementById("repair_start_mc").addEventListener("input", function () {
      var repair_start_mc = this;
      repair_start_mc.classList.remove('highlight');
      document.getElementById("repairStartMcError").style.display = 'none';
  });

  document.getElementById("repair_end_mc").addEventListener("input", function () {
      var repair_end_mc = this;
      repair_end_mc.classList.remove('highlight');
      document.getElementById("repairEndMcError").style.display = 'none';
  });

  document.getElementById("defect_category_mc").addEventListener("input", function () {
      var defect_category_mc = this;
      defect_category_mc.classList.remove('highlight');
      document.getElementById("defectCategoryMcError").style.display = 'none';
  });

  document.getElementById("occurrence_process_mc").addEventListener("input", function () {
      var occurrence_process_mc = this;
      occurrence_process_mc.classList.remove('highlight');
      document.getElementById("occurrenceProcessMcError").style.display = 'none';
  });

  document.getElementById("parts_removed_mc").addEventListener("input", function () {
      var parts_removed_mc = this;
      parts_removed_mc.classList.remove('highlight');
      document.getElementById("partsRemovedMcError").style.display = 'none';
  });

  document.getElementById("portion_treatment").addEventListener("input", function () {
      var portion_treatment = this;
      portion_treatment.classList.remove('highlight');
      document.getElementById("portionTreatmentMcError").style.display = 'none';
  });

  // add multiple mancost
  // const add_multiple_mancost = () => {
  //     var repair_start_mc = document.getElementById("repair_start_mc");
  //     var repairStartMcError = document.getElementById("repairStartMcError");

  //     var repair_end_mc = document.getElementById("repair_end_mc");
  //     var repairEndMcError = document.getElementById("repairEndMcError");

  //     var time_consumed_mc = document.getElementById("time_consumed_mc");

  //     var defect_category_mc = document.getElementById("defect_category_mc");
  //     var defectCategoryMcError = document.getElementById("defectCategoryMcError");

  //     var occurrence_process_mc = document.getElementById("occurrence_process_mc");
  //     var occurrenceProcessMcError = document.getElementById("occurrenceProcessMcError");

  //     var parts_removed_mc = document.getElementById("parts_removed_mc");
  //     var partsRemovedMcError = document.getElementById("partsRemovedMcError");

  //     var quantity_mc = document.getElementById("quantity_mc");
  //     var unit_cost_mc = document.getElementById("unit_cost_mc");
  //     var material_cost_mc = document.getElementById("material_cost_mc");
  //     var manhour_cost_mc = document.getElementById("manhour_cost_mc");

  //     var portion_treatment = document.getElementById("portion_treatment");
  //     var portionTreatmentMcError = document.getElementById("portionTreatmentMcError");

  //     var defect_id = document.getElementById('defect_id_no');

  //     if (repair_start_mc.value.trim() === '') {
  //         repair_start_mc.classList.add('highlight');
  //         repairStartMcError.style.display = 'block';
  //     }
  //     if (repair_end_mc.value.trim() === '') {
  //         repair_end_mc.classList.add('highlight');
  //         repairEndMcError.style.display = 'block';
  //     }
  //     if (defect_category_mc.value.trim() === '') {
  //         defect_category_mc.classList.add('highlight');
  //         defectCategoryMcError.style.display = 'block';
  //     }
  //     if (occurrence_process_mc.value.trim() === '') {
  //         occurrence_process_mc.classList.add('highlight');
  //         occurrenceProcessMcError.style.display = 'block';
  //     }
  //     if (parts_removed_mc.value.trim() === '') {
  //         parts_removed_mc.classList.add('highlight');
  //         partsRemovedMcError.style.display = 'block';
  //     }
  //     if (portion_treatment.value.trim() === '') {
  //         portion_treatment.classList.add('highlight');
  //         portionTreatmentMcError.style.display = 'block';
  //     }
  //     else {
  //         $.ajax({
  //             url: '../../process/user/defect_monitoring_record_rp/defect_monitoring_record_rp_p.php',
  //             type: 'POST',
  //             cache: false,
  //             data: {
  //                 method: 'add_multiple_mancost',
  //                 repair_start_mc: repair_start_mc.value,
  //                 repair_end_mc: repair_end_mc.value,
  //                 time_consumed_mc: time_consumed_mc.value,
  //                 defect_category_mc: defect_category_mc.value,
  //                 occurrence_process_mc: occurrence_process_mc.value,
  //                 parts_removed_mc: parts_removed_mc.value,
  //                 quantity_mc: quantity_mc.value,
  //                 unit_cost_mc: unit_cost_mc.value,
  //                 material_cost_mc: material_cost_mc.value,
  //                 manhour_cost_mc: manhour_cost_mc.value,
  //                 portion_treatment: portion_treatment.value,
  //                 defect_id: defect_id.value
  //             },
  //             success: function (response) {
  //                 if (response == 'success') {
  //                     Swal.fire({
  //                         icon: 'success',
  //                         title: 'Successfully Recorded',
  //                         text: 'Success',
  //                         showConfirmButton: false,
  //                         timer: 1500
  //                     });

  //                     // Retain values in these fields
  //                     var retainedValues = {
  //                         'repair_start_mc': repair_start_mc.value,
  //                         'repair_end_mc': repair_end_mc.value,
  //                         'time_consumed_mc': time_consumed_mc.value,
  //                         'defect_category_mc': defect_category_mc.value,
  //                         'occurrence_process_mc': occurrence_process_mc.value,
  //                         'parts_removed_mc': parts_removed_mc.value,
  //                         'manhour_cost_mc': manhour_cost_mc.value,
  //                     };

  //                     // $('#repair_start_mc').val('');
  //                     // $('#repair_end_mc').val('');
  //                     // $('#time_consumed_mc').val('');
  //                     // $('#defect_category_mc').val('');
  //                     // $('#occurrence_process_mc').val('');
  //                     $('#parts_removed_mc').val('');
  //                     $('#quantity_mc').val('');
  //                     $('#unit_cost_mc').val('');
  //                     $('#material_cost_mc').val('');
  //                     // $('#manhour_cost_mc').val('');
  //                     $('#portion_treatment').val('');

  //                     $('#defect_id').val('');

  //                     load_added_mancost();
  //                     // $('#add_defect_mancost_2').modal('hide');
  //                 } else {
  //                     Swal.fire({
  //                         icon: 'error',
  //                         title: 'Error',
  //                         text: 'Error',
  //                         showConfirmButton: false,
  //                         timer: 1500
  //                     });
  //                 }
  //             }
  //         });
  //     }
  // }

  const add_multiple_mancost = () => {
      var repair_start_mc = document.getElementById("repair_start_mc");
      var repairStartMcError = document.getElementById("repairStartMcError");

      var repair_end_mc = document.getElementById("repair_end_mc");
      var repairEndMcError = document.getElementById("repairEndMcError");

      var time_consumed_mc = document.getElementById("time_consumed_mc");

      var defect_category_mc = document.getElementById("defect_category_mc");
      var defectCategoryMcError = document.getElementById("defectCategoryMcError");

      var occurrence_process_mc = document.getElementById("occurrence_process_mc");
      var occurrenceProcessMcError = document.getElementById("occurrenceProcessMcError");

      var parts_removed_mc = document.getElementById("parts_removed_mc");
      var partsRemovedMcError = document.getElementById("partsRemovedMcError");

      var quantity_mc = document.getElementById("quantity_mc");
      var unit_cost_mc = document.getElementById("unit_cost_mc");
      var material_cost_mc = document.getElementById("material_cost_mc");
      var manhour_cost_mc = document.getElementById("manhour_cost_mc");

      var portion_treatment = document.getElementById("portion_treatment");
      var portionTreatmentMcError = document.getElementById("portionTreatmentMcError");

      var defect_id = document.getElementById('defect_id_no');

      // Reset highlighting and error messages
      repair_start_mc.classList.remove('highlight');
      repairStartMcError.style.display = 'none';
      repair_end_mc.classList.remove('highlight');
      repairEndMcError.style.display = 'none';
      defect_category_mc.classList.remove('highlight');
      defectCategoryMcError.style.display = 'none';
      occurrence_process_mc.classList.remove('highlight');
      occurrenceProcessMcError.style.display = 'none';
      parts_removed_mc.classList.remove('highlight');
      partsRemovedMcError.style.display = 'none';
      portion_treatment.classList.remove('highlight');
      portionTreatmentMcError.style.display = 'none';

      if (repair_start_mc.value.trim() === '') {
          repair_start_mc.classList.add('highlight');
          repairStartMcError.style.display = 'block';
      }
      if (repair_end_mc.value.trim() === '') {
          repair_end_mc.classList.add('highlight');
          repairEndMcError.style.display = 'block';
      }
      if (defect_category_mc.value.trim() === '') {
          defect_category_mc.classList.add('highlight');
          defectCategoryMcError.style.display = 'block';
      }
      if (occurrence_process_mc.value.trim() === '') {
          occurrence_process_mc.classList.add('highlight');
          occurrenceProcessMcError.style.display = 'block';
      }
      if (parts_removed_mc.value.trim() === '') {
          parts_removed_mc.classList.add('highlight');
          partsRemovedMcError.style.display = 'block';
      }
      if (portion_treatment.value.trim() === '') {
          portion_treatment.classList.add('highlight');
          portionTreatmentMcError.style.display = 'block';
      }
      else {
          // Construct an array of records
          var records = [
              {
                  repair_start_mc: repair_start_mc.value,
                  repair_end_mc: repair_end_mc.value,
                  time_consumed_mc: time_consumed_mc.value,
                  defect_category_mc: defect_category_mc.value,
                  occurrence_process_mc: occurrence_process_mc.value,
                  parts_removed_mc: parts_removed_mc.value,
                  quantity_mc: quantity_mc.value,
                  unit_cost_mc: unit_cost_mc.value,
                  material_cost_mc: material_cost_mc.value,
                  manhour_cost_mc: manhour_cost_mc.value,
                  portion_treatment: portion_treatment.value,
                  defect_id: defect_id.value
              }
              // Add more records as needed
          ];

          $.ajax({
              url: '../../process/user/defect_monitoring_record_rp/defect_monitoring_record_rp_p.php',
              type: 'POST',
              cache: false,
              data: {
                  method: 'add_multiple_mancost',
                  records: records
              },
              success: function (response) {
                  if (response == 'success') {
                      Swal.fire({
                          icon: 'success',
                          title: 'Successfully Recorded',
                          text: 'Success',
                          showConfirmButton: false,
                          timer: 1500
                      });

                      // Retain values in these fields
                      var retainedValues = {
                          'repair_start_mc': repair_start_mc.value,
                          'repair_end_mc': repair_end_mc.value,
                          'time_consumed_mc': time_consumed_mc.value,
                          'defect_category_mc': defect_category_mc.value,
                          'occurrence_process_mc': occurrence_process_mc.value,
                          'parts_removed_mc': parts_removed_mc.value,
                          'manhour_cost_mc': manhour_cost_mc.value,
                      };

                      // Clear specific fields
                      $('#parts_removed_mc').val('');
                      $('#quantity_mc').val('');
                      $('#unit_cost_mc').val('');
                      $('#material_cost_mc').val('');
                      $('#portion_treatment').val('');

                      $('#defect_id').val('');

                      load_added_mancost();
                  } else {
                      Swal.fire({
                          icon: 'error',
                          title: 'Error',
                          text: 'Error',
                          showConfirmButton: false,
                          timer: 1500
                      });
                  }
              }
          });
      }
  };


  // search keyword in record
  const search_keyword = () => {
      var drm_keyword = document.getElementById("drm_keyword").value.trim();

      // date search
      var date_from = document.getElementById("date_from_search_defect").value.trim();
      var date_to = document.getElementById("date_to_search_defect").value.trim();

      $.ajax({
          url: '../../process/user/defect_monitoring_record_rp/defect_monitoring_record_rp_p.php',
          type: 'POST',
          cache: false,
          data: {
              method: 'search_keyword',
              drm_keyword: drm_keyword,
              date_from: date_from,
              date_to: date_to
          },
          success: function (response) {
              $('#defect_table').html(response);
              $('#spinner').fadeOut;
          }
      });
  }

  // Event listener for 'input' event on the parts_removed field
  $("#parts_removed_mc").on("input", function () {
      var inputText = $(this).val().toUpperCase().trim();

      // Check if inputText has at least 3 characters
      if (inputText.length >= 3) {
          // Trigger autocomplete function
          autocompleteParts(inputText);
      }
  });


  // fetch unit cost thru part name
  function fetchUnitCost() {
      var partsRemovedInput = $("#parts_removed_mc").val();

      // Check if the input is not empty
      if (partsRemovedInput.trim() !== '') {
          $.ajax({
              url: '../../process/user/defect_monitoring_record_rp/defect_monitoring_record_rp_p.php',
              type: 'POST',
              cache: false,
              dataType: 'json',
              data: {
                  method: 'fetch_unit_price',
                  parts_removed: partsRemovedInput
              },
              success: function (response) {
                  if (!response.error) {
                      console.log("Fetched unit price:", response.unit_price);

                      // Update the 'unit_cost' field with the fetched unit price
                      $("#unit_cost_mc").val(response.unit_price);

                      // Get the quantity value from the input field
                      var quantityValue = $("#quantity").val();

                      // Now that we have the unit price and quantity, compute the material cost
                      computeMaterialCost(response.unit_price, quantityValue);
                  }
              },
              error: function (xhr, status, error) {
                  console.error("AJAX Error:", error);
              }
          });
      }
  }

  // Autocomplete function
  function autocompleteParts(inputText) {
      console.log("Autocomplete triggered with input:", inputText);

      // Perform AJAX request to fetch matching part names
      $.ajax({
          url: '../../process/user/defect_monitoring_record_rp/defect_monitoring_record_rp_p.php',
          type: 'POST',
          cache: false,
          dataType: 'json',
          data: {
              method: 'autocomplete_parts',
              input_text: inputText
          },
          success: function (response) {
              if (!response.error) {
                  // Update the datalist with the fetched part names
                  updateDatalist(response.part_names);
              }
          },
          error: function (xhr, status, error) {
              console.error("AJAX Error:", error);
          }
      });
  }

  // Function to update datalist with part names
  function updateDatalist(partNames) {
      // Clear existing options in datalist
      $("#partsRemovedMcList").empty();

      // Add new options to datalist
      partNames.forEach(function (partName) {
          $("#partsRemovedMcList").append(`<option value="${partName}">`);
      });
  }

  // Event listener for 'change' event on the parts_removed field
  $("#parts_removed_mc").on("change", function () {
      var selectedPart = $(this).val();

      // Check if the selected part is not empty
      if (selectedPart.trim() !== '') {
          // Fetch unit price based on the selected part name
          fetchUnitPrice(selectedPart);
      }
  });

  // Fetch unit price based on part name
  function fetchUnitPrice(partsRemoved) {
      $.ajax({
          url: '../../process/user/defect_monitoring_record_rp/defect_monitoring_record_rp_p.php',
          type: 'POST',
          cache: false,
          dataType: 'json',
          data: {
              method: 'fetch_unit_price',
              parts_removed: partsRemoved
          },
          success: function (response) {
              if (!response.error) {
                  console.log("Fetched unit price:", response.unit_price);

                  // Update the 'unit_cost' field with the fetched unit price
                  $("#unit_cost_mc").val(response.unit_price);
              }
          },
          error: function (xhr, status, error) {
              console.error("AJAX Error:", error);
          }
      });
  }

  // Function to compute material cost based on unit price and quantity
  const computeMaterialCost = (unitPrice, quantity) => {
      // Parse the quantity and unit price as floats
      var qtyInput = parseFloat(quantity) || 0;
      var costInput = parseFloat(unitPrice) || 0;

      console.log("Parsed Quantity Input:", qtyInput);
      console.log("Parsed Cost Input:", costInput);

      // Calculate the result
      var result = qtyInput * costInput;
      result = result.toFixed(2); // keep up to two decimals

      console.log("Result:", result);

      // Add yen symbol to the result
      var resultWithSymbol = result;

      // Set the result in the 'material_cost' field
      $("#material_cost_mc").val(resultWithSymbol);
  };



</script>





























<div class="row mt-2">
  <div class="col-sm-1">
    <!-- line no -->
    <label style="font-weight:normal;margin:0;padding:0;color:#000;">Line No.</label>
    <input type="text" id="search_ad_line_no" class="form-control" placeholder="Line No." autocomplete="off"
      style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;"
      class="pl-3">
  </div>
  <div class="col-sm-2">
    <!-- defect category NG content -->
    <label style="font-weight:normal;margin:0;padding:0;color:#000;">Defect Category</label>
    <select name="search_ad_defect_category" id="search_ad_defect_category" autocomplete="off"
      style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;"
      class="pl-1" required>
      <option>Defect Category</option>
      <option></option>
    </select>
  </div>
  <div class="col-sm-3">
    <!-- discovery process -->
    <label style="font-weight:normal;margin:0;padding:0;color:#000;">Discovery Process</label>
    <select name="search_ad_discovery_process" id="search_ad_discovery_process" autocomplete="off"
      style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;"
      class="pl-1" required>
      <option>Discovery Process</option>
      <option></option>
    </select>
  </div>
  <div class="col-sm-3">
    <!-- occurrence process -->
    <label style="font-weight:normal;margin:0;padding:0;color:#000;">Occurrence Process</label>
    <select name="search_ad_occurrence_process" id="search_ad_occurrence_process" autocomplete="off"
      style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;"
      class="pl-1" required>
      <option>Occurrence Process</option>
      <option></option>
    </select>
  </div>
  <div class="col-sm-3">
    <!-- outflow process -->
    <label style="font-weight:normal;margin:0;padding:0;color:#000;">Outflow Process</label>
    <select name="search_ad_outflow_process" id="search_ad_outflow_process" autocomplete="off"
      style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;"
      class="pl-1" required>
      <option>Outflow Process</option>
      <option></option>
    </select>
  </div>
</div>

<br>
<div class="row">
  <div class="col-sm-3">
    <!-- date from -->
    <label style="font-weight:normal;margin:0;padding:0;color:#000;">Date From</label>
    <input type="date" name="search_ad_date_from" class="form-control" id="search_ad_date_from"
      style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px;">
  </div>
  <div class="col-sm-3">
    <!-- date to -->
    <label style="font-weight:normal;margin:0;padding:0;color:#000;">Date To</label>
    <input type="date" name="search_ad_date_to" class="form-control" id="search_ad_date_to"
      style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px;">
  </div>
  <div class="col-sm-3">
    <!-- search button -->
    <label></label>
    <button class="btn btn-block d-flex justify-content-left" id="search_btn" onclick="search_admin_defect_record()"
      style="color:#fff;height:34px;border-radius:.25rem;background: #425B2C;font-size:15px;font-weight:normal;"><img
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
<br>