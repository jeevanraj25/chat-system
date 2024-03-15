
<!-- //   session_start();
//   if(isset($_SESSION['unique_id'])){
//     header("location:admin-users.php");
//   }

// if(isset($_COOKIE['username'])) {

//     $_SESSION['username'] = $_COOKIE['username'];
//     header("location:admin-users.php");
//     exit();
// } -->



<?php include_once "header.php"; ?>
<body>
  <div class="wrapper">
    <section class="form login">
      <header>DBIT Chat</header>
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
          <input type="submit" name="submit" value="login">
        </div>
      </form>
    </section>
  </div>
  
  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/login-admin.js"></script>

</body>
</html>

