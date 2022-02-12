<?php

namespace src;

class Employer
{
    public static function createEmployer($employeremail, $name, $description, $address, $password){

        $db = DataBase::connect();

        #inserimento employer nel db + check presenza email
        if(($db->query("SELECT email FROM employer WHERE email = '$employeremail';")->rowCount() == 0)
            && ($db->query("SELECT email FROM student WHERE email = '$employeremail';")->rowCount() == 0)){
            $db->query("insert into mydb.employer(email, name, description, address, password)
                values ('$employeremail', '$name', '$description', '$address', '$password');");
        }
    }

    public static function addPhoto($description, $path, $employeremail){
        $db = DataBase::connect();

        ###creazione photo student
        if(($db->query("SELECT email FROM employer WHERE email = '$employeremail';")->rowCount() != 0)) {
            $db->query("insert into photo (description, Path, employer_email)
	            values('$description', '$path', '$employeremail');");
        }
    }

    public static function getPathImage($employeremail){
        $db = DataBase::connect();

        ###get path immagine profilo di student + controllo su photo email studente
        if(($db->query("SELECT email FROM employer WHERE email = '$employeremail';")->rowCount() != 0)
            && ($db->query("SELECT idPhoto FROM photo WHERE employer_email = '$employeremail'")->rowCount() != 0)){
            return $db->query("select Path from photo where employer_email = '$employeremail' ORDER BY idPhoto DESC LIMIT 1");
        }
        return "Errore";
    }

    public static function login($employeremail, $password){
        $db = DataBase::connect();

        if($db->query("SELECT email FROM employer WHERE email = '$employeremail' AND password = '$password';")->rowCount() != 0){
            return true;
        }
        return false;
    }
}
?>