<?php
declare(strict_types=1);

require __DIR__.'/../autoload.php';

$stmtPosts = $pdo->prepare(
    'SELECT p.image, 
    p.caption, 
    p.post_id, 
    u.user_name, 
    u.avatar, 
    u.user_id, 
    count(a.likes)
 
    AS "likes"
    FROM Posts p
    LEFT JOIN Users u ON p.user_id=u.user_id
    LEFT JOIN Actions a ON p.post_id=a.post_id
    GROUP BY p.post_id
    ORDER BY p.date DESC;');

    $stmtPosts->execute();
    $posts = $stmtPosts->fetchAll(PDO::FETCH_ASSOC);

    for ($i=0; $i < count($posts); $i++) { 
        $posts[$i]['logged_in_user'] = $user_id;
    }

header('Content-Type: application/json');
echo json_encode($posts);
