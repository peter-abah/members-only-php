<?php include_once "header.php"; ?>

<h2>Login</h2>
<form action="auth/login.php" method="post">
  <label>Username:
    <input type="text" name="username" required>
  </label>

  <label>Password:
    <input type="password" name="password" minlength="8" required>
  </label>

  <button type="submit">Login</button>
</form>

<!-- Show error message if any -->
<?php if (!empty($_SESSION["error-msg"])): ?>
    <p class="error-msg">Unable to register. <?= $_SESSION["error-msg"] ?></p>
<?php endif;
unset($_SESSION["error-msg"]);
?>

<?php include_once "footer.php"; ?>