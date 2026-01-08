<?php

class Medication
{
    private ?int $id = null;
    private string $name;
    private string $instruction;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getInstruction(): string
    {
        return $this->instruction;
    }


    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setInstructions(string $instruction): void
    {
        $this->instructions = $instruction;
    }
}
