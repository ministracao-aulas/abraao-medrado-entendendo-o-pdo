<?php
require_once __DIR__ . '/db-config.php';

$queryChain = [
    'insert_users_on_users_table' => [
        'queries' => [
            'mysql' => 'INSERT INTO blog_users (name, email, password) VALUES (?, ?, ?)',
            'sqlite' => 'INSERT INTO blog_users (name, email, password) VALUES (?, ?, ?)',
        ],
        'values' => [
            [
                'name'      => 'Abraão',
                'email'     => 'abraao@site.com',
                'password'  => password_hash('123456', PASSWORD_BCRYPT)
            ],
            [
                'name'      => 'João',
                'email'       => 'joao@site.com',
                'password'  => password_hash('123456', PASSWORD_BCRYPT)
            ],
            [
                'name'      => 'Tiago',
                'email'      => 'tiago@site.com',
                'password'  => password_hash('123456', PASSWORD_BCRYPT)
            ],
        ],
    ],
    'insert_posts_on_posts_table' => [
        'queries' => [
            'mysql' =>  'INSERT INTO blog_posts (title, content, author_id, created_at) VALUES (?, ?, ?, ?)',
            'sqlite' => 'INSERT INTO blog_posts (title, content, author_id, created_at) VALUES (?, ?, ?, ?)',
        ],
        'values' => [
            ['title' => 'Post 1', 'content' => 'Content 1', 'author_id' => 1, 'created_at' => '2020-01-01 00:00:00'],
            ['title' => 'Post 2', 'content' => 'Content 2', 'author_id' => 1, 'created_at' => '2020-01-01 00:00:00'],
            ['title' => 'Post 3', 'content' => 'Content 3', 'author_id' => 1, 'created_at' => '2020-01-01 00:00:00'],
        ],
    ],
];

foreach ($queryChain as $key => $chain) {
    echo "Running {$key}".PHP_EOL;


    try {
        $sql    = $chain['queries'][$dbType] ?? null;
        $values = $chain['values'] ?? null;

        $stmt = $pdo->prepare($sql);

        foreach ($values as $param) {
            $stmt->execute(array_values($param));
        }
    } catch (\Throwable $th) {
        throw $th;
    }
}
