<?php
session_start();

define('USERS_FILE', __DIR__ . '/../config/users.json');

// --- User Management Functions ---

function loadUsers()
{
    if (!file_exists(USERS_FILE)) {
        return [];
    }
    $users = json_decode(file_get_contents(USERS_FILE), true);
    return is_array($users) ? $users : [];
}

function saveUsers($users)
{
    return file_put_contents(USERS_FILE, json_encode($users, JSON_PRETTY_PRINT));
}

function findUserByEmail($email)
{
    $users = loadUsers();
    foreach ($users as $user) {
        if ($user['email'] === $email) {
            return $user;
        }
    }
    return null;
}

function login($email, $password)
{
    $user = findUserByEmail($email);
    if ($user && password_verify($password, $user['password_hash'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['must_change_password'] = $user['must_change_password'] ?? false;
        return true;
    }
    return false;
}

function createUser($name, $email, $password, $isTemporary = true)
{
    $users = loadUsers();

    // Check if email already exists
    foreach ($users as $u) {
        if ($u['email'] === $email) {
            return false; // Email already taken
        }
    }

    $newUser = [
        'id' => uniqid(),
        'name' => $name,
        'email' => $email,
        'password_hash' => password_hash($password, PASSWORD_DEFAULT),
        'must_change_password' => $isTemporary,
        'created_at' => date('Y-m-d H:i:s')
    ];

    $users[] = $newUser;
    saveUsers($users);
    return true;
}

function changePassword($email, $newPassword)
{
    $users = loadUsers();
    foreach ($users as &$user) {
        if ($user['email'] === $email) {
            $user['password_hash'] = password_hash($newPassword, PASSWORD_DEFAULT);
            $user['must_change_password'] = false; // Reset flag
            saveUsers($users);

            // Update session if it's the current user
            if (isset($_SESSION['user_email']) && $_SESSION['user_email'] === $email) {
                $_SESSION['must_change_password'] = false;
            }
            return true;
        }
    }
    return false;
}

function deleteUser($email)
{
    $users = loadUsers();
    $newUsers = [];
    $found = false;

    foreach ($users as $user) {
        if ($user['email'] === $email) {
            $found = true;
            continue; // Skip adding this user to the new list
        }
        $newUsers[] = $user;
    }

    if ($found) {
        saveUsers($newUsers);
        return true;
    }
    return false;
}

function resetPassword($email, $tempPassword)
{
    $users = loadUsers();
    foreach ($users as &$user) {
        if ($user['email'] === $email) {
            $user['password_hash'] = password_hash($tempPassword, PASSWORD_DEFAULT);
            $user['must_change_password'] = true; // Force change on next login
            saveUsers($users);
            return true;
        }
    }
    return false;
}

function logout()
{
    session_unset();
    session_destroy();
}

// --- Middleware Functions ---

function requireAuth()
{
    if (!isset($_SESSION['user_id'])) {
        header('Location: login.php');
        exit;
    }
}

function requirePasswordChange()
{
    if (isset($_SESSION['must_change_password']) && $_SESSION['must_change_password'] === true) {
        // Prevent redirect loop if already on change_password.php
        $currentPage = basename($_SERVER['PHP_SELF']);
        if ($currentPage !== 'change_password.php' && $currentPage !== 'logout.php') {
            header('Location: change_password.php');
            exit;
        }
    }
}

// Ensure admin user exists on load (Self-healing / Init)
// In a real app, this would be a separate install script.
// Here we just ensure the file isn't empty on load if possible.
// For now, relies on manual creation via write_to_file or script.
?>