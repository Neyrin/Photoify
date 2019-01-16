<?php
declare(strict_types=1);

//Redirect function
function redirect(string $path = '/index.php')
{
    header('location:' . $path);
    die();
}

//Check if there is a logged in user, otherwise redirect to index
function checkForLoggedInUser() {
    if(!isset($_SESSION['user'])) {
        $_SESSION['messages'][] = "You're not logged in";
        redirect();
    }
}

//Show error messages after redirect
function displayErrorMessage() 
{
    if(isset($_SESSION['messages'])){
        foreach($_SESSION['messages'] as $message){
          echo $message;
        }
        unset($_SESSION['messages']);
      }
}
