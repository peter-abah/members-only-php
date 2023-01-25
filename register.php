<?php
include_once "header.php";
?>

<h2>Register</h2>
<form action="auth/register.php" method="post">
    <label>Username:
        <input type="text" name="username" maxlength="50" required>
    </label>

    <label>Password
        <input type="password" name="password" minlength="8" required>
    </label>

    <label>Confirm password
        <input type="password" name="password-confirmation" minlength="8" required>
    </label>

    <button type="submit">Register</button>
</form>

<?php if (!empty($_SESSION["error-msg"])): ?>
    <p class="error-msg">Unable to register. <?= $_SESSION["error-msg"] ?></p>
<?php endif;
unset($_SESSION["error-msg"]);
?>

<?php include_once "footer.php" ?>