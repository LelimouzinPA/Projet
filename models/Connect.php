<?php

class Connect extends Database
{
    private int $id;
    private string $token;
    protected string $pseudo;
    protected string $email;
    protected string $password;
    protected string $table = '`connect`';

    /***
        * SETTER
        */
    public function setId(int $value): void
    {
        $this->id = $value;
    }

    public function setPseudo(string $value): void
    {
        $this->pseudo = $value;
    }

    public function setEmail(string $value): void
    {
        $this->email = $value;
    }

    public function setPassword(string $value): void
    {
        $this->password = $value;
    }

    /***
     * GETTER
     */
    public function getId(): int
    {
        return  $this->id;
    }

    public function getPseudo(): string
    {
        return   $this->pseudo;
    }

    public function getemail(): string
    {
        return  $this->email;
    }

    public function getPassword(): string
    {
        return  $this->password;
    }
}
