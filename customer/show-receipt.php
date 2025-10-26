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
    <img src="" ></img>
</div>