<?php
declare(strict_types=1);

require __DIR__.'/../autoload.php';

$stmtInfo = $pdo->query('SELECT 
                        first_name, 
                        last_name, 
                        user_name, 
                        user_id, 
                        avatar, 
                        email, 
                        bio 
                    FROM Users
                    WHERE user_id = :user_id');
$stmtInfo->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$stmtInfo->execute();

if (!$stmtInfo) {
    die(var_dump($pdo->errorInfo()));
}

$users = $stmtInfo->fetchAll(PDO::FETCH_ASSOC);

$stmtPosts = $pdo->query('SELECT * 
                            FROM Posts 
                            WHERE user_id = :user_id    
                            ORDER BY date DESC');
$stmtPosts->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$stmtPosts->execute();

if (!$stmtPosts) {
    die(var_dump($pdo->errorInfo()));
}

$userPosts = $stmtPosts->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode([
    'users' => $users,
    'userPosts' => $userPosts
]);
