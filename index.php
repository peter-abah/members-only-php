<?php
require_once "db.php";
include_once "header.php";
require_once "functions.php";

$query = <<<SQL
    SELECT posts.id, title, body, created_at, username 
    FROM posts 
    JOIN users ON posts.user_id = users.id 
    ORDER BY created_at DESC
SQL;
$statement = $pdo->query($query);
$posts = $statement->fetchAll(PDO::FETCH_ASSOC);

function postUser($post) {
    // Displays author of post if logged in else prints hidden
    return isLoggedIn() ? $post["username"] : "hidden";
}
    ?>

<?php if (isLoggedIn()): ?>
    <h2>Make a POST!</h2>
    <form class="post-form" action="posts/create.php" method="post">
        <label>Title:
            <input type="text" name="title" required>
        </label>

        <label>Body:
            <textarea name="body" required></textarea>
        </label>

        <button type="submit">Save</button>
    </form>

    <?php if (!empty($_SESSION["error-msg"])): ?>
        <p class="error-msg">Unable to create post. <?= $_SESSION["error-msg"] ?></p>
    <?php endif;
    unset($_SESSION["error-msg"]);
endif ?>

<section>
    <ul class="posts-list">
        <?php foreach($posts as $post): ?>
            <li class="post">
                <h3>
                    <?= htmlentities($post["title"]) ?> 
                    <em><?= htmlentities(postUser($post)) ?></em>
                </h3>
                <p><?= htmlentities($post["body"]) ?></p>
            </li>
        <?php endforeach ?>
    </ul>
</section>

<?php include_once "footer.php" ?>