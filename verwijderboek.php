<?php
require_once("Doctrine/Common/ClassLoader.php");
use Doctrine\Common\ClassLoader;
use VDAB\MijnProject\Business\BoekService;

$classloader = new ClassLoader("VDAB","src");
$classloader->register();
$boekenLijst = BoekService::toonAlleBoeken();
//require_once("vdab/mijnproject/business/boekservice.php");
BoekService::verwijderBoek($_GET["id"]);
header("location: toonalleboeken.php");
exit(0);
?>