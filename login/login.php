<?php
// Inialize session
session_start();

// Include database connection settings
include('../include/dbconn.php');

if(isset($_POST['login'])){
	
	/* capture values from HTML form */
	$user_username = $_POST['user_username'];
	$user_password = $_POST['user_password'];
	
	$sql= "SELECT user_username, user_password, lvl_id FROM user WHERE user_username= '$user_username' AND user_password= '$user_password'";
    $query = mysqli_query($dbconn, $sql) or die ("Error: " . mysqli_error());
	$row = mysqli_num_rows($query);
	if($row == 0){
	 // Jump to indexwrong page
	echo "<script>setTimeout(function() { window.location.href = '../login/indexwrong.html'; }, 100);</script>";
	}
	else{
	 $r = mysqli_fetch_assoc($query);
	 $user_username= $r['user_username'];
	 //$password= $r['password'];
	 $level= $r['lvl_id'];
	 //echo($lvl_id);
	
		if($level==1) { 
			$_SESSION['user_username'] = $r['user_username'];
			// Jump to secured page
            //echo "kalau muncul ni maksudnya boleh la tu(ADMIN!)";
			//header('Location: ../admin'); 
			echo "<script>alert('Welcome home Admin ! hope you are having a really nice day.');</script>";
    		echo "<script>setTimeout(function() { window.location.href = '../admin/admin.html'; }, 200);</script>";
		} 
		elseif($level==2) {
			$_SESSION['user_username'] = $r['user_username'];
			// Jump to secured page
			//echo "kalau muncul ni maksudnya boleh la tu(CUSTOMER!)";
        	echo "<script>alert('You have successfully logged into the website');</script>";
    		echo "<script>setTimeout(function() { window.location.href = '../customer/index.php'; }, 200);</script>";

		}
		else {
			header('Location: index.html');
			//echo($level);
		}
		
	}	
}
mysqli_close($dbconn);
?>	