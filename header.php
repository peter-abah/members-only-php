<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Members only</title>
</head>

<body>
    <header>
        <h1>Members only</h1>
        <div>
            <?php if (!empty($_SESSION["username"])): ?>
                <p><?= $_SESSION["username"] ?></p>
                <form action="auth/logout.php" method="post">
                    <button type="submit">Logout</button>
                </form>
            <?php else: ?>
                <a href="login.php">Login</a>
                <a href="register.php">Register</a>
            <?php endif ?>
        </div>
    </header>