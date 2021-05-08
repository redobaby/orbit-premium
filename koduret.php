<?php
 include'baglan.php' ;
 if (isset($_SESSION["login"])) {
 $login  = $_SESSION["login"];
 $kbilgi= $vt->query("select * from userdatabase where login='$login'")->fetch();
 }
if (isset($_POST["koduret"])){
   if($kbilgi["status"]>1){
      $sure = $_POST["sure"];
      $kod = rand(0,9999);
      $kod = crc32(sha1(md5($kod)));
      $top = rand(999999990,999999999);
      $kod = $kod + $top;
      $kod = "GUUKGANG-".$kod;
      $sql = "INSERT INTO kod (kod, sure, durum) VALUES ('$kod', '$sure', '1')";
         if($vt->query($sql)===true){
  }
  header("Location:ozel.php");
   }

}

?>