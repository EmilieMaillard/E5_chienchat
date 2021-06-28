<?php

//     .___       __        ___.                         
//   __| _/____ _/  |______ \_ |__ _____    ______ ____  
//  / __ |\__  \\   __\__  \ | __ \\__  \  /  ___// __ \ 
// / /_/ | / __ \|  |  / __ \| \_\ \/ __ \_\___ \\  ___/ 
// \____ |(____  /__| (____  /___  (____  /____  >\___  >
//      \/     \/          \/    \/     \/     \/     \/ 
                                                    

// Initialisation des paramètres de l'application
require_once($_SERVER["DOCUMENT_ROOT"]."/library/utils.php");
$dbParams = getdbParams();

/**
 * Création d'une connexion à la base de données
 * @return objet PDO de connexion à la base
 */
function connexionDB() {
    global $dbParams;

    try {
        $dbh = new PDO($dbParams['databaseServer']['dsn'].$_SERVER["DOCUMENT_ROOT"].$dbParams['databaseServer']['dbHost'], 
            $dbParams['databaseServer']['username'], $dbParams['databaseServer']['passwd']);
    }
    catch (Exception $e) {
        die("Erreur dans le fichier ".__FILE__." : ".$e->getMessage());
    }
    return $dbh;
}

/**
 * Récupération d'un tableau des animaux
 * @return tableau des animaux
 */
function getAnimals() {
    global $dbParams;

    $dbh = connexionDB();
    $statement = $dbParams['querySQL']['getAnimals'];
    $PDOStatement = $dbh->query($statement);
    return $PDOStatement->fetchAll();
}

/**
 * Récupération d'un animal
 * @param $id 
 * @return animal dont l'identifiant est passé
 */
function getAnimal($id) {
    global $dbParams;

    $dbh = connexionDB();
    $statement = $dbParams['querySQL']['getAnimal'];
    $PDOStatement = $dbh->prepare($statement);
    $PDOStatement->bindParam(":idAnimal", $id);
    $PDOStatement->execute();
    return $PDOStatement->fetch(PDO::FETCH_ASSOC);
}

/**
 * Récupération d'un tableau du personnel
 * @return tableau du personnel
 */
function getPeople() {
    global $dbParams;

    $dbh = connexionDB();
    $statement = $dbParams['querySQL']['getPeople'];
    $PDOStatement = $dbh->query($statement);
    return $PDOStatement->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * Récupération d'une personne
 * @param $id 
 * @return personne dont l'identifiant est passé
 */
function getPerson($id) {
    global $dbParams;

    $dbh = connexionDB();
    $statement = $dbParams['querySQL']['getPerson'];
    $PDOStatement = $dbh->prepare($statement);
    $PDOStatement->bindParam(":idPerson", $id);
    $PDOStatement->execute();
    return $PDOStatement->fetch(PDO::FETCH_ASSOC);
}

/**
 * Récupération d'un tableau des animaux avec la personne en charge
 * @return tableau des animaux avec la personne en charge
 */
function getAnimalsWithCaretaker() {
    global $dbParams;

    $dbh = connexionDB();
    $statement = $dbParams['querySQL']['getAnimalsWithCaretaker'];
    $PDOStatement = $dbh->query($statement);
    return $PDOStatement->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * Suppression d'un animal
 * @param $îd identifiant de l'animal à supprimer
 */
function deleteAnimal($id) {
    global $dbParams;

    $dbh = connexionDB();
    $statement = $dbParams['querySQL']['deleteAnimal'];
    $PDOStatement = $dbh->prepare($statement);
    $PDOStatement->bindParam(":idAnimal", $id);
    $PDOStatement->execute();
}

/**
 * Ajout d'un animal
 * @param $animal tableau avec les propriété d'un animal
 */
function addAnimal($animal) {
    global $dbParams;

    $dbh = connexionDB();
    $statement = $dbParams['querySQL']['addAnimal'];
    $PDOStatement = $dbh->prepare($statement);
    $PDOStatement->bindParam(":name",       $animal['name']);
    $PDOStatement->bindParam(":birthday",   $animal['birthday']);
    $PDOStatement->bindParam(":species",    $animal['species']);
    $PDOStatement->bindParam(":breed",      $animal['breed']);
    $PDOStatement->bindParam(":gender",     $animal['gender']);
    $PDOStatement->bindParam(":careTaker",  $animal['careTaker']);
    $PDOStatement->bindParam(":dateAdoption",  $animal['dateAdopt']);

    $PDOStatement->execute();
}

/**
 * Modification d'un animal
 * @param $animal tableau avec les propriété de l'animal
 */
function editAnimal($animal) {
    global $dbParams;

    $dbh = connexionDB();
    $statement = $dbParams['querySQL']['editAnimal'];
    $PDOStatement = $dbh->prepare($statement);
    $PDOStatement->bindParam(":idAnimal",   $animal['idA']);
    $PDOStatement->bindParam(":name",       $animal['name']);
    $PDOStatement->bindParam(":birthday",   $animal['birthday']);
    $PDOStatement->bindParam(":species",    $animal['species']);
    $PDOStatement->bindParam(":breed",      $animal['breed']);
    $PDOStatement->bindParam(":gender",     $animal['gender']);
    $PDOStatement->bindParam(":careTaker",  $animal['careTaker']);
    $PDOStatement->bindParam(":dateAdoption",  $animal['dateAdopt']);
    $PDOStatement->execute();
}

/**
 * Ajout d'une personne
 * @param $person tableau avec les propriété de la personne
 */
function addPerson($person) {
    global $dbParams;

    $dbh = connexionDB();
    $statement = $dbParams['querySQL']['addPerson'];
    $PDOStatement = $dbh->prepare($statement);
    $PDOStatement->bindParam(":lastname",       $person['lastname']);
    $PDOStatement->bindParam(":firstname",      $person['firstname']);
    $PDOStatement->bindParam(":phone",          $person['phone']);
    $PDOStatement->bindParam(":status",         $person['status']);
    $PDOStatement->execute();
}

/**
 * Suppression d'une personne
 * @param $îd identifiant de la personne à supprimer
 */
function deletePerson($id) {
    global $dbParams;

    $dbh = connexionDB();
    $statement = $dbParams['querySQL']['deletePerson'];
    $PDOStatement = $dbh->prepare($statement);
    $PDOStatement->bindParam(":idPerson", $id);
    $PDOStatement->execute();
}

/**
 * Modification d'une personne
 * @param $person tableau avec les propriété de la personne
 */
function editPerson($person) {
    global $dbParams;

    $dbh = connexionDB();
    $statement = $dbParams['querySQL']['editPerson'];
    $PDOStatement = $dbh->prepare($statement);
    $PDOStatement->bindParam(":idPerson",   $person['idP']);
    $PDOStatement->bindParam(":lastname",   $person['lastname']);
    $PDOStatement->bindParam(":firstname",  $person['firstname']);
    $PDOStatement->bindParam(":phone",      $person['phone']);
    $PDOStatement->bindParam(":status",     $person['status']);
    $PDOStatement->execute();
}


/**
 * Ajout d'un adoptant
 * @param $adoptant tableau avec les propriété de l'adoptant
 */
function addAdoptant($adoptant) {
    global $dbParams;

    $dbh = connexionDB();
    $statement = $dbParams['querySQL']['addAdoptant'];
    $PDOStatement = $dbh->prepare($statement);
    $PDOStatement->bindParam(":lastname",       $adoptant['lastname']);
    $PDOStatement->bindParam(":firstname",      $adoptant['firstname']);
    $PDOStatement->execute();
}

/**
 * Suppression d'un adoptant
 * @param $id identifiant de l'adoptant à supprimer
 */
function deleteAdoptant($id) {
    global $dbParams;

    $dbh = connexionDB();
    $statement = $dbParams['querySQL']['deleteAdoptant'];
    $PDOStatement = $dbh->prepare($statement);
    $PDOStatement->bindParam(":idAdoptant", $id);
    $PDOStatement->execute();
}

/**
 * Modification d'un adoptant
 * @param $adoptant tableau avec les propriété de l'adoptant
 */
function editAdoptant($adoptant) {
    global $dbParams;

    $dbh = connexionDB();
    $statement = $dbParams['querySQL']['editAdoptant'];
    $PDOStatement = $dbh->prepare($statement);
    $PDOStatement->bindParam(":idAdoptant",   $adoptant['idAdoptant']);
    $PDOStatement->bindParam(":lastname",   $adoptant['lastname']);
    $PDOStatement->bindParam(":firstname",  $adoptant['firstname']);
    $PDOStatement->execute();
}

/**
 * Récupération d'un tableau des adoptants
 * @return tableau des adoptants
 */
function getAdoptant() {
    global $dbParams;

    $dbh = connexionDB();
    $statement = $dbParams['querySQL']['getAdoptant'];
    $PDOStatement = $dbh->query($statement);
    return $PDOStatement->fetchAll(PDO::FETCH_ASSOC);
}