<?php

class Medication
{
    protected ?int $id = null;
    protected string $name;
    protected string $instruction;


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
