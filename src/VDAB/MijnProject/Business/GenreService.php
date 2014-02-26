<?php
namespace VDAB\MijnProject\Business;
use VDAB\MijnProject\Data\GenreDAO;

//require_once("vdab/mijnproject/data/genredao.class.php");

class GenreService {

    public static function toonAlleGenres() {
        $lijst = GenreDAO::getAll();
return $lijst;
    }

}

