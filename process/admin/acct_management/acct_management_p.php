<?php
include '../../conn.php';

$method = $_POST['method'];

function count_account_list($search_arr, $conn)
{
    $query = "SELECT count(id) AS total FROM m_accounts WHERE emp_no LIKE '" . $search_arr['emp_no_search'] . "%' AND full_name LIKE '" . $search_arr['full_name_search'] . "%'";

    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        foreach ($stmt->fetchALL() as $row) {
            $total = $row['total'];
        }
    } else {
        $total = 0;
    }
    return $total;
}

// function count_account_list($search_arr, $conn)
// {
//     $query = "SELECT COUNT(id) AS total FROM m_accounts WHERE emp_no LIKE :emp_no_search AND full_name LIKE :full_name_search";

//     $stmt = $conn->prepare($query);
//     $stmt->execute(
//         array(
//             ':emp_no_search' => $search_arr['emp_no_search'] . "%",
//             ':full_name_search' => $search_arr['full_name_search'] . "%"
//         )
//     );

//     $total = 0;
//     if ($stmt->rowCount() > 0) {
//         $row = $stmt->fetch(PDO::FETCH_ASSOC);
//         $total = $row['total'];
//     }

//     return $total;
// }


if ($method == 'count_account_list') {
    $emp_no_search = $_POST['emp_no_search'];
    $full_name_search = $_POST['full_name_search'];

    $search_arr = array(
        "emp_no_search" => $emp_no_search,
        "full_name_search" => $full_name_search
    );
    echo count_account_list($search_arr, $conn);
}

if ($method == 'account_list') {
    $current_page = intval($_POST['current_page']);
    $c = 0;

    $results_per_page = 10;

    $page_first_result = ($current_page - 1) * $results_per_page;

    $c = $page_first_result;

    $query = "SELECT * FROM m_accounts LIMIT " . $page_first_result . ", " . $results_per_page;
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        foreach ($stmt->fetchALL() as $l) {
            $c++;
            echo '<tr style="cursor:pointer;" class="modal-trigger" data-toggle="modal" data-target="#update_account" onclick="get_account_details(&quot;' . $l['id'] . '~!~' . $l['emp_no'] . '~!~' . $l['full_name'] . '~!~' . $l['department'] . '~!~' . $l['section'] . '~!~' . $l['role'] . '&quot;)">';
            // '~!~'.$l['repair_station'].
            echo '<td style="text-align:center;">' . $c . '</td>';
            echo '<td style="text-align:center;">' . $l['emp_no'] . '</td>';
            echo '<td style="text-align:center;">' . $l['full_name'] . '</td>';
            echo '<td style="text-align:center;">' . $l['department'] . '</td>';
            echo '<td style="text-align:center;">' . $l['section'] . '</td>';
            echo '<td style="text-align:center;">' . $l['role'] . '</td>';
            // echo '<td style="text-align:center;">'.$l['repair_station'].'</td>';
            echo '<td style="text-align:center;">' . $l['date_updated'] . '</td>';
            echo '</tr>';
        }
    } else {
        echo '<tr>';
        echo '<td colspan="10" style="text-align:center; color:red;">No Record Found</td>';
        echo '</tr>';
    }
}

// add account
if ($method == 'register_account') {
    $emp_no = trim($_POST['emp_no']);
    $full_name = trim($_POST['full_name']);
    $department = trim($_POST['department']);
    $section = trim($_POST['section']);
    $password = trim($_POST['password']);
    $user_type = trim($_POST['user_type']);

    $check = "SELECT id FROM m_accounts WHERE emp_no = '$emp_no'";
    $stmt = $conn->prepare($check);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo 'Already Exist';
    } else {
        $stmt = NULL;
        $query = "INSERT INTO m_accounts (`emp_no`,`full_name`,`department`,`section`,`password`,`role`) VALUES ('$emp_no','$full_name','$department','$section','$password','$user_type')";

        $stmt = $conn->prepare($query);
        if ($stmt->execute()) {
            echo 'success';
        } else {
            echo 'error';
        }
    }
}

//update account
if ($method == 'update_account') {
    $id = $_POST['id'];
    $emp_no = trim($_POST['emp_no']);
    $full_name = trim($_POST['full_name']);
    $department = trim($_POST['department']);
    $section = trim($_POST['section']);
    $password = trim($_POST['password']);
    $role = trim($_POST['role']);

    $query = "SELECT id FROM m_accounts WHERE emp_no = '$emp_no'";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo 'duplicate';
    } else {
        $stmt = NULL;

        // $query = "UPDATE m_accounts SET emp_no = '$emp_no', full_name = '$full_name', department = '$department', section = '$section', password = '$password', role = '$role', repair_station = '$repair_station' WHERE id = '$id'";

        $query = "UPDATE m_accounts SET emp_no = '$emp_no', full_name = '$full_name', department = '$department', section = '$section', role = '$role'";

        if (!empty($password)) {
            $query = $query . ", password = '$password'";
        }

        $query = $query . " WHERE id = '$id'";

        $stmt = $conn->prepare($query);

        if ($stmt->execute()) {
            echo 'success';
        } else {
            echo 'error';
        }
    }
}

// delete account
if ($method == 'delete_account') {
    $id = $_POST['id'];

    $query = "DELETE FROM m_accounts WHERE id = $id";
    $stmt = $conn->prepare($query);
    if ($stmt->execute()) {
        echo 'success';
    } else {
        echo 'error';
    }
}

if ($method == 'account_list_pagination') {
    $emp_no_search = $_POST['emp_no_search'];
    $full_name_search = $_POST['full_name_search'];

    $search_arr = array(
        "emp_no_search" => $emp_no_search,
        "full_name_search" => $full_name_search
    );

    $results_per_page = 5;

    $number_of_result = intval(count_account_list($search_arr, $conn));

    //determine the total number of pages available
    $number_of_page = ceil($number_of_result / $results_per_page);

    for ($page = 1; $page <= $number_of_page; $page++) {
        echo '<option value="' . $page . '">' . $page . '</option>';
    }
}

if ($method == 'account_list_last_page') {
    $emp_no_search = $_POST['emp_no_search'];
    $full_name_search = $_POST['full_name_search'];

    $search_arr = array(
        "emp_no_search" => $emp_no_search,
        "full_name_search" => $full_name_search
    );

    $results_per_page = 10;
    $number_of_result = intval(count_account_list($search_arr, $conn));

    $number_of_page = ceil($number_of_result / $results_per_page);

    echo $number_of_page;
}

// search keyword
if ($method == 'search_account_list') {
    $emp_no_search = $_POST['emp_no_search'];
    $full_name_search = $_POST['full_name_search'];

    $current_page = intval($_POST['current_page']);
    $c = 0;

    $results_per_page = 10;

    $page_first_result = ($current_page - 1) * $results_per_page;

    $c = $page_first_result;

    $query = "SELECT * FROM m_accounts WHERE emp_no LIKE '$emp_no_search%' AND full_name LIKE '$full_name_search%' LIMIT " . $page_first_result . ", " . $results_per_page;

    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        foreach ($stmt->fetchALL() as $l) {
            $c++;
            echo '<tr style="cursor:pointer;" class="modal-trigger" data-toggle="modal" data-target="#update_account" onclick="get_account_details(&quot;' . $l['id'] . '~!~' . $l['emp_no'] . '~!~' . $l['full_name'] . '~!~' . $l['department'] . '~!~' . $l['section'] . '~!~' . $l['role'] . '&quot;)">';
            echo '<td style="text-align:center;">' . $c . '</td>';
            echo '<td style="text-align:center;">' . $l['emp_no'] . '</td>';
            echo '<td style="text-align:center;">' . $l['full_name'] . '</td>';
            echo '<td style="text-align:center;">' . $l['department'] . '</td>';
            echo '<td style="text-align:center;">' . $l['section'] . '</td>';
            echo '<td style="text-align:center;">' . $l['role'] . '</td>';
            echo '<td style="text-align:center;">' . $l['date_updated'] . '</td>';
            echo '</tr>';
        }
    } else {
        echo '<tr>';
        echo '<td colspan="10" style="text-align:center; color:red;">No Record Found</td>';
        echo '</tr>';
    }
}

// if ($method == 'search_account_list') {
//     $emp_no_search = $_POST['emp_no_search'];
//     $full_name_search = $_POST['full_name_search'];

//     $c = 0;

//     $query = "SELECT * FROM m_accounts WHERE emp_no LIKE '$emp_no_search%' AND full_name LIKE '$full_name_search%'";

//     $stmt = $conn->prepare($query);
//     $stmt->execute();
//     if ($stmt->rowCount() > 0) {
//         foreach ($stmt->fetchALL() as $l) {
//             $c++;
//             echo '<tr style="cursor:pointer;" class="modal-trigger" data-toggle="modal" data-target="#update_account" onclick="get_account_details(&quot;' . $l['id'] . '~!~' . $l['emp_no'] . '~!~' . $l['full_name'] . '~!~' . $l['department'] . '~!~' . $l['section'] . '~!~' . $l['role'] . '&quot;)">';
//             echo '<td style="text-align:center;">' . $c . '</td>';
//             echo '<td style="text-align:center;">' . $l['emp_no'] . '</td>';
//             echo '<td style="text-align:center;">' . $l['full_name'] . '</td>';
//             echo '<td style="text-align:center;">' . $l['department'] . '</td>';
//             echo '<td style="text-align:center;">' . $l['section'] . '</td>';
//             echo '<td style="text-align:center;">' . $l['role'] . '</td>';
//             echo '<td style="text-align:center;">' . $l['date_updated'] . '</td>';
//             echo '</tr>';
//         }
//     } else {
//         echo '<tr>';
//         echo '<td colspan="10" style="text-align:center; color:red;">No Record Found</td>';
//         echo '</tr>';
//     }
// }


$conn = NULL;
?>