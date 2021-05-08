<?php
include'baglan.php' ; // baglan php yi dahil ediyoruz
if (isset($_SESSION["login"])) { 
$login  = $_SESSION["login"];
$kbilgi= $vt->query("select * from userdatabase where login='$login'")->fetch(); // Tablodaki verileri çekiyoruz
$sbilgi= $vt->query("select * from subscriptions where login='$login'")->fetch(); // Tablodaki Verileri Çekiyoruz
}

if(strip_tags(isset($_POST["kodgonder"]))){
  if(isset($login)){
    $kod = (strip_tags($_POST["kod"]));
    $kodvarmi = $vt->prepare("select * from kod where kod=?");
    $kodvarmi-> execute(array($kod));
    $varmi          = $kodvarmi->rowCount();

    if ($varmi>0) {
     
      $kodb= $vt->query("select * from kod where kod='$kod'")->fetch();
      $sure = $kodb["sure"];
      if($sbilgi["time_left"] > $bugun){ 
        $toplam2 = $sbilgi["time_left"] + ($sure * 24 * 60 * 60); 
        $top = "UPDATE subscriptions SET time_left = '$toplam2' where login='$login'"; 
        if ($vt->query($top)===true) {
        }
        $sil = "DELETE FROM `kod` WHERE kod='$kod'";
  if($vt->query($sil)===true){  
     }
     echo "<script>alert('Hesabınıza $sure Gün Eklendi!')</script>"; 
     header("Refresh: 0; url=profil.php");
   exit(); 
        }else{ 
        $toplam = time() + ($sure * 24 * 60 * 60); 
        $sql_t = "INSERT into subscriptions ( `time_left`, `login`, `status`, `usergroup`) values ( '$toplam', '$login', '1', '0')" ;
        if ($vt->query($sql_t)===true) {
        }

        $sil = "DELETE FROM `kod` WHERE kod='$kod'";
  if($vt->query($sil)===true){  
     }
     echo "<script>alert('Hesabınıza $sure Gün Eklendi!')</script>"; 
     header("Refresh: 0; url=profil.php");   
    }
exit(); 
    }else{
      echo "<script>alert('Kod Bulunamadı!')</script>"; 
      header("Refresh: 0; url=profil.php");
    }

  }else{
    header("Refresh: 0; url=giris.php");  }
}else{
  echo "<script>alert('Yetkisiz Yönlendirme İp Loglandı!')</script>"; 
      header("Refresh: 0; url=giris.php");
}



 ?>


  