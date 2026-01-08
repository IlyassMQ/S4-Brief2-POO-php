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
<body class="bg-gray-100 min-h-screen p-8 font-sans">

<h2 class="text-2xl font-bold mb-6 text-gray-800">Add Doctor</h2>

<div class="bg-white p-6 rounded-xl shadow-md max-w-md">
    <form method="POST" action="../../actions/add_doctor.php" class="space-y-4">

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
            <label class="block font-semibold mb-1">Specialization</label>
            <input name="specialization" placeholder="Specialization"
                   class="w-full border rounded p-2 focus:ring focus:ring-blue-300">
        </div>

        <div>
            <label class="block font-semibold mb-1">Phone</label>
            <input name="phone" placeholder="Phone"
                   class="w-full border rounded p-2 focus:ring focus:ring-blue-300">
        </div>

        <div>
            <label class="block font-semibold mb-1">Email</label>
            <input name="email" type="email" placeholder="Email"
                   class="w-full border rounded p-2 focus:ring focus:ring-blue-300">
        </div>

        <div>
            <label class="block font-semibold mb-1">Password</label>
            <input type="password" name="password" placeholder="Password"
                   class="w-full border rounded p-2 focus:ring focus:ring-blue-300">
        </div>

        <div>
            <label class="block font-semibold mb-1">Department</label>
            <select name="department_id" required
                    class="w-full border rounded p-2 focus:ring focus:ring-blue-300">
                <option value="">Select Department</option>
                <?php foreach ($departments as $dept): ?>
                    <option value="<?= $dept['id'] ?>"><?= htmlspecialchars($dept['name']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit"
                class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 transition w-full font-semibold">
            Create Doctor
        </button>

    </form>
</div>

</body>
</html>
