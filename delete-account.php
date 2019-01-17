<?php require __DIR__.'/views/header.php';?>
<?php checkForLoggedInUser(); ?>

<h2>DO YOU WISH TO DELETE YOUR ACCOUNT?</h2>
<p>All your information, posts and settings will be deleted and can not be restored.</p>
<form class="delete-user" action="app/users/update/delete-account.php" method="post">
    <label>TYPE YOUR PASSWORD TO CONFIRM</label><br>
    <input class="form-delete-account" type="password" name="confirm-delete-account">
    <button class="delete-account-btn" type="submit">DELETE ACCOUNT</button>
</form>

<?php require __DIR__.'/views/footer.php'; ?>
