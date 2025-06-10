<?php
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

  $sql = "INSERT INTO accounts (name, username, email, password) VALUES ('$name', '$username', '$email', '$password')";

  if ($conn->query($sql) === TRUE) {
      echo "<script>alert('Registration successful!');</script>";

      // Redirect to profile page or another page
      header("Location: profile.php");
      exit();
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
?>