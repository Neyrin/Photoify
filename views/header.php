<?php

require __DIR__.'/../app/autoload.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Photoify</title>
    <link rel="stylesheet" href="assets/style/main.css">
    <link rel="stylesheet" href="assets/style/navbar.css">
    <link rel="stylesheet" href="assets/style/start.css">
    <link rel="stylesheet" href="assets/style/upload.css">
    <link rel="stylesheet" href="assets/style/feed.css">
    <link rel="stylesheet" href="assets/style/mypage.css">
    <link rel="stylesheet" href="assets/style/settings.css">
    <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0=" crossorigin="anonymous" />
<body>
<?php 
displayErrorMessage();
?>
<header>
	<img class="logo" src="assets/style/images/Photoify-logo-white.png">  
</header>

    <div class="navbar">
		<div class="logo-container">
			<img class="logo" src="assets/style/images/Photoify-logo-white.png">
		</div>
<?php if(isset($_SESSION['user'])): ?>
	<div class="buttons">
		<button class="btn" id="home_btn"><i class="fa fa-home" aria-hidden="true"></i></button>
		<button class="btn" id="upload_btn"><i class="fa fa-camera-retro"></i></button>
		<button class="btn" id="user_btn"><i class="fa fa-user-circle-o" aria-hidden="true"></i></button> 
	</div>	
	<?php
    else: ?> 
    <?php endif; ?>
    </div>
   