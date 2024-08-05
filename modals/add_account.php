<div class="modal fade bd-example-modal-xl" id="add_account" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="background:#f9f9f9;">
            <div class="modal-header" style="background:#343a40;">
                <h5 class="modal-title" id="exampleModalLabel" style="font-weight: normal;color: #fff;"><i
                        class="fas fa-plus-circle"></i>&nbsp;
                    Add New Account
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #fff;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-2">
                        <!-- employee id -->
                        <label style="font-weight: normal;color: #000;">Employee ID</label>
                        <input type="text" id="emp_no" class="form-control pl-2" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-5">
                        <!-- full name -->
                        <label style="font-weight: normal;color: #000;">Full Name</label>
                        <input type="text" id="full_name" class="form-control pl-2" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-5">
                        <!-- department -->
                        <label style="font-weight: normal;color: #000;">Department</label>
                        <select id="department" class="form_control pl-2"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;">
                            <option value="" selected disabled>Select Department</option>
                            <option value="IT">IT</option>
                            <option value="PD1">PD1</option>
                            <option value="PD2">PD2</option>
                            <option value="QA">QA</option>
                            <option value="QC">QC</option>
                            <option value="N/A">N/A</option>
                        </select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-4">
                        <!-- section -->
                        <label style="font-weight: normal;color: #000;">Section</label>
                        <select id="section" class="form_control pl-2"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;">
                            <option value="" selected disabled>Select Section</option>
                            <option value="FAP1">FAP1</option>
                            <option value="FAP2">FAP2</option>
                            <option value="FAP3">FAP3</option>
                            <option value="FAP4">FAP4</option>
                            <option value="QA">QA</option>
                            <option value="QC">QC</option>
                            <option value="First Process">First Process</option>
                            <option value="Secondary 1 Process">Secondary 1 Process</option>
                            <option value="Secondary 2 Process">Secondary 2 Process</option>
                            <option value="N/A">N/A</option>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <!-- password -->
                        <label style="font-weight: normal;color: #000;">Password</label>
                        <input type="password" id="password" class="form-control pl-2" autocomplete="off"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-4">
                        <!-- role -->
                        <label style="font-weight: normal;color: #000;">User Type</label>
                        <select id="user_type" class="form_control pl-2"
                            style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;">
                            <option value="" selected disabled>Select User Type</option>
                            <option value="Inspector">Inspector</option>
                            <option value="IT">IT</option>
                            <option value="PD">PD</option>
                            <option value="QC">QC</option>
                            <option value="PD Verifier">PD Verifier</option>
                        </select>
                    </div>
                    <div class="col-3">
                    </div>
                </div>
            </div>

            <div class="modal-footer" style="background:#e9e9e9;">
                <div class="col-12">
                    <div class="float-left">
                        <button class="btn btn-block" data-dismiss="modal"
                            style="color:#fff;height:34px;width:180px;border-radius:.25rem;background: #CA3F3F;font-size:15px;font-weight:normal;"
                            onmouseover="this.style.backgroundColor='#AC3737'; this.style.color='#FFF';"
                            onmouseout="this.style.backgroundColor='#CA3F3F'; this.style.color='#FFF';">Cancel</button>
                    </div>
                    <div class="float-right">
                        <button class="btn btn-block" onclick="register_account()"
                            style="color:#fff;height:34px;width:180px;border-radius:.25rem;background: #226F54;font-size:15px;font-weight:normal;"
                            onmouseover="this.style.backgroundColor='#1C5944'; this.style.color='#FFF';"
                            onmouseout="this.style.backgroundColor='#226F54'; this.style.color='#FFF';">Add
                            Account</button>
                    </div>
                </div>
            </div>
            <!-- end -->
        </div>
    </div>
</div>