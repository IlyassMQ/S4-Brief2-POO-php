<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
</head>
<body class="bg-gray-100 min-h-screen font-sans">

    <div class="max-w-7xl mx-auto p-6">
        <h1 class="text-4xl font-extrabold text-gray-800 mb-8">Admin Dashboard</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">

            <a href="Departements.php" class="bg-white rounded-xl shadow-md p-6 flex flex-col items-center justify-center hover:shadow-xl hover:scale-105 transition transform">
                <i data-feather="layers" class="w-10 h-10 mb-3 text-blue-500"></i>
                <span class="text-lg font-semibold text-gray-700">Departments</span>
            </a>

            <a href="Doctors.php" class="bg-white rounded-xl shadow-md p-6 flex flex-col items-center justify-center hover:shadow-xl hover:scale-105 transition transform">
                <i data-feather="user" class="w-10 h-10 mb-3 text-green-500"></i>
                <span class="text-lg font-semibold text-gray-700">Doctors</span>
            </a>

            <a href="Patients.php" class="bg-white rounded-xl shadow-md p-6 flex flex-col items-center justify-center hover:shadow-xl hover:scale-105 transition transform">
                <i data-feather="users" class="w-10 h-10 mb-3 text-purple-500"></i>
                <span class="text-lg font-semibold text-gray-700">Patients</span>
            </a>

            <a href="Medications.php" class="bg-white rounded-xl shadow-md p-6 flex flex-col items-center justify-center hover:shadow-xl hover:scale-105 transition transform">
                <i data-feather="box" class="w-10 h-10 mb-3 text-yellow-500"></i>
                <span class="text-lg font-semibold text-gray-700">Medications</span>
            </a>

            <a href="Appointments.php" class="bg-white rounded-xl shadow-md p-6 flex flex-col items-center justify-center hover:shadow-xl hover:scale-105 transition transform">
                <i data-feather="calendar" class="w-10 h-10 mb-3 text-red-500"></i>
                <span class="text-lg font-semibold text-gray-700">Appointments</span>
            </a>

            <a href="Stats.php" class="bg-white rounded-xl shadow-md p-6 flex flex-col items-center justify-center hover:shadow-xl hover:scale-105 transition transform">
                <i data-feather="bar-chart-2" class="w-10 h-10 mb-3 text-indigo-500"></i>
                <span class="text-lg font-semibold text-gray-700">Statistics</span>
            </a>

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
