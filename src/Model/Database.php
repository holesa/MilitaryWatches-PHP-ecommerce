<?php
class Database 
{
    private static $settings = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false
    );

    private static $connect;

    public static function connectToDB($host, $user, $password, $db) {
        if(!isset(self::$connect)){
            self::$connect = @new PDO(
                "mysql:host=$host;dbname=$db",
                $user,
                $password,
                self::$settings 
            );
        }
    }

    // Return one row 
    public static function querySingle($query, $params=array()) {
            $result = self::$connect->prepare($query);
            $result->execute($params);
            return $result->fetch();

    }

    // Return all rows
    public static function queryAll($query, $params=array()) {
        $result = self::$connect->prepare($query);
        $result->execute($params);
        return $result->fetchAll();

}

     // Insert one row and return id
     public static function insertAndReturnID($query, $params=array()) {
        $result = self::$connect->prepare($query);
        $result->execute($params);
        $id = self::$connect->lastInsertId();
        return $id;
    } 


    // Insert one row
    public static function insert($query, $params=array()) {
        $result = self::$connect->prepare($query);
        $result->execute($params);
        return null;
    }


   


}