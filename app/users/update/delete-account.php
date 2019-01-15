<?php
declare(strict_types=1);
require __DIR__.'../../../autoload.php';

//Check if confirmation password i set, if not, redirect and trigger error message
if(!isset($_POST['confirm-delete-account'])){
    $_SESSION['messages'][] = "We need your current password to confirm.";
    redirect('/delete-account.php');
}

// Get hashed password from db
$stmtPass = $pdo->query('SELECT password FROM Users WHERE user_id = :user_id');
$stmtPass->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$stmtPass->execute();

$password_hash = $stmtPass->fetchAll(PDO::FETCH_ASSOC);
$password_hash = $password_hash[0]['password'];

//User input
$password_confirm_delete = $_POST['confirm-delete-account'];

//Check if confirmation password is correct, if not, redirect and trigger error message
if(!password_verify($password_confirm_delete, $password_hash)){
    $_SESSION['messages'][] = "Please enter your current password to confirm.";
    redirect('/delete-account.php');
}
//Delete posts by user
$stmtDeletePosts = $pdo->prepare('DELETE FROM Posts WHERE user_id = :user_id');
if (!$stmtDeletePosts){
    die(var_dump($pdo->errorInfo()));
}
$stmtDeletePosts->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$stmtDeletePosts->execute();

//Delete user
$stmtDeleteUser = $pdo->prepare('DELETE FROM Users WHERE user_id = :user_id');
if (!$stmtDeleteUser){
    die(var_dump($pdo->errorInfo()));
}
$stmtDeleteUser->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$stmtDeleteUser->execute();

session_unset();
session_destroy();
redirect();
