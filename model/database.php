<?php
/*$dsn = 'mysql:host=localhost;dbname=libmanagement';
$username = 'root';
$password = '';
$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");

try {
    $db = new PDO($dsn, $username, $password, $options);
    //echo "<h1>Connection OK!</h1>";
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    echo "<p>Error connecting to database: $error_message</p>";
    exit();
}*/


class Database{

    private static $dsn = 'mysql:host=localhost;dbname=libmanagement';
    private static $username = 'root';
    private static $password = '';
    private static $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");

    private static $db;

    private function __construct()
    {
    }

    public static function getDB(){

        if (!isset(self::$db)){
            try{
                self::$db = new PDO(
                    self::$dsn,
                    self::$username,
                    self::$password,
                    self::$options
                );
            } catch (PDOException $e){
                $error_message = $e->getMessage();
                echo "<p>Error connecting to database: $error_message</p>";
            }
        }
        return self::$db;
    }
}

