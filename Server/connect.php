<?php
//DB�ڑ���`  
$db_user ="root";
$db_pass ="";
$db_host ="localhost";
$db_name ="phptest";
$db_type ="mysql";

//DSN�g�ݗ���
$dsn = "$db_type:host=$db_host;dbname=$db_name;charset=utf8";


//DB�ڑ�
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
        
        print '�ڑ��ɐ������܂���';
        }
        catch(PDOException $Exception){
            die('�ڑ��Ɏ��s���܂���');
            }
    }
    
    fucntion disconnect(){
    $pdo =null;
        
    }
    
}

//DB�ؒf

?>