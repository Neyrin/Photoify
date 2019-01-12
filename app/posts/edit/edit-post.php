<?php
declare(strict_types=1);

require __DIR__.'/../../autoload.php';

$post_id = $_GET['post_id'];
if(isset($_POST['caption'])) {
    $newCaption = trim(filter_var($_POST['caption'], FILTER_SANITIE_STRING)) ?? ' ';
    $id = $_POST['post_id'];
    print_r($id);

    $stmt = $pdo->prepare('UPDATE Posts SET caption = :caption WHERE post_id = :post_id');
    $stmt->bindParam(':caption', $newCaption, PDO::PARAM_STR);
    $stmt->bindParam(':post_id', $post_id, PDO::PARAM_INT);

    $stmt->execute();
} else {
    echo 'nothing is set';
}
/* redirect(); */
