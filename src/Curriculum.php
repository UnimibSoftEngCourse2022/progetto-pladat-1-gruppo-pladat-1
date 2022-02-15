<?php

namespace src;
include 'DataBase.php';
class Curriculum
{
    public static function getCurriculum($idPlacement){
        $db = DataBase::getDb();
        if($db->query("SELECT idPlacement FROM placement WHERE idPlacement = '$idPlacement';")->rowCount() != 0){
            return $db->query("select Path from curriculum where Request_Placement_idPlacement = '$idPlacement'");
        }
    }
}
?>