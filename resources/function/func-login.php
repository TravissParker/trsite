<?php
    session_start();
    $_SESSION['usernameError'] = $_SESSION['passwordError'] = $_SESSION['otherError'] = "";

    if (isset($_POST['submitLogin'])) {
        include 'func-dhb-connect.php';
        $userName = mysqli_real_escape_string($conn, $_POST['userName']);
        $password = mysqli_real_escape_string($conn, $_POST['userPassword']);


        if (empty($userName) || empty($password)) {
            if(empty($userName)) { $_SESSION['usernameError'] = "Username is required";}
            if(empty($password)) { $_SESSION['passwordError'] = "Password is required"; }

            header("Location: ../../login.php?login=emptyfield");
            exit();

        } else {
            $sqlLine = "SELECT * FROM users WHERE user_name='$userName' AND user_password='$password'";
            $result = mysqli_query($conn, $sqlLine);
            $numRows = mysqli_num_rows($result);

            if ($numRows < 1) {
                $_SESSION['otherError'] = "The username and/or password was incorrect";
                header("Location: ../../login.php?login=nosuchentry");
                exit();

            } else {
                //How is below evaluated??
                if ($row = mysqli_fetch_assoc($result)) {
                    //This whole check is unneccssary since we extract user AND pw match
                    if ($password != $row['user_password']) {
                        header("Location: ../../login.php?login=failedP");
                        exit();

                    } elseif ($password == $row['user_password']) {
                        $_SESSION['userId'] = $row['user_id'];
                        $_SESSION['userName'] = $row['user_name'];
                        $_SESSION['userPassword'] = $row['user_password'];
                        header("Location: ../../index.php?login=success");
                        exit();
                    }
                }
            }
        }

    }
