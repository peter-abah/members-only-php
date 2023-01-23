<?php
require_once "db.php";
include_once "header.php";
require_once "functions.php"
?>

<?php if (isLoggedIn()): ?>
    <h2>Make a POST!</h2>
    <form action="posts/create" method="post">
        <label>Title:
            <input type="text" name="title" required>
        </label>

        <label>Body:
            <textarea name="body" required></textarea>
        </label>
    </form>
<?php endif ?>

<?php include_once "footer.php" ?>