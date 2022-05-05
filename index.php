<?php
    require_once __DIR__ . '/db-config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <ul>
        <li><a href="./index.php?page=register">Register</a></li>
        <li><a href="./index.php?page=login">Login</a></li>
        <li><a href="./index.php?page=user-list">List of users</a></li>
    </ul>

    <hr>

    <?php
    $page = $_GET['page'] ?? null;

    $routes = [
        'register'          => __DIR__ . '/pages/register.php',
        'login'             => __DIR__ . '/pages/login.php',
        'login-validate'    => __DIR__ . '/pages/loginValidate.php',
        'register-validate' => __DIR__ . '/pages/registerValidate.php',
        'user-list'         => __DIR__ . '/pages/userList.php',
    ];

    if (in_array($page, array_keys($routes))) {
        require $routes[$page];
    }
    ?>
</body>
</html>
