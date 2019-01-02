<?php require __DIR__.'/views/header.php'; ?>

<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="image" id="image" multiple>
    <input type="text" name="caption" placeholder="Why not give your image a caption?">
    <button type="submit" name="uploadbtn">Upload</button>
</form>

<?php require __DIR__.'/views/footer.php'; ?>