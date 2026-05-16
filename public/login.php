<?php

require_once '../private/includes/auth.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (loginUser($email, $password)) {

        header('Location: index.php');
        exit;

    } else {

        $message = "Login fehlgeschlagen.";
    }
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>

<h1>Login</h1>

<p><?= $message ?></p>

<form method="POST">

    <input type="email" name="email" required>

    <input type="password" name="password" required>

    <button type="submit">
        Login
    </button>

</form>

</body>
</html>
