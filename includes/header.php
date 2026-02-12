<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? $pageTitle . ' | InfoTech Asesoría Tecnológica' : 'InfoTech Asesoría – Servicio de Asesoría Tecnológica Informática'; ?></title>
    <meta name="description" content="<?php echo isset($pageDescription) ? $pageDescription : 'Servicio profesional de asesoría tecnológica e informática. Consultoría IT, desarrollo de software, ciberseguridad, redes y cloud.'; ?>">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'dark-primary': '#0a1628',
                        'dark-alt': '#0f1f3d',
                        'cyan-electric': '#00d4ff',
                        'cyan-bright': '#06f5d6',
                        'blue-royal': '#3b82f6',
                        'text-main': '#f0f4f8',
                        'text-secondary': '#8896ab',
                        'glass': 'rgba(255,255,255,0.05)',
                        'glass-border': 'rgba(255,255,255,0.1)',
                    },
                    fontFamily: {
                        'heading': ['"Space Grotesk"', 'sans-serif'],
                        'body': ['"Inter"', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Inter', sans-serif;
            background-color: #0a1628;
            color: #f0f4f8;
            overflow-x: hidden;
        }
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Space Grotesk', sans-serif;
        }

        /* Gradient text */
        .gradient-text {
            background: linear-gradient(135deg, #00d4ff 0%, #06f5d6 50%, #3b82f6 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        /* Glassmorphism card */
        .glass-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .glass-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 20px 60px rgba(0, 212, 255, 0.15);
            border-color: rgba(0, 212, 255, 0.3);
            background: rgba(255, 255, 255, 0.08);
        }

        /* Glass navbar */
        .glass-nav {
            background: rgba(10, 22, 40, 0.85);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }

        /* CTA button */
        .cta-btn {
            background: linear-gradient(135deg, #00d4ff, #06f5d6);
            color: #0a1628;
            font-weight: 700;
            padding: 14px 36px;
            border-radius: 9999px;
            display: inline-block;
            transition: all 0.3s ease;
            text-decoration: none;
            font-family: 'Space Grotesk', sans-serif;
            letter-spacing: 0.5px;
        }
        .cta-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 40px rgba(0, 212, 255, 0.4);
        }

        .cta-btn-outline {
            border: 2px solid #00d4ff;
            color: #00d4ff;
            font-weight: 600;
            padding: 12px 32px;
            border-radius: 9999px;
            display: inline-block;
            transition: all 0.3s ease;
            text-decoration: none;
            font-family: 'Space Grotesk', sans-serif;
            background: transparent;
        }
        .cta-btn-outline:hover {
            background: rgba(0, 212, 255, 0.1);
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(0, 212, 255, 0.2);
        }

        /* Animated gradient border */
        .glow-border {
            position: relative;
        }
        .glow-border::before {
            content: '';
            position: absolute;
            top: -1px; left: -1px; right: -1px; bottom: -1px;
            background: linear-gradient(135deg, #00d4ff, #06f5d6, #3b82f6, #00d4ff);
            background-size: 300% 300%;
            animation: gradientMove 4s ease infinite;
            border-radius: inherit;
            z-index: -1;
            opacity: 0;
            transition: opacity 0.4s ease;
        }
        .glow-border:hover::before {
            opacity: 1;
        }

        @keyframes gradientMove {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Fade-in on scroll */
        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.8s ease, transform 0.8s ease;
        }
        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Floating animation */
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        .float-anim {
            animation: float 3s ease-in-out infinite;
        }

        /* Pulse glow */
        @keyframes pulseGlow {
            0%, 100% { box-shadow: 0 0 20px rgba(0, 212, 255, 0.2); }
            50% { box-shadow: 0 0 40px rgba(0, 212, 255, 0.4); }
        }

        /* Mobile menu */
        .mobile-menu {
            transform: translateX(100%);
            transition: transform 0.35s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .mobile-menu.open {
            transform: translateX(0);
        }

        /* Nav link hover */
        .nav-link {
            position: relative;
            transition: color 0.3s ease;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #00d4ff, #06f5d6);
            transition: width 0.3s ease;
        }
        .nav-link:hover::after,
        .nav-link.active::after {
            width: 100%;
        }
        .nav-link:hover,
        .nav-link.active {
            color: #00d4ff;
        }

        /* Section divider */
        .section-divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(0,212,255,0.3), transparent);
        }

        /* Scrollbar styling */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #0a1628; }
        ::-webkit-scrollbar-thumb { background: #1e3a5f; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #00d4ff; }

        /* Counter animation */
        .counter-value {
            font-size: 2.5rem;
            font-weight: 700;
            font-family: 'Space Grotesk', sans-serif;
        }
    </style>
</head>
<body>

<!-- Navigation -->
<nav class="glass-nav fixed top-0 left-0 right-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-20">
            <!-- Logo -->
            <a href="index.php" class="flex items-center space-x-3 group" id="nav-logo">
                <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-cyan-electric to-cyan-bright flex items-center justify-center">
                    <i class="fas fa-microchip text-dark-primary text-lg"></i>
                </div>
                <span class="font-heading font-bold text-xl text-text-main group-hover:text-cyan-electric transition-colors">
                    InfoTech <span class="text-cyan-electric">Asesoría</span>
                </span>
            </a>

            <!-- Desktop Nav -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="index.php" class="nav-link text-text-main text-sm font-medium uppercase tracking-wider <?php echo basename($_SERVER['PHP_SELF']) === 'index.php' ? 'active' : ''; ?>" id="nav-inicio">Inicio</a>
                <a href="servicios.php" class="nav-link text-text-main text-sm font-medium uppercase tracking-wider <?php echo basename($_SERVER['PHP_SELF']) === 'servicios.php' ? 'active' : ''; ?>" id="nav-servicios">Servicios</a>
                <a href="contacto.php" class="nav-link text-text-main text-sm font-medium uppercase tracking-wider <?php echo basename($_SERVER['PHP_SELF']) === 'contacto.php' ? 'active' : ''; ?>" id="nav-contacto">Contacto</a>
                <a href="contacto.php" class="cta-btn text-sm" id="nav-cta">Solicitar Asesoría</a>
            </div>

            <!-- Hamburger -->
            <button id="hamburger-btn" class="md:hidden text-text-main text-2xl focus:outline-none z-50" aria-label="Menú">
                <i class="fas fa-bars" id="hamburger-icon"></i>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="mobile-menu fixed top-0 right-0 h-screen w-72 bg-dark-primary/95 backdrop-blur-xl border-l border-glass-border md:hidden z-40">
        <div class="flex flex-col items-center justify-center h-full space-y-8">
            <a href="index.php" class="text-text-main text-lg font-heading font-semibold hover:text-cyan-electric transition-colors <?php echo basename($_SERVER['PHP_SELF']) === 'index.php' ? 'text-cyan-electric' : ''; ?>">Inicio</a>
            <a href="servicios.php" class="text-text-main text-lg font-heading font-semibold hover:text-cyan-electric transition-colors <?php echo basename($_SERVER['PHP_SELF']) === 'servicios.php' ? 'text-cyan-electric' : ''; ?>">Servicios</a>
            <a href="contacto.php" class="text-text-main text-lg font-heading font-semibold hover:text-cyan-electric transition-colors <?php echo basename($_SERVER['PHP_SELF']) === 'contacto.php' ? 'text-cyan-electric' : ''; ?>">Contacto</a>
            <a href="contacto.php" class="cta-btn text-sm mt-4">Solicitar Asesoría</a>
        </div>
    </div>
</nav>

<!-- Spacer -->
<div class="h-20"></div>

<script>
    // Hamburger toggle
    const hamburgerBtn = document.getElementById('hamburger-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    const hamburgerIcon = document.getElementById('hamburger-icon');
    let menuOpen = false;

    hamburgerBtn.addEventListener('click', () => {
        menuOpen = !menuOpen;
        mobileMenu.classList.toggle('open');
        hamburgerIcon.className = menuOpen ? 'fas fa-times' : 'fas fa-bars';
    });

    // Close menu on outside click
    document.addEventListener('click', (e) => {
        if (menuOpen && !mobileMenu.contains(e.target) && !hamburgerBtn.contains(e.target)) {
            menuOpen = false;
            mobileMenu.classList.remove('open');
            hamburgerIcon.className = 'fas fa-bars';
        }
    });
</script>
