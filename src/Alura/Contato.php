<?php

namespace App\Alura;

class Contato
{
    private $email;
    private $endereco;
    private $cep;

    public function __construct(string $email, string $endereco, string $cep)
    {
        $this->email = $email;

        if ($this->validaEmail($email) !== false) {
            $this->setEmail($email);
        } else {
            $this->setEmail("e-mail inválido");
        }

        $this->endereco = $endereco;
        $this->cep = $cep;
    }
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }
    public function getUsuario(): string
    {
        $posicaoArroba = strpos($this->email, "@");

        if ($posicaoArroba === false) {
            return "Usuário inválido";
        }
        return substr($this->email, 0, $posicaoArroba);
    }
    public function getEmail(): string
    {
        return $this->email;
    }
    private function validaEmail(string $email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
    public function getEnderecoCep(): string
    {
        $enderecoCep = [$this->endereco, $this->cep];
        return implode(" - ", $enderecoCep);
    }
}
