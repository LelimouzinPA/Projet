<?php

class Str
{
    /**
     * fonction de creation d'une cléf de 60 caractéres permettant la validation du compte utilisateur.
     */
    public static function getRandom(int $size = 60): string
    {
        $lowercaseLetter = [];
        $letter = 'a';
        for ($i = 0; $i <= 25; ++$i) {
            $lowercaseLetter[$i] = $letter++;
        }
        $uppercaseLetter = array_map('strtoupper', $lowercaseLetter);
        $numbers = [];
        for ($i = 0; $i <= 9; ++$i) {
            $numbers[$i] = $i;
        }
        $specialchars = ['.', ':', ';', '!', '@'];
        $finalArray = array_merge($lowercaseLetter, $uppercaseLetter, $specialchars, $numbers);
        $randomString = '';
        for ($i = 0; $i < $size; ++$i) {
            shuffle($finalArray);
            $randomString .= $finalArray[array_rand($finalArray, 1)];
        }

        return $randomString;
    }

    /**
     * Fonction trouve la majuscule contenu dans une chaine de caractere et decoupe cette chaine pour y placer
     * un espace puis met les 2 mots dans un tableau pour en extraire le premier ex userPseudo->user Pseudo on
     * en sortira que "user".
     *
     * @param [type] $input
     *
     * @return void
     */
    public static function cutAndSmallWord($input)
    {
        $capitalMark = preg_split('/(?=[A-Z])/', $input);
        $createSpace = implode(' ', $capitalMark);
        $splits = explode(' ', $createSpace);
        $result = strtolower($splits[1]);

        return $result;
    }

    public static function cutlWord($input)
    {
        $capitalMark = preg_split('/(?=[A-Z])/', $input);
        $createSpace = implode(' ', $capitalMark);
        $splits = explode(' ', $createSpace);
        $result = $splits[1];

        return $result;
    }

    /**
     * Fonction permettant la verification des entrer et leur mise à jours dans le profil-association et profil-user
     * dans l'onglet "Paramétre".
     *
     * @param [type] $index
     * @param [type] $email
     * @param [type] $value
     * @param [type] $type
     * @param [type] $pseudo
     * @param [type] $filterPost
     *
     * @return void
     */
    public static function checkUpdate($index, $email, $value, $type, $pseudo, $filterPost)
    {//creation d'un tableau d'erreur
        $errorList = [];
        // creation d'un tableau pour effectuer des verifications
        $inputArray = [
        ['filterPost' => $filterPost, 'name' => $index, 'errorSend' => 'un '.$type],
    ];
    var_dump($_POST);

        // creation d'un objet pour effectuer les verifications de remplissage et de regex dans la class Form
        $formVerif = new Form();
        // tableau des valeurs à verifier
        $valueArray = [];
        //boucle verifiant toute les entrer
        foreach ($inputArray as $input) {
            // met les valeurs dans un tableau si elle passe les tests de la class form
            if ($formVerif->checkPost($input)) {
                $valueArray[$input['name']] = $_POST[$input['name']];
            } //sinon inscrit les erreurs dans le tableau d'erreur
            else {
                $errorList[$input['name']] = $formVerif->getErrorMessage();
            }
        }
        $errorArray = $errorList;
        var_dump($errorArray);
        //variable pour faire le choix entre les 2 types d'utilisateur possible
        $searchAssociation = 'association';
        $searchUser = 'user';
        //condition permettant de determiner si dans $index l'on est en presence d'utilisateur lambda "user" ou d'un professionnel 'association'
        if (strpos($index, $searchUser) !== false) {
            $user = new User();
        } elseif (strpos($index, $searchAssociation) !== false) {
            $association = new Association();
        }
        // si il n'y a pas d'erreur on prepare a entrer les valeur en base de donnée
        if (count($errorList) == 0) {
            // le switch va permettre de determiner quel champs va etre modifier
            switch ($index) {
            case 'userPseudo':
                $user->setEmail(htmlspecialchars($email));
                $user->setPseudo(htmlspecialchars($valueArray[$index]));
                $seachBd = 'email';
                $action = $user->ajaxPseudoIfExist();
                break;
            case 'userPasswordConfirm':
                $user->setEmail(htmlspecialchars($email));
                $user->setPassword(htmlspecialchars($_POST['userPassword']));
                $user->verificationPasswordAdd($valueArray[$index]);
                $passwordHash = $user->getPassword();
                $valueArray[$index] = $passwordHash;
                $seachBd = 'email';
                $action = false;
            break;
            case 'associationPseudo':
                $association->setEmail(htmlspecialchars($email));
                $association->setPseudo(htmlspecialchars($valueArray[$index]));
                $seachBd = 'email';
                $action = $association->ajaxPseudoIfExist();
            break;
             case 'associationPasswordConfirm':
                $association->setEmail(htmlspecialchars($email));
                $association->setPassword(htmlspecialchars($_POST['userPassword']));
                $association->verificationPasswordAdd($valueArray[$index]);
                $passwordHash = $association->getPassword();
                $valueArray[$index] = $passwordHash;
                $seachBd = 'email';
                $action = false;
            break;
            default:
            break;
        }
            $value2 = $valueArray[$index];
            if (!$action && strpos($index, $searchUser) !== false) {
                $user->Update($type, $value2, $seachBd);
                if ($type == 'pseudo' | $type == 'email') {
                    $_SESSION['user'][$type] = $value2;
                }
                header('location: profil-user.php');
                exit;
            } else {
                $errorList['addUser'] = 'Ce patient existe déjà';
            }
            if (!$action && strpos($index, $searchAssociation) !== false) {
                $association->Update($type, $value2, $seachBd);
                if ($type == 'pseudo' | $type == 'email') {
                    $_SESSION['association'][$type] = $value2;
                }
                header('location: profil-association.php');
                exit;
            } else {
                $errorList['addUser'] = 'Ce patient existe déjà';
            }
        }
    }

    /**
     * Fonction permettant de faire la mise a jour du contenu utilisateur en effaçant d'abord le contenu du dossier.
     *
     * @param [type] $dossierClear
     *
     * @return void
     */
    public static function clearDir($dossierClear)
    {
        $dossier = $dossierClear;
        // Ouvre un dossier, et récupère un pointeur dessus
        $ouverture = opendir($dossier);
        //Lit une entrée du dossier
        $fichier = readdir($ouverture);
        $fichier = readdir($ouverture);
        //boucle pour lister les fichier du dossier
        while ($fichier = readdir($ouverture)) {
            //efface chaque fichier trouver
            unlink("$dossier/$fichier");
        }
        closedir($ouverture);
    }

    /**
     * Fonction pour effacer les fichiers et les dossiers du compte utilisateur association.
     *
     * @param [type] $dir
     *
     * @return void
     */
    public static function deleteTree($dir)
    {// $repertoire vient de l'eraseCtrl contient le chemin du dossier de l'association concerner
        $repertoire = $dir;
        // Effacement de tout les dossiers et les fichiers contenu dans $repertoire
        // condition de l'existance du dossier de l'association Chemin du dossier à vider
        if (file_exists($dir)) {
            //Affectation de fichiers à l'intérieur du répertoire
            $dir = new RecursiveDirectoryIterator($dir, FilesystemIterator::SKIP_DOTS);
            // Réduire la recherche de fichiers à une racine donnée
            // répertoire uniquement
            $dir = new RecursiveIteratorIterator($dir, RecursiveIteratorIterator::CHILD_FIRST);
            // Suppression des répertoires et des fichiers à l'intérieuremoving directories and files inside
            // le dossier spécifié
            foreach ($dir as $file) {
                $file->isDir() ? rmdir($file) : unlink($file);
            }
            // efface le dossier principale de l'association
            rmdir($repertoire);
        }
    }

    /**
     * fonction pour charger des fichiers image pour les associations.
     *
     * @param [type] $fileName
     * @param [type] $fileNameSave
     * @param [type] $repertoire
     * @param [type] $nameFile
     *
     * @return void
     */
    public static function uploadFile($fileName, $fileNameSave, $repertoire, $nameFile)
    {
        //determine le dossier principal ou seront ranger les fichiers
        $location = $repertoire.'/'.$fileName;
        //sort l'extention du fichier et l'ecrit en minuscule
        $file_extension = pathinfo($location, PATHINFO_EXTENSION);
        $file_extension = strtolower($file_extension);
        // Verifie le type de fichier accepter
        $valid_ext = ['jpg', 'png', 'jpeg'];
        // determine le chemin final du chargement
        $locationFinal = $repertoire.'/'.$fileNameSave.'.'.$file_extension;
        $response = 0;
        if (in_array($file_extension, $valid_ext)) {
            // charge les fichiers
            if (move_uploaded_file($_FILES[$nameFile]['tmp_name'], $locationFinal)) {
                // renvoie 1 pour faire apparaitre une modal de confirmation du transfére
                $response = 1;
            }
        }
        echo $response;
        exit;
    }

    /**
     * fonction verifie la presence du dossier de l'association s'il n'est pas present il le créez.
     *
     * @param [type] $repertoire
     *
     * @return void
     */
    public static function createCase($repertoire)
    {
        if (!file_exists($repertoire)) {
            mkdir($repertoire, 0777, true);
        }
    }
}
