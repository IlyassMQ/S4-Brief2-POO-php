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
    <title>Add Patient</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-8 font-sans">

<h2 class="text-2xl font-bold mb-6 text-gray-800">Add Patient</h2>

<!-- Form -->
<div class="bg-white p-6 rounded-xl shadow-md max-w-md mb-8">
    <form method="POST" action="../../actions/add_patient.php" class="space-y-4">

        <div>
            <label class="block font-semibold mb-1">First Name</label>
            <input name="first_name" placeholder="First name" required
                   class="w-full border rounded p-2 focus:ring focus:ring-blue-300">
        </div>

        <div>
            <label class="block font-semibold mb-1">Last Name</label>
            <input name="last_name" placeholder="Last name" required
                   class="w-full border rounded p-2 focus:ring focus:ring-blue-300">
        </div>

        <div>
            <label class="block font-semibold mb-1">Gender</label>
            <select name="gender" class="w-full border rounded p-2 focus:ring focus:ring-blue-300">
                <option value="">Select Gender</option>
                <option value="M">Male</option>
                <option value="F">Female</option>
            </select>
        </div>

        <div>
            <label class="block font-semibold mb-1">Date of Birth</label>
            <input type="date" name="date_of_birth"
                   class="w-full border rounded p-2 focus:ring focus:ring-blue-300">
        </div>

        <div>
            <label class="block font-semibold mb-1">Phone</label>
            <input name="phone" placeholder="Phone"
                   class="w-full border rounded p-2 focus:ring focus:ring-blue-300">
        </div>

        <div>
            <label class="block font-semibold mb-1">Email</label>
            <input type="email" name="email" placeholder="Email"
                   class="w-full border rounded p-2 focus:ring focus:ring-blue-300">
        </div>

        <div>
            <label class="block font-semibold mb-1">Address</label>
            <textarea name="address" placeholder="Address"
                      class="w-full border rounded p-2 focus:ring focus:ring-blue-300"></textarea>
        </div>

        <div>
            <label class="block font-semibold mb-1">Password</label>
            <input type="password" name="password" placeholder="Password"
                   class="w-full border rounded p-2 focus:ring focus:ring-blue-300">
        </div>

        <button type="submit"
                class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 transition w-full font-semibold">
            Create Patient
        </button>

    </form>
</div>

<!-- Table of existing patients -->
<div class="overflow-x-auto">
    <table class="w-full bg-white rounded-xl shadow-md border-collapse">
        <thead>
            <tr class="bg-gray-100 text-gray-700 font-semibold">
                <th class="p-3 text-left border-b">ID</th>
                <th class="p-3 text-left border-b">Name</th>
                <th class="p-3 text-left border-b">Gender</th>
                <th class="p-3 text-left border-b">Birth Date</th>
                <th class="p-3 text-left border-b">Phone</th>
                <th class="p-3 text-left border-b">Email</th>
                <th class="p-3 text-left border-b">Created At</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($patients as $p): ?>
                <tr class="hover:bg-gray-50">
                    <td class="p-3 border-b"><?= htmlspecialchars($p['id']) ?></td>
                    <td class="p-3 border-b"><?= htmlspecialchars($p['first_name'] . ' ' . $p['last_name']) ?></td>
                    <td class="p-3 border-b"><?= htmlspecialchars($p['gender']) ?></td>
                    <td class="p-3 border-b"><?= htmlspecialchars($p['date_of_birth']) ?></td>
                    <td class="p-3 border-b"><?= htmlspecialchars($p['phone']) ?></td>
                    <td class="p-3 border-b"><?= htmlspecialchars($p['email']) ?></td>
                    <td class="p-3 border-b"><?= htmlspecialchars($p['created_at']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>
