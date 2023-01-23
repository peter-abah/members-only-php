<?php
// Gets form value and trims whitespace
function getFormValue(string $key): string
{
  $value = $_POST[$key] ?? "";
  return trim($value);
}