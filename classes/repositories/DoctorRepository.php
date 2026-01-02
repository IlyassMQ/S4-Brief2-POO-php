<?php
require 'BaseModel.php';

class DoctorRepository extends BaseModel
{

    protected string $table = 'doctors';

    public function findBySpecialization(string $specialization){
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE specialization = :spec");
        $stmt->execute(['specialization' => $specialization]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}