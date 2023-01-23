<?php
require_once "../db.php";
require_once "../functions.php";
session_start();

$username = getFormValue("username");
$password = getFormValue("password");
$passwordConfirmation = getFormValue("password-confirmation");

// Validate none of the form values are empty
if (!$username || !$password || !$passwordConfirmation) {
  header("Location: ../register.php");
  exit;
}

// Validate that the password matches the password confirmation
if ($password != $passwordConfirmation) {
  $_SESSION["error-msg"] = "Passwords do not match";
  header("Location: ../register.php");
  exit;
}

// Check for duplicate username
$user = fetchUserByUsername($username);
if ($user) {
  $_SESSION["error-msg"] = "Username already exists";
  header("Location: ../register.php");
  exit;
}


$passwordHash = password_hash($password, PASSWORD_DEFAULT);

// Insert user into database
$statement = $pdo->prepare("INSERT INTO users (username, password_hash) VALUES (:username, :password_hash)");
$statement->bindValue("username", $username);
$statement->bindValue("password_hash", $passwordHash);
$statement->execute();

// Save to session
$_SESSION["username"] = $username;

// Redirect to home page
header("Location: ../index.php");