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
  background-color: rgb(0, 0, 0);
  background-color: rgba(0, 0, 0, 0.9);
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
    <div class="placeholder-backbtn">
    <div class="container-backbtn">
      <div class="backbutton">
        <a href="index.php">
          <button>
            <img src="../img/backbutton.png" width="60px" height="60px" id="back" >
        </button>
      </a>
      <div class="page-name"><h>My Order Details</h></div>
      
    </div>
				<div class="tm-header">
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
    <table class="content-table">
      <thead>
        <tr>
            <th>ID</th>
            <th>PRODUCT</th>
            <th>QUANTITY</th>
            <th>DELIVERY OPTIONS</th>
            <th>ORDERED DATE</th>
            <th>TOTAL(RM)</th>
            <th>STATUS</th>
        </tr>
      </thead>
      <!-- Modal -->
      <div id="myModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="modalImage">
      </div>

        <?php        
        $user_username= $_SESSION['user_username'];
        $query = "SELECT USER_ID FROM `USER` WHERE `USER_USERNAME` = '$user_username'";
        $result = mysqli_query($dbconn, $query);
        if($row = mysqli_fetch_assoc($result)){
            $user_id = $row['USER_ID'];
            //echo $user_id;

            $query1 = "SELECT ORDER_.ORDER_ID, ORDERPRODUCT.PRO_CODE, ORDERPRODUCT.ORDER_QTY,
            PAYMENT.TOTAL_PRICE, PAYMENT.PICTURE, ORDER_.ORDER_TYPE,ORDER_.ORDER_DATE, ORDER_.ORDER_STATUS FROM ORDER_
            INNER JOIN ORDERPRODUCT ON ORDER_.ORDER_ID = ORDERPRODUCT.ORDER_ID
            INNER JOIN PAYMENT ON PAYMENT.ORDER_ID = ORDERPRODUCT.ORDER_ID
            WHERE ORDER_.USER_ID = $user_id";

            $result1 = mysqli_query($dbconn, $query1);
            while($row1 = mysqli_fetch_array($result1)){
              $uniqueId = "receipt_" . $row1['ORDER_ID']; // Unique identifier
                echo 
                "
                <tr>
                   <td>
                      <a id='".$uniqueId."' href='../img/receipt/" .$row1['PICTURE']. "'>".$row1['ORDER_ID']."</a>
                   </td>
                   <td>";
                   if($row1['PRO_CODE']==101){
                        echo "KUIH BATANG BURUK KACANG TANAH ASLI 250G";
                   }else if($row1['PRO_CODE']==102){
                        echo "KUIH BATANG BURUK KACANG TANAH ASLI 500G";
                   }else if($row1['PRO_CODE']==103){
                        echo "KUIH BATANG BURUK KACANG TANAH ASLI 1KG";
                   }else if($row1['PRO_CODE']==111){
                        echo "KUIH BATANG BURUK COKLAT 250G";
                   }else if($row1['PRO_CODE']==112){
                        echo "KUIH BATANG BURUK COKLAT 500G";
                   }else if($row1['PRO_CODE']==113){
                        echo "KUIH BATANG BURUK COKLAT 1KG";
                   }else if($row1['PRO_CODE']==121){
                        echo "KUIH BATANG BURUK KACANG HIJAU 250G";
                   }else if($row1['PRO_CODE']==122){
                    echo "KUIH BATANG BURUK KACANG HIJAU 500G";
                   }else if($row1['PRO_CODE']==123){
                    echo "KUIH BATANG BURUK KACANG HIJAU 1KG";
                   }

                   echo "</td>
                   <td>
                      ".$row1['ORDER_QTY']."
                   </td>
                   <td>"
                      .$row1['ORDER_TYPE'].
                   "</td>
                   <td>"
                      .$row1['ORDER_DATE'].
                   "</td>
                   <td>"
                      .$row1['TOTAL_PRICE'].
                   "</td>
                   <td>";
             
                if ($row1['ORDER_STATUS'] == 0) {
                    echo "NOT VERIFIED YET";
                } else if ($row1['ORDER_STATUS'] == 1) {
                    echo "VERIFIED";
                }
             
                echo "</td></tr>";
                
                echo "
                <script>
                var link = document.getElementById('" . $uniqueId . "'); // Use this.id to dynamically retrieve the clicked element's ID
                link.addEventListener('click', function(event) {
                    event.preventDefault(); // Prevent default link behavior
                    modal.style.display = 'block';
                    modalImg.src = this.href;
                });
                </script>
                ";
                
             }
             
        }
        ?>
        </table>
        
        <p style="margin-left: 40px;">Your order is taking too long to be verified? Please consider 
          calling our customer service at <a href="tel:011-64133691">011-64133691</a>.</p>
        <br><br>
        <a href="my-delivery.php" class="tm-btn tm-btn-default tm-right" style="margin-left:10px; margin-bottom:10px;">DELIVERY</a>
</div>

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

// Get the modal
var modal = document.getElementById("myModal");

// Get the image and insert it inside the modal
var modalImg = document.getElementById("modalImage");

// Close the modal when the user clicks on the close button or outside the modal
var span = document.getElementsByClassName("close")[0];
span.addEventListener("click", function() {
  modal.style.display = "none";
});
window.addEventListener("click", function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
});

</script>

</body>
</html>