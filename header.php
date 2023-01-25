<?php
session_start();
require_once "functions.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/main.css" rel="stylesheet">
    <title>Members only</title>
</head>

<body>
    <header>
        <h1><a href="index.php">Members only</a></h1>
        <div>
            <?php if (isLoggedIn()): ?>
                <p><?= $_SESSION["username"] ?></p>
                <a href="auth/logout.php">Log out</a>
            <?php else: ?>
                <a href="login.php">Login</a>
                <a href="register.php">Register</a>
            <?php endif ?>
        </div>
    </header>