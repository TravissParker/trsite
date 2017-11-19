<?php include 'nav.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Index TR</title>

  <link rel="stylesheet" type="text/css" href="resources/css/reset.css" />
  <link rel="stylesheet" type="text/css" href="resources/css/base.css" />
  <link rel="stylesheet" type="text/css" href="resources/css/nav.css" />
  <link rel="stylesheet" type="text/css" href="resources/css/button.css" />
  <link rel="stylesheet" type="text/css" href="resources/css/log-sign-in.css" />
</head>
<body>
  <div class="page-wrap">
    <div class="text-wrap">
      <div class="form-wrap">
        <form method="post" action="resources/function/func-signup.php">
          Username:
          <input type="text" name="newUsername" placeholder="Username">
          <span class="error-msg"> * <?php echo $_SESSION['usernameError'] ?></span>
          <br />
          Password:
          <input type="password" name="newPassword" placeholder="Password">
          <span class="error-msg"> * <?php echo $_SESSION['passwordError'] ?></span>
          <br />
          Password:
          <input type="password" name="newPasswordR" placeholder="Retype password">
          <span class="error-msg"> * <?php echo $_SESSION['passwordErrorR'] ?></span>
          <p class="error-msg"><?php echo $_SESSION['otherError'] ?></p>
          <button type="submit" name="registerSubmit">Sign up</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
