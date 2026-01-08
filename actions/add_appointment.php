<?php
require_once '../classes/repositories/AppointementRepository.php';
require_once '../classes/config/database.php';
require_once '../classes/repositories/BaseModel.php';


$pdo = (new Database())->connect();
$repo = new AppointmentRepository($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $repo->insert([
        'date' => $_POST['date'],
        'time' => $_POST['time'],
        'doctor_id' => $_POST['doctor_id'],
        'patient_id' => $_POST['patient_id'],
        'reason' => $_POST['reason'] ?? null,
        'status' => 'scheduled'
    ]);

    header('Location: ../public/admin/dashboard.php');
    exit;
}
