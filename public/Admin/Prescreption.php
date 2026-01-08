<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="../actions/add_prescription.php" class="space-y-3">
    <input type="date" name="date" required>

    <select name="doctor_id" required>
        <option value="">Doctor</option>
    </select>

    <select name="patient_id" required>
        <option value="">Patient</option>
    </select>

    <select name="medication_id" required>
        <option value="">Medication</option>
    </select>

    <textarea name="dosage_instructions" placeholder="Dosage instructions"></textarea>

    <button>Create Prescription</button>
</form>

</body>
</html>