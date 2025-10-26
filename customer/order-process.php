<?php
include('../include/dbconn.php');
include("../login/session.php");
session_start();

if (!isset($_SESSION['user_username'])) {
    header('Location: ../login');
    exit();
}

date_default_timezone_set("Asia/Kuala_Lumpur");
$date = date("d/m/Y");
$time = date("H:i:s");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES['imageFile'])) {
    $file = $_FILES['imageFile'];
    $file_name = $file['name'];
    $file_tmp = $file['tmp_name'];

    // Specify the directory where you want to save the uploaded image
    $upload_directory = '/Applications/XAMPP/xamppfiles/htdocs/kbb30/img/receipt/';

    // Move the uploaded file to the desired directory        
    if (move_uploaded_file($file_tmp, $upload_directory . $file_name)) {
        //echo 'File uploaded and saved successfully.';
    } else {
        //echo 'Error uploading the file: ' . $_FILES['imageFile']['error'];
    }
    }

    $user_username = $_SESSION['user_username'];
    $query = "SELECT `USER_ID` FROM `USER` WHERE `USER_USERNAME` = '$user_username'";
    $result = mysqli_query($dbconn, $query);
    if ($row = mysqli_fetch_assoc($result)) {
        $user_id = $row['USER_ID'];
        $pro_code = intval($_POST["pro_code"]);
        $price = floatval($_POST["price"]);
        $quantity = intval($_POST["quantity"]);
        $type = $_POST["type"];
        $address = $_POST["address"];
        $total = $price * $quantity;

        

        $roundedNumber = round($total, 2);
        if($type === "delivery"){
            
        }
        $totalprice = number_format($roundedNumber, 2);

        $sql1 = "INSERT INTO `ORDER_` (`USER_ID`, `ORDER_TYPE`, `ORDER_DATE`, `ORDER_STATUS`) VALUES ('$user_id', '$type', '$date', '0')";
        $resultInsert1 = mysqli_query($dbconn, $sql1);
        if (!$resultInsert1) {
            echo "Error inserting into ORDER_ table: " . mysqli_error($dbconn);
        } else {
            $lastinsertid = mysqli_insert_id($dbconn);
            $sql2 = "INSERT INTO `ORDERPRODUCT` (`ORDER_ID`, `PRO_CODE`, `ORDER_QTY`) VALUES ('$lastinsertid', '$pro_code', '$quantity')";
            $resultInsert2 = mysqli_query($dbconn, $sql2);
            if (!$resultInsert2) {
                echo "Error inserting into ORDERPRODUCT table: " . mysqli_error($dbconn);
            } else {
                $sql3 = "INSERT INTO `PAYMENT` (`TOTAL_PRICE`, `PICTURE`, `PAYMENT_STATUS`, `USER_ID`, `ORDER_ID`) VALUES ('$totalprice', '$file_name', '0', '$user_id', '$lastinsertid')";
                $resultInsert3 = mysqli_query($dbconn, $sql3);
                if (!$resultInsert3) {
                    echo "Error inserting into PAYMENT table: " . mysqli_error($dbconn);
                } else {
                    if ($type === 'delivery') {
                        $sql4 = "INSERT INTO `DELIVERY` (`USER_ID`, `ORDER_ID`, `DELI_DATE`, `DELI_TIME`, `REMARK`) VALUES ('$user_id', '$lastinsertid', NULL, NULL, '$address')";
                        $resultInsert4 = mysqli_query($dbconn, $sql4);
                        if (!$resultInsert4) {
                            echo "Error inserting into DELIVERY table: " . mysqli_error($dbconn);
                        }
                    }
                }
            }
        }
    }
    mysqli_close($dbconn);
    echo "<script>setTimeout(function() { window.location.href = '../customer/my-order.php'; }, 200);</script>";


} else {
    echo 'There is no POST method in the code.';
}
?>
