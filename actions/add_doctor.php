<?php
require_once __DIR__ . '/../classes/config/Database.php';
require_once __DIR__ . '/../classes/repositories/UserRepository.php';
require_once __DIR__ . '/../classes/repositories/DoctorRepository.php';

$pdo = (new Database())->connect();

$userRepo = new UserRepository($pdo);
$doctorRepo = new DoctorRepository($pdo);

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../public/admin/add_doctor.php');
    exit;
}

 
$passwordHash = password_hash($_POST['password'], PASSWORD_DEFAULT);

//  INSERT USER 
$userRepo->insert([
    'username' => $_POST['first_name'] . $_POST['last_name'],
    'email' => $_POST['email'],
    'password_hash' => $passwordHash,
    'role_id' => 3 // doctor
]);

// INSERT DOCTOR
$doctorRepo->insert([
    'first_name' => $_POST['first_name'],
    'last_name' => $_POST['last_name'],
    'specialization' => $_POST['specialization'] ?? null,
    'phone' => $_POST['phone'] ?? null,
    'email' => $_POST['email'],
    'department_id' => $_POST['department_id'] ?: null
]);

header('Location: ../public/admin/dashboard.php');
exit;
