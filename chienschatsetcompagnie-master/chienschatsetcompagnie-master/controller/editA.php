<?php

// Modification d'un animal

require_once($_SERVER["DOCUMENT_ROOT"]."/library/database.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/library/utils.php");

$animal['idA']          = $_POST['idA'];
$animal['name']         = $_POST['name'];
$animal['birthday']     = dateToFR($_POST['birthday']);
$animal['species']      = $_POST['species'];
$animal['breed']        = $_POST['breed'];
$animal['gender']       = $_POST['gender'];
$animal['careTaker']    = $_POST['careTaker'];
$animal['dateAdoption'] = $_POST['dateAdoption'];

editAnimal($animal);

header("location:/index.php");