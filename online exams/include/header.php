<?php if (!isset($_SESSION)) {session_start();} ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="static/css/master.css">
    <link rel="stylesheet" href="static/css/bootstrap.min.css">
    <meta charset="utf-8">
    <title>Exams</title>
  </head>
  <body>


<div class="nav">
  <a href="index.php" class="logo">Exam</a>
  <ul>
    <li> <a href="index.php">Home</a> </li>
    <li> <a href="#">Help</a> </li>
    <li> <a href="#">About</a> </li>
    <?php if (isset($_SESSION['username'])): ?>
      <li> <a href="exams.php">exams</a> </li>
      <li> <a href="submits.php">submits</a> </li>


        <?php if (isset($_SESSION['username']) && $_SESSION['username'] == 'admin'): ?>
          <li> <a href="create_exam.php">Create-exam</a> </li>
          <li> <a href="users.php">add-users</a> </li>
        <?php endif; ?>

        <li> <a href="logout.php">Logout</a> </li>
    <?php else: ?>
      <li> <a href="login.php">Login</a> </li>
    <?php endif; ?>
  </ul>
</div>

<div class="container">

  <marquee onmouseover="this.stop()" onmouseout="this.start()" >Welcome</marquee>
