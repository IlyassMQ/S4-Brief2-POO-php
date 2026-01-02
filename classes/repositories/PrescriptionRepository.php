<?php
require 'BaseModel.php';
class PrescriptionRepository extends BaseModel
{
    protected string $table = 'prescriptions';

    public function findByDoctor(int $doctorId): array
    {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE doctor_id = :doctor_id");
        $stmt->execute(['doctor_id' => $doctorId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
