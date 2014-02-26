<?php
require_once("Doctrine/Common/ClassLoader.php");
use Doctrine\Common\ClassLoader;

use VDAB\MijnProject\Business\BoekService;
use VDAB\MijnProject\Business\GenreService;
$classloader = new ClassLoader("VDAB","src");
$classloader->register();
$boekenLijst = BoekService::toonAlleBoeken();
//include("src/vdab/mijnproject/presentation/boekenlijst.php");


//require_once("vdab/mijnproject/business/boekservice.php");
//require_once("vdab/mijnproject/business/genreservice.php");
//require_once("vdab/mijnproject/exceptions/titelbestaatexception.php");

if(isset($_GET["action"]) && $_GET["action"] == "process") {
    try{
    BoekService::voegNieuwBoekToe($_POST["txtTitel"], $_POST["selGenre"]);
    header("location: toonalleboeken.php");
    exit(0);
    
} catch(TitelBestaatException $tbe) {
    header("location: voegboektoe.php?error=titleexists");
    exit(0);
}
}

else {
    $genreLijst = GenreService::toonAlleGenres();
    if (isset($_GET["error"])){
          $error = $_GET["error"];
    }
    include("src/vdab/mijnproject/presentation/nieuwboekform.php");

}
?>