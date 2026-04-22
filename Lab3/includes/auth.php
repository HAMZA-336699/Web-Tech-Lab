<?php

function start_secure_session(): void
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
}

function current_user(): ?array
{
    start_secure_session();
    return $_SESSION['user'] ?? null;
}

function is_logged_in(): bool
{
    return current_user() !== null;
}

function require_login(): void
{
    if (!is_logged_in()) {
        header('Location: index.php');
        exit;
    }
}

function authenticate_user(string $username, string $password, array $users): ?array
{
    foreach ($users as $user) {
        if ($user['username'] === $username && password_verify($password, $user['password'])) {
            return [
                'username' => $user['username'],
                'name' => $user['name'],
                'role' => $user['role'],
            ];
        }
    }

    return null;
}
