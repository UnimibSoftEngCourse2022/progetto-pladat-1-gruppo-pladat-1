<?php

namespace src;
include 'DataBase.php';
class Category
{
    //CATEGORY STUDENT
    public static function addCategoryStudent($studentemail, $category){
        $db = DataBase::getDb();

        ##add categorie per studente
        if(($db->query("SELECT email FROM student WHERE email = '$studentemail';")->rowCount() != 0)
            && ($db->query("SELECT Student_email FROM student_has_category WHERE Student_email = '$studentemail' AND Category_Name = '$category';")->fetch()['Student_email'] == null)){
            $db->query("insert into student_has_category (Student_email, Category_Name)
	            values('$studentemail', '$category');");
        }
    }

    //modifica categoria studente

    //CATEGORY PLACEMENT
    public static function addCategoryPlacement($idPlacement, $category){
        $db = DataBase::getDb();

        ##add categorie per placement
        if(($db->query("SELECT idPlacement FROM placement WHERE idPlacement = '$idPlacement';")->rowCount() != 0)
            && ($db->query("SELECT Placement_idPlacement FROM placement_has_category WHERE idPlacement = '$idPlacement' AND Category_Name = '$category';")->rowCount() == 0)){
            $db->query("insert into placement_has_category (Placement_idPlacement, Category_Name)
	                values('$idPlacement', '$category');");
        }
    }

    //modifica categoria placement
}
?>