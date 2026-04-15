<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lab8 Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    @stack('styles')
    <style>
        :root {
            --sidebar-width: 270px;
            --brand-bg: #0f172a;
            --content-bg: #f1f5f9;
        }

        body {
            background: var(--content-bg);
            min-height: 100vh;
        }

        .admin-shell {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: var(--sidebar-width);
            background: linear-gradient(160deg, #0f172a 0%, #1e293b 100%);
            color: #cbd5e1;
        }

        .sidebar .brand {
            color: #fff;
            font-weight: 700;
            text-decoration: none;
            letter-spacing: 0.4px;
        }

        .sidebar .nav-link {
            color: #cbd5e1;
            border-radius: 0.6rem;
            margin-bottom: 0.3rem;
            padding: 0.65rem 0.9rem;
        }

        .sidebar .nav-link.active,
        .sidebar .nav-link:hover {
            background: rgba(148, 163, 184, 0.2);
            color: #fff;
        }

        .content-area {
            flex: 1;
            min-width: 0;
        }

        .topbar {
            background: #fff;
            border-bottom: 1px solid #e2e8f0;
        }

        .page-wrapper {
            padding: 1.5rem;
        }

        .card-stat {
            border: none;
            border-radius: 1rem;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.08);
        }

        @media (max-width: 991.98px) {
            .admin-shell {
                display: block;
            }

            .sidebar {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="admin-shell">
        <aside class="sidebar p-3">
            <a class="brand d-inline-flex align-items-center mb-4" href="{{ route('dashboard.index') }}">
                <i class="bi bi-grid-1x2-fill me-2"></i>
                Inventory Admin
            </a>

            <nav class="nav flex-column">
                <a class="nav-link {{ request()->routeIs('dashboard.*') ? 'active' : '' }}" href="{{ route('dashboard.index') }}">
                    <i class="bi bi-speedometer2 me-2"></i>Dashboard
                </a>
                <a class="nav-link {{ request()->routeIs('products.index') ? 'active' : '' }}" href="{{ route('products.index') }}">
                    <i class="bi bi-box-seam me-2"></i>Products
                </a>
                <a class="nav-link {{ request()->routeIs('products.create') ? 'active' : '' }}" href="{{ route('products.create') }}">
                    <i class="bi bi-plus-circle me-2"></i>Add Product
                </a>
            </nav>
        </aside>

        <div class="content-area">
            <header class="topbar px-4 py-3 d-flex justify-content-between align-items-center">
                <h1 class="h5 mb-0">Lab8 Professional Product Dashboard</h1>
                <span class="text-secondary small">{{ now()->format('d M Y, h:i A') }}</span>
            </header>

            <main class="page-wrapper">
                <x-flash-messages />

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Please fix the following errors:</strong>
                        <ul class="mb-0 mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    @stack('scripts')
</body>
</html>
