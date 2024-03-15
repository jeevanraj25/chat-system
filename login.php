<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: users.php");
  }

if(isset($_COOKIE['username'])) {

    $_SESSION['username'] = $_COOKIE['username'];
    header("location: users.php");
    exit();
}
?>


<?php include_once "header.php"; ?>
<body>
<style>
  body {
    background-image: url('wallpaper.jpg');
    background-size: cover; /* This will make sure the image covers the entire background */
    background-repeat: no-repeat; /* Prevents the background from repeating */
    background-attachment: fixed; /* Makes the background fixed while scrolling */
     /* Rotates the background image by 90 degrees */
    transform-origin: center center; /* Specifies the center point for the rotation */
}

</style>
  <div class="wrapper">
    <section class="form login">
      <header>Talk</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="field input">
          <label>Email Address</label>
          <input type="text" name="email" placeholder="Enter your email" required>
        </div>
        <div class="field input">
          <label>Password</label>
          <input type="password" name="password" placeholder="Enter your password" required>
          <i class="fas fa-eye"></i>
        </div>
        <label><input type="checkbox" name="remember"> Remember Me</label>
        <div class="field button">
          <input type="submit" name="submit" value="Continue to Chat">
        </div>
      </form>
      <div class="link">Not yet signed up? <a href="register.php">Signup now</a></div>
    </section>
  </div>
  
  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/login.js"></script>

</body>
</html>

