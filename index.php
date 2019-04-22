<?php
require_once 'Chambre.php';
require_once 'Hotel.php';
require_once 'Appartement.php';

$hotel = new Hotel("hotel", 3);
$hotel->afficher();
$hotel->reserverChambre(412, 15, "Est");
$hotel->afficher();
$hotel->reserverChambre(15, "Est", 412);
$hotel->afficher();
$hotel->reserverChambre(414, 15, "Est");
$hotel->reserverApp(418, 15, "Est", 3, true);
$hotel->reserverChambre(418, 15, "Est");
$hotel->afficher();