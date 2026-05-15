<!doctype html>
<html lang="bn">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Roman Electronic & Furnitures @yield('title')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.maateen.me/solaiman-lipi/font.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <style>
        :root {
            --theme-1: #1d4ed8;
            --theme-2: #0ea5e9;
            --theme-3: #10b981;
            --theme-4: #f97316;
            --theme-5: #ef4444;
            --theme-6: #a855f7;
            --theme-7: #ec4899;
            --theme-8: #facc15;
            --theme-9: #0f766e;
            --theme-10: #7c3aed;
            --theme-11: #14b8a6;
            --theme-12: #f43f5e;
            --theme: var(--theme-1);
            --theme-text: #ffffff;
            --bg: #f8fafc;
            --theme-bg: var(--theme-1);
            --surface: rgba(255, 255, 255, 0.95);
            --surface-soft: rgba(255, 255, 255, 0.98);
            --text: #111827;
            --text-muted: #475569;
            --border: #cbd5e1;
            --shadow: 0 14px 45px rgba(15, 23, 42, 0.08);

            --bs-primary: var(--theme);
            --bs-primary-hover: #1e40af;
            --bs-success: var(--theme-3);
            --bs-success-hover: #0f766e;
            --bs-info: var(--theme-2);
            --bs-info-hover: #0284c7;
            --bs-warning: var(--theme-4);
            --bs-warning-hover: #c2410c;
            --bs-danger: var(--theme-5);
            --bs-danger-hover: #b91c1c;
        }

        body {
            font-family: 'solaimanlipi', sans-serif;
            background-color: var(--bg);
            color: var(--text);
        }

        .navbar,
        footer,
        .scrolling-notices,
        main.container {
            background: var(--surface);
            color: var(--text);
        }

        .navbar {
            border-bottom: 1px solid var(--border);
        }

        .nav-link {
            color: var(--text-muted) !important;
            transition: color 0.2s ease;
        }

        .nav-link.active,
        .nav-link:hover {
            color: var(--theme) !important;
        }

        .btn-primary,
        .bg-primary,
        .text-primary,
        .border-primary {
            color: #fff !important;
            background-color: var(--theme) !important;
            border-color: var(--theme) !important;
        }

        .btn-outline-secondary:hover {
            background: var(--surface-soft);
            border-color: var(--theme);
            color: var(--theme);
        }

        .btn {
            border-radius: 0.75rem;
            transition: all 0.2s ease;
        }

        .btn-outline-secondary {
            color: var(--text);
            border-color: var(--border);
        }

        .btn-outline-secondary:hover {
            background: var(--surface-soft);
            border-color: var(--theme);
            color: var(--theme);
        }

        .scrolling-notices {
            background: linear-gradient(110deg, var(--theme), var(--theme-4));
            overflow: hidden;
            white-space: nowrap;
            padding: 0.65rem 0;
            box-shadow: 0 12px 28px rgba(15, 23, 42, 0.08);
        }

        .scrolling-notices h4 {
            display: inline-block;
            margin-right: 3rem;
            font-weight: 600;
            animation: scrollText 18s linear infinite;
            color: #fff;
        }

        .scrolling-notices:hover h4 {
            animation-play-state: paused;
        }

        @keyframes scrollText {
            0% { transform: translateX(100%); }
            100% { transform: translateX(-100%); }
        }

        footer {
            background-color: var(--surface);
            color: var(--text-muted);
            box-shadow: 0 -2px 8px rgba(15, 23, 42, 0.05);
        }

        .surface-card {
            background: var(--surface);
            border: 1px solid var(--border);
            box-shadow: var(--shadow);
            border-radius: 1rem;
        }

        .text-theme-1 { color: var(--theme-1) !important; }
        .text-theme-2 { color: var(--theme-2) !important; }
        .text-theme-3 { color: var(--theme-3) !important; }
        .bg-theme-4 { background-color: var(--theme-4) !important; }
        .bg-theme-5 { background-color: var(--theme-5) !important; }

        .theme-selector.active,
        .theme-selector:focus,
        .theme-selector:hover {
            background-color: rgba(14, 165, 233, 0.1);
            font-weight: 600;
        }

        .theme-swatch {
            display: inline-block;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container-fluid">

       
        <!-- Logo -->
        <a class="navbar-brand fw-bold text-primary" href="{{ route('dashboard') }}">
            Roman Emi
        </a>

        <!-- Mobile Toggle -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#mainNavbar" aria-controls="mainNavbar"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu -->
        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}"
                       class="nav-link {{ request()->routeIs('dashboard') ? 'active fw-semibold text-primary' : '' }}">
                        Dashboard
                    </a>
                </li>

                @can('customer-list')
                <li class="nav-item">
                    <a href="{{ route('customers.index') }}"
                       class="nav-link {{ request()->routeIs('customers.*') ? 'active fw-semibold text-primary' : '' }}">
                        Customers
                    </a>
                </li>
                @endcan

                @can('location-list')
                <li class="nav-item">
                    <a href="{{ route('locations.index') }}"
                       class="nav-link {{ request()->routeIs('locations.*') ? 'active fw-semibold text-primary' : '' }}">
                        Locations
                    </a>
                </li>
                @endcan

                @can('product-list')
                <li class="nav-item">
                    <a href="{{ route('products.index') }}"
                       class="nav-link {{ request()->routeIs('products.*') ? 'active fw-semibold text-primary' : '' }}">
                        Products
                    </a>
                </li>
                @endcan

                @can('product-model-list')
                <li class="nav-item">
                    <a href="{{ route('products.model') }}"
                       class="nav-link {{ request()->routeIs('products.model') ? 'active fw-semibold text-primary' : '' }}">
                        Product Models
                    </a>
                </li>
                @endcan

                @can('user-list')
                <li class="nav-item">
                    <a href="{{ route('users.index') }}"
                       class="nav-link {{ request()->routeIs('users.*') ? 'active fw-semibold text-primary' : '' }}">
                        Users
                    </a>
                </li>
                @endcan

                @can('role-list')
                <li class="nav-item">
                    <a href="{{ route('roles.index') }}"
                       class="nav-link {{ request()->routeIs('roles.*') ? 'active fw-semibold text-primary' : '' }}">
                        User Roles
                    </a>
                </li>
                @endcan

                <li class="nav-item dropdown ms-lg-3">
                    <button class="btn btn-outline-secondary btn-sm dropdown-toggle" id="themeMenu"
                            data-bs-toggle="dropdown" aria-expanded="false">
                        Theme
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end py-2" aria-labelledby="themeMenu">
                        @for ($i = 1; $i <= 12; $i++)
                            <li>
                                <button type="button" class="dropdown-item theme-selector d-flex align-items-center gap-2"
                                        data-theme="theme-{{ $i }}">
                                    <span class="theme-swatch rounded-circle border"
                                          style="width: 18px; height: 18px; background: var(--theme-{{ $i }});"></span>
                                    Theme {{ $i }}
                                </button>
                            </li>
                        @endfor
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>



    <!-- Scrolling Notices -->
    <div class="scrolling-notices">
        <div class="container">
            @foreach ($notices as $notice)

                <h4>{{ $notice->name }}</h4>
            @endforeach
        </div>
    </div>

    <!-- Main Content -->
    <main class="container mt-4">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="text-center py-3 mt-5">
        <small>© {{ date('Y') }} রোমান ইলেকট্রনিক্স ও ফার্নিচার</small>
    </footer>

    <!-- Scripts -->
    <script>
        (function() {
            const storedPalette = localStorage.getItem('site-theme-palette');
            const palette = storedPalette || 'theme-1';

            const getContrastColor = hex => {
                const normalized = hex.trim().replace('#', '');
                const r = parseInt(normalized.substring(0, 2), 16);
                const g = parseInt(normalized.substring(2, 4), 16);
                const b = parseInt(normalized.substring(4, 6), 16);
                const luminance = (0.299 * r + 0.587 * g + 0.114 * b) / 255;
                return luminance > 0.6 ? '#111827' : '#ffffff';
            };

            const applyPalette = selectedPalette => {
                const value = `var(--${selectedPalette})`;
                const paletteColor = getComputedStyle(document.documentElement).getPropertyValue(`--${selectedPalette}`).trim() || '#2563eb';
                const themeTextColor = getContrastColor(paletteColor);
                document.documentElement.style.setProperty('--theme', value);
                document.documentElement.style.setProperty('--bg', value);
                document.documentElement.style.setProperty('--theme-bg', value);
                document.documentElement.style.setProperty('--theme-text', themeTextColor);
                document.querySelectorAll('.theme-selector').forEach(el => {
                    el.classList.toggle('active', el.dataset.theme === selectedPalette);
                });
                localStorage.setItem('site-theme-palette', selectedPalette);
            };

            const initThemeControls = () => {
                document.querySelectorAll('.theme-selector').forEach(button => {
                    button.addEventListener('click', function() {
                        const selected = this.dataset.theme;
                        if (selected) {
                            applyPalette(selected);
                        }
                    });
                });
            };

            applyPalette(palette);
            if (document.readyState !== 'loading') {
                initThemeControls();
            } else {
                document.addEventListener('DOMContentLoaded', initThemeControls);
            }
        })();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
    @yield('scripts')

</body>
</html>
