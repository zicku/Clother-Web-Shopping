<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>YouthVibe</title>
    <link rel="stylesheet" href="sign.css" />
  </head>
  <body>
    <div class="container">
      <div class="image-box">
        <img src="images/model3.png" alt="foto" />
      </div>
      <div class="signin-box">
        <h2>SIGN IN</h2>
        <form action="login.php" method="post">
          <input type="text" name="username" placeholder="Username" required />
          <input
            type="password"
            name="password"
            placeholder="Password"
            required
          />
          <button type="submit">SIGN IN</button>
        </form>
        <div class="login-box">
          <a href="sign-up.html">Create an account</a>
          <a href="#">Forgot password</a>
        </div>
      </div>
      <a href="index.php" class="back">Back</a>
    </div>
  </body>
</html>
