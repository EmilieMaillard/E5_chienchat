<?php

//         __  .__.__          
//  __ ___/  |_|__|  |   ______
// |  |  \   __\  |  |  /  ___/
// |  |  /|  | |  |  |__\___ \ 
// |____/ |__| |__|____/____  >
//                          \/ 

/**
 * Lecture des paramètres de la base de données
 * à partir du fichier /config/database.cfg
 */
function getDbParams() {
    global $ROOT;

    $CONFIG_FILE = $_SERVER["DOCUMENT_ROOT"]."/config/database.cfg";
    return parse_ini_file($CONFIG_FILE, true); 
}

/**
 * Conversion d'une date format US vers français
 * @param   $dateUS (string) au format yyyy-mm-dd
 * @return  $dateFR (string) au format dd/mm/yyyy
 */
function dateToFR($dateUS) {
    $dateFR = preg_replace('/^(19|20)(\d{2})-(\d{2})-(\d{2})$/', '\4/\3/\1\2', $dateUS);
    return $dateFR;
}

/**
 * Conversion d'une date format US vers français
 * @param   $dateFR (string) au format dd/mm/yyyy
 * @return  $dateUS (string) au format yyyy-mm-dd
 */
function dateToUS($dateFR) {
    $dateUS = preg_replace('/^(\d{2})\/(\d{2})\/(19|20)(\d{2})$/', '\3\4-\2-\1', $dateFR);
    return $dateUS;
}

?>