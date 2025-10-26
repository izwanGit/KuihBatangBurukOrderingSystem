<!DOCTYPE html>
<?php 
include('../include/dbconn.php');

include ("../login/session.php");
session_start();

if (!isset($_SESSION['user_username'])) {
        header('Location: ../login');
		} 
                $sqlUSER= "SELECT * from user";
				$queryUSER = mysqli_query($dbconn, $sqlUSER) or die ("Error: " . mysqli_error($dbconn));
				$rowUSER = mysqli_num_rows($queryUSER);
				$rUSER= mysqli_fetch_assoc($queryUSER);
				

?>
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
    max-width: 500px;
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


  /* Modal styles */
  .modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(67, 168, 103, 0.2);
    margin-left: 1010px
  }

  .modal-content {
    margin: auto;
    display: block;
    max-width: 90%;
    max-height: 90%;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }

  .close {
    color: #fff;
    position: absolute;
    top: 15px;
    left: 15px; /* Adjust the left position as needed */
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
  }

  .close:hover,
  .close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
  }

</style>




<script type = "text/javascript">
function calc() 
{
var total = 0;
var rowNo = order.elements["bil"].value;
var qProduct = "quantity";
var pProduct ="productPrice";

for (a=0;a<rowNo;a++)
{
	var textRow = a.toString();
	var textQuantity = qProduct + textRow;
	var textPrice = pProduct + textRow;
	var quantity = parseInt(order.elements[textQuantity].value)
	var pPrice = parseInt(order.elements[textPrice].value);
	total = total + (quantity * pPrice);
}
document.getElementById("price").value = total;
document.getElementById("cash").min = total;
}

</script>



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
  </div> 
</div>

<div class="container">

<h3>Product Ordered by Customer</h3>
  <?php
    $query = "SELECT * FROM order_  INNER JOIN PAYMENT ON ORDER_.ORDER_ID = PAYMENT.ORDER_ID";
    $result = mysqli_query($dbconn, $query) or die("Error: " . mysqli_error($dbconn));
    $numrow = mysqli_num_rows($result);
  ?>

  <fieldset>
  
    <table width="100%" border="1" align="left" cellpadding="10" cellspacing="0">
      <tr align="left" bgcolor="#f2f2f2">
        <th width="20%">ordersID</th>
        <th width="26%">UserID</th>       
        <th width="27%">OrdersDate</th>
        <th width="9%">Total(RM)</th>
        <th width="9%">PickupMethod</th>
        <th width="9%">Details</th>
        <th align="center">Verify</th>
      </tr>
      
      <tbody>
      <div id="myModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="modalImage">
      </div>
	        <?php
            	for ($a=0; $a<$numrow; $a++) {
              $row = mysqli_fetch_array($result);
              $uniqueId = "receipt_" . $row['ORDER_ID'];
              ?>
              <tr>
              <td class="lalign"><?php echo ($row['ORDER_ID']); ?></td>

              <td><?php echo ($row['USER_ID']); ?></td>
              <td><?php echo ($row['ORDER_DATE']); ?></td>
              <td><?php echo ($row['TOTAL_PRICE']); ?></td>
              <td><?php echo ($row['ORDER_TYPE']); ?></td>
              <td><a id="<?php echo $uniqueId; ?>" href="<?php echo '../img/receipt/'.$row['PICTURE']; ?>">View</a></td>
              <td>
                <?php 
                if ($row['ORDER_STATUS'] === '0') {
                  echo '<a class="one" href="db_verify_order.php?id=' .$row['ORDER_ID'] . '">Verify</a>';
                }
                else{
                  echo'Verified';
                }
                ?>
              </td>
              </tr>	

              <script>
                var link = document.getElementById("<?php echo $uniqueId; ?>"); // Replace "uniqueId" with the actual ID of the element
                link.addEventListener("click", function (event) {
                  event.preventDefault(); // Prevent default link behavior
                  modal.style.display = "block";
                  modalImg.src = this.href;
                });
              </script>

              <?php
              }
          ?>
        </tbody>
      </table>
  </fieldset>
    <script>
  // Get the modal
  var modal = document.getElementById("myModal");

  // Get the image and insert it inside the modal
  var modalImg = document.getElementById("modalImage");

  // Close the modal when the user clicks on the close button or outside the modal
  var span = document.getElementsByClassName("close")[0];
  span.addEventListener("click", function () {
    modal.style.display = "none";
  });

  window.addEventListener("click", function (event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  });
   </script>
</body>

</html> 
