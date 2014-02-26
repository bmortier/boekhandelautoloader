<?php
namespace VDAB\MijnProject\Business;
//require_once("vdab/mijnproject/data/boekdao.class.php");
use VDAB\MijnProject\Data\BoekDAO;
use VDAB\MijnProject\Data\GenreDAO;


class BoekService {

    public static function toonAlleBoeken() {
        $lijst = BoekDAO::getAll();
return $lijst;
    }
public static function voegNieuwBoekToe($titel, $genreId){
    BoekDAO::create($titel, $genreId);
}
public static function verwijderBoek($id){
    BoekDAO::delete($id);
}
public static function haalBoekOp($id){
    $boek = BoekDAO::getByID($id);
    return $boek;
}

public static function updateBoek($id, $titel,$genreId){
    $genre = GenreDAO::getById($genreId);
    $boek = BoekDAO::getById($id);
    $boek->setTitel($titel);
    $boek->setGenre($genre);
    BoekDAO::update($boek);   
}
}
