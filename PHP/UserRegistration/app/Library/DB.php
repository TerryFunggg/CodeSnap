<?php
namespace App\Library;
use PDO;
use PDOException;

class DB extends PDO
{
    public function __construct($file = __DIR__ . '/../../setting.ini')
    {
        try {
            if (!$settings = parse_ini_file($file, TRUE))
                throw new PDOException('Unable to open ' . $file . '.');

            $dns = $settings['database']['driver'] .
                ':host=' . $settings['database']['host'] .
                ((!empty($settings['database']['port'])) ? (';port=' . $settings['database']['port']) : '') .
                ';dbname=' . $settings['database']['schema'];

            parent::__construct($dns, $settings['database']['username'], $settings['database']['password']);
        }catch (PDOException $exception){
            exit($exception->getMessage());
        }
    }
}


//class DB {
//    function connect() : PDO
//    {
//        try {
//            $conn = new PDO('mysql:'.DB_HOST.';dbname='.DB_SCHEMA,DB_USER,DB_PASSWORD);
//            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//            return $conn;
//        }catch (PDOException $exception){
//            exit($exception->getMessage());
//        }
//    }
//}
