<?php

// Ajout d'une personne

require_once($_SERVER["DOCUMENT_ROOT"]."/library/database.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/library/utils.php");

$person['firstname']    = $_POST['firstname'];
$person['lastname']     = $_POST['lastname'];
$person['phone']        = $_POST['phone'];
$person['status']       = $_POST['status'];

addPerson($person);

header("location:/personnel.php");