<!DOCTYPE html>
<?php
include('../include/dbconn.php');
include("../login/session.php");
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
        /* Add the CSS code here */
        .account {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-family: 'Montserrat', sans-serif;
            background-color: #f6f6f6;
        }

        .account input,
        .account textarea {
            font-family: 'Montserrat', sans-serif;
            font-size: 15px;
            border-radius: 10px;
            text-indent: 6px; /* Adjust the text-indent value as needed */
            background-color: #fafafa;
        }

        table {
            width: 100%;
        }

        th {
            text-align: left;
        }

        input[type="text"] {
            width: 30%;
            padding: 5px;
            border: 1px solid #ccc;
        }

        #user_name {
            width: 55%;
            padding: 5px;
            border: 1px solid #ccc;
        }

        input[type="email"],
        textarea {
            width: 100%;
            padding: 5px;
            border: 1px solid #ccc;
        }

        input[type="password"] {
            width: 30%;
            padding: 5px;
            border: 1px solid #ccc;
        }

        textarea {
            resize: none;
            width: 450px;
            height: 220px;
        }

        input[type="submit"],
        input[type="button"] {
            padding: 10px 20px;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }

        input[type="submit"]:hover,
        input[type="button"]:hover {
            background-color: #45a049;
        }

        a {
            text-decoration: none;
        }

        .checkbox-container {
            margin-top: 10px;
        }

        .checkbox-container input[type="checkbox"] {
            margin-right: 5px;
        }

        .checkbox-container label {
            font-weight: normal;
        }

        @media screen and (max-width: 480px) {
            input[type="submit"],
            input[type="button"] {
                width: 100%;
            }
        }

        table input[readonly],
        table textarea[readonly] {
          background-color: white;
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
    <div class="container">
        <div class="placeholder-backbtn">
            <div class="container-backbtn">
                <div class="backbutton">
                    <a href="index.php">
                        <button>
                            <img src="../img/backbutton.png" width="60px" height="60px" id="back">
                        </button>
                    </a>
                    <div class="page-name">
                        <h>My Profile</h>
                    </div>
                </div>
                <div class="tm-header">
                    <div class="row tm-header-inner">
                        <div class="col-md-6 col-12">
                            <div>
                                <div class="tm-site-text-box">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        $user_username = $_SESSION['user_username'];
        $query = "SELECT * FROM `USER` WHERE `USER_USERNAME` = '$user_username'";
        $result = mysqli_query($dbconn, $query);
        if ($row = mysqli_fetch_assoc($result)) {
            $user_username = $row['USER_USERNAME'];
            $user_name = $row['USER_NAME'];
            $user_phoneno = $row['USER_PHONENO'];
            $user_address = $row['USER_ADDRESS'];
            $user_email = $row['USER_EMAIL'];
            $user_password = $row['USER_PASSWORD'];
        }

        echo '
        <div class="tm-section tm-container-inner">
            <div class="account">
                <form method="POST" action="account-process.php">
                    <table>
                        <tr>
                            <th>USERNAME:</th>
                            <td><input type="text" value="' . $user_username . '" name="user_username" id="user_username" readonly></td>
                        </tr>
                        <tr>
                            <th>NAME:</th>
                            <td><input type="text" value="' . $user_name . '" name="user_name" id="user_name" readonly></td>
                        </tr>
                        <tr>
                            <th>PHONE NUMBER:</th>
                            <td><input type="text" value="' . $user_phoneno . '" name="user_phoneno" id="user_phoneno" readonly></td>
                        </tr>
                        <tr>
                            <th>ADDRESS:</th>
                            <td><textarea name="user_address" id="user_address" readonly>' . $user_address . '</textarea></td>
                        </tr>
                        <tr>
                            <th>EMAIL:</th>
                            <td><input type="email" value="' . $user_email . '" style="width:200px;" name="user_email" id="user_email" readonly></td>
                        </tr>
                        <tr>
                            <div class="password">
                                <th>PASSWORD:</th>
                                <td><input type="password" id="myInput" value="' . $user_password . '" name="user_password" id="user_password" readonly></td>
                            </div>
                        </tr>
                    </table>
                    <div class="checkbox-container">
                        <input type="checkbox" onclick="myFunction()">
                        <label for="myInput">Show Password</label>
                    </div>
                    <br>
                    <input type="hidden" value="Cancel" onclick="disableEdit()" id="cancelBtn">
                    <input type="hidden" value="Save Changes" onclick="clicked(event)" id="saveChangesBtn">
                    <input type="button" value="Edit" onclick="enableEdit()" id="editBtn">

                </form>
            </div>
        </div>
        <br>


        <script>
            function myFunction() {
                var x = document.getElementById("myInput");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }

            function enableEdit() {
                var usernameInput = document.getElementById("user_username");
                var nameInput = document.getElementById("user_name");
                var phoneInput = document.getElementById("user_phoneno");
                var addressInput = document.getElementById("user_address");
                var emailInput = document.getElementById("user_email");
                var passwordInput = document.getElementById("myInput");
                var saveChangesBtn = document.getElementById("saveChangesBtn");
                var cancelBtn = document.getElementById("cancelBtn");
                var editBtn = document.getElementById("editBtn");



                usernameInput.readOnly = false;
                nameInput.readOnly = false;
                phoneInput.readOnly = false;
                addressInput.readOnly = false;
                emailInput.readOnly = false;
                passwordInput.readOnly = false;

                saveChangesBtn.type = "submit";
                cancelBtn.type = "button";
                editBtn.type = "hidden";
            }

            function disableEdit() {
              var usernameInput = document.getElementById("user_username");
              var nameInput = document.getElementById("user_name");
              var phoneInput = document.getElementById("user_phoneno");
              var addressInput = document.getElementById("user_address");
              var emailInput = document.getElementById("user_email");
              var passwordInput = document.getElementById("myInput");
              var saveChangesBtn = document.getElementById("saveChangesBtn");
              var cancelBtn = document.getElementById("cancelBtn");
              var editBtn = document.getElementById("editBtn");


              usernameInput.readOnly = true;
              nameInput.readOnly = true;
              phoneInput.readOnly = true;
              addressInput.readOnly = true;
              emailInput.readOnly = true;
              passwordInput.readOnly = true;

              saveChangesBtn.type = "hidden";
              cancelBtn.type = "hidden";
              editBtn.type = "button";
          }
        </script>
        ';
        ?>

    </div>

    <script>
        function clicked(e) {
            if (!confirm('Are you sure?')) {
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
            if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
            } else {
                dropdownContent.style.display = "block";
            }
        }
    </script>

</body>

</html>
