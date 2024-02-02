<script type="text/javascript">
    // let currentPage = 1;

    // $(document).ready(function () {
    //     load_accounts(currentPage);
    // });

    $(document).ready(function () {
        load_accounts(1);
    });


    // const get_next_page = () => {
    //     // Increment the current page
    //     currentPage++;
    //     console.log("Button clicked! Current page: " + currentPage);

    //     load_accounts(currentPage);
    // }

    // const load_accounts = (page) => {
    //     // You may want to pass the page number to the server for pagination
    //     $.ajax({
    //         url: '../../process/admin/acct_management/acct_management_p.php',
    //         type: 'POST',
    //         cache: false,
    //         data: {
    //             method: 'account_list',
    //             page: page // Add this line to send the current page number to the server
    //         },
    //         success: function (response) {
    //             // Assuming your server returns the HTML for the table rows
    //             // Update the table with the new data
    //             $('#list_of_accounts').append(response); // Use append to add rows to the existing ones
    //             $('#spinner').fadeOut();
    //         }
    //     });
    // }











    const load_accounts = () => {
        $.ajax({
            url: '../../process/admin/acct_management/acct_management_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'account_list'
            },
            success: function (response) {
                $('#list_of_accounts').html(response);
                $('#spinner').fadeOut();
            }
        });
    }

    // add account
    const register_account = () => {
        var emp_no = document.getElementById('emp_no').value;
        var full_name = document.getElementById('full_name').value;
        var department = document.getElementById('department').value;
        var section = document.getElementById('section').value;
        var password = document.getElementById('password').value;
        var user_type = document.getElementById('user_type').value;
        // var repair_station = document.getElementById('repair_station').value;

        if (emp_no == '') {
            Swal.fire({
                icon: 'info',
                title: 'Please input employee ID.',
                text: 'Information',
                showConfirmButton: false,
                timer: 2500
            });
        } else if (full_name == '') {
            Swal.fire({
                icon: 'info',
                title: 'Please input full name.',
                text: 'Information',
                showConfirmButton: false,
                timer: 2500
            });
        } else if (department == '') {
            Swal.fire({
                icon: 'info',
                title: 'Please input department.',
                text: 'Information',
                showConfirmButton: false,
                timer: 2500
            });
        } else if (section == '') {
            Swal.fire({
                icon: 'info',
                title: 'Please input section.',
                text: 'Information',
                showConfirmButton: false,
                timer: 2500
            });
        } else if (password == '') {
            Swal.fire({
                icon: 'info',
                title: 'Please input password.',
                text: 'Information',
                showConfirmButton: false,
                timer: 2500
            });
        } else if (user_type == '') {
            Swal.fire({
                icon: 'info',
                title: 'Please select user type.',
                text: 'Information',
                showConfirmButton: false,
                timer: 2500
            });
        }
        // else if (repair_station == '') {
        //     Swal.fire({
        //         icon: 'info',
        //         title: 'Please select repair station.',
        //         text: 'Information',
        //         showConfirmButton: false,
        //         timer: 2500
        //     });
        // } 
        else {
            $.ajax({
                url: '../../process/admin/acct_management/acct_management_p.php',
                type: 'POST',
                cache: false,
                data: {
                    method: 'register_account',
                    emp_no: emp_no,
                    full_name: full_name,
                    department: department,
                    section: section,
                    password: password,
                    user_type: user_type
                    // repair_station: repair_station
                },
                success: function (response) {
                    if (response == 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Succesfully Recorded!',
                            text: 'Success',
                            showConfirmButton: false,
                            timer: 2500
                        });
                        $('#emp_no').val('');
                        $('#full_name').val('');
                        $('#department').val('');
                        $('#section').val('');
                        $('#password').val('');
                        $('#user_type').val('');
                        // $('#repair_station').val('');
                        load_accounts();
                        $('#add_account').modal('hide');
                    } else if (response == 'Already Exist') {
                        Swal.fire({
                            icon: 'info',
                            title: 'Duplicate Data',
                            text: 'Information',
                            showConfirmButton: false,
                            timer: 2500
                        });
                    } else {
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
    }

    // get account details onclick
    const get_account_details = (param) => {
        var string = param.split('~!~');
        var id = string[0];
        var emp_no = string[1];
        var full_name = string[2];
        var department = string[3];
        var section = string[4];
        var role = string[5];
        // var repair_station = string[6];

        console.log(role);
        // console.log(repair_station);

        document.getElementById('id_account_update').value = id;
        document.getElementById('emp_no_update').value = emp_no;
        document.getElementById('full_name_update').value = full_name;
        document.getElementById('department_update').value = department;
        document.getElementById('section_update').value = section;
        document.getElementById('user_type_update').value = role;
        // document.getElementById('repair_station_update').value = repair_station;
    }

    // update account
    const update_account = () => {
        var id = document.getElementById('id_account_update').value;
        var emp_no = document.getElementById('emp_no_update').value;
        var full_name = document.getElementById('full_name_update').value;
        var department = document.getElementById('department_update').value;
        var section = document.getElementById('section_update').value;
        var password = document.getElementById('password_update').value;
        var role = document.getElementById('user_type_update').value;
        // var repair_station = document.getElementById('repair_station_update').value;

        $.ajax({
            url: '../../process/admin/acct_management/acct_management_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'update_account',
                id: id,
                emp_no: emp_no,
                full_name: full_name,
                department: department,
                section: section,
                password: password,
                role: role
                // repair_station: repair_station
            },
            success: function (response) {
                if (response == 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Successfully Recorded!',
                        text: 'Success',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    $('#emp_no').val('');
                    $('#full_name').val('');
                    $('#department').val('');
                    $('#section').val('');
                    $('#password').val('');
                    $('#user_type').val('');
                    // $('#repair_station').val('');
                    load_accounts();
                    $('#update_account').modal('hide');
                } else if (response == 'duplicate') {
                    Swal.fire({
                        icon: 'info',
                        title: 'Duplicate Data!',
                        text: 'Information',
                        showConfirmButton: false,
                        timer: 2500
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'Error',
                        showConfirmButton: false,
                        timer: 2500
                    });
                }
            }
        });
    }

    // delete account
    const delete_account = () => {
        var id = document.getElementById('id_account_update').value;
        $.ajax({
            url: '../../process/admin/acct_management/acct_management_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'delete_account',
                id: id
            },
            success: function (response) {
                if (response == 'success') {
                    Swal.fire({
                        icon: 'info',
                        title: 'Successfully Deleted!',
                        text: 'Information',
                        showConfirmButton: false,
                        timer: 2500
                    });
                    load_accounts();
                    $('#update_account').modal('hide');
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error !!!',
                        text: 'Error',
                        showConfirmButton: false,
                        timer: 2500
                    });
                }
            }
        });
    }

    // search account
    const search_account = () => {
        var emp_no_search = document.getElementById('emp_no_search').value;
        var full_name_search = document.getElementById('full_name_search').value;

        if ((emp_no_search != '' || emp_no_search == '') && (full_name_search != '' || full_name_search == '')) {
            $.ajax({
                url: '../../process/admin/acct_management/acct_management_p.php',
                type: 'POST',
                cache: false,
                data: {
                    method: 'search_account_list',
                    emp_no_search: emp_no_search,
                    full_name_search: full_name_search
                },
                success: function (response) {
                    $('#list_of_accounts').html(response);

                    // display total count based on searched data
                    // let table_rows = parseInt(document.getElementById("list_of_accounts").childNodes.length);
                    // $('#count_view_accounts').html("Count: " + table_rows);
                    $('#spinner').fadeOut();
                }
            });
        } else {
            Swal.fire({
                icon: 'info',
                title: 'Empty Fields',
                text: 'Fill-out input search field/s',
                showConfirmButton: false,
                timer: 1000
            });
        }
    }
</script>