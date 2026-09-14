<?php

session_start();
// use for email for verrfication user log or not
if (!isset($_SESSION('email'))) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
</head>
<body style="background='#fff'">
    <div class="box">
        <h1>Welcome, <span><?php $_SESSION['name']; ?></span></h1>
        <p>This is an <span>user</span>page</p>
        <button onClick="window.location.href='logout.php'">Logout</button>
    </div>
</body>
</html>