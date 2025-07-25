<?php
  session_start();
  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "residentMS";
  $conn = mysqli_connect($servername, $username, $password, $database);

  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  $name = $_POST['name'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $unit = $_POST['unit'];

  $sql = "INSERT INTO accounts (name, username, email, unit, password, type) VALUES ('$name', '$username', '$email', '$unit', '$password', 'user')";

  if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Registration successful!');</script>";

    $_SESSION['loggedIn'] = true; // Set logged in status
    $_SESSION['username'] = $username; // Store username in session
    $_SESSION['name'] = $name; // Store name in session
    $_SESSION['email'] = $email; // Store email in session

    // Redirect to profile page or another 
    header("Location: profile.php");
    exit();
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
?>