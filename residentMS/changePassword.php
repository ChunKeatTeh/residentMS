<?php
  session_start();
  if(!isset($_SESSION["loggedIn"]) || $_SESSION["loggedIn"] !== true){ header("Location: login.php"); exit; }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Change Password</title>
  <link rel="stylesheet" href="changePassword.css">
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
        <li><img src="./img/Icons/user.png" alt=""><a href="profile.html">My Profile</a></li>
        <li><img src="./img/Icons/settings.png" alt=""><a href="settings.html">Settings</a></li>
        <li><img src="./img/Icons/exit.png" alt=""><a href="logout.php">Logout</a></li>
      </ul>
    </div>
  </div>
  <nav>
    <ul  class="navPages">
      <li><a href="index.html">Home</a></li>
      <li><a href="about.html">About</a></li>
      <li><a href="contact.html">Contact</a></li>
      <li><a href="services.html">Services</a></li>
    </ul>
    <div class="navProfile">
      <img src="./img/Profile/user.png" alt="Profile Picture" class="navProfilePicture">
    </div>
  </nav>
  <div class="changePassword">
    <h1>Change Password</h1>
    <form action="changePassword.php" method="POST">
      <label for="old_password">Old Password:</label>
      <input type="password" id="old_password" name="old_password" required>
      
      <label for="password">New Password:</label>
      <input type="password" id="password" name="password" required>

      <button type="submit">Change Password</button>

      <?php
        $password = "";
        $username = "";
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "residentMS";
        $conn = mysqli_connect($servername, $username, $password, $database);

        if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $old_password = $conn->real_escape_string($_POST['old_password']);
          $new_password = $conn->real_escape_string($_POST['password']);

          $sql = "SELECT * FROM `accounts` WHERE `username`='$_SESSION[username]'";

          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if ($row['password'] === $old_password) {
              $sql = "UPDATE accounts SET password='$new_password' WHERE username='$_SESSION[username]'";

              if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Password changed successfully!');</script>";

                // Redirect to profile page or another 
                header("Location: profile.php");
                exit();
              } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
              }
            }
            else {
              echo "<p style='color: red;'>Incorrect password. Please try again.</p>";
            }
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
        }
      ?>
    </form>
  </div>
  <div class="reportButton">
    <a href="report.php"><button class="reportButton"><img src="./img/Icons/report.png" alt="Report Issue"></button></a>
  </div>
</body>
<script src="navbar.js"></script>
</html>