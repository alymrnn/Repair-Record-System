<?php
include '../conn.php';
// include '../conn_emp_mgt.php';

$method = $_POST['method'];

function count_account_list($search_arr, $conn)
{
    $query = "SELECT count(id) AS total FROM m_accounts WHERE role = 'PD' AND emp_no LIKE '" . $search_arr['emp_no_search'] . "%' AND full_name LIKE '" . $search_arr['full_name_search'] . "%'";

    // $stmt = $conn->prepare($query);
    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
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

if ($method == 'count_account_list') {
    $emp_no_search = $_POST['emp_no_search'];
    $full_name_search = $_POST['full_name_search'];

    $search_arr = array(
        "emp_no_search" => $emp_no_search,
        "full_name_search" => $full_name_search
    );
    echo count_account_list($search_arr, $conn);
}

if ($method == 'account_list_pagination') {
    $emp_no_search = $_POST['emp_no_search'];
    $full_name_search = $_POST['full_name_search'];

    $search_arr = array(
        "emp_no_search" => $emp_no_search,
        "full_name_search" => $full_name_search
    );

    $results_per_page = 10;

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
// mysql
// if ($method == 'search_account_list') {
//     $emp_no_search = $_POST['emp_no_search'];
//     $full_name_search = $_POST['full_name_search'];

//     $current_page = isset($_POST['current_page']) ? max(1, intval($_POST['current_page'])) : 1;
//     $c = 0;

//     $results_per_page = 10;

//     $page_first_result = ($current_page - 1) * $results_per_page;

//     $c = $page_first_result;

//     $query = "SELECT * FROM m_accounts WHERE role = 'PD' AND emp_no LIKE '$emp_no_search%' AND full_name LIKE '$full_name_search%' LIMIT " . $page_first_result . ", " . $results_per_page;

//     $stmt = $conn->prepare($query);
//     $stmt->execute();
//     if ($stmt->rowCount() > 0) {
//         foreach ($stmt->fetchALL() as $row) {
//             $c++;
//             echo '<tr style="cursor:pointer;" class="modal-trigger" data-toggle="modal" data-target="#update_account" onclick="get_account_details(&quot;' . $row['id'] . '~!~' . $row['emp_no'] . '~!~' . $row['full_name'] . '~!~' . $row['department'] . '~!~' . $row['section'] . '~!~' . $row['role'] . '&quot;)">';
//             echo '<td style="text-align:center;">' . $c . '</td>';
//             echo '<td style="text-align:center;">' . $row['emp_no'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['full_name'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['department'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['section'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['role'] . '</td>';
//             echo '<td style="text-align:center;">' . $row['date_updated'] . '</td>';
//             echo '</tr>';
//         }
//     } else {
//         echo '<tr>';
//         echo '<td colspan="10" style="text-align:center; color:red;">No Record Found</td>';
//         echo '</tr>';
//     }
// }

// mssql
if ($method == 'search_account_list') {
    $emp_no_search = $_POST['emp_no_search'];
    $full_name_search = $_POST['full_name_search'];

    $current_page = isset($_POST['current_page']) ? max(1, intval($_POST['current_page'])) : 1;
    $c = 0;

    $results_per_page = 10;

    $page_first_result = ($current_page - 1) * $results_per_page;

    $c = $page_first_result;

    $query = "SELECT id, emp_no, full_name, department, section, role, date_updated 
              FROM m_accounts 
              WHERE role = 'PD' 
              AND emp_no LIKE :emp_no_search 
              AND full_name LIKE :full_name_search 
              ORDER BY date_updated DESC
              OFFSET :page_first_result ROWS 
              FETCH NEXT :results_per_page ROWS ONLY";

    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->bindValue(':emp_no_search', $emp_no_search . '%', PDO::PARAM_STR);
    $stmt->bindValue(':full_name_search', $full_name_search . '%', PDO::PARAM_STR);
    $stmt->bindValue(':page_first_result', $page_first_result, PDO::PARAM_INT);
    $stmt->bindValue(':results_per_page', $results_per_page, PDO::PARAM_INT);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
            $c++;
            echo '<tr style="cursor:pointer;" class="modal-trigger" data-toggle="modal" data-target="#update_account" onclick="get_account_details(&quot;' . $row['id'] . '~!~' . $row['emp_no'] . '~!~' . $row['full_name'] . '~!~' . $row['department'] . '~!~' . $row['section'] . '~!~' . $row['role'] . '&quot;)">';
            echo '<td style="text-align:center;">' . $c . '</td>';
            echo '<td style="text-align:center;">' . $row['emp_no'] . '</td>';
            echo '<td style="text-align:center;">' . $row['full_name'] . '</td>';
            echo '<td style="text-align:center;">' . $row['department'] . '</td>';
            echo '<td style="text-align:center;">' . $row['section'] . '</td>';
            echo '<td style="text-align:center;">' . $row['role'] . '</td>';
            echo '<td style="text-align:center;">' . $row['date_updated'] . '</td>';
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
    $stmt = $conn->prepare($check, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo 'Already Exist';
    } else {
        $stmt = NULL;
        $query = "INSERT INTO m_accounts (emp_no, full_name, department, section, password, role) VALUES ('$emp_no','$full_name','$department','$section','$password','$user_type')";

        $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
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
    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute();

    $query = "UPDATE m_accounts SET emp_no = '$emp_no', full_name = '$full_name', department = '$department', section = '$section', role = '$role'";

    if (!empty($password)) {
        $query = $query . ", password = '$password'";
    }

    $query = $query . " WHERE id = '$id'";

    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));

    if ($stmt->execute()) {
        echo 'success';
    } else {
        echo 'error';
    }
}

// delete account
if ($method == 'delete_account') {
    $id = $_POST['id'];

    $query = "DELETE FROM m_accounts WHERE id = $id";
    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    if ($stmt->execute()) {
        echo 'success';
    } else {
        echo 'error';
    }
}

$conn = NULL;
?>