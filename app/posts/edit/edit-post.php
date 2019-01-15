<?php
declare(strict_types=1);
require __DIR__.'/../../autoload.php';


if(isset($_POST['caption'], $_POST['selected-post-id'])) {
    $newCaption = trim(filter_var($_POST['caption'], FILTER_SANITIZE_STRING)) ?? ' ';
    $selectedPostId = filter_var($_POST['selected-post-id'], FILTER_SANITIZE_NUMBER_INT);


    $stmtEdit = $pdo->prepare('UPDATE Posts SET caption = :caption WHERE post_id = :post_id');
    $stmtEdit->bindParam(':caption', $newCaption, PDO::PARAM_STR);
    $stmtEdit->bindParam(':post_id', $selectedPostId, PDO::PARAM_INT);
    if (!$stmtEdit) {
        die(var_dump($pdo->errorInfo()));
    }
    $stmtEdit->execute();
} 
redirect(); 
