<?php
$pageTitle = 'Inicio';
$pageDescription = 'InfoTech Asesoría – Servicio profesional de asesoría tecnológica informática. Consultoría IT, desarrollo de software, ciberseguridad, infraestructura de redes y cloud.';
include 'includes/header.php';
?>

<!-- HERO SECTION -->
<section class="relative min-h-screen flex items-center justify-center overflow-hidden" id="hero">
    <!-- Background image -->
    <div class="absolute inset-0">
        <img src="img/hero_bg.png" alt="" class="w-full h-full object-cover opacity-40">
        <div class="absolute inset-0 bg-gradient-to-b from-dark-primary/60 via-dark-primary/40 to-dark-primary"></div>
    </div>

    <!-- Decorative elements -->
    <div class="absolute top-20 left-10 w-72 h-72 bg-cyan-electric/5 rounded-full blur-3xl float-anim"></div>
    <div class="absolute bottom-20 right-10 w-96 h-96 bg-blue-royal/5 rounded-full blur-3xl float-anim"
        style="animation-delay: 1.5s;"></div>

    <div class="relative z-10 max-w-5xl mx-auto px-4 text-center">
        <div class="inline-flex items-center space-x-2 bg-glass border border-glass-border rounded-full px-5 py-2 mb-8">
            <span class="w-2 h-2 bg-cyan-bright rounded-full animate-pulse"></span>
            <span class="text-text-secondary text-sm font-medium">Asesoría Tecnológica Profesional</span>
        </div>

        <h1 class="font-heading text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold leading-tight mb-6">
            Impulsamos tu negocio con
            <span class="gradient-text">tecnología inteligente</span>
        </h1>

        <p class="text-text-secondary text-lg md:text-xl max-w-2xl mx-auto mb-10 leading-relaxed">
            Soluciones integrales en informática, ciberseguridad, desarrollo de software y
            consultoría IT para empresas que buscan innovar y crecer.
        </p>

        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="contacto.php" class="cta-btn text-base" id="hero-cta">
                <i class="fas fa-rocket mr-2"></i>Solicitar Asesoría
            </a>
            <a href="servicios.php" class="cta-btn-outline text-base" id="hero-services">
                <i class="fas fa-th-large mr-2"></i>Ver Servicios
            </a>
        </div>

        <!-- Scroll indicator -->
        <div class="absolute bottom-10 left-1/2 -translate-x-1/2 animate-bounce">
            <i class="fas fa-chevron-down text-cyan-electric/50 text-xl"></i>
        </div>
    </div>
</section>

<!-- SERVICES SECTION -->
<section class="py-24 bg-dark-alt relative" id="servicios">
    <div class="absolute top-0 left-0 right-0 section-divider"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16 fade-in">
            <span class="text-cyan-electric text-sm font-semibold uppercase tracking-widest">Lo que hacemos</span>
            <h2 class="font-heading text-3xl md:text-4xl lg:text-5xl font-bold mt-3 mb-5">
                Nuestros <span class="gradient-text">Servicios</span>
            </h2>
            <p class="text-text-secondary max-w-2xl mx-auto">
                Ofrecemos soluciones tecnológicas completas adaptadas a las necesidades de tu empresa,
                con un enfoque en eficiencia, seguridad e innovación.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" id="services-grid">
            <?php
$services = [
    [
        'icon' => 'fa-chart-line',
        'title' => 'Consultoría IT',
        'desc' => 'Análisis estratégico y planificación tecnológica para optimizar tus procesos de negocio e infraestructura digital.',
        'color' => 'from-cyan-400 to-blue-500'
    ],
    [
        'icon' => 'fa-code',
        'title' => 'Desarrollo de Software',
        'desc' => 'Aplicaciones web y móviles a medida, diseñadas con las últimas tecnologías para escalar tu negocio.',
        'color' => 'from-blue-400 to-indigo-500'
    ],
    [
        'icon' => 'fa-network-wired',
        'title' => 'Infraestructura de Redes',
        'desc' => 'Diseño, instalación y mantenimiento de redes empresariales seguras y de alto rendimiento.',
        'color' => 'from-teal-400 to-cyan-500'
    ],
    [
        'icon' => 'fa-shield-halved',
        'title' => 'Ciberseguridad',
        'desc' => 'Protección integral de datos, auditorías de seguridad y estrategias de defensa contra amenazas digitales.',
        'color' => 'from-green-400 to-emerald-500'
    ],
    [
        'icon' => 'fa-headset',
        'title' => 'Soporte Técnico',
        'desc' => 'Asistencia técnica remota y presencial 24/7. Resolución rápida de incidencias y mantenimiento preventivo.',
        'color' => 'from-purple-400 to-pink-500'
    ],
    [
        'icon' => 'fa-cloud',
        'title' => 'Cloud & Servidores',
        'desc' => 'Migración a la nube, gestión de servidores y optimización de infraestructura cloud para máxima disponibilidad.',
        'color' => 'from-orange-400 to-red-500'
    ]
];

foreach ($services as $i => $service): ?>
            <div class="glass-card rounded-2xl p-8 fade-in" style="transition-delay: <?php echo $i * 0.1; ?>s;"
                id="service-card-<?php echo $i; ?>">
                <div
                    class="w-14 h-14 rounded-xl bg-gradient-to-br <?php echo $service['color']; ?> flex items-center justify-center mb-6 shadow-lg">
                    <i class="fas <?php echo $service['icon']; ?> text-white text-xl"></i>
                </div>
                <h3 class="font-heading font-bold text-xl text-text-main mb-3">
                    <?php echo $service['title']; ?>
                </h3>
                <p class="text-text-secondary text-sm leading-relaxed mb-5">
                    <?php echo $service['desc']; ?>
                </p>
                <a href="servicios.php"
                    class="inline-flex items-center text-cyan-electric text-sm font-medium hover:gap-3 gap-2 transition-all">
                    Saber más <i class="fas fa-arrow-right text-xs"></i>
                </a>
            </div>
            <?php
endforeach; ?>
        </div>
    </div>
</section>

<!-- WHY CHOOSE US -->
<section class="py-24 bg-dark-primary relative" id="por-que">
    <div class="absolute top-0 left-0 right-0 section-divider"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <!-- Left: Content -->
            <div class="fade-in">
                <span class="text-cyan-electric text-sm font-semibold uppercase tracking-widest">¿Por qué
                    elegirnos?</span>
                <h2 class="font-heading text-3xl md:text-4xl font-bold mt-3 mb-6">
                    Experiencia y compromiso al servicio de tu
                    <span class="gradient-text">transformación digital</span>
                </h2>
                <p class="text-text-secondary leading-relaxed mb-8">
                    Combinamos expertise técnico con una visión estratégica para ofrecer soluciones
                    que realmente impactan en el crecimiento de tu empresa.
                </p>

                <div class="space-y-5">
                    <?php
$features = [
    ['icon' => 'fa-bolt', 'title' => 'Respuesta Rápida', 'desc' => 'Atención inmediata y tiempos de resolución optimizados.'],
    ['icon' => 'fa-users', 'title' => 'Equipo Certificado', 'desc' => 'Profesionales certificados en las principales tecnologías.'],
    ['icon' => 'fa-lock', 'title' => 'Seguridad Primero', 'desc' => 'Protocolos de seguridad en cada solución que implementamos.'],
    ['icon' => 'fa-chart-pie', 'title' => 'Resultados Medibles', 'desc' => 'KPIs claros y reportes periódicos de rendimiento.'],
];
foreach ($features as $feat): ?>
                    <div class="flex items-start space-x-4 group">
                        <div
                            class="w-10 h-10 rounded-lg bg-cyan-electric/10 flex items-center justify-center flex-shrink-0 group-hover:bg-cyan-electric/20 transition-colors">
                            <i class="fas <?php echo $feat['icon']; ?> text-cyan-electric text-sm"></i>
                        </div>
                        <div>
                            <h4 class="font-heading font-semibold text-text-main text-base">
                                <?php echo $feat['title']; ?>
                            </h4>
                            <p class="text-text-secondary text-sm">
                                <?php echo $feat['desc']; ?>
                            </p>
                        </div>
                    </div>
                    <?php
endforeach; ?>
                </div>
            </div>

            <!-- Right: Counters -->
            <div class="grid grid-cols-2 gap-6 fade-in">
                <?php
$counters = [
    ['value' => 150, 'suffix' => '+', 'label' => 'Clientes Satisfechos', 'icon' => 'fa-smile'],
    ['value' => 500, 'suffix' => '+', 'label' => 'Proyectos Realizados', 'icon' => 'fa-project-diagram'],
    ['value' => 12, 'suffix' => '', 'label' => 'Años de Experiencia', 'icon' => 'fa-trophy'],
    ['value' => 99, 'suffix' => '%', 'label' => 'Uptime Garantizado', 'icon' => 'fa-server'],
];
foreach ($counters as $counter): ?>
                <div class="glass-card rounded-2xl p-6 text-center">
                    <div
                        class="w-12 h-12 rounded-full bg-cyan-electric/10 flex items-center justify-center mx-auto mb-4">
                        <i class="fas <?php echo $counter['icon']; ?> text-cyan-electric"></i>
                    </div>
                    <span class="counter-value gradient-text" data-target="<?php echo $counter['value']; ?>"
                        data-suffix="<?php echo $counter['suffix']; ?>">0</span>
                    <p class="text-text-secondary text-sm mt-2">
                        <?php echo $counter['label']; ?>
                    </p>
                </div>
                <?php
endforeach; ?>
            </div>
        </div>
    </div>
</section>

<!-- CTA SECTION -->
<section class="py-20 relative overflow-hidden" id="cta-section">
    <div class="absolute inset-0 bg-gradient-to-r from-cyan-electric/10 via-blue-royal/10 to-cyan-bright/10"></div>
    <div class="absolute top-0 left-0 right-0 section-divider"></div>

    <div class="max-w-4xl mx-auto px-4 text-center relative z-10 fade-in">
        <h2 class="font-heading text-3xl md:text-4xl font-bold mb-5">
            ¿Listo para llevar tu empresa al
            <span class="gradient-text">siguiente nivel?</span>
        </h2>
        <p class="text-text-secondary text-lg mb-10 max-w-xl mx-auto">
            Agenda una consulta gratuita y descubre cómo podemos transformar
            tu infraestructura tecnológica.
        </p>
        <a href="contacto.php" class="cta-btn text-lg" id="cta-final">
            <i class="fas fa-paper-plane mr-2"></i>Contáctanos Ahora
        </a>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
