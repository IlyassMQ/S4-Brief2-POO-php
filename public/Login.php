<?php
require_once __DIR__ . '/../classes/core/SessionManager.php';
require_once __DIR__ . '/../classes/repositories/UserRepository.php';
require_once __DIR__ . '/../classes/config/Database.php';


SessionManager::start();
$error = '';
$success = '';

$pdo = (new Database())->connect();
$userRepo = new UserRepository($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $user = $userRepo->findByEmail($email);

    if (!$user) {
        $error = 'Utilisateur introuvable';
    } elseif (!password_verify($password, $user['password_hash'])) {
        $error = 'Mot de passe incorrect';
    } else {
        
        SessionManager::setUser([
            'id' => $user['id'],
            'email' => $user['email'],
            'username' => $user['username'],
            'role' => $user['role_id']
        ]);

        switch ($user['role_id']) {
            case 1: 
                header('Location: Admin/Dashboard.php');
                exit;
            case 2: 
                header('Location: Patient/Dashboard.php');
                exit;
            case 3: 
                header('Location: Doctor/D_Dashboard.php');
                exit;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Se connecter</h2>

        <?php if ($error): ?>
            <p class="bg-red-100 text-red-700 p-2 mb-4 rounded"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>

        <?php if ($success): ?>
            <p class="bg-green-100 text-green-700 p-2 mb-4 rounded"><?= htmlspecialchars($success) ?></p>
        <?php endif; ?>

        <form method="POST" class="space-y-4">
            <div>
                <label class="block mb-1 font-semibold">Email</label>
                <input type="email" name="email" required
                    class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300">
            </div>

            <div>
                <label class="block mb-1 font-semibold">Mot de passe</label>
                <input type="password" name="password" required
                    class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:border-blue-300">
            </div>

            <button type="submit"
                class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600 transition">Se connecter</button>
        </form>
    </div>
</body>
</html>
