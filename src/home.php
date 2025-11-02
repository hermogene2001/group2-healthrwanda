<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home - HEALTHRWANDA</title>
</head>
<body>
    <h1>Well logged in, <?php echo $_SESSION['user_firstname']; ?>!</h1>
    <p>Welcome to HEALTHRWANDA patient portal.</p>
    <a href="logout.php">Logout</a>
</body>
</html>