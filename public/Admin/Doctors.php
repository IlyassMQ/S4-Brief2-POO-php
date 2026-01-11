<?php 
require_once 'admin_protect.php';
require_once __DIR__ . '/../../classes/config/Database.php';
require_once __DIR__ . '/../../classes/repositories/DoctorRepository.php';
require_once __DIR__ . '/../../classes/repositories/DepartmentRepository.php';

$pdo = (new Database())->connect();
$doctorRepo = new DoctorRepository($pdo);
$doctors = $doctorRepo->findAll();

$deptRepo = new DepartmentRepository($pdo);
$departments = $deptRepo->findAll();


$stmt = $pdo->query("
    SELECT d.*, dept.name AS department_name 
    FROM doctors d
    LEFT JOIN departments dept ON d.department_id = dept.id
    ORDER BY d.id DESC
");

$doctors = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Doctors</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen font-sans">

<div class="max-w-7xl mx-auto p-8">

    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-extrabold text-gray-800">Doctors</h1>
        <p class="text-gray-500 mt-1">Create and manage doctor accounts</p>
    </div>

    <!-- Add Doctor Form -->
    <div class="bg-white rounded-2xl shadow-lg p-8 max-w-3xl mb-12">

        <h2 class="text-xl font-bold mb-6 text-gray-700">Add New Doctor</h2>

        <form method="POST" action="../../actions/add_doctor.php"
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
                <input type="email" name="email"
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
                <button type="submit"
                        class="px-6 py-2 rounded-lg bg-blue-600 text-white font-semibold hover:bg-blue-700 transition shadow">
                    Create Doctor
                </button>
            </div>

        </form>
    </div>

    <!-- Doctors Table -->
<div class="bg-white rounded-2xl shadow-lg overflow-hidden">

    <div class="p-6 border-b">
        <h2 class="text-xl font-bold text-gray-700">Existing Doctors</h2>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full border-collapse">
            <thead class="bg-gray-100 text-gray-700 text-sm uppercase">
                <tr>
                    <th class="p-4 text-left">ID</th>
                    <th class="p-4 text-left">Name</th>
                    <th class="p-4 text-left">Specialization</th>
                    <th class="p-4 text-left">Phone</th>
                    <th class="p-4 text-left">Email</th>
                    <th class="p-4 text-left">Department</th>
                    <th class="p-4 text-left">Created</th>
                    <th class="p-4 text-left">Actions</th> <!-- NEW COLUMN -->
                </tr>
            </thead>
            <tbody class="text-gray-700 text-sm">
                <?php foreach ($doctors as $d): ?>
                        <tr class="border-t hover:bg-gray-50">
                            <td class="p-4"><?= $d['id'] ?></td>
                            <td class="p-4 font-semibold"><?= htmlspecialchars($d['first_name'] . ' ' . $d['last_name']) ?></td>
                            <td class="p-4"><?= $d['specialization'] ?></td>
                            <td class="p-4"><?= $d['phone'] ?></td>
                            <td class="p-4"><?= $d['email'] ?></td>
                            <td class="p-4"><?= $d['department_name'] ?></td>
                            <td class="p-4"><?= $d['created_at'] ?></td>
                            <td class="p-4">
                            <form method="POST" action="../../actions/delete/delete_doctor.php" onsubmit="return confirm('Are you sure you want to delete this doctor?');">
                                <input type="hidden" name="id" value="<?=$d['id']?>">
                                <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition text-sm">
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
