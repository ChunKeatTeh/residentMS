<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Residential Management System</title>
  <link rel="stylesheet" href="createOrLog.css">
  <link rel="stylesheet" href="navbar.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Funnel+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
</head>
<body>
  <div class="profileMenu">
    <div class="profileTop">
      <div>
        <a href="profile.php"><img src="./img/Profile/user.png" alt="Profile Picture" class="profilePicture"></a>
        <h2 class="profileName"><?php session_start(); echo isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest'; ?></h2>
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
  <div class="createAccount">
    <h1>Create Account</h1>
    <form action="data.php" method="POST">
      <label for="name">Name: </label>
      <input type="text" id="name" name="name" required>

      <label for="username">Username:</label>
      <input type="text" id="username" name="username" required>
      
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>

      <label for="unit">Unit:</label>
      <input type="text" id="unit" name="unit" required>
      
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>
      
      <button type="submit">Create Account</button>
    </form>
    <p>Already have an account? <a href="login.php">Log In</a></p>
  </div>
  <div class="reportButton">
    <a href="report.php"><button class="reportButton"><img src="./img/Icons/report.png" alt="Report Issue"></button></a>
  </div>
</body>
<script src="navbar.js"></script>
</html>