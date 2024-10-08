<div class="modal fade bd-example-modal-xl" id="update_defect_inspector" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLable" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
        <div class="modal-content" style="background:#f9f9f9;">
            <div class="modal-header" style="background: #0069B0;">
                <h5 class="modal-title" id="exampleModalLabel" style="font-weight: normal;color: #fff;"><i
                        class="fas fa-plus-circle"></i>&nbsp;
                    Edit Defect Record & Mancost Monitoring
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color: #fff;">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="max-height: 550px; overflow-y: auto;">
                <div class="row">
                    <div class="col-sm-10">
                        <p style="font-weight: bold;color: #000;font-size:25px">Defect Record</p>
                    </div>
                    <div class="col-sm-2">
                        <button class="btn btn-block" onclick="clear_update_pending_record()"
                            style="color:#fff;height:34px;border-radius:.25rem;background: #2b2d42;font-size:15px;font-weight:normal;"
                            onmouseover="this.style.backgroundColor='#181818'; this.style.color='#fff';"
                            onmouseout="this.style.backgroundColor='#2b2d42'; this.style.color='#fff';">
                            Clear N/As
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <label style="font-weight: normal;color: #000; background: #FFFAD1">Record Type</label>
                        <input type="text" id="record_type_insp_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 14px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-2">
                        <!-- defect id hidden -->
                        <!-- <input type="hidden" id="update_defect_inspector_id" class="form-control"> -->
                        <input type="hidden" id="inspector_defect_id" class="form-control">

                        <input type="hidden" id="update_defect_mancost_inspector_id" class="form-control">

                        <!-- line no. -->
                        <label style="font-weight: normal;color: #000;">Line No.</label>
                        <input type="text" id="line_no_insp_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                        <br>
                    </div>
                    <div class="col-sm-3">
                        <!-- date detected -->
                        <label style="font-weight: normal;color: #000;">Date Detected</label>
                        <input type="date" id="date_detected_insp_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                        <input type="hidden" id="na_date_detected" name="na_date_detected">
                    </div>
                    <div class="col-sm-2">
                        <!-- issue no of tag -->
                        <label style="font-weight: normal;color: #000;">Issue Tag No.</label>
                        <input type="text" id="issue_tag_insp_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            disabled>
                    </div>
                    <div class="col-sm-3">
                        <!-- repairing date -->
                        <label style="font-weight: normal;color: #000;">Repairing Date</label>
                        <label style="color:#CA3F3F">*</label>
                        <input type="datetime-local" id="repairing_date_insp_update" autocomplete="off"
                            class="form-control pl-2"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <label style="font-weight: normal;color: #000;">Category</label>
                        <input list="categoryList" name="category_dr" id="line_category_insp_update"
                            style="border:1px solid #ced4da; color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="pl-2">
                        <datalist id="categoryList"></datalist>
                    </div>
                    <div class="col-sm-2">
                        <!-- car maker -->
                        <label style="font-weight: normal;color: #000;">Car Maker</label>
                        <input list="carMakerList" placeholder="Select the car maker" name="car_maker"
                            id="car_maker_insp_update" onchange="handleCarMakerChange(this)" autocomplete="off"
                            style="border:1px solid #ced4da; color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="pl-2">
                        <datalist id="carMakerList"></datalist>
                    </div>
                    <div class="col-sm-2">
                        <label style="font-weight: normal;color: #000;">Car Model</label>
                        <input type="text" id="line_model_insp_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>

                    <div class="col-sm-2">
                        <!-- product name -->
                        <label style="font-weight: normal;color: #000;">Product Name</label>
                        <input type="text" id="product_name_insp_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                        <br>
                    </div>
                    <div class="col-sm-2">
                        <!-- lot number -->
                        <label style="font-weight: normal;color: #000;">Lot No.</label>
                        <input type="text" id="lot_no_insp_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-2">
                        <!-- serial number -->
                        <label style="font-weight: normal;color: #000;">Serial No.</label>
                        <input type="text" id="serial_no_insp_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <!-- discovery process -->
                        <label style="font-weight: normal;color: #000;">Discovery Process</label>
                        <input type="text" id="discovery_process_insp_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-4">
                        <!-- discovery id number -->
                        <label style="font-weight: normal;color: #000;">ID Number <i>(Discovery)</i></label>
                        <input type="text" id="discovery_id_no_insp_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-4">
                        <!-- discovery person -->
                        <label style="font-weight: normal;color: #000;">Discovery Person</label>
                        <input type="text" id="discovery_person_insp_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                </div>
                <br>
                <!-- /.end -->
                <div class="row">
                    <div class="col-sm-3">
                        <!-- occurrence process -->
                        <label style="font-weight: normal;color: #000;">Occurrence Process</label>
                        <input type="text" id="occurrence_process_insp_dr_update" class="form-control"
                            autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-3">
                        <!-- occurrence shift -->
                        <label style="font-weight: normal;color: #000;">Occurrence Shift</label>
                        <input list="occurrenceShiftDrList" name="occurrence_shift_insp_update"
                            id="occurrence_shift_insp_update"
                            style="border:1px solid #ced4da; color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="pl-2">
                        <datalist id="occurrenceShiftDrList"></datalist>
                    </div>
                    <div class="col-sm-3">
                        <!-- occurrence id number -->
                        <label style="font-weight: normal;color: #000;">ID Number <i>(Occurrence)</i></label>
                        <input type="text" id="occurrence_id_no_insp_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-3">
                        <!-- occurrence person -->
                        <label style="font-weight: normal;color: #000;">Occurrence Person</label>
                        <input type="text" id="occurrence_person_insp_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                </div>
                <br>
                <!-- /.end -->
                <div class="row">
                    <div class="col-sm-3">
                        <!-- outflow process -->
                        <label style="font-weight: normal;color: #000;">Outflow Process</label>
                        <input type="text" id="outflow_process_insp_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-3">
                        <!-- outflow shift -->
                        <label style="font-weight: normal;color: #000;">Outflow Shift</label>
                        <input list="outflowShiftDrList" name="outflow_shift_dr" id="outflow_shift_insp_update"
                            style="border:1px solid #ced4da; color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="pl-2">
                        <datalist id="outflowShiftDrList"></datalist>
                    </div>
                    <div class="col-sm-3">
                        <!-- outflow id number -->
                        <label style="font-weight: normal;color: #000;">ID Number <i>(Outflow)</i></label>
                        <input type="text" id="outflow_id_no_insp_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-3">
                        <!-- outflow person -->
                        <label style="font-weight: normal;color: #000;">Outflow Person</label>
                        <input type="text" id="outflow_person_insp_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                </div>
                <br>
                <!-- /.end -->
                <div class="row">
                    <div class="col-sm-3">
                        <!-- defect category -->
                        <label style="font-weight: normal;color: #000;">Defect Category</label>
                        <input type="text" id="defect_category_insp_dr_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-3">
                        <!-- sequence number -->
                        <label style="font-weight: normal;color: #000;">Sequence Number</label>
                        <input type="text" id="sequence_no_insp_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-3">
                        <!-- assy board number -->
                        <label style="font-weight: normal;color: #000;">Assy Board Number</label>
                        <input type="text" id="assy_board_no_insp_update" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            required>
                    </div>
                    <div class="col-sm-3">
                        <!-- cause of defect -->
                        <label style="font-weight: normal;color: #000;">Cause of Defect</label>
                        <input list="defectCauseDrList" name="defect_cause_dr" id="defect_cause_insp_update"
                            style="border:1px solid #ced4da; color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="pl-3">
                        <datalist id="defectCauseDrList"></datalist>
                    </div>
                </div>
                <div id="foreign_material_details" class="row p-1 mt-3"
                    style="border-top: 1px solid #DDD; border-bottom: 1px solid #DDD;">
                    <div class="col-sm-3">
                        <label style="font-weight: normal;color: #000;">Details <p style="font-size:13px;"><i>for
                                    Foreign Material only</i></p></label>
                        <!-- <label style="color:#EA9515">*</label> -->
                        <input type="text" id="defect_categ_foreign_mat_insp_update" class="form-control pl-3"
                            autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-3 mb-2">
                        <label style="font-weight: normal;color: #000;">Category <p style="font-size:13px;"><i>for
                                    Foreign Material only</i></p></label>
                        <!-- <label style="color:#EA9515">*</label> -->

                        <input type="text" id="defect_categ_foreign_mat_2_insp_update" class="form-control pl-3"
                            autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                        <!-- <select name="defect_categ_foreign_mat_2" id="defect_categ_foreign_mat_2_insp_update"
                            autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="form-control pl-2" required>
                            <option value="" disabled selected>----</option>
                            <option value="Inside Conn">Inside Conn</option>
                            <option value="Inside Terminal">Inside Terminal</option>
                            <option value="Outside Portion">Outside Portion</option>
                            <option value="N/A">N/A</option>
                        </select> -->
                    </div>
                </div>
                <br>
                <!-- /.end -->
                <div class="row mb-2">
                    <div class="col-sm-4">
                        <!-- good measurement -->
                        <label style="font-weight: normal;color: #000;">Good Measurement</label>
                        <label style="color:#CA3F3F">*</label>
                        <input type="text" id="good_measurement_insp_update" class="form-control pl-3"
                            autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-4">
                        <!-- ng measurement -->
                        <label style="font-weight: normal;color: #000;">NG Measurement</label>
                        <label style="color:#CA3F3F">*</label>
                        <input type="text" id="ng_measurement_insp_update" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-4">
                        <!-- connector cavity -->
                        <label style="font-weight: normal;color: #000;">Connector Cavity / Color</label>
                        <label style="color:#CA3F3F">*</label>
                        <input type="text" id="connector_cavity_insp_update" class="form-control pl-3"
                            autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <!-- detail in content of defect -->
                        <label style="font-weight: normal;color: #000;">Detail in Content of Defect</label>
                        <label style="color:#CA3F3F">*</label>
                        <textarea type="text" id="detail_content_defect_insp_update" class="textarea form-control"
                            autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:65px; width:100%;"></textarea>
                    </div>
                    <div class="col-sm-4">
                        <!-- wire type -->
                        <label style="font-weight: normal;color: #000;">Wire Type</label>
                        <label style="color:#CA3F3F">*</label>
                        <input type="text" id="wire_type_insp_update" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-4">
                        <!-- wire size -->
                        <label style="font-weight: normal;color: #000;">Wire Size</label>
                        <label style="color:#CA3F3F">*</label>
                        <input type="text" id="wire_size_insp_update" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-4">
                        <!-- treatment content of defect -->
                        <label style="font-weight: normal;color: #000;">Treatment Content of Defect</label>
                        <label style="color:#CA3F3F">*</label>
                        <textarea type="text" id="treatment_content_defect_insp_update" class="form-control"
                            autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:65px; width:100%;"></textarea>
                    </div>
                    <div class="col-sm-4">
                        <!-- repair person -->
                        <label style="font-weight: normal;color: #000;">Dis-assembled by:</label>
                        <label style="color:#CA3F3F">*</label>
                        <select name="repair_person_insp_update" id="repair_person_insp_update" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="form-control pl-2" required>
                            <option value="" disabled selected>Select the repair person</option>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <!-- harness status after repair -->
                        <label style="font-weight: normal;color: #000;">Harness Status after Repair</label>
                        <label style="color:#CA3F3F">*</label>

                        <select name="harness_status_insp_update" id="harness_status_insp_update" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="form-control pl-2" required>
                            <option value="" disabled selected>Select the harness status</option>
                        </select>
                    </div>
                </div>
                <!-- form label -->
                <label class="mt-4" style="font-weight: normal;color: #000;font-size:25px"><b>Manpower and Material Cost
                        Monitoring</b></label>
                <div class="row justify-content-end mt-2">
                    <p style="font-size: 18px"><i>Check N/A if White Tag and Defect Only:</i></p>&ensp;

                    <label style="display: inline-block;font-size: 18px">
                        <input type="checkbox" id="r_white_tag_defect" name="na_white_tag_defect"
                            value="Defect and Mancost" style="vertical-align: middle;">
                        N/A
                    </label>&emsp;
                </div>
                <div class="row mb-2">
                    <div class="col-sm-3">
                        <!-- defect id hidden -->
                        <input type="hidden" id="defect_id_no" class="form-control">

                        <!-- repair start -->
                        <label style="font-weight: normal;color: #000;">Repair Start</label>
                        <label style="color:#CA3F3F">*</label>
                        <input type="time" id="repair_start_mc2" oninput="time_difference()" class="form-control pl-3"
                            autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            required>
                        <input type="hidden" id="na_repair_start" name="na_repair_start">

                        <span id="repairStartMcError" class="error-message" style="display:none; color:#CA3F3F;">Repair
                            Start field is required.</span>
                    </div>
                    <div class="col-sm-3">
                        <!-- repair end -->
                        <label style="font-weight: normal;color: #000;">Repair End</label>
                        <label style="color:#CA3F3F">*</label>
                        <input type="time" id="repair_end_mc2" oninput="time_difference()" class="form-control pl-3"
                            autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            required>
                        <input type="hidden" id="na_repair_end" name="na_repair_end">

                        <span id="repairEndMcError" class="error-message" style="display:none; color:#CA3F3F;">Repair
                            End field is required.</span>
                    </div>
                    <div class="col-sm-3">
                        <!-- time consumed -->
                        <label style="font-weight: normal;color: #000;">Time Consumed (in minute/s)</label>
                        <input type="int" id="time_consumed_mc2" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #F1F1F1;height:34px; width:100%;"
                            readonly>
                        <input type="hidden" id="na_time_consumed" name="na_time_consumed">
                    </div>
                    <div class="col-sm-3">
                        <!-- salary cost -->
                        <input type="hidden" id="salary_cost_mc2">

                        <!-- manhour cost -->
                        <label style="font-weight: normal;color: #000;">Manhour Cost ( ¥ )</label>
                        <input type="float" id="manhour_cost_mc2" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #F1F1F1;height:34px; width:100%;"
                            readonly>
                        <input type="hidden" id="na_manhour_cost" name="na_manhour_cost">

                    </div>
                </div>
                <!-- <br> -->
                <!-- /.end -->
                <div class="row mb-3">
                    <div class="col-sm-4">
                        <!-- defect category mancost -->
                        <label style="font-weight: normal;color: #000;">Defect Category</label>
                        <label style="color:#CA3F3F">*</label>
                        <!-- <input list="defectCategoryMcList" placeholder="Select the defect category"
                            name="defect_category_mc" id="defect_category_mc" autocomplete="off"
                            style="border:1px solid #ced4da; color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="pl-2" required>
                        <datalist id="defectCategoryMcList"></datalist> -->

                        <select name="defect_category_mc" id="defect_category_mc2" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #ced4da;background: #FFF;height:34px; width:100%;"
                            class="form-control pl-2" required>
                            <option value="" disabled selected>Select the defect category</option>
                        </select>
                        <span id="defectCategoryMcError" class="error-message"
                            style="display:none; color:#CA3F3F;">Defect Category field is required.</span>

                        <label class="p-0 m-0" style="font-size: 12px;font-weight: normal;"><i>Applicable if the value
                                above is OTHERS</i></label>
                        <input type="text" id="others_defect_category_insp_mc_update"
                            name="others_defect_category_insp_mc_update" placeholder="If others, please specify"
                            class="form-control mt-1" value="N/A"
                            style="color: #525252; font-size: 15px; border-radius: .25rem; background: #FFF; height:34px; width:100%;">

                    </div>
                    <div class="col-sm-4">
                        <!-- occurrence process mancost -->
                        <label style="font-weight: normal;color: #000;">Occurrence Process</label>
                        <label style="color:#CA3F3F">*</label>
                        <!-- <input list="occurrenceProcessMcList" placeholder="Select the occurrence process"
                            name="occurrence_process_mc" id="occurrence_process_mc" autocomplete="off"
                            style="border:1px solid #ced4da; color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="pl-2" required>
                        <datalist id="occurrenceProcessMcList"></datalist> -->

                        <select name="occurrence_process_mc" id="occurrence_process_mc2" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #ced4da;background: #FFF;height:34px; width:100%;"
                            class="form-control pl-2" required>
                            <option value="" disabled selected>Select the occurrence process</option>
                        </select>
                        <span id="occurrenceProcessMcError" class="error-message"
                            style="display:none; color:#CA3F3F;">Occurrence Process field is required.</span>

                        <label class="p-0 m-0" style="font-size: 12px;font-weight: normal;"><i>Applicable if the value
                                above is OTHERS</i></label>
                        <input type="text" id="others_occurrence_process_insp_mc_update"
                            name="others_occurrence_process_insp_mc_update" placeholder="If others, please specify"
                            class="form-control mt-1" value="N/A"
                            style="color: #525252; font-size: 15px; border-radius: .25rem; background: #FFF; height:34px; width:100%;">
                    </div>
                    <div class="col-sm-4">
                        <!-- parts removed -->
                        <label style="font-weight: normal;color: #000;">Parts Removed</label>
                        <label style="color:#CA3F3F">*</label>
                        <input type="text" id="parts_removed_mc2" oninput="fetchUnitCost()" class="form-control pl-3"
                            autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            required list="partsRemovedMcList">
                        <datalist id="partsRemovedMcList"></datalist>
                        <span id="partsRemovedMcError" class="error-message" style="display:none; color:#CA3F3F;">Parts
                            Removed
                            field is required.</span>
                    </div>
                </div>
                <!-- <br> -->
                <!-- /.end -->
                <div class="row mb-2">
                    <div class="col-sm-3">
                        <!-- quantity -->
                        <label style="font-weight: normal;color: #000;">Quantity</label>
                        <label style="color:#CA3F3F">*</label>
                        <input type="int" id="quantity_mc2" oninput="qty_cost_product()" class="form-control pl-3"
                            autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            required>
                        <input type="hidden" id="na_quantity" name="na_quantity">
                        <span id="quantityMcError" class="error-message" style="display:none; color:#CA3F3F;">Quantity
                            field is required.</span>

                    </div>
                    <div class="col-sm-3">
                        <!-- unit cost -->
                        <label style="font-weight: normal;color: #000;">Unit Cost ( ¥ )</label>
                        <label style="color:#CA3F3F">*</label>
                        <input type="float" id="unit_cost_mc2" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #F1F1F1;height:34px; width:100%;"
                            readonly>
                        <input type="hidden" id="na_unit_cost" name="na_unit_cost">

                    </div>
                    <div class="col-sm-3">
                        <!-- material cost -->
                        <label style="font-weight: normal;color: #000;">Material Cost ( ¥ )</label>
                        <input type="float" id="material_cost_mc2" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #F1F1F1;height:34px; width:100%;"
                            readonly>
                        <input type="hidden" id="na_material_cost" name="na_material_cost">

                    </div>
                    <div class="col-sm-3">
                        <!-- repaired portion treatment -->
                        <label style="font-weight: normal;color: #000;">Repaired Portion Treatment</label>
                        <label style="color:#CA3F3F">*</label>
                        <!-- <input list="portionTreatmentMcList" placeholder="Select the repaired portion treatment"
                            name="portion_treatment" id="portion_treatment" autocomplete="off"
                            style="border:1px solid #ced4da; color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="pl-2" required>
                        <datalist id="portionTreatmentMcList"></datalist> -->

                        <select name="portion_treatment" id="portion_treatment2" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #ced4da;background: #FFF;height:34px; width:100%;"
                            class="form-control pl-2" required>
                            <option value="" disabled selected>Select the repaired portion treatment</option>
                        </select>
                        <span id="portionTreatmentMcError" class="error-message"
                            style="display:none; color:#CA3F3F;">Repaired Portion Treatment field is required.</span>

                        <label class="p-0 m-0" style="font-size: 12px;font-weight: normal;"><i>Applicable if the value
                                above is OTHERS</i></label>
                        <input type="text" id="other_portion_treatment_insp_mc_update"
                            name="other_portion_treatment_insp_mc_update" placeholder="If others, please specify"
                            class="form-control mt-1" value="N/A"
                            style="color: #525252; font-size: 15px; border-radius: .25rem; background: #FFF; height:34px; width:100%;">
                    </div>
                </div>
                <!-- /.end -->

                <div class="row mt-3">
                    <div class="col-sm-3">
                        <!-- clear button -->
                        <button class="btn btn-block" onclick="clear_pending_mc_fields()"
                            style="color:#fff;height:34px;border-radius:.25rem;background: #474747;font-size:15px;font-weight:normal;"
                            onmouseover="this.style.backgroundColor='#272727'; this.style.color='#FFF';"
                            onmouseout="this.style.backgroundColor='#474747'; this.style.color='#FFF';">Clear Mancost
                            Details</button>
                    </div>
                    <div class="col-sm-3"></div>
                    <div class="col-sm-4"></div>
                    <div class="col-sm-2">
                        <!-- add record -->
                        <button class="btn btn-block" onclick="add_pending_multiple_mancost()"
                            style="color:#fff;height:34px;border-radius:.25rem;background: #0069B0;font-size:15px;font-weight:normal;"
                            onmouseover="this.style.backgroundColor='#004574'; this.style.color='#FFF';"
                            onmouseout="this.style.backgroundColor='#0069B0'; this.style.color='#FFF';">Add
                            Record</button>
                    </div>
                </div>
                <!-- /.end -->
                <hr>

                <!-- For another mancost table -->
                <div class="row table-responsive m-0 p-0"
                    style="max-height: 450px;overflow: auto; display:inline-block;">
                    <table class="table col-12 table-head-fixed text-nowrap table-hover" id="list_of_multiple_mancost"
                        style="background: white;">
                        <thead style="text-align: center;">
                            <th>#</th>
                            <th>Action</th>
                            <th>Repair Start</th>
                            <th>Repair End</th>
                            <th>Time Consumed</th>
                            <th>Defect Category</th>
                            <th>Others - Defect Category</th>
                            <th>Occurrence Process</th>
                            <th>Others - Occurrence Process</th>
                            <th>Parts Removed</th>
                            <th>Quantity</th>
                            <th>Unit Cost</th>
                            <th>Material Cost</th>
                            <th>Manhour Cost</th>
                            <th>Repaired Portion Treatment</th>
                            <th>Others - Repaired Portion Treatment</th>
                        </thead>
                        <tbody class="mb-0" id="list_of_added_mancost_insp">
                            <tr>
                                <td colspan="6" style="text-align: center;">
                                    <div class="spinner-border text-dark" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.row end -->
            </div>
            <div class="modal-footer" style="background:#e9e9e9;">
                <div class="col-sm-2">
                    <!-- add record -->
                    <button class="btn btn-block" onclick="add_defect_mancost_record_insp()"
                        style="color:#fff;height:34px;border-radius:.25rem;background: #226F54;font-size:15px;font-weight:normal;"
                        onmouseover="this.style.backgroundColor='#164837'; this.style.color='#FFF';"
                        onmouseout="this.style.backgroundColor='#226F54'; this.style.color='#FFF';">Save
                        Record/s</button>
                    <!-- Note: Add an alert notification to inform the repair person that once the record is saved and added, it can’t be edited or deleted.  -->
                </div>
            </div>
            <!-- /.end -->
        </div>
    </div>
</div>