<div class="modal fade bd-example-modal-xl" id="add_defect_mancost" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLable" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content" style="background:#f9f9f9;">
            <div class="modal-header" style="background: #0069B0;">
                <h5 class="modal-title" id="exampleModalLabel" style="font-weight: normal;color: #fff;"><i
                        class="fas fa-plus-circle"></i>&nbsp;
                    Add Defect Record & Mancost Monitoring
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color: #fff;">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="max-height: 550px; overflow-y: auto;">
                <div class="row justify-content-end mt-2">
                    <p style="font-size: 18px"><i>Select the record to be added:</i></p>&ensp;

                    <label style="display: inline-block;font-size: 18px">
                        <input type="radio" id="r_defect_mancost" name="record_type" value="Defect and Mancost"
                            style="vertical-align: middle;">
                        Defect & Mancost
                    </label>&emsp;

                    <label style="display: inline-block;font-size: 18px">
                        <input type="radio" id="r_defect_only" name="record_type" value="Defect Only"
                            style="vertical-align: middle;">
                        Defect Only
                    </label>&emsp;

                    <label style="display: inline-block;font-size: 18px">
                        <input type="radio" id="r_mancost_only" name="record_type" value="Mancost Only"
                            style="vertical-align: middle;">
                        Mancost Only
                    </label>&emsp;

                    <label style="display: inline-block;font-size: 18px">
                        <input type="radio" id="r_white_tag" name="record_type" value="White Tag"
                            style="vertical-align: middle;">
                        White Tag
                    </label>&emsp;
                </div>

                <!-- form label -->
                <label style="font-weight: normal;color: #000;font-size:25px"><b>Defect Record</b></label>
                <div class="row">
                    <div class="col-sm-2">
                        <!-- defect id hidden -->
                        <input type="hidden" id="defect_id_no" class="form-control">

                        <!-- line no. -->
                        <label style="font-weight: normal;color: #000;">Line No.</label>
                        <label style="color:#CA3F3F">*</label>
                        <!-- <input type="text" id="line_no" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            required maxlength="4" pattern="[0-9]{1,4}"> -->

                        <select name="line_no" id="line_no" autocomplete="off"
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
                        <!-- <input list="categoryList" placeholder="Select category" name="category_dr"
                            id="line_category_dr" autocomplete="off"
                            style=" color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="pl-2" required>
                        <datalist id="categoryList"></datalist> -->

                        <select name="line_category_dr" id="line_category_dr" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="form-control pl-2" required>
                            <option value="" disabled selected>Select the category</option>
                        </select>
                        <span id="lineCategoryError" class="error-message" style="display:none; color:#CA3F3F;">Category
                            field is required.</span>
                    </div>
                    <div class="col-sm-3">
                        <!-- date datected -->
                        <label style="font-weight: normal;color: #000;">Date Detected</label>
                        <label style="color:#CA3F3F">*</label>
                        <input type="date" id="date_detected" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            required>

                        <span id="dateDetectedError" class="error-message" style="display:none; color:#CA3F3F;">Date
                            Detected field is required.</span>
                    </div>
                    <div class="col-sm-2">
                        <!-- issue no of tag -->
                        <label style="font-weight: normal;color: #000;">Issue Tag No.</label>
                        <label style="color:#CA3F3F">*</label>
                        <input type="text" id="issue_tag" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #F1F1F1;height:34px; width:100%;"
                            readonly>
                        <span id="issueTagError" class="error-message" style="display:none; color:#CA3F3F;">Issue No. of
                            Tag field is required.</span>
                    </div>
                    <div class="col-sm-3">
                        <!-- repairing date -->
                        <label style="font-weight: normal;color: #000;">Repairing Date</label>
                        <label style="color:#CA3F3F">*</label>
                        <input type="datetime-local" id="repairing_date" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            required>
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
                        <!-- <input list="carMakerList" placeholder="Select the car maker" name="car_maker" id="car_maker"
                            onchange="handleCarMakerChange(this)" autocomplete="off"
                            style=" color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="pl-2" required> -->
                        <!-- <datalist id="carMakerList">
                        </datalist> -->

                        <input name="car_maker" id="car_maker" onchange="handleCarMakerChange(this)"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #F1F1F1;height:34px; width:100%;"
                            class="pl-2 form-control" readonly>
                        <span id="carMakerError" class="error-message" style="display:none; color:#CA3F3F;">Car Maker
                            field is required.</span>
                    </div>
                    <div class="col-sm-2">
                        <label style="font-weight: normal;color: #000;">Car Model</label>
                        <label style="color:#CA3F3F">*</label>
                        <select name="line_model" id="line_model" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="pl-2 form-control" disabled required>
                            <option value="" disabled selected>Select car model</option>
                        </select>
                        <span id="lineCategoryError" class="error-message" style="display:none; color:#CA3F3F;">Car
                            Model field is required.</span>
                    </div>

                    <div class="col-sm-2">
                        <!-- car maker -->
                        <label style="font-weight: normal;color: #000;">QR Setting</label>
                        <label style="color:#CA3F3F">*</label>

                        <select name="car_model" id="car_model" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="form-control pl-2" required>
                            <option value="" disabled selected>Select setting</option>
                        </select>
                    </div>
                    <div class="col-sm-12">
                        <!-- qr scanning -->
                        <label style="font-weight: normal;color: #000;">Scan QR-Code</label>
                        <!-- <label style="color:#CA3F3F">*</label> -->
                        <input type="text" id="qr_scan" class="form-control pl-3" autocomplete="off"
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
                        <input type="text" id="product_name" class="form-control pl-3" autocomplete="off"
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
                        <input type="text" id="lot_no" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #F1F1F1;height:34px; width:100%;"
                            readonly>
                        <span id="lotNumberError" class="error-message" style="display:none; color:#CA3F3F;">Lot Number
                            field is required.</span>
                    </div>
                    <div class="col-sm-4">
                        <!-- serial number -->
                        <label style="font-weight: normal;color: #000;">Serial No.</label>
                        <label style="color:#CA3F3F">*</label>
                        <input type="text" id="serial_no" class="form-control pl-3" autocomplete="off"
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
                        <!-- <input list="discoveryProcessDrList" placeholder="Select the discovery process"
                            name="discovery_process_dr" id="discovery_process_dr" autocomplete="off"
                            style=" color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="pl-2" required> -->

                        <!-- <datalist id="discoveryProcessDrList"></datalist> -->

                        <select name="discovery_process_dr" id="discovery_process_dr" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="form-control pl-2" required>
                            <option value="" disabled selected>Select the discovery process</option>
                        </select>
                        <span id="discoveryProcessError" class="error-message"
                            style="display:none; color:#CA3F3F;">Discovery Process field is required.</span>
                    </div>
                    <div class="col-sm-4">
                        <!-- discovery id number -->
                        <label style="font-weight: normal;color: #000;">ID Number</label>
                        <label style="color:#CA3F3F">*</label>
                        <input type="text" id="discovery_id_no_dr" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            required>
                        <span id="discoveryIDError" class="error-message" style="display:none; color:#CA3F3F;">ID Number
                            field is required.</span>
                    </div>
                    <div class="col-sm-4">
                        <!-- discovery person -->
                        <label style="font-weight: normal;color: #000;">Discovery Person</label>
                        <label style="color:#CA3F3F">*</label>
                        <input type="text" id="discovery_person" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            readonly required>
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
                        <!-- <input list="occurrenceProcessDrList" placeholder="Select the occurrence process"
                            name="occurrence_process_dr" id="occurrence_process_dr" autocomplete="off"
                            style=" color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="pl-2" required>
                        <datalist id="occurrenceProcessDrList"></datalist> -->

                        <select name="occurrence_process_dr" id="occurrence_process_dr" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="form-control pl-2" required>
                            <option value="" disabled selected>Select the occurrence process</option>
                        </select>
                        <span id="occurrenceProcessError" class="error-message"
                            style="display:none; color:#CA3F3F;">Occurrence Process field is required.</span>
                    </div>
                    <div class="col-sm-3">
                        <!-- occurrence shift -->
                        <label style="font-weight: normal;color: #000;">Occurrence Shift</label>
                        <label style="color:#CA3F3F">*</label>
                        <!-- <input list="occurrenceShiftDrList" placeholder="Select the occurrence shift"
                            name="occurrence_shift_dr" id="occurrence_shift_dr" autocomplete="off"
                            style=" color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="pl-2" required>
                        <datalist id="occurrenceShiftDrList"></datalist> -->

                        <select name="occurrence_shift_dr" id="occurrence_shift_dr" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="form-control pl-2" required>
                            <option value="" disabled selected>Select the occurrence shift</option>
                        </select>
                        <span id="occurrenceShiftError" class="error-message"
                            style="display:none; color:#CA3F3F;">Occurrence Shift field is required.</span>
                    </div>
                    <div class="col-sm-3">
                        <!-- occurrence id number -->
                        <label style="font-weight: normal;color: #000;">ID Number</label>
                        <label style="color:#CA3F3F">*</label>
                        <input type="text" id="occurrence_id_no_dr" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            required>
                        <span id="occurrenceIDError" class="error-message" style="display:none; color:#CA3F3F;">ID
                            Number field is required.</span>
                    </div>
                    <div class="col-sm-3">
                        <!-- occurrence person -->
                        <label style="font-weight: normal;color: #000;">Occurrence Person</label>
                        <label style="color:#CA3F3F">*</label>
                        <input type="text" id="occurrence_person" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            required>
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
                        <!-- <input list="outflowProcessDrList" placeholder="Select the outflow process"
                            name="outflow_process_dr" id="outflow_process_dr" autocomplete="off"
                            style=" color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="pl-2" required>
                        <datalist id="outflowProcessDrList"></datalist> -->

                        <select name="outflow_process_dr" id="outflow_process_dr" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="form-control pl-2" required>
                            <option value="" disabled selected>Select the outflow process</option>
                        </select>
                        <span id="outflowProcessError" class="error-message"
                            style="display:none; color:#CA3F3F;">Outflow Process field is required.</span>
                    </div>
                    <div class="col-sm-3">
                        <!-- outflow shift -->
                        <label style="font-weight: normal;color: #000;">Outflow Shift</label>
                        <label style="color:#CA3F3F">*</label>
                        <!-- <input list="outflowShiftDrList" placeholder="Select the outflow shift" name="outflow_shift_dr"
                            id="outflow_shift_dr" autocomplete="off"
                            style=" color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="pl-2" required>
                        <datalist id="outflowShiftDrList"></datalist> -->

                        <select name="outflow_shift_dr" id="outflow_shift_dr" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="form-control pl-2" required>
                            <option value="" disabled selected>Select the outflow shift</option>
                        </select>
                        <span id="outflowShiftError" class="error-message" style="display:none; color:#CA3F3F;">Outflow
                            Shift field is required.</span>
                    </div>
                    <div class="col-sm-3">
                        <!-- outflow id number -->
                        <label style="font-weight: normal;color: #000;">ID Number</label>
                        <label style="color:#CA3F3F">*</label>
                        <input type="text" id="outflow_id_no_dr" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            required>
                        <span id="outflowIDError" class="error-message" style="display:none; color:#CA3F3F;">ID Number
                            field is required.</span>
                    </div>
                    <div class="col-sm-3">
                        <!-- outflow person -->
                        <label style="font-weight: normal;color: #000;">Outflow Person</label>
                        <label style="color:#CA3F3F">*</label>
                        <input type="text" id="outflow_person" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            required>
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
                        <!-- <input list="defectCategoryDrList" placeholder="Select the defect category"
                            name="defect_category_dr" id="defect_category_dr" autocomplete="off"
                            style=" color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="pl-2" required>
                        <datalist id="defectCategoryDrList"></datalist> -->

                        <select name="defect_category_dr" id="defect_category_dr" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="form-control pl-2" required>
                            <option value="" disabled selected>Select the defect category</option>
                        </select>
                        <span id="defectCategoryError" class="error-message" style="display:none; color:#CA3F3F;">Defect
                            Category field is required.</span>
                    </div>
                    <div class="col-sm-2">
                        <!-- sequence number -->
                        <label style="font-weight: normal;color: #000;">Sequence No.</label>
                        <label style="color:#CA3F3F">*</label>
                        <input type="text" id="sequence_no" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            required>
                        <span id="sequenceNumberError" class="error-message"
                            style="display:none; color:#CA3F3F;">Sequence Number field is required.</span>
                    </div>
                    <div class="col-sm-2">
                        <!-- assy board number -->
                        <label style="font-weight: normal;color: #000;">Assy Board No.</label>
                        <label style="color:#CA3F3F">*</label>
                        <input type="text" id="assy_board_no_dr" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            required>
                        <span id="assyBoardNumberError" class="error-message" style="display:none; color:#CA3F3F;">Assy
                            Board Number field is required.</span>
                    </div>
                    <div class="col-sm-2">
                        <!-- cause of defect -->
                        <label style="font-weight: normal;color: #000;">Cause of Defect</label>
                        <label style="color:#CA3F3F">*</label>
                        <!-- <input list="defectCauseDrList" placeholder="Select the cause of defect" name="defect_cause_dr"
                            id="defect_cause_dr" autocomplete="off"
                            style=" color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="pl-2" required>
                        <datalist id="defectCauseDrList"></datalist> -->

                        <select name="defect_cause_dr" id="defect_cause_dr" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="form-control pl-2" required>
                            <option value="" disabled selected>Select the cause of defect</option>
                        </select>
                        <span id="defectCauseError" class="error-message" style="display:none; color:#CA3F3F;">Cause of
                            Defect field is required.</span>
                    </div>
                    <div class="col-sm-3">
                        <!-- repair person -->
                        <label style="font-weight: normal;color: #000;">Dis-assembled by:</label>
                        <label style="color:#CA3F3F">*</label>
                        <!-- <input list="repairPersonDrList" placeholder="Select the repair person" name="repair_person_dr"
                            id="repair_person_dr" autocomplete="off"
                            style=" color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="pl-2" required>
                        <datalist id="repairPersonDrList"></datalist> -->

                        <select name="repair_person_dr" id="repair_person_dr" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="form-control pl-2" required>
                            <option value="" disabled selected>Select the repair person</option>
                        </select>
                        <span id="repairPersonError" class="error-message" style="display:none; color:#CA3F3F;">Repair
                            Person field is required.</span>
                    </div>
                </div>

                <div id="foreign_material_details" class="row p-1 mt-3 hidden-defect"
                    style="border-top: 1px solid #DDD; border-bottom: 1px solid #DDD;">
                    <div class="col-sm-3">
                        <label style="font-weight: normal;color: #000;">Details</label>
                        <label style="color:#CA3F3F">*</label>
                        <input type="text" id="defect_categ_foreign_mat" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-3 mb-2">
                        <label style="font-weight: normal;color: #000;">Category</label>
                        <label style="color:#CA3F3F">*</label>
                        <select name="defect_categ_foreign_mat_2" id="defect_categ_foreign_mat_2" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="form-control pl-2" required>
                            <option value="" disabled selected>----</option>
                            <option value="Inside Conn">Inside Conn</option>
                            <option value="Inside Terminal">Inside Terminal</option>
                            <option value="Outside Portion">Outside Portion</option>
                            <option value="N/A">N/A</option>
                        </select>
                    </div>
                </div>
                <!-- /.end -->
                <div class="row mb-2 mt-3">
                    <div class="col-sm-1"
                        style="display: flex; justify-content: center; align-items: center; height: 100%;">
                        <label style="display: flex; align-items: center;">
                            <input type="checkbox" id="na_value_1_pd" name="na_value_1" value="N/A"
                                style="margin-right: 5px;" onchange="updateMeasurementFieldsPd(this)">
                            N/A
                        </label>
                    </div>
                    <div class="col-sm-5">
                        <!-- good measurement -->
                        <label style="font-weight: normal;color: #000;">Good Measurement</label>
                        <label style="color:#CA3F3F">*</label>
                        <input type="text" id="good_measurement_dr" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            required>
                        <span id="goodMeasurementError" class="error-message" style="display:none; color:#CA3F3F;">Good
                            Measurement field is required.</span>
                    </div>
                    <div class="col-sm-6">
                        <!-- ng measurement -->
                        <label style="font-weight: normal;color: #000;">NG Measurement</label>
                        <label style="color:#CA3F3F">*</label>
                        <input type="text" id="ng_measurement_dr" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            required>
                        <span id="noGoodMeasurementError" class="error-message" style="display:none; color:#CA3F3F;">NG
                            Measurement field is required.</span>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-sm-1"
                        style="display: flex; justify-content: center; align-items: center; height: 100%;">
                        <label style="display: flex; align-items: center;">
                            <input type="checkbox" id="na_value_2_pd" name="na_value_2" value="N/A"
                                style="margin-right: 5px;" onchange="updateWireFieldsPd(this)">
                            N/A
                        </label>
                    </div>
                    <div class="col-sm-3">
                        <!-- type -->
                        <label style="font-weight: normal;color: #000;">Wire Type</label>
                        <label style="color:#CA3F3F">*</label>
                        <input type="text" id="wire_type_dr" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            required>
                        <span id="wireTypeDrError" class="error-message" style="display:none; color:#CA3F3F;">Wire Type
                            field is required.</span>
                    </div>
                    <div class="col-sm-4">
                        <!-- wire size -->
                        <label style="font-weight: normal;color: #000;">Wire Size</label>
                        <label style="color:#CA3F3F">*</label>
                        <input type="text" id="wire_size_dr" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            required>
                        <span id="wireSizeDrError" class="error-message" style="display:none; color:#CA3F3F;">Wire Size
                            field is required.</span>
                    </div>
                    <div class="col-sm-4">
                        <!-- connector cavity -->
                        <label style="font-weight: normal;color: #000;">Connector Cavity / Color</label>
                        <label style="color:#CA3F3F">*</label>
                        <input type="text" id="connector_cavity_dr" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            required>
                        <span id="connectorCavityDrError" class="error-message"
                            style="display:none; color:#CA3F3F;">Connector Cavity field is required.</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <!-- Detail in content of defect -->
                        <label style="font-weight: normal;color: #000;">Detail in Content of Defect</label>
                        <label style="color:#CA3F3F">*</label>
                        <textarea id="detail_content_defect" class="textarea form-control pl-3" maxlength="1000"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:65px; width:100%;"
                            onkeyup="count_detail_content_defect_char()" required></textarea>
                        <span id="detailDefectError" class="error-message" style="display:none; color:#CA3F3F;">
                            Detail in Content of Defect field is required.</span>
                        <span id="detail_content_defect_count" style="color: #525252;font-size: 12px;"></span>
                    </div>
                    <div class="col-sm-4">
                        <!-- treatment content of defect -->
                        <label style="font-weight: normal;color: #000;">Treatment Content of Defect</label>
                        <label style="color:#CA3F3F">*</label>
                        <textarea type="text" id="treatment_content_defect" class="textarea form-control pl-3"
                            maxlength="1000"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:65px; width:100%;"
                            onkeyup="count_treatment_content_defect_char()" required></textarea>
                        <span id="treatmentDefectError" class="error-message" style="display:none; color:#CA3F3F;">
                            Treatment Content of Defect field is required.</span>
                        <span id="treatment_content_defect_count" style="color: #525252;font-size: 12px;"></span>
                    </div>
                    <div class="col-sm-4">
                        <!-- harness status after repair -->
                        <label style="font-weight: normal;color: #000;">Harness Status after Repair</label>
                        <label style="color:#CA3F3F">*</label>
                        <select name="harness_status_dr" id="harness_status_dr" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="form-control pl-2" required>
                            <option value="" disabled selected>Select the harness status</option>
                        </select>
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
                    <button class="btn btn-block" onclick="clear_dr_mc_fields()"
                        style="color:#fff;height:34px;border-radius:.25rem;background: #474747;font-size:15px;font-weight:normal;"
                        onmouseover="this.style.backgroundColor='#272727'; this.style.color='#FFF';"
                        onmouseout="this.style.backgroundColor='#474747'; this.style.color='#FFF';">Clear</button>
                </div>
                <div class="col-sm-2">
                    <!-- next button -->
                    <button class="btn btn-block" onclick="go_to_mc_form()" id="btnGoToMcForm"
                        style="color:#fff;height:34px;border-radius:.25rem;background: #226F54;font-size:15px;font-weight:normal;"
                        onmouseover="this.style.backgroundColor='#164837'; this.style.color='#FFF';"
                        onmouseout="this.style.backgroundColor='#226F54'; this.style.color='#FFF';">Next</button>
                    <!-- Note: Add an alert notification to inform the repair person that once the record is saved and added, it can’t be edited or deleted.  -->
                </div>
            </div>
            <!-- /.end -->
        </div>
    </div>
</div>