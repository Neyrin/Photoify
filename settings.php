<?php require __DIR__.'/views/header.php';?>
<?php checkForLoggedInUser(); ?>
<div class="settings-container">
<form class="update-avatar" action="app/users/update/upload-avatar.php" method="post" enctype="multipart/form-data">
    <label>UPDATE AVATAR</label><br>
    <input class="form-update" type="file" name="avatar" id="avatar">
    <button class="upload-btn" type="submit" name="upload-btn">UPLOAD</button>
</form>

<form class="update-info" action="app/users/update/update-user.php" method="post">
    <label>UPDATE BIO</label><br>
    <input class="form-update" type="text" name="bio" value="<?= $_SESSION['user']['bio'] ?>">

    <label>UPDATE EMAIL</label><br>
    <input class="form-update" type="email" name="email" value="<?= $_SESSION['user']['email'] ?>" required>
    <button class="update-info-btn" type="submit">UPDATE USER INFO</button>
</form><!--/update-bio-->

<form class="update-password" action="app/users/update/update-password.php" method="post"> 
    <label>UPDATE PASSWORD</label><br>
    <input class="form-update" type="password" name="password" placeholder="Enter new passsword" >
    <input class="form-update" type="password" name="confirm-password" placeholder="Repeat new password">

    <input class="form-update" type="password" name="confirm-changes" placeholder="Type current password">

    <button class="update-pass-btn" type="submit">UPDATE PASSWORD</button>
</form><!--/update-password-->

<button class="sign-out-btn" id="sign-out-btn">SIGN OUT</button>

<button class="delete-account-btn" id="delete-account-btn"> DELETE ACCOUNT
</button><!--/delete-account-->
</div><!--/settings-container-->
<?php require __DIR__.'/views/footer.php'; ?>
