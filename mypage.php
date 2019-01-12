<?php require __DIR__.'/views/header.php';?>
<?php checkForLoggedInUser(); ?>

<div class="header">
    <button class="btn" id="settings_btn"><i class="fa fa-sliders"></i></button>
</div><!--/header-->
<div class="container">
    <div class="user-info" id="user-info">
    </div> <!--/user-info-->
    <div class="user-images" id="user-images">
        </div><!--/user-images-->
    </div><!--/container-->
    
<script src="assets/script/mypage.js"></script>
<?php require __DIR__.'/views/footer.php'; ?>
