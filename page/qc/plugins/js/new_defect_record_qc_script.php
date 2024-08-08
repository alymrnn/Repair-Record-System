<script type="text/javascript">
    $(document).ready(function () {
        var currentDate = new Date().toISOString().split('T')[0];
        $('#search_date_from_new').val(currentDate);
        $('#search_date_to_new').val(currentDate);

        fetch_opt_search_new_record_type();
        load_defect_table_new_record(1);
    });

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

    document.getElementById('search_qr_scan_new').addEventListener('keyup', function (e) {
        var qrCode = this.value;

        if (qrCode.length === 50) {
            const productNameField = document.getElementById('search_product_name_qa');
            const lotNoField = document.getElementById('search_lot_no_qa');
            const serialNoField = document.getElementById('search_serial_no_qa');

            if (productNameField && lotNoField && serialNoField) {
                productNameField.value = qrCode.substring(10, 35);
                lotNoField.value = qrCode.substring(35, 41);
                serialNoField.value = qrCode.substring(41, 50);

                load_defect_table_new_record(1);
            } else {

            }

            this.value = '';
        }
    });

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
        // document.getElementById("search_date_from_qa").value = '';
        // document.getElementById("search_date_to_qa").value = '';

        load_defect_table_new_record(1);
    }
</script>