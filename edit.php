<?php require __DIR__.'/views/header.php'; ?>
<?php checkForLoggedInUser(); ?>

<img class="post-to-edit">
<p class="caption-to-edit"></p>
<form class="edit-post" action="/app/posts/edit/edit-post.php" method="post">
    <input class="form-upload" type="text" name="caption" placeholder="UPDATE YOUR CAPTION?">
    <button class="edit-post-btn" type="submit" name="edit-post-btn">EDIT</button>
</form>

<!-- <script src="assets/script/edit.js"></script> -->
<?php require __DIR__.'/views/footer.php'; ?>
