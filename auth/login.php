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

// Validate user with username exists and password is correct
$user = fetchUserByUsername($username);
if (!$user || !password_verify($password, $user["password_hash"])) {
  $_SESSION["error-msg"] = "Invalid username or password";
  header("Location: ../login.php");
  exit;
}


// Save to session
$_SESSION["username"] = $username;

// Redirect to home page
header("Location: ../index.php");