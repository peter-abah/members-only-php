<?php
require_once "../db.php";
session_start();

// Gets form value and trims whitespace
function getFormValue(string $key): string
{
  $value = $_POST[$key] ?? "";
  return trim($value);
}

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
$statement = $pdo->prepare("SELECT * FROM users WHERE username = :username");
$statement->bindValue("username", $username);
$statement->execute();
$user = $statement->fetch();

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