<?php require __DIR__.'/views/header.php'; ?>
<?php checkForLoggedInUser();

if(isset($_POST['post-user-id'], $_POST['post-id'])) {
    if($_POST['post-user-id'] !== $user_id) {
        $_SESSION['messages'][] = "You don't have permission to edit this post";
    redirect('/');
    } else {
        $selected_post_id = filter_var($_POST['post-id'], FILTER_SANITIZE_NUMBER_INT);
    }
} else {$_SESSION['messages'][] = "There is no post to edit.";
redirect('/');
}
?>

<!-- <img class="post-to-edit">
<p class="caption-to-edit"></p> -->
<form class="edit-post" action="/app/posts/edit/edit-post.php" method="post">
    <input type="hidden" name="selected-post-id" value=<?= $selected_post_id ?>>
    <input class="form-upload" type="text" name="caption" placeholder="UPDATE YOUR CAPTION?">
    <button class="edit-post-btn" type="submit" name="edit-post-btn">EDIT</button>
</form>

<form class="delete-post" action="app/posts/edit/delete-post.php" method="post">
    <input type="hidden" name="selected-post-id" value=<?= $selected_post_id ?>>
    <button class="delete-post-btn" type="submit" name="delete-post-btn">DELETE</button>
</form>

<!-- <script src="assets/script/edit.js"></script> -->
<?php require __DIR__.'/views/footer.php'; ?>
