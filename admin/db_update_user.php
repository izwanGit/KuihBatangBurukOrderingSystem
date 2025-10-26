<?php
include('../include/dbconn.php');

$i=0;

foreach ( $_POST as $sForm => $value )
{
	$postedValue = htmlspecialchars( stripslashes( $value ), ENT_QUOTES ) ;
    $valuearr[$i] = $postedValue; 
$i++;
}


    {
      

	  $update = "UPDATE user SET
	  user_name='$valuearr[0]',
	  user_phoneno='$valuearr[1]',
	  user_address='$valuearr[2]',
	  user_username='$valuearr[3]',
	  user_password='$valuearr[4]'
	  WHERE user_id='$valuearr[5]'";
	  //echo $update;
	  $result = mysqli_query($dbconn, $update) or die ("Error: " . mysqli_error($dbconn));

	  if ($result) {
	  ?>
	  <script type="text/javascript">
	  	window.location = "update_view_user.php"
	  </script>
	  <?php }       
     } 
?>