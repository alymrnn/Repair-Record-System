<div class="modal fade bd-example-modal-xl" id="update_account" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="background:#e9e9e9;">
            <div class="modal-header" style="background:#E5A55B;">
                <h5 class="modal-title" id="exampleModalLabel" style="font-weight: normal;color: #000;">
                    Update Account Details
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
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
                        <input type="text" id="emp_no_update" class="form-control pl-3" autocomplete="off" style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-4">
                        <!-- full name -->
                        <label style="font-weight: normal;color: #000;">Full Name</label>
                        <input type="text" id="full_name_update" class="form-control pl-3" autocomplete="off" style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-3">
                        <!-- department -->
                        <label style="font-weight: normal;color: #000;">Department</label>
                        <input type="text" id="department_update" class="form-control pl-3" autocomplete="off" style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-3">
                        <!-- section -->
                        <label style="font-weight: normal;color: #000;">Section</label>
                        <input type="text" id="section_update" class="form-control pl-3" autocomplete="off" style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-4">
                        <!-- password -->
                        <label style="font-weight: normal;color: #000;">Password</label>
                        <input type="password" id="password_update" class="form-control pl-3" autocomplete="off" style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;">
                    </div>
                    <div class="col-sm-4">
                        <!-- role -->
                        <label style="font-weight: normal;color: #000;">User Type</label>
                        <select id="user_type_update" class="form_control pl-3" style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;">
                            <option value="#">Select User Type</option>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                    </div>
                    <!-- <div class="col-sm-4">
                        repair station
                        <label style="font-weight: normal;color: #000;">Repair Station</label>
                        <select id="repair_station_update" class="form_control pl-3" style="color: #525252;font-size: 15px;border-radius: .25rem;border: 1px solid #525252;background: #FFF;height:34px; width:100%;">
                            <option value="#">Select Repair Station</option>
                            <option value="1">Repair Station 1</option>
                            <option value="2">Repair Station 2</option>
                            <option value="3">Repair Station 3</option>
                            <option value="4">Repair Station 4</option>
                            <option value="5">Repair Station 5</option>
                            <option value="6">Repair Station 6</option>
                            <option value="7">Repair Station 7</option>
                            <option value="8">Repair Station 8</option>
                            <option value="9">Repair Station 9</option>
                            <option value="10">Repair Station 10</option>
                            <option value="11">Repair Station 11</option>
                            <option value="12">Repair Station 12</option>
                            <option value="13">Repair Station 13</option>
                            <option value="14">Repair Station 14</option>
                            <option value="15">Repair Station 15</option>
                            <option value="N/A">N/A</option>
                        </select>
                    </div> -->
                    <div class="col-3">
                        <!--  -->
                    </div>
                </div>


            </div>

            <div class="modal-footer" style="background:#c2c2c2;">
                <div class="col-sm-3">
                    <button class="btn btn-block" onclick="delete_account()" style="color:#fff;height:34px;border-radius:.25rem;background: #CA3F3F;font-size:15px;font-weight:normal;">Delete Account</button>
                </div>
                <div class="col-sm-3">
                    <button class="btn btn-block" onclick="update_account()" style="color:#fff;height:34px;border-radius:.25rem;background: #425B2C;font-size:15px;font-weight:normal;">Update Account</button>
                </div>
            </div>
            <!-- end -->
        </div>
    </div>
</div>