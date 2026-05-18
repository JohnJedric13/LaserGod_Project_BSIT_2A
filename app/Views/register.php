<!-- <?php  
include('db.php');

if(isset($_POST['users'])) {
    $username = $_POST['username'];
    $username = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users_log (username, password) VALUES ('$username', '$password')";
    if($conn->query($sql) === TRUE) {
        header ("Location: /login");
    } else {
        echo "Error: " . $conn->error;
    }
}
?> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>

        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body{
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;

            background:
            linear-gradient(135deg, #4facfe, #00f2fe);

            background-size: cover;
            background-position: center;
            overflow: hidden;
        }

        .form-container{
            width: 400px;
            padding: 40px;

            background: rgba(255, 255, 255, 0.63);
            backdrop-filter: blur(15px);

            border: 1px solid rgba(255, 255, 255, 0.96);

            border-radius: 20px;

            box-shadow: 0 8px 32px rgba(0,0,0,0.35);

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

        .logo{
            width: 70px;
            height: 70px;

            background: linear-gradient(135deg,#4facfe,#00f2fe);

            border-radius: 50%;

            display: flex;
            justify-content: center;
            align-items: center;

            margin: auto;
            margin-bottom: 20px;

            font-size: 28px;
        }

        h2{
            text-align: center;
            margin-bottom: 8px;
            font-weight: 600;
            color: black;
        }

        .subtitle{
            text-align: center;
            font-size: 14px;
            color: #131212;
            margin-bottom: 30px;
        }

        .input-group{
            position: relative;
            margin-bottom: 20px;
        }

        .input-group i{
            position: absolute;
            top: 50%;
            left: 15px;
            transform: translateY(-50%);
            color: #0c0c0c;
        }

        .input-group input,
        .input-group select{
            width: 100%;
            padding: 14px 14px 14px 45px;

            border: none;
            outline: none;

            border-radius: 12px;

            background: rgba(1, 1, 1, 0.35);

            color: white;
            font-size: 15px;
        }

        .input-group input::placeholder{
            color: #080808;
        }

        .input-group select{
            color: black;
        }

        .input-group select option{
            color: black;
        }

        .input-group input:focus,
        .input-group select:focus{
            background: rgba(255,255,255,0.25);
            border: 1px solid #4facfe;
        }

        .register-btn{
            width: 100%;
            padding: 14px;

            border: none;
            border-radius: 12px;

            background: linear-gradient(135deg,#4facfe,#00f2fe);

            color: white;
            font-size: 16px;
            font-weight: 600;

            cursor: pointer;

            transition: 0.3s;
        }

        .register-btn:hover{
            transform: translateY(-2px);
            opacity: 0.9;
        }

        .footer{
            margin-top: 20px;
            text-align: center;
            font-size: 14px;
            color: #131212;
        }

        .footer a{
            color: #114dff;
            text-decoration: none;
            font-weight: 600;
        }

        .footer a:hover{
            text-decoration: underline;
        }

        @media(max-width: 450px){

            .form-container{
                width: 90%;
                padding: 30px;
            }

        }

    </style>

</head>

<body>

    <div class="form-container">

        <!-- Logo -->
        <div class="logo">
            <i class="bi bi-person-plus-fill"></i>
        </div>

        <h2>Create Account</h2>
        <p class="subtitle">Register to access your dashboard</p>

        <!-- Form -->
        <form method="post" action="/save">

            <!-- Fullname -->
            <div class="input-group">
                <i class="bi bi-person-fill"></i>
                <input 
                    type="text" 
                    name="username" 
                    placeholder="Fullname"
                    required
                >
            </div>

            <!-- Email -->
            <div class="input-group">
                <i class="bi bi-envelope-fill"></i>
                <input 
                    type="email" 
                    name="email" 
                    placeholder="Email Address"
                    required
                >
            </div>

            <!-- Password -->
            <div class="input-group">
                <i class="bi bi-lock-fill"></i>
                <input 
                    type="password" 
                    name="password" 
                    placeholder="Password"
                    required
                >
            </div>

            <!-- Role -->
            <div class="input-group">
                <i class="bi bi-person-badge-fill"></i>

                <select name="role" required>
                    <option value="">Select Role</option>
                    <option value="admin">Admin</option>
                    <option value="worker">Worker</option>
                </select>
            </div>

            <!-- Button -->
            <button type="submit" name="register" class="register-btn">
                Register
            </button>

        </form>

        <!-- Footer -->
        <div class="footer">
            Already have an account?
            <a href="/login">Login</a>
        </div>

    </div>

</body>
</html>