<?php
require_once '../classes/config/database.php';
require_once '../classes/repositories/BaseModel.php';
require_once '../classes/repositories/DepartmentRepository.php';



$pdo = (new Database())->connect();
$repo = new DepartmentRepository($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $repo->insert([
        'name' => $_POST['name'],
        'location' => $_POST['location'] ?? null
    ]);

    header('Location: ../public/admin/dashboard.php');
    exit;
}
