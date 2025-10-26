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
                      .content-table{
                      width: 900px;
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
                      <a href="my-order.php">
                        <button>
                          <img src="../img/backbutton.png" width="60px" height="60px" id="back" >
                      </button>
                    </a>
                    <div class="page-name"><h>Delivery Details</h></div>
                    
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
                            <th>ORDER ID</th>
                            <th>DELIVERY DATE</th>
                            <th>DELIVERY TIME</th>
                            <th colspan="2">REMARK</th>
                        </tr>
                      </thead>
                        <?php
                
                        
                        $user_username= $_SESSION['user_username'];
                        $query = "SELECT USER_ID FROM `USER` WHERE `USER_USERNAME` = '$user_username'";
                        $result = mysqli_query($dbconn, $query);
                        if($row = mysqli_fetch_assoc($result)){
                            $user_id = $row['USER_ID'];
                            //echo $user_id;
                
                            $query1 = "SELECT * FROM DELIVERY WHERE USER_ID = $user_id";
                
                            $result1 = mysqli_query($dbconn, $query1);
                            while($row1 = mysqli_fetch_array($result1)){
                                echo 
                                "
                                <tr>
                                   <td>"
                                        .$row1['ORDER_ID'].
                                   "</td>
                                   <td>"
                                        .$row1['DELI_DATE'].
                                   "</td>
                                   <td>
                                      ".$row1['DELI_TIME']."
                                   </td>
                                   <td colspan='2'>"
                                      .$row1['REMARK'].
                                   "</td>";
                             
                             }
                             
                        }
                        ?>
                        </table>
                        <br><br>
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
</script>
</body>
</html>