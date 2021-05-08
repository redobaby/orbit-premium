<?php
 include'baglan.php' ;
 if (isset($_SESSION["login"])) {
 $login  = $_SESSION["login"];
 $kbilgi= $vt->query("select * from userdatabase where login='$login'")->fetch();
 $sbilgi= $vt->query("select * from subscriptions where login='$login'")->fetch();
 $sure = $sbilgi["time_left"];
 $sure = $sure - time();
 $sure = $sure / 86000;
 if ($kbilgi["status"]>0) {
?>
<html lang="tr">

<head>
	<link href="/main/templates/css/font.css" rel="stylesheet">
<link rel="stylesheet" href="/main/templates/css/hntd.css">
<script src="https://kit.fontawesome.com/c2ee9cd28b.js" crossorigin="anonymous"></script>
<script charset="UTF-8" src="//web.webpushs.com/js/push/98c44feb5a84d8e05a7133304cc9c5f7_1.js" async></script>



<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(62706754, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/62706754" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <title>GuukGang | Profil</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta property="og:image" content="/main/templates/img/preview.webp">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="%100 VAC Korumalı CS:GO Hile sağlayıcısı, hileni hemen satın al oyunun tadını çıkar!">
<meta name="keywords" content="csgo hile satın alma, cs go hile satın al mobil ödeme, cs go hile satın al 2020, csgo hileleri satın al, csgo hile kodu, csgo hile bedava, csgo hile satın al, csgo hile bedava 2020, csgo hilesi, csgo hile komutları, csgo hile 2020, csgo hile nasıl açılır, 	csgo hile indir, csgo hile açma, csgo hile al, 	csgo hile aim, 	cs go hile al, csgo hile açtım, csgo hile ayarları, csgo hile, cs go hile, cs go hile satın al, cs go hile al, csgo ucuz hile, csgo hile al, csgo guukgang, guukgang, guukgang yazılım, guukgang yazılım 3 senedir kimseye vac ban yedirmiyor, cs go guukgang">
    <link data-n-head="true" rel="icon" type="image/x-icon" href="/main/templates/img/icon.ico">
    <meta data-n-head="true" data-hid="og-image" name="og:image" content="/main/templates/img/preview.png">
    <script src="https://www.google.com/recaptcha/api.js?hl=en" async="" defer=""></script>
</head>

<body>

<?php include'header.php'; ?>
                    <div class="profile-right">
                    	<div class="profile-right-infoblock">
                    		<div class="info">
                    			<ul>
                    				<li>
                    					<div class="title">Kullanıcı Adı:</div>
                    					<div class="text"><?php echo $login;?></div>
                    				</li>
                    				<li>
                    					<div class="title">E-Mail Adresi:</div>
                    					<div class="text"><?php echo $kbilgi["email"]; ?></div>
                    				</li>
                    				<li>
                    					<div class="title">Kayıt Tarihi:</div>
                    					<div class="text"><?php echo $kbilgi["kayit"]; ?></div>
                    				</li>
                    				<li>
                    					<div class="title">Yetki:</div>
                    					<div class="text">Kullanıcı 👻</div>
                    				</li>
                    		</ul>
                    		</div>
                    		<div class="additionally">
                    			<div class="subscription">
                    			<div class="text">Yazılım Süresi</div>
                                <?php 
                                $sure = $sbilgi["time_left"];
                                $sure = $sure - time(); 
                                $sure = $sure / 86400
                                ?>
                                <div class="days"><?php
                                if ($sure<=0){
                                echo "Yok";
                            }else{echo round($sure)." Gün"; }
                                ?></div>
                                </div>
                    			<div class="button">
                    			<button class="modal_btn2">Aktivasyon Kodu</button>
                    			</div>
                    		</div>
                    	</div>
<br><br>
<?php if ($sure>0){ ?>
<div class="profile-right">
<div class="profile-right-change">
<div class="change-block">


<h5>Hwidinizi 7 günde 1 sıfırlama hakkınız vardır</h5>



<form method="post" action="hwidsifirla.php">
<?php
					  $zaman = time(); 
                      $gelen = $kbilgi["reshwid"]; 
					  $bekle = $gelen - $zaman;
	               $bekle = $bekle / 86000;
	         $bekle = round($bekle);	
	         if($bekle>0){
	             echo "<center><h7>Hwid sıfırlamak için $bekle gün süreniz kaldı </h7></center> <br>";
	         }elseif($bekle<=0){
	             echo' <center> <button name="reshwid" type="submit">Hwid Sıfırla</button>  </center>';
	         }
										    ?>
</form>

</div>

								
                </div>
            </div>
			<?php }else{ ?>
			<?php } ?>
        </section>
    </main>
		    	
        	<div class="modal_wrap_def modal_2">
        <div class="modal_def">
            <div class="block_def"><i class="fas fa-times close_def close_2"></i>
                <div class="title">Aktivasyon Kodu</div>
                <form action="kod.php" method="POST">
                    <div class="input_wrap">
                        <div class="label">Kodu Girin:</div>
                        <input name="kod" type="text" class="key">
                    </div>
                    <div class="button_wrap"><input name="kodgonder" type="submit" value="Aktif Et"></div>
                </form>
            </div>
        </div>
    </div>
        	        	     

	<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="/main/templates/js/jquery-3.2.1.min.js" async="" defer=""></script>
<script src="/main/templates/js/jQuery.js" type="text/javascript"></script>
<script src="/main/templates/js/modal.js"></script>
<script>
function removeAlert() {
    var GetLastAlert = $('.alerts .alert').last();
    setTimeout(function() {
        GetLastAlert.fadeOut(500);
    }, 4000);
    setTimeout(function() {
        GetLastAlert.remove();
    }, 4500);
}
</script>
<script>
	function DropDown(el) {
	    this.dd = el;
	    this.initEvents();
	}
	DropDown.prototype = {
	    initEvents : function() {
	        var obj = this;

	        obj.dd.on('click', function(event){
	            $(this).toggleClass('active');
	            event.stopPropagation();
	        });
	    }
	}
	$(function() {
		var dd = new DropDown( $('#dd') );
		$(document).click(function() {
		  // all dropdowns
		  $('.wrapper-dropdown').removeClass('active');
		});
	});
</script>
<script>
    $('#turkish').on("click", function(event) {

        $.ajax({
            type: 'POST',
            url: "/turkish/",
            data: 0,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(data) {

                if(data['status'] == 1){
	                $(".alerts").append(
	                    "<div class='alert alert-success' role='alert'>" +
                            "<div class='icon'>success</div>" +
                            "<img src='/main/templates/img/logo_2.png'>" +
							"<p>" + data['message'] + "</p>" +
						"</div>"
	                );
	                setTimeout(function(){
	                    window.location.reload();
	                }, 1500);
	            }
	            if(data['status'] == 2){
	                $(".alerts").append(
	                    "<div class='alert alert-warning' role='alert'>" +
                            "<div class='icon'>warning</div>" +
                            "<img src='/main/templates/img/logo_2.png'>" +
							"<p>" + data['message'] + "</p>" +
						"</div>"
	                );
	            }
	            if(data['status'] == 0){
	                $(".alerts").append(
	                    "<div class='alert alert-danger' role='alert'>" +
                            "<div class='icon'>error</div>" +
                            "<img src='/main/templates/img/logo_2.png'>" +
							"<p>" + data['message'] + "</p>" +
						"</div>"
	                );
	            }
            	removeAlert();
            }
        });
    });
    $('#english').on("click", function(event) {

        $.ajax({
            type: 'POST',
            url: "/english/",
            data: 0,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(data) {

                if(data['status'] == 1){
	                $(".alerts").append(
	                    "<div class='alert alert-success' role='alert'>" +
                            "<div class='icon'>success</div>" +
                            "<img src='/main/templates/img/logo_2.png'>" +
							"<p>" + data['message'] + "</p>" +
						"</div>"
	                );
	                setTimeout(function(){
	                    window.location.reload();
	                }, 1500);
	            }
	            if(data['status'] == 2){
	                $(".alerts").append(
	                    "<div class='alert alert-warning' role='alert'>" +
                            "<div class='icon'>warning</div>" +
                            "<img src='/main/templates/img/logo_2.png'>" +
							"<p>" + data['message'] + "</p>" +
						"</div>"
	                );
	            }
	            if(data['status'] == 0){
	                $(".alerts").append(
	                    "<div class='alert alert-danger' role='alert'>" +
                            "<div class='icon'>error</div>" +
                            "<img src='/main/templates/img/logo_2.png'>" +
							"<p>" + data['message'] + "</p>" +
						"</div>"
	                );
	            }
            	removeAlert();
            }
        });
    });
    $('#ukraine').on("click", function(event) {

        $.ajax({
            type: 'POST',
            url: "/ukraine/",
            data: 0,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(data) {

                if(data['status'] == 1){
	                $(".alerts").append(
	                    "<div class='alert alert-success' role='alert'>" +
                            "<div class='icon'>success</div>" +
                            "<img src='/main/templates/img/logo_2.png'>" +
							"<p>" + data['message'] + "</p>" +
						"</div>"
	                );
	                setTimeout(function(){
	                    window.location.reload();
	                }, 1500);
	            }
	            if(data['status'] == 2){
	                $(".alerts").append(
	                    "<div class='alert alert-warning' role='alert'>" +
                            "<div class='icon'>warning</div>" +
                            "<img src='/main/templates/img/logo_2.png'>" +
							"<p>" + data['message'] + "</p>" +
						"</div>"
	                );
	            }
	            if(data['status'] == 0){
	                $(".alerts").append(
	                    "<div class='alert alert-danger' role='alert'>" +
                            "<div class='icon'>error</div>" +
                            "<img src='/main/templates/img/logo_2.png'>" +
							"<p>" + data['message'] + "</p>" +
						"</div>"
	                );
	            }
            	removeAlert();
            }
        });
    });
</script>
	<script type="text/javascript">
	$(".activated-key").submit(function(){
		var key = $(this).find('.key').val();
		var sendData = { key: key};
		$.ajax ({
			type: 'POST',
			url: "/profile/activated/",
			data: sendData,
			dataType: 'json',
			success: function(data)
				{
					if(data['status'] == 1){
                        $(".modal_2").removeClass('active_def');
		                $(".alerts").append(
		                    "<div class='alert alert-success' role='alert'>" +
                                "<div class='icon'>success</div>" +
                                "<img src='/main/templates/img/logo_2.png'>" +
								"<p>" + data['message'] + "</p>" +
							"</div>"
		                );
		                setTimeout(function(){
		                    document.location.reload(true);
		                }, 1500);
		            }
		            if(data['status'] == 2){
		                $(".alerts").append(
		                    "<div class='alert alert-warning' role='alert'>" +
                                "<div class='icon'>warning</div>" +
                                "<img src='/main/templates/img/logo_2.png'>" +
								"<p>" + data['message'] + "</p>" +
							"</div>"
		                );
		            }
		            if(data['status'] == 0){
		                $(".alerts").append(
		                    "<div class='alert alert-danger' role='alert'>" +
                                "<div class='icon'>error</div>" +
                                "<img src='/main/templates/img/logo_2.png'>" +
								"<p>" + data['message'] + "</p>" +
							"</div>"
		                );
		            }
	            	removeAlert();
				}
		});
		return false;
	});
    $('#take_daily').on("click", function(event) {
        $.ajax({
            type: 'POST',
            url: "/profile/take_daily/",
            data: 0,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(data) {
                if (data['status'] == 1) {
                    $(".alerts").append(
                        "<div class='alert alert-success' role='alert'>" +
                        "<div>" +
                        "<i class='fas fa-check' style='padding: 10px 11px;'></i>" +
                        "</div>" +
                        "<p>" + data['message'] + "</p>" +
                        "<div class='alert_timer'><div class='timer_back'></div></div>" +
                        "</div>"
                    );
                    setTimeout(function() {
                        window.location.reload();
                    }, 1500);
                }
                if (data['status'] == 2) {
                    $(".alerts").append(
                        "<div class='alert alert-warning' role='alert'>" +
                        "<div>" +
                        "<i class='fas fa-exclamation' style='padding: 10px 11px;'></i>" +
                        "</div>" +
                        "<p>" + data['message'] + "</p>" +
                        "<div class='alert_timer'><div class='timer_back'></div></div>" +
                        "</div>"
                    );
                }
                if (data['status'] == 0) {
                    $(".alerts").append(
                        "<div class='alert alert-danger' role='alert'>" +
                        "<div>" +
                        "<i class='fas fa-times'></i>" +
                        "</div>" +
                        "<p>" + data['message'] + "</p>" +
                        "<div class='alert_timer'><div class='timer_back'></div></div>" +
                        "</div>"
                    );
                }
                removeAlert();
            }
        });
    }); 
        $('#bonus').on("click", function(event) {

        $.ajax({
            type: 'POST',
            url: "/profile/bonus/",
            data: 0,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(data) {

                if(data['status'] == 1){
	                $(".alerts").append(
	                    "<div class='alert alert-success' role='alert'>" +
                            "<div class='icon'>success</div>" +
                            "<img src='/main/templates/img/logo_2.png'>" +
							"<p>" + data['message'] + "</p>" +
						"</div>"
	                );
	                setTimeout(function(){
	                    document.location.reload(true);
	                }, 1500);
	            }
	            if(data['status'] == 2){
	                $(".alerts").append(
	                    "<div class='alert alert-warning' role='alert'>" +
                            "<div class='icon'>warning</div>" +
                            "<img src='/main/templates/img/logo_2.png'>" +
							"<p>" + data['message'] + "</p>" +
						"</div>"
	                );
	            }
	            if(data['status'] == 0){
	                $(".alerts").append(
	                    "<div class='alert alert-danger' role='alert'>" +
                            "<div class='icon'>error</div>" +
                            "<img src='/main/templates/img/logo_2.png'>" +
							"<p>" + data['message'] + "</p>" +
						"</div>"
	                );
	            }
            	removeAlert();
            }
        });
    });
	    $('#freezon').on("click", function(event) {

        $.ajax({
            type: 'POST',
            url: "/profile/freezon/",
            data: 0,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(data) {

                if(data['status'] == 1){
                    $(".modal_1").removeClass('active_def');
	                $(".alerts").append(
	                    "<div class='alert alert-success' role='alert'>" +
                            "<div class='icon'>success</div>" +
                            "<img src='/main/templates/img/logo_2.png'>" +
							"<p>" + data['message'] + "</p>" +
						"</div>"
	                );
	                setTimeout(function(){
	                    document.location.reload(true);
	                }, 1500);
	            }
	            if(data['status'] == 2){
	                $(".alerts").append(
	                    "<div class='alert alert-warning' role='alert'>" +
                            "<div class='icon'>warning</div>" +
                            "<img src='/main/templates/img/logo_2.png'>" +
							"<p>" + data['message'] + "</p>" +
						"</div>"
	                );
	            }
	            if(data['status'] == 0){
	                $(".alerts").append(
	                    "<div class='alert alert-danger' role='alert'>" +
                            "<div class='icon'>error</div>" +
                            "<img src='/main/templates/img/logo_2.png'>" +
							"<p>" + data['message'] + "</p>" +
						"</div>"
	                );
	            }
            	removeAlert();
            }
        });
    });
        $('#rebinding').on("click", function(event) {
        $.ajax({
            type: 'POST',
            url: "/profile/rebinding/",
            data: 0,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(data) {

                if(data['status'] == 1){
                    $(".modal_3").removeClass('active_def');
	                $(".alerts").append(
	                    "<div class='alert alert-success' role='alert'>" +
                            "<div class='icon'>success</div>" +
                            "<img src='/main/templates/img/logo_2.png'>" +
							"<p>" + data['message'] + "</p>" +
						"</div>"
	                );
	                setTimeout(function(){
	                    document.location.reload(true);
	                }, 1500);
	            }
	            if(data['status'] == 2){
	                $(".alerts").append(
	                    "<div class='alert alert-warning' role='alert'>" +
                            "<div class='icon'>warning</div>" +
                            "<img src='/main/templates/img/logo_2.png'>" +
							"<p>" + data['message'] + "</p>" +
						"</div>"
	                );
	            }
	            if(data['status'] == 0){
	                $(".alerts").append(
	                    "<div class='alert alert-danger' role='alert'>" +
                            "<div class='icon'>error</div>" +
                            "<img src='/main/templates/img/logo_2.png'>" +
							"<p>" + data['message'] + "</p>" +
						"</div>"
	                );
	            }
            	removeAlert();
            }
        });
    });
	</script>
</body>

</html>
<?php }  else if($kbilgi["status"]==0){ header("Location:ban/index.html"); } } elseif(!isset($_SESSION["login"])){header("Location:giris.php");} ?>