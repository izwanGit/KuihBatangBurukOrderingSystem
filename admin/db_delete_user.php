<?php
// Include database connection settings
include('../include/dbconn.php');

// Check if user ID is provided
if(isset($_GET['user_id'])) {
    // Sanitize and validate the user ID
    $user_id = $_GET['user_id'];
    $user_id = mysqli_real_escape_string($dbconn, $user_id);

    // Delete the user based on the provided user ID
    $del = "DELETE FROM user WHERE user_id='$user_id'";
    $result = mysqli_query($dbconn, $del);

    if ($result) {
        // Deletion successful
        //echo "User with ID $user_id has been deleted successfully.";
		header('Location: ../admin/update_view_user.php');

    } else {
        // Deletion failed
        echo "Error: " . mysqli_error($dbconn);
    }
}

// Close the database connection
mysqli_close($dbconn);
?>
