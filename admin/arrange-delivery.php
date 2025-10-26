<?php
include('../include/dbconn.php');
include("../login/session.php");
session_start();

if (!isset($_SESSION['user_username'])) {
    header('Location: ../login');
    exit();
}

if (isset($_POST['date_input']) && isset($_POST['time_input'])) {
    $date_input = $_POST['date_input'];
    $time_input = $_POST['time_input'];
    $selectedOption = $_POST['orderid_'];

    //echo $date_input. ' ' . $time_input . ' ' . $selectedOption;

    $sql = "UPDATE `DELIVERY` SET `DELI_DATE`='$date_input', `DELI_TIME`='$time_input' WHERE `ORDER_ID`='$selectedOption'";
    $result = mysqli_query($dbconn, $sql);

    if ($result) {
        //echo "Column updated successfully.";
        echo "<script>setTimeout(function() { window.location.href = '../admin/delivery.php'; }, 200);</script>";
    } else {
        echo "Error updating column: " . mysqli_error($dbconn);
    }
} else {
    echo 'tak jadi langsung';
}
    mysqli_close($dbconn);
?>
