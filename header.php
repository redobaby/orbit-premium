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
                            <a href="#">Profil <b><?php echo $login?></b></a>
                        </li>
                        
                        <li>
                            <a href="out.php">Çıkış Yap</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="alerts">
    </div>
    <main>
        <section id="profile-access">
                       <div class="container">
                <div class="profile-access-flex">
                    <div class="profile-left">
				        <div class="profile-left-block">
	<ul>
		<li>
			<a href="/profil.php"><div class="icon"><i class="fas fa-user-circle"></i></div><div class="text">Profil</div></a>
		</li>
						<li>
			<a href="/#buy-access" target="_blank"><div class="icon"><i class="fas fa-money-bill-wave"></i></div><div class="text">Satın Al</div></a>
		</li>
				
				<li>
			<a href="ayarlar.php"><div class="icon"><i class="fas fa-cog"></i></div><div class="text">Hesap Ayarları</div></a>
		</li>
		<li>
			<a href="/duyuru.php"><div class="icon"><i class="fas fa-users"></i></div><div class="text">Duyurular</div></a>
        </li>

        <li>
        <form id="gonder" action="indir.php" method="POST">
        <?php if( $sbilgi["time_left"] >= time() ){ ?>
<a href="javascript:{}" onclick="document.getElementById('gonder').submit();" ><div class="icon"></div><div class="text">Yazılımı İndir</div></a>
        <?php } ?>
        <input name="sa" type="hidden">
        </form>
		</li>

        <li>
        <?php if ($kbilgi["status"]>1){ ?>
<a href="/ozel.php"><div class="icon"></div><div class="text">Yönetici Paneli</div></a>
        <?php } ?>
		</li>
		
												<li>
			<a href="out.php"><div class="icon"><i class="fas fa-sign-out-alt"></i></div><div class="text">Çıkış Yap</div></a>
		</li>
	</ul>
</div>
                    </div>