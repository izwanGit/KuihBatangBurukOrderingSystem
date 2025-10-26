<?php
	include('../include/dbconn.php');
	
	$id=$_GET['id'];
	
	$delete = "DELETE FROM product WHERE pro_code='$id'";
	$result = mysqli_query($dbconn, $delete) or die ("Error: " . mysqli_error($dbconn));
	//echo $delete;
	
	if ($result) {
	  ?>
	  <script type="text/javascript">
	  	window.location = "update_view_product.php"
	  </script>
	  <?php }
    
    else
    {
      echo $update;
	?> 
	  <script type="text/javascript">
	  	window.location = "update_view_product.php"
	  </script>
	<?php       
     } 
	
?>