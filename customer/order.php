<!DOCTYPE html>
<?php 
include('../include/dbconn.php');
include ("../login/session.php");
session_start();

if (!isset($_SESSION['user_username'])) {
    header('Location: ../login/login.html');
} 

$flavor = ""; // Initialize flavor variable

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if the weight value is set
    if (isset($_POST["weight"])) {
        $weight = $_POST["weight"];
        //echo "THE WEIGHT IS: " . $weight;
    } else {
        // Weight value is not set
        echo "Weight value is missing.";
    }
    // Check if the flavor value is set
    if (isset($_POST["flavor"])) {
        $flavor = $_POST["flavor"];
    } else {
        // Flavor value is not set
        echo "Flavor value is missing.";
    }
} else {
    // Invalid request method
    echo "Invalid request method.";
    echo "<script>setTimeout(function() { window.location.href = '../customer/index.php'; }, 50);</script>";

}

$query = "SELECT * FROM `PRODUCT` WHERE `PRO_FLAVOR` = '$flavor'";
$result = mysqli_query($dbconn, $query);
if ($result) {
    // Iterate over the result set
    while ($row = mysqli_fetch_assoc($result)) {
        // Access the values of each row
        $pro_code = $row['PRO_CODE'];
        $pro_name = $row['PRO_NAME'];
        $pro_price = $row['PRO_PRICE'];
        $pro_status = $row['PRO_STATUS'];
        $pro_flavor = $row['PRO_FLAVOR'];
        //echo $pro_code . " " . $pro_name. " ". $pro_price. " ". $pro_status. "<br>";
    }

    // Free the result set
    mysqli_free_result($result);
}

$queryprice = "SELECT * FROM `PRODUCT` WHERE `PRO_FLAVOR` = '$flavor' AND `PRO_NET_WEIGHT` = '$weight'";
$resultprice = mysqli_query($dbconn, $queryprice);

if ($resultprice && mysqli_num_rows($resultprice) > 0) {
    $rowprice = mysqli_fetch_assoc($resultprice);
    $prices = $rowprice['PRO_PRICE'];
    $pro_codes = $rowprice['PRO_CODE'];
    $pro_statuss = $rowprice['PRO_STATUS'];
    //echo "<br> PRICE:". $prices;
    //echo "<br> STATUS:". $pro_statuss;
    

} else {
    // Error handling if the query fails or no rows are returned
    echo "Error fetching price.";
    echo "<script>setTimeout(function() { window.location.href = '../customer/index.php'; }, 50);</script>";
    // You can also set a default price here if needed
    // $prices = 0;
}

if($pro_statuss ==='1'){
    $html = '';

}else{
    $html = '
    PRODUCT NOT AVAILABLE
    ';
}

?>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Kuih Batang Buruk Perik - Order</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400" rel="stylesheet" />    
    <link href="../css/templatemo-style.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        .product-title {
        margin-top: 10px;
        font-size: 1.6rem;
        font-weight: 400;
        margin-bottom: 0px;
        background-color: #cf793f;
        color: aliceblue;
        border-radius: 17px;
        max-width: 420px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.35);
        text-align: center;
        }

        .row {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        margin-left: 0px;
        margin-right: 0px;
        }

        .horizontal-center{
        margin-left: 360px;
        margin-top: -24px;
        }

        .row-1 {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        margin-left: -15px;
        margin-right: -15px;
        margin-top: 25px;
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


    <div class="container" style="background-color:aliceblue;">
        <div class="placeholder-backbtn">
        <div class="container-backbtn">
        <div class="backbutton">
            <a href="index.php">
            <button>
                <img src="../img/backbutton.png" width="60px" height="60px" id="back" >
            </button>
            </a>
        <div class="page-name"><h>Kuih Batang Buruk Perik</h></div>
        </div>
                    <div>
                        <div>

                            <div>
                                <div>
                                <div>
                                </div>
                                </div>
                            </div>						  
                        </div>
                    </div>
        </div>
        </div>

        <div class="tm-section tm-container-inner">
				<div class="row-1" style="background-color:aliceblue;">
					<div>
						<figure class="tm-description-figure">
							<img src="../img/product/<?php echo $pro_flavor;?>.png" alt="Image" class="img-fluid order-image" height="350px" width="400px" />
						</figure>
					</div>
					<div class="order-rightside">
						<div class="order-content-position"> 
							<h4 class="product-title col-12"><?php echo $pro_name?></h4>
                            
                            <?php echo ' 
                            <div class="order-process-content">
                            <form id="myForm" method="POST">
                                <input type="hidden" id="flavor" name="flavor" value="<?php echo $flavor; ?>">
                                <div class="radio-wrap" style="margin-top:16px;">
                                    <input type="radio" id="weight-250" name="weight" value="250.00" <?php if (!isset($_POST["weight"]) || $_POST["weight"] === "250.00") echo "checked"; ?>
                                    <label for="weight-250">250 Gram</label>
                                    <input type="radio" id="weight-500" name="weight" value="500.00" <?php if (isset($_POST["weight"]) && $_POST["weight"] === "500.00") echo "checked"; ?>
                                    <label for="weight-500">500 Gram</label>
                                    <input type="radio" id="weight-1000" name="weight" value="1000.00" <?php if (isset($_POST["weight"]) && $_POST["weight"] === "1000.00") echo "checked"; ?>
                                    <label for="weight-1000">1 Kilogram</label>
                                </div>
                                <div class="order-quantity">
                                <div class="row">
                                    <h4><strong>Quantity</strong></h4>
                                    <div class="button">
                                        <span class="minus">&minus;</span>
                                        <input type="text" class="value" value="1" id="amount" name="amount" readonly>
                                        <span class="add">&plus;</span>
                                    </div>
                                </div>
                                </div>
                                <div class="row">
                                    <h3 class="price" id="price">Price: RM0</h3>
                                    <p style="margin-left:12px; margin-top:26px; font-size:1rem;">'.$html.'</p>
                                </div>
                                
                            </form>'; 
                            ?>
							<p ><?php ?></p>
                            <?php 
                            
                            if(isset($_POST['amount'])){;
                                $quantity = intval($_POST['amount']);
                            }
                            ?>
                            <form method="POST" action="payment.php">
                            <input type="hidden" id="pro_code" name="pro_code" value="<?php echo $pro_codes; ?>">
                            <input type="hidden" id="quantity" name="quantity" value="1">
                            <input type="hidden" id="price" name="price" value="<?php echo $prices?>">
                            <div class="row">
                                <div class="delivery-wrap">
                                    <input type="radio" id="delivery" name="type" value="delivery" required checked>
                                    <label for="delivery">DELIVERY</label><br>
                                    <input type="radio" id="self-pickup" name="type" value="self-pickup" required>
                                    <label for="self-pickup">SELF-PICKUP</label><br>
                                </div>
                                <div class="delivery-input" id="deliveryInput">
                                    <textarea id="address" name="address" placeholder="Please write down your address here..." required></textarea>
                                </div>
                            </div>
                            <div class="horizontal-center btn">
                                <button id="submitButton" type="submit" onclick="clicked(event)">
                                <span class="text">ORDER</span>
                                </button>
                            </div>
                            </form>
                            </div>
						</div>
					</div>
				</div>
			</div>
        <br><hr>
        <div class="tm-section tm-container-inner">
            <p style="display:center; justify-content:center;"> Perhaps you would like to see other flavors,&nbsp;&nbsp;<a href="../customer/product-gallery.php" class="tm-btn tm-btn-default tm-right">Click Here!</a></p>
            <br><br><br><br><br>

            <div style="display: flex; align-items: center;">
                <img src="../img/ads2.jpeg" alt="ads2" height="540" width="660">
                <p style="margin-left: 20px;">Our Kuih Batang Buruk stands out from the rest because we prioritize freshness and convenience by utilizing a press-to-close zipper for packaging. This innovative feature offers numerous benefits to our customers. Firstly, the press-to-close zipper ensures that our delicious treats remain fresh for longer periods. It effectively seals in the crispiness and flavor, allowing customers to enjoy the same delightful experience with each bite. Additionally, the convenient resealable packaging allows for easy opening and closing, ensuring that customers can enjoy our Kuih Batang Buruk at their own pace, without worrying about storage or freshness. With our press-to-close zipper packaging, we bring you a product that combines taste, convenience, and freshness all in one.</p><br>
            </div>
        </div>
        <br>

    </div>

    <script>
        <?php if($pro_statuss==='1'): ?>
        document.getElementById("submitButton").disabled = false;
        <?php else: ?>
        document.getElementById("submitButton").disabled = true;
        <?php endif; ?>
    </script>


    <script>
        var radioButtons = document.querySelectorAll('input[name="weight"]');
        var flavorInput = document.getElementById('flavor');
        var selectedWeight = "<?php echo isset($_POST["weight"]) ? $_POST["weight"] : ""; ?>";

        radioButtons.forEach(function(radioButton) {
            radioButton.addEventListener('click', function() {
                flavorInput.value = "<?php echo $flavor; ?>";
                document.getElementById('myForm').submit();
            });

            if (selectedWeight === radioButton.value) {
                radioButton.checked = true;
            }
        });
    </script>

    <script>
        // Attach the event listener to the delivery option
        $('input[name="type"]').change(function() {
            var deliveryOption = $('input[name="type"]:checked').val();
            if (deliveryOption == "delivery") {
                $('#deliveryInput').show();
                $('#address').attr('required', true);
            } else {
                $('#deliveryInput').hide();
                $('#address').removeAttr('required');
                $('#address').val('');
            }
        });

        // Function to calculate the price
        function calculatePrice() {
            var prices = "<?php echo $prices; ?>"; // Corrected variable name
            var quantity = parseInt($("#amount").val());
            var totalprice = prices * quantity;
            $("#price").text("RM" + totalprice.toFixed(2));
        }

        // Listen for changes in the weight and quantity input fields
        $("input[name='weight'], #amount").on("change", function() {
            calculatePrice();
        });

        // Initialize the price
        calculatePrice();

        function passQuantity(){
            var visibleQuantity = document.getElementById("amount");
            var hiddenQuantity = document.getElementById("quantity");
            hiddenQuantity.value = parseInt(visibleQuantity.value);
        }

        let minus = document.querySelector('.minus');
            let add = document.querySelector('.add');
            let input = document.getElementById('amount');

            let format = (num) => num;

            minus.onclick = () =>{
                let number =parseInt(input.value);
                if(number == 1){
                    input.value == '1';
                }else{
                    input.value = format(number - 1);
                }
                passQuantity();
                calculatePrice();
            }

            add.onclick = () =>{
                input.value =format(parseInt(input.value) + 1);
                passQuantity();
                calculatePrice();
            }

            input.addEventListener('keyup', () =>{
                let number = parseInt(input.value);
                if(isNaN(number)){
                    input.value = '1';
                }else{
                    input.value = format(number);
                }
            })
    </script>

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
</body>
