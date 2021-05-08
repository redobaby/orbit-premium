<html lang="ru">
<head>
<link href="..\main\templates\css\font.css" rel="stylesheet">
<link rel="stylesheet" href="..\main\templates\css\hntd.css">
<script src="https://kit.fontawesome.com/c2ee9cd28b.js" crossorigin="anonymous"></script>

<script type="text/javascript">
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
<noscript><div><img src="https://mc.yandex.ru/watch/62706754" style="position:absolute; left:-9999px;" alt=""></div></noscript>
<title>GuukGang | Giriş</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta property="og:image" content="/main/templates/img/preview.webp">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="description" content="%100 VAC Korumalı CS:GO Hile sağlayıcısı, hileni hemen satın al oyunun tadını çıkar!">
<meta name="keywords" content="csgo hile satın alma, cs go hile satın al mobil ödeme, cs go hile satın al 2020, csgo hileleri satın al, csgo hile kodu, csgo hile bedava, csgo hile satın al, csgo hile bedava 2020, csgo hilesi, csgo hile komutları, csgo hile 2020, csgo hile nasıl açılır, 	csgo hile indir, csgo hile açma, csgo hile al, 	csgo hile aim, 	cs go hile al, csgo hile açtım, csgo hile ayarları, csgo hile, cs go hile, cs go hile satın al, cs go hile al, csgo ucuz hile, csgo hile al, csgo guukgang, guukgang, guukgang yazılım, guukgang yazılım 3 senedir kimseye vac ban yedirmiyor, cs go guukgang">
<link data-n-head="true" rel="icon" type="image/x-icon" href="..\main\templates\img\icon.ico">
<meta data-n-head="true" data-hid="og-image" name="og:image" content="/main/templates/img/preview.png">
<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
<?php include'header2.php'; ?>
<div class="alerts">
</div>
<main>
<section id="auth-access">
<h2>
<span class="main-text">Hesabına erişmek için</span>
<span class="background-rectangle-skew">Giriş yap</span>
</h2>
<div class="container">
<div class="auth-access-flex">
<div class="auth-card">

<center><h5>
					<?php
					if ($_GET["drm"]=="no") {
					  echo " Kullanıcı adı ve ya şifre yanlış.";
					}elseif ($_GET["dogrulama"]=="yanlis") {
					  echo "Lütfen güvenlik doğrulamasını yapınız.";
					}
					?>
				  </h5></center>

<form method="POST" action="islem.php">
<div class="auth-form">
<label>Kullanıcı Adı:</label>
<input name="login" type="text" class="login">
</div>
<div class="auth-form">
<label>Şifre:</label>
<input name="password" type="password" class="password">
</div>
<div data-theme="dark" class="g-recaptcha" data-sitekey="6LfIBckZAAAAAFFYRTPOEGU6-SkWgx1l-KsWnAbK"></div>
<button name="gonder" type="submit">Giriş Yap</button>
</form>
<div class="auth-footer">
<div class="auth-footer-head">Hesabınyok mu?</div>
<a href="kayit.php" class="auth-footer-bot">Hemen Kayıt Ol</a>
</div>
</div>
</div>
</div>
</section>
</main>
<script src="..\main\templates\js\jquery-3.2.1.min.js" async="" defer=""></script>
<script src="..\main\templates\js\jQuery.js" type="text/javascript"></script>
<script src="..\main\templates\js\modal.js"></script>
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
	$(".authorization").submit(function(){
		var login = $(this).find('.login').val();
		var password = $(this).find('.password').val();
		var recaptcha = grecaptcha.getResponse();
		var sendData = { login: login , password: password, recaptcha: recaptcha};
		$.ajax ({
			type: 'POST',
			url: "/auth/authorization/",
			data: sendData,
			dataType: 'json',
			success: function(data)
				{
					if(data['status'] == 1){
		                $(".alerts").append(
		                    "<div class='alert alert-success' role='alert'>" +
                            "<div class='icon'>success</div>" +
                            "<img src='/main/templates/img/logo_2.png'>" +
								"<p>" + data['message'] + "</p>" +
							"</div>"
		                );
		                setTimeout(function(){
		                    window.location.href = "/profile/";
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
	                grecaptcha.reset();
	            	removeAlert();
				}
		});
		return false;
	});
	</script>
</body>
</html>
