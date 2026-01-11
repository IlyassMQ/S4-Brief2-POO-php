<?php 
require_once 'admin_protect.php';
require_once __DIR__ . '/../../classes/config/Database.php';
require_once __DIR__ . '/../../classes/repositories/PatientRepository.php';

$pdo = (new Database())->connect();
$patientRepo = new PatientRepository($pdo);
$patients = $patientRepo->findAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Patients</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen font-sans">

<div class="max-w-7xl mx-auto p-8">

    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-extrabold text-gray-800">Patients</h1>
        <p class="text-gray-500 mt-1">Create and manage patient accounts</p>
    </div>

    <!-- Add Patient Form -->
    <div class="bg-white rounded-2xl shadow-lg p-8 max-w-3xl mb-12">

        <h2 class="text-xl font-bold mb-6 text-gray-700">Add New Patient</h2>

        <form method="POST" action="../../actions/add_patient.php"
              class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <div>
                <label class="block text-sm font-semibold mb-1">First Name</label>
                <input name="first_name" required
                       class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>

            <div>
                <label class="block text-sm font-semibold mb-1">Last Name</label>
                <input name="last_name" required
                       class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>

            <div>
                <label class="block text-sm font-semibold mb-1">Gender</label>
                <select name="gender"
                        class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-400 focus:outline-none">
                    <option value="">Select Gender</option>
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-semibold mb-1">Date of Birth</label>
                <input type="date" name="date_of_birth"
                       class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>

            <div>
                <label class="block text-sm font-semibold mb-1">Phone</label>
                <input name="phone"
                       class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>

            <div>
                <label class="block text-sm font-semibold mb-1">Email</label>
                <input type="email" name="email"
                       class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-semibold mb-1">Address</label>
                <textarea name="address" rows="3"
                          class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-400 focus:outline-none"></textarea>
            </div>

            <div>
                <label class="block text-sm font-semibold mb-1">Password</label>
                <input type="password" name="password"
                       class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>

            <!-- Actions -->
            <div class="md:col-span-2 flex justify-end gap-4 mt-4">
                <button type="submit"
                        class="px-6 py-2 rounded-lg bg-blue-600 text-white font-semibold hover:bg-blue-700 transition shadow">
                    Create Patient
                </button>
            </div>

        </form>
    </div>

    <!-- Patients Table -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">

        <div class="p-6 border-b">
            <h2 class="text-xl font-bold text-gray-700">Existing Patients</h2>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full border-collapse">
                <thead class="bg-gray-100 text-gray-700 text-sm uppercase">
                    <tr>
                        <th class="p-4 text-left">ID</th>
                        <th class="p-4 text-left">Name</th>
                        <th class="p-4 text-left">Gender</th>
                        <th class="p-4 text-left">Birth Date</th>
                        <th class="p-4 text-left">Phone</th>
                        <th class="p-4 text-left">Email</th>
                        <th class="p-4 text-left">Created</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 text-sm">
                    <?php foreach ($patients as $p): ?>
                        <tr class="border-t hover:bg-gray-50">
                            <td class="p-4"><?=$p['id'] ?></td>
                            <td class="p-4 font-semibold">
                                <?= htmlspecialchars($p['first_name'] . ' ' . $p['last_name']) ?>
                            </td>
                            <td class="p-4"><?=$p['gender']?></td>
                            <td class="p-4"><?=$p['date_of_birth'] ?></td>
                            <td class="p-4"><?=$p['phone'] ?></td>
                            <td class="p-4"><?=$p['email'] ?></td>
                            <td class="p-4"><?=$p['created_at'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>

</div>

</body>
</html>
