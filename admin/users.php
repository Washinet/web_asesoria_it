<?php
require_once __DIR__ . '/../includes/auth.php';

requireAuth(); // Ensure logged in
requirePasswordChange(); // Ensure password isn't temporary

$message = '';

// Handle user actions (Create, Delete, Reset)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // --- Create User ---
    if (isset($_POST['create_user'])) {
        $name = trim($_POST['name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        if (empty($name) || empty($email) || empty($password)) {
            $message = '<div class="bg-red-500/10 border border-red-500/20 text-red-400 p-4 rounded-xl mb-6">Todos los campos son obligatorios.</div>';
        }
        elseif (strlen($name) > 30) {
            $message = '<div class="bg-red-500/10 border border-red-500/20 text-red-400 p-4 rounded-xl mb-6">El nombre no puede exceder los 30 caracteres.</div>';
        }
        elseif (strlen($password) < 8 || !preg_match('/[.,_@]/', $password)) {
            $message = '<div class="bg-red-500/10 border border-red-500/20 text-red-400 p-4 rounded-xl mb-6">La contraseña debe tener al menos 8 caracteres e incluir especiales (.,_@).</div>';
        }
        else {
            if (createUser($name, $email, $password, true)) { // true = temporary password
                $message = '<div class="bg-green-500/10 border border-green-500/20 text-green-400 p-4 rounded-xl mb-6">Usuario creado exitosamente.</div>';
            }
            else {
                $message = '<div class="bg-red-500/10 border border-red-500/20 text-red-400 p-4 rounded-xl mb-6">Error: El correo ya existe.</div>';
            }
        }
    }

    // --- Delete User ---
    if (isset($_POST['delete_user'])) {
        $emailToDelete = $_POST['email_to_delete'] ?? '';

        // Prevent self-deletion
        if ($emailToDelete === $_SESSION['user_email']) {
            $message = '<div class="bg-red-500/10 border border-red-500/20 text-red-400 p-4 rounded-xl mb-6">No puedes eliminar tu propia cuenta.</div>';
        }
        else {
            if (deleteUser($emailToDelete)) {
                $message = '<div class="bg-green-500/10 border border-green-500/20 text-green-400 p-4 rounded-xl mb-6">Usuario eliminado exitosamente.</div>';
            }
            else {
                $message = '<div class="bg-red-500/10 border border-red-500/20 text-red-400 p-4 rounded-xl mb-6">Error al eliminar usuario.</div>';
            }
        }
    }

    // --- Reset Password ---
    if (isset($_POST['reset_password'])) {
        $emailToReset = $_POST['email_to_reset'] ?? '';
        $tempPassword = 'Temp.' . substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, 8); // Simple random pass

        if (resetPassword($emailToReset, $tempPassword)) {
            $message = '<div class="bg-green-500/10 border border-green-500/20 text-green-400 p-4 rounded-xl mb-6">' .
                '<strong>Contraseña restablecida.</strong><br>' .
                'Usuario: ' . htmlspecialchars($emailToReset) . '<br>' .
                'Nueva Contraseña Temporal: <code class="bg-gray-800 px-2 py-1 rounded text-cyan-400">' . $tempPassword . '</code>' .
                '</div>';
        }
        else {
            $message = '<div class="bg-red-500/10 border border-red-500/20 text-red-400 p-4 rounded-xl mb-6">Error al restablecer contraseña.</div>';
        }
    }
}

$users = loadUsers();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios | InfoTech Admin</title>
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

        .table-header {
            background: rgba(255, 255, 255, 0.05);
            text-transform: uppercase;
            font-size: 0.75rem;
            color: #94a3b8;
        }

        .table-row:hover {
            background: rgba(255, 255, 255, 0.02);
        }
    </style>
</head>

<body class="min-h-screen py-10 px-4">
    <div class="max-w-5xl mx-auto">
        <div class="text-center mb-10">
            <h1 class="text-3xl font-bold mb-2">Gestión de Usuarios</h1>
            <p class="text-gray-400">Administra el acceso al panel</p>
        </div>

        <?php echo $message; ?>

        <!-- Create User Form -->
        <div class="glass-card rounded-2xl p-8 shadow-xl mb-10">
            <h2 class="text-xl font-semibold mb-6 flex items-center">
                <i class="fas fa-user-plus mr-3 text-cyan-400"></i> Nuevo Usuario
            </h2>
            <form method="POST" action="">
                <input type="hidden" name="create_user" value="1">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-400 mb-2">Nombre Completo</label>
                        <input type="text" name="name" maxlength="30" required
                            class="input-field w-full rounded-lg px-4 py-3" placeholder="Ej: Juan Pérez">
                        <p class="text-xs text-gray-500 mt-1">Máximo 30 caracteres</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-400 mb-2">Email (Usuario)</label>
                        <input type="email" name="email" required class="input-field w-full rounded-lg px-4 py-3"
                            placeholder="usuario@dominio.com">
                    </div>
                </div>
                <div class="mb-8">
                    <label class="block text-sm font-medium text-gray-400 mb-2">Contraseña Temporal</label>
                    <input type="text" name="password" required class="input-field w-full rounded-lg px-4 py-3"
                        placeholder="Mínimo 8 caracteres (ej: Temp.1234)">
                    <p class="text-xs text-gray-500 mt-1">El usuario deberá cambiarla al iniciar sesión.</p>
                </div>
                <button type="submit"
                    class="btn-primary w-full py-3 rounded-xl shadow-lg shadow-cyan-500/20 transition-all hover:scale-[1.02]">
                    <i class="fas fa-save mr-2"></i> Crear Usuario
                </button>
            </form>
        </div>

        <!-- Users List -->
        <div class="glass-card rounded-2xl p-8 shadow-xl">
            <h2 class="text-xl font-semibold mb-6 flex items-center">
                <i class="fas fa-users mr-3 text-cyan-400"></i> Usuarios Registrados
            </h2>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="table-header border-b border-gray-700">
                            <th class="p-4 rounded-tl-lg">Nombre</th>
                            <th class="p-4">Email</th>
                            <th class="p-4">Fecha Creación</th>
                            <th class="p-4 rounded-tr-lg text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                        <tr class="table-row border-b border-gray-800">
                            <td class="p-4 text-white font-medium">
                                <?php echo htmlspecialchars($user['name']); ?>
                            </td>
                            <td class="p-4 text-gray-400">
                                <?php echo htmlspecialchars($user['email']); ?>
                            </td>
                            <td class="p-4 text-gray-500 text-sm">
                                <?php echo htmlspecialchars($user['created_at']); ?>
                            </td>
                            <td class="p-4 text-center">
                                <form method="POST" action="" class="inline-block"
                                    onsubmit="return confirm('¿Restablecer contraseña para <?php echo $user['email']; ?>? Se generará una nueva temporal.');">
                                    <input type="hidden" name="reset_password" value="1">
                                    <input type="hidden" name="email_to_reset"
                                        value="<?php echo htmlspecialchars($user['email']); ?>">
                                    <button type="submit" class="text-cyan-400 hover:text-cyan-300 mx-2"
                                        title="Restablecer Contraseña">
                                        <i class="fas fa-key"></i>
                                    </button>
                                </form>
                                <?php if ($user['email'] !== $_SESSION['user_email']): ?>
                                <form method="POST" action="" class="inline-block"
                                    onsubmit="return confirm('¿Eliminar usuario <?php echo $user['email']; ?>? Esta acción no se puede deshacer.');">
                                    <input type="hidden" name="delete_user" value="1">
                                    <input type="hidden" name="email_to_delete"
                                        value="<?php echo htmlspecialchars($user['email']); ?>">
                                    <button type="submit" class="text-red-400 hover:text-red-300 mx-2"
                                        title="Eliminar Usuario">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                                <?php
    endif; ?>
                            </td>
                        </tr>
                        <?php
endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-8 flex justify-center space-x-6 text-sm">
            <a href="config_mail.php" class="text-gray-400 hover:text-white transition-colors">
                <i class="fas fa-arrow-left mr-1"></i> Volver a Configuración
            </a>
            <a href="logout.php" class="text-red-400 hover:text-red-300 transition-colors">
                <i class="fas fa-sign-out-alt mr-1"></i> Cerrar Sesión
            </a>
        </div>
    </div>
</body>

</html>