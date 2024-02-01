<div class="modal fade bd-example-modal-xl" id="add_mancost_only" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content" style="background:#e9e9e9;">
            <div class="modal-header" style="background:#334C69;">
                <h5 class="modal-title" id="exampleModalLabel" style="font-weight: normal;color: #fff;">Add Mancost Monitoring Only</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color: #fff;">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- form label -->
                <label style="font-weight: bold;color: #000;font-size:25px">Manpower and Material Cost Monitoring</label>
                <div class="row">
                    <div class="col-sm-4">
                        <!-- car maker -->
                        <label style="font-weight: normal;color: #000;">Car Maker</label>
                        <label style="color:#CA3F3F">*</label>
                        <input list="carMakerMc2List" placeholder="Select the car maker" name="car_maker_mc2" id="car_maker_mc2" autocomplete="off" style="border:1px solid #ced4da; color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;" class="pl-2" required>
                        <datalist id="carMakerMc2List"></datalist>
                        <span id="carMakerMc2Error" class="error-message" style="display:none; color:#CA3F3F;">Car Maker field is required.</span>
                    </div>
                    <div class="col-sm-4">
                        <!-- line no. -->
                        <label style="font-weight: normal;color: #000;">Line No.</label>
                        <input type="text" id="line_no_mc2" class="form-control pl-3" autocomplete="off" style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;" required>
                        <span id="lineNoMc2Error" class="error-message" style="display:none; color:#CA3F3F;">Line No. field is required.</span>
                    </div>
                    <div class="col-sm-4">
                        <!-- repairing date -->
                        <label style="font-weight: normal;color: #000;">Repairing Date</label>
                        <label style="color:#CA3F3F">*</label>
                        <input type="date" id="repairing_date_mc2" class="form-control pl-3" autocomplete="off" style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;" required>
                        <span id="repairingDateMc2Error" class="error-message" style="display:none; color:#CA3F3F;">Repairing Date field is required.</span>
                    </div>
                </div>
                <br>
                <!-- /.end -->
                <div class="row">
                    <!-- repairing date -->
                    <!-- <div class="col-sm-3">
                        <label style="font-weight: normal;color: #000;">Repairing Date</label>
                        <label style="color:#CA3F3F">*</label>
                        <input type="date" id="repairing_date_mc2" class="form-control pl-3" autocomplete="off" style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;" required>
                    </div> -->
                    <div class="col-sm-4">
                        <!-- repair start -->
                        <label style="font-weight: normal;color: #000;">Repair Start</label>
                        <label style="color:#CA3F3F">*</label>
                        <input type="time" id="repair_start_mc2" oninput="time_difference()" class="form-control pl-3" autocomplete="off" style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;" required>
                        <span id="repairStartMc2Error" class="error-message" style="display:none; color:#CA3F3F;">Repair Start field is required.</span>
                    </div>
                    <div class="col-sm-4">
                        <!-- repair end -->
                        <label style="font-weight: normal;color: #000;">Repair End</label>
                        <label style="color:#CA3F3F">*</label>
                        <input type="time" id="repair_end_mc2" oninput="time_difference()" class="form-control pl-3" autocomplete="off" style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;" required>
                        <span id="repairEndMc2Error" class="error-message" style="display:none; color:#CA3F3F;">Repair End field is required.</span>
                    </div>
                    <div class="col-sm-4">
                        <!-- time consumed -->
                        <label style="font-weight: normal;color: #000;">Time Consumed</label>
                        <input type="text" id="time_consumed_mc2" class="form-control pl-3" autocomplete="off" style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;" disabled>
                    </div>
                </div>
                <br>
                <!-- /.end -->
                <div class="row">
                    <div class="col-sm-4">
                        <!-- defect category mancost -->
                        <label style="font-weight: normal;color: #000;">Defect Category</label>
                        <label style="color:#CA3F3F">*</label>
                        <input list="defectCategoryMc2List" placeholder="Select the defect category" name="defect_category_mc2" id="defect_category_mc2" autocomplete="off" style="border:1px solid #ced4da; color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;" class="pl-2" required>
                        <datalist id="defectCategoryMc2List"></datalist>
                        <span id="defectCategoryMc2Error" class="error-message" style="display:none; color:#CA3F3F;">Defect Category field is required.</span>
                    </div>
                    <div class="col-sm-4">
                        <!-- occurrence process mancost -->
                        <label style="font-weight: normal;color: #000;">Occurrence Process</label>
                        <label style="color:#CA3F3F">*</label>
                        <input list="occurrenceProcessMc2List" placeholder="Select the occurrence process" name="occurrence_process_mc2" id="occurrence_process_mc2" autocomplete="off" style="border:1px solid #ced4da; color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;" class="pl-2" required>
                        <datalist id="occurrenceProcessMc2List"></datalist>
                        <span id="occurrenceProcessMc2Error" class="error-message" style="display:none; color:#CA3F3F;">Occurrence Process field is required.</span>
                    </div>
                    <div class="col-sm-4">
                        <!-- parts removed -->
                        <label style="font-weight: normal;color: #000;">Parts Removed</label>
                        <label style="color:#CA3F3F">*</label>
                        <input type="text" id="parts_removed_mc2" class="form-control pl-3" autocomplete="off" style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;" required>
                        <span id="partsRemovedMc2Error" class="error-message" style="display:none; color:#CA3F3F;">Parts Removed field is required.</span>
                    </div>
                </div>
                <br>
                <!-- /.end -->
                <div class="row">
                    <div class="col-sm-3">
                        <!-- quantity -->
                        <label style="font-weight: normal;color: #000;">Quantity</label>
                        <label style="color:#CA3F3F">*</label>
                        <input type="int" id="quantity_mc2" oninput="qty_cost_product()" class="form-control pl-3" autocomplete="off" style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;" required>
                    </div>
                    <div class="col-sm-3">
                        <!-- unit cost -->
                        <label style="font-weight: normal;color: #000;">Unit Cost</label>
                        <label style="color:#CA3F3F">*</label>
                        <input type="float" id="unit_cost_mc2" oninput="qty_cost_product()" class="form-control pl-3" autocomplete="off" style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;" required>
                    </div>
                    <div class="col-sm-3">
                        <!-- material cost -->
                        <label style="font-weight: normal;color: #000;">Material Cost</label>
                        <input type="float" id="material_cost_mc2" class="form-control pl-3" autocomplete="off" style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;" disabled>
                    </div>
                    <div class="col-sm-3">
                        <!-- manhour cost -->
                        <label style="font-weight: normal;color: #000;">Manhour Cost</label>
                        <input type="float" id="manhour_cost_mc2" class="form-control pl-3" autocomplete="off" style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;" disabled>
                    </div>
                </div>
                <!-- /.end -->
                <!-- ENTRY COLUMN FOR PROCESS RESPONSIBLE PERSON -->
                <label></label>
                <div class="row">
                    <div class="col-sm-3">
                        <!-- repaired portion treatment -->
                        <label style="font-weight: normal;color: #000;">Repaired Portion Treatment</label>
                        <label style="color:#CA3F3F">*</label>
                        <input list="portionTreatmentMc2List" placeholder="Select the repaired portion treatment" name="portion_treatment_mc2" id="portion_treatment_mc2" autocomplete="off" style="border:1px solid #ced4da; color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;" class="pl-2" required>
                        <datalist id="portionTreatmentMc2List"></datalist>
                        <span id="portionTreatmentMc2Error" class="error-message" style="display:none; color:#CA3F3F;">Car Maker field is required.</span>
                    </div>

                    <!-- =================================================================================== -->
                    <div class="col-sm-3">
                        <!-- re checking in process -->
                        <label style="font-weight: normal;color: #000;">Re-Checking (in Process)</label>
                        <label style="color:#CA3F3F">*</label>
                        <input type="text" id="re_checking_mc2" class="form-control pl-3" autocomplete="off" style="color: #525252;font-size: 15px;border-radius: .25rem; background: #FFF;height:34px; width:100%;" required>
                        <span id="reCheckingMc2Error" class="error-message" style="display:none; color:#CA3F3F;">Re-checking field is required.</span>

                        <!-- &ensp;&ensp;&ensp;&ensp;
                            <input type="radio" id="rc_val_ok_mc2" name="rc_val_mc2" value="◯">
                            <label class="h4" for="">◯</label>

                            &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                            <input type="radio" id="rc_val_ng_mc2" name="rc_val_mc2" value="X">
                            <label class="h4" for="">X</label> -->
                    </div>
                    <div class="col-sm-3">
                        <!-- qc verification -->
                        <label style="font-weight: normal;color: #000;">QC Verification</label>
                        <label style="color:#CA3F3F">*</label>
                        <input type="text" id="qc_verification_mc2" class="form-control pl-3" autocomplete="off" style="color: #525252;font-size: 15px;border-radius: .25rem; background: #FFF;height:34px; width:100%;" required>
                        <span id="qcVerificationMc2Error" class="error-message" style="display:none; color:#CA3F3F;">QC Verification field is required.</span>

                        <!-- &ensp;&ensp;&ensp;&ensp;
                            <input type="radio" id="qc_verif_val_ok_mc2" name="qc_verif_val_mc2" value="◯">
                            <label class="h4" for="">◯</label>

                            &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                            <input type="radio" id="qc_verif_val_ng_mc2" name="qc_verif_val_mc2" value="X">
                            <label class="h4" for="">X</label> -->
                    </div>
                    <!-- ===================================================================================== -->



                    <div class="col-sm-3">
                        <!-- checking date sign -->
                        <label style="font-weight: normal;color: #000;">Checking Date (Sign)</label>
                        <label style="color:#CA3F3F">*</label>
                        <input type="text" id="checking_date_mc2" class="form-control pl-3" autocomplete="off" style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;" required>
                        <span id="checkingDateMc2Error" class="error-message" style="display:none; color:#CA3F3F;">Checking Date field is required.</span>
                    </div>
                </div>
                <br>
                <!-- /.end -->
            </div>
            <div class="modal-footer" style="background:#c2c2c2;">
                <div class="col-sm-2">
                    <button class="btn btn-block" data-dismiss="modal" style="color:#fff;height:34px;border-radius:.25rem;background: #CA3F3F;font-size:15px;font-weight:normal;">Cancel</button>
                </div>
                <div class="col-sm-2">
                    <!-- clear button -->
                    <button class="btn btn-block" onclick="clear_dr_mc_fields()" style="color:#fff;height:34px;border-radius:.25rem;background: #474747;font-size:15px;font-weight:normal;">Clear</button>
                </div>
                <div class="col-sm-2">
                    <button class="btn btn-block" onclick="add_mancost2_record()" style="color:#fff;height:34px;border-radius:.25rem;background: #425B2C;font-size:15px;font-weight:normal;">Add Record</button>
                    <!-- Note: Add an alert notification to inform the repair person that once the record is saved and added, it can’t be edited or deleted.  -->
                </div>
            </div>
            <!-- /.end -->
        </div>
    </div>
</div>