<script type="text/javascript">
    $(document).ready(function () {
        var currentDate = new Date().toISOString().split('T')[0];
        $('#search_date_from_pdv_re').val(currentDate);
        $('#search_date_to_pdv_re').val(currentDate);

        fetch_opt_harness_status_pdv();
        // fetch_opt_line_no_pdv();
        load_defect_table_pdv_re(1);

        fetch_and_update_count_for_cc_re_crimp();
        fetch_and_update_count_for_reassy();
        fetch_and_update_count_for_veri();

        $('#cc_id_no_re_cc_update').on('keypress', function (e) {
            if (e.which === 13) {
                get_cc_name();
            }
        });

        $('#recrimp_pd_id_no_re_cc_update').on('keypress', function (e) {
            if (e.which === 13) {
                get_recrimp_pd_name();
            }
        });

        $('#recrimp_qa_id_no_re_cc_update').on('keypress', function (e) {
            if (e.which === 13) {
                get_recrimp_qa_name();
            }
        });

        fetch_opt_line_no_qa();
        fetch_opt_record_type_qa();
        fetch_opt_category_qa();
        fetch_opt_discovery_process_qa();
        fetch_opt_occurrence_process_qa();
        fetch_opt_outflow_process_qa();
        fetch_opt_defect_category_qa();
        fetch_opt_defect_cause_qa();
        fetch_opt_occurrence_shift_qa();
        fetch_opt_outflow_shift_qa();

        // Set default value of date_detected_qa to current date
        const current_date = new Date().toISOString().slice(0, 10);

        // fetch discovery person
        $('#discovery_id_no_qa').on('keypress', function (e) {
            if (e.which === 13) {
                get_discovery_person();
            }
        });

        $('#discovery_id_no_qa').on('input', function () {
            if ($(this).val() === '') {
                $('#discovery_person_qa').val('');
            }
        });

        // fetch occurrence person
        $('#occurrence_id_no_qa').on('keypress', function (e) {
            if (e.which === 13) {
                get_occurrence_person();
            }
        });

        $('#occurrence_id_no_qa').on('input', function () {
            if ($(this).val() === '') {
                $('#occurrence_person_qa').val('');
            }
        });

        // fetch outflow person
        $('#outflow_id_no_qa').on('keypress', function (e) {
            if (e.which === 13) {
                get_outflow_person();
            }
        });

        $('#outflow_id_no_qa').on('input', function () {
            if ($(this).val() === '') {
                $('#outflow_person_qa').val('');
            }
        });

        // Disable all input fields by default
        $("#line_no_qa, #line_category_qa, #date_detected_qa, #issue_tag_qa, #repairing_date_qa, #car_maker_qa, #qr_scan_qa, #product_name_qa, #lot_no_qa, #serial_no_qa, #discovery_process_qa, #discovery_id_no_qa, #discovery_person_qa, #occurrence_process_qa, #occurrence_shift_qa, #occurrence_id_no_qa, #occurrence_person_qa, #outflow_process_qa, #outflow_shift_qa, #outflow_id_no_qa, #outflow_person_qa, #defect_category_qa, #sequence_no_qa, #assy_board_no_qa, #defect_cause_qa, #repair_person_qa, #good_measurement_qa, #ng_measurement_qa, #wire_type_qa, #wire_size_qa, #connector_cavity_qa, #detail_content_defect_qa, #treatment_content_defect_qa, #harness_status_qa").prop('disabled', true).css('background-color', '#DDD');

        $("input[name='record_type_qa']").change(function () {
            if ($(this).val() === "Mancost Only") {
                //    not applicable
            }
            else if ($(this).val() === "Defect Only") {
                $("#line_no_qa").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#line_category_qa").prop('disabled', false).val('Mass Pro').css('background-color', '#FFF');
                $("#date_detected_qa").prop('disabled', false).val(current_date).css('background-color', '#FFF');
                $("#issue_tag_qa").prop('disabled', false).val('').css('background-color', '#F1F1F1');
                $("#repairing_date_qa").prop('disabled', true).val('').css('background-color', '#D3D3D3');
                $("#car_maker_qa").prop('disabled', true).val('').css('background-color', '#F1F1F1');
                $("#qr_scan_qa").prop('disabled', true).val('').css('background-color', '#FFF');
                $("#product_name_qa").prop('disabled', false).val('').css('background-color', '#F1F1F1');
                $("#lot_no_qa").prop('disabled', false).val('').css('background-color', '#F1F1F1');
                $("#serial_no_qa").prop('disabled', false).val('').css('background-color', '#F1F1F1');
                $("#discovery_process_qa").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#discovery_id_no_qa").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#discovery_person_qa").prop('disabled', false).val('').css('background-color', '#F1F1F1');
                $("#occurrence_process_qa").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#occurrence_shift_qa").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#occurrence_id_no_qa").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#occurrence_person_qa").prop('disabled', false).val('').css('background-color', '#F1F1F1');
                $("#outflow_process_qa").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#outflow_shift_qa").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#outflow_id_no_qa").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#outflow_person_qa").prop('disabled', false).val('').css('background-color', '#F1F1F1');
                $("#defect_category_qa").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#sequence_no_qa").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#assy_board_no_qa").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#defect_cause_qa").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#repair_person_qa").prop('disabled', true).val('N/A').css('background-color', '#D3D3D3');
                $("#good_measurement_qa").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#ng_measurement_qa").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#wire_type_qa").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#wire_size_qa").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#connector_cavity_qa").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#detail_content_defect_qa").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#treatment_content_defect_qa").prop('disabled', true).val('N/A').css('background-color', '#D3D3D3');
                $("#harness_status_qa").prop('disabled', true).val('N/A').css('background-color', '#D3D3D3');
            }
            else if ($(this).val() === "Defect $ Mancost") {
                $("#line_no_qa").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#line_category_qa").prop('disabled', false).val('Mass Pro').css('background-color', '#FFF');
                $("#date_detected_qa").prop('disabled', false).val(current_date).css('background-color', '#FFF');
                $("#issue_tag_qa").prop('disabled', false).val('').css('background-color', '#F1F1F1');
                $("#repairing_date_qa").prop('disabled', true).val('').css('background-color', '#D3D3D3');
                $("#car_maker_qa").prop('disabled', true).val('').css('background-color', '#F1F1F1');
                $("#qr_scan_qa").prop('disabled', true).val('').css('background-color', '#FFF');
                $("#product_name_qa").prop('disabled', false).val('').css('background-color', '#F1F1F1');
                $("#lot_no_qa").prop('disabled', false).val('').css('background-color', '#F1F1F1');
                $("#serial_no_qa").prop('disabled', false).val('').css('background-color', '#F1F1F1');
                $("#discovery_process_qa").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#discovery_id_no_qa").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#discovery_person_qa").prop('disabled', false).val('').css('background-color', '#F1F1F1');
                $("#occurrence_process_qa").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#occurrence_shift_qa").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#occurrence_id_no_qa").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#occurrence_person_qa").prop('disabled', false).val('').css('background-color', '#F1F1F1');
                $("#outflow_process_qa").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#outflow_shift_qa").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#outflow_id_no_qa").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#outflow_person_qa").prop('disabled', false).val('').css('background-color', '#F1F1F1');
                $("#defect_category_qa").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#sequence_no_qa").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#assy_board_no_qa").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#defect_cause_qa").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#repair_person_qa").prop('disabled', true).val('N/A').css('background-color', '#D3D3D3');
                $("#good_measurement_qa").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#ng_measurement_qa").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#wire_type_qa").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#wire_size_qa").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#connector_cavity_qa").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#detail_content_defect_qa").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#treatment_content_defect_qa").prop('disabled', true).val('N/A').css('background-color', '#D3D3D3');
                $("#harness_status_qa").prop('disabled', true).val('N/A').css('background-color', '#D3D3D3');
            }
            else {
                $("#line_no_qa").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#line_category_qa").prop('disabled', false).val('Mass Pro').css('background-color', '#FFF');
                $("#date_detected_qa").prop('disabled', false).val(current_date).css('background-color', '#FFF');
                $("#issue_tag_qa").prop('disabled', false).val('').css('background-color', '#F1F1F1');
                $("#repairing_date_qa").prop('disabled', true).val('').css('background-color', '#D3D3D3');
                $("#car_maker_qa").prop('disabled', true).val('').css('background-color', '#F1F1F1');
                $("#qr_scan_qa").prop('disabled', true).val('').css('background-color', '#FFF');
                $("#product_name_qa").prop('disabled', false).val('').css('background-color', '#F1F1F1');
                $("#lot_no_qa").prop('disabled', false).val('').css('background-color', '#F1F1F1');
                $("#serial_no_qa").prop('disabled', false).val('').css('background-color', '#F1F1F1');
                $("#discovery_process_qa").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#discovery_id_no_qa").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#discovery_person_qa").prop('disabled', false).val('').css('background-color', '#F1F1F1');
                $("#occurrence_process_qa").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#occurrence_shift_qa").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#occurrence_id_no_qa").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#occurrence_person_qa").prop('disabled', false).val('').css('background-color', '#F1F1F1');
                $("#outflow_process_qa").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#outflow_shift_qa").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#outflow_id_no_qa").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#outflow_person_qa").prop('disabled', false).val('').css('background-color', '#F1F1F1');
                $("#defect_category_qa").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#sequence_no_qa").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#assy_board_no_qa").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#defect_cause_qa").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#repair_person_qa").prop('disabled', true).val('N/A').css('background-color', '#D3D3D3');
                $("#good_measurement_qa").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#ng_measurement_qa").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#wire_type_qa").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#wire_size_qa").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#connector_cavity_qa").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#detail_content_defect_qa").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#treatment_content_defect_qa").prop('disabled', true).val('N/A').css('background-color', '#D3D3D3');
                $("#harness_status_qa").prop('disabled', true).val('N/A').css('background-color', '#D3D3D3');
            }
        });

        fetch_opt_car_maker_insp();

        $('#search_car_maker_pdv_re').change(function () {
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
                        $('#search_car_model_pdv_re').html(response).prop('disabled', false);
                        $('#search_qr_scan_pdv_re').val('').prop('disabled', true);
                    }
                });
            } else {
                $('#search_car_model_pdv_re').html('<option></option>').prop('disabled', true);
                $('#search_qr_scan_pdv_re').prop('disabled', false);
            }
        });

        $('#search_car_model_pdv_re').change(function () {
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
                            $('#search_qr_scan_pdv_re').prop('disabled', false);
                        } else {
                            $('#search_qr_scan_pdv_re').prop('disabled', true);
                        }
                    }
                });
            } else {
                $('#search_qr_scan_pdv_re').prop('disabled', false);
            }
        });

        handleSearchQrScan();
    });

    function handleSearchQrScan() {
        document.getElementById('search_qr_scan_pdv_re').addEventListener('keyup', function (e) {
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

                        document.getElementById('search_product_name_pdv_re').value = productName;
                        document.getElementById('search_lot_no_pdv_re').value = lotNo;
                        document.getElementById('search_serial_no_pdv_re').value = serialNo;

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
                $('#search_car_maker_pdv_re').html(response);
            }
        });
    }

    const get_cc_name = () => {
        var cc_id_no = $('#cc_id_no_re_cc_update').val();

        if (cc_id_no === 'N/A') {
            $('#cc_name_re_cc_update').val('N/A');
            return;
        }

        if (cc_id_no === '') {
            $('#cc_name_re_cc_update').val('');
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
                $('#cc_name_re_cc_update').val(data.full_name);
            },
            error: function (jqXHR, textStatus, errorThrown) {

            }
        });
    };

    const get_recrimp_pd_name = () => {
        var recrimp_pd_id_no = $('#recrimp_pd_id_no_re_cc_update').val();

        if (recrimp_pd_id_no === 'N/A') {
            $('#recrimp_pd_name_re_cc_update').val('N/A');
            return;
        }

        if (recrimp_pd_id_no === '') {
            $('#recrimp_pd_name_re_cc_update').val('');
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
                $('#recrimp_pd_name_re_cc_update').val(data.full_name);
            },
            error: function (jqXHR, textStatus, errorThrown) {

            }
        });
    };

    const get_recrimp_qa_name = () => {
        var recrimp_qa_id_no = $('#recrimp_qa_id_no_re_cc_update').val();

        if (recrimp_qa_id_no === 'N/A') {
            $('#recrimp_qa_name_re_cc_update').val('N/A');
            return;
        }

        if (recrimp_qa_id_no === '') {
            $('#recrimp_qa_name_re_cc_update').val('');
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
                $('#recrimp_qa_name_re_cc_update').val(data.full_name);
            },
            error: function (jqXHR, textStatus, errorThrown) {

            }
        });
    };

    function update_display_badge_count_3(new_count) {
        var badge = document.querySelector('#for_cc_recrimp_badge');
        if (badge) {
            badge.textContent = new_count;
        }
    }

    function fetch_and_update_count_for_cc_re_crimp() {
        $.ajax({
            url: '../../process/pd_verifier/cc_re_crimp_pdv_p.php',
            type: 'POST',
            data: { method: 'update_badge_count_for_cc_re_crimp' },
            dataType: 'json',
            success: function (response) {
                if (response.count !== undefined) {
                    update_display_badge_count_3(response.count);
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

    function update_display_badge_count_2(new_count) {
        var badge = document.querySelector('#for_reassy_badge');
        if (badge) {
            badge.textContent = new_count;
        }
    }

    function fetch_and_update_count_for_reassy() {
        $.ajax({
            url: '../../process/pd_verifier/re_assy_re_insert_pdv_p.php',
            type: 'POST',
            data: { method: 'update_badge_count_for_reassy' },
            dataType: 'json',
            success: function (response) {
                if (response.count !== undefined) {
                    update_display_badge_count_2(response.count);
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

    function update_display_badge_count_1(new_count) {
        var badge = document.querySelector('#for_veri_badge');
        if (badge) {
            badge.textContent = new_count;
        }
    }

    function fetch_and_update_count_for_veri() {
        $.ajax({
            url: '../../process/pd_verifier/defect_monitoring_record_pdv_p.php',
            type: 'POST',
            data: { method: 'update_badge_count_for_veri' },
            dataType: 'json',
            success: function (response) {
                if (response.count !== undefined) {
                    update_display_badge_count_1(response.count);
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

    document.getElementById('line_no_qa').addEventListener('input', function () {
        this.value = this.value.replace(/\D/g, '');

        if (this.value.length > 4) {
            this.value = this.value.slice(0, 4);
        }
    });

    const get_discovery_person = () => {
        var discovery_id_no = $('#discovery_id_no_qa').val();

        if (discovery_id_no === 'N/A') {
            $('#discovery_person_qa').val('N/A');
            return;
        }

        if (discovery_id_no === '') {
            $('#discovery_person_qa').val('');
            return;
        }

        $.ajax({
            url: '../../process/inspector/defect_monitoring_record_inspector_get_p.php',
            type: 'GET',
            data: {
                method: 'get_discovery_person',
                discovery_id_no: discovery_id_no
            },
            success: function (response) {
                var data = JSON.parse(response);
                $('#discovery_person_qa').val(data.full_name);
            },
            error: function (jqXHR, textStatus, errorThrown) {

            }
        });
    };

    const get_occurrence_person = () => {
        var occurrence_id_no = $('#occurrence_id_no_qa').val();

        if (occurrence_id_no === 'N/A') {
            $('#occurrence_person_qa').val('N/A');
            return;
        }

        if (occurrence_id_no === '') {
            $('#occurrence_person_qa').val('');
            return;
        }

        $.ajax({
            url: '../../process/inspector/defect_monitoring_record_inspector_get_p.php',
            type: 'GET',
            data: {
                method: 'get_occurrence_person',
                occurrence_id_no: occurrence_id_no
            },
            success: function (response) {
                var data = JSON.parse(response);
                $('#occurrence_person_qa').val(data.full_name);
            },
            error: function (jqXHR, textStatus, errorThrown) {

            }
        });
    };

    const get_outflow_person = () => {
        var outflow_id_no = $('#outflow_id_no_qa').val();

        if (outflow_id_no === 'N/A') {
            $('#outflow_person_qa').val('N/A');
            return;
        }

        if (outflow_id_no === '') {
            $('#outflow_person_qa').val('');
            return;
        }

        $.ajax({
            url: '../../process/inspector/defect_monitoring_record_inspector_get_p.php',
            type: 'GET',
            data: {
                method: 'get_outflow_person',
                outflow_id_no: outflow_id_no
            },
            success: function (response) {
                var data = JSON.parse(response);
                $('#outflow_person_qa').val(data.full_name);
            },
            error: function (jqXHR, textStatus, errorThrown) {

            }
        });
    };

    const fetch_opt_line_no_qa = () => {
        $.ajax({
            url: '../../process/pd_verifier/new_defect_record_pdv_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_opt_line_no_qa',
            },
            success: function (response) {
                $('#line_no_qa').html(response);
            }
        });
    }

    const fetch_opt_record_type_qa = () => {
        $.ajax({
            url: '../../process/pd_verifier/new_defect_record_pdv_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_opt_record_type_qa',
            },
            success: function (response) {
                $('#search_record_type_new').html(response);
            }
        });
    }

    const fetch_opt_category_qa = () => {
        $.ajax({
            url: '../../process/pd_verifier/new_defect_record_pdv_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_opt_category_qa',
            },
            success: function (response) {
                $('#line_category_qa').html(response);
                // $('#line_category_qa').val('Mass Pro');
            }
        });
    }

    const fetch_opt_discovery_process_qa = () => {
        $.ajax({
            url: '../../process/pd_verifier/new_defect_record_pdv_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_opt_discovery_process_qa',
            },
            success: function (response) {
                $('#discovery_process_qa').html(response);
            }
        });
    }

    const fetch_opt_occurrence_process_qa = () => {
        $.ajax({
            url: '../../process/pd_verifier/new_defect_record_pdv_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_opt_occurrence_process_qa',
            },
            success: function (response) {
                $('#occurrence_process_qa').html(response);
            }
        });
    }

    const fetch_opt_outflow_process_qa = () => {
        $.ajax({
            url: '../../process/pd_verifier/new_defect_record_pdv_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_opt_outflow_process_qa',
            },
            success: function (response) {
                $('#outflow_process_qa').html(response);
            }
        });
    }

    const fetch_opt_defect_category_qa = () => {
        $.ajax({
            url: '../../process/pd_verifier/new_defect_record_pdv_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_opt_defect_category_qa',
            },
            success: function (response) {
                $('#defect_category_qa').html(response);
            }
        });
    }

    const fetch_opt_occurrence_shift_qa = () => {
        $.ajax({
            url: '../../process/pd_verifier/new_defect_record_pdv_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_opt_occurrence_shift_qa',
            },
            success: function (response) {
                $('#occurrence_shift_qa').html(response);
            }
        });
    }

    const fetch_opt_outflow_shift_qa = () => {
        $.ajax({
            url: '../../process/pd_verifier/new_defect_record_pdv_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_opt_outflow_shift_qa',
            },
            success: function (response) {
                $('#outflow_shift_qa').html(response);
            }
        });
    }

    const fetch_opt_defect_cause_qa = () => {
        $.ajax({
            url: '../../process/pd_verifier/new_defect_record_pdv_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_opt_defect_cause_qa',
            },
            success: function (response) {
                $('#defect_cause_qa').html(response);
            }
        });
    }

    $(document).on('input', '#line_no_qa', function () {
        update_issue_tag_qa(this.value);
    });

    $(document).on('input', '#car_maker_qa', function () {
        handleCarMakerChange(this);
    });

    function handleCarMakerChange(selectOpt) {
        var carMaker = selectOpt.value;
        switch (carMaker) {
            case 'Honda':
                document.getElementById('qr_scan_qa').disabled = false;
                handleHondaScan();
                break;
            case 'Mazda':
                document.getElementById('qr_scan_qa').disabled = false;
                handleMazdaScan();
                break;
            case 'Nissan':
                document.getElementById('qr_scan_qa').disabled = false;
                handleNissanScan();
                break;
            case 'Subaru':
                document.getElementById('qr_scan_qa').disabled = false;
                handleSubaruScan();
                break;
            case 'Suzuki':
                document.getElementById('qr_scan_qa').disabled = false;
                handleSuzukiScan();
                break;
            case 'Toyota':
                document.getElementById('qr_scan_qa').disabled = false;
                handleToyotaScan();
                break;
            case 'Daihatsu':
                document.getElementById('qr_scan_qa').disabled = false;
                handleDaihatsuScan();
                break;
            default:
                document.getElementById('qr_scan_qa').disabled = true;
                break;
        }
    }

    function handleSuzukiScan() {
        document.getElementById('qr_scan_qa').addEventListener('keyup', function (e) {
            if (e.which === 13) {
                e.preventDefault();
                var qrCode = this.value;
                if (qrCode.length === 50) {
                    document.getElementById('product_name_qa').value = qrCode.substring(10, 35);
                    document.getElementById('lot_no_qa').value = qrCode.substring(35, 41);
                    document.getElementById('serial_no_qa').value = qrCode.substring(41, 50);

                    this.value = '';
                }
                else {

                }
            }
        });
    }

    function handleMazdaScan() {
        document.getElementById('qr_scan_qa').addEventListener('keyup', function (e) {
            if (e.which === 13) {
                e.preventDefault();
                var qrCode = this.value;
                if (qrCode.length === 50) {
                    document.getElementById('product_name_qa').value = qrCode.substring(10, 35);
                    document.getElementById('lot_no_qa').value = qrCode.substring(35, 41);
                    document.getElementById('serial_no_qa').value = qrCode.substring(41, 50);

                    this.value = '';
                }
                else {

                }
            }
        });
    }

    function handleDaihatsuScan() {
        document.getElementById('qr_scan_qa').addEventListener('keyup', function (e) {
            if (e.which === 13) {
                e.preventDefault();
                var qrCode = this.value;
                if (qrCode.length === 50) {
                    document.getElementById('product_name_qa').value = qrCode.substring(10, 35);
                    document.getElementById('lot_no_qa').value = qrCode.substring(35, 41);
                    document.getElementById('serial_no_qa').value = qrCode.substring(41, 50);

                    this.value = '';
                }
                else {

                }
            }
        });
    }

    function handleHondaScan() {
        document.getElementById('qr_scan_qa').addEventListener('keyup', function (e) {
            if (e.which === 13) {
                e.preventDefault();
                var qrCode = this.value;
                if (qrCode.length === 50) {
                    document.getElementById('product_name_qa').value = qrCode.substring(10, 35);
                    document.getElementById('lot_no_qa').value = qrCode.substring(35, 41);
                    document.getElementById('serial_no_qa').value = qrCode.substring(41, 50);

                    this.value = '';
                }
                else {

                }
            }
        });
    }

    function handleNissanScan() {
        document.getElementById('qr_scan_qa').addEventListener('keyup', function (e) {
            if (e.which === 13) {
                e.preventDefault();
                var qrCode = this.value;
                if (qrCode.length === 50) {
                    document.getElementById('product_name_qa').value = qrCode.substring(10, 35);
                    document.getElementById('lot_no_qa').value = qrCode.substring(35, 41);
                    document.getElementById('serial_no_qa').value = qrCode.substring(41, 50);

                    this.value = '';
                }
                else {

                }
            }
        });
    }

    function handleSubaruScan() {
        document.getElementById('qr_scan_qa').addEventListener('keyup', function (e) {
            if (e.which === 13) {
                e.preventDefault();
                var qrCode = this.value;
                if (qrCode.length === 50) {
                    document.getElementById('product_name_qa').value = qrCode.substring(10, 35);
                    document.getElementById('lot_no_qa').value = qrCode.substring(35, 41);
                    document.getElementById('serial_no_qa').value = qrCode.substring(41, 50);

                    this.value = '';
                }
                else {

                }
            }
        });
    }

    function handleToyotaScan() {
        document.getElementById('qr_scan_qa').addEventListener('keyup', function (e) {
            if (e.which === 13) {
                e.preventDefault();
                var qrCode = this.value;
                if (qrCode.length === 50) {
                    document.getElementById('product_name_qa').value = qrCode.substring(10, 35);
                    document.getElementById('lot_no_qa').value = qrCode.substring(35, 41);
                    document.getElementById('serial_no_qa').value = qrCode.substring(41, 50);

                    this.value = '';
                }
                else {

                }
            }
        });
    }

    function handle_line_no_change(line_no_qa) {
        var record_type_qa = $('input[name="record_type_qa"]:checked').val();

        if (record_type_qa !== "Mancost Only") {
            update_car_maker_qa(line_no_qa);
            update_issue_tag_qa(line_no_qa, record_type_qa);
        } else {
            var car_maker_input = document.getElementById("car_maker_qa");
            var issue_tag_input = document.getElementById("issue_tag_qa");
            car_maker_input.value = 'N/A';
            issue_tag_input.value = 'N/A';
        }
    }

    function update_car_maker_qa(line_no) {
        var car_maker_input = document.getElementById("car_maker_qa");

        if (line_no.trim().startsWith('1')) {
            car_maker_input.value = 'Mazda';
            handleCarMakerChange(car_maker_input);
        } else if (line_no.trim().startsWith('2')) {
            car_maker_input.value = 'Daihatsu';
            handleCarMakerChange(car_maker_input);
        } else if (line_no.trim().startsWith('3')) {
            car_maker_input.value = 'Honda';
            handleCarMakerChange(car_maker_input);
        } else if (line_no.trim().startsWith('4')) {
            car_maker_input.value = 'Toyota';
            handleCarMakerChange(car_maker_input);
        } else if (line_no.trim().startsWith('5')) {
            car_maker_input.value = 'Suzuki';
            handleCarMakerChange(car_maker_input);
        } else if (line_no.trim().startsWith('6')) {
            car_maker_input.value = 'Nissan';
            handleCarMakerChange(car_maker_input);
        } else if (line_no.trim().startsWith('7')) {
            car_maker_input.value = 'Subaru';
            handleCarMakerChange(car_maker_input);
        } else {
            car_maker_input.value = '';
            handleCarMakerChange(car_maker_input);
        }
    }

    function update_issue_tag_qa(line_no_qa, record_type_qa) {
        var record_type_qa = $('input[name="record_type_qa"]:checked').val();
        var issue_tag_input = document.getElementById("issue_tag_qa");

        if (line_no_qa.trim() === '' || record_type_qa === "Mancost Only") {
            issue_tag_input.value = 'N/A';
            return;
        }

        $.ajax({
            url: '../../process/pd_verifier/new_defect_record_pdv_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'get_issue_tag_qa',
                line_no_qa: line_no_qa,
                record_type_qa: record_type_qa
            },
            success: function (response) {
                try {
                    var result = JSON.parse(response);
                    if (result.error) {
                        console.error('Error generating issue tag');
                        issue_tag_input.value = 'Error';
                    } else {
                        var nextIssueNo = parseInt(result.issue_no, 10);
                        if (!isNaN(nextIssueNo)) {
                            issue_tag_input.value = nextIssueNo;
                        } else {
                            console.error('Invalid issue number');
                            issue_tag_input.value = 'Error';
                        }
                    }
                } catch (e) {
                    console.error('Failed to parse response', e);
                    issue_tag_input.value = 'Error';
                }
            },
            error: function () {
                console.error('Failed to get the issue tag');
                issue_tag_input.value = 'Error';
            }
        });
    }

    document.querySelectorAll('input[name="record_type_qa"]').forEach(function (radio) {
        radio.addEventListener('change', function () {
            var record_type_qa = this.value;
            var line_no_qa = document.getElementById("line_no_qa").value;
            if (record_type_qa === "Mancost Only") {
                document.getElementById("car_maker_qa").value = "N/A";
                document.getElementById("issue_tag_qa").value = "N/A";
            } else {
                update_car_maker_qa(line_no_qa);
                update_issue_tag_qa(line_no_qa, record_type_qa);
            }
        });
    });

    document.getElementById("line_no_qa").addEventListener("input", function () {
        var line_no_qa = this.value;
        var record_type_qa = document.querySelector('input[name="record_type_qa"]:checked').value;
        if (record_type_qa === "Mancost Only") {
            document.getElementById("car_maker_qa").value = "N/A";
            document.getElementById("issue_tag_qa").value = "N/A";
        } else {
            update_car_maker_qa(line_no_qa);
            update_issue_tag_qa(line_no_qa, record_type_qa);
        }
    });

    const fetch_opt_harness_status_pdv = () => {
        $.ajax({
            url: '../../process/pd_verifier/cc_re_crimp_pdv_p.php',
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

    // document.getElementById('search_qr_scan_pdv_re').addEventListener('keyup', function (e) {
    //     var qrCode = this.value;

    //     if (qrCode.length === 50) {
    //         const productNameField = document.getElementById('search_product_name_pdv_re');
    //         const lotNoField = document.getElementById('search_lot_no_pdv_re');
    //         const serialNoField = document.getElementById('search_serial_no_pdv_re');

    //         if (productNameField && lotNoField && serialNoField) {
    //             productNameField.value = qrCode.substring(10, 35);
    //             lotNoField.value = qrCode.substring(35, 41);
    //             serialNoField.value = qrCode.substring(41, 50);

    //             load_defect_table_pdv_re(1);
    //         } else {

    //         }

    //         this.value = '';
    //     }
    // });

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
            url: '../../process/pd_verifier/cc_re_crimp_pdv_p.php',
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
            url: '../../process/pd_verifier/cc_re_crimp_pdv_p.php',
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
            url: '../../process/pd_verifier/cc_re_crimp_pdv_p.php',
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
        document.getElementById("search_car_model_pdv_re").value = '';

        document.getElementById("search_qr_scan_pdv_re").disabled = true;
        document.getElementById("search_car_model_pdv_re").disabled = true;

        load_defect_table_pdv_re(1);
    }

    function get_update_defect_re_assy(dataString) {
        const data = dataString.split('~!~');

        $('#update_defect_mancost_pdv_re_id').val(data[0]).prop('hidden', true);

        $('#car_maker_pdv_cc_update').val(data[1]).prop('disabled', true).css('background', '#EEE');
        $('#line_no_pdv_cc_update').val(data[2]).prop('disabled', true).css('background', '#EEE');
        $('#line_category_pdv_cc_update').val(data[3]).prop('disabled', true).css('background', '#EEE');
        $('#date_detected_pdv_cc_update').val(data[4]).prop('disabled', true).css('background', '#EEE');
        $('#issue_tag_pdv_cc_update').val(data[5]).prop('disabled', true).css('background', '#EEE');
        $('#repairing_date_pdv_cc_update').val(data[6]).prop('disabled', true).css('background', '#EEE');
        $('#product_name_pdv_cc_update').val(data[7]).prop('disabled', true).css('background', '#EEE');
        $('#lot_no_pdv_cc_update').val(data[8]).prop('disabled', true).css('background', '#EEE');
        $('#serial_no_pdv_cc_update').val(data[9]).prop('disabled', true).css('background', '#EEE');
        $('#discovery_process_pdv_cc_update').val(data[10]).prop('disabled', true).css('background', '#EEE');
        $('#discovery_id_no_pdv_cc_update').val(data[11]).prop('disabled', true).css('background', '#EEE');
        $('#discovery_person_pdv_cc_update').val(data[12]).prop('disabled', true).css('background', '#EEE');
        $('#occurrence_process_pdv_dr_cc_update').val(data[13]).prop('disabled', true).css('background', '#EEE');
        $('#occurrence_shift_pdv_cc_update').val(data[14]).prop('disabled', true).css('background', '#EEE');
        $('#occurrence_id_no_pdv_cc_update').val(data[15]).prop('disabled', true).css('background', '#EEE');
        $('#occurrence_person_pdv_cc_update').val(data[16]).prop('disabled', true).css('background', '#EEE');
        $('#outflow_process_pdv_cc_update').val(data[17]).prop('disabled', true).css('background', '#EEE');
        $('#outflow_shift_pdv_cc_update').val(data[18]).prop('disabled', true).css('background', '#EEE');
        $('#outflow_id_no_pdv_cc_update').val(data[19]).prop('disabled', true).css('background', '#EEE');
        $('#outflow_person_pdv_cc_update').val(data[20]).prop('disabled', true).css('background', '#EEE');
        $('#defect_category_pdv_dr_cc_update').val(data[21]).prop('disabled', true).css('background', '#EEE');
        $('#sequence_no_pdv_cc_update').val(data[22]).prop('disabled', true).css('background', '#EEE');
        $('#assy_board_no_pdv_cc_update').val(data[23]).prop('disabled', true).css('background', '#EEE');
        $('#defect_cause_pdv_cc_update').val(data[24]).prop('disabled', true).css('background', '#EEE');
        $('#good_measurement_pdv_cc_update').val(data[25]).prop('disabled', true).css('background', '#EEE');
        $('#ng_measurement_pdv_cc_update').val(data[26]).prop('disabled', true).css('background', '#EEE');
        $('#wire_type_pdv_cc_update').val(data[27]).prop('disabled', true).css('background', '#EEE');
        $('#wire_size_pdv_cc_update').val(data[28]).prop('disabled', true).css('background', '#EEE');
        $('#connector_cavity_pdv_cc_update').val(data[29]).prop('disabled', true).css('background', '#EEE');
        $('#repair_person_pdv_cc_update').val(data[30]).prop('disabled', true).css('background', '#EEE');
        $('#detail_content_defect_pdv_cc_update').val(data[31]).prop('disabled', true).css('background', '#EEE');
        $('#treatment_content_defect_pdv_cc_update').val(data[32]).prop('disabled', true).css('background', '#EEE');
        $('#harness_status_pdv_cc_update').val(data[33]).prop('disabled', true).css('background', '#EEE');

        $('#cc_remarks_1_re_cc_update').val(data[34]);
        $('#cc_remarks_2_re_cc_update').val(data[35]);
        $('#cc_id_no_re_cc_update').val(data[36]);
        $('#cc_name_re_cc_update').val(data[37]);

        $('#recrimp_remarks_re_cc_update').val(data[38]);
        $('#recrimp_pd_id_no_re_cc_update').val(data[39]);
        $('#recrimp_pd_name_re_cc_update').val(data[40]);
        $('#recrimp_qa_id_no_re_cc_update').val(data[41]);
        $('#recrimp_qa_name_re_cc_update').val(data[42]);

        // defect unique id 
        $('#admin_defect_id_4').val(data[43]).prop('hidden', true);
        $('#update_defect_cc_re_crimp').modal('show');
    }

    const update_defect_cc_re_crimp = () => {
        var cc_remarks_1 = document.getElementById('cc_remarks_1_re_cc_update').value;
        var cc_remarks_2 = document.getElementById('cc_remarks_2_re_cc_update').value;
        var cc_id_no = document.getElementById('cc_id_no_re_cc_update').value;
        var cc_name = document.getElementById('cc_name_re_cc_update').value;

        var recrimp_remarks = document.getElementById('recrimp_remarks_re_cc_update').value;
        var recrimp_pd_id_no = document.getElementById('recrimp_pd_id_no_re_cc_update').value;
        var recrimp_pd_name = document.getElementById('recrimp_pd_name_re_cc_update').value;
        var recrimp_qa_id_no = document.getElementById('recrimp_qa_id_no_re_cc_update').value;
        var recrimp_qa_name = document.getElementById('recrimp_qa_name_re_cc_update').value;

        var pdv_defect_id = document.getElementById('admin_defect_id_4').value;

        $.ajax({
            url: '../../process/pd_verifier/cc_re_crimp_pdv_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'update_defect_cc_re_crimp',
                cc_remarks_1: cc_remarks_1,
                cc_remarks_2: cc_remarks_2,
                cc_id_no: cc_id_no,
                cc_name: cc_name,

                recrimp_remarks: recrimp_remarks,
                recrimp_pd_id_no: recrimp_pd_id_no,
                recrimp_pd_name: recrimp_pd_name,
                recrimp_qa_id_no: recrimp_qa_id_no,
                recrimp_qa_name: recrimp_qa_name,

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

                    $('#update_defect_cc_re_crimp').modal('hide');

                    var cc_remarks_1 = $('#cc_remarks_1_re_cc_update').val();
                    var recrimp_remarks = $('#recrimp_remarks_re_cc_update').val();

                    if (cc_remarks_1 === 'NO GOOD') {
                        $('#add_defect_qa').modal('show');

                        Swal.fire({
                            icon: 'info',
                            title: 'Add new defect record. <br>The remarks of the previous record is NO GOOD.',
                            showConfirmButton: true
                        });
                    } else if (recrimp_remarks === 'NO GOOD') {
                        $('#add_defect_qa').modal('show');

                        Swal.fire({
                            icon: 'info',
                            title: 'Add new defect record. <br>The remarks of the previous record is NO GOOD.',
                            showConfirmButton: true
                        });
                    }

                    $('#admin_defect_id_4').val('');

                    fetch_and_update_count_for_veri();
                    fetch_and_update_count_for_reassy();
                    fetch_and_update_count_for_cc_re_crimp();
                    load_defect_table_pdv_re(1);

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

    const add_record_inspector = () => {
        var required_fields = [
            'line_no_qa',
            'line_category_qa',
            'date_detected_qa',
            'car_maker_qa',
            'discovery_process_qa',
            'discovery_id_no_qa',
            'occurrence_process_qa',
            'occurrence_shift_qa',
            'occurrence_id_no_qa',
            'outflow_process_qa',
            'outflow_shift_qa',
            'outflow_id_no_qa',
            'defect_category_qa',
            'sequence_no_qa',
            'assy_board_no_qa',
            'defect_cause_qa',
            'good_measurement_qa',
            'ng_measurement_qa',
            'wire_type_qa',
            'wire_size_qa',
            'connector_cavity_qa',
            'repair_person_qa',
            'detail_content_defect_qa',
            'treatment_content_defect_qa',
            'harness_status_qa'
        ];

        required_fields.forEach(field => {
            $('#' + field).on('change', function () {
                $(this).removeClass('error-text');
            });
        });

        var allFieldsFilled = true;

        required_fields.forEach(field => {
            var element = document.getElementById(field);
            if (element.tagName === 'SELECT') {
                if (element.value === '') {
                    element.classList.add('error-text');
                    allFieldsFilled = false;
                } else {
                    element.classList.remove('error-text');
                }
            } else {
                if (element.value.trim() === '') {
                    element.classList.add('error-text');
                    allFieldsFilled = false;
                } else {
                    element.classList.remove('error-text');
                }
            }
        });

        if (!allFieldsFilled) {
            Swal.fire({
                icon: 'warning',
                title: 'There is an empty field. Please fill-out all required fields.',
                showConfirmButton: true
            });
            return;
        }

        var record_type_qa = $("input[name='record_type_qa']:checked").val();
        var line_no_qa = document.getElementById("line_no_qa").value.trim();
        var line_category_qa = document.getElementById("line_category_qa").value.trim();
        var date_detected_qa = document.getElementById("date_detected_qa").value.trim();
        var issue_tag_qa = document.getElementById("issue_tag_qa").value.trim();
        var repairing_date_qa = document.getElementById("repairing_date_qa").value.trim();
        var car_maker_qa = document.getElementById("car_maker_qa").value.trim();
        var product_name_qa = document.getElementById("product_name_qa").value.trim();
        var lot_no_qa = document.getElementById("lot_no_qa").value.trim();
        var serial_no_qa = document.getElementById("serial_no_qa").value.trim();
        var discovery_process_qa = document.getElementById("discovery_process_qa").value.trim();
        var discovery_id_no_qa = document.getElementById("discovery_id_no_qa").value.trim();
        var discovery_person_qa = document.getElementById("discovery_person_qa").value.trim();
        var occurrence_process_dr_qa = document.getElementById("occurrence_process_qa").value.trim();
        var occurrence_shift_qa = document.getElementById("occurrence_shift_qa").value.trim();
        var occurrence_id_no_qa = document.getElementById("occurrence_id_no_qa").value.trim();
        var occurrence_person_qa = document.getElementById("occurrence_person_qa").value.trim();
        var outflow_process_qa = document.getElementById("outflow_process_qa").value.trim();
        var outflow_shift_qa = document.getElementById("outflow_shift_qa").value.trim();
        var outflow_id_no_qa = document.getElementById("outflow_id_no_qa").value.trim();
        var outflow_person_qa = document.getElementById("outflow_person_qa").value.trim();
        var defect_category_dr_qa = document.getElementById("defect_category_qa").value.trim();
        var sequence_no_qa = document.getElementById("sequence_no_qa").value.trim();
        var assy_board_no_qa = document.getElementById("assy_board_no_qa").value.trim();
        var defect_cause_qa = document.getElementById("defect_cause_qa").value.trim();
        var good_measurement_qa = document.getElementById("good_measurement_qa").value.trim();
        var ng_measurement_qa = document.getElementById("ng_measurement_qa").value.trim();
        var wire_type_qa = document.getElementById("wire_type_qa").value.trim();
        var wire_size_qa = document.getElementById("wire_size_qa").value.trim();
        var connector_cavity_qa = document.getElementById("connector_cavity_qa").value.trim();
        var repair_person_qa = document.getElementById("repair_person_qa").value.trim();
        var detail_content_defect_qa = document.getElementById("detail_content_defect_qa").value.trim();
        var treatment_content_defect_qa = document.getElementById("treatment_content_defect_qa").value.trim();
        var harness_status_qa = document.getElementById("harness_status_qa").value.trim();
        var defect_id_qa = document.getElementById("defect_id_no_qa").value;

        $.ajax({
            url: '../../process/pd_verifier/new_defect_record_pdv_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'add_record_inspector',
                record_type_qa: record_type_qa,
                line_no_qa: line_no_qa,
                line_category_qa: line_category_qa,
                date_detected_qa: date_detected_qa,
                issue_tag_qa: issue_tag_qa,
                repairing_date_qa: repairing_date_qa,
                car_maker_qa: car_maker_qa,
                product_name_qa: product_name_qa,
                lot_no_qa: lot_no_qa,
                serial_no_qa: serial_no_qa,
                discovery_process_qa: discovery_process_qa,
                discovery_id_no_qa: discovery_id_no_qa,
                discovery_person_qa: discovery_person_qa,
                occurrence_process_dr_qa: occurrence_process_dr_qa,
                occurrence_shift_qa: occurrence_shift_qa,
                occurrence_id_no_qa: occurrence_id_no_qa,
                occurrence_person_qa: occurrence_person_qa,
                outflow_process_qa: outflow_process_qa,
                outflow_shift_qa: outflow_shift_qa,
                outflow_id_no_qa: outflow_id_no_qa,
                outflow_person_qa: outflow_person_qa,
                defect_category_dr_qa: defect_category_dr_qa,
                sequence_no_qa: sequence_no_qa,
                assy_board_no_qa: assy_board_no_qa,
                defect_cause_qa: defect_cause_qa,
                good_measurement_qa: good_measurement_qa,
                ng_measurement_qa: ng_measurement_qa,
                wire_type_qa: wire_type_qa,
                wire_size_qa: wire_size_qa,
                connector_cavity_qa: connector_cavity_qa,
                repair_person_qa: repair_person_qa,
                detail_content_defect_qa: detail_content_defect_qa,
                treatment_content_defect_qa: treatment_content_defect_qa,
                harness_status_qa: harness_status_qa,
                defect_id_qa: defect_id_qa
            },
            success: function (response) {
                let response_array = JSON.parse(response);

                if (response_array.message == 'success') {
                    document.getElementById("defect_id_no_qa").value = response_array.defect_id;

                    Swal.fire({
                        icon: 'success',
                        title: 'Successfully Recorded',
                        showConfirmButton: false,
                        timer: 1500
                    });

                    required_fields.forEach(field => {
                        $('#' + field).val('');
                    });

                    $('#defect_id_no_qa').val('');

                    $('#add_defect_qa').modal('hide');

                    clear_input_fields();
                    load_defect_table_new_record(1);
                }
                else {
                    console.error("Unexpected response from the server:", response);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Error',
                        showConfirmButton: false,
                        timer: 2500
                    });
                }
            }
        });
    }


    function clear_input_fields() {
        var inputFieldIds = ['issue_tag_qa', 'car_maker_qa'];
        for (var i = 0; i < inputFieldIds.length; i++) {
            var fieldId = inputFieldIds[i];
            document.getElementById(fieldId).value = '';
        }

        $("input[name='record_type_qa']").prop('checked', false);

        $("#line_category_qa").prop('disabled', true).val('').css('background-color', '#D3D3D3');
        $("#date_detected_qa").prop('disabled', true).val('').css('background-color', '#D3D3D3');
        $("#qr_scan_qa").prop('disabled', true).val('').css('background-color', '#D3D3D3');

        $("#line_no_qa").prop('disabled', true).val('').css('background-color', '#D3D3D3');
        $("#issue_tag_qa").prop('disabled', true).val('').css('background-color', '#D3D3D3');
        $("#repairing_date_qa").prop('disabled', true).val('').css('background-color', '#D3D3D3');
        $("#car_maker_qa").prop('disabled', true).val('').css('background-color', '#D3D3D3');
        $("#product_name_qa").prop('disabled', true).val('').css('background-color', '#D3D3D3');
        $("#lot_no_qa").prop('disabled', true).val('').css('background-color', '#D3D3D3');
        $("#serial_no_qa").prop('disabled', true).val('').css('background-color', '#D3D3D3');
        $("#discovery_process_qa").prop('disabled', true).val('').css('background-color', '#D3D3D3');
        $("#discovery_id_no_qa").prop('disabled', true).val('').css('background-color', '#D3D3D3');
        $("#discovery_person_qa").prop('disabled', true).val('').css('background-color', '#D3D3D3');
        $("#occurrence_process_qa").prop('disabled', true).val('').css('background-color', '#D3D3D3');
        $("#occurrence_shift_qa").prop('disabled', true).val('').css('background-color', '#D3D3D3');
        $("#occurrence_id_no_qa").prop('disabled', true).val('').css('background-color', '#D3D3D3');
        $("#occurrence_person_qa").prop('disabled', true).val('').css('background-color', '#D3D3D3');
        $("#outflow_process_qa").prop('disabled', true).val('').css('background-color', '#D3D3D3');
        $("#outflow_shift_qa").prop('disabled', true).val('').css('background-color', '#D3D3D3');
        $("#outflow_id_no_qa").prop('disabled', true).val('').css('background-color', '#D3D3D3');
        $("#outflow_person_qa").prop('disabled', true).val('').css('background-color', '#D3D3D3');
        $("#defect_category_qa").prop('disabled', true).val('').css('background-color', '#D3D3D3');
        $("#sequence_no_qa").prop('disabled', true).val('').css('background-color', '#D3D3D3');
        $("#assy_board_no_qa").prop('disabled', true).val('').css('background-color', '#D3D3D3');
        $("#defect_cause_qa").prop('disabled', true).val('').css('background-color', '#D3D3D3');
        $("#repair_person_qa").prop('disabled', true).val('N/A').css('background-color', '#D3D3D3');
        $("#good_measurement_qa").prop('disabled', true).val('N/A').css('background-color', '#D3D3D3');
        $("#ng_measurement_qa").prop('disabled', true).val('N/A').css('background-color', '#D3D3D3');
        $("#wire_type_qa").prop('disabled', true).val('N/A').css('background-color', '#D3D3D3');
        $("#wire_size_qa").prop('disabled', true).val('N/A').css('background-color', '#D3D3D3');
        $("#connector_cavity_qa").prop('disabled', true).val('N/A').css('background-color', '#D3D3D3');
        $("#detail_content_defect_qa").prop('disabled', true).val('N/A').css('background-color', '#D3D3D3');
        $("#treatment_content_defect_qa").prop('disabled', true).val('N/A').css('background-color', '#D3D3D3');
        $("#harness_status_qa").prop('disabled', true).val('N/A').css('background-color', '#D3D3D3');
    }

    const clear_qa_fields = () => {
        document.getElementById("line_no_qa").value = '';
        document.getElementById("issue_tag_qa").value = '';
        document.getElementById("car_maker_qa").value = '';
        document.getElementById("qr_scan_qa").value = '';
        document.getElementById("product_name_qa").value = '';
        document.getElementById("lot_no_qa").value = '';
        document.getElementById("serial_no_qa").value = '';
        document.getElementById("discovery_process_qa").value = '';
        document.getElementById("discovery_id_no_qa").value = '';
        document.getElementById("discovery_person_qa").value = '';
        document.getElementById("occurrence_process_qa").value = '';
        document.getElementById("occurrence_shift_qa").value = '';
        document.getElementById("occurrence_id_no_qa").value = '';
        document.getElementById("occurrence_person_qa").value = '';
        document.getElementById("outflow_process_qa").value = '';
        document.getElementById("outflow_shift_qa").value = '';
        document.getElementById("outflow_id_no_qa").value = '';
        document.getElementById("outflow_person_qa").value = '';
        document.getElementById("defect_category_qa").value = '';
        document.getElementById("sequence_no_qa").value = '';
        document.getElementById("assy_board_no_qa").value = '';
        document.getElementById("defect_cause_qa").value = '';
        document.getElementById("good_measurement_qa").value = '';
        document.getElementById("ng_measurement_qa").value = '';
        document.getElementById("wire_type_qa").value = '';
        document.getElementById("wire_size_qa").value = '';
        document.getElementById("connector_cavity_qa").value = '';
        document.getElementById("detail_content_defect_qa").value = '';
    }
</script>