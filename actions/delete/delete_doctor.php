<?php

require_once '../../classes/core/SessionManager.php';
require_once '../../classes/config/Database.php';
require_once '../../classes/repositories/DoctorRepository.php';

SessionManager::start();

// Must be logged in
if (!SessionManager::isLogged()) {
    header('Location: /S4-Brief2-POO-php/public/Login.php');
    exit;
}

$pdo = (new Database())->connect();
$repo = new DoctorRepository($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $repo->delete((int) $_POST['id']);
    

    // Redirect based on role
    if (SessionManager::hasRole(1)) {
        header('Location: /S4-Brief2-POO-php/public/Admin/Dashboard.php');
    } elseif (SessionManager::hasRole(3)) {
        header('Location: /S4-Brief2-POO-php/public/Doctor/Dashboard.php');
    } else {
        header('Location: /S4-Brief2-POO-php/public/Login.php');
    }

    exit;
}
