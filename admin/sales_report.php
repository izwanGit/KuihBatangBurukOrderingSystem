<?php 
// Include database connection settings
include('../include/dbconn.php');

include ("../login/session.php");
session_start();

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
.text-center {
  text-align: center;
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
	<h1><?php echo $_SESSION['user_username']; ?></h1>
	<h3>Kuih Batang Buruk Administrator Dashboard</h3>
    <h1 class="text-center">SALES REPORT</h1>
  </div> 
</div>

<div class="container">
  

<br>
  <br>
  <br>
  <h3>User Data</h3>
	<?php
		$query = "SELECT * FROM order_ INNER JOIN USER ON ORDER_.USER_ID = USER.USER_ID
        INNER JOIN orderproduct ON order_.ORDER_ID = orderproduct.ORDER_ID
        INNER JOIN payment ON order_.ORDER_ID = payment.ORDER_ID WHERE order_.ORDER_STATUS = 1 ORDER BY order_.ORDER_ID;";
		$result = mysqli_query($dbconn, $query) or die ("Error: " . mysqli_error($dbconn));
		$numrow = mysqli_num_rows($result);
	?>
   <tr align="left" bgcolor="#f2f2f2">
    <td>
    <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0">
      <tr align="left" bgcolor="#f2f2f2">
        <th width="5%">Order ID</td>
        <th width="26%">Product</td>       
        <th width="27%">Quantity</td>
        <th width="9%">Total(RM)</td>
      </tr>
	  
      <?php
	  $color="1";
	  
      $totalSales=0;
      $amountSales=0;
	  for ($a=0; $a<$numrow; $a++) {
		$row = mysqli_fetch_array($result);
		
        $totalSales = $totalSales + $row['TOTAL_PRICE'];
        $amountSales = $amountSales + $row['ORDER_QTY'];

		if($color==1){
			echo "<tr bgcolor='#FFFFCC'>"
	  ?>
        <td>&nbsp;<?php echo ucwords (strtolower($row['ORDER_ID'])); ?></td> 
        <td>&nbsp;<?php  if($row['PRO_CODE']==101){
                        echo "KUIH BATANG BURUK KACANG TANAH ASLI 250G";
                   }else if($row['PRO_CODE']==102){
                        echo "KUIH BATANG BURUK KACANG TANAH ASLI 500G";
                   }else if($row['PRO_CODE']==103){
                        echo "KUIH BATANG BURUK KACANG TANAH ASLI 1KG";
                   }else if($row['PRO_CODE']==111){
                        echo "KUIH BATANG BURUK COKLAT 250G";
                   }else if($row['PRO_CODE']==112){
                        echo "KUIH BATANG BURUK COKLAT 500G";
                   }else if($row['PRO_CODE']==113){
                        echo "KUIH BATANG BURUK COKLAT 1KG";
                   }else if($row['PRO_CODE']==121){
                        echo "KUIH BATANG BURUK KACANG HIJAU 250G";
                   }else if($row['PRO_CODE']==122){
                    echo "KUIH BATANG BURUK KACANG HIJAU 500G";
                   }else if($row['PRO_CODE']==123){
                    echo "KUIH BATANG BURUK KACANG HIJAU 1KG";
                }?></td> 
        <td><?php echo ucwords (strtolower($row['ORDER_QTY'])); ?></td>
        <td>&nbsp;<?php echo $row['TOTAL_PRICE']; ?></td>
      </tr> 
      <?php 
       $color="2";}
	   else{
	   echo "<tr bgcolor='#FFCC99'>"
	  ?>
        <td>&nbsp;<?php echo ucwords (strtolower($row['ORDER_ID'])); ?></td> 
        <td>&nbsp;<?php  if($row['PRO_CODE']==101){
                        echo "KUIH BATANG BURUK KACANG TANAH ASLI 250G";
                   }else if($row['PRO_CODE']==102){
                        echo "KUIH BATANG BURUK KACANG TANAH ASLI 500G";
                   }else if($row['PRO_CODE']==103){
                        echo "KUIH BATANG BURUK KACANG TANAH ASLI 1KG";
                   }else if($row['PRO_CODE']==111){
                        echo "KUIH BATANG BURUK COKLAT 250G";
                   }else if($row['PRO_CODE']==112){
                        echo "KUIH BATANG BURUK COKLAT 500G";
                   }else if($row['PRO_CODE']==113){
                        echo "KUIH BATANG BURUK COKLAT 1KG";
                   }else if($row['PRO_CODE']==121){
                        echo "KUIH BATANG BURUK KACANG HIJAU 250G";
                   }else if($row['PRO_CODE']==122){
                    echo "KUIH BATANG BURUK KACANG HIJAU 500G";
                   }else if($row['PRO_CODE']==123){
                    echo "KUIH BATANG BURUK KACANG HIJAU 1KG";
                }?></td>  
        <td><?php echo ucwords (strtolower($row['ORDER_QTY'])); ?></td>
        <td>&nbsp;<?php echo $row['TOTAL_PRICE']; ?></td>
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
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
<h1>Total Sales: RM<?php echo number_format($totalSales, 2); ?> </h1>
<h1>Amount Sold: <?php echo $amountSales; ?> </h1>






   
   
</div>
   
</body>
</html> 


























