<?php
    $username = $password = "";
    $usernameErr = $passwordErr = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST['username']))
            $usernameErr = "Username required";
        else
            $username = test_input($_POST["username"]);
        if (empty($_POST['password']))
            $passwordErr = "Password cannot be empty";
        else
            $password = test_input($_POST["password"]);
        echo "Your username: " . $username;
        echo "\n";
        echo "Your password: " . $password;
    }

    function test_input($input) {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        return $input;
    }
