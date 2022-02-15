<?php
namespace src;
include 'DataBase.php';
class Placement
{
    public static function createPlacement($title, $description, $duration, $start_date, $expiration_date, $start_placement, $salary, $employeremail){

        $db = DataBase::getDb();

        #inserimento placement nel db
        if($db->query("SELECT email FROM employer WHERE email = '$employeremail';")->rowCount() != 0){
            $db->query("insert into mydb.placement(title, description, duration, start_date, expiration_date, start_placement, salary, employer_email)
                values ('$title','$description','$duration','$start_date','$expiration_date','$start_placement','$salary','$employeremail');");
        }
    }
    /*
    public static function addCategory($idPlacement, $category){
        $db = DataBase::getDb();

        ##add categorie per placement
        if(($db->query("SELECT idPlacement FROM placement WHERE idPlacement = '$idPlacement';")->rowCount() != 0)
            && ($db->query("SELECT Placement_idPlacement FROM placement_has_category WHERE idPlacement = '$idPlacement' AND Category_Name = '$category';")->rowCount() == 0)){
                $db->query("insert into placement_has_category (Placement_idPlacement, Category_Name)
	                values('$idPlacement', '$category');");
        }
    }
    */
    /*
    public static function addPhoto($description, $path, $idPlacement){
        $db = DataBase::getDb();

        ###creazione photo student
        if(($db->query("SELECT idPlacement FROM placement WHERE email = '$idPlacement';")->rowCount() != 0)) {
            $db->query("insert into photo (description, Path, placement_idPlacement)
	            values('$description', '$path', '$idPlacement');");
        }
    }

    public static function getPathImageProfile($idPlacement){
        $db = DataBase::getDb();

        ###get path immagine profilo di student + controllo su photo email studente
        if(($db->query("SELECT idPlacement FROM placement WHERE email = '$idPlacement';")->rowCount() != 0)
            && ($db->query("SELECT idPhoto FROM photo WHERE placement_idPlacement = '$idPlacement'")->rowCount() != 0)){
            return $db->query("select Path from photo where placement_idPlacement = '$idPlacement' ORDER BY idPhoto ASC LIMIT 1");
        }
        return "Errore";
    }

    public static function getPathImage($idPlacement){
        $db = DataBase::getDb();

        ###get path immagine profilo di student + controllo su photo email studente
        if(($db->query("SELECT idPlacement FROM placement WHERE email = '$idPlacement';")->rowCount() != 0)
            && ($db->query("SELECT idPhoto FROM photo WHERE placement_idPlacement = '$idPlacement'")->rowCount() != 0)){
            return $db->query("select Path from photo where placement_idPlacement = '$idPlacement'");
        }
        return "Errore";
    }
    */
    public static function searchPlacements($categorylist){
        $db = DataBase::getDb();
        $return = [];
        foreach($categorylist as &$category){
            $return += $db->query("SELECT placement_idPlacement FROM placement_has_category WHERE Category_Name = '$category';")->fetchAll();
        }
        return $return;
    }
    /*
    public static function getCurriculum($idPlacement){
        $db = DataBase::getDb();
        if($db->query("SELECT idPlacement FROM placement WHERE idPlacement = '$idPlacement';")->rowCount() != 0){
            return $db->query("select Path from curriculum where Request_Placement_idPlacement = '$idPlacement'");
        }
    }
    */
    public static function cancellazionePlacement($idPlacement){
        $db = DataBase::getDb();

        if(($db->query("SELECT idPlacement FROM placement WHERE idPlacement = '$idPlacement';")->rowCount() != 0)) {
            $db->query("DELETE from placement WHERE idPlacement = '$idPlacement';");
        }
    }

    public static function changeTitle($idPlacement, $newTitle){
        $db = DataBase::getDb();

        if (($db->query("SELECT idPlacement FROM placement WHERE idPlacement = '$idPlacement';")->rowCount() != 0)) {
            $db->query("UPDATE placement SET title = '$newTitle' WHERE idPlacement = '$idPlacement';");
        }
    }

    public static function changeDescription($idPlacement, $newDescription){
        $db = DataBase::getDb();

        if (($db->query("SELECT idPlacement FROM placement WHERE idPlacement = '$idPlacement';")->rowCount() != 0)) {
            $db->query("UPDATE placement SET description = '$newDescription' WHERE idPlacement = '$idPlacement';");
        }
    }

    public static function changeDuration($idPlacement, $newDuration){
        $db = DataBase::getDb();

        if (($db->query("SELECT idPlacement FROM placement WHERE idPlacement = '$idPlacement';")->rowCount() != 0)) {
            $db->query("UPDATE placement SET duration = '$newDuration' WHERE idPlacement = '$idPlacement';");
        }
    }

    public static function changeStartDate($idPlacement, $newStartDate){
        $db = DataBase::getDb();

        if (($db->query("SELECT idPlacement FROM placement WHERE idPlacement = '$idPlacement';")->rowCount() != 0)) {
            $db->query("UPDATE placement SET start_date = '$newStartDate' WHERE idPlacement = '$idPlacement';");
        }
    }

    public static function changeExpirationDate($idPlacement, $newExpirationDate){
        $db = DataBase::getDb();

        if (($db->query("SELECT idPlacement FROM placement WHERE idPlacement = '$idPlacement';")->rowCount() != 0)) {
            $db->query("UPDATE placement SET expiration_date = '$newExpirationDate' WHERE idPlacement = '$idPlacement';");
        }
    }

    public static function changeStartPlacement($idPlacement, $newStartPlacement){
        $db = DataBase::getDb();

        if (($db->query("SELECT idPlacement FROM placement WHERE idPlacement = '$idPlacement';")->rowCount() != 0)) {
            $db->query("UPDATE placement SET start_placement = '$newStartPlacement' WHERE idPlacement = '$idPlacement';");
        }
    }

    public static function changeSalary($idPlacement, $newSalary){
        $db = DataBase::getDb();

        if (($db->query("SELECT idPlacement FROM placement WHERE idPlacement = '$idPlacement';")->rowCount() != 0)) {
            $db->query("UPDATE placement SET salary = '$newSalary' WHERE idPlacement = '$idPlacement';");
        }
    }
}