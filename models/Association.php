<?php

class Association extends Database
{
    protected int $id;
    protected string $name;
    protected string $objet;
    protected string $addressofheadquarters;
    protected string $rna;
    protected string $siren;
    protected string $pseudo;
    protected string $email;
    protected string $password;
    private string $tokenregister;
    private string $creationdate;
    protected string $table = '`association`';

    public function searchInformation(): array
    {
        $query = 'SELECT `name`,`objet`,`addressofheadquarters`,`rna`,`siren`'.' FROM '.$this->table.' WHERE `email`= :email';
        $queryStatement = $this->db->prepare($query);
        $queryStatement->bindValue(':email', $this->email, PDO::PARAM_STR);
        $queryStatement->execute();

        return $queryStatement->fetchAll(PDO::FETCH_OBJ);
    }

    public function getInformation(): array
    {
        $query = 'SELECT `association`.`objet`,`association`.`email`,`association`.`addressofheadquarters`,`association`.`rna`
        ,`association`.`siren`,`contents`.`type`,`contents`.`heading`,`contents`.`subHeading`,`contents`.`slogan`,`contents`.
        `description`,`contents`.`titleStory`,`contents`.`story`,`contents`.`latitude`,`contents`.`longitude`,`contents`.
        `urlFacebook`,`contents`.`urlTwitter`,`contents`.`urlInstagram`
        FROM `association` INNER JOIN `contents`
        WHERE `association`.`email` = `contents`.`associationMail` AND `association`.`name`= :name ';
        $queryStatement = $this->db->prepare($query);
        $queryStatement->bindValue(':name', $this->name, PDO::PARAM_STR);
        $queryStatement->execute();

        return $queryStatement->fetchAll(PDO::FETCH_OBJ);
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

    public function checkLogin(): bool
    {
        $check = false;
        $query = 'SELECT COUNT(`id`) AS `number` FROM '.$this->table
            .' WHERE `pseudo` = :pseudo AND `email` = :email';
        $queryStatement = $this->db->prepare($query);
        $queryStatement->bindValue(':pseudo', $this->pseudo, PDO::PARAM_STR);
        $queryStatement->bindValue(':email', $this->email, PDO::PARAM_STR);
        $queryStatement->execute();
        // $number = $queryStatement->fetch(PDO::FETCH_OBJ)->number;
        $response = $queryStatement->fetch(PDO::FETCH_OBJ);
        // number = 0 si il n'y a pas de patient identique
        // number = 1 si il y a un patient identique
        $number = $response->number;
        if ($number) {
            $check = true;
        }

        return $check;
    }

    public function addAssociation(): bool
    {
        $query = 'INSERT INTO '.$this->table
            .' (`name`, `objet`, `addressofheadquarters`, `rna`, `siren`, `pseudo`, `email`, `password`,`tokenregister`) '
            .'VALUES (:name, :objet, :addressofheadquarters, :rna, :siren, :pseudo, :email, :password, :tokenregister)';
        $queryStatement = $this->db->prepare($query);
        $queryStatement->bindValue(':name', $this->name, PDO::PARAM_STR);
        $queryStatement->bindValue(':objet', $this->objet, PDO::PARAM_STR);
        $queryStatement->bindValue(':addressofheadquarters', $this->addressofheadquarters, PDO::PARAM_STR);
        $queryStatement->bindValue(':rna', $this->rna, PDO::PARAM_STR);
        $queryStatement->bindValue(':siren', $this->siren, PDO::PARAM_STR);
        $queryStatement->bindValue(':pseudo', $this->pseudo, PDO::PARAM_STR);
        $queryStatement->bindValue(':email', $this->email, PDO::PARAM_STR);
        $queryStatement->bindValue(':password', $this->password, PDO::PARAM_STR);
        $queryStatement->bindValue(':tokenregister', $this->tokenregister, PDO::PARAM_STR);

        return $queryStatement->execute();
    }

    public function checkAssociationIfExists(): bool
    {
        $check = false;
        $query = 'SELECT COUNT(`id`) AS `number` FROM '.$this->table
            .' WHERE `name` = :name AND `email` = :email OR `email` = :email   OR `rna` = :rna ';
        $queryStatement = $this->db->prepare($query);
        $queryStatement->bindValue(':name', $this->name, PDO::PARAM_STR);
        $queryStatement->bindValue(':email', $this->email, PDO::PARAM_STR);
        $queryStatement->bindValue(':rna', $this->rna, PDO::PARAM_STR);
        $queryStatement->bindValue(':siren', $this->siren, PDO::PARAM_STR);
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

  /*  public function checkTokenRegister(): bool
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
        $queryStatement->bindValue(':tokenregister', $this->tokenregister, PDO::PARAM_STR);

        return $queryStatement->execute();
    }

    /*public static function accountValidation($token)
    {
        try {
            $user = new Association();
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

   /* public function ajaxAssociationIfExist()
    {
        $query = ' SELECT COUNT(`name`) AS `number` FROM '.$this->table.' WHERE `name`= :name ';
        $queryStatement = $this->db->prepare($query);
        $queryStatement->bindValue(':name', $this->name, PDO::PARAM_STR);
        $queryStatement->execute();
        $response = $queryStatement->fetch(PDO::FETCH_OBJ);
        // number = 0 si il n'y a pas de patient identique
        // number = 1 si il y a un patient identique
        $number = $response->number;
        if ($number) {
            return true;
        }

        return false;
    }*/

    public function ajaxEmailIfExist()
    {
        $query = ' SELECT COUNT(`email`) AS `number` FROM ( SELECT `email` FROM `user` WHERE `email` = :email UNION SELECT `pseudo` FROM '.$this->table.' WHERE `email`= :email) AS t';
        $queryStatement = $this->db->prepare($query);
        $queryStatement->bindValue(':email', $this->email, PDO::PARAM_STR);
        $queryStatement->execute();
        $response = $queryStatement->fetch(PDO::FETCH_OBJ);
        // number = 0 si il n'y a pas de patient identique
        // number = 1 si il y a un patient identique
        $number = $response->number;
        if ($number) {
            return true;
        }

        return false;
    }

    public function ajaxNameIfExist()
    {
        $query = ' SELECT COUNT(`name`) AS `number` FROM '.$this->table.' WHERE `name`= :name ';
        $queryStatement = $this->db->prepare($query);
        $queryStatement->bindValue(':name', $this->name, PDO::PARAM_STR);
        $queryStatement->execute();
        $response = $queryStatement->fetch(PDO::FETCH_OBJ);
        // number = 0 si il n'y a pas de patient identique
        // number = 1 si il y a un patient identique
        $number = $response->number;
        if ($number) {
            return true;
        }

        return false;
    }

    public function searchAssociation()
    {
        $query = 'SELECT  `pseudo` FROM '.$this->table
            .' WHERE `email` = :email';
        $queryStatement = $this->db->prepare($query);
        $queryStatement->bindValue(':email', $this->email, \PDO::PARAM_STR);
        $queryStatement->execute();

        return $queryStatement->fetch(\PDO::FETCH_OBJ);
    }

    public function ajaxRnaIfExist()
    {
        $query = ' SELECT COUNT(`rna`) AS `number` FROM '.$this->table.' WHERE `rna`= :rna ';
        $queryStatement = $this->db->prepare($query);
        $queryStatement->bindValue(':rna', $this->rna, PDO::PARAM_STR);
        $queryStatement->execute();
        $response = $queryStatement->fetch(PDO::FETCH_OBJ);
        // number = 0 si il n'y a pas de patient identique
        // number = 1 si il y a un patient identique
        $number = $response->number;
        if ($number) {
            return true;
        }

        return false;
    }

    public function ajaxSirenIfExist()
    {
        $query = ' SELECT COUNT(`siren`) AS `number` FROM '.$this->table.' WHERE `siren`= :siren ';
        $queryStatement = $this->db->prepare($query);
        $queryStatement->bindValue(':siren', $this->siren, PDO::PARAM_STR);
        $queryStatement->execute();
        $response = $queryStatement->fetch(PDO::FETCH_OBJ);
        // number = 0 si il n'y a pas de patient identique
        // number = 1 si il y a un patient identique
        $number = $response->number;
        if ($number) {
            return true;
        }

        return false;
    }

    public function ajaxPseudoIfExist()
    {
        $query = ' SELECT COUNT(`pseudo`) AS `number` FROM ( SELECT `pseudo` FROM `user` WHERE `pseudo` = :pseudo UNION SELECT `pseudo` FROM '.$this->table.' WHERE `pseudo`= :pseudo) AS t';
        $queryStatement = $this->db->prepare($query);
        $queryStatement->bindValue(':pseudo', $this->pseudo, PDO::PARAM_STR);
        $queryStatement->execute();
        $response = $queryStatement->fetch(PDO::FETCH_OBJ);
        // number = 0 si il n'y a pas de patient identique
        // number = 1 si il y a un patient identique
        $number = $response->number;
        if ($number) {
            return true;
        }

        return false;
    }

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
        $queryStatement->bindValue(':tokenregister', $this->tokenregister, \PDO::PARAM_STR);

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
        // $number = $queryStatement->fetch(PDO::FETCH_OBJ)->number;
        $response = $queryStatement->fetch(PDO::FETCH_OBJ);
        // number = 0 si il n'y a pas de patient identique
        // number = 1 si il y a un patient identique
        $number = $response->number;
        if ($number) {
            $check = true;
        }

        return $check;
    }

    public function Update($field, $value, $seachBd): bool
    {
        $query = 'UPDATE '.$this->table.' SET `'.$field.'` = :'.$field.' WHERE '.$seachBd.' = :'.$seachBd;
        $queryStatement = $this->db->prepare($query);
        $queryStatement->bindValue(':'.$seachBd, $this->$seachBd, PDO::PARAM_STR);
        $queryStatement->bindValue(':'.$field, $value, PDO::PARAM_STR);

        return $queryStatement->execute();
    }

    public function updatePatient($field, $value): bool
    {
        $query = 'UPDATE '.$this->table.' SET `'.$field.'` = :'.$field.' WHERE `id` = :id';
        $queryStatement = $this->db->prepare($query);
        $queryStatement->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryStatement->bindValue(':'.$field, $value, PDO::PARAM_STR);

        return $queryStatement->execute();
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

    public function setName(string $value): void
    {
        $this->name = $value;
    }

    public function setObjet(string $value): void
    {
        $this->objet = $value;
    }

    public function setAddressofheadquarters(string $value): void
    {
        $this->addressofheadquarters = $value;
    }

    public function setRna(string $value): void
    {
        $this->rna = $value;
    }

    public function setSiren(string $value): void
    {
        $this->siren = $value;
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

    public function getName(): string
    {
        return   $this->name;
    }

    public function getObject(): string
    {
        return  $this->objet;
    }

    public function getAddressofheadquaters(): string
    {
        return  $this->addressofheadquaters;
    }

    public function getRna(): int
    {
        return  $this->rna;
    }

    public function getSiren(): int
    {
        return  $this->siren;
    }

    public function getPseudo(): string
    {
        return   $this->pseudo;
    }

    public function getEmail(): string
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