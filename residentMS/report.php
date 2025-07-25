<?php
  session_start();
  if(!isset($_SESSION["loggedIn"]) || $_SESSION["loggedIn"] !== true){ header("Location: login.php"); exit; }
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Residential Management System</title>
  <link rel="stylesheet" href="report.css">
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
        <h2 class="profileName"><?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest'; ?></h2>
      </div>
      <button class="profileCloseButton">
        <img src="./img/Icons/close.png" alt="Close Button">
      </button>
    </div>
    <div class="profileDivider"></div>
    <div class="profileButtons">
      <ul>
        <li><img src="./img/Icons/user-add.png" alt=""><a href="createAccount.php">Create Account</a></li>
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
  <div class="report">
    <h1>Report a Problem</h1>
    <form action="reportSend.php" method="POST">
      <label for="issue">Issue:</label>
      <select name="issue" id="issue" required>
        <option value="Residential">Residential</option>
        <option value="Facilities">Facilities</option>
        <option value="Staff">Staff</option>
        <option value="Other">Other</option>
      </select>

      <label for="info">More Info:</label>
      <textarea id="info" name="info" rows="4" cols="50" required></textarea>

      <button type="submit">Report Issue</button>
    </form>
  </div>
</body>
<script src="navbar.js"></script>
</html>