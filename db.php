<?php
$dsn = "mysql:host=localhost;dbname=members_only;";
$username = "root";
$password = "12345678";

$pdo = new PDO($dsn, $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

function fetchUserByID(int $id)
{
  global $pdo;
  $statement = $pdo->prepare("SELECT * FROM users WHERE id = :id");
  $statement->bindValue("id", $id);
  $statement->execute();
  return $statement->fetch(PDO::FETCH_ASSOC);
}

function fetchUserByUsername(string $username)
{
  global $pdo;
  $statement = $pdo->prepare("SELECT * FROM users WHERE username = :username");
  $statement->bindValue("username", $username);
  $statement->execute();
  return $statement->fetch(PDO::FETCH_ASSOC);
}