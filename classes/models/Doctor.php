<?php
require 'User.php';
class Doctor extends User
{
    private string $firstName;
    private string $lastName;
    private string $specialization;
    private string $phone;
    private int $departmentId;

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getSpecialization(): string
    {
        return $this->specialization;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function getDepartmentId(): int
    {
        return $this->departmentId;
    }

    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function setSpecialization(string $specialization): void
    {
        $this->specialization = $specialization;
    }

    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    public function setDepartmentId(int $departmentId): void
    {
        $this->departmentId = $departmentId;
    }

    public function getFullName(): string
    {
        return $this->firstName . ' ' . $this->lastName;
    }

    public function getRole(): string
    {
        return 'doctor';
    }
}
