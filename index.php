<?php
require_once __DIR__ . '/classes/core/SessionManager.php';
require_once 'classes/core/SessionManager.php';

SessionManager::start();

if (!SessionManager::isLogged()) {
    header('Location: public/Login.php');
    exit;
}

// user is logged
$user = SessionManager::getUser();

if ($user['role'] == 1) { // admin
    header('Location: public/Admin/Dashboard.php');
    exit;
}





