<?php

declare(strict_types=1);
require __DIR__.'/../autoload.php';

if(isset($_FILES['image'])) {
    $image = $_FILES['image'];
    $date = Date('Y-m-d H:i:s');
    $user_id = $_SESSION['user']['user_id'];
    $caption = trim(filter_var($_POST['caption'], FILTER_SANITIZE_STRING)) ?? ' ';
    
    $imageName = $_FILES['image']['name'];
    $imageSize = $_FILES['image']['size'];
    $imageType = $_FILES['image']['type'];
    $imageError= $_FILES['image']['error'];
    $imageTmpName = $_FILES['image']['tmp_name'];
    
    $imageExt = explode('.', $imageName);
    $imageActExt = strtolower(end($imageExt));
    $allowed = array('jpg', 'jpeg', 'png', 'gif');
    
    if (in_array($imageActExt, $allowed)) {
        if ($imageError === 0) {
            if ($imageSize < 4194304) {
                $imageNameNew = uniqid('', true).".".$imageActExt;
                if (!file_exists(__DIR__.'../posts/uploads/'.$user_id.'/posts/')) {
                    mkdir(__DIR__.'/../posts/uploads/'.$user_id.'/posts/', 0777, true);
                }
                $imageDestination = 'uploads/'.$user_id.'/posts/'. $imageNameNew;
                move_uploaded_file($imageTmpName, $imageDestination);
                $imageLocation = 'app/posts/'.$imageDestination;

                $stmt = $pdo->prepare('INSERT INTO Posts(user_id, caption, image, date)
                VALUES (:user_id, :caption, :image, :date)');
                $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
                $stmt->bindParam(':caption', $caption, PDO::PARAM_STR);
                $stmt->bindParam(':image', $imageLocation, PDO::PARAM_STR);
                $stmt->bindParam(':date', $date, PDO::PARAM_STR);
                $stmt->execute(); 
                if (!$stmt) {
                    die(var_dump($pdo->errorInfo()));
                }
                redirect();
            } else {
                echo "How about we try a smaller image?";
            } 
        } else {
            echo "There seems to be a problem uploading this file...";
        }
    } else {
        echo "Sorry, this filetype is not allowed. Try another one!"; 
    }
}  