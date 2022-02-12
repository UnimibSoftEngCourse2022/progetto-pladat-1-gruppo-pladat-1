<?php

namespace src;
use PDO;

class DataBase
{
    public static function connect(){

        $servername = "localhost";
        $dbname = "mydb";
        $username = "root";
        $passworddb = "dbpass";

        try{
            $db = new PDO("mysql:=$servername;dbname=$dbname", $username, $passworddb);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db;
        } catch (PDOException $e){
            print "Errore! ". $e->getMessage() ." <br/>";
            die();
        }
    }
}
?>