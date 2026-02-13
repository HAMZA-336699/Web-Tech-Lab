<?php
include "config.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email    = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    if (file_exists($usersFile)) {

        $users = file($usersFile, FILE_IGNORE_NEW_LINES);

        foreach ($users as $user) {

            list($name, $storedEmail, $storedPassword) = explode("|", $user);

            if ($email == $storedEmail && password_verify($password, $storedPassword)) {

                $_SESSION["user"] = [
                    "name"  => $name,
                    "email" => $storedEmail
                ];

                $logData = "Login: $storedEmail | " . date("Y-m-d H:i:s") . PHP_EOL;
                file_put_contents($logsFile, $logData, FILE_APPEND);

                header("Location: dashboard.php");
                exit();
            }
        }
    }

    $error = "Invalid Email or Password!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #1cc88a, #4e73df);
            height: 100vh;
        }
        .card {
            border-radius: 15px;
        }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center">

<div class="card shadow p-4" style="width: 400px;">
    <h3 class="text-center mb-4">Login</h3>

    <?php if(isset($_GET['success'])): ?>
        <div class="alert alert-success">Account created successfully! Please login.</div>
    <?php endif; ?>

    <?php if($error): ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>

    <form method="POST">
        <div class="mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email Address" required>
        </div>

        <div class="mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>

        <button type="submit" class="btn btn-success w-100">Login</button>
    </form>

    <div class="text-center mt-3">
        Don't have account? <a href="signup.php">Register</a>
    </div>
</div>

</body>
</html>
