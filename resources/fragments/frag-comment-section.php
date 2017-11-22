<?php
include $_SERVER['DOCUMENT_ROOT']."/resources/function/func-dhb-connect.php";
include $_SERVER['DOCUMENT_ROOT']."/resources/function/func-comments.php";

echo "<div class='comment-wrap'>
      <h3>Comments</h3>";



//If user is signed in => show text area
if (isset($_SESSION['userId'])) {
      setComment($conn);
    echo "<form method='post' action=''>
        <input type='hidden' name='submittingUser' value='".$_SESSION['userName']."'>
        <input type='hidden' name='date' value='". date('Y-m-d H:i:s') ."'>
        <input type='hidden' name='recipe' value='".$_SERVER['REQUEST_URI']."'>
        <textarea name='message'></textarea>
        <button type='submit' name='commentSubmit'>Comment</button>
      </form>";
}

if ($_SESSION['commentPosted'] == true) {
    echo '<div class="comment-notification">
            <p>Your comment has been posted below!</p>
          </div>';
}

if ($_SESSION['commentDeleted'] == true) {
    echo '<div class="comment-notification">
            <p>Your comment has been deleted!</p>
          </div>';
}

//Show all comments
getComments($conn, $_SERVER['REQUEST_URI']);


echo "</div>";
