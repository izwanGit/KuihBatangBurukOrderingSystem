<!DOCTYPE html>
<?php 
include('../include/dbconn.php');
include ("../login/session.php");
session_start();

if (!isset($_SESSION['user_username'])) {
        header('Location: ../login/login.html');
		} 
?>
<html>

<head>
	<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Kuih Batang Buruk Perik</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400" rel="stylesheet" />    
	<link href="../css/templatemo-style.css" rel="stylesheet" />

	<style>
		.tm-gallery-item {
		height: 400px;
		width: 300px;
		background-color: rgba(236, 236, 236, 0.6);
		cursor: pointer;
		transition: background-color 0.3s;
		margin-top: -15px;
		}

		.tm-gallery-item img {
		margin-bottom: 20px;
		width: 220px;
		height: 260px;
		background-position: center center;
		background-repeat: no-repeat;
		display: block;
		margin-left: auto;
		margin-right: auto;
		}

		.tm-gallery-title {
		font-size: 1.05rem;
		font-weight: bold;
		color: #c16f39;
		margin-bottom: 15px;
		}

		.tm-gallery-price {
		font-size: 1.07rem;
		color: #333333;
		margin-bottom: 60px;
		font-family: Arial, sans-serif;
		text-align: right;
		padding-right: 10px;
		padding-bottom: 20px;
		}
	</style>
</head>
<!--

Simple House

https://templatemo.com/tm-539-simple-house

-->
<body> 

<div class="dropdown-wrapper">
  <button onclick="handleImageClick(event)"><img src="../img/account-logo3.png" width="60" height="60"></button>
  <div id="myDropdown" class="dropdown-content">
    <a href="../customer/account.php">Manage Profile</a>
    <a href="../customer/my-order.php">My Order</a>
    <a href="../login/logout.php">Logout</a>

  </div>
</div>

	<div class="container">
	<!-- Top box -->
		<!-- Logo & Site Name -->
		<div class="placeholder-3">
			<div class="parallax-window-2" data-parallax="scroll" data-image-src="../img/cover.jpg">
				<div class="tm-header">
					<div class="row tm-header-inner">
						<div class="col-md-6 col-12">
							<div>
							  <img src="../img/simple-house-logo.png" alt="Logo" class="tm-site-logo" /> 
							  <div class="tm-site-text-box">
								<h1 class="tm-site-title">KUIH BATANG BURUK PERIK</h1>
								<h6 class="tm-site-description">Cookies Ordering Website</h6>	
							  </div>
							</div>
						  </div>						  
						<nav class="col-md-6 col-12 tm-nav">
							<ul class="tm-nav-ul">
								<li class="tm-nav-li"><a href="index.php" class="tm-nav-link">Home</a></li>
								<li class="tm-nav-li"><a href="product-gallery.php" class="tm-nav-link active">All Product</a></li>
								<li class="tm-nav-li"><a href="about.php" class="tm-nav-link">About</a></li>
								<li class="tm-nav-li"><a href="contact.php" class="tm-nav-link">Contact</a></li>
							</ul>
						</nav>	
					</div>
				</div>
			</div>
		</div>

		<main>
			<header class="row product-section">
				<h1 class="col-12 text-center product-title"><strong>ALL OF OUR KUIH ARE HERE!</strong></h1>
			</header>

			
			<!-- Gallery -->
			<div class="gallery">

			<?php
			$query = "SELECT * FROM PRODUCT WHERE PRO_NET_WEIGHT=250.00";
			$result = mysqli_query($dbconn, $query);
			while($row = mysqli_fetch_array($result)){
				$pro_name = $row['PRO_NAME'];
				$pro_price = $row['PRO_PRICE'];
				$pro_flavor = $row['PRO_FLAVOR'];

				echo <<<HTML
					<div class="gallery-item">
					<article class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item" onclick="handleGalleryItemClick('$pro_flavor')">
						<figure>
				HTML;
				echo '<img src="../img/product/'.$pro_flavor.'.png" alt="'.$pro_flavor.'" class="tm-gallery-img"/>';
				echo <<<HTML
							<figcaption>
								<h4 class="tm-gallery-title">$pro_name</h4>
								<p class="tm-gallery-price">RM$pro_price</p>
							</figcaption>
						</figure>
					</article>
					</div>

			HTML;
			}
			?>
				<!-- Add more gallery items as needed -->
			</div>

		  </main>

		<footer class="tm-footer text-center">
			<p>Copyright &copy; 2023 Kuih Batang Buruk Perik 
            
            | Design: <a rel="nofollow" href="https://www.instagram.com/izwannahmad/">Izwan Ahmad</a></p>
		</footer>
	</div>

	<script src="../js/jquery.min.js"></script>
	<script src="../js/parallax.min.js"></script>

	<script>
		function handleGalleryItemClick(flavor) {
  		var form = document.createElement("form");
		form.method = "post";
		form.action = "../customer/order.php";

		var flavorInput = document.createElement("input");
		flavorInput.type = "hidden";
		flavorInput.name = "flavor";
		flavorInput.value = flavor;

		var weightInput = document.createElement("input");
		weightInput.type = "hidden";
		weightInput.name = "weight";
		weightInput.value = "250.00"

		form.appendChild(flavorInput);
		form.appendChild(weightInput);
		document.body.appendChild(form);

		form.submit();
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



</body>
</html>