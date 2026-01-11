<?php

require_once 'BaseModel.php';
class AppointmentRepository extends BaseModel
{
    protected string $table = 'appointments';

    public function findByStatus(string $status): array
    {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE status = :status");
        $stmt->execute(['status' => $status]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function findAll(): array
    {
        $stmt = $this->db->prepare("
            SELECT a.*, 
                   CONCAT(p.first_name, ' ', p.last_name) AS patient_name,
                   CONCAT(d.first_name, ' ', d.last_name) AS doctor_name
            FROM appointments a
            JOIN patients p ON a.patient_id = p.id
            JOIN doctors d ON a.doctor_id = d.id
            ORDER BY a.date DESC, a.time DESC
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
