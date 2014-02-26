<?php
//require_once("vdab/mijnproject/business/boekservice.php");
require_once("Doctrine/Common/ClassLoader.php");
use Doctrine\Common\ClassLoader;
use VDAB\MijnProject\Business\BoekService;


$classloader = new ClassLoader("VDAB","src");
$classloader->register();
$boekenLijst = BoekService::toonAlleBoeken();
include("src/vdab/mijnproject/presentation/boekenlijst.php");

/*
require_once("data/boekdao.class.php");

$boek = BoekDAO::getByID(3);
print("<pre>");
print_r($boek);
print("</pre>");
*/?>