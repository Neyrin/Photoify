<?php require __DIR__.'/views/header.php';
/* Get array from database to render out card */
    $stmt = $pdo->prepare('SELECT * FROM posts'); 
    $stmt->execute();
    
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $posts = json_encode($result);
?> 