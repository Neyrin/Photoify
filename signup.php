<?php require __DIR__.'/views/header.php';?>

<article>

    <form class="create-account" action="app/users/signup.php" method="post">
        <h1>Create an account</h1>

      <p>
        <label>First name</label><br>
        <input class="form-signup" type="text" name="first_name" required>
      </p>
      <p>
        <label>Last name</label><br>
        <input class="form-signup" type="text" name="last_name" required>
      </p>
      <p>
        <label>Email</label><br>
        <input class="form-signup" type="email" name="email" required>
      </p>
      <p>
        <label>Username</label><br>
        <input type="text" name="user_name" required>
      </p>
      <p>
        <label>Password</label><br>
        <input type="password" name="password" required>
      </p>
      <p>
        <label>Confirm password</label><br>
        <input type="password" name="confirm_password" required>
      </p>
      <p>
        <button class="sign-up-btn">SIGN UP</button>
     </p>
     <p>
        <a href="index.php">I'm already a member!</a>
     </p>
    </form>
</article>
