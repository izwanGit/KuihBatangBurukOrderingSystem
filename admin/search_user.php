<?php 
// Include database connection settings
include('../include/dbconn.php');
include ("../login/session.php");
session_start();
$user = $_SESSION['user_username'];
if (!isset($_SESSION['user_username'])) {
        header('Location: ../login');
		} 
		
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
	<h3>Coffee House Administrator Dashboard</h3>
  </div> 
</div>

<div class="container">

<h3>Search User Data</h3>

<fieldset>

<b>Enter User Name </b>
<br><br>

<form name="form1" method="post" action="db_search_user.php" enctype="multipart/form-data">
    <table width="80%" border="0" align="center">
      <tr>
        <td width="16%">User Name</td>  
        <td width="84%"><input type="text" name="search_name" size="50" />
      </tr>  
       <tr> 
        <td align="center" colspan="2"><input type="submit" name="submit" value=" Search " />
        <input type="button" name="cancel" value=" Cancel " onclick="location.href='viewuser.php'" /></td>
      </tr>
    </table>
</form>

</fieldset>
 
</div>
   
</body>

</html> 


























