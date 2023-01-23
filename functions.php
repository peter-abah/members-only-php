<?php
// Gets form value and trims whitespace
function getFormValue(string $key): string
{
  $value = $_POST[$key] ?? "";
  return trim($value);
}

// Checks user is logged in
function isLoggedIn() {
  return !empty($_SESSION["username"]);
}