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

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #4facfe, #00f2fe);
        }

        .form-container {
            background: #fff;
            padding: 30px;
            width: 320px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        form input {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            outline: none;
            transition: 0.3s;
        }

        form input:focus {
            border-color: #4facfe;
            box-shadow: 0 0 5px rgba(79,172,254,0.5);
        }

        .register-btn {
            width: 100%;
            padding: 12px;
            background: #4facfe;
            border: none;
            border-radius: 8px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }

        .register-btn:hover {
            background: #3a8de0;
        }

        .footer {
            margin-top: 15px;
            font-size: 14px;
        }

        .footer a {
            color: #4facfe;
            text-decoration: none;
            font-weight: bold;
        }

        .footer a:hover {
            text-decoration: underline;
        }
    </style>

</head>

<body>

    <div class="form-container">
        <h2>Register</h2>

        <form method="post" action="/save">
            <input type="text" name="username" placeholder="Fullname" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <select name="role" placeholder="Role" required>
                <option value="admin">Admin</option>
                <option value="worker">Worker</option>
            </select>
            <button type="submit" name="register" class="register-btn">Register</button>
        </form>

        <div class="footer">
            <p>Already have an Account? <a href="/login">Back</a></p>
        </div>
    </div>

</body>
</html>