<?php
$config = require __DIR__ . '/config.php';
require __DIR__ . '/includes/auth.php';

start_secure_session();
require_login();

$user = current_user();
$stats = $config['stats'];
$orders = $config['recent_orders'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($config['app_name']); ?> Dashboard</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="layout">
    <aside class="sidebar">
        <div class="brand"><?php echo htmlspecialchars($config['app_name']); ?></div>
        <nav class="nav">
            <a class="active" href="dashboard.php">Dashboard</a>
            <a href="#">Users</a>
            <a href="#">Reports</a>
            <a href="#">Settings</a>
            <a class="link-logout" href="logout.php">Logout</a>
        </nav>
    </aside>

    <main class="content">
        <header class="topbar">
            <div>
                <h2 style="margin: 0;">Overview</h2>
                <small style="color: #607387;">Welcome back, <?php echo htmlspecialchars($user['name']); ?></small>
            </div>
            <div class="user-chip"><?php echo htmlspecialchars($user['role']); ?></div>
        </header>

        <section class="grid">
            <?php foreach ($stats as $stat): ?>
                <article class="card">
                    <div class="stat-label"><?php echo htmlspecialchars($stat['label']); ?></div>
                    <div class="stat-value"><?php echo htmlspecialchars((string) $stat['value']); ?></div>
                    <div class="<?php echo $stat['trend'] === 'up' ? 'trend-up' : 'trend-down'; ?>">
                        <?php echo htmlspecialchars($stat['change']); ?> vs last week
                    </div>
                </article>
            <?php endforeach; ?>
        </section>

        <section class="section card">
            <h3 style="margin-top: 0;">Recent Orders</h3>
            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>Order</th>
                            <th>Customer</th>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orders as $order): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($order['id']); ?></td>
                                <td><?php echo htmlspecialchars($order['customer']); ?></td>
                                <td><?php echo htmlspecialchars($order['date']); ?></td>
                                <td><?php echo htmlspecialchars($order['amount']); ?></td>
                                <td>
                                    <?php
                                    $statusClass = 'status-pending';
                                    if ($order['status'] === 'Paid') {
                                        $statusClass = 'status-paid';
                                    } elseif ($order['status'] === 'Cancelled') {
                                        $statusClass = 'status-cancelled';
                                    }
                                    ?>
                                    <span class="status <?php echo $statusClass; ?>"><?php echo htmlspecialchars($order['status']); ?></span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>
</div>
<script src="assets/js/app.js"></script>
</body>
</html>
