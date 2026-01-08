<?php require_once 'admin_protect.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Appointments</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-8 bg-gray-100">

<h2 class="text-xl font-bold mb-4">Appointments</h2>

<form method="POST" action="../actions/add_appointment.php" class="space-y-3">
    <input type="date" name="date" required>
    <input type="time" name="time" required>

    <select name="doctor_id" required>
        <option value="">Doctor</option>
        <!-- doctors -->
    </select>

    <select name="patient_id" required>
        <option value="">Patient</option>
        <!-- patients -->
    </select>

    <textarea name="reason" placeholder="Reason"></textarea>

    <select name="status">
        <option value="scheduled">Scheduled</option>
        <option value="done">Done</option>
        <option value="cancelled">Cancelled</option>
    </select>

    <button>Create Appointment</button>
</form>


<table class="w-full bg-white rounded shadow">
    <tr>
        <th class="p-2">Patient</th>
        <th class="p-2">Doctor</th>
        <th class="p-2">Date</th>
        <th class="p-2">Status</th>
    </tr>
</table>

</body>
</html>
