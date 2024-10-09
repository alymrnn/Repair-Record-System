<div class="modal fade bd-example-modal-xl" id="update_defect_pdv" tabindex="-1" role="dialog" data-backdrop="static"
    data-keyboard="false">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content" style="background:#f9f9f9;">
            <div class="modal-header" style="background:#407BA3;">
                <h5 class="modal-title" id="exampleModalLabel" style="font-weight: normal;color: #fff;"><i
                        class="fas fa-check-circle"></i>&nbsp;Verify Defect
                    Record & Mancost Monitoring</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color: #fff;">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="max-height: 550px; overflow-y: auto;">
                <p style="font-weight: bold;color: #000;font-size:25px">Defect Record</p>
                <div class="row">
                    <div class="col-sm-2">
                        <!-- defect id hidden -->
                        <input type="hidden" id="update_defect_mancost_pdv_id" class="form-control">

                        <!-- line no. -->
                        <label style="font-weight: normal;color: #000;">Line No.</label>
                        <input type="text" id="line_no_pdv_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">

                        <!-- <select name="line_no_pdv_update" id="line_no_pdv_update" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="pl-2 form-control" required>
                            <option value="" disabled selected>Select line no.</option>
                        </select> -->
                        <br>
                    </div>
                    <div class="col-sm-2">
                        <label style="font-weight: normal;color: #000;">Category</label>
                        <input list="categoryList" name="category_dr" id="line_category_pdv_update"
                            style="border:1px solid #ced4da; color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="pl-2">
                        <datalist id="categoryList"></datalist>
                    </div>
                    <div class="col-sm-3">
                        <!-- date detected -->
                        <label style="font-weight: normal;color: #000;">Date Detected</label>
                        <input type="date" id="date_detected_pdv_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                        <input type="hidden" id="na_date_detected" name="na_date_detected">
                    </div>
                    <div class="col-sm-2">
                        <!-- issue no of tag -->
                        <label style="font-weight: normal;color: #000;">Issue Tag No.</label>
                        <input type="text" id="issue_tag_pdv_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            disabled>
                    </div>
                    <div class="col-sm-3">
                        <!-- repairing date -->
                        <label style="font-weight: normal;color: #000;">Repairing Date</label>
                        <input type="datetime-local" id="repairing_date_pdv_update" class="form-control"
                            autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <!-- car maker -->
                        <label style="font-weight: normal;color: #000;">Car Maker</label>
                        <input list="carMakerList" placeholder="Select the car maker" name="car_maker"
                            id="car_maker_pdv_update" onchange="handleCarMakerChange(this)" autocomplete="off"
                            style="border:1px solid #ced4da; color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="pl-2">
                        <datalist id="carMakerList"></datalist>
                    </div>
                    <div class="col-sm-2">
                        <!-- car model -->
                        <label style="font-weight: normal;color: #000;">Car Model</label>
                        <input type="text" id="car_model_pdv_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-3">
                        <!-- product name -->
                        <label style="font-weight: normal;color: #000;">Product Name</label>
                        <input type="text" id="product_name_pdv_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                        <br>
                    </div>
                    <div class="col-sm-3">
                        <!-- lot number -->
                        <label style="font-weight: normal;color: #000;">Lot No.</label>
                        <input type="text" id="lot_no_pdv_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-2">
                        <!-- serial number -->
                        <label style="font-weight: normal;color: #000;">Serial No.</label>
                        <input type="text" id="serial_no_pdv_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <!-- discovery process -->
                        <label style="font-weight: normal;color: #000;">Discovery Process</label>
                        <input type="text" id="discovery_process_pdv_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-4">
                        <!-- discovery id number -->
                        <label style="font-weight: normal;color: #000;">ID Number <i>(Discovery)</i></label>
                        <input type="text" id="discovery_id_no_pdv_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-4">
                        <!-- discovery person -->
                        <label style="font-weight: normal;color: #000;">Discovery Person</label>
                        <input type="text" id="discovery_person_pdv_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                </div>
                <br>
                <!-- /.end -->
                <div class="row">
                    <div class="col-sm-3">
                        <!-- occurrence process -->
                        <label style="font-weight: normal;color: #000;">Occurrence Process</label>
                        <input type="text" id="occurrence_process_pdv_dr_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-3">
                        <!-- occurrence shift -->
                        <label style="font-weight: normal;color: #000;">Occurrence Shift</label>
                        <input list="occurrenceShiftDrList" name="occurrence_shift_pdv_update"
                            id="occurrence_shift_pdv_update"
                            style="border:1px solid #ced4da; color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="pl-2">
                        <datalist id="occurrenceShiftDrList"></datalist>
                    </div>
                    <div class="col-sm-3">
                        <!-- occurrence id number -->
                        <label style="font-weight: normal;color: #000;">ID Number <i>(Occurrence)</i></label>
                        <input type="text" id="occurrence_id_no_pdv_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-3">
                        <!-- occurrence person -->
                        <label style="font-weight: normal;color: #000;">Occurrence Person</label>
                        <input type="text" id="occurrence_person_pdv_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                </div>
                <br>
                <!-- /.end -->
                <div class="row">
                    <div class="col-sm-3">
                        <!-- outflow process -->
                        <label style="font-weight: normal;color: #000;">Outflow Process</label>
                        <input type="text" id="outflow_process_pdv_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-3">
                        <!-- outflow shift -->
                        <label style="font-weight: normal;color: #000;">Outflow Shift</label>
                        <input list="outflowShiftDrList" name="outflow_shift_dr" id="outflow_shift_pdv_update"
                            style="border:1px solid #ced4da; color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="pl-2">
                        <datalist id="outflowShiftDrList"></datalist>
                    </div>
                    <div class="col-sm-3">
                        <!-- outflow id number -->
                        <label style="font-weight: normal;color: #000;">ID Number <i>(Outflow)</i></label>
                        <input type="text" id="outflow_id_no_pdv_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-3">
                        <!-- outflow person -->
                        <label style="font-weight: normal;color: #000;">Outflow Person</label>
                        <input type="text" id="outflow_person_pdv_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                </div>
                <br>
                <!-- /.end -->
                <div class="row">
                    <div class="col-sm-3">
                        <!-- defect category -->
                        <label style="font-weight: normal;color: #000;">Defect Category</label>
                        <input type="text" id="defect_category_pdv_dr_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-2">
                        <!-- sequence number -->
                        <label style="font-weight: normal;color: #000;">Sequence Number</label>
                        <input type="text" id="sequence_no_pdv_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-2">
                        <!-- assy board number -->
                        <label style="font-weight: normal;color: #000;">Assy Board Number</label>
                        <input type="text" id="assy_board_no_pdv_update" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            required>
                    </div>
                    <div class="col-sm-2">
                        <!-- cause of defect -->
                        <label style="font-weight: normal;color: #000;">Cause of Defect</label>
                        <input list="defectCauseDrList" name="defect_cause_dr" id="defect_cause_pdv_update"
                            style="border:1px solid #ced4da; color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="pl-2">
                        <datalist id="defectCauseDrList"></datalist>
                    </div>
                    <div class="col-sm-3">
                        <!-- repair person -->
                        <label style="font-weight: normal;color: #000;">Dis-assembled by:</label>
                        <input type="text" id="repair_person_pdv_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                </div>
                <br>
                <!-- /.end -->
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <!-- good measurement -->
                        <label style="font-weight: normal;color: #000;">Good Measurement</label>
                        <input type="text" id="good_measurement_pdv_update" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-6">
                        <!-- ng measurement -->
                        <label style="font-weight: normal;color: #000;">NG Measurement</label>
                        <input type="text" id="ng_measurement_pdv_update" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <!-- wire type -->
                        <label style="font-weight: normal;color: #000;">Wire Type</label>
                        <input type="text" id="wire_type_pdv_update" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-4">
                        <!-- wire size -->
                        <label style="font-weight: normal;color: #000;">Wire Size</label>
                        <input type="text" id="wire_size_pdv_update" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-4">
                        <!-- connector cavity -->
                        <label style="font-weight: normal;color: #000;">Connector Cavity / Color</label>
                        <input type="text" id="connector_cavity_pdv_update" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-6">
                        <!-- detail in content of defect -->
                        <label style="font-weight: normal;color: #000;">Detail in Content of Defect</label>
                        <textarea type="text" id="detail_content_defect_pdv_update" class="textarea form-control"
                            autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:65px; width:100%;"
                            readonly></textarea>
                    </div>
                    <div class="col-sm-6">
                        <!-- treatment content of defect -->
                        <label style="font-weight: normal;color: #000;">Treatment Content of Defect</label>
                        <textarea type="text" id="treatment_content_defect_pdv_update" class="form-control"
                            autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:65px; width:100%;"></textarea>
                    </div>
                </div>
                <hr class="mt-4">
                <div class="row">
                    <div class="col-sm-4">
                        <!-- harness status after repair -->
                        <label style="font-weight: normal;color: #000;">Harness Status after Repair</label>
                        <input type="text" id="harness_status_pdv_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-8">
                        <label class="p-1" style="font-size: 15px; background: #FFFAD1;">Select the
                            harness status to be
                            verified:</label><br>
                        <label style="display: inline-block;font-size: 15px">
                            <input type="radio" id="counterpart_checking_radio" name="harness_status_v"
                                value="Counterpart Checking" style="vertical-align: middle;">
                            Counterpart Checking
                        </label>&emsp;&emsp;&emsp;&emsp;
                        <label style="display: inline-block;font-size: 15px">
                            <input type="radio" id="recrimp_radio" name="harness_status_v" value="Re-crimp"
                                style="vertical-align: middle;">
                            Re-Crimp
                        </label>&emsp;&emsp;&emsp;&emsp;
                        <label style="display: inline-block;font-size: 15px">
                            <input type="radio" id="reassy_radio" name="harness_status_v" value="Re-assy/Re-insert"
                                style="vertical-align: middle;">
                            Re-assy / Re-insert
                        </label>&emsp;&emsp;&emsp;&emsp;
                        <label style="display: inline-block;font-size: 15px">
                            <input type="radio" id="cc_recrimp_radio" name="harness_status_v"
                                value="Counterpart Checking and Re-crimp" style="vertical-align: middle;">
                            Counterpart Checking and Re-Crimp
                        </label>
                    </div>
                </div>
                <div class="row mt-3 mb-4" id="counterpart_checking_fields" style="display: none;">
                    <!-- counterpart checking -->
                    <div class="col-12">
                        <label>FOR COUNTERPART CHECKING</label>
                    </div>
                    <div class="col-3">
                        <label style="font-weight: normal;color: #000;">Judgement</label>
                        <label style="color:#CA3F3F;">*</label>
                        <select id="cc_remarks_1" class="form-control"
                            style="color: #525252;font-size: 15px;border-radius: .25rem; background: #FFF;height:34px; width:100%;"
                            required>
                            <option value="" selected disabled>Select verification</option>
                            <option value="GOOD">GOOD</option>
                            <option value="NO GOOD">NO GOOD</option>
                        </select>
                    </div>
                    <div class="col-3">
                        <label style="font-weight: normal;color: #000;">Details</label>
                        <label style="color:#CA3F3F;">*</label>
                        <input type="text" id="cc_remarks_2" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-3">
                        <label style="font-weight: normal;color: #000;">ID No. QA (FSP)</label>
                        <label style="color:#CA3F3F;">*</label>
                        <input type="text" id="cc_id_no" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-3">
                        <label style="font-weight: normal;color: #000;">Verified by QA (FSP)</label>
                        <label style="color:#CA3F3F;">*</label>
                        <input type="text" id="cc_name" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #EEE;height:34px; width:100%;"
                            readonly>
                    </div>
                </div>
                <div class="row mt-3" id="recrimp_fields" style="display: none;">
                    <!-- recrimp -->
                    <div class="col-12">
                        <label>FOR RE-CRIMP</label>
                    </div>
                    <div class="col-sm-4">
                        <label style="font-weight: normal;color: #000;">Judgement</label>
                        <label style="color:#CA3F3F;">*</label>
                        <select id="recrimp_remarks" class="form-control"
                            style="color: #525252;font-size: 15px;border-radius: .25rem; background: #FFF;height:34px; width:100%;"
                            required>
                            <option value="" selected disabled>Select verification</option>
                            <option value="GOOD">GOOD</option>
                            <option value="NO GOOD">NO GOOD</option>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <label style="font-weight: normal;color: #000;">ID No. PD (FSP)</label>
                        <label style="color:#CA3F3F;">*</label>
                        <input type="text" id="recrimp_pd_id_no" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-4">
                        <label style="font-weight: normal;color: #000;">Re-crimped by PD (FSP)</label>
                        <label style="color:#CA3F3F;">*</label>
                        <input type="text" id="recrimp_pd_name" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #EEE;height:34px; width:100%;"
                            readonly>
                    </div>
                </div>
                <div class="row mt-3" id="recrimp_2_fields" style="display: none;">
                    <div class="col-4"></div>
                    <div class="col-sm-4">
                        <label style="font-weight: normal;color: #000;">ID No. QA (FSP)</label>
                        <label style="color:#CA3F3F;">*</label>
                        <input type="text" id="recrimp_qa_id_no" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-4">
                        <label style="font-weight: normal;color: #000;">Verified by QA (FSP)</label>
                        <label style="color:#CA3F3F;">*</label>
                        <input type="text" id="recrimp_qa_name" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #EEE;height:34px; width:100%;"
                            readonly>
                    </div>
                </div>
                <div class="row mt-3" id="reassy_fields" style="display: none;">
                    <!-- reassy/reinsert -->
                    <div class="col-12">
                        <label>FOR RE-ASSY / RE-INSERT</label>
                    </div>
                    <div class="col-sm-3">
                        <label style="font-weight: normal;color: #000;">Judgement</label>
                        <label style="color:#CA3F3F;">*</label>
                        <select id="reassy_remarks" class="form-control"
                            style="color: #525252;font-size: 15px;border-radius: .25rem; background: #FFF;height:34px; width:100%;"
                            required>
                            <option value="" selected disabled>Select verification</option>
                            <option value="GOOD">GOOD</option>
                            <option value="NO GOOD">NO GOOD</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label style="font-weight:normal;color:#000;">Date Confirmed</label>
                        <label style="color:#CA3F3F;">*</label>
                        <input type="date" name="date_to" class="form-control" id="reassy_date"
                            style="color: #525252;font-size: 15px;border-radius: .25rem; background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-3">
                        <label style="font-weight: normal;color: #000;">ID No. PD (FAP)</label>
                        <label style="color:#CA3F3F;">*</label>
                        <input type="text" id="reassy_id_no" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-3">
                        <label style="font-weight: normal;color: #000;">Confirmed by PD (FAP)</label>
                        <label style="color:#CA3F3F;">*</label>
                        <input type="text" id="reassy_name" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #EEE;height:34px; width:100%;"
                            readonly>
                    </div>
                </div>
                <input type="hidden" id="admin_defect_id_3">
            </div>
            <div class="modal-footer" style="background:#e9e9e9;">
                <div class="col-sm-2">
                    <!-- update button -->
                    <button class="btn btn-block" onclick="update_pdv_record()"
                        style="color:#fff;height:34px;border-radius:.25rem;background: #226F54;font-size:15px;font-weight:normal;"
                        onmouseover="this.style.backgroundColor='#19533F'; this.style.color='#fff';"
                        onmouseout="this.style.backgroundColor='#226F54'; this.style.color='#fff';">
                        Verify Record
                    </button>
                </div>
            </div>
            <!-- /.end -->
        </div>
    </div>
</div>