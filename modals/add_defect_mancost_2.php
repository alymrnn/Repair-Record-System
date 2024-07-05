<div class="modal fade bd-example-modal-xl" id="add_defect_mancost_2" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLable" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-xl modal-dialog-scrollable" role="document">
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
            <div class="modal-body">
                <div class="row justify-content-end mt-2">
                    <p style="font-size: 18px"><i>Check N/A if White Tag and Defect Only:</i></p>&ensp;

                    <label style="display: inline-block;font-size: 18px">
                        <input type="radio" id="r_white_tag_defect" name="na_white_tag_defect"
                            value="Defect and Mancost" style="vertical-align: middle;">
                        N/A
                    </label>&emsp;

                </div>
                <!-- form label -->
                <label style="font-weight: normal;color: #000;font-size:25px"><b>Manpower and Material Cost
                        Monitoring</b></label>
                <div class="row mb-2">
                    <div class="col-sm-3">
                        <!-- defect id hidden -->
                        <input type="hidden" id="defect_id_no" class="form-control">

                        <!-- repair start -->
                        <label style="font-weight: normal;color: #000;">Repair Start</label>
                        <label style="color:#CA3F3F">*</label>
                        <input type="time" id="repair_start_mc" oninput="time_difference()" class="form-control pl-3"
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
                        <input type="time" id="repair_end_mc" oninput="time_difference()" class="form-control pl-3"
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
                        <input type="int" id="time_consumed_mc" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #F1F1F1;height:34px; width:100%;"
                            readonly>
                        <input type="hidden" id="na_time_consumed" name="na_time_consumed">
                    </div>
                    <div class="col-sm-3">
                        <!-- salary cost -->
                        <input type="hidden" id="salary_cost_mc">

                        <!-- manhour cost -->
                        <label style="font-weight: normal;color: #000;">Manhour Cost ( ¥ )</label>
                        <input type="float" id="manhour_cost_mc" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #F1F1F1;height:34px; width:100%;"
                            readonly>
                        <input type="hidden" id="na_manhour_cost" name="na_manhour_cost">

                    </div>
                </div>
                <!-- <br> -->
                <!-- /.end -->
                <div class="row mb-2">
                    <div class="col-sm-4">
                        <!-- defect category mancost -->
                        <label style="font-weight: normal;color: #000;">Defect Category</label>
                        <label style="color:#CA3F3F">*</label>
                        <!-- <input list="defectCategoryMcList" placeholder="Select the defect category"
                            name="defect_category_mc" id="defect_category_mc" autocomplete="off"
                            style="border:1px solid #ced4da; color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="pl-2" required>
                        <datalist id="defectCategoryMcList"></datalist> -->

                        <select name="defect_category_mc" id="defect_category_mc" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #ced4da;background: #FFF;height:34px; width:100%;"
                            class="pl-2" required>
                            <option value="" disabled selected>Select the defect category</option>
                        </select>
                        <span id="defectCategoryMcError" class="error-message"
                            style="display:none; color:#CA3F3F;">Defect Category field is required.</span>

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

                        <select name="occurrence_process_mc" id="occurrence_process_mc" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #ced4da;background: #FFF;height:34px; width:100%;"
                            class="pl-2" required>
                            <option value="" disabled selected>Select the occurrence process</option>
                        </select>
                        <span id="occurrenceProcessMcError" class="error-message"
                            style="display:none; color:#CA3F3F;">Occurrence Process field is required.</span>
                    </div>
                    <div class="col-sm-4">
                        <!-- parts removed -->
                        <label style="font-weight: normal;color: #000;">Parts Removed</label>
                        <label style="color:#CA3F3F">*</label>
                        <input type="text" id="parts_removed_mc" oninput="fetchUnitCost()" class="form-control pl-3"
                            autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            required list="partsRemovedMcList">
                        <datalist id="partsRemovedMcList"></datalist>
                        <span id="partsRemovedMcError" class="error-message" style="display:none; color:#CA3F3F;">Parts Removed 
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
                        <input type="int" id="quantity_mc" oninput="qty_cost_product()" class="form-control pl-3"
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
                        <input type="float" id="unit_cost_mc" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #F1F1F1;height:34px; width:100%;"
                            readonly>
                        <input type="hidden" id="na_unit_cost" name="na_unit_cost">

                    </div>
                    <div class="col-sm-3">
                        <!-- material cost -->
                        <label style="font-weight: normal;color: #000;">Material Cost ( ¥ )</label>
                        <input type="float" id="material_cost_mc" class="form-control pl-3" autocomplete="off"
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

                        <select name="portion_treatment" id="portion_treatment" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #ced4da;background: #FFF;height:34px; width:100%;"
                            class="pl-2" required>
                            <option value="" disabled selected>Select the repaired portion treatment</option>
                        </select>
                        <span id="portionTreatmentMcError" class="error-message"
                            style="display:none; color:#CA3F3F;">Repaired Portion Treatment field is required.</span>
                    </div>
                </div>
                <!-- /.end -->

                <div class="row mt-3">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-4"></div>
                    <div class="col-sm-2">
                        <!-- clear button -->
                        <button class="btn btn-block" onclick="clear_dr_mc_fields()"
                            style="color:#fff;height:34px;border-radius:.25rem;background: #474747;font-size:15px;font-weight:normal;"
                            onmouseover="this.style.backgroundColor='#272727'; this.style.color='#FFF';"
                            onmouseout="this.style.backgroundColor='#474747'; this.style.color='#FFF';">Clear</button>
                    </div>
                    <div class="col-sm-2">
                        <!-- add record -->
                        <button class="btn btn-block" onclick="add_multiple_mancost()"
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
                            <th>Repair Start</th>
                            <th>Repair End</th>
                            <th>Time Consumed</th>
                            <th>Defect Category</th>
                            <th>Occurrence Process</th>
                            <th>Parts Removed</th>
                            <th>Quantity</th>
                            <th>Unit Cost</th>
                            <th>Material Cost</th>
                            <th>Manhour Cost</th>
                            <th>Repaired Portion Treatment</th>
                            <th>Action</th>
                        </thead>
                        <tbody class="mb-0" id="list_of_added_mancost">
                            <tr>
                                <td colspan="9" style="text-align: center;">
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
                    <button class="btn btn-block" onclick="add_defect_mancost_record()"
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