<?php

require_once __DIR__ . '/../config/database.php';

function registerUser($email, $password)
{
    global $pdo;

    $hash = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("
        INSERT INTO users (
            email,
            password_hash
        )
        VALUES (
            :email,
            :password_hash
        )
    ");

    return $stmt->execute([
        'email' => $email,
        'password_hash' => $hash
    ]);
}

function loginUser($email, $password)
{
    global $pdo;

    $stmt = $pdo->prepare("
        SELECT *
        FROM users
        WHERE email = :email
        LIMIT 1
    ");

    $stmt->execute([
        'email' => $email
    ]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password_hash'])) {

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_email'] = $user['email'];

        return true;
    }

    return false;
}
