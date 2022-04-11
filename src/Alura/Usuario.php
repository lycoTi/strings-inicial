<?php

namespace App\Alura;

class Usuario
{
    private string $nome;
    private string $sobrenome;
    private string $senha;
    private string $tratamento;

    public function __construct(string $nome, string $senha, string $genero)
    {
        $this->setNomeSobrenome($nome);
        $this->validaSenha($senha);

        $this->adicionaTratamentoAoSobrenome($nome, $genero);
    }
    public function adicionaTratamentoAoSobrenome(string $nome, string $genero)
    {
        if ($genero === "M") {
            $this->tratamento = preg_replace("/^(\w+)\b/", "Sr.", $nome, 1);
        }
        if ($genero === "F") {
            $this->tratamento = preg_replace("/^(\w+)\b/", "Srª.", $nome, 1);
        }
    }
    private function setNomeSobrenome(string $nome)
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
    public function getSenha(): string
    {
        return $this->senha;
    }

    private function validaSenha(string $senha): void
    {
        $tamanhoSenha = strlen(trim($senha));

        if ($tamanhoSenha > 6) {
            $this->senha = $senha;
        } else {
            $this->senha = "Senha inválida";
        }
    }
    public function getTratamento(): string
    {
        return $this->tratamento;
    }
}
