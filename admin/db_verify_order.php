<?php
// Include database connection settings
include('../include/dbconn.php');

$orderID = $_GET['id'];

// Perform the verification process for the order with the given ID
$sql = "UPDATE `order_`
JOIN `payment` ON `order_`.`ORDER_ID` = `payment`.`ORDER_ID`
SET `order_`.`ORDER_STATUS` = 1, `payment`.`PAYMENT_STATUS` = 1
WHERE `order_`.`ORDER_ID` = '$orderID';";
$result = mysqli_query($dbconn, $sql);

if ($result) {
    // Redirect back to the page with the order list after successful verification
    header('Location: add_order.php');
    exit();
} else {
    // Handle the case when the update query fails
    echo "Error updating order status: " . mysqli_error($dbconn);
}
?>
