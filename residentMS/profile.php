<?php
  session_start();
  if(!isset($_SESSION["loggedIn"]) || $_SESSION["loggedIn"] !== true){ header("Location: login.php"); exit; }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Profile</title>
  <link rel="stylesheet" href="profile.css">
  <link rel="stylesheet" href="navbar.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Funnel+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
</head>
<body>
  <div class="profileMenu">
    <div class="profileTop">
      <div>
        <img src="./img/Profile/user.png" alt="Profile Picture" class="profilePicture">
        <h2 class="profileName">Anonymous</h2>
      </div>
      <button class="profileCloseButton">
        <img src="./img/Icons/close.png" alt="Close Button">
      </button>
    </div>
    <div class="profileDivider"></div>
    <div class="profileButtons">
      <ul>
        <li><img src="./img/Icons/user.png" alt=""><a href="profile.php">My Profile</a></li>
        <li><img src="./img/Icons/exit.png" alt=""><a href="logout.php">Logout</a></li>
      </ul>
    </div>
  </div>
  <nav>
    <ul  class="navPages">
      <li><a href="index.html">Home</a></li>
      <li><a href="about.html">About</a></li>
      <li><a href="services.html">Services</a></li>
      <li><a href="mental_Health.html">Mental Health</a></li>
    </ul>
    <div class="navProfile">
      <img src="./img/Profile/user.png" alt="Profile Picture" class="navProfilePicture">
    </div>
  </nav>
  <div class="profile">
    <h1>My Profile</h1>
    <div class="profileDetails">
      <img src="./img/Profile/user.png" alt="Profile Picture" class="profilePictureLarge">
      <div class="profileInfo">
        <?php
          $username = isset($_SESSION['username']) ? $_SESSION['username'] : 'guest01';
          $name = isset($_SESSION['name']) ? $_SESSION['name'] : 'Guest';
          $email = isset($_SESSION['email']) ? $_SESSION['email'] : 'guest@mail.com';
        ?>
        <strong>Name: </strong><span><?php echo $name; ?></span>
        <strong>Username: </strong><span><?php echo $username; ?></span>
        <strong>Email: </strong><span><?php echo $email; ?></span>
      </div>
    </div>
    <div class="profileActions">
      <button class="changePasswordButton" onclick="location.href='changePassword.php'">Change Password</button>
    </div>
  </div>
  <div class="reportButton">
    <a href="report.php"><button class="reportButton"><img src="./img/Icons/report.png" alt="Report Issue"></button></a>
  </div>
</body>
<script src="navbar.js"></script>
</html>