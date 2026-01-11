<?php
require_once '../../classes/core/SessionManager.php';

SessionManager::start();


if (
    !SessionManager::isLogged() ||!(SessionManager::hasRole(1) || SessionManager::hasRole(3))
) {
    header('Location: /S4-Brief2-POO-php/public/Login.php');
    exit;
}
