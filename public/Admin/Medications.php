<?php require_once 'admin_protect.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Medications</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-8 bg-gray-100">

<h2 class="text-xl font-bold mb-4">Medications</h2>

<form method="POST" action="../actions/add_medication.php" class="space-y-3">
    <input name="name" placeholder="Medication name" required>

    <textarea name="instructions" placeholder="Instructions"></textarea>

    <button>Create Medication</button>
</form>


</body>
</html>
