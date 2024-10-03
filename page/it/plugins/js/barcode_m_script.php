<script type="text/javascript">
    $(document).ready(function () {
        load_car_settings();
        load_line_no();
        load_discovery_process();
        load_occurrence_process_defect();
        load_outflow_process();
        load_defect_category_d();
        load_defect_category_m();
        load_occurrence_process_m();
        load_repair_person_d();
    });

    // for qr settings
    const load_car_settings = () => {
        $.ajax({
            url: '../../process/it/barcode_m_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'qr_setting_list'
            }, success: function (response) {
                $('#list_of_qr_setting').html(response);
                $('#spinner').fadeOut();
            }
        });
    }

    const register_setting = () => {
        var car_maker = document.getElementById('car_maker_qr').value;
        var car_model = document.getElementById('car_model_qr').value;
        var car_value = document.getElementById('car_value_qr').value;
        var total_length = document.getElementById('total_length_qr').value;
        var pro_name_start = document.getElementById('pro_name_start_qr').value;
        var pro_name_length = document.getElementById('pro_name_length_qr').value;
        var lot_no_start = document.getElementById('lot_no_start_qr').value;
        var lot_no_length = document.getElementById('lot_no_length_qr').value;
        var serial_no_start = document.getElementById('serial_no_start_qr').value;
        var serial_no_length = document.getElementById('serial_no_length_qr').value;

        if (car_maker == '') {
            Swal.fire({
                icon: 'info',
                title: 'Please input car maker.',
                showConfirmButton: false,
                timer: 1500
            });
        } else if (car_value == '') {
            Swal.fire({
                icon: 'info',
                title: 'Please input car value.',
                showConfirmButton: false,
                timer: 1500
            });
        }
        else {
            $.ajax({
                url: '../../process/it/barcode_m_p.php',
                type: 'POST',
                cache: false,
                data: {
                    method: 'register_setting',
                    car_maker: car_maker,
                    car_model: car_model,
                    car_value: car_value,
                    total_length: total_length,
                    pro_name_start: pro_name_start,
                    pro_name_length: pro_name_length,
                    lot_no_start: lot_no_start,
                    lot_no_length: lot_no_length,
                    serial_no_start: serial_no_start,
                    serial_no_length: serial_no_length
                },
                success: function (response) {
                    if (response == 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'QR Settings Added',
                            text: 'Success',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        $('#car_maker_qr').val('');
                        $('#car_model_qr').val('');
                        $('#car_value_qr').val('');
                        $('#total_length_qr').val('');
                        $('#pro_name_start_qr').val('');
                        $('#pro_name_length_qr').val('');
                        $('#lot_no_start_qr').val('');
                        $('#lot_no_length_qr').val('');
                        $('#serial_no_start_qr').val('');
                        $('#serial_no_length_qr').val('');
                        load_car_settings();
                        $('#add_car_settings').modal('hide');
                    } else if (response == 'Already Exist') {
                        Swal.fire({
                            icon: 'info',
                            title: 'Duplicate Data',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                }
            });
        }
    }

    const get_car_setting_details = (param) => {
        var string = param.split('~!~');
        var id = string[0];
        var car_maker = string[1];
        var car_model = string[2];
        var car_value = string[3];
        var total_length = string[4];
        var pro_name_start = string[5];
        var pro_name_length = string[6];
        var lot_no_start = string[7];
        var lot_no_length = string[8];
        var serial_no_start = string[9];
        var serial_no_length = string[10];

        document.getElementById('id_qr_update').value = id;
        document.getElementById('car_maker_qr_update').value = car_maker;
        document.getElementById('car_model_qr_update').value = car_model;
        document.getElementById('car_value_qr_update').value = car_value;
        document.getElementById('total_length_qr_update').value = total_length;
        document.getElementById('pro_name_start_qr_update').value = pro_name_start;
        document.getElementById('pro_name_length_qr_update').value = pro_name_length;
        document.getElementById('lot_no_start_qr_update').value = lot_no_start;
        document.getElementById('lot_no_length_qr_update').value = lot_no_length;
        document.getElementById('serial_no_start_qr_update').value = serial_no_start;
        document.getElementById('serial_no_length_qr_update').value = serial_no_length;
    }

    const update_setting = () => {
        var id = document.getElementById('id_qr_update').value;
        var car_maker = document.getElementById('car_maker_qr_update').value;
        var car_model = document.getElementById('car_model_qr_update').value;
        var car_value = document.getElementById('car_value_qr_update').value;
        var total_length = document.getElementById('total_length_qr_update').value;
        var pro_name_start = document.getElementById('pro_name_start_qr_update').value;
        var pro_name_length = document.getElementById('pro_name_length_qr_update').value;
        var lot_no_start = document.getElementById('lot_no_start_qr_update').value;
        var lot_no_length = document.getElementById('lot_no_length_qr_update').value;
        var serial_no_start = document.getElementById('serial_no_start_qr_update').value;
        var serial_no_length = document.getElementById('serial_no_length_qr_update').value;

        $.ajax({
            url: '../../process/it/barcode_m_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'update_setting',
                id: id,
                car_maker: car_maker,
                car_model: car_model,
                car_value: car_value,
                total_length: total_length,
                pro_name_start: pro_name_start,
                pro_name_length: pro_name_length,
                lot_no_start: lot_no_start,
                lot_no_length: lot_no_length,
                serial_no_start: serial_no_start,
                serial_no_length: serial_no_length
            },
            success: function (response) {
                if (response == 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'QR Settings Updated',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    $('#car_maker_qr_update').val('');
                    $('#car_model_qr_update').val('');
                    $('#car_value_qr_update').val('');
                    $('#total_length_qr_update').val('');
                    $('#pro_name_start_qr_update').val('');
                    $('#pro_name_length_qr_update').val('');
                    $('#lot_no_start_qr_update').val('');
                    $('#lot_no_length_qr_update').val('');
                    $('#serial_no_start_qr_update').val('');
                    $('#serial_no_length_qr_update').val('');
                    load_car_settings();
                    $('#update_car_settings').modal('hide');
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            }
        });
    }

    const delete_setting = () => {
        var id = document.getElementById('id_qr_update').value;

        $.ajax({
            url: '../../process/it/barcode_m_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'delete_setting',
                id: id
            },
            success: function (response) {
                if (response == 'success') {
                    Swal.fire({
                        icon: 'info',
                        title: 'QR Settings Deleted',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    load_car_settings();
                    $('#update_car_settings').modal('hide');
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            }
        });
    }

    // for line no
    const load_line_no = () => {
        $.ajax({
            url: '../../process/it/barcode_m_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'load_line_no'
            }, success: function (response) {
                $('#list_of_line_no').html(response);
                $('#spinner').fadeOut();
            }
        });
    }

    const register_line_no = () => {
        var line_no = document.getElementById('line_no_m').value;

        $.ajax({
            url: '../../process/it/barcode_m_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'register_line_no',
                line_no: line_no
            },
            success: function (response) {
                if (response == 'success') {
                    Swal.fire({
                        icon: 'success',
                        text: 'Success',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    $('#line_no_m').val('');

                    load_line_no();

                    $('#add_line_no').modal('hide');
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            }
        });
    }

    const delete_added_line_no = (event) => {
        var id = event.target.dataset.id;

        $.ajax({
            url: '../../process/it/barcode_m_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'delete_added_line_no',
                id: id
            },
            success: function (response) {
                if (response == 'success') {
                    Swal.fire({
                        icon: 'info',
                        text: 'Deleted',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    load_line_no();
                }
            }
        });
    }

    // for discovery process
    const load_discovery_process = () => {
        $.ajax({
            url: '../../process/it/barcode_m_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'load_discovery_process'
            }, success: function (response) {
                $('#list_of_discovery_process').html(response);
                $('#spinner').fadeOut();
            }
        });
    }

    const register_discovery_process = () => {
        var discovery_process = document.getElementById('discovery_process_m').value;

        $.ajax({
            url: '../../process/it/barcode_m_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'register_discovery_process',
                discovery_process: discovery_process
            },
            success: function (response) {
                if (response == 'success') {
                    Swal.fire({
                        icon: 'success',
                        text: 'Success',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    $('#discovery_process_m').val('');

                    load_discovery_process();

                    $('#add_discovery_process').modal('hide');
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            }
        });
    }

    const delete_added_discovery_process = (event) => {
        var id = event.target.dataset.id;

        $.ajax({
            url: '../../process/it/barcode_m_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'delete_added_discovery_process',
                id: id
            },
            success: function (response) {
                if (response == 'success') {
                    Swal.fire({
                        icon: 'info',
                        text: 'Deleted',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    load_discovery_process();
                }
            }
        });
    }

    // for occurrence process (defect)
    const load_occurrence_process_defect = () => {
        $.ajax({
            url: '../../process/it/barcode_m_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'load_occurrence_process_defect'
            }, success: function (response) {
                $('#list_of_occurrence_process_defect').html(response);
                $('#spinner').fadeOut();
            }
        });
    }

    const register_occurrence_process_defect = () => {
        var occurrence_process_d = document.getElementById('occurrence_process_d').value;

        $.ajax({
            url: '../../process/it/barcode_m_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'register_occurrence_process_defect',
                occurrence_process_d: occurrence_process_d
            },
            success: function (response) {
                if (response == 'success') {
                    Swal.fire({
                        icon: 'success',
                        text: 'Success',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    $('#occurrence_process_d').val('');

                    load_occurrence_process_defect();

                    $('#add_occurrence_process_d').modal('hide');
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            }
        });
    }

    const delete_added_occurrence_process_d = (event) => {
        var id = event.target.dataset.id;

        $.ajax({
            url: '../../process/it/barcode_m_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'delete_added_occurrence_process_d',
                id: id
            },
            success: function (response) {
                if (response == 'success') {
                    Swal.fire({
                        icon: 'info',
                        text: 'Deleted',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    load_occurrence_process_defect();
                }
            }
        });
    }

    // for outflow process
    const load_outflow_process = () => {
        $.ajax({
            url: '../../process/it/barcode_m_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'load_outflow_process'
            }, success: function (response) {
                $('#list_of_outflow_process').html(response);
                $('#spinner').fadeOut();
            }
        });
    }

    const register_outflow_process = () => {
        var outflow_process = document.getElementById('outflow_process_m').value;

        $.ajax({
            url: '../../process/it/barcode_m_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'register_outflow_process',
                outflow_process: outflow_process
            },
            success: function (response) {
                if (response == 'success') {
                    Swal.fire({
                        icon: 'success',
                        text: 'Success',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    $('#outflow_process_m').val('');

                    load_outflow_process();

                    $('#add_outflow_process').modal('hide');
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            }
        });
    }

    const delete_added_outflow_process = (event) => {
        var id = event.target.dataset.id;

        $.ajax({
            url: '../../process/it/barcode_m_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'delete_added_outflow_process',
                id: id
            },
            success: function (response) {
                if (response == 'success') {
                    Swal.fire({
                        icon: 'info',
                        text: 'Deleted',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    load_outflow_process();
                }
            }
        });
    }

    //for defect category (defect)
    const load_defect_category_d = () => {
        $.ajax({
            url: '../../process/it/barcode_m_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'load_defect_category_d'
            }, success: function (response) {
                $('#list_of_defect_category').html(response);
                $('#spinner').fadeOut();
            }
        });
    }

    const register_defect_category_d = () => {
        var defect_category_d = document.getElementById('defect_category_d').value;

        $.ajax({
            url: '../../process/it/barcode_m_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'register_defect_category_d',
                defect_category_d: defect_category_d
            },
            success: function (response) {
                if (response == 'success') {
                    Swal.fire({
                        icon: 'success',
                        text: 'Success',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    $('#defect_category_d').val('');

                    load_defect_category_d();

                    $('#add_defect_category_d').modal('hide');
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            }
        });
    }

    const delete_added_defect_category_d = (event) => {
        var id = event.target.dataset.id;

        $.ajax({
            url: '../../process/it/barcode_m_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'delete_added_defect_category_d',
                id: id
            },
            success: function (response) {
                if (response == 'success') {
                    Swal.fire({
                        icon: 'info',
                        text: 'Deleted',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    load_defect_category_d();
                }
            }
        });
    }

    //for defect category (mancost)
    const load_defect_category_m = () => {
        $.ajax({
            url: '../../process/it/barcode_m_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'load_defect_category_m'
            }, success: function (response) {
                $('#list_of_defect_category_mancost').html(response);
                $('#spinner').fadeOut();
            }
        });
    }

    const register_defect_category_m = () => {
        var defect_category_m = document.getElementById('defect_category_m').value;

        $.ajax({
            url: '../../process/it/barcode_m_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'register_defect_category_m',
                defect_category_m: defect_category_m
            },
            success: function (response) {
                if (response == 'success') {
                    Swal.fire({
                        icon: 'success',
                        text: 'Success',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    $('#defect_category_m').val('');

                    load_defect_category_m();

                    $('#add_defect_category_m').modal('hide');
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            }
        });
    }

    const delete_added_defect_category_m = (event) => {
        var id = event.target.dataset.id;

        $.ajax({
            url: '../../process/it/barcode_m_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'delete_added_defect_category_m',
                id: id
            },
            success: function (response) {
                if (response == 'success') {
                    Swal.fire({
                        icon: 'info',
                        text: 'Deleted',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    load_defect_category_m();
                }
            }
        });
    }

    //for occurrence process (mancost)
    const load_occurrence_process_m = () => {
        $.ajax({
            url: '../../process/it/barcode_m_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'load_occurrence_process_m'
            }, success: function (response) {
                $('#list_of_occurrence_process_mancost').html(response);
                $('#spinner').fadeOut();
            }
        });
    }

    const register_occurrence_process_mancost = () => {
        var occurrence_process_m = document.getElementById('occurrence_process_m').value;

        $.ajax({
            url: '../../process/it/barcode_m_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'register_occurrence_process_mancost',
                occurrence_process_m: occurrence_process_m
            },
            success: function (response) {
                if (response == 'success') {
                    Swal.fire({
                        icon: 'success',
                        text: 'Success',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    $('#occurrence_process_m').val('');

                    load_occurrence_process_m();

                    $('#add_occurrence_process_m').modal('hide');
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            }
        });
    }

    const delete_added_occurrence_process_m = (event) => {
        var id = event.target.dataset.id;

        $.ajax({
            url: '../../process/it/barcode_m_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'delete_added_occurrence_process_m',
                id: id
            },
            success: function (response) {
                if (response == 'success') {
                    Swal.fire({
                        icon: 'info',
                        text: 'Deleted',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    load_occurrence_process_m();
                }
            }
        });
    }

    //for repair person
    const load_repair_person_d = () => {
        $.ajax({
            url: '../../process/it/barcode_m_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'load_repair_person_d'
            }, success: function (response) {
                $('#list_of_repair_person').html(response);
                $('#spinner').fadeOut();
            }
        });
    }

    const register_repair_person = () => {
        var repair_person_d = document.getElementById('repair_person_d').value;

        $.ajax({
            url: '../../process/it/barcode_m_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'register_repair_person',
                repair_person_d: repair_person_d
            },
            success: function (response) {
                if (response == 'success') {
                    Swal.fire({
                        icon: 'success',
                        text: 'Success',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    $('#repair_person_d').val('');

                    load_repair_person_d();

                    $('#add_repair_person').modal('hide');
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            }
        });
    }

    const delete_added_repair_person = (event) => {
        var id = event.target.dataset.id;

        $.ajax({
            url: '../../process/it/barcode_m_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'delete_added_repair_person',
                id: id
            },
            success: function (response) {
                if (response == 'success') {
                    Swal.fire({
                        icon: 'info',
                        text: 'Deleted',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    load_repair_person_d();
                }
            }
        });
    }
</script>