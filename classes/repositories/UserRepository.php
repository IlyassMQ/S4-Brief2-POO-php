<?php
require_once 'BaseModel.php';

class UserRepository extends BaseModel
{
    protected string $table = 'users';

    public function findByEmail(string $email){
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE email = :email LIMIT 1");
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user ?: null;
    }
}
