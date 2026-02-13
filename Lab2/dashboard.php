<?php
include "config.php";

if (!isset($_SESSION["user"])) {
    header("Location: login.php");
    exit();
}

$user = $_SESSION["user"];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-dark bg-primary">
    <div class="container">
        <span class="navbar-brand">User Dashboard</span>
        <a href="logout.php" class="btn btn-light btn-sm">Logout</a>
    </div>
</nav>

<div class="container mt-5">

    <div class="card shadow p-4">
        <h4 class="mb-3">Welcome, <?php echo $user["name"]; ?> 🎉</h4>

        <div class="row">
            <div class="col-md-6">
                <div class="alert alert-info">
                    <strong>Name:</strong> <?php echo $user["name"]; ?>
                </div>
            </div>

            <div class="col-md-6">
                <div class="alert alert-warning">
                    <strong>Email:</strong> <?php echo $user["email"]; ?>
                </div>
            </div>
        </div>

        <hr>

        <p class="text-muted">
            Your login activity is being saved in <strong>login_logs.txt</strong>
        </p>
    </div>

</div>

</body>
</html>
