<?php
require_once 'BaseModel.php';

class DoctorRepository extends BaseModel
{

    private string $table = 'doctors';

    public function findBySpecialization(string $specialization){
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE specialization = :specialization");
        $stmt->execute(['specialization' => $specialization]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}