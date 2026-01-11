<?php 
require_once 'Doctor_protect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Doctor Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
</head>
<body class="bg-gray-100 min-h-screen font-sans">

    <div class="max-w-7xl mx-auto p-6">
        <h1 class="text-4xl font-extrabold text-gray-800 mb-8">Doctor Dashboard</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">

            <!-- Patients -->
            <a href="../Admin/Patients.php" class="bg-white rounded-xl shadow-md p-6 flex flex-col items-center justify-center hover:shadow-xl hover:scale-105 transition transform">
                <i data-feather="users" class="w-10 h-10 mb-3 text-purple-500"></i>
                <span class="text-lg font-semibold text-gray-700">Manage Patients</span>
            </a>

            <!-- Appointments -->
            <a href="../Admin/Appointement.php" class="bg-white rounded-xl shadow-md p-6 flex flex-col items-center justify-center hover:shadow-xl hover:scale-105 transition transform">
                <i data-feather="calendar" class="w-10 h-10 mb-3 text-red-500"></i>
                <span class="text-lg font-semibold text-gray-700">Manage Appointments</span>
            </a>

            <!-- Prescriptions -->
            <a href="Prescriptions.php" class="bg-white rounded-xl shadow-md p-6 flex flex-col items-center justify-center hover:shadow-xl hover:scale-105 transition transform">
                <i data-feather="file-text" class="w-10 h-10 mb-3 text-green-500"></i>
                <span class="text-lg font-semibold text-gray-700">Manage Prescriptions</span>
            </a>

            <!-- Logout -->
            <a href="../Logout.php" class="bg-red-500 text-white rounded-xl shadow-md p-6 flex flex-col items-center justify-center hover:bg-red-600 hover:shadow-xl hover:scale-105 transition transform">
                <i data-feather="log-out" class="w-10 h-10 mb-3"></i>
                <span class="text-lg font-semibold">Logout</span>
            </a>

        </div>
    </div>

    <script>
        feather.replace();
    </script>
</body>
</html>
