<?php

class Contents extends Database
{
    protected int $id;
    protected string $associationMail;
    protected string $type;
    protected string $heading;
    protected string $subHeading;
    protected string $slogan;
    protected string $description;
    protected string $titleStory;
    protected string $story;
    protected string $latitude;
    protected string $longitude;
    protected string $urlFacebook;
    protected string $urlTwitter;
    protected string $urlInstagram;
    protected string $table = '`contents`';

    public function getContentsList(): array
    {
        $query = 'SELECT `contents`.`type`,`contents`.`heading`,`contents`.`subHeading`,`association`.`name`'
            .' FROM '.$this->table.',`association` WHERE `contents`.`associationMail` = `association`.`email`';
        $queryStatement = $this->db->query($query);

        return $queryStatement->fetchAll(PDO::FETCH_OBJ);
    }

    public function getSportList(): array
    {
        $query = 'SELECT `contents`.`type`,`contents`.`heading`,`contents`.`subHeading`,`association`.`name`'
            .' FROM '.$this->table.',`association` WHERE `contents`.`associationMail` = `association`.`email` AND `contents`.`type`="sport" ';
        $queryStatement = $this->db->query($query);

        return $queryStatement->fetchAll(PDO::FETCH_OBJ);
    }

    public function getLoisirsList(): array
    {
        $query = 'SELECT `contents`.`type`,`contents`.`heading`,`contents`.`subHeading`,`association`.`name`'
            .' FROM '.$this->table.',`association` WHERE `contents`.`associationMail` = `association`.`email` AND `contents`.`type`="loisirs" ';
        $queryStatement = $this->db->query($query);

        return $queryStatement->fetchAll(PDO::FETCH_OBJ);
    }

    public function getCultureList(): array
    {
        $query = 'SELECT `contents`.`type`,`contents`.`heading`,`contents`.`subHeading`,`association`.`name`'
            .' FROM '.$this->table.',`association` WHERE `contents`.`associationMail` = `association`.`email` AND `contents`.`type`="culture" ';
        $queryStatement = $this->db->query($query);

        return $queryStatement->fetchAll(PDO::FETCH_OBJ);
    }

    public function checkMapIfExists(): bool
    {
        $query = 'UPDATE `contents`
                  SET `latitude`= :latitude,`longitude`= :longitude WHERE `associationMail`= :associationMail';
        $queryStatement = $this->db->prepare($query);
        $queryStatement->bindValue(':latitude', $this->latitude, PDO::PARAM_STR);
        $queryStatement->bindValue(':longitude', $this->longitude, PDO::PARAM_STR);
        $queryStatement->bindValue(':associationMail', $this->associationMail, PDO::PARAM_STR);

        return $queryStatement->execute();
    }

    public function checkSloganIfExists(): bool
    {
        $query = 'UPDATE `contents`
                  SET `slogan`= :slogan WHERE `associationMail`= :associationMail';
        $queryStatement = $this->db->prepare($query);
        $queryStatement->bindValue(':slogan', $this->slogan, PDO::PARAM_STR);
        $queryStatement->bindValue(':associationMail', $this->associationMail, PDO::PARAM_STR);

        return $queryStatement->execute();
    }

    public function checkActuIfExists(): bool
    {
        $query = 'UPDATE `contents`
                  SET `titleStory`= :titleStory , `story`= :story WHERE `associationMail`= :associationMail';
        $queryStatement = $this->db->prepare($query);
        $queryStatement->bindValue(':titleStory', $this->titleStory, PDO::PARAM_STR);
        $queryStatement->bindValue(':story', $this->story, PDO::PARAM_STR);
        $queryStatement->bindValue(':associationMail', $this->associationMail, PDO::PARAM_STR);

        return $queryStatement->execute();
    }

    public function checkDescriptionIfExists(): bool
    {
        $query = 'UPDATE `contents`
                  SET `description`= :description WHERE `associationMail`= :associationMail';
        $queryStatement = $this->db->prepare($query);
        $queryStatement->bindValue(':description', $this->description, PDO::PARAM_STR);
        $queryStatement->bindValue(':associationMail', $this->associationMail, PDO::PARAM_STR);

        return $queryStatement->execute();
    }

    public function checkFacebookIfExists(): bool
    {
        $query = 'UPDATE `contents`
                  SET `urlFacebook`= :urlFacebook WHERE `associationMail`= :associationMail';
        $queryStatement = $this->db->prepare($query);
        $queryStatement->bindValue(':urlFacebook', $this->urlFacebook, PDO::PARAM_STR);
        $queryStatement->bindValue(':associationMail', $this->associationMail, PDO::PARAM_STR);

        return $queryStatement->execute();
    }

    public function checkTwitterIfExists(): bool
    {
        $query = 'UPDATE `contents`
                  SET `urlTwitter`= :urlTwitter WHERE `associationMail`= :associationMail';
        $queryStatement = $this->db->prepare($query);
        $queryStatement->bindValue(':urlTwitter', $this->urlTwitter, PDO::PARAM_STR);
        $queryStatement->bindValue(':associationMail', $this->associationMail, PDO::PARAM_STR);

        return $queryStatement->execute();
    }

    public function checkInstagramIfExists(): bool
    {
        $query = 'UPDATE `contents`
                  SET `urlInstagram`= :urlInstagram WHERE `associationMail`= :associationMail';
        $queryStatement = $this->db->prepare($query);
        $queryStatement->bindValue(':urlInstagram', $this->urlInstagram, PDO::PARAM_STR);
        $queryStatement->bindValue(':associationMail', $this->associationMail, PDO::PARAM_STR);

        return $queryStatement->execute();
    }

    public function editContentsBase(): bool
    {
        $query = 'INSERT '.$this->table.'
                  SET `type`= :type,`heading`= :heading,`subHeading`= :subHeading, `associationMail`= :associationMail';
        $queryStatement = $this->db->prepare($query);

        $queryStatement->bindValue(':heading', $this->heading, PDO::PARAM_STR);
        $queryStatement->bindValue(':subHeading', $this->subHeading, PDO::PARAM_STR);

        $queryStatement->bindValue(':type', $this->type, PDO::PARAM_STR);
        $queryStatement->bindValue(':associationMail', $this->associationMail, PDO::PARAM_STR);

        return $queryStatement->execute();
    }

    public function checkContentsBaseIfExists(): bool
    {
        $query = 'SELECT `associationMail`
                    FROM '.$this->table.' WHERE `associationMail` = :associationMail';
        $queryStatement = $this->db->prepare($query);
        $queryStatement->bindValue(':associationMail', $this->associationMail, PDO::PARAM_STR);
        $queryStatement->execute();

        return $queryStatement->fetch() ? true : false;
    }

    public function searchData(): array
    {
        $query = 'SELECT `associationMail`,`type`,`slogan`,`description`,`titleStory`,`story`,`latitude`,`longitude`,`urlFacebook`,`urlTwitter`,`urlInstagram`'
            .' FROM '.$this->table.'  WHERE `associationMail`= :associationMail ';
        $queryStatement = $this->db->prepare($query);
        $queryStatement->bindValue(':associationMail', $this->associationMail, PDO::PARAM_STR);
        $queryStatement->execute();

        return $queryStatement->fetchAll(PDO::FETCH_OBJ);
    }

    public function ajaxHeading(): array
    {
        $query = 'SELECT `contents`.`type`,`contents`.`heading`,`contents`.`subHeading`,`association`.`name`
        FROM `contents`,`association` WHERE `contents`.`associationMail` = `association`.`email`
        AND `contents`.`heading` = :heading';

        $queryStatement = $this->db->prepare($query);
        $queryStatement->bindValue(':heading', $this->heading, PDO::PARAM_STR);
        $queryStatement->execute();

        return $queryStatement->fetchAll(PDO::FETCH_OBJ);
    }

    public function ajaxHeadingAndSubHeading(): array
    {
        $query = 'SELECT `contents`.`type`,`contents`.`heading`,`contents`.`subHeading`,`association`.`name`
        FROM `contents`,`association` WHERE `contents`.`associationMail` = `association`.`email`
        AND `contents`.`heading` = :heading AND `contents`.`subHeading` = :subHeading';

        $queryStatement = $this->db->prepare($query);
        $queryStatement->bindValue(':heading', $this->heading, PDO::PARAM_STR);
        $queryStatement->bindValue(':subHeading', $this->subHeading, PDO::PARAM_STR);

        $queryStatement->execute();

        return $queryStatement->fetchAll(PDO::FETCH_OBJ);
    }

    public function checkAppointmentIfExists()
    {
        $fieldArray = [];
        $field = new stdClass();
        $field->type = PDO::PARAM_STR;
        $field->name = 'dateHour';
        $fieldArray = [$field];

        return $this->checkEntityIfExistsByFilter($fieldArray);
    }

    public function checkIfExistAppointment(): bool
    {
        $query = 'SELECT `id`, `dateHour`, `idPatients`
                    FROM `appointments` WHERE `dateHour` = :dateHour';
        $queryStatement = $this->db->prepare($query);
        $queryStatement->bindValue(':dateHour', $this->dateHour, PDO::PARAM_STR);
        $queryStatement->execute();

        return $queryStatement->fetch() ? true : false;
    }

    public function checkIfExistAppointmentById(): bool
    {
        $query = 'SELECT `id`, `dateHour`, `idPatients`
                    FROM `appointments` WHERE `id` = :id';
        $queryStatement = $this->db->prepare($query);
        $queryStatement->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryStatement->execute();

        return $queryStatement->fetch() ? true : false;
    }

    public function addAppointment(): bool
    {
        $query = 'INSERT INTO '.$this->table
            .' (`dateHour`,`idPatients`) '
            .'VALUES (:dateHour, :idPatients)';
        $queryStatement = $this->db->prepare($query);
        $queryStatement->bindValue(':dateHour', $this->dateHour, PDO::PARAM_STR);
        $queryStatement->bindValue(':idPatients', $this->idPatients, PDO::PARAM_INT);

        return $queryStatement->execute();
    }

    public function deleteAppointment(): bool
    {
        $query = 'DELETE FROM `appointments` WHERE `id`= :id';
        $queryStatement = $this->db->prepare($query);
        $queryStatement->bindValue(':id', $this->id, PDO::PARAM_INT);

        return $queryStatement->execute();
    }

    public function editAppointment(): bool
    {
        $query = 'UPDATE `appointments`
                  SET `dateHour`= :dateHour WHERE `id`= :id';
        $queryStatement = $this->db->prepare($query);
        $queryStatement->bindValue(':dateHour', $this->dateHour, PDO::PARAM_STR);
        $queryStatement->bindValue(':id', $this->id, PDO::PARAM_INT);

        return $queryStatement->execute();
    }

    public function getContentList(): array
    {
        $query = 'SELECT DATE_FORMAT(`ap`.`dateHour`,\'%d/%m/%Y\') AS `date`, DATE_FORMAT(`ap`.`dateHour`,\'%Hh%i\') AS `time` ,`pa`.`lastname`,`pa`.`firstname`, `ap`.`id`'
            .' FROM '.$this->table.' AS `ap`'
            .' INNER JOIN `patients` AS `pa` ON `pa`.`id` = `ap`.`idPatients`'
            .' ORDER  BY `dateHour` ASC';
        $queryStatement = $this->db->query($query);

        return $queryStatement->fetchAll(PDO::FETCH_OBJ);
    }

    public function getAppointementById()
    {
        $query = 'SELECT ap.id, DATE_FORMAT(`ap`.`dateHour`,\'%d/%m/%Y\') AS `date`, DATE_FORMAT(`ap`.`dateHour`,\'%Hh%i\') AS `time` ,`pa`.`lastname`,`pa`.`firstname`,`pa`.`mail`, DATE_FORMAT(`pa`.`birthdate`,\'%d/%m/%Y\') AS `birthdate`,`pa`.`phone`'
            .' FROM '.$this->table.' AS `ap`'
            .' INNER JOIN `patients` AS `pa` ON `pa`.`id` = `ap`.`idPatients`'
            .' WHERE `ap`.`id` = :id'
            .' ORDER  BY `dateHour` ASC';
        $queryStatement = $this->db->prepare($query);
        $queryStatement->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryStatement->execute();

        return $queryStatement->fetch(PDO::FETCH_OBJ);
    }

    public function delete(): bool
    {
        $query = 'DELETE FROM '.$this->table.' WHERE `associationMail` = :associationMail';
        $queryStatement = $this->db->prepare($query);
        $queryStatement->bindValue(':associationMail', $this->associationMail, PDO::PARAM_STR);

        return $queryStatement->execute();
    }

    public function mapAll(): array
    {
        $query = 'SELECT `contents`.`latitude`,`contents`.`longitude`,`association`.`name` FROM `contents`,`association` WHERE `contents`.`associationMail`= `association`.`email`';
        $queryStatement = $this->db->prepare($query);
        $queryStatement->execute();

        return  $queryStatement->fetchAll(PDO::FETCH_OBJ);
    }
public function mapInfo($rna): array
    {
        $query = 'SELECT `contents`.`latitude`,`contents`.`longitude`,`association`.`name` FROM `contents`,`association` WHERE `contents`.`associationMail`= `association`.`email` AND `association`.`rna` = :rna';
        $queryStatement = $this->db->prepare($query);
        $queryStatement->bindValue(':rna', $rna, PDO::PARAM_STR);
        $queryStatement->execute();

        return  $queryStatement->fetchAll(PDO::FETCH_OBJ);
    }
    /***
      * SETTER
      */
    public function setId(int $value): void
    {
        $this->id = $value;
    }

    public function setType(string $value): void
    {
        $this->type = $value;
    }

    public function setHeading(string $value): void
    {
        $this->heading = $value;
    }

    public function setSubHeading(string $value): void
    {
        $this->subHeading = $value;
    }

    public function setSlogan(string $value): void
    {
        $this->slogan = $value;
    }

    public function setDescription(string $value): void
    {
        $this->description = $value;
    }

    public function setTitleStory(string $value): void
    {
        $this->titleStory = $value;
    }

    public function setStory(string $value): void
    {
        $this->story = $value;
    }

    public function setLatitude(string $value): void
    {
        $this->latitude = $value;
    }

    public function setLongitude(string $value): void
    {
        $this->longitude = $value;
    }

    public function setAssociationMail(string $value): void
    {
        $this->associationMail = $value;
    }

    public function setUrlFacebook(string $value): void
    {
        $this->urlFacebook = $value;
    }

    public function setUrlTwitter(string $value): void
    {
        $this->urlTwitter = $value;
    }

    public function setUrlInstagram(string $value): void
    {
        $this->urlInstagram = $value;
    }

    public function getType(): int
    {
        return $this->$type;
    }
}