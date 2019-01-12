<?php require __DIR__.'/views/header.php';?>
<?php checkForLoggedInUser(); ?>

<form class="update-avatar" action="app/users/update/upload-avatar.php" method="post" enctype="multipart/form-data">
    <label>UPDATE AVATAR</label><br>
    <input class="form-update" type="file" name="avatar" id="avatar">
    <button class="upload-btn" type="submit" name="upload-btn">UPLOAD</button>
</form>

<form class="update-bio" action="app/users/update/update-user.php" method="post">
    <label>UPDATE BIO</label><br>
    <input class="form-update" type="text" name="bio" value="<?= $_SESSION['user']['bio'] ?>">

    <label>UPDATE EMAIL</label><br>
    <input class="form-update" type="email" name="email" value="<?= $_SESSION['user']['email'] ?>" required>

    <label>UPDATE PASSWORD</label><br>
    <input class="form-update" type="password" name="password">
    <input class="form-update" type="password" name="confirm-password">

    <label>TYPE CURRENT PASSWORD</label><br>
    <input class="form-update" type="password" name="confirm-changes">

    <button class="update-btn" type="submit">UPDATE</button>
</form>

<a href="app/users/logout.php">SIGN OUT</a>

<button class="delete-account-btn" id="delete-account-btn"> DELETE ACCOUNT
</button><!--/delete-account-->

<?php require __DIR__.'/views/footer.php'; ?>
