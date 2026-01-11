<?php
require_once __DIR__ . '/Doctor_protect.php';

require_once __DIR__ . '/../../classes/config/Database.php';
require_once __DIR__ . '/../../classes/repositories/PrescriptionRepository.php';
require_once __DIR__ . '/../../classes/repositories/DoctorRepository.php';
require_once __DIR__ . '/../../classes/repositories/PatientRepository.php';
require_once __DIR__ . '/../../classes/repositories/MedicationRepository.php';

$pdo = (new Database())->connect();

$prescriptionRepo = new PrescriptionRepository($pdo);
$prescriptions = $prescriptionRepo->findAllWithRelations();

$doctorRepo = new DoctorRepository($pdo);
$doctors = $doctorRepo->findAll();

$patientRepo = new PatientRepository($pdo);
$patients = $patientRepo->findAll();

$medRepo = new MedicationRepository($pdo);
$medications = $medRepo->findAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Prescriptions</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen font-sans">

<div class="max-w-6xl mx-auto p-8">

    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-extrabold text-gray-800">Prescriptions</h1>
        <p class="text-gray-500 mt-1">Create and manage medical prescriptions</p>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-2xl shadow-lg p-8 mb-12 max-w-3xl">
        <h2 class="text-xl font-bold mb-6 text-gray-700">Add Prescription</h2>

        <form method="POST" action="../../actions/add_prescription.php"
              class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <div>
                <label class="block text-sm font-semibold mb-1">Date</label>
                <input type="date" name="date" required
                       class="w-full border rounded-lg p-3">
            </div>

            <div>
                <label class="block text-sm font-semibold mb-1">Doctor</label>
                <select name="doctor_id" required class="w-full border rounded-lg p-3">
                    <option value="">Select doctor</option>
                    <?php foreach ($doctors as $d): ?>
                        <option value="<?= $d['id'] ?>">
                            <?=$d['first_name'].' '.$d['last_name'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div>
                <label class="block text-sm font-semibold mb-1">Patient</label>
                <select name="patient_id" required class="w-full border rounded-lg p-3">
                    <option value="">Select patient</option>
                    <?php foreach ($patients as $p): ?>
                        <option value="<?= $p['id'] ?>">
                            <?=$p['first_name'].' '.$p['last_name'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div>
                <label class="block text-sm font-semibold mb-1">Medication</label>
                <select name="medication_id" required class="w-full border rounded-lg p-3">
                    <option value="">Select medication</option>
                    <?php foreach ($medications as $m): ?>
                        <option value="<?= $m['id'] ?>">
                            <?= $m['name'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-semibold mb-1">Dosage Instructions</label>
                <textarea name="dosage_instructions" rows="3"
                          class="w-full border rounded-lg p-3"></textarea>
            </div>

            <div class="md:col-span-2 flex justify-end">
                <button type="submit"
                        class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                    Create Prescription
                </button>
            </div>

        </form>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
        <div class="p-6 border-b">
            <h2 class="text-xl font-bold text-gray-700">Existing Prescriptions</h2>
        </div>

        <table class="w-full text-sm text-gray-700">
            <thead class="bg-gray-100 uppercase">
                <tr>
                    <th class="p-4 text-left">Date</th>
                    <th class="p-4 text-left">Doctor</th>
                    <th class="p-4 text-left">Patient</th>
                    <th class="p-4 text-left">Medication</th>
                    <th class="p-4 text-left">Instructions</th>
                    <th class="p-4 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($prescriptions as $pr): ?>
                    <tr class="border-t hover:bg-gray-50">
                        <td class="p-4"><?= $pr['date'] ?></td>
                        <td class="p-4"><?= $pr['doctor_name'] ?></td>
                        <td class="p-4"><?= $pr['patient_name'] ?></td>
                        <td class="p-4"><?= $pr['medication_name'] ?></td>
                        <td class="p-4"><?= $pr['dosage_instructions'] ?></td>
                        <td class="p-4">
                            <form method="POST" action="../../actions/delete/delete_prescription.php"
                                  onsubmit="return confirm('Delete prescription?');">
                                <input type="hidden" name="id" value="<?= $pr['id'] ?>">
                                <button class="px-3 py-1 bg-red-500 text-white rounded">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>
</body>
</html>
