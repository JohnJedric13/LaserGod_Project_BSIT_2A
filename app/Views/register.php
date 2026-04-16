<?php
include('db.php');

if(isset($_POST['users'])) {
    $username = $_POST['username'];
    $username = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users_log (username, password) VALUES ('$username', '$password')";
    if($conn->query($sql) === TRUE) {
        header ("Location: login.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>

    <div class="form-container">
        <h2>Login</h2>

        <form action="<?= base_url('login') ?>" method="post">
            <input type="text" placeholder="Username" required>
            <input type="password" placeholder="Password" required>
            <button type="submit" name="register" class="register-btn">Register</button>
        </form>

        <div class="footer">
            <p>Already have an Account? <a href="login.php">Back</a></p>
        </div>
    </div>

</body>
</html>