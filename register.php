<?php 
  session_start();
  if(isset($_SESSION['unique_id'])){
    header("location: users.php");
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
    <section class="form signup">
      <header>DBIT Chat</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="error-text"></div>
        <div class="name-details">
          <div class="field input">
            <label>First Name</label>
            <input type="text" name="fname" placeholder="First name" required>
          </div>
          <div class="field input">
            <label>Last Name</label>
            <input type="text" name="lname" placeholder="Last name" required>
          </div>
        </div>
        <div class="field input">
          <label>Phone no</label>
          <input type="text" name="phone" placeholder="Enter your Phone no" required>
        </div>
        <div class="field input">
          <label>Email Address</label>
          <input type="text" name="email" placeholder="Enter your email" required>
        </div>
        <div class="field input">
          <label for="myDropdown">Select your Branch</label>
            <select id="myDropdown" name="branch">
              <option value="" disabled selected>--- Select your Branch ---</option>
              <option value="CSE">CSE</option>
              <option value="ISE">ISE</option>
              <option value="MECH">MECH</option>
              <option value="CIVIL">CIVIL</option>
              <option value="AIML">AIML</option>
              <option value="AIDS">AIDS</option>
            </select>
        </div>
        <div class="field input">
          <label>Password</label>
          <input type="password" name="password" placeholder="Enter new password" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field image">
          <label>Select Profile Picture (optional)</label>
          <label for="imageUpload" class="custom-file-upload">
            <img src="placeholder_upload.jpg" id="previewImage" alt="Upload Image">
          </label>
          <input id="imageUpload" type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg">
          <span id="fileName" class="file-name" ></span>
          <script>
              document.getElementById("imageUpload").addEventListener("change", function() {
              var fileName = this.files[0].name;
              document.getElementById("fileName").textContent = fileName;
              });
          </script>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="Continue to Chat">
        </div>
      </form>
      <div class="link">Already signed up? <a href="login.php">Login now</a></div>
    </section>
  </div>

  <script src="javascript/pass-show-hide.js"></script>
  <script src="javascript/signup.js"></script>

</body>
</html>
