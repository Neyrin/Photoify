<?php

declare(strict_types=1);
require __DIR__.'/../autoload.php';

//Get post and user id  from form
$post_id = filter_var($_POST['post-id'], FILTER_SANITIZE_NUMBER_INT);
$liker_id = filter_var($_POST['liker-id'], FILTER_SANITIZE_NUMBER_INT);

//Checks that user id is valid
if($liker_id !== 0 ){
    //Select data from db where posted user and post id's match
    $stmt = $pdo->prepare('SELECT likes FROM Actions WHERE user_id = :user_id AND post_id = :post_id');
    $stmt->bindParam(':user_id', $liker_id, PDO::PARAM_INT);
    $stmt->bindParam(':post_id', $post_id, PDO::PARAM_INT);

    $stmt->execute();
    $isLiked = $stmt->fetchAll(PDO::FETCH_ASSOC);

    //If there is db entry matching user and post id, remove the like
    if(!empty($isLiked)) {
        $stmtDislike = $pdo->prepare('DELETE FROM Actions WHERE user_id = :user_id AND post_id = :post_id');
        $stmtDislike->bindParam(':user_id', $liker_id, PDO::PARAM_INT);
        $stmtDislike->bindParam(':post_id', $post_id, PDO::PARAM_INT);
        
        if (!$stmtDislike) {
            die(var_dump($pdo->errorInfo()));
        }

        $stmtDislike->execute();
    //If there is no matching db entry, add like
    } else { 
        $stmtLike = $pdo->prepare('INSERT INTO Actions(user_id, post_id) VALUES(:user_id, :post_id)');
        $stmtLike->bindParam(':user_id', $liker_id, PDO::PARAM_INT);
        $stmtLike->bindParam(':post_id', $post_id, PDO::PARAM_INT);

        $stmtLike->execute();
    }
}

redirect("/");