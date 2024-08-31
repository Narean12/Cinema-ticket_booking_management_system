<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($email === 'admin' && $password === 'admin') {
        $_SESSION['admin_logged_in'] = true;
        header("Location: admin_panel.php");
        exit();
    } else {
        $_SESSION['error'] = 'Invalid username or password';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-image: url(neon.jpg);
        }
        .login-container {
            background-color: rgba(255, 255, 255, 0.425);
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }
        .login-container h1 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #00695c;
        }
        .form-group {
            margin-bottom: 20px;
            position: relative;
        }
        .form-group input {
            width: 75%;
            padding: 10px 40px;
            border: none;
            border-radius: 25px;
            background-color: #f1f1f1;
            font-size: 16px;
        }
        .form-group input:focus {
            outline: none;
            background-color: #e1e1e1;
        }
        .form-group .icon {
            position: absolute;
            top: 50%;
            left: 15px;
            transform: translateY(-50%);
            color: #999;
        }
        .login-btn {
            width: 100%;
            padding: 15px;
            background-color: #00b4aa;
            color: black;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-size: 18px;
            font-weight: bold;
            transition: background-color 0.3s;
        }
        .login-btn:hover {
            background-color: #009688;
        }
        .error-message {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h1>ADMIN LOGIN</h1>
        <form action="admin_login.php" method="post">
            <div class="form-group">
                <input type="text" id="username" name="email" placeholder="E-Mail" required>
                <span class="icon">&#128100;</span>
            </div>
            <div class="form-group">
                <input type="password" id="password" name="password" placeholder="Password" required>
                <span class="icon">&#128274;</span>
            </div>
            <div class="form-group">
                <input type="submit" value="LOGIN" class="login-btn">
            </div>
        </form>
        <?php
        if (isset($_SESSION['error'])) {
            echo '<p class="error-message">' . $_SESSION['error'] . '</p>';
            unset($_SESSION['error']);
        }
        ?>
    </div>
</body>
</html>
