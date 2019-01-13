<?php
declare(strict_types=1);
require __DIR__.'/../../autoload.php';

if(isset($_FILES['avatar'])) {
    $avatar = $_FILES['avatar'];
    
    $imageName = $_FILES['avatar']['name'];
    $imageSize = $_FILES['avatar']['size'];
    $imageType = $_FILES['avatar']['type'];
    $imageError= $_FILES['avatar']['error'];
    $imageTmpName = $_FILES['avatar']['tmp_name'];
    
    $imageExt = explode('.', $imageName);
    $imageActExt = strtolower(end($imageExt));
    $allowed = array('jpg', 'jpeg', 'png', 'gif');
    
    if (in_array($imageActExt, $allowed)) {
        if ($imageError === 0) {
            if ($imageSize < 4194304) {
                $imageNameNew = uniqid('', true).".".$imageActExt;
                if (!file_exists(__DIR__.'/../../posts/uploads/'.$user_id.'/avatars/')) {
                    mkdir(__DIR__.'/../../posts/uploads/'.$user_id.'/avatars/', 0777, true);
                }
                $imageDestination = '../../posts/uploads/'.$user_id.'/avatars/'. $imageNameNew;
                move_uploaded_file($imageTmpName, $imageDestination);
                $imageLocation = 'app/posts/uploads/'.$user_id.'/avatars/'.$imageNameNew;

                $stmt = $pdo->prepare('INSERT INTO Users(avatar)
                VALUES (:avatar) WHERE ');
                $stmt->bindParam(':avatar', $imageLocation, PDO::PARAM_STR);
                $stmt->execute(); 
                if (!$stmt) {
                    die(var_dump($pdo->errorInfo()));
                }
                //redirect();
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
