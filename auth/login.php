<?php
require_once "../db.php";
require_once "../functions.php";
session_start();

$username = getFormValue("username");
$password = getFormValue("password");

// Validate none of the form values are empty
if (!$username || !$password) {
  $_SESSION["error-msg"] = "Fill all fields";
  header("Location: ../login.php");
  exit;
}

// Check for duplicate username
$statement = $pdo->prepare("SELECT * FROM users WHERE username = :username");
$statement->bindValue("username", $username);
$statement->execute();
$user = $statement->fetch(PDO::FETCH_ASSOC);

// Validate user with username exists and password is correct
if (!$user || !password_verify($password, $user["password_hash"])) {
  $_SESSION["error-msg"] = "Invalid username or password";
  header("Location: ../login.php");
  exit;
}


// Save to session
$_SESSION["username"] = $username;

// Redirect to home page
header("Location: ../index.php");