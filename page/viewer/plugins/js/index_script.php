<script type="text/javascript">
    $(document).ready(function () {
        load_viewer_defect_table();
        fetch_opt_search_v_defect_category();
        fetch_opt_search_v_discovery_process();
        fetch_opt_search_v_occurrence_process();
        fetch_opt_search_v_outflow_process();
        fetch_opt_search_v_car_maker();
        fetch_opt_search_v_record_type();
        load_viewer_mancost_only();
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

    // fetch viewer defect table
    const load_viewer_defect_table = () => {
        $.ajax({
            url: '../../process/viewer/index_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'load_viewer_defect_table'
            },
            beforeSend: () => {
                var loading = `<tr id="loading"><td colspan="10" style="text-align:center;"><div class="spinner-border text-dark" role="status"><span class="sr-only">Loading...</span></div></td></tr>`;
                document.getElementById("viewer_defect_table").innerHTML = loading;
            },
            success: function (response) {
                $('#loading').remove();
                $('#viewer_defect_table').html(response);
                $('#viewer_defect_id').html('');
                $('#t_viewer_defect_breadcrumb').hide();
            }
        });
    }

    // fetch viewer mancost table
    const load_viewer_mancost_table = param => {
        var string = param.split('~!~');
        var id = string[0];
        var viewer_defect_id = string[1];

        $.ajax({
            url: '../../process/viewer/index_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'load_viewer_mancost_table',
                viewer_defect_id: viewer_defect_id
            },
            beforeSend: () => {
                var loading = `<tr id="loading"><td colspan="10" style="text-align:center;"><div class="spinner-border text-dark" role="status"><span class="sr-only">Loading...</span></div></td></tr>`;
                document.getElementById("viewer_defect_table").innerHTML = loading;
            },
            success: function (response) {
                $('#loading').remove();
                $('#viewer_defect_table').html(response);
                $('#viewer_defect_id').html("Mancost Monitoring");
                $('#t_viewer_defect_breadcrumb').show();
            }
        });
    }

    // fetch mancost monitoring only
    const load_viewer_mancost_only = () => {
        $.ajax({
            url: '../../process/viewer/index_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'load_viewer_mancost_only'
            },
            success: function (response) {
                $('#list_of_mancost_record_viewer').html(response);
                $('#spinner').fadeOut();
            }
        });
    }

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

        // // Check if record_type is "Select Record Type"
        // if (record_type === "Select Record Type") {
        //     // Refresh the table or the entire page as per your requirement
        //     location.reload();
        //     return;
        // }

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