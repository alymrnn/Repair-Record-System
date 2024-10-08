<div class="modal fade bd-example-modal-xl" id="update_defect_mancost_pd" tabindex="-1" role="dialog"
    data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content" style="background:#f9f9f9;">
            <div class="modal-header" style="background:#004e89;">
                <h5 class="modal-title" id="exampleModalLabel" style="font-weight: normal;color: #fff;"><i
                        class="fas fa-check-circle"></i>&nbsp;Edit Defect
                    Record & Mancost Monitoring</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color: #fff;">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="max-height: 550px; overflow-y: auto;">
                <p style="font-weight: bold;color: #000;font-size:25px">Defect Record</p>
                <div class="row">
                    <div class="col-sm-2">
                        <label style="font-weight: normal;color: #000; background: #FFFAD1">Record Type</label>
                        <input type="text" id="record_type_pd_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 14px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-2">
                        <!-- defect id hidden -->
                        <input type="hidden" id="update_defect_mancost_pd_id" class="form-control">

                        <!-- line no. -->
                        <label style="font-weight: normal;color: #000;">Line No.</label>
                        <label style="color:#EA9515">*</label>
                        <!-- <input type="text" id="line_no_pd_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"> -->

                        <select name="line_no_pd_update" id="line_no_pd_update" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="pl-2 form-control" required>
                            <option value="" disabled selected>Select line no.</option>
                        </select>
                        <br>
                    </div>
                    <div class="col-sm-3">
                        <!-- date detected -->
                        <label style="font-weight: normal;color: #000;">Date Detected</label>
                        <input type="date" id="date_detected_pd_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                        <input type="hidden" id="na_date_detected" name="na_date_detected">
                    </div>
                    <div class="col-sm-2">
                        <!-- issue no of tag -->
                        <label style="font-weight: normal;color: #000;">Issue Tag No.</label>
                        <input type="text" id="issue_tag_pd_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            disabled>
                    </div>
                    <div class="col-sm-3">
                        <!-- repairing date -->
                        <label style="font-weight: normal;color: #000;">Repairing Date</label>
                        <input type="datetime-local" id="repairing_date_pd_update" class="form-control"
                            autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <label style="font-weight: normal;color: #000;">Category</label>
                        <input list="categoryList" name="category_dr" id="line_category_pd_update"
                            style="border:1px solid #ced4da; color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="pl-2">
                        <datalist id="categoryList"></datalist>
                    </div>
                    <div class="col-sm-2">
                        <!-- car maker -->
                        <label style="font-weight: normal;color: #000;">Car Maker</label>
                        <label style="color:#EA9515">*</label>
                        <!-- <input list="carMakerList" placeholder="Select the car maker" name="car_maker"
                            id="car_maker_pd_update" onchange="handleCarMakerChange(this)" autocomplete="off"
                            style="border:1px solid #ced4da; color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="pl-2 form-control">
                        <datalist id="carMakerList"></datalist> -->

                        <input name="car_maker_pd_update" id="car_maker_pd_update" onchange="handleCarMakerChange(this)"
                            style="font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="pl-2 form-control" readonly>
                    </div>
                    <div class="col-sm-2">
                        <label style="font-weight: normal;color: #000;">Car Model</label>
                        <label style="color:#EA9515">*</label>
                        <input type="text" id="line_model_pd_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-2">
                        <!-- product name -->
                        <label style="font-weight: normal;color: #000;">Product Name</label>
                        <input type="text" id="product_name_pd_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                        <br>
                    </div>
                    <div class="col-sm-2">
                        <!-- lot number -->
                        <label style="font-weight: normal;color: #000;">Lot No.</label>
                        <input type="text" id="lot_no_pd_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-2">
                        <!-- serial number -->
                        <label style="font-weight: normal;color: #000;">Serial No.</label>
                        <label style="color:#EA9515">*</label>
                        <input type="text" id="serial_no_pd_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <!-- discovery process -->
                        <label style="font-weight: normal;color: #000;">Discovery Process</label>
                        <label style="color:#EA9515">*</label>
                        <!-- <input type="text" id="discovery_process_pd_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"> -->

                        <select name="discovery_process_pd_update" id="discovery_process_pd_update" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="pl-2 form-control" required>
                            <option value="" disabled selected>Select discovery process</option>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <!-- discovery id number -->
                        <label style="font-weight: normal;color: #000;">ID Number <i>(Discovery)</i></label>
                        <label style="color:#EA9515">*</label>
                        <input type="text" id="discovery_id_no_pd_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-4">
                        <!-- discovery person -->
                        <label style="font-weight: normal;color: #000;">Discovery Person</label>
                        <label style="color:#EA9515">*</label>
                        <input type="text" id="discovery_person_pd_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                </div>
                <br>
                <!-- /.end -->
                <div class="row">
                    <div class="col-sm-3">
                        <!-- occurrence process -->
                        <label style="font-weight: normal;color: #000;">Occurrence Process</label>
                        <label style="color:#EA9515">*</label>
                        <!-- <input type="text" id="occurrence_process_pd_dr_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"> -->

                        <select name="occurrence_process_pd_dr_update" id="occurrence_process_pd_dr_update"
                            autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="pl-2 form-control" required>
                            <option value="" disabled selected>Select occurrence process</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <!-- occurrence shift -->
                        <label style="font-weight: normal;color: #000;">Occurrence Shift</label>
                        <label style="color:#EA9515">*</label>

                        <!-- <input list="occurrenceShiftDrList" name="occurrence_shift_pd_update"
                            id="occurrence_shift_pd_update"
                            style="border:1px solid #ced4da; color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="pl-2">
                        <datalist id="occurrenceShiftDrList"></datalist> -->

                        <select name="occurrence_shift_pd_update" id="occurrence_shift_pd_update" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="form-control pl-2" required>
                            <option value="" disabled selected>Select occurrence shift</option>
                            <option value="A">A</option>
                            <option value="ADS">ADS</option>
                            <option value="B">B</option>
                            <option value="N/A">N/A</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <!-- occurrence id number -->
                        <label style="font-weight: normal;color: #000;">ID Number <i>(Occurrence)</i></label>
                        <label style="color:#EA9515">*</label>
                        <input type="text" id="occurrence_id_no_pd_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-3">
                        <!-- occurrence person -->
                        <label style="font-weight: normal;color: #000;">Occurrence Person</label>
                        <label style="color:#EA9515">*</label>
                        <input type="text" id="occurrence_person_pd_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                </div>
                <br>
                <!-- /.end -->
                <div class="row">
                    <div class="col-sm-3">
                        <!-- outflow process -->
                        <label style="font-weight: normal;color: #000;">Outflow Process</label>
                        <label style="color:#EA9515">*</label>
                        <!-- <input type="text" id="outflow_process_pd_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"> -->

                        <select name="outflow_process_pd_update" id="outflow_process_pd_update" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="pl-2 form-control" required>
                            <option value="" disabled selected>Select outflow process</option>
                        </select>

                    </div>
                    <div class="col-sm-3">
                        <!-- outflow shift -->
                        <label style="font-weight: normal;color: #000;">Outflow Shift</label>
                        <label style="color:#EA9515">*</label>

                        <!-- <input list="outflowShiftDrList" name="outflow_shift_dr" id="outflow_shift_pd_update"
                            style="border:1px solid #ced4da; color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="pl-2">
                        <datalist id="outflowShiftDrList"></datalist> -->

                        <select name="outflow_shift_pd_update" id="outflow_shift_pd_update" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="form-control pl-2" required>
                            <option value="" disabled selected>Select outflow shift</option>
                            <option value="A">A</option>
                            <option value="ADS">ADS</option>
                            <option value="B">B</option>
                            <option value="N/A">N/A</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <!-- outflow id number -->
                        <label style="font-weight: normal;color: #000;">ID Number <i>(Outflow)</i></label>
                        <label style="color:#EA9515">*</label>
                        <input type="text" id="outflow_id_no_pd_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-3">
                        <!-- outflow person -->
                        <label style="font-weight: normal;color: #000;">Outflow Person</label>
                        <label style="color:#EA9515">*</label>
                        <input type="text" id="outflow_person_pd_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                </div>
                <br>
                <!-- /.end -->
                <div class="row">
                    <div class="col-sm-3">
                        <!-- defect category -->
                        <label style="font-weight: normal;color: #000;">Defect Category</label>
                        <label style="color:#EA9515">*</label>
                        <!-- <input type="text" id="defect_category_pd_dr_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"> -->

                        <select name="defect_category_pd_dr_update" id="defect_category_pd_dr_update" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="pl-2 form-control" required>
                            <option value="" disabled selected>Select defect category</option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <!-- sequence number -->
                        <label style="font-weight: normal;color: #000;">Sequence No.</label>
                        <label style="color:#EA9515">*</label>
                        <input type="text" id="sequence_no_pd_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-2">
                        <!-- assy board number -->
                        <label style="font-weight: normal;color: #000;">Assy Board No.</label>
                        <label style="color:#EA9515">*</label>
                        <input type="text" id="assy_board_no_pd_update" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            required>
                    </div>
                    <div class="col-sm-2">
                        <!-- cause of defect -->
                        <label style="font-weight: normal;color: #000;">Cause of Defect</label>
                        <label style="color:#EA9515">*</label>
                        <!-- <input list="defectCauseDrList" name="defect_cause_dr" id="defect_cause_pd_update"
                            style="border:1px solid #ced4da; color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="pl-2">
                        <datalist id="defectCauseDrList"></datalist> -->

                        <select name="defect_cause_pd_update" id="defect_cause_pd_update" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="pl-2 form-control" required>
                            <option value="" disabled selected>Select cause of defect</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <!-- repair person -->
                        <label style="font-weight: normal;color: #000;">Dis-assembled by:</label>
                        <label style="color:#EA9515">*</label>
                        <!-- <input type="text" id="repair_person_pd_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"> -->

                        <select name="repair_person_pd_update" id="repair_person_pd_update" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="pl-2 form-control" required>
                            <option value="" disabled selected>Select repair person</option>
                        </select>
                    </div>
                </div>

                <div id="foreign_material_details" class="row p-1 mt-3"
                    style="border-top: 1px solid #DDD; border-bottom: 1px solid #DDD;">
                    <div class="col-sm-3">
                        <label style="font-weight: normal;color: #000;">Details <p style="font-size:13px;"><i>for
                                    Foreign Material only</i></p></label>
                        <label style="color:#EA9515">*</label>
                        <input type="text" id="defect_categ_foreign_mat_update" class="form-control pl-3"
                            autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-3 mb-2">
                        <label style="font-weight: normal;color: #000;">Category <p style="font-size:13px;"><i>for
                                    Foreign Material only</i></p></label>
                        <label style="color:#EA9515">*</label>
                        <select name="defect_categ_foreign_mat_2" id="defect_categ_foreign_mat_2_update"
                            autocomplete="off"
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
                <br>
                <!-- /.end -->
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <!-- good measurement -->
                        <label style="font-weight: normal;color: #000;">Good Measurement</label>
                        <label style="color:#EA9515">*</label>
                        <input type="text" id="good_measurement_pd_update" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-6">
                        <!-- ng measurement -->
                        <label style="font-weight: normal;color: #000;">NG Measurement</label>
                        <label style="color:#EA9515">*</label>
                        <input type="text" id="ng_measurement_pd_update" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <!-- wire type -->
                        <label style="font-weight: normal;color: #000;">Wire Type</label>
                        <label style="color:#EA9515">*</label>
                        <input type="text" id="wire_type_pd_update" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-4">
                        <!-- wire size -->
                        <label style="font-weight: normal;color: #000;">Wire Size</label>
                        <label style="color:#EA9515">*</label>
                        <input type="text" id="wire_size_pd_update" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-4">
                        <!-- connector cavity -->
                        <label style="font-weight: normal;color: #000;">Connector Cavity / Color</label>
                        <label style="color:#EA9515">*</label>
                        <input type="text" id="connector_cavity_pd_update" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-4">
                        <!-- detail in content of defect -->
                        <label style="font-weight: normal;color: #000;">Detail in Content of Defect</label>
                        <label style="color:#EA9515">*</label>
                        <textarea type="text" id="detail_content_defect_pd_update" class="textarea form-control"
                            autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:65px; width:100%;"></textarea>
                    </div>
                    <div class="col-sm-4">
                        <!-- treatment content of defect -->
                        <label style="font-weight: normal;color: #000;">Treatment Content of Defect</label>
                        <label style="color:#EA9515">*</label>
                        <textarea type="text" id="treatment_content_defect_pd_update" class="form-control"
                            autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:65px; width:100%;"></textarea>
                    </div>
                    <div class="col-sm-4">
                        <!-- harness status after repair -->
                        <label style="font-weight: normal;color: #000;">Harness Status after Repair</label>
                        <label style="color:#EA9515">*</label>
                        <!-- <input type="text" id="harness_status_pd_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"> -->

                        <select name="harness_status_pd_update" id="harness_status_pd_update" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="pl-2 form-control" required>
                            <option value="" disabled selected>Select line no.</option>
                        </select>
                    </div>
                </div>
                <br>
                <!-- form label -->
                <p style="font-weight: bold;color: #000;font-size:25px;">Manpower and Material Cost
                    Monitoring</p>
                <!-- /.end -->
                <div class="row">
                    <div class="col-sm-3">
                        <!-- repair start -->
                        <label style="font-weight: normal;color: #000;">Repair Start</label>
                        <input type="time" id="repair_start_pd_update" oninput="time_difference()" class="form-control"
                            autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-3">
                        <!-- repair end -->
                        <label style="font-weight: normal;color: #000;">Repair End</label>
                        <input type="time" id="repair_end_pd_update" oninput="time_difference()" class="form-control"
                            autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-3">
                        <!-- time consumed -->
                        <label style="font-weight: normal;color: #000;">Time Consumed (in minute/s)</label>
                        <input type="int" id="time_consumed_pd_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-3">
                        <!-- manhour cost -->
                        <label style="font-weight: normal;color: #000;">Manhour Cost ( ¥ )</label>
                        <input type="float" id="manhour_cost_pd_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                </div>
                <br>
                <!-- /.end -->
                <div class="row">
                    <div class="col-sm-4">
                        <!-- defect category mancost -->
                        <label style="font-weight: normal;color: #000;">Defect Category</label>
                        <label style="color:#EA9515">*</label>
                        <!-- <input id="defect_category_pd_mc_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="pl-2"> -->

                        <select name="defect_category_pd_mc_update" id="defect_category_pd_mc_update" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="pl-2 form-control" required>
                            <option value="" disabled selected>Select defect category</option>
                        </select>

                        <label class="p-0 m-0" style="font-size: 12px;font-weight: normal;"><i>Applicable if the value
                                above is OTHERS</i></label>

                        <input type="text" id="others_defect_category_pd_mc_update"
                            name="others_defect_category_pd_mc_update" placeholder="If others, please specify"
                            class="form-control mt-1"
                            style="color: #525252; font-size: 15px; border-radius: .25rem; background: #FFF; height:34px; width:100%;">
                    </div>
                    <div class="col-sm-4">
                        <!-- occurrence process mancost -->
                        <label style="font-weight: normal;color: #000;">Occurrence Process</label>
                        <label style="color:#EA9515">*</label>
                        <!-- <input id="occurrence_process_pd_mc_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="pl-2"> -->

                        <select name="occurrence_process_pd_mc_update" id="occurrence_process_pd_mc_update"
                            autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="pl-2 form-control" required>
                            <option value="" disabled selected>Select occurrence process</option>
                        </select>

                        <label class="p-0 m-0" style="font-size: 12px;font-weight: normal;"><i>Applicable if the value
                                above is OTHERS</i></label>
                        <input type="text" id="others_occurrence_process_pd_mc_update"
                            name="others_occurrence_process_pd_mc_update" placeholder="If others, please specify"
                            class="form-control mt-1"
                            style="color: #525252; font-size: 15px; border-radius: .25rem; background: #FFF; height:34px; width:100%;">
                    </div>
                    <div class="col-sm-4">
                        <!-- parts removed -->
                        <label style="font-weight: normal;color: #000;">Parts Removed</label>
                        <label style="color:#EA9515">*</label>
                        <input type="text" id="parts_removed_pd_update" oninput="fetchUnitCostUpdate()"
                            class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            required list="partsRemovedMcListUpdate">
                        <datalist id="partsRemovedMcListUpdate"></datalist>
                    </div>
                </div>
                <br>
                <!-- /.end -->
                <div class="row">
                    <div class="col-sm-3">
                        <!-- quantity -->
                        <label style="font-weight: normal;color: #000;">Quantity</label>
                        <label style="color:#EA9515">*</label>
                        <input type="int" id="quantity_pd_update" oninput="qty_cost_product_update()"
                            class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-3">
                        <!-- unit cost -->
                        <label style="font-weight: normal;color: #000;">Unit Cost ( ¥ )</label>
                        <input type="float" id="unit_cost_pd_update" oninput="qty_cost_product_update()"
                            class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            disabled>
                    </div>
                    <div class="col-sm-3">
                        <!-- material cost -->
                        <label style="font-weight: normal;color: #000;">Material Cost ( ¥ )</label>
                        <input type="float" id="material_cost_pd_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            disabled>
                    </div>
                    <div class="col-sm-3">
                        <!-- repaired portion treatment -->
                        <label style="font-weight: normal;color: #000;">Repaired Portion Treatment</label>
                        <label style="color:#EA9515">*</label>

                        <!-- <input id="portion_treatment_pd_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="pl-2"> -->

                        <select name="portion_treatment_pd_update" id="portion_treatment_pd_update" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="pl-2 form-control" required>
                            <option value="" disabled selected>Select repaired portion treatment</option>
                        </select>

                        <label class="p-0 m-0" style="font-size: 12px;font-weight: normal;"><i>Applicable if the value
                                above is OTHERS</i></label>
                        <input type="text" id="other_portion_treatment_mc_update"
                            name="other_portion_treatment_mc_update" placeholder="If others, please specify"
                            class="form-control mt-1"
                            style="color: #525252; font-size: 15px; border-radius: .25rem; background: #FFF; height:34px; width:100%;">
                    </div>
                    <input type="hidden" id="admin_defect_id_2">
                    <!-- <input type="hidden" id="mancost_id_pd_update"> -->
                </div>
                <br>
            </div>
            <div class="modal-footer" style="background:#e9e9e9;">
                <div class="col-sm-2">
                    <!-- update button -->
                    <button class="btn btn-block" onclick="update_pd_record()"
                        style="color:#fff;height:34px;border-radius:.25rem;background: #226F54;font-size:15px;font-weight:normal;"
                        onmouseover="this.style.backgroundColor='#19533F'; this.style.color='#fff';"
                        onmouseout="this.style.backgroundColor='#226F54'; this.style.color='#fff';">
                        Update Record
                    </button>
                </div>
            </div>
            <!-- /.end -->
        </div>
    </div>
</div>