<?php
require_once '../../classes/core/SessionManager.php';

SessionManager::start();

if (!SessionManager::isLogged() || !SessionManager::hasRole(1)) {
    header('Location: Login.php');
    exit;
}
