<script type="text/javascript">
    $(document).ready(function () {
        var currentDate = new Date().toISOString().split('T')[0];
        $('#search_date_from_pdv_re').val(currentDate);
        $('#search_date_to_pdv_re').val(currentDate);

        fetch_opt_harness_status_pdv();
        // fetch_opt_line_no_pdv();
        load_defect_table_pdv_re(1);

        $('#reassy_id_no_re_update').on('keypress', function (e) {
            if (e.which === 13) {
                get_reassy_name_update();
            }
        });
    });

    const get_reassy_name_update = () => {
        var reassy_id_no = $('#reassy_id_no_re_update').val();

        if (reassy_id_no === 'N/A') {
            $('#reassy_name_re_update').val('N/A');
            return;
        }

        if (reassy_id_no === '') {
            $('#reassy_name_re_update').val('');
            return;
        }

        $.ajax({
            url: '../../process/pd_verifier/defect_monitoring_record_pdv_get_p.php',
            type: 'GET',
            data: {
                method: 'get_reassy_name_update',
                reassy_id_no: reassy_id_no
            },
            success: function (response) {
                var data = JSON.parse(response);
                $('#reassy_name_re_update').val(data.full_name);
            },
            error: function (jqXHR, textStatus, errorThrown) {

            }
        });
    };

    const fetch_opt_harness_status_pdv = () => {
        $.ajax({
            url: '../../process/pd_verifier/re_assy_re_insert_pdv_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_opt_harness_status_pdv',
            },
            success: function (response) {
                $('#search_harness_status_pdv_re').html(response);
            }
        });
    }

    // const fetch_opt_line_no_pdv = () => {
    //     $.ajax({
    //         url: '../../process/pd_verifier/defect_monitoring_record_pdv_p.php',
    //         type: 'POST',
    //         cache: false,
    //         data: {
    //             method: 'fetch_opt_line_no_pdv',
    //         },
    //         success: function (response) {
    //             $('#search_line_no_pdv').html(response);
    //         }
    //     });
    // }

    document.getElementById('search_qr_scan_pdv_re').addEventListener('keyup', function (e) {
        var qrCode = this.value;

        if (qrCode.length === 50) {
            const productNameField = document.getElementById('search_product_name_pdv_re');
            const lotNoField = document.getElementById('search_lot_no_pdv_re');
            const serialNoField = document.getElementById('search_serial_no_pdv_re');

            if (productNameField && lotNoField && serialNoField) {
                productNameField.value = qrCode.substring(10, 35);
                lotNoField.value = qrCode.substring(35, 41);
                serialNoField.value = qrCode.substring(41, 50);

                load_defect_table_pdv_re(1);
            } else {

            }

            this.value = '';
        }
    });

    document.getElementById("list_of_defect_pdv_re_res").addEventListener("scroll", function () {
        var scrollTop = document.getElementById("list_of_defect_pdv_re_res").scrollTop;
        var scrollHeight = document.getElementById("list_of_defect_pdv_re_res").scrollHeight;
        var offsetHeight = document.getElementById("list_of_defect_pdv_re_res").offsetHeight;

        if ((offsetHeight + scrollTop + 1) >= scrollHeight) {
            get_next_page();
        }
    });

    const get_next_page = () => {
        var current_page = parseInt(sessionStorage.getItem('defect_pdv_table_pagination'));
        let total = sessionStorage.getItem('count_rows');
        var last_page = parseInt(sessionStorage.getItem('last_page'));
        var next_page = current_page + 1;
        if (next_page <= last_page && total > 0) {
            load_defect_table_pdv_re(next_page);
        }
    }

    const count_defect_pdv = () => {
        var search_product_name_pdv = sessionStorage.getItem('search_product_name_pdv');
        var search_lot_no_pdv = sessionStorage.getItem('search_lot_no_pdv');
        var search_serial_no_pdv = sessionStorage.getItem('search_serial_no_pdv');
        var search_line_no_pdv = sessionStorage.getItem('search_line_no_pdv_ng');
        var search_harness_status_pdv = sessionStorage.getItem('search_harness_status_pdv');
        var search_harness_remarks_pdv = sessionStorage.getItem('search_harness_remarks_pdv');
        var search_date_from_pdv = sessionStorage.getItem('search_date_from_pdv');
        var search_date_to_pdv = sessionStorage.getItem('search_date_to_pdv');

        $.ajax({
            url: '../../process/pd_verifier/re_assy_re_insert_pdv_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'count_defect_pdv_re_list',
                search_product_name_pdv: search_product_name_pdv,
                search_lot_no_pdv: search_lot_no_pdv,
                search_serial_no_pdv: search_serial_no_pdv,
                search_line_no_pdv: search_line_no_pdv,
                search_harness_status_pdv: search_harness_status_pdv,
                search_harness_remarks_pdv: search_harness_remarks_pdv,
                search_date_from_pdv: search_date_from_pdv,
                search_date_to_pdv: search_date_to_pdv,
            },
            success: function (response) {
                sessionStorage.setItem('count_rows', response);
                var count = `Total: ${response}`;
                $('#defect_pdv_re_table_info').html(count);

                if (response > 0) {
                    load_defect_pdv_last_page();
                } else {
                    document.getElementById("btnNextPage").style.display = "none";
                    document.getElementById("btnNextPage").setAttribute('disabled', true);
                }
            }
        });
    }

    const load_defect_pdv_last_page = () => {
        var search_product_name_pdv = sessionStorage.getItem('search_product_name_pdv');
        var search_lot_no_pdv = sessionStorage.getItem('search_lot_no_pdv');
        var search_serial_no_pdv = sessionStorage.getItem('search_serial_no_pdv');
        var search_line_no_pdv = sessionStorage.getItem('search_line_no_pdv');
        var search_harness_status_pdv = sessionStorage.getItem('search_harness_status_pdv');
        var search_harness_remarks_pdv = sessionStorage.getItem('search_harness_remarks_pdv');
        var search_date_from_pdv = sessionStorage.getItem('search_date_from_pdv');
        var search_date_to_pdv = sessionStorage.getItem('search_date_to_pdv');

        var current_page = sessionStorage.getItem('defect_pdv_table_pagination');

        $.ajax({
            url: '../../process/pd_verifier/re_assy_re_insert_pdv_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'defect_pdv_list_last_page',
                search_product_name_pdv: search_product_name_pdv,
                search_lot_no_pdv: search_lot_no_pdv,
                search_serial_no_pdv: search_serial_no_pdv,
                search_line_no_pdv: search_line_no_pdv,
                search_harness_status_pdv: search_harness_status_pdv,
                search_harness_remarks_pdv: search_harness_remarks_pdv,
                search_date_from_pdv: search_date_from_pdv,
                search_date_to_pdv: search_date_to_pdv,
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

    const load_defect_table_pdv_re = current_page => {
        var search_product_name_pdv = document.getElementById("search_product_name_pdv_re").value;
        var search_lot_no_pdv = document.getElementById("search_lot_no_pdv_re").value;
        var search_serial_no_pdv = document.getElementById("search_serial_no_pdv_re").value;
        var search_line_no_pdv = document.getElementById("search_line_no_pdv_re").value;
        var search_harness_status_pdv = document.getElementById("search_harness_status_pdv_re").value;
        var search_harness_remarks_pdv = document.getElementById("search_harness_remarks_pdv_re").value;
        var search_date_from_pdv = document.getElementById("search_date_from_pdv_re").value;
        var search_date_to_pdv = document.getElementById("search_date_to_pdv_re").value;

        var search_product_name_pdv_1 = sessionStorage.getItem('search_product_name_pdv');
        var search_lot_no_pdv_1 = sessionStorage.getItem('search_lot_no_pdv');
        var search_serial_no_pdv_1 = sessionStorage.getItem('search_serial_no_pdv');
        var search_line_no_pdv_1 = sessionStorage.getItem('search_line_no_pdv');
        var search_harness_status_pdv_1 = sessionStorage.getItem('search_harness_status_pdv');
        var search_harness_remarks_pdv_1 = sessionStorage.getItem('search_harness_remarks_pdv');
        var search_date_from_pdv_1 = sessionStorage.getItem('search_date_from_pdv');
        var search_date_to_pdv_1 = sessionStorage.getItem('search_date_to_pdv');

        if (current_page > 1) {
            switch (true) {
                case search_product_name_pdv !== search_product_name_pdv_1:
                case search_lot_no_pdv !== search_lot_no_pdv_1:
                case search_serial_no_pdv !== search_serial_no_pdv_1:
                case search_line_no_pdv !== search_line_no_pdv_1:
                case search_harness_status_pdv !== search_harness_status_pdv_1:
                case search_harness_remarks_pdv !== search_harness_remarks_pdv_1:
                case search_date_from_pdv !== search_date_from_pdv_1:
                case search_date_to_pdv !== search_date_to_pdv_1:
                    search_product_name_pdv = search_product_name_pdv_1;
                    search_lot_no_pdv = search_lot_no_pdv_1;
                    search_serial_no_pdv = search_serial_no_pdv_1;
                    search_line_no_pdv = search_line_no_pdv_1;
                    search_harness_status_pdv = search_harness_status_pdv_1;
                    search_harness_remarks_pdv = search_harness_remarks_pdv_1;
                    search_date_from_pdv = search_date_from_pdv_1;
                    search_date_to_pdv = search_date_to_pdv_1;
                    break;
                default:
            }
        } else {
            sessionStorage.setItem('search_product_name_pdv', search_product_name_pdv);
            sessionStorage.setItem('search_lot_no_pdv', search_lot_no_pdv);
            sessionStorage.setItem('search_serial_no_pdv', search_serial_no_pdv);
            sessionStorage.setItem('search_line_no_pdv', search_line_no_pdv);
            sessionStorage.setItem('search_harness_status_pdv', search_harness_status_pdv);
            sessionStorage.setItem('search_harness_remarks_pdv', search_harness_remarks_pdv);
            sessionStorage.setItem('search_date_from_pdv', search_date_from_pdv);
            sessionStorage.setItem('search_date_to_pdv', search_date_to_pdv);
        }

        $.ajax({
            url: '../../process/pd_verifier/re_assy_re_insert_pdv_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'load_defect_table_pdv_re',
                search_product_name_pdv: search_product_name_pdv,
                search_lot_no_pdv: search_lot_no_pdv,
                search_serial_no_pdv: search_serial_no_pdv,
                search_line_no_pdv: search_line_no_pdv,
                search_harness_status_pdv: search_harness_status_pdv,
                search_harness_remarks_pdv: search_harness_remarks_pdv,
                search_date_from_pdv: search_date_from_pdv,
                search_date_to_pdv: search_date_to_pdv,
                current_page: current_page
            },
            beforeSend: () => {
                var loading = `<tr id="loading"><td colspan="6" style="text-align:center;"><div class="spinner-border text-dark role="status"><span class="sr-only">Loading...</span></div></td></tr>`;
                if (current_page == 1) {
                    document.getElementById("list_of_defect_record_pdv_re").innerHTML = loading;
                } else {
                    $('#defect_pdv_re_table tbody').append(loading);
                }
            },
            success: function (response) {
                $('#loading').remove();
                if (current_page == 1) {
                    $('#defect_pdv_re_table tbody').html(response);
                } else {
                    $('#defect_pdv_re_table tbody').append(response);
                }
                sessionStorage.setItem('defect_pdv_table_pagination', current_page);
                count_defect_pdv();
            }
        });
    }

    const clear_search_input_pdv = () => {
        document.getElementById("search_qr_scan_pdv_re").value = '';
        document.getElementById("search_product_name_pdv_re").value = '';
        document.getElementById("search_lot_no_pdv_re").value = '';
        document.getElementById("search_serial_no_pdv_re").value = '';
        document.getElementById("search_line_no_pdv_re").value = '';
        document.getElementById("search_harness_status_pdv_re").value = '';
        document.getElementById("search_harness_remarks_pdv_re").value = '';
        document.getElementById("search_date_from_pdv_re").value = '';
        document.getElementById("search_date_to_pdv_re").value = '';

        load_defect_table_pdv_re(1);
    }

    function get_update_defect_re_assy(dataString) {
        const data = dataString.split('~!~');

        $('#update_defect_mancost_pdv_re_id').val(data[0]).prop('hidden', true);

        $('#car_maker_pdv_re_update').val(data[1]).prop('disabled', true).css('background', '#EEE');
        $('#line_no_pdv_re_update').val(data[2]).prop('disabled', true).css('background', '#EEE');
        $('#line_category_pdv_re_update').val(data[3]).prop('disabled', true).css('background', '#EEE');
        $('#date_detected_pdv_re_update').val(data[4]).prop('disabled', true).css('background', '#EEE');
        $('#issue_tag_pdv_re_update').val(data[5]).prop('disabled', true).css('background', '#EEE');
        $('#repairing_date_pdv_re_update').val(data[6]).prop('disabled', true).css('background', '#EEE');
        $('#product_name_pdv_re_update').val(data[7]).prop('disabled', true).css('background', '#EEE');
        $('#lot_no_pdv_re_update').val(data[8]).prop('disabled', true).css('background', '#EEE');
        $('#serial_no_pdv_re_update').val(data[9]).prop('disabled', true).css('background', '#EEE');
        $('#discovery_process_pdv_re_update').val(data[10]).prop('disabled', true).css('background', '#EEE');
        $('#discovery_id_no_pdv_re_update').val(data[11]).prop('disabled', true).css('background', '#EEE');
        $('#discovery_person_pdv_re_update').val(data[12]).prop('disabled', true).css('background', '#EEE');
        $('#occurrence_process_pdv_dr_re_update').val(data[13]).prop('disabled', true).css('background', '#EEE');
        $('#occurrence_shift_pdv_re_update').val(data[14]).prop('disabled', true).css('background', '#EEE');
        $('#occurrence_id_no_pdv_re_update').val(data[15]).prop('disabled', true).css('background', '#EEE');
        $('#occurrence_person_pdv_re_update').val(data[16]).prop('disabled', true).css('background', '#EEE');
        $('#outflow_process_pdv_re_update').val(data[17]).prop('disabled', true).css('background', '#EEE');
        $('#outflow_shift_pdv_re_update').val(data[18]).prop('disabled', true).css('background', '#EEE');
        $('#outflow_id_no_pdv_re_update').val(data[19]).prop('disabled', true).css('background', '#EEE');
        $('#outflow_person_pdv_re_update').val(data[20]).prop('disabled', true).css('background', '#EEE');
        $('#defect_category_pdv_dr_re_update').val(data[21]).prop('disabled', true).css('background', '#EEE');
        $('#sequence_no_pdv_re_update').val(data[22]).prop('disabled', true).css('background', '#EEE');
        $('#assy_board_no_pdv_re_update').val(data[23]).prop('disabled', true).css('background', '#EEE');
        $('#defect_cause_pdv_re_update').val(data[24]).prop('disabled', true).css('background', '#EEE');
        $('#good_measurement_pdv_re_update').val(data[25]).prop('disabled', true).css('background', '#EEE');
        $('#ng_measurement_pdv_re_update').val(data[26]).prop('disabled', true).css('background', '#EEE');
        $('#wire_type_pdv_re_update').val(data[27]).prop('disabled', true).css('background', '#EEE');
        $('#wire_size_pdv_re_update').val(data[28]).prop('disabled', true).css('background', '#EEE');
        $('#connector_cavity_pdv_re_update').val(data[29]).prop('disabled', true).css('background', '#EEE');
        $('#repair_person_pdv_re_update').val(data[30]).prop('disabled', true).css('background', '#EEE');
        $('#detail_content_defect_pdv_re_update').val(data[31]).prop('disabled', true).css('background', '#EEE');
        $('#treatment_content_defect_pdv_re_update').val(data[32]).prop('disabled', true).css('background', '#EEE');
        $('#harness_status_pdv_re_update').val(data[33]).prop('disabled', true).css('background', '#EEE');

        $('#cc_remarks_1_re_update').val(data[34]);
        $('#cc_remarks_2_re_update').val(data[35]);
        $('#cc_id_no_re_update').val(data[36]);
        $('#cc_name_re_update').val(data[37]);

        $('#recrimp_remarks_re_update').val(data[38]);
        $('#recrimp_pd_id_no_re_update').val(data[39]);
        $('#recrimp_pd_name_re_update').val(data[40]);
        $('#recrimp_qa_id_no_re_update').val(data[41]);
        $('#recrimp_qa_name_re_update').val(data[42]);

        // defect unique id 
        $('#admin_defect_id_4').val(data[43]).prop('hidden', true);
        $('#update_defect_re_assy').modal('show');
    }

    const update_re_assy_record = () => {
        var reassy_id_no = document.getElementById('reassy_id_no_re_update').value;
        var reassy_name = document.getElementById('reassy_name_re_update').value;
        var reassy_remarks = document.getElementById('reassy_remarks_re_update').value;
        var reassy_date = document.getElementById('reassy_date_re_update').value;

        var pdv_defect_id = document.getElementById('admin_defect_id_4').value;

        $.ajax({
            url: '../../process/pd_verifier/re_assy_re_insert_pdv_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'update_re_assy_record',
                reassy_id_no: reassy_id_no,
                reassy_name: reassy_name,
                reassy_remarks: reassy_remarks,
                reassy_date: reassy_date,

                pdv_defect_id: pdv_defect_id
            },
            success: function (response) {
                if (response == 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Verified Successfully',
                        showConfirmButton: false,
                        timer: 1500
                    });

                    $('#reassy_id_no_re_update').val('');
                    $('#reassy_name_re_update').val('');
                    $('#reassy_remarks_re_update').val('');
                    $('#reassy_date_re_update').val('');
                    $('#admin_defect_id_4').val('');

                    load_defect_table_pdv_re(1);

                    $('#update_defect_re_assy').modal('hide');
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
</script>