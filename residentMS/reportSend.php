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

  $username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Anonymous';
  $current_datetime = date("Y-m-d H:i:s");
  $issue = $_POST['issue'];
  $info = $_POST['info'];

  $sql = "INSERT INTO reports (username, time, report_type, report_info) VALUES ('$username', '$current_datetime', '$issue', '$info')";

  if ($conn->query($sql) === TRUE) {
      echo "<script>alert('Report submitted successfully!');</script>";

      // Redirect to profile page or another 
      header("Location: index.html");
      exit();
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
?>