<?php

class User extends Database
{
    protected int $id;
    protected string $pseudo;
    protected string $email;
    protected string $password;
    private string $tokenregister;
    private string $creationdate;
    protected string $table = '`user`';
    public function checkUpdate()
    {
        $pseudo = htmlspecialchars($_POST['userPseudo']);
        $formVerif = new Form();
        $valueArray = [];
        foreach ($inputArray as $input) {
            if ($formVerif->checkPost($input)) {
                $valueArray[$input['name']] = $_POST[$input['name']]; /*si vrai recupere la valeur dans mon tableau valueArray*/
            } else {
                $errorList[$input['name']] = $formVerif->getErrorMessage();
            }
        }
    }
    public function searchUser()
    {
        $query = 'SELECT  `pseudo` FROM '.$this->table
            .' WHERE `email` = :email';
        $queryStatement = $this->db->prepare($query);
        $queryStatement->bindValue(':email', $this->email, \PDO::PARAM_STR);
        $queryStatement->execute();
        return $queryStatement->fetch(\PDO::FETCH_OBJ);
    }
    public function addUser(): bool
    {
        $query = 'INSERT INTO '.$this->table
            .' (`pseudo`,`email`,`password`,`tokenregister`) '
            .'VALUES (:pseudo, :email, :password, :tokenregister)';
        $queryStatement = $this->db->prepare($query);
        $queryStatement->bindValue(':pseudo', $this->pseudo, PDO::PARAM_STR);
        $queryStatement->bindValue(':email', $this->email, PDO::PARAM_STR);
        $queryStatement->bindValue(':password', $this->password, PDO::PARAM_STR);
        $queryStatement->bindValue(':tokenregister', $this->tokenregister, PDO::PARAM_STR);
        return $queryStatement->execute();
    }
    public function checkUserIfExists(): bool
    {
        $check = false;
        $query = 'SELECT COUNT(`id`) AS `number` FROM '.$this->table
            .' WHERE `pseudo` = :pseudo AND `email` = :email OR `email` = :email';
        $queryStatement = $this->db->prepare($query);
        $queryStatement->bindValue(':pseudo', $this->pseudo, PDO::PARAM_STR);
        $queryStatement->bindValue(':email', $this->email, PDO::PARAM_STR);
        $queryStatement->execute();
        $response = $queryStatement->fetch(PDO::FETCH_OBJ);
        $number = $response->number;
        if ($number) {
            $check = true;
        }
        return $check;
    }
    /*public function Update($field, $value, $seachBd): bool
    {
        $query = 'UPDATE '.$this->table.' SET `'.$field.'` = :'.$field.' WHERE '.$seachBd.' = :'.$seachBd;
        $queryStatement = $this->db->prepare($query);
        $queryStatement->bindValue(':'.$seachBd, $this->$seachBd, PDO::PARAM_STR);
        $queryStatement->bindValue(':'.$field, $value, PDO::PARAM_STR);
       return $queryStatement->execute();
    }*/
    public function checkLogin(): bool
    {
        $check = false;
        $query = 'SELECT COUNT(`id`) AS `number` FROM '.$this->table
            .' WHERE `pseudo` = :pseudo AND `email` = :email';
        $queryStatement = $this->db->prepare($query);
        $queryStatement->bindValue(':pseudo', $this->pseudo, PDO::PARAM_STR);
        $queryStatement->bindValue(':email', $this->email, PDO::PARAM_STR);
        $queryStatement->execute();
        $response = $queryStatement->fetch(PDO::FETCH_OBJ);
        $number = $response->number;
        if ($number) {
            $check = true;
        }
        return $check;
    }
    public function verificationPasswordAdd($passwordConfirm)
    {
        if ($this->getPassword() == $passwordConfirm) {
            // Hachage du mot de passe
            $passHache = password_hash($this->password, PASSWORD_DEFAULT);
            // Insertion dans la base de donnée
            return $this->setPassword($passHache);
        }
    }
    
    public function getLoginInfo(): object
    {
        $query = 'SELECT `password`,`tokenregister` FROM '.$this->table
            .' WHERE `email` = :email';
        $queryStatement = $this->db->prepare($query);
        $queryStatement->bindValue(':email', $this->email, \PDO::PARAM_STR);
        $queryStatement->execute();
        return $queryStatement->fetch(\PDO::FETCH_OBJ);
    }
    /*public function checkTokenRegister(): bool
    {
        $query = 'SELECT COUNT(`id`) AS `number` FROM '.$this->table
            .' WHERE `tokenregister` = :tokenregister';
        $queryStatement = $this->db->prepare($query);
        $queryStatement->bindValue(':tokenregister', $this->tokenregister, \PDO::PARAM_STR);
        $queryStatement->execute();
        $response = $queryStatement->fetchColumn();
        if ($response === 0) {
            return false;
        } elseif (!$response) {
            throw new Exception('La bdd a pas voulu !!!!');
        }
        return true;
    }*/
    public function deleteToken(): bool
    {
        $query = 'UPDATE '.$this->table
            .' SET `tokenregister` = null'
            .' WHERE `tokenregister` = :tokenregister';
        $queryStatement = $this->db->prepare($query);
        $queryStatement->bindValue(':tokenregister', $this->tokenregister, \PDO::PARAM_STR);
        return $queryStatement->execute();
    }
   /* public static function accountValidation($token)
    {
        try {
            $user = new User();
            $user->setTokenregister($token);
            if ($user->checkTokenRegister()) {
                $user->deleteToken();
            } else {
                //j'informe l'user que son token est pas bon
            }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }*/
   public function ajaxPseudoIfExist()
    {
        $query = ' SELECT COUNT(`pseudo`) AS `number` FROM '.$this->table.' WHERE `pseudo`= :pseudo ';
        $queryStatement = $this->db->prepare($query);
        $queryStatement->bindValue(':pseudo', $this->pseudo, PDO::PARAM_STR);
        $queryStatement->execute();
        $response = $queryStatement->fetch(PDO::FETCH_OBJ);
        $number = $response->number;
        if ($number) {
            return true;
        }
        return false;
    }
    public function ajaxEmailIfExist()
    {
        $query = ' SELECT COUNT(`email`) AS `number` FROM '.$this->table.' WHERE `email`= :email ';
        $queryStatement = $this->db->prepare($query);
        $queryStatement->bindValue(':email', $this->email, PDO::PARAM_STR);
        $queryStatement->execute();
        $response = $queryStatement->fetch(PDO::FETCH_OBJ);
        $number = $response->number;
        if ($number) {
            return true;
        }
        return false;
    }
    public function delete(): bool
    {
        $query = 'DELETE FROM '.$this->table.' WHERE `email` = :email';
        $queryStatement = $this->db->prepare($query);
        $queryStatement->bindValue(':email', $this->email, PDO::PARAM_STR);
        return $queryStatement->execute();
    }
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
    public function setTokenregister(string $value): void
    {
        $this->tokenregister = $value;
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
    public function getTokenregister(): string
    {
        return $this->tokenregister;
    }
}