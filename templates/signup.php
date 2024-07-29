<?php
// signup.php
if (isset($_POST['submit'])) {
    include "connection.php";

    // Debugging: Check if form data is received
    if (empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['con_password'])) {
        echo '<script>alert("All fields are required!");</script>';
        exit();
    }

    $username = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['username']));
    $email = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['email']));
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $con_pass = mysqli_real_escape_string($conn, $_POST['con_password']);

    // Password match check
    if ($password !== $con_pass) {
        echo '<script>alert("Passwords do not match!");</script>';
        exit();
    }

    // Check for existing username/email
    $sql = "SELECT * FROM meduser WHERE username='$username' OR email='$email'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 0) {
        
        $sql = "INSERT INTO meduser (username, email, password) VALUES ('$username', '$email', '$password')";
        if (mysqli_query($conn, $sql)) {
            echo '<script>alert("Successfully Signed up!"); window.location.href="app1.html";</script>';
        } else {
            echo '<script>alert("Failed to insert user data!");</script>';
        }
    } else {
        echo '<script>alert("Username or Email already exists!");</script>';
    }
}

?>
