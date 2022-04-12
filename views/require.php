<?php

spl_autoload_register(function(){
    require '../model/Patient.php';
    require '../model/Adresse.php';
    require '../model/Commune.php';
    require '../model/Ville.php';
    require '../model/Region.php';
    require '../model/Pays.php';
    require '../Recuperer.php';
});