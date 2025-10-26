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
    <title>Kuih Batang Buruk Perik- Contact Page</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet" />
    <link href="../css/all.min.css" rel="stylesheet" />
	<link href="../css/templatemo-style.css" rel="stylesheet" />
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
								<li class="tm-nav-li"><a href="about.php" class="tm-nav-link">About</a></li>
								<li class="tm-nav-li"><a href="contact.php" class="tm-nav-link active">Contact</a></li>
							</ul>
						</nav>	
					</div>
				</div>
			</div>
		</div>

		<main>
			<header class="row tm-welcome-section">
				<h2 class="col-12 text-center tm-section-title">Contact Page</h2>
				<p class="col-12 text-center">If you have any inquiries, feedback, or special requests, we are here to assist you. Please feel free to contact us through our phone number or email. Thank you for choosing Kuih Batang Buruk Perik, and we look forward to hearing from you!</p>
			</header>

			<div class="tm-container-inner-2 tm-contact-section">
				<div class="row">
					<div class="col-md-6">
					<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d31724.62641423544!2d100.535126!3d6.31899!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x304caa1f2a93f91b%3A0xa04596f227d97a5e!2sKampung%20Perik%2C%2006300%20Kuala%20Nerang%2C%20Kedah!5e0!3m2!1sen!2smy!4v1688951375459!5m2!1sen!2smy" width="410" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>					
					</div>
					<div class="col-md-6">
						<div class="tm-address-box">
							<h4 class="tm-info-title tm-text-success">Our Address</h4>
							<address>
								Kampung Perik, Mukim Kurong Hitam, 06300 Kuala Nerang Kedah
							</address>
							<a href="tel:011-2334 8566" class="tm-contact-link">
								<i class="fas fa-phone tm-contact-icon"></i>011-2334 8566
							</a>
							<a href="mailto:limaautaraenterprise@yahoo.com" class="tm-contact-link">
								<i class="fas fa-envelope tm-contact-icon"></i>limaautaraenterprise@yahoo.com
							</a>
							<div class="tm-contact-social">
								<a href="https://www.facebook.com/noradibahazwani/?locale=ms_MY" class="tm-social-link"><i class="fab fa-facebook tm-social-icon"></i></a>
								<a href="https://www.instagram.com/normuhammad_89/" class="tm-social-link"><i class="fab fa-instagram tm-social-icon"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
            
<!-- How to change your own map point
	1. Go to Google Maps
	2. Click on your location point
	3. Click "Share" and choose "Embed map" tab
	4. Copy only URL and paste it within the src="" field below
-->

			<div class="tm-container-inner-2 tm-info-section">
				<div class="row">
					<!-- FAQ -->
					<div class="col-12 tm-faq">
						<h2 class="text-center tm-section-title">FAQs</h2>
						<p class="text-center">These are all the most frequent questions that we have ever receive. Really hope this help you !</p>
						<div class="tm-accordion">
							<button class="accordion">1. What is the base cookie flavor you offer?</button>
							<div class="panel">
							  <p>We offer three classic flavors for our cookies: Groundnut, Chocolate, and Green Bean. Each flavor has its own unique taste profile and appeals to different preferences. However, stay tune for any upcoming flavors!</p>
							</div>
							
							<button class="accordion">2. Are your cookies made using high-quality ingredients?</button>
							<div class="panel">
							  <p>Absolutely! We take pride in using only the finest and freshest ingredients in our cookie recipes. We source premium butter, organic flour, pure vanilla extract, and top-quality chocolate and flavorings. Our commitment to quality ingredients ensures that each bite of our cookies is a scrumptious treat.</p>
							</div>
							
							<button class="accordion">3.  Do you ship your cookies nationwide?</button>
							<div class="panel">
							  <p>Yes, we offer nationwide shipping for our Kuih. No matter where you are in the country, you can enjoy our delicious treats delivered right to your doorstep. We take great care in packaging our cookies to ensure they arrive fresh and intact. Please note that shipping charges may apply, and delivery times may vary based on your location.</p>
							</div>
							
							<button class="accordion">4. Where can I pickup my order?</button>
							<div class="panel">
								<p>You can pick up your order at our location in Kampung Perik, Mukim Kurong Hitam, 06300 Kuala Nerang, Kedah. Do not worry about getting lost, we are a small village and there are signboards around to guide you.</p>
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
		$(document).ready(function(){
			var acc = document.getElementsByClassName("accordion");
			var i;
			
			for (i = 0; i < acc.length; i++) {
			  acc[i].addEventListener("click", function() {
			    this.classList.toggle("active");
			    var panel = this.nextElementSibling;
			    if (panel.style.maxHeight) {
			      panel.style.maxHeight = null;
			    } else {
			      panel.style.maxHeight = panel.scrollHeight + "px";
			    }
			  });
			}	
		});
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