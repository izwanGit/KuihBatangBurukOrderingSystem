<?php 
// Include database connection settings
include('../include/dbconn.php');
include ("../login/session.php");
session_start();
$user = $_SESSION['user_username'];
if (!isset($_SESSION['user_username'])) {
        header('Location: ../login');
		} 
/* capture search_name */
$namesearch = $_POST['search_name'];

/* execute SQL statement 
$sql= "(SELECT * FROM user WHERE name LIKE '$namesearch' )";
$query = mysqli_query($dbconn, $sql) or die ("Error: " . mysqli_error());
$row = mysqli_num_rows($query);
if($row == 0){
echo "No record found";
}
else{
$r = mysqli_fetch_assoc($query);
$name= $r['name'];
$password= $r['password'];
}*/
?>		


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: "Lato", sans-serif;
  color: #ffffff;
  background-image:url('');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
  background-color: #359055;
}

div {
  max-width: 1100px;
  height: 100px;
}

.sidenav {
  height: 100%;
  width: 200px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #000000;
  overflow-x: hidden;
  padding-top: 20px;
}

.sidenav a {
  padding: 6px 6px 6px 6px;
  text-decoration: none;
  font-size: 14px;
  color: #818181;
  display: block;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.greatinguser{
  text-transform: uppercase;
}

.main {
  margin-left: 200px; /* Same as the width of the sidenav */
}

.container{
  font-family: "Lato", sans-serif;
  color: #000000;
  margin-left: 200px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}


</style>
</head>
<body>

<div class="sidenav">
<b>
<br><br>

  <br>
  <b> Admin Dashboard</b>
  <a href="../login/logout.php">Logout</a>
  <br>
  
  <b>User</b>
  <a href="view_user.php">View</a>
  <a href="update_view_user.php">Update</a>
  <a href="search_user.php">Search</a>
  
  <b>Product</b>
  <a href="add_product.php">Add</a>
  <a href="update_view_product.php">Update</a>
  
  
  <b>Order</b>
  <a href="add_order.php">Verify Order</a>
  <a href="delivery.php">Arrange Delivery</a>


  <b>Report</b>
  <a href="user_report.php">User Report</a>
  <a href="sales_report.php">Sales Report</a>
</div>

<div class="main">
  <div class="greatinguser">
	<h1><?php echo $user; ?></h1>
	<h3>Kuih Batang Buruk Administrator Dashboard</h3>
  </div> 
</div>

<div class="container">

<h3>Search User Data </h3>

<fieldset>


  <b>User Data</b>
	<?php
		/*$query = "SELECT * FROM user  WHERE level_id != 1 ORDER BY name";
		$result = mysqli_query($dbconn, $query) or die ("Error: " . mysqli_error($dbconn));
		$numrow = mysqli_num_rows($result);*/
		
		/* execute SQL statement */
		$query= "(SELECT * FROM user WHERE user_name LIKE '%$namesearch%' )";
		$result = mysqli_query($dbconn, $query) or die ("Error: " . mysqli_error($dbconn));
		$numrow = mysqli_num_rows($result);
		
	?>
   <tr align="left" bgcolor="#f2f2f2">
    <td>
    <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0">
      <tr align="left" bgcolor="#f2f2f2">
        <th width="3%">No</td>
        <th width="26%">Name</td>       
        <th width="27%">Address</td>
        <th width="9%">Telephone</td>
        <th align="center">Action</td>
      </tr>
	  
      <?php
	  $color="1";
	  
	  for ($a=0; $a<$numrow; $a++) {
		$row = mysqli_fetch_array($result);
		
		if($color==1){
			echo "<tr bgcolor='#FFFFCC'>"
	  ?>
        <td>&nbsp;<?php echo $a+1; ?></td>
        <td>&nbsp;<?php echo ucwords (strtolower($row['USER_NAME'])); ?></td>   
        <td><?php echo ucwords (strtolower($row['USER_ADDRESS'])); ?></td>
        <td>&nbsp;<?php echo $row['USER_PHONENO']; ?></td>
        <td width="5%" align="center"><a class="one" href="detail_user.php?user_id=<?php echo $row['USER_ID'];?>">Detail</a></td>
      </tr> 
      <?php 
       $color="2";}
	   else{
	   echo "<tr bgcolor='#FFCC99'>"
	  ?>
        <td>&nbsp;<?php echo $a+1; ?></td>
        <td>&nbsp;<?php echo ucwords (strtolower($row['USER_NAME'])); ?></td>   
        <td><?php echo ucwords (strtolower($row['USER_ADDRESS'])); ?></td>
        <td>&nbsp;<?php echo $row['USER_PHONENO']; ?></td>
        <td width="5%" align="center"><a class="one" href="detail_user.php?user_id=<?php echo $row['USER_ID'];?>">Detail</a></td>
      </tr>
	   <?php
	    $color="1";
	   }
	  } 
	  if ($numrow==0)
	  	{
		 echo '<tr>
    				<td colspan="8"><font color="#FF0000">No record avaiable.</font></td>
 			   </tr>'; 
		}
	  ?>
    </table>

</fieldset>
 
		
</div>
   
</body>

</html> 


























