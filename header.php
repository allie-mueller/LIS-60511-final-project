<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Books Unlimited</title>
    <meta charset="UTF-8" />
    <script src="http://code.jquery.com/jquery-3.1.1.js"></script>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link rel="icon" href="images/favicon.png" type="images/favicon.png" />
  </head>
  <body>
    <div id="Content">
        <header>
            <div id="header-title-container">
              	<img id="headerimage" src="images/logo.jpg" alt="Books Unlimited Logo" />
              	<div id="title-text">
                	<span>Books Unlimited</span>
              	</div>
            </div>
            <nav id="Menu">
				<div id="nav-organization">
					<div id="header-main-items">
						<ul>
							<li><a href="index.php">Home</a></li>
							<li><a href="browse.php">Browse</a></li>
							<li><a href="about.php">About</a></li>
							<li><a href="contact.php">Contact</a></li>
							<!-- ADD LINKS TO ADDITIONAL PAGES HERE-->
						</ul>
              		</div>
              		<div id="header-cart-button">
                		<ul>
                  			<li id="header-cart-item"><a href="cart.php">Cart</a></li>
                		</ul>
              		</div>
				</div>
            </nav>
        </header>
        <div id="PageContent">
