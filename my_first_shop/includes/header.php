<?php 
session_start();
include_once("./includes/cookies.php");
include_once("./logout_panel.php");
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="VlaSamAlex">
    <meta name="description" content="Discover the largest furniture choice for your home! Furniture near me, wayfare store, cosy home">
    <meta name="keywords" content="Home, Lounge, Chair, Armchair, Shelves, Tables, Sofas">
    <meta name="robots" content="noindex">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>HOME</title>
    <link type="text/css" rel="stylesheet" href="style.css" />
</head>
<header>
<div class="logo">
    <img class="logo" src="./images/logo-vsa.png" alt="logo">
</div>
<nav>
    <div id="menu">
    <a class="shop" href="index.php">Home</a>
    <a class="shop" href="index.php">Shop</a>
    <a class="shop" href="index.php">Magazine</a>

        <?php if (isset($_SESSION["log_user"])):?>
        <a class="log" href='useraccount.php'>Your account</a> 
        <a class="log" href="logout.php">Logout</a>
        <h6>Welcome <?php echo htmlentities($_SESSION["log_user"]); ?> </h6>
        
            <?php else:?>
            <a class="log" href="signin.php">Login</a>
            <?php endif; ?>
    </div>

    <div class="banner"> 
        <div> <p>Powered by <b>Alex Sam Vladi</b></p></div>
        <div> <img src="./images/Sajari Logo.png" alt="sajari-logo"></div>
    </div>
 
</nav>
<div id="best">
    <div>
    <a href="index.php"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
    </svg></a>
    <img src="./images/Cart Button.png" alt="your cart">    
    </div>
  
</header>
