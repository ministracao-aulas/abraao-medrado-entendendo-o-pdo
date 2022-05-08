<?php
require_once __DIR__ . '/db-config.php';

$queries = [
    'create_users_table' => [
        'mysql' => 'CREATE TABLE IF NOT EXISTS blog_users (
            id INT NOT NULL AUTO_INCREMENT,
            name VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            password VARCHAR(255) NOT NULL,
            PRIMARY KEY (id)
        )',
        'sqlite' => 'CREATE TABLE IF NOT EXISTS blog_users (
            id INTEGER PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            password VARCHAR(255) NOT NULL
        )',
    ],
    'create_posts_table' => [
        'mysql' =>  'CREATE TABLE IF NOT EXISTS blog_posts (
            id INT NOT NULL AUTO_INCREMENT,
            title VARCHAR(255) NOT NULL,
            content TEXT NOT NULL,
            author_id INT NOT NULL,
            created_at DATETIME NOT NULL,
            PRIMARY KEY (id)
        )',
        'sqlite' => 'CREATE TABLE IF NOT EXISTS blog_posts (
            id INTEGER PRIMARY KEY,
            title VARCHAR(255) NOT NULL,
            content TEXT NOT NULL,
            author_id INTEGER NOT NULL,
            created_at DATETIME NOT NULL
        )',
    ]
];

echo PHP_EOL;
echo PHP_EOL."DB type: {$dbType}".PHP_EOL;
foreach ($queries as $key => $query) {
    echo "Running {$key}".PHP_EOL;

    try {
        $sql = $query[$dbType] ?? null;

        if (!$sql) {
            continue;
        }

        $stmt = $pdo->prepare($sql);
        $stmt->execute();
    } catch (\Throwable $th) {
        throw $th;
    }
}
echo PHP_EOL;
