<?php

declare(strict_types=1);
require __DIR__.'/../autoload.php';

//Get image from upload form
if(isset($_FILES['image'])) {
    $image = $_FILES['image'];
    $date = Date('Y-m-d H:i:s');
    $caption = trim(filter_var($_POST['caption'], FILTER_SANITIZE_STRING)) ?? ' ';
    
    //Divide the image information array into variables
    $imageName = $_FILES['image']['name'];
    $imageSize = $_FILES['image']['size'];
    $imageType = $_FILES['image']['type'];
    $imageError= $_FILES['image']['error'];
    $imageTmpName = $_FILES['image']['tmp_name'];
    
    //Get extension from image, 
    //convert all extensions to lower case
    //create an array with the allowed extensions
    $imageExt = explode('.', $imageName);
    $imageActExt = strtolower(end($imageExt));
    $allowed = array('jpg', 'jpeg', 'png', 'gif');
    
    //Check if extension is allowed
    if (in_array($imageActExt, $allowed)) {
        //Check for upload errors
        if ($imageError === 0) {
            //Check if image meets size restrictions
            if ($imageSize < 4194304) {
                //Give image a new name
                $imageNameNew = uniqid('', true).".".$imageActExt;
                //Check if user uploads-folder exists, if not create it
                if (!file_exists(__DIR__.'../posts/uploads/'.$user_id.'/posts/')) {
                    mkdir(__DIR__.'/../posts/uploads/'.$user_id.'/posts/', 0777, true);
                }
                //Move uploaded file into users uploads-folder
                $imageDestination = 'uploads/'.$user_id.'/posts/'. $imageNameNew;
                move_uploaded_file($imageTmpName, $imageDestination);
                //Variable containing the full location path to be inserted into db
                $imageLocation = 'app/posts/'.$imageDestination;

                $stmt = $pdo->prepare('INSERT INTO Posts(user_id, caption, image, date)
                VALUES (:user_id, :caption, :image, :date)');
                $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
                $stmt->bindParam(':caption', $caption, PDO::PARAM_STR);
                $stmt->bindParam(':image', $imageLocation, PDO::PARAM_STR);
                $stmt->bindParam(':date', $date, PDO::PARAM_STR);
                
                $stmt->execute(); 

                redirect();
            } else {
                $_SESSION['messages'][] = "How about we try a smaller image?";
                redirect('/');
            } 
        } else {
            $_SESSION['messages'][] = "There seems to be a problem uploading this file...";
            redirect('/');
        }
    } else {
        $_SESSION['messages'][] = "Sorry, this filetype is not allowed. Try another one!"; 
        redirect('/');
    }
}  
