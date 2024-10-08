<script type="text/javascript">
    $(document).ready(function () {
        // var currentDate = new Date().toISOString().split('T')[0];
        // $('#search_date_from_pdv').val(currentDate);
        // $('#search_date_to_pdv').val(currentDate);

        fetch_opt_harness_status_pdv();
        // fetch_opt_line_no_pdv();
        load_defect_table_pdv_ng(1);

        fetch_and_update_count_for_veri();
        fetch_and_update_count_for_reassy();
        fetch_and_update_count_for_cc_re_crimp();

        fetch_opt_car_maker_insp();

        $('#search_car_maker_pdv_ng').change(function () {
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
                        $('#search_car_model_pdv_ng').html(response).prop('disabled', false);
                        $('#search_qr_scan_pdv_ng').val('').prop('disabled', true);
                    }
                });
            } else {
                $('#search_car_model_pdv_ng').html('<option></option>').prop('disabled', true);
                $('#search_qr_scan_pdv_ng').prop('disabled', false);
            }
        });

        $('#search_car_model_pdv_ng').change(function () {
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
                            $('#search_qr_scan_pdv_ng').prop('disabled', false);
                        } else {
                            $('#search_qr_scan_pdv_ng').prop('disabled', true);
                        }
                    }
                });
            } else {
                $('#search_qr_scan_pdv_ng').prop('disabled', false);
            }
        });

        handleSearchQrScan();
    });

    function handleSearchQrScan() {
        document.getElementById('search_qr_scan_pdv_ng').addEventListener('keyup', function (e) {
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

                        document.getElementById('search_product_name_pdv_ng').value = productName;
                        document.getElementById('search_lot_no_pdv_ng').value = lotNo;
                        document.getElementById('search_serial_no_pdv_ng').value = serialNo;

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
                $('#search_car_maker_pdv_ng').html(response);
            }
        });
    }

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

    const fetch_opt_harness_status_pdv = () => {
        $.ajax({
            url: '../../process/pd_verifier/history_pdv_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_opt_harness_status_pdv',
            },
            success: function (response) {
                $('#search_harness_status_pdv_ng').html(response);
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

    // document.getElementById('search_qr_scan_pdv_ng').addEventListener('keyup', function (e) {
    //     var qrCode = this.value;

    //     if (qrCode.length === 50) {
    //         const productNameField = document.getElementById('search_product_name_pdv_ng');
    //         const lotNoField = document.getElementById('search_lot_no_pdv_ng');
    //         const serialNoField = document.getElementById('search_serial_no_pdv_ng');

    //         if (productNameField && lotNoField && serialNoField) {
    //             productNameField.value = qrCode.substring(10, 35);
    //             lotNoField.value = qrCode.substring(35, 41);
    //             serialNoField.value = qrCode.substring(41, 50);

    //             load_defect_table_pdv_ng(1);
    //         } else {

    //         }

    //         this.value = '';
    //     }
    // });

    document.getElementById("list_of_defect_pdv_ng_res").addEventListener("scroll", function () {
        var scrollTop = document.getElementById("list_of_defect_pdv_ng_res").scrollTop;
        var scrollHeight = document.getElementById("list_of_defect_pdv_ng_res").scrollHeight;
        var offsetHeight = document.getElementById("list_of_defect_pdv_ng_res").offsetHeight;

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
            load_defect_table_pdv_ng(next_page);
        }
    }

    const count_defect_pdv = () => {
        var search_product_name_pdv = sessionStorage.getItem('search_product_name_pdv_ng');
        var search_lot_no_pdv = sessionStorage.getItem('search_lot_no_pdv_ng');
        var search_serial_no_pdv = sessionStorage.getItem('search_serial_no_pdv_ng');
        var search_line_no_pdv = sessionStorage.getItem('search_line_no_pdv_ng');
        var search_harness_status_pdv = sessionStorage.getItem('search_harness_status_pdv_ng');
        var search_date_from_pdv = sessionStorage.getItem('search_date_from_pdv_ng');
        var search_date_to_pdv = sessionStorage.getItem('search_date_to_pdv_ng');

        $.ajax({
            url: '../../process/pd_verifier/history_pdv_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'count_defect_pdv_ng_list',
                search_product_name_pdv: search_product_name_pdv,
                search_lot_no_pdv: search_lot_no_pdv,
                search_serial_no_pdv: search_serial_no_pdv,
                search_line_no_pdv: search_line_no_pdv,
                search_harness_status_pdv: search_harness_status_pdv,
                search_date_from_pdv: search_date_from_pdv,
                search_date_to_pdv: search_date_to_pdv,
            },
            success: function (response) {
                sessionStorage.setItem('count_rows', response);
                var count = `Total: ${response}`;
                $('#defect_pdv_ng_table_info').html(count);

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
        var search_date_from_pdv = sessionStorage.getItem('search_date_from_pdv');
        var search_date_to_pdv = sessionStorage.getItem('search_date_to_pdv');

        var current_page = sessionStorage.getItem('defect_pdv_table_pagination');

        $.ajax({
            url: '../../process/pd_verifier/history_pdv_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'defect_pdv_list_last_page',
                search_product_name_pdv: search_product_name_pdv,
                search_lot_no_pdv: search_lot_no_pdv,
                search_serial_no_pdv: search_serial_no_pdv,
                search_line_no_pdv: search_line_no_pdv,
                search_harness_status_pdv: search_harness_status_pdv,
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

    const load_defect_table_pdv_ng = current_page => {
        var search_product_name_pdv = document.getElementById("search_product_name_pdv_ng").value;
        var search_lot_no_pdv = document.getElementById("search_lot_no_pdv_ng").value;
        var search_serial_no_pdv = document.getElementById("search_serial_no_pdv_ng").value;
        var search_line_no_pdv = document.getElementById("search_line_no_pdv_ng").value;
        var search_harness_status_pdv = document.getElementById("search_harness_status_pdv_ng").value;
        var search_date_from_pdv = document.getElementById("search_date_from_pdv_ng").value;
        var search_date_to_pdv = document.getElementById("search_date_to_pdv_ng").value;

        var search_product_name_pdv_1 = sessionStorage.getItem('search_product_name_pdv');
        var search_lot_no_pdv_1 = sessionStorage.getItem('search_lot_no_pdv');
        var search_serial_no_pdv_1 = sessionStorage.getItem('search_serial_no_pdv');
        var search_line_no_pdv_1 = sessionStorage.getItem('search_line_no_pdv');
        var search_harness_status_pdv_1 = sessionStorage.getItem('search_harness_status_pdv');
        var search_date_from_pdv_1 = sessionStorage.getItem('search_date_from_pdv');
        var search_date_to_pdv_1 = sessionStorage.getItem('search_date_to_pdv');

        if (current_page > 1) {
            switch (true) {
                case search_product_name_pdv !== search_product_name_pdv_1:
                case search_lot_no_pdv !== search_lot_no_pdv_1:
                case search_serial_no_pdv !== search_serial_no_pdv_1:
                case search_line_no_pdv !== search_line_no_pdv_1:
                case search_harness_status_pdv !== search_harness_status_pdv_1:
                case search_date_from_pdv !== search_date_from_pdv_1:
                case search_date_to_pdv !== search_date_to_pdv_1:
                    search_product_name_pdv = search_product_name_pdv_1;
                    search_lot_no_pdv = search_lot_no_pdv_1;
                    search_serial_no_pdv = search_serial_no_pdv_1;
                    search_line_no_pdv = search_line_no_pdv_1;
                    search_harness_status_pdv = search_harness_status_pdv_1;
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
            sessionStorage.setItem('search_date_from_pdv', search_date_from_pdv);
            sessionStorage.setItem('search_date_to_pdv', search_date_to_pdv);
        }

        $.ajax({
            url: '../../process/pd_verifier/history_pdv_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'load_defect_table_pdv_ng',
                search_product_name_pdv: search_product_name_pdv,
                search_lot_no_pdv: search_lot_no_pdv,
                search_serial_no_pdv: search_serial_no_pdv,
                search_line_no_pdv: search_line_no_pdv,
                search_harness_status_pdv: search_harness_status_pdv,
                search_date_from_pdv: search_date_from_pdv,
                search_date_to_pdv: search_date_to_pdv,
                current_page: current_page
            },
            beforeSend: () => {
                var loading = `<tr id="loading"><td colspan="6" style="text-align:center;"><div class="spinner-border text-dark role="status"><span class="sr-only">Loading...</span></div></td></tr>`;
                if (current_page == 1) {
                    document.getElementById("list_of_defect_record_pdv_ng").innerHTML = loading;
                } else {
                    $('#defect_pdv_ng_table tbody').append(loading);
                }
            },
            success: function (response) {
                $('#loading').remove();
                if (current_page == 1) {
                    $('#defect_pdv_ng_table tbody').html(response);
                } else {
                    $('#defect_pdv_ng_table tbody').append(response);
                }
                sessionStorage.setItem('defect_pdv_table_pagination', current_page);
                count_defect_pdv();
            }
        });
    }

    const clear_search_input_pdv = () => {
        document.getElementById("search_qr_scan_pdv_ng").value = '';
        document.getElementById("search_product_name_pdv_ng").value = '';
        document.getElementById("search_lot_no_pdv_ng").value = '';
        document.getElementById("search_serial_no_pdv_ng").value = '';
        document.getElementById("search_line_no_pdv_ng").value = '';
        document.getElementById("search_harness_status_pdv_ng").value = '';
        document.getElementById("search_date_from_pdv_ng").value = '';
        document.getElementById("search_date_to_pdv_ng").value = '';

        document.getElementById("search_car_maker_pdv_ng").value = '';
        document.getElementById("search_car_model_pdv_ng").value = '';
        document.getElementById("search_qr_scan_pdv_ng").value = '';

        document.getElementById("search_qr_scan_pdv_ng").disabled = true;
        document.getElementById("search_car_model_pdv_ng").disabled = true;

        load_defect_table_pdv_ng(1);
    }
</script>