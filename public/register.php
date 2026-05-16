<?php

require_once '../private/includes/auth.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (registerUser($email, $password)) {

        $message = "Registrierung erfolgreich.";

    } else {

        $message = "Fehler bei der Registrierung.";
    }
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Registrieren</title>
</head>
<body>

<h1>Registrieren</h1>

<p><?= $message ?></p>

<form method="POST">

    <input type="email" name="email" required>
    <input type="password" name="password" required>

    <button type="submit">
        Registrieren
    </button>

</form>

</body>
</html>
