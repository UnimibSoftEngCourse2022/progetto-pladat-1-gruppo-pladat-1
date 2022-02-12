<?php

namespace src;
include 'DataBase.php';
class Employer
{
    public static function createEmployer($employeremail, $name, $description, $address, $password){

        $db = DataBase::getDb();

        #inserimento employer nel db + check presenza email
        if(($db->query("SELECT email FROM employer WHERE email = '$employeremail';")->rowCount() == 0)
            && ($db->query("SELECT email FROM student WHERE email = '$employeremail';")->rowCount() == 0)){
            $db->query("insert into mydb.employer(email, name, description, address, password)
                values ('$employeremail', '$name', '$description', '$address', '$password');");
        }
    }

    public static function addPhoto($description, $path, $employeremail){
        $db = DataBase::getDb();

        ###creazione photo student
        if(($db->query("SELECT email FROM employer WHERE email = '$employeremail';")->rowCount() != 0)) {
            $db->query("insert into photo (description, Path, employer_email)
	            values('$description', '$path', '$employeremail');");
        }
    }

    public static function getPathImage($employeremail){
        $db = DataBase::getDb();

        ###get path immagine profilo di student + controllo su photo email studente
        if(($db->query("SELECT email FROM employer WHERE email = '$employeremail';")->rowCount() != 0)
            && ($db->query("SELECT idPhoto FROM photo WHERE employer_email = '$employeremail'")->rowCount() != 0)){
            return $db->query("select Path from photo where employer_email = '$employeremail' ORDER BY idPhoto DESC LIMIT 1");
        }
        return "Errore";
    }

    public static function login($employeremail, $password){
        $db = DataBase::getDb();

        if($db->query("SELECT email FROM employer WHERE email = '$employeremail' AND password = '$password';")->rowCount() != 0){
            return true;
        }
        return false;
    }

    public static function cancellazioneAccount($employeremail){
        $db = DataBase::getDb();

        if(($db->query("SELECT email FROM employer WHERE email = '$employeremail';")->rowCount() != 0)) {
            $db->query("DELETE from employer WHERE email = '$employeremail';");
        }
    }

    public static function changeName($email, $newName){
        $db = DataBase::getDb();

        if (($db->query("SELECT email FROM employer WHERE email = '$email';")->rowCount() != 0)) {
            $db->query("UPDATE employer SET name = '$newName' WHERE email = '$email';");
        }
    }

    public static function changeDescription($email, $newDescription){
        $db = DataBase::getDb();

        if (($db->query("SELECT email FROM employer WHERE email = '$email';")->rowCount() != 0)) {
            $db->query("UPDATE employer SET description = '$newDescription' WHERE email = '$email';");
        }
    }

    public static function changeAddress($email, $newAddress){
        $db = DataBase::getDb();

        if (($db->query("SELECT email FROM employer WHERE email = '$email';")->rowCount() != 0)) {
            $db->query("UPDATE employer SET address = '$newAddress' WHERE email = '$email';");
        }
    }

    public static function changePassword($email, $newPassword){
        $db = DataBase::getDb();

        if (($db->query("SELECT email FROM employer WHERE email = '$email';")->rowCount() != 0)) {
            $db->query("UPDATE employer SET password = '$newPassword' WHERE email = '$email';");
        }
    }
}
?>