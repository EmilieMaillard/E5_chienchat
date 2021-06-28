<?php

// Modification d'un adoptant

require_once($_SERVER["DOCUMENT_ROOT"]."/library/database.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/library/utils.php");

$adoptant['idAdoptant']          = $_POST['idAdoptant'];
$adoptant['lastname']         = $_POST['lastname'];
$adoptant['firstname']     = dateToFR($_POST['firstname']);

editAdoptant($adoptant);

header("location:/index.php");