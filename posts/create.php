<?php
require_once "../db.php";
require_once "../functions.php";

session_start();

// Checks user is logged in
if (!isLoggedIn()) {
  $_SESSION["error-msg"] = "You must be logged in to make a post";
  header("Location: ../index.php");
  exit;
}

$title = getFormValue("title");
$body = getFormValue("body");

// Validate title and body is not empty
if (!$title || !$body) {
  $_SESSION["error-msg"] = "Please fill all fields";
  header("Location: ../index.php");
  exit;
}

// Fetch user from database
$user = fetchUserByUsername($_SESSION["username"]);

$statement = $pdo->prepare("INSERT INTO posts (title, body, user_id) VALUES (:title, :body, :user_id)");
$statement->bindValue("title", $title);
$statement->bindValue("body", $body);
$statement->bindValue("user_id", $user["id"]);
$statement->execute();

// Redirect back to home
header("Location: ../index.php");