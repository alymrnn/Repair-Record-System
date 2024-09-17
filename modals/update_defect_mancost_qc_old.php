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
                <!-- form label -->
                <label style="font-weight: bold;color: #000;font-size:25px">Manpower and Material Cost Monitoring</label>
                <div class="row">
                    <div class="col-sm-4">
                        <input type="hidden" id="update_defect_mancost_id" class="form-control">
                        <!-- car maker -->
                        <label style="font-weight: normal;color: #000;">Car Maker</label>
                        <input id="car_maker_mc_update" autocomplete="off"
                            style="border:1px solid #E3E3E3; color: #525252;font-size: 15px;border-radius: .25rem;background: #E3E3E3;height:34px; width:100%;"
                            class="pl-2">
                    </div>
                    <div class="col-sm-4">
                        <!-- line no. -->
                        <label style="font-weight: normal;color: #000;">Line No.</label>
                        <input type="text" id="line_no_mc_update" class="form-control pl-3" autocomplete="off"
                            style="border:1px solid #E3E3E3; color: #525252;font-size: 15px;border-radius: .25rem;background: #E3E3E3;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-4">
                        <label style="font-weight: normal;color: #000;">Repairing Date</label>
                        <input type="datetime-local" id="repairing_date_mc_update" class="form-control pl-3" autocomplete="off"
                            style="border:1px solid #E3E3E3; color: #525252;font-size: 15px;border-radius: .25rem;background: #E3E3E3;height:34px; width:100%;">
                    </div>
                </div>
                <br>
                <!-- /.end -->
                <div class="row">
                    <div class="col-sm-4">
                        <!-- repair start -->
                        <label style="font-weight: normal;color: #000;">Repair Start</label>
                        <input type="time" id="repair_start_mc_update" oninput="time_difference()"
                            class="form-control pl-3" autocomplete="off"
                            style="border:1px solid #E3E3E3; color: #525252;font-size: 15px;border-radius: .25rem;background: #E3E3E3;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-4">
                        <!-- repair end -->
                        <label style="font-weight: normal;color: #000;">Repair End</label>
                        <input type="time" id="repair_end_mc_update" oninput="time_difference()"
                            class="form-control pl-3" autocomplete="off"
                            style="border:1px solid #E3E3E3; color: #525252;font-size: 15px;border-radius: .25rem;background: #E3E3E3;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-4">
                        <!-- time consumed -->
                        <label style="font-weight: normal;color: #000;">Time Consumed (in minute/s)</label>
                        <input type="int" id="time_consumed_mc_update" class="form-control pl-3" autocomplete="off"
                            style="border:1px solid #E3E3E3; color: #525252;font-size: 15px;border-radius: .25rem;background: #E3E3E3;height:34px; width:100%;"
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
                            style="border:1px solid #E3E3E3; color: #525252;font-size: 15px;border-radius: .25rem;background: #E3E3E3;height:34px; width:100%;"
                            class="pl-2">
                    </div>
                    <div class="col-sm-3">
                        <!-- occurrence process mancost -->
                        <label style="font-weight: normal;color: #000;">Occurrence Process</label>
                        <input id="occurrence_process_mc_update" autocomplete="off"
                            style="border:1px solid #E3E3E3; color: #525252;font-size: 15px;border-radius: .25rem;background: #E3E3E3;height:34px; width:100%;"
                            class="pl-2">
                    </div>
                    <div class="col-sm-3">
                        <!-- parts removed -->
                        <label style="font-weight: normal;color: #000;">Parts Removed</label>
                        <input type="text" id="parts_removed_mc_update" class="form-control pl-3" autocomplete="off"
                            style="border:1px solid #E3E3E3; color: #525252;font-size: 15px;border-radius: .25rem;background: #E3E3E3;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-3">
                        <!-- quantity -->
                        <label style="font-weight: normal;color: #000;">Quantity</label>
                        <input type="int" id="quantity_mc_update" oninput="qty_cost_product()" class="form-control pl-3"
                            autocomplete="off"
                            style="border:1px solid #E3E3E3; color: #525252;font-size: 15px;border-radius: .25rem;background: #E3E3E3;height:34px; width:100%;">
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
                            style="border:1px solid #E3E3E3; color: #525252;font-size: 15px;border-radius: .25rem;background: #E3E3E3;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-3">
                        <!-- material cost -->
                        <label style="font-weight: normal;color: #000;">Material Cost ( ¥ )</label>
                        <input type="float" id="material_cost_mc_update" class="form-control pl-3" autocomplete="off"
                            style="border:1px solid #E3E3E3; color: #525252;font-size: 15px;border-radius: .25rem;background: #E3E3E3;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-3">
                        <!-- manhour cost -->
                        <label style="font-weight: normal;color: #000;">Manhour Cost ( ¥ )</label>
                        <input type="float" id="manhour_cost_mc_update" class="form-control pl-3" autocomplete="off"
                            style="border:1px solid #E3E3E3; color: #525252;font-size: 15px;border-radius: .25rem;background: #E3E3E3;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-3">
                        <!-- repaired portion treatment -->
                        <label style="font-weight: normal;color: #000;">Repaired Portion Treatment</label>
                        <input id="portion_treatment_mc_update" autocomplete="off"
                            style="border:1px solid #E3E3E3; color: #525252;font-size: 15px;border-radius: .25rem;background: #E3E3E3;height:34px; width:100%;"
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
                        <label style="font-weight: normal;color: #000;">Judgement</label>
                        <label style="color:#CA3F3F">*</label>
                        <input type="text" id="remarks_mc_update" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            required>
                        <span id="remarksMcError" class="error-message" style="display:none; color:#CA3F3F;">Judgement
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
                        style="color:#fff;height:34px;border-radius:.25rem;background: #474747;font-size:15px;font-weight:normal;"
                        onmouseover="this.style.backgroundColor='#272727'; this.style.color='#FFF';"
                        onmouseout="this.style.backgroundColor='#474747'; this.style.color='#FFF';">Clear</button>
                </div>
                <div class="col-sm-2">
                    <button class="btn btn-block" onclick="update_mancost2_record()"
                        style="color:#fff;height:34px;border-radius:.25rem;background: #226F54;font-size:15px;font-weight:normal;"
                        onmouseover="this.style.backgroundColor='#164837'; this.style.color='#FFF';"
                        onmouseout="this.style.backgroundColor='#226F54'; this.style.color='#FFF';">Verify
                        Record</button>
                </div>
            </div>
            <!-- /.end -->
        </div>
    </div>
</div>