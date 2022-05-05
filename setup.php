<?php
require_once __DIR__ . '/db-config.php';

$queries = [
    'create_users_table' => 'CREATE TABLE IF NOT EXISTS blog_users (
        id INT NOT NULL AUTO_INCREMENT,
        email VARCHAR(255) NOT NULL,
        password VARCHAR(255) NOT NULL,
        PRIMARY KEY (id)
    )',
    'create_posts_table' => 'CREATE TABLE IF NOT EXISTS blog_posts (
        id INT NOT NULL AUTO_INCREMENT,
        title VARCHAR(255) NOT NULL,
        content TEXT NOT NULL,
        author_id INT NOT NULL,
        created_at DATETIME NOT NULL,
        PRIMARY KEY (id)
    )',
];

echo PHP_EOL;
foreach ($queries as $key => $query) {
    echo "Running {$key}".PHP_EOL;
    $stmt = $pdo->prepare($query);
    $stmt->execute();
}
echo PHP_EOL;
