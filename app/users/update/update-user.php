<?php
declare(strict_types=1);
require __DIR__.'../../../autoload.php';

//Check if confirmation password is set, if not trigger error and redirect
if(!isset($_POST['confirm-changes'])){
    $_SESSION['messages'][] = "We need your current password to confirm the changes.";
    redirect('/');
}
//Check if email is left empty, if so trigger error and redirect
if(!isset($_POST['email'])){
    $_SESSION['messages'][] = "There has to be an email connected to the account.";
    redirect('/');
}

// Get hashed password from db
$stmtPass = $pdo->query('SELECT password FROM Users WHERE user_id = :user_id');
$stmtPass->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$stmtPass->execute();

$password_hash = $stmtPass->fetchAll(PDO::FETCH_ASSOC);
$password_hash = $password_hash[0]['password'];


// User input from form
$password_confirm_changes = $_POST['confirm-changes'];

$email = trim(filter_var($_POST['email'],FILTER_SANITIZE_EMAIL));

if(isset($_POST['bio'])){
    $bio = trim(filter_var($_POST['bio'],FILTER_SANITIZE_STRING));
}

if(isset($_POST['password'], $_POST['confirm-password'])){
    //TRIM PASSWORD AFTER REGISTARATION IS DONE
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];
}

// See if confirmation password is valid
if(!password_verify($password_confirm_changes, $password_hash)){
    $_SESSION['messages'][] = "Please enter your current password to confirm changes.";
    redirect('/');
}

// Update user password
if(isset($password)) {
    if($password !== $confirm_password) {
        $_SESSION['messages'][] = "The passwords doesn't match.";
        redirect('/');
    } else{
        $newPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmtNewPass = $pdo->prepare('UPDATE Users SET password = :password WHERE user_id = :user_id');
        $stmtNewPass->bindParam(':password', $newPassword, PDO::PARAM_STR);
        $stmtNewPass->bindParam(':user_id', $user_id, PDO::PARAM_INT);

        $stmtNewPass->execute();
    }
} 
redirect();

// Update user info
if(isset($bio, $email)) {
    $stmtNewInfo = $pdo->prepare('UPDATE Users SET bio = :bio, email = :email WHERE user_id = :user_id');
    $stmtNewInfo->bindParam(':bio', $bio, PDO::PARAM_STR);
    $stmtNewInfo->bindParam(':email', $email, PDO::PARAM_STR);
    $stmtNewInfo->bindParam(':user_id', $user_id, PDO::PARAM_INT);

    $stmtNewInfo->execute();
};
redirect();
