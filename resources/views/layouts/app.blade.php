<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Dashboard')</title>

    <!-- Bootstrap CSS and Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            overflow-x: hidden;
            background-color: #f5f6fa;
        }

        .sidebar {
            width: 240px;
            min-height: 100vh;
            background-color: #2f3542;
            color: #ffffff;
            transition: all 0.3s;
        }

        .sidebar .nav-link {
            color: #dcdde1;
            padding: 12px 20px;
            font-size: 15px;
            border-radius: 8px;
            margin: 4px 8px;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background-color: #57606f;
            color: #ffffff;
        }

        .sidebar .nav-link i {
            margin-right: 10px;
        }

        .main-content {
            flex-grow: 1;
            padding: 24px;
        }

        @media (max-width: 768px) {
            .sidebar {
                position: absolute;
                z-index: 1050;
                left: -240px;
            }

            .sidebar.show {
                left: 0;
            }
        }
    </style>
</head>

<body>
    <div class="d-flex">
        <!-- Sidebar (only shown if authenticated) -->
        @auth
            <div class="sidebar p-3" id="sidebar">
                <h5 class="text-white mb-4">Admin Panel</h5>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a href="/home" class="nav-link {{ request()->is('home') ? 'active' : '' }}">
                            <i class="bi bi-house-door"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/applicant-management"
                            class="nav-link {{ request()->is('applicant-management') ? 'active' : '' }}">
                            <i class="bi bi-person-lines-fill"></i> Applicant Management
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('user.index') }}"
                            class="nav-link {{ request()->is('user-management') ? 'active' : '' }}">
                            <i class="bi bi-people-fill"></i> User Management
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('job.index') }}"
                            class="nav-link {{ request()->is('job-opening-management*') ? 'active' : '' }}">
                            <i class="bi bi-briefcase"></i> Job Opening Management
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('activity.index') }}"
                            class="nav-link {{ request()->is('activity-logs') ? 'active' : '' }}">
                            <i class="bi bi-clock-history"></i> Activity Logs
                        </a>
                    </li>

                    <li class="nav-item mt-4">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-danger w-100">
                                <i class="bi bi-box-arrow-right"></i> Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        @endauth

        <!-- Main content -->
        <div class="main-content">
            @yield('content')
        </div>
    </div>

    <!-- Optional: Sidebar Toggle Script -->
    <script>
        // Only needed if you plan to toggle sidebar on small devices
        document.getElementById('toggleSidebar')?.addEventListener('click', () => {
            document.getElementById('sidebar').classList.toggle('show');
        });
    </script>

</body>

</html>