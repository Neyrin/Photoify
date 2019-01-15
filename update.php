<!--DELETE THIS FILE-->

<?php require __DIR__.'/views/header.php'; ?>
<?php checkForLoggedInUser(); ?>

<form class="update-post" action="app/posts/update-post.php" method="post" enctype="multipart/form-data">
<!--     <img id="preview" />
    <button id="select-btn">SELECT IMAGE</button> -->
    <input class="form-upload" type="text" name="caption" placeholder="WHY NOT GIVE YOUR IMAGE A CAPTION?">
    <button class="upload-btn" type="submit" name="upload-btn">UPLOAD</button>
</form>
<img class="post-to-edit">
<p class="caption-to-edit"></p>
<form class="edit-post" action="app/posts/edit-post.php" method="post">
    <input class="form-upload" type="text" name="caption" placeholder="UPDATE YOUR CAPTION?">
    <button class="edit-post-btn" type="submit" name="edit-post-btn">EDIT</button>
</form>

<!-- <script src="assets/script/update.js"></script> -->
<?php require __DIR__.'/views/footer.php'; ?>
