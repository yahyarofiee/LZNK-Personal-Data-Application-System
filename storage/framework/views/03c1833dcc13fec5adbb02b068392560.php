<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    
    <title><?php echo e($title ?? 'Dashboard'); ?></title>

    <link rel="icon" type="image/jpg" sizes="32x32" href="<?php echo e(asset('images/lznk.png')); ?>">
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
        .lznk-sidebar {
            width: 230px;
            min-width: 230px;
            background: #0A4A28;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            position: fixed;
            top: 0; left: 0;
            z-index: 40;
            border-right: 1px solid #d4d9d5;
        }

        /* Logo area */
        .sidebar-logo {
            padding: 0 1.25rem;
            height: 56px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 11px;
            border-bottom: 1px solid #d4d9d5;
            background: #ffffff;
            flex-shrink: 0;
        }
        .sidebar-logo img {
            height: 32px;
            object-fit: contain;
            filter: brightness(1.1);
        }
        .sidebar-logo-divider {
            display: none;
        }
        .sidebar-logo-text {
            font-size: 11px;
            font-weight: 600;
            color: rgba(0, 0, 0, 0.6);
            letter-spacing: 0.06em;
            text-transform: uppercase;
            line-height: 1.4;
        }

        /* Nav */
        .sidebar-nav {
            flex: 1;
            padding: 1.25rem 0.75rem;
            display: flex;
            flex-direction: column;
            gap: 2px;
            overflow-y: auto;
        }

        .nav-section-title {
            font-size: 10px;
            font-weight: 600;
            color: rgba(255,255,255,0.3);
            letter-spacing: 0.1em;
            text-transform: uppercase;
            padding: 0 0.75rem;
            margin: 0.75rem 0 0.4rem;
        }
        .nav-section-title:first-child { margin-top: 0; }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 8px 12px;
            border-radius: 3px;
            font-size: 13.5px;
            font-weight: 400;
            color: rgba(255,255,255,0.6);
            text-decoration: none;
            transition: background 0.13s, color 0.13s;
            position: relative;
        }
        .nav-link svg {
            width: 16px; height: 16px;
            flex-shrink: 0;
            opacity: 0.7;
            transition: opacity 0.13s;
        }
        .nav-link:hover {
            background: rgba(255,255,255,0.07);
            color: rgba(255,255,255,0.9);
        }
        .nav-link:hover svg { opacity: 1; }

        .nav-link.active {
            background: rgba(111,207,143,0.15);
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

        /* Sidebar footer */
        .sidebar-footer {
            padding: 1rem 0.75rem;
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
            transition: background 0.13s;
            text-decoration: none;
        }
        .sidebar-user:hover { background: rgba(255,255,255,0.07); }
        .sidebar-avatar {
            width: 30px; height: 30px;
            border-radius: 50%;
            object-fit: cover;
            border: 1.5px solid rgba(255,255,255,0.2);
            flex-shrink: 0;
        }
        .sidebar-user-info { flex: 1; min-width: 0; }
        .sidebar-user-name {
            font-size: 13px;
            font-weight: 500;
            color: rgba(255,255,255,0.85);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .sidebar-user-role {
            font-size: 11px;
            color: rgba(255,255,255,0.35);
            margin-top: 1px;
        }

        /* ══════════════════════════
           TOPBAR
        ══════════════════════════ */
        .lznk-topbar {
            position: fixed;
            top: 0;
            left: 230px;
            right: 0;
            height: 56px;
            background: #0A4A28;
            border-bottom: 1px solid #d4d9d5;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 1.75rem;
            z-index: 30;
            box-shadow: 0 1px 4px rgba(255, 255, 255, 0.05);
        }

        .topbar-left {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .topbar-page-title {
            font-size: 13.5px;
            font-weight: 500;
            color: #ffffff;
        }
        .topbar-dot {
            width: 4px; height: 4px;
            border-radius: 50%;
            background: #ffffff;
        }
        .topbar-system-label {
            font-size: 12px;
            color: #8a9490;
            letter-spacing: 0.02em;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        /* Notification bell */
        .topbar-icon-btn {
            width: 34px; height: 34px;
            display: flex; align-items: center; justify-content: center;
            border-radius: 3px;
            border: 1px solid #d4d9d5;
            background: transparent;
            color: #5a6860;
            cursor: pointer;
            transition: background 0.13s, border-color 0.13s;
            text-decoration: none;
        }
        .topbar-icon-btn:hover { background: #f5f6f4; border-color: #aab5ac; }
        .topbar-icon-btn svg { width: 16px; height: 16px; }

        /* User dropdown */
        .topbar-user-btn {
            display: flex;
            align-items: center;
            gap: 9px;
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
        .topbar-user-name {
            font-size: 13px;
            font-weight: 500;
            color: #ffffff;
        }
        .topbar-user-chevron {
            width: 12px; height: 12px;
            color: #8a9490;
            transition: transform 0.15s;
        }
        .topbar-user-btn.open .topbar-user-chevron { transform: rotate(180deg); }

        /* Dropdown menu */
        .user-dropdown {
            display: none;
            position: absolute;
            top: calc(100% + 8px);
            right: 0;
            background: #fff;
            border: 1px solid #d4d9d5;
            border-radius: 3px;
            min-width: 180px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.1);
            z-index: 100;
            overflow: hidden;
        }
        .user-dropdown.open { display: block; }

        .dropdown-user-info {
            padding: 10px 14px;
            border-bottom: 1px solid #eef0ec;
        }
        .dropdown-user-info-name {
            font-size: 13px;
            font-weight: 600;
            color: #1a1f1b;
        }
        .dropdown-user-info-email {
            font-size: 11.5px;
            color: #8a9490;
            margin-top: 2px;
        }

        .dropdown-item {
            display: flex;
            align-items: center;
            gap: 9px;
            padding: 9px 14px;
            font-size: 13px;
            color: #3d4a40;
            text-decoration: none;
            transition: background 0.1s;
            width: 100%;
            background: none;
            border: none;
            cursor: pointer;
            font-family: 'DM Sans', sans-serif;
            text-align: left;
        }
        .dropdown-item:hover { background: #f5f6f4; }
        .dropdown-item svg { width: 14px; height: 14px; color: #8a9490; flex-shrink: 0; }
        .dropdown-item.danger { color: #991b1b; }
        .dropdown-item.danger svg { color: #dc2626; }
        .dropdown-item.danger:hover { background: #fff5f5; }
        .dropdown-divider { height: 1px; background: #eef0ec; margin: 2px 0; }

        /* ══════════════════════════
           MAIN CONTENT
        ══════════════════════════ */
        .lznk-layout {
            display: flex;
            min-height: 100vh;
        }
        .lznk-main {
            margin-left: 230px;
            padding-top: 56px;
            flex: 1;
            min-width: 0;
        }
        .lznk-content {
            min-height: calc(100vh - 56px);
        }

                /* ===========================================
        SweetAlert Theme
        =========================================== */

        .swal-confirm{
            background:#15803d !important;
            color:#fff !important;
            padding:10px 22px;
            border-radius:6px;
            font-weight:600;
            border:none;
            margin-left:8px;
        }

        .swal-confirm:hover{
            background:#166534 !important;
        }

        .swal-cancel{
            background:#6b7280 !important;
            color:#fff !important;
            padding:10px 22px;
            border-radius:6px;
            border:none;
            font-weight:600;
        }

        .swal-cancel:hover{
            background:#4b5563 !important;
        }

        .swal2-popup{
            font-family:'DM Sans',sans-serif;
        }

        .swal2-title{
            font-weight:700;
        }

        .swal2-html-container{
            font-size:15px;
        }
    </style>
</head>

<body>

<div class="lznk-layout">

    <!-- ══════════ SIDEBAR ══════════ -->
    <aside class="lznk-sidebar">

        <!-- Logo -->
        <div class="sidebar-logo">
            <img src="<?php echo e(asset('images/lznk-logo.png')); ?>" alt="LZNK">
            <div class="sidebar-logo-divider"></div>
        </div>

        <!-- Nav -->
        <nav class="sidebar-nav">

            <div class="nav-section-title">Menu Utama</div>

            <a href="<?php echo e(route('dashboard')); ?>"
               class="nav-link <?php echo e(request()->routeIs('dashboard*') ? 'active' : ''); ?>">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/>
                    <rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/>
                </svg>
                Dashboard
            </a>

            <div class="nav-section-title">Permohonan</div>

            <a href="<?php echo e(route('permohonan')); ?>"
               class="nav-link <?php echo e(request()->routeIs('permohonan') ? 'active' : ''); ?>">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/>
                    <polyline points="14 2 14 8 20 8"/>
                    <line x1="12" y1="18" x2="12" y2="12"/><line x1="9" y1="15" x2="15" y2="15"/>
                </svg>
                Mohon Data
            </a>

            <a href="<?php echo e(route('permohonan.index')); ?>"
               class="nav-link <?php echo e(request()->routeIs('permohonan.index') || request()->routeIs('permohonan.edit') ? 'active' : ''); ?>">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/>
                    <polyline points="14 2 14 8 20 8"/>
                    <line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/>
                </svg>
                Rekod Permohonan
            </a>

        </nav>

        <!-- Sidebar Footer — User -->
        <div class="sidebar-footer">
            <a href="<?php echo e(route('profile')); ?>" class="sidebar-user">
                <img src="https://i.pravatar.cc/60?u=<?php echo e(auth()->id()); ?>" alt="Avatar" class="sidebar-avatar">
                <div class="sidebar-user-info">
                    <div class="sidebar-user-name"><?php echo e(auth()->user()->name); ?></div>
                    <div class="sidebar-user-role">Pemohon</div>
                </div>
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="rgba(255,255,255,0.3)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
            </a>
        </div>

    </aside>

    <!-- ══════════ MAIN ══════════ -->
    <div class="lznk-main">

        <!-- Topbar -->
        <header class="lznk-topbar">

            <div class="topbar-left">
                <span class="topbar-system-label">Sistem Rasmi</span>
                <div class="topbar-dot"></div>
                <span class="topbar-page-title">Permohonan Data LZNK</span>
            </div>

            <div class="topbar-right">

                <!-- User Dropdown -->
                <div style="position: relative;">
                    <button class="topbar-user-btn" id="userMenuBtn" onclick="toggleUserMenu()">
                        <img src="https://i.pravatar.cc/60?u=<?php echo e(auth()->id()); ?>" alt="Avatar" class="topbar-user-avatar">
                        <span class="topbar-user-name"><?php echo e(auth()->user()->name); ?></span>
                        <svg class="topbar-user-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="6 9 12 15 18 9"/>
                        </svg>
                    </button>

                    <div class="user-dropdown" id="userDropdown">

                        <div class="dropdown-user-info">
                            <div class="dropdown-user-info-name"><?php echo e(auth()->user()->name); ?></div>
                            <div class="dropdown-user-info-email"><?php echo e(auth()->user()->email); ?></div>
                        </div>

                        <a href="<?php echo e(route('profile')); ?>" class="dropdown-item">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                            Profil Saya
                        </a>

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
        <div class="lznk-content">
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

// Close on outside click
document.addEventListener('click', function(e) {
    const btn = document.getElementById('userMenuBtn');
    const dropdown = document.getElementById('userDropdown');
    if (!btn.contains(e.target) && !dropdown.contains(e.target)) {
        btn.classList.remove('open');
        dropdown.classList.remove('open');
    }
});
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

const LZNKAlert = Swal.mixin({

    customClass:{
        popup:'rounded-lg',
        confirmButton:'swal-confirm',
        cancelButton:'swal-cancel'
    },

    buttonsStyling:false,
    reverseButtons:true

});

</script>

</body>
</html>



</body>
</html><?php /**PATH C:\laragon\www\MohonData-LZNK\resources\views/components/layouts/app.blade.php ENDPATH**/ ?>