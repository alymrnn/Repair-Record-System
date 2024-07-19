<div class="modal fade bd-example-modal-xl" id="add_defect_qa" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLable" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content" style="background:#FFF;">
            <div class="modal-header" style="background: #3066be;">
                <h5 class="modal-title" id="exampleModalLabel" style="font-weight: normal;color: #fff;"><i
                        class="fas fa-plus-circle"></i>&nbsp;
                    Add Defect Record
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                    onclick="clear_input_fields()">
                    <span aria-hidden="true" style="color: #fff;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-end mt-2">
                    <p style="font-size: 18px"><i>Select the record to be added:</i></p>&ensp;

                    <label style="display: inline-block;font-size: 18px">
                        <input type="radio" id="r_defect_mancost" name="record_type_qa" value="Defect and Mancost"
                            style="vertical-align: middle;">
                        Defect & Mancost
                    </label>&emsp;

                    <label style="display: inline-block;font-size: 18px">
                        <input type="radio" id="r_defect_only" name="record_type_qa" value="Defect Only"
                            style="vertical-align: middle;">
                        Defect Only
                    </label>&emsp;

                    <!-- <label style="display: inline-block;font-size: 18px">
                        <input type="radio" id="r_mancost_only" name="record_type" value="Mancost Only"
                            style="vertical-align: middle;">
                        Mancost Only
                    </label>&emsp; -->

                    <label style="display: inline-block;font-size: 18px">
                        <input type="radio" id="r_white_tag" name="record_type_qa" value="White Tag"
                            style="vertical-align: middle;">
                        White Tag
                    </label>&emsp;
                </div>

                <!-- form label -->
                <label style="font-weight: normal;color: #000;font-size:25px"><b>Defect Record</b></label>
                <div class="row">
                    <div class="col-sm-2">
                        <!-- defect id hidden -->
                        <input type="hidden" id="defect_id_no_qa" class="form-control">

                        <!-- line no. -->
                        <label style="font-weight: normal;color: #000;">Line No.</label>
                        <label style="color:#CA3F3F">*</label>
                        <!-- <input type="text" id="line_no_qa" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            required maxlength="4" pattern="[0-9]{1,4}"> -->

                        <select name="line_no_qa" id="line_no_qa" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="pl-2 form-control" required>
                            <option value="" disabled selected>Select line no.</option>
                        </select>
                        <span id="lineError" class="error-message" style="display:none; color:#CA3F3F;">Line No. field
                            is required.</span>
                        <br>
                    </div>
                    <div class="col-sm-2">
                        <label style="font-weight: normal;color: #000;">Category</label>
                        <label style="color:#CA3F3F">*</label>
                        <select name="line_category_qa" id="line_category_qa" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="pl-2 form-control" required>
                            <option value="" disabled selected>Select category</option>
                        </select>
                        <span id="lineCategoryError" class="error-message" style="display:none; color:#CA3F3F;">Category
                            field is required.</span>
                    </div>
                    <div class="col-sm-3">
                        <!-- date datected -->
                        <label style="font-weight: normal;color: #000;">Date Detected</label>
                        <label style="color:#CA3F3F">*</label>
                        <input type="date" id="date_detected_qa" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            required>
                        <span id="dateDetectedError" class="error-message" style="display:none; color:#CA3F3F;">Date
                            Detected field is required.</span>
                    </div>
                    <div class="col-sm-2">
                        <!-- issue no of tag -->
                        <label style="font-weight: normal;color: #000;">Issue No. of Tag</label>
                        <label style="color:#CA3F3F">*</label>
                        <input type="text" id="issue_tag_qa" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #F1F1F1;height:34px; width:100%;"
                            readonly>
                        <span id="issueTagError" class="error-message" style="display:none; color:#CA3F3F;">Issue No. of
                            Tag field is required.</span>
                    </div>
                    <div class="col-sm-3">
                        <!-- repairing date -->
                        <label style="font-weight: normal;color: #000;">Repairing Date</label>
                        <input type="date" id="repairing_date_qa" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #D3D3D3;height:34px; width:100%;"
                            disabled>
                        <input type="hidden" id="na_repairing_date" name="na_repairing_date">
                        <span id="repairingDateError" class="error-message"
                            style="display:none; color:#CA3F3F;">Repairing Date field is required.</span>
                    </div>
                </div>
                <!-- /.end row -->
                <div class="row">
                    <div class="col-sm-2">
                        <!-- car maker -->
                        <label style="font-weight: normal;color: #000;">Car Maker</label>
                        <label style="color:#CA3F3F">*</label>
                        <input name="car_maker_qa" id="car_maker_qa" onchange="handleCarMakerChange(this)"
                            style="border:1px solid #ced4da; color: #525252;font-size: 15px;border-radius: .25rem;background: #F1F1F1;height:34px; width:100%;"
                            class="pl-2" disabled>
                        <span id="carMakerError" class="error-message" style="display:none; color:#CA3F3F;">Car Maker
                            field is required.</span>
                    </div>
                    <div class="col-sm-10">
                        <!-- qr scanning -->
                        <label style="font-weight: normal;color: #000;">Scan QR-Code</label>
                        <!-- <label style="color:#CA3F3F">*</label> -->
                        <input type="text" id="qr_scan_qa" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            disabled>
                        <span id="scanQrError" class="error-message" style="display:none; color:#CA3F3F;">QR-Code field
                            is required.</span>
                    </div>
                </div>
                <!-- /.end row -->
                <div class="row">
                    <div class="col-sm-4">
                        <!-- product name -->
                        <label style="font-weight: normal;color: #000;">Product Name</label>
                        <label style="color:#CA3F3F">*</label>
                        <input type="text" id="product_name_qa" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #F1F1F1;height:34px; width:100%;"
                            readonly>
                        <span id="productNameError" class="error-message" style="display:none; color:#CA3F3F;">Product
                            Name field is required.</span>
                        <br>
                    </div>
                    <div class="col-sm-4">
                        <!-- lot number -->
                        <label style="font-weight: normal;color: #000;">Lot No.</label>
                        <label style="color:#CA3F3F">*</label>
                        <input type="text" id="lot_no_qa" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #F1F1F1;height:34px; width:100%;"
                            readonly>
                        <span id="lotNumberError" class="error-message" style="display:none; color:#CA3F3F;">Lot Number
                            field is required.</span>
                    </div>
                    <div class="col-sm-4">
                        <!-- serial number -->
                        <label style="font-weight: normal;color: #000;">Serial No.</label>
                        <label style="color:#CA3F3F">*</label>
                        <input type="text" id="serial_no_qa" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #F1F1F1;height:34px; width:100%;"
                            readonly>
                        <span id="serialNumberError" class="error-message" style="display:none; color:#CA3F3F;">Serial
                            Number field is required.</span>
                    </div>
                </div>
                <!-- /.end -->
                <div class="row">
                    <div class="col-sm-4">
                        <!-- discovery process -->
                        <label style="font-weight: normal;color: #000;">Discovery Process</label>
                        <label style="color:#CA3F3F">*</label>
                        <select name="discovery_process_qa" id="discovery_process_qa" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="pl-2 form-control" required>
                            <option value="" disabled selected>Select discovery process</option>
                        </select>
                        <span id="discoveryProcessError" class="error-message"
                            style="display:none; color:#CA3F3F;">Discovery Process field is required.</span>
                    </div>
                    <div class="col-sm-4">
                        <!-- discovery id number -->
                        <label style="font-weight: normal;color: #000;">ID Number</label>
                        <label style="color:#CA3F3F">*</label>
                        <input type="text" id="discovery_id_no_qa" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            required>
                        <span id="discoveryIDError" class="error-message" style="display:none; color:#CA3F3F;">ID Number
                            field is required.</span>
                    </div>
                    <div class="col-sm-4">
                        <!-- discovery person -->
                        <label style="font-weight: normal;color: #000;">Discovery Person</label>
                        <label style="color:#CA3F3F">*</label>
                        <input type="text" id="discovery_person_qa" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #F1F1F1;height:34px; width:100%;"
                            required readonly>
                        <span id="discoveryPersonError" class="error-message"
                            style="display:none; color:#CA3F3F;">Discovery Person field is required.</span>
                    </div>
                </div>
                <br>
                <!-- /.end -->
                <div class="row">
                    <div class="col-sm-3">
                        <!-- occurrence process -->
                        <label style="font-weight: normal;color: #000;">Occurrence Process</label>
                        <label style="color:#CA3F3F">*</label>
                        <select name="occurrence_process_qa" id="occurrence_process_qa" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="pl-2 form-control" required>
                            <option value="" disabled selected>Select occurrence process</option>
                        </select>
                        <span id="occurrenceProcessError" class="error-message"
                            style="display:none; color:#CA3F3F;">Occurrence Process field is required.</span>
                    </div>
                    <div class="col-sm-3">
                        <!-- occurrence shift -->
                        <label style="font-weight: normal;color: #000;">Occurrence Shift</label>
                        <label style="color:#CA3F3F">*</label>
                        <select name="occurrence_shift_qa" id="occurrence_shift_qa" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="pl-2 form-control" required>
                            <option value="" disabled selected>Select occurrence shift</option>
                        </select>
                        <span id="occurrenceShiftError" class="error-message"
                            style="display:none; color:#CA3F3F;">Occurrence Shift field is required.</span>
                    </div>
                    <div class="col-sm-3">
                        <!-- occurrence id number -->
                        <label style="font-weight: normal;color: #000;">ID Number</label>
                        <label style="color:#CA3F3F">*</label>
                        <input type="text" id="occurrence_id_no_qa" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            required>
                        <span id="occurrenceIDError" class="error-message" style="display:none; color:#CA3F3F;">ID
                            Number field is required.</span>
                    </div>
                    <div class="col-sm-3">
                        <!-- occurrence person -->
                        <label style="font-weight: normal;color: #000;">Occurrence Person</label>
                        <label style="color:#CA3F3F">*</label>
                        <input type="text" id="occurrence_person_qa" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #F1F1F1;height:34px; width:100%;"
                            required readonly>
                        <span id="occurrencePersonError" class="error-message"
                            style="display:none; color:#CA3F3F;">Occurrence Person field is required.</span>
                    </div>
                </div>
                <br>
                <!-- /.end -->
                <div class="row">
                    <div class="col-sm-3">
                        <!-- outflow process -->
                        <label style="font-weight: normal;color: #000;">Outflow Process</label>
                        <label style="color:#CA3F3F">*</label>
                        <select name="outflow_process_qa" id="outflow_process_qa" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="pl-2 form-control" required>
                            <option value="" disabled selected>Select outflow process</option>
                        </select>
                        <span id="outflowProcessError" class="error-message"
                            style="display:none; color:#CA3F3F;">Outflow Process field is required.</span>
                    </div>
                    <div class="col-sm-3">
                        <!-- outflow shift -->
                        <label style="font-weight: normal;color: #000;">Outflow Shift</label>
                        <label style="color:#CA3F3F">*</label>
                        <select name="outflow_shift_qa" id="outflow_shift_qa" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="pl-2 form-control" required>
                            <option value="" disabled selected>Select outflow shift</option>
                        </select>
                        <span id="outflowShiftError" class="error-message" style="display:none; color:#CA3F3F;">Outflow
                            Shift field is required.</span>
                    </div>
                    <div class="col-sm-3">
                        <!-- outflow id number -->
                        <label style="font-weight: normal;color: #000;">ID Number</label>
                        <label style="color:#CA3F3F">*</label>
                        <input type="text" id="outflow_id_no_qa" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            required>
                        <span id="outflowIDError" class="error-message" style="display:none; color:#CA3F3F;">ID Number
                            field is required.</span>
                    </div>
                    <div class="col-sm-3">
                        <!-- outflow person -->
                        <label style="font-weight: normal;color: #000;">Outflow Person</label>
                        <label style="color:#CA3F3F">*</label>
                        <input type="text" id="outflow_person_qa" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #F1F1F1;height:34px; width:100%;"
                            required readonly>
                        <span id="outflowPersonError" class="error-message" style="display:none; color:#CA3F3F;">Outflow
                            Person field is required.</span>
                    </div>
                </div>
                <br>
                <!-- /.end -->
                <div class="row">
                    <div class="col-sm-3">
                        <!-- defect category -->
                        <label style="font-weight: normal;color: #000;">Defect Category</label>
                        <label style="color:#CA3F3F">*</label>
                        <select name="defect_category_qa" id="defect_category_qa" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="pl-2 form-control" required>
                            <option value="" disabled selected>Select defect category</option>
                        </select>
                        <span id="defectCategoryError" class="error-message" style="display:none; color:#CA3F3F;">Defect
                            Category field is required.</span>
                    </div>
                    <div class="col-sm-3">
                        <!-- sequence number -->
                        <label style="font-weight: normal;color: #000;">Sequence Number</label>
                        <label style="color:#CA3F3F">*</label>
                        <input type="text" id="sequence_no_qa" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            required>
                        <span id="sequenceNumberError" class="error-message"
                            style="display:none; color:#CA3F3F;">Sequence Number field is required.</span>
                    </div>
                    <div class="col-sm-3">
                        <!-- assy board number -->
                        <label style="font-weight: normal;color: #000;">Assy Board Number</label>
                        <label style="color:#CA3F3F">*</label>
                        <input type="text" id="assy_board_no_qa" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            required>
                        <span id="assyBoardNumberError" class="error-message" style="display:none; color:#CA3F3F;">Assy
                            Board Number field is required.</span>
                    </div>
                    <div class="col-sm-3">
                        <!-- cause of defect -->
                        <label style="font-weight: normal;color: #000;">Cause of Defect</label>
                        <label style="color:#CA3F3F">*</label>
                        <select name="defect_cause_qa" id="defect_cause_qa" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="pl-2 form-control" required>
                            <option value="" disabled selected>Select cause of defect</option>
                        </select>
                        <span id="defectCauseError" class="error-message" style="display:none; color:#CA3F3F;">Cause of
                            Defect field is required.</span>
                    </div>
                </div>
                <br>
                <!-- /.end -->
                <div class="row mb-2">
                    <div class="col-sm-4">
                        <!-- repair person -->
                        <label style="font-weight: normal;color: #000;">Dis-assembled by:</label>
                        <input type="text" id="repair_person_qa" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #D3D3D3;height:34px; width:100%;"
                            disabled>
                        <span id="repairPersonError" class="error-message" style="display:none; color:#CA3F3F;">Repair
                            Person field is required.</span>
                    </div>
                    <div class="col-sm-4">
                        <!-- good measurement -->
                        <label style="font-weight: normal;color: #000;">Good Measurement</label>
                        <input type="text" id="good_measurement_qa" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #D3D3D3;height:34px; width:100%;"
                            disabled>
                        <span id="goodMeasurementError" class="error-message" style="display:none; color:#CA3F3F;">Good
                            Measurement field is required.</span>
                    </div>
                    <div class="col-sm-4">
                        <!-- ng measurement -->
                        <label style="font-weight: normal;color: #000;">NG Measurement</label>
                        <input type="text" id="ng_measurement_qa" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #D3D3D3;height:34px; width:100%;"
                            disabled>
                        <span id="noGoodMeasurementError" class="error-message" style="display:none; color:#CA3F3F;">NG
                            Measurement field is required.</span>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-sm-4">
                        <!-- type -->
                        <label style="font-weight: normal;color: #000;">Wire Type</label>
                        <input type="text" id="wire_type_qa" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #D3D3D3;height:34px; width:100%;"
                            disabled>
                        <span id="wireTypeDrError" class="error-message" style="display:none; color:#CA3F3F;">Wire Type
                            field is required.</span>
                    </div>
                    <div class="col-sm-4">
                        <!-- wire size -->
                        <label style="font-weight: normal;color: #000;">Wire Size</label>
                        <input type="text" id="wire_size_qa" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #D3D3D3;height:34px; width:100%;"
                            disabled>
                        <span id="wireSizeDrError" class="error-message" style="display:none; color:#CA3F3F;">Wire Size
                            field is required.</span>
                    </div>
                    <div class="col-sm-4">
                        <!-- connector cavity -->
                        <label style="font-weight: normal;color: #000;">Connector Cavity</label>
                        <input type="text" id="connector_cavity_qa" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #D3D3D3;height:34px; width:100%;"
                            disabled>
                        <span id="connectorCavityDrError" class="error-message"
                            style="display:none; color:#CA3F3F;">Connector Cavity field is required.</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <!-- Detail in content of defect -->
                        <label style="font-weight: normal;color: #000;">Detail in Content of Defect</label>
                        <input type="text" id="detail_content_defect_qa" class="textarea form-control pl-3"
                            autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #D3D3D3;height:50px; width:100%;"
                            disabled>
                        <span id="detailDefectError" class="error-message" style="display:none; color:#CA3F3F;">
                            Detail in Content of Defect field is required.</span>
                    </div>
                    <div class="col-sm-4">
                        <!-- treatment content of defect -->
                        <label style="font-weight: normal;color: #000;">Treatment Content of Defect</label>
                        <input type="text" id="treatment_content_defect_qa" class="textarea form-control pl-3"
                            autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #D3D3D3;height:50px; width:100%;"
                            disabled>
                        <span id="treatmentDefectError" class="error-message" style="display:none; color:#CA3F3F;">
                            Treatment Content of Defect field is required.</span>
                    </div>
                    <div class="col-sm-4">
                        <!-- harness status after repair -->
                        <label style="font-weight: normal;color: #000;">Harness Status after Repair</label>
                        <input type="text" id="harness_status_qa" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #D3D3D3;height:34px; width:100%;"
                            disabled>
                        <span id="harnessStatusError" class="error-message" style="display:none; color:#CA3F3F;">Harness
                            Status field is required.</span>
                    </div>
                </div>
                <br>
                <!-- /.end -->
            </div>
            <div class="modal-footer" style="background:#e9e9e9;">
                <!-- add record -->
                <div class="col-sm-2">
                    <!-- cancel button -->
                    <button class="btn btn-block" data-dismiss="modal"
                        style="color:#fff;height:34px;border-radius:.25rem;background: #CA3F3F;font-size:15px;font-weight:normal;"
                        onmouseover="this.style.backgroundColor='#AC3737'; this.style.color='#FFF';"
                        onmouseout="this.style.backgroundColor='#CA3F3F'; this.style.color='#FFF';">Cancel</button>
                </div>
                <div class="col-sm-2">
                    <!-- clear button -->
                    <button class="btn btn-block" onclick="clear_qa_fields()"
                        style="color:#fff;height:34px;border-radius:.25rem;background: #474747;font-size:15px;font-weight:normal;"
                        onmouseover="this.style.backgroundColor='#272727'; this.style.color='#FFF';"
                        onmouseout="this.style.backgroundColor='#474747'; this.style.color='#FFF';">Clear</button>
                </div>
                <div class="col-sm-2">
                    <!-- add button -->
                    <button class="btn btn-block" onclick="add_record_inspector()" id="btnGoToMcForm"
                        style="color:#fff;height:34px;border-radius:.25rem;background: #3066be;font-size:15px;font-weight:normal;"
                        onmouseover="this.style.backgroundColor='#024E92'; this.style.color='#FFF';"
                        onmouseout="this.style.backgroundColor='#3066be'; this.style.color='#FFF';">Add Record</button>
                </div>
            </div>
            <!-- /.end -->
        </div>
    </div>
</div>