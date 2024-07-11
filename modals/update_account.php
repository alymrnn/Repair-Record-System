<div class="modal fade bd-example-modal-xl" id="update_account" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="background:#e9e9e9;">
            <div class="modal-header" style="background:#343a40;">
                <h5 class="modal-title" id="exampleModalLabel" style="font-weight: normal;color: #fff;">
                    Update Account Details
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #fff;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-2">
                        <!-- id -->
                        <input type="hidden" id="id_account_update" class="form-control">
                        <!-- employee id -->
                        <label style="font-weight: normal;color: #000;">Employee ID</label>
                        <input type="text" id="emp_no_update" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-4">
                        <!-- full name -->
                        <label style="font-weight: normal;color: #000;">Full Name</label>
                        <input type="text" id="full_name_update" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-3">
                        <!-- department -->
                        <label style="font-weight: normal;color: #000;">Department</label>
                        <input type="text" id="department_update" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-3">
                        <!-- section -->
                        <label style="font-weight: normal;color: #000;">Section</label>
                        <input type="text" id="section_update" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-4">
                        <!-- password -->
                        <label style="font-weight: normal;color: #000;">Password</label>
                        <input type="password" id="password_update" class="form-control pl-3" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-4">
                        <!-- role -->
                        <label style="font-weight: normal;color: #000;">User Type</label>
                        <select id="user_type_update" class="form_control pl-3"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;">
                            <option value="" selected disabled>Select User Type</option>
                            <option value="IT">IT</option>
                            <option value="PD">PD</option>
                            <option value="QA">QA</option>
                            <option value="QC">QC</option>
                        </select>
                    </div>
                    <div class="col-3">
                    </div>
                </div>
            </div>

            <div class="modal-footer" style="background:#c2c2c2;">
                <div class="col-12">
                    <div class="float-left">
                        <button class="btn btn-block" onclick="delete_account()"
                            style="color:#fff;height:34px;border-radius:.25rem;background: #CA3F3F;font-size:15px;font-weight:normal;"
                            onmouseover="this.style.backgroundColor='#AC3737'; this.style.color='#FFF';"
                            onmouseout="this.style.backgroundColor='#CA3F3F'; this.style.color='#FFF';">Delete
                            Account</button>
                    </div>
                    <div class="float-right">
                        <button class="btn btn-block" onclick="update_account()"
                            style="color:#fff;height:34px;border-radius:.25rem;background: #226F54;font-size:15px;font-weight:normal;">Update
                            Account</button>
                    </div>
                </div>
            </div>
            <!-- end -->
        </div>
    </div>
</div>