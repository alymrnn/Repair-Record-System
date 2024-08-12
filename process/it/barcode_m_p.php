<?php
include '../conn.php';
// include '../conn_emp_mgt.php';

$method = $_POST['method'];

if ($method == 'qr_setting_list') {
    $c = 0;

    $query = "SELECT * FROM m_car_maker";
    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        foreach ($stmt->fetchALL() as $row) {
            $c++;
            echo '<tr style="cursor:pointer;" class="modal-trigger" data-toggle="modal" data-target="#update_car_settings" onclick="get_car_setting_details(&quot;' . $row['id'] . '~!~' . $row['car_maker'] . '~!~' . $row['car_value'] . '~!~' . $row['product_name_start'] . '~!~' . $row['product_name_length'] . '~!~' . $row['lot_no_start'] . '~!~' . $row['lot_no_length'] . '~!~' . $row['serial_no_start'] . '~!~' . $row['serial_no_length'] . '&quot;)">';
            echo '<td style="text-align:center;">' . $c . '</td>';
            echo '<td style="text-align:center;">' . $row['car_maker'] . '</td>';
            echo '<td style="text-align:center;">' . $row['car_value'] . '</td>';
            echo '<td style="text-align:center;">' . $row['product_name_start'] . '</td>';
            echo '<td style="text-align:center;">' . $row['product_name_length'] . '</td>';
            echo '<td style="text-align:center;">' . $row['lot_no_start'] . '</td>';
            echo '<td style="text-align:center;">' . $row['lot_no_length'] . '</td>';
            echo '<td style="text-align:center;">' . $row['serial_no_start'] . '</td>';
            echo '<td style="text-align:center;">' . $row['serial_no_length'] . '</td>';
            echo '</tr>';
        }
    } else {
        echo '<tr>';
        echo '<td colspan="12" style="text-align:center; color:red;">No Result</td>';
        echo '</tr>';
    }
}

if ($method == 'register_setting') {
    $car_maker = trim($_POST['car_maker']);
    $car_value = trim($_POST['car_value']);
    $pro_name_start = trim($_POST['pro_name_start']);
    $pro_name_length = trim($_POST['pro_name_length']);
    $lot_no_start = trim($_POST['lot_no_start']);
    $lot_no_length = trim($_POST['lot_no_length']);
    $serial_no_start = trim($_POST['serial_no_start']);
    $serial_no_length = trim($_POST['serial_no_length']);

    $check = "SELECT id FROM m_car_maker WHERE car_maker = '$car_maker'";
    $stmt = $conn->prepare($check);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo 'Already Exist';
    } else {
        $stmt = NULL;
        $query = "INSERT INTO m_car_maker (car_maker,car_value,product_name_start,product_name_length,lot_no_start,lot_no_length,serial_no_start,serial_no_length) VALUES ('$car_maker','$car_value','$pro_name_start','$pro_name_length','$lot_no_start','$lot_no_length','$serial_no_start','$serial_no_length')";

        $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
        if ($stmt->execute()) {
            echo 'success';
        } else {
            echo 'error';
        }
    }
}

if ($method == 'update_setting') {
    $id = $_POST['id'];
    $car_maker = trim($_POST['car_maker']);
    $car_value = trim($_POST['car_value']);
    $pro_name_start = trim($_POST['pro_name_start']);
    $pro_name_length = trim($_POST['pro_name_length']);
    $lot_no_start = trim($_POST['lot_no_start']);
    $lot_no_length = trim($_POST['lot_no_length']);
    $serial_no_start = trim($_POST['serial_no_start']);
    $serial_no_length = trim($_POST['serial_no_length']);

    $query = "UPDATE m_car_maker SET car_maker = '$car_maker', car_value = '$car_value', product_name_start = '$pro_name_start', product_name_length = '$pro_name_length', lot_no_start = '$lot_no_start', lot_no_length = '$lot_no_length', serial_no_start = '$serial_no_start', serial_no_length = '$serial_no_length' WHERE id = '$id'";

    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));

    if ($stmt->execute()) {
        echo 'success';
    } else {
        echo 'error';
    }

}

if ($method == 'delete_setting') {
    $id = $_POST['id'];

    $query = "DELETE FROM m_car_maker WHERE id = $id";
    $stmt = $conn->prepare($query, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
    if ($stmt->execute()) {
        echo 'success';
    } else {
        echo 'error';
    }
}

$conn = NULL;
?>