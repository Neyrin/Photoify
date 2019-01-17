<?php
declare(strict_types=1);
require __DIR__.'/../../autoload.php';

//Get image from form
if(isset($_FILES['avatar'])) {
    $avatar = $_FILES['avatar'];
    
    //Divide the image information array into variables
    $imageName = $_FILES['avatar']['name'];
    $imageSize = $_FILES['avatar']['size'];
    $imageType = $_FILES['avatar']['type'];
    $imageError= $_FILES['avatar']['error'];
    $imageTmpName = $_FILES['avatar']['tmp_name'];
    
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
                if (!file_exists(__DIR__.'/../../posts/uploads/'.$user_id.'/avatars/')) {
                    mkdir(__DIR__.'/../../posts/uploads/'.$user_id.'/avatars/', 0777, true);
                }
                //Move uploaded file into users uploads-folder
                $imageDestination = '../../posts/uploads/'.$user_id.'/avatars/'. $imageNameNew;
                move_uploaded_file($imageTmpName, $imageDestination);
                //Variable containing the full location path to be inserted into db
                $imageLocation = 'app/posts/uploads/'.$user_id.'/avatars/'.$imageNameNew;

                $stmt = $pdo->prepare('UPDATE Users
                SET avatar = :avatar WHERE user_id = :user_id');
                $stmt->bindParam(':avatar', $imageLocation, PDO::PARAM_STR);
                $stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);
                
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
