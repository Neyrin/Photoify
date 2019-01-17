<?php
declare(strict_types=1);
require __DIR__.'../../../autoload.php';

//Check if confirmation password is set, if not trigger error and redirect
if(!isset($_POST['confirm-changes'])){
    $_SESSION['messages'][] = "We need your current password to confirm the changes.";
    redirect('/');
}

// User input from form
$password_confirm_changes = $_POST['confirm-changes'];

if(isset($_POST['password'], $_POST['confirm-password'])){
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];
}

// Get hashed password from db
$stmtPass = $pdo->query('SELECT password FROM Users WHERE user_id = :user_id');
$stmtPass->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$stmtPass->execute();

$password_hash = $stmtPass->fetchAll(PDO::FETCH_ASSOC);
$password_hash = $password_hash[0]['password'];

// See if confirmation password is valid
if(!password_verify($password_confirm_changes, $password_hash)){
    $_SESSION['messages'][] = "Please enter your current password to confirm changes.";
    //redirect('/');
}

// Update user password
if(isset($password)) {
    if($password !== $confirm_password){
        $_SESSION['messages'][] = "The passwords doesn't match.";
        //redirect('/');
    } else{
        $newPassword = trim(password_hash($_POST['password'], PASSWORD_DEFAULT));

        $stmtNewPass = $pdo->prepare('UPDATE Users SET password = :password WHERE user_id = :user_id');
        $stmtNewPass->bindParam(':password', $newPassword, PDO::PARAM_STR);
        $stmtNewPass->bindParam(':user_id', $user_id, PDO::PARAM_INT);

        $stmtNewPass->execute();
    }
};
redirect();