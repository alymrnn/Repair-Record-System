<script type="text/javascript">
    $(document).ready(function() {
        load_mancost_record();
        fetch_opt_car_maker_mc2();
        fetch_opt_defect_category_mc2();
        fetch_opt_occurrence_process_mc2();
        fetch_opt_portion_treatment_mc2();
        // fetch_opt_search_defect_category_mc2();
        // fetch_opt_search_occurrence_process_mc2();
    });

    // fetch defect category mancost option
    const fetch_opt_car_maker_mc2 = () => {
        $.ajax({
            url: '../../process/user/mancost_monitoring_only_rp/mancost_monitoring_only_rp_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_opt_car_maker_mc2',
            },
            success: function(response) {
                $('#carMakerMc2List').html(response);
            }
        });
    }

    // fetch defect category mancost option
    const fetch_opt_defect_category_mc2 = () => {
        $.ajax({
            url: '../../process/user/mancost_monitoring_only_rp/mancost_monitoring_only_rp_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_opt_defect_category_mc2',
            },
            success: function(response) {
                $('#defectCategoryMc2List').html(response);
                $('#search_defect_category_mc2').html(response);
            }
        });
    }

    // fetch search defect category mancost option
    // const fetch_opt_search_defect_category_mc2 = () => {
    //     $.ajax({
    //         url: '../../process/user/mancost_monitoring_only_rp/mancost_monitoring_only_rp_p.php',
    //         type: 'POST',
    //         cache: false,
    //         data: {
    //             method: 'fetch_opt_search_defect_category_mc2',
    //         },
    //         success: function(response) {
    //             $('#search_defect_category_mc2').html(response);
    //         }
    //     });
    // }

    // fetch option occurrence process mancost
    const fetch_opt_occurrence_process_mc2 = () => {
        $.ajax({
            url: '../../process/user/mancost_monitoring_only_rp/mancost_monitoring_only_rp_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_opt_occurrence_process_mc2',
            },
            success: function(response) {
                $('#occurrenceProcessMc2List').html(response);
                $('#search_occurrence_process_mc2').html(response);
            }
        });
    }

    // fetch search option occurrence process mancost
    // const fetch_opt_search_occurrence_process_mc2 = () => {
    //     $.ajax({
    //         url: '../../process/user/mancost_monitoring_only_rp/mancost_monitoring_only_rp_p.php',
    //         type: 'POST',
    //         cache: false,
    //         data: {
    //             method: 'fetch_opt_search_occurrence_process_mc2',
    //         },
    //         success: function(response) {
    //             $('#search_occurrence_process_mc2').html(response);
    //         }
    //     });
    // }

    // fetch option portion treatment mancost
    const fetch_opt_portion_treatment_mc2 = () => {
        $.ajax({
            url: '../../process/user/mancost_monitoring_only_rp/mancost_monitoring_only_rp_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'fetch_opt_portion_treatment_mc2',
            },
            success: function(response) {
                $('#portionTreatmentMc2List').html(response);
            }
        });
    }

    // ==============================================

    // compute the time consumed in mancost monitoring
    const time_difference = () => {
        var repair_start = document.getElementById('repair_start_mc2').value;
        var repair_end = document.getElementById('repair_end_mc2').value;

        var start = new Date("11/11/2023 " + repair_start);
        var end = new Date("11/11/2023 " + repair_end);

        if (end < start) {
            end.setDate(end.getDate() + 1);
        }

        var diff = end - start;

        var msec = diff;
        var hh = Math.floor(msec / 1000 / 60 / 60);
        msec -= hh * 1000 * 60 * 60;
        var mm = Math.floor(msec / 1000 / 60);
        msec -= mm * 1000 * 60;
        var ss = Math.floor(msec / 1000);
        msec -= ss * 1000;

        var result = ("0" + hh).slice(-2) + ":" + ("0" + mm).slice(-2);
        document.getElementById("time_consumed_mc2").value = result;

        console.log(repair_start);
        console.log(repair_end);
        console.log(result);
    }

    // compute the material cost in mancost monitoring
    const qty_cost_product = () => {
        var quantity = document.getElementById('quantity_mc2').value;
        var unit_cost = document.getElementById('unit_cost_mc2').value;

        var quantity_input = parseFloat(quantity);
        if (isNaN(quantity_input)) quantity_input = 0;

        var unit_cost_input = parseFloat(unit_cost);
        if (isNaN(unit_cost_input)) unit_cost_input = 0;

        var result = quantity_input * unit_cost_input;
        result = result.toFixed(2); // two decimal places

        document.getElementById("material_cost_mc2").value = result;

        console.log(quantity);
        console.log(unit_cost);
        console.log(result);
    }

    // fetch data
    const load_mancost_record = () => {
        $.ajax({
            url: '../../process/user/mancost_monitoring_only_rp/mancost_monitoring_only_rp_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'load_mancost_record'
            },
            success: function(response) {
                $('#list_of_mancost_record').html(response);
                $('#spinner').fadeOut();
            }
        });
    }

    // =================================================
    // highlight input when empty
    document.getElementById("car_maker_mc2").addEventListener("input", function() {
        var car_maker_mc2 = this; 
        car_maker_mc2.classList.remove('highlight');
        document.getElementById("carMakerMc2Error").style.display = 'none';
    });

    document.getElementById("line_no_mc2").addEventListener("input", function() {
        var line_no_mc2 = this; 
        line_no_mc2.classList.remove('highlight');
        document.getElementById("lineNoMc2Error").style.display = 'none';
    });

    document.getElementById("repairing_date_mc2").addEventListener("input", function() {
        var repairing_date_mc2 = this; 
        repairing_date_mc2.classList.remove('highlight');
        document.getElementById("repairingDateMc2Error").style.display = 'none';
    });

    document.getElementById("repair_start_mc2").addEventListener("input", function() {
        var repair_start_mc2 = this; 
        repair_start_mc2.classList.remove('highlight');
        document.getElementById("repairStartMc2Error").style.display = 'none';
    });

    document.getElementById("repair_end_mc2").addEventListener("input", function() {
        var repair_end_mc2 = this; 
        repair_end_mc2.classList.remove('highlight');
        document.getElementById("repairEndMc2Error").style.display = 'none';
    });

    document.getElementById("defect_category_mc2").addEventListener("input", function() {
        var defect_category_mc2 = this; 
        defect_category_mc2.classList.remove('highlight');
        document.getElementById("defectCategoryMc2Error").style.display = 'none';
    });

    document.getElementById("occurrence_process_mc2").addEventListener("input", function() {
        var occurrence_process_mc2 = this; 
        occurrence_process_mc2.classList.remove('highlight');
        document.getElementById("occurrenceProcessMc2Error").style.display = 'none';
    });

    document.getElementById("parts_removed_mc2").addEventListener("input", function() {
        var parts_removed_mc2 = this; 
        parts_removed_mc2.classList.remove('highlight');
        document.getElementById("partsRemovedMc2Error").style.display = 'none';
    });

    document.getElementById("portion_treatment_mc2").addEventListener("input", function() {
        var portion_treatment_mc2 = this; 
        portion_treatment_mc2.classList.remove('highlight');
        document.getElementById("portionTreatmentMc2Error").style.display = 'none';
    });

    document.getElementById("re_checking_mc2").addEventListener("input", function() {
        var re_checking_mc2 = this; 
        re_checking_mc2.classList.remove('highlight');
        document.getElementById("reCheckingMc2Error").style.display = 'none';
    });

    document.getElementById("qc_verification_mc2").addEventListener("input", function() {
        var qc_verification_mc2 = this; 
        qc_verification_mc2.classList.remove('highlight');
        document.getElementById("qcVerificationMc2Error").style.display = 'none';
    });

    document.getElementById("checking_date_mc2").addEventListener("input", function() {
        var checking_date_mc2 = this; 
        checking_date_mc2.classList.remove('highlight');
        document.getElementById("checkingDateMc2Error").style.display = 'none';
    });
    // ===============================================

    // add mancost record
    const add_mancost2_record = () => {
        var car_maker_mc2 = document.getElementById('car_maker_mc2');
        var carMakerMc2Error = document.getElementById('carMakerMc2Error');

        var line_no_mc2 = document.getElementById('line_no_mc2');
        var lineNoMc2Error = document.getElementById('lineNoMc2Error');

        var repairing_date_mc2 = document.getElementById('repairing_date_mc2');
        var repairingDateMc2Error = document.getElementById('repairingDateMc2Error');

        var repair_start_mc2 = document.getElementById('repair_start_mc2');
        var repairStartMc2Error = document.getElementById('repairStartMc2Error');

        var repair_end_mc2 = document.getElementById('repair_end_mc2');
        var repairEndMc2Error = document.getElementById('repairEndMc2Error');

        var time_consumed_mc2 = document.getElementById('time_consumed_mc2');

        var defect_category_mc2 = document.getElementById('defect_category_mc2');
        var defectCategoryMc2Error = document.getElementById('defectCategoryMc2Error');

        var occurrence_process_mc2 = document.getElementById('occurrence_process_mc2');
        var occurrenceProcessMc2Error = document.getElementById('occurrenceProcessMc2Error');

        var parts_removed_mc2 = document.getElementById('parts_removed_mc2');
        var partsRemovedMc2Error = document.getElementById('partsRemovedMc2Error');

        var quantity_mc2 = document.getElementById('quantity_mc2');
        var unit_cost_mc2 = document.getElementById('unit_cost_mc2');
        var material_cost_mc2 = document.getElementById('material_cost_mc2');
        var manhour_cost_mc2 = document.getElementById('manhour_cost_mc2');

        var portion_treatment_mc2 = document.getElementById('portion_treatment_mc2');
        var portionTreatmentMc2Error = document.getElementById('portionTreatmentMc2Error');

        var re_checking_mc2 = document.getElementById('re_checking_mc2');
        var reCheckingMc2Error = document.getElementById('reCheckingMc2Error');

        var qc_verification_mc2 = document.getElementById('qc_verification_mc2');
        var qcVerificationMc2Error = document.getElementById('qcVerificationMc2Error');

        var checking_date_mc2 = document.getElementById('checking_date_mc2');
        var checkingDateMc2Error = document.getElementById('checkingDateMc2Error');

        if (car_maker_mc2.value.trim() === '') {
            car_maker_mc2.classList.add('highlight');
            carMakerMc2Error.style.display = 'block';
        } 
        if (line_no_mc2.value.trim() === '') {
            line_no_mc2.classList.add('highlight');
            lineNoMc2Error.style.display = 'block';
        } 
        if (repairing_date_mc2.value.trim() === '') {
            repairing_date_mc2.classList.add('highlight');
            repairingDateMc2Error.style.display = 'block';
        } 
        if (repair_start_mc2.value.trim() === '') {
            repair_start_mc2.classList.add('highlight');
            repairStartMc2Error.style.display = 'block';
        } 
        if (repair_end_mc2.value.trim() === '') {
            repair_end_mc2.classList.add('highlight');
            repairEndMc2Error.style.display = 'block';
        } 
        if (defect_category_mc2.value.trim() === '') {
            defect_category_mc2.classList.add('highlight');
            defectCategoryMc2Error.style.display = 'block';
        } 
        if (occurrence_process_mc2.value.trim() === '') {
            occurrence_process_mc2.classList.add('highlight');
            occurrenceProcessMc2Error.style.display = 'block';
        } 
        if (parts_removed_mc2.value.trim() === '') {
            parts_removed_mc2.classList.add('highlight');
            partsRemovedMc2Error.style.display = 'block';
        } 
        if (portion_treatment_mc2.value.trim() === '') {
            portion_treatment_mc2.classList.add('highlight');
            portionTreatmentMc2Error.style.display = 'block';
        } 
        if (re_checking_mc2.value.trim() === '') {
            re_checking_mc2.classList.add('highlight');
            reCheckingMc2Error.style.display = 'block';
        } 
        if (qc_verification_mc2.value.trim() === '') {
            qc_verification_mc2.classList.add('highlight');
            qcVerificationMc2Error.style.display = 'block';
        } 
        if (checking_date_mc2.value.trim() === '') {
            checking_date_mc2.classList.add('highlight');
            checkingDateMc2Error.style.display = 'block';
        } 
        else {
            $.ajax({
                url: '../../process/user/mancost_monitoring_only_rp/mancost_monitoring_only_rp_p.php',
                type: 'POST',
                cache: false,
                data: {
                    method: 'add_mancost2_record',
                    car_maker_mc2: car_maker_mc2.value,
                    line_no_mc2: line_no_mc2.value,
                    repairing_date_mc2:repairing_date_mc2.value,
                    repair_start_mc2: repair_start_mc2.value,
                    repair_end_mc2: repair_end_mc2.value,
                    time_consumed_mc2: time_consumed_mc2.value,
                    defect_category_mc2: defect_category_mc2.value,
                    occurrence_process_mc2: occurrence_process_mc2.value,
                    parts_removed_mc2: parts_removed_mc2.value,
                    quantity_mc2: quantity_mc2.value,
                    unit_cost_mc2: unit_cost_mc2.value,
                    material_cost_mc2: material_cost_mc2.value,
                    manhour_cost_mc2: manhour_cost_mc2.value,
                    portion_treatment_mc2: portion_treatment_mc2.value,
                    re_checking_mc2: re_checking_mc2.value,
                    qc_verification_mc2: qc_verification_mc2.value,
                    checking_date_mc2: checking_date_mc2.value
                },
                success: function(response) {
                    if (response == 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Successfully Recorded!',
                            text: 'Success',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        $('#car_maker_mc2').val('');
                        $('#line_no_mc2').val('');
                        $('#repairing_date_mc2').val('');
                        $('#repair_start_mc2').val('');
                        $('#repair_end_mc2').val('');
                        $('#time_consumed_mc2').val('');
                        $('#defect_category_mc2').val('');
                        $('#occurrence_process_mc2').val('');
                        $('#parts_removed_mc2').val('');
                        $('#quantity_mc2').val('');
                        $('#unit_cost_mc2').val('');
                        $('#material_cost_mc2').val('');
                        $('#manhour_cost_mc2').val('');
                        $('#portion_treatment_mc2').val('');
                        $('#re_checking_mc2').val('');
                        $('#qc_verification_mc2').val('');
                        $('#checking_date_mc2').val('');

                        load_mancost_record();

                        $('#add_mancost_only').modal('hide');
                    } 
                    else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'Error',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                }
            });
        }
    }

    // clear mancost fields
    const clear_dr_mc_fields = () => {
        //mancost fields only
        document.getElementById("car_maker_mc2").value = '';
        document.getElementById("line_no_mc2").value = '';
        document.getElementById("repairing_date_mc2").value = '';
        document.getElementById("repair_start_mc2").value = '';
        document.getElementById("repair_end_mc2").value = '';
        document.getElementById("time_consumed_mc2").value = '';
        document.getElementById("defect_category_mc2").value = '';
        document.getElementById("occurrence_process_mc2").value = '';
        document.getElementById("parts_removed_mc2").value = '';
        document.getElementById("quantity_mc2").value = '';
        document.getElementById("unit_cost_mc2").value = '';
        document.getElementById("material_cost_mc2").value = '';
        document.getElementById("manhour_cost_mc2").value = '';
        document.getElementById("portion_treatment_mc2").value = '';
        document.getElementById("re_checking_mc2").value = '';
        document.getElementById("qc_verification_mc2").value = '';
        document.getElementById("checking_date_mc2").value = '';

        // document.getElementById("rc_val_ok").value = '';
        // document.getElementById("rc_val_ng").value = '';
        // document.getElementById("qc_verif_val_ok").value = '';
        // document.getElementById("qc_verif_val_ng").value = '';
    }

    // search mancost
    const search_mancost2_record = () => {
        var line_no_mc_search = document.getElementById('line_no_mc_search').value;
        var defect_category_mc_search = document.getElementById('search_defect_category_mc2').value;
        var occurrence_process_mc_search = document.getElementById('search_occurrence_process_mc2').value;

        $.ajax({
            url: '../../process/user/mancost_monitoring_only_rp/mancost_monitoring_only_rp_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'search_mancost2_record',
                line_no_mc_search: line_no_mc_search,
                defect_category_mc_search: defect_category_mc_search,
                occurrence_process_mc_search: occurrence_process_mc_search
            },
            success: function(response) {
                $('#list_of_mancost_record').html(response);
                $('#spinner').fadeOut();
            }
        });
    }





    // const search_mancost2_record = () => {
    //     var line_no_mc_search = document.getElementById('line_no_mc_search').value;
    //     var defect_category_mc_search = document.getElementById('defect_category_mc2').value;
    //     var occurrence_process_mc_search = document.getElementById('occurrence_process_mc2').value;

    //     if (line_no_mc_search != '' || defect_category_mc_search != '' || occurrence_process_mc_search != '') {
    //         $.ajax({
    //             url: '../../process/user/mancost_monitoring_only_rp/mancost_monitoring_only_rp_p.php',
    //             type: 'POST',
    //             cache: false,
    //             data: {
    //                 method: 'search_mancost2_record',
    //                 line_no_mc_search: line_no_mc_search,
    //                 defect_category_mc_search: defect_category_mc_search,
    //                 occurrence_process_mc_search: occurrence_process_mc_search
    //             },
    //             success: function(response) {
    //                 $('#list_of_mancost_record').html(response);
    //                 $('#spinner').fadeOut();
    //             }
    //         });
    //     } 
    //     else {
    //         Swal.fire({
    //             icon: 'info',
    //             title: 'Empty Fields',
    //             text: 'Fill-out input search field/s',
    //             showConfirmButton: false,
    //             timer: 1000
    //         });
    //     }
    // }
</script>