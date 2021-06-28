<?php

// Suppression d'un adoptant

require_once($_SERVER["DOCUMENT_ROOT"]."/library/database.php");

deleteAdoptant($_GET['id']);

header("location:/index.php");