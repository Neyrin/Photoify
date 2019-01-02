<?php require __DIR__.'/views/header.php'; ?>

<form action="app/posts/upload-post.php" method="post" enctype="multipart/form-data">
    <input type="file" name="image" id="image" multiple>
    <input type="text" name="caption" placeholder="WHY NOT GIVE YOUR IMAGE A CAPTION?">
    <button type="submit" name="uploadBtn">UPLOAD</button>
</form>

<?php require __DIR__.'/views/footer.php'; ?>