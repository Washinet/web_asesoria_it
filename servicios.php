<?php
$pageTitle = 'Servicios';
$pageDescription = 'Conoce todos nuestros servicios de asesoría tecnológica: consultoría IT, desarrollo de software, ciberseguridad, redes, soporte técnico y cloud.';
include 'includes/header.php';

$services = [
    [
        'id' => 'consultoria',
        'icon' => 'fa-chart-line',
        'title' => 'Consultoría IT',
        'short' => 'Estrategia tecnológica a medida',
        'desc' => 'Evaluamos tu infraestructura actual, identificamos oportunidades de mejora y diseñamos una hoja de ruta tecnológica alineada con los objetivos de tu negocio. Nuestro equipo de consultores certificados te guía en cada paso de la transformación digital.',
        'features' => ['Auditoría tecnológica completa', 'Plan estratégico digital', 'Optimización de procesos', 'Evaluación de herramientas y plataformas'],
        'img' => 'img/service_consultoria.png',
        'color' => 'from-cyan-400 to-blue-500'
    ],
    [
        'id' => 'desarrollo',
        'icon' => 'fa-code',
        'title' => 'Desarrollo de Software',
        'short' => 'Soluciones digitales personalizadas',
        'desc' => 'Creamos aplicaciones web, móviles y sistemas empresariales desde cero, usando las tecnologías más modernas del mercado. Cada solución es diseñada para escalar con tu negocio y ofrecer la mejor experiencia de usuario.',
        'features' => ['Aplicaciones web progresivas', 'Apps móviles nativas e híbridas', 'APIs REST y microservicios', 'Integraciones con sistemas existentes'],
        'img' => 'https://images.unsplash.com/photo-1555066931-4365d14bab8c?w=600&h=600&fit=crop',
        'color' => 'from-blue-400 to-indigo-500'
    ],
    [
        'id' => 'redes',
        'icon' => 'fa-network-wired',
        'title' => 'Infraestructura de Redes',
        'short' => 'Conectividad robusta y segura',
        'desc' => 'Diseñamos, implementamos y gestionamos redes empresariales de alto rendimiento. Desde cableado estructurado hasta configuración de switches, routers y firewalls, garantizamos una conectividad estable y segura.',
        'features' => ['Diseño de topología de red', 'Cableado estructurado Cat6/fibra', 'Configuración de VPN empresarial', 'Monitoreo y gestión 24/7'],
        'img' => 'https://images.unsplash.com/photo-1558494949-ef010cbdcc31?w=600&h=600&fit=crop',
        'color' => 'from-teal-400 to-cyan-500'
    ],
    [
        'id' => 'ciberseguridad',
        'icon' => 'fa-shield-halved',
        'title' => 'Ciberseguridad',
        'short' => 'Protección digital integral',
        'desc' => 'Protegemos tus activos digitales con estrategias de seguridad multinivel. Realizamos auditorías de vulnerabilidades, implementamos sistemas de detección de intrusiones y capacitamos a tu equipo en buenas prácticas de seguridad.',
        'features' => ['Pentesting y análisis de vulnerabilidades', 'Implementación de firewalls avanzados', 'Protección contra ransomware', 'Cumplimiento normativo (ISO 27001)'],
        'img' => 'https://images.unsplash.com/photo-1563013544-824ae1b704d3?w=600&h=600&fit=crop',
        'color' => 'from-green-400 to-emerald-500'
    ],
    [
        'id' => 'soporte',
        'icon' => 'fa-headset',
        'title' => 'Soporte Técnico',
        'short' => 'Asistencia cuando la necesitas',
        'desc' => 'Ofrecemos soporte técnico integral por múltiples canales: remoto, telefónico y presencial. Nuestro equipo está disponible 24/7 para resolver incidencias, realizar mantenimiento preventivo y garantizar la continuidad operativa.',
        'features' => ['Mesa de ayuda multicanal', 'Mantenimiento preventivo', 'Resolución de incidencias prioritarias', 'Inventario y gestión de activos IT'],
        'img' => 'https://images.unsplash.com/photo-1573164713714-d95e436ab8d6?w=600&h=600&fit=crop',
        'color' => 'from-purple-400 to-pink-500'
    ],
    [
        'id' => 'cloud',
        'icon' => 'fa-cloud',
        'title' => 'Cloud & Servidores',
        'short' => 'Infraestructura en la nube',
        'desc' => 'Migramos tu infraestructura a la nube de forma segura y eficiente. Gestionamos servidores, configuramos entornos virtualizados y optimizamos costos con las principales plataformas cloud: AWS, Azure y Google Cloud.',
        'features' => ['Migración cloud segura', 'Gestión de servidores dedicados/VPS', 'Backup y recuperación ante desastres', 'Optimización de costos cloud'],
        'img' => 'https://images.unsplash.com/photo-1544197150-b99a580bb7a8?w=600&h=600&fit=crop',
        'color' => 'from-orange-400 to-red-500'
    ]
];
?>

<!-- PAGE HERO -->
<section class="py-24 bg-dark-alt relative overflow-hidden" id="services-hero">
    <div class="absolute top-10 right-10 w-64 h-64 bg-cyan-electric/5 rounded-full blur-3xl"></div>
    <div class="absolute bottom-10 left-10 w-48 h-48 bg-blue-royal/5 rounded-full blur-3xl"></div>

    <div class="max-w-4xl mx-auto px-4 text-center relative z-10">
        <span class="text-cyan-electric text-sm font-semibold uppercase tracking-widest">Nuestras Soluciones</span>
        <h1 class="font-heading text-4xl md:text-5xl lg:text-6xl font-bold mt-3 mb-5">
            Servicios de <span class="gradient-text">Asesoría Tecnológica</span>
        </h1>
        <p class="text-text-secondary text-lg max-w-2xl mx-auto">
            Soluciones completas para cada necesidad tecnológica de tu empresa.
            Desde la estrategia hasta la implementación.
        </p>
    </div>
</section>

<!-- SERVICES DETAILED -->
<section class="py-20 bg-dark-primary" id="services-detail">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-24">
        <?php foreach ($services as $i => $service):
    $isReversed = $i % 2 !== 0;
?>
        <div class="fade-in" id="<?php echo $service['id']; ?>">
            <div
                class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center <?php echo $isReversed ? 'lg:flex-row-reverse' : ''; ?>">
                <!-- Image -->
                <div class="<?php echo $isReversed ? 'lg:order-2' : ''; ?>">
                    <div class="relative group">
                        <div
                            class="absolute -inset-1 bg-gradient-to-r <?php echo $service['color']; ?> rounded-2xl opacity-20 group-hover:opacity-40 transition-opacity blur-sm">
                        </div>
                        <img src="<?php echo $service['img']; ?>" alt="<?php echo $service['title']; ?>"
                            class="relative w-full aspect-square object-cover rounded-2xl shadow-2xl" loading="lazy">
                    </div>
                </div>

                <!-- Content -->
                <div class="<?php echo $isReversed ? 'lg:order-1' : ''; ?>">
                    <div class="inline-flex items-center space-x-3 mb-4">
                        <div
                            class="w-12 h-12 rounded-xl bg-gradient-to-br <?php echo $service['color']; ?> flex items-center justify-center shadow-lg">
                            <i class="fas <?php echo $service['icon']; ?> text-white text-lg"></i>
                        </div>
                        <span class="text-text-secondary text-sm font-medium">
                            <?php echo $service['short']; ?>
                        </span>
                    </div>

                    <h2 class="font-heading text-3xl md:text-4xl font-bold text-text-main mb-4">
                        <?php echo $service['title']; ?>
                    </h2>
                    <p class="text-text-secondary leading-relaxed mb-8">
                        <?php echo $service['desc']; ?>
                    </p>

                    <ul class="space-y-3 mb-8">
                        <?php foreach ($service['features'] as $feat): ?>
                        <li class="flex items-center space-x-3">
                            <i class="fas fa-check-circle text-cyan-electric text-sm"></i>
                            <span class="text-text-main text-sm">
                                <?php echo $feat; ?>
                            </span>
                        </li>
                        <?php
    endforeach; ?>
                    </ul>

                    <a href="contacto.php" class="cta-btn text-sm">
                        <i class="fas fa-paper-plane mr-2"></i>Solicitar este servicio
                    </a>
                </div>
            </div>

            <?php if ($i < count($services) - 1): ?>
            <div class="section-divider mt-24"></div>
            <?php
    endif; ?>
        </div>
        <?php
endforeach; ?>
    </div>
</section>

<!-- TECHNOLOGIES -->
<section class="py-24 bg-dark-alt relative" id="tecnologias">
    <div class="absolute top-0 left-0 right-0 section-divider"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="fade-in mb-16">
            <span class="text-cyan-electric text-sm font-semibold uppercase tracking-widest">Stack Tecnológico</span>
            <h2 class="font-heading text-3xl md:text-4xl font-bold mt-3 mb-5">
                Tecnologías con las que <span class="gradient-text">trabajamos</span>
            </h2>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-6 fade-in">
            <?php
$techs = [
    ['icon' => 'fab fa-aws', 'name' => 'AWS'],
    ['icon' => 'fab fa-microsoft', 'name' => 'Azure'],
    ['icon' => 'fab fa-google', 'name' => 'Google Cloud'],
    ['icon' => 'fab fa-linux', 'name' => 'Linux'],
    ['icon' => 'fab fa-docker', 'name' => 'Docker'],
    ['icon' => 'fab fa-python', 'name' => 'Python'],
    ['icon' => 'fab fa-react', 'name' => 'React'],
    ['icon' => 'fab fa-node-js', 'name' => 'Node.js'],
    ['icon' => 'fab fa-php', 'name' => 'PHP'],
    ['icon' => 'fas fa-database', 'name' => 'SQL/NoSQL'],
    ['icon' => 'fab fa-git-alt', 'name' => 'Git'],
    ['icon' => 'fas fa-shield-halved', 'name' => 'Fortinet'],
];
foreach ($techs as $tech): ?>
            <div class="glass-card rounded-xl p-5 flex flex-col items-center space-y-3">
                <i class="<?php echo $tech['icon']; ?> text-3xl text-cyan-electric"></i>
                <span class="text-text-main text-xs font-medium">
                    <?php echo $tech['name']; ?>
                </span>
            </div>
            <?php
endforeach; ?>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-20 relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-r from-cyan-electric/10 via-blue-royal/10 to-cyan-bright/10"></div>
    <div class="absolute top-0 left-0 right-0 section-divider"></div>

    <div class="max-w-4xl mx-auto px-4 text-center relative z-10 fade-in">
        <h2 class="font-heading text-3xl md:text-4xl font-bold mb-5">
            ¿Necesitas una solución <span class="gradient-text">a medida?</span>
        </h2>
        <p class="text-text-secondary text-lg mb-10 max-w-xl mx-auto">
            Cuéntanos tu proyecto y te asesoramos sin compromiso.
            Juntos encontraremos la mejor solución tecnológica.
        </p>
        <a href="contacto.php" class="cta-btn text-lg" id="cta-servicios">
            <i class="fas fa-comments mr-2"></i>Hablemos de tu Proyecto
        </a>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
