<?php
abstract class BaseModel
{
    protected PDO $db;
    protected string $table;

    public function __construct(PDO $db){
            $this->db = $db;
    }

    public function insert(array $data): bool
    {
        $columns = array_keys($data);
        $fields = implode(',', $columns);
        $values = ':' . implode(',:', $columns);

        $sql = "INSERT INTO {$this->table} ($fields) VALUES ($values)";
        $stmt = $this->db->prepare($sql);

        return $stmt->execute($data);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE id = :id");
        $stmt->bindParam(':id',$id);
       return $stmt->execute();
    }



}

