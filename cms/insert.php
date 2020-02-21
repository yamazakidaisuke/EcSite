<?php
//----------------------------------------------------
//１．入力チェック(受信確認処理追加)
//----------------------------------------------------
//商品名 受信チェック:item


//金額 受信チェック:value


//商品紹介文 受信チェック:description


//ファイル受信チェック※$_FILES["******"]["name"]の場合




//----------------------------------------------------
//２. POSTデータ取得
//----------------------------------------------------
$*****  = **********;   //File名
$*****  = **********;   //商品名
$*****  = **********;   //価格(数字：intvalを使う)
$****** = **********;   //商品紹介文


//1-2. FileUpload処理
$upload = "../img/"; //画像アップロードフォルダへのパス
//アップロードした画像を../img/へ移動させる記述↓
if(move_uploaded_file($_FILES['fname']['tmp_name'], $upload.$fname)){
  //FileUpload:OK
} else {
  //FileUpload:NG
  echo "Upload failed";
  echo $_FILES['upfile']['error'];
}

//----------------------------------------------------
//３. DB接続します(エラー処理追加)
//----------------------------------------------------
try {
  $pdo = new PDO('mysql:dbname=******;charset=utf8;host=*******','*****','*****');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}

//----------------------------------------------------
//４．データ登録SQL作成
//----------------------------------------------------
$stmt = $pdo->prepare("INSERT INTO *********(id, item, value, fname,
description, indate )VALUES(NULL, :******, :*****, :*****, :******, sysdate())");
$stmt->bindValue(':*****', $*****, PDO::PARAM_STR);
$stmt->bindValue(':*****', $*****, PDO::PARAM_INT); //数値
$stmt->bindValue(':*****', $*****, PDO::PARAM_STR);
$stmt->bindValue(':*****', $*****, PDO::PARAM_STR);
$status = $stmt->execute();

//----------------------------------------------------
//５．データ登録処理後
//----------------------------------------------------
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  //５．item.phpへリダイレクト
  header("Location: *****.php");
  exit;
}
?>
