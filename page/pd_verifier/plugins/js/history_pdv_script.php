<script type="text/javascript">
    $(document).ready(function () {
        // var currentDate = new Date().toISOString().split('T')[0];
        // $('#search_date_from_pdv').val(currentDate);
        // $('#search_date_to_pdv').val(currentDate);

        fetch_opt_harness_status_pdv();
        // fetch_opt_line_no_pdv();
        load_defect_table_pdv_ng(1);
    });

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

    document.getElementById('search_qr_scan_pdv_ng').addEventListener('keyup', function (e) {
        var qrCode = this.value;

        if (qrCode.length === 50) {
            const productNameField = document.getElementById('search_product_name_pdv_ng');
            const lotNoField = document.getElementById('search_lot_no_pdv_ng');
            const serialNoField = document.getElementById('search_serial_no_pdv_ng');

            if (productNameField && lotNoField && serialNoField) {
                productNameField.value = qrCode.substring(10, 35);
                lotNoField.value = qrCode.substring(35, 41);
                serialNoField.value = qrCode.substring(41, 50);

                load_defect_table_pdv_ng(1);
            } else {

            }
            
            this.value = '';
        }
    });

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

        load_defect_table_pdv_ng(1);
    }
</script>