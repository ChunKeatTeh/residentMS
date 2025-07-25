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
        <img src="./img/Profile/user.png" alt="Profile Picture" class="profilePicture">
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
  <div class="logIn">
    <h1>Log In</h1>
    <form action="login.php" method="POST">
      <label for="username">Username:</label>
      <input type="text" id="username" name="username" required>
      
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>
      
      <button type="submit">Log In</button>
      
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
          $username = $conn->real_escape_string($_POST['username']);
          $password = $conn->real_escape_string($_POST['password']);

          $sql = "SELECT * FROM `accounts` WHERE `username`='$username'";

          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if ($row['password'] === $password) {
              $_SESSION['loggedIn'] = true; // Set logged in status
              $_SESSION['username'] = $username; // Store username in session
              $_SESSION['name'] = $row['name']; // Store name in session
              $_SESSION['email'] = $row['email']; // Store email in session
              $type = $row['type']; // Store user type in session
              $_SESSION['type'] = $type;

              // Redirect to profile page or another page
              if ($type === 'admin') {
                header("Location: admin.php");
              } else {
                header("Location: profile.php");
              }
              exit();
            }
            else {
              echo "<p style='color: red;'>Incorrect password or username. Please try again.</p>";
            }
          } else {
            echo "<p style=\"color: red;\">Error: Username " . htmlspecialchars($username) . " does not exist</p>";
          }
        }
      ?>
    </form>

    <p>Don't have an account? <a href="createAccount.php">Create Account</a></p>
  </div>
  <div class="reportButton">
    <a href="report.php"><button class="reportButton"><img src="./img/Icons/report.png" alt="Report Issue"></button></a>
  </div>
</body>
<script src="navbar.js"></script>
</html>
