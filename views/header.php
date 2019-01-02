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
    <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/solid.css" integrity="sha384-+0VIRx+yz1WBcCTXBkVQYIBVNEFH1eP6Zknm16roZCyeNg2maWEpk/l/KsyFKs7G" crossorigin="anonymous">
  </head>
<body>
    <div class="navbar">
      <?php if(isset($_SESSION['user'])): ?>
      <button class="btn" id="home_btn"><i class="fas fa-home"></i></button>
      <button class="btn" id="upload_btn"><i class="fas fa-camera-retro"></i></button>
      <button class="btn" id="user_btn"><i class="fas fa-user-circle"></i></button> 
    <?php
    else: ?> 
      <p> Waddup? </p>
    <?php endif; ?>
    </div>
   