<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIAKAD | @yield('title', 'Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-dark: #333446;
            --primary-medium: #7F8CAA;
            --primary-light: #B8CFCE;
            --primary-lightest: #EAEFEF;
        }
        
        body {
            font-family: 'Outfit', sans-serif;
        }
        
        .glass-effect {
            backdrop-filter: blur(20px);
            background: rgba(51, 52, 70, 0.8);
            border: 1px solid rgba(127, 140, 170, 0.2);
        }
        
        .sidebar-item {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .sidebar-item:hover {
            transform: translateX(4px);
            background: rgba(184, 207, 206, 0.1);
        }
        
        .active-item {
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.2), rgba(220, 38, 38, 0.3));
            border-left: 3px solid #ef4444;
        }
        
        .logo-gradient {
            background: linear-gradient(135deg, #B8CFCE, #7F8CAA);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        /* Layout System */
        .layout-container {
            height: 100vh;
            overflow: hidden;
            display: flex;
        }
        
        .sidebar-container {
            width: 288px;
            min-width: 288px;
            max-width: 288px;
            height: 100vh;
            overflow: hidden;
            position: relative;
            z-index: 30;
            transition: all 0.3s ease;
        }
        
        .sidebar-container.collapsed {
            width: 80px;
            min-width: 80px;
            max-width: 80px;
        }
        
        .sidebar-content {
            height: 100vh;
            overflow-y: auto;
            overflow-x: hidden;
            display: flex;
            flex-direction: column;
        }
        
        .main-container {
            flex: 1;
            height: 100vh;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            min-width: 0;
        }
        
        .main-header {
            flex-shrink: 0;
            position: sticky;
            top: 0;
            z-index: 20;
        }
        
        .main-content {
            flex: 1;
            overflow-y: auto;
            overflow-x: hidden;
        }
        
        /* Icon Alignment */
        .icon-container {
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        
        .icon-container svg {
            width: 20px;
            height: 20px;
        }
        
        /* Sidebar Text Animation */
        .sidebar-text {
            opacity: 1;
            transition: opacity 0.3s ease;
        }
        
        .collapsed .sidebar-text {
            opacity: 0;
            pointer-events: none;
        }
        
        /* Custom Scrollbar */
        .sidebar-content::-webkit-scrollbar,
        .main-content::-webkit-scrollbar {
            width: 6px;
        }
        
        .sidebar-content::-webkit-scrollbar-track,
        .main-content::-webkit-scrollbar-track {
            background: rgba(220, 38, 38, 0.1);
            border-radius: 3px;
        }
        
        .sidebar-content::-webkit-scrollbar-thumb,
        .main-content::-webkit-scrollbar-thumb {
            background: rgba(239, 68, 68, 0.5);
            border-radius: 3px;
        }
        
        .sidebar-content::-webkit-scrollbar-thumb:hover,
        .main-content::-webkit-scrollbar-thumb:hover {
            background: rgba(239, 68, 68, 0.7);
        }
        
        /* Responsive Design */
        @media (max-width: 1024px) {
            .sidebar-container {
                width: 256px;
                min-width: 256px;
                max-width: 256px;
            }
            
            .sidebar-container.collapsed {
                width: 70px;
                min-width: 70px;
                max-width: 70px;
            }
        }
        
        @media (max-width: 768px) {
            .sidebar-container {
                position: fixed;
                left: -288px;
                transition: left 0.3s ease-in-out;
                z-index: 50;
            }
            
            .sidebar-container.mobile-open {
                left: 0;
            }
            
            .main-container {
                width: 100%;
            }
            
            .mobile-overlay {
                position: fixed;
                inset: 0;
                background: rgba(127, 29, 29, 0.8);
                z-index: 40;
                opacity: 0;
                visibility: hidden;
                transition: all 0.3s ease-in-out;
            }
            
            .mobile-overlay.active {
                opacity: 1;
                visibility: visible;
            }
        }
        
        /* User Dropdown */
        .user-dropdown {
            position: relative;
        }
        
        .dropdown-menu {
            position: absolute;
            top: 100%;
            right: 0;
            background: var(--primary-dark);
            border: 1px solid var(--primary-medium);
            border-radius: 12px;
            min-width: 200px;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s ease;
            z-index: 1000;
        }
        
        .dropdown-menu.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
        
        /* Prevent text selection on navigation */
        .sidebar-item {
            user-select: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
        }
        
        /* Smooth transitions */
        * {
            scroll-behavior: smooth;
        }
    </style>
</head>
<body style="background: linear-gradient(135deg, #333446 0%, #7F8CAA 50%, #B8CFCE 100%); color: #EAEFEF;">

    <div class="layout-container">
        <!-- Mobile Overlay -->
        <div class="mobile-overlay md:hidden" id="mobileOverlay"></div>

        <!-- Elegant Sidebar -->
        <aside class="sidebar-container glass-effect shadow-2xl border-r border-opacity-20" style="border-color: #dc2626;" id="sidebar">
            <div class="sidebar-content">
                <!-- Header Section -->
                <div class="p-6 lg:p-8 flex-shrink-0">
                    <!-- Mobile Menu Button -->
                    <button class="md:hidden mb-4 p-2 rounded-lg hover:bg-white/10 transition-colors" id="closeSidebar">
                        <div class="icon-container" style="color: #dc2626;">
                            <i data-lucide="x"></i>
                        </div>
                    </button>
                    
                    <!-- Logo -->
                    <div class="text-center mb-8 lg:mb-12">
                        <h1 class="text-2xl lg:text-3xl font-bold logo-gradient mb-2">SIAKAD</h1>
                        <div class="sidebar-text">
                            <p class="text-xs lg:text-sm font-light" style="color: #dc2626;">Portal Mahasiswa</p>
                        </div>
                        <div class="w-12 lg:w-16 h-0.5 mx-auto mt-3" style="background: linear-gradient(to right, #ef4444, #dc2626);"></div>
                    </div>
                    
                    <!-- Collapse Button -->
                    <div class="hidden md:flex justify-center mb-6">
                        <button id="collapseBtn" class="p-2 rounded-lg transition-colors" style="background: rgba(184, 207, 206, 0.1); color: #B8CFCE;" onmouseover="this.style.background='rgba(239, 68, 68, 0.2)'" onmouseout="this.style.background='rgba(239, 68, 68, 0.1)'">
                            <div class="icon-container">
                                <i data-lucide="panel-left-close" id="collapseIcon"></i>
                            </div>
                        </button>
                    </div>
                    
                    <!-- Navigation -->
                    <nav class="space-y-1 lg:space-y-2">
                        <a href="{{ route('mahasiswa.dashboard') }}" class="sidebar-item flex items-center gap-3 lg:gap-4 px-3 lg:px-4 py-2.5 lg:py-3 rounded-xl {{ request()->is('mahasiswa/dashboard') ? 'active-item' : '' }} group" style="color: #fef2f2;">
                            <div class="icon-container group-hover:scale-110 transition-transform" style="color: #B8CFCE;">
                                <i data-lucide="home"></i>
                            </div>
                            <span class="font-medium text-sm lg:text-base sidebar-text">Dashboard</span>
                        </a>
                        
                        <a href="{{ route('krs.mahasiswa.index') }}" class="sidebar-item flex items-center gap-3 lg:gap-4 px-3 lg:px-4 py-2.5 lg:py-3 rounded-xl {{ request()->is('mahasiswa/krs*') ? 'active-item' : '' }} group" style="color: #fef2f2;">
                            <div class="icon-container group-hover:scale-110 transition-transform" style="color: #B8CFCE;">
                                <i data-lucide="file-text"></i>
                            </div>
                            <span class="font-medium text-sm lg:text-base sidebar-text">KRS</span>
                        </a>
                        
                        <a href="{{ route('khs.nilaiMahasiswa') }}" class="sidebar-item flex items-center gap-3 lg:gap-4 px-3 lg:px-4 py-2.5 lg:py-3 rounded-xl {{ request()->is('mahasiswa/khs*') ? 'active-item' : '' }} group" style="color: #fef2f2;">
                            <div class="icon-container group-hover:scale-110 transition-transform" style="color: #B8CFCE;">
                                <i data-lucide="graduation-cap"></i>
                            </div>
                            <span class="font-medium text-sm lg:text-base sidebar-text">KHS</span>
                        </a>
                    </nav>
                </div>
                
                <!-- Spacer -->
                <div class="flex-1"></div>
            </div>
        </aside>

        <!-- Main Content Area -->
        <main class="main-container">
            <!-- Top Header -->
            <header class="main-header glass-effect border-b border-opacity-20 p-4 lg:p-6" style="border-color: #dc2626;">
                <div class="flex items-center justify-between">
                    <!-- Mobile Menu Button -->
                    <button class="md:hidden p-2 rounded-lg hover:bg-white/10 transition-colors mr-4" id="openSidebar">
                        <div class="icon-container" style="color: #dc2626;">
                            <i data-lucide="menu"></i>
                        </div>
                    </button>
                    
                    <div class="flex-1 min-w-0">
                        <h2 class="text-xl lg:text-2xl font-bold truncate" style="color: #fef2f2;">@yield('page-title', 'Dashboard')</h2>
                        <p class="mt-1 text-sm lg:text-base truncate" style="color: #dc2626;">@yield('page-description', 'Portal Mahasiswa - Sistem Informasi Akademik')</p>
                    </div>
                    
                    <!-- User Menu -->
                    <div class="flex items-center gap-4 flex-shrink-0">
                        <div class="user-dropdown">
                            <button class="flex items-center gap-3 p-2 rounded-lg transition-colors" style="background: rgba(184, 207, 206, 0.1); color: #fef2f2;" onmouseover="this.style.background='rgba(239, 68, 68, 0.2)'" onmouseout="this.style.background='rgba(239, 68, 68, 0.1)'" onclick="toggleDropdown()">
                                <div class="w-8 h-8 rounded-full flex items-center justify-center" style="background: linear-gradient(135deg, #ef4444, #dc2626);">
                                    <i data-lucide="user" class="w-4 h-4" style="color: #7f1d1d;"></i>
                                </div>
                                <span class="font-medium text-sm hidden lg:block">Mahasiswa</span>
                                <i data-lucide="chevron-down" class="w-4 h-4"></i>
                            </button>
                            
                            <!-- Dropdown Menu -->
                            <div class="dropdown-menu" id="userDropdown">
                                <div class="p-4 border-b border-opacity-20" style="border-color: #dc2626;">
                                    <p class="font-medium" style="color: #fef2f2;">Mahasiswa</p>
                                    <p class="text-sm" style="color: #dc2626;">mahasiswa@siakad.com</p>
                                </div>
                                <div class="p-2">
                                    <a href="{{ route('profile.mahasiswa.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg transition-colors hover:bg-white/10" style="color: #fef2f2;">
                                        <i data-lucide="user" class="w-4 h-4" style="color: #B8CFCE;"></i>
                                        <span class="text-sm">Profile</span>
                                    </a>
                                    <hr class="my-2 border-opacity-20" style="border-color: #dc2626;">
                                    <form action="{{ route('auth.logout') }}" method="POST" class="w-full">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="flex items-center gap-3 px-3 py-2 rounded-lg transition-colors hover:bg-red-500/10 w-full text-left" style="color: #ff6b6b;">
                                            <i data-lucide="log-out" class="w-4 h-4"></i>
                                            <span class="text-sm">Logout</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            
            <!-- Content -->
            <div class="main-content">
                <div class="p-4 lg:p-8">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>

    <script>
        // Initialize Lucide icons
        lucide.createIcons();
        
        // Sidebar collapse functionality
        const sidebar = document.getElementById('sidebar');
        const collapseBtn = document.getElementById('collapseBtn');
        const collapseIcon = document.getElementById('collapseIcon');
        let isCollapsed = false;
        
        collapseBtn?.addEventListener('click', () => {
            isCollapsed = !isCollapsed;
            sidebar.classList.toggle('collapsed');
            
            if (isCollapsed) {
                collapseIcon.setAttribute('data-lucide', 'panel-left-open');
            } else {
                collapseIcon.setAttribute('data-lucide', 'panel-left-close');
            }
            
            lucide.createIcons();
        });
        
        // Mobile menu functionality
        const openSidebar = document.getElementById('openSidebar');
        const closeSidebar = document.getElementById('closeSidebar');
        const mobileOverlay = document.getElementById('mobileOverlay');
        
        function toggleSidebar(show) {
            if (show) {
                sidebar.classList.add('mobile-open');
                mobileOverlay.classList.add('active');
                document.body.style.overflow = 'hidden';
            } else {
                sidebar.classList.remove('mobile-open');
                mobileOverlay.classList.remove('active');
                document.body.style.overflow = '';
            }
        }
        
        openSidebar?.addEventListener('click', () => toggleSidebar(true));
        closeSidebar?.addEventListener('click', () => toggleSidebar(false));
        mobileOverlay?.addEventListener('click', () => toggleSidebar(false));
        
        // User dropdown functionality
        function toggleDropdown() {
            const dropdown = document.getElementById('userDropdown');
            dropdown.classList.toggle('show');
        }
        
        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const dropdown = document.getElementById('userDropdown');
            const userDropdown = document.querySelector('.user-dropdown');
            
            if (!userDropdown.contains(event.target)) {
                dropdown.classList.remove('show');
            }
        });
        
        // Close sidebar on window resize if mobile
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 768) {
                toggleSidebar(false);
            }
        });
        
        // Add loading animation
        document.addEventListener('DOMContentLoaded', function() {
            document.body.style.opacity = '0';
            setTimeout(() => {
                document.body.style.transition = 'opacity 0.5s ease-in-out';
                document.body.style.opacity = '1';
            }, 100);
        });
        
        // Prevent zoom issues
        document.addEventListener('gesturestart', function (e) {
            e.preventDefault();
        });
    </script>

</body>
</html>
