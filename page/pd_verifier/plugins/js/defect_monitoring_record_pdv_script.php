<script type="text/javascript">
    $(document).ready(function () {
        var currentDate = new Date().toISOString().split('T')[0];
        $('#search_date_from_pdv').val(currentDate);
        $('#search_date_to_pdv').val(currentDate);

        fetch_opt_harness_status_pdv();
        // fetch_opt_line_no_pdv();
        load_defect_table_pdv(1);

        $('#search_harness_verification_pdv').val('Pending');

        $('input[name="harness_status_v"]').on('change', function () {
            $('#cc_id_no').val('');
            $('#cc_name').val('');
            $('#cc_remarks_1').val('');
            $('#cc_remarks_2').val('');
            $('#recrimp_pd_id_no').val('');
            $('#recrimp_pd_name').val('');
            $('#recrimp_qa_id_no').val('');
            $('#recrimp_qa_name').val('');
            $('#recrimp_remarks').val('');
            $('#reassyid_no').val('');
            $('#reassy_name').val('');
            $('#reassy_remarks').val('');
            $('#reassy_date').val('');
        });

        $('#cc_id_no').on('keypress', function (e) {
            if (e.which === 13) {
                get_cc_name();
            }
        });

        $('#recrimp_pd_id_no').on('keypress', function (e) {
            if (e.which === 13) {
                get_recrimp_pd_name();
            }
        });

        $('#recrimp_qa_id_no').on('keypress', function (e) {
            if (e.which === 13) {
                get_recrimp_qa_name();
            }
        });

        $('#reassy_id_no').on('keypress', function (e) {
            if (e.which === 13) {
                get_reassy_name();
            }
        });
    });

    const get_cc_name = () => {
        var cc_id_no = $('#cc_id_no').val();

        if (cc_id_no === 'N/A') {
            $('#cc_name').val('N/A');
            return;
        }

        if (cc_id_no === '') {
            $('#cc_name').val('');
            return;
        }

        $.ajax({
            url: '../../process/pd_verifier/defect_monitoring_record_pdv_get_p.php',
            type: 'GET',
            data: {
                method: 'get_cc_name',
                cc_id_no: cc_id_no
            },
            success: function (response) {
                var data = JSON.parse(response);
                $('#cc_name').val(data.full_name);
            },
            error: function (jqXHR, textStatus, errorThrown) {

            }
        });
    };

    const get_recrimp_pd_name = () => {
        var recrimp_pd_id_no = $('#recrimp_pd_id_no').val();

        if (recrimp_pd_id_no === 'N/A') {
            $('#recrimp_pd_name').val('N/A');
            return;
        }

        if (recrimp_pd_id_no === '') {
            $('#recrimp_pd_name').val('');
            return;
        }

        $.ajax({
            url: '../../process/pd_verifier/defect_monitoring_record_pdv_get_p.php',
            type: 'GET',
            data: {
                method: 'get_recrimp_pd_name',
                recrimp_pd_id_no: recrimp_pd_id_no
            },
            success: function (response) {
                var data = JSON.parse(response);
                $('#recrimp_pd_name').val(data.full_name);
            },
            error: function (jqXHR, textStatus, errorThrown) {

            }
        });
    };

    const get_recrimp_qa_name = () => {
        var recrimp_qa_id_no = $('#recrimp_qa_id_no').val();

        if (recrimp_qa_id_no === 'N/A') {
            $('#recrimp_qa_name').val('N/A');
            return;
        }

        if (recrimp_qa_id_no === '') {
            $('#recrimp_qa_name').val('');
            return;
        }

        $.ajax({
            url: '../../process/pd_verifier/defect_monitoring_record_pdv_get_p.php',
            type: 'GET',
            data: {
                method: 'get_recrimp_qa_name',
                recrimp_qa_id_no: recrimp_qa_id_no
            },
            success: function (response) {
                var data = JSON.parse(response);
                $('#recrimp_qa_name').val(data.full_name);
            },
            error: function (jqXHR, textStatus, errorThrown) {

            }
        });
    };

    const get_reassy_name = () => {
        var reassy_id_no = $('#reassy_id_no').val();

        if (reassy_id_no === 'N/A') {
            $('#reassy_name').val('N/A');
            return;
        }

        if (reassy_id_no === '') {
            $('#reassy_name').val('');
            return;
        }

        $.ajax({
            url: '../../process/pd_verifier/defect_monitoring_record_pdv_get_p.php',
            type: 'GET',
            data: {
                method: 'get_reassy_name',
                reassy_id_no: reassy_id_no
            },
            success: function (response) {
                var data = JSON.parse(response);
                $('#reassy_name').val(data.full_name);
            },
            error: function (jqXHR, textStatus, errorThrown) {

            }
        });
    };

    const fetch_opt_harness_status_pdv = () => {
        $.ajax({
            url: '../../process/pd_verifier/defect_monitoring_record_pdv_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_opt_harness_status_pdv',
            },
            success: function (response) {
                $('#search_harness_status_pdv').html(response);
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

    document.getElementById('search_qr_scan_pdv').addEventListener('keyup', function (e) {
        var qrCode = this.value;

        if (qrCode.length === 50) {
            const productNameField = document.getElementById('search_product_name_pdv');
            const lotNoField = document.getElementById('search_lot_no_pdv');
            const serialNoField = document.getElementById('search_serial_no_pdv');

            if (productNameField && lotNoField && serialNoField) {
                productNameField.value = qrCode.substring(10, 35);
                lotNoField.value = qrCode.substring(35, 41);
                serialNoField.value = qrCode.substring(41, 50);

                load_defect_table_pdv(1);
            } else {

            }

            this.value = '';
        }
    });

    document.getElementById("list_of_defect_pdv_res").addEventListener("scroll", function () {
        var scrollTop = document.getElementById("list_of_defect_pdv_res").scrollTop;
        var scrollHeight = document.getElementById("list_of_defect_pdv_res").scrollHeight;
        var offsetHeight = document.getElementById("list_of_defect_pdv_res").offsetHeight;

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
            load_defect_table_pdv(next_page);
        }
    }

    const count_defect_pdv = () => {
        var search_product_name_pdv = sessionStorage.getItem('search_product_name_pdv');
        var search_lot_no_pdv = sessionStorage.getItem('search_lot_no_pdv');
        var search_serial_no_pdv = sessionStorage.getItem('search_serial_no_pdv');
        var search_line_no_pdv = sessionStorage.getItem('search_line_no_pdv');
        var search_harness_status_pdv = sessionStorage.getItem('search_harness_status_pdv');
        var search_harness_verification_pdv = sessionStorage.getItem('search_harness_verification_pdv');
        var search_date_from_pdv = sessionStorage.getItem('search_date_from_pdv');
        var search_date_to_pdv = sessionStorage.getItem('search_date_to_pdv');

        $.ajax({
            url: '../../process/pd_verifier/defect_monitoring_record_pdv_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'count_defect_pdv_list',
                search_product_name_pdv: search_product_name_pdv,
                search_lot_no_pdv: search_lot_no_pdv,
                search_serial_no_pdv: search_serial_no_pdv,
                search_line_no_pdv: search_line_no_pdv,
                search_harness_status_pdv: search_harness_status_pdv,
                search_harness_verification_pdv: search_harness_verification_pdv,
                search_date_from_pdv: search_date_from_pdv,
                search_date_to_pdv: search_date_to_pdv,
            },
            success: function (response) {
                sessionStorage.setItem('count_rows', response);
                var count = `Total: ${response}`;
                $('#defect_pdv_table_info').html(count);

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
        var search_harness_verification_pdv = sessionStorage.getItem('search_harness_verification_pdv');
        var search_date_from_pdv = sessionStorage.getItem('search_date_from_pdv');
        var search_date_to_pdv = sessionStorage.getItem('search_date_to_pdv');

        var current_page = sessionStorage.getItem('defect_pdv_table_pagination');

        $.ajax({
            url: '../../process/pd_verifier/defect_monitoring_record_pdv_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'defect_pdv_list_last_page',
                search_product_name_pdv: search_product_name_pdv,
                search_lot_no_pdv: search_lot_no_pdv,
                search_serial_no_pdv: search_serial_no_pdv,
                search_line_no_pdv: search_line_no_pdv,
                search_harness_status_pdv: search_harness_status_pdv,
                search_harness_verification_pdv: search_harness_verification_pdv,
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

    const load_defect_table_pdv = current_page => {
        var search_product_name_pdv = document.getElementById("search_product_name_pdv").value;
        var search_lot_no_pdv = document.getElementById("search_lot_no_pdv").value;
        var search_serial_no_pdv = document.getElementById("search_serial_no_pdv").value;
        var search_line_no_pdv = document.getElementById("search_line_no_pdv").value;
        var search_harness_status_pdv = document.getElementById("search_harness_status_pdv").value;
        var search_harness_verification_pdv = document.getElementById("search_harness_verification_pdv").value;
        var search_date_from_pdv = document.getElementById("search_date_from_pdv").value;
        var search_date_to_pdv = document.getElementById("search_date_to_pdv").value;

        var search_product_name_pdv_1 = sessionStorage.getItem('search_product_name_pdv');
        var search_lot_no_pdv_1 = sessionStorage.getItem('search_lot_no_pdv');
        var search_serial_no_pdv_1 = sessionStorage.getItem('search_serial_no_pdv');
        var search_line_no_pdv_1 = sessionStorage.getItem('search_line_no_pdv');
        var search_harness_status_pdv_1 = sessionStorage.getItem('search_harness_status_pdv');
        var search_harness_verification_pdv_1 = sessionStorage.getItem('search_harness_verification_pdv');
        var search_date_from_pdv_1 = sessionStorage.getItem('search_date_from_pdv');
        var search_date_to_pdv_1 = sessionStorage.getItem('search_date_to_pdv');

        if (current_page > 1) {
            switch (true) {
                case search_product_name_pdv !== search_product_name_pdv_1:
                case search_lot_no_pdv !== search_lot_no_pdv_1:
                case search_serial_no_pdv !== search_serial_no_pdv_1:
                case search_line_no_pdv !== search_line_no_pdv_1:
                case search_harness_status_pdv !== search_harness_status_pdv_1:
                case search_harness_verification_pdv !== search_harness_verification_pdv_1:
                case search_date_from_pdv !== search_date_from_pdv_1:
                case search_date_to_pdv !== search_date_to_pdv_1:
                    search_product_name_pdv = search_product_name_pdv_1;
                    search_lot_no_pdv = search_lot_no_pdv_1;
                    search_serial_no_pdv = search_serial_no_pdv_1;
                    search_line_no_pdv = search_line_no_pdv_1;
                    search_harness_status_pdv = search_harness_status_pdv_1;
                    search_harness_verification_pdv = search_harness_verification_pdv_1;
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
            sessionStorage.setItem('search_harness_verification_pdv', search_harness_verification_pdv);
            sessionStorage.setItem('search_date_from_pdv', search_date_from_pdv);
            sessionStorage.setItem('search_date_to_pdv', search_date_to_pdv);
        }

        $.ajax({
            url: '../../process/pd_verifier/defect_monitoring_record_pdv_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'load_defect_table_pdv',
                search_product_name_pdv: search_product_name_pdv,
                search_lot_no_pdv: search_lot_no_pdv,
                search_serial_no_pdv: search_serial_no_pdv,
                search_line_no_pdv: search_line_no_pdv,
                search_harness_status_pdv: search_harness_status_pdv,
                search_harness_verification_pdv: search_harness_verification_pdv,
                search_date_from_pdv: search_date_from_pdv,
                search_date_to_pdv: search_date_to_pdv,
                current_page: current_page
            },
            beforeSend: () => {
                var loading = `<tr id="loading"><td colspan="6" style="text-align:center;"><div class="spinner-border text-dark role="status"><span class="sr-only">Loading...</span></div></td></tr>`;
                if (current_page == 1) {
                    document.getElementById("list_of_defect_record_pdv").innerHTML = loading;
                } else {
                    $('#defect_pdv_table tbody').append(loading);
                }
            },
            success: function (response) {
                $('#loading').remove();
                if (current_page == 1) {
                    $('#defect_pdv_table tbody').html(response);
                } else {
                    $('#defect_pdv_table tbody').append(response);
                }
                sessionStorage.setItem('defect_pdv_table_pagination', current_page);
                count_defect_pdv();
            }
        });
    }

    function get_update_defect_pdv(dataString) {
        const data = dataString.split('~!~');

        $('#update_defect_mancost_pdv_id').val(data[0]).prop('hidden', true);

        $('#car_maker_pdv_update').val(data[1]).prop('disabled', true).css('background', '#EEE');
        $('#line_no_pdv_update').val(data[2]).prop('disabled', true).css('background', '#EEE');
        $('#line_category_pdv_update').val(data[3]).prop('disabled', true).css('background', '#EEE');
        $('#date_detected_pdv_update').val(data[4]).prop('disabled', true).css('background', '#EEE');
        $('#issue_tag_pdv_update').val(data[5]).prop('disabled', true).css('background', '#EEE');
        $('#repairing_date_pdv_update').val(data[6]).prop('disabled', true).css('background', '#EEE');
        $('#product_name_pdv_update').val(data[7]).prop('disabled', true).css('background', '#EEE');
        $('#lot_no_pdv_update').val(data[8]).prop('disabled', true).css('background', '#EEE');
        $('#serial_no_pdv_update').val(data[9]).prop('disabled', true).css('background', '#EEE');
        $('#discovery_process_pdv_update').val(data[10]).prop('disabled', true).css('background', '#EEE');
        $('#discovery_id_no_pdv_update').val(data[11]).prop('disabled', true).css('background', '#EEE');
        $('#discovery_person_pdv_update').val(data[12]).prop('disabled', true).css('background', '#EEE');
        $('#occurrence_process_pdv_dr_update').val(data[13]).prop('disabled', true).css('background', '#EEE');
        $('#occurrence_shift_pdv_update').val(data[14]).prop('disabled', true).css('background', '#EEE');
        $('#occurrence_id_no_pdv_update').val(data[15]).prop('disabled', true).css('background', '#EEE');
        $('#occurrence_person_pdv_update').val(data[16]).prop('disabled', true).css('background', '#EEE');
        $('#outflow_process_pdv_update').val(data[17]).prop('disabled', true).css('background', '#EEE');
        $('#outflow_shift_pdv_update').val(data[18]).prop('disabled', true).css('background', '#EEE');
        $('#outflow_id_no_pdv_update').val(data[19]).prop('disabled', true).css('background', '#EEE');
        $('#outflow_person_pdv_update').val(data[20]).prop('disabled', true).css('background', '#EEE');
        $('#defect_category_pdv_dr_update').val(data[21]).prop('disabled', true).css('background', '#EEE');
        $('#sequence_no_pdv_update').val(data[22]).prop('disabled', true).css('background', '#EEE');
        $('#assy_board_no_pdv_update').val(data[23]).prop('disabled', true).css('background', '#EEE');
        $('#defect_cause_pdv_update').val(data[24]).prop('disabled', true).css('background', '#EEE');
        $('#good_measurement_pdv_update').val(data[25]).prop('disabled', true).css('background', '#EEE');
        $('#ng_measurement_pdv_update').val(data[26]).prop('disabled', true).css('background', '#EEE');
        $('#wire_type_pdv_update').val(data[27]).prop('disabled', true).css('background', '#EEE');
        $('#wire_size_pdv_update').val(data[28]).prop('disabled', true).css('background', '#EEE');
        $('#connector_cavity_pdv_update').val(data[29]).prop('disabled', true).css('background', '#EEE');
        $('#repair_person_pdv_update').val(data[30]).prop('disabled', true).css('background', '#EEE');
        $('#detail_content_defect_pdv_update').val(data[31]).prop('disabled', true).css('background', '#EEE');
        $('#treatment_content_defect_pdv_update').val(data[32]).prop('disabled', true).css('background', '#EEE');
        $('#harness_status_pdv_update').val(data[33]).prop('disabled', true).css('background', '#EEE');


        // $('#remarks_pdv_update').val(data[34]);
        // $('#verifier_id_no_pdv_update').val(data[35]);
        // $('#verifier_name_pdv_update').val(data[36]).prop('disabled', true).css('background', '#EEE');

        $('#recrimp_remarks').val(data[34]);
        $('#recrimp_pd_id_no').val(data[35]);
        $('#recrimp_pd_name').val(data[36]);
        $('#recrimp_qa_id_no').val(data[37]);
        $('#recrimp_qa_name').val(data[38]);

        $('#cc_remarks_1').val(data[39]);
        $('#cc_remakrs_2').val(data[40]);
        $('#cc_id_no').val(data[41]);
        $('#cc_name').val(data[42]);

        $('#reassy_remarks').val(data[43]);
        $('#reassy_id_no').val(data[44]);
        $('#reassy_name').val(data[45]);
        $('#reassy_date').val(data[46]);


        // defect unique id 
        $('#admin_defect_id_3').val(data[47]).prop('hidden', true);
        $('#update_defect_pdv').modal('show');
    }

    const update_pdv_record = () => {
        // var id = document.getElementById('update_defect_mancost_pdv_id').value;

        // var pdv_remarks = document.getElementById('remarks_pdv_update').value;
        // var pdv_id_no = document.getElementById('verifier_id_no_pdv_update').value;
        // var pdv_name = document.getElementById('verifier_name_pdv_update').value;

        var cc_id_no = document.getElementById('cc_id_no').value;
        var cc_name = document.getElementById('cc_name').value;
        var cc_remarks_1 = document.getElementById('cc_remarks_1').value;
        var cc_remarks_2 = document.getElementById('cc_remarks_2').value;

        var recrimp_pd_id_no = document.getElementById('recrimp_pd_id_no').value;
        var recrimp_pd_name = document.getElementById('recrimp_pd_name').value;
        var recrimp_qa_id_no = document.getElementById('recrimp_qa_id_no').value;
        var recrimp_qa_name = document.getElementById('recrimp_qa_name').value;
        var recrimp_remarks = document.getElementById('recrimp_remarks').value;

        var reassy_id_no = document.getElementById('reassy_id_no').value;
        var reassy_name = document.getElementById('reassy_name').value;
        var reassy_remarks = document.getElementById('reassy_remarks').value;
        var reassy_date = document.getElementById('reassy_date').value;

        var pdv_defect_id = document.getElementById('admin_defect_id_3').value;

        $.ajax({
            url: '../../process/pd_verifier/defect_monitoring_record_pdv_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'update_pdv_record',
                // id: id,
                // pdv_remarks: pdv_remarks,
                // pdv_id_no: pdv_id_no,
                // pdv_name: pdv_name,

                cc_id_no:cc_id_no,
                cc_name:cc_name,
                cc_remarks_1:cc_remarks_1,
                cc_remarks_2:cc_remarks_2,
                recrimp_pd_id_no: recrimp_pd_id_no,
                recrimp_pd_name: recrimp_pd_name,
                recrimp_qa_id_no: recrimp_qa_id_no,
                recrimp_qa_name: recrimp_qa_name,
                recrimp_remarks: recrimp_remarks,
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

                    // $('#update_defect_mancost_pdv_id').val('');
                    // $('#remarks_pdv_update').val('');
                    // $('#verifier_id_no_pdv_update').val('');
                    // $('#verifier_name_pdv_update').val('');

                    $('#cc_id_no').val('');
                    $('#cc_name').val('');
                    $('#cc_remarks_1').val('');
                    $('#cc_remarks_2').val('');
                    $('#recrimp_pd_id_no').val('');
                    $('#recrimp_pd_name').val('');
                    $('#recrimp_qa_id_no').val('');
                    $('#recrimp_qa_name').val('');
                    $('#recrimp_remarks').val('');
                    $('#reassy_id_no').val('');
                    $('#reassy_name').val('');
                    $('#reassy_remarks').val('');
                    $('#reassy_date').val('');
                    $('#admin_defect_id_3').val('');

                    // load_defect_table_pdv(id + '~!~' + pdv_defect_id);
                    load_defect_table_pdv(1);

                    $('#update_defect_pdv').modal('hide');
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

    const clear_search_input_pdv = () => {
        document.getElementById("search_qr_scan_pdv").value = '';
        document.getElementById("search_product_name_pdv").value = '';
        document.getElementById("search_lot_no_pdv").value = '';
        document.getElementById("search_serial_no_pdv").value = '';
        document.getElementById("search_line_no_pdv").value = '';
        document.getElementById("search_harness_status_pdv").value = '';

        load_defect_table_pdv(1);
    }

    document.addEventListener('DOMContentLoaded', function () {
        const counterpart_checking_radio = document.getElementById('counterpart_checking_radio');
        const recrimp_radio = document.getElementById('recrimp_radio');
        const reassy_radio = document.getElementById('reassy_radio');

        const counter_part_checking_fields = document.getElementById('counterpart_checking_fields');
        const recrimp_fields = document.getElementById('recrimp_fields');
        const recrimp_2_fields = document.getElementById('recrimp_2_fields');
        const reassy_fields = document.getElementById('reassy_fields');

        function toggleFields() {
            if (counterpart_checking_radio.checked) {
                counter_part_checking_fields.style.display = 'flex';
            } else {
                counter_part_checking_fields.style.display = 'none';
            }

            if (recrimp_radio.checked) {
                recrimp_fields.style.display = 'flex';
                recrimp_2_fields.style.display = 'flex';
            } else {
                recrimp_fields.style.display = 'none';
                recrimp_2_fields.style.display = 'none';
            }

            if (reassy_radio.checked) {
                reassy_fields.style.display = 'flex';
            } else {
                reassy_fields.style.display = 'none';
            }
        }

        counterpart_checking_radio.addEventListener('change', toggleFields);
        recrimp_radio.addEventListener('change', toggleFields);
        reassy_radio.addEventListener('change', toggleFields);
    });


</script>