<?php

// Suppression d'un animal

require_once($_SERVER["DOCUMENT_ROOT"]."/library/database.php");

deleteAnimal($_GET['id']);

header("location:/index.php");