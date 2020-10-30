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

    // Return first value
    public static function querySingleValue($query, $params=array()) {
        $result = self::querySingle($query, $params);
        return $result[0];
    }

    // Return a number of modified row
    public static function queryAllNumber($query, $params=array()) {
        $result = self::$connect->prepare($query);
        $result->execute($params);
        return $result>rowCount();

    }


     // Insert into orders table
     public static function insertOrder($query, $params=array()) {
        $result = self::$connect->prepare($query);
        $result->execute($params);
        $id = self::$connect->lastInsertId();
        return $id;
    } 


    // Insert into order_detail table
    public static function insertOrderDetail($query, $params=array()) {
        $result = self::$connect->prepare($query);
        $result->execute($params);
        return $result->fetchAll();
    }


   


}