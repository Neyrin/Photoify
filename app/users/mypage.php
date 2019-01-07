<?php
declare(strict_types=1);

require __DIR__.'/../autoload.php';

$stmt = $pdo->query('SELECT first_name, last_name, user_name, user_id, avatar, email, bio FROM Users WHERE user_id = :user_id');
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$stmt->execute();

if (!$stmt) {
    die(var_dump($pdo->errorInfo()));
}

$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode($users); 


//Split into separate files and call in functions?
$stmt2 = $pdo->query('SELECT * FROM Posts WHERE user_id = :user_id');
$stmt2->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$stmt2->execute();

if (!$stmt2) {
    die(var_dump($pdo->errorInfo()));
}

$userPosts = $stmt2->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode($userPosts); 