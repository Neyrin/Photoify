<article>

<form class="sign-in" action="app/users/login.php" method="post">
    <h1>SIGN IN</h1>
    <div class="form-group">
        <label for="email">EMAIL</label> <br>
        <input class="form-login" type="email" name="email" placeholder="ENTER YOUR EMAIL" required>
    </div>

    <div class="form-group">
        <label for="password">PASSWORD</label><br>
        <input class="form-login" type="password" name="password" required>
    </div>

    <button type="submit" class="login-btn">SIGN IN</button>

    <p>NOT A MEMBER YET? SIGN UP <a href="signup.php">HERE</a>!</p>
    
</form>
</article>
