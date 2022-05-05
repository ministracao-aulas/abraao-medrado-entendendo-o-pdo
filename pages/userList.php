<?php

    $stmt = $pdo->prepare("SELECT * FROM blog_users");
    $stmt->execute();
    $users = $stmt->fetchAll();
?>

    <ul>
        <?php foreach ($users as $user) : ?>
            <li><?= $user['name'] ?></li>
        <?php endforeach; ?>
    </ul>
