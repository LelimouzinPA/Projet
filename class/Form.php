<?php

/**
 * Classe permettant de faire les vérifications des formulaires.
 */
class Form
{
    private string $inputName;
    private $inputValue;
    private string $inputNameError                                                                                                                                                                                                                           ;
    private string $regexPseudo    = '/^[0-9a-zÀ-ÖØ-öø-ÿ][0-9\-_a-zÀ-ÖØ-öø-ÿ]{6,}$/i'                                                                                                                                                                        ;
    private string $regexName      = '/^[0-9]*[a-zÀ-ÖØ-öø-ÿ\ \']*[0-9]*([\-a-zÀ-ÖØ-öø-ÿ]*)?$/i'                                                                                                                                                              ;
    private string $regexPassword  = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[@$!%*?&])[A-Za-z0-9@$!%*?&]{8,}$/'                                                                                                                                            ;
    private string $regexPhone     = '/^0[1-79]([\.\-\s]?([0-9]{2})){4}$/'                                                                                                                                                                                   ;
    private string $regexRna       = '/^W[0-9]{9}$/'                                                                                                                                                                                                         ;
    private string $regexSiren     = '/^[0-9]{14}$/'                                                                                                                                                                                                         ;
    private string $regexGps       = '/^(\+|-)?(?:90(?:(?:\.0{1,6})?)|(?:[0-9]|[1-8][0-9])(?:(?:\.[0-9]{1,6})?))$/i'                                                                                                                                         ;
    private string $regexUrl       = '/^(https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|www\.[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9]+\.[^\s]{2,}|www\.[a-zA-Z0-9]+\.[^\s]{2,})$/m';
    private string $regexAddress   = '/^[0-9]+[a-zÀ-ÖØ-öø-ÿ\ \-\']+[0-9]{5}\ [a-zÀ-ÖØ-öø-ÿ]+[a-zÀ-ÖØ-öø-ÿ\ \-\']+$/i'                                                                                                                                        ;
    private string $errorMessage;
    private function isNotEmpty(): bool
    {
        $check = true;
       
        if (empty($this->inputValue)) {
            $this->errorMessage = 'Ce champ ne peut pas être vide.';
            $check = false;
        }
 if ($this->inputName == 'siren' ){
            $check = true;
        }
        return $check;
    }
    /**
     * Méthode permettant de vérifier le format des données saisies.
     *
     * @param string $formatType (email | name | date | phone)
     */
    private function checkFormat(string $formatType): bool
    {
        switch ($formatType) {
        case 'pseudo':
                $check = preg_match($this->regexName, $this->inputValue);
                $this->errorMessage = 'Merci de renseigner '.$this->inputNameError.' ne contenant que des lettres et chiffre, les tirets son accepter minimum 5 caractéres.';
                break;
            case 'name':
                $check = preg_match($this->regexName, $this->inputValue);
                $this->errorMessage = 'Merci de renseigner '.$this->inputNameError.' ne contenant que des lettres, commençant par une majuscule et des séparateurs (espace, tiret).';
                break;
                case 'password':
                    $check = preg_match($this->regexPassword, $this->inputValue);
                    $this->errorMessage = 'Merci de renseigner '.$this->inputNameError.' minimum huit caractères, au moins une lettre majuscule, une lettre minuscule, un chiffre et un caractère spécial ';
                    break;
            case 'email':
                $check = filter_var($this->inputValue, FILTER_VALIDATE_EMAIL);
                $this->errorMessage = 'Merci de renseigner '.$this->inputNameError.' valide.';
                break;
                case 'rna':
                    $check = preg_match($this->regexRna, $this->inputValue);
                    $this->errorMessage = 'Merci de renseigner '.$this->inputNameError.' commençant par un W en majuscule suivis de vos 9 chiffres.';
                    break;
            case 'siren':
                if ($this->inputValue != ""){
                $check = preg_match($this->regexSiren, $this->inputValue);
                $this->errorMessage = 'Merci de renseigner '.$this->inputNameError.' composer de 9 chiffres du numéro SIREN + les 5 chiffres du NIC (numéro interne de classement propre à chaque établissement).';
                }else{$check = true ;}
                break;
                case 'adresse':
                $check = preg_match($this->regexAddress, $this->inputValue);
                $this->errorMessage = 'Merci de renseigner une '.$this->inputNameError.' valide.';
                break;
            case 'gps':
                $check = preg_match($this->regexGps, $this->inputValue);
                $this->errorMessage = 'Merci de renseigner des coordonnées '.$this->inputNameError.' valide.';
                break;
                case 'url':
                $check = preg_match($this->regexUrl, $this->inputValue);
                $this->errorMessage = 'Merci de renseigner '.$this->inputNameError.' respectant ce format : jj/mm/aaaa hh:mm.';
                break;
                case 'url':
                $check = preg_match($this->regexParagraph, $this->inputValue);
                $this->errorMessage = 'Merci de renseigner '.$this->inputNameError.' respectant ce format : jj/mm/aaaa hh:mm.';
                break;
            default:
                $check = false;
                break;
        }
        return $check;
    } 
    /**
     * Méthode globale de vérification d'un champ.
     */
    private function check(array $input, array $form): bool
    {
        $this->inputName = $input['filterPost'];
        $this->inputNameError = $input['errorSend'];
        $this->inputValue = $form[$input['name']];
        $check = false;
        $check = $this->isNotEmpty() && $this->checkFormat($this->inputName);

        return $check;
    }
    public function checkPost(array $input): bool
    {
        return $this->check($input, $_POST);
    }
    public function checkGet(array $input): bool
    {
        return $this->check($input, $_GET);
    }
    public function getErrorMessage(): string
    {
        return $this->errorMessage;
    }
}