<?php
declare(strict_types=1);

require __DIR__.'/../autoload.php';
/* //Retrieve data by newest first
$stmtPosts = $pdo->query('SELECT * FROM Posts ORDER BY date DESC');
$stmtPosts->execute();

if (!$stmtPosts) {
    die(var_dump($pdo->errorInfo()));
}

$posts = $stmtPosts->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode($posts); 
 */

$stmtPosts = $pdo->prepare(
    'SELECT p.image, p.caption, p.post_id, u.user_name, u.avatar, u.user_id, count(a.like)
    AS "like"
    FROM Posts p
    LEFT JOIN Users u ON p.user_id=u.user_id
    LEFT JOIN Actions a ON p.post_id=a.post_id
    GROUP BY p.post_id
    ORDER BY p.date DESC;');
    if (!$stmtPosts) {
        die(var_dump($pdo->errorInfo()));
    }
    $stmtPosts->execute();
    $posts = $stmtPosts->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode($posts);
