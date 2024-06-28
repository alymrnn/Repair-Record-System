<div class="modal fade bd-example-modal-xl" id="update_defect_mancost_pd" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
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
            <div class="modal-body">
                <p style="font-weight: bold;color: #000;font-size:25px">Defect Record</p>
                <div class="row">
                    <div class="col-sm-2">
                        <!-- defect id hidden -->
                        <input type="hidden" id="update_defect_mancost_pd_id" class="form-control">

                        <!-- line no. -->
                        <label style="font-weight: normal;color: #000;">Line No.</label>
                        <label style="color:#EA9515">*</label>
                        <input type="text" id="line_no_pd_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                        <br>
                    </div>
                    <div class="col-sm-2">
                        <label style="font-weight: normal;color: #000;">Category</label>
                        <input list="categoryList" name="category_dr" id="line_category_pd_update"
                            style="border:1px solid #ced4da; color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="pl-2">
                        <datalist id="categoryList"></datalist>
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
                        <label style="font-weight: normal;color: #000;">Issue No. of Tag</label>
                        <input type="text" id="issue_tag_pd_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            disabled>
                    </div>
                    <div class="col-sm-3">
                        <!-- repairing date -->
                        <label style="font-weight: normal;color: #000;">Repairing Date</label>
                        <input type="date" id="repairing_date_pd_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <!-- car maker -->
                        <label style="font-weight: normal;color: #000;">Car Maker</label>
                        <input list="carMakerList" placeholder="Select the car maker" name="car_maker"
                            id="car_maker_pd_update" onchange="handleCarMakerChange(this)" autocomplete="off"
                            style="border:1px solid #ced4da; color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="pl-2">
                        <datalist id="carMakerList"></datalist>
                    </div>
                    <div class="col-sm-4">
                        <!-- product name -->
                        <label style="font-weight: normal;color: #000;">Product Name</label>
                        <input type="text" id="product_name_pd_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                        <br>
                    </div>
                    <div class="col-sm-3">
                        <!-- lot number -->
                        <label style="font-weight: normal;color: #000;">Lot No.</label>
                        <input type="text" id="lot_no_pd_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-3">
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
                        <input type="text" id="discovery_process_pd_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-4">
                        <!-- discovery id number -->
                        <label style="font-weight: normal;color: #000;">ID Number <i>(Discovery)</i></label>
                        <input type="text" id="discovery_id_no_pd_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-4">
                        <!-- discovery person -->
                        <label style="font-weight: normal;color: #000;">Discovery Person</label>
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
                        <input type="text" id="occurrence_process_pd_dr_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-3">
                        <!-- occurrence shift -->
                        <label style="font-weight: normal;color: #000;">Occurrence Shift</label>
                        <input list="occurrenceShiftDrList" name="occurrence_shift_pd_update"
                            id="occurrence_shift_pd_update"
                            style="border:1px solid #ced4da; color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="pl-2">
                        <datalist id="occurrenceShiftDrList"></datalist>
                    </div>
                    <div class="col-sm-3">
                        <!-- occurrence id number -->
                        <label style="font-weight: normal;color: #000;">ID Number <i>(Occurrence)</i></label>
                        <input type="text" id="occurrence_id_no_pd_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-3">
                        <!-- occurrence person -->
                        <label style="font-weight: normal;color: #000;">Occurrence Person</label>
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
                        <input type="text" id="outflow_process_pd_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-3">
                        <!-- outflow shift -->
                        <label style="font-weight: normal;color: #000;">Outflow Shift</label>
                        <input list="outflowShiftDrList" name="outflow_shift_dr" id="outflow_shift_pd_update"
                            style="border:1px solid #ced4da; color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="pl-2">
                        <datalist id="outflowShiftDrList"></datalist>
                    </div>
                    <div class="col-sm-3">
                        <!-- outflow id number -->
                        <label style="font-weight: normal;color: #000;">ID Number <i>(Outflow)</i></label>
                        <input type="text" id="outflow_id_no_pd_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-3">
                        <!-- outflow person -->
                        <label style="font-weight: normal;color: #000;">Outflow Person</label>
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
                        <input type="text" id="defect_category_pd_dr_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-3">
                        <!-- sequence number -->
                        <label style="font-weight: normal;color: #000;">Sequence Number</label>
                        <input type="text" id="sequence_no_pd_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-3">
                        <!-- cause of defect -->
                        <label style="font-weight: normal;color: #000;">Cause of Defect</label>
                        <input list="defectCauseDrList" name="defect_cause_dr" id="defect_cause_pd_update"
                            style="border:1px solid #ced4da; color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="pl-2">
                        <datalist id="defectCauseDrList"></datalist>
                    </div>
                    <div class="col-sm-3">
                        <!-- repair person -->
                        <label style="font-weight: normal;color: #000;">Dis-assembled by:</label>
                        <input type="text" id="repair_person_pd_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
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
                    <div class="col-sm-6">
                        <!-- detail in content of defect -->
                        <label style="font-weight: normal;color: #000;">Detail in Content of Defect</label>
                        <textarea type="text" id="detail_content_defect_pd_update" class="textarea form-control"
                            autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:65px; width:100%;"
                            readonly></textarea>
                    </div>
                    <div class="col-sm-6">
                        <!-- treatment content of defect -->
                        <label style="font-weight: normal;color: #000;">Treatment Content of Defect</label>
                        <label style="color:#EA9515">*</label>
                        <textarea type="text" id="treatment_content_defect_pd_update" class="form-control"
                            autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:65px; width:100%;"></textarea>
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
                        <input id="defect_category_pd_mc_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="pl-2">
                    </div>
                    <div class="col-sm-4">
                        <!-- occurrence process mancost -->
                        <label style="font-weight: normal;color: #000;">Occurrence Process</label>
                        <input id="occurrence_process_pd_mc_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="pl-2">
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
                        <label style="font-weight: normal;color: #000;">Connector Cavity</label>
                        <label style="color:#EA9515">*</label>
                        <input type="text" id="connector_cavity_pd_update" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;">
                    </div>
                </div>
                <br>
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
                        <input id="portion_treatment_pd_update" class="form-control" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;background: #FFF;height:34px; width:100%;"
                            class="pl-2">
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