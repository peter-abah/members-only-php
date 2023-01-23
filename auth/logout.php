<?php
// Need to initialize session before clearing it
session_start();

// Clear all user data in session effectively logging out user
session_destroy();

header("Location: ../index.php");