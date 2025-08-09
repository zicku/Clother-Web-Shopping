<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login Page</title>
  <link rel="stylesheet" href="admin.css" />
</head>
<body>
  <div class="login-container">
    <form class="login-box" action="loginAdmin.php" method="post">
      <h2>LOGIN</h2>
      <div class="input-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required />
      </div>
      <div class="input-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required />
      </div>
      <button type="submit" class="login-button">LOGIN</button>
      <div class="bottom-links">
        <a href="sign-upAdmin.html">Create an account</span></a>
        <a href="#">Forgot password</span></a>
      </div>
    </form>
     <div class="back-admin"><a href="../index.php">Back</a></div>
  </div>
</body>
</html>
