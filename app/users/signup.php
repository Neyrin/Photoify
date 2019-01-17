<?php
declare(strict_types=1);

require __DIR__.'/../autoload.php';

    if (isset($_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['user_name'], $_POST['password'], $_POST['confirm_password'])) {
        // Checks if passwords match
        if ($_POST['password'] === $_POST['confirm_password']) {
            $firstName = trim(filter_var($_POST['first_name'], FILTER_SANITIZE_STRING));
            $lastName = trim(filter_var($_POST['last_name'], FILTER_SANITIZE_STRING));
            $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
            $userName = trim(filter_var($_POST['user_name'], FILTER_SANITIZE_STRING));
            $password = trim(password_hash($_POST['password'], PASSWORD_DEFAULT));

            //Insert info into db
            $stmtCreate = $pdo->prepare('INSERT INTO users(first_name, last_name, email, user_name, password)
            VALUES (:first_name, :last_name, :email, :user_name, :password)');

            $stmtCreate->bindParam(':first_name', $firstName, PDO::PARAM_STR);
            $stmtCreate->bindParam(':last_name', $lastName, PDO::PARAM_STR);
            $stmtCreate->bindParam(':email', $email, PDO::PARAM_STR);
            $stmtCreate->bindParam(':user_name', $userName, PDO::PARAM_STR);
            $stmtCreate->bindParam(':password', $password, PDO::PARAM_STR);

            $stmtCreate->execute();

            //Fetch user data and set session
            $stmtGetInfo = $pdo->prepare('SELECT * FROM users WHERE email = :email');
            $stmtGetInfo->bindParam(':email', $email);

            $stmtGetInfo->execute();

            $user = $stmtGetInfo->fetch(PDO::FETCH_ASSOC);
            $_SESSION['user'] = $user;
            redirect();        
        }
    } die();
