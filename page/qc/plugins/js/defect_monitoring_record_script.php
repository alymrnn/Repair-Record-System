<script type="text/javascript">
    $(document).ready(function () {
        load_qc_defect_table();
        fetch_opt_search_ad_record_type();
        fetch_opt_search_ad_defect_category();
        fetch_opt_search_ad_discovery_process();
        fetch_opt_search_ad_occurrence_process();
        fetch_opt_search_ad_outflow_process();
        fetch_opt_search_ad_defect_category_mc();
        fetch_opt_search_ad_occurrence_process_mc();
        fetch_opt_search_ad_portion_treatment_mc();
    });

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

    // ================================================================

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

    const load_qc_defect_table_data_last_page = () => {
        var current_page = parseInt(sessionStorage.getItem('t_table_pagination'));
        $.ajax({
            url: '../../process/qc/defect_monitoring_record_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'load_qc_defect_table_data_last_page'
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
                    <th>Sequence Number</th>
                    <th>Cause of Defect</th>
                    <th>Detail in Content of Defect</th>
                    <th>Treatment Content of Defect</th>
                    <th>Dis-assembled/Dis-inserted by:</th>
                </tr>
            </thead>
            <tbody class="mb-0" id="qc_defect_table_data" style="background: #F9F9F9;">
        `;
    }

    const load_qc_defect_table_data = current_page => {
        $.ajax({
            url: '../../process/qc/defect_monitoring_record_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'load_qc_defect_table_data',
                current_page: current_page
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
        $.ajax({
            url: '../../process/qc/defect_monitoring_record_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'count_qc_defect_table_data'
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
                    <th>#</th>
                    <th>Car Maker</th>
                    <th>Line No.</th>
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

    // fetch defect record table
    // const load_admin_defect_table = () => {
    //     $.ajax({
    //         url: '../../process/qc/defect_monitoring_record_p.php',
    //         type: 'POST',
    //         cache: false,
    //         data: {
    //             method: 'load_admin_defect_table'
    //         },
    //         beforeSend: () => {
    //             var loading = `<tr id="loading"><td colspan="10" style="text-align:center;"><div class="spinner-border text-dark" role="status"><span class="sr-only">Loading...</span></div></td></tr>`;
    //             document.getElementById("admin_defect_table").innerHTML = loading;
    //         },
    //         success: function (response) {
    //             $('#loading').remove();
    //             $('#admin_defect_table').html(response);
    //             $('#admin_defect_id').html('');
    //             $('#t_admin_defect_breadcrumb').hide();
    //         }
    //     });
    // }

    // fetch manpower and material cost monitoring
    // const load_admin_mancost_table = (param) => {
    //     var string = param.split('~!~');
    //     var id = string[0];
    //     var admin_defect_id = string[1];

    //     $.ajax({
    //         url: '../../process/qc/defect_monitoring_record_p.php',
    //         type: 'POST',
    //         cache: false,
    //         data: {
    //             method: 'load_admin_mancost_table',
    //             admin_defect_id: admin_defect_id
    //         },
    //         beforeSend: () => {
    //             var loading = `<tr id="loading"><td colspan="10" style="text-align:center;"><div class="spinner-border text-dark" role="status"><span class="sr-only">Loading...</span></div></td></tr>`;
    //             document.getElementById("admin_defect_table").innerHTML = loading;
    //         },
    //         success: function (response) {
    //             $('#loading').remove();
    //             $('#admin_defect_table').html(response);
    //             $('#admin_defect_id').html("Mancost Monitoring");
    //             $('#t_admin_defect_breadcrumb').show();
    //         }
    //     })
    // }

    // search defect category
    const search_admin_defect_record = () => {
        var line_no_dr_search = document.getElementById('search_ad_line_no').value.trim();
        var defect_category_dr_search = document.getElementById('search_ad_defect_category').value.trim();
        var discovery_process_dr_search = document.getElementById('search_ad_discovery_process').value.trim();
        var occurrence_process_dr_search = document.getElementById('search_ad_occurrence_process').value.trim();
        var outflow_process_dr_search = document.getElementById('search_ad_outflow_process').value.trim();

        var date_from_dr_search = document.getElementById('search_ad_date_from').value.trim();
        var date_to_dr_search = document.getElementById('search_ad_date_to').value.trim();

        $.ajax({
            url: '../../process/qc/defect_monitoring_record_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'search_admin_defect_record',
                line_no_dr_search: line_no_dr_search,
                defect_category_dr_search: defect_category_dr_search,
                discovery_process_dr_search: discovery_process_dr_search,
                occurrence_process_dr_search: occurrence_process_dr_search,
                outflow_process_dr_search: outflow_process_dr_search,
                date_from_dr_search: date_from_dr_search,
                date_to_dr_search: date_to_dr_search
            },
            success: function (response) {
                $('#qc_defect_table').html(response);
                $('#spinner').fadeOut;
            }
        });
    }

    // search product name, line no, and serial no
    const search_qc = () => {
        var record_type_search = document.getElementById('search_ad_record_type').value.trim();
        var product_name_search = document.getElementById('search_ad_product_name').value.trim();
        var lot_no_search = document.getElementById('search_ad_lot_no').value.trim();
        var serial_no_search = document.getElementById('search_ad_serial_no').value.trim();

        $.ajax({
            url: '../../process/qc/defect_monitoring_record_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'search_qc',
                record_type_search: record_type_search,
                product_name_search: product_name_search,
                lot_no_search: lot_no_search,
                serial_no_search: serial_no_search
            },
            success: function (response) {
                $('#qc_defect_table').html(response);
                $('#spinner').fadeOut;
            }
        });
    }

    // search mancost monitoring only
    const search_admin_mancost_only = () => {
        var line_no_mc_search = document.getElementById('search_ad_line_no_mc').value.trim();
        var defect_category_mc_search = document.getElementById('search_ad_defect_category_mc').value.trim();
        var occurrence_process_mc_search = document.getElementById('search_ad_occurrence_process_mc').value.trim();
        var parts_removed_mc_search = document.getElementById('search_ad_parts_removed_mc').value.trim();
        var portion_treatment_mc_search = document.getElementById('search_ad_portion_treatment_mc').value.trim();

        var date_from_mc_search = document.getElementById('search_ad_date_from_mc').value.trim();
        var date_to_mc_search = document.getElementById('search_ad_date_to_mc').value.trim();

        $.ajax({
            url: '../../process/qc/defect_monitoring_record_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'search_admin_mancost_only',
                line_no_mc_search: line_no_mc_search,
                defect_category_mc_search: defect_category_mc_search,
                occurrence_process_mc_search: occurrence_process_mc_search,
                parts_removed_mc_search: parts_removed_mc_search,
                portion_treatment_mc_search: portion_treatment_mc_search,
                date_from_mc_search: date_from_mc_search,
                date_to_mc_search: date_to_mc_search
            },
            success: function (response) {
                $('#list_of_admin_mancost_record').html(response);
                $('#spinner').fadeOut;
            }
        });
    }

    // get data of row for qc verification
    function get_update_defect_mancost_qc(id, car_maker_mc, line_no_mc, repairing_date_mc, repair_start_mc, repair_end_mc, time_consumed_mc, defect_category_mc, occurrence_process_mc, parts_removed_mc, quantity_mc, unit_cost_mc, material_cost_mc, manhour_cost_mc, portion_treatment_mc, qc_veri_mc_update, checking_date_mc_update, verified_by_mc_update, remarks_mc_update, defect_id) {

        // populate the modal
        // db id
        $('#update_defect_mancost_id').val(id).prop('hidden', true);

        $('#car_maker_mc_update').val(car_maker_mc).prop('disabled', true);
        $('#line_no_mc_update').val(line_no_mc).prop('disabled', true);
        $('#repairing_date_mc_update').val(repairing_date_mc).prop('disabled', true);
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

        // console.log('showing modal ey');
        // console.log($('#update_defect_mancost_id').val());
        // console.log($('#car_maker_mc_update').val());
        // console.log($('#admin_defect_id_1').val());

        $('#update_defect_mancost_qc').modal('show');
    }

    const update_mancost2_record = () => {
        var id = document.getElementById('update_defect_mancost_id').value;

        var qc_verification = document.getElementById('qc_veri_mc_update');
        var qcVeriMcError = document.getElementById('qcVeriMcError');

        var checking_date = document.getElementById('checking_date_mc_update');
        var checkingDateMcError = document.getElementById('checkingDateMcError');

        var verified_by = document.getElementById('verified_by_mc_update');
        var verifiedByMcError = document.getElementById('verifiedByMcError');

        var remarks = document.getElementById('remarks_mc_update');
        var remarksMcError = document.getElementById('remarksMcError');

        var admin_defect_id = document.getElementById('admin_defect_id_1').value;

        // console.log('Updating with unique id:', admin_defect_id);

        // Check all fields for emptiness
        if (qc_verification.value.trim() === '') {
            qc_verification.classList.add('highlight');
            qcVeriMcError.style.display = 'block';
        }

        if (checking_date.value.trim() === '') {
            checking_date.classList.add('highlight');
            checkingDateMcError.style.display = 'block';
        }

        if (verified_by.value.trim() === '') {
            verified_by.classList.add('highlight');
            verifiedByMcError.style.display = 'block';
        }

        if (remarks.value.trim() === '') {
            remarks.classList.add('highlight');
            remarksMcError.style.display = 'block';
        }

        // Only proceed with the AJAX request if all fields are non-empty
        if (qc_verification.value.trim() !== '' && checking_date.value.trim() !== '' &&
            verified_by.value.trim() !== '' && remarks.value.trim() !== '') {

            $.ajax({
                url: '../../process/qc/defect_monitoring_record_p.php',
                type: 'POST',
                cache: false,
                data: {
                    method: 'update_mancost2_record',
                    id: id,
                    qc_verification: qc_verification.value,
                    checking_date: checking_date.value,
                    verified_by: verified_by.value,
                    remarks: remarks.value,
                    admin_defect_id: admin_defect_id
                },
                success: function (response) {
                    // console.log('Server response:', response);

                    if (response == 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Verified Successfully',
                            showConfirmButton: false,
                            timer: 1500
                        });

                        // Clear input fields
                        $('#qc_veri_mc_update').val('');
                        $('#checking_date_mc_update').val('');
                        $('#verified_by_mc_update').val('');
                        $('#remarks_mc_update').val('');
                        $('#admin_defect_id').val('');

                        // Load updated table
                        // load_admin_mancost_table($('#update_defect_mancost_id').val() + '~!~' + $('#admin_defect_id_1').val());
                        load_qc_mancost_table($('#update_defect_mancost_id').val() + '~!~' + $('#admin_defect_id_1').val());

                        // Hide the modal
                        $('#update_defect_mancost_qc').modal('hide');
                    } else {
                        // Show error alert
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

</script>