<?php
require_once("libraries/Twig/Autoloader.php");

//require_once("VDAB/MijnProject/Business/BoekService.php");
use VDAB\MijnProject\Business\BoekService;
Twig_Autoloader::register();

$boeken = BoekService::toonAlleBoeken();

$loader = new Twig_Loader_Filesystem("presentation");
$twig = new Twig_Environment($loader);
$view = $twig->render("boeken.twig", array("boekenLijst" => $boeken ));
print($view);
