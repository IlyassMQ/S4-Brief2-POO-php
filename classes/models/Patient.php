<?php
require 'User.php';
class Patient extends User
{
    protected string $firstName;
    protected string $lastName;
    protected string $gender;
    protected string $dateOfBirth; 
    protected string $phone;
    protected string $address;


    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getGender(): string
    {
        return $this->gender;
    }

    public function getDateOfBirth(): string
    {
        return $this->dateOfBirth;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function getAddress(): string
    {
        return $this->address;
    }


    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function setGender(string $gender): void
    {
        $this->gender = $gender;
    }

    public function setDateOfBirth(string $dateOfBirth): void
    {
        $this->dateOfBirth = $dateOfBirth;
    }

    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    public function getFullName(): string
    {
        return $this->firstName . ' ' . $this->lastName;
    }

    public function getAge(): int
    {
        $birthDate = new DateTime($this->dateOfBirth);
        $today = new DateTime();

        return $today->diff($birthDate)->y;
    }

    public function getRole(): string
    {
        return 'patient';
    }
}
