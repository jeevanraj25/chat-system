<?php
session_start();
include_once "php/config.php";
$sql = "SELECT COUNT(*) AS user_id FROM users";
 
$result = mysqli_query($conn, $sql);

if (!$result) {
  die('Query failed: ' . mysqli_error($conn));
}

$row = mysqli_fetch_assoc($result);
if ($row) {
  $user_count = $row['user_id'];
} else {
  die('No rows returned from the query.');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="icon.svg">
    <title>TALK</title>
    <style>
      @import url('https://fonts.googleapis.com/css?family=Work+Sans:400,600');
body {
	margin: 0;
	background: #ffffff;
	font-family: 'Work Sans', sans-serif;
	font-weight: 800;
}

.container {
	width: 80%;
	margin: 0 auto;
}

header {
  background: #ffffff;
}

header::after {
  content: '';
  display: table;
  clear: both;
}

.logo {
  float: left;
  width: 75px;
  height:75px;
}

nav {
  float: right;
}

nav ul {
  margin: 0;
  padding: 0;
  list-style: none;
}

nav li {
  display: inline-block;
  margin-left: 70px;
  padding-top: 23px;

  position: relative;
}

nav a {
  color: #444;
  text-decoration: none;
  text-transform: uppercase;
  font-size: 14px;
}

nav a:hover {
  color: #000;
}

nav a::before {
  content: '';
  display: block;
  height: 5px;
  background-color: #444;

  position: absolute;
  top: 0;
  width: 0%;

  transition: all ease-in-out 250ms;
}

nav a:hover::before {
  width: 100%;
}

.mainplace{
  width: 400px;
  margin: 150px auto;
  padding: 20px; 
  align-items: center;
  text-align: center;
}
.user-count{
  font-weight: bolder;
}
.mainlogo{
width:200px;
height:200px;
}

@media screen and (max-width: 500px) {
  .container {
    width: 90%; /* Adjust container width for better mobile layout */
  }

  nav {
    float: none; /* Remove float for navigation */
    text-align: center; /* Center align navigation items */
    margin-top: 20px; /* Add some space between logo and navigation */
  }

  nav ul {
    margin: 0 auto; /* Center align navigation list */
  }

  nav li {
    display: block;
    margin: 0;
    padding: 10px 0; /* Add vertical padding to navigation items */
  }

  .logo {
    position: relative;
    float: none;
    display: block;
    margin: 0 auto; /* Center align logo */
    padding: 10px 0; /* Add some space around the logo */
    text-align: center; /* Center align the logo image */
  }

  .mainplace {
    width: 90%; /* Adjust width for better mobile layout */
    margin: 50px auto; /* Center main content */
    padding: 20px;
  }

  .mainlogo {
    width: 150px; /* Adjust logo size for better mobile layout */
    height: auto; /* Maintain aspect ratio */
  }

  .counter {
    font-size: 1.5em; /* Decrease font size for counter on mobile */
  }
}
    </style>
</head>
<body>
        <header>

          <a class="logo" href="#"><img src="icon.svg"  class="logo"></a>
              <nav>
                <ul>
                  <li><a href="about.html">About</a></li>
                  <li><a href="login.php">Login</a></li>
                  <li><a href="register.php">Signup</a></li>
                  <li><a href="admin.php">Admin</a></li>
                </ul>
              </nav>
            </div>
        </header>
        <div class="mainplace">
            <img src="icon.svg" class="mainlogo">
            <h1>Welcome to Talk!</h1>
            <p>
              Created by two passionate students, Talk is your go-to platform for seamless and
              secure online conversations. Our user-friendly interface, customizable profiles,
               and dynamic chat rooms make connecting with others effortless.
               Join us today and start talking!
          </p>
          <div class="user-count" id="count">
           <p>Number of users registed are <?php echo htmlspecialchars($user_count); ?></p>
         </div>

          </div>
          <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
          </div>
        </div>
      </div>
</body>
</html>

