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
		.product-section{
		margin: 50px auto;
		max-width: 155px;
		margin-bottom: -17px;
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
								<li class="tm-nav-li"><a href="index.php" class="tm-nav-link active">Home</a></li>
								<li class="tm-nav-li"><a href="product-gallery.php" class="tm-nav-link">All Product</a></li>
								<li class="tm-nav-li"><a href="about.php" class="tm-nav-link">About</a></li>
								<li class="tm-nav-li"><a href="contact.php" class="tm-nav-link">Contact</a></li>
							</ul>
						</nav>	
					</div>
				</div>
			</div>
		</div>

		<main>
			<header class="row tm-welcome-section">
				<h2 class="col-12 text-center tm-section-title">Welcome to <strong> Batang Buruk Perik !<strong></h2>
				<p class="col-12 text-center">Step into a world of cookie perfection with Kuih Batang Buruk.	 
					Our mouthwatering cookies are meticulously crafted to captivate your taste buds and leave you 
					craving for more. <em>Sedap Baq hang!</em> Don't miss out, order now and savor every delicious bite !!!</p>
			</header>

			<header class="row product-section">
				<h1 class="col-12 text-center product-title"><strong>CLASSIC</strong></h1>
			</header>
			
			<div class="tm-paging-links">
				<nav>
					<ul>
						<li class="tm-paging-item"><a href="#" class="tm-paging-link active">Kacang-Tanah</a></li>
						<li class="tm-paging-item"><a href="#" class="tm-paging-link">Coklat</a></li>
						<li class="tm-paging-item"><a href="#" class="tm-paging-link">Kacang-Hijau</a></li>
					</ul>
				</nav>
			</div>

			<?php
			$query = "SELECT * FROM PRODUCT WHERE PRO_NET_WEIGHT=250.00";
			$result = mysqli_query($dbconn, $query);
			while($row = mysqli_fetch_array($result)){
				
				if(($row['PRO_FLAVOR'])==="GROUNDNUT"){
					$groundnut_name = strtolower($row['PRO_NAME']);
					$groundnut_price = $row['PRO_PRICE'];
					$groundnut_flavor = $row['PRO_FLAVOR'];
				}else if(($row['PRO_FLAVOR'])==="CHOCOLATE"){
					$chocolate_name = strtolower($row['PRO_NAME']);
					$chocolate_price = $row['PRO_PRICE'];
					$chocolate_flavor = $row['PRO_FLAVOR'];
				}else if(($row['PRO_FLAVOR'])==="GREEN-BEAN"){
					$greenbean_name = strtolower($row['PRO_NAME']);
					$greenbean_price = $row['PRO_PRICE'];
					$greenbean_flavor = $row['PRO_FLAVOR'];
				}
			}
			?>

			<!-- Gallery -->
			<div class="row tm-gallery">
				
				<!-- gallery page 1 -->
				<div id="tm-gallery-page-kacang-tanah" class="tm-gallery-page">
				<article class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item" onclick="handleGalleryItemClick('<?php echo $groundnut_flavor;?>')">
						<figure>
							<img src="../img/gallery/kacangtanahasli.jpg" alt="Image" class="img-fluid tm-gallery-img" />
							<figcaption>
								<h4 class="tm-gallery-title"><?php echo $groundnut_name;?></h4>
								<p class="tm-gallery-description">Experience the nutty delight, a perfect balance of crunch and natural sweetness.</p>
								<p class="tm-gallery-price">RM<?php echo $groundnut_price;?></p>
							</figcaption>
						</figure>
					</article>
				</div> <!-- gallery page 1 -->
				
				<!-- gallery page 2 -->
				<div id="tm-gallery-page-coklat" class="tm-gallery-page hidden">
				<article class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item" onclick="handleGalleryItemClick('<?php echo $chocolate_flavor;?>')">
						<figure>
							<img src="../img/gallery/coklat.jpg" alt="Image" class="img-fluid tm-gallery-img" />
							<figcaption>
								<h4 class="tm-gallery-title"><?php echo $chocolate_name;?></h4>
								<p class="tm-gallery-description">Indulge in velvety richness, a heavenly blend of cocoa and traditional Malaysian cookie.</p>
								<p class="tm-gallery-price">RM<?php echo $chocolate_price;?></p>
							</figcaption>
						</figure>
					</article>
				</div> <!-- gallery page 2 -->
				
				<!-- gallery page 3 -->
				<div id="tm-gallery-page-kacang-hijau" class="tm-gallery-page hidden">
				<article class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item" onclick="handleGalleryItemClick('<?php echo $greenbean_flavor;?>')">
						<figure>
							<img src="../img/gallery/kacang-hijau.jpg" alt="Image" class="img-fluid tm-gallery-img" />
							<figcaption>
								<h4 class="tm-gallery-title"><?php echo $greenbean_name;?></h4>
								<p class="tm-gallery-description">Discover captivating sweetness, a smooth and aromatic delight that's simply irresistible.</p>
								<p class="tm-gallery-price">RM<?php echo $greenbean_price;?></p>
							</figcaption>
						</figure>
					</article>
				</div> <!-- gallery page 3 -->
			</div>
			<div class="tm-section tm-container-inner">
				<div class="row">
					<div class="col-md-6">
						<figure class="tm-description-figure">
							<img src="../img/cover-02.jpg" alt="Image" class="img-fluid" />
						</figure>
					</div>
					<div class="col-md-6">
						<div class="tm-description-box"> 
							<h4 class="tm-gallery-title">The origins</h4>
							<p class="tm-mb-45">In the heart of Malaysia's mystical rainforests, Kuih Batang 
								Buruk was born—a culinary masterpiece fusing coconut, pandan, and sweet caramel. 
								Its legendary flavors whispered tales of heritage and captivated the senses. 
								Wanderers from afar sought its transformative taste, longing to 
								immerse themselves in the vibrant tapestry of Malaysian 
								cuisine and experience the magic within each heavenly bite.</p>
							<a href="about.php" class="tm-btn tm-btn-default tm-right">Read More</a>
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
			// Handle click on paging links
			$('.tm-paging-link').click(function(e){
				e.preventDefault();
				
				var page = $(this).text().toLowerCase();
				$('.tm-gallery-page').addClass('hidden');
				$('#tm-gallery-page-' + page).removeClass('hidden');
				$('.tm-paging-link').removeClass('active');
				$(this).addClass("active");
			});
		});
	</script>

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
    $(document).ready(function(){
        var intervalId;

        // Function to switch to the next gallery page
        function switchGalleryPage() {
            var $activeLink = $('.tm-paging-link.active');
            var $nextLink = $activeLink.closest('li').next().find('.tm-paging-link');

            if ($nextLink.length === 0) {
                $nextLink = $('.tm-paging-link').first();
            }

            $nextLink.trigger('click');
        }

        // Handle click on paging links
        $('.tm-paging-link').click(function(e){
            e.preventDefault();

            clearInterval(intervalId); // Clear the interval on click

            var page = $(this).text().toLowerCase();
            $('.tm-gallery-page').addClass('hidden');
            $('#tm-gallery-page-' + page).removeClass('hidden');
            $('.tm-paging-link').removeClass('active');
            $(this).addClass("active");

            // Start the interval again after 10 seconds
            setTimeout(function() {
                intervalId = setInterval(switchGalleryPage, 4500);
            }, 0);
        });

        // Start the interval for automatic switching of gallery pages
        intervalId = setInterval(switchGalleryPage, 4500);
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