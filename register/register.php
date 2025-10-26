<?php 
include('../include/dbconn.php');

$i=0;

foreach ( $_POST as $sForm => $value )
{
	$postedValue = htmlspecialchars( stripslashes( $value ), ENT_QUOTES ) ;
    $valuearr[$i] = $postedValue;
$i++;
}

//echo $valuearr[0].'<br>' .$valuearr[1].'<br>'.$valuearr[2].'<br>'.$valuearr[3].'<br>'.$valuearr[4].'<br>'.$valuearr[5].'<br>'.$valuearr[6];

	$sql0 = "SELECT user_username FROM user WHERE user_username = '$valuearr[0]'";
	$query0 = mysqli_query($dbconn, $sql0) or die ("Error: " . mysqli_error($dbconn));
	$row0 = mysqli_num_rows($query0);
	
	if($row0 != 0){
	header('Location: ../register/indexrecordexist.html');
	echo "<b>Record is existed</b>";
	}
	else{
	/* execute SQL INSERT command */
	$sql2 = "INSERT INTO user(user_username, user_password,user_name, user_address, user_phoneno, user_email, lvl_id) 
	VALUES ('$valuearr[0]','$valuearr[1]', '$valuearr[2]', '$valuearr[3]', '$valuearr[5]', '$valuearr[4]', 2)";
		mysqli_query($dbconn, $sql2) or die ("Error: " . mysqli_error($dbconn));
	/* rediredt to respective page */
	echo '<script>alert("You have successfully signed up.")</script>';
	header("refresh:1.5; url=../customer/index.php");
	exit();
	//echo "Data has been saved";
	}

	/* close db connection */
	mysqli_close($dbconn);


?>
