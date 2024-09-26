<script type="text/javascript">
    $(document).ready(function () {
        var currentDate = new Date().toISOString().split('T')[0];
        $('#search_date_from_new').val(currentDate);
        $('#search_date_to_new').val(currentDate);

        fetch_opt_search_new_record_type();
        load_defect_table_new_record(1);

        fetch_and_update_count_qc();

        fetch_opt_car_maker_insp();

        $('#search_car_maker_new').change(function () {
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
                        $('#search_car_model_new').html(response).prop('disabled', false);
                        $('#search_qr_scan_new').val('').prop('disabled', true);
                    }
                });
            } else {
                $('#search_car_model_new').html('<option></option>').prop('disabled', true);
                $('#search_qr_scan_new').prop('disabled', false);
            }
        });

        $('#search_car_model_new').change(function () {
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
                            $('#search_qr_scan_new').prop('disabled', false);
                        } else {
                            $('#search_qr_scan_new').prop('disabled', true);
                        }
                    }
                });
            } else {
                $('#search_qr_scan_new').prop('disabled', false);
            }
        });

        handleSearchQrScan();
    });

    function handleSearchQrScan() {
        document.getElementById('search_qr_scan_new').addEventListener('keyup', function (e) {
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

                        document.getElementById('search_product_name_new').value = productName;
                        document.getElementById('search_lot_no_new').value = lotNo;
                        document.getElementById('search_serial_no_new').value = serialNo;

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
                $('#search_car_maker_new').html(response);
            }
        });
    }


    function update_display_badge_count_3(new_count) {
        var badge = document.querySelector('#for_veri_qc_badge');
        if (badge) {
            badge.textContent = new_count;
        }
    }

    function fetch_and_update_count_qc() {
        $.ajax({
            url: '../../process/qc/defect_monitoring_record_p.php',
            type: 'POST',
            data: { method: 'update_badge_count_qc' },
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

    const fetch_opt_search_new_record_type = () => {
        $.ajax({
            url: '../../process/qc/new_defect_record_qc_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_opt_search_new_record_type',
            },
            success: function (response) {
                $('#search_record_type_new').html(response)
            }
        });
    }

    // document.getElementById('search_qr_scan_new').addEventListener('keyup', function (e) {
    //     var qrCode = this.value;

    //     if (qrCode.length === 50) {
    //         const productNameField = document.getElementById('search_product_name_qa');
    //         const lotNoField = document.getElementById('search_lot_no_qa');
    //         const serialNoField = document.getElementById('search_serial_no_qa');

    //         if (productNameField && lotNoField && serialNoField) {
    //             productNameField.value = qrCode.substring(10, 35);
    //             lotNoField.value = qrCode.substring(35, 41);
    //             serialNoField.value = qrCode.substring(41, 50);

    //             load_defect_table_new_record(1);
    //         } else {

    //         }

    //         this.value = '';
    //     }
    // });

    document.getElementById("list_of_defect_qa_res").addEventListener("scroll", function () {
        var scrollTop = document.getElementById("list_of_defect_qa_res").scrollTop;
        var scrollHeight = document.getElementById("list_of_defect_qa_res").scrollHeight;
        var offsetHeight = document.getElementById("list_of_defect_qa_res").offsetHeight;

        if ((offsetHeight + scrollTop + 1) >= scrollHeight) {
            get_next_page();
        }
    });

    const get_next_page = () => {
        var current_page = parseInt(sessionStorage.getItem('defect_qa_table_pagination'));
        let total = sessionStorage.getItem('count_rows');
        var last_page = parseInt(sessionStorage.getItem('last_page'));
        var next_page = current_page + 1;
        if (next_page <= last_page && total > 0) {
            load_defect_table_new_record(next_page);
        }
    }

    const count_defect_qa = () => {
        var search_product_name_qa = sessionStorage.getItem('search_product_name_qa');
        var search_lot_no_qa = sessionStorage.getItem('search_lot_no_qa');
        var search_serial_no_qa = sessionStorage.getItem('search_serial_no_qa');
        var search_record_type_qa = sessionStorage.getItem('search_record_type_qa');
        var search_line_no_qa = sessionStorage.getItem('search_line_no_qa');
        var search_date_from_qa = sessionStorage.getItem('search_date_from_qa');
        var search_date_to_qa = sessionStorage.getItem('search_date_to_qa');

        $.ajax({
            url: '../../process/qc/new_defect_record_qc_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'count_defect_qa_list',
                search_product_name_qa: search_product_name_qa,
                search_lot_no_qa: search_lot_no_qa,
                search_serial_no_qa: search_serial_no_qa,
                search_record_type_qa: search_record_type_qa,
                search_line_no_qa: search_line_no_qa,
                search_date_from_qa: search_date_from_qa,
                search_date_to_qa: search_date_to_qa,
            },
            success: function (response) {
                sessionStorage.setItem('count_rows', response);
                var count = `Total: ${response}`;
                $('#defect_qa_table_info').html(count);

                if (response > 0) {
                    load_defect_qa_last_page();
                } else {
                    document.getElementById("btnNextPage").style.display = "none";
                    document.getElementById("btnNextPage").setAttribute('disabled', true);
                }
            }
        });
    }

    const load_defect_qa_last_page = () => {
        var search_product_name_qa = sessionStorage.getItem('search_product_name_qa');
        var search_lot_no_qa = sessionStorage.getItem('search_lot_no_qa');
        var search_serial_no_qa = sessionStorage.getItem('search_serial_no_qa');
        var search_record_type_qa = sessionStorage.getItem('search_record_type_qa');
        var search_line_no_qa = sessionStorage.getItem('search_line_no_qa');
        var search_date_from_qa = sessionStorage.getItem('search_date_from_qa');
        var search_date_to_qa = sessionStorage.getItem('search_date_to_qa');

        var current_page = sessionStorage.getItem('defect_qa_table_pagination');

        $.ajax({
            url: '../../process/qc/new_defect_record_qc_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'defect_qa_list_last_page',
                search_product_name_qa: search_product_name_qa,
                search_lot_no_qa: search_lot_no_qa,
                search_serial_no_qa: search_serial_no_qa,
                search_record_type_qa: search_record_type_qa,
                search_line_no_qa: search_line_no_qa,
                search_date_from_qa: search_date_from_qa,
                search_date_to_qa: search_date_to_qa,
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

    const load_defect_table_new_record = current_page => {
        var search_product_name_qa = document.getElementById("search_product_name_new").value;
        var search_lot_no_qa = document.getElementById("search_lot_no_new").value;
        var search_serial_no_qa = document.getElementById("search_serial_no_new").value;
        var search_record_type_qa = document.getElementById("search_record_type_new").value;
        var search_line_no_qa = document.getElementById("search_line_no_new").value;
        var search_date_from_qa = document.getElementById("search_date_from_new").value;
        var search_date_to_qa = document.getElementById("search_date_to_new").value;

        var search_product_name_qa_1 = sessionStorage.getItem('search_product_name_qa');
        var search_lot_no_qa_1 = sessionStorage.getItem('search_lot_no_qa');
        var search_serial_no_qa_1 = sessionStorage.getItem('search_serial_no_qa');
        var search_record_type_qa_1 = sessionStorage.getItem('search_record_type_qa');
        var search_line_no_qa_1 = sessionStorage.getItem('search_line_no_qa');
        var search_date_from_qa_1 = sessionStorage.getItem('search_date_from_qa');
        var search_date_to_qa_1 = sessionStorage.getItem('search_date_to_qa');

        if (current_page > 1) {
            switch (true) {
                case search_product_name_qa !== search_product_name_qa_1:
                case search_lot_no_qa !== search_lot_no_qa_1:
                case search_serial_no_qa !== search_serial_no_qa_1:
                case search_record_type_qa !== search_record_type_qa_1:
                case search_line_no_qa !== search_line_no_qa_1:
                case search_date_from_qa !== search_date_from_qa_1:
                case search_date_to_qa !== search_date_to_qa_1:
                    search_product_name_qa = search_product_name_qa_1;
                    search_lot_no_qa = search_lot_no_qa_1;
                    search_serial_no_qa = search_serial_no_qa_1;
                    search_record_type_qa = search_record_type_qa_1;
                    search_line_no_qa = search_line_no_qa_1;
                    search_date_from_qa = search_date_from_qa_1;
                    search_date_to_qa = search_date_to_qa_1;
                    break;
                default:
            }
        } else {
            sessionStorage.setItem('search_product_name_qa', search_product_name_qa);
            sessionStorage.setItem('search_lot_no_qa', search_lot_no_qa);
            sessionStorage.setItem('search_serial_no_qa', search_serial_no_qa);
            sessionStorage.setItem('search_record_type_qa', search_record_type_qa);
            sessionStorage.setItem('search_line_no_qa', search_line_no_qa);
            sessionStorage.setItem('search_date_from_qa', search_date_from_qa);
            sessionStorage.setItem('search_date_to_qa', search_date_to_qa);
        }

        $.ajax({
            url: '../../process/qc/new_defect_record_qc_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'load_defect_table_new_record',
                search_product_name_qa: search_product_name_qa,
                search_lot_no_qa: search_lot_no_qa,
                search_serial_no_qa: search_serial_no_qa,
                search_record_type_qa: search_record_type_qa,
                search_line_no_qa: search_line_no_qa,
                search_date_from_qa: search_date_from_qa,
                search_date_to_qa: search_date_to_qa,
                current_page: current_page
            },
            beforeSend: () => {
                var loading = `<tr id="loading"><td colspan="6" style="text-align:center;"><div class="spinner-border text-dark role="status"><span class="sr-only">Loading...</span></div></td></tr>`;
                if (current_page == 1) {
                    document.getElementById("list_of_defect_record_new").innerHTML = loading;
                } else {
                    $('#defect_qa_table tbody').append(loading);
                }
            },
            success: function (response) {
                $('#loading').remove();
                if (current_page == 1) {
                    $('#defect_qa_table tbody').html(response);
                } else {
                    $('#defect_qa_table tbody').append(response);
                }
                sessionStorage.setItem('defect_qa_table_pagination', current_page);
                count_defect_qa();
            }
        });
    }

    const clear_search_input = () => {
        document.getElementById("search_qr_scan_new").value = '';
        document.getElementById("search_product_name_new").value = '';
        document.getElementById("search_lot_no_new").value = '';
        document.getElementById("search_serial_no_new").value = '';
        document.getElementById("search_record_type_new").value = '';
        document.getElementById("search_line_no_new").value = '';

        document.getElementById("search_car_maker_new").value = '';
        document.getElementById("search_car_model_new").value = '';

        document.getElementById("search_qr_scan_new").disabled = true;
        document.getElementById("search_car_model_new").disabled = true;
        // document.getElementById("search_date_from_qa").value = '';
        // document.getElementById("search_date_to_qa").value = '';

        load_defect_table_new_record(1);
    }
</script>