<?php

class db
{
    private static $instance = NULl;

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            try {
                self::$instance = new PDO("mysql:host=127.0.0.1:52891;dbname=localdb", 'azure', '6#vWHD_$');
                // set the PDO error mode to exception
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$instance->exec("set names utf8");
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }
        return self::$instance;

    }
}

/*Database=localdb;Data Source=127.0.0.1:52891;User Id=azure;Password=6#vWHD_$*/
?>
