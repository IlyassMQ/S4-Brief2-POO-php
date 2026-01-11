<?php

require_once '../../classes/core/SessionManager.php';
require_once '../../classes/config/Database.php';
require_once '../../classes/repositories/MedicationRepository.php';

SessionManager::start();


if (!SessionManager::isLogged()) {
    header('Location: /S4-Brief2-POO-php/public/Login.php');
    exit;
}

$pdo = (new Database())->connect();
$repo = new MedicationRepository($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $repo->delete( $_POST['id']);

    if (SessionManager::hasRole(1)) {
        header('Location: /S4-Brief2-POO-php/public/Admin/Dashboard.php');
    } elseif (SessionManager::hasRole(3)) {
        header('Location: /S4-Brief2-POO-php/public/Doctor/Dashboard.php');
    }

    exit;
}
