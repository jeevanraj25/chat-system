<?php
    session_start();
    include_once "config.php";
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $branch = $name = isset($_POST['branch']) ? mysqli_real_escape_string($conn, $_POST['branch']) : 'CSE';
    
    // Set default image
    $default_image = "profile_default.png";

    if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password) && !empty($branch) && !empty($phone)) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
            if (mysqli_num_rows($sql) > 0) {
                echo "$email - This email already exists!";
            } else {
                $new_img_name = $default_image; // Set default image name
                
                if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
                    $img_name = $_FILES['image']['name'];
                    $img_type = $_FILES['image']['type'];
                    $tmp_name = $_FILES['image']['tmp_name'];
                    
                    $img_explode = explode('.', $img_name);
                    $img_ext = end($img_explode);
    
                    $extensions = ["jpeg", "png", "jpg"];
                    if (in_array($img_ext, $extensions) && in_array($img_type, ["image/jpeg", "image/jpg", "image/png"])) {
                        $time = time();
                        $new_img_name = $time . $img_name;
                        
                        // Move uploaded file
                        if (move_uploaded_file($tmp_name, "images/" . $new_img_name)) {
                            // Successfully uploaded
                        } else {
                            echo "Failed to upload image. Please try again!";
                            exit();
                        }
                    } else {
                        echo "Please upload an image file - jpeg, png, jpg";
                        exit();
                    }
                }
                
                // Insert into database
                $ran_id = rand(time(), 100000000);
                $status = "Active now";
                $encrypt_pass = md5($password);
                $insert_query = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, img, status, branch,phone_number)
                                VALUES ({$ran_id}, '{$fname}','{$lname}', '{$email}', '{$encrypt_pass}', '{$new_img_name}', '{$status}','{$branch}','{$phone}')");
                if ($insert_query) {
                    $select_sql2 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                    if (mysqli_num_rows($select_sql2) > 0) {
                        $result = mysqli_fetch_assoc($select_sql2);
                        $_SESSION['unique_id'] = $result['unique_id'];
                        echo "success";
                    } else {
                        echo "This email address does not exist!";
                    }
                } else {
                    echo "Something went wrong. Please try again!";
                }
            }
        } else {
            echo "$email is not a valid email!";
        }
    } else {
        echo "All input fields are required!";
    }
?>
