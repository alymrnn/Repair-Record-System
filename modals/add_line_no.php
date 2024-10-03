<div class="modal fade bd-example-modal-xl" id="add_line_no" tabindex="-1" role="dialog" data-backdrop="static"
    data-keyboard="false">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="background:#f9f9f9;">
            <div class="modal-header" style="background:#343a40;">
                <h5 class="modal-title" id="exampleModalLabel" style="font-weight: normal;color: #fff;"><i
                        class="fas fa-plus-circle"></i>&nbsp;
                    Add New Line No.
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #fff;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="max-height: 550px; overflow-y: auto;">
                <div class="row">
                    <div class="col-4">
                        <label style="font-weight: normal;">Line No.</label>
                        <input class="form-control" id="line_no_m" style="width: 100%; text-align: center;" type="text">
                    </div>
                </div>
            </div>

            <div class="modal-footer" style="background:#e9e9e9;">
                <div class="col-12">
                    <div class="float-left">
                        <button class="btn btn-block" data-dismiss="modal"
                            style="color:#fff;height:34px;width:150px;border-radius:.25rem;background: #CA3F3F;font-size:15px;font-weight:normal;"
                            onmouseover="this.style.backgroundColor='#AC3737'; this.style.color='#FFF';"
                            onmouseout="this.style.backgroundColor='#CA3F3F'; this.style.color='#FFF';">Cancel</button>
                    </div>
                    <div class="float-right">
                        <button class="btn btn-block" onclick="register_line_no()"
                            style="color:#fff;height:34px;width:150px;border-radius:.25rem;background: #226F54;font-size:15px;font-weight:normal;"
                            onmouseover="this.style.backgroundColor='#164B39'; this.style.color='#FFF';"
                            onmouseout="this.style.backgroundColor='#226F54'; this.style.color='#FFF';">Add</button>
                    </div>
                </div>
            </div>
            <!-- end -->
        </div>
    </div>
</div>