<script type="text/javascript">
    $(document).ready(function () {
        search_account(1);
    });

    document.getElementById("emp_no_search").addEventListener("keyup", e => {
        search_account(1);
    });

    document.getElementById("full_name_search").addEventListener("keyup", e => {
        search_account(1);
    });

    // Table Responsive Scroll Event for Load More
    document.getElementById("list_of_accounts_res").addEventListener("scroll", function () {
        var scrollTop = document.getElementById("list_of_accounts_res").scrollTop;
        var scrollHeight = document.getElementById("list_of_accounts_res").scrollHeight;
        var offsetHeight = document.getElementById("list_of_accounts_res").offsetHeight;

        //check if the scroll reached the bottom
        if ((offsetHeight + scrollTop + 1) >= scrollHeight) {
            get_next_page();
        }
    });

    const get_next_page = () => {
        var current_page = parseInt(sessionStorage.getItem('account_table_pagination'));
        let total = sessionStorage.getItem('count_rows');
        var last_page = parseInt(sessionStorage.getItem('last_page'));
        var next_page = current_page + 1;
        if (next_page <= last_page && total > 0) {
            search_account(next_page);
        }
    }

    const count_account = () => {
        var emp_no_search = sessionStorage.getItem('emp_no_search');
        var full_name_search = sessionStorage.getItem('full_name_search');

        $.ajax({
            url: '../../process/admin/acct_management/acct_management_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'count_account_list',
                emp_no_search: emp_no_search,
                full_name_search: full_name_search
            },
            success: function (response) {
                sessionStorage.setItem('count_rows', response);
                var count = `Total: ${response}`;
                $('#account_table_info').html(count);

                if (response > 0) {
                    load_account_last_page();
                } else {
                    document.getElementById("btnNextPage").style.display = "none";
                    document.getElementById("btnNextPage").setAttribute('disabled', true);
                }
            }
        });
    }

    const load_account_last_page = () => {
        var emp_no_search = sessionStorage.getItem('emp_no_search');
        var full_name_search = sessionStorage.getItem('full_name_search');
        var current_page = sessionStorage.getItem('account_table_pagination');

        $.ajax({
            url: '../../process/admin/acct_management/acct_management_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'account_list_last_page',
                emp_no_search: emp_no_search,
                full_name_search: full_name_search
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

    // search account
    const search_account = current_page => {
        var emp_no_search = document.getElementById('emp_no_search').value;
        var full_name_search = document.getElementById('full_name_search').value;

        var emp_no_search_1 = sessionStorage.getItem('emp_no_search');
        var full_name_search_1 = sessionStorage.getItem('full_name_search');

        if (current_page > 1) {
            switch (true) {
                case emp_no_search !== emp_no_search_1:
                case full_name_search !== full_name_search_1:
                    emp_no_search = emp_no_search_1;
                    full_name_search = full_name_search_1;
                    break;
                default:
            }
        } else {
            sessionStorage.setItem('emp_no_search', emp_no_search);
            sessionStorage.setItem('full_name_search', full_name_search);
        }
        $.ajax({
            url: '../../process/admin/acct_management/acct_management_p.php',
            type: 'POST',
            cache: false,
            data: {
                method: 'search_account_list',
                emp_no_search: emp_no_search,
                full_name_search: full_name_search,
                current_page: current_page
            },
            beforeSend: () => {
                var loading = `<tr id="loading"><td colspan="6" style="text-align:center;"><div class="spinner-border text-dark role="status"><span class="sr-only">Loading...</span></div></td></tr>`;
                if (current_page == 1) {
                    document.getElementById("list_of_accounts").innerHTML = loading;
                } else {
                    $('#account_table tbody').append(loading);
                }
            },
            success: function (response) {
                $('#loading').remove();
                if (current_page == 1) {
                    $('#account_table tbody').html(response);
                } else {
                    $('#account_table tbody').append(response);
                }
                sessionStorage.setItem('account_table_pagination', current_page);
                count_account();
            }
        });

        // if ((emp_no_search != '' || emp_no_search == '') && (full_name_search != '' || full_name_search == '')) {
        //     $.ajax({
        //         url: '../../process/admin/acct_management/acct_management_p.php',
        //         type: 'POST',
        //         cache: false,
        //         data: {
        //             method: 'search_account_list',
        //             emp_no_search: emp_no_search,
        //             full_name_search: full_name_search
        //         },
        //         success: function (response) {
        //             $('#list_of_accounts').html(response);

        //             // display total count based on searched data
        //             // let table_rows = parseInt(document.getElementById("list_of_accounts").childNodes.length);
        //             // $('#count_view_accounts').html("Count: " + table_rows);
        //             $('#spinner').fadeOut();
        //         }
        //     });
        // } else {
        //     Swal.fire({
        //         icon: 'info',
        //         title: 'Empty Fields',
        //         text: 'Fill-out input search field/s',
        //         showConfirmButton: false,
        //         timer: 1000
        //     });
        // }
    }

    // const load_accounts = () => {
    //     $.ajax({
    //         url: '../../process/admin/acct_management/acct_management_p.php',
    //         type: 'POST',
    //         cache: false,
    //         data: {
    //             method: 'account_list'
    //         },
    //         success: function (response) {
    //             $('#list_of_accounts').html(response);
    //             $('#spinner').fadeOut();
    //         }
    //     });
    // }

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
</script>