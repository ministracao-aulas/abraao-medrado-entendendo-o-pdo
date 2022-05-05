<?php

$userFormPassword   = $_POST['password']    ?? null;
$userFormEmail      = $_POST['email']       ?? null;


if (!$userFormPassword || !$userFormEmail) {
    die('Invalid data');
}

$stmt = $pdo->prepare("SELECT * FROM blog_users WHERE email = ?");
$stmt->execute([$userFormEmail]);
$user = $stmt->fetch();

if (!$user) {
    die('User not found');
}

$userOnDbPassword = $user['password'];

if ($user && password_verify($userFormPassword, $userOnDbPassword)) {
    echo "Login successful";
} else {
    echo "Login failed";
}
