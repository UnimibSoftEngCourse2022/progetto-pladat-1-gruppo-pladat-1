<?php

namespace src;
include 'DataBase.php';
class Photo
{
    //EMPLOYER METODI PHOTO
    public static function addPhotoEmployer($description, $path, $employeremail){
        $db = DataBase::getDb();

        ###creazione photo student
        if(($db->query("SELECT email FROM employer WHERE email = '$employeremail';")->rowCount() != 0)) {
            $db->query("insert into photo (description, Path, employer_email)
	            values('$description', '$path', '$employeremail');");
        }
    }

    public static function getPathImageEmployer($employeremail){
        $db = DataBase::getDb();

        ###get path immagine profilo di student + controllo su photo email studente
        if(($db->query("SELECT email FROM employer WHERE email = '$employeremail';")->rowCount() != 0)
            && ($db->query("SELECT idPhoto FROM photo WHERE employer_email = '$employeremail'")->rowCount() != 0)){
            return $db->query("select Path from photo where employer_email = '$employeremail' ORDER BY idPhoto DESC LIMIT 1");
        }
        return "Errore";
    }


    //STUDENT METODI PHOTO
    public static function addPhotoStudent($description, $path, $studentemail){
        $db = DataBase::getDb();

        ###creazione photo student
        if(($db->query("SELECT email FROM student WHERE email = '$studentemail';")->rowCount() != 0)) {
            $db->query("insert into photo (description, Path, student_email)
	            values('$description', '$path', '$studentemail');");
        }
    }

    public static function getPathImageStudent($studentemail){
        $db = DataBase::getDb();

        ###get path immagine profilo di student + controllo su photo email studente
        if(($db->query("SELECT email FROM student WHERE email = '$studentemail';")->rowCount() != 0)
            && ($db->query("SELECT idPhoto FROM photo WHERE student_email = '$studentemail'")->rowCount() != 0)){
            return $db->query("SELECT Path from photo WHERE student_email = '$studentemail' ORDER BY idPhoto DESC LIMIT 1");
        }
        return "Errore";
    }


    //PLACEMENT METODI PHOTO
    public static function addPhotoPlacement($description, $path, $idPlacement){
        $db = DataBase::getDb();

        ###creazione photo student
        if(($db->query("SELECT idPlacement FROM placement WHERE email = '$idPlacement';")->rowCount() != 0)) {
            $db->query("insert into photo (description, Path, placement_idPlacement)
	            values('$description', '$path', '$idPlacement');");
        }
    }

    public static function getPathImageProfilePlacement($idPlacement){
        $db = DataBase::getDb();

        ###get path immagine profilo di student + controllo su photo email studente
        if(($db->query("SELECT idPlacement FROM placement WHERE email = '$idPlacement';")->rowCount() != 0)
            && ($db->query("SELECT idPhoto FROM photo WHERE placement_idPlacement = '$idPlacement'")->rowCount() != 0)){
            return $db->query("select Path from photo where placement_idPlacement = '$idPlacement' ORDER BY idPhoto ASC LIMIT 1");
        }
        return "Errore";
    }

    public static function getPathImagePlacement($idPlacement){
        $db = DataBase::getDb();

        ###get path immagine profilo di student + controllo su photo email studente
        if(($db->query("SELECT idPlacement FROM placement WHERE email = '$idPlacement';")->rowCount() != 0)
            && ($db->query("SELECT idPhoto FROM photo WHERE placement_idPlacement = '$idPlacement'")->rowCount() != 0)){
            return $db->query("select Path from photo where placement_idPlacement = '$idPlacement'");
        }
        return "Errore";
    }


}
?>