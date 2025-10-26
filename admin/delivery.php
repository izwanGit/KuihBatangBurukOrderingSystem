<?php
// Include database connection settings
include('../include/dbconn.php');

include("../login/session.php");
session_start();

if (!isset($_SESSION['user_username'])) {
    header('Location: ../login');
    exit();
}

$selectedOption = isset($_POST['orderid']) ? $_POST['orderid'] : '';

?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: "Lato", sans-serif;
            color: #ffffff;
            background-image: url('');
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

        .greatinguser {
            text-transform: uppercase;
        }

        .main {
            margin-left: 200px; /* Same as the width of the sidenav */
        }

        .container {
            font-family: "Lato", sans-serif;
            color: #000000;
            margin-left: 200px;
        }

        @media screen and (max-height: 450px) {
            .sidenav {
                padding-top: 15px;
            }

            .sidenav a {
                font-size: 18px;
            }
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
        </div>
    </div>

    <div class="container">
      <div>
        <div>
        <form id="myForm" method="post" action="delivery.php">
        <label for="orderid">SELECT ORDER ID:</label>
        <select name="orderid" id="orderid" onchange="submitForm()">
        <option value="">- Select Order ID -</option>
            <?php
            $sql = "SELECT * FROM DELIVERY INNER JOIN ORDER_ ON DELIVERY.ORDER_ID = ORDER_.ORDER_ID 
            WHERE ORDER_.ORDER_STATUS=1;";
            $result = mysqli_query($dbconn, $sql);
            while ($row = mysqli_fetch_array($result)) {
                $oid = $row['ORDER_ID'];
                $selected = ($oid == $selectedOption) ? 'selected' : '';
                echo '<option value="' . $oid . '" ' . $selected . '>' . $oid . '</option>';
            }
            ?>
          </select>
      </form>

        <?php 
        $sql1 = "SELECT * FROM DELIVERY INNER JOIN ORDER_ ON DELIVERY.ORDER_ID = ORDER_.ORDER_ID 
        WHERE DELIVERY.ORDER_ID = '$selectedOption' AND ORDER_.ORDER_STATUS=1;";

        $result1 = mysqli_query($dbconn, $sql1);
        if ($row1 = mysqli_fetch_assoc($result1)) {
          $date = $row1['DELI_DATE'];
          $time = $row1['DELI_TIME'];
          $remark = $row1['REMARK'];

          echo '
          <table border=1px>
          <tr>
            <th>ORDER ID</th>
            <th>DATE</th>
            <th>TIME</th>
            <th>REMARK</th>
          </tr>
          <tr>
            <td>'.$selectedOption.'</td>
            <td>'.$date.'</td>
            <td>'.$time.'</td>
            <td>'.$remark.'</td>
          </tr>
          </table>
          <br>
          
          <form method="post" action="arrange-delivery.php">
          <table>
          <tr>
            <td>SET DELIVERY DATE:</td>
            <td><input type="date" name="date_input" required></input></td>  
          </tr>
          <tr>
            <td>SET DELIVERY TIME:</td>
            <td><input type="time" name="time_input" required></input></td>  
          </tr>
          </table>
          <input type="hidden" name="orderid_" value="'.$selectedOption.'"></input>
          <input type="submit">
          </form>
          ';
      } else {
        echo "No delivery information found for the selected order ID.";
      }        
        ?>
        </div>
      </div>
      <div style="margin-top:100px;">

      <table border=1px>
      <tr>
        <td colspan="3">
        <p>Please Use This As Reference.</p>
      </td>
      </tr>
      <tr>
            <th>ORDER ID</th>
            <th>DATE</th>
            <th>TIME</th>
      </tr>
      <?php
            $sql2 = "SELECT * FROM DELIVERY INNER JOIN ORDER_ ON DELIVERY.ORDER_ID = ORDER_.ORDER_ID 
            WHERE ORDER_.ORDER_STATUS=1;";
            $result2 = mysqli_query($dbconn, $sql2);
            while ($row2 = mysqli_fetch_array($result2)) {
                $oid = $row2['ORDER_ID'];
                $d = $row2['DELI_DATE'];
                $t = $row2['DELI_TIME'];
                echo '<tr>
                <td>'.$oid.'</td>
                <td>'.$d.'</td>
                <td>'.$t.'</td>
              </tr>';
            }
            ?>
      </table>
      </div>
    </div>
    

    <script>
        function submitForm() {
            document.getElementById("myForm").submit();
        }
    </script>
</body>
</html>
