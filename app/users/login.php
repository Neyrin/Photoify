<?php
declare(strict_types=1);

require __DIR__.'/../autoload.php';

//Get user credentials from form
if (isset($_POST['email'], $_POST['password'])) {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    
    //Get all user info from db
    $statement = $pdo->prepare('SELECT * FROM users WHERE email = :email');
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->execute();
    
    $user = $statement->fetch(PDO::FETCH_ASSOC);
    
    //If user isn't found trigger error message and redirect
    if (!$user)
    {
        $_SESSION['messages'][] = "We can't find that account. Try again or create an account.";
        redirect('/');
    }
    //If password is correct set session and unset user password
    //If password is wrong, trigger error message and redirect
    if (password_verify($_POST['password'], $user['password'])) {
        unset($user['password']);
        $_SESSION['user'] = $user;
    } else {
        $_SESSION['messages'][] = "Wrong password, try again";
        redirect();
    }
}
redirect();
