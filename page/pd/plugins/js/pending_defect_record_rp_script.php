<script type="text/javascript">
    $(document).ready(function () {
        $('#list_of_added_mancost_insp').empty().append('<tr><td colspan="12" style="text-align:center; color:red;">No Added Record</td></tr>');

        var currentDate = new Date().toISOString().split('T')[0];
        $('#search_date_from_pd').val(currentDate);
        $('#search_date_to_pd').val(currentDate);

        load_pending_defect_table(1);
        load_added_mancost2();
        fetch_opt_record_type_pd();
        fetch_opt_repair_person_pd();
        fetch_opt_harness_status_pd();
        fetch_opt_defect_category_pd();
        fetch_opt_occurrence_process_pd();
        fetch_opt_portion_treatment_pd();

        fetch_and_update_count();

        $(document).on('click', 'input[name="na_white_tag_defect"]', function () {
            if ($(this).is(':checked')) {
                $('#repair_start_mc2, #repair_end_mc2, #time_consumed_mc2, #defect_category_mc2, #occurrence_process_mc2, #parts_removed_mc2, #quantity_mc2, #unit_cost_mc2, #material_cost_mc2, #manhour_cost_mc2, #portion_treatment2, #others_defect_category_insp_mc_update, #others_occurrence_process_insp_mc_update, #other_portion_treatment_insp_mc_update')
                    .prop('disabled', true).val('').css('background-color', '#D3D3D3');
            } else {
                $('#repair_start_mc2, #repair_end_mc2, #time_consumed_mc2, #defect_category_mc2, #occurrence_process_mc2, #parts_removed_mc2, #quantity_mc2, #unit_cost_mc2, #material_cost_mc2, #manhour_cost_mc2, #portion_treatment2, #others_defect_category_insp_mc_update, #others_occurrence_process_insp_mc_update, #other_portion_treatment_insp_mc_update')
                    .prop('disabled', false).css('background-color', '#FFF');
            }
        });

        fetch_opt_car_maker_insp();

        $('#search_car_maker_pd').change(function () {
            const selectedMaker = $(this).val();
            if (selectedMaker) {
                $.ajax({
                    url: '../../process/inspector/defect_monitoring_record_inspector_p.php',
                    type: 'POST',
                    cache: false,
                    data: {
                        method: 'fetch_car_models',
                        car_maker: selectedMaker
                    },
                    success: function (response) {
                        $('#search_car_model_pd').html(response).prop('disabled', false);
                        $('#qr_scan_pd').val('').prop('disabled', true);
                    }
                });
            } else {
                $('#search_car_model_pd').html('<option></option>').prop('disabled', true);
                $('#qr_scan_pd').prop('disabled', false);
            }
        });

        $('#search_car_model_pd').change(function () {
            const selectedModel = $(this).val();
            if (selectedModel) {
                $.ajax({
                    url: '../../process/inspector/defect_monitoring_record_inspector_p.php',
                    type: 'POST',
                    cache: false,
                    data: {
                        method: 'fetch_qr_settings',
                        car_model: selectedModel
                    },
                    success: function (response) {
                        const settings = JSON.parse(response);
                        if (settings && Object.keys(settings).length > 0) {
                            window.qrSettings = settings;
                            $('#qr_scan_pd').prop('disabled', false);
                        } else {
                            $('#qr_scan_pd').prop('disabled', true);
                        }
                    }
                });
            } else {
                $('#qr_scan_pd').prop('disabled', false);
            }
        });

        handleSearchQrScan();
    });

    function handleSearchQrScan() {
        document.getElementById('qr_scan_pd').addEventListener('keyup', function (e) {
            if (e.which === 13) {
                e.preventDefault();
                var qrCode = this.value;

                // console.log('QR Code:', qrCode);

                if (window.qrSettings) {
                    var settings = window.qrSettings;
                    var totalLength = parseInt(settings.total_length, 10);
                    var productNameStart = parseInt(settings.product_name_start, 10);
                    var productNameLength = parseInt(settings.product_name_length, 10);
                    var lotNoStart = parseInt(settings.lot_no_start, 10);
                    var lotNoLength = parseInt(settings.lot_no_length, 10);
                    var serialNoStart = parseInt(settings.serial_no_start, 10);
                    var serialNoLength = parseInt(settings.serial_no_length, 10);

                    // console.log('Parsed Settings:', {
                    //   totalLength,
                    //   productNameStart,
                    //   productNameLength,
                    //   lotNoStart,
                    //   lotNoLength,
                    //   serialNoStart,
                    //   serialNoLength
                    // });
                    // console.log('Expected Length:', totalLength);
                    // console.log('QR Code Length:', qrCode.length);

                    if (qrCode.length === totalLength) {
                        var productName = qrCode.substring(productNameStart, productNameStart + productNameLength).trim();
                        var lotNo = qrCode.substring(lotNoStart, lotNoStart + lotNoLength).trim();
                        var serialNo = qrCode.substring(serialNoStart, serialNoStart + serialNoLength).trim();

                        // console.log('Product Name:', productName);
                        // console.log('Lot No:', lotNo);
                        // console.log('Serial No:', serialNo);

                        document.getElementById('search_product_name_pd').value = productName;
                        document.getElementById('search_lot_no_pd').value = lotNo;
                        document.getElementById('search_serial_no_pd').value = serialNo;

                        this.value = ''; // Clear the QR scan input
                    } else {
                        console.error("QR code length does not match expected length. Expected:", totalLength, "Actual:", qrCode.length);
                    }
                } else {
                    console.error("QR settings are not available.");
                }
            }
        });
    }

    const fetch_opt_car_maker_insp = () => {
        $.ajax({
            url: '../../process/inspector/defect_monitoring_record_inspector_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_opt_car_maker_insp',
            },
            success: function (response) {
                $('#search_car_maker_pd').html(response);
            }
        });
    }

    function update_display_badge_count(new_count) {
        var badge = document.querySelector('.badge');
        if (badge) {
            badge.textContent = new_count;
        }
    }

    function formatDateTime(date) {
        const year = date.getFullYear();
        const month = String(date.getMonth() + 1).padStart(2, '0');
        const day = String(date.getDate()).padStart(2, '0');
        const hours = String(date.getHours()).padStart(2, '0');
        const minutes = String(date.getMinutes()).padStart(2, '0');
        const seconds = String(date.getSeconds()).padStart(2, '0');

        return `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
    }

    const current_date_time = formatDateTime(new Date());

    function fetch_and_update_count() {
        $.ajax({
            url: '../../process/pd/pending_defect_record_rp_p.php',
            type: 'POST',
            data: { method: 'update_badge_count' },
            dataType: 'json',
            success: function (response) {
                if (response.count !== undefined) {
                    update_display_badge_count(response.count);
                } else if (response.error) {
                    console.error('Error from server:', response.error);
                }
            },
            error: function (xhr, status, error) {
                console.error('Error fetching count:', error);
                console.error('Response text:', xhr.responseText);
            }
        });
    }

    document.getElementById('qr_scan_pd').addEventListener('keyup', function (e) {
        var qrCode = this.value;

        if (qrCode.length === 50) {
            const productNameField = document.getElementById('search_product_name_pd');
            const lotNoField = document.getElementById('search_lot_no_pd');
            const serialNoField = document.getElementById('search_serial_no_pd');

            if (productNameField && lotNoField && serialNoField) {
                productNameField.value = qrCode.substring(10, 35);
                lotNoField.value = qrCode.substring(35, 41);
                serialNoField.value = qrCode.substring(41, 50);

                load_pending_defect_table(1);
            } else {
                // 
            }

            this.value = '';
        }
    });

    const fetch_opt_record_type_pd = () => {
        $.ajax({
            url: '../../process/pd/pending_defect_record_rp_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_opt_record_type_pd',
            },
            success: function (response) {
                $('#search_record_type_pd').html(response);
            }
        });
    }

    const fetch_opt_repair_person_pd = () => {
        $.ajax({
            url: '../../process/pd/pending_defect_record_rp_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_opt_repair_person_pd',
            },
            success: function (response) {
                $('#repair_person_insp_update').html(response);
            }
        });
    }

    const fetch_opt_harness_status_pd = (get_value = '') => {
        $.ajax({
            url: '../../process/pd/pending_defect_record_rp_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_opt_harness_status_pd',
            },
            success: function (response) {
                $('#harness_status_insp_update').html(response);
                // if (get_value) {
                //     $('#harness_status_insp_update').val(get_value);
                // }
            }
        });
    };

    const fetch_opt_defect_category_pd = () => {
        $.ajax({
            url: '../../process/pd/pending_defect_record_rp_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_opt_defect_category_pd',
            },
            success: function (response) {
                // $('#defect_category_insp_mc_update').html(response);
                $('#defect_category_mc2').html(response);
            }
        });
    }

    const fetch_opt_occurrence_process_pd = () => {
        $.ajax({
            url: '../../process/pd/pending_defect_record_rp_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_opt_occurrence_process_pd',
            },
            success: function (response) {
                // $('#occurrence_process_insp_mc_update').html(response);
                $('#occurrence_process_mc2').html(response);
            }
        });
    }

    const fetch_opt_portion_treatment_pd = () => {
        $.ajax({
            url: '../../process/pd/pending_defect_record_rp_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_opt_portion_treatment_pd',
            },
            success: function (response) {
                // $('#portion_treatment_insp_update').html(response);
                $('#portion_treatment2').html(response);
            }
        });
    }


    // document.getElementById("search_product_name_pd").addEventListener("keyup", e => {
    //     load_pending_defect_table(1);
    // });

    // document.getElementById("search_lot_no_pd").addEventListener("keyup", e => {
    //     load_pending_defect_table(1);
    // });

    // document.getElementById("search_serial_no_pd").addEventListener("keyup", e => {
    //     load_pending_defect_table(1);
    // });

    // document.getElementById("search_record_type_pd").addEventListener("change", e => {
    //     load_pending_defect_table(1);
    // });

    // document.getElementById("search_date_from_pd").addEventListener("change", e => {
    //     load_pending_defect_table(1);
    // });

    // document.getElementById("search_date_to_pd").addEventListener("change", e => {
    //     load_pending_defect_table(1);
    // });

    // document.getElementById("search_line_no_pd").addEventListener("keyup", e => {
    //     load_pending_defect_table(1);
    // });

    document.getElementById("t_table_res").addEventListener("scroll", function () {
        var scrollTop = document.getElementById("t_table_res").scrollTop;
        var scrollHeight = document.getElementById("t_table_res").scrollHeight;
        var offsetHeight = document.getElementById("t_table_res").offsetHeight;

        if ((offsetHeight + scrollTop + 1) >= scrollHeight) {
            get_next_page();
        }
    });

    const get_next_page = () => {
        var current_table = parseInt(sessionStorage.getItem('t_table_number'));
        var current_page = parseInt(sessionStorage.getItem('t_table_pagination'));
        let total = sessionStorage.getItem('count_rows');
        var last_page = parseInt(sessionStorage.getItem('last_page'));
        var next_page = current_page + 1;
        if (next_page <= last_page && total > 0) {
            switch (current_table) {
                case 1:
                    load_defect_table_data(next_page);
                    break;
                case 2:
                    load_mancost_table_data(next_page);
                    break;
                default:
            }
        }
    }

    const load_defect_pending_table_data_last_page = () => {
        var current_page = parseInt(sessionStorage.getItem('t_table_pagination'));

        var product_name = document.getElementById("search_product_name_pd").value.trim();
        var lot_no = document.getElementById("search_lot_no_pd").value.trim();
        var serial_no = document.getElementById("search_serial_no_pd").value.trim();
        var record_type = document.getElementById("search_record_type_pd").value.trim();
        var line_no_rp = document.getElementById("search_line_no_pd").value.trim();
        var date_from = document.getElementById("search_date_from_pd").value.trim();
        var date_to = document.getElementById("search_date_to_pd").value.trim();

        $.ajax({
            url: '../../process/pd/pending_defect_record_rp_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'load_defect_pending_table_data_last_page',
                product_name: product_name,
                lot_no: lot_no,
                serial_no: serial_no,
                record_type: record_type,
                line_no_rp: line_no_rp,
                date_from: date_from,
                date_to: date_to
            },
            success: function (response) {
                sessionStorage.setItem('last_page', response);
                let total = sessionStorage.getItem('count_rows');
                var next_page = current_page + 1;
                if (next_page > response || total < 1) {
                    document.getElementById("btnNextPage").style.display = "none";
                    document.getElementById("btnNextPage").setAttribute('disabled', true);
                } else {
                    document.getElementById("btnNextPage").style.display = "block";
                    document.getElementById("btnNextPage").removeAttribute('disabled');
                }
            }
        });
    }

    const load_pending_defect_table = () => {
        load_defect_table_t1();
        setTimeout(() => {
            load_defect_table_data(1);
        }, 500);
    }

    const load_defect_table_t1 = () => {
        sessionStorage.setItem('t_table_number', 1);
        document.getElementById("defect_pending_table").innerHTML = `
            <thead style="text-align: center;">
                <tr>
                    <th>#</th>
                    <th>Line No.</th>
                    <th>Category</th>
                    <th>Date Detected</th>
                    <th>Issue No. Tag</th>
                    <th>Repairing Date</th>
                    <th>Car Maker</th>
                    <th>Car Model</th>
                    <th>Product Name</th>
                    <th>Lot No.</th>
                    <th>Serial No.</th>
                    <th>Discovery Process</th>
                    <th>Discovery ID Number</th>
                    <th>Discovery Person</th>
                    <th>Occurrence Process</th>
                    <th>Occurrence Shift</th>
                    <th>Occurrence ID Number</th>
                    <th>Occurrence Person</th>
                    <th>Outflow Process</th>
                    <th>Outflow Shift</th>
                    <th>Outflow ID Number</th>
                    <th>Outflow Person</th>
                    <th>Defect Category</th>
                    <th>Foreign Material Details</th>
                    <th>Foreign Material Category</th>
                    <th>Sequence No.</th>
                    <th>Assy Board No.</th>
                    <th>Cause of Defect</th>
                    <th>Good Measurement</th>
                    <th>NG Measurement</th>
                    <th>Wire Type</th>
                    <th>Wire Size</th>
                    <th>Connector Cavity / Color</th>
                    <th>Detail in Content of Defect</th>
                    <th>Treatment Content of Defect</th>
                    <th>Harness Status after Repair</th>
                    <th>Dis-assembled/Dis-inserted by:</th>
                </tr>
            </thead>
            <tbody class="mb-0" id="defect_table_data" style="background: #F9F9F9;">
        `;
    }

    const load_defect_table_data = current_page => {
        var product_name = document.getElementById("search_product_name_pd").value.trim();
        var lot_no = document.getElementById("search_lot_no_pd").value.trim();
        var serial_no = document.getElementById("search_serial_no_pd").value.trim();
        var record_type = document.getElementById("search_record_type_pd").value.trim();
        var line_no_rp = document.getElementById("search_line_no_pd").value.trim();
        var date_from = document.getElementById("search_date_from_pd").value.trim();
        var date_to = document.getElementById("search_date_to_pd").value.trim();

        $.ajax({
            url: '../../process/pd/pending_defect_record_rp_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'load_defect_table_data',
                current_page: current_page,
                product_name: product_name,
                lot_no: lot_no,
                serial_no: serial_no,
                record_type: record_type,
                line_no_rp: line_no_rp,
                date_from: date_from,
                date_to: date_to
            },
            beforeSend: () => {
                var loading = `<tr id="loading"><td colspan="6" style="text-align:center;"><div class="spinner-border text-dark" role="status"><span class="sr-only">Loading...</span></div></td></tr>`;
                if (current_page == 1) {
                    document.getElementById("defect_table_data").innerHTML = loading;
                } else {
                    $('#defect_pending_table tbody').append(loading);
                }
            },
            success: function (response) {
                $('#loading').remove();
                if (current_page == 1) {
                    $('#defect_pending_table tbody').html(response);
                } else {
                    $('#defect_pending_table tbody').append(response);
                }
                sessionStorage.setItem('t_table_pagination', current_page);
                $('#pending_defect_id').html('');
                $('#t_defect_breadcrumb').hide();
                count_pending_defect_table_data();
            }
        });
    }

    const count_pending_defect_table_data = () => {
        var product_name = document.getElementById("search_product_name_pd").value.trim();
        var lot_no = document.getElementById("search_lot_no_pd").value.trim();
        var serial_no = document.getElementById("search_serial_no_pd").value.trim();
        var record_type = document.getElementById("search_record_type_pd").value.trim();
        var line_no_rp = document.getElementById("search_line_no_pd").value.trim();
        var date_from = document.getElementById("search_date_from_pd").value.trim();
        var date_to = document.getElementById("search_date_to_pd").value.trim();

        $.ajax({
            url: '../../process/pd/pending_defect_record_rp_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'count_pending_defect_table_data',
                product_name: product_name,
                lot_no: lot_no,
                serial_no: serial_no,
                record_type: record_type,
                line_no_rp: line_no_rp,
                date_from: date_from,
                date_to: date_to
            },
            success: function (response) {
                sessionStorage.setItem('count_rows', response);
                var count = `Total Record: ${response}`;
                $('#defect_pending_table_info').html(count);

                if (response > 0) {
                    load_defect_pending_table_data_last_page();
                } else {
                    document.getElementById("btnNextPage").style.display = "none";
                    document.getElementById("btnNextPage").setAttribute('disabled', true);
                }
            }
        });
    }

    const load_mancost_table_data_last_page = () => {
        var defect_id = sessionStorage.getItem('load_pending_defect_id');
        var current_page = parseInt(sessionStorage.getItem('t_table_pagination'));

        $.ajax({
            url: '../../process/pd/pending_defect_record_rp_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'load_mancost_table_data_last_page',
                defect_id: defect_id
            },
            success: function (response) {
                sessionStorage.setItem('last_page', response);
                let total = sessionStorage.getItem('count_rows');
                var next_page = current_page + 1;
                if (next_page > response || total < 1) {
                    document.getElementById("btnNextPage").style.display = "none";
                    document.getElementById("btnNextPage").setAttribute('disabled', true);
                } else {
                    document.getElementById("btnNextPage").style.display = "block";
                    document.getElementById("btnNextPage").removeAttribute('disabled');
                }
            }
        });
    }

    const count_pending_mancost_table_data = () => {
        var defect_id = sessionStorage.getItem('load_pending_defect_id');

        $.ajax({
            url: '../../process/pd/pending_defect_record_rp_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'count_pending_mancost_table_data',
                defect_id: defect_id
            },
            success: function (response) {
                sessionStorage.setItem('count_rows', response);
                var count = `Total Record: ${response}`;
                $('#defect_pending_table_info').html(count);

                if (response > 0) {
                    load_mancost_table_data_last_page();
                } else {
                    document.getElementById("btnNextPage").style.display = "none";
                    document.getElementById("btnNextPage").setAttribute('disabled', true);
                }
            }
        });
    }

    const load_mancost_table = param => {
        var string = param.split('~!~');
        var id = string[0];
        var defect_id = string[1];

        sessionStorage.setItem('load_pending_defect_id', defect_id);

        load_mancost_table_t2();
        setTimeout(() => {
            load_mancost_table_data(1);
        }, 500);
    }

    const load_mancost_table_t2 = () => {
        sessionStorage.setItem('t_table_number', 2);
        document.getElementById("defect_pending_table").innerHTML = `
            <thead style="text-align: center;">
                <tr>
                    <th>#</th>
                    <th>Line No.</th>
                    <th>Car Maker</th>
                    <th>Category</th>
                    <th>Repair Start</th>
                    <th>Repair End</th>
                    <th>Time Consumed</th>
                    <th>Defect Category</th>
                    <th>Others - Defect Category</th>
                    <th>Occurrence Process</th>
                    <th>Others - Occurrence Process</th>
                    <th>Parts Removed</th>
                    <th>Quantity</th>
                    <th>Unit Cost ( ¥ )</th>
                    <th>Material Cost ( ¥ )</th>
                    <th>Manhour Cost ( ¥ )</th>
                    <th>Repaired Portion Treatment</th>
                    <th>Others - Repaired Portion Treatment</th>
                </tr>
            </thead>
            <tbody class="mb-0" id="mancost_table_data" style="background: #F9F9F9;">
        `;
    }

    const load_mancost_table_data = current_page => {
        var defect_id = sessionStorage.getItem('load_pending_defect_id');

        $.ajax({
            url: '../../process/pd/pending_defect_record_rp_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'load_mancost_table_data',
                defect_id: defect_id,
                current_page: current_page
            },
            beforeSend: () => {
                var loading = `<tr id="loading"><td colspan="6" style="text-align:center;"><div class="spinner-border text-dark" role="status"><span class="sr-only">Loading...</span></div></td></tr>`;
                if (current_page == 1) {
                    document.getElementById("mancost_table_data").innerHTML = loading;
                } else {
                    $('#defect_pending_table tbody').append(loading);
                }
            },
            success: function (response) {
                $('#loading').remove();
                if (current_page == 1) {
                    $('#defect_pending_table tbody').html(response);
                } else {
                    $('#defect_pending_table tbody').append(response);
                }
                sessionStorage.setItem('t_table_pagination', current_page);
                $('#pending_defect_id').html("Mancost Monitoring");
                $('#t_defect_breadcrumb').show();
                count_pending_mancost_table_data();
            }
        });
    }

    function get_update_defect_inspector(dataString) {
        const data = dataString.split('~!~');

        $('#update_defect_inspector_id').val(data[0]).prop('hidden', true);

        $('#car_maker_insp_update').val(data[1]).prop('disabled', true).css('background', '#EEE');
        $('#line_no_insp_update').val(data[2]).prop('disabled', false).css('background', '#FFF');
        $('#line_category_insp_update').val(data[3]).prop('disabled', true).css('background', '#EEE');
        $('#line_model_insp_update').val(data[4]).prop('disabled', true).css('background', '#EEE');
        $('#date_detected_insp_update').val(data[5]).prop('disabled', true).css('background', '#EEE'); 
        $('#issue_tag_insp_update').val(data[6]).prop('disabled', false).css('background', '#FFF');
        $('#product_name_insp_update').val(data[7]).prop('disabled', true).css('background', '#EEE');
        $('#lot_no_insp_update').val(data[8]).prop('disabled', true).css('background', '#EEE');
        $('#serial_no_insp_update').val(data[9]).prop('disabled', false).css('background', '#FFF');
        $('#discovery_process_insp_update').val(data[10]).prop('disabled', true).css('background', '#EEE');
        $('#discovery_id_no_insp_update').val(data[11]).prop('disabled', true).css('background', '#EEE');
        $('#discovery_person_insp_update').val(data[12]).prop('disabled', true).css('background', '#EEE');
        $('#occurrence_process_insp_dr_update').val(data[13]).prop('disabled', true).css('background', '#EEE');
        $('#occurrence_shift_insp_update').val(data[14]).prop('disabled', true).css('background', '#EEE');
        $('#occurrence_id_no_insp_update').val(data[15]).prop('disabled', true).css('background', '#EEE');
        $('#occurrence_person_insp_update').val(data[16]).prop('disabled', true).css('background', '#EEE');
        $('#outflow_process_insp_update').val(data[17]).prop('disabled', true).css('background', '#EEE');
        $('#outflow_shift_insp_update').val(data[18]).prop('disabled', true).css('background', '#EEE');
        $('#outflow_id_no_insp_update').val(data[19]).prop('disabled', true).css('background', '#EEE');
        $('#outflow_person_insp_update').val(data[20]).prop('disabled', true).css('background', '#EEE');
        $('#defect_category_insp_dr_update').val(data[21]).prop('disabled', true).css('background', '#EEE');
        $('#sequence_no_insp_update').val(data[22]).prop('disabled', true).css('background', '#EEE');
        $('#assy_board_no_insp_update').val(data[23]).prop('disabled', true).css('background', '#EEE');
        $('#defect_cause_insp_update').val(data[24]).prop('disabled', true).css('background', '#EEE');
        $('#good_measurement_insp_update').val(data[25]).prop('disabled', false).css('background', '#FFF');
        $('#ng_measurement_insp_update').val(data[26]).prop('disabled', false).css('background', '#FFF');
        $('#wire_type_insp_update').val(data[27]).prop('disabled', false).css('background', '#FFF');
        $('#wire_size_insp_update').val(data[28]).prop('disabled', false).css('background', '#FFF');
        $('#connector_cavity_insp_update').val(data[29]).prop('disabled', false).css('background', '#FFF');
        $('#repair_person_insp_update').val(data[30]);

        $('#defect_categ_foreign_mat_insp_update').val(data[31]).prop('disabled', true).css('background', '#EEE');
        $('#defect_categ_foreign_mat_2_insp_update').val(data[32]).prop('disabled', true).css('background', '#EEE');

        $('#detail_content_defect_insp_update').val(data[33]).prop('disabled', false).css('background', '#FFF');
        $('#treatment_content_defect_insp_update').val(data[34]);
        $('#harness_status_insp_update').val(data[35]);

        $('#repairing_date_insp_update').val(current_date_time);
        $('#repair_start_mc2').val(data[37]);
        $('#repair_end_mc2').val(data[38]);
        $('#time_consumed_mc2').val(data[39]);

        $('#defect_category_mc2').val(data[40]);
        $('#others_defect_category_insp_mc_update').val('N/A');

        $('#occurrence_process_mc2').val(data[42]);
        $('#others_occurrence_process_insp_mc_update').val('N/A');

        $('#parts_removed_mc2').val(data[44]);
        $('#quantity_mc2').val(data[45]);
        $('#unit_cost_mc2').val(data[46]);
        $('#material_cost_mc2').val(data[47]);
        $('#manhour_cost_mc2').val(data[48]);
        $('#portion_treatment2').val(data[49]);
        $('#other_portion_treatment_insp_mc_update').val('N/A');
        $('#record_type_insp_update').val(data[51]).prop('disabled', true).css('background', '#EEE');

        // defect unique id 
        $('#inspector_defect_id').val(data[52]).prop('hidden', true);
        $('#update_defect_inspector').modal('show');

    }

    // const time_difference = () => {
    //     var repair_start = document.getElementById('repair_start_insp_update').value;
    //     var repair_end = document.getElementById('repair_end_insp_update').value;

    //     var start = new Date("11/11/2023 " + repair_start);
    //     var end = new Date("11/11/2023 " + repair_end);

    //     if (end < start) {
    //         end.setDate(end.getDate() + 1);
    //     }

    //     var diffInMilliseconds = end - start;
    //     var diffInMinutes = Math.floor(diffInMilliseconds / (1000 * 60));

    //     document.getElementById("time_consumed_insp_update").value = diffInMinutes;

    //     var salaryCost = 0.72;

    //     var manhourCost = ((diffInMinutes / 60) / salaryCost * 60).toFixed(2);

    //     document.getElementById("salary_cost_insp_update").value = salaryCost;
    //     document.getElementById("manhour_cost_insp_update").value = manhourCost;
    // }

    // const qty_cost_product = () => {
    //     var quantity = document.getElementById('quantity_insp_update').value;
    //     var unit_cost = document.getElementById('unit_cost_insp_update').value;

    //     var quantity_input = parseFloat(quantity);
    //     if (isNaN(quantity_input)) quantity_input = 0;

    //     var unit_cost_input = parseFloat(unit_cost);
    //     if (isNaN(unit_cost_input)) unit_cost_input = 0;

    //     var result = quantity_input * unit_cost_input;
    //     result = result.toFixed(2);

    //     document.getElementById("material_cost_insp_update").value = result;
    // }

    // $("#parts_removed_insp_update").on("input", function () {
    //     var inputText = $(this).val().toUpperCase().trim();

    //     if (inputText.length >= 3) {
    //         autocompleteParts(inputText);
    //     }
    // });

    // function fetchUnitCost() {
    //     var partsRemovedInput = $("#parts_removed_insp_update").val();

    //     if (partsRemovedInput.trim() !== '') {
    //         $.ajax({
    //             url: '../../process/pd/pending_defect_record_rp_p.php',
    //             type: 'POST',
    //             cache: false,
    //             dataType: 'json',
    //             data: {
    //                 method: 'fetch_unit_price',
    //                 parts_removed: partsRemovedInput
    //             },
    //             success: function (response) {
    //                 if (!response.error) {
    //                     $("#unit_cost_insp_update").val(response.unit_price);

    //                     var quantityValue = $("#quantity_insp_update").val();

    //                     computeMaterialCost(response.unit_price, quantityValue);
    //                 }
    //             },
    //             error: function (xhr, status, error) {
    //                 console.error("AJAX Error:", error);
    //             }
    //         });
    //     }
    // }

    // function autocompleteParts(inputText) {
    //     $.ajax({
    //         url: '../../process/pd/pending_defect_record_rp_p.php',
    //         type: 'POST',
    //         cache: false,
    //         dataType: 'json',
    //         data: {
    //             method: 'autocomplete_parts',
    //             input_text: inputText
    //         },
    //         success: function (response) {
    //             if (!response.error) {
    //                 updateDatalist(response.part_names);
    //             }
    //         },
    //         error: function (xhr, status, error) {
    //             console.error("AJAX Error:", error);
    //         }
    //     });
    // }

    // function updateDatalist(partNames) {
    //     $("#partsRemovedMcList").empty();

    //     partNames.forEach(function (partName) {
    //         $("#partsRemovedMcList").append(`<option value="${partName}">`);
    //     });
    // }

    // const computeMaterialCost = (unitPrice, quantity) => {
    //     var qtyInput = parseFloat(quantity) || 0;
    //     var costInput = parseFloat(unitPrice) || 0;

    //     var result = qtyInput * costInput;
    //     result = result.toFixed(2);

    //     var resultWithSymbol = result;

    //     $("#material_cost_insp_update").val(resultWithSymbol);
    // };

    $("#parts_removed_mc2").on("input", function () {
        var inputText = $(this).val().toUpperCase().trim();

        // Check if inputText has at least 3 characters
        if (inputText.length >= 3) {
            // Trigger autocomplete function
            autocompleteParts(inputText);
        }
    });

    const time_difference = () => {
        var repair_start = document.getElementById('repair_start_mc2').value;
        var repair_end = document.getElementById('repair_end_mc2').value;

        var start = new Date("11/11/2023 " + repair_start);
        var end = new Date("11/11/2023 " + repair_end);

        if (end < start) {
            end.setDate(end.getDate() + 1);
        }

        var diffInMilliseconds = end - start;
        var diffInMinutes = Math.floor(diffInMilliseconds / (1000 * 60)); // Round down to the nearest whole minute

        // Set the result in the 'time_consumed_mc' field as integer
        document.getElementById("time_consumed_mc2").value = diffInMinutes;

        // Your salary cost (replace with your actual salary cost)
        var salaryCost = 0.72;

        // Calculate manhour cost
        var manhourCost = ((diffInMinutes / 60) / salaryCost * 60).toFixed(2);

        document.getElementById("salary_cost_mc2").value = salaryCost;
        document.getElementById("manhour_cost_mc2").value = manhourCost;

        // console.log("Time Consumed (Integer):", diffInMinutes);
        // console.log("Manhour Cost:", manhourCost);
    }


    // compute the material cost in mancost monitoring
    const qty_cost_product = () => {
        var quantity = document.getElementById('quantity_mc2').value;
        var unit_cost = document.getElementById('unit_cost_mc2').value;

        var quantity_input = parseFloat(quantity);
        if (isNaN(quantity_input)) quantity_input = 0;

        var unit_cost_input = parseFloat(unit_cost);
        if (isNaN(unit_cost_input)) unit_cost_input = 0;

        var result = quantity_input * unit_cost_input;
        result = result.toFixed(2); // two decimal places

        document.getElementById("material_cost_mc2").value = result;

        // console.log(quantity);
        // console.log(unit_cost);
        // console.log(result);
    }

    function fetchUnitCost() {
        var partsRemovedInput = $("#parts_removed_mc2").val();

        // Check if the input is not empty
        if (partsRemovedInput.trim() !== '') {
            $.ajax({
                url: '../../process/pd/pending_defect_record_rp_p.php',
                type: 'POST',
                cache: false,
                dataType: 'json',
                data: {
                    method: 'fetch_unit_price',
                    parts_removed: partsRemovedInput
                },
                success: function (response) {
                    if (!response.error) {
                        // Update the 'unit_cost' field with the fetched unit price
                        $("#unit_cost_mc2").val(response.unit_price);

                        // Get the quantity value from the input field
                        var quantityValue = $("#quantity_mc2").val();

                        // Now that we have the unit price and quantity, compute the material cost
                        computeMaterialCost(response.unit_price, quantityValue);
                    }
                },
                error: function (xhr, status, error) {
                    console.error("AJAX Error:", error);
                }
            });
        }
    }

    // Autocomplete function
    function autocompleteParts(inputText) {
        $.ajax({
            url: '../../process/pd/pending_defect_record_rp_p.php',
            type: 'POST',
            cache: false,
            dataType: 'json',
            data: {
                method: 'autocomplete_parts',
                input_text: inputText
            },
            success: function (response) {
                if (!response.error) {
                    updateDatalist(response.part_names);
                }
            },
            error: function (xhr, status, error) {
                console.error("AJAX Error:", error);
            }
        });
    }

    // Function to update datalist with part names
    function updateDatalist(partNames) {
        $("#partsRemovedMcList").empty();

        partNames.forEach(function (partName) {
            $("#partsRemovedMcList").append(`<option value="${partName}">`);
        });
    }

    // Fetch unit price based on part name
    function fetchUnitPrice(partsRemoved) {
        $.ajax({
            url: '../../process/pd/pending_defect_record_rp_p.php',
            type: 'POST',
            cache: false,
            dataType: 'json',
            data: {
                method: 'fetch_unit_price',
                parts_removed: partsRemoved
            },
            success: function (response) {
                if (!response.error) {
                    // Update the 'unit_cost' field with the fetched unit price
                    $("#unit_cost_mc2").val(response.unit_price);
                }
            },
            error: function (xhr, status, error) {
                console.error("AJAX Error:", error);
            }
        });
    }

    // Function to compute material cost based on unit price and quantity
    const computeMaterialCost = (unitPrice, quantity) => {
        // Parse the quantity and unit price as floats
        var qtyInput = parseFloat(quantity) || 0;
        var costInput = parseFloat(unitPrice) || 0;

        var result = qtyInput * costInput;
        result = result.toFixed(2); // keep up to two decimals

        var resultWithSymbol = result;

        $("#material_cost_mc2").val(resultWithSymbol);
    };

    const load_added_mancost2 = () => {
        // var defect_id = document.getElementById('inspector_defect_id').value.trim();

        $.ajax({
            url: '../../process/pd/pending_defect_record_rp_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'load_added_mancost',
                // defect_id:defect_id
            },
            success: function (response) {
                $('#list_of_added_mancost_insp').empty();
                $('#list_of_added_mancost_insp').html(response);
            }
        });
    }

    const add_pending_multiple_mancost = () => {
        $('#list_of_added_mancost_insp').empty().append('<tr><td colspan="12" style="text-align:center; color:red;">No Added Record</td></tr>');
        // console.log("Table cleared");

        var repair_start_mc = document.getElementById("repair_start_mc2");
        var repair_end_mc = document.getElementById("repair_end_mc2");
        var time_consumed_mc = document.getElementById("time_consumed_mc2");
        var defect_category_mc = document.getElementById("defect_category_mc2");
        var occurrence_process_mc = document.getElementById("occurrence_process_mc2");
        var parts_removed_mc = document.getElementById("parts_removed_mc2");
        var quantity_mc = document.getElementById("quantity_mc2");
        var unit_cost_mc = document.getElementById("unit_cost_mc2");
        var material_cost_mc = document.getElementById("material_cost_mc2");
        var manhour_cost_mc = document.getElementById("manhour_cost_mc2");
        var portion_treatment = document.getElementById("portion_treatment2");

        var defect_category_mc_others = document.getElementById("others_defect_category_insp_mc_update");
        var occurrence_process_mc_others = document.getElementById("others_occurrence_process_insp_mc_update");
        var portion_treatment_others = document.getElementById("other_portion_treatment_insp_mc_update");

        var defect_id = document.getElementById('inspector_defect_id');

        var records = [
            {
                repair_start_mc: repair_start_mc.value,
                repair_end_mc: repair_end_mc.value,
                time_consumed_mc: time_consumed_mc.value,
                defect_category_mc: defect_category_mc.value,
                occurrence_process_mc: occurrence_process_mc.value,
                parts_removed_mc: parts_removed_mc.value,
                quantity_mc: quantity_mc.value,
                unit_cost_mc: unit_cost_mc.value,
                material_cost_mc: material_cost_mc.value,
                manhour_cost_mc: manhour_cost_mc.value,
                portion_treatment: portion_treatment.value,
                defect_category_mc_others: defect_category_mc_others.value,
                occurrence_process_mc_others: occurrence_process_mc_others.value,
                portion_treatment_others: portion_treatment_others.value,

                defect_id: defect_id.value
            }
        ];

        $.ajax({
            url: '../../process/pd/pending_defect_record_rp_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'add_multiple_mancost',
                records: records
            },
            success: function (response) {
                if (response == 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Successfully Recorded',
                        text: 'Success',
                        showConfirmButton: false,
                        timer: 1000
                    });

                    var retainedValues = {
                        'repair_start_mc': repair_start_mc.value,
                        'repair_end_mc': repair_end_mc.value,
                        'time_consumed_mc': time_consumed_mc.value,
                        'defect_category_mc': defect_category_mc.value,
                        'occurrence_process_mc': occurrence_process_mc.value,
                        'parts_removed_mc': parts_removed_mc.value,
                        'manhour_cost_mc': manhour_cost_mc.value,
                        'portion_treatment': portion_treatment.value,
                        'defect_category_mc_others': defect_category_mc_others.value,
                        'occurrence_process_mc_others': occurrence_process_mc_others.value,
                        'portion_treatment_others': portion_treatment_others.value,
                    };

                    $('#parts_removed_mc2').val('');
                    $('#quantity_mc2').val(0);
                    $('#unit_cost_mc2').val('');
                    $('#material_cost_mc2').val('');

                    // $('#inspector_defect_id').val('');

                    $('#list_of_added_mancost_insp').empty().append('<tr><td colspan="12" style="text-align:center; color:red;">No Added Record</td></tr>');

                    load_added_mancost2();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Error',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            }
        });
    };

    const add_defect_mancost_record_insp = () => {
        var data = {
            method: 'add_defect_mancost_record_insp',
            line_no: $('#line_no_insp_update').val().trim(),
            issue_tag: $('#issue_tag_insp_update').val().trim(),
            serial_no: $('#serial_no_insp_update').val().trim(),
            repairing_date: $('#repairing_date_insp_update').val().trim(),
            good_measurement: $('#good_measurement_insp_update').val().trim(),
            ng_measurement: $('#ng_measurement_insp_update').val().trim(),
            wire_type: $('#wire_type_insp_update').val().trim(),
            wire_size: $('#wire_size_insp_update').val().trim(),
            connector_cavity: $('#connector_cavity_insp_update').val().trim(),
            repair_person: $('#repair_person_insp_update').val().trim(),
            detail_content_defect: $('#detail_content_defect_insp_update').val().trim(),
            treatment_content_defect: $('#treatment_content_defect_insp_update').val().trim(),
            harness_status: $('#harness_status_insp_update').val().trim(),
            inspector_defect_id: $('#inspector_defect_id').val().trim()
        };

        $.ajax({
            url: '../../process/pd/pending_defect_record_rp_p.php',
            type: 'POST',
            cache: false,
            data: data,
            success: function (response) {
                console.log("Response:", response);
                if (response.trim() === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Updated Successfully',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        load_pending_defect_table();
                        fetch_and_update_count();
                        $('#update_defect_inspector').modal('hide');

                        load_added_mancost2().empty();
                    });
                }
                else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Failed to update data. Please try again later.',
                        showConfirmButton: false,
                        timer: 2000
                    });
                }
            },
            error: function (xhr, status, error) {
                console.error('AJAX error:', status, error);
                console.log('XHR object:', xhr);
                Swal.fire({
                    icon: 'error',
                    title: 'Error occurred',
                    text: 'Failed to update data. Please try again later.',
                    showConfirmButton: false,
                    timer: 2000
                });
            }
        });
    };

    const delete_added_btn = (event) => {
        var id = event.target.dataset.id;

        $.ajax({
            url: '../../process/pd/pending_defect_record_rp_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'delete_added_btn',
                id: id
            },
            success: function (response) {
                if (response == 'success') {
                    load_added_mancost2();
                }
            }
        });
    }

    const clear_pending_mc_fields = () => {
        document.querySelector('input[name="na_white_tag_defect"]:checked').checked = false;
        document.getElementById('parts_removed_mc2').value = '';
        document.getElementById('quantity_mc2').value = '';
        document.getElementById('unit_cost_mc2').value = '';
        document.getElementById('material_cost_mc2').value = '';
        document.getElementById('portion_treatment2').value = '';
    }

    const clear_update_pending_record = () => {
        document.getElementById('repair_person_insp_update').value = '';
        document.getElementById('treatment_content_defect_insp_update').value = '';
        document.getElementById('harness_status_insp_update').value = '';

        $('#list_of_added_mancost_insp').empty().append('<tr><td colspan="12" style="text-align:center; color:red;">No Added Record</td></tr>');
    }

    const clear_search_pending_input = () => {
        document.getElementById("qr_scan_pd").value = '';
        document.getElementById("search_product_name_pd").value = '';
        document.getElementById("search_lot_no_pd").value = '';
        document.getElementById("search_serial_no_pd").value = '';
        document.getElementById("search_record_type_pd").value = '';
        document.getElementById("search_line_no_pd").value = '';
        document.getElementById("search_car_model_pd").value = '';
        document.getElementById("qr_scan_pd").value = '';

        document.getElementById("search_car_model_pd").disabled = true;
        document.getElementById("qr_scan_pd").disabled = true;
        // document.getElementById("search_date_from_pd").value = '';
        // document.getElementById("search_date_to_pd").value = '';

        load_pending_defect_table(1);
    }

    const refresh_page = () => {
        location.reload();
    }
</script>