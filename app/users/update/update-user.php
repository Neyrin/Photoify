<?php
declare(strict_types=1);
require __DIR__.'../../../autoload.php';

if(!isset($_POST['confirm-changes'])){
    // Set message?
    $_SESSION['messages'][] = "We need your current password to confirm the changes 111111";
    // redirect('/');
}
if(!isset($_POST['email'])){
    $_SESSION['email'][] = "We need to have your email tho...";
    // redirect('/');
}

// Get hashed password from db
$stmtPass = $pdo->query('SELECT password FROM Users WHERE user_id = :user_id');
$stmtPass->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$stmtPass->execute();

$password_hash = $stmtPass->fetchAll(PDO::FETCH_ASSOC);
$password_hash = $password_hash[0]['password'];


// User input
$password_confirm_changes = $_POST['confirm-changes'];

$email = trim(filter_var($_POST['email'],FILTER_SANITIZE_STRING));
 

if(isset($_POST['password'], $_POST['confirm-password'])){
    //TRIM PASSWORD AFTER REGISTARATION IS DONE
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];

}
if(isset($_POST['bio'])){
    $bio = trim(filter_var($_POST['bio'],FILTER_SANITIZE_STRING));
}

// See if confirm password changes is valid
if(!password_verify($password_confirm_changes, $password_hash)){
    echo "Confirm changes password doesnt't match";
    /* redirect('/'); */
}

// Update user password
if(isset($password)) {
    if($password !== $confirm_password) {
        echo"The passwords doesn't match.";
    } else{
        $newPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmtNewPass = $pdo->prepare('UPDATE Users SET password = :password WHERE user_id = :user_id');
        $stmtNewPass->bindParam(':password', $newPassword, PDO::PARAM_STR);
        $stmtNewPass->bindParam(':user_id', $user_id, PDO::PARAM_INT);

        $stmtNewPass->execute();
    }
} 
// redirect();

// Update user info
if(isset($bio, $email)) {
    $stmtNewBio = $pdo->prepare('UPDATE Users SET bio = :bio WHERE user_id = :user_id');
    $stmtNewBio->bindParam(':bio', $bio, PDO::PARAM_STR);
    $stmtNewBio->bindParam(':user_id', $user_id, PDO::PARAM_INT);

    $stmtNewBio->execute();
} else{
    // redirect();
    echo "error 333333";
}

echo "<pre>";
print_r($_POST);
// redirect();