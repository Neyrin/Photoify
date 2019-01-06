<?php
declare(strict_types=1);

require __DIR__.'/../autoload.php';

$statement = $pdo->query('SELECT * FROM Actions');
$statement->execute();

if (!$statement) {
    die(var_dump($pdo->errorInfo()));
}

$likes = $statement->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode($likes); 
