<?php

$userFormPassword   = $_POST['password']    ?? null;
$userFormEmail      = $_POST['email']       ?? null;
$name               = $_POST['name']        ?? null;

if (!$userFormPassword || !$userFormEmail || !$name) {
    die('Invalid data');
}

$stmt = $pdo->prepare("SELECT * FROM blog_users WHERE email = ?");
$stmt->execute([$userFormEmail]);
$user = $stmt->fetch();

if ($user) {
    die('User already exists');
}

$userHashedPassword = password_hash($userFormPassword, PASSWORD_BCRYPT);


$sql = "INSERT INTO blog_users (name, email, password) VALUES (?,?,?)";
$stmt= $pdo->prepare($sql);
$status = $stmt->execute([$name, $userFormEmail, $userHashedPassword]);


if (!$status) {
    echo "User creation failed";
}

echo "User created successfully";
