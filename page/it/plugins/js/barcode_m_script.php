<script type="text/javascript">
    $(document).ready(function () {
        load_car_settings();
    });

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

</script>