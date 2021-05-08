<div class="navigation-custom">
<div class="container">
<div class="row">
<div class="col">
<div class="nav-flex">
<a href="/" class="nav-logo"><img src="https://cdn.discordapp.com/attachments/760420040117190706/767857837006127114/logo25.png" alt=""></a>
<ul class="register-block">

<li>
<a href="/#buy-access">Satın Al</a>
</li>
<li>
<a href="/sanskutusu.php">Şans Kutusu</a>
</li>
<li>
<?php if ($kbilgi["login"]=$login){ ?>
<a href="profil.php">Profil <b> <?php echo $login ?></b></a>
</li>
<li>
<a href="out.php">Çıkış Yap</a>
</li>
<?php }else{ ?>
    <a href="giris.php">Giriş <b> Yap</b></a>
    </li>
    <li>
<a href="kayit.php">Kayıt Ol</a>
</li>
<?php } ?>


</ul>
</div>
</div>
</div>
</div>
</div>