<?php
declare(strict_types=1);

require __DIR__.'/../../autoload.php';

$post_id = trim(filter_var($_GET['post_id'], FILTER_SANITIZE_NUMBER_INT));
$post_user_id = trim(filter_var($_GET['user_id'], FILTER_SANITIZE_NUMBER_INT));

print_r($post_id);
print_r($post_user_id);


/* if($post_user_id !== $user_id){
    $_SESSION['messages'][] = "You don't have permission to edit this post.";
    redirect('/');
} else {
    if(isset($_POST['caption'])) {
        $newCaption = trim(filter_var($_POST['caption'], FILTER_SANITIE_STRING)) ?? ' ';

        $stmt = $pdo->prepare('UPDATE Posts SET caption = :caption WHERE post_id = :post_id');
        $stmt->bindParam(':caption', $newCaption, PDO::PARAM_STR);
        $stmt->bindParam(':post_id', $post_id, PDO::PARAM_INT);

        $stmt->execute();
    } 
}
redirect(); */
