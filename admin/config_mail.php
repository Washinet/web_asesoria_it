<?php
require_once __DIR__ . '/../includes/auth.php';

requireAuth();
requirePasswordChange();

$configFile = '../config/email_settings.json';
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['save_config'])) {
        $newConfig = [
            'smtp_host' => $_POST['smtp_host'] ?? '',
            'smtp_port' => $_POST['smtp_port'] ?? '',
            'smtp_user' => $_POST['smtp_user'] ?? '',
            'smtp_pass' => $_POST['smtp_pass'] ?? '',
            'smtp_secure' => $_POST['smtp_secure'] ?? '',
            'from_email' => $_POST['from_email'] ?? '',
            'from_name' => $_POST['from_name'] ?? '',
            'admin_email' => $_POST['admin_email'] ?? ''
        ];

        if (file_put_contents($configFile, json_encode($newConfig, JSON_PRETTY_PRINT))) {
            $message = '<div class="bg-green-500/10 border border-green-500/20 text-green-400 p-4 rounded-xl mb-6">Configuración
    guardada exitosamente.</div>';
        }
        else {
            $message = '<div class="bg-red-500/10 border border-red-500/20 text-red-400 p-4 rounded-xl mb-6">Error al guardar la
    configuración. Verifica los permisos de escritura.</div>';
        }
    }
}

$currentConfig = json_decode(file_get_contents($configFile), true) ?? [];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuración de Correo | InfoTech Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body {
            background-color: #0a1628;
            color: #f0f4f8;
            font-family: 'Inter', sans-serif;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .input-field {
            background: rgba(15, 31, 61, 0.8);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: #f0f4f8;
        }

        .input-field:focus {
            border-color: #00d4ff;
            outline: none;
        }

        .btn-primary {
            background: linear-gradient(135deg, #00d4ff, #06f5d6);
            color: #0a1628;
            font-weight: 700;
        }

        .btn-primary:hover {
            opacity: 0.9;
        }
    </style>
</head>

<body class="min-h-screen py-10 px-4">
    <div class="max-w-2xl mx-auto">
        <div class="text-center mb-10">
            <h1 class="text-3xl font-bold mb-2">Panel de Administración</h1>
            <p class="text-gray-400 mb-6">Configuración del servicio de correo (SMTP)</p>

            <div class="flex justify-center space-x-4 text-sm">
                <a href="users.php"
                    class="bg-cyan-500/10 text-cyan-400 px-4 py-2 rounded-lg hover:bg-cyan-500/20 transition-colors">
                    <i class="fas fa-users mr-2"></i> Usuarios
                </a>
                <a href="logout.php"
                    class="bg-red-500/10 text-red-400 px-4 py-2 rounded-lg hover:bg-red-500/20 transition-colors">
                    <i class="fas fa-sign-out-alt mr-2"></i> Cerrar Sesión
                </a>
            </div>
        </div>

        <?php echo $message; ?>

        <div class="glass-card rounded-2xl p-8 shadow-xl">
            <form method="POST" action="">
                <h2 class="text-xl font-semibold mb-6 flex items-center">
                    <i class="fas fa-server mr-3 text-cyan-400"></i> Servidor SMTP
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-400 mb-2">Host SMTP</label>
                        <input type="text" name="smtp_host"
                            value="<?php echo htmlspecialchars($currentConfig['smtp_host'] ?? ''); ?>"
                            class="input-field w-full rounded-lg px-4 py-3" placeholder="smtp.gmail.com">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-400 mb-2">Puerto</label>
                        <input type="text" name="smtp_port"
                            value="<?php echo htmlspecialchars($currentConfig['smtp_port'] ?? '587'); ?>"
                            class="input-field w-full rounded-lg px-4 py-3" placeholder="587">
                    </div>
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-400 mb-2">Usuario SMTP</label>
                    <input type="text" name="smtp_user"
                        value="<?php echo htmlspecialchars($currentConfig['smtp_user'] ?? ''); ?>"
                        class="input-field w-full rounded-lg px-4 py-3" placeholder="tu@email.com">
                </div>

                <div class="mb-8">
                    <label class="block text-sm font-medium text-gray-400 mb-2">Contraseña SMTP</label>
                    <input type="password" name="smtp_pass"
                        value="<?php echo htmlspecialchars($currentConfig['smtp_pass'] ?? ''); ?>"
                        class="input-field w-full rounded-lg px-4 py-3" placeholder="********">
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-400 mb-2">Seguridad</label>
                    <select name="smtp_secure" class="input-field w-full rounded-lg px-4 py-3">
                        <option value="tls" <?php echo ($currentConfig['smtp_secure'] ?? '' )==='tls' ? 'selected' : ''
                            ; ?>>TLS</option>
                        <option value="ssl" <?php echo ($currentConfig['smtp_secure'] ?? '' )==='ssl' ? 'selected' : ''
                            ; ?>>SSL</option>
                        <option value="" <?php echo ($currentConfig['smtp_secure'] ?? '' )==='' ? 'selected' : '' ; ?>
                            >Ninguna</option>
                    </select>
                </div>

                <hr class="border-gray-700 my-8">

                <h2 class="text-xl font-semibold mb-6 flex items-center">
                    <i class="fas fa-envelope mr-3 text-cyan-400"></i> Remitente
                </h2>

                <div class="bg-blue-500/10 border border-blue-500/20 text-blue-300 p-4 rounded-xl mb-6 text-sm">
                    <i class="fas fa-info-circle mr-2"></i>
                    <strong>Importante:</strong> El Email Remitente debe ser una dirección del mismo dominio que el
                    servidor SMTP
                    (ej: si el usuario SMTP es <code>usuario@midominio.cl</code>, el remitente debe ser
                    <code>*@midominio.cl</code>).
                    Para recibir los mensajes en otra casilla (ej: Gmail, iCloud), configura el <strong>Email
                        Administrador</strong> abajo.
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-400 mb-2">Email Remitente</label>
                        <input type="email" name="from_email"
                            value="<?php echo htmlspecialchars($currentConfig['from_email'] ?? ''); ?>"
                            class="input-field w-full rounded-lg px-4 py-3" placeholder="contacto@tudominio.com">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-400 mb-2">Nombre Remitente</label>
                        <input type="text" name="from_name"
                            value="<?php echo htmlspecialchars($currentConfig['from_name'] ?? ''); ?>"
                            class="input-field w-full rounded-lg px-4 py-3" placeholder="InfoTech Contacto">
                    </div>
                </div>

                <hr class="border-gray-700 my-8">

                <h2 class="text-xl font-semibold mb-6 flex items-center">
                    <i class="fas fa-inbox mr-3 text-cyan-400"></i> Destinatario
                </h2>

                <div class="mb-8">
                    <label class="block text-sm font-medium text-gray-400 mb-2">Email Administrador (donde llegan los
                        mensajes del formulario)</label>
                    <input type="email" name="admin_email"
                        value="<?php echo htmlspecialchars($currentConfig['admin_email'] ?? ''); ?>"
                        class="input-field w-full rounded-lg px-4 py-3" placeholder="admin@ejemplo.com">
                    <p class="text-xs text-gray-500 mt-2">Si se deja vacío, los mensajes se enviarán al Email Remitente.
                    </p>
                </div>

                <button type="submit" name="save_config"
                    class="btn-primary w-full py-4 rounded-xl shadow-lg shadow-cyan-500/20 transition-all hover:scale-[1.02]">
                    <i class="fas fa-save mr-2"></i> Guardar Configuración
                </button>
            </form>

            <div class="mt-6 text-center">
                <a href="../index.php" class="text-gray-400 hover:text-white transition-colors text-sm">
                    <i class="fas fa-arrow-left mr-1"></i> Volver al sitio
                </a>
            </div>
        </div>
    </div>
</body>

</html>