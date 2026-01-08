<?php
require_once '../classes/repositories/MedicationRepository.php';
require_once '../classes/config/database.php';
require_once '../classes/repositories/BaseModel.php';



$pdo = (new Database())->connect();
$repo = new MedicationRepository($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $repo->insert([
        'name' => $_POST['name'],
        'instructions' => $_POST['instructions'] ?? null
    ]);

    header('Location: ../public/admin/dashboard.php');
    exit;
}
