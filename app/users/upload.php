<?php

declare(strict_types=1);
require __DIR__.'/../autoload.php';

if (isset($_POST['uploadbtn'])) {
    if(isset($_FILES['image'])) {
        $image = $_FILES['image'];
        /* print_r($image); */
        $imageName = $_FILES['image']['name'];
        $imageTmpName = $_FILES['image']['tmp_name'];
        $imageSize = $_FILES['image']['size'];
        $imageError= $_FILES['image']['error '];
        $imageType = $_FILES['image']['type'];

        $imageExt = explode('.', $fileName);
        $imageActName = start($fileExt);
        $imageActExt = strtolower(end($fileExt));
        /*print_r($imageActExt);*/
        $allowed = array('jpg', 'jpeg', 'png', 'gif');

        if (in_array($imageActExt, $allowed)) {
            if ($imageError === 0) {
                if ($imageSize < 4194304) {
                    $imageNameNew = time() . '-' . $image['name'].".";
                } else {
                    echo "That image is waaaaay too big, dude!";
                } 
            } else {
                echo "Seems to be a problem uploading this file...";
            }
        } else {
            echo "Sorry, this filetype is not allowed. Try another one!";
        }
    }
}

