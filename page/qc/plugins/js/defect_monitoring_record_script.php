<script type="text/javascript">
    $(document).ready(function () {
        var currentDate = new Date().toISOString().split('T')[0];
        $('#search_ad_date_from').val(currentDate);
        $('#search_ad_date_to').val(currentDate);

        load_qc_defect_table(1);
        fetch_opt_search_ad_record_type();
        fetch_opt_line_no();
        fetch_opt_search_ad_defect_category();
        fetch_opt_search_ad_discovery_process();
        fetch_opt_search_ad_occurrence_process();
        fetch_opt_search_ad_outflow_process();
        fetch_opt_search_ad_defect_category_mc();
        fetch_opt_search_ad_occurrence_process_mc();
        fetch_opt_search_ad_portion_treatment_mc();

        fetch_opt_update_discovery_process();
        fetch_opt_update_occurrence_process();
        fetch_opt_update_outflow_process();
        fetch_opt_update_defect_category();
        fetch_opt_update_repair_person();

        update_button_state();

        $('input.singleCheck').on('change', function () {
            update_button_state();
        });

        $('#discovery_id_no_mc_update').on('keypress', function (e) {
            if (e.which === 13) {
                get_discovery_person();
            }
        });

        $('#discovery_id_no_mc_update').on('input', function () {
            if ($(this).val() === '') {
                $('#discovery_person_mc_update').val('');
            }
        });

        // fetch occurrence person
        $('#occurrence_id_no_mc_update').on('keypress', function (e) {
            if (e.which === 13) {
                get_occurrence_person();
            }
        });

        $('#occurrence_id_no_mc_update').on('input', function () {
            if ($(this).val() === '') {
                $('#occurrence_person_mc_update').val('');
            }
        });

        // fetch outflow person
        $('#outflow_id_no_mc_update').on('keypress', function (e) {
            if (e.which === 13) {
                get_outflow_person();
            }
        });

        $('#outflow_id_no_mc_update').on('input', function () {
            if ($(this).val() === '') {
                $('#outflow_person_mc_update').val('');
            }
        });
    });

    // document.getElementById('line_no_mc_update').addEventListener('input', function () {
    //     this.value = this.value.replace(/\D/g, '');

    //     if (this.value.length > 4) {
    //         this.value = this.value.slice(0, 4);
    //     }
    // });

    // document.getElementById("search_ad_record_type").addEventListener("change", e => {
    //     load_qc_defect_table(1);
    // });

    // document.getElementById("search_ad_line_no").addEventListener("keyup", e => {
    //     load_qc_defect_table(1);
    // });

    // document.getElementById("search_ad_product_name").addEventListener("keyup", e => {
    //     load_qc_defect_table(1);
    // });

    // document.getElementById("search_ad_lot_no").addEventListener("keyup", e => {
    //     load_qc_defect_table(1);
    // });

    // document.getElementById("search_ad_serial_no").addEventListener("keyup", e => {
    //     load_qc_defect_table(1);
    // });

    // document.getElementById("search_ad_date_from").addEventListener("change", e => {
    //     load_qc_defect_table(1);
    // });

    // document.getElementById("search_ad_date_to").addEventListener("change", e => {
    //     load_qc_defect_table(1);
    // });

    const get_discovery_person = () => {
        var discovery_id_no = $('#discovery_id_no_mc_update').val();

        if (discovery_id_no === 'N/A') {
            $('#discovery_person_mc_update').val('N/A');
            return;
        }

        if (discovery_id_no === '') {
            $('#discovery_person_mc_update').val('');
            return;
        }

        $.ajax({
            url: '../../process/qc/defect_monitoring_record_get_p.php',
            type: 'GET',
            data: {
                method: 'get_discovery_person',
                discovery_id_no: discovery_id_no
            },
            success: function (response) {
                var data = JSON.parse(response);
                $('#discovery_person_mc_update').val(data.full_name);
            },
            error: function (jqXHR, textStatus, errorThrown) {

            }
        });
    };

    const get_occurrence_person = () => {
        var occurrence_id_no = $('#occurrence_id_no_mc_update').val();

        if (occurrence_id_no === 'N/A') {
            $('#occurrence_person_mc_update').val('N/A');
            return;
        }

        if (occurrence_id_no === '') {
            $('#occurrence_person_mc_update').val('');
            return;
        }

        $.ajax({
            url: '../../process/qc/defect_monitoring_record_get_p.php',
            type: 'GET',
            data: {
                method: 'get_occurrence_person',
                occurrence_id_no: occurrence_id_no
            },
            success: function (response) {
                var data = JSON.parse(response);
                $('#occurrence_person_mc_update').val(data.full_name);
            },
            error: function (jqXHR, textStatus, errorThrown) {

            }
        });
    };

    const get_outflow_person = () => {
        var outflow_id_no = $('#outflow_id_no_mc_update').val();

        if (outflow_id_no === 'N/A') {
            $('#outflow_person_mc_update').val('N/A');
            return;
        }

        if (outflow_id_no === '') {
            $('#outflow_person_mc_update').val('');
            return;
        }

        $.ajax({
            url: '../../process/qc/defect_monitoring_record_get_p.php',
            type: 'GET',
            data: {
                method: 'get_outflow_person',
                outflow_id_no: outflow_id_no
            },
            success: function (response) {
                var data = JSON.parse(response);
                $('#outflow_person_mc_update').val(data.full_name);
            },
            error: function (jqXHR, textStatus, errorThrown) {

            }
        });
    };

    const fetch_opt_line_no = (get_value) => {
        $.ajax({
            url: '../../process/qc/defect_monitoring_record_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_opt_line_no',
            },
            success: function (response) {
                $('#line_no_mc_update').html(response);
                if (get_value) {
                    $('#line_no_mc_update').val(get_value);
                }
            }
        });
    }

    // fetch for update discovery process
    const fetch_opt_update_discovery_process = (get_value = '') => {
        $.ajax({
            url: '../../process/qc/defect_monitoring_record_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_opt_update_discovery_process',
            },
            success: function (response) {
                $('#discovery_process_mc_update').html(response);
                if (get_value) {
                    $('#discovery_process_mc_update').val(get_value);
                }
            },
            error: function (xhr, status, error) {
                console.error('AJAX error:', status, error);
            }
        });
    };

    // fetch for update occurrence process
    const fetch_opt_update_occurrence_process = (get_value = '') => {
        $.ajax({
            url: '../../process/qc/defect_monitoring_record_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_opt_update_occurrence_process',
            },
            success: function (response) {
                $('#occurrence_process_dr_update').html(response);
                if (get_value) {
                    $('#occurrence_process_dr_update').val(get_value);
                }
            },
            error: function (xhr, status, error) {
                console.error('AJAX error:', status, error);
            }
        });
    };

    // fetch for update outflow process
    const fetch_opt_update_outflow_process = (get_value = '') => {
        $.ajax({
            url: '../../process/qc/defect_monitoring_record_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_opt_update_outflow_process',
            },
            success: function (response) {
                $('#outflow_process_mc_update').html(response);
                if (get_value) {
                    $('#outflow_process_mc_update').val(get_value);
                }
            },
            error: function (xhr, status, error) {
                console.error('AJAX error:', status, error);
            }
        });
    };

    // fetch for update defect category
    const fetch_opt_update_defect_category = (get_value = '') => {
        $.ajax({
            url: '../../process/qc/defect_monitoring_record_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_opt_update_defect_category',
            },
            success: function (response) {
                $('#defect_category_mc_update2').html(response);
                if (get_value) {
                    $('#defect_category_mc_update2').val(get_value);
                }
            },
            error: function (xhr, status, error) {
                console.error('AJAX error:', status, error);
            }
        });
    };

    // fetch for update repair person
    const fetch_opt_update_repair_person = (get_value = '') => {
        $.ajax({
            url: '../../process/qc/defect_monitoring_record_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_opt_update_repair_person',
            },
            success: function (response) {
                $('#repair_person_mc_update').html(response);
                if (get_value) {
                    $('#repair_person_mc_update').val(get_value);
                }
            },
            error: function (xhr, status, error) {
                console.error('AJAX error:', status, error);
            }
        });
    };

    // fetch record type option
    const fetch_opt_search_ad_record_type = () => {
        $.ajax({
            url: '../../process/qc/defect_monitoring_record_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_opt_search_ad_record_type',
            },
            success: function (response) {
                $('#search_ad_record_type').html(response)
            }
        });
    }

    // fetch defect category defect record
    const fetch_opt_search_ad_defect_category = () => {
        $.ajax({
            url: '../../process/qc/defect_monitoring_record_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_opt_search_ad_defect_category',
            },
            success: function (response) {
                $('#search_ad_defect_category').html(response)
            }
        });
    }

    // fetch discovery process defect record
    const fetch_opt_search_ad_discovery_process = () => {
        $.ajax({
            url: '../../process/qc/defect_monitoring_record_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_opt_search_ad_discovery_process',
            },
            success: function (response) {
                $('#search_ad_discovery_process').html(response)
            }
        });
    }

    // fetch occurrence process defect record
    const fetch_opt_search_ad_occurrence_process = () => {
        $.ajax({
            url: '../../process/qc/defect_monitoring_record_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_opt_search_ad_occurrence_process',
            },
            success: function (response) {
                $('#search_ad_occurrence_process').html(response)
            }
        });
    }

    // fetch outflow process defect record
    const fetch_opt_search_ad_outflow_process = () => {
        $.ajax({
            url: '../../process/qc/defect_monitoring_record_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_opt_search_ad_outflow_process',
            },
            success: function (response) {
                $('#search_ad_outflow_process').html(response)
            }
        });
    }

    // fetch defect category mancost monitoring
    const fetch_opt_search_ad_defect_category_mc = () => {
        $.ajax({
            url: '../../process/qc/defect_monitoring_record_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_opt_search_ad_defect_category_mc',
            },
            success: function (response) {
                $('#search_ad_defect_category_mc').html(response)
            }
        });
    }

    // fetch occurrence process mancost monitoring
    const fetch_opt_search_ad_occurrence_process_mc = () => {
        $.ajax({
            url: '../../process/qc/defect_monitoring_record_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_opt_search_ad_occurrence_process_mc',
            },
            success: function (response) {
                $('#search_ad_occurrence_process_mc').html(response)
            }
        });
    }

    // fetch repaired portion treatment mancost monitoring
    const fetch_opt_search_ad_portion_treatment_mc = () => {
        $.ajax({
            url: '../../process/qc/defect_monitoring_record_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_opt_search_ad_portion_treatment_mc',
            },
            success: function (response) {
                $('#search_ad_portion_treatment_mc').html(response)
            }
        });
    }

    document.getElementById("t_qc_table_res").addEventListener("scroll", function () {
        var scrollTop = document.getElementById("t_qc_table_res").scrollTop;
        var scrollHeight = document.getElementById("t_qc_table_res").scrollHeight;
        var offsetHeight = document.getElementById("t_qc_table_res").offsetHeight;

        //check if the scroll reached the bottom
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
                    load_qc_defect_table_data(next_page);
                    break;
                case 2:
                    load_qc_mancost_table_data(next_page);
                    break;
                default:
            }
        }
    }

    document.getElementById('qr_scan_qc').addEventListener('input', function (e) {
        var qrCode = this.value;
        // console.log("QR Code Scanned:", qrCode);

        if (qrCode.length === 50) {
            const productNameField = document.getElementById('search_ad_product_name');
            const lotNoField = document.getElementById('search_ad_lot_no');
            const serialNoField = document.getElementById('search_ad_serial_no');

            if (productNameField && lotNoField && serialNoField) {
                productNameField.value = qrCode.substring(10, 35);
                lotNoField.value = qrCode.substring(35, 41);
                serialNoField.value = qrCode.substring(41, 50);

                // console.log("Product Name Set:", productNameField.value);
                // console.log("Lot No Set:", lotNoField.value);
                // console.log("Serial No Set:", serialNoField.value);

                load_qc_defect_table(1);
            } else {
                console.error("One or more elements were not found in the DOM.");
            }

            this.value = '';
        } else if (qrCode.length > 50) {
            Swal.fire({
                icon: 'error',
                title: 'Invalid QR Code',
                text: 'Invalid',
                showConfirmButton: false,
                timer: 1000
            });
            this.value = '';
        }
    });

    const load_qc_defect_table_data_last_page = () => {
        var current_page = parseInt(sessionStorage.getItem('t_table_pagination'));

        var record_type_search = document.getElementById('search_ad_record_type').value.trim();
        var line_no_search = document.getElementById('search_ad_line_no').value.trim();
        var product_name_search = document.getElementById('search_ad_product_name').value.trim();
        var lot_no_search = document.getElementById('search_ad_lot_no').value.trim();
        var serial_no_search = document.getElementById('search_ad_serial_no').value.trim();

        var date_from_search = document.getElementById('search_ad_date_from').value.trim();
        var date_to_search = document.getElementById('search_ad_date_to').value.trim();

        $.ajax({
            url: '../../process/qc/defect_monitoring_record_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'load_qc_defect_table_data_last_page',
                record_type_search: record_type_search,
                line_no_search: line_no_search,
                product_name_search: product_name_search,
                lot_no_search: lot_no_search,
                serial_no_search: serial_no_search,
                date_from_search: date_from_search,
                date_to_search: date_to_search
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

    const load_qc_defect_table = () => {
        load_qc_defect_table_t1();
        setTimeout(() => {
            load_qc_defect_table_data(1);
        }, 500);
    }

    const load_qc_defect_table_t1 = () => {
        sessionStorage.setItem('t_table_number', 1);
        document.getElementById("qc_defect_table").innerHTML = `
            <thead style="text-align: center;">
                <tr>
                    <th>#</th>
                    <th>Line No.</th>
                    <th>Category</th>
                    <th>Date Detected</th>
                    <th>Issue No. Tag</th>
                    <th>Repairing Date</th>
                    <th>Car Maker</th>
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
                    <th>Sequence No.</th>
                    <th>Assy Board No.</th>
                    <th>Cause of Defect</th>
                    <th>Good Measurement</th>
                    <th>NG Measurement</th>
                    <th>Wire Type</th>
                    <th>Wire Size</th>
                    <th>Connector Cavity</th>
                    <th>Detail in Content of Defect</th>
                    <th>Treatment Content of Defect</th>
                    <th>Dis-assembled/Dis-inserted by:</th>
                    <th>Harness Status after Repair</th>
                    <th>RE-CRIMP Remarks</th>
                    <th>ID No.</th>
                    <th>Re-crimp by (PD FSP)</th>
                    <th>Verified by ID No.</th>
                    <th>Verified by (PD FSP)</th>
                    <th>COUNTERPART CHECKING Remarks 1</th>
                    <th>Remarks 2</th>
                    <th>ID No.</th>
                    <th>Verified by (QA FSP)</th>
                    <th>RE-ASSY/RE-INSERT Remarks</th>
                    <th>ID No.</th>
                    <th>Confirmed by (PD FAP)</th>
                    <th>Date Confirmed</th>
                </tr>
            </thead>
            <tbody class="mb-0" id="qc_defect_table_data" style="background: #F9F9F9;">
        `;
    }

    const load_qc_defect_table_data = current_page => {
        var record_type_search = document.getElementById('search_ad_record_type').value.trim();
        var line_no_search = document.getElementById('search_ad_line_no').value.trim();
        var product_name_search = document.getElementById('search_ad_product_name').value.trim();
        var lot_no_search = document.getElementById('search_ad_lot_no').value.trim();
        var serial_no_search = document.getElementById('search_ad_serial_no').value.trim();
        var date_from_search = document.getElementById('search_ad_date_from').value.trim();
        var date_to_search = document.getElementById('search_ad_date_to').value.trim();

        $.ajax({
            url: '../../process/qc/defect_monitoring_record_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'load_qc_defect_table_data',
                current_page: current_page,
                record_type_search: record_type_search,
                line_no_search: line_no_search,
                product_name_search: product_name_search,
                lot_no_search: lot_no_search,
                serial_no_search: serial_no_search,
                date_from_search: date_from_search,
                date_to_search: date_to_search
            },
            beforeSend: () => {
                var loading = `<tr id="loading"><td colspan="6" style="text-align:center;"><div class="spinner-border text-dark" role="status"><span class="sr-only">Loading...</span></div></td></tr>`;
                if (current_page == 1) {
                    document.getElementById("qc_defect_table_data").innerHTML = loading;
                } else {
                    $('#qc_defect_table tbody').append(loading);
                }
            },
            success: function (response) {
                $('#loading').remove();
                if (current_page == 1) {
                    $('#qc_defect_table tbody').html(response);
                } else {
                    $('#qc_defect_table tbody').append(response);
                }
                sessionStorage.setItem('t_table_pagination', current_page);
                $('#qc_defect_id').html('');
                $('#t_qc_defect_breadcrumb').hide();
                count_qc_defect_table_data();
            }
        });
    }

    const count_qc_defect_table_data = () => {
        var record_type_search = document.getElementById('search_ad_record_type').value.trim();
        var line_no_search = document.getElementById('search_ad_line_no').value.trim();
        var product_name_search = document.getElementById('search_ad_product_name').value.trim();
        var lot_no_search = document.getElementById('search_ad_lot_no').value.trim();
        var serial_no_search = document.getElementById('search_ad_serial_no').value.trim();
        var date_from_search = document.getElementById('search_ad_date_from').value.trim();
        var date_to_search = document.getElementById('search_ad_date_to').value.trim();

        $.ajax({
            url: '../../process/qc/defect_monitoring_record_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'count_qc_defect_table_data',
                record_type_search: record_type_search,
                line_no_search: line_no_search,
                product_name_search: product_name_search,
                lot_no_search: lot_no_search,
                serial_no_search: serial_no_search,
                date_from_search: date_from_search,
                date_to_search: date_to_search
            },
            success: function (response) {
                sessionStorage.setItem('count_rows', response);
                var count = `Total Record: ${response}`;
                $('#qc_defect_table_info').html(count);

                if (response > 0) {
                    load_qc_defect_table_data_last_page();
                } else {
                    document.getElementById("btnNextPage").style.display = "none";
                    document.getElementById("btnNextPage").setAttribute('disabled', true);
                }
            }
        });
    }

    const load_qc_mancost_table_data_last_page = () => {
        var qc_defect_id = sessionStorage.getItem('load_qc_defect_id');
        var current_page = parseInt(sessionStorage.getItem('t_table_pagination'));

        $.ajax({
            url: '../../process/qc/defect_monitoring_record_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'load_qc_mancost_table_data_last_page',
                qc_defect_id: qc_defect_id
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

    const count_qc_mancost_table_data = () => {
        var qc_defect_id = sessionStorage.getItem('load_qc_defect_id');

        $.ajax({
            url: '../../process/qc/defect_monitoring_record_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'count_qc_mancost_table_data',
                qc_defect_id: qc_defect_id
            },
            success: function (response) {
                sessionStorage.setItem('count_rows', response);
                var count = `Total Record: ${response}`;
                $('#qc_defect_table_info').html(count);

                if (response > 0) {
                    load_qc_mancost_table_data_last_page();
                } else {
                    document.getElementById("btnNextPage").style.display = "none";
                    document.getElementById("btnNextPage").setAttribute('disabled', true);
                }
            }
        });
    }

    const load_qc_mancost_table = param => {
        var string = param.split('~!~');
        var id = string[0];
        var qc_defect_id = string[1];

        sessionStorage.setItem('load_qc_defect_id', qc_defect_id);

        load_qc_mancost_table_t2();
        setTimeout(() => {
            load_qc_mancost_table_data(1);
        }, 500);
    }

    const load_qc_mancost_table_t2 = () => {
        sessionStorage.setItem('t_table_number', 2);
        document.getElementById("qc_defect_table").innerHTML = `
            <thead style="text-align: center;">
                <tr>
                    <th>
                        <input type="checkbox" name="" id="check_all"  onclick="select_all_func()">
                    </th>
                    <th>#</th>
                    <th>Line No.</th>
                    <th>Car Maker</th>
                    <th>Category</th>
                    <th>Repair Start</th>
                    <th>Repair End</th>
                    <th>Time Consumed</th>
                    <th>Defect Category</th>
                    <th>Occurrence Process</th>
                    <th>Parts Removed</th>
                    <th>Quantity</th>
                    <th>Unit Cost ( ¥ )</th>
                    <th>Material Cost ( ¥ )</th>
                    <th>Manhour Cost ( ¥ )</th>
                    <th>Repaired Portion Treatment</th>
                    <th>QC Verification</th>
                    <th>Checking Date</th>
                    <th>Verified By</th>
                    <th>Remarks</th>
                    <th>Record Added By</th>
                </tr>
            </thead>
            <tbody class="mb-0" id="qc_mancost_table_data" style="background: #F9F9F9;">
        `;
    }

    const load_qc_mancost_table_data = current_page => {
        var qc_defect_id = sessionStorage.getItem('load_qc_defect_id');

        $.ajax({
            url: '../../process/qc/defect_monitoring_record_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'load_qc_mancost_table_data',
                qc_defect_id: qc_defect_id,
                current_page: current_page
            },
            beforeSend: () => {
                var loading = `<tr id="loading"><td colspan="6" style="text-align:center;"><div class="spinner-border text-dark" role="status"><span class="sr-only">Loading...</span></div></td></tr>`;
                if (current_page == 1) {
                    document.getElementById("qc_mancost_table_data").innerHTML = loading;
                } else {
                    $('#qc_defect_table tbody').append(loading);
                }
            },
            success: function (response) {
                $('#loading').remove();
                if (current_page == 1) {
                    $('#qc_defect_table tbody').html(response);
                } else {
                    $('#qc_defect_table tbody').append(response);
                }
                sessionStorage.setItem('t_table_pagination', current_page);
                $('#qc_defect_id').html("Mancost Monitoring");
                $('#t_qc_defect_breadcrumb').show();
                count_qc_mancost_table_data();
            }
        });
    }

    // get data of row for qc verification
    // FOR OLD QC VERIFICATION
    // function get_update_defect_mancost_qc(id, car_maker_mc, line_no_mc, repairing_date_mc, repair_start_mc, repair_end_mc, time_consumed_mc, defect_category_mc, occurrence_process_mc, parts_removed_mc, quantity_mc, unit_cost_mc, material_cost_mc, manhour_cost_mc, portion_treatment_mc, qc_veri_mc_update, checking_date_mc_update, verified_by_mc_update, remarks_mc_update, defect_id) {
    //     $('#update_defect_mancost_id').val(id).prop('hidden', true);

    //     $('#car_maker_mc_update').val(car_maker_mc).prop('disabled', true);
    //     $('#line_no_mc_update').val(line_no_mc).prop('disabled', true);
    //     $('#repairing_date_mc_update').val(repairing_date_mc).prop('disabled', true);
    //     $('#repair_start_mc_update').val(repair_start_mc).prop('disabled', true);
    //     $('#repair_end_mc_update').val(repair_end_mc).prop('disabled', true);
    //     $('#time_consumed_mc_update').val(time_consumed_mc).prop('disabled', true);
    //     $('#defect_category_mc_update').val(defect_category_mc).prop('disabled', true);
    //     $('#occurrence_process_mc_update').val(occurrence_process_mc).prop('disabled', true);
    //     $('#parts_removed_mc_update').val(parts_removed_mc).prop('disabled', true);
    //     $('#quantity_mc_update').val(quantity_mc).prop('disabled', true);
    //     $('#unit_cost_mc_update').val(unit_cost_mc).prop('disabled', true);
    //     $('#material_cost_mc_update').val(material_cost_mc).prop('disabled', true);
    //     $('#manhour_cost_mc_update').val(manhour_cost_mc).prop('disabled', true);
    //     $('#portion_treatment_mc_update').val(portion_treatment_mc).prop('disabled', true);

    //     $('#qc_veri_mc_update').val(qc_veri_mc_update);
    //     $('#checking_date_mc_update').val(checking_date_mc_update);
    //     $('#verified_by_mc_update').val(verified_by_mc_update);
    //     $('#remarks_mc_update').val(remarks_mc_update);

    //     // defect unique id 
    //     $('#admin_defect_id_1').val(defect_id).prop('hidden', true);
    //     $('#update_defect_mancost_qc').modal('show');
    // }

    // FOR NEW QC VERIFICATION
    function get_update_defect_mancost_qc(id, car_maker_mc, line_no_mc, line_category_mc, date_detected_mc,
        issue_no_tag_mc, product_name_mc, lot_no_mc, serial_no_mc, discovery_process_mc,
        discovery_id_no_mc, discovery_person_mc, occurrence_process_dr, occurrence_shift_dr, occurrence_id_no_mc,
        occurrence_person_mc, outflow_process_mc, outflow_shift_mc, outflow_id_no_mc, outflow_person_mc,
        defect_category_mc2, sequence_no_mc, assy_board_no_mc, defect_cause_mc, good_measurement_mc,
        ng_measurement_mc, wire_type_mc, wire_size_mc, connector_cavity_mc, repair_person_mc,
        detail_content_defect_mc, treatment_content_defect_mc, harness_status_mc, repairing_date_mc, repair_start_mc,
        repair_end_mc, time_consumed_mc, defect_category_mc, occurrence_process_mc, parts_removed_mc,
        quantity_mc, unit_cost_mc, material_cost_mc, manhour_cost_mc, portion_treatment_mc,
        qc_veri_mc_update, checking_date_mc_update, verified_by_mc_update, remarks_mc_update, defect_id) {

        $('#update_defect_mancost_id').val(id).prop('hidden', true);

        $('#car_maker_mc_update').val(car_maker_mc);
        $('#line_no_mc_update').val(line_no_mc);
        $('#line_category_mc_update').val(line_category_mc);
        $('#date_detected_mc_update').val(date_detected_mc);
        $('#issue_tag_mc_update').val(issue_no_tag_mc);
        $('#product_name_mc_update').val(product_name_mc);
        $('#lot_no_mc_update').val(lot_no_mc);
        $('#serial_no_mc_update').val(serial_no_mc);
        $('#discovery_process_mc_update').val(discovery_process_mc);
        $('#discovery_id_no_mc_update').val(discovery_id_no_mc);
        $('#discovery_person_mc_update').val(discovery_person_mc);
        $('#occurrence_process_dr_update').val(occurrence_process_dr);
        $('#occurrence_shift_dr_update').val(occurrence_shift_dr);
        $('#occurrence_id_no_mc_update').val(occurrence_id_no_mc);
        $('#occurrence_person_mc_update').val(occurrence_person_mc);
        $('#outflow_process_mc_update').val(outflow_process_mc);
        $('#outflow_shift_mc_update').val(outflow_shift_mc);
        $('#outflow_id_no_mc_update').val(outflow_id_no_mc);
        $('#outflow_person_mc_update').val(outflow_person_mc);
        $('#defect_category_mc_update2').val(defect_category_mc2);
        $('#sequence_no_mc_update').val(sequence_no_mc);
        $('#assy_board_no_mc_update').val(assy_board_no_mc);
        $('#defect_cause_mc_update').val(defect_cause_mc);
        $('#good_measurement_mc_update').val(good_measurement_mc);
        $('#ng_measurement_mc_update').val(ng_measurement_mc);
        $('#wire_type_mc_update').val(wire_type_mc).prop('disabled', true);
        $('#wire_size_mc_update').val(wire_size_mc).prop('disabled', true);
        $('#connector_cavity_mc_update').val(connector_cavity_mc).prop('disabled', true);
        $('#repair_person_mc_update').val(repair_person_mc);
        $('#detail_content_defect_mc_update').val(detail_content_defect_mc);
        $('#treatment_content_defect_mc_update').val(treatment_content_defect_mc);
        $('#harness_status_mc_update').val(harness_status_mc).prop('disabled', true);

        $('#repairing_date_mc_update').val(repairing_date_mc);
        $('#repair_start_mc_update').val(repair_start_mc).prop('disabled', true);
        $('#repair_end_mc_update').val(repair_end_mc).prop('disabled', true);
        $('#time_consumed_mc_update').val(time_consumed_mc).prop('disabled', true);
        $('#defect_category_mc_update').val(defect_category_mc).prop('disabled', true);
        $('#occurrence_process_mc_update').val(occurrence_process_mc).prop('disabled', true);
        $('#parts_removed_mc_update').val(parts_removed_mc).prop('disabled', true);
        $('#quantity_mc_update').val(quantity_mc).prop('disabled', true);
        $('#unit_cost_mc_update').val(unit_cost_mc).prop('disabled', true);
        $('#material_cost_mc_update').val(material_cost_mc).prop('disabled', true);
        $('#manhour_cost_mc_update').val(manhour_cost_mc).prop('disabled', true);
        $('#portion_treatment_mc_update').val(portion_treatment_mc).prop('disabled', true);

        $('#qc_veri_mc_update').val(qc_veri_mc_update);
        $('#checking_date_mc_update').val(checking_date_mc_update);
        $('#verified_by_mc_update').val(verified_by_mc_update);
        $('#remarks_mc_update').val(remarks_mc_update);

        // defect unique id 
        $('#admin_defect_id_1').val(defect_id).prop('hidden', true);
        // $('#update_defect_mancost_qc').modal('show');
    }

    // FOR OLD QC VERIFICATION
    // const update_mancost2_record = () => {
    //     var id = document.getElementById('update_defect_mancost_id').value;

    //     var qc_verification = document.getElementById('qc_veri_mc_update');
    //     var qcVeriMcError = document.getElementById('qcVeriMcError');

    //     var checking_date = document.getElementById('checking_date_mc_update');
    //     var checkingDateMcError = document.getElementById('checkingDateMcError');

    //     var verified_by = document.getElementById('verified_by_mc_update');
    //     var verifiedByMcError = document.getElementById('verifiedByMcError');

    //     var remarks = document.getElementById('remarks_mc_update');
    //     var remarksMcError = document.getElementById('remarksMcError');

    //     var admin_defect_id = document.getElementById('admin_defect_id_1').value;

    //     // console.log('Updating with unique id:', admin_defect_id);

    //     if (qc_verification.value.trim() === '') {
    //         qc_verification.classList.add('highlight');
    //         qcVeriMcError.style.display = 'block';
    //     }

    //     if (checking_date.value.trim() === '') {
    //         checking_date.classList.add('highlight');
    //         checkingDateMcError.style.display = 'block';
    //     }

    //     if (verified_by.value.trim() === '') {
    //         verified_by.classList.add('highlight');
    //         verifiedByMcError.style.display = 'block';
    //     }

    //     if (remarks.value.trim() === '') {
    //         remarks.classList.add('highlight');
    //         remarksMcError.style.display = 'block';
    //     }

    //     if (qc_verification.value.trim() !== '' && checking_date.value.trim() !== '' &&
    //         verified_by.value.trim() !== '' && remarks.value.trim() !== '') {

    //         $.ajax({
    //             url: '../../process/qc/defect_monitoring_record_p.php',
    //             type: 'POST',
    //             cache: false,
    //             data: {
    //                 method: 'update_mancost2_record',
    //                 id: id,
    //                 qc_verification: qc_verification.value,
    //                 checking_date: checking_date.value,
    //                 verified_by: verified_by.value,
    //                 remarks: remarks.value,
    //                 admin_defect_id: admin_defect_id
    //             },
    //             success: function (response) {
    //                 // console.log('Server response:', response);

    //                 if (response == 'success') {
    //                     Swal.fire({
    //                         icon: 'success',
    //                         title: 'Verified Successfully',
    //                         showConfirmButton: false,
    //                         timer: 1500
    //                     });

    //                     $('#qc_veri_mc_update').val('');
    //                     $('#checking_date_mc_update').val('');
    //                     $('#verified_by_mc_update').val('');
    //                     $('#remarks_mc_update').val('');
    //                     $('#admin_defect_id').val('');

    //                     // Load updated table
    //                     // load_admin_mancost_table($('#update_defect_mancost_id').val() + '~!~' + $('#admin_defect_id_1').val());
    //                     load_qc_mancost_table($('#update_defect_mancost_id').val() + '~!~' + $('#admin_defect_id_1').val());

    //                     // Hide the modal
    //                     $('#update_defect_mancost_qc').modal('hide');
    //                 } else {
    //                     // Show error alert
    //                     Swal.fire({
    //                         icon: 'error',
    //                         title: 'Error',
    //                         showConfirmButton: false,
    //                         timer: 1000
    //                     });
    //                 }
    //             },
    //             error: function (xhr, status, error) {
    //                 console.error('AJAX error:', status, error);
    //             }
    //         });
    //     }
    // }

    // FOR NEW QC VERIFICATION
    const update_mancost2_record = () => {
        var id = document.getElementById('update_defect_mancost_id').value;

        var car_maker = document.getElementById('car_maker_mc_update').value;
        var line_no = document.getElementById('line_no_mc_update').value;
        var date_detected = document.getElementById('date_detected_mc_update').value;
        var issue_no_tag = document.getElementById('issue_tag_mc_update').value;
        var product_name = document.getElementById('product_name_mc_update').value;
        var lot_no = document.getElementById('lot_no_mc_update').value;
        var serial_no = document.getElementById('serial_no_mc_update').value;
        var discovery_process = document.getElementById('discovery_process_mc_update').value;
        var occurrence_process_dr = document.getElementById('occurrence_process_dr_update').value;
        var outflow_process = document.getElementById('outflow_process_mc_update').value;
        var outflow_id_no = document.getElementById('outflow_id_no_mc_update').value;
        var outflow_person = document.getElementById('outflow_person_mc_update').value;
        var defect_category_2 = document.getElementById('defect_category_mc_update2').value;
        var sequence_no = document.getElementById('sequence_no_mc_update').value;
        var repair_person = document.getElementById('repair_person_mc_update').value;
        var treatment_content_defect = document.getElementById('treatment_content_defect_mc_update').value;

        var qc_verification = document.getElementById('qc_veri_mc_update').value;
        var checking_date = document.getElementById('checking_date_mc_update').value;
        var verified_by = document.getElementById('verified_by_mc_update').value;
        var remarks = document.getElementById('remarks_mc_update').value;

        // var defect_id = document.getElementById('admin_defect_id_1').value;
        var defect_id = sessionStorage.getItem('load_qc_defect_id');;

        

        var arr = [];
        $('input.singleCheck:checkbox:checked').each((i, el) => {
            arr.push($(el).val());
        });

        // Log the array to debug
        console.log('Checked checkboxes:', arr);

        var numberOfChecked = arr.length;
        if (numberOfChecked > 0) {
            $.ajax({
                url: '../../process/qc/defect_monitoring_record_p.php',
                type: 'POST',
                cache: false,
                data: {
                    method: 'update_mancost2_record',
                    id_arr: arr,
                    id: id,
                    car_maker: car_maker,
                    line_no: line_no,
                    date_detected: date_detected,
                    issue_no_tag: issue_no_tag,
                    product_name: product_name,
                    lot_no: lot_no,
                    serial_no: serial_no,
                    discovery_process: discovery_process,
                    occurrence_process_dr: occurrence_process_dr,
                    outflow_process: outflow_process,
                    outflow_id_no: outflow_id_no,
                    outflow_person: outflow_person,
                    defect_category_2: defect_category_2,
                    sequence_no: sequence_no,
                    repair_person: repair_person,
                    treatment_content_defect: treatment_content_defect,
                    qc_verification: qc_verification,
                    checking_date: checking_date,
                    verified_by: verified_by,
                    remarks: remarks,
                    defect_id: defect_id
                },
                success: function (response) {
                    console.log('Server response:', response);

                    if (response == 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Verified Successfully',
                            showConfirmButton: false,
                            timer: 1500
                        });

                        // Clear input fields
                        $('#car_maker_mc_update').val('');
                        $('#line_no_mc_update').val('');
                        $('#date_detected_mc_update').val('');
                        $('#issue_tag_mc_update').val('');
                        $('#product_name_mc_update').val('');
                        $('#lot_no_mc_update').val('');
                        $('#serial_no_mc_update').val('');
                        $('#discovery_process_mc_update').val('');
                        $('#occurrence_process_dr_update').val('');
                        $('#outflow_process_mc_update').val('');
                        $('#outflow_id_no_mc_update').val('');
                        $('#outflow_person_mc_update').val('');
                        $('#defect_category_mc_update').val('');
                        $('#sequence_no_mc_update').val('');
                        $('#repair_person_mc_update').val('');
                        $('#treatment_content_defect_mc_update').val('');
                        $('#qc_veri_mc_update').val('');
                        $('#checking_date_mc_update').val('');
                        $('#verified_by_mc_update').val('');
                        $('#remarks_mc_update').val('');

                        load_qc_mancost_table(id + '~!~' + defect_id);

                        $('#update_defect_mancost_qc').modal('hide');
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            showConfirmButton: false,
                            timer: 1000
                        });
                    }
                },
                error: function (xhr, status, error) {
                    console.error('AJAX error:', status, error);
                }
            });
        }
    }


    // Highlight input fields when empty
    document.getElementById("qc_veri_mc_update").addEventListener("input", function () {
        var qc_verification = this;
        qc_verification.classList.remove('highlight');
        document.getElementById("qcVeriMcError").style.display = 'none';
    });

    document.getElementById("checking_date_mc_update").addEventListener("input", function () {
        var checking_date = this;
        checking_date.classList.remove('highlight');
        document.getElementById("checkingDateMcError").style.display = 'none';
    });

    document.getElementById("verified_by_mc_update").addEventListener("input", function () {
        var verified_by = this;
        verified_by.classList.remove('highlight');
        document.getElementById("verifiedByMcError").style.display = 'none';
    });

    document.getElementById("remarks_mc_update").addEventListener("input", function () {
        var remarks = this;
        remarks.classList.remove('highlight');
        document.getElementById("remarksMcError").style.display = 'none';
    });

    const search_defect_qc = () => {
        var status_search = document.getElementById('status_search_qc').value;
        var admin_defect_id = document.getElementById('admin_defect_id').value;

        $.ajax({
            url: '../../process/qc/defect_monitoring_record_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'search_defect_qc',
                status_search: status_search,
                admin_defect_id: admin_defect_id
            }, success: function (response) {
                $('#qc_defect_table').html(response);
                $('#spinner').fadeOut();
            }
        })
    }

    const clear_verify_list = () => {
        document.getElementById("qc_veri_mc_update").value = '';
        document.getElementById("checking_date_mc_update").value = '';
        document.getElementById("verified_by_mc_update").value = '';
        document.getElementById("remarks_mc_update").value = '';
    }

    const clear_search_input = () => {
        document.getElementById("search_ad_product_name").value = '';
        document.getElementById("search_ad_lot_no").value = '';
        document.getElementById("search_ad_serial_no").value = '';
        document.getElementById("search_ad_record_type").value = '';
        document.getElementById("search_ad_line_no").value = '';
        // document.getElementById("search_ad_date_from").value = '';
        // document.getElementById("search_ad_date_to").value = '';

        load_qc_defect_table(1);
    }

    function refresh_page() {
        location.reload();
    }

    document.getElementById('qr_scan_update').addEventListener('input', function (e) {
        // e.preventDefault(); // Prevent form submission

        var qrCode = this.value;

        if (qrCode.length === 50) {
            const productNameField = document.getElementById('product_name_mc_update');
            const lotNoField = document.getElementById('lot_no_mc_update');
            const serialNoField = document.getElementById('serial_no_mc_update');

            if (productNameField && lotNoField && serialNoField) {
                productNameField.value = qrCode.substring(10, 35);
                lotNoField.value = qrCode.substring(35, 41);
                serialNoField.value = qrCode.substring(41, 50);
            }

            this.value = '';
        } else if (qrCode.length > 50) {
            Swal.fire({
                icon: 'error',
                title: 'Invalid QR Code',
                text: 'Invalid',
                showConfirmButton: false,
                timer: 1000
            });
            this.value = '';
        }
    });

    const update_button_state = () => {
        var numberOfChecked = $('input.singleCheck:checkbox:checked').length;
        $('#update_button').prop('disabled', numberOfChecked === 0);
    };

    // Uncheck all checkboxes
    const uncheck_all = () => {
        var select_all = document.getElementById('check_all');
        select_all.checked = false;
        $('.singleCheck').each((i, el) => {
            el.checked = false;
        });
        get_checked_length();
    }

    // Select or deselect all checkboxes
    const select_all_func = () => {
        var select_all = document.getElementById('check_all');
        $('.singleCheck').each((i, el) => {
            el.checked = select_all.checked;
        });
        update_button_state();
        get_checked_length();
    }

    const get_checked_length = () => {
        var checkedItems = [];
        $('.singleCheck:checked').each((i, el) => {
            checkedItems.push({
                id: $(el).data('id'),
                car_maker_mc: $(el).data('car_maker_mc'),
                line_no_mc: $(el).data('line_no_mc'),
                line_category_mc: $(el).data('line_category_mc'),
                date_detected_mc: $(el).data('date_detected_mc'),
                issue_no_tag_mc: $(el).data('issue_no_tag_mc'),
                product_name_mc: $(el).data('product_name_mc'),
                lot_no_mc: $(el).data('lot_no_mc'),
                serial_no_mc: $(el).data('serial_no_mc'),
                discovery_process_mc: $(el).data('discovery_process_mc'),
                discovery_id_no_mc: $(el).data('discovery_id_no_mc'),
                discovery_person_mc: $(el).data('discovery_person_mc'),
                occurrence_process_dr: $(el).data('occurrence_process_dr'),
                occurrence_shift_dr: $(el).data('occurrence_shift_dr'),
                occurrence_id_no_mc: $(el).data('occurrence_id_no_mc'),
                occurrence_person_mc: $(el).data('occurrence_person_mc'),
                outflow_process_mc: $(el).data('outflow_process_mc'),
                outflow_shift_mc: $(el).data('outflow_shift_mc'),
                outflow_id_no_mc: $(el).data('outflow_id_no_mc'),
                outflow_person_mc: $(el).data('outflow_person_mc'),
                defect_category_mc2: $(el).data('defect_category_mc2'),
                sequence_no_mc: $(el).data('sequence_no_mc'),
                assy_board_no_mc: $(el).data('assy_board_no_mc'),
                defect_cause_mc: $(el).data('defect_cause_mc'),
                good_measurement_mc: $(el).data('good_measurement_mc'),
                ng_measurement_mc: $(el).data('ng_measurement_mc'),
                wire_type_mc: $(el).data('wire_type_mc'),
                wire_size_mc: $(el).data('wire_size_mc'),
                connector_cavity_mc: $(el).data('connector_cavity_mc'),
                repair_person_mc: $(el).data('repair_person_mc'),
                detail_content_defect_mc: $(el).data('detail_content_defect_mc'),
                treatment_content_defect_mc: $(el).data('treatment_content_defect_mc'),
                harness_status_mc: $(el).data('harness_status_mc'),
                repairing_date_mc_update: $(el).data('repairing_date_mc_update'),
                defect_id: $(el).data('defect_id'),
            });
        });

        update_button_state();

        console.log('Checked items:', checkedItems);

        if (checkedItems.length > 0) {
            let firstItem = checkedItems[0];
            get_update_defect_mancost_qc(
                firstItem.id,
                firstItem.car_maker_mc,
                firstItem.line_no_mc,
                firstItem.line_category_mc,
                firstItem.date_detected_mc,
                firstItem.issue_no_tag_mc,
                firstItem.product_name_mc,
                firstItem.lot_no_mc,
                firstItem.serial_no_mc,
                firstItem.discovery_process_mc,
                firstItem.discovery_id_no_mc,
                firstItem.discovery_person_mc,
                firstItem.occurrence_process_dr,
                firstItem.occurrence_shift_dr,
                firstItem.occurrence_id_no_mc,
                firstItem.occurrence_person_mc,
                firstItem.outflow_process_mc,
                firstItem.outflow_shift_mc,
                firstItem.outflow_id_no_mc,
                firstItem.outflow_person_mc,
                firstItem.defect_category_mc2,
                firstItem.sequence_no_mc,
                firstItem.assy_board_no_mc,
                firstItem.defect_cause_mc,
                firstItem.good_measurement_mc,
                firstItem.ng_measurement_mc,
                firstItem.wire_type_mc,
                firstItem.wire_size_mc,
                firstItem.connector_cavity_mc,
                firstItem.repair_person_mc,
                firstItem.detail_content_defect_mc,
                firstItem.treatment_content_defect_mc,
                firstItem.harness_status_mc,
                firstItem.repairing_date_mc_update,
                firstItem.defect_id,
            );
        }
    };
</script>