<?php

// Suppression d'une personne

require_once($_SERVER["DOCUMENT_ROOT"]."/library/database.php");

deletePerson($_GET['id']);

header("location:/personnel.php");