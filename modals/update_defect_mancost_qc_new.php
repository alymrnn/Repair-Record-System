<div class="modal fade bd-example-modal-xl" id="update_defect_mancost_qc" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content" style="background:#f9f9f9;">
            <div class="modal-header" style="background:#004e89;">
                <h5 class="modal-title" id="exampleModalLabel" style="font-weight: normal;color: #fff;">Verify Defect
                    Record & Mancost Monitoring</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color: #fff;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label style="font-weight: bold;color: #000;font-size:25px">Defect Record</label>
                <div class="row">
                    <div class="col-sm-2">
                        <!-- defect id hidden -->
                        <input type="hidden" id="defect_id_no" class="form-control">

                        <!-- line no. -->
                        <label style="font-weight: normal;color: #000;">Line No.</label>
                        <input type="text" id="line_no_mc_update" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                        <br>
                    </div>
                    <div class="col-sm-2">
                        <label style="font-weight: normal;color: #000;">Category</label>
                        <input list="categoryList" placeholder="Select category" name="category_dr"
                            id="line_category_mc_update" autocomplete="off"
                            style="border:1px solid #ced4da; color: #525252;font-size: 15px;border-radius: .25rem;background: #E3E3E3;height:34px; width:100%;"
                            class="pl-2" disabled>
                        <datalist id="categoryList"></datalist>
                    </div>
                    <div class="col-sm-3">
                        <!-- date detected -->
                        <label style="font-weight: normal;color: #000;">Date Detected</label>
                        <input type="date" id="date_detected_mc_update" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                        <input type="hidden" id="na_date_detected" name="na_date_detected">
                    </div>
                    <div class="col-sm-2">
                        <!-- issue no of tag -->
                        <label style="font-weight: normal;color: #000;">Issue No. of Tag</label>
                        <input type="text" id="issue_tag_mc_update" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-3">
                        <!-- repairing date -->
                        <label style="font-weight: normal;color: #000;">Repairing Date</label>
                        <input type="date" id="repairing_date_mc_update" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <!-- car maker -->
                        <label style="font-weight: normal;color: #000;">Car Maker</label>
                        <input list="carMakerList" placeholder="Select the car maker" name="car_maker"
                            id="car_maker_mc_update" onchange="handleCarMakerChange(this)" autocomplete="off"
                            style="border:1px solid #ced4da; color: #525252;font-size: 15px;border-radius: .25rem;background: #E3E3E3;height:34px; width:100%;"
                            class="pl-2">
                        <datalist id="carMakerList">
                        </datalist>
                    </div>
                    <div class="col-sm-10">
                        <!-- qr scanning -->
                        <label style="font-weight: normal;color: #000;">Scan QR-Code</label>
                        <input type="text" id="qr_scan" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                </div>
                <!-- /.end row -->
                <div class="row">
                    <div class="col-sm-4">
                        <!-- product name -->
                        <label style="font-weight: normal;color: #000;">Product Name</label>
                        <input type="text" id="product_name_mc_update" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                        <br>
                    </div>
                    <div class="col-sm-4">
                        <!-- lot number -->
                        <label style="font-weight: normal;color: #000;">Lot No.</label>
                        <input type="text" id="lot_no_mc_update" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-4">
                        <!-- serial number -->
                        <label style="font-weight: normal;color: #000;">Serial No.</label>
                        <input type="text" id="serial_no_mc_update" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                </div>
                <!-- /.end -->
                <div class="row">
                    <div class="col-sm-4">
                        <!-- discovery process -->
                        <label style="font-weight: normal;color: #000;">Discovery Process</label>
                        <input list="discoveryProcessDrList" placeholder="Select the discovery process"
                            name="discovery_process_dr" id="discovery_process_mc_update" autocomplete="off"
                            style="border:1px solid #ced4da; color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="pl-2">
                        <datalist id="discoveryProcessDrList"></datalist>
                    </div>
                    <div class="col-sm-4">
                        <!-- discovery id number -->
                        <label style="font-weight: normal;color: #000;">ID Number</label>
                        <input type="text" id="discovery_id_no_mc_update" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-4">
                        <!-- discovery person -->
                        <label style="font-weight: normal;color: #000;">Discovery Person</label>
                        <input type="text" id="discovery_person_mc_update" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                </div>
                <br>
                <!-- /.end -->
                <div class="row">
                    <div class="col-sm-3">
                        <!-- occurrence process -->
                        <label style="font-weight: normal;color: #000;">Occurrence Process</label>
                        <input list="occurrenceProcessDrList" placeholder="Select the occurrence process"
                            name="occurrence_process_mc_update" id="occurrence_process_dr" autocomplete="off"
                            style="border:1px solid #ced4da; color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="pl-2">
                        <datalist id="occurrenceProcessDrList"></datalist>
                    </div>
                    <div class="col-sm-3">
                        <!-- occurrence shift -->
                        <label style="font-weight: normal;color: #000;">Occurrence Shift</label>
                        <input list="occurrenceShiftDrList" placeholder="Select the occurrence shift"
                            name="occurrence_shift_mc_update" id="occurrence_shift_dr" autocomplete="off"
                            style="border:1px solid #ced4da; color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="pl-2">
                        <datalist id="occurrenceShiftDrList"></datalist>
                    </div>
                    <div class="col-sm-3">
                        <!-- occurrence id number -->
                        <label style="font-weight: normal;color: #000;">ID Number</label>
                        <input type="text" id="occurrence_id_no_mc_update" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-3">
                        <!-- occurrence person -->
                        <label style="font-weight: normal;color: #000;">Occurrence Person</label>
                        <input type="text" id="occurrence_person_mc_update" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                </div>
                <br>
                <!-- /.end -->
                <div class="row">
                    <div class="col-sm-3">
                        <!-- outflow process -->
                        <label style="font-weight: normal;color: #000;">Outflow Process</label>
                        <input list="outflowProcessDrList" placeholder="Select the outflow process"
                            name="outflow_process_dr" id="outflow_process_mc_update" autocomplete="off"
                            style="border:1px solid #ced4da; color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="pl-2">
                        <datalist id="outflowProcessDrList"></datalist>
                    </div>
                    <div class="col-sm-3">
                        <!-- outflow shift -->
                        <label style="font-weight: normal;color: #000;">Outflow Shift</label>
                        <input list="outflowShiftDrList" placeholder="Select the outflow shift" name="outflow_shift_dr"
                            id="outflow_shift_mc_update" autocomplete="off"
                            style="border:1px solid #ced4da; color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="pl-2">
                        <datalist id="outflowShiftDrList"></datalist>
                    </div>
                    <div class="col-sm-3">
                        <!-- outflow id number -->
                        <label style="font-weight: normal;color: #000;">ID Number</label>
                        <input type="text" id="outflow_id_no_mc_update" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-3">
                        <!-- outflow person -->
                        <label style="font-weight: normal;color: #000;">Outflow Person</label>
                        <input type="text" id="outflow_person_mc_update" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                </div>
                <br>
                <!-- /.end -->
                <div class="row">
                    <div class="col-sm-3">
                        <!-- defect category -->
                        <label style="font-weight: normal;color: #000;">Defect Category</label>
                        <input list="defectCategoryDrList" placeholder="Select the defect category"
                            name="defect_category_dr" id="defect_category_mc_update2" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="pl-2">
                        <datalist id="defectCategoryDrList"></datalist>
                    </div>
                    <div class="col-sm-3">
                        <!-- sequence number -->
                        <label style="font-weight: normal;color: #000;">Sequence Number</label>
                        <input type="text" id="sequence_no_mc_update" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-3">
                        <!-- cause of defect -->
                        <label style="font-weight: normal;color: #000;">Cause of Defect</label>
                        <input list="defectCauseDrList" placeholder="Select the cause of defect" name="defect_cause_dr"
                            id="defect_cause_mc_update" autocomplete="off"
                            style="border:1px solid #ced4da; color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="pl-2">
                        <datalist id="defectCauseDrList"></datalist>
                    </div>
                    <div class="col-sm-3">
                        <!-- repair person -->
                        <label style="font-weight: normal;color: #000;">Dis-assembled by:</label>
                        <input list="repairPersonDrList" placeholder="Select the repair person" name="repair_person_dr"
                            id="repair_person_mc_update" autocomplete="off"
                            style="border:1px solid #ced4da; color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="pl-2">
                        <datalist id="repairPersonDrList"></datalist>
                    </div>
                </div>
                <br>
                <!-- /.end -->
                <div class="row">
                    <div class="col-sm-6">
                        <!-- detail in content of defect -->
                        <label style="font-weight: normal;color: #000;">Detail in Content of Defect</label>
                        <textarea type="text" id="detail_content_defect_mc_update" class="textarea form-control pl-3"
                            autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #E3E3E3;height:65px; width:100%;" readonly></textarea>
                    </div>
                    <div class="col-sm-6">
                        <!-- treatment content of defect -->
                        <label style="font-weight: normal;color: #000;">Treatment Content of Defect</label>
                        <textarea type="text" id="treatment_content_defect_mc_update" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:65px; width:100%;"></textarea>
                    </div>
                </div>
                <br>
                <br>


























                <!-- form label -->
                <label style="font-weight: bold;color: #000;font-size:25px">Manpower and Material Cost
                    Monitoring</label>
                <!-- /.end -->
                <div class="row">
                    <div class="col-sm-4">
                        <!-- repair start -->
                        <label style="font-weight: normal;color: #000;">Repair Start</label>
                        <input type="time" id="repair_start_mc_update" oninput="time_difference()"
                            class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #E3E3E3;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-4">
                        <!-- repair end -->
                        <label style="font-weight: normal;color: #000;">Repair End</label>
                        <input type="time" id="repair_end_mc_update" oninput="time_difference()"
                            class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #E3E3E3;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-4">
                        <!-- time consumed -->
                        <label style="font-weight: normal;color: #000;">Time Consumed (in minute/s)</label>
                        <input type="int" id="time_consumed_mc_update" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #E3E3E3;height:34px; width:100%;"
                            disabled>
                    </div>
                </div>
                <br>
                <!-- /.end -->
                <div class="row">
                    <div class="col-sm-3">
                        <!-- defect category mancost -->
                        <label style="font-weight: normal;color: #000;">Defect Category</label>
                        <input id="defect_category_mc_update" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #E3E3E3;height:34px; width:100%;"
                            class="pl-2">
                    </div>
                    <div class="col-sm-3">
                        <!-- occurrence process mancost -->
                        <label style="font-weight: normal;color: #000;">Occurrence Process</label>
                        <input id="occurrence_process_mc_update" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #E3E3E3;height:34px; width:100%;"
                            class="pl-2">
                    </div>
                    <div class="col-sm-3">
                        <!-- parts removed -->
                        <label style="font-weight: normal;color: #000;">Parts Removed</label>
                        <input type="text" id="parts_removed_mc_update" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #E3E3E3;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-3">
                        <!-- quantity -->
                        <label style="font-weight: normal;color: #000;">Quantity</label>
                        <input type="int" id="quantity_mc_update" oninput="qty_cost_product()" class="form-control pl-3"
                            autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #E3E3E3;height:34px; width:100%;">
                    </div>
                </div>
                <br>
                <!-- /.end -->
                <div class="row">
                    <div class="col-sm-3">
                        <!-- unit cost -->
                        <label style="font-weight: normal;color: #000;">Unit Cost ( ¥ )</label>
                        <input type="float" id="unit_cost_mc_update" oninput="qty_cost_product()"
                            class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #E3E3E3;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-3">
                        <!-- material cost -->
                        <label style="font-weight: normal;color: #000;">Material Cost ( ¥ )</label>
                        <input type="float" id="material_cost_mc_update" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #E3E3E3;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-3">
                        <!-- manhour cost -->
                        <label style="font-weight: normal;color: #000;">Manhour Cost ( ¥ )</label>
                        <input type="float" id="manhour_cost_mc_update" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #E3E3E3;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-3">
                        <!-- repaired portion treatment -->
                        <label style="font-weight: normal;color: #000;">Repaired Portion Treatment</label>
                        <input id="portion_treatment_mc_update" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #E3E3E3;height:34px; width:100%;"
                            class="pl-2">
                    </div>
                </div>
                <!-- /.end -->
                <!-- ENTRY COLUMN FOR PROCESS RESPONSIBLE PERSON -->
                <label></label>
                <div class="row">

                    <div class="col-sm-3">
                        <!-- re checking in process -->
                        <label style="font-weight: normal;color: #000;">QC Verification</label>
                        <label style="color:#CA3F3F">*</label>
                        <input list="qc_veri_list_mc" id="qc_veri_mc_update" class="form-control pl-3"
                            autocomplete="off" placeholder="Select Status"
                            style="color: #525252;font-size: 15px;border-radius: .25rem; background: #FFF;height:34px; width:100%;"
                            required>
                        <datalist id="qc_veri_list_mc">
                            <option selected value="">ALL</option>
                            <option value="GOOD"></option>
                            <option value="NO GOOD"></option>
                            <option value="N/A"></option>
                        </datalist>
                        <span id="qcVeriMcError" class="error-message" style="display:none; color:#CA3F3F;">QC
                            Verification field is required.</span>
                    </div>
                    <div class="col-sm-3">
                        <!-- checking date sign -->
                        <label style="font-weight: normal;color: #000;">Checking Date</label>
                        <label style="color:#CA3F3F">*</label>
                        <input type="date" id="checking_date_mc_update" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            required>
                        <span id="checkingDateMcError" class="error-message"
                            style="display:none; color:#CA3F3F;">Checking Date field is required.</span>
                    </div>
                    <div class="col-sm-3">
                        <!-- verified by -->
                        <label style="font-weight: normal;color: #000;">Verified By</label>
                        <label style="color:#CA3F3F">*</label>
                        <input type="text" id="verified_by_mc_update" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            required>
                        <span id="verifiedByMcError" class="error-message" style="display:none; color:#CA3F3F;">Verified
                            By field is required.</span>
                    </div>
                    <div class="col-sm-3">
                        <!-- remarks -->
                        <label style="font-weight: normal;color: #000;">Remarks</label>
                        <label style="color:#CA3F3F">*</label>
                        <input type="text" id="remarks_mc_update" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            required>
                        <span id="remarksMcError" class="error-message" style="display:none; color:#CA3F3F;">Remarks
                            field is required.</span>
                    </div>
                    <input type="hidden" id="admin_defect_id_1">
                </div>
                <br>
                <!-- /.end -->
            </div>
            <div class="modal-footer" style="background:#e9e9e9;">
                <div class="col-sm-2">
                    <!-- clear button -->
                    <button class="btn btn-block" onclick="clear_verify_list()"
                        style="color:#fff;height:34px;border-radius:.25rem;background: #474747;font-size:15px;font-weight:normal;">Clear</button>
                </div>
                <div class="col-sm-2">
                    <button class="btn btn-block" onclick="update_mancost2_record()"
                        style="color:#fff;height:34px;border-radius:.25rem;background: #226F54;font-size:15px;font-weight:normal;">Verify
                        Record</button>
                </div>
            </div>
            <!-- /.end -->
        </div>
    </div>
</div>