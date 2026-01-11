<?php 
require_once 'admin_protect.php';
require_once __DIR__ . '/../../classes/config/Database.php';
require_once __DIR__ . '/../../classes/repositories/DoctorRepository.php';
require_once __DIR__ . '/../../classes/repositories/PatientRepository.php';
require_once __DIR__ . '/../../classes/repositories/AppointmentRepository.php';

$pdo = (new Database())->connect();

$doctorRepo = new DoctorRepository($pdo);
$doctors = $doctorRepo->findAll();

$patientRepo = new PatientRepository($pdo);
$patients = $patientRepo->findAll();

$appointmentRepo = new AppointmentRepository($pdo);
$appointments = $appointmentRepo->findAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Appointments</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen font-sans">

<div class="max-w-6xl mx-auto p-8">

    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-extrabold text-gray-800">Appointments</h1>
        <p class="text-gray-500 mt-1">Create and manage appointments for patients and doctors</p>
    </div>

    <!-- Appointment Form Card -->
    <div class="bg-white rounded-2xl shadow-lg p-8 mb-12 max-w-3xl">

        <h2 class="text-xl font-bold mb-6 text-gray-700">Add New Appointment</h2>

        <form method="POST" action="../../actions/add_appointment.php" class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <div>
                <label class="block text-sm font-semibold mb-1">Date</label>
                <input type="date" name="date" required
                       class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>

            <div>
                <label class="block text-sm font-semibold mb-1">Time</label>
                <input type="time" name="time" required
                       class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>

            <div>
                <label class="block text-sm font-semibold mb-1">Doctor</label>
                <select name="doctor_id" required
                        class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-400 focus:outline-none">
                    <option value="">Select Doctor</option>
                    <?php foreach ($doctors as $doc): ?>
                        <option value="<?= $doc['id'] ?>">
                            <?= htmlspecialchars($doc['first_name'] . ' ' . $doc['last_name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div>
                <label class="block text-sm font-semibold mb-1">Patient</label>
                <select name="patient_id" required
                        class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-400 focus:outline-none">
                    <option value="">Select Patient</option>
                    <?php foreach ($patients as $pat): ?>
                        <option value="<?= $pat['id'] ?>">
                            <?= htmlspecialchars($pat['first_name'] . ' ' . $pat['last_name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-semibold mb-1">Reason</label>
                <textarea name="reason" placeholder="Reason for appointment"
                          class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-400 focus:outline-none"
                          rows="3"></textarea>
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-semibold mb-1">Status</label>
                <select name="status"
                        class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-400 focus:outline-none">
                    <option value="scheduled">Scheduled</option>
                    <option value="done">Done</option>
                    <option value="cancelled">Cancelled</option>
                </select>
            </div>

            <!-- Actions -->
            <div class="md:col-span-2 flex justify-end gap-4 mt-4">
                <button type="submit"
                        class="px-6 py-2 rounded-lg bg-blue-600 text-white font-semibold hover:bg-blue-700 transition shadow">
                    Create Appointment
                </button>
            </div>

        </form>
    </div>

    <!-- Appointments Table -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">

        <div class="p-6 border-b">
            <h2 class="text-xl font-bold text-gray-700">Existing Appointments</h2>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full border-collapse text-sm text-gray-700">
                <thead class="bg-gray-100 uppercase font-semibold text-gray-700">
                    <tr>
                        <th class="p-4 text-left">Patient</th>
                        <th class="p-4 text-left">Doctor</th>
                        <th class="p-4 text-left">Date</th>
                        <th class="p-4 text-left">Time</th>
                        <th class="p-4 text-left">Status</th>
                        <th class="p-4 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($appointments as $a): ?>
                        <tr class="border-t hover:bg-gray-50">
                            <td class="p-4"><?= $a['patient_name'] ?></td>
                            <td class="p-4"><?= $a['doctor_name'] ?></td>
                            <td class="p-4"><?= $a['date'] ?></td>
                            <td class="p-4"><?= $a['time'] ?></td>
                            <td class="p-4"><?= $a['status']?></td>
                            <td class="p-4">
                                <form method="POST" action="../actions/delete_appointment.php" onsubmit="return confirm('Are you sure?');">
                                    <input type="hidden" name="id" value="<?= $a['id'] ?>">
                                    <button type="submit"
                                            class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition text-sm">
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

</div>

</body>
</html>
