<?php
require 'BaseModel.php';

class PatientRepository extends BaseModel{

    protected string $table = 'patients';

    public function findByEmail(string $email){
       $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE email = :email");
       $stmt->execute(['email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }


    
}
