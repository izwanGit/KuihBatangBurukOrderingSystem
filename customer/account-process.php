<?php
include('../include/dbconn.php');
include ("../login/session.php");
session_start();

if (!isset($_SESSION['user_username'])) {
    header('Location: ../login');
    exit();
}

$i = 0;
foreach ($_POST as $sForm => $value) {
    $postedValue = htmlspecialchars(stripslashes($value), ENT_QUOTES);
    $valuearr[$i] = $postedValue;
    $i++;
}

$user_username = $_SESSION['user_username'];

// Check if the updated username is already used by other users
$updatedUsername = $valuearr[0];
if ($updatedUsername !== $user_username) {
    $query = "SELECT * FROM `USER` WHERE `USER_USERNAME` = '$updatedUsername'";
    $result = mysqli_query($dbconn, $query);
    if (mysqli_num_rows($result) > 0) {
        // Username is already used by another user
        echo '<script>alert("Username is already taken. Please choose a different username.")</script>';
        header("refresh:0.5; url=account.php");
        exit();
    }
}

/* execute SQL UPDATE command */
$sql3 = "UPDATE USER SET user_username='$valuearr[0]', user_name='$valuearr[1]', user_phoneno='$valuearr[2]',
 user_address='$valuearr[3]', user_email='$valuearr[4]', user_password='$valuearr[5]'
 WHERE user_username='$user_username'";

mysqli_query($dbconn, $sql3) or die("Error: " . mysqli_error($dbconn));
$_SESSION['user_username'] = $valuearr[0];

/* redirect to respective page */
echo '<script>alert("You have successfully updated.")</script>';
header("refresh:0.5; url=../customer/account.php");
exit();


/* close db connection */
mysqli_close($dbconn);
?>
