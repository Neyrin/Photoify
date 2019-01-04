<?php require __DIR__.'/views/header.php'; ?>

<form class="upload-post" action="app/posts/upload-post.php" method="post" enctype="multipart/form-data">
<!--     <img id="preview" />
    <button id="select-btn">SELECT IMAGE</button> -->
    <input class="form-upload" type="file" name="image" id="image" multiple>
    <input class="form-upload" type="text" name="caption" placeholder="WHY NOT GIVE YOUR IMAGE A CAPTION?">
    <button class="upload-btn" type="submit" name="upload-btn">UPLOAD</button>
</form>

<?php require __DIR__.'/views/footer.php'; ?>