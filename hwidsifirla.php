<?php
include'baglan.php' ; // baglan php yi dahil ediyoruz
 if (isset($_SESSION["login"])) { 
 $login  = $_SESSION["login"];
 $kbilgi= $vt->query("select * from userdatabase where login='$login'")->fetch(); // Tablodaki verileri çekiyoruz
 $sbilgi= $vt->query("select * from subscriptions where login='$login'")->fetch(); // Tablodaki Verileri Çekiyoruz
}
$gelecek = time() + (7 * 24 * 60 * 60); // zamana 7 gün ekliyoruz
$zaman = time(); //bugünün tarhini
$gelen = $kbilgi["reshwid"]; //databaseten verimizi çekiyoruz

if(strip_tags(isset($_POST['reshwid']))){ //post olup olmadıgını kontrol ediyoruz

	if($login = $login){ //kullanıcı giriş yaptıgını kontrol ediyoruz

	if($zaman>$gelen){

$sql = "update userdatabase SET hwid='', reshwid='$gelecek' where login='$login'"; // bilgilerimizi database e kaydediyoruz
        


     if($vt->query($sql)===true){ 
     }
         echo "<script>alert ('Hwid Sıfırlandı 7 Gün İçerisinde Tekrardan Sıfırlayabilirsin')</script>"; //Çıkan Uyarı Mesajı 

header("Refresh: 0; url=https://guukgang.com/profil.php"); // Yönlendirilicek SAyfa

	}else{
	    $bekle = $gelen - $zaman; //databaseten çekmiş oldugmuz veriyi tarihten çıkarıoruz
	    $bekle = $bekle / 86000; // Günü bulmak için bölüyoruz
	    $bekle = round($bekle); // Sayıyı Yuvarlıyoruz
		         echo "<script>alert ('Lütfen $bekle Gün Bekleyiniz')</script>"; // uyarı Mesajı
	}

}else{

    
    header("Refresh: 0; url=https://guukgang.com/index.php");
}
}else{
header("Refresh: 0; url=https://guukgang.com/giris.php");
}

?>