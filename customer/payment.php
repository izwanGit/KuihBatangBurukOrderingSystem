<!DOCTYPE html>
<?php 
include ("../login/session.php");
include('../include/dbconn.php');
session_start();

if (!isset($_SESSION['user_username'])) {
        header('Location: ../login/login.html');
} 
		
//pro_code
//price
//quantity
//type
//address

$pro_code = $_POST["pro_code"];
$price = $_POST["price"];
$quantity = $_POST["quantity"];
$type = $_POST["type"];
$address = $_POST["address"];
$total = $price * $quantity;
?>

<html>

<head>
	<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Kuih Batang Buruk Perik- Contact Page</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet" />
    <link href="../css/all.min.css" rel="stylesheet" />
	<link href="../css/templatemo-style.css" rel="stylesheet" />

    <style>
        .tm-btn-default {
        border: 1px solid #ccc;
        background-color: rgb(65, 65, 65);
        color: white;
        transition: 0.3s;
        }

        .tm-btn-default:hover,
        .tm-btn-default:focus {
        color: white;
        background-color: rgb(65, 65, 65, 0.9);
        font-size: 17px;
        }

        .file-input-container {
          display: flex;
          justify-content: center;
          align-items: center;
          margin-top: 20px;
          margin-left: 80px;
          margin-bottom: 5px;
        }
    </style>
</head>

<body> 
<div class="dropdown-wrapper">
  <button onclick="handleImageClick(event)"><img src="../img/account-logo3.png" width="60" height="60"></button>
  <div id="myDropdown" class="dropdown-content">
    <a href="../customer/account.php">Manage Profile</a>
    <a href="../customer/my-order.php">My Order</a>
    <a href="../login/logout.php">Logout</a>
  </div>
</div>

	<div class="payment-wrapper">
        <h2>PAYMENT</h2>
        <div class="horizontal-center">
            <img src="../img/payment_qr.jpg"></img>
        </div>
        <hr>
        <p>Please scan the QR code above to make the payment and upload the receipt below.</p>
        <form method="POST" action="order-process.php" enctype="multipart/form-data">
            <input type="hidden" name="pro_code" value="<?php echo $pro_code; ?>">
            <input type="hidden" name="quantity" value="<?php echo $quantity?>">
            <input type="hidden" name="price" value="<?php echo $price?>">
            <input type="hidden" name="type" value="<?php echo $type?>">
            <input type="hidden" name="address" value="<?php echo $address?>">

            <?php
			$query = "SELECT * FROM PRODUCT WHERE PRO_CODE = $pro_code";
			$result = mysqli_query($dbconn, $query);
			while($row = mysqli_fetch_assoc($result)){
				$pro_name = strtolower($row['PRO_NAME']);
        $pro_net_weight = number_format($row['PRO_NET_WEIGHT'],0);
      }

            $pro_fname = $pro_name .' '. $pro_net_weight . ' gram';
            ?>

            <div class="payment-wrapper-price">
            <h5><?php echo ucfirst($pro_fname)?></h5>
            <div class="payment-wrapper-price-amount">
              <p><?php echo ucfirst('Amount: ' . $quantity); ?></p>
            </div>
            <div class="address-container">
                <p> <?php echo ucfirst('Location: '.$address); ?></p>
            </div>
            <h3><?php echo ucfirst('YOUR TOTAL: RM '.$total);?></h3>

            </div>
            <div class="file-input-container">
              <input type="file" name="imageFile" required>
            </div>

            <div class="row horizontal-center">
                <br>
                <a class="tm-btn tm-btn-default" href="order.php">CANCEL</a>
                <button class="tm-btn tm-btn-default" id="submitButton" type="submit" onclick="clicked(event)">DONE</button>
            </div>
        </form>

    </div>
    <br><br><br><br>
</body>
<?php mysqli_close($dbconn);?>

<script>
    function clicked(e)
    {
        if(!confirm('Are you sure?')) {
            e.preventDefault();
        }
    }
</script>

<script>
function handleImageClick(event) {
  var img = event.target;
  var rect = img.getBoundingClientRect();
  var x = event.clientX - rect.left;
  var y = event.clientY - rect.top;

  var canvas = document.createElement("canvas");
  var context = canvas.getContext("2d");
  canvas.width = img.width;
  canvas.height = img.height;
  context.drawImage(img, 0, 0, img.width, img.height);

  var pixelData = context.getImageData(x, y, 1, 1).data;
  var isTransparent = pixelData[3] === 0; // Alpha channel value

  if (!isTransparent) {
    toggleDropdown();
  }
}

function toggleDropdown() {
  var dropdownContent = document.getElementById("myDropdown");
  if (dropdownContent.style.display === "block"){
    dropdownContent.style.display = "none";
  } else {
    dropdownContent.style.display = "block";
  }
}
</script>

</html>