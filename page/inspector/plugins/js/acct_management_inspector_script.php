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
            url: '../../process/inspector/acct_management_inspector_p.php',
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
            url: '../../process/inspector/acct_management_inspector_p.php',
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
            url: '../../process/inspector/acct_management_inspector_p.php',
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
    }

    // add account
    const register_account = () => {
        var emp_no = document.getElementById('emp_no').value;
        var full_name = document.getElementById('full_name').value;
        var department = document.getElementById('department').value;
        var section = document.getElementById('section').value;
        var password = document.getElementById('password').value;
        var user_type = document.getElementById('user_type').value;

        if (emp_no == '') {
            Swal.fire({
                icon: 'info',
                title: 'Please input employee ID.',
                showConfirmButton: false,
                timer: 2000
            });
        } else if (full_name == '') {
            Swal.fire({
                icon: 'info',
                title: 'Please input full name.',
                showConfirmButton: false,
                timer: 2000
            });
        } else if (department == '') {
            Swal.fire({
                icon: 'info',
                title: 'Please input department.',
                showConfirmButton: false,
                timer: 2000
            });
        } else if (section == '') {
            Swal.fire({
                icon: 'info',
                title: 'Please input section.',
                showConfirmButton: false,
                timer: 2000
            });
        } else if (password == '') {
            Swal.fire({
                icon: 'info',
                title: 'Please input password.',
                showConfirmButton: false,
                timer: 2000
            });
        } else if (user_type == '') {
            Swal.fire({
                icon: 'info',
                title: 'Please select user type.',
                showConfirmButton: false,
                timer: 2000
            });
        }
        else {
            $.ajax({
                url: '../../process/inspector/acct_management_inspector_p.php',
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
                },
                success: function (response) {
                    if (response == 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Account Recorded',
                            text: 'Success',
                            showConfirmButton: false,
                            timer: 2000
                        });
                        $('#emp_no').val('');
                        $('#full_name').val('');
                        $('#department').val('');
                        $('#section').val('');
                        $('#password').val('');
                        $('#user_type').val('');
                        search_account(1);
                        $('#add_account').modal('hide');
                    } else if (response == 'Already Exist') {
                        Swal.fire({
                            icon: 'info',
                            title: 'Duplicate Data',
                            showConfirmButton: false,
                            timer: 2000
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            showConfirmButton: false,
                            timer: 2000
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

        console.log(role);

        document.getElementById('id_account_update').value = id;
        document.getElementById('emp_no_update').value = emp_no;
        document.getElementById('full_name_update').value = full_name;
        document.getElementById('department_update').value = department;
        document.getElementById('section_update').value = section;
        document.getElementById('user_type_update').value = role;
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

        $.ajax({
            url: '../../process/inspector/acct_management_inspector_p.php',
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
            },
            success: function (response) {
                if (response == 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Account Updated',
                        showConfirmButton: false,
                        timer: 2000
                    });
                    $('#emp_no').val('');
                    $('#full_name').val('');
                    $('#department').val('');
                    $('#section').val('');
                    $('#password').val('');
                    $('#user_type').val('');
                    search_account(1);
                    $('#update_account').modal('hide');
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        showConfirmButton: false,
                        timer: 2000
                    });
                }
            }
        });
    }

    // delete account
    const delete_account = () => {
        var id = document.getElementById('id_account_update').value;
        $.ajax({
            url: '../../process/inspector/acct_management_inspector_p.php',
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
                        title: 'Account Deleted',
                        showConfirmButton: false,
                        timer: 2000
                    });
                    search_account(1);
                    $('#update_account').modal('hide');
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        showConfirmButton: false,
                        timer: 2000
                    });
                }
            }
        });
    }
</script>