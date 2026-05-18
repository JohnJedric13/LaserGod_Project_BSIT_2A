<?php   
include('db.php');

if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $username = $_POST['password'];

    $result = $conn->query("SELECT * FROM users WHERE username='$username'");
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user['username'];
        header("location: <?= base_url('stock') ?>");
    } else {
        echo "<p>Invalid username or password.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>

        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body{
            height: 100vh;
            overflow: hidden;

            /* Background Image */
            background: 
                linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)),
                url(<?= base_url('assets/adminlte/dist/img/sarisaristore.jpg') ?>);

            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Glassmorphism Card */
        .login-card{
            width: 420px;
            padding: 40px;
            border-radius: 20px;

            background: rgb(125, 125, 125);
            backdrop-filter: blur(12px);

            border: 1px solid rgba(255,255,255,0.2);

            box-shadow: 0 8px 32px rgba(0,0,0,0.3);

            color: white;

            animation: fadeIn 1s ease;
        }

        @keyframes fadeIn{
            from{
                opacity: 0;
                transform: translateY(20px);
            }
            to{
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-card h2{
            color: black;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .login-card p{
            font-size: 14px;
            color: #030303;
            margin-bottom: 30px;
        }

        .form-control{
            height: 50px;
            border-radius: 12px;
            border: none;
            background: rgba(255,255,255,0.2);
            color: white;
        }

        .form-control::placeholder{
            color: #111010;
        }

        .form-control:focus{
            background: rgba(255,255,255,0.25);
            color: white;
            box-shadow: none;
            border: 1px solid #4e73df;
        }

        .form-label{
            font-weight: 500;
        }

        .btn-login{
            height: 50px;
            border-radius: 12px;
            background: linear-gradient(135deg, #4e73df, #1cc88a);
            border: none;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-login:hover{
            transform: translateY(-2px);
            opacity: 0.9;
        }

        .register-link a{
            color: #0e2cd7;
            text-decoration: none;
            font-weight: 500;
        }

        .register-link a:hover{
            text-decoration: underline;
        }

        .alert-custom{
            background: rgba(255,0,0,0.2);
            padding: 10px;
            border-radius: 10px;
            font-size: 14px;
            margin-bottom: 15px;
            color: #fff;
        }

    </style>
</head>

<body>

<div class="login-card">

    <div class="text-center">
        <h2>Welcome Back 👋</h2>
        <p>Login to continue to your dashboard</p>
    </div>

    <!-- Error Message -->
    <?php if(session()->getFlashdata('error')): ?>
        <div class="alert-custom">
            <?= session()->getFlashdata('error'); ?>
        </div>
    <?php endif; ?>

    <!-- Login Form -->
    <form method="post" action="/auth">

        <!-- Email -->
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input 
                type="email" 
                name="email" 
                class="form-control"
                placeholder="Enter your email"
                required
            >
        </div>

        <!-- Password -->
        <div class="mb-4">
            <label class="form-label">Password</label>
            <input 
                type="password" 
                name="password" 
                class="form-control"
                placeholder="Enter your password"
                required
            >
        </div>

        <!-- Button -->
        <div class="d-grid">
            <button type="submit" class="btn btn-login text-white">
                Login
            </button>
        </div>

    </form>

    <!-- Success Message -->
    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success mt-3">
            <?= session()->getFlashdata('success'); ?>
        </div>
    <?php endif; ?>

    <!-- Register -->
    <div class="text-center mt-4 register-link">
        <small>
            Don't have an account?
            <a href="/register">Register</a>
        </small>
    </div>

</div>

</body>
</html>