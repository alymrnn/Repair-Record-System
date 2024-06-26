<script type="text/javascript">
    $(document).ready(function () {
        load_defect_table(1);
        load_added_mancost();
        fetch_opt_record_type_dr();
        fetch_opt_category_dr();
        fetch_opt_car_maker_dr();
        fetch_opt_discovery_process();
        // fetch_opt_parts_removed();
        fetch_opt_occurrence_process();
        fetch_opt_occurrence_shift();
        fetch_opt_outflow_process();
        fetch_opt_outflow_shift();
        fetch_opt_defect_category();
        fetch_opt_defect_cause();
        fetch_opt_repair_person();
        fetch_opt_defect_category_mc();
        fetch_opt_occurrence_process_mc();
        fetch_opt_portion_treatment();
        fetch_opt_defect_category_mc_only();
        fetch_opt_occurrence_process_mc_only();
        fetch_opt_portion_treatment_mc_only();
        count_detail_content_defect_char();
        count_treatment_content_defect_char();
    });

    document.getElementById("search_product_name").addEventListener("keyup", e => {
        load_defect_table(1);
    });

    document.getElementById("search_lot_no").addEventListener("keyup", e => {
        load_defect_table(1);
    });

    document.getElementById("search_serial_no").addEventListener("keyup", e => {
        load_defect_table(1);
    });

    document.getElementById("search_record_type").addEventListener("change", e => {
        load_defect_table(1);
    });

    document.getElementById("date_from_search_defect").addEventListener("change", e => {
        load_defect_table(1);
    });

    document.getElementById("date_to_search_defect").addEventListener("change", e => {
        load_defect_table(1);
    });

    document.getElementById("line_no_rp").addEventListener("keyup", e => {
        load_defect_table(1);
    });

    // fetch record type option
    const fetch_opt_record_type_dr = () => {
        $.ajax({
            url: '../../process/pd/defect_monitoring_record_rp_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_opt_record_type_dr',
            },
            success: function (response) {
                $('#search_record_type').html(response);
            }
        });
    }

    // fetch line category mancost option
    const fetch_opt_category_dr = () => {
        $.ajax({
            url: '../../process/pd/defect_monitoring_record_rp_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_opt_category_dr',
            },
            success: function (response) {
                $('#categoryList').html(response);
            }
        });
    }

    // fetch car maker mancost option
    const fetch_opt_car_maker_dr = () => {
        $.ajax({
            url: '../../process/pd/defect_monitoring_record_rp_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_opt_car_maker_dr',
            },
            success: function (response) {
                $('#carMakerList').html(response);
            }
        });
    }

    // fetch option discovery process
    const fetch_opt_discovery_process = () => {
        $.ajax({
            url: '../../process/pd/defect_monitoring_record_rp_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_opt_discovery_process',
            },
            success: function (response) {
                $('#discoveryProcessDrList').html(response);
            }
        });
    }

    // fetch option occurrence process
    const fetch_opt_occurrence_process = () => {
        $.ajax({
            url: '../../process/pd/defect_monitoring_record_rp_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_opt_occurrence_process',
            },
            success: function (response) {
                $('#occurrenceProcessDrList').html(response);
            }
        });
    }

    // fetch option occurrence shift
    const fetch_opt_occurrence_shift = () => {
        $.ajax({
            url: '../../process/pd/defect_monitoring_record_rp_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_opt_occurrence_shift',
            },
            success: function (response) {
                $('#occurrenceShiftDrList').html(response);
            }
        });
    }

    // fetch option outflow process
    const fetch_opt_outflow_process = () => {
        $.ajax({
            url: '../../process/pd/defect_monitoring_record_rp_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_opt_outflow_process',
            },
            success: function (response) {
                $('#outflowProcessDrList').html(response);
            }
        });
    }

    // fetch option outflow shift
    const fetch_opt_outflow_shift = () => {
        $.ajax({
            url: '../../process/pd/defect_monitoring_record_rp_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_opt_outflow_shift',
            },
            success: function (response) {
                $('#outflowShiftDrList').html(response);
            }
        });
    }

    // fetch option defect category ng content
    const fetch_opt_defect_category = () => {
        $.ajax({
            url: '../../process/pd/defect_monitoring_record_rp_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_opt_defect_category',
            },
            success: function (response) {
                $('#defectCategoryDrList').html(response);
            }
        });
    }

    // fetch option cause of defect
    const fetch_opt_defect_cause = () => {
        $.ajax({
            url: '../../process/pd/defect_monitoring_record_rp_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_opt_defect_cause',
            },
            success: function (response) {
                $('#defectCauseDrList').html(response);
            }
        });
    }

    // fetch option repair person
    const fetch_opt_repair_person = () => {
        $.ajax({
            url: '../../process/pd/defect_monitoring_record_rp_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_opt_repair_person',
            },
            success: function (response) {
                $('#repairPersonDrList').html(response);
            }
        });
    }

    // fetch option defect category mancost
    const fetch_opt_defect_category_mc = () => {
        $.ajax({
            url: '../../process/pd/defect_monitoring_record_rp_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_opt_defect_category_mc',
            },
            success: function (response) {
                $('#defectCategoryMcList').html(response);
            }
        });
    }

    // fetch option occurrence process mancost
    const fetch_opt_occurrence_process_mc = () => {
        $.ajax({
            url: '../../process/pd/defect_monitoring_record_rp_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_opt_occurrence_process_mc',
            },
            success: function (response) {
                $('#occurrenceProcessMcList').html(response);
            }
        });
    }

    // fetch option portion treatment
    const fetch_opt_portion_treatment = () => {
        $.ajax({
            url: '../../process/pd/defect_monitoring_record_rp_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_opt_portion_treatment',
            },
            success: function (response) {
                $('#portionTreatmentMcList').html(response);
            }
        });
    }

    // fetch option defect category mancost only
    const fetch_opt_defect_category_mc_only = () => {
        $.ajax({
            url: '../../process/pd/defect_monitoring_record_rp_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_opt_defect_category_mc_only',
            },
            success: function (response) {
                $('#defect_category_mc_only').html(response);
            }
        });
    }

    // fetch option occurrence process mancost only
    const fetch_opt_occurrence_process_mc_only = () => {
        $.ajax({
            url: '../../process/pd/defect_monitoring_record_rp_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_opt_occurrence_process_mc_only',
            },
            success: function (response) {
                $('#occurrence_process_mc_only').html(response);
            }
        });
    }

    // fetch option portion treatment mancost only
    const fetch_opt_portion_treatment_mc_only = () => {
        $.ajax({
            url: '../../process/pd/defect_monitoring_record_rp_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_opt_portion_treatment_mc_only',
            },
            success: function (response) {
                $('#portion_treatment_mc_only').html(response);
            }
        });
    }

    // ==================================================================

    document.getElementById("t_table_res").addEventListener("scroll", function () {
        var scrollTop = document.getElementById("t_table_res").scrollTop;
        var scrollHeight = document.getElementById("t_table_res").scrollHeight;
        var offsetHeight = document.getElementById("t_table_res").offsetHeight;

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
                    load_defect_table_data(next_page);
                    break;
                case 2:
                    load_mancost_table_data(next_page);
                    break;
                default:
            }
        }
    }

    document.getElementById('qr_scan_pd').addEventListener('keyup', function (e) {
        var qrCode = this.value;
        // console.log("QR Code Scanned:", qrCode);

        if (qrCode.length === 50) {
            const productNameField = document.getElementById('search_product_name');
            const lotNoField = document.getElementById('search_lot_no');
            const serialNoField = document.getElementById('search_serial_no');

            if (productNameField && lotNoField && serialNoField) {
                productNameField.value = qrCode.substring(10, 35);
                lotNoField.value = qrCode.substring(35, 41);
                serialNoField.value = qrCode.substring(41, 50);

                // console.log("Product Name Set:", productNameField.value);
                // console.log("Lot No Set:", lotNoField.value);
                // console.log("Serial No Set:", serialNoField.value);

                load_defect_table(1);
            } else {
                // console.error("One or more elements were not found in the DOM.");
            }

            this.value = '';
        }
        // else if (qrCode.length > 50) {
        //     Swal.fire({
        //         icon: 'error',
        //         title: 'Invalid QR Code',
        //         text: 'Invalid',
        //         showConfirmButton: false,
        //         timer: 1000
        //     });
        //     this.value = '';
        // }
    });

    const load_defect_table_data_last_page = () => {
        var current_page = parseInt(sessionStorage.getItem('t_table_pagination'));

        var product_name = document.getElementById("search_product_name").value.trim();
        var lot_no = document.getElementById("search_lot_no").value.trim();
        var serial_no = document.getElementById("search_serial_no").value.trim();
        var record_type = document.getElementById("search_record_type").value.trim();
        var line_no_rp = document.getElementById("line_no_rp").value.trim();
        var date_from = document.getElementById("date_from_search_defect").value.trim();
        var date_to = document.getElementById("date_to_search_defect").value.trim();

        $.ajax({
            url: '../../process/pd/defect_monitoring_record_rp_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'load_defect_table_data_last_page',
                product_name: product_name,
                lot_no: lot_no,
                serial_no: serial_no,
                record_type: record_type,
                line_no_rp: line_no_rp,
                date_from: date_from,
                date_to: date_to
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

    const load_defect_table = () => {
        load_defect_table_t1();
        setTimeout(() => {
            load_defect_table_data(1);
        }, 500);
    }

    const load_defect_table_t1 = () => {
        sessionStorage.setItem('t_table_number', 1);
        document.getElementById("defect_table").innerHTML = `
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
            <tbody class="mb-0" id="defect_table_data" style="background: #F9F9F9;">
        `;
    }

    const load_defect_table_data = current_page => {
        var product_name = document.getElementById("search_product_name").value.trim();
        var lot_no = document.getElementById("search_lot_no").value.trim();
        var serial_no = document.getElementById("search_serial_no").value.trim();
        var record_type = document.getElementById("search_record_type").value.trim();
        var line_no_rp = document.getElementById("line_no_rp").value.trim();
        var date_from = document.getElementById("date_from_search_defect").value.trim();
        var date_to = document.getElementById("date_to_search_defect").value.trim();

        $.ajax({
            url: '../../process/pd/defect_monitoring_record_rp_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'load_defect_table_data',
                current_page: current_page,

                product_name: product_name,
                lot_no: lot_no,
                serial_no: serial_no,
                record_type: record_type,
                line_no_rp: line_no_rp,
                date_from: date_from,
                date_to: date_to
            },
            beforeSend: () => {
                var loading = `<tr id="loading"><td colspan="6" style="text-align:center;"><div class="spinner-border text-dark" role="status"><span class="sr-only">Loading...</span></div></td></tr>`;
                if (current_page == 1) {
                    document.getElementById("defect_table_data").innerHTML = loading;
                } else {
                    $('#defect_table tbody').append(loading);
                }
            },
            success: function (response) {
                $('#loading').remove();
                if (current_page == 1) {
                    $('#defect_table tbody').html(response);
                } else {
                    $('#defect_table tbody').append(response);
                }
                sessionStorage.setItem('t_table_pagination', current_page);
                $('#defect_id').html('');
                $('#t_defect_breadcrumb').hide();
                count_defect_table_data();
            }
        });
    }

    const count_defect_table_data = () => {
        var product_name = document.getElementById("search_product_name").value.trim();
        var lot_no = document.getElementById("search_lot_no").value.trim();
        var serial_no = document.getElementById("search_serial_no").value.trim();

        var record_type = document.getElementById("search_record_type").value.trim();
        var line_no_rp = document.getElementById("line_no_rp").value.trim();
        var date_from = document.getElementById("date_from_search_defect").value.trim();
        var date_to = document.getElementById("date_to_search_defect").value.trim();

        $.ajax({
            url: '../../process/pd/defect_monitoring_record_rp_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'count_defect_table_data',
                product_name: product_name,
                lot_no: lot_no,
                serial_no: serial_no,
                record_type: record_type,
                line_no_rp: line_no_rp,
                date_from: date_from,
                date_to: date_to
            },
            success: function (response) {
                sessionStorage.setItem('count_rows', response);
                var count = `Total Record: ${response}`;
                $('#defect_table_info').html(count);

                if (response > 0) {
                    load_defect_table_data_last_page();
                } else {
                    document.getElementById("btnNextPage").style.display = "none";
                    document.getElementById("btnNextPage").setAttribute('disabled', true);
                }
            }
        });
    }

    const load_mancost_table_data_last_page = () => {
        var defect_id = sessionStorage.getItem('load_defect_id');
        var current_page = parseInt(sessionStorage.getItem('t_table_pagination'));

        $.ajax({
            url: '../../process/pd/defect_monitoring_record_rp_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'load_mancost_table_data_last_page',
                defect_id: defect_id
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

    const count_mancost_table_data = () => {
        var defect_id = sessionStorage.getItem('load_defect_id');

        $.ajax({
            url: '../../process/pd/defect_monitoring_record_rp_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'count_mancost_table_data',
                defect_id: defect_id
            },
            success: function (response) {
                sessionStorage.setItem('count_rows', response);
                var count = `Total Record: ${response}`;
                $('#defect_table_info').html(count);

                if (response > 0) {
                    load_mancost_table_data_last_page();
                } else {
                    document.getElementById("btnNextPage").style.display = "none";
                    document.getElementById("btnNextPage").setAttribute('disabled', true);
                }
            }
        });
    }

    const load_mancost_table = param => {
        var string = param.split('~!~');
        var id = string[0];
        var defect_id = string[1];

        sessionStorage.setItem('load_defect_id', defect_id);

        load_mancost_table_t2();
        setTimeout(() => {
            load_mancost_table_data(1);
        }, 500);
    }

    const load_mancost_table_t2 = () => {
        sessionStorage.setItem('t_table_number', 2);
        document.getElementById("defect_table").innerHTML = `
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
            <tbody class="mb-0" id="mancost_table_data" style="background: #F9F9F9;">
        `;
    }

    const load_mancost_table_data = current_page => {
        var defect_id = sessionStorage.getItem('load_defect_id');

        $.ajax({
            url: '../../process/pd/defect_monitoring_record_rp_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'load_mancost_table_data',
                defect_id: defect_id,
                current_page: current_page
            },
            beforeSend: () => {
                var loading = `<tr id="loading"><td colspan="6" style="text-align:center;"><div class="spinner-border text-dark" role="status"><span class="sr-only">Loading...</span></div></td></tr>`;
                if (current_page == 1) {
                    document.getElementById("mancost_table_data").innerHTML = loading;
                } else {
                    $('#defect_table tbody').append(loading);
                }
            },
            success: function (response) {
                $('#loading').remove();
                if (current_page == 1) {
                    $('#defect_table tbody').html(response);
                } else {
                    $('#defect_table tbody').append(response);
                }
                sessionStorage.setItem('t_table_pagination', current_page);
                $('#defect_id').html("Mancost Monitoring");
                $('#t_defect_breadcrumb').show();
                count_mancost_table_data();
            }
        });
    }

    const time_difference = () => {
        var repair_start = document.getElementById('repair_start_mc').value;
        var repair_end = document.getElementById('repair_end_mc').value;

        var start = new Date("11/11/2023 " + repair_start);
        var end = new Date("11/11/2023 " + repair_end);

        if (end < start) {
            end.setDate(end.getDate() + 1);
        }

        var diffInMilliseconds = end - start;
        var diffInMinutes = Math.floor(diffInMilliseconds / (1000 * 60)); // Round down to the nearest whole minute

        // Set the result in the 'time_consumed_mc' field as integer
        document.getElementById("time_consumed_mc").value = diffInMinutes;

        // Your salary cost (replace with your actual salary cost)
        var salaryCost = 0.72;

        // Calculate manhour cost
        var manhourCost = ((diffInMinutes / 60) / salaryCost * 60).toFixed(2);

        document.getElementById("salary_cost_mc").value = salaryCost;
        document.getElementById("manhour_cost_mc").value = manhourCost;

        console.log("Time Consumed (Integer):", diffInMinutes);
        console.log("Manhour Cost:", manhourCost);
    }


    // compute the material cost in mancost monitoring
    const qty_cost_product = () => {
        var quantity = document.getElementById('quantity_mc').value;
        var unit_cost = document.getElementById('unit_cost_mc').value;

        var quantity_input = parseFloat(quantity);
        if (isNaN(quantity_input)) quantity_input = 0;

        var unit_cost_input = parseFloat(unit_cost);
        if (isNaN(unit_cost_input)) unit_cost_input = 0;

        var result = quantity_input * unit_cost_input;
        result = result.toFixed(2); // two decimal places

        document.getElementById("material_cost_mc").value = result;

        console.log(quantity);
        console.log(unit_cost);
        console.log(result);
    }

    // $(document).on('change', "input[name='na_white_tag_defect']", function () {
    //     $("#repair_start_mc, #repair_end_mc, #time_consumed_mc, #defect_category_mc, #occurrence_process_mc, #manhour_cost_mc, #parts_removed_mc, #quantity_mc, #unit_cost_mc, #material_cost_mc, #portion_treatment").prop('disabled', true);

    //     var isNA = ($(this).val() === "N/A");

    //     // List out repair-related field IDs and disable or enable them based on the N/A radio button
    //     var repairFieldIds = ["repair_start_mc", "na_repair_start", "repair_end_mc", "na_repair_end", "time_consumed_mc", "na_time_consumed", "manhour_cost_mc", "na_manhour_cost", "quantity_mc", "na_quantity", "unit_cost_mc", "na_unit_cost", "material_cost_mc", "na_material_cost", "defect_category_mc", "occurrence_process_mc", "parts_removed_mc", "portion_treatment"];

    //     $.each(repairFieldIds, function (index, fieldId) {
    //         var $field = $("#" + fieldId);
    //         $field.prop('disabled', isNA);

    //         // Check if the field is disabled, and if yes, set value to 'N/A' and background color to gray
    //         if (isNA && !$field.prop('disabled')) {
    //             $field.val('N/A').css('background-color', '#D3D3D3');
    //         } else {
    //             $field.val('').css('background-color', '#FFF');
    //         }
    //     });
    // });

    $(document).ready(function () {
        // Disable all input fields by default
        $("#line_no, #line_category_dr, #date_detected, #na_date_detected, #issue_tag, #repairing_date, #car_maker, #product_name, #lot_no, #serial_no, #discovery_process_dr, #discovery_id_no_dr, #discovery_person, #occurrence_process_dr, #occurrence_shift_dr, #occurrence_id_no_dr, #occurrence_person, #outflow_process_dr, #outflow_shift_dr, #outflow_id_no_dr, #outflow_person, #defect_category_dr, #sequence_no, #defect_cause_dr, #repair_person_dr, #detail_content_defect, #treatment_content_defect, #repair_start_mc, #repair_end_mc, #time_consumed_mc, #defect_category_mc, #occurrence_process_mc, #manhour_cost_mc, #parts_removed_mc, #quantity_mc, #unit_cost_mc, #material_cost_mc, #portion_treatment").prop('disabled', true);

        // add change event listener to radio buttons
        $("input[name='record_type']").change(function () {
            // Check which radio button is selected and store its value in a variable
            // var record_type = $("input[name='record_type']:checked").val();

            // console.log("Record Type: " + $('#record_type').val());

            // Check which radio button is selected
            if ($(this).val() === "Mancost Only") {
                // If 'Mancost Only' is selected, fill the form with n/a and disable the fields
                $("#line_no").prop('disabled', false).val('');
                $("#line_category_dr").prop('disabled', false).val('');
                $("#issue_tag").prop('disabled', false).val('');
                $("#repairing_date").prop('disabled', false).val('');
                $("#defect_category_dr").prop('disabled', false).val('');
                // $("#car_maker").prop('disabled', false).val('');
                $("#product_name").prop('disabled', false).val('');
                $("#lot_no").prop('disabled', false).val('');
                $("#serial_no").prop('disabled', false).val('');

                $("#date_detected").prop('type', 'text').prop('disabled', true).val('N/A').css('background-color', '#D3D3D3');
                $("#na_date_detected").prop('disabled', false).val('N/A').css('background-color', '#D3D3D3');
                $("#discovery_process_dr").prop('disabled', true).val('N/A').css('background-color', '#D3D3D3');
                $("#discovery_id_no_dr").prop('disabled', true).val('N/A').css('background-color', '#D3D3D3');
                $("#discovery_person").prop('disabled', true).val('N/A').css('background-color', '#D3D3D3');
                $("#occurrence_process_dr").prop('disabled', true).val('N/A').css('background-color', '#D3D3D3');
                $("#occurrence_shift_dr").prop('disabled', true).val('N/A').css('background-color', '#D3D3D3');
                $("#occurrence_id_no_dr").prop('disabled', true).val('N/A').css('background-color', '#D3D3D3');
                $("#occurrence_person").prop('disabled', true).val('N/A').css('background-color', '#D3D3D3');
                $("#outflow_process_dr").prop('disabled', true).val('N/A').css('background-color', '#D3D3D3');
                $("#outflow_shift_dr").prop('disabled', true).val('N/A').css('background-color', '#D3D3D3');
                $("#outflow_id_no_dr").prop('disabled', true).val('N/A').css('background-color', '#D3D3D3');
                $("#outflow_person").prop('disabled', true).val('N/A').css('background-color', '#D3D3D3');
                $("#sequence_no").prop('disabled', true).val('N/A').css('background-color', '#D3D3D3');
                $("#defect_cause_dr").prop('disabled', true).val('N/A').css('background-color', '#D3D3D3');
                $("#repair_person_dr").prop('disabled', true).val('N/A').css('background-color', '#D3D3D3');
                $("#detail_content_defect").prop('disabled', true).val('N/A').css('background-color', '#D3D3D3');
                $("#treatment_content_defect").prop('disabled', true).val('N/A').css('background-color', '#D3D3D3');

                $("#repair_start_mc").prop('type', 'time').prop('disabled', false).val('').css('background-color', '#FFF');
                $("#na_repair_start").prop('disabled', true).val('').css('background-color', '#FFF');
                $("#repair_end_mc").prop('type', 'time').prop('disabled', false).val('').css('background-color', '#FFF');
                $("#na_repair_end").prop('disabled', true).val('').css('background-color', '#FFF');
                $("#time_consumed_mc").prop('type', 'int').prop('disabled', false).val('').css('background-color', '#FFF');
                $("#na_time_consumed").prop('disabled', true).val('').css('background-color', '#FFF');
                $("#manhour_cost_mc").prop('type', 'float').prop('disabled', false).val('').css('background-color', '#FFF');
                $("#na_manhour_cost").prop('disabled', true).val('').css('background-color', '#FFF');
                $("#quantity_mc").prop('type', 'int').prop('disabled', false).val('').css('background-color', '#FFF');
                $("#na_quantity").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#unit_cost_mc").prop('type', 'float').prop('disabled', false).val('').css('background-color', '#FFF');
                $("#na_unit_cost").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#material_cost_mc").prop('type', 'float').prop('disabled', false).val('').css('background-color', '#FFF');
                $("#na_material_cost").prop('disabled', true).val('').css('background-color', '#FFF');
                $("#defect_category_mc").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#occurrence_process_mc").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#parts_removed_mc").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#portion_treatment").prop('disabled', false).val('').css('background-color', '#FFF');
            }
            else if ($(this).val() === "Defect Only") {
                $("#line_no").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#line_category_dr").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#date_detected").prop('type', 'date').prop('disabled', false).val('').css('background-color', '#FFF');
                $("#na_date_detected").prop('disabled', true).val('').css('background-color', '#FFF');
                $("#issue_tag").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#repairing_date").prop('disabled', false).val('').css('background-color', '#FFF');
                // $("#car_maker").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#product_name").prop('disabled', false).val('').css('background-color', '#F1F1F1');
                $("#lot_no").prop('disabled', false).val('').css('background-color', '#F1F1F1');
                $("#serial_no").prop('disabled', false).val('').css('background-color', '#F1F1F1');
                $("#discovery_process_dr").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#discovery_id_no_dr").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#discovery_person").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#occurrence_process_dr").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#occurrence_shift_dr").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#occurrence_id_no_dr").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#occurrence_person").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#outflow_process_dr").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#outflow_shift_dr").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#outflow_id_no_dr").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#outflow_person").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#defect_category_dr").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#sequence_no").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#defect_cause_dr").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#repair_person_dr").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#detail_content_defect").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#treatment_content_defect").prop('disabled', false).val('').css('background-color', '#FFF');

                $("#repair_start_mc").prop('type', 'text').prop('disabled', true).val('N/A').css('background-color', '#D3D3D3');
                $("#na_repair_start").prop('disabled', false).val('N/A').css('background-color', '#D3D3D3');
                $("#repair_end_mc").prop('type', 'text').prop('disabled', true).val('N/A').css('background-color', '#D3D3D3');
                $("#na_repair_end").prop('disabled', false).val('N/A').css('background-color', '#D3D3D3');
                $("#time_consumed_mc").prop('type', 'text').prop('disabled', true).val('N/A').css('background-color', '#D3D3D3');
                $("#na_time_consumed").prop('disabled', false).val('N/A').css('background-color', '#D3D3D3');
                $("#manhour_cost_mc").prop('type', 'text').prop('disabled', true).val('N/A').css('background-color', '#D3D3D3');
                $("#na_manhour_cost").prop('disabled', false).val('N/A').css('background-color', '#D3D3D3');
                $("#quantity_mc").prop('type', 'text').prop('disabled', true).val('N/A').css('background-color', '#D3D3D3');
                $("#na_quantity").prop('disabled', false).val('N/A').css('background-color', '#D3D3D3');
                $("#unit_cost_mc").prop('type', 'text').prop('disabled', true).val('N/A').css('background-color', '#D3D3D3');
                $("#na_unit_cost").prop('disabled', false).val('N/A').css('background-color', '#D3D3D3');
                $("#material_cost_mc").prop('type', 'text').prop('disabled', true).val('N/A').css('background-color', '#D3D3D3');
                $("#na_material_cost").prop('disabled', false).val('N/A').css('background-color', '#D3D3D3');
                $("#defect_category_mc").prop('disabled', true).val('N/A').css('background-color', '#D3D3D3');
                $("#occurrence_process_mc").prop('disabled', true).val('N/A').css('background-color', '#D3D3D3');
                $("#parts_removed_mc").prop('disabled', true).val('N/A').css('background-color', '#D3D3D3');
                $("#portion_treatment").prop('disabled', true).val('N/A').css('background-color', '#D3D3D3');
            }
            else if ($(this).val() === "Defect & Mancost") {
                $("#line_no").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#line_category_dr").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#date_detected").prop('type', 'date').prop('disabled', false).val('').css('background-color', '#FFF');
                $("#na_date_detected").prop('disabled', true).val('').css('background-color', '#FFF');
                $("#issue_tag").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#repairing_date").prop('disabled', false).val('').css('background-color', '#FFF');
                // $("#car_maker").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#product_name").prop('disabled', false).val('').css('background-color', '#FF1F1F1FF');
                $("#lot_no").prop('disabled', false).val('').css('background-color', '#F1F1F1');
                $("#serial_no").prop('disabled', false).val('').css('background-color', '#F1F1F1');
                $("#discovery_process_dr").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#discovery_id_no_dr").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#discovery_person").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#occurrence_process_dr").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#occurrence_shift_dr").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#occurrence_id_no_dr").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#occurrence_person").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#outflow_process_dr").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#outflow_shift_dr").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#outflow_id_no_dr").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#outflow_person").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#defect_category_dr").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#sequence_no").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#defect_cause_dr").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#repair_person_dr").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#detail_content_defect").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#treatment_content_defect").prop('disabled', false).val('').css('background-color', '#FFF');

                $("#repair_start_mc").prop('type', 'time').prop('disabled', false).val('').css('background-color', '#FFF');
                $("#na_repair_start").prop('disabled', true).val('').css('background-color', '#FFF');
                $("#repair_end_mc").prop('type', 'time').prop('disabled', false).val('').css('background-color', '#FFF');
                $("#na_repair_end").prop('disabled', true).val('').css('background-color', '#FFF');
                $("#time_consumed_mc").prop('type', 'int').prop('disabled', false).val('').css('background-color', '#F1F1F1');
                $("#na_time_consumed").prop('disabled', true).val('').css('background-color', '#F1F1F1');
                $("#manhour_cost_mc").prop('type', 'float').prop('disabled', false).val('').css('background-color', '#F1F1F1');
                $("#na_manhour_cost").prop('disabled', true).val('').css('background-color', '#F1F1F1');
                $("#quantity_mc").prop('type', 'int').prop('disabled', false).val('').css('background-color', '#FFF');
                $("#na_quantity").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#unit_cost_mc").prop('type', 'float').prop('disabled', false).val('').css('background-color', '#F1F1F1');
                $("#na_unit_cost").prop('disabled', false).val('').css('background-color', '#F1F1F1');
                $("#material_cost_mc").prop('type', 'float').prop('disabled', false).val('').css('background-color', '#F1F1F1');
                $("#na_material_cost").prop('disabled', true).val('').css('background-color', '#F1F1F1');
                $("#defect_category_mc").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#occurrence_process_mc").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#parts_removed_mc").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#portion_treatment").prop('disabled', false).val('').css('background-color', '#FFF');
            }
            else {
                // If 'White Tag', enable the date input, disable the text input, and clear their values
                $("#line_no").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#line_category_dr").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#date_detected").prop('type', 'date').prop('disabled', false).val('').css('background-color', '#FFF');
                $("#na_date_detected").prop('disabled', true).val('').css('background-color', '#FFF');
                $("#issue_tag").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#repairing_date").prop('disabled', false).val('').css('background-color', '#FFF');
                // $("#car_maker").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#product_name").prop('disabled', false).val('').css('background-color', '#F1F1F1');
                $("#lot_no").prop('disabled', false).val('').css('background-color', '#F1F1F1');
                $("#serial_no").prop('disabled', false).val('').css('background-color', '#F1F1F1');
                $("#discovery_process_dr").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#discovery_id_no_dr").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#discovery_person").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#occurrence_process_dr").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#occurrence_shift_dr").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#occurrence_id_no_dr").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#occurrence_person").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#outflow_process_dr").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#outflow_shift_dr").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#outflow_id_no_dr").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#outflow_person").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#defect_category_dr").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#sequence_no").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#defect_cause_dr").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#repair_person_dr").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#detail_content_defect").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#treatment_content_defect").prop('disabled', false).val('').css('background-color', '#FFF');

                $("#repair_start_mc").prop('type', 'time').prop('disabled', false).val('').css('background-color', '#FFF');
                $("#na_repair_start").prop('disabled', true).val('').css('background-color', '#FFF');
                $("#repair_end_mc").prop('type', 'time').prop('disabled', false).val('').css('background-color', '#FFF');
                $("#na_repair_end").prop('disabled', true).val('').css('background-color', '#FFF');
                $("#time_consumed_mc").prop('type', 'int').prop('disabled', false).val('').css('background-color', '#F1F1F1');
                $("#na_time_consumed").prop('disabled', true).val('').css('background-color', '#F1F1F1');
                $("#manhour_cost_mc").prop('type', 'float').prop('disabled', false).val('').css('background-color', '#F1F1F1');
                $("#na_manhour_cost").prop('disabled', true).val('').css('background-color', '#F1F1F1');
                $("#quantity_mc").prop('type', 'int').prop('disabled', false).val('').css('background-color', '#FFF');
                $("#na_quantity").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#unit_cost_mc").prop('type', 'float').prop('disabled', false).val('').css('background-color', '#F1F1F1');
                $("#na_unit_cost").prop('disabled', false).val('').css('background-color', '#F1F1F1');
                $("#material_cost_mc").prop('type', 'float').prop('disabled', false).val('').css('background-color', '#F1F1F1');
                $("#na_material_cost").prop('disabled', true).val('').css('background-color', '#F1F1F1');
                $("#defect_category_mc").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#occurrence_process_mc").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#parts_removed_mc").prop('disabled', false).val('').css('background-color', '#FFF');
                $("#portion_treatment").prop('disabled', false).val('').css('background-color', '#FFF');

                $("input[name='na_white_tag_defect']").change(function () {
                    console.log("N/A radio button changed");

                    var isNA = $(this).is(":checked");

                    // List out repair-related field IDs and disable or enable them based on the N/A radio button
                    var repairFieldIds = ["repair_start_mc", "na_repair_start", "repair_end_mc", "na_repair_end", "time_consumed_mc", "na_time_consumed", "manhour_cost_mc", "na_manhour_cost", "quantity_mc", "na_quantity", "unit_cost_mc", "na_unit_cost", "material_cost_mc", "na_material_cost", "defect_category_mc", "occurrence_process_mc", "parts_removed_mc", "portion_treatment"];

                    $.each(repairFieldIds, function (index, fieldId) {
                        var $field = $("#" + fieldId);
                        $field.prop('disabled', isNA);

                        // Set value to 'N/A' and background color to gray if the field is disabled
                        if (isNA) {
                            if ($field.attr('type') === 'time') {
                                // Convert to text input temporarily
                                $field.attr('type', 'text');
                            }
                            $field.val('N/A').css('background-color', '#D3D3D3');
                        } else {
                            // Convert back to time input
                            if ($field.attr('type') === 'text') {
                                $field.attr('type', 'time');
                            }
                            $field.val('').css('background-color', '#FFF');
                        }
                    });
                });
            }
        });
    });

    // ISSUE TAG NUMBER FUNCTION, INCREMENTS DEPENDING ON THE LINE NUMBER
    $(document).on('input', '#line_no', function () {
        update_issue_tag(this.value);
        // update_car_maker(this.value);
    });

    // Attach event listener to the car_maker input
    $(document).on('input', '#car_maker', function () {
        handleCarMakerChange(this);
    });

    // qr scan function
    function handleCarMakerChange(selectOpt) {
        var carMaker = selectOpt.value;
        switch (carMaker) {
            case 'Honda':
                document.getElementById('qr_scan').disabled = false;
                handleHondaScan();
                break;
            case 'Mazda':
                document.getElementById('qr_scan').disabled = false;
                handleMazdaScan();
                break;
            case 'Nissan':
                document.getElementById('qr_scan').disabled = false;
                handleNissanScan();
                break;
            case 'Subaru':
                document.getElementById('qr_scan').disabled = false;
                handleSubaruScan();
                break;
            case 'Suzuki':
                document.getElementById('qr_scan').disabled = false;
                handleSuzukiScan();
                break;
            case 'Toyota':
                document.getElementById('qr_scan').disabled = false;
                handleToyotaScan();
                break;
            case 'Daihatsu':
                document.getElementById('qr_scan').disabled = false;
                handleDaihatsuScan();
                break;
            default:
                document.getElementById('qr_scan').disabled = true;
                break;
        }
    }

    // ============================================================================
    // WORKING SCAN IN LIVE
    // IMPLEMENTED IN PRODUCTION
    function handleSuzukiScan() {
        document.getElementById('qr_scan').addEventListener('keyup', function (e) {
            if (e.which === 13) {
                e.preventDefault();
                var qrCode = this.value;
                if (qrCode.length === 50) {
                    document.getElementById('product_name').value = qrCode.substring(10, 35);
                    document.getElementById('lot_no').value = qrCode.substring(35, 41);
                    document.getElementById('serial_no').value = qrCode.substring(41, 50);

                    this.value = '';
                }
                else {

                }
            }
        });
    }

    function handleMazdaScan() {
        document.getElementById('qr_scan').addEventListener('keyup', function (e) {
            if (e.which === 13) {
                e.preventDefault();
                var qrCode = this.value;
                if (qrCode.length === 50) {
                    document.getElementById('product_name').value = qrCode.substring(10, 35);
                    document.getElementById('lot_no').value = qrCode.substring(35, 41);
                    document.getElementById('serial_no').value = qrCode.substring(41, 50);

                    this.value = '';
                }
                else {

                }
            }
        });
    }

    // NOT YET IMPLEMENTED IN PRODUCTION
    function handleDaihatsuScan() {
        document.getElementById('qr_scan').addEventListener('keyup', function (e) {
            if (e.which === 13) {
                e.preventDefault();
                var qrCode = this.value;
                if (qrCode.length === 50) {
                    document.getElementById('product_name').value = qrCode.substring(10, 35);
                    document.getElementById('lot_no').value = qrCode.substring(35, 41);
                    document.getElementById('serial_no').value = qrCode.substring(41, 50);

                    this.value = '';
                }
                else {

                }
            }
        });
    }

    function handleHondaScan() {
        document.getElementById('qr_scan').addEventListener('keyup', function (e) {
            if (e.which === 13) {
                e.preventDefault();
                var qrCode = this.value;
                if (qrCode.length === 50) {
                    document.getElementById('product_name').value = qrCode.substring(10, 35);
                    document.getElementById('lot_no').value = qrCode.substring(35, 41);
                    document.getElementById('serial_no').value = qrCode.substring(41, 50);

                    this.value = '';
                }
                else {

                }
            }
        });
    }

    function handleNissanScan() {
        document.getElementById('qr_scan').addEventListener('keyup', function (e) {
            if (e.which === 13) {
                e.preventDefault();
                var qrCode = this.value;
                if (qrCode.length === 50) {
                    document.getElementById('product_name').value = qrCode.substring(10, 35);
                    document.getElementById('lot_no').value = qrCode.substring(35, 41);
                    document.getElementById('serial_no').value = qrCode.substring(41, 50);

                    this.value = '';
                }
                else {

                }
            }
        });
    }

    function handleSubaruScan() {
        document.getElementById('qr_scan').addEventListener('keyup', function (e) {
            if (e.which === 13) {
                e.preventDefault();
                var qrCode = this.value;
                if (qrCode.length === 50) {
                    document.getElementById('product_name').value = qrCode.substring(10, 35);
                    document.getElementById('lot_no').value = qrCode.substring(35, 41);
                    document.getElementById('serial_no').value = qrCode.substring(41, 50);

                    this.value = '';
                }
                else {

                }
            }
        });
    }

    function handleToyotaScan() {
        document.getElementById('qr_scan').addEventListener('keyup', function (e) {
            if (e.which === 13) {
                e.preventDefault();
                var qrCode = this.value;
                if (qrCode.length === 50) {
                    document.getElementById('product_name').value = qrCode.substring(10, 35);
                    document.getElementById('lot_no').value = qrCode.substring(35, 41);
                    document.getElementById('serial_no').value = qrCode.substring(41, 50);

                    this.value = '';
                }
                else {

                }
            }
        });
    }

    // ============================================================================

    // function handleHondaScan() {
    //     console.log('honda is selected');
    //     document.getElementById('qr_scan').addEventListener('keydown', function (e) {
    //         if (e.which === 13) {
    //             e.preventDefault();
    //             var qrCode = this.value;
    //             if (qrCode.length === 41) {
    //                 document.getElementById('product_name').value = qrCode.substring(1, 22);
    //                 document.getElementById('lot_no').value = qrCode.substring(26, 33);
    //                 document.getElementById('serial_no').value = qrCode.substring(32, 38);
    //             } else {
    //                 // alert('Invalid QR code');
    //                 Swal.fire({
    //                     icon: 'error',
    //                     title: 'Invalid QR Code',
    //                     text: 'Invalid',
    //                     showConfirmButton: false,
    //                     timer: 1000
    //                 });
    //             } document.getElementById('qr_scan').value = '';
    //         }
    //     });
    // }

    // function handleMazdaScan() {
    //     console.log('mazda is selected');
    //     document.getElementById('qr_scan').addEventListener('keyup', function (e) {
    //         if (e.which === 13) {
    //             e.preventDefault();
    //             var qrCode = this.value;
    //             if (qrCode.length === 50) {
    //                 document.getElementById('product_name').value = qrCode.substring(10, 35);
    //                 document.getElementById('lot_no').value = qrCode.substring(35, 41);
    //                 document.getElementById('serial_no').value = qrCode.substring(41, 50);
    //                 // Clear the qr_scan input field after processing
    //                 this.value = '';
    //             }
    //             else {
    //                 // Invalid QR code
    //                 // Swal.fire({
    //                 //     icon: 'error',
    //                 //     title: 'Invalid QR Code',
    //                 //     showConfirmButton: false,
    //                 //     timer: 1000
    //                 // });
    //             }
    //         }
    //     });
    // }

    // function handleNissanScan() {
    //     console.log('nissan is selected');
    //     document.getElementById('qr_scan').addEventListener('keydown', function (e) {
    //         if (e.which === 13) {
    //             e.preventDefault();
    //             var qrCode = this.value;
    //             if (qrCode.length === 41) {
    //                 document.getElementById('product_name').value = qrCode.substring(1, 22);
    //                 document.getElementById('lot_no').value = qrCode.substring(26, 33);
    //                 document.getElementById('serial_no').value = qrCode.substring(32, 38);
    //             } else {
    //                 // alert('Invalid QR code');
    //                 Swal.fire({
    //                     icon: 'error',
    //                     title: 'Invalid QR Code',
    //                     text: 'Invalid',
    //                     showConfirmButton: false,
    //                     timer: 1000
    //                 });
    //             } document.getElementById('qr_scan').value = '';
    //         }
    //     });
    // }

    // function handleSubaruScan() {
    //     console.log('subaru is selected');
    //     document.getElementById('qr_scan').addEventListener('keydown', function (e) {
    //         if (e.which === 13) {
    //             e.preventDefault();
    //             var qrCode = this.value;
    //             if (qrCode.length === 41) {
    //                 document.getElementById('product_name').value = qrCode.substring(1, 22);
    //                 document.getElementById('lot_no').value = qrCode.substring(26, 33);
    //                 document.getElementById('serial_no').value = qrCode.substring(32, 38);
    //             } else {
    //                 // alert('Invalid QR code');
    //                 Swal.fire({
    //                     icon: 'error',
    //                     title: 'Invalid QR Code',
    //                     text: 'Invalid',
    //                     showConfirmButton: false,
    //                     timer: 1000
    //                 });
    //             } document.getElementById('qr_scan').value = '';
    //         }
    //     });
    // }

    // function handleSuzukiScan() {
    //     document.getElementById('qr_scan').addEventListener('keyup', function (e) {
    //         var qrCode = this.value;
    //         var exactLength = qrCode.length;

    //         if (qrCode.trim().length > 0 && qrCode.length >= 50) {
    //             e.preventDefault();
    //             qrCode = qrCode.trim();
    //             var millisecond = new Date().getMilliseconds(); // Get current milliseconds

    //             document.getElementById('product_name').value = qrCode.substring(10, 35);
    //             document.getElementById('lot_no').value = qrCode.substring(35, 41);
    //             document.getElementById('serial_no').value = qrCode.substring(41, 50);

    //             document.getElementById('qr_scan').value = '';
    //         } else if (qrCode.length > 0) {
    //             console.error('Invalid QR code length:', qrCode.length);

    //             Swal.fire({
    //                 icon: 'error',
    //                 title: 'Invalid QR Code',
    //                 text: 'Invalid',
    //                 showConfirmButton: false,
    //                 timer: 1000
    //             }).then(function () {
    //                 setTimeout(function () {
    //                     document.getElementById('qr_scan').value = '';
    //                 }, 500);
    //             });
    //         }
    //     });
    // }

    // function handleSuzukiScan() {
    //     console.log('Suzuki is selected');
    //     document.getElementById('qr_scan').addEventListener('keyup', function (e) {
    //         var qrCode = this.value;
    //         var exactLength = qrCode.length;

    //         console.log('Exact Length:', exactLength);

    //         if (exactLength >= 50) {
    //             e.preventDefault();

    //             var setting = qr_setting;

    //             if (setting) {
    //                 var product_start = setting.product_name_start;
    //                 var product_length = setting.product_name_length;
    //                 var lot_start = setting.lot_no_start;
    //                 var lot_length = setting.lot_no_length;
    //                 var serial_start = setting.serial_no_start;
    //                 var serial_length = setting.serial_no_length;

    //                 document.getElementById('product_name').value = qrCode.substring(product_start, product_start + product_length);
    //                 document.getElementById('lot_no').value = qrCode.substring(lot_start, lot_start + lot_length);
    //                 document.getElementById('serial_no').value = qrCode.substring(serial_start, serial_start + serial_length);
    //             } else {
    //                 console.error('QR setting is not defined or invalid');
    //                 // You can display an error message to the user here
    //             }

    //             document.getElementById('qr_scan').value = '';
    //         } else if (exactLength > 0) {
    //             console.error('Invalid QR code length:', exactLength);

    //             Swal.fire({
    //                 icon: 'error',
    //                 title: 'Invalid QR Code',
    //                 text: 'Invalid',
    //                 showConfirmButton: false,
    //                 timer: 1000
    //             }).then(function () {
    //                 setTimeout(function () {
    //                     document.getElementById('qr_scan').value = '';
    //                 }, 500);
    //             });
    //         }
    //     });
    // }

    // function handleToyotaScan() {
    //     console.log('toyota is selected');
    //     document.getElementById('qr_scan').addEventListener('keydown', function (e) {
    //         if (e.which === 13) {
    //             e.preventDefault();
    //             var qrCode = this.value;
    //             if (qrCode.length === 41) {
    //                 document.getElementById('product_name').value = qrCode.substring(1, 22);
    //                 document.getElementById('lot_no').value = qrCode.substring(26, 33);
    //                 document.getElementById('serial_no').value = qrCode.substring(32, 38);
    //             } else {
    //                 // alert('Invalid QR code');
    //                 Swal.fire({
    //                     icon: 'error',
    //                     title: 'Invalid QR Code',
    //                     text: 'Invalid',
    //                     showConfirmButton: false,
    //                     timer: 1000
    //                 });
    //             } document.getElementById('qr_scan').value = '';
    //         }
    //     });
    // }

    // function handleDaihatsuScan() {
    //     console.log('daihatsu is selected');
    //     document.getElementById('qr_scan').addEventListener('keydown', function (e) {
    //         if (e.which === 13) {
    //             e.preventDefault();
    //             var qrCode = this.value;
    //             if (qrCode.length === 41) {
    //                 document.getElementById('product_name').value = qrCode.substring(1, 22);
    //                 document.getElementById('lot_no').value = qrCode.substring(26, 33);
    //                 document.getElementById('serial_no').value = qrCode.substring(32, 38);
    //             } else {
    //                 // alert('Invalid QR code');
    //                 Swal.fire({
    //                     icon: 'error',
    //                     title: 'Invalid QR Code',
    //                     text: 'Invalid',
    //                     showConfirmButton: false,
    //                     timer: 1000
    //                 });
    //             } document.getElementById('qr_scan').value = '';
    //         }
    //     });
    // }



    // $(document).ready(function () {
    //     fetchQRSettings().then(function (qr_setting) {
    //         if (qr_setting) {
    //             window.qr_setting = qr_setting;
    //         } else {
    //             window.qr_setting = null;
    //         }
    //     });
    // });

    // function fetchQRSettings() {
    //     return $.ajax({
    //         url: '../../process/pd/defect_monitoring_record_rp_p.php',
    //         type: 'POST',
    //         dataType: 'json',
    //         data: { method: 'fetch_qr_setting' },
    //         success: function (response) {
    //             console.log('QR Settings:', response.qr_setting);
    //             return response.qr_setting;
    //         },
    //         error: function (xhr, status, error) {
    //             console.error('Error fetching QR settings:', error);
    //             console.log('XHR response:', xhr.responseText);
    //             return null;
    //         }
    //     });
    // }

    // function handleCarMakerChange(selectOpt) {
    //     var carMaker = selectOpt.value;
    //     switch (carMaker) {
    //         case 'Honda':
    //             document.getElementById('qr_scan').disabled = false;
    //             handle_qr_scan();
    //             break;
    //         case 'Mazda':
    //             document.getElementById('qr_scan').disabled = false;
    //             handle_qr_scan();
    //             break;
    //         case 'Nissan':
    //             document.getElementById('qr_scan').disabled = false;
    //             handle_qr_scan();
    //             break;
    //         case 'Subaru':
    //             document.getElementById('qr_scan').disabled = false;
    //             handle_qr_scan();
    //             break;
    //         case 'Suzuki':
    //             document.getElementById('qr_scan').disabled = false;
    //             handle_qr_scan();
    //             break;
    //         case 'Toyota':
    //             document.getElementById('qr_scan').disabled = false;
    //             handle_qr_scan();
    //             break;
    //         case 'Daihatsu':
    //             document.getElementById('qr_scan').disabled = false;
    //             handle_qr_scan();
    //             break;
    //         default:
    //             document.getElementById('qr_scan').disabled = true;
    //             break;
    //     }
    // }

    // function handle_qr_scan() {
    //     document.getElementById('qr_scan').addEventListener('keyup', function (e) {
    //         var qrCode = this.value;
    //         var exactLength = qrCode.length;

    //         // console.log('Exact Length:', exactLength);
    //         // console.log('QR Code:', qrCode);

    //         if (exactLength >= 50) {
    //             e.preventDefault();

    //             if (typeof qr_setting !== 'undefined' && qr_setting !== null && qr_setting.product_name_start !== '0') {
    //                 var setting = qr_setting;
    //                 // console.log('Settings:', setting);

    //                 var product_start = parseInt(setting.product_name_start);
    //                 var product_length = parseInt(setting.product_name_length);
    //                 var lot_start = parseInt(setting.lot_no_start);
    //                 var lot_length = parseInt(setting.lot_no_length);
    //                 var serial_start = parseInt(setting.serial_no_start);
    //                 var serial_length = parseInt(setting.serial_no_length);

    //                 var productName = qrCode.substring(product_start, product_start + product_length);
    //                 var lotNo = qrCode.substring(lot_start, lot_start + lot_length);
    //                 var serialNo = qrCode.substring(serial_start, serial_start + serial_length);

    //                 console.log('Product Name:', productName);
    //                 console.log('Lot No:', lotNo);
    //                 console.log('Serial No:', serialNo);

    //                 document.getElementById('product_name').value = productName;
    //                 document.getElementById('lot_no').value = lotNo;
    //                 document.getElementById('serial_no').value = serialNo;
    //             } else {
    //                 console.error('QR setting is not defined or invalid');
    //                 Swal.fire({
    //                     icon: 'error',
    //                     title: 'Invalid QR Setting',
    //                     showConfirmButton: false
    //                 });
    //             }

    //             document.getElementById('qr_scan').value = '';

    //             console.log(qr_setting);
    //         } else if (exactLength > 0) {
    //             console.error('Invalid QR code length:', exactLength);

    //             Swal.fire({
    //                 icon: 'error',
    //                 title: 'Invalid QR Code',
    //                 text: 'Invalid QR code length',
    //                 showConfirmButton: false,
    //                 timer: 1000
    //             }).then(function () {
    //                 setTimeout(function () {
    //                     document.getElementById('qr_scan').value = '';
    //                 }, 500);
    //             });
    //         }
    //     });
    // }

    // document.addEventListener('DOMContentLoaded', function () {
    //     handle_qr_scan();
    // });

    function handle_line_no_change(line_no) {
        update_car_maker(line_no);
        update_issue_tag(line_no);
    }

    function update_car_maker(line_no) {
        var car_maker_input = document.getElementById("car_maker");

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

    document.getElementById("line_no").addEventListener("input", function () {
        handle_line_no_change(this.value);
    });

    document.getElementById("line_no").addEventListener("input", function () {
        update_issue_tag(this.value);
    });

    function update_issue_tag(line_no) {
        var issue_tag_input = document.getElementById("issue_tag");

        if (line_no.trim() === '') {
            issue_tag_input.value = '';
            return;
        }

        $.ajax({
            url: '../../process/pd/defect_monitoring_record_rp_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'get_issue_tag',
                line_no: line_no
            },
            success: function (response) {
                console.log('Response:', response);
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


    // function get_issue_tag_no(line_no) {
    //     if (!getIssueTag.counter) {
    //         getIssueTag.counter = 1;
    //     } else {
    //         getIssueTag.counter++;
    //     }
    //     return getIssueTag.counter;
    // }

    function clearInputFields() {
        var inputFieldIds = ['issue_tag', 'car_maker'];
        for (var i = 0; i < inputFieldIds.length; i++) {
            var fieldId = inputFieldIds[i];
            document.getElementById(fieldId).value = '';
        }

        // Clear the value of the record_type
        $("input[name='record_type']").prop('checked', false);

        // reset fields with 'N/A'
        $("#line_no").prop('disabled', true).val('').css('background-color', '#FFF');
        $("#line_category_dr").prop('disabled', true).val('').css('background-color', '#FFF');
        $("#date_detected").prop('type', 'date').prop('disabled', true).val('').css('background-color', '#FFF');
        $("#na_date_detected").prop('disabled', true).val('').css('background-color', '#FFF');
        $("#issue_tag").prop('disabled', true).val('').css('background-color', '#FFF');
        $("#repairing_date").prop('disabled', true).val('').css('background-color', '#FFF');
        $("#car_maker").prop('disabled', true).val('').css('background-color', '#FFF');
        $("#qr_scan").prop('disabled', true).val('').css('background-color', '#FFF');
        $("#product_name").prop('disabled', true).val('').css('background-color', '#FFF');
        $("#lot_no").prop('disabled', true).val('').css('background-color', '#FFF');
        $("#serial_no").prop('disabled', true).val('').css('background-color', '#FFF');
        $("#discovery_process_dr").prop('disabled', true).val('').css('background-color', '#FFF');
        $("#discovery_id_no_dr").prop('disabled', true).val('').css('background-color', '#FFF');
        $("#discovery_person").prop('disabled', true).val('').css('background-color', '#FFF');
        $("#occurrence_process_dr").prop('disabled', true).val('').css('background-color', '#FFF');
        $("#occurrence_shift_dr").prop('disabled', true).val('').css('background-color', '#FFF');
        $("#occurrence_id_no_dr").prop('disabled', true).val('').css('background-color', '#FFF');
        $("#occurrence_person").prop('disabled', true).val('').css('background-color', '#FFF');
        $("#outflow_process_dr").prop('disabled', true).val('').css('background-color', '#FFF');
        $("#outflow_shift_dr").prop('disabled', true).val('').css('background-color', '#FFF');
        $("#outflow_id_no_dr").prop('disabled', true).val('').css('background-color', '#FFF');
        $("#outflow_person").prop('disabled', true).val('').css('background-color', '#FFF');
        $("#defect_category_dr").prop('disabled', true).val('').css('background-color', '#FFF');
        $("#sequence_no").prop('disabled', true).val('').css('background-color', '#FFF');
        $("#defect_cause_dr").prop('disabled', true).val('').css('background-color', '#FFF');
        $("#repair_person_dr").prop('disabled', true).val('').css('background-color', '#FFF');
        $("#detail_content_defect").prop('disabled', true).val('').css('background-color', '#FFF');
        $("#treatment_content_defect").prop('disabled', true).val('').css('background-color', '#FFF');
    }

    // add defect record and mancost
    const add_defect_mancost_record = () => {
        $('#list_of_added_mancost').empty();

        var record_type = $("input[name='record_type']:checked").val();

        var line_no = document.getElementById("line_no").value.trim();
        var line_category_dr = document.getElementById("line_category_dr").value.trim();

        var date_detected = document.getElementById("date_detected").value.trim();
        var issue_tag = document.getElementById("issue_tag").value.trim();
        var repairing_date = document.getElementById("repairing_date").value.trim();
        var car_maker = document.getElementById("car_maker").value.trim();
        var product_name = document.getElementById("product_name").value.trim();
        var lot_no = document.getElementById("lot_no").value.trim();
        var serial_no = document.getElementById("serial_no").value.trim();
        var discovery_process_dr = document.getElementById("discovery_process_dr").value.trim();
        var discovery_id_no_dr = document.getElementById("discovery_id_no_dr").value.trim();
        var discovery_person = document.getElementById("discovery_person").value.trim();
        var occurrence_process_dr = document.getElementById("occurrence_process_dr").value.trim();
        var occurrence_shift_dr = document.getElementById("occurrence_shift_dr").value.trim();
        var occurrence_id_no_dr = document.getElementById("occurrence_id_no_dr").value.trim();
        var occurrence_person = document.getElementById("occurrence_person").value.trim();
        var outflow_process_dr = document.getElementById("outflow_process_dr").value.trim();
        var outflow_shift_dr = document.getElementById("outflow_shift_dr").value.trim();
        var outflow_id_no_dr = document.getElementById("outflow_id_no_dr").value.trim();
        var outflow_person = document.getElementById("outflow_person").value.trim();
        var defect_category_dr = document.getElementById("defect_category_dr").value.trim();
        var sequence_no = document.getElementById("sequence_no").value.trim();
        var defect_cause_dr = document.getElementById("defect_cause_dr").value.trim();
        var repair_person_dr = document.getElementById("repair_person_dr").value.trim();
        var detail_content_defect = document.getElementById("detail_content_defect").value.trim();
        var treatment_content_defect = document.getElementById("treatment_content_defect").value.trim();

        var repair_start_mc = document.getElementById("repair_start_mc").value.trim();
        var repair_end_mc = document.getElementById("repair_end_mc").value.trim();
        var time_consumed_mc = document.getElementById("time_consumed_mc").value;
        var defect_category_mc = document.getElementById("defect_category_mc").value.trim();
        var occurrence_process_mc = document.getElementById("occurrence_process_mc").value.trim();
        var parts_removed_mc = document.getElementById("parts_removed_mc").value.trim();
        var quantity_mc = document.getElementById("quantity_mc").value.trim();
        var unit_cost_mc = document.getElementById("unit_cost_mc").value.trim();
        var material_cost_mc = document.getElementById("material_cost_mc").value;
        var manhour_cost_mc = document.getElementById("manhour_cost_mc").value;
        var portion_treatment = document.getElementById("portion_treatment").value.trim();

        var defect_id = document.getElementById('defect_id_no').value;

        $.ajax({
            url: '../../process/pd/defect_monitoring_record_rp_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'add_defect_mancost_record',
                record_type: record_type,
                line_no: line_no,
                line_category_dr: line_category_dr,
                date_detected: date_detected,
                issue_tag: issue_tag,
                repairing_date: repairing_date,
                car_maker: car_maker,
                product_name: product_name,
                lot_no: lot_no,
                serial_no: serial_no,
                discovery_process_dr: discovery_process_dr,
                discovery_id_no_dr: discovery_id_no_dr,
                discovery_person: discovery_person,
                occurrence_process_dr: occurrence_process_dr,
                occurrence_shift_dr: occurrence_shift_dr,
                occurrence_id_no_dr: occurrence_id_no_dr,
                occurrence_person: occurrence_person,
                outflow_process_dr: outflow_process_dr,
                outflow_shift_dr: outflow_shift_dr,
                outflow_id_no_dr: outflow_id_no_dr,
                outflow_person: outflow_person,
                defect_category_dr: defect_category_dr,
                sequence_no: sequence_no,
                defect_cause_dr: defect_cause_dr,
                repair_person_dr: repair_person_dr,
                detail_content_defect: detail_content_defect,
                treatment_content_defect: treatment_content_defect,

                repair_start_mc: repair_start_mc,
                repair_end_mc: repair_end_mc,
                time_consumed_mc: time_consumed_mc,
                defect_category_mc: defect_category_mc,
                occurrence_process_mc: occurrence_process_mc,
                parts_removed_mc: parts_removed_mc,
                quantity_mc: quantity_mc,
                unit_cost_mc: unit_cost_mc,
                material_cost_mc: material_cost_mc,
                manhour_cost_mc: manhour_cost_mc,
                portion_treatment: portion_treatment,
                defect_id: defect_id
            },
            success: function (response) {
                console.log("Response from server:", response);
                response = response.trim();

                if (response == 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Successfully Recorded',
                        text: 'Success',
                        showConfirmButton: false,
                        timer: 1500
                    });

                    $('#record_type').val('');
                    $('#line_no').val('');
                    $('#line_category_dr').val('');
                    $('#date_detected').val('');
                    $('#issue_tag').val('');
                    $('#repairing_date').val('');
                    $('#car_maker').val('');
                    $('#product_name').val('');
                    $('#lot_no').val('');
                    $('#serial_no').val('');
                    $('#discovery_process_dr').val('');
                    $('#discovery_id_no_dr').val('');
                    $('#discovery_person').val('');
                    $('#occurrence_process_dr').val('');
                    $('#occurrence_shift_dr').val('');
                    $('#occurrence_id_no_dr').val('');
                    $('#occurrence_person').val('');
                    $('#outflow_process_dr').val('');
                    $('#outflow_shift_dr').val('');
                    $('#outflow_id_no_dr').val('');
                    $('#outflow_person').val('');
                    $('#defect_category_dr').val('');
                    $('#sequence_no').val('');
                    $('#defect_cause_dr').val('');
                    $('#repair_person_dr').val('');
                    $('#detail_content_defect').val('');
                    $('#treatment_content_defect').val('');

                    $('#repair_start_mc').val('');
                    $('#repair_end_mc').val('');
                    $('#time_consumed_mc').val('');
                    $('#defect_category_mc').val('');
                    $('#occurrence_process_mc').val('');
                    $('#parts_removed_mc').val('');
                    $('#quantity_mc').val('');
                    $('#unit_cost_mc').val('');
                    $('#material_cost_mc').val('');
                    $('#manhour_cost_mc').val('');
                    $('#portion_treatment').val('');

                    $('#defect_id').val('');

                    clearInputFields();
                    load_defect_table();

                    $('#add_defect_mancost_2').modal('hide');

                    // setTimeout(function () {
                    //     location.reload();
                    // }, 500);
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

    // --------------------------------------------
    // highlight input field when empty
    document.getElementById("line_no").addEventListener("input", function () {
        var line_no = this;
        line_no.classList.remove('highlight');
        document.getElementById("lineError").style.display = 'none';
    })

    document.getElementById("line_category_dr").addEventListener("input", function () {
        var line_category_dr = this;
        line_category_dr.classList.remove('highlight');
        document.getElementById("lineCategoryError").style.display = 'none';
    })

    document.getElementById("date_detected").addEventListener("input", function () {
        var date_detected = this;
        date_detected.classList.remove('highlight');
        document.getElementById("dateDetectedError").style.display = 'none';
    })

    document.getElementById("issue_tag").addEventListener("input", function () {
        var issue_tag = this;
        issue_tag.classList.remove('highlight');
        // document.getElementById("issueTagError").style.display = 'none';
    })

    document.getElementById("repairing_date").addEventListener("input", function () {
        var repairing_date = this;
        repairing_date.classList.remove('highlight');
        document.getElementById("repairingDateError").style.display = 'none';
    })

    document.getElementById("car_maker").addEventListener("input", function () {
        var car_maker = this;
        car_maker.classList.remove('highlight');
        // document.getElementById("carMakerError").style.display = 'none';
    })

    document.getElementById("qr_scan").addEventListener("keyup", function () {
        var qr_scan = this;
        qr_scan.classList.remove('highlight');
        document.getElementById("scanQrError").style.display = 'none';
    })

    document.getElementById("product_name").addEventListener("keyup", function (e) {
        var product_name = this;
        product_name.classList.remove('highlight');
        // document.getElementById("productNameError").style.display = 'none';
    })

    document.getElementById("lot_no").addEventListener("keyup", function (e) {
        var lot_no = this;
        lot_no.classList.remove('highlight');
        // document.getElementById("lotNumberError").style.display = 'none';
    })

    document.getElementById("serial_no").addEventListener("keyup", function (e) {
        var serial_no = this;
        serial_no.classList.remove('highlight');
        // document.getElementById("serialNumberError").style.display = 'none';
    })

    document.getElementById("discovery_process_dr").addEventListener("input", function () {
        var discovery_process_dr = this;
        discovery_process_dr.classList.remove('highlight');
        document.getElementById("discoveryProcessError").style.display = 'none';
    })

    document.getElementById("discovery_id_no_dr").addEventListener("input", function () {
        var discovery_id_no_dr = this;
        discovery_id_no_dr.classList.remove('highlight');
        document.getElementById("discoveryIDError").style.display = 'none';
    })

    document.getElementById("discovery_person").addEventListener("input", function () {
        var discovery_person = this;
        discovery_person.classList.remove('highlight');
        document.getElementById("discoveryPersonError").style.display = 'none';
    })

    document.getElementById("occurrence_process_dr").addEventListener("input", function () {
        var occurrence_process_dr = this;
        occurrence_process_dr.classList.remove('highlight');
        document.getElementById("occurrenceProcessError").style.display = 'none';
    })

    document.getElementById("occurrence_shift_dr").addEventListener("input", function () {
        var occurrence_shift_dr = this;
        occurrence_shift_dr.classList.remove('highlight');
        document.getElementById("occurrenceShiftError").style.display = 'none';
    })

    document.getElementById("occurrence_id_no_dr").addEventListener("input", function () {
        var occurrence_id_no_dr = this;
        occurrence_id_no_dr.classList.remove('highlight');
        document.getElementById("occurrenceIDError").style.display = 'none';
    })

    document.getElementById("occurrence_person").addEventListener("input", function () {
        var occurrence_person = this;
        occurrence_person.classList.remove('highlight');
        document.getElementById("occurrencePersonError").style.display = 'none';
    })

    document.getElementById("outflow_process_dr").addEventListener("input", function () {
        var outflow_process_dr = this;
        outflow_process_dr.classList.remove('highlight');
        document.getElementById("outflowProcessError").style.display = 'none';
    })

    document.getElementById("outflow_shift_dr").addEventListener("input", function () {
        var outflow_shift_dr = this;
        outflow_shift_dr.classList.remove('highlight');
        document.getElementById("outflowShiftError").style.display = 'none';
    })

    document.getElementById("outflow_id_no_dr").addEventListener("input", function () {
        var outflow_id_no_dr = this;
        outflow_id_no_dr.classList.remove('highlight');
        document.getElementById("outflowIDError").style.display = 'none';
    })

    document.getElementById("outflow_person").addEventListener("input", function () {
        var outflow_person = this;
        outflow_person.classList.remove('highlight');
        document.getElementById("outflowPersonError").style.display = 'none';
    })
    document.getElementById("defect_category_dr").addEventListener("input", function () {
        var defect_category_dr = this;
        defect_category_dr.classList.remove('highlight');
        document.getElementById("defectCategoryError").style.display = 'none';
    })
    document.getElementById("sequence_no").addEventListener("input", function () {
        var sequence_no = this;
        sequence_no.classList.remove('highlight');
        document.getElementById("sequenceNumberError").style.display = 'none';
    })
    document.getElementById("defect_cause_dr").addEventListener("input", function () {
        var defect_cause_dr = this;
        defect_cause_dr.classList.remove('highlight');
        document.getElementById("defectCauseError").style.display = 'none';
    })
    document.getElementById("repair_person_dr").addEventListener("input", function () {
        var repair_person_dr = this;
        repair_person_dr.classList.remove('highlight');
        document.getElementById("repairPersonError").style.display = 'none';
    })
    document.getElementById("detail_content_defect").addEventListener("input", function () {
        var detail_content_defect = this;
        detail_content_defect.classList.remove('highlight');
        document.getElementById("detailDefectError").style.display = 'none';
    })
    document.getElementById("treatment_content_defect").addEventListener("input", function () {
        var treatment_content_defect = this;
        treatment_content_defect.classList.remove('highlight');
        document.getElementById("treatmentDefectError").style.display = 'none';
    })

    // ------------------------------------------------------------------------

    // go to mancost form modal
    const go_to_mc_form = () => {
        $('#list_of_added_mancost').empty();
        // console.log("Table cleared");

        var line_no = document.getElementById("line_no");
        var lineError = document.getElementById("lineError");

        var line_category_dr = document.getElementById("line_category_dr");
        var lineCategoryError = document.getElementById("lineCategoryError");

        var date_detected = document.getElementById("date_detected");
        var dateDetectedError = document.getElementById("dateDetectedError");

        var issue_tag = document.getElementById("issue_tag");

        var repairing_date = document.getElementById("repairing_date");
        var repairingDateError = document.getElementById("repairingDateError");

        var car_maker = document.getElementById("car_maker");

        var product_name = document.getElementById("product_name");

        var lot_no = document.getElementById("lot_no");

        var serial_no = document.getElementById("serial_no");

        var discovery_process_dr = document.getElementById("discovery_process_dr");
        var discoveryProcessError = document.getElementById("discoveryProcessError");

        var discovery_id_no_dr = document.getElementById("discovery_id_no_dr");
        var discoveryIDError = document.getElementById("discoveryIDError");

        var discovery_person = document.getElementById("discovery_person");
        var discoveryPersonError = document.getElementById("discoveryPersonError");

        var occurrence_process_dr = document.getElementById("occurrence_process_dr");
        var occurrenceProcessError = document.getElementById("occurrenceProcessError");

        var occurrence_shift_dr = document.getElementById("occurrence_shift_dr");
        var occurrenceShiftError = document.getElementById("occurrenceShiftError");

        var occurrence_id_no_dr = document.getElementById("occurrence_id_no_dr");
        var occurrenceIDError = document.getElementById("occurrenceIDError");

        var occurrence_person = document.getElementById("occurrence_person");
        var occurrencePersonError = document.getElementById("occurrencePersonError");

        var outflow_process_dr = document.getElementById("outflow_process_dr");
        var outflowProcessError = document.getElementById("outflowProcessError");

        var outflow_shift_dr = document.getElementById("outflow_shift_dr");
        var outflowShiftError = document.getElementById("outflowShiftError");

        var outflow_id_no_dr = document.getElementById("outflow_id_no_dr");
        var outflowIDError = document.getElementById("outflowIDError");

        var outflow_person = document.getElementById("outflow_person");
        var outflowPersonError = document.getElementById("outflowPersonError");

        var defect_category_dr = document.getElementById("defect_category_dr");
        var defectCategoryError = document.getElementById("defectCategoryError");

        var sequence_no = document.getElementById("sequence_no");
        var sequenceNumberError = document.getElementById("sequenceNumberError");

        var defect_cause_dr = document.getElementById("defect_cause_dr");
        var defectCauseError = document.getElementById("defectCauseError");

        var repair_person_dr = document.getElementById("repair_person_dr");
        var repairPersonError = document.getElementById("repairPersonError");

        var detail_content_defect = document.getElementById("detail_content_defect");
        var detailDefectError = document.getElementById("detailDefectError");

        var treatment_content_defect = document.getElementById("treatment_content_defect");
        var treatmentDefectError = document.getElementById("treatmentDefectError");

        var defect_id = document.getElementById("defect_id_no");

        if (line_no.value === '') {
            line_no.classList.add('highlight');
            lineError.style.display = 'block';
        }
        if (line_category_dr.value === '') {
            line_category_dr.classList.add('highlight');
            lineCategoryError.style.display = 'block';
        }
        if (date_detected.value === '') {
            date_detected.classList.add('highlight');
            dateDetectedError.style.display = 'block';
        }

        if (repairing_date.value === '') {
            repairing_date.classList.add('highlight');
            repairingDateError.style.display = 'block';
        }
        if (discovery_process_dr.value === '') {
            discovery_process_dr.classList.add('highlight');
            discoveryProcessError.style.display = 'block';
        }
        if (discovery_id_no_dr.value === '') {
            discovery_id_no_dr.classList.add('highlight');
            discoveryIDError.style.display = 'block';
        }
        if (discovery_person.value === '') {
            discovery_person.classList.add('highlight');
            discoveryPersonError.style.display = 'block';
        }
        if (occurrence_process_dr.value === '') {
            occurrence_process_dr.classList.add('highlight');
            occurrenceProcessError.style.display = 'block';
        }
        if (occurrence_shift_dr.value === '') {
            occurrence_shift_dr.classList.add('highlight');
            occurrenceShiftError.style.display = 'block';
        }
        if (occurrence_id_no_dr.value === '') {
            occurrence_id_no_dr.classList.add('highlight');
            occurrenceIDError.style.display = 'block';
        }
        if (occurrence_person.value === '') {
            occurrence_person.classList.add('highlight');
            occurrencePersonError.style.display = 'block';
        }
        if (outflow_process_dr.value === '') {
            outflow_process_dr.classList.add('highlight');
            outflowProcessError.style.display = 'block';
        }
        if (outflow_shift_dr.value === '') {
            outflow_shift_dr.classList.add('highlight');
            outflowShiftError.style.display = 'block';
        }
        if (outflow_id_no_dr.value === '') {
            outflow_id_no_dr.classList.add('highlight');
            outflowIDError.style.display = 'block';
        }
        if (outflow_person.value === '') {
            outflow_person.classList.add('highlight');
            outflowPersonError.style.display = 'block';
        }
        if (defect_category_dr.value === '') {
            defect_category_dr.classList.add('highlight');
            defectCategoryError.style.display = 'block';
        }
        if (sequence_no.value === '') {
            sequence_no.classList.add('highlight');
            sequenceNumberError.style.display = 'block';
        }
        if (defect_cause_dr.value === '') {
            defect_cause_dr.classList.add('highlight');
            defectCauseError.style.display = 'block';
        }
        if (repair_person_dr.value === '') {
            repair_person_dr.classList.add('highlight');
            repairPersonError.style.display = 'block';
        }
        if (detail_content_defect.value === '') {
            detail_content_defect.classList.add('highlight');
            detailDefectError.style.display = 'block';
        }
        if (treatment_content_defect.value === '') {
            treatment_content_defect.classList.add('highlight');
            treatmentDefectError.style.display = 'block';
        } else {
            const loadingAlert = Swal.fire({
                icon: 'info',
                title: 'Loading Please Wait...',
                text: 'Information',
                showConfirmButton: false,
                allowOutsideClick: false,
                allowEscapeKey: false,
                allowEnterKey: false
            });

            $.ajax({
                url: '../../process/pd/defect_monitoring_record_rp_p.php',
                type: 'POST',
                cache: false,
                data: {
                    method: 'go_to_mc_form',
                    line_no: line_no.value,
                    line_category_dr: line_category_dr.value,
                    date_detected: date_detected.value,
                    issue_tag: issue_tag.value,
                    repairing_date: repairing_date.value,
                    car_maker: car_maker.value,
                    product_name: product_name.value,
                    lot_no: lot_no.value,
                    serial_no: serial_no.value,
                    discovery_process_dr: discovery_process_dr.value,
                    discovery_id_no_dr: discovery_id_no_dr.value,
                    discovery_person: discovery_person.value,
                    occurrence_process_dr: occurrence_process_dr.value,
                    occurrence_shift_dr: occurrence_shift_dr.value,
                    occurrence_id_no_dr: occurrence_id_no_dr.value,
                    occurrence_person: occurrence_person.value,
                    outflow_process_dr: outflow_process_dr.value,
                    outflow_shift_dr: outflow_shift_dr.value,
                    outflow_id_no_dr: outflow_id_no_dr.value,
                    outflow_person: outflow_person.value,
                    defect_category_dr: defect_category_dr.value,
                    sequence_no: sequence_no.value,
                    defect_cause_dr: defect_cause_dr.value,
                    repair_person_dr: repair_person_dr.value,
                    detail_content_defect: detail_content_defect.value,
                    treatment_content_defect: treatment_content_defect.value,
                    defect_id: defect_id.value
                },
                success: response => {
                    // close loading alert
                    loadingAlert.close();

                    setTimeout(() => {
                        try {
                            let response_array = JSON.parse(response);
                            if (response_array.message == 'success') {

                                document.getElementById("repair_start_mc").innerHTML = response_array.repair_start_mc;
                                document.getElementById("defect_id_no").value = response_array.defect_id;

                                $('#add_defect_mancost').modal('hide');
                                setTimeout(() => {
                                    $('#add_defect_mancost_2').modal('show');
                                }, 300);
                            } else {
                                console.log(response);
                            }
                        } catch (e) {
                            console.log(response);
                        }
                    }, 300);
                }
            })
                .fail((jqXHR, textStatus, errorThrown) => {
                    console.log(jqXHR);
                });
        }
        return false;
    };

    // clear defect record fields
    const clear_dr_mc_fields = () => {
        // defect record fields
        document.getElementById("line_no").value = '';
        document.getElementById("line_category_dr").value = '';
        document.getElementById("date_detected").value = '';
        document.getElementById("issue_tag").value = '';
        document.getElementById("repairing_date").value = '';
        document.getElementById("car_maker").value = '';
        // document.getElementById("qr_scan").value = '';
        document.getElementById("product_name").value = '';
        document.getElementById("lot_no").value = '';
        document.getElementById("serial_no").value = '';
        document.getElementById("discovery_process_dr").value = '';
        document.getElementById("discovery_id_no_dr").value = '';
        document.getElementById("discovery_person").value = '';
        document.getElementById("occurrence_process_dr").value = '';
        document.getElementById("occurrence_shift_dr").value = '';
        document.getElementById("occurrence_id_no_dr").value = '';
        document.getElementById("occurrence_person").value = '';
        document.getElementById("outflow_process_dr").value = '';
        document.getElementById("outflow_shift_dr").value = '';
        document.getElementById("outflow_id_no_dr").value = '';
        document.getElementById("outflow_person").value = '';
        document.getElementById("defect_category_dr").value = '';
        document.getElementById("sequence_no").value = '';
        document.getElementById("defect_cause_dr").value = '';
        document.getElementById("repair_person_dr").value = '';
        document.getElementById("detail_content_defect").value = '';
        document.getElementById("treatment_content_defect").value = '';

        // mancost fields
        document.getElementById("repair_start_mc").value = '';
        document.getElementById("repair_end_mc").value = '';
        document.getElementById("time_consumed_mc").value = '';
        document.getElementById("defect_category_mc").value = '';
        document.getElementById("occurrence_process_mc").value = '';
        document.getElementById("parts_removed_mc").value = '';
        document.getElementById("quantity_mc").value = '';
        document.getElementById("unit_cost_mc").value = '';
        document.getElementById("material_cost_mc").value = '';
        document.getElementById("manhour_cost_mc").value = '';
        document.getElementById("portion_treatment").value = '';

        count_detail_content_defect_char();
        count_treatment_content_defect_char();
    }

    // ADDING OF MULTIPLE MANCOST WITH ONE DEFECT ID
    // fetch added mancost table
    const load_added_mancost = () => {
        $.ajax({
            url: '../../process/pd/defect_monitoring_record_rp_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'load_added_mancost'
            },
            success: function (response) {
                $('#list_of_added_mancost').empty();
                $('#list_of_added_mancost').html(response);
            }
        });
    }

    // DELETE ADDED ROW
    const delete_added_btn = (event) => {
        var id = event.target.dataset.id;

        $.ajax({
            url: '../../process/pd/defect_monitoring_record_rp_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'delete_added_btn',
                id: id
            },
            success: function (response) {
                if (response == 'success') {
                    load_added_mancost();
                }
            }
        });
    }

    // =======================================================
    // highlight input field when empty
    document.getElementById("repair_start_mc").addEventListener("input", function () {
        var repair_start_mc = this;
        repair_start_mc.classList.remove('highlight');
        document.getElementById("repairStartMcError").style.display = 'none';
    });

    document.getElementById("repair_end_mc").addEventListener("input", function () {
        var repair_end_mc = this;
        repair_end_mc.classList.remove('highlight');
        document.getElementById("repairEndMcError").style.display = 'none';
    });

    document.getElementById("defect_category_mc").addEventListener("input", function () {
        var defect_category_mc = this;
        defect_category_mc.classList.remove('highlight');
        document.getElementById("defectCategoryMcError").style.display = 'none';
    });

    document.getElementById("occurrence_process_mc").addEventListener("input", function () {
        var occurrence_process_mc = this;
        occurrence_process_mc.classList.remove('highlight');
        document.getElementById("occurrenceProcessMcError").style.display = 'none';
    });

    document.getElementById("parts_removed_mc").addEventListener("input", function () {
        var parts_removed_mc = this;
        parts_removed_mc.classList.remove('highlight');
        document.getElementById("partsRemovedMcError").style.display = 'none';
    });

    document.getElementById("quantity_mc").addEventListener("input", function () {
        var quantity_mc = this;
        parts_removed_mc.classList.remove('highlight');
        document.getElementById("quantityMcError").style.display = 'none';
    });

    document.getElementById("portion_treatment").addEventListener("input", function () {
        var portion_treatment = this;
        portion_treatment.classList.remove('highlight');
        document.getElementById("portionTreatmentMcError").style.display = 'none';
    });

    const add_multiple_mancost = () => {
        $('#list_of_added_mancost').empty();
        // console.log("Table cleared");

        var repair_start_mc = document.getElementById("repair_start_mc");
        var repairStartMcError = document.getElementById("repairStartMcError");

        var repair_end_mc = document.getElementById("repair_end_mc");
        var repairEndMcError = document.getElementById("repairEndMcError");

        var time_consumed_mc = document.getElementById("time_consumed_mc");

        var defect_category_mc = document.getElementById("defect_category_mc");
        var defectCategoryMcError = document.getElementById("defectCategoryMcError");

        var occurrence_process_mc = document.getElementById("occurrence_process_mc");
        var occurrenceProcessMcError = document.getElementById("occurrenceProcessMcError");

        var parts_removed_mc = document.getElementById("parts_removed_mc");
        var partsRemovedMcError = document.getElementById("partsRemovedMcError");

        var quantity_mc = document.getElementById("quantity_mc");
        var quantityMcError = document.getElementById("quantityMcError");

        var unit_cost_mc = document.getElementById("unit_cost_mc");
        var material_cost_mc = document.getElementById("material_cost_mc");
        var manhour_cost_mc = document.getElementById("manhour_cost_mc");

        var portion_treatment = document.getElementById("portion_treatment");
        var portionTreatmentMcError = document.getElementById("portionTreatmentMcError");

        var defect_id = document.getElementById('defect_id_no');

        // Reset highlighting and error messages
        repair_start_mc.classList.remove('highlight');
        repairStartMcError.style.display = 'none';
        repair_end_mc.classList.remove('highlight');
        repairEndMcError.style.display = 'none';
        defect_category_mc.classList.remove('highlight');
        defectCategoryMcError.style.display = 'none';
        occurrence_process_mc.classList.remove('highlight');
        occurrenceProcessMcError.style.display = 'none';
        parts_removed_mc.classList.remove('highlight');
        partsRemovedMcError.style.display = 'none';
        quantity_mc.classList.remove('highlight');
        quantityMcError.style.display = 'none';
        portion_treatment.classList.remove('highlight');
        portionTreatmentMcError.style.display = 'none';

        if (repair_start_mc.value.trim() === '') {
            repair_start_mc.classList.add('highlight');
            repairStartMcError.style.display = 'block';
        }
        if (repair_end_mc.value.trim() === '') {
            repair_end_mc.classList.add('highlight');
            repairEndMcError.style.display = 'block';
        }
        if (defect_category_mc.value.trim() === '') {
            defect_category_mc.classList.add('highlight');
            defectCategoryMcError.style.display = 'block';
        }
        if (occurrence_process_mc.value.trim() === '') {
            occurrence_process_mc.classList.add('highlight');
            occurrenceProcessMcError.style.display = 'block';
        }
        if (parts_removed_mc.value.trim() === '') {
            parts_removed_mc.classList.add('highlight');
            partsRemovedMcError.style.display = 'block';
        }
        if (quantity_mc.value.trim() === '') {
            quantity_mc.classList.add('highlight');
            quantityMcError.style.display = 'block';
        }
        if (portion_treatment.value.trim() === '') {
            portion_treatment.classList.add('highlight');
            portionTreatmentMcError.style.display = 'block';
        }
        else {
            // Construct an array of records
            var records = [
                {
                    repair_start_mc: repair_start_mc.value,
                    repair_end_mc: repair_end_mc.value,
                    time_consumed_mc: time_consumed_mc.value,
                    defect_category_mc: defect_category_mc.value,
                    occurrence_process_mc: occurrence_process_mc.value,
                    parts_removed_mc: parts_removed_mc.value,
                    quantity_mc: quantity_mc.value,
                    unit_cost_mc: unit_cost_mc.value,
                    material_cost_mc: material_cost_mc.value,
                    manhour_cost_mc: manhour_cost_mc.value,
                    portion_treatment: portion_treatment.value,
                    defect_id: defect_id.value
                }
            ];

            $.ajax({
                url: '../../process/pd/defect_monitoring_record_rp_p.php',
                type: 'POST',
                cache: false,
                data: {
                    method: 'add_multiple_mancost',
                    records: records
                },
                success: function (response) {
                    if (response == 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Successfully Recorded',
                            text: 'Success',
                            showConfirmButton: false,
                            timer: 1000
                        });

                        // Retain values in these fields
                        var retainedValues = {
                            'repair_start_mc': repair_start_mc.value,
                            'repair_end_mc': repair_end_mc.value,
                            'time_consumed_mc': time_consumed_mc.value,
                            'defect_category_mc': defect_category_mc.value,
                            'occurrence_process_mc': occurrence_process_mc.value,
                            'parts_removed_mc': parts_removed_mc.value,
                            'manhour_cost_mc': manhour_cost_mc.value,
                        };

                        // Clear specific fields
                        $('#parts_removed_mc').val('');
                        $('#quantity_mc').val('');
                        $('#unit_cost_mc').val('');
                        $('#material_cost_mc').val('');
                        $('#portion_treatment').val('');

                        $('#defect_id').val('');

                        $('#list_of_added_mancost').empty();
                        // console.log("Table cleared");

                        load_added_mancost();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Error',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                }
            });
        }
    };

    // Event listener for 'input' event on the parts_removed field
    $("#parts_removed_mc").on("input", function () {
        var inputText = $(this).val().toUpperCase().trim();

        // Check if inputText has at least 3 characters
        if (inputText.length >= 3) {
            // Trigger autocomplete function
            autocompleteParts(inputText);
        }
    });


    // fetch unit cost thru part name
    function fetchUnitCost() {
        var partsRemovedInput = $("#parts_removed_mc").val();

        // Check if the input is not empty
        if (partsRemovedInput.trim() !== '') {
            $.ajax({
                url: '../../process/pd/defect_monitoring_record_rp_p.php',
                type: 'POST',
                cache: false,
                dataType: 'json',
                data: {
                    method: 'fetch_unit_price',
                    parts_removed: partsRemovedInput
                },
                success: function (response) {
                    if (!response.error) {
                        console.log("Fetched unit price:", response.unit_price);

                        // Update the 'unit_cost' field with the fetched unit price
                        $("#unit_cost_mc").val(response.unit_price);

                        // Get the quantity value from the input field
                        var quantityValue = $("#quantity").val();

                        // Now that we have the unit price and quantity, compute the material cost
                        computeMaterialCost(response.unit_price, quantityValue);
                    }
                },
                error: function (xhr, status, error) {
                    console.error("AJAX Error:", error);
                }
            });
        }
    }

    // Autocomplete function
    function autocompleteParts(inputText) {
        console.log("Autocomplete triggered with input:", inputText);

        $.ajax({
            url: '../../process/pd/defect_monitoring_record_rp_p.php',
            type: 'POST',
            cache: false,
            dataType: 'json',
            data: {
                method: 'autocomplete_parts',
                input_text: inputText
            },
            success: function (response) {
                if (!response.error) {
                    updateDatalist(response.part_names);
                }
            },
            error: function (xhr, status, error) {
                console.error("AJAX Error:", error);
            }
        });
    }

    // Function to update datalist with part names
    function updateDatalist(partNames) {
        $("#partsRemovedMcList").empty();

        partNames.forEach(function (partName) {
            $("#partsRemovedMcList").append(`<option value="${partName}">`);
        });
    }

    // Fetch unit price based on part name
    function fetchUnitPrice(partsRemoved) {
        $.ajax({
            url: '../../process/pd/defect_monitoring_record_rp_p.php',
            type: 'POST',
            cache: false,
            dataType: 'json',
            data: {
                method: 'fetch_unit_price',
                parts_removed: partsRemoved
            },
            success: function (response) {
                if (!response.error) {
                    console.log("Fetched unit price:", response.unit_price);

                    // Update the 'unit_cost' field with the fetched unit price
                    $("#unit_cost_mc").val(response.unit_price);
                }
            },
            error: function (xhr, status, error) {
                console.error("AJAX Error:", error);
            }
        });
    }

    // Function to compute material cost based on unit price and quantity
    const computeMaterialCost = (unitPrice, quantity) => {
        // Parse the quantity and unit price as floats
        var qtyInput = parseFloat(quantity) || 0;
        var costInput = parseFloat(unitPrice) || 0;

        console.log("Parsed Quantity Input:", qtyInput);
        console.log("Parsed Cost Input:", costInput);

        var result = qtyInput * costInput;
        result = result.toFixed(2); // keep up to two decimals

        console.log("Result:", result);

        var resultWithSymbol = result;

        $("#material_cost_mc").val(resultWithSymbol);
    };

    const count_detail_content_defect_char = () => {
        var max_length = document.getElementById("detail_content_defect").getAttribute("maxlength");
        var comment_length = document.getElementById("detail_content_defect").value.length;
        var detailDefectError = `${comment_length} / ${max_length}`;
        document.getElementById("detail_content_defect_count").innerHTML = detailDefectError;
    }

    const count_treatment_content_defect_char = () => {
        var max_length = document.getElementById("treatment_content_defect").getAttribute("maxlength");
        var comment_length = document.getElementById("treatment_content_defect").value.length;
        var treatmentDefectError = `${comment_length} / ${max_length}`;
        document.getElementById("treatment_content_defect_count").innerHTML = treatmentDefectError;
    }

    // export defect record CSV
    const export_defect_record = () => {
        var product_name = document.getElementById("search_product_name").value.trim();
        var lot_no = document.getElementById("search_lot_no").value.trim();
        var serial_no = document.getElementById("search_serial_no").value.trim();

        var record_type = document.getElementById("search_record_type").value.trim();
        var line_no = document.getElementById("line_no_rp").value.trim();
        var date_from = document.getElementById("date_from_search_defect").value.trim();
        var date_to = document.getElementById("date_to_search_defect").value.trim();

        window.open(
            '../../process/export/exp_defect_record.php?product_name=' + product_name +
            "&lot_no=" + lot_no +
            "&serial_no=" + serial_no +
            "&record_type=" + record_type +
            "&line_no=" + line_no +
            "&date_from=" + date_from +
            "&date_to=" + date_to,
            '_blank'
        );
    }

    // export mancost record CSV
    const export_mancost_record = () => {
        var product_name = document.getElementById("search_product_name").value.trim();
        var lot_no = document.getElementById("search_lot_no").value.trim();
        var serial_no = document.getElementById("search_serial_no").value.trim();

        var record_type = document.getElementById("search_record_type").value.trim();
        var line_no = document.getElementById("line_no_rp").value.trim();
        var date_from = document.getElementById("date_from_search_defect").value.trim();
        var date_to = document.getElementById("date_to_search_defect").value.trim();

        window.open(
            '../../process/export/exp_mancost_record.php?product_name=' + product_name +
            "&lot_no=" + lot_no +
            "&serial_no=" + serial_no +
            "&record_type=" + record_type +
            "&line_no=" + line_no +
            "&date_from=" + date_from +
            "&date_to=" + date_to,
            '_blank'
        );
    }

    const clear_search_input = () => {
        document.getElementById("search_product_name").value = '';
        document.getElementById("search_lot_no").value = '';
        document.getElementById("search_serial_no").value = '';
        document.getElementById("search_record_type").value = '';
        document.getElementById("line_no_rp").value = '';
        document.getElementById("date_from_search_defect").value = '';
        document.getElementById("date_to_search_defect").value = '';

        load_defect_table(1);
    }

    function refresh_page() {
        location.reload();
    }
</script>