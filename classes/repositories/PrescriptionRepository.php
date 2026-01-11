<?php
require_once 'BaseModel.php';
class PrescriptionRepository extends BaseModel
{
    protected string $table = 'prescriptions';

    public function findByDoctor(int $doctorId): array
    {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE doctor_id = :doctor_id");
        $stmt->execute(['doctor_id' => $doctorId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function findAllWithRelations()
    {
    $sql = "
        SELECT p.*,
               CONCAT(d.first_name, ' ', d.last_name) AS doctor_name,
               CONCAT(pa.first_name, ' ', pa.last_name) AS patient_name,
               m.name AS medication_name
        FROM prescriptions p
        JOIN doctors d ON d.id = p.doctor_id
        JOIN patients pa ON pa.id = p.patient_id
        JOIN medications m ON m.id = p.medication_id
        ORDER BY p.date DESC
    ";

    return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

}
