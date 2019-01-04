<?php
declare(strict_types=1);

require __DIR__.'/../autoload.php';

$user_id = $_SESSION['user']['user_id'];

$statement = $pdo->query('SELECT first_name, last_name, user_name, user_id, avatar, email, bio FROM Users WHERE user_id = :user_id');
$statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$statement->execute();

if (!$statement) {
    die(var_dump($pdo->errorInfo()));
}

$users = $statement->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode($users); 