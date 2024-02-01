<script type="text/javascript">
    $(document).ready(function() {
        load_history_defect_table();
        load_history_mancost_only();
    });

    // fetch history defect table
    const load_history_defect_table = () => {
        $.ajax({
            url:'../../process/admin/history/history_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'load_history_defect_table'
            },
            beforeSend: () => {
                var loading = `<tr id="loading"><td colspan="10" style="text-align:center;"><div class="spinner-border text-dark" role="status"><span class="sr-only">Loading...</span></div></td></tr>`;
                document.getElementById("history_defect_table").innerHTML = loading;
            },
            success: function(response) {
                $('#loading').remove();
                $('#history_defect_table').html(response);
                $('#history_defect_id').html('');
                $('#t_history_defect_breadcrumb').hide();
            }
        });
    }

    // fetch history mancost table
    const load_history_mancost_table = param => {
        var string = param.split('~!~');
        var id = string[0];
        var history_defect_id = string[1];

        $.ajax({
            url:'../../process/admin/history/history_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'load_history_mancost_table',
                history_defect_id: history_defect_id
            },
            beforeSend: () => {
                var loading = `<tr id="loading"><td colspan="10" style="text-align:center;"><div class="spinner-border text-dark" role="status"><span class="sr-only">Loading...</span></div></td></tr>`;
                document.getElementById("history_defect_table").innerHTML = loading;
            },
            success: function(response) {
                $('#loading').remove();
                $('#history_defect_table').html(response);
                $('#history_defect_id').html("Mancost Monitoring");
                $('#t_history_defect_breadcrumb').show();
            }
        });
    }

    // fetch mancost monitoring only
    const load_history_mancost_only = () => {
        $.ajax({
            url:'../../process/admin/history/history_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'load_history_mancost_only'
            },
            success: function(response) {
                $('#list_of_mancost_record_history').html(response);
                $('#spinner').fadeOut();
            }
        });
    }
    
    // search keyword in history defect record and mancost
    const history_defect_search_keyword = () => {
        var h_defect_keyword = document.getElementById("h_defect_keyword").value.trim();

        // date search
        var date_from = document.getElementById("date_from_search_h_defect").value.trim();
        var date_to = document.getElementById("date_to_search_h_defect").value.trim();

        $.ajax({
            url:'../../process/admin/history/history_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'history_defect_search_keyword',
                h_defect_keyword: h_defect_keyword,
                date_from: date_from,
                date_to: date_to
            },
            success: function(response) {
                $('#history_defect_table').html(response);
                $('#spinner').fadeOut;
            }
        });
    }

    // search keyword in history mancost monitoring only
    const history_mancost_search_keyword = () => {
        var h_mancost_keyword = document.getElementById("h_mancost_keyword").value.trim();

        // date search
        var date_from = document.getElementById("date_from_search_h_mancost").value.trim();
        var date_to = document.getElementById("date_to_search_h_mancost").value.trim();

        $.ajax({
            url:'../../process/admin/history/history_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'history_mancost_search_keyword',
                h_mancost_keyword: h_mancost_keyword,
                date_from: date_from,
                date_to: date_to
            },
            success: function(response) {
                $('#list_of_mancost_record_history').html(response);
                $('#spinner').fadeOut();
            }
        });
    }


</script>