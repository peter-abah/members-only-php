<?php
$dsn = "mysql:host=localhost;dbname=members_only;";
$username = "root";
$password = "12345678";

$pdo = new PDO($dsn, $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);