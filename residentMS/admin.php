<?php
  session_start();
  if((!isset($_SESSION["loggedIn"]) || $_SESSION["loggedIn"] !== true) && (!isset($_SESSION['type']) && $_SESSION['type'] !== 'admin')) {
    header("Location: login.php");
    exit;
  }
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Residential Management System</title>
  <link rel="stylesheet" href="admin.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Funnel+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
</head>

<body>
  <div class="admin-header">Admin Dashboard</div>
  <div class="admin-container">
    <div class="admin-title">Reports</div>
    <table class="admin-table">
      <tr>
        <th>Serial No.</th>
        <th>Username</th>
        <th>Time</th>
        <th>Issue</th>
        <th>Info</th>
        <th>Action</th>
      </tr>
      <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "residentMS";

        $conn = new mysqli($servername, $username, $password, database: $database);

        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        // Handle delete request
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_report'])) {
          $delete_id = $conn->real_escape_string($_POST['delete_id']);
          $delete_sql = "DELETE FROM reports WHERE time='$delete_id'";
          $conn->query($delete_sql);
        }

        $sql = "SELECT username, time, report_type, report_info FROM reports";
        $result = $conn->query($sql);

        if (!$result) {
          die("Query failed: " . $conn->error);
        }

        $serialNumber = 1;

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $serialNumber . "</td>";
            echo "<td>" . htmlspecialchars($row['username']) . "</td>";
            echo "<td>" . htmlspecialchars($row['time']) . "</td>";
            echo "<td>" . htmlspecialchars($row['report_type']) . "</td>";
            echo "<td>" . htmlspecialchars($row['report_info']) . "</td>";
            echo "<td>"
              . "<form method='POST' style='display:inline;'>"
              . "<input type='hidden' name='delete_id' value='" . $row['time'] . "'>"
              . "<button type='submit' name='delete_report' class='admin-btn delete' onclick=\"return confirm('Delete this report?');\">Delete</button>"
              . "</form>"
              . "</td>";
            echo "</tr>";
            $serialNumber++;
          }
        } else {
          echo "<tr><td colspan='6'>No reports found</td></tr>";
        }
        $conn->close();
      ?>
    </table>
  </div>
  <div class="admin-container">
    <div class="admin-title">Users</div>
    <table class="admin-table">
      <tr>
        <th>Serial No.</th>
        <th>Name</th>
        <th>Username</th>
        <th>Email</th>
        <th>Unit</th>
        <th>Action</th>
      </tr>
      <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "residentMS";

        $conn = new mysqli($servername, $username, $password, database: $database);

        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }

        // Handle delete request
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_report'])) {
          $delete_id = $conn->real_escape_string($_POST['delete_id']);
          $delete_sql = "DELETE FROM accounts WHERE username='$delete_id'";
          $conn->query($delete_sql);
        }

        $sql = "SELECT name, username, email, unit FROM accounts WHERE type='user'";
        $result = $conn->query($sql);

        if (!$result) {
          die("Query failed: " . $conn->error);
        }

        $serialNumber = 1;

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $serialNumber . "</td>";
            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['username']) . "</td>";
            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
            echo "<td>" . htmlspecialchars($row['unit']) . "</td>";
            echo "<td>"
              . "<form method='POST' style='display:inline;'>"
              . "<input type='hidden' name='delete_id' value='" . $row['username'] . "'>"
              . "<button type='submit' name='delete_report' class='admin-btn delete' onclick=\"return confirm('Delete this user?');\">Delete</button>"
              . "</form>"
              . "</td>";
            echo "</tr>";
            $serialNumber++;
          }
        } else {
          echo "<tr><td colspan='6'>No users found</td></tr>";
        }
        $conn->close();
      ?>
    </table>
  </div>
  <div class="admin-actions" style="text-align:right;">
    <div>
      <a href="logout.php" class="admin-btn">Back</a>
    </div>
    <div>
      <a href="admin.php" class="admin-btn">Refresh</a>
    </div>
      
  </div>
</body>
</html>