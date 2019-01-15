<?php
declare(strict_types=1);
require __DIR__.'/../../autoload.php';

//Get post id from form
//Then delete image from db
if(isset($_POST['selected-post-id'])) {
    $selectedPostId = filter_var($_POST['selected-post-id'], FILTER_SANITIZE_NUMBER_INT);


    $stmtDelete = $pdo->prepare('DELETE FROM Posts WHERE post_id = :post_id');
    $stmtDelete->bindParam(':post_id', $selectedPostId, PDO::PARAM_INT);
    if (!$stmtDelete) {
        die(var_dump($pdo->errorInfo()));
    }
    $stmtDelete->execute();
} 
redirect(); 
