<?php
$config = require __DIR__ . '/config.php';
require __DIR__ . '/includes/auth.php';

start_secure_session();

if (is_logged_in()) {
    header('Location: dashboard.php');
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    $user = authenticate_user($username, $password, $config['users']);

    if ($user !== null) {
        $_SESSION['user'] = $user;
        header('Location: dashboard.php');
        exit;
    }

    $error = 'Invalid username or password.';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($config['app_name']); ?> Login</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="login-page">
    <main class="login-card">
        <h1><?php echo htmlspecialchars($config['app_name']); ?></h1>
        <p>Sign in to access your admin dashboard.</p>

        <?php if ($error !== ''): ?>
            <div class="error"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <form method="post">
            <div class="field">
                <label for="username">Username</label>
                <input id="username" name="username" type="text" required autocomplete="username">
            </div>

            <div class="field">
                <label for="password">Password</label>
                <input id="password" name="password" type="password" required autocomplete="current-password">
            </div>

            <button class="btn btn-primary" type="submit">Login</button>
        </form>

        <p class="note">Demo credentials: admin / admin123</p>
    </main>
</body>
</html>
