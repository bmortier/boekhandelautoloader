<?php
namespace VDAB\MijnProject\Data;
use PDO, VDAB\MijnProject\Data\DBConfig, VDAB\MijnProject\Entities\Genre, VDAB\MijnProject\Entities\Boek;
//require_once("vdab/mijnproject/data/DBConfig.php");
//require_once("vdab/mijnproject/entities/genre.php");
//require_once("vdab/mijnproject/entities/boek.php");

class BoekDAO {

    public static function getAll() {
        $lijst = array();

        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "select mvc_boeken.id as boekid, titel, genreid, omschrijving from mvc_boeken, mvc_genres where genreid = mvc_genres.id";
        $resultSet = $dbh->query($sql);
        foreach ($resultSet as $rij) {
            $genre = Genre::create($rij["genreid"], $rij["omschrijving"]);
            $boek = Boek::create($rij["boekid"], $rij["titel"], $genre);
            array_push($lijst, $boek);
        }
        $dbh = null;
        return $lijst;
    }

    public static function getById($id) {
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "select mvc_boeken.id as boekid, titel, genreid, omschrijving from mvc_boeken, mvc_genres where genreid = mvc_genres.id and mvc_boeken.id = " . $id;
        $resultSet = $dbh->query($sql);
        $rij = $resultSet->fetch();
        $genre = Genre::create($id, $rij["genreid"], $rij["omschrijving"]);
        $boek = Boek::create($rij["boekid"], $rij["titel"], $genre);
        $dbh = null;
        return $boek;
    }
    public static function getByTitel($titel) {
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $sql = "select mvc_boeken.id as boekid, titel, genreid, omschrijving from mvc_boeken, mvc_genres where genreid = mvc_genres.id and titel = '" . $titel . "'";
        $resultSet = $dbh->query($sql);
        $rij = $resultSet->fetch();
        if(!$rij){
            return null;
        }
        else{
        $genre = Genre::create($id, $rij["genreid"], $rij["omschrijving"]);
        $boek = Boek::create($rij["boekid"], $rij["titel"], $genre);
        $dbh = null;
        return $boek;
    }
    }
    
    

    public static function create($titel, $genreId) {
                $bestaandBoek = self::getByTitel($titel);
                if(isset($bestaandBoek)) throw new TitelBestaatException();

        $sql = "insert into mvc_boeken (titel, genreid) values ('" . $titel . "','" . $genreId . "')";
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $dbh->exec($sql);
        $boekId = $dbh->lastInsertId();
        $dbh = null;
        $genre = GenreDAO::getById($genreId);
        $boek = Boek::create($boekId, $titel, $genre);
        return $boek;
    }

    public static function delete($id) {
        $sql = "delete from mvc_boeken where id = " . $id;
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $dbh->exec($sql);
        $dbh = null;
        return $boek;
    }

    public static function update($boek) {
        $bestaandBoek = self::getByTitel($boek->getTitel());
                if(isset($bestaandBoek) && $bestaandBoek->getID() != $boek->getID()) throw new TitelBestaatException();
        $sql = "update mvc_boeken set titel='" . $boek->getTitel() .
                "', genreid=" . $boek->getGenre()->getID() . " where id = " . $boek->getID();
        $dbh = new PDO(DBConfig::$DB_CONNSTRING, DBConfig::$DB_USERNAME, DBConfig::$DB_PASSWORD);
        $dbh->exec($sql);
        $dbh = null;
    }

}
