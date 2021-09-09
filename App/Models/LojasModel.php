<?php

namespace App\Models;

final class LojasModel
{

    private $id;
    private $nome;
    private $telefone;


    public function getId(): int
    {
        return $this->id;
    }
    public function getNome(): string
    {
        return $this->nome;
    }
    public function setNome(string $nome)
    {
        $this->nome = $nome;
    }
    public function getTelefone(): string
    {
        return $this->telefone;
    }
    public function setTelefone(string $telefone)
    {
        $this->telefone = $telefone;
    }

}