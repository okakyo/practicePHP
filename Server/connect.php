<?php

//DB接続
class SQLClass{
  //定数の宣言
  const DB_NAME='phptest';
  const HOST='localhost';
  const UTF='utf8';
  const USER='root';
  const PASS='';
  //データベースに接続する関数
  function pdo(){
    /*phpのバージョンが5.3.6よりも古い場合はcharset=".self::UTFが必要無くなり、array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES '.SELF::UTF')が必要になり、5.3.6以上の場合は必要ないがcharset=".self::UTFは必要になる。*/
    $dsn="mysql:dbname=".self::DB_NAME.";host=".self::HOST.";charset=".self::UTF;
    $user=self::USER;
    $pass=self::PASS;
    try{
      $pdo=new PDO($dsn,$user,$pass,array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES '.SELF::UTF));
    }catch(Exception $e){
      echo 'error' .$e->getMesseage;
      die();
    }
    //エラーを表示してくれる。
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    return $pdo;
  }
  //SELECT文のときに使用する関数。
  function select($sql){
    $hoge=$this->pdo();
    $stmt=$hoge->query($sql);
    $items=$stmt->fetchAll(PDO::FETCH_ASSOC);
    return $items;
  }
  //SELECT,INSERT,UPDATE,DELETE文の時に使用する関数。
  function plural($sql,$item){
    $hoge=$this->pdo();
    $stmt=$hoge->prepare($sql);
    $stmt->execute(array(':id'=>$item));//sql文のVALUES等の値が?の場合は$itemでもいい。
    return $stmt;
  }
    
}

  $obj=new SQLClass();
//sql文の発行
$sql="SELECT * FROM example";
$sql2="SELECT * FROM example WHERE id=:id";
//変数の設定
$test=1;
//クラスの中の関数の呼び出し
$items=$obj->select($sql);
$items2=$obj->plural($sql2,$test);
?>
<!doctype html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>テスト</title>
</head>
<body>
  <h2>全データの表示</h2>
  <hr/>
  <?php foreach($items as $item) : ?>
    <h3>タイトル名：<?php echo $item['title']; ?></h3>
    <p>発案者：<?php echo $item['author']; ?></p>
    <p>内容：<?php echo $item['detail']; ?></p>
    <hr/>
  <?php endforeach; ?>

  <h2>ID=<?php echo $test?>のデータの表示</h2>
  <?php foreach($items2 as $item) : ?>
    
    <p>タイトル名：<?php echo $item['title']; ?></p>
    <p>発案者：<?php echo $item['author']; ?></p>
    <p>内容：<?php echo $item['detail']; ?></p>
    <hr/>
  <?php endforeach; ?>
</body>
</html>
