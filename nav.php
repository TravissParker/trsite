<?php
  session_start(); //Nav is the first thing on each page.
?>

<div id="top-wrap">
  <nav>
    <?php include 'resources/fragments/frag-signin-notifier.php' ?>
    <ul>
      <li><a href="index.php">Index</a></li>
      <li><a href="calendar.php">Calendar</a></li>
      <li><a href="recipes-meatballs.php">Meatballs</a></li>
      <li><a href="recipes-pancakes.php">Pancakes</a></li>
    </ul>
    <div class="dropdown">
      <button class="dropbtn">Navigation</button>
      <div class="dropdown-content">
        <a href="index.php">Index</a>
        <a href="calendar.php">Calendar</a>
        <a href="recipes-meatballs.php">Meatballs</a>
        <a href="recipes-pancakes.php">Pancakes</a>
      </div>
    </div>
  </nav>
</div>