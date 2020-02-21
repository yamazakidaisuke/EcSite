<?php
session_start();
//1.GETでidを取得
if(!isset($_GET["*****"]) || $_GET["*****"]==""){
  exit("ErrorParam!");
}

//GET受信
$id = intval($_GET["*****"]);

//SESSION削除
unset($_SESSION["cart"][$*****]);

//cart.phpへリダイレクト
header("Location: *****.php");
exit;

?>
