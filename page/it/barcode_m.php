<?php include 'plugins/navbar.php'; ?>
<?php include 'plugins/sidebar/barcode_m_bar.php'; ?>

<div class="content-wrapper" style="background: #FFF;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">QR Settings Masterlist</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="barcode_m.php">Repair Record System</a></li>
                        <li class="breadcrumb-item active">QR Settings Masterlist</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="col-md-12">
            <div class="card card-light" style="background: #fff; border-top: 1px solid #1b263b;">
                <div class="card-header">
                    <h3 class="card-title"><img src="../../dist/img/qr-code2.png" style="height:28px;">&ensp;QR Settings
                        Masterlist Table</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="maximize"><i
                                class="fas fa-expand"></i></button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-2">
                            <!-- add qr setting button -->
                            <a class="btn btn-block d-flex justify-content-left" data-toggle="modal"
                                data-target="#add_car_settings"
                                style="color:#fff;height:34px;border-radius:.25rem;background: #f06543;font-size:15px;font-weight:normal;"><i
                                    class="fas fa-car" style="margin-top: 2px;"
                                    onmouseover="this.style.backgroundColor='#BA482C'; this.style.color='#FFF';"
                                    onmouseout="this.style.backgroundColor='#f06543'; this.style.color='#FFF';"></i>&nbsp;&nbsp;Add
                                QR Settings</a>
                        </div>
                        <div class="col-12 col-sm-10"></div>
                    </div>

                    <!-- table -->
                    <div id="" class="card-body table-responsive m-0 p-0" style="max-height: 500px;">
                        <table class="table col-12 mt-3 table-head-fixed text-nowrap table-hover" id="qr_setting_table"
                            style="background: #F9F9F9;">
                            <thead style="text-align: center;">
                                <!-- table switching content -->
                                <th style="width: 10%;">#</th>
                                <th style="width: 20%;">Car Maker</th>
                                <th style="width: 10%;">Car Value</th>
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
            </div>
        </div>
    </section>
</div>

<?php include 'plugins/footer.php'; ?>
<?php include 'plugins/js/barcode_m_script.php'; ?>