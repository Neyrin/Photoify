<?php
declare(strict_types=1);

require __DIR__.'/../autoload.php';
//Retrieve data by newest first
$stmtPosts = $pdo->query('SELECT * FROM Posts ORDER BY date DESC');
$stmtPosts->execute();

if (!$stmtPosts) {
    die(var_dump($pdo->errorInfo()));
}

$posts = $stmtPosts->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode($posts); 
