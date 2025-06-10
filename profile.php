<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Profile</title>
  <link rel="stylesheet" href="profile.css">
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
        <li><img src="./img/Icons/exit.png" alt=""><a href="logout.html">Logout</a></li>
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
  <div class="profile">
    <h1>My Profile</h1>
    <div class="profileDetails">
      <img src="./img/Profile/user.png" alt="Profile Picture" class="profilePictureLarge">
      <div class="profileInfo">
        <strong>Name: </strong><span>Anonymous</span>
        <br>
        <strong>Username: </strong><span>anon_user</span>
        <br>
        <strong>Email: </strong><span>anon@gmail.com</span>
      </div>
      <div class="profileActions">
        <button class="editProfileButton">Edit Profile</button>
        <button class="changePasswordButton">Change Password</button>
      </div>
    </div>
  </div>
</body>
</html>