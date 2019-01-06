<?php require __DIR__.'/views/header.php'; ?>



<form class="update-post" action="app/posts/update-post.php" method="post" enctype="multipart/form-data">
<!--     <img id="preview" />
    <button id="select-btn">SELECT IMAGE</button> -->
    <input class="form-upload" type="text" name="caption" placeholder="WHY NOT GIVE YOUR IMAGE A CAPTION?">
    <button class="upload-btn" type="submit" name="upload-btn">UPLOAD</button>
</form>

<!-- <script src="assets/script/update.js"></script> -->
<?php require __DIR__.'/views/footer.php'; ?>