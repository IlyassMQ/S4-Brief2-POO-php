<?php
require_once __DIR__ . '/../classes/config/Database.php';
require_once __DIR__ . '/../classes/repositories/UserRepository.php';
require_once __DIR__ . '/../classes/repositories/PatientRepository.php';

$pdo = (new Database())->connect();

$userRepo = new UserRepository($pdo);
$patientRepo = new PatientRepository($pdo);

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../public/admin/add_patient.php');
    exit;
}

$passwordHash = password_hash($_POST['password'], PASSWORD_DEFAULT);

// INSERT USER
$userRepo->insert([
    'username' => $_POST['first_name'] . $_POST['last_name'],
    'email' => $_POST['email'],
    'password_hash' => $passwordHash,
    'role_id' => 2 // patient
]);

//  INSERT PATIENT
$patientRepo->insert([
    'first_name' => $_POST['first_name'],
    'last_name' => $_POST['last_name'],
    'gender' => $_POST['gender'] ?? null,
    'date_of_birth' => $_POST['date_of_birth'] ?? null,
    'phone' => $_POST['phone'] ?? null,
    'email' => $_POST['email']
]);

header('Location: ../public/admin/dashboard.php');
exit;
