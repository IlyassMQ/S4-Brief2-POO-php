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
    <title>Departments</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-8 font-sans">

<h2 class="text-2xl font-bold mb-6 text-gray-800">Departments</h2>

<!-- Form -->
<div class="bg-white p-6 rounded-xl shadow-md mb-8 max-w-md">
    <form method="POST" action="../../actions/add_departement.php" class="space-y-4">
        <div>
            <label class="block font-semibold mb-1">Department Name</label>
            <input name="name" placeholder="Department name" required class="w-full border rounded p-2 focus:ring focus:ring-blue-300">
        </div>

        <div>
            <label class="block font-semibold mb-1">Location</label>
            <input name="location" placeholder="Location" class="w-full border rounded p-2 focus:ring focus:ring-blue-300">
        </div>

        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 transition w-full font-semibold">
            Create Department
        </button>
    </form>
</div>

<!-- Table -->
<div class="overflow-x-auto">
    <table class="w-full bg-white rounded-xl shadow-md border-collapse">
        <thead>
            <tr class="bg-gray-100 text-gray-700 font-semibold">
                <th class="p-3 text-left border-b">ID</th>
                <th class="p-3 text-left border-b">Name</th>
                <th class="p-3 text-left border-b">Location</th>
                <th class="p-3 text-left border-b">Created At</th>
                <th class="p-3 text-left border-b">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($departments as $dept): ?>
                <tr class="hover:bg-gray-50">
                    <td class="p-3 border-b"><?= htmlspecialchars($dept['id']) ?></td>
                    <td class="p-3 border-b"><?= htmlspecialchars($dept['name']) ?></td>
                    <td class="p-3 border-b"><?= htmlspecialchars($dept['location']) ?></td>
                    <td class="p-3 border-b"><?= htmlspecialchars($dept['created_at']) ?></td>
                    <td class="p-3 border-b">
                    <form method="POST"
                            action="../../actions/delete/delete_departement.php"
                            onsubmit="return confirm('Are you sure you want to delete this department?');">
                            <input type="hidden" name="id" value="<?= $dept['id'] ?>">
                            <button type="submit"
                                    class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition">
                                Delete
                            </button>
                        </form>
                    </td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>
