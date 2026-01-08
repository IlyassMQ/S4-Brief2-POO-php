<?php
require_once __DIR__ . '/../classes/core/SessionManager.php';

SessionManager::start();
SessionManager::logout();

// redirect to login
header('Location: Login.php');
exit;
