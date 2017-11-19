<?php

if ($_SESSION['signupSuccess'] == true) {
    echo "Sign up was succesfull!<br />Use your credentials to sign in above.";
} else {
    echo '<form action="../../signup.php">
            <p>Not a member? Click the button below to sign up!</p>
            <button class="login-buttons" type="submit" name="signup">Sign up</button>
          </form>';
}