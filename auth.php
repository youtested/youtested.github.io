<?php
session_start();

$username = isset($_POST['username']) ? trim($_POST['username']) : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

if ($username === '' || $password === '') {
    http_response_code(400);
    echo 'Missing username or password.';
    exit;
}

$users = require __DIR__ . '/users.php';

if (!array_key_exists($username, $users)) {
    usleep(200000);
    http_response_code(401);
    echo 'Invalid credentials.';
    exit;
}

$hash = $users[$username];

if (password_verify($password, $hash)) {
    session_regenerate_id(true);
    $_SESSION['user'] = $username;
    header('Location: /protected.php');
    exit;
} else {
    usleep(200000);
    http_response_code(401);
    echo 'Invalid credentials.';
    exit;
}
