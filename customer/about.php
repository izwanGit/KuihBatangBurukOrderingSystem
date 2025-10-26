<!DOCTYPE html>
<?php 
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
    <title>Kuih Batang Buruk Perik - About Page</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet" />
    <link href="../css/all.min.css" rel="stylesheet" />
	<link href="../css/templatemo-style.css" rel="stylesheet" />

	<style>
		.tm-btn-success,
		.tm-btn-primary,
		.tm-btn-danger {
		background-color: #319966;
		color: white;
		}

		.tm-btn-success:hover,
		.tm-btn-success:focus,
		.tm-btn-primary:hover,
		.tm-btn-primary:focus,
		.tm-btn-danger:hover,
		.tm-btn-danger:focus {
		background-color: #319966;
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
		<div class="placeholder">
			<div class="parallax-window" data-parallax="scroll" data-image-src="../img/cover.jpg">
				<div class="tm-header">
					<div class="row tm-header-inner">
						<div class="col-md-6 col-12">
							<img src="../img/simple-house-logo.png" alt="Logo" class="tm-site-logo" /> 
							<div class="tm-site-text-box">
								<h1 class="tm-site-title">KUIH BATANG BURUK PERIK</h1>
								<h6 class="tm-site-description">Cookies Ordering Website</h6> 	
							</div>
						</div>
						<nav class="col-md-6 col-12 tm-nav">
							<ul class="tm-nav-ul">
								<li class="tm-nav-li"><a href="index.php" class="tm-nav-link">Home</a></li>
								<li class="tm-nav-li"><a href="product-gallery.php" class="tm-nav-link">All Product</a></li>
								<li class="tm-nav-li"><a href="about.php" class="tm-nav-link active">About</a></li>
								<li class="tm-nav-li"><a href="contact.php" class="tm-nav-link">Contact</a></li>
							</ul>
						</nav>		
					</div>
				</div>
			</div>
		</div>

		<main>
			<header class="row tm-welcome-section">
				<h2 class="col-12 text-center tm-section-title">About us</h2>
				<p class="col-12 text-center">Lima A Utara Enterprise, established in December 2012, is a small-scale business based in Kampung Perik, Malaysia. 
					Specializing in the production of Kuih Batang Buruk, the company offers three flavors and supplies its products to various regions in Malaysia. 
					With a dedicated team of skilled employees, Lima A Utara Enterprise ensures that customers receive their crispy Kuih Batang Buruk in excellent condition through express post delivery services.</p>
			</header>
			<div class="tm-container-inner tm-featured-image">
				<div class="row">
					<div class="col-12">
						<div class="placeholder-2">
							<div class="parallax-window-2" data-parallax="scroll" data-image-src="../img/background.jpg"></div>		
						</div>
					</div>
				</div>
			</div>
			<div class="tm-container-inner tm-features">
				<div class="row">
					<div class="col-lg-4">
						<div class="tm-feature">
							<i class="fas fa-4x fa-pepper-hot tm-feature-icon"></i>
							<p class="tm-feature-description">To make Kuih Batang Buruk well known worldwide, ensuring consumer satisfaction.</p>
							<h4 class="tm-btn tm-btn-danger">Vision</h4>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="tm-feature">
							<i class="fas fa-4x fa-seedling tm-feature-icon"></i>
							<p class="tm-feature-description">Provide high-quality and affordable products with the best taste.<br><br></p>
							<h4 class="tm-btn tm-btn-danger">Mission</h4>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="tm-feature">
							<i class="fas fa-4x fa-cocktail tm-feature-icon"></i>
							<p class="tm-feature-description">Improve production efficiency and upgrade packaging to meet customer demand and expand internationally.</p>
							<h4 class="tm-btn tm-btn-danger">Objectives</h4>

						</div>
					</div>
				</div>
			</div>
			<div class="tm-container-inner tm-history">
				<div class="row">
					<div class="col-12">
						<div class="tm-history-inner">
							<img src="../img/premise.jpg" alt="Image" class="img-fluid tm-history-img" />
							<div class="tm-history-text"> 
								<h4 class="tm-history-title">History of our organization</h4>
								<p class="tm-mb-p">Lima A Utara Enterprise is a small business that has been operating in Kampung Perik for over a decade. It was formally established at the Companies Commission of Malaysia on December 11, 2012. The company specializes in producing three flavors of Kuih Batang Buruk - green bean, peanut, and chocolate.</p>
								<p>They have five skilled and experienced permanent workers who have been with the company for seven years. The company supplies its products to various states in Malaysia and offers express post delivery services to customers outside of Kedah. The Kuih Batang Buruk is crispy and the company ensures its safe delivery by using bubble wrap. The company's workforce consists of a supervisor, a manager, two bakers, and a courier.</p>
							</div>
						</div>	
					</div>
				</div>
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