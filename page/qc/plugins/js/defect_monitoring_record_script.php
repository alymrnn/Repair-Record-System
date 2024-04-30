<script type="text/javascript">
    $(document).ready(function () {
        load_admin_defect_table();
        fetch_opt_search_ad_record_type();
        fetch_opt_search_ad_defect_category();
        fetch_opt_search_ad_discovery_process();
        fetch_opt_search_ad_occurrence_process();
        fetch_opt_search_ad_outflow_process();
        fetch_opt_search_ad_defect_category_mc();
        fetch_opt_search_ad_occurrence_process_mc();
        fetch_opt_search_ad_portion_treatment_mc();
        load_admin_mancost_record();
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
    // fetch defect record table
    const load_admin_defect_table = () => {
        $.ajax({
            url: '../../process/qc/defect_monitoring_record_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'load_admin_defect_table'
            },
            beforeSend: () => {
                var loading = `<tr id="loading"><td colspan="10" style="text-align:center;"><div class="spinner-border text-dark" role="status"><span class="sr-only">Loading...</span></div></td></tr>`;
                document.getElementById("admin_defect_table").innerHTML = loading;
            },
            success: function (response) {
                $('#loading').remove();
                $('#admin_defect_table').html(response);
                $('#admin_defect_id').html('');
                $('#t_admin_defect_breadcrumb').hide();
            }
        });
    }

    // fetch manpower and material cost monitoring
    const load_admin_mancost_table = (param) => {
        var string = param.split('~!~');
        var id = string[0];
        var admin_defect_id = string[1];

        $.ajax({
            url: '../../process/qc/defect_monitoring_record_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'load_admin_mancost_table',
                admin_defect_id: admin_defect_id
            },
            beforeSend: () => {
                var loading = `<tr id="loading"><td colspan="10" style="text-align:center;"><div class="spinner-border text-dark" role="status"><span class="sr-only">Loading...</span></div></td></tr>`;
                document.getElementById("admin_defect_table").innerHTML = loading;
            },
            success: function (response) {
                $('#loading').remove();
                $('#admin_defect_table').html(response);
                $('#admin_defect_id').html("Mancost Monitoring");
                $('#t_admin_defect_breadcrumb').show();
            }
        })
    }

    // fetch mancost only
    const load_admin_mancost_record = () => {
        $.ajax({
            url: '../../process/qc/defect_monitoring_record_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'load_admin_mancost_record'
            },
            success: function (response) {
                $('#list_of_admin_mancost_record').html(response);
                $('#spinner').fadeOut();
            }
        });
    }

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
                $('#admin_defect_table').html(response);
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
                $('#admin_defect_table').html(response);
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
    function get_update_defect_mancost_qc(id, car_maker_mc, line_no_mc, repairing_date_mc, repair_start_mc, repair_end_mc, time_consumed_mc, defect_category_mc, occurrence_process_mc, parts_removed_mc, quantity_mc, unit_cost_mc, material_cost_mc, manhour_cost_mc, portion_treatment_mc, defect_id) {

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

        // $('#qc_veri_mc_update').val(qc_veri_mc_update);
        // $('#checking_date_mc_update').val(checking_date_mc_update);
        // $('#verified_by_mc_update').val(verified_by_mc_update);
        // $('#remarks_mc_update').val(remarks_mc_update);

        // defect unique id 
        $('#admin_defect_id_1').val(defect_id).prop('hidden', true);

        console.log('showing modal ey');
        console.log($('#update_defect_mancost_id').val());
        console.log($('#car_maker_mc_update').val());
        console.log($('#admin_defect_id_1').val());

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

        console.log('Updating with unique id:', admin_defect_id);

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
                    console.log('Server response:', response);

                    if (response == 'success') {
                        // Show "Verified Successfully" alert
                        Swal.fire({
                            icon: 'success',
                            title: 'Verified Successfully',
                            text: 'Success',
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
                        load_admin_mancost_table($('#update_defect_mancost_id').val() + '~!~' + $('#admin_defect_id_1').val());

                        // Hide the modal
                        $('#update_defect_mancost_qc').modal('hide');
                    } else {
                        // Show error alert
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Error',
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
                $('#admin_defect_table').html(response);
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