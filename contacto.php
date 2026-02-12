<?php
$pageTitle = 'Contacto';
$pageDescription = 'Contáctanos para obtener asesoría tecnológica profesional. Estamos aquí para ayudarte con tus proyectos de IT, ciberseguridad y desarrollo.';
include 'includes/header.php';

// Email handling logic
require_once 'includes/mailer.php';

$successMessage = '';
$errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect form data
    $data = [
        'nombre' => $_POST['nombre'] ?? '',
        'email' => $_POST['email'] ?? '',
        'telefono' => $_POST['telefono'] ?? '',
        'servicio' => $_POST['servicio'] ?? '',
        'mensaje' => $_POST['mensaje'] ?? '',
        'subject' => 'Consulta de ' . ($_POST['servicio'] ?? 'Servicio General')
    ];

    try {
        if (sendContactEmail($data)) {
            $successMessage = '¡Gracias por tu mensaje! Nos pondremos en contacto contigo a la brevedad.';
        }
    }
    catch (Exception $e) {
        $errorMessage = 'Lo sentimos, hubo un error al enviar tu mensaje: ' . $e->getMessage();
    }
}
?>

<!-- PAGE HERO -->
<section class="py-24 bg-dark-alt relative overflow-hidden" id="contact-hero">
    <div class="absolute top-10 left-10 w-64 h-64 bg-cyan-electric/5 rounded-full blur-3xl"></div>
    <div class="absolute bottom-10 right-10 w-48 h-48 bg-blue-royal/5 rounded-full blur-3xl"></div>

    <div class="max-w-4xl mx-auto px-4 text-center relative z-10">
        <span class="text-cyan-electric text-sm font-semibold uppercase tracking-widest">Hablemos</span>
        <h1 class="font-heading text-4xl md:text-5xl lg:text-6xl font-bold mt-3 mb-5">
            Ponte en <span class="gradient-text">Contacto</span>
        </h1>
        <p class="text-text-secondary text-lg max-w-2xl mx-auto">
            ¿Tienes alguna duda o proyecto en mente? Nuestro equipo de expertos
            está listo para asesorarte.
        </p>
    </div>
</section>

<!-- CONTACT SECTION -->
<section class="py-20 bg-dark-primary relative" id="contact-content">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">

            <!-- Left: Contact Info -->
            <div class="fade-in">
                <h2 class="font-heading text-3xl font-bold text-text-main mb-6">Información de <span
                        class="text-cyan-electric">Contacto</span></h2>
                <p class="text-text-secondary mb-10 leading-relaxed">
                    Si prefieres comunicarte directamente, aquí tienes nuestros datos.
                    También puedes visitarnos en nuestras oficinas corporativas.
                </p>

                <div class="space-y-8">
                    <div class="flex items-start space-x-5 group">
                        <div
                            class="w-12 h-12 rounded-xl bg-glass border border-glass-border flex items-center justify-center text-cyan-electric flex-shrink-0 group-hover:border-cyan-electric/50 transition-all duration-300 shadow-lg shadow-cyan-electric/5">
                            <i class="fas fa-map-marker-alt text-lg"></i>
                        </div>
                        <div>
                            <h4 class="font-heading font-semibold text-text-main text-lg mb-1">Nuestra Ubicación</h4>
                            <p class="text-text-secondary text-sm">Apoquindo 6410 oficina 1004</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-5 group">
                        <div
                            class="w-12 h-12 rounded-xl bg-glass border border-glass-border flex items-center justify-center text-cyan-electric flex-shrink-0 group-hover:border-cyan-electric/50 transition-all duration-300 shadow-lg shadow-cyan-electric/5">
                            <i class="fas fa-phone-alt text-lg"></i>
                        </div>
                        <div>
                            <h4 class="font-heading font-semibold text-text-main text-lg mb-1">Teléfonos</h4>
                            <p class="text-text-secondary text-sm">Oficina: +56 (9) 5215 6460</p>
                            <p class="text-text-secondary text-sm">Soporte 24/7: +56 (9) 5215 6460</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-5 group">
                        <div
                            class="w-12 h-12 rounded-xl bg-glass border border-glass-border flex items-center justify-center text-cyan-electric flex-shrink-0 group-hover:border-cyan-electric/50 transition-all duration-300 shadow-lg shadow-cyan-electric/5">
                            <i class="fas fa-envelope text-lg"></i>
                        </div>
                        <div>
                            <h4 class="font-heading font-semibold text-text-main text-lg mb-1">Correo Electrónico</h4>
                            <p class="text-text-secondary text-sm">Información: info@asesoriatecnologica.cl</p>
                            <p class="text-text-secondary text-sm">Servicio al Cliente: soporte@asesoriatecnologica.cl
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-5 group">
                        <div
                            class="w-12 h-12 rounded-xl bg-glass border border-glass-border flex items-center justify-center text-cyan-electric flex-shrink-0 group-hover:border-cyan-electric/50 transition-all duration-300 shadow-lg shadow-cyan-electric/5">
                            <i class="fas fa-clock text-lg"></i>
                        </div>
                        <div>
                            <h4 class="font-heading font-semibold text-text-main text-lg mb-1">Horario de Atención</h4>
                            <p class="text-text-secondary text-sm">Lunes a Viernes: 08:30 – 19:00 </p>
                            <p class="text-text-secondary text-sm">Sábado y Domingo: 08:30 – 16:00 </p>
                        </div>
                    </div>
                </div>

                <!-- Social Media -->
                <div class="mt-12">
                    <h4 class="font-heading font-semibold text-text-main mb-6">Síguenos en Redes</h4>
                    <div class="flex space-x-4">
                        <a href="#"
                            class="w-12 h-12 rounded-xl bg-glass border border-glass-border flex items-center justify-center text-text-secondary hover:text-cyan-electric hover:border-cyan-electric/30 hover:-translate-y-1 transition-all duration-300">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#"
                            class="w-12 h-12 rounded-xl bg-glass border border-glass-border flex items-center justify-center text-text-secondary hover:text-cyan-electric hover:border-cyan-electric/30 hover:-translate-y-1 transition-all duration-300">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#"
                            class="w-12 h-12 rounded-xl bg-glass border border-glass-border flex items-center justify-center text-text-secondary hover:text-cyan-electric hover:border-cyan-electric/30 hover:-translate-y-1 transition-all duration-300">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#"
                            class="w-12 h-12 rounded-xl bg-glass border border-glass-border flex items-center justify-center text-text-secondary hover:text-cyan-electric hover:border-cyan-electric/30 hover:-translate-y-1 transition-all duration-300">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Right: Contact Form -->
            <div class="fade-in">
                <div class="bg-dark-alt rounded-3xl p-8 md:p-10 border border-glass-border">
                    <h3 class="font-heading text-2xl font-bold text-text-main mb-6">Envíanos un <span
                            class="text-cyan-electric">Mensaje</span></h3>

                    <?php if ($successMessage): ?>
                    <div
                        class="bg-green-500/10 border border-green-500/20 text-green-400 p-4 rounded-xl mb-6 text-sm flex items-center">
                        <i class="fas fa-check-circle mr-3"></i>
                        <?php echo $successMessage; ?>
                    </div>
                    <?php
endif; ?>

                    <?php if ($errorMessage): ?>
                    <div
                        class="bg-red-500/10 border border-red-500/20 text-red-400 p-4 rounded-xl mb-6 text-sm flex items-center">
                        <i class="fas fa-exclamation-circle mr-3"></i>
                        <?php echo $errorMessage; ?>
                    </div>
                    <?php
endif; ?>

                    <form action="contacto.php" method="POST" class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label for="nombre"
                                    class="text-xs uppercase tracking-widest font-semibold text-text-secondary ml-1">Nombre
                                    Completo</label>
                                <input type="text" id="nombre" name="nombre" required
                                    class="w-full bg-dark-primary border border-glass-border rounded-xl px-4 py-3 text-text-main focus:outline-none focus:border-cyan-electric/50 focus:ring-1 focus:ring-cyan-electric/20 transition-all placeholder:text-text-secondary/30"
                                    placeholder="Juan Pérez">
                            </div>
                            <div class="space-y-2">
                                <label for="email"
                                    class="text-xs uppercase tracking-widest font-semibold text-text-secondary ml-1">Correo
                                    Electrónico</label>
                                <input type="email" id="email" name="email" required
                                    class="w-full bg-dark-primary border border-glass-border rounded-xl px-4 py-3 text-text-main focus:outline-none focus:border-cyan-electric/50 focus:ring-1 focus:ring-cyan-electric/20 transition-all placeholder:text-text-secondary/30"
                                    placeholder="juan@empresa.com">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-2">
                                <label for="telefono"
                                    class="text-xs uppercase tracking-widest font-semibold text-text-secondary ml-1">Teléfono</label>
                                <input type="tel" id="telefono" name="telefono"
                                    class="w-full bg-dark-primary border border-glass-border rounded-xl px-4 py-3 text-text-main focus:outline-none focus:border-cyan-electric/50 focus:ring-1 focus:ring-cyan-electric/20 transition-all placeholder:text-text-secondary/30"
                                    placeholder="+56 (9) 1234-5678">
                            </div>
                            <div class="space-y-2">
                                <label for="servicio"
                                    class="text-xs uppercase tracking-widest font-semibold text-text-secondary ml-1">Servicio
                                    de Interés</label>
                                <select id="servicio" name="servicio" required
                                    class="w-full bg-dark-primary border border-glass-border rounded-xl px-4 py-3 text-text-main focus:outline-none focus:border-cyan-electric/50 focus:ring-1 focus:ring-cyan-electric/20 transition-all appearance-none cursor-pointer">
                                    <option value="" disabled selected>Selecciona un servicio</option>
                                    <option value="consultoria">Consultoría IT</option>
                                    <option value="desarrollo">Desarrollo de Software</option>
                                    <option value="redes">Infraestructura de Redes</option>
                                    <option value="seguridad">Ciberseguridad</option>
                                    <option value="soporte">Soporte Técnico</option>
                                    <option value="cloud">Cloud & Servidores</option>
                                </select>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label for="mensaje"
                                class="text-xs uppercase tracking-widest font-semibold text-text-secondary ml-1">Tu
                                Mensaje</label>
                            <textarea id="mensaje" name="mensaje" rows="4" required
                                class="w-full bg-dark-primary border border-glass-border rounded-xl px-4 py-3 text-text-main focus:outline-none focus:border-cyan-electric/50 focus:ring-1 focus:ring-cyan-electric/20 transition-all placeholder:text-text-secondary/30"
                                placeholder="Cuéntanos un poco sobre tu proyecto o duda..."></textarea>
                        </div>

                        <button type="submit"
                            class="cta-btn w-full py-4 text-base mt-2 shadow-xl shadow-cyan-electric/20 hover:shadow-cyan-electric/30">
                            <i class="fas fa-paper-plane mr-2"></i>Enviar Mensaje
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- MAP SECTION -->
<section class="h-96 relative grayscale opacity-70 hover:grayscale-0 hover:opacity-100 transition-all duration-1000">
    <iframe src="https://www.google.com/maps?q=Apoquindo%206410%2C%20Las%20Condes%2C%20Santiago%2C%20Chile&output=embed"
        class="w-full h-full border-0" allowfullscreen loading="lazy">
    </iframe>
</section>

<?php include 'includes/footer.php'; ?>