<?php

class Database
{
    protected PDO $db;

    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=associationsAmiens;charset=utf8', 'root', 'root');
        } catch (Exception $error) {
            die($error->getMessage());
        }
    }

    public function typeBd($email)
    {
        $query = 'SELECT `type` FROM ( SELECT `type`
         FROM `user` WHERE `email` = ":email"
         UNION SELECT `type` FROM `association` WHERE `email`= ":email") AS t';
        $queryStatement = $this->db->prepare($query);
        $queryStatement->bindValue(':email', $email, \PDO::PARAM_STR);

        return  $queryStatement->execute();
    }
}
