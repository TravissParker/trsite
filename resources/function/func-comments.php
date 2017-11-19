<?php

function setComment($conn) {
    if (isset($_POST['commentSubmit'])) {

        $userName   = $_POST['submittingUser'];
        $date       = $_POST['date'];
        $message    = $_POST['message'];
        $recipe     = $_POST['recipe'];

        if (empty($message)) {
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit();
        } else {
            $sqlCommand = "INSERT INTO comment (com_user, com_date, com_msg, com_recipe) VALUES ('$userName', '$date', '$message', '$recipe')";
            mysqli_query($conn, $sqlCommand);
            $_SESSION['commentPosted'] = true;
        }
    }
}

function getComments($conn, $recipe) {
    $sqlCommand = "SELECT * FROM comment WHERE com_recipe='$recipe'";
    $result = mysqli_query($conn, $sqlCommand);

    while ($row = $result->fetch_assoc()) {
        echo   "<div class='comment-box'><p>".
                $row['com_user']."    ".$row['com_date']."<br />";
        echo    nl2br($row['com_msg']);
        echo    "</p>";
        if (isset($_SESSION['userId'])) {
            if ($_SESSION['userName'] == $row['com_user']) {
                echo "<form class='delete-form' method='post' action='" . deleteComment($conn) . "'>
                          <input type='hidden' name='comId' value='" . $row['com_id'] . "''>
                          <button name='commentDelete' type='submit'>Delete</button>
                      </form>";
            }
        }
        echo    "</div>";
    }
    $_SESSION['commentDeleted']   = false;
}

function deleteComment($conn) {
    if (isset($_POST['commentDelete'])) {
        $comId = $_POST['comId'];
        $sqlCommand = "DELETE FROM comment WHERE com_id='$comId'";
        mysqli_query($conn, $sqlCommand);
        $_SESSION['commentDeleted'] = true;
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    }
}