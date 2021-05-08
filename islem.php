<?php
include 'baglan.php';

      /* Üye Ol */
      if (isset($_POST["register"])) {
        $email     = strip_tags(trim($_POST["email"]));
        $login =strip_tags(trim($_POST["login"]));
        $password     =strip_tags(trim($_POST["password"]));
        $password2    =strip_tags(trim($_POST["password2"]));
        $kod    = md5(rand(0,9999999999));
        $bugun = date('d-m-y')."20";
        $secretKey = "6LfIBckZAAAAAAXQe9ZoA2iXxt5kaU0U6ZX1kOiy";
        $responseKey = $_POST['g-recaptcha-response'];
        $userIP = $_SERVER['REMOTE_ADDR'];
        $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$userIP";
        $response = file_get_contents($url);
        $response = json_decode($response);
        
        
        if ($response->success)
          if (empty($email) || empty($login) || empty($password) || empty($password2) ){
            header("Location:kayit.php?bos=var");
          }else{
            $kullanicivarmi = $vt->prepare("select * from userdatabase where login=? || email=?");
            $kullanicivarmi-> execute(array($login,$email));
            $varmi          = $kullanicivarmi->rowCount();
            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
           header("Location:kayit.php?email=yanlis");
            }else{

            if ($varmi>0) {
              header("Location:kayit.php?durum=var");
            }else{
              if ($password==$password2) {
                $password     =md5($_POST["password"]);
                $password2    =md5($_POST["password2"]);
                $kullaniciekle= $vt->prepare("INSERT into userdatabase set email=?, login=?, password=?, kayit=?");
                $kullaniciekle->execute(array($email,$login,$password,$bugun));
                if ($kullaniciekle) {

                  echo '<script>alert("Kayıt başarılı, Lütfen giriş yapınız!")</script>'; // sınırsız çıktıgı zaman cıkıcak mesaj
                  header("Refresh: 0; url=giris.php");
			
                  
                  
                }else{
                  header("Location:kayit.php?durum=olmadi");
                }
              }else{
                header("Location:kayit.php?sifre=olmadi");
              
              }
            }
            }
          }
          else
            header("Location:kayit.php?dogrulama=yanlis");
      }
      
      

      if (isset($_POST["gonder"])) {
        $login  =strip_tags(trim($_POST["login"]));
        $password   =md5($_POST["password"]);
          $kullanicivarmi= $vt->prepare("select * from 	userdatabase where login=? && password=?");
          $kullanicivarmi->execute(array($login,$password));
          $row= $kullanicivarmi->rowCount();
          $secretKey = "6LfIBckZAAAAAAXQe9ZoA2iXxt5kaU0U6ZX1kOiy";
        $responseKey = $_POST['g-recaptcha-response'];
        $userIP = $_SERVER['REMOTE_ADDR'];
        $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$userIP";
        $response = file_get_contents($url);
        $response = json_decode($response);
        if ($response->success)
          if ($row>0) {
          $_SESSION["login"]=$login;
          $_SESSION["password"]=$password;
          header("Location:profil.php");
          
          }else{
          header("Location:giris.php?drm=no");
          }
          else
          header("Location:giris.php?dogrulama=yanlis");
        }
      
      

if (isset($_POST["uyeguncelle"])) {
        if ($_POST["uyepass"]=="") {
            $id     =$_POST["id"];
          $username  =$_POST["username"];
          $durum    =$_POST["durum"];
          $yetki  =$_POST["yetki"];
          $hwid  =$_POST["hwid"];
          $tarih  =$_POST["tarih"];
              $uyeguncel=$vt->prepare("update uyeler set username=?, durum=?, yetki=?, hwid=?, tarih=? where id=? ");
              $uyeguncel->execute(array($username,$durum,$yetki,$hwid,$tarih,$id));
              if ($uyeguncel) {
                header("Location:admin.php?id=$id&g=ok");
              }else{
                header("Location:admin.php?id=$id&g=no");
              }
        }else{
          $id     =$_POST["id"];
          $eposta  =$_POST["eposta"];
          $username  =$_POST["username"];
          $durum    =$_POST["durum"];
          $yetki  =$_POST["yetki"];
          $hwid  =$_POST["hwid"];
          $tarih  =$_POST["tarih"];
              $uyeguncel=$vt->prepare("update uyeler set username=?, durum=?, yetki=?, hwid=?, tarih=? where id=? ");
              $uyeguncel->execute(array($username,$durum,$yetki,$hwid,$tarih,$id));
              if ($uyeguncel) {
                header("Location:uyeler.php?id=$id&g=ok");
              }else{
                header("Location:uyeler.php?id=$id&g=no");
              }
        }
        
      }


     
?>
