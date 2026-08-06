<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['title' => 'Dashboard', 'pending' => 0]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['title' => 'Dashboard', 'pending' => 0]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <title><?php echo e($title ?? 'Dashboard'); ?> — Timbalan LZNK</title>

    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(asset('images/lznk.png')); ?>">
    <link rel="shortcut icon" href="<?php echo e(asset('images/lznk.png')); ?>">

    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;1,9..40,400&family=DM+Serif+Display:ital@0;1&display=swap');

        *, *::before, *::after { box-sizing: border-box; }

        body {
            font-family: 'DM Sans', sans-serif;
            background: #eef0ec;
            margin: 0;
        }

        /* ══════════════════════════
           SIDEBAR
        ══════════════════════════ */
        .dpo-sidebar {
            width: 230px;
            min-width: 230px;
            background: #0d2e1c;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            position: fixed;
            top: 0; left: 0;
            z-index: 40;
            border-right: 1px solid #0a2016;
        }

        /* Logo */
        .sidebar-logo {
            height: 56px;
            padding: 0 1.25rem;
            display: flex;
            align-items: center;
            gap: 11px;
            border-bottom: 1px solid rgba(255,255,255,0.07);
            background: #091a10;
            flex-shrink: 0;
        }
        .sidebar-logo img {
            height: 30px;
            object-fit: contain;
            filter: brightness(1.05);
        }
        .sidebar-logo-divider {
            width: 1px; height: 22px;
            background: rgba(255,255,255,0.13);
        }
        .sidebar-logo-text {
            line-height: 1.35;
        }
        .sidebar-logo-name {
            font-size: 12.5px;
            font-weight: 600;
            color: rgba(255,255,255,0.9);
            letter-spacing: 0.02em;
        }
        .sidebar-logo-role {
            font-size: 10px;
            font-weight: 500;
            color: rgba(255,255,255,0.35);
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        /* Nav */
        .sidebar-nav {
            flex: 1;
            padding: 1.1rem 0.75rem;
            display: flex;
            flex-direction: column;
            gap: 2px;
            overflow-y: auto;
        }

        .nav-section-title {
            font-size: 10px;
            font-weight: 600;
            color: rgba(255,255,255,0.25);
            letter-spacing: 0.1em;
            text-transform: uppercase;
            padding: 0 0.75rem;
            margin: 0.65rem 0 0.35rem;
        }
        .nav-section-title:first-child { margin-top: 0; }

        .nav-link {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 8px 12px;
            border-radius: 3px;
            font-size: 13.5px;
            font-weight: 400;
            color: rgba(255,255,255,0.55);
            text-decoration: none;
            transition: background 0.13s, color 0.13s;
            position: relative;
        }
        .nav-link-left {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .nav-link svg {
            width: 15px; height: 15px;
            flex-shrink: 0;
            opacity: 0.6;
            transition: opacity 0.13s;
        }
        .nav-link:hover {
            background: rgba(255,255,255,0.07);
            color: rgba(255,255,255,0.88);
        }
        .nav-link:hover svg { opacity: 1; }

        .nav-link.active {
            background: rgba(111,207,143,0.14);
            color: #8fdba8;
            font-weight: 500;
        }
        .nav-link.active svg { opacity: 1; color: #8fdba8; }
        .nav-link.active::before {
            content: '';
            position: absolute;
            left: 0; top: 6px; bottom: 6px;
            width: 2.5px;
            background: #6fcf8f;
            border-radius: 0 2px 2px 0;
        }

        /* Pending badge */
        .nav-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: #dc2626;
            color: #fff;
            font-size: 10.5px;
            font-weight: 600;
            min-width: 18px;
            height: 18px;
            border-radius: 9px;
            padding: 0 5px;
            letter-spacing: 0;
        }

        /* Sidebar footer */
        .sidebar-footer {
            padding: 0.85rem 0.75rem;
            border-top: 1px solid rgba(255,255,255,0.07);
            flex-shrink: 0;
        }
        .sidebar-user {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 8px 10px;
            border-radius: 3px;
            cursor: pointer;
            text-decoration: none;
            transition: background 0.13s;
        }
        .sidebar-user:hover { background: rgba(255,255,255,0.07); }
        .sidebar-avatar {
            width: 30px; height: 30px;
            border-radius: 50%;
            object-fit: cover;
            border: 1.5px solid rgba(255,255,255,0.18);
            flex-shrink: 0;
        }
        .sidebar-user-info { flex: 1; min-width: 0; }
        .sidebar-user-name {
            font-size: 13px; font-weight: 500;
            color: rgba(255,255,255,0.82);
            white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
        }
        .sidebar-user-role {
            font-size: 10.5px;
            color: rgba(255,255,255,0.3);
            margin-top: 1px;
            letter-spacing: 0.03em;
        }

        /* ══════════════════════════
           TOPBAR
        ══════════════════════════ */
        .dpo-topbar {
            position: fixed;
            top: 0; left: 230px; right: 0;
            height: 56px;
            background: #ffffff;
            border-bottom: 1px solid #d4d9d5;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 1.75rem;
            z-index: 30;
            box-shadow: 0 1px 4px rgba(0,0,0,0.05);
        }

        .topbar-left { display: flex; align-items: center; gap: 10px; }
        .topbar-dot { width: 4px; height: 4px; border-radius: 50%; background: #b8c4bb; }
        .topbar-system-label { font-size: 12px; color: #8a9490; letter-spacing: 0.02em; }
        .topbar-page-title { font-size: 13.5px; font-weight: 500; color: #3d4a40; }

        /* DPO indicator chip */
        .topbar-dpo-chip {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #e8f4ec;
            border: 1px solid #b8ddc4;
            border-radius: 2px;
            padding: 3px 10px;
            font-size: 11px;
            font-weight: 600;
            color: #1a5c2a;
            letter-spacing: 0.04em;
            text-transform: uppercase;
        }
        .topbar-dpo-chip::before {
            content: '';
            width: 5px; height: 5px;
            border-radius: 50%;
            background: #16a34a;
        }

        .topbar-right { display: flex; align-items: center; gap: 1rem; }

        /* User dropdown */
        .topbar-user-btn {
            display: flex; align-items: center; gap: 9px;
            padding: 5px 12px 5px 6px;
            border-radius: 3px;
            border: 1px solid #d4d9d5;
            background: transparent;
            cursor: pointer;
            transition: background 0.13s, border-color 0.13s;
            position: relative;
        }
        .topbar-user-btn:hover { background: #f5f6f4; border-color: #aab5ac; }
        .topbar-user-avatar {
            width: 28px; height: 28px;
            border-radius: 50%;
            object-fit: cover;
            border: 1.5px solid #d4d9d5;
        }
        .topbar-user-info { text-align: left; }
        .topbar-user-name { font-size: 13px; font-weight: 500; color: #1a1f1b; display: block; }
        .topbar-user-role { font-size: 10.5px; color: #8a9490; display: block; }
        .topbar-chevron {
            width: 12px; height: 12px; color: #8a9490;
            transition: transform 0.15s;
        }
        .topbar-user-btn.open .topbar-chevron { transform: rotate(180deg); }

        /* Dropdown */
        .user-dropdown {
            display: none;
            position: absolute;
            top: calc(100% + 8px); right: 0;
            background: #fff;
            border: 1px solid #d4d9d5;
            border-radius: 3px;
            min-width: 180px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.1);
            z-index: 100; overflow: hidden;
        }
        .user-dropdown.open { display: block; }

        .dropdown-user-info {
            padding: 10px 14px;
            border-bottom: 1px solid #eef0ec;
        }
        .dropdown-user-info-name { font-size: 13px; font-weight: 600; color: #1a1f1b; }
        .dropdown-user-info-sub  { font-size: 11px; color: #8a9490; margin-top: 2px; }

        .dropdown-item {
            display: flex; align-items: center; gap: 9px;
            padding: 9px 14px; font-size: 13px; color: #3d4a40;
            text-decoration: none; transition: background 0.1s;
            width: 100%; background: none; border: none;
            cursor: pointer; font-family: 'DM Sans', sans-serif; text-align: left;
        }
        .dropdown-item:hover { background: #f5f6f4; }
        .dropdown-item svg { width: 14px; height: 14px; color: #8a9490; flex-shrink: 0; }
        .dropdown-item.danger { color: #991b1b; }
        .dropdown-item.danger svg { color: #dc2626; }
        .dropdown-item.danger:hover { background: #fff5f5; }
        .dropdown-divider { height: 1px; background: #eef0ec; margin: 2px 0; }

        /* ══════════════════════════
           LAYOUT
        ══════════════════════════ */
        .dpo-layout { display: flex; min-height: 100vh; }
        .dpo-main { margin-left: 230px; padding-top: 56px; flex: 1; min-width: 0; }
        .dpo-content { min-height: calc(100vh - 56px); }
    </style>
</head>

<body>

<div class="dpo-layout">

    <!-- ══════════ SIDEBAR ══════════ -->
    <aside class="dpo-sidebar">

        <!-- Logo -->
        <div class="sidebar-logo">
            <img src="<?php echo e(asset('images/lznk-logo.png')); ?>" alt="LZNK">
            <div class="sidebar-logo-divider"></div>
            <div class="sidebar-logo-text">
                <div class="sidebar-logo-name">LZNK</div>
                <div class="sidebar-logo-role">Timbalan Panel</div>
            </div>
        </div>

        <!-- Nav -->
        <nav class="sidebar-nav">

            <div class="nav-section-title">Main</div>

            <a href="<?php echo e(route('dashboard')); ?>"
               class="nav-link <?php echo e(request()->routeIs('dashboard') ? 'active' : ''); ?>">
                <div class="nav-link-left">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/>
                        <rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/>
                    </svg>
                    Dashboard
                </div>
            </a>

            <div class="nav-section-title">Permohonan</div>

            <a href="<?php echo e(route('timbalan.permohonan')); ?>"
               class="nav-link <?php echo e(request()->routeIs('timbalan.permohonan') ? 'active' : ''); ?>">
                <div class="nav-link-left">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/>
                        <polyline points="14 2 14 8 20 8"/>
                        <line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/>
                    </svg>
                    Semua Permohonan
                </div>
                <?php if($pending > 0): ?>
                <span class="nav-badge"><?php echo e($pending); ?></span>
                <?php endif; ?>
            </a>

            <a href="<?php echo e(route('timbalan.menunggu.kelulusan.timbalan')); ?>"
               class="nav-link <?php echo e(request()->routeIs('timbalan.menunggu.kelulusan.timbalan') ? 'active' : ''); ?>">
                <div class="nav-link-left">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>
                    </svg>
                    Menunggu Kelulusan Timbalan
                </div>
            </a>

            <a href="<?php echo e(route('timbalan.diluluskan')); ?>"
               class="nav-link <?php echo e(request()->routeIs('timbalan.diluluskan') ? 'active' : ''); ?>">
                <div class="nav-link-left">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/>
                    </svg>
                    Diluluskan
                </div>
            </a>

            <a href="<?php echo e(route('timbalan.ditolak')); ?>"
               class="nav-link <?php echo e(request()->routeIs('timbalan.ditolak') ? 'active' : ''); ?>">
                <div class="nav-link-left">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"/>
                        <line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/>
                    </svg>
                    Ditolak
                </div>
            </a>

        </nav>

        <!-- Sidebar Footer -->
        <div class="sidebar-footer">
            <div class="sidebar-user">
                <img src="https://i.pravatar.cc/60?u=<?php echo e(auth()->id()); ?>" alt="Avatar" class="sidebar-avatar">
                <div class="sidebar-user-info">
                    <div class="sidebar-user-name"><?php echo e(auth()->user()->name); ?></div>
                    <div class="sidebar-user-role">Timbalan</div>
                </div>
            </div>
        </div>

    </aside>

    <!-- ══════════ MAIN ══════════ -->
    <div class="dpo-main">

        <!-- Topbar -->
        <header class="dpo-topbar">

            <div class="topbar-left">
                <span class="topbar-dpo-chip">Timbalan Panel</span>
                <div class="topbar-dot"></div>
                <span class="topbar-page-title">Sistem Pengurusan Permohonan Data LZNK</span>
            </div>

            <div class="topbar-right">

                <div style="position: relative;">
                    <button class="topbar-user-btn" id="userMenuBtn" onclick="toggleUserMenu()">
                        <img src="https://i.pravatar.cc/60?u=<?php echo e(auth()->id()); ?>" alt="Avatar" class="topbar-user-avatar">
                        <div class="topbar-user-info">
                            <span class="topbar-user-name"><?php echo e(auth()->user()->name); ?></span>
                            <span class="topbar-user-role">Timbalan</span>
                        </div>
                        <svg class="topbar-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="6 9 12 15 18 9"/>
                        </svg>
                    </button>

                    <div class="user-dropdown" id="userDropdown">

                        <div class="dropdown-user-info">
                            <div class="dropdown-user-info-name"><?php echo e(auth()->user()->name); ?></div>
                            <div class="dropdown-user-info-sub">Timbalan</div>
                        </div>

                        <div class="dropdown-divider"></div>

                        <form method="POST" action="<?php echo e(route('logout')); ?>">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="dropdown-item danger">
                                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                                Log Keluar
                            </button>
                        </form>

                    </div>
                </div>

            </div>
        </header>

        <!-- Page Content -->
        <div class="dpo-content">
            <?php echo e($slot); ?>

        </div>

    </div>

</div>

<script>
function toggleUserMenu() {
    const btn = document.getElementById('userMenuBtn');
    const dropdown = document.getElementById('userDropdown');
    btn.classList.toggle('open');
    dropdown.classList.toggle('open');
}

document.addEventListener('click', function(e) {
    const btn = document.getElementById('userMenuBtn');
    const dropdown = document.getElementById('userDropdown');
    if (btn && !btn.contains(e.target) && dropdown && !dropdown.contains(e.target)) {
        btn.classList.remove('open');
        dropdown.classList.remove('open');
    }
});

function loadNotification() {
    fetch('/api/permohonan/pending')
    .then(res => res.json())
    .then(data => {
        const el = document.getElementById('notif-count');
        if (el) el.innerText = data.total;

        let list = '';
        data.data.forEach(item => {
            list += `<div class="px-4 py-2 hover:bg-gray-100 text-sm">${item.nama} (${item.jenis})</div>`;
        });
        const listEl = document.getElementById('notif-list');
        if (listEl) listEl.innerHTML = list;
    });
}

function refreshDashboard() {
    fetch('/api/permohonan/pending')
    .then(res => res.json())
    .then(data => {
        const el = document.getElementById('card-pending');
        if (el) el.innerText = data.total;
    });
}

setInterval(loadNotification, 5000);
setInterval(refreshDashboard, 5000);
loadNotification();
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
</html><?php /**PATH C:\laragon\www\MohonData-LZNK\resources\views/components/layouts/app-timbalan.blade.php ENDPATH**/ ?>