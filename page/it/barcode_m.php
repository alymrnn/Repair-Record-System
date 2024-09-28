<?php include 'plugins/navbar.php'; ?>
<?php include 'plugins/sidebar/barcode_m_bar.php'; ?>

<div class="content-wrapper" style="background: #FFF;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Masterlist</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="barcode_m.php">Repair Record System</a></li>
                        <li class="breadcrumb-item active">Masterlist</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="col-md-12">
            <!-- <div class="card card-light"> -->
            <!-- <div class="card-header">
                    <h3 class="card-title"><img src="../../dist/img/qr-code2.png" style="height:28px;">&ensp;QR Settings
                        Masterlist Table</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="maximize"><i
                                class="fas fa-expand"></i></button>
                    </div>
                </div> -->
            <!-- /.card-header -->

            <div class="card card-tabs">
                <div class="card-header p-0 border-bottom-0">
                    <ul class="nav nav-tabs" id="masterlist-record-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="masterlist-record-1-tab" data-toggle="pill"
                                href="#masterlist-record-1" role="tab" aria-controls="masterlist-record-1"
                                aria-selected="true">QR Settings</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="masterlist-record-2-tab" data-toggle="pill"
                                href="#masterlist-record-2" role="tab" aria-controls="masterlist-record-2"
                                aria-selected="true">Line No.</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="masterlist-record-3-tab" data-toggle="pill"
                                href="#masterlist-record-3" role="tab" aria-controls="masterlist-record-3"
                                aria-selected="true">Discovery Process</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="masterlist-record-4-tab" data-toggle="pill"
                                href="#masterlist-record-4" role="tab" aria-controls="masterlist-record-4"
                                aria-selected="true">Occurrence Process [Defect]</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="masterlist-record-5-tab" data-toggle="pill"
                                href="#masterlist-record-5" role="tab" aria-controls="masterlist-record-5"
                                aria-selected="true">Outflow Process</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="masterlist-record-6-tab" data-toggle="pill"
                                href="#masterlist-record-6" role="tab" aria-controls="masterlist-record-6"
                                aria-selected="true">Defect Category [Defect]</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="masterlist-record-7-tab" data-toggle="pill"
                                href="#masterlist-record-7" role="tab" aria-controls="masterlist-record-7"
                                aria-selected="true">Defect Category [Mancost]</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="masterlist-record-8-tab" data-toggle="pill"
                                href="#masterlist-record-8" role="tab" aria-controls="masterlist-record-8"
                                aria-selected="true">Occurrence Process [Mancost]</a>
                        </li>
                    </ul>
                </div>

                <div class="card-body">
                    <div class="tab-content" id="masterlist-record-tab-content">
                        <!-- QR SETTINGS -->
                        <div class="tab-pane fade show active" id="masterlist-record-1" role="tabpanel"
                            aria-labelledby="masterlist-record-1-tab">
                            <!-- Main Content -->
                            <div class="row mb-3">
                                <div class="col-12 col-sm-2">
                                    <!-- add qr setting button -->
                                    <button class="btn btn-block d-flex justify-content-left" data-toggle="modal"
                                        data-target="#add_car_settings"
                                        style="color:#fff;height:34px;border-radius:.25rem;background: #f06543;font-size:15px;font-weight:normal;"><i
                                            class="fas fa-car" style="margin-top: 2px;"
                                            onmouseover="this.style.backgroundColor='#000'; this.style.color='#FFF';"
                                            onmouseout="this.style.backgroundColor='#f06543'; this.style.color='#FFF';"></i>&nbsp;&nbsp;Add
                                        QR Settings</button>
                                </div>
                                <div class="col-12 col-sm-10"></div>
                            </div>

                            <!-- table -->
                            <div id="" class="card-body table-responsive m-0 p-0" style="max-height: 500px;">
                                <table class="table col-12 mt-3 table-head-fixed text-nowrap table-hover"
                                    id="qr_setting_table" style="background: #F9F9F9;">
                                    <thead style="text-align: center;">
                                        <!-- table switching content -->
                                        <th style="width: 10%;">#</th>
                                        <th style="width: 10%;">Car Maker</th>
                                        <th style="width: 10%;">Car Model Setting</th>
                                        <th style="width: 10%;">Car Value</th>
                                        <th style="width: 10%;">Total Length</th>
                                        <th style="width: 10%;">Product Name Start</th>
                                        <th style="width: 10%;">Product Name Length</th>
                                        <th style="width: 10%;">Lot No. Start</th>
                                        <th style="width: 10%;">Lot No. Length</th>
                                        <th style="width: 10%;">Serial No. Start</th>
                                        <th style="width: 10%;">Serial No. Length</th>
                                    </thead>
                                    <tbody class="mb-0" id="list_of_qr_setting">
                                        <tr>
                                            <td colspan="10" style="text-align: center;">
                                                <div class="spinner-border text-dark" role="status">
                                                    <span class="sr-only">Loading...</span>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- LINE NO -->
                        <div class="tab-pane fade" id="masterlist-record-2" role="tabpanel"
                            aria-labelledby="masterlist-record-2-tab">
                            
                        </div>

                        <!-- DISCOVERY PROCESS -->
                        <div class="tab-pane fade" id="masterlist-record-3" role="tabpanel"
                            aria-labelledby="masterlist-record-3-tab">
                            
                        </div>

                        <!-- OCCURRENCE PROCESS DEFECT-->
                        <div class="tab-pane fade" id="masterlist-record-4" role="tabpanel"
                            aria-labelledby="masterlist-record-4-tab">
                            
                        </div>

                        <!-- OUTFLOW PROCESS -->
                        <div class="tab-pane fade" id="masterlist-record-5" role="tabpanel"
                            aria-labelledby="masterlist-record-5-tab">
                            
                        </div>

                        <!-- DEFECT CATEGORY DEFECT-->
                        <div class="tab-pane fade" id="masterlist-record-6" role="tabpanel"
                            aria-labelledby="masterlist-record-6-tab">
                            
                        </div>

                        <!-- DEFECT CATEGORY MANCOST-->
                        <div class="tab-pane fade" id="masterlist-record-7" role="tabpanel"
                            aria-labelledby="masterlist-record-7-tab">
                            
                        </div>

                        <!-- OCCURRENCE PROCESS MANCOST-->
                        <div class="tab-pane fade" id="masterlist-record-8" role="tabpanel"
                            aria-labelledby="masterlist-record-8-tab">
                            
                        </div>
                    </div>
                </div>
            </div>

            <!-- </div> -->
        </div>
    </section>
</div>

<?php include 'plugins/footer.php'; ?>
<?php include 'plugins/js/barcode_m_script.php'; ?>