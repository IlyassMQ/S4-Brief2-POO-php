<?php require_once 'admin_protect.php'; ?>

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
        <p class="text-gray-500 mt-1">Add a new medication with instructions for patients</p>
    </div>

    <!-- Medication Form Card -->
    <div class="bg-white rounded-2xl shadow-lg p-8 max-w-2xl">

        <h2 class="text-xl font-bold mb-6 text-gray-700">Add New Medication</h2>

        <form method="POST" action="../actions/add_medication.php" class="space-y-6">

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

</div>

</body>
</html>
