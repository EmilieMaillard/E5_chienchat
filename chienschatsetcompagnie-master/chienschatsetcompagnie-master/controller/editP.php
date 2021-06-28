<?php

// Modification d'une personne

require_once($_SERVER["DOCUMENT_ROOT"]."/library/database.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/library/utils.php");

$person['idP']          = $_POST['idP'];
$person['lastname']     = $_POST['lastname'];
$person['firstname']    = $_POST['firstname'];
$person['phone']        = $_POST['phone'];
$person['status']       = $_POST['status'];

editperson($person);

header("location:/personnel.php");