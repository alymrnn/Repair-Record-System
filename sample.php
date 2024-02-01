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