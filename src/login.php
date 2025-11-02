<!DOCTYPE html>
<html>
<head>
    <title>Login - HEALTHRWANDA</title>
</head>
<body>
    <h2>Patient Login</h2>
    <form action="login_process.php" method="POST">
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit">Login</button>
    </form>
    <p>Don't have an account? <a href="registration.php">Register here</a></p>
</body>
</html>