<?php require __DIR__.'/views/header.php';?>

<article>
    <?php
    /* If there's an active user redirect to home */
    if(isset($_SESSION['user'])):  ?>
    <?php require __DIR__.'/home.php'; ?>

    <?php
    /* If there's no active user redirect to start/login page */
    else: ?>
        <?php require __DIR__.'/start.php'; ?>
    <?php endif; ?>
</article>


<?php require __DIR__.'/views/footer.php'; ?>
