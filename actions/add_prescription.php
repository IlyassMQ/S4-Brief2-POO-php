<?php
require_once '../classes/repositories/PrescriptionRepository.php';
require_once '../classes/config/database.php';
require_once '../classes/repositories/BaseModel.php';


$pdo = (new Database())->connect();
$repo = new PrescriptionRepository($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $repo->insert([
        'date' => $_POST['date'],
        'doctor_id' => $_POST['doctor_id'],
        'patient_id' => $_POST['patient_id'],
        'medication_id' => $_POST['medication_id'],
        'dosage_instructions' => $_POST['dosage_instructions'] ?? null
    ]);

    header('Location: ../public/admin/dashboard.php');
    exit;
}
