<?php
require_once '../../classes/core/SessionManager.php';

SessionManager::start();


$user = SessionManager::getUser();

if (!$user) {
    header('Location: ../login.php');
    exit;
}


if ($user['role'] != 3 && $user['role'] != 1) {
    header('Location: ../login.php');
    exit;
}
