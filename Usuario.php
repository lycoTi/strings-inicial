<?php

namespace Alura;

class Usuario
{
    private string $nome;
    private string $sobrenome;

    public function __construct(string $nome)
    {
        $nomeSobrenome = explode(" ", $nome, 2);
        if ($nomeSobrenome[0] === "") {
            $this->nome = "Nome inválido";
        } else {
            $this->nome = $nomeSobrenome[0];
        }

        if (count($nomeSobrenome) < 2) {
            $this->sobrenome = "Sobrenome inválido";
        } else {
            $this->sobrenome = $nomeSobrenome[1];
        }
    }
    public function getNome(): string
    {
        return $this->nome;
    }
    public function getSobrenome(): string
    {
        return $this->sobrenome;
    }
}
