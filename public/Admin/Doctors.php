<?php
require_once 'admin_protect.php';
require_once __DIR__ . '/../../classes/config/Database.php';
require_once __DIR__ . '/../../classes/repositories/DepartmentRepository.php';

$pdo = (new Database())->connect();
$deptRepo = new DepartmentRepository($pdo);
$departments = $deptRepo->findAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Doctor</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen font-sans">

<div class="max-w-5xl mx-auto p-8">

    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-extrabold text-gray-800">Add Doctor</h1>
        <p class="text-gray-500 mt-1">Create a new doctor account and assign a department</p>
    </div>

    <!-- Card -->
    <div class="bg-white rounded-2xl shadow-lg p-8 max-w-2xl">

        <form method="POST" action="../../actions/add_doctor.php" class="grid grid-cols-1 md:grid-cols-2 gap-6">

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
                <label class="block text-sm font-semibold mb-1">Specialization</label>
                <input name="specialization"
                       class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>

            <div>
                <label class="block text-sm font-semibold mb-1">Phone</label>
                <input name="phone"
                       class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>

            <div>
                <label class="block text-sm font-semibold mb-1">Email</label>
                <input name="email" type="email"
                       class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>

            <div>
                <label class="block text-sm font-semibold mb-1">Password</label>
                <input type="password" name="password"
                       class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-semibold mb-1">Department</label>
                <select name="department_id" required
                        class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-400 focus:outline-none">
                    <option value="">Select Department</option>
                    <?php foreach ($departments as $dept): ?>
                        <option value="<?= $dept['id'] ?>">
                            <?= htmlspecialchars($dept['name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Actions -->
            <div class="md:col-span-2 flex justify-end gap-4 mt-4">
                <a href="Doctors.php"
                   class="px-6 py-2 rounded-lg border font-semibold text-gray-600 hover:bg-gray-100 transition">
                    Cancel
                </a>

                <button type="submit"
                        class="px-6 py-2 rounded-lg bg-blue-600 text-white font-semibold hover:bg-blue-700 transition shadow">
                    Create Doctor
                </button>
            </div>

        </form>
    </div>

</div>

</body>
</html>
