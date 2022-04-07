<?php

namespace App\Alura;

class Contato
{
    private $email;

    public function __construct(string $email)
    {
        $this->email = $email;

        if ($this->validaEmail($email) !== false) {
            $this->setEmail($email);
        } else {
            $this->setEmail("e-mail inválido");
        }
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
}
