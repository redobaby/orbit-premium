<?php

 include'baglan.php' ;

 if (isset($_SESSION["login"])) {

 $login  = $_SESSION["login"];

 $kbilgi= $vt->query("select * from userdatabase where login='$login'")->fetch();

 }



if (strip_tags(isset($_POST["sifirla"]))) {

	$oldpass = md5($_POST["oldpass"]);

	$newpass = $_POST["newpass"];





if ($oldpass !== $kbilgi['password']) {

header("Location:ayarlar.php?sifre=yanlis");

    

}else{



if (empty($oldpass) || empty($newpass)) {

header("Location:ayarlar.php?sifre=bos");

}else{

 if (strlen($newpass) <6) {

header("Location:ayarlar.php?sifre=kucuk");



 }else{



 	$newpass = md5($newpass);

 	$sql = "UPDATE userdatabase SET password = '$newpass' where login='$login'";

 	header("Refresh: 1; url=https://guukgang.com/ayarlar.php?sifre=basarili");

 }

 if ($vt->query($sql)===true) {

 }

 }



}









}



















?>