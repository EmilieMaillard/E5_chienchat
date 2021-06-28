<?php

// Ajout d'un adoptant

require_once($_SERVER["DOCUMENT_ROOT"]."/library/database.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/library/utils.php");

$adoptant['lastname']         = $_POST['lastname'];
$adoptant['firstname']     = dateToFR($_POST['firstname']);

addAdoptant($adoptant);

header("location:/index.php");