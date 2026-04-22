<?php
return [
    'app_name' => 'Pulse Admin',
    'users' => [
        [
            'username' => 'admin',
            'password' => password_hash('admin123', PASSWORD_DEFAULT),
            'name' => 'Administrator',
            'role' => 'Super Admin',
        ],
    ],
    'stats' => [
        [
            'label' => 'Total Users',
            'value' => 1280,
            'change' => '+12.4%',
            'trend' => 'up',
        ],
        [
            'label' => 'Revenue',
            'value' => '$42,850',
            'change' => '+7.1%',
            'trend' => 'up',
        ],
        [
            'label' => 'Support Tickets',
            'value' => 74,
            'change' => '-3.2%',
            'trend' => 'down',
        ],
        [
            'label' => 'Server Uptime',
            'value' => '99.96%',
            'change' => '+0.02%',
            'trend' => 'up',
        ],
    ],
    'recent_orders' => [
        ['id' => '#ORD-1290', 'customer' => 'Noah Carter', 'date' => '2026-04-20', 'amount' => '$320.00', 'status' => 'Paid'],
        ['id' => '#ORD-1289', 'customer' => 'Emma Stone', 'date' => '2026-04-20', 'amount' => '$89.00', 'status' => 'Pending'],
        ['id' => '#ORD-1288', 'customer' => 'Liam Woods', 'date' => '2026-04-19', 'amount' => '$1,120.00', 'status' => 'Paid'],
        ['id' => '#ORD-1287', 'customer' => 'Ava Brooks', 'date' => '2026-04-19', 'amount' => '$230.00', 'status' => 'Cancelled'],
    ],
];
