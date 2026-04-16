<?php
include('db.php');

if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $username = $_POST['password'];

    $result = $conn->query("SELECT * FROM users WHERE username='$username'");
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user['username'];
        header("location: index.php");
    } else {
        echo "<p>Invalid username or password.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    
</head>

    <style>
        body {
            background: linear-gradient(135deg, #4e73df, #1cc88a);
            height: 100vh;
        }
        .login-card {
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            background: white;
            width: 100px;
            padding: 100px;
            margin: 100px auto;
            text-align: center;
        }
    </style>

<body>

<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="card login-card p-4" style="width: 500px;" style="padding: 100px;">
        
        <h3 class="text-center mb-4">Welcome Back 👋</h3>

        <form method="post" action="stock">
            
            <!-- Username -->
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control" placeholder="Enter username" required>
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter password" required>
            </div>

            <!-- Login Button -->
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">
                    Login
                </button>
            </div>

        </form>

        <!-- Register -->
        <div class="text-center mt-3">
            <small>Don't have an account? 
                <a href="/register">Register</a>
            </small>
        </div>

    </div>
</div>

</body>
</html>