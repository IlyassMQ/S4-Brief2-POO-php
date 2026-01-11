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
}
