<?php

declare(strict_types=1);
require __DIR__.'/../autoload.php';

if(!isset($_POST['post-id'])) {
        $_SESSION['messages'][] = "The post you're trying to like doesn't seem to exist.";
        redirect('/');
    } else {
        $post_id = filter_var($_POST['post-id'], FILTER_SANITIZE_NUMBER_INT);
        $liker_id = filter_var($_POST['liker-id'], FILTER_SANITIZE_NUMBER_INT);

/*         $stmtLike = $pdo->prepare('INSERT INTO Actions(user_id, post_id) VALUES(:user_id, :post_id)');
        $stmtLike->bindParam(':user_id', $liker_id, PDO::PARAM_INT);
        $stmtLike->bindParam(':post_id', $post_id, PDO::PARAM_INT);
        
        if (!$stmtLike) {
            die(var_dump($pdo->errorInfo()));
        }

        $stmtLike->execute(); */
}