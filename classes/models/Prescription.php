<?php

class Prescription
{
    protected ?int $id = null;
    protected string $date;
    protected int $doctorId;
    protected int $patientId;
    protected int $medicationId;
    protected string $dosageInstruction;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): string
    {
        return $this->date;
    }

    public function getDoctorId(): int
    {
        return $this->doctorId;
    }

    public function getPatientId(): int
    {
        return $this->patientId;
    }

    public function getMedicationId(): int
    {
        return $this->medicationId;
    }

    public function getDosageInstructions(): string
    {
        return $this->dosageInstruction;
    }

    public function setDate(string $date): void
    {
        $this->date = $date;
    }

    public function setDoctorId(int $doctorId): void
    {
        $this->doctorId = $doctorId;
    }

    public function setPatientId(int $patientId): void
    {
        $this->patientId = $patientId;
    }

    public function setMedicationId(int $medicationId): void
    {
        $this->medicationId = $medicationId;
    }

    public function setDosageInstruction(string $dosageInstruction): void
    {
        $this->dosageInstructions = $dosageInstruction;
    }
}
