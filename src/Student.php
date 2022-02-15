<?php

namespace src;
class Student
{
    public static function createStudent($studentemail, $name, $surname, $birthDate, $introduction, $password){
        $db = DataBase::getDb();

        #inserimento student nel db + check presenza mail
        if(($db->query("SELECT email FROM student WHERE email = '$studentemail';")->rowCount() == 0)
            && ($db->query("SELECT email FROM employer WHERE email = '$studentemail';")->rowCount() == 0)){
            $db->query("insert into student(email, name, surname, birth_date, presentation, password)
	            values ('$studentemail', '$name', '$surname', '$birthDate', '$introduction', '$password');");
        }
    }

    /*
    public static function addCategory($studentemail, $category){
        $db = DataBase::getDb();

        ##add categorie per studente
        if(($db->query("SELECT email FROM student WHERE email = '$studentemail';")->rowCount() != 0)
            && ($db->query("SELECT Student_email FROM student_has_category WHERE Student_email = '$studentemail' AND Category_Name = '$category';")->fetch()['Student_email'] == null)){
            $db->query("insert into student_has_category (Student_email, Category_Name)
	            values('$studentemail', '$category');");
        }
    }

    */
    /*
    public static function addPhoto($description, $path, $studentemail){
        $db = DataBase::getDb();

        ###creazione photo student
        if(($db->query("SELECT email FROM student WHERE email = '$studentemail';")->rowCount() != 0)) {
            $db->query("insert into photo (description, Path, student_email)
	            values('$description', '$path', '$studentemail');");
        }
    }

    public static function getPathImage($studentemail){
        $db = DataBase::getDb();

        ###get path immagine profilo di student + controllo su photo email studente
        if(($db->query("SELECT email FROM student WHERE email = '$studentemail';")->rowCount() != 0)
            && ($db->query("SELECT idPhoto FROM photo WHERE student_email = '$studentemail'")->rowCount() != 0)){
            return $db->query("SELECT Path from photo WHERE student_email = '$studentemail' ORDER BY idPhoto DESC LIMIT 1");
        }
        return "Errore";
    }
    */
    public static function login($studentemail, $password){
        $db = DataBase::getDb();

        if($db->query("SELECT email FROM student WHERE email = '$studentemail' AND password = '$password';")->rowCount() != 0){
            return true;
        }
        return false;
    }

    public static function cancellazioneAccount($studentemail){
        $db = DataBase::getDb();

        if(($db->query("SELECT email FROM student WHERE email = '$studentemail';")->rowCount() != 0)) {
            $db->query("DELETE from student WHERE email = '$studentemail';");
        }
    }

    public static function changeName($email, $newName){
        $db = DataBase::getDb();

        if (($db->query("SELECT email FROM student WHERE email = '$email';")->rowCount() != 0)) {
            $db->query("UPDATE student SET name = '$newName' WHERE email = '$email';");
        }
    }

    public static function changeSurname($email, $newSurname){
        $db = DataBase::getDb();

        if (($db->query("SELECT email FROM student WHERE email = '$email';")->rowCount() != 0)) {
            $db->query("UPDATE student SET surname = '$newSurname' WHERE email = '$email';");
        }
    }

    public static function changeBirthDate($email, $newBirthDate){
        $db = DataBase::getDb();

        if (($db->query("SELECT email FROM student WHERE email = '$email';")->rowCount() != 0)) {
            $db->query("UPDATE student SET birth_date = '$newBirthDate' WHERE email = '$email';");
        }
    }

    public static function changePresentation($email, $newPresentation){
        $db = DataBase::getDb();

        if (($db->query("SELECT email FROM student WHERE email = '$email';")->rowCount() != 0)) {
            $db->query("UPDATE student SET Presentation = '$newPresentation' WHERE email = '$email';");
        }
    }

    public static function changePassword($email, $newPassword){
        $db = DataBase::getDb();

        if (($db->query("SELECT email FROM student WHERE email = '$email';")->rowCount() != 0)) {
            $db->query("UPDATE student SET password = '$newPassword' WHERE email = '$email';");
        }
    }
}