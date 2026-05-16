<?php

function escape($string)
{
    return htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
}

function generateToken($length = 64)
{
    return bin2hex(random_bytes($length / 2));
}

function isLoggedIn()
{
    return isset($_SESSION['user_id']);
}
