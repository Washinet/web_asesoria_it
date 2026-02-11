<!-- Footer -->
<footer class="bg-dark-alt border-t border-glass-border">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
            <!-- Company Info -->
            <div>
                <a href="index.php" class="flex items-center space-x-3 mb-6">
                    <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-cyan-electric to-cyan-bright flex items-center justify-center">
                        <i class="fas fa-microchip text-dark-primary text-lg"></i>
                    </div>
                    <span class="font-heading font-bold text-xl text-text-main">
                        InfoTech <span class="text-cyan-electric">Asesoría</span>
                    </span>
                </a>
                <p class="text-text-secondary text-sm leading-relaxed mb-6">
                    Soluciones tecnológicas integrales para empresas que buscan innovar, 
                    protegerse y crecer en la era digital. Tu socio estratégico en tecnología.
                </p>
                <div class="flex space-x-4">
                    <a href="#" class="w-10 h-10 rounded-full bg-glass border border-glass-border flex items-center justify-center text-text-secondary hover:text-cyan-electric hover:border-cyan-electric/30 transition-all duration-300" aria-label="Facebook" id="footer-facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full bg-glass border border-glass-border flex items-center justify-center text-text-secondary hover:text-cyan-electric hover:border-cyan-electric/30 transition-all duration-300" aria-label="LinkedIn" id="footer-linkedin">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full bg-glass border border-glass-border flex items-center justify-center text-text-secondary hover:text-cyan-electric hover:border-cyan-electric/30 transition-all duration-300" aria-label="Twitter" id="footer-twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full bg-glass border border-glass-border flex items-center justify-center text-text-secondary hover:text-cyan-electric hover:border-cyan-electric/30 transition-all duration-300" aria-label="Instagram" id="footer-instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h4 class="font-heading font-semibold text-lg text-text-main mb-6">Enlaces Rápidos</h4>
                <ul class="space-y-3">
                    <li><a href="index.php" class="text-text-secondary hover:text-cyan-electric transition-colors text-sm flex items-center space-x-2" id="footer-link-inicio"><i class="fas fa-chevron-right text-xs text-cyan-electric/50"></i><span>Inicio</span></a></li>
                    <li><a href="servicios.php" class="text-text-secondary hover:text-cyan-electric transition-colors text-sm flex items-center space-x-2" id="footer-link-servicios"><i class="fas fa-chevron-right text-xs text-cyan-electric/50"></i><span>Servicios</span></a></li>
                    <li><a href="contacto.php" class="text-text-secondary hover:text-cyan-electric transition-colors text-sm flex items-center space-x-2" id="footer-link-contacto"><i class="fas fa-chevron-right text-xs text-cyan-electric/50"></i><span>Contacto</span></a></li>
                    <li><a href="servicios.php#consultoria" class="text-text-secondary hover:text-cyan-electric transition-colors text-sm flex items-center space-x-2"><i class="fas fa-chevron-right text-xs text-cyan-electric/50"></i><span>Consultoría IT</span></a></li>
                    <li><a href="servicios.php#ciberseguridad" class="text-text-secondary hover:text-cyan-electric transition-colors text-sm flex items-center space-x-2"><i class="fas fa-chevron-right text-xs text-cyan-electric/50"></i><span>Ciberseguridad</span></a></li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div>
                <h4 class="font-heading font-semibold text-lg text-text-main mb-6">Contacto</h4>
                <ul class="space-y-4">
                    <li class="flex items-start space-x-3">
                        <i class="fas fa-map-marker-alt text-cyan-electric mt-1"></i>
                        <span class="text-text-secondary text-sm">Av. Tecnología 1234, Oficina 501<br>Ciudad, País</span>
                    </li>
                    <li class="flex items-center space-x-3">
                        <i class="fas fa-phone-alt text-cyan-electric"></i>
                        <a href="tel:+1234567890" class="text-text-secondary hover:text-cyan-electric transition-colors text-sm">+1 (234) 567-890</a>
                    </li>
                    <li class="flex items-center space-x-3">
                        <i class="fas fa-envelope text-cyan-electric"></i>
                        <a href="mailto:info@infotechasesoria.com" class="text-text-secondary hover:text-cyan-electric transition-colors text-sm">info@infotechasesoria.com</a>
                    </li>
                    <li class="flex items-center space-x-3">
                        <i class="fas fa-clock text-cyan-electric"></i>
                        <span class="text-text-secondary text-sm">Lun – Vie: 8:00 – 18:00</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Bottom bar -->
        <div class="section-divider mt-12 mb-8"></div>
        <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
            <p class="text-text-secondary text-xs">&copy; <?php echo date('Y'); ?> InfoTech Asesoría. Todos los derechos reservados.</p>
            <p class="text-text-secondary text-xs">Servicio de Asesoría Tecnológica Informática</p>
        </div>
    </div>
</footer>

<!-- Scroll animations -->
<script>
    // Intersection Observer for fade-in animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    document.querySelectorAll('.fade-in').forEach(el => observer.observe(el));

    // Counter animation
    function animateCounter(element, target, suffix = '') {
        let current = 0;
        const increment = target / 60;
        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                current = target;
                clearInterval(timer);
            }
            element.textContent = Math.floor(current) + suffix;
        }, 25);
    }

    // Observe counters
    const counterObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const el = entry.target;
                const target = parseInt(el.getAttribute('data-target'));
                const suffix = el.getAttribute('data-suffix') || '';
                animateCounter(el, target, suffix);
                counterObserver.unobserve(el);
            }
        });
    }, { threshold: 0.5 });

    document.querySelectorAll('.counter-value').forEach(el => counterObserver.observe(el));
</script>
