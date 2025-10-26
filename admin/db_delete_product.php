<?php
$user = $_GET['pro_id'];
include('../include/dbconnect.php');

$i=0;

foreach ( $_POST as $sForm => $value )
{
	$postedValue = htmlspecialchars( stripslashes( $value ), ENT_QUOTES ) ;
    $valuearr[$i] = $postedValue; 
$i++;
}
  
	  $del = "DELETE FROM product WHERE pro_flavor='$user'";
	  echo $del;
	  //$result = mysql_query($update) or die(mysql_error());
	  if ($result) {
		header('Location: ../index.html'); }
    
?>