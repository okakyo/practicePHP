<?php
//DB接続定義  
$db_user ="root";
$db_pass ="";
$db_host ="localhost";
$db_name ="phptest";
$db_type ="mysql";

//DSN組み立て
$dsn = "$db_type:host=$db_host;dbname=$db_name;charset=utf8";


//DB接続
class SqlExample{
    const USER="root";
    const pass="";
    const DB_HOST="localhost";
    const UTF="utf8";
    const DB_TYPE="mysql";
    
    function __construct(){
        try{

        $pdo = new PDO($dsn,$db_user,$db_pass);
        
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
        
        print '接続に成功しました';
        }
        catch(PDOException $Exception){
            die('接続に失敗しました');
            }
    }
    
    fucntion disconnect(){
    $pdo =null;
        
    }
    
}

//DB切断

?>