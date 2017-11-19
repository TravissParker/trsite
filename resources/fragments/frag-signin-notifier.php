<?php

if (isset($_SESSION['userId'])) {
    echo "<form class='logout-btn' method='post' action='resources/function/func-logout.php'>
            <button type='submit' name='logoutSubmit'>Sign out</button>
            </form>";
    echo "<div class='sign-in-status'>Howdy, ".$_SESSION['userName']."</div>";
} else {
    echo "<form class='logout-btn' method='post' action='../../login.php'>
            <button type='submit' name='signInSubmit'>Sign in</button>
            </form>";
}
