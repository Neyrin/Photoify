<?php
declare(strict_types=1);

require __DIR__.'/../autoload.php';

$statement = $pdo->query('SELECT * FROM Posts');
$statement->execute();

if (!$statement) {
    die(var_dump($pdo->errorInfo()));
}

$posts = $statement->fetch(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode($posts); 
