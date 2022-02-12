<?php

namespace src;
use PDO;

class DataBase
{
    private static $db;

    private function __construct(){}

    public static function getDb(){
        if(self::$db == null){
            $ini = parse_ini_file('config/config.ini');
            $servername = $ini['servername'];
            $dbname = $ini['dbname'];
            $username = $ini['username'];
            $password = $ini['password'];
            try{
                self::$db = new PDO("mysql:=$servername;dbname=$dbname", $username, $password);
                self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                print "Errore! " . $e->getMessage() . " <br/>";
                die();
            }
        }
        return self::$db;

    }
}
?>