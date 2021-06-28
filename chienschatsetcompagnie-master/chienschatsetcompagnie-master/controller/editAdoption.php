<?php

// Modification d'une personne

require_once($_SERVER["DOCUMENT_ROOT"]."/library/database.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/library/utils.php");

$adoption['idAdoption']          = $_POST['idAdoption'];
$adoptant['idAdoptant']     = $_POST['idAdoptant'];
$animal['name']    = $_POST['name'];
$animal['dateAdoption']        = $_POST['dateAdoption'];
$person['idPerson']       = $_POST['idP'];

editperson($person);

header("location:/personnel.php");