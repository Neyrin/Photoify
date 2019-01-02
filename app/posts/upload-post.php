<?php

declare(strict_types=1);
require __DIR__.'/../autoload.php';

if (isset($_POST['uploadBtn'])) {
    if(isset($_FILES['image'])) {
        $image = $_FILES['image'];
        $caption = trim(filter_var($_POST['caption'], FILTER_SANITIZE_STRING)) ?? ' ';
        $user_id = $_SESSION['user']['user_id'];
        $date = date('Y-m-s H:i:s');

        $imageName = $_FILES['image']['name'];
        $imageTmpName = $_FILES['image']['tmp_name'];
        $imageSize = $_FILES['image']['size'];
        $imageError= $_FILES['image']['error'];
        $imageType = $_FILES['image']['type'];

        $imageExt = explode('.', $imageName);
        $imageActExt = strtolower(end($imageExt));
        $allowed = array('jpg', 'jpeg', 'png', 'gif');

        if (in_array($imageActExt, $allowed)) {
            if ($imageError === 0) {
                if ($imageSize < 4194304) {
                    $imageNameNew = uniqid('', true).".".$imageActExt;

                    if (!file_exists(__DIR__.'/../uploads/'.$user_id.'/posts/')) {
                        mkdir(__DIR__.'/../uploads/'.$user_id.'/posts/', 0777, true);
                    }
                    $imageDestination = '../uploads/'.$user_id.'/posts/' . $imageNameNew;
                    move_uploaded_file($imageTmpName, $imageDestination);

                    $statement = $pdo->prepare('INSERT INTO posts(user_id, caption, date, image)
                    VALUES (:user_id, :caption, :date, :image)');
        
                    if (!$statement)
                    {
                        die(var_dump($pdo->errorInfo()));
                    }
        
                    // binds variables to parameteres for insert statement
                    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
                    $statement->bindParam(':caption', $caption, PDO::PARAM_STR);
                    $statement->bindParam(':date', $date, PDO::PARAM_STR);
                    $statement->bindParam(':image', $imageDestination, PDO::PARAM_STR);
        
                    $statement->execute();

                    /* $statement = $pdo->prepare('INSERT INTO Posts(user_id, caption, image, date)
                    VALUES (:user_id, :caption, :image, :date)');
                    $statement->bindParam(':user_id', $user_id, PDO::PARAM_INT);
                    $statement->bindParam(':caption', $caption, PDO::PARAM_STR);
                    $statement->bindParam(':image', $imageDestination, PDO::PARAM_LOB);
                    $statement->bindParam(':date', $date, PDO::PARAM_STR);
                    $statement->execute();
                    if (!$statement) {
                        die(var_dump($pdo->errorInfo()));
                    } */
                    /* header("Location: ../../index.php");*/
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
}


