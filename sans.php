<?php
include'baglan.php' ; // baglan php yi dahil ediyoruz
if (isset($_SESSION["login"])) { 
$login  = $_SESSION["login"];
$kbilgi= $vt->query("select * from userdatabase where login='$login'")->fetch(); // Tablodaki verileri çekiyoruz
$sbilgi= $vt->query("select * from subscriptions where login='$login'")->fetch(); // Tablodaki Verileri Çekiyoruz
}


if(strip_tags(isset($_POST["kasa"]))){ // POST gelip gelmediğini kontrol ediyoruz
    $kasa = $kbilgi["kasa"]; // kasa değişkenimize databaseteki bilgileri atıyoruz
    $sans = rand(1,17); // rasgele sayı üretiyoruz
    $sinirsiz = rand(1,50); // rasgele sayı üretiyoruz
    $bugun = time(); // bugun değişkenine tarihi atıyoruz
    if(isset($login)){ // kullanıcının giriş yapıp yapmadıgını kontrol ediyoruz
        if($kbilgi["kasa"]<=0){ // kullanıcının kasası olup olmadıgını kontrol ediyoruz
            echo "<script>alert('KASA YOK KANKİ :(')</script>"; // kullanıcın çıkardıgı günü yazdırıyoruz
            header("Refresh: 0; url=sanskutusu.php");
        }else{ // kasası varsa işlemlerimize devam ediyoruz
            $gkasa = $kasa - 1;  // kullanıcın kasalarından 1 adet eksiltiyoruz 
            $guncelkasa = "UPDATE userdatabase SET kasa = '$gkasa' where login='$login'"; //databaseteki kullanıcının kasa sayısını güncelliyoruz
            if ($vt->query($guncelkasa)===true) { // database e yazdırıyoruz 
            }
           if ($sinirsiz === 50){ // sınırsız eğer 50 ise işlemleri yapıyoruz
               
            if($sbilgi["time_left"] > $bugun){ // kullanıcın günü varsa gününü topluyoruz
                $toplam2 = $sbilgi["time_left"] + (1001 * 24 * 60 * 60); // kullanıcın günü + kutudan çıkan gün
                $top = "UPDATE subscriptions SET time_left = '$toplam2' where login='$login'"; // Kullanıcın gününü güncelliyoruz
                if ($vt->query($top)===true) {
                }// database e yazdırıyoruz 
                echo '<script>alert("Kasadan Sınırsız Gün Süre Kazandın")</script>'; // sınırsız çıktıgı zaman cıkıcak mesaj
                header("Refresh: 0; url=sanskutusu.php");
           exit(); // Php yi durduruyoruz
                }else{ //kullanıcının süresi yok ise yapılacak işlemler
                $toplam = time() + (1001 * 24 * 60 * 60); // bugunun tarihi çıkan günü topluyoruz
                $sql_t = "INSERT into subscriptions ( `time_left`, `login`, `status`, `usergroup`) values ( '$toplam', '$login', '1', '0')" ; // Bİlgileri database e ekliyoruz
                if ($vt->query($sql_t)===true) {// database e yazdırıyoruz 
                }
                echo '<script>alert("Kasadan Sınırsız Gün Süre Kazandın")</script>'; // sınırsız çıktıgı zaman cıkıcak mesaj
                header("Refresh: 0; url=sanskutusu.php");
            }
exit(); // php yi durduruyoruz 


           }else{// kullanıcı sınırsız cıkarmadıyda yapılacak işlemler 

            if($sbilgi["time_left"] > $bugun){ // kullanıcın süresi olup olmadıgına bakıyoruz
            $toplam2 = $sbilgi["time_left"] + ($sans * 24 * 60 * 60); // Kullanıcın günü ile çıkan günü topluyoruz
            $top = "UPDATE subscriptions SET time_left = '$toplam2' where login='$login'"; // Kulanıcın bilgilerini güncelliyoruz
            if ($vt->query($top)===true) {// database e yazdırıyoruz 
            }
            echo "<script>alert('Kasadan $sans Gün Süre Kazandın')</script>"; // sınırsız çıktıgı zaman cıkıcak mesaj
            header("Refresh: 0; url=sanskutusu.php");
       exit(); 
            }else{//kullanıcın süresi varsa bu işlemleri yaptırıyoruz
            $toplam = time() + ($sans * 24 * 60 * 60); // bugun ile çıkan zamanı topluyoruz
            $sql_t = "INSERT into subscriptions ( `time_left`, `login`, `status`, `usergroup`) values ( '$toplam', '$login', '1', '0')" ;//database e bilgileri ekliyoruz
            if ($vt->query($sql_t)===true) {// database e yazdırıyoruz 
            }
            echo "<script>alert('Kasadan $sans Gün Süre Kazandın')</script>"; // kullanıcın çıkardıgı günü yazdırıyoruz
            header("Refresh: 0; url=sanskutusu.php");
            exit(); //php yi kapatıyoruz ki farklı işlem yapılmasın :D
        }
    }
        }





    }else{
        header("Location:giris.php"); //kullanıcı giriş yapmadıyda giriş sayfasına yönlendiriyoruz
    }
}
if(strip_tags(isset($_POST["kasa2"]))){
    $kasa = $kbilgi["kasa2"];
    $sans = rand(6,25);
    $sinirsiz = rand(1,35);
    $bugun = time();
    if(isset($login)){
        if($kbilgi["kasa2"]<=0){
            echo "<script>alert('KASA YOK KANKİ :(')</script>"; // kullanıcın çıkardıgı günü yazdırıyoruz
            header("Refresh: 0; url=sanskutusu.php");
        }else{
            $gkasa = $kasa - 1;
            $guncelkasa = "UPDATE userdatabase SET kasa2 = '$gkasa' where login='$login'";
            if ($vt->query($guncelkasa)===true) {

            }
           if ($sinirsiz === 35){
               
            if($sbilgi["time_left"] > $bugun){
                $toplam2 = $sbilgi["time_left"] + (1001 * 24 * 60 * 60);
                $top = "UPDATE subscriptions SET time_left = '$toplam2' where login='$login'";
                if ($vt->query($top)===true) {
                }
                echo "<script>alert('Kasadan Sınırsız Gün Süre Kazandın')</script>"; // kullanıcın çıkardıgı günü yazdırıyoruz
            header("Refresh: 0; url=sanskutusu.php");
           exit(); 
                }else{
                $toplam = time() + (1001 * 24 * 60 * 60);
                $sql_t = "INSERT into subscriptions ( `time_left`, `login`, `status`, `usergroup`) values ( '$toplam', '$login', '1', '0')" ;
                if ($vt->query($sql_t)===true) {
                }
                echo "<script>alert('Kasadan Sınırsız Gün Süre Kazandın')</script>"; // kullanıcın çıkardıgı günü yazdırıyoruz
            header("Refresh: 0; url=sanskutusu.php");
            }
exit();


           }else{

            if($sbilgi["time_left"] > $bugun){
            $toplam2 = $sbilgi["time_left"] + ($sans * 24 * 60 * 60);
            $top = "UPDATE subscriptions SET time_left = '$toplam2' where login='$login'";
            if ($vt->query($top)===true) {
            }
            echo "<script>alert('Kasadan $sans Gün Süre Kazandın')</script>"; // kullanıcın çıkardıgı günü yazdırıyoruz
            header("Refresh: 0; url=sanskutusu.php");
       exit(); 
            }else{
            $toplam = time() + ($sans * 24 * 60 * 60);
            $sql_t = "INSERT into subscriptions ( `time_left`, `login`, `status`, `usergroup`) values ( '$toplam', '$login', '1', '0')" ;
            if ($vt->query($sql_t)===true) {
            }
            echo "<script>alert('Kasadan $sans Gün Süre Kazandın')</script>"; // kullanıcın çıkardıgı günü yazdırıyoruz
            header("Refresh: 0; url=sanskutusu.php");
            exit();
        }
    }
        }





    }else{
        header("Location:giris.php");
    }
}
if(strip_tags(isset($_POST["kasa3"]))){
    $kasa = $kbilgi["kasa3"];
    $yillik = rand(100,365);
    if($yillik>300){
        $yillik = 365;
    }else{
        $yillik = 45;
    }
    $sans = rand(10,$yillik);
    $sinirsiz = rand(1,30);
    $bugun = time();
    if(isset($login)){
        if($kbilgi["kasa3"]<=0){
            echo "<script>alert('KASA YOK KANKİ :(')</script>"; // kullanıcın çıkardıgı günü yazdırıyoruz
            header("Refresh: 0; url=sanskutusu.php");
        }else{
            $gkasa = $kasa - 1;
            $guncelkasa = "UPDATE userdatabase SET kasa3 = '$gkasa' where login='$login'";
            if ($vt->query($guncelkasa)===true) {

            }
           if ($sinirsiz === 30){
               
            if($sbilgi["time_left"] > $bugun){
                $toplam2 = $sbilgi["time_left"] + (1001 * 24 * 60 * 60);
                $top = "UPDATE subscriptions SET time_left = '$toplam2' where login='$login'";
                if ($vt->query($top)===true) {
                }
                echo "<script>alert('Kasadan Sınırsız Gün Süre Kazandın')</script>"; // kullanıcın çıkardıgı günü yazdırıyoruz
            header("Refresh: 0; url=sanskutusu.php");
           exit(); 
                }else{
                $toplam = time() + (1001 * 24 * 60 * 60);
                $sql_t = "INSERT into subscriptions ( `time_left`, `login`, `status`, `usergroup`) values ( '$toplam', '$login', '1', '0')" ;
                if ($vt->query($sql_t)===true) {
                }
                echo "<script>alert('Kasadan Sınırsız Gün Süre Kazandın')</script>"; // kullanıcın çıkardıgı günü yazdırıyoruz
            header("Refresh: 0; url=sanskutusu.php");
            }
exit();


           }else{

            if($sbilgi["time_left"] > $bugun){
            $toplam2 = $sbilgi["time_left"] + ($sans * 24 * 60 * 60);
            $top = "UPDATE subscriptions SET time_left = '$toplam2' where login='$login'";
            if ($vt->query($top)===true) {
            }
            echo "<script>alert('Kasadan $sans Gün Süre Kazandın')</script>"; // kullanıcın çıkardıgı günü yazdırıyoruz
            header("Refresh: 0; url=sanskutusu.php");
       exit(); 
            }else{
            $toplam = time() + ($sans * 24 * 60 * 60);
            $sql_t = "INSERT into subscriptions ( `time_left`, `login`, `status`, `usergroup`) values ( '$toplam', '$login', '1', '0')" ;
            if ($vt->query($sql_t)===true) {
            }
            echo "<script>alert('Kasadan $sans Gün Süre Kazandın')</script>"; // kullanıcın çıkardıgı günü yazdırıyoruz
            header("Refresh: 0; url=sanskutusu.php");
            exit();
        }
    }
        }





    }else{
        header("Location:giris.php");
    }
}else{
    echo "<script>alert('Yetkisiz giriş algılandı ip adresiniz loglandı :(')</script>"; 
            header("Refresh: 0; url=sanskutusu.php");
}

?>