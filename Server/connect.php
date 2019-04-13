<?php
//DBÚ‘±’è‹`  
$db_user ="root";
$db_pass ="";
$db_host ="localhost";
$db_name ="phptest";
$db_type ="mysql";

//DSN‘g‚Ý—§‚Ä
$dsn = "$db_type:host=$db_host;dbname=$db_name;charset=utf8";


//DBÚ‘±
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
        
        print 'Ú‘±‚É¬Œ÷‚µ‚Ü‚µ‚½';
        }
        catch(PDOException $Exception){
            die('Ú‘±‚ÉŽ¸”s‚µ‚Ü‚µ‚½');
            }
    }
    
    fucntion disconnect(){
    $pdo =null;
        
    }
    
}

//DBØ’f

?>