<article>

<form class="sign-in" action="app/users/login.php" method="post">
    <h1>Sign in</h1>
    <div class="form-group">
        <label for="email">Email</label> <br>
        <input class="form-control" type="email" name="email" placeholder="Enter your email" required>
    </div>

    <div class="form-group">
        <label for="password">Password</label><br>
        <input class="form-control" type="password" name="password" required>
    </div>

    <button type="submit" class="login-button">Sign in</button>

    <p>Not a member yet? Sign up <a href="signup.php">here</a>!</p>
    
</form>
</article>
