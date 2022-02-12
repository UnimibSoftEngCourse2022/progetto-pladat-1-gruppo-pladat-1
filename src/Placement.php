<?php
namespace src;
include 'DataBase.php';
class Placement
{
    public static function createPlacement($title, $description, $duration, $start_date, $expiration_date, $start_placement, $salary, $employeremail){

        $db = DataBase::connect();

        #inserimento placement nel db
        if($db->query("SELECT email FROM employer WHERE email = '$employeremail';")->rowCount() != 0){
            $db->query("insert into mydb.placement(title, description, duration, start_date, expiration_date, start_placement, salary, employer_email)
                values ('$title','$description','$duration','$start_date','$expiration_date','$start_placement','$salary','$employeremail');");
        }
    }

    public static function addCategory($idPlacement, $category){
        $db = DataBase::connect();

        ##add categorie per placement
        if(($db->query("SELECT idPlacement FROM placement WHERE idPlacement = '$idPlacement';")->rowCount() != 0)
            && ($db->query("SELECT Placement_idPlacement FROM placement_has_category WHERE idPlacement = '$idPlacement' AND Category_Name = '$category';")->rowCount() == 0)){
                $db->query("insert into placement_has_category (Placement_idPlacement, Category_Name)
	                values('$idPlacement', '$category');");
        }
    }

    public static function addPhoto($description, $path, $idPlacement){
        $db = DataBase::connect();

        ###creazione photo student
        if(($db->query("SELECT idPlacement FROM placement WHERE email = '$idPlacement';")->rowCount() != 0)) {
            $db->query("insert into photo (description, Path, placement_idPlacement)
	            values('$description', '$path', '$idPlacement');");
        }
    }

    public static function getPathImageProfile($idPlacement){
        $db = DataBase::connect();

        ###get path immagine profilo di student + controllo su photo email studente
        if(($db->query("SELECT idPlacement FROM placement WHERE email = '$idPlacement';")->rowCount() != 0)
            && ($db->query("SELECT idPhoto FROM photo WHERE placement_idPlacement = '$idPlacement'")->rowCount() != 0)){
            return $db->query("select Path from photo where placement_idPlacement = '$idPlacement' ORDER BY idPhoto ASC LIMIT 1");
        }
        return "Errore";
    }

    public static function getPathImage($idPlacement){
        $db = DataBase::connect();

        ###get path immagine profilo di student + controllo su photo email studente
        if(($db->query("SELECT idPlacement FROM placement WHERE email = '$idPlacement';")->rowCount() != 0)
            && ($db->query("SELECT idPhoto FROM photo WHERE placement_idPlacement = '$idPlacement'")->rowCount() != 0)){
            return $db->query("select Path from photo where placement_idPlacement = '$idPlacement'");
        }
        return "Errore";
    }

    public static function searchPlacements($categorylist){
        $db = DataBase::connect();
        $return = [];
        foreach($categorylist as &$category){
            $return += $db->query("SELECT placement_idPlacement FROM placement_has_category WHERE Category_Name = '$category';")->fetchAll();
        }
        return $return;
    }

    public static function getCurriculum($idPlacement){
        $db = DataBase::connect();
        if($db->query("SELECT idPlacement FROM placement WHERE idPlacement = '$idPlacement';")->rowCount() != 0){
            return $db->query("select Path from curriculum where Request_Placement_idPlacement = '$idPlacement'");
        }
    }
}