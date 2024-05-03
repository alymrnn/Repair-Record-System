<script type="text/javascript">
    $(document).ready(function () {
        load_viewer_defect_table();
        fetch_opt_search_v_defect_category();
        fetch_opt_search_v_discovery_process();
        fetch_opt_search_v_occurrence_process();
        fetch_opt_search_v_outflow_process();
        fetch_opt_search_v_car_maker();
        fetch_opt_search_v_record_type();
    });

    // fetch defect category defect record
    const fetch_opt_search_v_defect_category = () => {
        $.ajax({
            url: '../../process/viewer/index_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_opt_search_v_defect_category',
            },
            success: function (response) {
                $('#search_v_defect_category').html(response)
            }
        });
    }

    // fetch discovery process defect record
    const fetch_opt_search_v_discovery_process = () => {
        $.ajax({
            url: '../../process/viewer/index_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_opt_search_v_discovery_process',
            },
            success: function (response) {
                $('#search_v_discovery_process').html(response)
            }
        });
    }

    // fetch occurrence process defect record
    const fetch_opt_search_v_occurrence_process = () => {
        $.ajax({
            url: '../../process/viewer/index_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_opt_search_v_occurrence_process',
            },
            success: function (response) {
                $('#search_v_occurrence_process').html(response)
            }
        });
    }

    // fetch outflow process defect record
    const fetch_opt_search_v_outflow_process = () => {
        $.ajax({
            url: '../../process/viewer/index_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_opt_search_v_outflow_process',
            },
            success: function (response) {
                $('#search_v_outflow_process').html(response)
            }
        });
    }

    // fetch car maker defect record
    const fetch_opt_search_v_car_maker = () => {
        $.ajax({
            url: '../../process/viewer/index_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_opt_search_v_car_maker',
            },
            success: function (response) {
                $('#search_v_car_maker').html(response)
            }
        });
    }

    // fetch record type defect record
    const fetch_opt_search_v_record_type = () => {
        $.ajax({
            url: '../../process/viewer/index_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_opt_search_v_record_type',
            },
            success: function (response) {
                $('#search_v_record_type').html(response)
            }
        });
    }

    // ======================================================================================================
    document.getElementById("t_viewer_table_res").addEventListener("scroll", function () {
        var scrollTop = document.getElementById("t_viewer_table_res").scrollTop;
        var scrollHeight = document.getElementById("t_viewer_table_res").scrollHeight;
        var offsetHeight = document.getElementById("t_viewer_table_res").offsetHeight;

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
                    load_viewer_defect_table_data(next_page);
                    break;
                case 2:
                    load_viewer_mancost_table_data(next_page);
                    break;
                default:
            }
        }
    }

    const load_viewer_defect_table_data_last_page = () => {
        var current_page = parseInt(sessionStorage.getItem('t_table_pagination'));
        $.ajax({
            url: '../../process/viewer/index_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'load_viewer_defect_table_data_last_page'
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

    const load_viewer_defect_table = () => {
        load_viewer_defect_table_t1();
        setTimeout(() => {
            load_viewer_defect_table_data(1);
        }, 500);
    }

    const load_viewer_defect_table_t1 = () => {
        sessionStorage.setItem('t_table_number', 1);
        document.getElementById("viewer_defect_table").innerHTML = `
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
            <tbody class="mb-0" id="viewer_defect_table_data" style="background: #F9F9F9;">
        `;
    }

    const load_viewer_defect_table_data = current_page => {
        $.ajax({
            url: '../../process/viewer/index_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'load_viewer_defect_table_data',
                current_page: current_page
            },
            beforeSend: () => {
                var loading = `<tr id="loading"><td colspan="6" style="text-align:center;"><div class="spinner-border text-dark" role="status"><span class="sr-only">Loading...</span></div></td></tr>`;
                if (current_page == 1) {
                    document.getElementById("viewer_defect_table_data").innerHTML = loading;
                } else {
                    $('#viewer_defect_table tbody').append(loading);
                }
            },
            success: function (response) {
                $('#loading').remove();
                if (current_page == 1) {
                    $('#viewer_defect_table tbody').html(response);
                } else {
                    $('#viewer_defect_table tbody').append(response);
                }
                sessionStorage.setItem('t_table_pagination', current_page);
                $('#viewer_defect_id').html('');
                $('#t_viewer_defect_breadcrumb').hide();
                count_viewer_defect_table_data();
            }
        });
    }

    const count_viewer_defect_table_data = () => {
        $.ajax({
            url: '../../process/viewer/index_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'count_viewer_defect_table_data'
            },
            success: function (response) {
                sessionStorage.setItem('count_rows', response);
                var count = `Total Record: ${response}`;
                $('#viewer_defect_table_info').html(count);

                if (response > 0) {
                    load_viewer_defect_table_data_last_page();
                } else {
                    document.getElementById("btnNextPage").style.display = "none";
                    document.getElementById("btnNextPage").setAttribute('disabled', true);
                }
            }
        });
    }

    const load_viewer_mancost_table_data_last_page = () => { 
        var viewer_defect_id = sessionStorage.getItem('load_viewer_defect_id');
        var current_page = parseInt(sessionStorage.getItem('t_table_pagination'));

        $.ajax({
            url: '../../process/viewer/index_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'load_mancost_table_data_last_page',
                viewer_defect_id: viewer_defect_id
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

    const count_viewer_mancost_table_data = () => {
        var viewer_defect_id = sessionStorage.getItem('load_viewer_defect_id');

        $.ajax({
            url: '../../process/viewer/index_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'count_mancost_table_data',
                viewer_defect_id: viewer_defect_id
            },
            success: function (response) {
                sessionStorage.setItem('count_rows', response);
                var count = `Total Record: ${response}`;
                $('#viewer_defect_table_info').html(count);

                if (response > 0) {
                    load_viewer_mancost_table_data_last_page();
                } else {
                    document.getElementById("btnNextPage").style.display = "none";
                    document.getElementById("btnNextPage").setAttribute('disabled', true);
                }
            }
        });
    }

    const load_viewer_mancost_table = param => {
        var string = param.split('~!~');
        var id = string[0];
        var viewer_defect_id = string[1];

        sessionStorage.setItem('load_viewer_defect_id', viewer_defect_id);

        load_viewer_mancost_table_t2();
        setTimeout(() => {
            load_viewer_mancost_table_data(1);
        }, 500);
    }

    const load_viewer_mancost_table_t2 = () => {
        sessionStorage.setItem('t_table_number', 2);
        document.getElementById("viewer_defect_table").innerHTML = `
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
                </tr>
            </thead>
            <tbody class="mb-0" id="viewer_mancost_table_data" style="background: #F9F9F9;">
        `;
    }

    const load_viewer_mancost_table_data = current_page => {
        var viewer_defect_id = sessionStorage.getItem('load_viewer_defect_id');

        $.ajax({
            url: '../../process/viewer/index_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'load_viewer_mancost_table_data',
                viewer_defect_id: viewer_defect_id,
                current_page: current_page
            },
            beforeSend: () => {
                var loading = `<tr id="loading"><td colspan="6" style="text-align:center;"><div class="spinner-border text-dark" role="status"><span class="sr-only">Loading...</span></div></td></tr>`;
                if (current_page == 1) {
                    document.getElementById("viewer_mancost_table_data").innerHTML = loading;
                } else {
                    $('#viewer_defect_table tbody').append(loading);
                }
            },
            success: function (response) {
                $('#loading').remove();
                if (current_page == 1) {
                    $('#viewer_defect_table tbody').html(response);
                } else {
                    $('#viewer_defect_table tbody').append(response);
                }
                sessionStorage.setItem('t_table_pagination', current_page);
                $('#viewer_defect_id').html("Mancost Monitoring");
                $('#t_viewer_defect_breadcrumb').show();
                count_viewer_mancost_table_data();
            }
        });
    }







    // // fetch viewer defect table
    // const load_viewer_defect_table = () => {
    //     $.ajax({
    //         url: '../../process/viewer/index_p.php',
    //         type: 'POST',
    //         cache: false,
    //         data: {
    //             method: 'load_viewer_defect_table'
    //         },
    //         beforeSend: () => {
    //             var loading = `<tr id="loading"><td colspan="10" style="text-align:center;"><div class="spinner-border text-dark" role="status"><span class="sr-only">Loading...</span></div></td></tr>`;
    //             document.getElementById("viewer_defect_table").innerHTML = loading;
    //         },
    //         success: function (response) {
    //             $('#loading').remove();
    //             $('#viewer_defect_table').html(response);
    //             $('#viewer_defect_id').html('');
    //             $('#t_viewer_defect_breadcrumb').hide();
    //         }
    //     });
    // }

    // // fetch viewer mancost table
    // const load_viewer_mancost_table = param => {
    //     var string = param.split('~!~');
    //     var id = string[0];
    //     var viewer_defect_id = string[1];

    //     $.ajax({
    //         url: '../../process/viewer/index_p.php',
    //         type: 'POST',
    //         cache: false,
    //         data: {
    //             method: 'load_viewer_mancost_table',
    //             viewer_defect_id: viewer_defect_id
    //         },
    //         beforeSend: () => {
    //             var loading = `<tr id="loading"><td colspan="10" style="text-align:center;"><div class="spinner-border text-dark" role="status"><span class="sr-only">Loading...</span></div></td></tr>`;
    //             document.getElementById("viewer_defect_table").innerHTML = loading;
    //         },
    //         success: function (response) {
    //             $('#loading').remove();
    //             $('#viewer_defect_table').html(response);
    //             $('#viewer_defect_id').html("Mancost Monitoring");
    //             $('#t_viewer_defect_breadcrumb').show();
    //         }
    //     });
    // }

    // search keyword in defect record and mancost
    const viewer_defect_search_keyword = () => {
        var defect_category = document.getElementById("search_v_defect_category").value.trim();
        var discovery_process = document.getElementById("search_v_discovery_process").value.trim();
        var occurrence_process = document.getElementById("search_v_occurrence_process").value.trim();
        var outflow_process = document.getElementById("search_v_outflow_process").value.trim();
        var car_maker = document.getElementById("search_v_car_maker").value.trim();
        var line_no = document.getElementById("search_v_line_no").value.trim();
        var product_name = document.getElementById("search_v_product_name").value.trim();
        var lot_no = document.getElementById("search_v_lot_no").value.trim();
        var serial_no = document.getElementById("search_v_serial_no").value.trim();
        var record_type = document.getElementById("search_v_record_type").value.trim();

        var v_defect_keyword = document.getElementById("v_defect_keyword").value.trim();

        // date search
        var date_from = document.getElementById("date_from_search_v_defect").value.trim();
        var date_to = document.getElementById("date_to_search_v_defect").value.trim();

        $.ajax({
            url: '../../process/viewer/index_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'viewer_defect_search_keyword',
                defect_category: defect_category,
                discovery_process: discovery_process,
                occurrence_process: occurrence_process,
                outflow_process: outflow_process,
                car_maker: car_maker,
                line_no: line_no,
                product_name: product_name,
                lot_no: lot_no,
                serial_no: serial_no,
                record_type: record_type,

                v_defect_keyword: v_defect_keyword,
                date_from: date_from,
                date_to: date_to
            },
            success: function (response) {
                $('#viewer_defect_table').html(response);
                $('#spinner').fadeOut;
            }
        });
    }

    // search keyword in mancost monitoring only
    const viewer_mancost_search_keyword = () => {
        var v_mancost_keyword = document.getElementById("v_mancost_keyword").value.trim();

        // date search
        var date_from = document.getElementById("date_from_search_v_mancost").value.trim();
        var date_to = document.getElementById("date_to_search_v_mancost").value.trim();

        $.ajax({
            url: '../../process/viewer/index_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'viewer_mancost_search_keyword',
                v_mancost_keyword: v_mancost_keyword,
                date_from: date_from,
                date_to: date_to
            },
            success: function (response) {
                $('#list_of_mancost_record_viewer').html(response);
                $('#spinner').fadeOut();
            }
        });
    }

    // export CSV
    const export_record_viewer = () => {
        var defect_category = document.getElementById("search_v_defect_category").value.trim();
        var discovery_process = document.getElementById("search_v_discovery_process").value.trim();
        var occurrence_process = document.getElementById("search_v_occurrence_process").value.trim();
        var outflow_process = document.getElementById("search_v_outflow_process").value.trim();
        var car_maker = document.getElementById("search_v_car_maker").value.trim();
        var line_no = document.getElementById("search_v_line_no").value.trim();
        var product_name = document.getElementById("search_v_product_name").value.trim();
        var lot_no = document.getElementById("search_v_lot_no").value.trim();
        var serial_no = document.getElementById("search_v_serial_no").value.trim();
        var v_defect_keyword = document.getElementById("v_defect_keyword").value.trim();

        var record_type = document.getElementById("search_v_record_type").value.trim();

        // date search
        var date_from = document.getElementById("date_from_search_v_defect").value.trim();
        var date_to = document.getElementById("date_to_search_v_defect").value.trim();

        window.open(
            '../../process/export/exp_record_viewer.php?defect_category=' + defect_category +
            "&discovery_process=" + discovery_process +
            "&occurrence_process=" + occurrence_process +
            "&outflow_process=" + outflow_process +
            "&car_maker=" + car_maker +
            "&line_no=" + line_no +
            "&product_name=" + product_name +
            "&lot_no=" + lot_no +
            "&serial_no=" + serial_no +
            "&v_defect_keyword=" + v_defect_keyword +
            "&record_type=" + record_type +
            "&date_from=" + date_from +
            "&date_to=" + date_to,
            '_blank'
        );
    }

</script>

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../../plugins/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script defer src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert --->
<script defer src="../../plugins/sweetalert2/dist/sweetalert2.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>

<noscript>We are facing Script issues. Kindly enable JavaScript</noscript>

</body>

</html>