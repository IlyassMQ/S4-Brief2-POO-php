<?php 
require_once 'admin_protect.php';
require_once __DIR__ . '/../../classes/config/Database.php';
require_once __DIR__ . '/../../classes/repositories/MedicationRepository.php';

$pdo = (new Database())->connect();
$medRepo = new MedicationRepository($pdo);
$medications = $medRepo->findAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Medications</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen font-sans">

<div class="max-w-4xl mx-auto p-8">

    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-extrabold text-gray-800">Medications</h1>
        <p class="text-gray-500 mt-1">Add a new medication and see all existing medications</p>
    </div>

    <!-- Medication Form Card -->
    <div class="bg-white rounded-2xl shadow-lg p-8 max-w-2xl mb-12">

        <h2 class="text-xl font-bold mb-6 text-gray-700">Add New Medication</h2>

        <form method="POST" action="../../actions/add_medication.php" class="space-y-6">

            <div>
                <label class="block text-sm font-semibold mb-1">Medication Name</label>
                <input name="name" required
                       placeholder="Enter medication name"
                       class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-400 focus:outline-none">
            </div>

            <div>
                <label class="block text-sm font-semibold mb-1">Instructions</label>
                <textarea name="instructions" placeholder="Enter instructions"
                          class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-blue-400 focus:outline-none"
                          rows="4"></textarea>
            </div>

            <div class="flex justify-end">
                <button type="submit"
                        class="px-6 py-2 rounded-lg bg-blue-600 text-white font-semibold hover:bg-blue-700 transition shadow">
                    Create Medication
                </button>
            </div>

        </form>
    </div>

    <!-- Medications Table -->
    <div class="bg-white rounded-2xl shadow-lg overflow-hidden">

        <div class="p-6 border-b">
            <h2 class="text-xl font-bold text-gray-700">Existing Medications</h2>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full border-collapse">
                <thead class="bg-gray-100 text-gray-700 text-sm uppercase">
                    <tr>
                        <th class="p-4 text-left">ID</th>
                        <th class="p-4 text-left">Name</th>
                        <th class="p-4 text-left">Instructions</th>
                        <th class="p-4 text-left">Created At</th>
                        <th class="p-4 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 text-sm">
                    <?php foreach ($medications as $m): ?>
                        <tr class="border-t hover:bg-gray-50">
                            <td class="p-4"><?= $m['id'] ?></td>
                            <td class="p-4 font-semibold"><?= htmlspecialchars($m['name']) ?></td>
                            <td class="p-4"><?= htmlspecialchars($m['instructions']) ?></td>
                            <td class="p-4"><?= $m['created_at'] ?></td>
                            <td class="p-4">
                                <form method="POST" action="../actions/delete_medication.php" onsubmit="return confirm('Are you sure you want to delete this medication?');">
                                    <input type="hidden" name="id" value="<?= $m['id'] ?>">
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
