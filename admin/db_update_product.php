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
    

	  $update = "UPDATE product SET
	  			pro_name='$valuearr[0]',
				pro_flavor='$valuearr[1]',
				pro_code='$valuearr[2]',
				pro_status='$valuearr[3]',
				pro_net_weight='$valuearr[4]',
				pro_price='$valuearr[5]'
				WHERE pro_code='$valuearr[2]'";
	  //echo $update;
	  $result = mysqli_query($dbconn, $update) or die ("Error: " . mysqli_error($dbconn));

	  if ($result) {
	  ?>
	  <script type="text/javascript">
	   window.location = "update_view_product.php"
	  </script>
	  <?php }       
     } 
?>