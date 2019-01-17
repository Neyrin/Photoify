<?php
declare(strict_types=1);
require __DIR__.'../../../autoload.php';

//Check if email is left empty, if so trigger error and redirect
if(!isset($_POST['email'])){
    $_SESSION['messages'][] = "There has to be an email connected to the account.";
    redirect('/');
}

// User input from form
$email = trim(filter_var($_POST['email'],FILTER_SANITIZE_EMAIL));

if(isset($_POST['bio'])){
    $bio = trim(filter_var($_POST['bio'],FILTER_SANITIZE_STRING));
}

// Update user info
if(isset($bio)) {
    $stmtNewBio = $pdo->prepare('UPDATE Users SET bio = :bio WHERE user_id = :user_id');
    $stmtNewBio->bindParam(':bio', $bio, PDO::PARAM_STR);
    $stmtNewBio->bindParam(':user_id', $user_id, PDO::PARAM_INT);

    $stmtNewBio->execute();
};
if(isset($email)) {
    $stmtNewEmail = $pdo->prepare('UPDATE Users SET email = :email WHERE user_id = :user_id');
    $stmtNewEmail->bindParam(':email', $email, PDO::PARAM_STR);
    $stmtNewEmail->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    
    $stmtNewEmail->execute();
};
redirect();